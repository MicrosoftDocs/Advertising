---
title: "CampaignAudienceOperation object"
description: "Contains the methods for determining whether the campaign audience was successfully added."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# CampaignAudienceOperation

Contains the methods for determining whether the campaign audience was successfully added. For information about builders, operation objects, and performance considerations, see [What are builders?](../concepts/builders.md)

Because calling any of this object's methods forces Scripts to flush the build queue, be sure to read the performance considerations carefully.


## Methods
|Method Name|Return Type|Description|
|-|-|-
[getErrors](#geterrors)|string[]|Gets any errors that occurred when adding the campaign audience.
[getResult](#getresult)|[CampaignAudience](./CampaignAudience.md)|Gets the campaign audience that was added.
[isSuccessful](#issuccessful)|Boolean|Gets a Boolean value that indicates whether the add operation succeeded.

## <a name="geterrors"></a>getErrors
Gets any errors that occurred when adding the campaign audience.

### Returns
|Type|Description|
|-|-
string[]|An array of error codes if the operation failed; otherwise, an empty array. For a description of these codes, see [Operation error codes](/advertising/guides/operation-error-codes).

## <a name="getresult"></a>getResult
Gets the campaign audience that was added.

### Returns
|Type|Description|
|-|-
[CampaignAudience](./CampaignAudience.md)|The campaign audience that was created if the operation succeeded; otherwise, null.

## <a name="issuccessful"></a>isSuccessful
Gets a Boolean value that indicates whether the add operation succeeded.

### Returns:
|Type|Description|
|-|-
Boolean|Is **true** if the operation succeeded; otherwise, **false**.

