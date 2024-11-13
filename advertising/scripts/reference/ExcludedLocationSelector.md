---
title: "ExcludedLocationSelector object"
description: "Contains the methods for filtering the list of excluded locations to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# ExcludedLocationSelector

Contains the methods for filtering and ordering excluded locations. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var shoppingCampaign = AdsApp.shoppingCampaigns().withIds(["123456789"]).get().next();

    var iterator = shoppingCampaign.targeting().excludedLocations()
        .withLimit(10)
        .get();

    while (iterator.hasNext()) {
        var excludedLocation = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[get](#get)|[ExcludedLocationIterator](./ExcludedLocationIterator.md)|Gets an iterator used to iterate through the list of excluded locations.
[withLimit(int limit)](#withlimit-int-limit-)|[ExcludedLocationSelector](./ExcludedLocationSelector.md)|Gets the top *n* excluded locations that match the selection criteria.


## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) uses to iterate through the list of excluded locations.

### Returns
|Type|Description|
|-|-
[ExcludedLocationIterator](./ExcludedLocationIterator.md)|An iterator used to iterate through the excluded locations.


## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* excluded locations that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of excluded locations to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[ExcludedLocationSelector](./ExcludedLocationSelector.md)|Selector with limit applied.



## See also
- [ExcludedLocationIterator](./ExcludedLocationIterator.md)
- [ExcludedLocation](./ExcludedLocation.md)
