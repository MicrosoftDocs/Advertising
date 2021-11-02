---
title: "AdGroupTargeting object"
description: "Contains the methods for managing ad group criteria: audience and location targeting."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdGroupTargeting

Contains the methods for managing ad group criteria: audience and location targeting.


## Methods
|Method Name|Return Type|Description|
|-|-|-
[audiences](#audiences)|[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|A selector for [AdGroupAudience](./AdGroupAudience.md) criteria.
[excludedAudiences](#excludedaudiences)|[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|A selector for [AdGroupExcludedAudience](./AdGroupExcludedAudience.md) criteria.
[excludedLocations](#excludedlocations)|[ExcludedLocationSelector](./ExcludedLocationSelector.md)|A selector for [ExcludedLocation](./ExcludedLocation.md) criteria.
[newAudienceBuilder](#newaudiencebuilder)|[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|Gets a builder used to associate an audience with this ad group.
[newUserListBuilder](#newuserlistbuilder)|[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|Gets a builder used to associate a user list with this ad group.
[targetedLocations](#targetedlocations)|[TargetedLocationSelector](./TargetedLocationSelector.md)|A selector for [TargetedLocation](./TargetedLocation.md) criteria.


## <a name="audiences"></a>audiences
Specializes this selector to return [AdGroupAudience](./AdGroupAudience.md) criteria.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceSelector](./AdGroupAudienceSelector.md)|A selector for [AdGroupAudience](./AdGroupAudience.md) criteria.

## <a name="excludedaudiences"></a>excludedAudiences
Specializes this selector to return [AdGroupExcludedAudience](./AdGroupExcludedAudience.md) criteria.

### Returns
|Type|Description|
|-|-
[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|A selector for [AdGroupExcludedAudience](./AdGroupExcludedAudience.md) criteria.

## <a name="excludedlocations"></a>excludedLocations
Specializes this selector to return [ExcludedLocation](./ExcludedLocation.md) criteria.

### Returns
|Type|Description|
|-|-
[ExcludedLocationSelector](./ExcludedLocationSelector.md)|A selector for [ExcludedLocation](./ExcludedLocation.md) criteria.

## <a name="newaudiencebuilder"></a>newAudienceBuilder
Gets a builder used to associate an audience with this ad group.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|A builder used to associate an audience with this ad group.

## <a name="newuserlistbuilder"></a>newUserListBuilder
Gets a builder used to associate a user list with this ad group.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|A builder used to associate a user list with this ad group.

## <a name="targetedlocations"></a>targetedLocations
Specializes this selector to return [TargetedLocation](./TargetedLocation.md) criteria.

### Returns
|Type|Description|
|-|-
[TargetedLocationSelector](./TargetedLocationSelector.md)|A selector for [TargetedLocation](./TargetedLocation.md) criteria.

