---
title: "UserListSelector object"
description: "Contains the methods for filtering and ordering the list of user lists to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# UserListSelector

Contains the methods for filtering and ordering a list of user lists in the account. For information about selectors, see [Selectors](../concepts/selectors.md).


## Methods
|Method Name|Return Type|Description|
|-|-|-
[get](#get)|[UserListIterator](./UserListIterator.md)|Gets an iterator used to iterate through the list of user lists.
[orderBy(string orderBy)](#orderby-string-orderby-)|[UserListSelector](./UserListSelector.md)|Applies the specified ordering to the selected user lists.
[withCondition(string condition)](#withcondition-string-condition-)|[UserListSelector](./UserListSelector.md)|Applies filter criteria to the user lists.
[withIds(string[] ids)](#withids-string-ids-)|[UserListSelector](./UserListSelector.md)|Gets user lists with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[UserListSelector](./UserListSelector.md)|Gets the top *n* user lists that match the selection criteria.


## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of user lists.

### Returns
|Type|Description|
|-|-
[UserListIterator](./UserListIterator.md)|An iterator used to iterate through the selected user lists.


## <a name="orderby-string-orderby-"></a>orderBy(string orderBy)
Applies the specified ordering to the selected user lists.

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-user list-columns).
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns results in ascending order by the user list's name.

`selector = selector.orderBy("Name");`

[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]

### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[UserListSelector](./UserListSelector.md)|Selector with ordering applied.


## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the user lists. 

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported columns](#supported-user list-columns). 
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-user list-columns"></a>
Supported columns for user list filtering. The column names are case sensitive.

|Column|Type|Example
|-|-|-|-
Description|string|The user list's description.<br /><br />`withCondition("Description = 'foo'")`
MembershipLifeSpan|int|How far back in time (number of days) Microsoft Advertising should look for actions that match this user list definition.<br /><br />`withCondition("MembershipLifeSpan > 10")`
Name|string|The user list's name.<br /><br />`withCondition("Name = 'foo'")`
SizeForAudienceNetwork|long|The user list's size in the Audience network.<br /><br />`withCondition("SizeForAudienceNetwork > 1000")`
SizeForSearch|long|The user list's size in the Audience network.<br /><br />`withCondition("SizeForSearch > 1000")`
Type|string|The user list's derived type. Possible case-sensitive values are: <ul><li>CUSTOM</li><li>CUSTOMER_LIST</li><li>IN_MARKET</li><li>LOGICAL</li><li>PRODUCT</li><li>RULE_BASED</li><li>SIMILAR</li></ul>This example returns only customer lists.<br /><br />`withCondition("Type = CUSTOMER_LIST")`

### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to add to the selector.

### Returns
|Type|Description|
|-|-
[UserListSelector](./UserListSelector.md)|Selector with the condition applied.


## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets user lists with the specified IDs.

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only user list 33333.

```javascript
AdsApp.userLists()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of user list IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[UserListSelector](./UserListSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* user lists that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of user lists to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[UserListSelector](./UserListSelector.md)|Selector with limit applied.



## See also

- [UserListIterator](./UserListIterator.md)
- [UserList](./UserList.md)
