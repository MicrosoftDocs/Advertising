---
title: "LabelSelector object"
description: "Contains the methods for filtering and ordering the list of labels to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# LabelSelector

Contains the methods for filtering and ordering a list of labels in the account. For information about selectors, see [Selectors](../concepts/selectors.md).


## Methods
|Method Name|Return Type|Description|
|-|-|-
[get](#get)|[LabelIterator](./LabelIterator.md)|Gets an iterator used to iterate through the list of labels.
[orderBy(string orderBy)](#orderby-string-orderby-)|[LabelSelector](./LabelSelector.md)|Applies the specified ordering to the selected labels.
[withCondition(string condition)](#withcondition-string-condition-)|[LabelSelector](./LabelSelector.md)|Applies filter criteria to the labels.
[withIds(string[] ids)](#withids-string-ids-)|[LabelSelector](./LabelSelector.md)|Gets labels with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[LabelSelector](./LabelSelector.md)|Gets the top *n* labels that match the selection criteria.


## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of labels.

### Returns
|Type|Description|
|-|-
[LabelIterator](./LabelIterator.md)|An iterator used to iterate through the selected labels.


## <a name="orderby-string-orderby-"></a>orderBy(string orderBy)
Applies the specified ordering to the selected labels.

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-label-columns).
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns results in ascending order by the label's name.

`selector = selector.orderBy("Name");`

If you specify a count column, such as KeywordCount, the selector orders by count and then by name in ascending order.

[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]

### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[LabelSelector](./LabelSelector.md)|Selector with ordering applied.


## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the labels. 

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported columns](#supported-label-columns). 
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-label-columns"></a>
Supported columns for label filtering. The column names are case sensitive.

|Column|Type|Example
|-|-|-|-
Name|string|The label's name.<br /><br />`withCondition("Name = 'foo'")`
KeywordCount|string|The number of keywords associated with the label.<br /><br />`withCondition("KeywordCount > 5")`
AdCount|string|The number of ads associated with the label.<br /><br />`withCondition("AdCount > 5")`
AdGroupCount|string|The number of ad groups associated with the label.<br /><br />`withCondition("AdGroupCount > 5")`
CampaignCount|string|The number of campaigns associated with the label.<br /><br />`withCondition("CampaignCount > 5")`

### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to add to the selector.

### Returns
|Type|Description|
|-|-
[LabelSelector](./LabelSelector.md)|Selector with the condition applied.


## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets labels with the specified IDs.

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only label 33333.

```javascript
AdsApp.labels()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of label IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[LabelSelector](./LabelSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* labels that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of labels to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[LabelSelector](./LabelSelector.md)|Selector with limit applied.



## See also

- [AdsApp.label()](AdsApp.md)
- [LabelIterator](./LabelIterator.md)
- [Label](./Label.md)
- [Using labels](../examples/labels.md)

