---
title: "NegativeKeywordListSelector object"
description: "Contains the methods for filtering the list of negative keyword lists to return."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# NegativeKeywordListSelector

Contains the methods for filtering and ordering negative keywords lists. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var iterator = AdsApp.negativeKeywordLists()
        .withCondition("MemberCount > 10")
        .orderBy("Name")
        .get();

    while (iterator.hasNext()) {
        var nkwList = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[get](#get)|[NegativeKeywordListIterator](./NegativeKeywordListIterator.md)|Gets an iterator used to iterate through the list of negative keywords lists.
[orderBy(string orderBy)](#orderby-string-orderby-)|[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Applies the specified ordering to the selected negative keywords lists.
[withCondition(string condition)](#withcondition-string-condition-)|[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Applies filter criteria to the negative keywords lists.
[withIds(string[] ids)](#withids-string-ids-)|[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Gets negative keywords lists with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Gets the top *n* negative keywords lists that match the selection criteria.


## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) uses to iterate through the list of negative keywords lists.

### Returns
|Type|Description|
|-|-
[NegativeKeywordListIterator](./NegativeKeywordListIterator.md)|An iterator used to iterate through the negative keywords lists.


## <a name="orderby-string-orderby-"></a>orderBy(string orderBy)
Applies the specified ordering to the selected negative keywords lists. 

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-negative-keyword-list-columns)
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns negative keywords lists in ascending order by MemberCount.

`selector = selector.orderBy("MemberCount");`

[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]

### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Selector with ordering applied.


## <a name="withcondition-string-condition-"></a>withCondition(string condition)
Applies filter criteria to the negative keywords lists. 

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported columns](#supported-negative-keyword-list-columns).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-negative-keyword-list-columns"></a>
Supported Columns. The column names are case sensitive.

|Column|Type|Example|
|-|-|-|-
MemberCount|int|The number of negative keywords in the list.<br /><br />`withCondition("MemberCount > 10")`
Name|string|The negative keyword list's name.<br /><br />`withCondition("Name = 'LIST NAME GOES HERE'")`
ReferenceCount|int|The number of campaigns the list is associated with.<br /><br />`withCondition("ReferenceCount > 10")`
SharedSetId|double|The ID of a negative keyword list. If you simply use this for equality comparison, consider using the `withIds` method instead.<br /><br />`withCondition("SharedSetId = 123456789")`

### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to add to the selector.

### Returns
|Type|Description|
|-|-
[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Selector with the condition applied.


## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets negative keywords lists with the specified IDs.

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only negative keywords list 33333.

```javascript
AdsApp.negativeKeywordLists()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of negative keyword lists IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Selector with the IDs applied.


## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* negative keywords lists that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of negative keywords lists to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Selector with limit applied.



## See also
- [NegativeKeywordListIterator](./NegativeKeywordListIterator.md)
- [NegativeKeywordList](./NegativeKeywordList.md)
