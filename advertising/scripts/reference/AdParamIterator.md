---
title: "AdParamIterator object"
description: "Contains the methods for iterating through a list of substitution parameters."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdParamIterator

Contains the methods for iterating through a list of substitution parameters. For information about iterators, see [Iterators](../concepts/iterators.md).


## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether the iterator has more elements.
[next](#next)|[AdParam](AdParam.md)|Advances the iterator and returns the next substitution parameter.
[totalNumEntities](#totalnumentities)|int|Gets the number of substitution parameters that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether the iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if the iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next substitution parameter.

### Returns
|Type|Description|
|-|-
[AdParam](AdParam.md)|The next substitution parameter in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of substitution parameters that matched the selector's selection criteria. 

[!INCLUDE[reads-limit](../includes/reads-limit.md)]

### Returns
|Type|Description|
|-|-
int|The number of substitution parameters that matched the selector's selection criteria.



## See also
- [AdParamSelector.get()](AdParamSelector.md#get)
- [AdParam](AdParam.md)
