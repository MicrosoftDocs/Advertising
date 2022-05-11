---
title: "Using UrlFetchApp to fetch resources from the web"
description: "Use UrlFetchApp's methods to GET, POST, PUT, and DELETE web resources."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Fetching resources from the web

If you need to manage resources on the web, use the following methods of [UrlFetchApp](../reference/UrlFetchApp.md).

- [fetch(url)](../reference/UrlFetchApp.md#fetch-string-url-)
- [fetch(url, params)](../reference/UrlFetchApp.md#fetch-string-url-urlfetchparams-params-)

### Simple GET request

Use `fetch(url)` if you just need to get a web resource.

```javascript
    var response = UrlFetchApp.fetch('https://www.contoso.com');
```

The `fetch(url)` method returns an [HTTResponse](../reference/HTTPResponse.md) object, which has the methods for reading the response. Use the `getContentText` method for reading a text response and `getContent` for reading a binary response.

If the response body contains a JSON object, use `getContentText` to get the JSON object. To access the individual fields in the JSON object, use the `JSON.parse()` method to parse the response.

```javascript
    var stock = JSON.parse(response.getContentText());
    Logger.log(`stock symbol: ${stock["symbol"]}`);
    Logger.log(`company: ${stock["companyName"]}`);
    Logger.log(`close price: ${stock["close"]}`);
```

### Handling HTTP errors

If the request fails (for example, with 400 Bad request), the service stops processing your script and writes an error message to the log. The message includes the request's HTTP status code but not the error message that might be in the body of the response. 

If you need to get the response body, call the `fetch(url, params)` method instead and set the muteHttpExceptions parameter to **true**. Setting muteHttpExceptions to **true** always returns control to your script. You'll then need to call the `getResponseCode()` method to determine the success or failure of the request and act accordingly.

```javascript
    var response = UrlFetchApp.fetch('https://contoso.com', { muteHttpExceptions: true });    

    if (200 == response.getResponseCode())
    {
        Logger.log('HTTP request succeeded');
    }
    else
    {
        Logger.log('HTTP request failed');
    }
```

### Adding, updating, or deleting a web resource

If you need to add, update, or delete a web resource, use the [fetch(url, params)](../reference/UrlFetchApp.md#fetch-string-url-urlfetchparams-params-) method. This method lets you specify the HTTP verb to use, the Content-Type header, any other headers your request needs, and the request's payload. For details about these parameters, see the [UrlFetchParams](../reference/UrlFetchParams.md) object.

The following example gets a resource that requires an OAuth access token. Because GET is the fetch method's default HTTP verb, the only parameter you need to specify is the `headers` parameter.


```javascript
    var token = "<the oauth token goes here>";
    var response = UrlFetchApp.fetch('https://contoso.com', { headers: { Authorization: `Bearer ${token}` } });    
    var jsonObject = JSON.parse(response.getContentText());    
```

This example sends a POST request with a JSON payload. Because the payload is a JSON object, the example sets the `contentType` parameter to *application/json*.

```javascript
    var myData = {
        'id' : '123abc',
        'name' : 'leg',
        'color' : 'red'
    };

    var options = {
        'method' : 'post',
        'contentType' : 'application/json',
        'payload' : JSON.stringify(myData)
    };

    var response = UrlFetchApp.fetch('https://contoso.com', options);    
    var jsonObject = JSON.parse(response.getContentText());    
```

## Using UrlFetchApp to get a data file or CSV file from OneDrive.

To get a file from OneDrive (https://onedrive.live.com), use Microsoft Graph. Accessing a OneDrive file requires an OAuth access token. And getting an access token requires user consent unless you have a refresh token. But because Scripts doesn't support UI components, you'll need to get consent another way. If you don't already have another way to get a refresh token, here's a PowerShell script you can run to get consent and the refresh token.


```powershell
$clientId = "your application ID goes here"
 
Start-Process "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=$clientId&scope=files.read offline_access&response_type=code&redirect_uri=https://login.live.com/oauth20_desktop.srf"
 
$code = Read-Host "Please enter the code"
 
$response = Invoke-WebRequest https://login.microsoftonline.com/common/oauth2/v2.0/token -ContentType application/x-www-form-urlencoded -Method POST -Body "client_id=$clientid&redirect_uri=https://login.live.com/oauth20_desktop.srf&code=$code&grant_type=authorization_code"
 
Write-Output "Refresh token: " ($response.Content | ConvertFrom-Json).refresh_token 
```

Before you can run the PowerShell script, you need to follow these steps to get a client ID.

1. Go to [https://apps.dev.microsoft.com](https://apps.dev.microsoft.com) and click **Add an app**.  
2. Enter an app name like *Scripts client*. (Don't check Guided setup.)
3. Click **Create** and note your application ID (client ID).  
4. Click **Add Platform** and then **Native Application**.
5. Under **Microsoft Graph delegated permissions**, click **Add** and select Files.Read and offline_access.  
6. Click **Save**.  

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
-->

If you get an execution policy error, you'll need to change your execution policy. For execution policy options, see [About Execution Policies](/powershell/module/microsoft.powershell.core/about/about_execution_policies). To change the execution policy for a session, enter the following command: 

```
powershell.exe -ExecutionPolicy Bypass -File .\GetTokens.ps1
```

When the PowerShell script successfully runs, it starts a browser session where you enter your Microsoft account (MSA) credentials (the credentials must have access to your OneDrive files). After consenting, the browser's address bar contains the grant code (see ?code={copy this code}).

```
https://login.live.com/oauth20_desktop.srf?code=M7ab570e5-a1c0-32e5-a946-e4490c822954&lc=1033
```

Copy the grant code (M7ab570e5-a1c0-32e5-a946-e4490c822954) and enter it in the console window at the prompt. The PowerShell script then returns a refresh token. Use the refresh token in your script to get the access token. You should treat the refresh token like you would a password; if someone gets hold of it, they have access to your OneDrive data.

The refresh token is long lived but it can become invalid. If you receive an invalid_grant error, your refresh token is no longer valid and you'll need to run the PowerShell script again to get consent and a new refresh token.


### Example that downloads a CSV file

After getting the refresh token, the following example shows how to 1) use the refresh token to get an access token, and 2) call Microsoft Graph to get a download URL that you use to download the CSV file. Replace {yourclientid} with your registered app's application ID, and replace {yourrefreshtoken} with your refresh token.

```javascript
function main() {
    var clientId = "{yourclientid}";
    var refreshToken = "{yourrefreshtoken}";

    var options = {
        'method' : 'post',
        'contentType' : 'application/x-www-form-urlencoded',
        'payload' : `client_id=${clientId}&redirect_uri=https://login.live.com/oauth20_desktop.srf&refresh_token=${refreshToken}&grant_type=refresh_token`
    };
    
    // Use the refresh token to get the access token.

    var response = UrlFetchApp.fetch('https://login.microsoftonline.com/common/oauth2/v2.0/token', options);
 
    var tokens = JSON.parse(response.getContentText());

    // Get the contents of the CSV file from OneDrive passing the access token in the Authorization header. 
    // Replace the path and file name (/me/drive/root/children/bids.csv) with your path and file name.

    response = UrlFetchApp.fetch('https://graph.microsoft.com/v1.0/me/drive/root/children/bids.csv/content', { headers: { Authorization: `Bearer ${tokens['access_token']}` } });    
 
    // Read and parse the contents of the file. The parseCSV method is a placeholder for 
    // whichever method you provide to parse the file.

    var file = response.getContentText();
    var data = parseCSV(file);
}
```

### Parse the CSV file

There's no built-in CSV parsing tool, so you'll need to write your own or find one online. For example, a quick search online found [this](https://stackoverflow.com/a/14991797) one on Stack Overflow. If you find one online make sure it has no use restrictions. 


## Accessing Google services

For information about using [UrlFetchApp](../reference/UrlFetchApp.md) to access Google services, see [Calling Google services](../examples/calling-google-services.md).
