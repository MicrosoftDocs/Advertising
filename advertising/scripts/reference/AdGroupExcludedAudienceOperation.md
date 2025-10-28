---
title: "AdGroupExcludedAudienceOperation object"
description: "Contains the methods for determining whether the ad group excluded audience was successfully added."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# AdGroupExcludedAudienceOperation

Contains the methods for determining whether the ad group excluded audience was successfully added. For information about builders, operation objects, and performance considerations, see [What are builders?](../concepts/builders.md)

Because calling any of this object's methods forces Scripts to flush the build queue, be sure to read the performance considerations carefully.


## Methods
|Method Name|Return Type|Description|
|-|-|-
[getErrors](#geterrors)|string[]|Gets any errors that occurred when adding the ad group excluded audience.
[getResult](#getresult)|[AdGroupExcludedAudience](./AdGroupExcludedAudience.md)|Gets the ad group excluded audience that was added.
[isSuccessful](#issuccessful)|Boolean|Gets a Boolean value that indicates whether the add operation succeeded.

## <a name="geterrors"></a>getErrors
Gets any errors that occurred when adding the ad group excluded audience.

### Returns
|Type|Description|
|-|-
string[]|An array of error codes if the operation failed; otherwise, an empty array. For a description of these codes, see [Operation error codes](/advertising/guides/operation-error-codes).

## <a name="getresult"></a>getResult
Gets the ad group excluded audience that was added.

### Returns
|Type|Description|
|-|-
[AdGroupExcludedAudience](./AdGroupExcludedAudience.md)|The ad group excluded audience that was created if the operation succeeded; otherwise, null.

## <a name="issuccessful"></a>isSuccessful
Gets a Boolean value that indicates whether the add operation succeeded.

### Returns:
|Type|Description|
|-|-
Boolean|Is **true** if the operation succeeded; otherwise, **false**.

