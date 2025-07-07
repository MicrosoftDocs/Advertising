---
title: TargetRoasBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that represents the target ROAS bid strategy type.
---
# TargetRoasBiddingScheme Data Object - Campaign Management
Defines an object that represents the target ROAS bid strategy type.  

> [!IMPORTANT]
> Starting August 4, 2025, the [BiddingScheme in the Campaign object](./campaign.md#biddingscheme) will no longer support *TargetCpaBiddingScheme* and *TargetRoasBiddingScheme*.  
> Any bid strategy set to [Target CPA](./targetcpabiddingscheme.md) will be silently converted to [Maximize Conversions](./maxconversionsbiddingscheme.md) using the [Target CPA value](./maxconversionsbiddingscheme.md#targetcpa).  
> Any bid strategy set to Target ROAS will be silently converted to [Maximize Conversion Value](./maxconversionvaluebiddingscheme.md) using the [Target ROAS](./maxconversionvaluebiddingscheme.md#targetroas) value. Existing campaigns that use the Target CPA and Target ROAS bid strategies will remain unaffected.  
> Bid strategy consolidation won't impact SA360.  

With the TargetRoas (return on ad spend) bid strategy, you don't need to set ad group or keyword bids. You set your budget and your target 30-day average ROAS, and Microsoft Advertising automatically sets your bids in real time to get you to this average. Some conversions may cost more than your target and some may cost less, but Microsoft Advertising will try to make sure your return on ad spend is in line with your target.

Microsoft Advertising will always respect your overall budget limit, but if you want greater control over your bids while using Target ROAS, you can also set a maximum CPC (cost per click). This is an optional limit you can set to make sure that Microsoft Advertising never pays more than a certain amount for each individual click.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="TargetRoasBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxCpc" nillable="true" type="tns:Bid" />
        <xs:element minOccurs="0" name="TargetRoas" nillable="true" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "TargetRoasBiddingScheme",
  "MaxCpc": {
    "Amount": DoubleValueHere
  },
  "TargetRoas": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [TargetRoasBiddingScheme](targetroasbiddingscheme.md) object has the following elements: [MaxCpc](#maxcpc), [TargetRoas](#targetroas).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxcpc"></a>MaxCpc|The maximum cost per click that you want to spend.<br/><br/>**Add:** Optional<br/>**Update:** Optional. The MaxCpc setting is cleared if the update value is empty.|[Bid](bid.md)|
|<a name="targetroas"></a>TargetRoas|The target return on ad spend (ROAS) that you want used by Microsoft Advertising to maximize conversions.<br/><br/>The supported target ROAS values range from 0.01 (1 percent) to 1,000.00 (100,000 percent).<br/><br/>**Add:** Required<br/>**Update:** Optional|**double**|

The [TargetRoasBiddingScheme](targetroasbiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [TargetRoasBiddingScheme](targetroasbiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [TargetRoasBiddingScheme](targetroasbiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme.<br/><br/>This value is *TargetRoasBiddingScheme* when you retrieve a target ROAS bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

