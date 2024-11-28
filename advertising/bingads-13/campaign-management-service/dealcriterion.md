---
title: DealCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a criterion that can be used to show ads for a specific deal.
---
# DealCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads for a specific deal.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DealCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="DealId" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "DealCriterion",
  "DealId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DealCriterion](dealcriterion.md) object has the following elements: [DealId](#dealid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="dealid"></a>DealId|The Microsoft Advertising identifier of the Deal.|**long**|

The [DealCriterion](dealcriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [DealCriterion](dealcriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [DealCriterion](dealcriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Deal* when you retrieve a deal criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

