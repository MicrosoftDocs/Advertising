---
title: "Brand Kit Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a brand kit that can be downloaded and uploaded in a bulk file.
dev_langs:
  - csharp
---
# Brand Kit Record - Bulk
Defines a brand kit that can be downloaded and uploaded in a bulk file.

You can download all *Brand Kit* records in the account by including the [DownloadEntity](downloadentity.md) value of *BrandKits* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkBrandKit* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.  

For a *Brand Kit* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).  

- [Brand Voice](#brandvoice)
- [Business Name](#businessname)
- [Fonts](#fonts)
- [Id](#id)
- [Images](#images)
- [Landscape Logos](#landscapelogos)
- [Name](#name)
- [Palettes](#palettes)
- [Status](#status)
- [SquareLogos](#squarelogos)

## <a name="brandvoice"></a>Brand Voice
The brand's personality and tone.  

```json
{ 
    "personality": "This is a brand voice personality that describes the tone and personality of the brand's communications.", 
    "tones":  ["professional", "trustworthy", "reliable" ] 
} 
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""personality"":""cropX"":},{""id"":1234567890000,""This is a brand voice personality that describes the tone and personality of the brand's communications."", ""tones"": [""professional"", ""trustworthy"", ""reliable""]}]"*.  

See [BrandVoice](../campaign-management-service/brandvoice.md) for more information about the *BrandVoice* elements.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="businessname"></a>Business Name
The name of the business.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="fonts"></a>Fonts
The brand kit's fonts.

```json
[{ 
    "typeface": "Arial", 
    "weight": "Normal", 
    "textAssetType": "ShortHeadline", 
}] 
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""typeface"":""Arial"", ""weight"": ""Normal"", ""textAssetType"": ""ShortHeadline""}]"*.  

See [BrandKitFont](../campaign-management-service/brandkitfont.md) for more information about the *BrandKitFont* elements.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The identifier of the brand kit.

**Add:** Optional  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="images"></a>Images
The brand kit's images.  

```json
[{
    "id": 1234567890000,
    "cropX": 286,
    "cropY": 0,
    "cropWidth": 628,
    "cropHeight": 628
},
{
    "id": 1234567890000,
    "cropX": 70,
    "cropY": 0,
    "cropWidth": 1061,
    "cropHeight": 628
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""id"":1234567890000,""cropX"":286,""cropY"":0,""cropWidth"":628,""cropHeight"":628},{""id"":1234567890000,""cropX"":70,""cropY"":0,""cropWidth"":1061,""cropHeight"":628}]"*.  

See [BrandKitImage](../campaign-management-service/brandkitimage.md) for more information about the *BrandKitImage* elements.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

### <a name="landscapelogos"></a>Landscape Logos
The brand kit's landscape logos.

```json
[{
    "id": 1234567890000,
    "cropX": 0,
    "cropY": 0,
    "cropWidth": 628,
    "cropHeight": 300
},
{
    "id": 1234567890000,
    "cropX": 0,
    "cropY": 0,
    "cropWidth": 1061,
    "cropHeight": 628
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""id"":1234567890000,""cropX"":0,""cropY"":0,""cropWidth"":628,""cropHeight"":300},{""id"":1234567890000,""cropX"":0,""cropY"":0,""cropWidth"":1061,""cropHeight"":628}]"*.  

See [BrandKitImage](../campaign-management-service/brandkitimage.md) for more information about the *BrandKitImage* elements.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

### <a name="name"></a>Name
The brand kit's name.  

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

### <a name="palettes"></a>Palettes
The brand kit's palettes.

```json
[{
    "colorType": "Primary",
    "colors":
    [
        {
            "name": "TestBrandKitColor",
            "hexCode": "#FFFFFF"
        }
    ]
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{"" colorType"": ""Primary"":},""colors"":[{"" name "": ""TestBrandKitColor"","" hexCode"": ""#FFFFFF""}]]""*.  

See [BrandKitPalette](../campaign-management-service/brandkitpalette.md) for more information about the *BrandKitImage* elements.

## <a name="status"></a>Status
The status of the brand kit.

Possible values are *Active* or *Deleted*.

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Required. The status must be set to *Deleted*.  

## <a name="squarelogos"></a>Square Logos
The brand kit's square logos.

```json
[{ 
  "id": 1234567890000, 
  "cropX": 0, 
  "cropY": 0, 
  "cropWidth": 628, 
  "cropHeight": 628 
}, 

{ 
  "id": 1234567890000, 
  "cropX": 0, 
  "cropY": 0, 
  "cropWidth": 1061, 
  "cropHeight": 1061 
}] 
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""id"":1234567890000,""cropX"":0,""cropY"":0,""cropWidth"":628,""cropHeight"":628},{""id"":1234567890000,""cropX"":0,""cropY"":0,""cropWidth"":1061,""cropHeight"":1061}]"*.  

See [BrandKitImage](../campaign-management-service/brandkitimage.md) for more information about the *BrandKitImage* elements.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. The start date cannot be updated after the brand kit is submitted i.e., once the start date has arrived.  
**Delete:** Read-only  
