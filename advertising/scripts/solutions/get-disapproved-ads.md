---
title: "Discovering disapproved ads"
description: "Shows how to discover disapproved ads for one or more accounts."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Discovering disapproved ads

This solution shows how to discover disapproved ads for one or more accounts. The following is the high-level flow of the script. For more details, read the inline comments.

- Reads a file from Google Drive. The file contains a list of objects. Each object contains an account ID and a time stamp of when the account was last checked for disapproved ads. The first time the script runs the file shouldn't exist. If the file doesn't exist, the script builds the complete list of accounts that you have access to. Note that the script won't pick up any new accounts that you add after the file is built. If you add accounts, you should delete the file, so it generates a new list of accounts.
- Sorts the account list so the accounts that haven't been checked or are the oldest show up first.
- Gets up to the first 50 account IDs from the list and calls the selector's [executeInParallel](../reference/BingAdsAccountSelector.md) method. The method executes in parallel the findDisapprovedAds function for each account. This function returns an object that contains the account's information and the list of disapproved ads, if any.
- Executes the reportResults function after all the findDisapprovedAds function calls complete. This function creates a spreadsheet and uses Google Sheets to create a sheet for each account. If the account contains disapproved ads, it writes the ads to the sheet.
- Uses Google Mail to send an email notification to the specified recipients. The email indicates if an account contains disapproved ads and provides a link to the sheet where they can see the details.
- Updates the lastChecked field for each account and saves the file. The next time the script runs, it sorts the list of accounts by the lastChecked time stamp. This means that all accounts that haven't been processed or are the oldest will be first in the list. This script will need to run one or more times depending on the number of accounts you have.

Before using this example, see [Authenticating with Google services](../examples/authenticating-with-google-services.md) for options on getting an access token to use in this solution.

[!INCLUDE[replace-main](../includes/replace-main.md)]

```javascript
// Update the list with email addresses of the recipients that
// you want notifications sent to. The addresses may use any email
// provider (not limited to gmail.com). The list of addresses is comma delimited.
// For example, ['someone1@example.com','someone2@example.com'].
const NOTIFY = ['someone@example.com'];

// If you chose option 1 in Getting an access token, set accessToken to 
// the token you received from Google OAuth playground. Otherwise, if you
// chose option 2, set clientId, clientSecret, and refreshToken.
const credentials = {
    accessToken: '',
    clientId: '',
    clientSecret: '',
    refreshToken: ''
};
const SCRIPT_NAME = 'Disapproved Ads Checker';
const ACCOUNTS_FILE_NAME = 'BingAds-Scripts-DisapprovedAds-AccountList.json';
const SPREADSHEET_PREFIX = 'BingAds-DisapprovedAds';
const ACCOUNT_BATCH_SIZE = 50;
const DATETIME_CULTURE = 'en-US';
const DATETIME_TIMEZONE = 'America/Los_Angeles';
 
function main() {
    // If it's the first time the script has run, the function creates
    // the JSON file. The file contains a list of JSON objects.
    // Each object contains an account ID field (id) and a time
    // stamp field (lastChecked) when the account was last checked
    // for disapproved ads.

    createFileIfNotExists(ACCOUNTS_FILE_NAME, false);
 
    // Load the list of objects from the JSON file or if the file is empty,
    // set the list to empty.

    const accountsList = loadObject(ACCOUNTS_FILE_NAME) || [];
 
    // If the JSON file is empty, get a list of accounts the user
    // has access to. For each account, create an object that contains
    // the id field and lastChecked field. Then add it to accountsList.

    // Note that if the file exists, accountsList will not include  
    // new accounts that were added since the script last ran. To ensure
    // that the list contains all accounts, consider deleting the file
    // periodically or after you add an account.

    if (accountsList.length === 0) {
        const accounts = AccountsApp.accounts().get();
 
        while (accounts.hasNext()) {
            const account = accounts.next();
 
            accountsList.push({
                id: account.getAccountId(),
                lastChecked: ''
            });
        }
    }
 
    // Sort the list by lastChecked. This ensures that unprocessed accounts 
    // (i.e., lastChecked: '') in accountsList are first in the list. If all 
    // accounts have been processed, the accounts with the oldest lastChecked 
    // time stamp are first.

    accountsList.sort((a, b) => a.lastChecked.localeCompare(b.lastChecked));
 
    // Save the list of JSON objects back to the file. The file is opened
    // again in reportResults() to update the lastChecked field with
    // the time stamp of when the account was processed.

    saveObject(accountsList, ACCOUNTS_FILE_NAME);
 
    // Get a maximum of the first 50 accounts (ACCOUNT_BATCH_SIZE) from accountsList.
    // Each time the script runs, it grabs the next 50 accounts until eventually
    // The script processes all the accounts.

    const toCheck = accountsList.slice(0, ACCOUNT_BATCH_SIZE).map(x => x.id);
 
    Logger.log('Checking the following accounts: ' + JSON.stringify(toCheck));
 
    // Use the executeInParallel method to execute the findDisapprovedAds function
    // for all 50 accounts in parallel. When findDisapprovedAds finishes with all
    // 50 accounts, Scripts calls the reportResults function. 

    AccountsApp.accounts().withIds(toCheck).executeInParallel('findDisapprovedAds', 'reportResults');
}

// The script executes this function in parallel for each account that the 
// BingAdsAccountSelector returns (see the executeInParallel call in main()).
// Each account in the selector becomes the current account for each instance
// of findDisapprovedAds().
 
function findDisapprovedAds() {
    const currentAccountInfo = `${AdsApp.currentAccount().getName()} ${AdsApp.currentAccount().getAccountId()} (${AdsApp.currentAccount().getAccountNumber()})`;
 
    Logger.log(`Processing account: ${currentAccountInfo}`);
 
    // Gets the list of disapproved ads in the account.

    const ads = AdsApp.ads().withCondition('CampaignStatus = ENABLED')
        .withCondition('AdGroupStatus = ENABLED')
        .withCondition('Status = ENABLED')
        .withCondition('CombinedApprovalStatus = DISAPPROVED')
        .get();    
 
    // Contains a list of ad fields.

    const columns = [
        { name: 'Campaign', func: ad => ad.getCampaign().getName() },
        { name: 'Campaign Id', func: ad => ad.getCampaign().getId() },
        { name: 'AdGroup', func: ad => ad.getAdGroup().getName() },
        { name: 'AdGroup Id', func: ad => ad.getAdGroup().getId() },
        { name: 'Id', func: ad => ad.getId() },
        { name: 'Type', func: ad => ad.getType() },
        { name: 'Title', func: ad => ad.getHeadline() },
        { name: 'Title 1', func: ad => ad.isType().expandedTextAd() ? ad.asType().expandedTextAd().getHeadlinePart1() : null },
        { name: 'Title 2', func: ad => ad.isType().expandedTextAd() ? ad.asType().expandedTextAd().getHeadlinePart2() : null },
        { name: 'Text', func: ad => ad.getDescription() },
        { name: 'Display Url', func: ad => ad.getDisplayUrl() },
        { name: 'Destination Url', func: ad => ad.getDestinationUrl() },
        { name: 'Final Url', func: ad => ad.urls().getFinalUrl() },
        { name: 'Path 1', func: ad => ad.isType().expandedTextAd() ? ad.asType().expandedTextAd().getPath1() : null },
        { name: 'Path 2', func: ad => ad.isType().expandedTextAd() ? ad.asType().expandedTextAd().getPath2() : null },
    ];
 
    const results = [];
 
    // For each disapproved ad, create a result object, which is
    // a dictionary with the above column names as keys.

    while (ads.hasNext()) {
        const ad = ads.next();
 
        // Creates the result object and executes the function in 'columns' 
        // to get the field's value.

        const adResult = columns.reduce((temp, column) => { temp[column.name] = column.func(ad); return temp }, {});
 
        // Adds the field (key/value) to the dictionary.

        results.push(adResult);
    }
 
    Logger.log(`Found ${results.length} disapproved ads for account ${currentAccountInfo}`);
 
    const currentAccount = AdsApp.currentAccount();
 
    // Create an object that identifies the account and its
    // list of disapproved ads, if any. Convert it to a string that's 
    // past to the reportResults function when all instances of
    // this function finish.
    // Note that you could refactor the script to return only accounts
    // that have disapproved ads.
 
    return JSON.stringify({
        customerId: currentAccount.getCustomerId(),        
        accountId: currentAccount.getAccountId(),
        accountNumber: currentAccount.getAccountNumber(),
        accountName: currentAccount.getName(),
        disapprovedAdsCount: results.length,
        disapprovedAds: { rows: results, headers: columns.map(x => x.name) }
    });
}

// Scripts calls this function for each account when the findDisapprovedAds
// finishes processing all accounts.

// This function creates a spreadsheet that contains a sheet for each
// account. It then sends an email notification to the list of 
// recipients in 'NOTIFY'.
  
function reportResults(results) {
    Logger.log('Reporting results');    
 
    const sheetResults = [];
 
    // Create a sheet object for each account in the list of results.

    for (const result of results) {
        if (!result.getReturnValue()) {
            Logger.log(`Got an error in result: ${result.getError()}`);
 
            continue;
        }
 
        const accountResult = JSON.parse(result.getReturnValue());
 
        const sheetName = `${accountResult.accountId} (${accountResult.accountNumber})`;
 
        sheetResults.push({ accountResult: accountResult, sheetName: sheetName });
    }
 
    // Gets a time stamp. The .replace function removes the u2003 character that 
    // toLocaleString() adds to the date string.

    const dateTimeStr = new Date().toLocaleString(DATETIME_CULTURE, { timeZone: DATETIME_TIMEZONE }).replace(/\u200e/g, '');
 
    // Create the spreadsheet file.

    const spreadsheetName = `${SPREADSHEET_PREFIX} ${dateTimeStr}`;
 
    const spreadsheetId = createFileIfNotExists(spreadsheetName, true);
 
    // Adds a sheet for each account to the spreadsheet.

    const createSheetsResponse = createSheets(spreadsheetId, sheetResults.map(x => x.sheetName));
 
    // Get the original accounts list, so the script can
    // update the lastChecked time stamp.

    const accountsList = loadObject(ACCOUNTS_FILE_NAME);
 
    const accountsById = accountsList.reduce((map, acc) => (map[acc.id] = acc, map), {});
 
    const sheetsByName = createSheetsResponse.updatedSpreadsheet.sheets.reduce((map, sheet) => (map[sheet.properties.title] = sheet, map), {});

    // Gets a link to the file to include in the email notification.
 
    const fileUrl = shareFileWithLink(spreadsheetId);
 
    const spreadsheetRows = [];
 
    const summaryEmailData = [];

    // Builds the sheet information. 

    for (const sheetResult of sheetResults) {        
        const accountResult = sheetResult.accountResult;
 
        const sheetRows = [accountResult.disapprovedAds.headers];
 
        for (const row of accountResult.disapprovedAds.rows) {
            const rowValues = accountResult.disapprovedAds.headers.map(x => row[x]);
 
            sheetRows.push(rowValues);
        }
 
        const sheetId = sheetsByName[sheetResult.sheetName].properties.sheetId;
 
        spreadsheetRows.push({ sheetId: sheetId, rows: sheetRows });        
 
        const sheetUrl = `${fileUrl}#gid=${sheetId}`;
 
        summaryEmailData.push({
            customerId: accountResult.customerId,
            accountId: accountResult.accountId,
            accountNumber: accountResult.accountNumber,
            accountName: accountResult.accountName,
            disapprovedAdsCount: accountResult.disapprovedAdsCount,
            sheetUrl: sheetUrl
        });
 
        accountsById[accountResult.accountId].lastChecked = dateTimeStr;
    }
 
    writeRowsToSpreadsheet(spreadsheetRows, spreadsheetId);
 
    if (summaryEmailData.length > 0) {
        sendSummaryEmail(summaryEmailData);
    }
 
    saveObject(accountsList, ACCOUNTS_FILE_NAME);
}
 
// Send an email to recipients with a list of the accounts and any
// disapproved ads. The recipient can click the embedded 
// link to access the spreadsheet that contains details about
// the disapproved ads.

function sendSummaryEmail(summaryEmailData) {
    const subject = `${SCRIPT_NAME} Summary Results`;
    const body = subject;
 
    const dateTimeStr = new Date().toLocaleString(DATETIME_CULTURE, { timeZone: DATETIME_TIMEZONE });
 
    const messageHtml =
`<html>
    <body>
    ${subject}
    <br/ ><br/ >
    <table border="1" width="95%" style="border-collapse:collapse;">
        <tr>
            <th align="left">Customer Id</th>
            <th align="left">Account Id</th>
            <th align="left">Account Number</th>
            <th align="left">Account Name</th>
            <th align="center">Disapproved Ads Found</th>
            <th align="center">Full Report</th>
        </tr>
        ${summaryEmailData.map(row =>
        `<tr>
            <td align="left">${row.customerId}</td>
            <td align="left">${row.accountId}</td>
            <td align="left">${row.accountNumber}</td>
            <td align="left">${row.accountName}</td>
            <td align="center">${row.disapprovedAdsCount}</td>
            <td align="left"><a href="${row.sheetUrl}">Show Details</a></td>
        </tr>`).join('')}
    </table>
    <br/ >
    ${dateTimeStr}. Completed. ${summaryEmailData.length} accounts checked.        
    </body>
</html>`;
 
    const gmailApi = getGmailApi();
 
    for (const i in NOTIFY) {
        const email =
`To: ${NOTIFY[i]}
Subject: ${subject}
Content-Type: text/html; charset="utf-8"

${messageHtml}`;
 
        gmailApi.users.messages.send({ userId: 'me' }, { raw: Base64.encode(email) });
    }
}

// Calls to get Google services.
 
const getSheetsApi = (() => {
    let sheetsApi;
    return () => sheetsApi || (sheetsApi = GoogleApis.createSheetsService(credentials));
})();
 
const getDriveApi = (() => {
    let driveApi;
    return () => driveApi || (driveApi = GoogleApis.createDriveService(credentials));
})();
 
const getGmailApi = (() => {
    let gmailApi;
    return () => gmailApi || (gmailApi = GoogleApis.createGmailService(credentials));
})();

// Creates each sheet in the spreadsheet.
 
function createSheets(spreadsheetId, sheetNames) {
    const requests = sheetNames.map(x => ({ addSheet: { properties: { title: x } } }));
 
    var response = getSheetsApi().spreadsheets.batchUpdate({ spreadsheetId: spreadsheetId }, {
        requests: requests,
        includeSpreadsheetInResponse: true
    }).result;
 
    return response;
}

// Writes the disapproved ads to each sheet.
 
function writeRowsToSpreadsheet(spreadsheetRows, spreadsheetId) {
    const requests = spreadsheetRows.map(sheetRows => ({ 
        appendCells: { 
            sheetId: sheetRows.sheetId, 
            rows: sheetRows.rows.map(row => ({
                values: row.map(colunmValue => ({
                    userEnteredValue: { stringValue: colunmValue }
                }))
            })),
            fields: '*'  
        } 
    }));
 
    getSheetsApi().spreadsheets.batchUpdate({ spreadsheetId: spreadsheetId }, {
        requests: requests,
        includeSpreadsheetInResponse: false
    });
}
 
// Returns a link to the spreadsheet. The script includes 
// the link in the email notification.

function shareFileWithLink(fileId) {
    // Set up permissions, so the recipient doesn't have to
    // sign in.

    getDriveApi().permissions.create({ fileId: fileId }, {
        type: 'anyone',
        role: 'reader',
        allowFileDiscovery: false
    });
 
    const fileResponse = getDriveApi().files.get({ fileId: fileId, fields: 'webViewLink' }).result;
 
    return fileResponse.webViewLink;
}
 
function findFileId(fileName) {
    const req = escape(`name = '${fileName}'`);
 
    const searchResult = getDriveApi().files.list({ q: req }).result;
 
    if (searchResult.files.length > 0) {
        return searchResult.files[0].id;
    }
 
    return null;
}
 
function createFileIfNotExists(fileName, isSpreadsheet) {
    const existingFileId = findFileId(fileName);
 
    if (existingFileId) {
        return existingFileId;
    }
 
    const createResult = getDriveApi().files.create({}, {
        name: fileName,
        mimeType: isSpreadsheet ? 'application/vnd.google-apps.spreadsheet' : 'application/vnd.google-apps.document'
    }).result;
 
    return createResult.id;
}
 
function saveObject(obj, fileName) {
    const fileId = createFileIfNotExists(fileName, false);
 
    getDriveApi().files.update({ fileId: fileId }, JSON.stringify(obj), { uploadType: 'simple', contentType: 'text/plain' });
}
 
function loadObject(fileName) {
    const fileId = findFileId(fileName);
 
    if (!fileId) {
        throw new Error(`File ${fileName} not found`);
    }
 
    const fileData = getDriveApi().files.export({ fileId: fileId, mimeType: 'text/plain' }).body.trim();
 
    if (fileData) {
        return JSON.parse(fileData.trim());
    } else {
        return null;
    }
}

// Common Google library code that all Scripts that access Google
// services will include.
 
var GoogleApis;
(function (GoogleApis) {
    GoogleApis.createSheetsService = credentials => createService("https://sheets.googleapis.com/$discovery/rest?version=v4", credentials);
    GoogleApis.createDriveService = credentials => createService("https://www.googleapis.com/discovery/v1/apis/drive/v3/rest", credentials);
    GoogleApis.createGmailService = credentials => createService("https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest", credentials);
 
    // Creation logic based on https://developers.google.com/discovery/v1/using#usage-simple
    function createService(url, credentials) {
        const content = UrlFetchApp.fetch(url).getContentText();
        const discovery = JSON.parse(content);
        const accessToken = getAccessToken(credentials);
        const standardParameters = discovery.parameters;
        const service = build(discovery, {}, discovery['rootUrl'], discovery['servicePath'], standardParameters, accessToken);
        return service;
    }
 
    function createNewMethod(method, rootUrl, servicePath, standardParameters, accessToken) {
        return (urlParams, body, uploadParams) => {
            let urlPath = method.path;
            if (uploadParams) {
                if (!method.supportsMediaUpload) {
                    throw new Error(`Media upload is not supported`);
                }
                const uploadProtocols = method.mediaUpload.protocols;
                const uploadType = uploadParams.uploadType;
                switch (uploadType) {
                    case 'simple':
                        const simpleProtocol = uploadProtocols.simple;
                        if (!simpleProtocol) {
                            throw new Error(`Upload protocol ${uploadType} is not supported`);
                        }
                        urlPath = simpleProtocol.path;
                        break;
                    case 'resumable':
                        const resumableProtocol = uploadProtocols.resumable;
                        if (!resumableProtocol) {
                            throw new Error(`Upload protocol ${uploadType} is not supported`);
                        }
                        urlPath = resumableProtocol.path;
                        break;
                    default:
                        throw new Error(`Unknown upload type ${uploadType}`);
                }
            }
            const queryArguments = [];
            for (const name in urlParams) {
                const paramConfg = method.parameters[name] || standardParameters[name];
                if (!paramConfg) {
                    throw new Error(`Unexpected url parameter ${name}`);
                }
                switch (paramConfg.location) {
                    case 'path':
                        urlPath = urlPath.replace('{' + name + '}', urlParams[name]);
                        break;
                    case 'query':
                        queryArguments.push(`${name}=${urlParams[name]}`);
                        break;
                    default:
                        throw new Error(`Unknown location ${paramConfg.location} for url parameter ${name}`);
                }
            }
            if (uploadParams) {
                queryArguments.push(`uploadType=${uploadParams.uploadType === 'simple' ? 'media' : uploadParams.uploadType}`);
            }
            let url = rootUrl;
            if (urlPath.startsWith('/')) {
                url += urlPath.substring(1);
            } else {
                url += servicePath + urlPath;
            }
            if (queryArguments.length > 0) {
                url += '?' + queryArguments.join('&');
            }
            const payload = uploadParams ? body : JSON.stringify(body);
            const contentType = uploadParams ? uploadParams.contentType : 'application/json';
            const fetchParams = { contentType: contentType, method: method.httpMethod, payload: payload, headers: { Authorization: `Bearer ${accessToken}` }, muteHttpExceptions: true };
            const httpResponse = UrlFetchApp.fetch(url, fetchParams);            
            const responseContent = httpResponse.getContentText();
            const responseCode = httpResponse.getResponseCode();
            let parsedResult;
            try {
                parsedResult = JSON.parse(responseContent);
            } catch (e) {
                parsedResult = false;
            }
            const response = new Response(parsedResult, responseContent, responseCode);
            if (responseCode >= 200 && responseCode <= 299) {
                return response;
            }
            throw new Error(response.toString());
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
 
    function build(discovery, collection, rootUrl, servicePath, standardParameters, accessToken) {
        for (const name in discovery.resources) {
            const resource = discovery.resources[name];
            collection[name] = build(resource, {}, rootUrl, servicePath, standardParameters, accessToken);
        }
        for (const name in discovery.methods) {
            const method = discovery.methods[name];
            collection[name] = createNewMethod(method, rootUrl, servicePath, standardParameters, accessToken);
        }
        return collection;
    }
 
    function getAccessToken(credentials) {
        if (credentials.accessToken) {
            return credentials.accessToken;
        }
        const tokenResponse = UrlFetchApp.fetch('https://www.googleapis.com/oauth2/v4/token', { method: 'post', contentType: 'application/x-www-form-urlencoded', muteHttpExceptions: true, payload: { client_id: credentials.clientId, client_secret: credentials.clientSecret, refresh_token: credentials.refreshToken, grant_type: 'refresh_token' } });
        const responseCode = tokenResponse.getResponseCode();
        const responseText = tokenResponse.getContentText();
        if (responseCode >= 200 && responseCode <= 299) {
            const accessToken = JSON.parse(responseText)['access_token'];
            return accessToken;
        }
        throw new Error(responseText);
    }
})(GoogleApis || (GoogleApis = {}));
 
// https://github.com/AzureAD/microsoft-authentication-library-for-js/blob/master/lib/msal-core/src/Utils.ts
class Base64 {
    static encode(input) {
        const keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
        let output = "";
        let chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        let i = 0;
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
        let utftext = "";
        for (let n = 0; n < input.length; n++) {
            const c = input.charCodeAt(n);
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
