---
title: Video Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the Video Data Object.
ms.subservice: campaign-management-api
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
|<a name="aspectratio"></a>AspectRatio|The video's aspect ratio. Possible values are 16:9, 5:4, 1:1, 4:5, and 9:16.|**string**|
|<a name="createddatetimeinutc"></a>The date and time the video was created, in Coordinated Universal Time.||**dateTime**|
|<a name="description"></a>Description|The description of the video asset.<br/><br/>**Add**: Supported<br/>**Update**: Supported|**string**|
|<a name="durationinmilliseconds"></a>DurationInMilliseconds|The duration in milliseconds of the video asset.<br/><br/>**Add**: Unsupported<br/>**Update**: Unsupported|**int**|
|<a name="failurecode"></a>FailureCode|Read the description for each possible error code below.<br /><br />AssetDataInvalid: The file downloaded from the URL is not a video.<br /><br />VideoDownloadError: The provided URL is not accessible.<br /><br />AssetDataInvalidWidth: The video frame width is less than 120 pixels. <br /><br />AssetDataInvalidHeight:  The video frame height is less than 120 pixels.<br /><br />InvalidDuration: The video duration is less than 6 seconds.<br /><br />VideoOverweight: The video file size is greater than 2 GB.<br /><br />VideoTranscodingError: A general failure code that represents a transcoding issue. This is controlled by Azure Media Service. Learn more about [encoding video](https://learn.microsoft.com/en-us/azure/media-services/latest/encode-concept) and [JobErrorCode](https://learn.microsoft.com/en-us/dotnet/api/microsoft.azure.management.media.models.joberrorcode?view=azure-dotnet).|**string**|
|<a name="id"></a>Id|The identifier of the video.|**long**|
|<a name="modifieddatetimeinutc"></a>ModifiedDateTimeInUTC|The date and time the video was last modified, in Coordinated Universal Time.|**dateTime**|
|<a name="sourceurl"></a>SourceUrl|The original URL of the video.|**string**|
|<a name="status"></a>Status|The status of the video asset. The status can be *Draft*, *Active*, *Deleted* or *Failed*.<br/><br/>**Add**: Unsupported<br/>**Update**: Unsupported|**string**|
|<a name="thumbnailurl"></a>ThumbnailUrl|The thumbnail URL of the video asset.<br/><br/>**Add**: Unsupported<br/>**Update**: Unsupported|**string**|
|<a name="url"></a>Url|The URL where the video is hosted. *Note*: URL is reserved for internal usage.<br/><br/>**Add**: Supported<br/>**Update**: Unsupported|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddVideos](addvideos.md)  
[GetVideosByIds](getvideosbyids.md)  
[UpdateVideos](updatevideos.md)  
