---
title: "KeywordIterator object"
description: "Contains the methods for iterating through a list of keywords."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# KeywordIterator
Contains the methods for iterating through a list of keywords. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all keywords
    // in the account.
    var iterator = AdsApp.keywords().get();

    // Loops through all keywords in the account.
    while (iterator.hasNext()) {
        var keyword = iterator.next();
    }
```


## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether this iterator has more elements.
[next](#next)|[Keyword](./Keyword.md)|Advances the iterator and returns the next keyword.
[totalNumEntities](#totalnumentities)|int|Gets the number of keywords that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether this iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next keyword.

### Returns
|Type|Description|
|-|-
[Keyword](./Keyword.md)|The next keyword in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of keywords that matched the selector's selection criteria.

### Returns
|Type|Description|
|-|-
int|The number of keywords that matched the selector's selection criteria.


## See also

- [KeywordSelector.get()](./KeywordSelector.md#get)
- [Keyword](./Keyword.md)
