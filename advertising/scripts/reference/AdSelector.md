---
title: "AdSelector object"
description: "Contains the methods for filtering the list of ads to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---


# AdSelector

Contains the methods for filtering and sorting a list of ads. For information about selectors, see [Selectors](../concepts/selectors.md).

## Methods

|Method Name|Return Type|Description|
|-|-|-
[forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-)|[AdSelector](./AdSelector.md)|Applies the start and end dates for selecting performance metrics.
[forDateRange(string dateRange)](#fordaterange-string-daterange-)|[AdSelector](./AdSelector.md)|Applies the predefined date range for selecting performance metrics.
[get](#get)|[AdIterator](./AdIterator.md)|Gets an iterator used to iterate through the list of ads.
[orderBy(string orderBy)](#orderby-string-orderby-)|[AdSelector](./AdSelector.md)|Applies the specified ordering to the selected ads.
[withCondition(string condition)](#withcondition-string-condition-)|[AdSelector](./AdSelector.md)|Applies filter criteria to the ads.
[withIds(string[] ids)](#withids-string-ids-)|[AdSelector](./AdSelector.md)|Gets ads with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[AdSelector](./AdSelector.md)|Gets the top *n* ads that match the selection criteria.

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
[AdSelector](./AdSelector.md)|Selector with date range applied.

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
[AdSelector](./AdSelector.md)|Selector with date range applied.

## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of ads.

### Returns
|Type|Description|
|-|-
[AdIterator](./AdIterator.md)|An iterator used to iterate through the selected ads.

## <a name="orderby-string-orderby-"></a>orderBy(String orderBy)
Applies the specified ordering to the selected ads. 

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-ad-columns). 
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns ads in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`


[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]


### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[AdSelector](./AdSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the ads.

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported Columns](#supported-ad-columns). If *columName* is set to a performance metric column name, you must specify a date range using [forDateRange(String dateRange)](#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-ad-columns"></a>
### Supported Columns

Supported columns for filtering ads. The column names are case sensitive. 

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
Status|enumeration|The ad's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only enabled ads.<br /><br />`withCondition("Status = ENABLED")`
Type|enumeration|The ad's derived type. Possible case-sensitive values are: <ul><li>EXPANDED_TEXT_AD</li></ul>This example returns only expanded text ads.<br /><br />`withCondition("Type = EXPANDED_TEXT_AD")`
CombinedApprovalStatus|string|The ad's approval status. Possible case-sensitive values are: <ul><li>APPROVED</li><li>APPROVED_LIMITED</li><li>UNDER_REVIEW</li><li>DISAPPROVED</li></ul>For information about these values, see [Editorial approval status values](../concepts/editorial-approval.md).<br /><br />This example returns ads that need attention.<br /><br />`withCondition("CombinedApprovalStatus IN ['APPROVED_LIMITED', 'DISAPPROVED']")`
CreativeFinalUrls|string|The ad's final URL.<br /><br />`withCondition("CreativeFinalUrls CONTAINS_IGNORE_CASE 'contoso.com'")`
AdGroupName|string|The name of the ad group that the ads belong to.<br /><br />`withCondition("AdGroupName CONTAINS_IGNORE_CASE 'truck'")`
AdGroupStatus|enumeration|The status of the ad group that the ads belong to. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only ads whose parent ad group is paused.<br /><br />`withCondition("AdGroupStatus = PAUSED")`
CampaignName|string|The name of the campaign that the ads belong to.<br /><br />`withCondition("CampaignName CONTAINS_IGNORE_CASE 'truck'")`
CampaignStatus|enumeration|The status of the campaign that the ads belong to. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only ads whose parent campaign is paused.<br /><br />`withCondition("CampaignStatus = PAUSED")`
LabelNames|string set|A list of one or more case-sensitive label names. Use to get ads associated with the named labels.<br /><br />`withCondition("LabelNames  CONTAINS_ANY ['bar', 'foo']")`
Id|Long|The ID of the ad to test. For example, you can use this column to check for ads with IDs greater than the specified ID.<br /><br />`withCondition('Id > 1234')`


### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to apply to the selector.

### Returns
|Type|Description|
|-|-
[AdSelector](./AdSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets ads with the specified IDs. 

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only ad 33333.

```javascript
var selector = AdsApp.ads()
    .withIds([11111, 22222, 33333])
    .withIds([33333, 44444, 55555]);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of ad IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[AdSelector](./AdSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* ads that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of ads to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[AdSelector](./AdSelector.md)|Selector with limit applied.



## See also

[AdsApp.ads()](AdsApp.md#ads)

<!--
[AdGroup.ads()](AdGroup.md#ads)
-->
