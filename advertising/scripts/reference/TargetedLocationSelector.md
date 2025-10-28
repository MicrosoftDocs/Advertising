---
title: "TargetedLocationSelector object"
description: "Contains the methods for filtering the list of targeted locations to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# TargetedLocationSelector

Contains the methods for filtering and ordering a list of targeted locations. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var shoppingCampaign = AdsApp.shoppingCampaigns().withIds(["123456789"]).get().next();

    var iterator = shoppingCampaign.targeting().targetedLocations()
        .withLimit(10)
        .withIds("123456789")
        .get();

    while (iterator.hasNext()) {
        var targetedLocation = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-)|[TargetedLocationSelector](./TargetedLocationSelector.md)|Applies the start and end dates for selecting performance metrics.
[forDateRange(string dateRange)](#fordaterange-string-daterange-)|[TargetedLocationSelector](./TargetedLocationSelector.md)|Applies the predefined date range for selecting performance metrics.
[get](#get)|[TargetedLocationIterator](./TargetedLocationIterator.md)|Gets an iterator used to iterate through the list of targeted locations.
[orderBy(string orderBy)](#orderby-string-orderby-)|[TargetedLocationSelector](./TargetedLocationSelector.md)|Applies the specified ordering to the selected targeted locations.
[withCondition(string condition)](#withcondition-string-condition-)|[TargetedLocationSelector](./TargetedLocationSelector.md)|Applies filter criteria to the targeted locations.
[withIds(string[] ids)](#withids-string-ids-)|[TargetedLocationSelector](./TargetedLocationSelector.md)|Gets targeted locations with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[TargetedLocationSelector](./TargetedLocationSelector.md)|Gets the top *n* targeted locations that match the selection criteria.

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
[TargetedLocationSelector](./TargetedLocationSelector.md)|Selector with date range applied.

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
[TargetedLocationSelector](./TargetedLocationSelector.md)|Selector with date range applied.

## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of targeted locations.

### Returns
|Type|Description|
|-|-
[TargetedLocationIterator](./TargetedLocationIterator.md)|An iterator used to iterate through the selected targeted locations.

## <a name="orderby-string-orderby-"></a>orderBy(string orderBy)
Applies the specified ordering to the selected targeted locations.

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-location-columns).
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns results in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`

[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]

### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[TargetedLocationSelector](./TargetedLocationSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the targeted locations. 

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported columns](#supported-location-columns). If *columName* is set to a performance metric column name, you must specify a date range using [forDateRange(String dateRange)](#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-location-columns"></a>
Supported columns for targeted location filtering. The column names are case sensitive.

The following are the performance metrics columns you may specify.

|Column|Type|Example|Microsoft Advertising web UI filter
|-|-|-|-
AbsoluteTopImpressionRate|double|`withCondition("AbsoluteTopImpressionRate > 0.25")`|Abs. Top Impr. Rate
AverageCpc|double|`withCondition("AverageCpc < 2.75")`|Avg. CPC
AverageCpm|double|`withCondition("AverageCpm > 0.65")`|Avg. CPM
ClickConversionRate|double|`withCondition("ClickConversionRate > 0.25")`|Conv. Rate
Clicks|long|`withCondition("Clicks >= 33")`|Clicks
ConvertedClicks|long|`withCondition("ConvertedClicks >= 10")`|Conv.
Cost|double|`withCondition("Cost > 3.25")`<br /><br />The cost is in the account's currency.|Spend
Ctr|double|`withCondition("Ctr > 0.05")`<br /><br />The CTR is in the range 0..1, so use 0.05 for a 5% CTR.|CTR
Impressions|long|`withCondition("Impressions > 10")`|Impr.
TopImpressionRate|double|`withCondition("TopImpressionRate > 0.25")`|Top Impr. Rate


### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to add to the selector.

### Returns
|Type|Description|
|-|-
[TargetedLocationSelector](./TargetedLocationSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets targeted locations with the specified IDs.

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only targeted location 72.

```javascript
var shoppingCampaign = AdsApp.shoppingCampaigns().withIds(["123456789"]).get().next();

var iterator = shoppingCampaign.targeting().targetedLocations()
    .withIds(["32", "72"])
    .withIds(["72", "190"]);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of targeted location IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[TargetedLocationSelector](./TargetedLocationSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* targeted locations that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of targeted locations to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[TargetedLocationSelector](./TargetedLocationSelector.md)|Selector with limit applied.



## See also

- [TargetedLocationIterator](./TargetedLocationIterator.md)
- [TargetedLocation](./TargetedLocation.md)

