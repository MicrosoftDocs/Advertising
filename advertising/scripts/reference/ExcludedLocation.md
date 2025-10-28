---
title: "ExcludedLocation object"
description: "Contains the methods for managing location exclusions."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# ExcludedLocation

Contains the methods for managing location exclusions. For information about location criteria, see [Show ads to your target audience](/advertising/guides/show-ads-target-audience) and [Geographical Location Codes](/advertising/guides/geographical-location-codes).

## Methods
|Method Name|Return Type|Description|
|-|-|-
[getAdGroup](#getadgroup)|[AdGroup](./AdGroup.md)|Gets the ad group that this excluded location belongs to.
[getCampaign](#getcampaign)|[Campaign](./Campaign.md)|Gets the campaign that this excluded location belongs to.
[getCampaignType](#getcampaigntype)|string|Gets the type of campaign that this excluded location belongs to.
[getCountryCode](#getcountrycode)|string|Gets the country code of this excluded location.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getId](#getid)|string|Gets the ID that uniquely identifies this excluded location.
[getName](#getname)|string|Gets this excluded location's name.
[getTargetType](#gettargettype)|string|Gets the target type of this excluded location.
[getTargetingStatus](#gettargetingstatus)|string|Gets the targeting status of this excluded location.
[remove](#remove)|void|Removes the excluded location.



## <a name="getadgroup"></a>getAdGroup
Gets the ad group that this excluded location belongs to. 

> [!NOTE]
> This method is not supported with campaign level excluded locations. 

### Returns
|Type|Description|
|-|-
[AdGroup](./AdGroup.md)|The ad group that this excluded location belongs to.


## <a name="getcampaign"></a>getCampaign
Gets the campaign that this excluded location belongs to. 

### Returns
|Type|Description|
|-|-
[Campaign](./Campaign.md)|The campaign that this excluded location belongs to.


## <a name="getcampaigntype"></a>getCampaignType
Gets the type of campaign that this excluded location belongs to. 

Possible values include Audience, DynamicSearchAds, Search, and Shopping. 

### Returns
|Type|Description|
|-|-
string|The type of campaign that this excluded location belongs to.


## <a name="getcountrycode"></a>getCountryCode
Gets the country code of this excluded location. 

### Returns
|Type|Description|
|-|-
string|The country code of this excluded location.


## <a name="getentitytype"></a>getEntityType
Returns this entity's type. 

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *ExcludedLocation*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this excluded location.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this excluded location.<br/><br/>Location IDs can be shared across campaigns and ad groups. Use the entity ID (campaign or ad group) as well as the location ID to uniquely identify an excluded location. 


## <a name="getname"></a>getName
Gets this excluded location's name.

### Returns
|Type|Description|
|-|-
string|The name of this excluded location.


## <a name="gettargettype"></a>getTargetType
Gets the target type of this excluded location.

### Returns
|Type|Description|
|-|-
string|The target type of this excluded location.


## <a name="gettargetingstatus"></a>getTargetingStatus
Gets the targeting status of this excluded location.

### Returns
|Type|Description|
|-|-
string|The targeting status of this excluded location.


## <a name="remove"></a>remove
Removes this excluded location.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


