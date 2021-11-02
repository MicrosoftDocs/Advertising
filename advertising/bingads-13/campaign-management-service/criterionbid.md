---
title: CriterionBid Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a base class for criterion bids.
---
# CriterionBid Data Object - Campaign Management
Defines a base class for criterion bids.

Do not try to instantiate a *CriterionBid*. You can create the following object that derives from it.
- [BidMultiplier](bidmultiplier.md)  
- [FixedBid](fixedbid.md)  

For a list of criterion bids that you can use with [BiddableCampaignCriterion](biddablecampaigncriterion.md), see the [CampaignCriterionType](campaigncriteriontype.md) value set.

For a list of criterion bids that you can use with [BiddableAdGroupCriterion](biddableadgroupcriterion.md), see the [AdGroupCriterionType](adgroupcriteriontype.md) value set.

## Syntax
```xml
<xs:complexType name="CriterionBid" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CriterionBid](criterionbid.md) object has the following elements: [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of criterion bid. For more information, see [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by whether you instantiate a bid multiplier or fixed bid.

If you generate the SOAP manually, use the *type* attribute of the `<CriterionBid>` node (as shown in the following example) to specify the type of criterion.

```xml
<CriterionBid i:type="BidMultiplier" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
     . . .
</CriterionBid>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BiddableAdGroupCriterion](biddableadgroupcriterion.md)  
[BiddableCampaignCriterion](biddablecampaigncriterion.md)  
