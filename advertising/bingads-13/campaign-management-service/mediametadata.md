---
title: MediaMetaData Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a media meta data object.
ms.subservice: campaign-management-api
---
# MediaMetaData Data Object - Campaign Management
Defines a media meta data object. The meta data includes download Urls for one or more media representations.

## Syntax
```xml
<xs:complexType name="MediaMetaData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="MediaType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Representations" nillable="true" type="tns:ArrayOfMediaRepresentation" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [MediaMetaData](mediametadata.md) object has the following elements: [Id](#id), [MediaType](#mediatype), [Representations](#representations), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The system identifier of the media meta data.|**long**|
|<a name="mediatype"></a>MediaType|The name of the media subclass.<br/><br/>For an [ImageMediaRepresentation](imagemediarepresentation.md), the *MediaType* is *Image*.|**string**|
|<a name="representations"></a>Representations|A list of [ImageMediaRepresentation](imagemediarepresentation.md) that each include download URLs for one or more media representations. The number of representations depends on the type of media. For image ad extensions the service will return exactly three [ImageMediaRepresentation](imagemediarepresentation.md) objects with varying height and width properties. For responsive ads the service will return exactly one [ImageMediaRepresentation](imagemediarepresentation.md) object. For more information see [MediaEnabledEntityFilter](mediaenabledentityfilter.md).|[MediaRepresentation](mediarepresentation.md) array|
|<a name="type"></a>Type|The type of media in the library.<br/><br/>For an [ImageMediaRepresentation](imagemediarepresentation.md), the only possible value is *ImageMediaRepresentation*.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetMediaMetaDataByAccountId](getmediametadatabyaccountid.md)  
[GetMediaMetaDataByIds](getmediametadatabyids.md)  
