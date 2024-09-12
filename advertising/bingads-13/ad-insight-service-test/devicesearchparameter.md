---
title: DeviceSearchParameter Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The device search parameter filter that you can include when requesting keyword ideas.(test)
---
# DeviceSearchParameter Data Object Test - Ad Insight
The device search parameter filter that you can include when requesting keyword ideas.

If you do not include the device search parameter when calling [GetKeywordIdeas](getkeywordideas.md), then keyword ideas will be returned for all devices.

# [XML](#tab/xml)

```xml
<xs:complexType name="DeviceSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Device" nillable="true" type="tns:DeviceCriterion" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Device": {
    "DeviceName": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [DeviceSearchParameter](devicesearchparameter.md) object has the following elements: [Device](#device).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="device"></a>Device|The device criterion for the returned keyword ideas.|[DeviceCriterion](devicecriterion.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

