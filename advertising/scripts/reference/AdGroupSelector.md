---
title: "AdGroupSelector object"
description: "Contains the methods for filtering the list of ad groups to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# AdGroupSelector

Contains the methods for filtering and sorting a list of ad groups. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var iterator = AdsApp.adGroups()
        .withCondition("ClickConversionRate > 0.3")
        .forDateRange("LAST_WEEK")
        .orderBy("Clicks DESC")
        .get();

    while (iterator.hasNext()) {
        var adGroup = iterator.next();
        var metrics = adGroup.getStats();
    }
```

## Methods

|Method Name|Return Type|Description|
|-|-|-
[forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-)|[AdGroupSelector](./AdGroupSelector.md)|Applies the start and end dates for selecting performance metrics.
[forDateRange(string dateRange)](#fordaterange-string-daterange-)|[AdGroupSelector](./AdGroupSelector.md)|Applies the predefined date range for selecting performance metrics.
[get](#get)|[AdGroupIterator](./AdGroupIterator.md)|Gets an iterator used to iterate through the list of ad groups.
[orderBy(string orderBy)](#orderby-string-orderby-)|[AdGroupSelector](./AdGroupSelector.md)|Applies the specified ordering to the selected ad groups.
[withCondition(string condition)](#withcondition-string-condition-)|[AdGroupSelector](./AdGroupSelector.md)|Applies filter criteria to the ad groups.
[withIds(string[] ids)](#withids-string-ids-)|[AdGroupSelector](./AdGroupSelector.md)|Gets ad groups with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[AdGroupSelector](./AdGroupSelector.md)|Gets the top *n* ad groups that match the selection criteria.

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
[AdGroupSelector](./AdGroupSelector.md)|Selector with date range applied.

## <a name="fordaterange-string-daterange-"></a>forDateRange(String dateRange)
Applies the predefined date range for selecting performance metrics.

[!INCLUDE[date-range-conditions-message](../includes/date-range-conditions-message.md)]

[!INCLUDE[date-range-constants](../includes/date-range-constants.md)] 

### Arguments
|Name|Type|Description|
|-|-|-
dateRange|String|The predefined date range string that specifies the performance data to include in the selector. The predefined date-range string is case sensitive.

### Returns
|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|Selector with date range applied.

## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of ad groups.

### Returns
|Type|Description|
|-|-
[AdGroupIterator](./AdGroupIterator.md)|An iterator used to iterate through the selected ad groups.

## <a name="orderby-string-orderby-"></a>orderBy(String orderBy)
Applies the specified ordering to the selected ad groups. 

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-ad-group-columns). 
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns ad groups in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`


[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]


### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the ad groups.

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported Columns](#supported-ad-group-columns). If *columName* is set to a performance metric column name, you must specify a date range using [forDateRange(String dateRange)](#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-ad-group-columns"></a>
### Supported Columns

Supported columns for ad group filtering. The names are case sensitive. 

The following are the performance metrics columns you may specify.

|Column|Type|Example|
|-|-|-
AbsoluteTopImpressionRate|double|`withCondition("AbsoluteTopImpressionRate > 0.25")`
AverageCpc|double|`withCondition("AverageCpc < 2.75")`
AverageCpm|double|`withCondition("AverageCpm > 0.65")`
ClickConversionRate|double|`withCondition("ClickConversionRate > 0.25")`
Clicks|long|`withCondition("Clicks >= 33")`
ConvertedClicks|long|`withCondition("ConvertedClicks >= 10")`
Cost|double|`withCondition("Cost > 3.25")`<br /><br />The cost is in the account's currency.
Ctr|double|`withCondition("Ctr > 0.05")`<br /><br />The CTR is in the range 0..1, so use 0.05 for a 5% CTR.
Impressions|long|`withCondition("Impressions > 10")`
TopImpressionRate|double|`withCondition("TopImpressionRate > 0.25")`

The following are the entity properties you may specify.

|Column|Type|Example|
|-|-|-
Status|enumeration|The ad group's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only enabled ad groups.<br /><br />`withCondition("Status = ENABLED")`
Name|string|The ad group's name.<br /><br />`withCondition("Name CONTAINS_IGNORE_CASE 'sport'")`
CampaignName|string|The campaign's name.<br /><br />`withCondition("CampaignName CONTAINS_IGNORE_CASE 'truck'")`
KeywordMaxCpc|double|The ad group's CPC bid. The bid is in the account's currency.<br /><br />`withCondition("KeywordMaxCpc > 5.0")`
CampaignStatus|enumeration|The campaign's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only ad groups whose parent campaign is paused.<br /><br />`withCondition("CampaignStatus = PAUSED")`
LabelNames|string set|A list of one or more case-sensitive label names. Use to get ad groups associated with the named labels.<br /><br />`withCondition("LabelNames  CONTAINS_ANY ['bar', 'foo']")`
CampaignType|enumeration|The campaign's type. Possible case-sensitive values are: <ul><li>SEARCH_AND_CONTENT</li><li>SHOPPING</li><li>DYNAMIC_SEARCH_ADS</li></ul>This example returns only ad groups whose parent campaign's type is Shopping.<br /><br />`withCondition("CampaignType = SHOPPING")`


### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to apply to the selector.

### Returns
|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets ad groups with the specified IDs. 

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only ad group 33333.

```javascript
var selector = AdsApp.adGroups()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of ad group IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* ad groups that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of ad groups to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|Selector with limit applied.



## See also

[AdsApp.adGroups()](AdsApp.md#adgroups)
