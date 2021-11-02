---
title: EnhancedCpcBiddingScheme Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that represents the enhanced CPC bid strategy type.
---
# EnhancedCpcBiddingScheme Data Object - Campaign Management
Defines an object that represents the enhanced CPC bid strategy type.

With the *EnhancedCpc* (enhanced cost per click) bid strategy, you set your ad group and keyword bids, and Microsoft Advertising will automatically adjust your bids in real time to increase your chances for a conversion. Your bid will go higher on searches that are more likely to convert and lower on searches less likely to convert (up or down, this change will be made after we apply any bid adjustments you have set). Over the long haul, though, we will try to make sure that your average CPC is not higher than your bid. If you haven't optimized your campaign yet, Enhanced CPC should reduce your cost per conversion and increase your total conversion count while respecting your current budget.  

Microsoft Advertising will not actually change your stored ad group or keyword bid settings. You can continue to set new bids, and we will use the new values as a starting point at the next opportunity.

## Syntax
```xml
<xs:complexType name="EnhancedCpcBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence />
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [EnhancedCpcBiddingScheme](enhancedcpcbiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [EnhancedCpcBiddingScheme](enhancedcpcbiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [EnhancedCpcBiddingScheme](enhancedcpcbiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme.<br/><br/>This value is *EnhancedCpcBiddingScheme* when you retrieve an enhanced CPC bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

