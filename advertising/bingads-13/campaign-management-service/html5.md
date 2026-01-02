---
title: HTML5 Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the HTML5 asset data object.
---
# HTML5 Data Object - Campaign Management
Defines the HTML5 asset data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="HTML5" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CreatedDateTimeInUTC" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="DestinationUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="FailureCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Height" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="ModifiedDateTimeInUTC" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ThumbnailUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Width" nillable="true" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CreatedDateTimeInUTC": "ValueHere",
  "DestinationUrl": "ValueHere",
  "FailureCode": "ValueHere",
  "Height": IntValueHere,
  "Id": "LongValueHere",
  "ModifiedDateTimeInUTC": "ValueHere",
  "Name": "ValueHere",
  "Status": "ValueHere",
  "Text": "ValueHere",
  "ThumbnailUrl": "ValueHere",
  "Url": "ValueHere",
  "Width": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [HTML5](html5.md) object has the following elements: [CreatedDateTimeInUTC](#createddatetimeinutc), [DestinationUrl](#destinationurl), [FailureCode](#failurecode), [Height](#height), [Id](#id), [ModifiedDateTimeInUTC](#modifieddatetimeinutc), [Name](#name), [Status](#status), [Text](#text), [ThumbnailUrl](#thumbnailurl), [Url](#url), [Width](#width).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="createddatetimeinutc"></a>CreatedDateTimeInUTC|The date and time the HTML5 asset was created in UTC.|**dateTime**|
|<a name="destinationurl"></a>DestinationUrl|The URL of the webpage that the user is taken to when they click the ad.|**string**|
|<a name="failurecode"></a>FailureCode|A descriptive error code for any issues with the HTML5 asset.|**string**|
|<a name="height"></a>Height|The height of the HTML5 asset.|**int**|
|<a name="id"></a>Id|The HTML5 asset's ID.|**long**|
|<a name="modifieddatetimeinutc"></a>ModifiedDateTimeInUTC|The date and time the HTML5 asset was modified in UTC.|**dateTime**|
|<a name="name"></a>Name|The name of the HTML5 asset.|**string**|
|<a name="status"></a>Status|The status of the HTML5 asset.|**string**|
|<a name="text"></a>Text|Descriptive text for the HTML5 asset.|**string**|
|<a name="thumbnailurl"></a>ThumbnailUrl|The URL of the thumbnail used for the HTML5 asset.|**string**|
|<a name="url"></a>Url|The URL of the HTML5 asset.|**string**|
|<a name="width"></a>Width|The width of the HTML5 asset.|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddHTML5s](addhtml5s.md)  
[GetHTML5sByIds](gethtml5sbyids.md)  
