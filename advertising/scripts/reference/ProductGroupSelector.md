---
title: "ProductGroupSelector"
subtitle: "Scripts"
description: "Contains the methods for filtering the list of product groups to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# ProductGroupSelector

Contains the methods for filtering and sorting a list of product groups. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var iterator = AdsApp.productGroups()
        .withCondition("ClickConversionRate > 0.3")
        .forDateRange("LAST_WEEK")
        .orderBy("Clicks DESC")
        .get();

    while (iterator.hasNext()) {
        var productGroup = iterator.next();
        var metrics = productGroup.getStats();
    }
```

## Methods

|Method Name|Return Type|Description|
|-|-|-
[forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-)|[ProductGroupSelector](./ProductGroupSelector.md)|Applies the start and end dates for selecting performance metrics.
[forDateRange(string dateRange)](#fordaterange-string-daterange-)|[ProductGroupSelector](./ProductGroupSelector.md)|Applies the predefined date range for selecting performance metrics.
[get](#get)|[ProductGroupIterator](./ProductGroupIterator.md)|Gets an iterator used to iterate through the list of product groups.
[orderBy(string orderBy)](#orderby-string-orderby-)|[ProductGroupSelector](./ProductGroupSelector.md)|Applies the specified ordering to the selected product groups.
[withCondition(string condition)](#withcondition-string-condition-)|[ProductGroupSelector](./ProductGroupSelector.md)|Applies filter criteria to the product groups.
[withIds(string[] ids)](#withids-string-ids-)|[ProductGroupSelector](./ProductGroupSelector.md)|Gets product groups with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[ProductGroupSelector](./ProductGroupSelector.md)|Gets the top *n* product groups that match the selection criteria.

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
[ProductGroupSelector](./ProductGroupSelector.md)|Selector with date range applied.

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
[ProductGroupSelector](./ProductGroupSelector.md)|Selector with date range applied.

## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of product groups.

### Returns
|Type|Description|
|-|-
[ProductGroupIterator](./ProductGroupIterator.md)|An iterator used to iterate through the selected product groups.

## <a name="orderby-string-orderby-"></a>orderBy(String orderBy)
Applies the specified ordering to the selected product groups. 

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-ad-group-columns). 
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns product groups in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`


[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]


### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[ProductGroupSelector](./ProductGroupSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the product groups.

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported Columns](#supported-ad-group-columns). If *columName* is set to a performance metric column name, you must specify a date range using [forDateRange(String dateRange)](#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-ad-group-columns"></a>
### Supported Columns

Supported columns for product group filtering. The names are case sensitive. 

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
ProductGroup|string|The product group's value. For example, if the path is 'All products > Sporting Goods > Winter Sports > Skiing > Skis > Downhill Skis > New', you might set the operand to Skis.<br /><br />`withCondition("ProductGroup = Skis")`<br /><br />The selector includes the Skis product group and its "other case" product group, if it exists.<br /><br />Note that you may not specify 'OtherCase' as the operand.
Bid|double|The bid amount. Returns all product groups that match the bid condition.<br /><br />`withCondition("Bid < 2.75")`<br /><br />Using '<' returns groups with a CPC bid amount that's less than the specified amount or that's set to null. To prevent the selector from including the null case, use for example, `.withCondition("Bid < 2.75").withCondition("Bid > 0.0")`.

### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to apply to the selector.

### Returns
|Type|Description|
|-|-
[ProductGroupSelector](./ProductGroupSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets product groups with the specified IDs. 

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only product group 33333.

```javascript
var selector = AdsApp.productGroups()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of product group IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[ProductGroupSelector](./ProductGroupSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* product groups that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of product groups to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[ProductGroupSelector](./ProductGroupSelector.md)|Selector with limit applied.



## See also

[AdsApp.productGroups()](AdsApp.md#productgroups)
[AdGroup.productGroups()](AdGroup.md#productgroups)
