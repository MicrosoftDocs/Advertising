---
title: "HTTPResponse object"
description: "Contains the methods for getting the response's payload and status code."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# HTTPResponse

Contains the methods for getting the response's payload and status code.


Example usage:
```javascript
function main() {
    var response = UrlFetchApp.fetch('http://microsoft.com');
    Logger.log('status code: ' + response.getResponseCode() + '\n' +
        'payload as a string: ' + response.getContentText());
}
```


## Methods

|Method Name|Return Type|Description|
|-|-|-
[getContent()](#getcontent)|byte[]|Gets the response's payload as a byte array.
[getContentText()](#getcontenttext)|string|Gets the response's payload as a string.
[getResponseCode()](#getresponsecode)|integer|Gets the response's HTTP status code.


## <a name="getcontent"></a>getContent

Gets the response's payload as a byte array.

### Returns

|Type|Description|
|-|-
byte[]|The response's payload as a byte array.


## <a name="getcontenttext"></a>getContentText

Gets the response's payload as a string.

### Returns

|Type|Description|
|-|-
string|The response's payload as a string. If the payload is a JSON object, use JSON.parse(response.getContentText()) to get the object.


## <a name="getresponsecode"></a>getResponseCode

Gets the response's HTTP status code.

### Returns

|Type|Description|
|-|-
integer|The response's HTTP status code, which indicates the request's success or failure. For example, 200 if the GET request succeeded.

