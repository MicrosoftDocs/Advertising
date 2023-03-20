---
title: MediaRepresentation Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a media representation base class that includes a  media download Url.
---
# MediaRepresentation Data Object - Campaign Management
Defines a media representation base class that includes a  media download Url.

Do not try to instantiate a *MediaRepresentation*. You can create the [ImageMediaRepresentation](imagemediarepresentation.md) object that derives from it. 

## Syntax
```xml
<xs:complexType name="MediaRepresentation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [MediaRepresentation](mediarepresentation.md) object has the following elements: [Name](#name), [Type](#type), [Url](#url).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="name"></a>Name|The name of the media representation.|**string**|
|<a name="type"></a>Type|The type of the media representation.|**string**|
|<a name="url"></a>Url|The media download URL.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[MediaMetaData](mediametadata.md)  
