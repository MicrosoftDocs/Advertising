---
title: "NegativeKeywordListOperation object"
description: "Contains the methods for determining whether the negative keyword list was successfully added."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# NegativeKeywordListOperation

Contains the methods for determining whether the negative keywords list was successfully added. For information about builders, operation objects, and performance considerations, see [What are builders?](../concepts/builders.md)


## Methods

|Method Name|Return Type|Description|
|-|-|-
[getErrors](#geterrors)|string[]|Gets the errors that occurred when adding the negative keywords list.
[getResult](#getresult)|[NegativeKeywordList](./NegativeKeywordList.md)|Gets the negative keywords list that was added.
[isSuccessful](#issuccessful)|Boolean|Gets a Boolean value that indicates whether this operation succeeded.

## <a name="geterrors"></a>getErrors

Gets the errors that occurred when adding the negative keywords list.

### Returns

|Type|Description|
|-|-
string[]|An array of symbolic error codes if the add operation failed; otherwise, an empty array. For example, if one of the negative keywords matches a search keyword, the call returns CampaignServiceNegativeKeywordMatchesKeyword. For a description of these codes, see [Operation error codes](/advertising/guides/operation-error-codes).

## <a name="getresult"></a>getResult

Gets the negative keywords list that was added.

### Returns

|Type|Description|
|-|-
[NegativeKeywordList](./NegativeKeywordList.md)|The negative keywords list that was added if the operation succeeded; otherwise, null.

## <a name="issuccessful"></a>isSuccessful

Gets a Boolean value that indicates whether this operation succeeded.

### Returns

|Type|Description|
|-|-
Boolean|Is **true** if this operation succeeded; otherwise, **false**.

