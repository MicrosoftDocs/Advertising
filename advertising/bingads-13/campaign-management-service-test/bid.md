---
title: Bid Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The highest price that you want to pay each time someone clicks your ad.(test)
---
# Bid Data Object Test - Campaign Management
The highest price that you want to pay each time someone clicks your ad.

# [XML](#tab/xml)

```xml
<xs:complexType name="Bid" xmlns:xs="http://www.w3.org/2001/XMLSchema">
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

The [Bid](bid.md) object has the following elements: [Amount](#amount).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="amount"></a>Amount|The bid value. For details about the valid bid range for your market, see [Currencies](../guides/currencies.md).|**double**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
[Keyword](keyword.md)  
[MaxClicksBiddingScheme](maxclicksbiddingscheme.md)  
[MaxConversionsBiddingScheme](maxconversionsbiddingscheme.md)  
[MaxRoasBiddingScheme](maxroasbiddingscheme.md)  
[TargetCpaBiddingScheme](targetcpabiddingscheme.md)  
[TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md)  
[TargetRoasBiddingScheme](targetroasbiddingscheme.md)  
