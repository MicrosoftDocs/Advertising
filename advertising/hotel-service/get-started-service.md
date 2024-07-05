---
title: "Get Started using the Hotel API from a service"
description: Provides details about getting credentials from a service.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Using the Hotel API from a service

[!INCLUDE[coming-soon](../hotel-ads/includes/property-center-coming-soon.md)]

Calling the Hotel API requires an access token but getting an access token requires user consent unless you have a refresh token. To get a refresh token, you can [write a simple console app](../hotel-service/code-example-oauth.md) or you can use this PowerShell script.

```powershell
$clientId = "your application ID goes here"
 
Start-Process "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=$clientId&scope=https://ads.microsoft.com/ads.manage%20offline_access&response_type=code&redirect_uri=https://login.microsoftonline.com/common/oauth2/nativeclient"
 
$code = Read-Host "Please enter the code"
 
$response = Invoke-WebRequest https://login.microsoftonline.com/common/oauth2/v2.0/token -ContentType application/x-www-form-urlencoded -Method POST -Body "client_id=$clientid&redirect_uri=https://login.microsoftonline.com/common/oauth2/nativeclient&code=$code&grant_type=authorization_code"
 
Write-Output "Refresh token: " ($response.Content | ConvertFrom-Json).refresh_token 
```

Before you can run the PowerShell script, you need to follow these steps to get a client ID.

1. Go to [Microsoft Azure - App registration](https://go.microsoft.com/fwlink/?linkid=2083908) and click **New registration**  
2. Enter an app name like *Hotels client* 
3. For **Supported account types**, select **Accounts in any organizational directory (Any Azure AD directory - Multitenant) and personal Microsoft accounts (e.g. Skype, Xbox)** 
4. For **Redirect URI**, select **Public client/native (mobile & desktop)** and then set the redirect URI to https:\//login.microsoftonline.com/common/oauth2/nativeclient
5. Click **Register** and note your **Application (client) ID**  

Open Notepad or your favorite editor and copy the PowerShell script to the editor. Set `$clientID` to the application ID you received when you registered your app.

```powershell
$clientId = "abc123-4d9e-44f1-837d-a7244af50027"
```

Save the file and name it GetTokens.ps1 (you can name it anything you want but the extension must be .ps1).

Now open a console window. To open a console window on Microsoft Windows, enter the following Windows Run command (\<Windows button>+r): 

```
cmd.exe
```

At the command prompt, navigate to the folder where you saved GetTokens.ps1. Then, enter the following command.

```
powershell.exe -File .\GetTokens.ps1
```

<!--
can't get either link to work; both get mangled.
[About Execution Policies](https:/go.microsoft.com/fwlink/?LinkID=135170)
<a href="https:/go.microsoft.com/fwlink/?LinkID=135170" data-raw-source="[About Execution Policies](https:/go.microsoft.com/fwlink/?LinkID=135170)">About Execution Policies</a>
/powershell/module/microsoft.powershell.core/about/about_execution_policies?view=powershell-5.1
-->

If you get an execution policy error, you'll need to change your execution policy. For execution policy options, see [About Execution Policies](https://go.microsoft.com/fwlink/?LinkID=135170). To change the execution policy for a session, enter the following command: 

```
powershell.exe -ExecutionPolicy Bypass -File .\GetTokens.ps1
```

When the PowerShell script successfully runs, it starts a browser session where you enter your Microsoft account (MSA) credentials (the credentials you specify must have access to your hotel data). After consenting, the browser's address bar contains the grant code (see ?code={copy this code}).

```
https://login.live.com/oauth20_desktop.srf?code=M7ab570e5-a1c0-32e5-a946-e4490c822954&lc=1033
```

Copy the grant code (M7ab570e5-a1c0-32e5-a946-e4490c822954) and enter it in the console window at the prompt. The PowerShell script then returns a refresh token. Use the refresh token in your service to get the access token. You should treat the refresh token like you would a password; if someone gets hold of it, they have access to your hotel data.

The refresh token is long lived but it can become invalid. If you receive an invalid_grant error, your refresh token is no longer valid and you'll need to run the PowerShell script again to get consent and a new refresh token.


## Now that you have a refresh token

Before using the refresh token, you need to register your service to get a client ID. 

1. Go to [Microsoft Azure - App registration](https://go.microsoft.com/fwlink/?linkid=2083908) and click **New registration**  
2. Enter an app name for your service 
3. For **Supported account types**, select **Accounts in any organizational directory (Any Azure AD directory - Multitenant) and personal Microsoft accounts (e.g. Skype, Xbox)** 
4. Provide a redirect URI as appropriate
5. Click **Register** and note your service's **Application (client) ID**  


Your service should follow these basic steps to get the access token that you set the Authorization header to.

- Get the refresh token from secured storage
- Send an HTTP POST request to `https://login.microsoftonline.com/common/oauth2/v2.0/token`  
  - The following shows the body of the POST (the parameters are separated for readability):  
     client_id=\<yourclientid>  
&grant_type=refresh_token  
&redirect_uri=\<urlencodedredirecturifromstep4>  
&refresh_token=\<yourrefreshtoken> 
- Get the access token, refresh token, and expiration from the response
- Set a timer that expires just before the access token expires
- Set the Authorization header to the access token
- Store the new refresh token in secured storage
- When the expiration timer expires, repeat the process

The following shows an example POST using a refresh token for a desktop app.

```
POST https://login.microsoftonline.com/common/oauth2/v2.0/token HTTP/1.1
Content-Type: application/x-www-form-urlencoded

client_id=2a6e519f-078e-45a5-9dfc-28d651f7fe96&redirect_uri=https://login.microsoftonline.com/common/oauth2/nativeclient&grant_type=refresh_token&refresh_token=MCRY2sZiCLfI9OJUpW*6I...
``` 

Depending on your client app, you may also need to include `&client_secret` in your POST. 

You should only get a new access token just before the current token expires. Do not get a new access token for each call.
