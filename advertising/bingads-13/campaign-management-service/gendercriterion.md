---
title: GenderCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a criterion that can be used to show ads to users of a specific gender.
---
# GenderCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads to users of a specific gender.

The *GenderCriterion* criterion can be included within [BiddableAdGroupCriterion](biddableadgroupcriterion.md), [NegativeAdGroupCriterion](negativeadgroupcriterion.md), and [BiddableCampaignCriterion](biddablecampaigncriterion.md) objects. If ad group level gender criterions are specified, the campaign level gender criterions are ignored for that ad group. In other words the ad group gender criterions override the campaign gender criterions, and are not applied as a union.  

[!INCLUDE[performance-max-columns](./includes/targeting-demographics.md)]

## Syntax
```xml
<xs:complexType name="GenderCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="GenderType" nillable="true" type="tns:GenderType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [GenderCriterion](gendercriterion.md) object has the following elements: [GenderType](#gendertype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="gendertype"></a>GenderType|The gender of the people you want to see your ads.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting. |[GenderType](gendertype.md)|

The [GenderCriterion](gendercriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [GenderCriterion](gendercriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [GenderCriterion](gendercriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Gender* when you retrieve a gender criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

