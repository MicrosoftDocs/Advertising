---
title: "AssetGroupIterator object"
description: "Contains the methods for iterating through a list of asset groups."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AssetGroupIterator

Contains the methods for iterating through a list of asset groups. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all asset groups
    // in the account.
    var iterator = AdsApp.assetGroups().get();

    // Loops through all asset groups in the account.
    while (iterator.hasNext()) {
        var assetGroup = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether the iterator has more elements.
[next](#next)|[AssetGroup](./AssetGroup.md)|Advances the iterator and returns the next asset group.
[totalNumEntities](#totalnumentities)|int|Gets the number of asset groups that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether the iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if the iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next asset group.

### Returns
|Type|Description|
|-|-
[AssetGroup](./AssetGroup.md)|The next asset group in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of asset groups that matched the selector's selection criteria. 

### Returns
|Type|Description|
|-|-
int|The number of asset groups that matched the selector's selection criteria.



## See also
- [AssetGroupSelector.get()](./AssetGroupSelector.md#get)
- [AssetGroup](./AssetGroup.md)
