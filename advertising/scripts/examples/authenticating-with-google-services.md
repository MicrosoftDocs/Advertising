---
title: "Authenticating with Google services"
description: "Shows options for getting an access token to use with Google services."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Authenticating with Google services

If your script uses Google services, such as Google Drive, Sheets, and Mail, you need to get credentials. There are a few of options for getting the credentials:

- [Option 1](#option1) &mdash; Easy to follow and takes less time but you need to repeat it every hour when the access token expires.
- [Option 2](#option2) &mdash; A little more complicated but you only need to repeat it if the refresh token becomes invalid.
- [Option 3](#option3) &mdash; Also a little more complicated (uses the provided PowerShell script) but you only need to repeat it if the refresh token becomes invalid.

## <a name="option1"></a>Option 1 - Getting an access token from Google OAuth playground

1. Go to [Google OAuth playground](https://developers.google.com/oauthplayground)
2. In **Input your own scopes**, paste https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/gmail.send
3. Select **Authorize APIs** 
4. After the APIs are authorized, select **Exchange authorization code for tokens**
5. Copy the access_token's value from the response
6. In solutions like [Discovering disapproved ads](../solutions/get-disapproved-ads.md), which access Google services, set the credentials object's `accessToken` field to the access token copied in step 5.

> [!NOTE]
> Because the access token expires in 1 hour, you'll need to repeat these steps every hour.


## <a name="option2"></a>Option 2 - Getting a refresh token from Google OAuth playground


1. Go to Google developer console API [dashboard](https://console.developers.google.com/apis/dashboard)
2. Select **Create a project** to create a new project or select an existing project  
   1. If creating a new project, enter the name of your project in **Project Name**. For example, Scripts.
   2. Select **Create**
3. On **Dashboard**, select **ENABLE APIS AND SERVICES**
4. In the search box, enter *sheets* and select **Google Sheets API**. Then, select **ENABLE**
5. Go back to the dashboard (select **APIs & Services**) and repeat steps 3 and 4 for Google Drive API
6. Go back to the dashboard (select **APIs & Services**) and repeat steps 3 and 4 for Gmail API
7. On **Dashboard**, select **Credentials** in the left navigation pane and then select **CONFIGURE CONSENT SCREEN**. If asked to select a **User Type**, select **External**, then select **Create**
8. Enter the name of your application in the **Application name** field (for example, *Scripts client*) and enter your email in the fields that ask for it, then select **SAVE AND CONTINUE**
9. Select **ADD OR REMOVE SCOPES**, select *../auth/drive* and *../auth/gmail.send*, and then select **Update**
10. Select **SAVE AND CONTINUE**
11. Select **ADD USERS**, enter your Google email and select **ADD**
12. On **Dashboard**, select **Credentials** in the left navigation pane, then select **Create credentials** and select **Oauth client ID**
13. Select **Web application** Application type. Next, enter a name such as *Scripts web app* in the **Name** field. Then, add https://developers.google.com/oauthplayground to **Authorized redirect URIs**. Finally, select **Create**
14. Copy your client ID and client secret to use in steps 18, 19, and 24 and then select **OK**
15. Go to [Google OAuth playground](https://developers.google.com/oauthplayground)
16. Select the OAuth 2.0 Configuration icon (looks like a gear in upper right corner)
17. Check the **Use your own OAuth credentials** box
18. Paste your client ID into **OAuth Client ID**
19. Paste your client secret into **OAuth Client secret**
20. In **Input your own scopes**, paste https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/gmail.send
21. Select **Authorize APIs** and follow the prompts to provide consent  

> [!NOTE]
> When authorizing APIs in the playground, if you see a dialog that says, "This app isn't verified", select **Advanced** and then **Go to [app name] (unsafe)**.  

22. After the APIs are authorized, select **Exchange authorization code for tokens**
23. Copy the token from **Refresh token** to use in step 24
24. In solutions like [Discovering disapproved ads](../solutions/get-disapproved-ads.md), which access Google services, set the credentials object's `clientId`, `clientSecret`, and `refreshToken` fields to the values you received in steps 13 and 22. 

## <a name="option3"></a>Option 3 - Getting a refresh token using a PowerShell script

1. Go to Google developer console API [dashboard](https://console.developers.google.com/apis/dashboard)
2. Select **Create a project** to create a new project or select an existing project  
   1. If creating a new project, enter the name of your project in **Project Name**. For example, Scripts.
   2. Select **Create**
3. On **Dashboard**, select **ENABLE APIS AND SERVICES**
4. In the search box, enter *sheets* and select **Google Sheets API**. Then, select **ENABLE**
5. Go back to the dashboard (select **APIs & Services**) and repeat steps 3 and 4 for Google Drive API
6. Go back to the dashboard (select **APIs & Services**) and repeat steps 3 and 4 for Gmail API
7. On **Dashboard**, select **Credentials** in the left navigation pane and then select **CONFIGURE CONSENT SCREEN**. If asked to select a **User Type**, select **External**, then select **Create**
8. Enter the name of your application in the **Application name** field (for example, *Scripts client*) and enter your email in the fields that ask for it, then select **SAVE AND CONTINUE**
9. Select **ADD OR REMOVE SCOPES**, select *../auth/drive* and *../auth/gmail.send*, and then select **Update**
10. Select **SAVE AND CONTINUE**
11. Select **ADD USERS**, enter your Google email and select **ADD**
12. On **Dashboard**, select **Credentials** in the left navigation pane, then select **Create credentials** and select **Oauth client ID**
13. Select **Desktop app** application type, enter a name (for example, *Scripts client creds*), and select **Create**
14. Copy your client ID and client secret to use in steps 15 and 16 and then select **OK**
15. Create a PowerShell script to get user consent and a refresh token.  

  Getting an access token requires user consent unless you have a refresh token. But because Scripts doesn't support UI components, you'll need to get consent another way. This PowerShell provides an option for getting consent and a refresh token.  

  Open Notepad or your favorite editor and copy the PowerShell script to the editor. Set `$clientId` and `$clientSecret` to the client ID and secret you received when you registered your app (see step 13).  

  ```powershell
  $clientId = "your-client-id"
  $clientSecret = "your-client-secret"
  
  $scopes = "https://www.googleapis.com/auth/drive", "https://www.googleapis.com/auth/gmail.send"
  
  Start-Process "https://accounts.google.com/o/oauth2/v2/auth?client_id=$clientId&scope=$([string]::Join("%20", $scopes))&access_type=offline&response_type=code&redirect_uri=urn:ietf:wg:oauth:2.0:oob"    
   
  $code = Read-Host "Please enter the code"
     
  $response = Invoke-WebRequest https://www.googleapis.com/oauth2/v4/token -ContentType application/x-www-form-urlencoded -Method POST -Body "client_id=$clientid&client_secret=$clientSecret&redirect_uri=urn:ietf:wg:oauth:2.0:oob&code=$code&grant_type=authorization_code"
    
  Write-Output "Refresh token: " ($response.Content | ConvertFrom-Json).refresh_token 
  ```  

  Save the file and name it GetTokens.ps1 (you can name it anything you want but the extension must be .ps1).  

  Now open a console window. To open a console window on Microsoft Windows, enter the following Windows Run command (\<Windows button>+r):  

  ```powershell
  cmd.exe
  ```  

  At the command prompt, navigate to the folder where you saved GetTokens.ps1 and enter the following command:  

  ```powershell
  powershell.exe -File .\GetTokens.ps1
  ```  

  When the PowerShell script successfully runs, it starts a browser session where you enter your Google credentials. After consenting, the webpage contains the grant code (see Please copy this code...).  

  Copy the grant code and enter it in the console window at the prompt. The PowerShell script then returns a refresh token. Copy the refresh token. You should treat the refresh token like you would a password; if someone gets hold of it, they have access to your resources.  
  
16. In solutions like [Discovering disapproved ads](../solutions/get-disapproved-ads.md), which access Google services, set the credentials object's `clientId`, `clientSecret`, and `refreshToken` fields to the values you received in steps 13 and 14.  
