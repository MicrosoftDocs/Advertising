---
title: DeviceEnum Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a value set for the type of device.
---
# DeviceEnum Value Set - Ad Insight
Defines a value set for the type of device.

## Syntax
```xml
<xs:simpleType name="DeviceEnum" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Desktop">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Smartphone">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Tablet">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [DeviceEnum](deviceenum.md) value set has the following values: [Desktop](#desktop), [Smartphone](#smartphone), [Tablet](#tablet).

|Value|Description|
|-----------|---------------|
|<a name="desktop"></a>Desktop|The device is a desktop computer.|
|<a name="smartphone"></a>Smartphone|The device is a smartphone.|
|<a name="tablet"></a>Tablet|The device is a tablet.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[SelectionOfDeviceEnum](selectionofdeviceenum.md)  
