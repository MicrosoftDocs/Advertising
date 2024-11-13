---
title: "Image Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Image fields in a Bulk file.
dev_langs:
  - csharp
---
# Image Record - Bulk
Defines an image that can be uploaded and downloaded in a bulk file. 

You can download all *Image* records in the account by including the [DownloadEntity](downloadentity.md) value of *Images* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new image. 

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Text,Url,Name
Format Version,,,,,,,,,,6.0
Image,Active,-20,0,ClientIdGoesHere,,My Image,https://contoso.com/PhotoStock_123.jpg,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkImage* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkImage
var bulkImage = new BulkImage
{
    // 'Id' column header in the Bulk file
    Id = imageIdKey,
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
    // 'Height' column header in the Bulk file
    Height = null,
    // 'Width' column header in the Bulk file
    Width = null,
    // 'Url' column header in the Bulk file
    Url = "https://contoso.com/PhotoStock_123.jpg",
    // 'Sub Type' column header in the Bulk file
    SubType = "GenericImage",
    // 'Text' column header in the Bulk file
    Text = "My Image",
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkImage);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await BulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();
```

For an *Image* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Client Id](#clientid)
- [Height](#height)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Sub Type](#subtype)
- [Text](#text)
- [Url](#url)
- [Width](#width)

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Delete:** Read-only  

## <a name="height"></a>Height
The height of the image stored in your media library. 

The displayed image dimensions will depend in part on your asset link aspect ratios e.g., as defined in the [Images](responsive-ad.md#images) field of a [Responsive Ad](responsive-ad.md). 

**Add:** Read-only  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the image.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the image can then be referenced in dependent record types such as the [Images](responsive-ad.md#images) field of a [Responsive Ad](responsive-ad.md). This is recommended if you are adding new image and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account that contains the image.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the image.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="subtype"></a>Sub Type
The image sub type indicates the supported aspect ratio of the uploaded image.  

We recommend the "GenericImage" with dimensions of 703 width x 368 height or above, in pixels.  

The sub type must be set to "Logo" if the image is associated with an ad as a "LandscapeLogoMedia" or "SquareLogoMedia".  

All supported sub type values with corresponding dimension and aspect ratio restrictions are described below.  

|Sub Type|Aspect Ratio|Minimum Dimension|
|--------|----------------|---------------------|---------------------|
|GenericImage|Varies|40 width x 40 height, in pixels|
|LandscapeLogoMedia|4:1|512 width x 128 height, in pixels|
|SquareLogoMedia|1:1|128 width x 128 height, in pixels|
|Image16x9|16:9|640 width x 360 height, in pixels|
|Image15x10|1.5:1|300 width x 200 height, in pixels|
|Image4x3|4:3|100 width x 75 height, in pixels|
|Image1x1|1:1|128 width x 128 height, in pixels|
|Image191x100|1.91:1|703 width x 368 height, in pixels|
|Image4x1|4:1|512 width x 128 height, in pixels|

> [!NOTE]
> The maximum width and height in pixels are 2592 and 2048 independently, and you must still maintain one of the supported aspect ratios. For example, if the sub type is Image191x100 and the width is 2592, then the height must be 1357.  

Images with animation are not supported. The following MIME types are supported.  
- GIF  
- JPEG  
- PNG  

> [!TIP]
> The PNG images are converted to JPEG. If you are not satisfied with the quality after conversion, we recommend that you provide JPEG directly.  

**Add:** Required   
**Delete:** Read-only  

## <a name="text"></a>Text
The custom text or label of the image stored in your media library. 

**Add:** Optional  
**Delete:** Read-only  

## <a name="url"></a>Url
The URL where the image can be accessed. 

To upload a new image, you must provide a temporary URL where the Bulk service can access and retrieve your image. 

When you download the image, this field contains a URL provided by the Bulk service where you can access and retrieve the stored image as needed. 

You can upload a PNG or JPEG image. Images with animation are not supported. The PNG images are converted to JPEG. If you are not satisfied with the quality after conversion, we recommend that you provide JPEG directly. 

**Add:** Required  
**Delete:** Read-only  

## <a name="width"></a>Width
The width of the image stored in your media library. 

The displayed image dimensions will depend in part on your asset link aspect ratios e.g., as defined in the [Images](responsive-ad.md#images) field of a [Responsive Ad](responsive-ad.md). 

**Add:** Read-only  
**Delete:** Read-only  
