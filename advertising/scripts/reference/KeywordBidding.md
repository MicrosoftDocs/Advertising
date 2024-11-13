---
title: "KeywordBidding object"
description: "Contains the methods for specifying the keyword's bid values."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# KeywordBidding

Contains the methods for specifying the keyword's bid values.

## Methods
|Method Name|Return Type|Description|
|-|-|-
[clearCpc](#clearcpc)|void|Removes the keyword's CPC bid.
[getCpc](#getcpc)|double|Gets the keyword's CPC bid.
[setCpc(double cpc)](#setcpc-double-cpc-)|void|Sets the keyword's maximum CPC bid.

## <a name="clearcpc"></a>clearCpc
Removes the keyword's CPC bid. 

### Returns
|Type|Description|
|-|-
void|Returns nothing.

## <a name="getcpc"></a>getCpc
Gets the keyword's CPC bid. 

### Returns
|Type|Description|
|-|-
double|The keyword's CPC bid. If the keyword doesn't specify a bid, this field contains the bid inherited from the ad group.

## <a name="setcpc-double-cpc-"></a>setCpc(double cpc)
Sets the keyword's maximum CPC bid. 

Specifies the bid amount to use when the keyword matches the user's search term. 

To use the bid amount specified at the ad group level, remove the keyword's CPC bid by calling the `clearCpc()` method.

For more information about bid amounts, see [Bid](/advertising/campaign-management-service/keyword#bid) and [BiddingScheme](/advertising/campaign-management-service/keyword#biddingscheme). 

If you specify a property value that's not valid, the call silently fails. To confirm whether the property was updated, get the object again and test whether the property's value equals the new value. For information, see [Handling errors and warnings](../concepts/errors-and-warnings.md).

### Arguments
|Name|Type|Description|
|-|-|-
cpc|double|The keyword's maximum CPC bid. The account's currency determines the minimum and maximum bid values. For more information, see [Bid and budget currencies](/advertising/guides/currencies#bidandbudget).

### Returns
|Type|Description|
|-|-
void|Returns nothing.



## See also

[Keyword.bidding()](Keyword.md#bidding)
