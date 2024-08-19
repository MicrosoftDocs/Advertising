---
title: MediaMetaData Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a media meta data object.(test)
---
# MediaMetaData Data Object Test - Campaign Management
Defines a media meta data object. The meta data includes download Urls for one or more media representations.

# [XML](#tab/xml)

```xml
<xs:complexType name="MediaMetaData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="MediaType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Representations" nillable="true" type="tns:ArrayOfMediaRepresentation" />
    <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "ValueHere",
  "MediaType": "ValueHere",
  "Representations": [
    {
      "Name": "ValueHere",
      "Type": "ImageMediaRepresentation",
      "Url": "ValueHere",
      "Height": NumbericValueHere,
      "Width": NumbericValueHere
    }
  ],
  "Text": "ValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [MediaMetaData](mediametadata.md) object has the following elements: [Id](#id), [MediaType](#mediatype), [Representations](#representations), [Text](#text), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The system identifier of the media meta data.|**long**|
|<a name="mediatype"></a>MediaType|The name of the media subclass.<br/><br/>For an [ImageMediaRepresentation](imagemediarepresentation.md), the *MediaType* is *Image*.|**string**|
|<a name="representations"></a>Representations|A list of [ImageMediaRepresentation](imagemediarepresentation.md) that each include download URLs for one or more media representations. The number of representations depends on the type of media. For image ad extensions the service will return exactly three [ImageMediaRepresentation](imagemediarepresentation.md) objects with varying height and width properties. For responsive ads the service will return exactly one [ImageMediaRepresentation](imagemediarepresentation.md) object. For more information see [MediaEnabledEntityFilter](mediaenabledentityfilter.md).|[MediaRepresentation](mediarepresentation.md) array|
|<a name="text"></a>Text|Reserved.|**string**|
|<a name="type"></a>Type|The type of media in the library.<br/><br/>For an [ImageMediaRepresentation](imagemediarepresentation.md), the only possible value is *ImageMediaRepresentation*.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetMediaMetaDataByAccountId](getmediametadatabyaccountid.md)  
[GetMediaMetaDataByIds](getmediametadatabyids.md)  
