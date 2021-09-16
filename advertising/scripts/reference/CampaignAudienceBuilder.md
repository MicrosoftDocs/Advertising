---
title: "CampaignAudienceBuilder object"
description: "Contains the methods for defining and creating a campaign audience association."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# CampaignAudienceBuilder

Contains the methods for defining and creating a campaign audience association. For information about builders, see [Builders](../concepts/builders.md).

Example usage:
```javascript
    // Gets the iterator that iterates all campaigns
    // in the account.
    var shoppingCampaign = AdsApp.shoppingCampaigns().withIds(["123456789"]).get();

    // Loops through all campaigns in the account.
    while (iterator.hasNext()) {
        var campaign = iterator.next();

        // Get the campaign audience's builder.
        var operation = campaign.targeting().newUserListBuilder()
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
[build](#build)|[CampaignAudienceOperation](./CampaignAudienceOperation.md)|Creates the campaign audience association and returns an operation object used to check whether the campaign audience association was successfully added.
[exclude](#exclude)|[CampaignExcludedAudienceOperation](./CampaignExcludedAudienceOperation.md)|Excludes the specified audience from this campaign and returns an operation object used to check whether the excluded campaign audience was successfully added.
[withAudience(Object userList)](#withaudience-object-userlist-)|[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|Sets the associated user list.
[withAudienceId(string audienceId)](#withaudienceid-string-audienceid-)|[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|Sets the associated audience's ID.
[withAudienceType(string audienceType)](#withaudiencetype-string-audiencetype-)|[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|Sets the associated audience's type.
[withBidModifier(double modifier)](#withbidmodifier-double-modifier-)|[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|Sets the association's bid modifier.

## <a name="build"></a>build
Creates the campaign audience and returns an operation object used to check whether the campaign audience was successfully added.

### Returns
|Type|Description|
|-|-
[CampaignAudienceOperation](./CampaignAudienceOperation.md)|An operation object used to check whether the campaign audience was successfully added.


## <a name="exclude"></a>exclude
Excludes the specified audience from this campaign and returns an operation object used to check whether the excluded campaign audience was successfully added.

### Returns
|Type|Description|
|-|-
[CampaignExcludedAudienceOperation](./CampaignExcludedAudienceOperation.md)|An operation object used to check whether the excluded campaign audience was successfully added.


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
[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|The campaign audience builder with the bid modifier applied.


### Returns
|Type|Description|
|-|-
[CampaignAudienceBuilder](./CampaignAudienceBuilder.md)|The campaign audience builder with the name applied.

