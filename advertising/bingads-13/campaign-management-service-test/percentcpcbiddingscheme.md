---
title: PercentCpcBiddingScheme Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that represents the percent CPC bid strategy type (total hotel price per night, including taxes and fees).(test)
---
# PercentCpcBiddingScheme Data Object Test - Campaign Management
Defines an object that represents the percent CPC bid strategy type (total hotel price per night, including taxes and fees).

# [XML](#tab/xml)

```xml
<xs:complexType name="PercentCpcBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxPercentCpc" nillable="true" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "PercentCpcBiddingScheme",
  "MaxPercentCpc": "DoubleValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [PercentCpcBiddingScheme](percentcpcbiddingscheme.md) object has the following elements: [MaxPercentCpc](#maxpercentcpc).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxpercentcpc"></a>MaxPercentCpc|The maximum effective bid limit, in absolute form, at the campaign level.<br/><br/>The actual CPC bid amount, in percent form, must be set at the ad group level and can optionally be set at the hotel group level again.<br/><br/>For example, for a maximum percent CPC bid of $10.60, the *MaxPercentCpc* value should be 10.60. Campaigns with *PercentCpc* and *ManualCPC* bidding scheme can participate in a shared budget.<br/><br/>*MaxPercentCpc* must be greater than 0.|**double**|

The [PercentCpcBiddingScheme](percentcpcbiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [PercentCpcBiddingScheme](percentcpcbiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [PercentCpcBiddingScheme](percentcpcbiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of bidding scheme that is set for this campaign, ad group, or keyword. <br/><br/>For more information about bidding scheme types, see the [Remarks](biddingscheme.md#remarks).|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

