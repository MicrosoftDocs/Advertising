---
title: "ProductGroupIterator"
subtitle: "Scripts"
description: "Contains the methods for iterating through a list of product groups."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# ProductGroupIterator

Contains the methods for iterating through a list of product groups. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all product groups
    // in the account.
    var iterator = AdsApp.productGroups().get();

    // Loops through all product groups in the account.
    while (iterator.hasNext()) {
        var group = iterator.next();
    }
}
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether this iterator has more elements.
[next](#next)|[ProductGroup](./ProductGroup.md)|Advances the iterator and returns the next product group.
[totalNumEntities](#totalnumentities)|int|Gets the number of product groups that matched selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether this iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next product group.

### Returns
|Type|Description|
|-|-
[ProductGroup](ProductGroup.md)|The next product group in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of product groups that matched the selector's selection criteria. 

### Returns
|Type|Description|
|-|-
int|The number of product groups that matched the selector's selection criteria.


## See also
- [ProductGroupSelector.get()](./ProductGroupSelector.md#get)
