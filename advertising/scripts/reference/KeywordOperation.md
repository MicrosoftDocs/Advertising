---
title: "KeywordOperation object"
description: "Contains the methods for determining whether the keyword was successfully added."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# KeywordOperation

Contains the methods for determining whether the keyword was successfully added. For information about builders, operation objects, and performance considerations, see [What are builders?](../concepts/builders.md)

Because calling any of this object's methods forces Scripts to flush the build queue, be sure to read the performance considerations carefully.


## Methods

|Method Name|Return Type|Description|
|-|-|-
[getErrors](#geterrors)|string[]|Gets the errors that occurred when adding the keyword.
[getResult](#getresult)|[Keyword](./Keyword.md)|Gets the keyword that was added.
[isSuccessful](#issuccessful)|boolean|Gets a Boolean value that indicates whether the add operation succeeded.

## <a name="geterrors"></a>getErrors

Gets the errors that occurred when adding the ad group.

### Returns

|Type|Description|
|-|-
string[]|An array of symbolic error codes if the add operation failed; otherwise, an empty array. For example, if the bid amount is not valid, the call returns CampaignServiceInvalidSearchBids. For a description of these codes, see [Operation error codes](/advertising/guides/operation-error-codes).


## <a name="getresult"></a>getResult

Gets the keyword that was added.

### Returns

|Type|Description|
|-|-
[Keyword](./Keyword.md)|The keyword that was added if the operation succeeded; otherwise, null.

## <a name="issuccessful"></a>isSuccessful

Gets a Boolean value that indicates whether this operation succeeded.

### Returns

|Type|Description|
|-|-
Boolean|Is **true** if this operation succeeded; otherwise, **false**.

