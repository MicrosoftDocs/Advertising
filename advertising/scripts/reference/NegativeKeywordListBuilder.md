---
title: "NegativeKeywordListBuilder object"
description: "Contains the methods for defining a negative keyword list."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# NegativeKeywordListBuilder

Contains the methods for defining and creating a negative keyword list. For information about builders, see [Builders](../concepts/builders.md).

Example usage:
```javascript
     var operation = AdsApp.newNegativeKeywordListBuilder()
        .withName("NKW NAME GOES HERE")
        .build();

    // See the Builders topic for performance considerations
    // when using the operation object's methods.
    if (!operation.isSuccessful()) {
        for (var error of operation.getErrors()) {
            Logger.log(`${error}\n`);
        }
    }
```


## Methods
|Method Name|Return Type|Description|
|-|-|-
[build](#build)|[NegativeKeywordListOperation](./NegativeKeywordListOperation.md)|Creates the negative keyword list and returns an operation object used to check whether the list was successfully added.
[withName(string name)](#withname-string-name-)|[NegativeKeywordListBuilder](./NegativeKeywordListBuilder.md)|Sets this negative keyword list's name.

## <a name="build"></a>build
Creates the negative keyword list and returns an operation object used to check whether the list was successfully added.

### Returns
|Type|Description|
|-|-
[NegativeKeywordListOperation](./NegativeKeywordListOperation.md)|An operation object used to check whether the list was successfully added.

## <a name="withname-string-name-"></a>withName(string name)
Sets this negative keyword list's name.

### Arguments
|Name|Type|Description|
|-|-|-
name|string|The name of the negative keyword list. The name may contain a maximum of 255 characters.

### Returns
|Type|Description|
|-|-
[NegativeKeywordListBuilder](./NegativeKeywordListBuilder.md)|The negative keyword list builder with the name applied.

