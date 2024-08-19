---
title: RateAmount Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that represents the rate amount in percentage form.(test)
---
# RateAmount Data Object Test - Campaign Management
Defines an object that represents the rate amount in percentage form.

# [XML](#tab/xml)

```xml
<xs:complexType name="RateAmount" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Amount" nillable="true" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Amount": NumbericValueHere
}
```

-----

## <a name="elements"></a>Elements

The [RateAmount](rateamount.md) object has the following elements: [Amount](#amount).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="amount"></a>Amount|The rate amount in percentage form.|**double**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[RateBid](ratebid.md)  
