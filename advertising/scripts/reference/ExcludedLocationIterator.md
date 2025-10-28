---
title: "ExcludedLocationIterator object"
description: "Contains the methods for iterating through a list of excluded locations."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# ExcludedLocationIterator

Contains the methods for iterating through a list of excluded locations. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    var shoppingCampaign = AdsApp.shoppingCampaigns().withIds(["123456789"]).get().next();

    var iterator = shoppingCampaign.targeting().excludedLocations().get();

    while (iterator.hasNext()) {
        var excludedLocation = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether this iterator has more elements.
[next](#next)|[ExcludedLocation](./ExcludedLocation.md)|Advances the iterator and returns the next excluded location.
[totalNumEntities](#totalnumentities)|int|Gets the number of excluded locations that matched selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether this iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next excluded location.

### Returns
|Type|Description|
|-|-
[ExcludedLocation](ExcludedLocation.md)|The next excluded location in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of excluded locations that matched the selector's selection criteria. 

### Returns
|Type|Description|
|-|-
int|The number of excluded locations that matched the selector's selection criteria.


## See also
- [ExcludedLocationSelector.get()](./ExcludedLocationSelector.md#get)
- [ExcludedLocation](./ExcludedLocation.md)
