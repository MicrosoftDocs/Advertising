---
title: SelectionOfDeviceEnum Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object that includes or excludes device types.
---
# SelectionOfDeviceEnum Data Object - Ad Insight
Defines a data object that includes or excludes device types.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SelectionOfDeviceEnum" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="SelectionOf{0}" Namespace="https://bingads.microsoft.com/AdInsight/v13" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="DeviceEnum" Namespace="https://bingads.microsoft.com/AdInsight/v13" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="Includes" nillable="true" type="tns:ArrayOfDeviceEnum" />
    <xs:element minOccurs="0" name="Excludes" nillable="true" type="tns:ArrayOfDeviceEnum" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Excludes": [
    "ValueHere"
  ],
  "Includes": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [SelectionOfDeviceEnum](selectionofdeviceenum.md) object has the following elements: [Excludes](#excludes), [Includes](#includes).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludes"></a>Excludes|Exclude the type of devices present in the *DeviceEnum*.|[DeviceEnum](deviceenum.md) array|
|<a name="includes"></a>Includes|Include the type of desvices present in the *DeviceEnum*.|[DeviceEnum](deviceenum.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceBreakdown](getaudiencebreakdown.md)  
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
