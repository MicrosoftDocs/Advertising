---
title: GeoPoint Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains the longitude and latitude coordinates of a geographical location.(test)
---
# GeoPoint Data Object Test - Campaign Management
Defines an object that contains the longitude and latitude coordinates of a geographical location.

# [XML](#tab/xml)

```xml
<xs:complexType name="GeoPoint" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="LatitudeInMicroDegrees" type="xs:int" />
    <xs:element name="LongitudeInMicroDegrees" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "LatitudeInMicroDegrees": IntValueHere,
  "LongitudeInMicroDegrees": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [GeoPoint](geopoint.md) object has the following elements: [LatitudeInMicroDegrees](#latitudeinmicrodegrees), [LongitudeInMicroDegrees](#longitudeinmicrodegrees).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="latitudeinmicrodegrees"></a>LatitudeInMicroDegrees|The latitude specified in micro degrees. The latitude must be greater than or equal to -85000000 and less than or equal to +85000000.|**int**|
|<a name="longitudeinmicrodegrees"></a>LongitudeInMicroDegrees|The longitude specified in micro degrees. The longitude must be greater than or equal to -180000000 and less than or equal to +180000000.|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[LocationAdExtension](locationadextension.md)  
