---
title: "AdIterator object"
description: "Contains the methods for iterating through a list of ads."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---


# AdIterator

Contains the methods for iterating through a list of ads. For information about iterators, see [Iterators](../concepts/iterators.md).



## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether the iterator has more elements.
[next](#next)|[Ad](./Ad.md)|Advances the iterator and returns the next ad.
[totalNumEntities](#totalnumentities)|int|Gets the number of ads that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether the iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if the iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next ad.

### Returns
|Type|Description|
|-|-
[Ad](./Ad.md)|The next ad in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of ads that matched the selector's selection criteria. 

### Returns
|Type|Description|
|-|-
int|The number of ads that matched the selector's selection criteria.



## See also
- [AdSelector.get()](./AdSelector.md#get)
- [Ad](./Ad.md)
