---
title: "AdParamSelector object"
description: "Contains the methods for filtering the list of substitution parameters to return."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdParamSelector


Contains the methods used to get a list of substitution parameters. For information about selectors, see [Selectors](../concepts/selectors.md).


## Methods

|Method Name|Return Type|Description|
|-|-|-
[get](#get)|[AdParamIterator](AdParamIterator.md)|Gets an iterator used to iterate through the list of substitution parameters.



## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of substitution parameters.

### Returns
|Type|Description|
|-|-
[AdParamIterator](AdParamIterator.md)|An iterator used to iterate through the substitution parameters.


## See also

- [Keyword.adParams()](Keyword.md#adparams)
