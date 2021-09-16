---
title: "CampaignExcludedAudience object"
description: "Contains the methods used to manage a campaign excluded audience association."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# CampaignExcludedAudience

Contains the methods used to manage a campaign excluded audience association.


## Methods
|Method Name|Return Type|Description|
|-|-|-
[getAudienceId](#getaudienceid)|string|Gets the excluded audience's ID.
[getCampaign](#getcampaign)|[Campaign](./Campaign.md)|Get this association's campaign.
[getEntityType](#getentitytype)|string|Gets the entity's type, which is CampaignExcludedAudience.
[getId](#getid)|string|Gets the ID that uniquely identifies this association.
[getName](#getname)|string|Gets the excluded audience's name.
[remove](#remove)|void|Removes this association.


## <a name="getaudienceid"></a>getAudienceId
Gets the excluded audience's ID.

### Returns
|Type|Description|
|-|-
string|The excluded audience's ID.


## <a name="getcampaign"></a>getCampaign
Get this association's campaign.

### Returns
|Type|Description|
|-|-
[Campaign](./Campaign.md)|The association's campaign.


## <a name="getentitytype"></a>getEntityType
Returns this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *CampaignExcludedAudience*.


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

