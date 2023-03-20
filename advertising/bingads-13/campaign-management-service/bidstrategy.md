---
title: BidStrategy Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: A portfolio bid strategy is an automated bidding feature that manages bidding across multiple campaigns that are all working toward the same goal.
---
# BidStrategy Data Object - Campaign Management
A portfolio bid strategy is an automated bidding feature that manages bidding across multiple campaigns that are all working toward the same goal.  

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon!

> [!NOTE]
> You can set individual campaign level bid strategies using the [AddCampaigns](addcampaigns.md) and [UpdateCampaigns](updatecampaigns.md) operations.  

We automatically adjust your bids to balance under- and over-performing campaigns that share the same strategy, whether to maximize conversions, clicks, target impression share, or other performance goals. Portfolio bid strategies could be a great option for advertisers who want to make sure their entire budgets are spent efficiently.

All you have to do is choose a bid strategy type and include campaigns with complementary budgets in the portfolio. Microsoft Advertising will adjust your bids based on the performance of the entire portfolio. If your portfolio includes any campaigns with a shared budget, then you should include all of the campaigns that share the same budget.  

You can have up to 11,000 portfolio bid strategies in an account, and each portfolio can include 10,000 campaigns.  

Portfolio bid strategies work best with one goal in mind, using complementary campaign and bid strategy types. You cannot change a portfolio's bid strategy type. If you want a campaign in the portfolio to use a different bid strategy you can move it to another portfolio. Once you choose a campaign type, the portfolio can only include campaigns of that type.  

|Bid strategy type|Campaign types supported|
|-----|-----|
|Maximize clicks|Search, Shopping|
|Maximize conversions|Search|
|Target CPA|Search|
|Target impression share|Search|
|Target ROAS|Search, Shopping|

## Syntax
```xml
<xs:complexType name="BidStrategy" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssociatedCampaignType" nillable="true" type="tns:CampaignType" />
    <xs:element minOccurs="0" name="AssociationCount" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="BiddingScheme" nillable="true" type="tns:BiddingScheme" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [BidStrategy](bidstrategy.md) object has the following elements: [AssociatedCampaignType](#associatedcampaigntype), [AssociationCount](#associationcount), [BiddingScheme](#biddingscheme), [Id](#id), [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="associatedcampaigntype"></a>AssociatedCampaignType|The type of ad campaign that can be included the portfolio bid strategy.<br/><br/>The supported campaign types are "Search" and "Shopping" (except [smart shopping campaigns](../guides/smart-shopping-campaigns.md)).<br/><br/>Once you choose a campaign type, the portfolio can only include campaigns of that type.<br/><br/>**Add:** Optional. The default campaign type is *Search*.<br/>**Update:** Read-only|[CampaignType](campaigntype.md)|
|<a name="associationcount"></a>AssociationCount|The number of [Campaign](campaign.md) objects that currently share this bid strategy.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**int**|
|<a name="biddingscheme"></a>BiddingScheme|The portfolio bid strategy type and settings.<br/><br/>If the [AssociatedCampaignType](#associatedcampaigntype) is "Search", the supported bid strategies are [MaxClicksBiddingScheme](maxclicksbiddingscheme.md), [MaxConversionsBiddingScheme](maxconversionsbiddingscheme.md) [TargetCpaBiddingScheme](targetcpabiddingscheme.md), [TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md), and [TargetRoasBiddingScheme](targetroasbiddingscheme.md).<br/><br/>If the [AssociatedCampaignType](#associatedcampaigntype) is "Shopping", the supported bid strategies are [MaxClicksBiddingScheme](maxclicksbiddingscheme.md) and [TargetRoasBiddingScheme](targetroasbiddingscheme.md).<br/><br/>Once you choose a bid strategy type it cannot be updated.<br/><br/>**Add:** Required<br/>**Update:** Optional. You can update properties of a bidding scheme, but you cannot change the type.|[BiddingScheme](biddingscheme.md)|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the bid strategy.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="name"></a>Name|The name of the bid strategy. The name must be unique among all bid strategies within the account. The name can contain a maximum of 255 characters.<br/><br/>The service performs a case-insensitive comparison when it compares the name to existing bid strategy names.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddBidStrategies](addbidstrategies.md)  
[GetBidStrategiesByIds](getbidstrategiesbyids.md)  
[UpdateBidStrategies](updatebidstrategies.md)  
