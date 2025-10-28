---
title: "UrlFetchApp object"
description: "The top-level object used to fetch resources from the web."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# UrlFetchApp

This is the top-level object used to fetch resources from the web.

<!--
This example throws 403 now. They've updated the service and now require a 
token. See https://iexcloud.io/docs/api/. They also require attribution, so
we need to find another endpoint to use.

Example usage:
```javascript
function main() {
    // Simple GET request to fetch a stock quote.
    var response = UrlFetchApp.fetch('https://api.iextrading.com/1.0/stock/msft/quote');
    var stock = JSON.parse(response.getContentText());
    Logger.log(`stock symbol: ${stock["symbol"]}`);
    Logger.log(`company: ${stock["companyName"]}`);
    Logger.log(`close price: ${stock["close"]}`);
    Logger.log("\nstatus code: " + response.getResponseCode());
}
```
-->

## Methods

|Method Name|Return Type|Description|
|-|-|-
[fetch(url)](#fetch-string-url-)|[HTTPResponse](./HTTPResponse.md)|Gets a resource from the web.
[fetch(url, params)](#fetch-string-url-urlfetchparams-params-)|[HTTPResponse](./HTTPResponse.md)|Lets you manage a web resource.
[getRemainingDailyQuota](#getremainingdailyquota)|int|Gets the remaining number of `fetch()` calls that the user can make today.


## <a name="fetch-string-url-"></a>fetch(string url)
Gets a resource from the web. 

This is the equivalent of an HTTP GET request. This method waits until the request completes.

### Arguments
|Name|Type|Description|
|-|-|-
url|string|The URL of the web resource to get. Supports HTTP and HTTPS requests. The URL may include query parameters.

### Returns
|Type|Description|
|-|-
[HTTPResponse](HTTPResponse.md)|Contains the methods for getting the response's payload and status code.


## <a name="fetch-string-url-urlfetchparams-params-"></a>fetch(string url, UrlFetchParams params)
Lets you manage a web resource.

Use this method to get, post, put, patch or delete a web resource. This method waits until the request completes.

### Arguments
|Name|Type|Description|
|-|-|-
url|string|The URL of the web resource.
params|[UrlFetchParams](UrlFetchParams.md)|The request's parameters such as its headers, HTTP method, and payload.

### Returns
|Type|Description|
|-|-
[HTTPResponse](HTTPResponse.md)|Contains the methods for getting the response's payload and status code.


## <a name="getremainingdailyquota"></a>GetRemainingDailyQuota
Gets the remaining number of `fetch()` calls that the user can make today. See [UrlFetch limits](../concepts/urlfetch-limits.md).

### Returns
|Type|Description|
|-|-
int|The remaining number of `fetch()` calls that the user can make today.


## See also

- [UrlFetch limits](../concepts/urlfetch-limits.md)
- [Examples fetching web resources](../examples/fetch-resources.md)
