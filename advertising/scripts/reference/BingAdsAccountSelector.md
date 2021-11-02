---
title: "BingAdsAccountSelector object"
description: "Contains the methods used in multi-account scripts for filtering the list of accounts that you have access to."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# BingAdsAccountSelector

Contains the methods for filtering and ordering the list of accounts the user has access to. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var accounts = AccountsApp.accounts()
        .withCondition("Name CONTAINS_IGNORE_CASE 'PARTIAL ACCOUNT NAME GOES HERE'")
        .get();

    while (accounts.hasNext()) {
        var account = accounts.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[executeInParallel(string functionName, string optionalCallbackFunctionName)](#executeinparallel-string-functionname-string-optionalcallbackfunctionname-)|void|Executes the function for each account that the selector returns.
[executeInParallel(string functionName, string optionalCallbackFunctionName, string optionalInput)](#executeinparallel-string-functionname-string-optionalcallbackfunctionname-string-optionalinput-)|void|Executes the function for each account that the selector returns.
[forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-)|[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Applies the start and end dates for selecting performance metrics.
[forDateRange(string dateRange)](#fordaterange-string-daterange-)|[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Applies the predefined date range for selecting performance metrics.
[get](#get)|[BingAdsAccountIterator](./BingAdsAccountIterator.md)|Gets an iterator used to iterate through the list of accounts.
[orderBy(string orderBy)](#orderby-string-orderby-)|[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Applies the specified ordering to the selected accounts.
[withAccountNumbers(string[] accountNumbers)](#withaccountnumbers-string-accountnumbers-)|[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Gets accounts with the specified account numbers.
[withCondition(string condition)](#withcondition-string-condition-)|[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Applies filter criteria to the accounts.
[withIds(string[] ids)](#withids-string-ids-)|[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Gets accounts with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Gets the top *n* accounts that match the selection criteria.


## <a name="executeinparallel-string-functionname-string-optionalcallbackfunctionname-"></a>executeInParallel(string functionName, string optionalCallbackFunctionName)

Executes the function for each account that the selector returns. After the function is executed for all selected accounts, Scripts calls the optional callback function.

> [!NOTE]
> The script may execute a maximum of 50 accounts in parallel each time the script runs. You may call this method once or multiple times but the total number of accounts all calls process must not exceed 50. If a call exceeds the 50 account maximum for the script, none of the accounts in the call are executed. To limit the number of accounts the selector returns, consider using the `withLimit` or `withIds` method.  

The *functionName* function may return a value as a string. To return a complex object, use the JSON.stringify method to convert the object to a string. You can then use the JSON.parse method to convert the string back into an object. If your function returns a value, you must specify a callback function to capture the return values. The following shows the callback function's signature. The returned values are passed as an array of [ExecutionResult](./ExecutionResult.md) objects.

```javascript
function myCallback(ExecutionResult[] results)
```

The following example shows how to process the returned values in the callback function.

```javascript
function myCallback(results) {
    for (var result of results) {
        var object = JSON.parse(result.getReturnValue());
    }
}
```

Because this method does not return a [BingAdsAccountSelector](./BingAdsAccountSelector.md) object, make sure this method is the last selector method in the call chain.

For an example, see [Discovering disapproved ads](../solutions/get-disapproved-ads.md).

### Arguments
|Name|Type|Description|
|-|-|-
functionName|string|The name of the function to execute for each account that the selector returns. The [currentAccount](BingAdsApp.md#currentaccount) method identifies the account the function is processing.
optionalCallbackFunctionName|string|Optional. The name of the function to execute after all accounts finish executing the *functionName* function. This function executes only one time. 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="executeinparallel-string-functionname-string-optionalcallbackfunctionname-string-optionalinput-"></a>executeInParallel(string functionName, string optionalCallbackFunctionName, string optionalInput)
Executes the function for each account that the selector returns. After the function executes for all selected accounts, Scripts calls the optional callback function.

> [!NOTE]
> The script may execute a maximum of 50 accounts in parallel each time the script runs. You may call this method once or multiple times but the total number of accounts all calls process must not exceed 50. If a call exceeds the 50 account maximum for the script, none of the accounts in the call are executed. To limit the number of accounts the selector returns, consider using the `withLimit` or `withIds` method.  

The *functionName* function may return a value as a string. To return a complex object, use the JSON.stringify method to convert the object to a string. You can then use the JSON.parse method to convert the string back into an object. If your function returns a value, you must specify a callback function to capture the return values. The following shows the callback function's signature. The returned values are passed as an array of [ExecutionResult](./ExecutionResult.md) objects.

```javascript
function myCallback(ExecutionResult[] results)
```

The following example shows how to process the returned values in the callback function.

```javascript
function myCallback(results) {
    for (var result of results) {
        var object = JSON.parse(result.getReturnValue());
    }
}
```

If you pass the optional input parameter, the following shows the signature of the *functionName* function.

```javascript
function myFunction(string optionalInput)
```

Because this method does not return a [BingAdsAccountSelector](./BingAdsAccountSelector.md) object, make sure this method is the last selector method in the call chain.

For an example, see [Discovering disapproved ads](../solutions/get-disapproved-ads.md).

### Arguments
|Name|Type|Description|
|-|-|-
functionName|string|The name of the function to execute for each account that the selector returns. The [currentAccount](BingAdsApp.md#currentaccount) method identifies the account the function is processing.
optionalCallbackFunctionName|string|Optional. The name of the function to execute after all accounts finish executing the *functionName* function. This function executes only one time.
optionalInput|string|Optional. Input to pass to the *functionName* function.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="fordaterange-object-datefrom-object-dateto-"></a>forDateRange(Object dateFrom, Object dateTo)
Applies the start and end dates for selecting performance metrics.

[!INCLUDE[date-range-objects](../includes/date-range-objects.md)]

### Arguments
|Name|Type|Description|
|-|-|-
dateFrom|Object|The start date of the date range that specifies the performance data to include in the selector.
dateTo|Object|The end date of the date range that specifies the performance data to include in the selector.

### Returns
|Type|Description|
|-|-
[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Selector with date range applied.


## <a name="fordaterange-string-daterange-"></a>forDateRange(String dateRange)
Applies the predefined date range for selecting performance metrics.

[!INCLUDE[date-range-constants](../includes/date-range-constants.md)] 

[!INCLUDE[date-range-conditions-message](../includes/date-range-conditions-message.md)]

### Arguments
|Name|Type|Description|
|-|-|-
dateRange|String|The predefined date range string that specifies the performance data to include in the selector. The predefined date range string is case sensitive.

### Returns
|Type|Description|
|-|-
[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Selector with date range applied.


## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of accounts.

### Returns
|Type|Description|
|-|-
[BingAdsAccount](./BingAdsAccount.md)|An iterator used to iterate through the selected accounts.


## <a name="orderby-string-orderby-"></a>orderBy(string orderBy)
Applies the specified ordering to the selected accounts.

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-account-columns).
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns results in ascending order by Clicks.

`selector = selector.orderBy("Clicks");`

[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]

### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Selector with ordering applied.


## <a name="withaccountnumbers-string-accountnumbers-"></a>withAccountNumbers(string[] accountNumbers)
Gets accounts with the specified account numbers.

### Arguments
|Name|Type|Description|
|-|-|-
accountNumbers|string[]|An array of account numbers. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Selector with the account numbers applied.


## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the accounts. 

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported columns](#supported-account-columns). If *columName* is set to a performance metric column name, you must specify a date range using [forDateRange(String dateRange)](#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-account-columns"></a>
Supported columns for account filtering. The column names are case sensitive.

The following are the performance metrics columns you may specify.

|Column|Type|Example|Microsoft Advertising web UI filter
|-|-|-|-
ClickConversionRate|double|`withCondition("ClickConversionRate > 0.25")`|Conv. Rate
Clicks|long|`withCondition("Clicks >= 33")`|Clicks
ConvertedClicks|long|`withCondition("ConvertedClicks >= 10")`|Conv.
Cost|double|`withCondition("Cost > 3.25")`<br /><br />The cost is in the account's currency.|Spend
Ctr|double|`withCondition("Ctr > 0.05")`<br /><br />The CTR is in the range 0..1, so use 0.05 for a 5% CTR.|CTR
Impressions|long|`withCondition("Impressions > 10")`|Impr.

The following are the account properties you may specify.

|Column|Type|Example|Microsoft Advertising web UI filter
|-|-|-|-
CurrencyCode|string|The currency code of the currency used by the account. For example, USD for United States dollar.<br /><br />`withCondition("CurrencyCode = USD")`
ManagerCustomerId|string|The customer ID of the user managing the accounts.<br /><br />`withCondition("ManagerCustomerId = '123456789'")`
Name|string|The name of a managed account.<br /><br />`withCondition("Name CONTAINS_IGNORE_CASE 'foo'")`

### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to add to the selector.

### Returns
|Type|Description|
|-|-
[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Selector with the condition applied.


## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets accounts with the specified IDs.

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only account 33333.

```javascript
AccountsApp.accounts()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
    .get();
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of account IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Selector with the IDs applied.


## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* accounts that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of accounts to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[BingAdsAccountSelector](./BingAdsAccountSelector.md)|Selector with limit applied.



## See also

- [AccountsApp.accounts()](AccountsApp.md)
- [BingAdsAccountIterator](./BingAdsAccountIterator.md)
- [Multi-account access](../guides/multi-account-access.md)
