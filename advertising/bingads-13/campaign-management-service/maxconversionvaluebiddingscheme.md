---
title: MaxConversionValueBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that represents the maximum conversion value bid strategy type.
---
# MaxConversionValueBiddingScheme Data Object - Campaign Management
Defines an object that represents the maximum conversion value bid strategy type. 

Search campaigns, Shopping campaigns, [Smart shopping campaigns](../guides/smart-shopping-campaigns.md), and [Performance Max campaigns](../guides/performance-max.md) use the Maximize Conversion Value bid strategy (where Microsoft Advertising automatically sets your bids in real time to maximize total conversion value within your budget) and automated targeting to maximize overall revenue numbers with an option to define return on ad spend (ROAS) targets.  

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="MaxConversionValueBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxCpc" nillable="true" type="tns:Bid">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="TargetRoas" nillable="true" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "MaxConversionValueBiddingScheme",
  "MaxCpc": {
    "Amount": DoubleValueHere
  },
  "TargetRoas": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md) object has the following elements: [MaxCpc](#maxcpc), [TargetRoas](#targetroas).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxcpc"></a>MaxCpc|The maximum cost per click filter criteria for all keyword estimates in the ad group.<br/><br/>You can override this setting for specific keywords with the corresponding keyword estimators.|[Bid](bid.md)|
|<a name="targetroas"></a>TargetRoas|The target return on ad spend.<br/><br/>*Note:* TargetRoas is used by Search, Shopping, Smart Shopping and Performance Max campaigns.|**double**|

The [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme.<br/><br/>This value is *MaxConversionValueBiddingScheme* when you retrieve a maximum conversion value bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

