---
title: "AudienceBidding object"
description: "Contains the methods for specifying the audience's bid modifier."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# AudienceBidding

Contains the methods used to manage an audience's bid modifier.

## Methods
|Method Name|Return Type|Description|
|-|-|-
[clearBidModifier](#clearbidmodifier)|void|Clears this audience's bid modifier.
[getBidModifier](#getbidmodifier)|double|Gets this audience's bid modifier.
[setBidModifier(double modifier)](#setbidmodifier-double-modifier-)|void|Sets this audience's bid modifier.

## <a name="clearbidmodifier"></a>clearBidModifier
Clears this audience's bid modifier.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

## <a name="getbidmodifier"></a>getBidModifier
Gets this audience's bid modifier. 

### Returns
|Type|Description|
|-|-
double|The audience's bid modifier.

## <a name="setbidmodifier-double-modifier-"></a>setBidModifier(double modifier)
Sets this audience's bid modifier.

### Arguments
|Name|Type|Description|
|-|-|-
cpc|double|The audience's bid modifier

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## See also

[AdGroupAudience.bidding()](AdGroupAudience.md#bidding)
[CampaignAudience.bidding()](CampaignAudience.md#bidding)
