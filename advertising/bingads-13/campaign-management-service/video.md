---
title: Video Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the Video Data Object.
---
# Video Data Object - Campaign Management
Defines the Video Data Object.

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon!

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="Video" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdvertiserAILabel" nillable="true" type="tns:AdvertiserAILabel">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="AspectRatio" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CreatedDateTimeInUTC" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="DurationInMilliseconds" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="FailureCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="ModifiedDateTimeInUTC" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="SourceUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="SystemAIDetectionSignal" nillable="true" type="tns:SystemAIDetectionSignal">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="ThumbnailUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdvertiserAILabel": "ValueHere",
  "AspectRatio": "ValueHere",
  "CreatedDateTimeInUTC": "ValueHere",
  "Description": "ValueHere",
  "DurationInMilliseconds": IntValueHere,
  "FailureCode": "ValueHere",
  "Id": "LongValueHere",
  "ModifiedDateTimeInUTC": "ValueHere",
  "SourceUrl": "ValueHere",
  "Status": "ValueHere",
  "SystemAIDetectionSignal": "ValueHere",
  "ThumbnailUrl": "ValueHere",
  "Url": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [Video](video.md) object has the following elements: [AdvertiserAILabel](#advertiserailabel), [AspectRatio](#aspectratio), [CreatedDateTimeInUTC](#createddatetimeinutc), [Description](#description), [DurationInMilliseconds](#durationinmilliseconds), [FailureCode](#failurecode), [Id](#id), [ModifiedDateTimeInUTC](#modifieddatetimeinutc), [SourceUrl](#sourceurl), [Status](#status), [SystemAIDetectionSignal](#systemaidetectionsignal), [ThumbnailUrl](#thumbnailurl), [Url](#url).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="advertiserailabel"></a>AdvertiserAILabel|The advertiser's declaration about AI-generated content and visible watermarks in the video. Set this property with [AddVideos](addvideos.md) or [UpdateVideos](updatevideos.md). After the label has been set, it cannot be cleared.<br/><br/>**Add**: Supported<br/>**Update**: Supported|[AdvertiserAILabel](advertiserailabel.md)|
|<a name="aspectratio"></a>AspectRatio|The video's aspect ratio. Possible values are 16:9, 9:16, 4:3, 3:4, 1:1, 5:4, and 4:5.|**string**|
|<a name="createddatetimeinutc"></a>CreatedDateTimeInUTC|The date and time the video was created, in Coordinated Universal Time.|**dateTime**|
|<a name="description"></a>Description|The description of the video asset.<br/><br/>**Add**: Supported<br/>**Update**: Supported|**string**|
|<a name="durationinmilliseconds"></a>DurationInMilliseconds|The duration in milliseconds of the video asset.<br/><br/>**Add**: Unsupported<br/>**Update**: Unsupported|**int**|
|<a name="failurecode"></a>FailureCode|Read the description for each possible error code below.<br /><br />AssetDataInvalid: The file downloaded from the URL is not a video.<br /><br />VideoDownloadError: The provided URL is not accessible.<br /><br />AssetDataInvalidWidth: The video frame width is less than 120 pixels. <br /><br />AssetDataInvalidHeight:  The video frame height is less than 120 pixels.<br /><br />InvalidDuration: The video duration is less than 6 seconds.<br /><br />VideoOverweight: The video file size is greater than 2 GB.<br /><br />VideoTranscodingError: A general failure code that represents a transcoding issue. This is controlled by Azure Media Service. Learn more about [encoding video](/azure/media-services/latest/encode-concept) and [JobErrorCode](/dotnet/api/microsoft.azure.management.media.models.joberrorcode).|**string**|
|<a name="id"></a>Id|The identifier of the video.|**long**|
|<a name="modifieddatetimeinutc"></a>ModifiedDateTimeInUTC|The date and time the video was last modified, in Coordinated Universal Time.|**dateTime**|
|<a name="sourceurl"></a>SourceUrl|The original URL of the video. *Note*: SourceUrl must be a direct download URL.<br/><br/>**Add**: Supported and Required<br/>|**string**|
|<a name="status"></a>Status|The status of the video asset. The status can be *Draft*, *Active*, *Deleted* or *Failed*.<br/><br/>**Add**: Unsupported<br/>**Update**: Supported|**string**|
|<a name="systemaidetectionsignal"></a>SystemAIDetectionSignal|Microsoft's detection of AI provenance for the video. This property is returned by the system and is read-only. Advertisers cannot set or modify it.<br/><br/>**Add**: Read-only<br/>**Update**: Read-only|[SystemAIDetectionSignal](systemaidetectionsignal.md)|
|<a name="thumbnailurl"></a>ThumbnailUrl|The thumbnail URL of the video asset.<br/><br/>**Add**: Unsupported<br/>**Update**: Unsupported|**string**|
|<a name="url"></a>Url|The URL where the video is hosted. *Note*: URL is reserved for internal usage.<br/><br/>**Add**: Supported<br/>**Update**: Supported|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddVideos](addvideos.md)  
[AdRecommendationVideoSuggestion](adrecommendationvideosuggestion.md)  
[GetVideosByIds](getvideosbyids.md)  
[UpdateVideos](updatevideos.md)  
