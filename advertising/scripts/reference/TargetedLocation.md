---
title: "TargetedLocation object"
description: "Contains the methods for managing location targets."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# TargetedLocation

Contains the methods for managing location targets. For information about location criteria, see [Show ads to your target audience](/advertising/guides/show-ads-target-audience) and [Geographical Location Codes](/advertising/guides/geographical-location-codes).

## Methods
|Method Name|Return Type|Description|
|-|-|-
[getAdGroup](#getadgroup)|[AdGroup](./AdGroup.md)|Gets the ad group that this targeted location belongs to.
[getBidModifier](#getbidmodifier)|double|Gets the bid modifier for this targeted location.
[getCampaign](#getcampaign)|[Campaign](./Campaign.md)|Gets the campaign that this targeted location belongs to.
[getCampaignType](#getcampaigntype)|string|Gets the type of campaign that this targeted location belongs to.
[getCountryCode](#getcountrycode)|string|Gets the country code of this targeted location.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getId](#getid)|string|Gets the ID that uniquely identifies this targeted location.
[getName](#getname)|string|Gets this targeted location's name.
[getStats](#getstats)|[Stats](./Stats.md)|Gets this targeted locations's performance data.
[getTargetType](#gettargettype)|string|Gets the target type of this targeted location.
[getTargetingStatus](#gettargetingstatus)|string|Gets the targeting status of this targeted location.
[remove](#remove)|void|Removes the targeted location.
[setBidModifier](#setbidmodifier-double-modifier)|void|Sets the bid modifier for this targeted location.



## <a name="getadgroup"></a>getAdGroup
Gets the ad group that this targeted location belongs to. 

> [!NOTE]
> This method is not supported with campaign level targeted locations. 

### Returns
|Type|Description|
|-|-
[AdGroup](./AdGroup.md)|The ad group that this targeted location belongs to.


## <a name="getbidmodifier"></a>getBidModifier
Gets the bid modifier for this targeted location. 

### Returns
|Type|Description|
|-|-
double|The bid modifier for this targeted location.


## <a name="getcampaign"></a>getCampaign
Gets the campaign that this targeted location belongs to. 

### Returns
|Type|Description|
|-|-
[Campaign](./Campaign.md)|The campaign that this targeted location belongs to.


## <a name="getcampaigntype"></a>getCampaignType
Gets the type of campaign that this targeted location belongs to. 

Possible values include Audience, DynamicSearchAds, Search, and Shopping. 

### Returns
|Type|Description|
|-|-
string|The type of campaign that this targeted location belongs to.


## <a name="getcountrycode"></a>getCountryCode
Gets the country code of this targeted location. 

### Returns
|Type|Description|
|-|-
string|The country code of this targeted location.


## <a name="getentitytype"></a>getEntityType
Returns this entity's type. 

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *TargetedLocation*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this targeted location.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this targeted location.<br/><br/>Location IDs can be shared across campaigns and ad groups. Use the entity ID (campaign or ad group) as well as the location ID to uniquely identify a targeted location. 


## <a name="getname"></a>getName
Gets this targeted location's name.

### Returns
|Type|Description|
|-|-
string|The name of this targeted location.


## <a name="getstats"></a>getStats
Gets this targeted locations's performance data.

To call this method, you must include one of the `forDateRange` methods in the [targeted location selector's](TargetedLocationSelector.md) chain.

### Returns
|Type|Description|
|-|-
[Stats](./Stats.md)|The targeted location's performance data. For example, clicks and impressions.


## <a name="gettargettype"></a>getTargetType
Gets the target type of this targeted location.

### Returns
|Type|Description|
|-|-
string|The target type of this targeted location.


## <a name="gettargetingstatus"></a>getTargetingStatus
Gets the targeting status of this targeted location.

### Returns
|Type|Description|
|-|-
string|The targeting status of this targeted location.


## <a name="remove"></a>remove
Removes this targeted location.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setbidmodifier-double-modifier"></a>setbidmodifier(double modifier)
Sets the bid modifier for this targeted location.

### Arguments
|Name|Type|Description|
|-|-|-
modifier|double|The modifier value is applied to bids which match this targeted location. For example, a modifier value of 1.4 increases the bid to 140% of its original value, and changes a bid of $2 to $2.80.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

