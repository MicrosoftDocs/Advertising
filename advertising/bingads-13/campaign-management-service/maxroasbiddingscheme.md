---
title: MaxRoasBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: This object is not in use and will be removed from a future version of the API.
ms.subservice: campaign-management-api
---
# MaxRoasBiddingScheme Data Object - Campaign Management
This object is not in use and will be removed from a future version of the API.

## Syntax
```xml
<xs:complexType name="MaxRoasBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxCpc" nillable="true" type="tns:Bid" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [MaxRoasBiddingScheme](maxroasbiddingscheme.md) object has the following elements: [MaxCpc](#maxcpc).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxcpc"></a>MaxCpc|The MaxRoasBiddingScheme object is not in use and will be removed from a future version of the API.|[Bid](bid.md)|

The [MaxRoasBiddingScheme](maxroasbiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [MaxRoasBiddingScheme](maxroasbiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [MaxRoasBiddingScheme](maxroasbiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The MaxRoasBiddingScheme object is not in use and will be removed from a future version of the API.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

