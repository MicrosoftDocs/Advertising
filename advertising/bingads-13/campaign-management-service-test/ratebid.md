---
title: RateBid Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that represents the rate bid.(test)
---
# RateBid Data Object Test - Campaign Management
Defines an object that represents the rate bid.

RateBid is applicable to Lodging campaigns (formerly Hotel campaigns) with the percent CPC or commission bid schemes.

# [XML](#tab/xml)

```xml
<xs:complexType name="RateBid" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:CriterionBid">
      <xs:sequence>
        <xs:element minOccurs="0" name="RateAmount" nillable="true" type="tns:RateAmount" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "RateBid",
  "RateAmount": {
    "Amount": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [RateBid](ratebid.md) object has the following elements: [RateAmount](#rateamount).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="rateamount"></a>RateAmount|Defines an object that represents the rate amount.|[RateAmount](rateamount.md)|

The [RateBid](ratebid.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterionbid"></a>Inherited Elements from CriterionBid
The [RateBid](ratebid.md) object derives from the [CriterionBid](criterionbid.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [RateBid](ratebid.md), and might not apply to other objects that inherit the same elements from the [CriterionBid](criterionbid.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of criterion bid. For more information, see [Remarks](criterionbid.md#remarks).|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
