---
title: "UserListIterator object"
description: "Contains the methods for iterating through a list of user lists."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# UserListIterator

Contains the methods for iterating through a list of user lists. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all user lists
    // in the account.
    var iterator = AdsApp.userLists().get();

    // Loops through all user lists in the account.
    while (iterator.hasNext()) {
        var userList = iterator.next();
    }
```


## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether this iterator has more elements.
[next](#next)|[UserList](./UserList.md)|Advances the iterator and returns the next user list.
[totalNumEntities](#totalnumentities)|int|Gets the number of user lists that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether this iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next user list.

### Returns
|Type|Description|
|-|-
[UserList](./UserList.md)|The next user list in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of user lists that matched the selector's selection criteria.

### Returns
|Type|Description|
|-|-
int|The number of user lists that matched the selector's selection criteria.


## See also

- [UserListSelector.get()](./UserListSelector.md#get)
- [UserList](./UserList.md)
