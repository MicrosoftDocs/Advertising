---
title: "AssetGroup object"
description: "Contains the methods used in single-account scripts to manage the asset group."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# AssetGroup

Contains the methods used to manage an [asset group](/advertising/guides/entity-hierarchy-limits#asset-groups).

## Methods
|Method Name|Return Type|Description|
|-|-|-
[enable](#enable)|void|Enabless this asset group.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getId](#getid)|string|Gets the ID that uniquely identifies this asset group.
[getName](#getname)|string|Gets this asset group's name.
[getPerformanceMaxCampaign](#getperformancemaxcampaign)|[Campaign](Campaign.md)|Gets this asset group's campaign.
[isEnabled](#isenabled)|Boolean|Gets a Boolean value that indicates whether this asset group is enabled.
[isPaused](#ispaused)|Boolean|Gets a Boolean value that indicates whether this asset group is paused.
[isRemoved](#isremoved)|Boolean|Gets a Boolean value that indicates whether this asset group is removed.
[pause](#pause)|void|Pauses this asset group.
[remove](#remove)|void|Removes this asset group.
[setName(String name)](#setname-string-name)|void|Sets the asset group's name.
[urls](#urls)|[AssetGroupUrls](./AssetGroupUrls.md)|Contains the methods used to manage this asset group's final URLs, tracking template, and custom parameters.


## <a name="enable"></a>enable
Enables this asset group.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="getentitytype"></a>getEntityType
Gets this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *AssetGroup*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this asset group.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this asset group.


## <a name="getname"></a>getName
Gets this asset group's name.

### Returns
|Type|Description|
|-|-
string|The name of this asset group.


## <a name="getperformancemaxcampaign"></a>getPerformanceMaxCampaign
Gets the campaign that this asset group belongs to.

### Returns
|Type|Description|
|-|-
[Campaign](Campaign.md)|The campaign that this asset group belongs to.


## <a name="isenabled"></a>isEnabled
Gets a Boolean value that indicates whether this asset group is enabled.

### Returns:
|Type|Description|
|-|-
Boolean|Is **true** if this asset group is enabled; otherwise, **false**.


## <a name="ispaused"></a>isPaused
Gets a Boolean value that indicates whether this asset group is paused.

### Returns:
|Type|Description|
|-|-
Boolean|Is **true** if this asset group is paused; otherwise, **false**.


## <a name="isremoved"></a>isRemoved
Gets a Boolean value that indicates whether this asset group is removed (deleted).

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this asset group is removed; otherwise, **false**.


## <a name="pause"></a>pause
Pauses this asset group.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="remove"></a>remove
Removes this asset group.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setname-string-name"></a>setName(string name)
Sets this asset group's name.

### Arguments
|Name|Type|Description|
|-|-|-
name|string|The name of this asset group. The name may contain a maximum of 256 characters and must be unique amongst all asset groups in the campaign.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="urls"></a>urls
Contains the methods used to manage this asset group's final URLs, tracking template, and custom parameters.

### Returns
|Type|Description|
|-|-
[AssetGroupUrls](AssetGroupUrls.md)|The object used to manage this asset group's final URLs, tracking template, and custom parameters.


## See also

- [AdGroupIterator.next()](AdGroupIterator.md#next)