---
title: Make your first API call
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Make your first API call with an access token.
---
# Make your first API call

This article explains how to authenticate and make your first Microsoft Advertising API call. Microsoft Advertising now supports authenticating users with **either Microsoft OAuth (Azure identity)** or **Google OAuth 2.0**.

## Important

Microsoft Advertising supports the following authentication providers:

- **Microsoft OAuth (Azure identity)**  
  The existing and default authentication method.

- **Google OAuth 2.0**  
  A newly supported authentication flow for users who sign in with Google accounts.

Regardless of the authentication provider, all API requests must include a valid **Microsoft Advertising Developer Token**.

## Production Quick Start

Once you obtain an OAuth access token—whether from Microsoft identity or Google OAuth—you can make production calls to the Microsoft Advertising API.

The API request logic does **not** change based on the OAuth provider. The access token is always passed in the same request header.

- The access token is included in the `AuthenticationToken` header.
- The OAuth provider (Microsoft or Google) does not affect API behavior.

```text
# Pseudocode
# API call logic remains the same regardless of OAuth provider
```

## Make your first API call with an access token

After obtaining an access token from Microsoft OAuth or Google OAuth:

1. Store the access token and refresh token securely.
2. Include the access token in your API request along with:
    - `DeveloperToken`
    - `CustomerId` (if required)
    - `AccountId` (if required)
3. Call a Microsoft Advertising API operation (for example, `GetUser`).

The access token is always sent in the `AuthenticationToken` header, regardless of how it was obtained.

## Example: Make an API Call (PowerShell)

```powershell
$accessToken = "AccessTokenGoesHere"
$developerToken = "DeveloperTokenGoesHere"
$identityProvider = "Google"

[xml]$getUserRequest = '
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
                  xmlns:v13="https://bingads.microsoft.com/Customer/v13">
  <soapenv:Header>
    <v13:DeveloperToken>{0}</v13:DeveloperToken>
    <v13:AuthenticationToken>{1}</v13:AuthenticationToken>
    <v13:IdentityProvider>{2}</v13:IdentityProvider>
  </soapenv:Header>
  <soapenv:Body>
    <v13:GetUserRequest>
      <v13:UserId xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:nil="true" />
    </v13:GetUserRequest>
  </soapenv:Body>
</soapenv:Envelope>
' -f $developerToken, $accessToken, $identityProvider

$headers = @{
  "SOAPAction" = "GetUser"
}

$uri = "https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc"

$response = Invoke-WebRequest `
  -Uri $uri `
  -Method Post `
  -ContentType "text/xml" `
  -Body $getUserRequest `
  -Headers $headers

Write-Output $response.Content
```

### Run the Script

Save the file as `Get-User.ps1`, then run:

```text
powershell.exe -File .\Get-User.ps1
```

If the script runs successfully, it outputs the details of your Microsoft Advertising user, including customer roles. For more information, see **GetUser**.

## Sandbox Quick Start

Authentication in the sandbox environment works the same way as in production.

- The OAuth flow for obtaining tokens is identical.
- Sandbox calls use sandbox-specific endpoints and developer tokens.
- Both Microsoft OAuth and Google OAuth access tokens are supported.

## Sandbox Quick Start (Google OAuth Users)

Once you obtain an OAuth access token (from Microsoft or Google), you can use it to make sandbox API calls. The way you include the access token in requests is identical to production.

## Example: Make an API Call in Sandbox

```powershell
$accessToken = "AccessTokenGoesHere"
$developerToken = "BBD37VB98"
$identityProvider = "Google"

[xml]$getUserRequest = '
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
                  xmlns:v13="https://bingads.microsoft.com/Customer/v13">
  <soapenv:Header>
    <v13:DeveloperToken>{0}</v13:DeveloperToken>
    <v13:AuthenticationToken>{1}</v13:AuthenticationToken>
    <v13:IdentityProvider>{2}</v13:IdentityProvider>
  </soapenv:Header>
  <soapenv:Body>
    <v13:GetUserRequest>
      <v13:UserId xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:nil="true" />
    </v13:GetUserRequest>
  </soapenv:Body>
</soapenv:Envelope>
' -f $developerToken, $accessToken, $identityProvider

$headers = @{
  "SOAPAction" = "GetUser"
}

$uri = "https://clientcenter.api.sandbox.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc"

$response = Invoke-WebRequest `
  -Uri $uri `
  -Method Post `
  -ContentType "text/xml" `
  -Body $getUserRequest `
  -Headers $headers

Write-Output $response.Content
```

Save the script as `Get-User.ps1` and run it as shown above. When successful, the script outputs the sandbox user details, including assigned roles.

## See Also

[Get started](get-started.md)
