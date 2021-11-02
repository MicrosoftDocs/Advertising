---
title: Video Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the Video Data Object.
---
# Video Data Object - Campaign Management
Defines the Video Data Object.

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon!

## Syntax
```xml
<xs:complexType name="Video" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AspectRatio" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CreatedDateTimeInUTC" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="DurationInMilliseconds" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="FailureCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="ModifiedDateTimeInUTC" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="SourceUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ThumbnailUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Video](video.md) object has the following elements: [AspectRatio](#aspectratio), [CreatedDateTimeInUTC](#createddatetimeinutc), [Description](#description), [DurationInMilliseconds](#durationinmilliseconds), [FailureCode](#failurecode), [Id](#id), [ModifiedDateTimeInUTC](#modifieddatetimeinutc), [SourceUrl](#sourceurl), [Status](#status), [ThumbnailUrl](#thumbnailurl), [Url](#url).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aspectratio"></a>AspectRatio|Reserved.|**string**|
|<a name="createddatetimeinutc"></a>CreatedDateTimeInUTC|Reserved.|**dateTime**|
|<a name="description"></a>Description|Reserved.|**string**|
|<a name="durationinmilliseconds"></a>DurationInMilliseconds|Reserved.|**int**|
|<a name="failurecode"></a>FailureCode|Reserved.|**string**|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="modifieddatetimeinutc"></a>ModifiedDateTimeInUTC|Reserved.|**dateTime**|
|<a name="sourceurl"></a>SourceUrl|Reserved.|**string**|
|<a name="status"></a>Status|Reserved.|**string**|
|<a name="thumbnailurl"></a>ThumbnailUrl|Reserved.|**string**|
|<a name="url"></a>Url|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddVideos](addvideos.md)  
[GetVideosByIds](getvideosbyids.md)  
[UpdateVideos](updatevideos.md)  
