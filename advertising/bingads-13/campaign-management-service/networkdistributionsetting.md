---
title: NetworkDistributionSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the network distribution setting data object.
---
# NetworkDistributionSetting Data Object - Campaign Management
Defines the network distribution setting data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="NetworkDistributionSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="NetworkOption" nillable="true" type="tns:Network">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "NetworkDistributionSetting",
  "NetworkOption": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [NetworkDistributionSetting](networkdistributionsetting.md) object has the following elements: [NetworkOption](#networkoption).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="networkoption"></a>NetworkOption|Reserved.|[Network](network.md)|

The [NetworkDistributionSetting](networkdistributionsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [NetworkDistributionSetting](networkdistributionsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [NetworkDistributionSetting](networkdistributionsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

