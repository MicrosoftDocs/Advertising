---
title: TargetCpaBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that represents the target CPA bid strategy type.
---
# TargetCpaBiddingScheme Data Object - Campaign Management
Defines an object that represents the target CPA bid strategy type.

> [!IMPORTANT]
> Starting August 4, 2025, the [BiddingScheme in the Campaign object](./campaign.md#biddingscheme) will no longer support *TargetCpaBiddingScheme* and *TargetRoasBiddingScheme*.  
> * Any bid strategy set to [Target CPA](./targetcpabiddingscheme.md) will be silently converted to [Maximize Conversions](./maxconversionsbiddingscheme.md) using the [Target CPA value](./maxconversionsbiddingscheme.md#targetcpa).  
> * Any bid strategy set to Target ROAS will be silently converted to [Maximize Conversion Value](./maxconversionvaluebiddingscheme.md) using the [Target ROAS](./maxconversionvaluebiddingscheme.md#targetroas) value. 
> * Existing campaigns that use the Target CPA and Target ROAS bid strategies will remain unaffected.  
> * Bid strategy consolidation won't impact SA360.  

With the *TargetCpa* (cost per acquisition) bid strategy, you don't need to set ad group or keyword bids. You set your budget and your target 30-day average CPA, and Microsoft Advertising automatically sets your bids in real time to get you to this average. Some conversions may cost more than your target and some may cost less, but Microsoft Advertising will try to make sure your average cost per conversion is in line with your target.

Microsoft Advertising will always respect your overall budget limit. With a portfolio bid strategy, you can also set an optional maximum CPC (cost per click) to limit the amount spent on each individual click. For non-portfolio campaigns, you can only edit or remove an existing Max CPC value; you cannot add a new value.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="TargetCpaBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxCpc" nillable="true" type="tns:Bid" />
        <xs:element minOccurs="0" name="TargetCpa" nillable="true" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "TargetCpa",
  "MaxCpc": {
    "Amount": DoubleValueHere
  },
  "TargetCpa": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [TargetCpaBiddingScheme](targetcpabiddingscheme.md) object has the following elements: [MaxCpc](#maxcpc), [TargetCpa](#targetcpa).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxcpc"></a>MaxCpc|The maximum cost per click that you want to spend.<br/><br/>For non-portfolio campaigns, you can only edit or remove an existing MaxCpc value. Attempting to add a new value returns error [MaxCpcCannotBeAdded](../guides/operation-error-codes.md#maxcpccannotbeadded) (611274). Portfolio bid strategies continue to support MaxCpc.<br/><br/>**Add:** Optional for portfolio bid strategies; not supported for non-portfolio campaigns.<br/>**Update:** Optional. For non-portfolio campaigns, only an existing value can be edited or removed.|[Bid](bid.md)|
|<a name="targetcpa"></a>TargetCpa|The target cost per acquisition (CPA) that you want used by Microsoft Advertising to maximize conversions.<br/><br/>**Add:** Required<br/>**Update:** Optional|**double**|

The [TargetCpaBiddingScheme](targetcpabiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [TargetCpaBiddingScheme](targetcpabiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [TargetCpaBiddingScheme](targetcpabiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme.<br/><br/>This value is *TargetCpaBiddingScheme* when you retrieve a target CPA bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  
