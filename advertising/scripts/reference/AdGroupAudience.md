---
title: "AdGroupAudience object"
description: "Contains the methods used to manage an ad group audience association."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdGroupAudience

Contains the methods used to manage an ad group audience association.


## Methods
|Method Name|Return Type|Description|
|-|-|-
[bidding](#bidding)|[AudienceBidding](./AudienceBidding.md)|Gets the methods used to manage this association's bid modifier.
[enable](#enable)|void|Enables this association.
[getAdGroup](#getadgroup)|[AdGroup](AdGroup.md)|Get this association's ad group.
[getAudienceId](#getaudienceid)|string|Gets the associated audience's ID.
[getCampaign](#getcampaign)|[Campaign](./Campaign.md)|Gets the campaign that contains this association's ad group.
[getEntityType](#getentitytype)|string|Gets the entity's type, which is AdGroupAudience.
[getId](#getid)|string|Gets the ID that uniquely identifies this association.
[getName](#getname)|string|Gets the associated audience's name.
[getStats](#getstats)|[Stats](./Stats.md)|Gets this ad group audience's performance data.
[isEnabled](#isenabled)|Boolean|Gets a Boolean value that indicates whether this association is enabled.
[isPaused](#ispaused)|Boolean|Gets a Boolean value that indicates whether this association is paused.
[pause](#pause)|void|Pauses this association.
[remove](#remove)|void|Removes this association.


## <a name="bidding"></a>bidding
Gets the methods used to manage this association's bid modifier.

### Returns
|Type|Description|
|-|-
[AudienceBidding](./AudienceBidding.md)|Contains the methods used to manage an audience's bid modifier.


## <a name="enable"></a>enable
Enables this association.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="getadgroup"></a>getAdGroup
Gets this association's ad group.

### Returns
|Type|Description|
|-|-
[AdGroup](AdGroup.md)|The association's ad group.


## <a name="getaudienceid"></a>getAudienceId
Gets the associated audience's ID.

### Returns
|Type|Description|
|-|-
string|The associated audience's ID.


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
string|This entity's type, which is *AdGroupAudience*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this association.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this association.

## <a name="getname"></a>getName
Gets the audience's name.

### Returns
|Type|Description|
|-|-
string|The audience's name.


## <a name="getstats"></a>getStats
Gets this ad group audience's performance data. 

To call this method, you must include one of the `forDateRange` methods in the [ad group audience selector's](AdGroupAudienceSelector.md) chain.

### Returns
|Type|Description|
|-|-
[Stats](./Stats.md)|The ad group audience's performance data. 


## <a name="isenabled"></a>isEnabled
Gets a Boolean value that indicates whether this association is enabled.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this association is enabled; otherwise, **false**.


## <a name="ispaused"></a>isPaused
Gets a Boolean value that indicates whether this association is paused.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this association is paused; otherwise, **false**.


## <a name="pause"></a>pause
Pauses this association.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="remove"></a>remove
Removes this association.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

