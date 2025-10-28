---
title: "LabelIterator object"
description: "Contains the methods for iterating through a list of labels."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# LabelIterator

Contains the methods for iterating through a list of labels. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all labels
    // in the account.
    var iterator = AdsApp.labels().get();

    // Loops through all labels in the account.
    while (iterator.hasNext()) {
        var label = iterator.next();
    }
```


## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether this iterator has more elements.
[next](#next)|[Label](./Label.md)|Advances the iterator and returns the next label.
[totalNumEntities](#totalnumentities)|int|Gets the number of labels that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether this iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next label.

### Returns
|Type|Description|
|-|-
[Label](./Label.md)|The next label in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of labels that matched the selector's selection criteria.

### Returns
|Type|Description|
|-|-
int|The number of labels that matched the selector's selection criteria.


## See also

- [LabelSelector.get()](./LabelSelector.md#get)
- [Label](./Label.md)


