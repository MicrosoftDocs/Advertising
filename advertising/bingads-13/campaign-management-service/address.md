---
title: Address Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a postal address for location ad extensions.
---
# Address Data Object - Campaign Management
Defines a postal address for location ad extensions.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="Address" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CityName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CountryCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="PostalCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ProvinceCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ProvinceName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StreetAddress" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StreetAddress2" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CityName": "ValueHere",
  "CountryCode": "ValueHere",
  "PostalCode": "ValueHere",
  "ProvinceCode": "ValueHere",
  "ProvinceName": "ValueHere",
  "StreetAddress": "ValueHere",
  "StreetAddress2": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [Address](address.md) object has the following elements: [CityName](#cityname), [CountryCode](#countrycode), [PostalCode](#postalcode), [ProvinceCode](#provincecode), [ProvinceName](#provincename), [StreetAddress](#streetaddress), [StreetAddress2](#streetaddress2).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="cityname"></a>CityName|The name of the city where the street address is located. The name can contain a maximum of 80 characters.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="countrycode"></a>CountryCode|The country where the street address is located. The country code must contain a 2 character country code. The supported country code values include AR, AT, AU, BR, CA, CH, CL, CO, DE, DK, ES, FI, FR, GB, HK, ID, IE, IN, IT, MX, MY, NL, NZ, NO, PE, PH, SE, SG, TH, TW, US, VE, and VN.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="postalcode"></a>PostalCode|The postal or zip code. The postal code can contain a maximum of 80 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, the previous setting will be deleted.|**string**|
|<a name="provincecode"></a>ProvinceCode|A code that identifies the state or province where the street address is located. For example, WA. The code can contain a maximum of 50 characters.<br/><br/>You must specify either *ProvinceName* or *ProvinceCode*.<br/><br/>The *ProvinceCode* and *ProvinceName* are not required if the *CountryCode* element is set to either *FR*, *IE*, or *SG*.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="provincename"></a>ProvinceName|The name of the state or province where the street address is located. For example, Washington. The name can contain a maximum of 50 characters.<br/><br/>You must specify either *ProvinceName* or *ProvinceCode*.<br/><br/>The*ProvinceCode* and *ProvinceName* are not required if the *CountryCode* element is set to either *FR*, *IE*, or *SG*.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="streetaddress"></a>StreetAddress|The first line of the address. The first line can contain a maximum of 80 characters.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="streetaddress2"></a>StreetAddress2|The second line of the address. The second line can contain a maximum of 80 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, the previous setting will be deleted.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[LocationAdExtension](locationadextension.md)  
