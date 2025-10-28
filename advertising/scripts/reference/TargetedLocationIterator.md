---
title: "TargetedLocationIterator object"
description: "Contains the methods for iterating through a list of targeted locations."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# TargetedLocationIterator

Contains the methods for iterating through a list of targeted locations. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    var shoppingCampaign = AdsApp.shoppingCampaigns().withIds(["123456789"]).get().next();

    var iterator = shoppingCampaign.targeting().targetedLocations().get();

    while (iterator.hasNext()) {
        var targetedLocation = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether this iterator has more elements.
[next](#next)|[TargetedLocation](./TargetedLocation.md)|Advances the iterator and returns the next targeted location.
[totalNumEntities](#totalnumentities)|int|Gets the number of targeted locations that matched selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether this iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next targeted location.

### Returns
|Type|Description|
|-|-
[TargetedLocation](TargetedLocation.md)|The next targeted locations list in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of targeted locations lists that matched the selector's selection criteria. 

### Returns
|Type|Description|
|-|-
int|The number of targeted locations lists that matched the selector's selection criteria.


## See also
- [TargetedLocationSelector.get()](./TargetedLocationSelector.md#get)
- [TargetedLocation](./TargetedLocation.md)
