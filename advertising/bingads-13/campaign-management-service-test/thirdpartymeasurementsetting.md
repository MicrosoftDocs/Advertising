---
title: ThirdPartyMeasurementSetting Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.(test)
---
# ThirdPartyMeasurementSetting Data Object Test - Campaign Management
Reserved.

# [XML](#tab/xml)

```xml
<xs:complexType name="ThirdPartyMeasurementSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element xmlns:q8="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="Details" nillable="true" type="q8:ArrayOfArrayOfKeyValuePairOfstringstring" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "ThirdPartyMeasurementSetting",
  "Details": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [ThirdPartyMeasurementSetting](thirdpartymeasurementsetting.md) object has the following elements: [Details](#details).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="details"></a>Details|Reserved.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|

The [ThirdPartyMeasurementSetting](thirdpartymeasurementsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [ThirdPartyMeasurementSetting](thirdpartymeasurementsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ThirdPartyMeasurementSetting](thirdpartymeasurementsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

