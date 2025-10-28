---
title: "UrlFetchParams object"
description: "Defines the parameters used in a web resource request."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# UrlFetchParams

Defines the parameters used in a web resource request.

## Properties

|Property|Type|Description
|-|-|-
|contentType|string|The media type of data in the request's payload. The default is, application/x-www-form-urlencoded.
|headers|object|An object that contains a key-value pair for each request header you want to specify.
|method|string|The HTTP verb to use in the request. Possible values are: GET, POST, PUT, PATCH, and DELETE. The default is GET.
|payload|string or object|The payload for a POST, PUT, or PATCH request. If the payload is an object, it may contain one or more name-value pairs.
|muteHttpExceptions|Boolean|Determines whether to prevent this method from throwing an exception if the response's status code is a failure code. Set to **true** to mute HTTP failure codes. The default is **false**.<br/><br/>If **false** and the request fails, the log will not include the body of the response, which may contain an error message. To capture the error message, set muteHttpExceptions to **true**. You must then call [getResponseCode](HTTPResponse.md#getresponsecode) after sending the request to determine whether the call succeeded or failed. If the call fails, call [getContentText](HTTPResponse.md#getcontenttext) to get the body of the response, which may contain the error messaage.


## See also

[UrlFetchApp.fetch(url, params)](UrlFetchApp.md#fetch-string-url-urlfetchparams-params-)
