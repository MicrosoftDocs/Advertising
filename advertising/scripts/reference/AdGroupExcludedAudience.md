---
title: "AdGroupExcludedAudience object"
description: "Contains the methods used to manage an ad group excluded audience association."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdGroupExcludedAudience

Contains the methods used to manage an ad group excluded audience association.


## Methods
|Method Name|Return Type|Description|
|-|-|-
[getAdGroup](#getadgroup)|[AdGroup](AdGroup.md)|Get this association's ad group.
[getAudienceId](#getaudienceid)|string|Gets the excluded audience's ID.
[getCampaign](#getcampaign)|[Campaign](./Campaign.md)|Gets the campaign that contains this association's ad group.
[getEntityType](#getentitytype)|string|Gets the entity's type, which is AdGroupExcludedAudience.
[getId](#getid)|string|Gets the ID that uniquely identifies this association.
[getName](#getname)|string|Gets the excluded audience's name.
[remove](#remove)|void|Removes this association.


## <a name="getadgroup"></a>getAdGroup
Gets this association's ad group.

### Returns
|Type|Description|
|-|-
[AdGroup](AdGroup.md)|The association's ad group.


## <a name="getaudienceid"></a>getAudienceId
Gets the excluded audience's ID.

### Returns
|Type|Description|
|-|-
string|The excluded audience's ID.


## <a name="getcampaign"></a>getCampaign
Get the campaign that contains this association's ad group.

### Returns
|Type|Description|
|-|-
[Campaign](./Campaign.md)|The campaign that contains this association's ad group.


## <a name="getentitytype"></a>getEntityType
Returns this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *AdGroupExcludedAudience*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this association.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this association.

## <a name="getname"></a>getName
Gets the excluded audience's name.

### Returns
|Type|Description|
|-|-
string|The excluded audience's name.


## <a name="remove"></a>remove
Removes this association.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

