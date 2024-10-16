---
title: VanityPharmaSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for VanityPharmaSetting.
---
# VanityPharmaSetting Data Object - Campaign Management
Defines a data object for VanityPharmaSetting. You can set the *DisplayUrlMode* and *WebsiteDescription*.

> [!NOTE]
> *Note*: *VanityPharmaSetting* is available for limited pilot usage (e.g., pharmaceutical customers).

## Syntax
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

## <a name="elements"></a>Elements

The [VanityPharmaSetting](vanitypharmasetting.md) object has the following elements: [DisplayUrlMode](#displayurlmode), [WebsiteDescription](#websitedescription).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="displayurlmode"></a>DisplayUrlMode|The display mode for vanity pharma URLs for a campaign.<br/><br/>*Note*: *VanityPharmaDisplayUrlMode* is available for limited pilot usage (e.g., pharmaceutical customers).<br/><br/>**Add**: Optional. If you do not specify this field or leave it empty, the default value of *ManufacturerWebsiteUrl* will be set.<br/>**Update**: Optional. If no value is set for the update, this setting is not changed.<br/>**Delete**: Read-only.|[VanityPharmaDisplayUrlMode](vanitypharmadisplayurlmode.md)|
|<a name="websitedescription"></a>WebsiteDescription|The text that shows in the display URL of a text ad when *WebsiteDescription* is the selected display mode for vanity pharma URLs for the campaign. *Note*: *VanityPharmaWebsiteDescription* is available for limited pilot usage (e.g., pharmaceutical customers).<br/><br/>**Add**: Optional. If you do not specify this field or leave it empty, the default value of *Unspecified* is set.<br/>**Update**: Optional. If no value is set for the update, this setting is not changed.<br/>If no value is set but the value for *VanityPharmaDisplayURLMode* is set to *ManufacturerWebsiteUrl*, the value of *Unspecified* is set.<br/>If no value is set but the value for *VanityPharmaDisplayURLMode* is set to *WebsiteDescription*, the campaign service will return the TBD error code.<br/>If a value other than *Unspecified* is set but the value for *VanityPharmaDisplayURLMode* is set to *ManufacturerWebsiteUrl*, the campaign service will return the TBD error code.<br/>**Delete**: Read-only|[VanityPharmaWebsiteDescription](vanitypharmawebsitedescription.md)|

The [VanityPharmaSetting](vanitypharmasetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [VanityPharmaSetting](vanitypharmasetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [VanityPharmaSetting](vanitypharmasetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of setting.<br/><br/>For more information, see [Remarks](setting.md#remarks).|**string**|


## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  
