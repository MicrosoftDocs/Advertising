---
title: "Make your first API call"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Make your first API call with an access token.
---
# Make your first API call

[!INCLUDE[request-header](./includes/mfa-required.md)]

If you just want to get something working right away, follow these steps to get your Microsoft Advertising user information.

## <a name="quick-start-production"></a>Production Quick Start
To authenticate in the production environment you should first [register an application](authentication-oauth-register.md). Sign in with your Microsoft account credentials and grant [your app](https://learn.microsoft.com/entra/identity-platform/quickstart-register-app) consent to manage your Microsoft Advertising accounts.

1. Create a new file and paste into it the following script. Set `$clientId` to the Application Id of your registered app. If you registered a web application with client secret, then you'll also need to include `$client_secret=YourWebAppClientSecret` when requesting the access tokens.

> [!NOTE]
> Replace *your_client_id* below with the application (client) ID that the [Azure portal - App registrations](https://go.microsoft.com/fwlink/?linkid=2083908) portal assigned your app.

    ```powershell
    # Replace your_client_id with your registered application ID. 
    $clientId = "your_client_id"
    
    Start-Process "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=$clientId&scope=openid%20profile%20https://ads.microsoft.com/msads.manage%20offline_access&response_type=code&redirect_uri=https://login.microsoftonline.com/common/oauth2/nativeclient&state=ClientStateGoesHere&prompt=login"
    
    $code = Read-Host "Grant consent in the browser, and then enter the response URI here:"
    $code = $code -match 'code=(.*)\&'
    $code = $Matches[1]
    
    # Get the initial access and refresh tokens. 
    
    $response = Invoke-WebRequest https://login.microsoftonline.com/common/oauth2/v2.0/token -ContentType application/x-www-form-urlencoded -Method POST -Body "client_id=$clientId&scope=https://ads.microsoft.com/msads.manage%20offline_access&code=$code&grant_type=authorization_code&redirect_uri=https%3A%2F%2Flogin.microsoftonline.com%2Fcommon%2Foauth2%2Fnativeclient"
    
    $oauthTokens = ($response.Content | ConvertFrom-Json)  
    Write-Output "Access token: " $oauthTokens.access_token  
    Write-Output "Access token expires in: " $oauthTokens.expires_in  
    Write-Output "Refresh token: " $oauthTokens.refresh_token 
    
    # The access token will expire e.g., after one hour. 
    # Use the refresh token to get new access and refresh tokens. 
    
    $response = Invoke-WebRequest https://login.microsoftonline.com/common/oauth2/v2.0/token -ContentType application/x-www-form-urlencoded -Method POST -Body "client_id=$clientId&scope=https://ads.microsoft.com/msads.manage%20offline_access&code=$code&grant_type=refresh_token&refresh_token=$($oauthTokens.refresh_token)"
    
    $oauthTokens = ($response.Content | ConvertFrom-Json)  
    Write-Output "Access token: " $oauthTokens.access_token  
    Write-Output "Access token expires in: " $oauthTokens.expires_in  
    Write-Output "Refresh token: " $oauthTokens.refresh_token
    ```

    Save the file and name it `Get-Tokens-Production.ps1` (you can name it anything you want but the extension must be .ps1).

    To programmatically manage a Microsoft Advertising account, you must provide consent at least once through the web application consent flow. From then on you can use the latest refresh token to request new access and refresh tokens without any further user interaction.  
   
1. Now to run `Get-Tokens-Production.ps1` open a console window. At the command prompt, navigate to the folder where you saved `Get-Tokens-Production.ps1` and enter the following command:  
  
    ```console
    powershell.exe -File .\Get-Tokens-Production.ps1
    ```  
      
    When the PowerShell script successfully runs, it starts a browser session where you enter your Microsoft Advertising credentials. After consenting, the browser's address bar contains the grant code (see ?code=UseThisCode&...).  
      
    ```https
    https://login.microsoftonline.com/common/oauth2/nativeclient?code=M.R4_BAY.f202904c-2269-4daf-1e21-862ed4d49143
    ```  
      
    Copy the grant code (your own code, not the example M.R4_BAY.f202904c-2269-4daf-1e21-862ed4d49143) and enter it in the console window at the prompt. The PowerShell script then returns the access and refresh tokens. (The script makes a second call to Invoke-WebRequest as an example of how to refresh the tokens.) You should treat the refresh token like you would a password; if someone gets hold of it, they have access to your resources. The refresh token is long lived but it can become invalid. If you ever receive an invalid_grant error, your refresh token is no longer valid and you'll need to run the `Get-Tokens-Production.ps1` PowerShell script again to get user consent and a new refresh token. 
  
1. Create a new file and paste into it the following script. Set the `accessToken` to the value you received from `Get-Tokens-Production.ps1` and set `$developerToken` to the developer token you received by following steps outlined [here](get-started.md#get-developer-token). 
   
    ```powershell
    $accessToken = "AccessTokenGoesHere";
    $developerToken = "DeveloperTokenGoesHere";
    
    [xml]$getUserRequest = 
    '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v13="https://bingads.microsoft.com/Customer/v13">
    <soapenv:Header>
       <v13:DeveloperToken>{0}</v13:DeveloperToken>
       <v13:AuthenticationToken>{1}</v13:AuthenticationToken>
    </soapenv:Header>
    <soapenv:Body>
       <v13:GetUserRequest>
          <v13:UserId xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:nil="true"/>
       </v13:GetUserRequest>
    </soapenv:Body>
    </soapenv:Envelope>' -f $developerToken, $accessToken
    
    $headers = @{"SOAPAction" = "GetUser"}
    
    $uri = "https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc"
    $response = Invoke-WebRequest $uri -Method post -ContentType 'text/xml' -Body $getUserRequest -Headers $headers
    Write-Output $response.Content
    ```  

    Save the file and name it `Get-User.ps1` (you can name it anything you want but the extension must be .ps1).

1. Now to run `Get-User.ps1` open a console window. At the command prompt, navigate to the folder where you saved `Get-User.ps1` and enter the following command:  
  
    ```console
    powershell.exe -File .\Get-User.ps1
    ```  
      
    When the PowerShell script successfully runs it should print out the details of your Microsoft Advertising user, including customer roles. For details see [GetUser](../customer-management-service/getuser.md). 

## <a name="quick-start-sandbox"></a>Sandbox Quick Start
To authenticate in the sandbox environment you don't need to register an application. Just use the public "Tutorial Sample App" client ID i.e., **4c0b021c-00c3-4508-838f-d3127e8167ff**.  

1. Sign up for a [Microsoft Advertising](https://sandbox.bingads.microsoft.com/) sandbox account. The Microsoft account (MSA) email address must be outlook**-int**.com (for example, someone@outlook-int.com). For more details see [Sandbox](sandbox.md#initial-sign-up).  

1. Create a new file and paste into it the following script.  
  
    ```powershell
    # Replace the Tutorial Sample App ID with your registered application ID. 
    $clientId = "4c0b021c-00c3-4508-838f-d3127e8167ff"
    
    Start-Process "https://login.windows-ppe.net/consumers/oauth2/v2.0/authorize?client_id=$clientId&scope=openid%20profile%20https://api.ads.microsoft.com/msads.manage%20offline_access&response_type=code&redirect_uri=https://login.windows-ppe.net/common/oauth2/nativeclient&state=ClientStateGoesHere&prompt=login"
    
    $code = Read-Host "Grant consent in the browser, and then enter the response URI here:"
    $code = $code -match 'code=(.*)\&'
    $code = $Matches[1]
    
    # Get the initial access and refresh tokens. 
    
    $response = Invoke-WebRequest https://login.windows-ppe.net/consumers/oauth2/v2.0/token -ContentType application/x-www-form-urlencoded -Method POST -Body "client_id=$clientId&scope=https://api.ads.microsoft.com/msads.manage%20offline_access&code=$code&grant_type=authorization_code&redirect_uri=https://login.windows-ppe.net/common/oauth2/nativeclient"
    
    $oauthTokens = ($response.Content | ConvertFrom-Json)  
    Write-Output "Access token: " $oauthTokens.access_token  
    Write-Output "Access token expires in: " $oauthTokens.expires_in  
    Write-Output "Refresh token: " $oauthTokens.refresh_token 
    
    # The access token will expire e.g., after one hour. 
    # Use the refresh token to get new access and refresh tokens. 
    
    $response = Invoke-WebRequest https://login.windows-ppe.net/consumers/oauth2/v2.0/token -ContentType application/x-www-form-urlencoded -Method POST -Body "client_id=$clientId&scope=https://api.ads.microsoft.com/msads.manage%20offline_access&code=$code&grant_type=refresh_token&refresh_token=$($oauthTokens.refresh_token)"
    
    $oauthTokens = ($response.Content | ConvertFrom-Json)  
    Write-Output "Access token: " $oauthTokens.access_token  
    Write-Output "Access token expires in: " $oauthTokens.expires_in  
    Write-Output "Refresh token: " $oauthTokens.refresh_token 
    ```  

    Save the file and name it `Get-Tokens-Sandbox.ps1` (you can name it anything you want but the extension must be .ps1).

    A user must provide consent at least once through the web application consent flow. From then on you can use the latest refresh token to request new access and refresh tokens without any further user interaction.  
  
1. Now to run `Get-Tokens-Sandbox.ps1` open a console window. At the command prompt, navigate to the folder where you saved `Get-Tokens-Sandbox.ps1` and enter the following command:  
  
    ```console
    powershell.exe -File .\Get-Tokens-Sandbox.ps1
    ```  
  
    When the PowerShell script successfully runs, it starts a browser session where you enter your Microsoft Advertising credentials. After consenting, the browser's address bar contains the grant code (see ?code=UseThisCode&...).  
  
    ```https
    https://login.windows-ppe.net/common/oauth2/nativeclient?code=M.R0_CD1.132de532-5105-7550-b1fd-d37f9af2f009
    ```  
  
    Copy the grant code (your own code, not the example M.R0_CD1.132de532-5105-7550-b1fd-d37f9af2f009) and enter it in the console window at the prompt. The PowerShell script then returns the access and refresh tokens. (The script makes a second call to Invoke-WebRequest as an example of how to refresh the tokens.) You should treat the refresh token like you would a password; if someone gets hold of it, they have access to your resources. The refresh token is long lived but it can become invalid. If you ever receive an invalid_grant error, your refresh token is no longer valid and you'll need to run the `Get-Tokens-Sandbox.ps1` PowerShell script again to get user consent and a new refresh token.  
  
1. Create a new file and paste into it the following script. Set the `accessToken` to the value you received from `Get-Tokens-Sandbox.ps1`. 
   
    ```powershell
    $accessToken = "AccessTokenGoesHere";
    $developerToken = "BBD37VB98";
    
    [xml]$getUserRequest = 
    '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v13="https://bingads.microsoft.com/Customer/v13">
    <soapenv:Header>
       <v13:DeveloperToken>{0}</v13:DeveloperToken>
       <v13:AuthenticationToken>{1}</v13:AuthenticationToken>
    </soapenv:Header>
    <soapenv:Body>
       <v13:GetUserRequest>
          <v13:UserId xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:nil="true"/>
       </v13:GetUserRequest>
    </soapenv:Body>
    </soapenv:Envelope>' -f $developerToken, $accessToken
    
    $headers = @{"SOAPAction" = "GetUser"}
    
    $uri = "https://clientcenter.api.sandbox.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc"
    $response = Invoke-WebRequest $uri -Method post -ContentType 'text/xml' -Body $getUserRequest -Headers $headers
    Write-Output $response.Content
    ```  

    Save the file and name it `Get-User.ps1` (you can name it anything you want but the extension must be .ps1).

1. Now to run `Get-User.ps1` open a console window. At the command prompt, navigate to the folder where you saved `Get-User.ps1` and enter the following command:  
  
    ```console
    powershell.exe -File .\Get-User.ps1
    ```  
      
    When the PowerShell script successfully runs it should print out the details of your Microsoft Advertising user, including customer roles. For details see [GetUser](../customer-management-service/getuser.md). 


## See Also
[Get started](get-started.md)
