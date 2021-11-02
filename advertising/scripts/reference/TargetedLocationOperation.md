---
title: "TargetedLocationOperation object"
description: "Contains the methods for determining whether the targeted location was successfully added."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# TargetedLocationOperation

Contains the methods for determining whether the targeted location was successfully added. 


## Methods

|Method Name|Return Type|Description|
|-|-|-
[getErrors](#geterrors)|string[]|Gets the errors that occurred when adding the targeted location.
[getResult](#getresult)|[TargetedLocation](./TargetedLocation.md)|Gets the targeted location that was added.
[isSuccessful](#issuccessful)|Boolean|Gets a Boolean value that indicates whether this operation succeeded.

## <a name="geterrors"></a>getErrors

Gets the errors that occurred when adding the targeted location.

### Returns

|Type|Description|
|-|-
string[]|An array of symbolic error codes if the add operation failed; otherwise, an empty array. For a description of these codes, see [Operation error codes](/advertising/guides/operation-error-codes).

## <a name="getresult"></a>getResult

Gets the targeted location that was added.

### Returns

|Type|Description|
|-|-
[TargetedLocation](./TargetedLocation.md)|The targeted location that was added if the operation succeeded; otherwise, null.

## <a name="issuccessful"></a>isSuccessful

Gets a Boolean value that indicates whether this operation succeeded.

### Returns

|Type|Description|
|-|-
Boolean|Is **true** if this operation succeeded; otherwise, **false**.

