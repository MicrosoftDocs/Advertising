---
title: BiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the base object of a bidding scheme for how you want to manage your bids.
---
# BiddingScheme Data Object - Campaign Management
Defines the base object of a bidding scheme for how you want to manage your bids. A bidding scheme is known as a *bid strategy type* in the Microsoft Advertising web application.

> [!IMPORTANT]
> Starting August 4, 2025, the [BiddingScheme in the Campaign object](./campaign.md#biddingscheme) will no longer support *TargetCpaBiddingScheme* and *TargetRoasBiddingScheme*.  
> Any bid strategy set to [Target CPA](./targetcpabiddingscheme.md) will be silently converted to [Maximize Conversions](./maxconversionsbiddingscheme.md) using the [Target CPA value](./maxconversionsbiddingscheme.md#targetcpa).  
> Any bid strategy set to Target ROAS will be silently converted to [Maximize Conversion Value](./maxconversionvaluebiddingscheme.md) using the [Target ROAS](./maxconversionvaluebiddingscheme.md#targetroas) value. Existing campaigns that use the Target CPA and Target ROAS bid strategies will remain unaffected.  
> Bid strategy consolidation won't impact SA360.  

Do not try to instantiate a *BiddingScheme*. You can create one or more of the following objects that derive from it.  

- [CommissionBiddingScheme](commissionbiddingscheme.md)
- [CostPerSaleBiddingScheme](costpersalebiddingscheme.md)  
- [EnhancedCpcBiddingScheme](enhancedcpcbiddingscheme.md)  
- [InheritFromParentBiddingScheme](inheritfromparentbiddingscheme.md)  
- [ManualCpaBiddingScheme](manualcpabiddingscheme.md)  
- [ManualCpcBiddingScheme](manualcpcbiddingscheme.md)  
- [ManualCpmBiddingScheme](manualcpmbiddingscheme.md)  
- [ManualCpvBiddingScheme](manualcpvbiddingscheme.md)  
- [MaxClicksBiddingScheme](maxclicksbiddingscheme.md)  
- [MaxConversionsBiddingScheme](maxconversionsbiddingscheme.md)  
- [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md)
- [MaxRoasBiddingScheme](maxroasbiddingscheme.md)
- [PercentCpcBiddingScheme](percentcpcbiddingscheme.md)  
- [TargetCpaBiddingScheme](targetcpabiddingscheme.md)  
- [TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md)  
- [TargetRoasBiddingScheme](targetroasbiddingscheme.md)  

> [!IMPORTANT] 
> For some bid strategy types your bid and ad rotation settings are ignored and conversion tracking (via [Universal Event Tracking](../guides/universal-event-tracking.md) tag and a conversion goal) is required. For more information including supported locations, see [Let Microsoft Advertising manage your bids with bid strategies](https://help.ads.microsoft.com/#apex/3/en/56786/1). 

## Syntax
```xml
<xs:complexType name="BiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [BiddingScheme](biddingscheme.md) object has the following elements: [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of bidding scheme that is set for this campaign, ad group, or keyword. <br/><br/>For more information about bidding scheme types, see the [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by the object instance.

If you generate the SOAP manually, use the *type* attribute of the `<BiddingScheme>` node as shown in the following example.

```xml
<ns1:BiddingScheme xsi:type="ns1:ManualCpcBiddingScheme">
    <ns1:Type xsi:nil="true"/>
</ns1:BiddingScheme>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
[BidStrategy](bidstrategy.md)  
[Campaign](campaign.md)  
[Keyword](keyword.md)  
