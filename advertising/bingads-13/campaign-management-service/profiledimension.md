---
title: ProfileDimension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the profile dimension data object.
---
# ProfileDimension Data Object - Campaign Management
Defines the profile dimension data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ProfileDimension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AudienceGroupDimension">
      <xs:sequence>
        <xs:element minOccurs="0" name="Profiles" nillable="true" type="tns:ArrayOfProfileInfo" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "ProfileDimension",
  "Profiles": [
    {
      "Id": "LongValueHere",
      "Type": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [ProfileDimension](profiledimension.md) object has the following elements: [Profiles](#profiles).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="profiles"></a>Profiles|Reserved.|[ProfileInfo](profileinfo.md) array|

The [ProfileDimension](profiledimension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudiencegroupdimension"></a>Inherited Elements from AudienceGroupDimension
The [ProfileDimension](profiledimension.md) object derives from the [AudienceGroupDimension](audiencegroupdimension.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ProfileDimension](profiledimension.md), and might not apply to other objects that inherit the same elements from the [AudienceGroupDimension](audiencegroupdimension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|[AudienceGroupDimensionType](audiencegroupdimensiontype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

