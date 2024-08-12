---
title: VanityPharmaSetting Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for VanityPharmaSetting.(test)
---
# VanityPharmaSetting Data Object Test - Campaign Management
Reserved.

# [XML](#tab/xml)

```xml
<xs:complexType name="VanityPharmaSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="DisplayUrlMode" nillable="true" type="tns:VanityPharmaDisplayUrlMode">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="WebsiteDescription" nillable="true" type="tns:VanityPharmaWebsiteDescription">
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
  "Type": "VanityPharmaSetting",
  "DisplayUrlMode": "ValueHere",
  "WebsiteDescription": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [VanityPharmaSetting](vanitypharmasetting.md) object has the following elements: [DisplayUrlMode](#displayurlmode), [WebsiteDescription](#websitedescription).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="displayurlmode"></a>DisplayUrlMode|Reserved.|[VanityPharmaDisplayUrlMode](vanitypharmadisplayurlmode.md)|
|<a name="websitedescription"></a>WebsiteDescription|Reserved.|[VanityPharmaWebsiteDescription](vanitypharmawebsitedescription.md)|

The [VanityPharmaSetting](vanitypharmasetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [VanityPharmaSetting](vanitypharmasetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [VanityPharmaSetting](vanitypharmasetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

