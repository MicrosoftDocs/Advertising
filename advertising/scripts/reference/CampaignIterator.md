---
title: "CampaignIterator object"
description: "Contains the methods for iterating through a list of campaigns."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# CampaignIterator

Contains the methods for iterating through a list of campaigns. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all campaigns
    // in the account.
    var iterator = AdsApp.campaigns().get();

    // Loops through all campaigns in the account.
    while (iterator.hasNext()) {
        var campaign = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether the iterator has more elements.
[next](#next)|[Campaign](./Campaign.md)|Advances the iterator and returns the next campaign.
[totalNumEntities](#totalnumentities)|int|Gets the number of campaigns that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether the iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if the iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next campaign.

### Returns
|Type|Description|
|-|-
[Campaign](Campaign.md)|The next campaign in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of campaigns that matched the selector's selection criteria. 

### Returns:
|Type|Description|
|-|-
int|The number of campaigns that matched the selector's selection criteria.



## See also
- [CampaignSelector.get()](CampaignSelector.md#get)
- [Campaign](Campaign.md)
