---
title: "AdGroupAudienceIterator object"
description: "Contains the methods for iterating through a list of ad group audiences."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdGroupAudienceIterator

Contains the methods for iterating through a list of ad group audiences. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all ad groups
    // in the account.
    var iterator = AdsApp.adGroups().get();

    // Loops through all ad groups in the account.
    while (iterator.hasNext()) {
        var adGroup = iterator.next();

        // Gets the iterator that iterates all ad group audiences
        // in the ad group.
        var audienceIterator = adGroup.targeting().audiences().get();
    
        // Loops through all ad group audiences in the ad group.
        while (audienceIterator.hasNext()) {
            var audience = audienceIterator.next();
        }
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether the iterator has more elements.
[next](#next)|[AdGroupAudience](./AdGroupAudience.md)|Advances the iterator and returns the next ad group audience.
[totalNumEntities](#totalnumentities)|int|Gets the number of ad group audiences that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether the iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if the iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next ad group audience.

### Returns
|Type|Description|
|-|-
[AdGroupAudience](./AdGroupAudience.md)|The next ad group audience in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of ad group audiences that matched the selector's selection criteria. 

### Returns
|Type|Description|
|-|-
int|The number of ad group audiences that matched the selector's selection criteria.



## See also
- [AdGroupSelector.get()](./AdGroupSelector.md#get)
- [AdGroup](./AdGroup.md)
