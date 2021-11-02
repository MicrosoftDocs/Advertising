---
title: ManualCpcBiddingScheme Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that represents the manual CPC bid strategy type.
---
# ManualCpcBiddingScheme Data Object - Campaign Management
Defines an object that represents the manual CPC bid strategy type.

With the ManualCpc (manual cost per click) bid strategy, you set your ad group and keyword bids, and Microsoft Advertising uses these bids every time.  

> [!NOTE]
> As of April 2021, the manual CPC bid strategy can only be used with audience campaigns. If you attempt to set manual CPC for any other campaign type, the request will be ignored without error and the bid strategy will be set to enhanced CPC.  

## Syntax
```xml
<xs:complexType name="ManualCpcBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence />
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ManualCpcBiddingScheme](manualcpcbiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [ManualCpcBiddingScheme](manualcpcbiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ManualCpcBiddingScheme](manualcpcbiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme<br/><br/>This value is *ManualCpcBiddingScheme* when you retrieve a manual CPC bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

