---
title: "Label object"
description: "Contains the methods for managing a Label."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Label

Contains the methods for managing a label. For information about labels, see [Labels](/advertising/guides/entity-hierarchy-limits#label).


## Methods
|Method Name|Return Type|Description|
|-|-|-
[ads](#ads)|[AdSelector](./AdSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of ads associated with this label.
[adGroups](#adgroups)|[AdGroupSelector](./AdGroupSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of ad groups associated with this label.
[campaigns](#campaigns)|[CampaignSelector](./CampaignSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of campaigns associated with this label.
[getColor](#getcolor)|string|Gets the background color that's used in the UX for this label.
[getDescription](#getdescription)|string|Gets the label's description.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getId](#getid)|string|Gets the ID that uniquely identifies this label.
[getName](#getname)|string|Gets the label's name.
[keywords](#keywords)|[KeywordSelector](./KeywordSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of keywords associated with this label.
[remove](#remove)|void|Removes this label.
[setColor(string color)](#setcolor-string-color-)|void|Sets the background color to use in the UX for this label.
[setDescription(string description)](#setdescription-string-description-)|void|Sets the label's description.
[setName(string name)](#setname-string-name-)|void|Sets label's name.




## <a name="ads"></a>ads

Gets a [selector](../concepts/selectors.md) used to filter the list of ads associated with this label. 

### Returns

|Type|Description|
|-|-
[AdSelector](./AdSelector.md)|A selector used to filter the list of ads associated with this label.


## <a name="adgroups"></a>adGroups

Gets a [selector](../concepts/selectors.md) used to filter the list of ad groups associated with this label. 

### Returns

|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|A selector used to filter the list of ad groups associated with this label.


## <a name="campaigns"></a>campaigns

Gets a [selector](../concepts/selectors.md) used to filter the list of campaigns associated with this label. 

### Returns

|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|A selector used to filter the list of campaigns associated with this label.


## <a name="getcolor"></a>getColor
Gets the background color that's used in the UX for this label.

### Returns
|Type|Description|
|-|-
string|The background color that's used in the UX for this label. The color is always returned in the form, #RRGGBB. For example, if you set color to red, this method returns #FF0000.


## <a name="getdescription"></a>getDescription
Gets the label's description.

### Returns
|Type|Description|
|-|-
string|The label's description.


## <a name="getname"></a>getName
Gets the label's name.

### Returns
|Type|Description|
|-|-
string|The label's name.


## <a name="getentitytype"></a>getEntityType
Returns this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *Label*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this label.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this label.


## <a name="keywords"></a>keywords

Gets a [selector](../concepts/selectors.md) used to filter the list of keywords associated with this label. 

### Returns

|Type|Description|
|-|-
[KeywordSelector](./KeywordSelector.md)|A selector used to filter the list of keywords associated with this label.


## <a name="remove"></a>remove
Removes this label.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setcolor-string-color-"></a>setColor(string color)
Sets the background color to use in the UX for this label.

### Arguments
|Name|Type|Description|
|-|-|-
color|The background color to use in the UX for this label. You may specify the color using:<ul><li>A three-byte hexadecimal number in the form, #RRGGBB. For example, #CB0400.</li><li>One of the 16 known CSS color names. For example, aqua, yellow, and fuchsia.</li></ul>Consider accessability when choosing the color.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setdescription-string-description-"></a>setDescription(string description)
Sets the label's description.

### Arguments
|Name|Type|Description|
|-|-|-
description|A description that describes the label's use. The maximum size is 200 characters. To remove a description, use an empty string ("").

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setname-string-name-"></a>setName(string name)
Sets the label's name.

### Arguments
|Name|Type|Description|
|-|-|-
name|The label's new name. The name is case sensitive and must be unique within the account. The maximum size is 80 characters. The method trims leading and trailing whitespace from the name. To get a list of label names already used in this account, see [AdsApp.labels](AdsApp.md#labels).

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## See also

- [LabelSelector](./LabelSelector.md)
- [LabelIterator](./LabelIterator.md)
- [AdsApp.createLabel](./AdsApp.md#createlabel-string-name-string-description-string-backgroundcolor-)
- [Keyword.labels](./Keyword.md#labels)
- [Using labels](../examples/labels.md)
