---
title: "UserList object"
description: "Contains the methods for managing the user list."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# UserList

Contains the methods for managing a user list. For more information, see [UserList](/advertising/guides/entity-hierarchy-limits#audiences).

## Methods

|Method Name|Return Type|Description|
|-|-|-
[getDescription](#getdescription)|string|Gets this user list's description.
[getEntityType](#getentitytype)|string|Gets this entity's type, which is UserList.
[getId](#getid)|string|Gets the ID that uniquely identifies this user list.
[getMembershipLifeSpan](#getmembershiplifespan)|int|Gets how far back in time (number of days) Microsoft Advertising should look for actions that match this user list definition.
[getName](#getname)|string|Gets this user list's name.
[getSizeForAudienceNetwork](#getsizeforaudiencenetwork)|long|Gets this user list's size in the Audience network.
[getSizeForSearch](#getsizeforsearch)|long|Gets this user list's size in the Search network.
[getType](#gettype)|string|Gets this user list's type.
[setDescription(string description)](#setdescription-string-description-)|void|Sets this user list's description.
[setMembershipLifeSpan(int membershipLifeSpan)](#setmembershiplifespan-int-membershiplifespan-)|void|Sets how far back in time (number of days) Microsoft Advertising should look for actions that match this user list definition.
[setName(string name)](#setname-string-name-)|void|Sets this user list's name.
[targetedAdGroups](#targetedadgroups)|[AdGroupSelector](./AdGroupSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of ad groups targeted by the user list.

## <a name="getdescription"></a>getDescription
Gets the user list's description.

### Returns
|Type|Description|
|-|-
string|The user list's description.


## <a name="getentitytype"></a>getEntityType
Gets this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *UserList*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this user list.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this user list. 


## <a name="getmembershiplifespan"></a>getMembershipLifeSpan
Gets how far back in time (number of days) Microsoft Advertising should look for actions that match this user list definition.

### Returns:
|Type|Description|
|-|-
string|The user list's membership life span (number of days). 


## <a name="getname"></a>getName
Gets this user list's name.

### Returns:
|Type|Description|
|-|-
string|The user list's name. 


## <a name="getsizeforaudiencenetwork"></a>getSizeForAudienceNetwork
Gets this user list's size in the Audience network. 

### Returns:
|Type|Description|
|-|-
long|The user list's size in the Audience network. 


## <a name="getsizeforsearch"></a>getSizeForSearch
Gets this user list's size in the Search network.

### Returns:
|Type|Description|
|-|-
long|The user list's size in the Search network. 


## <a name="gettype"></a>getType
Gets this user list's type.

### Returns:
|Type|Description|
|-|-
string|The user list's type. 


## <a name="setdescription-string-description-"></a>setDescription(string description)
Sets this user list's description. 

### Arguments
|Name|Type|Description|
|-|-|-
description|string|The user list's description. 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setmembershiplifespan-int-membershiplifespan-"></a>setMembershipLifeSpan(string membershipLifeSpan)
Sets how far back in time (number of days) Microsoft Advertising should look for actions that match this user list definition. 

### Arguments
|Name|Type|Description|
|-|-|-
membershipLifeSpan|string|The user list's membership life span (number of days). 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setname-string-name-"></a>setName(string name)
Sets this user list's name. 

### Arguments
|Name|Type|Description|
|-|-|-
name|string|The user list's name. 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="targetedadgroups"></a>targetedAdGroups

Gets a [selector](../concepts/selectors.md) used to filter the list of ad groups targeted by the user list. 

### Returns

|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|A selector used to filter the list of ad groups targeted by the user list. 



## See also

[UserListIterator.next()](UserListIterator.md#next)
