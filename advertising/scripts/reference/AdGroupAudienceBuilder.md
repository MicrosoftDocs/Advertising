---
title: "AdGroupAudienceBuilder object"
description: "Contains the methods for defining and creating an ad group audience association."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdGroupAudienceBuilder

Contains the methods for defining and creating an ad group audience association. For information about builders, see [Builders](../concepts/builders.md).

Example usage:
```javascript
    // Gets the iterator that iterates all ad groups
    // in the account.
    var iterator = AdsApp.adGroups().get();

    // Loops through all ad groups in the account.
    while (iterator.hasNext()) {
        var adGroup = iterator.next();

        // Get the ad group audience's builder.
        var operation = adGroup.targeting().newUserListBuilder()
            .withAudienceId("AUDIENCE ID GOES HERE")
            .build();
    
        // See the Builders topic for performance considerations
        // when using the operation object's methods.
        if (!operation.isSuccessful()) {
            for (var error of operation.getErrors()) {
                Logger.log(`${error}\n`);
            }
        }
    }
```


## Methods
|Method Name|Return Type|Description|
|-|-|-
[build](#build)|[AdGroupAudienceOperation](./AdGroupAudienceOperation.md)|Creates the ad group audience association and returns an operation object used to check whether the ad group audience association was successfully added.
[exclude](#exclude)|[AdGroupExcludedAudienceOperation](./AdGroupExcludedAudienceOperation.md)|Excludes the specified audience from this ad group and returns an operation object used to check whether the excluded ad group audience was successfully added.
[withAudience(Object userList)](#withaudience-object-userlist-)|[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|Sets the associated user list.
[withAudienceId(string audienceId)](#withaudienceid-string-audienceid-)|[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|Sets the associated audience's ID.
[withAudienceType(string audienceType)](#withaudiencetype-string-audiencetype-)|[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|Sets the associated audience's type.
[withBidModifier(double modifier)](#withbidmodifier-double-modifier-)|[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|Sets the association's bid modifier.

## <a name="build"></a>build
Creates the ad group audience and returns an operation object used to check whether the ad group audience was successfully added.

### Returns
|Type|Description|
|-|-
[AdGroupAudienceOperation](./AdGroupAudienceOperation.md)|An operation object used to check whether the ad group audience was successfully added.


## <a name="exclude"></a>exclude
Excludes the specified audience from this ad group and returns an operation object used to check whether the excluded ad group audience was successfully added.

### Returns
|Type|Description|
|-|-
[AdGroupExcludedAudienceOperation](./AdGroupExcludedAudienceOperation.md)|An operation object used to check whether the excluded ad group audience was successfully added.


## <a name="withaudience-object-userlist-"></a>withAudience(Object userList)
Sets the associated user list.

### Arguments
|Name|Type|Description|
|-|-|-
userList|string|The associated user list.


## <a name="withaudienceid-string-audienceid-"></a>withAudienceId(string audienceId)
Sets the associated audience's ID.

### Arguments
|Name|Type|Description|
|-|-|-
audienceId|string|The ID of the associated audience.


## <a name="withaudiencetype-string-audiencetype-"></a>withAudienceType(string audienceType)
Sets the associated audience's type.

### Arguments
|Name|Type|Description|
|-|-|-
audienceId|string|The associated audience's type. 


## <a name="withbidmodifier-double-modifier-"></a>withBidModifier(double modifier)
Sets the association's bid modifier.

### Arguments
|Name|Type|Description|
|-|-|-
modifier|double|The association's bid modifier. 

### Returns
|Type|Description|
|-|-
[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|The ad group audience builder with the bid modifier applied.


### Returns
|Type|Description|
|-|-
[AdGroupAudienceBuilder](./AdGroupAudienceBuilder.md)|The ad group audience builder with the name applied.

