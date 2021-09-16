---
title: AgeCriterion Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a criterion that can be used to show ads to users in a specific age range.
---
# AgeCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads to users in a specific age range.

The *AgeCriterion* criterion can be included within [BiddableAdGroupCriterion](biddableadgroupcriterion.md), [NegativeAdGroupCriterion](negativeadgroupcriterion.md), and [BiddableCampaignCriterion](biddablecampaigncriterion.md) objects. If ad group level age criterions are specified, the campaign level age criterions are ignored for that ad group. In other words the ad group age criterions override the campaign age criterions, and are not applied as a union.   

## Syntax
```xml
<xs:complexType name="AgeCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="AgeRange" nillable="true" type="tns:AgeRange" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AgeCriterion](agecriterion.md) object has the following elements: [AgeRange](#agerange).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="agerange"></a>AgeRange|The age range of the people you want to see your ads.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting. |[AgeRange](agerange.md)|

The [AgeCriterion](agecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [AgeCriterion](agecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [AgeCriterion](agecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Age* when you retrieve an age criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

