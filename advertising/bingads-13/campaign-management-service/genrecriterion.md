---
title: GenreCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a criterion that can be used to show ads from a specific genre.
---
# GenreCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads from a specific genre.

## Syntax
```xml
<xs:complexType name="GenreCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="GenreId" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [GenreCriterion](genrecriterion.md) object has the following elements: [GenreId](#genreid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="genreid"></a>GenreId|The Microsoft Advertising identifier of the Genre.|**long**|

The [GenreCriterion](genrecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [GenreCriterion](genrecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [GenreCriterion](genrecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Genre* when you retrieve a genre criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

