---
title: CashbackAdjustment Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the CashbackAdjustment Data Object.
---
# CashbackAdjustment Data Object - Campaign Management
Defines the CashbackAdjustment Data Object.

## Syntax
```xml
<xs:complexType name="CashbackAdjustment" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:CriterionCashback">
      <xs:sequence>
        <xs:element minOccurs="0" name="CashbackPercent" nillable="true" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CashbackAdjustment](cashbackadjustment.md) object has the following elements: [CashbackPercent](#cashbackpercent).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="cashbackpercent"></a>CashbackPercent|Reserved.|**double**|

The [CashbackAdjustment](cashbackadjustment.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterioncashback"></a>Inherited Elements from CriterionCashback
The [CashbackAdjustment](cashbackadjustment.md) object derives from the [CriterionCashback](criterioncashback.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [CashbackAdjustment](cashbackadjustment.md), and might not apply to other objects that inherit the same elements from the [CriterionCashback](criterioncashback.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

