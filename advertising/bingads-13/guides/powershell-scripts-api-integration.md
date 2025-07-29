---
title: PowerShell scripts for API integration
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 07/16/2025
description: PowerShell scripts designed to automate the setup of Azure AD App Registrations for seamless integration with the Microsoft Advertising API.
searchscope: exclude
---

# PowerShell scripts for API integration

## Tools and resources

- [Azure CLI](/cli/azure/install-azure-cli)
- MSA Developer token

## What are PowerShell scripts?

PowerShell scripts are designed to automate the setup of Azure AD App Registrations for seamless integration with the Microsoft Advertising API. These scripts eliminate manual errors, save time, and ensure compliance with Ads API requirements.

### Key benefits

- **Automated Setup**: Configures Azure AD apps with correct permissions (msads.manage)
- **Token Management**: Generates and refreshes OAuth 2.0 tokens (access + refresh)
- **Security**: Follows Azure AD best practices

## Prerequisites

Before running the scripts, ensure you have:

### Azure Access

- Global Admin or Application Admin role
- [Azure CLI installed](/cli/azure/install-azure-cli)

### PowerShell Modules

```powershell
Install-Module -Name Az -Force -AllowClobber # For Azure resource management
Install-Module -Name AzureAD -Force # For Azure AD-specific operations
```

### Microsoft Advertising Credentials

- Developer Token (from Microsoft Advertising Portal)
- Customer ID

## PowerShell scripts available

The following is a list of available scripts and their application:

### Create-AdvertisingApp.ps1

Creates an Azure AD app, configures permissions, and generates a consent URL.

**Usage:**

```powershell
pwsh Create-AdvertisingApp.ps1
```

### Get-AdvertisingToken.ps1

Exchanges an authorization code for tokens. Saves them in ads_config.json.

**Usage:**

```powershell
pwsh Get-AdvertisingToken.ps1 -AuthCode "YOUR_AUTH_CODE"
```

### Refresh-AdvertisingToken.ps1 (Optional)

Refreshes expired access tokens.

**Usage:**

```powershell
pwsh Refresh-AdvertisingToken.ps1
```

## Step-by-step workflow

Use the following steps to run a PowerShell script:

1. **Admin**: Run `Create-AdvertisingApp.ps1` → Save the Client ID, Secret, and Consent URL.
2. **User**: Open the consent URL → Authenticate → Copy the authorization code.
3. **Generate Tokens**: `pwsh Get-AdvertisingToken.ps1 -AuthCode "PASTE_CODE_HERE"`
4. **Call Microsoft Advertising API**

## Troubleshooting

Apply these troubleshooting suggestions for the following issues:

### Issue: AADSTS70011: Invalid scope

**Solution**: Ensure msads.manage is configured in Azure AD.

### Issue: Service principal not found

**Solution**: Run: `az ad sp create --id d42ffc93-c136-491d-b4fd-6f18168c68fd`

### Issue: Refresh token expired

**Solution**: Re-run `Get-AdvertisingToken.ps1` with a new auth code.

## Security notes

- Store `ads_config.json` securely (contains credentials).
- Rotate client secrets annually.

## Files

- Create-AdvertisingApp.ps1
- Get-AdvertisingToken.ps1
- Refresh-AdvertisingToken.ps1

### Create-AdvertisingApp.ps1 Implementation

```powershell
# Configuration
$appName = "MSAdsAPI_$(Get-Date -Format 'yyyyMMdd')"
$redirectUri = "https://login.microsoftonline.com/common/oauth2/nativeclient"

# 1. Azure Login
try {
    $tenantInfo = az account show | ConvertFrom-Json
    if (-not $tenantInfo) { throw "Not logged in" }
    Write-Host "Connected to tenant: $($tenantInfo.tenantId)" -ForegroundColor Cyan
} catch {
    Write-Host "Logging into Azure..." -ForegroundColor Yellow
    az login --use-device-code  # Works on all platforms
    $tenantInfo = az account show | ConvertFrom-Json
}

# 2. Create App Registration
$appCreateCommand = @(
    "az ad app create",
    "--display-name '$appName'",
    "--sign-in-audience AzureADandPersonalMicrosoftAccount",
    "--web-redirect-uris '$redirectUri'"
) -join " "

$app = Invoke-Expression $appCreateCommand | ConvertFrom-Json
$clientId = $app.appId

# 3. Configure Permissions
#to avoid invalid scope adding msads.manage scope
#check if service principal exists https://learn.microsoft.com/en-us/advertising/guides/handle-service-errors-exceptions?view=bingads-13#aadsts650052
az ad sp create --id d42ffc93-c136-491d-b4fd-6f18168c68fd
$manifest = @{
    requiredResourceAccess = @(
        @{
            resourceAppId = "d42ffc93-c136-491d-b4fd-6f18168c68fd"
            resourceAccess = @(
                @{
                    id = "5f3a9667-8a2a-4aa5-b3d2-5f3f1d79b5a4"
                    type = "Scope"
                }
            )
        }
    )
}

$tempFile = New-TemporaryFile
$manifest | ConvertTo-Json -Depth 5 | Out-File $tempFile -Force

# 4. Update App
$updateCommand = "az ad app update --id $clientId --app `"@$tempFile`""
Invoke-Expression $updateCommand
Remove-Item $tempFile

# 5. Create Client Secret
$secret = az ad app credential reset `
    --id $clientId `
    --years 1 `
    --display-name "PrimarySecret" `
    --query password `
    -o tsv

# 6. Generate Consent URL https://learn.microsoft.com/en-us/advertising/guides/authentication-oauth-consent?view=bingads-13
$consentUrl = "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?" +
              "client_id=$clientId" +
              "&response_type=code" +
              "&redirect_uri=$([System.Web.HttpUtility]::UrlEncode($redirectUri))" +
              "&scope=openid%20offline_access%20https%3A%2F%2Fads.microsoft.com%2Fmsads.manage" +
              "&prompt=select_account"

# 7. Save Config
[PSCustomObject]@{
    client_id = $clientId
    client_secret = $secret
    redirect_uri = $redirectUri
    isMSA = $true
} | ConvertTo-Json | Out-File "ads_config.json" -Force

Write-Host @"
=== SETUP COMPLETE ===

1. CONSENT URL (Please Open this in browser):
   $consentUrl

2. WHEN PROMPTED:
   - Sign in with your Microsoft Advertising credentials

3. AFTER CONSENT:
   - Copy the authorization code from URL
   - Run: ./Get-AdvertisingToken.ps1 -AuthCode <your_code>
"@ -ForegroundColor Green
```

### Get-AdvertisingToken.ps1 Implementation

```powershell
<#
.SYNOPSIS
    Gets tokens for Microsoft Advertising API (Personal Account)
#>

param(
    [Parameter(Mandatory=$true)]
    [string]$AuthCode,
    
    [string]$ConfigPath = "ads_config.json"
)

$config = Get-Content $ConfigPath | ConvertFrom-Json

# MSA Token Endpoint
$tokenUrl = "https://login.microsoftonline.com/common/oauth2/v2.0/token"
#https://learn.microsoft.com/en-us/advertising/guides/authentication-oauth-get-tokens?view=bingads-13
$body = @{
    client_id     = $config.client_id
    client_secret = $config.client_secret
    code          = $AuthCode
    redirect_uri  = $config.redirect_uri
    grant_type    = "authorization_code"
    scope         = "https://ads.microsoft.com/msads.manage"
}

try {
    $response = Invoke-RestMethod -Uri $tokenUrl -Method Post -Body $body
    
    # Save refresh token
    $config | Add-Member -NotePropertyName refresh_token -NotePropertyValue $response.refresh_token -Force
    $config | ConvertTo-Json | Out-File $ConfigPath -Force

    Write-Host "Access Token:" -ForegroundColor Green
    $response.access_token

    Write-Host "`nToken valid for $($response.expires_in) seconds" -ForegroundColor Cyan
} catch {
    Write-Host "ERROR: $($_.Exception.Message)" -ForegroundColor Red
    if ($_.Exception.Response) {
        $errorResponse = $_.Exception.Response.GetResponseStream()
        $reader = New-Object System.IO.StreamReader($errorResponse)
        $errorContent = $reader.ReadToEnd() | ConvertFrom-Json
        Write-Host "Details: $($errorContent.error_description)" -ForegroundColor Yellow
    }
}
```

### Refresh-AdvertisingToken.ps1 Implementation

```powershell
<#
.SYNOPSIS
    Refreshes expired access tokens
#>

param([string]$ConfigPath = "ads_config.json")

$config = Get-Content $ConfigPath | ConvertFrom-Json

$tokenParams = @{
    Uri = "https://login.microsoftonline.com/$($config.tenant_id)/oauth2/v2.0/token"
    Method = "POST"
    Body = @{
        client_id     = $config.client_id
        client_secret = $config.client_secret
        refresh_token = $config.refresh_token
        grant_type    = "refresh_token"
        scope         = "https://ads.microsoft.com/msads.manage"
    }
}

try {
    $response = Invoke-RestMethod @tokenParams
    $response | Select-Object access_token, expires_in | Format-List
    
    # Update refresh token
    $config.refresh_token = $response.refresh_token
    $config | ConvertTo-Json | Out-File $ConfigPath -Force
} catch {
    Write-Host "Refresh failed: $_" -ForegroundColor Red
}
```
