---
title: AgeDimension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Data object that specifies users by their age.
---
# AgeDimension Data Object - Campaign Management
Data object that specifies users by their age.  

[!INCLUDE[targeting-demographics](./includes/targeting-demographics.md)]

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AgeDimension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AudienceGroupDimension">
      <xs:sequence>
        <xs:element minOccurs="0" name="AgeRanges" nillable="true" type="tns:ArrayOfAgeRange" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "Age",
  "AgeRanges": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AgeDimension](agedimension.md) object has the following elements: [AgeRanges](#ageranges).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="ageranges"></a>AgeRanges|A list of age ranges. <br /><br />To remove existing values, set *AgeRanges* to null or empty. To remove a subset of age ranges, specify the age ranges that you want to keep and the existing age ranges will be replaced.<br /><br />**Add**: Required <br />**Update**: Optional. |[AgeRange](agerange.md) array|

The [AgeDimension](agedimension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudiencegroupdimension"></a>Inherited Elements from AudienceGroupDimension
The [AgeDimension](agedimension.md) object derives from the [AudienceGroupDimension](audiencegroupdimension.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [AgeDimension](agedimension.md), and might not apply to other objects that inherit the same elements from the [AudienceGroupDimension](audiencegroupdimension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of audience dimensions, the following dimension types are supported as of now: Age, Gender, Audience.<br /><br />**Add**: For more information about audience types, see the [Remarks](../campaign-management-service/audience.md#remarks). <br />**Update**: For more information about audience types, see the [Remarks](../campaign-management-service/audience.md#remarks).|[AudienceGroupDimensionType](audiencegroupdimensiontype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

