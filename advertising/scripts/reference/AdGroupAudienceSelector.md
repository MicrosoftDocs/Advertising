---
title: "AdGroupAudienceSelector object"
description: "Contains the methods for filtering the list of ad group audiences to return."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdGroupAudienceSelector

Contains the methods for filtering and sorting a list of ad group audiences. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    // Gets the iterator that iterates all ad group audiences
    // in the account.
    var iterator = AdsApp.adGroups().get();

    // Loops through all ad groups in the account.
    while (iterator.hasNext()) {
        var adGroup = iterator.next();

        // Gets the iterator that iterates all ad group audiences
        // in the ad group audience.
        var audienceIterator = adGroup.targeting().audiences()
            .withLimit(10)
            .withIds("123456789")
            .get();
    
        // Loops through all ad group audiences in the ad group audience.
        while (audienceIterator.hasNext()) {
            var audience = iterator.next();
        }
    }
```

## Methods

|Method Name|Return Type|Description|
|-|-|-
[forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-)|[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Applies the start and end dates for selecting performance metrics.
[forDateRange(string dateRange)](#fordaterange-string-daterange-)|[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Applies the predefined date range for selecting performance metrics.
[get](#get)|[AdGroupAudienceIterator](./AdGroupAudienceIterator.md)|Gets an iterator used to iterate through the list of ad group audiences.
[orderBy(string orderBy)](#orderby-string-orderby-)|[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Applies the specified ordering to the selected ad group audiences.
[withCondition(string condition)](#withcondition-string-condition-)|[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Applies filter criteria to the ad group audiences.
[withIds(string[] ids)](#withids-string-ids-)|[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Gets ad group audiences with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Gets the top *n* ad group audiences that match the selection criteria.

## <a name="fordaterange-object-datefrom-object-dateto-"></a>forDateRange(Object dateFrom, Object dateTo)
Applies the start and end dates for selecting performance metrics.

[!INCLUDE[date-range-objects](../includes/date-range-objects.md)]

### Arguments
|Name|Type|Description|
|-|-|-
dateFrom|Object|The start date of the date range that specifies the performance data to include in the selector. Specify the date using a string in the form, YYYYMMDD, or an object in the form, {year: 2020, month: 12, day: 31}.
dateTo|Object|The end date of the date range that specifies the performance data to include in the selector. Specify the date using a string in the form, YYYYMMDD, or an object in the form, {year: 2020, month: 12, day: 1}.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Selector with date range applied.

## <a name="fordaterange-string-daterange-"></a>forDateRange(String dateRange)
Applies the predefined date range for selecting performance metrics.

[!INCLUDE[date-range-conditions-message](../includes/date-range-conditions-message.md)]

[!INCLUDE[date-range-constants](../includes/date-range-constants.md)] 

### Arguments
|Name|Type|Description|
|-|-|-
dateRange|String|The predefined date range string that specifies the performance data to include in the selector. The predefined date-range string is case sensitive. Possible case-sensitive values are: TODAY, YESTERDAY, LAST_WEEK, LAST_BUSINESS_WEEK, LAST_7_DAYS, THIS_WEEK_SUN_TODAY, LAST_14_DAYS, LAST_30_DAYS, LAST_WEEK_SUN_SAT, THIS_MONTH, LAST_MONTH, ALL_TIME. 

### Returns
|Type|Description|
|-|-
[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Selector with date range applied.

## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of ad group audiences.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceIterator](./AdGroupAudienceIterator.md)|An iterator used to iterate through the selected ad group audiences.

## <a name="orderby-string-orderby-"></a>orderBy(String orderBy)
Applies the specified ordering to the selected ad group audiences. 

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-audience-columns). 
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns ad group audiences in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`


[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]


### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the ad group audiences.

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported Columns](#supported-audience-columns). If *columName* is set to a performance metric column name, you must specify a date range using [forDateRange(String dateRange)](#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-audience-columns"></a>
### Supported Columns

Supported columns for ad group audience filtering. The names are case sensitive. 

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
AdGroupName|string|The name of the association's ad group.<br /><br />`withCondition("AdGroupName CONTAINS_IGNORE_CASE 'truck'")`
AdGroupStatus|enumeration|The status of the association's ad group. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only ad group audiences whose parent ad group is paused.<br /><br />`withCondition("AdGroupStatus = PAUSED")`
AudienceId|long|The associated audience's ID.<br /><br />`withCondition("AudienceId = 123456789")`
CampaignName|string|The name of the campaign that contains the association's ad group.<br /><br />`withCondition("CampaignName CONTAINS_IGNORE_CASE 'truck'")`
CampaignStatus|enumeration|The status of the campaign that contains the association's ad group. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only ad group audiences whose parent campaign is paused.<br /><br />`withCondition("CampaignStatus = PAUSED")`
Status|enumeration|The association's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only enabled ad group audiences.<br /><br />`withCondition("Status = ENABLED")`
UserListName|string|The associated audience's name.<br /><br />`withCondition("UserListName = 'foo'")`

### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to apply to the selector.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets ad group audiences with the specified IDs. 

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only ad group audience 33333.

```javascript
var selector = AdsApp.adGroups()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of ad group audience IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* ad group audiences that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of ad group audiences to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|Selector with limit applied.


