---
title: HotelDateSelectionTypeCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Criterion for the date selection type.
---
# HotelDateSelectionTypeCriterion Data Object - Campaign Management
Criterion for the date selection type.

## Syntax
```xml
<xs:complexType name="HotelDateSelectionTypeCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="HotelDateSelectionType" nillable="true" type="tns:HotelDateSelectionType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [HotelDateSelectionTypeCriterion](hoteldateselectiontypecriterion.md) object has the following elements: [HotelDateSelectionType](#hoteldateselectiontype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="hoteldateselectiontype"></a>HotelDateSelectionType|Possible hotel date selection types.|[HotelDateSelectionType](hoteldateselectiontype.md)|

The [HotelDateSelectionTypeCriterion](hoteldateselectiontypecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [HotelDateSelectionTypeCriterion](hoteldateselectiontypecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [HotelDateSelectionTypeCriterion](hoteldateselectiontypecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *HotelDateSelectionType* when you retrieve a hotel date selection type criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

