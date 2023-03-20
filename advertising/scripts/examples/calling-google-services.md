---
title: "Calling Google services"
description: "Shows how to call Google services such as Google Drive, Sheets, and Email."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Calling Google services

This is a simple example that shows how to use Google services such as Google Drive, Sheets, and Email.

The example:

- Reads a file from Google Drive, which contains a single bid multiplier value;
- Reads a spreadsheet containing keyword IDs, and uses the IDs to get the keywords and multiply the keywords' bids by the bid multiplier;
- Writes the new and old bid values back to the spreadsheet;
- Sends an email notification that the bids were updated.

Before using this example, see [Authenticating with Google services](authenticating-with-google-services.md) for options on getting an access token or refresh token to use in this example.

```javascript
function main() {

  // Set these fields based on the option you chose for getting an access token.
  const credentials = {
    accessToken: '',
    clientId: 'your-client-id',
    clientSecret: 'your-client-secret',
    refreshToken: 'your-refresh-token'
  };
 
  // To get a fileId or spreadsheetId, please see
  // https://developers.google.com/sheets/api/guides/concepts#spreadsheet_id.
 
  // The file must contain a single bid multiplier value (for example,1.1),
  // which is used to update keyword bids.
  const fileId = 'your-file-id';
 
  // The spreadsheet must contain 3 valid keyword IDs in cells A2, A3, and A4.
  const spreadsheetId = 'your-spreadsheet-id';

  // The email address to send a notification email to at the end of the script.
  const notificationEmail = 'your-notification-email';
 
  var driveApi = GoogleApis.createDriveService(credentials);
 
  // Read bid multiplier from the file.
  // Reference: https://developers.google.com/drive/api/v3/reference/files/export
  var bidMultiplier = driveApi.files.export({ fileId: fileId, mimeType: 'text/plain' }).body;
 
  Logger.log(`read bid multiplier ${bidMultiplier}`);
 
  var sheetsApi = GoogleApis.createSheetsService(credentials);
 
  // Read keyword IDs from the spreadsheet.
  // Reference: https://developers.google.com/sheets/api/reference/rest/v4/spreadsheets.values/get
  // A1 notation documentation: https://developers.google.com/sheets/api/guides/concepts#a1_notation
  var keywordIds = sheetsApi.spreadsheets.values.get({
    spreadsheetId: spreadsheetId,
    range: 'A2:A4'
  }).result.values.map(x => x[0]);
 
  Logger.log(`read ${keywordIds.length} keyword ids`);
 
  // Fetch keywords by IDs.
  var keywords = AdsApp.keywords().withIds(keywordIds).get();
 
  var oldBids = [];
  var newBids = [];
 
  // Update keyword bids, save the old and new bid values into arrays.
  while (keywords.hasNext()) {
    var kw = keywords.next();
 
    var oldBid = kw.bidding().getCpc();
 
    var newBid = oldBid * bidMultiplier;
 
    oldBids.push(oldBid);
    newBids.push(newBid);
 
    kw.bidding().setCpc(newBid);
  }
 
  // Write the old and new bid values back to the spreadsheet.
  // Reference: https://developers.google.com/sheets/api/reference/rest/v4/spreadsheets.values/batchUpdate
  var updateResponse = sheetsApi.spreadsheets.values.batchUpdate({ spreadsheetId: spreadsheetId }, {
    data: [
      { range: 'B2:B4', values: oldBids.map(x => [x]) },
      { range: 'C2:C4', values: newBids.map(x => [x]) }
    ],
    valueInputOption: 'USER_ENTERED'
  });
 
  Logger.log(`updated ${updateResponse.result.totalUpdatedCells} cells`);
 
  var gmailApi = GoogleApis.createGmailService(credentials);  
 
  var email = [
    `To: ${notificationEmail}`,
    'Subject: Google Services script',
    '',
    `You script ran successfully ✓ and updated ${updateResponse.result.totalUpdatedCells} cells.`
  ].join('\n');
 
  // Send the notification email.
  // Reference: https://developers.google.com/gmail/api/v1/reference/users/messages/send
  var sendResponse = gmailApi.users.messages.send({ userId: 'me' }, { raw: Base64.encode(email) });
 
  Logger.log(`sent email thread ${sendResponse.result.threadId}`);
}
 
var GoogleApis;
(function (GoogleApis) {
  function createSheetsService(credentials) {
    return createService("https://sheets.googleapis.com/$discovery/rest?version=v4", credentials);
  }
  GoogleApis.createSheetsService = createSheetsService;
 
  function createDriveService(credentials) {
    return createService("https://www.googleapis.com/discovery/v1/apis/drive/v3/rest", credentials);
  }
  GoogleApis.createDriveService = createDriveService;
 
  function createGmailService(credentials) {
    return createService("https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest", credentials);
  }
  GoogleApis.createGmailService = createGmailService;
 
  // Creation logic based on https://developers.google.com/discovery/v1/using#usage-simple
  function createService(url, credentials) {
    var content = UrlFetchApp.fetch(url).getContentText();
    var discovery = JSON.parse(content);
    var baseUrl = discovery['rootUrl'] + discovery['servicePath'];
    var accessToken = getAccessToken(credentials);
    var service = build(discovery, {}, baseUrl, accessToken);
    return service;
  }
 
  function createNewMethod(method, baseUrl, accessToken) {
    return (urlParams, body) => {
      var urlPath = method.path;
      var queryArguments = [];
      for (var name in urlParams) {
        var paramConfg = method.parameters[name];
        if (!paramConfg) {
          throw `Unexpected url parameter ${name}`;
        }
        switch (paramConfg.location) {
          case 'path':
            urlPath = urlPath.replace('{' + name + '}', urlParams[name]);
            break;
          case 'query':
            queryArguments.push(`${name}=${urlParams[name]}`);
            break;
          default:
            throw `Unknown location ${paramConfg.location} for url parameter ${name}`;
        }
      }
      var url = baseUrl + urlPath;
      if (queryArguments.length > 0) {
        url += '?' + queryArguments.join('&');
      }
      var httpResponse = UrlFetchApp.fetch(url, { contentType: 'application/json', method: method.httpMethod, payload: JSON.stringify(body), headers: { Authorization: `Bearer ${accessToken}` }, muteHttpExceptions: true });
      var responseContent = httpResponse.getContentText();
      var responseCode = httpResponse.getResponseCode();
      var parsedResult;
      try {
        parsedResult = JSON.parse(responseContent);
      } catch (e) {
        parsedResult = false;
      }
      var response = new Response(parsedResult, responseContent, responseCode);
      if (responseCode >= 200 && responseCode <= 299) {
        return response;
      }
      throw response;
    }
  }
 
  function Response(result, body, status) {
    this.result = result;
    this.body = body;
    this.status = status;
  }
  Response.prototype.toString = function () {
    return this.body;
  }
 
  function build(discovery, collection, baseUrl, accessToken) {
    for (var name in discovery.resources) {
      var resource = discovery.resources[name];
      collection[name] = build(resource, {}, baseUrl, accessToken);
    }
    for (var name in discovery.methods) {
      var method = discovery.methods[name];
      collection[name] = createNewMethod(method, baseUrl, accessToken);
    }
    return collection;
  }
 
  function getAccessToken(credentials) {
    if (credentials.accessToken) {
      return credentials.accessToken;
    }
    var tokenResponse = UrlFetchApp.fetch('https://www.googleapis.com/oauth2/v4/token', { method: 'post', contentType: 'application/x-www-form-urlencoded', muteHttpExceptions: true, payload: { client_id: credentials.clientId, client_secret: credentials.clientSecret, refresh_token: credentials.refreshToken, grant_type: 'refresh_token' } });    
    var responseCode = tokenResponse.getResponseCode(); 
    var responseText = tokenResponse.getContentText(); 
    if (responseCode >= 200 && responseCode <= 299) {
      var accessToken = JSON.parse(responseText)['access_token'];
      return accessToken;
    }    
    throw responseText;  
  }
})(GoogleApis || (GoogleApis = {}));
 
// Base64 implementation from https://github.com/AzureAD/microsoft-authentication-library-for-js/blob/master/lib/msal-core/src/Utils.ts
class Base64 {
  static encode(input) {
    const keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    let output = "";
    let chr1, chr2, chr3, enc1, enc2, enc3, enc4;
    var i = 0;
    input = this.utf8Encode(input);
    while (i < input.length) {
      chr1 = input.charCodeAt(i++);
      chr2 = input.charCodeAt(i++);
      chr3 = input.charCodeAt(i++);
      enc1 = chr1 >> 2;
      enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
      enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
      enc4 = chr3 & 63;
      if (isNaN(chr2)) {
        enc3 = enc4 = 64;
      }
      else if (isNaN(chr3)) {
        enc4 = 64;
      }
      output = output + keyStr.charAt(enc1) + keyStr.charAt(enc2) + keyStr.charAt(enc3) + keyStr.charAt(enc4);
    }
    return output.replace(/\+/g, "-").replace(/\//g, "_").replace(/=+$/, "");
  }
  static utf8Encode(input) {
    input = input.replace(/\r\n/g, "\n");
    var utftext = "";
    for (var n = 0; n < input.length; n++) {
      var c = input.charCodeAt(n);
      if (c < 128) {
        utftext += String.fromCharCode(c);
      }
      else if ((c > 127) && (c < 2048)) {
        utftext += String.fromCharCode((c >> 6) | 192);
        utftext += String.fromCharCode((c & 63) | 128);
      }
      else {
        utftext += String.fromCharCode((c >> 12) | 224);
        utftext += String.fromCharCode(((c >> 6) & 63) | 128);
        utftext += String.fromCharCode((c & 63) | 128);
      }
    }
    return utftext;
  }
}
```
