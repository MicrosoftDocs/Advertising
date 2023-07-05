---
title: MaxConversionsBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that represents the maximum conversions bid strategy type.
---
# MaxConversionsBiddingScheme Data Object - Campaign Management
Defines an object that represents the maximum conversions bid strategy type.

With the *MaxConversions* bid strategy, you don't need to set ad group or keyword bids. Microsoft Advertising automatically sets your bids in real time to get as many conversions as possible within your budget.

Microsoft Advertising will always respect your overall budget limit, but if you want greater control over your bids while using Maximize Conversions, you can also set a maximum CPC (cost per click). This is an optional limit you can set to make sure that Microsoft Advertising never pays more than a certain amount for each individual click.

> [!IMPORTANT] 
> For some bid strategy types your bid and ad rotation settings are ignored and conversion tracking (via [Universal Event Tracking](../guides/universal-event-tracking.md) tag and a conversion goal) is required. For more information including supported locations, see [Let Microsoft Advertising manage your bids with bid strategies](https://help.ads.microsoft.com/#apex/3/en/56786/1). 

## Syntax
```xml
<xs:complexType name="MaxConversionsBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxCpc" nillable="true" type="tns:Bid" />
        <xs:element minOccurs="0" name="TargetCpa" nillable="true" type="xs:double">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [MaxConversionsBiddingScheme](maxconversionsbiddingscheme.md) object has the following elements: [MaxCpc](#maxcpc), [TargetCpa](#targetcpa).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxcpc"></a>MaxCpc|The maximum cost per click that you want to spend.<br/><br/>*Note:* MaxCpc shouldn't be set for Performance Max campaigns as it doesn't apply.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[Bid](bid.md)|
|<a name="targetcpa"></a>TargetCpa|The target cost per action that you want to spend.<br/><br/>*Note:* TargetCpa is used by Smart Shopping and Performance Max campaigns.|**double**|

The [MaxConversionsBiddingScheme](maxconversionsbiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [MaxConversionsBiddingScheme](maxconversionsbiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [MaxConversionsBiddingScheme](maxconversionsbiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme.<br/><br/>This value is *MaxConversionsBiddingScheme* when you retrieve a maximum conversions bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

