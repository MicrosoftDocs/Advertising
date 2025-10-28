---
title: "ExecutionResult object"
description: "Contains the methods used to get information about the execution results of the executeInParallel functions."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# ExecutionResult

Contains the methods used to get the execution result of the `executeInParallel` function (see [BingAdsAccountSelector](./BingAdsAccountSelector.md)).


## Methods
|Method Name|Return Type|Description|
|-|-|-
[getAccountId](#getaccountid)|String|Gets the ID of the account that was processed.
[getCustomerId](#getcustomerid)|String|Gets the ID of the customer that owns the account.
[getError](#geterror)|String|Gets the error message if the executeInParallel function failed.
[getReturnValue](#getreturnvalue)|String|Gets the return value that the executeInParallel function returned.
[getStatus](#getstatus)|String|Gets the status that indicates whether the function succeeded.


## <a name="getaccountid"></a>getAccountId
Gets the ID of the account that was processed.

### Returns
|Type|Description|
|-|-
String|The ID of the account that was processed.


## <a name="getcustomerid"></a>getCustomerId
Gets the ID of the customer that owns the account.

### Returns
|Type|Description|
|-|-
String|The ID of the customer that owns the account.


## <a name="geterror"></a>getError
Gets the error message if the executeInParallel function failed.

### Returns
|Type|Description|
|-|-
String|The error message if the executeInParallel function failed. The error is set if the `getStatus` method returns ERROR. This method returns null if there was no error.


## <a name="getreturnvalue"></a>getReturnValue
Gets the return value that the executeInParallel function returned. For details, see [BingAdsAccountSelector](./BingAdsAccountSelector.md).

### Returns
|Type|Description|
|-|-
String|The return value that the executeInParallel function returned. Returns null if the function did not return a value.


## <a name="getstatus"></a>getStatus
Gets the status that indicates whether the function succeeded.

### Returns
|Type|Description|
|-|-
String|The status that indicates whether the function succeeded. Possible values are:<ul><li>OK &mdash; The function finished successfully.</li><li>ERROR &mdash; An error occurred while executing the function.</li><li>TIMEOUT &mdash; The function failed to complete in the required time.

