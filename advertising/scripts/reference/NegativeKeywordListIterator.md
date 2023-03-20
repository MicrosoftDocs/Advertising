---
title: "NegativeKeywordListIterator object"
description: "Contains the methods for iterating through a list of negative keyword lists."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# NegativeKeywordListIterator

Contains the methods for iterating through a list of negative keyword lists. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all negative keyword
    // lists in the account.
    var iterator = AdsApp.negativeKeywordLists().get();

    // Loops through all lists in the account.
    while (iterator.hasNext()) {
        var nkwList = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether this iterator has more elements.
[next](#next)|[NegativeKeywordList](./NegativeKeywordList.md)|Advances the iterator and returns the next negative keyword list.
[totalNumEntities](#totalnumentities)|int|Gets the number of negative keywords lists that matched selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether this iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next negative keyword list.

### Returns
|Type|Description|
|-|-
[NegativeKeywordList](NegativeKeywordList.md)|The next negative keywords list in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of negative keywords lists that matched the selector's selection criteria. 

### Returns
|Type|Description|
|-|-
int|The number of negative keywords lists that matched the selector's selection criteria.


## See also
- [NegativeKeywordListSelector.get()](./NegativeKeywordListSelector.md#get)
- [NegativeKeywordList](./NegativeKeywordList.md)
