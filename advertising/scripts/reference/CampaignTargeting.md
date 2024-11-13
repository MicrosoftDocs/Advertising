---
title: "CampaignTargeting object"
description: "Contains the methods for managing campaign criteria: audience and location targeting."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# CampaignTargeting

Contains the methods for managing campaign criteria: audience and location targeting.


## Methods
|Method Name|Return Type|Description|
|-|-|-
[audiences](#audiences)|[CampaignAudienceSelector](./CampaignAudienceSelector.md)|A selector for [CampaignAudience](./CampaignAudience.md) criteria.
[excludedAudiences](#excludedaudiences)|[CampaignExcludedAudienceSelector](./CampaignExcludedAudienceSelector.md)|A selector for [CampaignExcludedAudience](./CampaignExcludedAudience.md) criteria.
[excludedLocations](#excludedlocations)|[ExcludedLocationSelector](./ExcludedLocationSelector.md)|A selector for [ExcludedLocation](./ExcludedLocation.md) criteria.
[newAudienceBuilder](#newaudiencebuilder)|[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|Gets a builder used to associate an audience with this campaign.
[newUserListBuilder](#newuserlistbuilder)|[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|Gets a builder used to associate a user list with this campaign.
[targetedLocations](#targetedlocations)|[TargetedLocationSelector](./TargetedLocationSelector.md)|A selector for [TargetedLocation](./TargetedLocation.md) criteria.


## <a name="audiences"></a>audiences
Specializes this selector to return [CampaignAudience](./CampaignAudience.md) criteria.

### Returns
|Type|Description|
|-|-
[CampaignAudienceSelector](./CampaignAudienceSelector.md)|A selector for [CampaignAudience](./CampaignAudience.md) criteria.

## <a name="excludedaudiences"></a>excludedAudiences
Specializes this selector to return [CampaignExcludedAudience](./CampaignExcludedAudience.md) criteria.

### Returns
|Type|Description|
|-|-
[CampaignExcludedAudienceSelector](./CampaignExcludedAudienceSelector.md)|A selector for [CampaignExcludedAudience](./CampaignExcludedAudience.md) criteria.

## <a name="excludedlocations"></a>excludedLocations
Specializes this selector to return [ExcludedLocation](./ExcludedLocation.md) criteria.

### Returns
|Type|Description|
|-|-
[ExcludedLocationSelector](./ExcludedLocationSelector.md)|A selector for [ExcludedLocation](./ExcludedLocation.md) criteria.

## <a name="newaudiencebuilder"></a>newAudienceBuilder
Gets a builder used to associate an audience with this campaign.

### Returns
|Type|Description|
|-|-
[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|A builder used to associate an audience with this campaign.

## <a name="newuserlistbuilder"></a>newUserListBuilder
Gets a builder used to associate a user list with this campaign.

### Returns
|Type|Description|
|-|-
[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|A builder used to associate a user list with this campaign.

## <a name="targetedlocations"></a>targetedLocations
Specializes this selector to return [TargetedLocation](./TargetedLocation.md) criteria.

### Returns
|Type|Description|
|-|-
[TargetedLocationSelector](./TargetedLocationSelector.md)|A selector for [TargetedLocation](./TargetedLocation.md) criteria.


