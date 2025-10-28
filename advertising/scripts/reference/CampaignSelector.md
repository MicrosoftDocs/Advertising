---
title: "CampaignSelector object"
description: "Contains the methods for filtering the list of campaigns to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# CampaignSelector

Contains the methods for filtering and sorting a list of campaigns. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var iterator = AdsApp.campaigns()
        .withCondition("ClickConversionRate > 0.3")
        .forDateRange("LAST_WEEK")
        .orderBy("Clicks DESC")
        .get();

    while (iterator.hasNext()) {
        var campaign = iterator.next();
        var metrics = campaign.getStats();
    }
```


## Methods
|Method Name|Return Type|Description|
|-|-|-
[forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-)|[CampaignSelector](CampaignSelector.md)|Applies the start and end dates for selecting performance metrics.
[forDateRange(string dateRange)](#fordaterange-string-daterange-)|[CampaignSelector](./CampaignSelector.md)|Applies the predefined date range for selecting performance metrics.
[get](#get)|[CampaignIterator](./CampaignIterator.md)|Gets an iterator used to iterate through the list of campaigns.
[orderBy(string orderBy)](#orderby-string-orderby-)|[CampaignSelector](./CampaignSelector.md)|Applies the specified ordering to the selected campaigns.
[withCondition(string condition)](#withcondition-string-condition-)|[CampaignSelector](./CampaignSelector.md)|Applies the filter to the list of campaigns.
[withIds(string[] ids)](#withids-string-ids-)|[CampaignSelector](./CampaignSelector.md)|Gets campaigns with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[CampaignSelector](./CampaignSelector.md)|Gets the top *n* campaigns that match the selection criteria.

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
[CampaignSelector](CampaignSelector.md)|Selector with date range applied.

## <a name="fordaterange-string-daterange-"></a>forDateRange(string dateRange)
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
[CampaignSelector](./CampaignSelector.md)|Selector with date range applied.

## <a name="get"></a>get
Gets an  [iterator](../concepts/iterators.md) used to iterate through the list of campaigns.

### Returns
|Type|Description|
|-|-
[CampaignIterator](./CampaignIterator.md)|An iterator used to iterate through the selected campaigns.

## <a name="orderby-string-orderby-"></a>orderBy(string orderBy)
Applies the specified ordering to the selected campaigns. 

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-campaign-columns)
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns campaigns in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`


[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]


### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(string condition)
Applies the filter to the list of campaigns campaigns. 

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported columns](#supported-campaign-columns). If *columName* is set to a performance metric column name, you must specify a date range using [forDateRange(String dateRange)](#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-campaign-columns"></a>
Supported columns for campaign filtering. The column names are case sensitive.

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
Status|enumeration|The campaign's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li><li>BUDGET_PAUSED</li><li>BUDGET_AND_USER_PAUSED</li></ul>This example returns only enabled enabled.<br /><br />`withCondition("Status = ENABLED")`
Name|string|The campaign's name.<br /><br />`withCondition("Name CONTAINS_IGNORE_CASE 'clearance'")`
Budget|double|The campaign's budget.<br /><br />`withCondition("Budget > 500.0")`
BudgetType|enumeration|The campaign's budget type. Possible case-sensitive values are: <ul><li>STANDARD</li><li>ACCELERATED</li></ul>`withCondition("BudgetType = 'STANDARD'")`
DeliveryStatus|enumeration|The campaign's delivery status. Possible case-sensitive values are: <ul><li>ELIGIBLE</li><li>LIMITED_BY_BUDGET</li><li>HOLD</li><li>CAMPAIGN_OUT_OF_BUDGET</li><li>CAMPAIGN_SUSPENDED</li><li>CAMPAIGN_PAUSED</li></ul>`withCondition("DeliveryStatus NOT_IN ['LIMITED_BY_BUDGET', 'HOLD', 'CAMPAIGN_OUT_OF_BUDGET']")`
LabelNames|string set|A list of one or more case-sensitive label names. Use to get campaigns associated with the named labels.<br /><br />`withCondition("LabelNames  CONTAINS_ANY ['bar', 'foo']")`
Type|enumeration|The campaign's type. Possible case-sensitive values are: <ul><li>SEARCH_AND_CONTENT</li><li>SHOPPING</li><li>DYNAMIC_SEARCH_ADS</li></ul>This example returns only campaigns whose type is Shopping.<br /><br />`withCondition("CampaignType = SHOPPING")`


### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to apply to the selector.

### Returns
|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets campaigns with the specified IDs. 

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only campaign 33333.

```javascript
AdsApp.campaigns()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of campaign IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* campaigns that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of campaigns to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|Selector with limit applied.



## See also

- [CampaignIterator](./CampaignIterator.md)
- [Campaign](./Campaign.md)
