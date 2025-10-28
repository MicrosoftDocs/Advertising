---
title: "AdParam object"
description: "Contains the methods used to manage the substitution parameter."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# AdParam

Contains the methods used to manage the substitution parameters used in the keyword.

## Methods
|Method Name|Return Type|Description|
|-|-|-
[getAdGroup](#getadgroup)|[AdGroup](AdGroup.md)|Gets the ad group that the keyword associated with this substitution parameter belongs to.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getIndex](#getindex)|int|Gets the index that identifies this substitution parameter.
[getInsertionText](#getinsertiontext)|string|Gets the substitution parameter's text.
[getKeyword](#getkeyword)|[Keyword](Keyword.md)|Gets the keyword that the substitution parameter applies to.
[remove](#remove)|void|Removes the substitution parameter from the keyword.
[setInsertionText(string insertionText)](#setinsertiontext-string-insertiontext-)|void|Sets the substitution parameter's text.


## <a name="getadgroup"></a>getAdGroup
Gets the ad group that the keyword associated with this substitution parameter belongs to.

### Returns
|Type|Description|
|-|-
[AdGroup](AdGroup.md)|The ad group that the keyword associated with this substitution parameter belongs to.


## <a name="getentitytype"></a>getEntityType
Gets this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *AdParam*.


## <a name="getindex"></a>getIndex
Gets the index that identifies this substitution parameter.

### Returns
|Type|Description|
|-|-
int|The index that identifies this substitution parameter.


## <a name="getinsertiontext"></a>getInsertionText
Gets the substitution parameter's text.

### Returns
|Type|Description|
|-|-
string|The substitution parameter's text.


## <a name="getkeyword"></a>getKeyword
Gets the keyword that the substitution parameter applies to.

### Returns
|Type|Description|
|-|-
[Keyword](Keyword.md)|The keyword that the substitution parameter applies to.


## <a name="remove"></a>remove
Removes the substitution parameter from the keyword.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

## <a name="setinsertiontext-string-insertiontext-"></a>setInsertionText(string insertionText)
Sets the substitution parameter's text.

### Arguments
|Name|Type|Description|
|-|-|-
insertionText|string|The text to set the substitution parameter to.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

