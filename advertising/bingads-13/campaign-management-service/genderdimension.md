---
title: GenderDimension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a GenderDimension data object.
---
# GenderDimension Data Object - Campaign Management
Defines a GenderDimension data object.

[!INCLUDE[targeting-demographics](./includes/targeting-demographics.md)]

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="GenderDimension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AudienceGroupDimension">
      <xs:sequence>
        <xs:element minOccurs="0" name="GenderTypes" nillable="true" type="tns:ArrayOfGenderType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "Gender",
  "GenderTypes": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [GenderDimension](genderdimension.md) object has the following elements: [GenderTypes](#gendertypes).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="gendertypes"></a>GenderTypes|A list of gender types. <br /><br />**Add**: Required <br />**Update**: Optional. To remove existing values, set it to null or empty. To remove a subset of gender types, specify the gender types that you want to keep and it will replace the existing gender types.|[GenderType](gendertype.md) array|

The [GenderDimension](genderdimension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudiencegroupdimension"></a>Inherited Elements from AudienceGroupDimension
The [GenderDimension](genderdimension.md) object derives from the [AudienceGroupDimension](audiencegroupdimension.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [GenderDimension](genderdimension.md), and might not apply to other objects that inherit the same elements from the [AudienceGroupDimension](audiencegroupdimension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of audience dimensions, the following dimension types are supported as of now: *Age*, *Gender*, *Audience*.   <br /><br />**Add**: For more information about audience types, see the [Remarks](../campaign-management-service/audience.md#remarks). <br />**Update**: For more information about audience types, see the [Remarks](../campaign-management-service/audience.md#remarks). |[AudienceGroupDimensionType](audiencegroupdimensiontype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

