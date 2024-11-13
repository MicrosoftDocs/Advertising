---
title: FixedBid Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the fixed bid to use in the auction.
---
# FixedBid Data Object - Campaign Management
Defines the fixed bid to use in the auction.

# [XML](#tab/xml)

```xml
<xs:complexType name="FixedBid" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:CriterionBid">
      <xs:sequence>
        <xs:element minOccurs="0" name="Amount" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "FixedBid",
  "Amount": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [FixedBid](fixedbid.md) object has the following elements: [Amount](#amount).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="amount"></a>Amount|The bid value. For details about the valid bid range for your market, see [Currencies](../guides/currencies.md).<br/><br/>**Add:** Required<br/>**Update:** Optional|**double**|

The [FixedBid](fixedbid.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterionbid"></a>Inherited Elements from CriterionBid
The [FixedBid](fixedbid.md) object derives from the [CriterionBid](criterionbid.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [FixedBid](fixedbid.md), and might not apply to other objects that inherit the same elements from the [CriterionBid](criterionbid.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion bid. This value is *FixedBid* when you retrieve a fixed bid criterion. For more information about criterion types, see the [CriterionBid Data Object Remarks](criterionbid.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

