---
title: "ExcludedLocationOperation object"
description: "Contains the methods for determining whether the excluded location was successfully added."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# ExcludedLocationOperation

Contains the methods for determining whether the excluded location was successfully added. 


## Methods

|Method Name|Return Type|Description|
|-|-|-
[getErrors](#geterrors)|string[]|Gets the errors that occurred when adding the excluded location.
[getResult](#getresult)|[ExcludedLocation](./ExcludedLocation.md)|Gets the excluded location that was added.
[isSuccessful](#issuccessful)|Boolean|Gets a Boolean value that indicates whether this operation succeeded.

## <a name="geterrors"></a>getErrors

Gets the errors that occurred when adding the excluded location.

### Returns

|Type|Description|
|-|-
string[]|An array of symbolic error codes if the add operation failed; otherwise, an empty array. For a description of these codes, see [Operation error codes](/advertising/guides/operation-error-codes).

## <a name="getresult"></a>getResult

Gets the excluded location that was added.

### Returns

|Type|Description|
|-|-
[ExcludedLocation](./ExcludedLocation.md)|The excluded location that was added if the operation succeeded; otherwise, null.

## <a name="issuccessful"></a>isSuccessful

Gets a Boolean value that indicates whether this operation succeeded.

### Returns

|Type|Description|
|-|-
Boolean|Is **true** if this operation succeeded; otherwise, **false**.

