---
title: "NegativeKeywordList object"
description: "Contains the methods for adding keywords to a negative keywords list."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# NegativeKeywordList

Contains the methods for adding keywords to a negative keywords list. For information about negative keyword lists, see [Negative Keywords](/advertising/guides/entity-hierarchy-limits#negativekeywords).

## Methods
|Method Name|Return Type|Description|
|-|-|-
[addNegativeKeyword(string keywordText)](#addnegativekeyword-string-keywordtext-)|void|Adds a keyword to this negative keywords list.
[addNegativeKeywords(string[] keywordTexts)](#addnegativekeywords-string-keywordtexts-)|void|Adds a list of keywords to this negative keywords list.
[campaigns](#campaigns)|[CampaignSelector](./CampaignSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of campaigns that the negative keyword list is associated with.
[getEntityType](#getentitytype)|String|Gets this entity's type.
[getId](#getid)|string|Gets the ID that uniquely identifies this negative keyword list.
[getName](#getname)|String|Gets this negative keyword list's name.
[setName(string name)](#setname-string-name-)|void|Sets this negative keyword list's name.


## <a name="addnegativekeyword-string-keywordtext-"></a>addNegativeKeyword(string keywordText)
Adds a keyword to this negative keyword list. For information about negative keyword limits, see [Negative keywords](/advertising/guides/entity-hierarchy-limits#negativekeywords). 

To specify the match type for negative keywords:

- For phrase match, use quotes around the keyword. For example:  
  
  `nkwList.addNegativeKeyword("\"books\"")`  
  
- For exact match, use square brackets around the keyword. For example:  
  
  `nkwList.addNegativeKeyword("[hardcover books]")`

If the keyword does not include match-type syntax, phrase match type is assumed (broad match type is not supported).

### Arguments
|Name|Type|Description|
|-|-|-
keywordText|String|The negative keyword's text. Negative keywords may contain a maximum of 100 characters. 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="addnegativekeywords-string-keywordtexts-"></a>addNegativeKeywords(string[] keywordTexts)
Adds a list of keywords to this negative keyword list. For information about negative keyword limits, see [Negative keywords](/advertising/guides/entity-hierarchy-limits#negativekeywords).

To specify the match type for negative keywords:

- For phrase match, use quotes around the keyword. For example:  
  
  `nkwList.addNegativeKeywords(["\"trucks\"", "\"cars\""])`.  
  
- For exact match, use square brackets around the keyword. For example:  
  
  `nkwList.addNegativeKeywords(["[offroad trucks]", "[sport cars]"])`.

If the keyword does not include match-type syntax, phrase match type is assumed (broad match type is not supported).

### Arguments
|Name|Type|Description|
|-|-|-
keywordTexts|string[]|An array of keyword strings. The array may contain a maximum of 5,000 keywords and each keyword may contain a maximum of 100 characters.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="campaigns"></a>campaigns

Gets a [selector](../concepts/selectors.md) used to filter the list of campaigns that the negative keyword list is associated with. 

### Returns

|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|A selector used to filter the list of campaigns that the negative keyword list is associated with.


## <a name="getentitytype"></a>getEntityType
Returns this entity's type. 

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *NegativeKeywordList*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this negative keyword list.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this negative keyword list.


## <a name="getname"></a>getName
Gets this negative keyword list's name.

### Returns
|Type|Description|
|-|-
string|The name of this negative keyword list.


## <a name="setname-string-name-"></a>setName(string name)
Sets this negative keyword list's name.

### Arguments
|Name|Type|Description|
|-|-|-
name|string|The list's name. The name may contain a maximum of 255 characters.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

