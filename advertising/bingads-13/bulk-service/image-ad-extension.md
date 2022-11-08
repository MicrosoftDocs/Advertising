---
title: "Image Ad Extension Record - Bulk"
ms.service: bing-ads
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Image Ad Extension fields in a Bulk file.
dev_langs:
  - csharp
ms.subservice: bulk-api
---
# Image Ad Extension Record - Bulk
Defines an image ad extension that can be downloaded and uploaded in a bulk file.

You can associate an image ad extension with the account or with campaigns and ad groups in the account. For each account, only 1,000 campaigns and 1,000 ad groups can be associated with image ad extensions. Each entity (account, campaign, or ad group) can be associated with up to 6 image ad extensions. Use the [Account Image Ad Extension](account-image-ad-extension.md), [Ad Group Image Ad Extension](ad-group-image-ad-extension.md), and [Campaign Image Ad Extension](campaign-image-ad-extension.md) records to manage image ad extension associations.

You can download all *Image Ad Extension* records in the account by including the [DownloadEntity](downloadentity.md) value of *ImageAdExtensions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Image Ad Extension to the account's shared library. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Start Date,End Date,Device Preference,Name,Ad Schedule,Use Searcher Time Zone,Alternative Text,Media Ids,Final Url Suffix
Format Version,,,,,,,,,,,6.0,,,,,
Image Ad Extension,Active,-14,0,,,ClientIdGoesHere,,,,,,,FALSE,ImageAdExtension Alternative Text,ImageMediaIdHere,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkImageAdExtension* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkImageAdExtension
var bulkImageAdExtension = new BulkImageAdExtension
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
                
    // Map properties in the Bulk file to the 
    // ImageAdExtension object of the Campaign Management service.
    ImageAdExtension = new ImageAdExtension
    {
        // 'Alternative Text' column header in the Bulk file
        AlternativeText = "ImageAdExtension Alternative Text",
        // 'Destination Url' column header in the Bulk file
        DestinationUrl = null,
        // 'Id' column header in the Bulk file
        Id = imageAdExtensionIdKey,
        // 'Media Ids' column header in the Bulk file
        ImageMediaIds = new long[] { ImageMediaIdHere },
        // 'Status' column header in the Bulk file
        Status = AdExtensionStatus.Active,
    },
};

uploadEntities.Add(bulkImageAdExtension);

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

For an *Image Ad Extension* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Schedule](#adschedule)
- [Alternative Text](#alternativetext)
- [Client Id](#clientid)
- [Custom Parameter](#customparameter)
- [Destination Url](#destinationurl)
- [Display Text](#displaytext)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [End Date](#enddate)
- [Final Url](#finalurl)
- [Final Url Suffix](#finalurlsuffix)
- [Id](#id)
- [Images](#images)
- [Layouts](#layouts)
- [Media Ids](#mediaids)
- [Mobile Final Url](#mobilefinalurl)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Publisher Countries](#publishercountries)
- [Start Date](#startdate)
- [Status](#status)
- [Tracking Template](#trackingtemplate)
- [Use Searcher Time Zone](#usesearchertimezone)
- [Version](#version)

## <a name="adschedule"></a>Ad Schedule
The list of day and time ranges that you want the ad extension to be displayed with your ads. Each day and time range includes the scheduled day of week, start/end hour, and start/end minute. Each day and time range is enclosed by left and right parentheses, and separated from other day and time ranges with a semicolon (;) delimiter. Within each day and time range the format is *Day[StartHour:StartMinue-EndHour:EndMinute]*. 

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields. Otherwise, image ad extension scheduling is not supported.  

The possible values of *StartHour* range from 00 to 23, where *00* is equivalent to 12:00AM and *12* is 12:00PM.

The possible values of *EndHour* range from 00 to 24, where *00* is equivalent to 12:00AM and *12* is 12:00PM.

The possible values of *StartMinute* and *EndMinute* range from 00 to 60.

The following example demonstrates day and time ranges during weekdays from 9:00AM through 9:00PM: *(Monday[09:00-21:00]);(Tuesday[09:00-21:00]);(Wednesday[09:00-21:00]);(Thursday[09:00-21:00]);(Friday[09:00-21:00])*

**Add:** Optional. If you do not set this field, the ad extension will be eligible for scheduling anytime during the calendar [start](#startdate) and [end](#enddate) dates.  
**Update:** Optional. The individual day and time ranges cannot be updated. You can effectively update the day and time ranges by sending a new set that should replace the prior set. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.    
**Delete:** Read-only  

## <a name="alternativetext"></a>Alternative Text
Alternative description of the image media for usability. If the image could not be displayed, the alternative text is used instead.

The maximum length for this field is 35 characters.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="customparameter"></a>Custom Parameter
Your custom collection of key and value parameters for URL tracking.

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Custom Parameter](#customparameter) field.  

In a bulk file, the list of custom parameters are formatted as follows.

- Format each custom parameter pair as Key=Value, for example {_promoCode}=PROMO1.

- Microsoft Advertising will accept the first 3 custom parameter key and value pairs that you include, and any additional custom parameters will be ignored. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.  

- Each key and value pair are delimited by a semicolon and space ("; "), for example {_promoCode}=PROMO1; {_season}=summer.  

- A Key cannot contain a semicolon. If a Value contains a semicolon it must be escaped as '\\;'. Additionally if the Value contains a backslash it must also be escaped as '\\'.

- The Key cannot exceed 16 UTF-8 bytes, and the Value cannot exceed 200 UTF-8 bytes. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), the Value limit increases to 250 UTF-8 bytes. The Key is required and the Value is optional. The maximum size of the Key does not include the braces and underscore i.e., '{', '_', and '}'. 

    > [!NOTE] 
    > With the Bulk service the Key must be formatted with surrounding braces and a leading underscore, for example if the Key is promoCode, it must be formatted as {_promoCode}. With the Campaign Management service you cannot specify the surrounding braces and underscore.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. To remove all custom parameters, set this field to *delete_value*. The *delete_value* keyword removes the previous setting. To remove a subset of custom parameters, specify the custom parameters that you want to keep and omit any that you do not want to keep. The new set of custom parameters will replace any previous custom parameter set.    
**Delete:** Read-only  

## <a name="destinationurl"></a>Destination URL
The URL of the webpage to take the user to when they click the image. 

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Final Url](#finalurl) field. In the meantime you can set the [Destination URL](#destinationurl) field.

The URL can contain dynamic text strings such as {keyword}. For more information, see [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2).

The URL can contain a maximum of 1,024 characters. If the URL does not specify a protocol, the system uses the HTTP protocol when a user clicks the ad. If the URL specifies the HTTP protocol when you add an ad, the service will remove the *http://* protocol string (the HTTP protocol string does not count against the 1,024 character limit); however, the service will not remove an HTTPS protocol string (https://) from the URL.

> [!NOTE]
> If the URL is not specified for the image ad extension, the URL of the ad is used.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="displaytext"></a>Display Text
The display text of your image extension.

The maximum length for this field is 100 characters.

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Display Text](#displaytext) field.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="editoriallocation"></a>Editorial Location
The component or property of the ad extension that failed editorial review. 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialreasoncode"></a>Editorial Reason Code
A code that identifies the reason for the failure. For a list of possible reason codes, see [Editorial Reason Codes](../guides/editorial-failure-reason-codes.md). 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialstatus"></a>Editorial Status
The editorial status of the ad extension.

Possible values are described in the table below.

|Value|Description|
|-----------|---------------|
|<a name="editorialstatusactive"></a>Active|The ad extension passed editorial review.|
|<a name="editorialstatusactivelimited"></a>ActiveLimited|The ad extension passed editorial review in one or more markets, and one or more elements of the ad extension is undergoing editorial review in another market. For example the ad extension passed editorial review for Canada and is still pending review in the United States.|
|<a name="editorialstatusdisapproved"></a>Disapproved|The ad extension failed editorial review.|
|<a name="editorialstatusinactive"></a>Inactive|One or more elements of the ad extension is undergoing editorial review.|

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialterm"></a>Editorial Term
The term that failed editorial review.

This field will not be set if a combination of terms caused the failure or if the failure was based on a policy violation.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="enddate"></a>End Date
The ad extension scheduled end date string formatted as *MM/DD/YYYY*.

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields. Otherwise, image ad extension scheduling is not supported.  

The end date is inclusive. For example, if you set this field to 12/31/2020, the ad extensions will stop being shown at 11:59 PM on 12/31/2020.

**Add:** Optional. If you do not specify an end date, the ad extension will continue to be delivered unless you pause the associated campaigns, ad groups, or ads.  
**Update:** Optional. The end date can be shortened or extended, as long as the start date is either null or occurs before the new end date. If you set this field to the *delete_value* string, then you are effectively removing the end date. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.      
**Delete:** Read-only  

## <a name="finalurl"></a>Final Url
The landing page URL.  

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Final Url](#finalurl) field. In the meantime you can set the [Destination URL](#destinationurl) field.

The following validation rules apply to Final URLs and Final Mobile URLs.  
- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.
- You may specify up to 10 list items for both [Final Url](#finalurl) and [Mobile Final Url](#mobilefinalurl); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.  
- Each URL is delimited by a semicolon and space ("; ").  
- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.  
- Final URLs must each be a well-formed URL starting with either http:// or https://.  
- If you specify [Mobile Final Url](#mobilefinalurl), you must also specify [Final Url](#finalurl).  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.   
**Delete:** Read-only  

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

> [!NOTE]
> This feature is only available for customers in the Final URL Suffix Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 636). If you are not in the pilot this property will be ignored and no error will be returned.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the ad extension.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad extension can then be referenced in the *Id* field of dependent record types such as [Ad Group Image Ad Extension](ad-group-image-ad-extension.md) and [Campaign Image Ad Extension](campaign-image-ad-extension.md). This is recommended if you are adding new ad extensions and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="images"></a>Images
Image assets with different sizes and aspect ratios so they can flexibly display across a variety of publishers and placements.

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you must set the [Images](#images) field. In the meantime you must set the [Media Ids](#mediaids) field.  

You are only required to provide a landscape image asset i.e., this field must contain one image asset with [subType](#images-subtype) set to LandscapeImageMedia. The recommended dimensions for the LandscapeImageMedia are 1200 width x 628 height. Optionally you can include additional asset links, i.e., one image asset for each supported sub type. For any image asset sub types that you do not explicitly set, Microsoft Advertising will automatically create image asset links by cropping the LandscapeImageMedia. 

The image assets are represented in the bulk file as a JSON string. Seven images are included in the example JSON below, and only the LandscapeImageMedia `subType` is not cropped. The `id` is a property of the asset, whereas the `cropHeight`, `cropWidth`, `cropX`, `cropY`, and `subType` are properties of the asset link i.e., the relationship between the asset and the ad. For more details see [cropHeight](#images-cropheight), [cropWidth](#images-cropwidth), [cropX](#images-cropx), [cropY](#images-cropy), [id](#images-id), and [subType](#images-subtype) below.


```json
[{
	"id": 1234567890000,
	"subType": "LandscapeImageMedia"
},
{
	"id": 1234567890000,
	"subType": "SquareImageMedia",
	"cropX": 286,
	"cropY": 0,
	"cropWidth": 628,
	"cropHeight": 628
},
{
	"id": 1234567890000,
	"subType": "ImageMedia169X100",
	"cropX": 70,
	"cropY": 0,
	"cropWidth": 1061,
	"cropHeight": 628
},
{
	"id": 1234567890000,
	"subType": "ImageMedia93X100",
	"cropX": 308,
	"cropY": 0,
	"cropWidth": 584,
	"cropHeight": 628
},
{
	"id": 1234567890000,
	"subType": "ImageMedia15X10",
	"cropX": 129,
	"cropY": 0,
	"cropWidth": 942,
	"cropHeight": 628
},
{
	"id": 1234567890000,
	"subType": "ImageMedia155X100",
	"cropX": 114,
	"cropY": 0,
	"cropWidth": 973,
	"cropHeight": 628
},
{
	"id": 1234567890000,
	"subType": "ImageMedia133X100",
	"cropX": 183,
	"cropY": 0,
	"cropWidth": 835,
	"cropHeight": 628
},
{
	"id": 1234567890000,
	"subType": "ImageMedia178X100",
	"cropX": 41,
	"cropY": 0,
	"cropWidth": 1118,
	"cropHeight": 628
},
{
	"id": 1234567890000,
	"subType": "ImageMedia172X100",
	"cropX": 60,
	"cropY": 0,
	"cropWidth": 1080,
	"cropHeight": 628
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""id"":1234567890000,""subType"":""LandscapeImageMedia""},{""id"":1234567890000,""subType"":""SquareImageMedia"",""cropX"":286,""cropY"":0,""cropWidth"":628,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia169X100"",""cropX"":70,""cropY"":0,""cropWidth"":1061,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia93X100"",""cropX"":308,""cropY"":0,""cropWidth"":584,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia15X10"",""cropX"":129,""cropY"":0,""cropWidth"":942,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia155X100"",""cropX"":114,""cropY"":0,""cropWidth"":973,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia133X100"",""cropX"":183,""cropY"":0,""cropWidth"":835,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia178X100"",""cropX"":41,""cropY"":0,""cropWidth"":1118,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia172X100"",""cropX"":60,""cropY"":0,""cropWidth"":1080,""cropHeight"":628}]"*.  

Given the upload response JSON example above, please take note of the following:
- The same image asset identifier (e.g., 1234567890000) is used for all auto-generated image asset sub types. Whether or not you let Microsoft Advertising automatically generate the cropped images, the [Id](#images-id) does not need to be unique among the image assets linked to the same ad. 
- Because the ad in this example was created without crop settings for the LandscapeImageMedia image asset sub type, all image assets are cropped except for the original landscape image. 
- Whether or not the landscape image has its own crop settings, Microsoft Advertising uses the true height of the landscape image for all of the default crop settings. In this example the crop height for all system-generated image assets is 628, and we can infer that the landscape image (LandscapeImageMedia sub type) with 1.91:1 aspect ratio has width and height of 1200x628. Even if the landscape image asset link had been created with crop settings e.g., 703x368, the crop settings of the auto-generated image assets are based on the full dimensions of the landscape image (again that would be 1200x628 in this example). 

### <a name="images-cropheight"></a>cropHeight
The number of pixels to use from the image asset source, starting from the cropY position and moving upwards.

### <a name="images-cropwidth"></a>cropWidth
The number of pixels to use from the image asset source, starting from the cropX position and moving to the right.

### <a name="images-cropx"></a>cropX
Starting from the lower left corner of image asset source, this is the number of pixels to skip to the right on the x-axis before applying the cropWidth.

### <a name="images-cropy"></a>cropY
Starting from the lower left corner of image asset source, this is the number of pixels to skip upwards on the y-axis before applying the cropHeight.

### <a name="images-id"></a>id
The `id` attribute is a unique Microsoft Advertising identifier for the asset in a Microsoft Advertising account. 

The same image asset identifier can be used multiple times in the same ad for different aspect ratios, and can also be used by multiple ads in the same Microsoft Advertising account. The identifier of image asset with [SubType](#images-subtype) set to LandscapeImageMedia is used for all auto-generated image asset sub types within the same ad. Whether or not you let Microsoft Advertising automatically generate the cropped images, the [Id](#images-id) does not need to be unique among the image assets linked to the same ad.

You can create images for image ad extensions via the [Image](image.md) bulk record. Then you can use the returned media identifier as the image asset ID. The aspect ratio of the image that you added must be supported for the image asset [subType](#images-subtype). 

### <a name="images-subtype"></a>subType
The `subType` attribute represents the aspect ratio for this image asset.

The true aspect ratio of the [Image](image.md) that is stored in the account level media library can vary, so long as the resulting dimensions result in the expected aspect ratio per sub type. If you do not specify crop settings, the service will automatically crop up to the maximum possible area from the center of the image. For example, given a 1000x1000 pixel [image](image.md), for the 1.91:1 aspect ratio, the auto crop setting will be [cropWidth](#images-cropwidth)=1000, [cropHeight](#images-cropheight)=524, [cropX](#images-cropx)=0, and [cropY](#images-cropy)=238. 

The possible sub type values include LandscapeImageMedia, SquareImageMedia, ImageMedia169X100, ImageMedia93X100, ImageMedia15X10, ImageMedia155X100, ImageMedia133X100, ImageMedia178X100, and ImageMedia172X100. New sub types might be added in the future, so you should not take any dependency on a fixed set of values.

|Sub Type|Minimum dimensions in pixels|
|--------|--------|--------|
|LandscapeImageMedia|703 width x 368 height<br/>Aspect radio 1.91:1|
|SquareImageMedia|300 width x 300 height<br/>Aspect radio 1:1|
|ImageMedia169X100|622 width x 368 height<br/>Aspect radio 1.69:1|
|ImageMedia93X100|311 width x 333 height<br/>Aspect radio 0.93:1|
|ImageMedia15X10|300 width x 200 height<br/>Aspect radio 1.5:1|
|ImageMedia155X100|300 width x 194 height<br/>Aspect radio 1.55:1|
|ImageMedia133X100|100 width x 75 height<br/>Aspect radio 1.33:1|
|ImageMedia178X100|624 width x 350 height<br/>Aspect radio 1.78:1|
|ImageMedia172X100|300 width x 174 height<br/>Aspect radio 1.72:1|

**Add:** Required. Only the [id](#images-id) and [subType](#images-subtype) are required for each asset link.  
**Update:** Optional. To retain all of the existing asset links, set or leave this field empty. If you set this field, any images that were previously linked to this ad will be replaced. If you set this field, only the [id](#images-id) and [subType](#images-subtype) are required for each asset link.   
**Delete:** Read-only  

## <a name="layouts"></a>Layouts
The list of eligible image layouts.

Supported values are SearchSingle and SearchMultiple. New layouts might be added in the future, so you should not take any dependency on a fixed set of values.  

In a bulk file, the list of layout strings are delimited with a semicolon (;).

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Layouts](#layouts) field.  

**Add:** Optional. If you do not set this field, all current and future supported layouts will be set by default.    
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="mediaids"></a>Media Ids
The identifiers of the images to include in the ad. You may not specify media identifiers for more than one image of the same aspect ratio. In other words each of  the referenced images must have different aspect ratios.  

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you must set the [Images](#images) field. In the meantime you must set the [Media Ids](#mediaids) field.  

You can specify up to four (4) [image](image.md) identifiers. While the minimum required is one image media ID, in order to qualify for all ad placements you must provide four image media identifiers.  

In a bulk file, the list of media identifiers are delimited with a semicolon (;).

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="mobilefinalurl"></a>Mobile Final Url
The landing page URL for mobile devices.

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Final Url](#finalurl) field. In the meantime you can set the [Mobile Final Url](#mobilefinalurl) field.

The following validation rules apply to Final URLs and Final Mobile URLs.  
- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.  
- You may specify up to 10 list items for both [Final Url](#finalurl) and [Mobile Final Url](#mobilefinalurl); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.  
- Each URL is delimited by a semicolon and space ("; ").  
- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.  
- Final URLs must each be a well-formed URL starting with either http:// or https://.  
- If you specify [Mobile Final Url](#mobilefinalurl), you must also specify [Final Url](#finalurl).  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account that contains the ad extension.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  
  
## <a name="publishercountries"></a>Publisher Countries
The list of publisher countries whose editorial guidelines do not allow the specified [term](#editorialterm).

In a bulk file, the list of publisher countries are delimited with a semicolon (;).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="startdate"></a>Start Date
The ad extension scheduled start date string formatted as *MM/DD/YYYY*.

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields. Otherwise, image ad extension scheduling is not supported.  

The start date is inclusive. For example, if you set *StartDate* to 5/5/2020, the ad extensions will start being shown at 12:00 AM on 5/5/2020.

**Add:** Optional. If you do not specify a start date, the ad extension is immediately eligible to be [scheduled](#adschedule).  
**Update:** Optional. The start date can be shortened or extended, as long as the end date is either null or occurs after the new start date. If you set this field to the *delete_value* string, then you are effectively removing the start date and the ad extension is immediately eligible to be [scheduled](#adschedule). The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the ad extension.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="trackingtemplate"></a>Tracking Template
The tracking template to use for your promotion URLs.

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Tracking Template](#trackingtemplate) field.  

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="usesearchertimezone"></a>Use Searcher Time Zone
Determines whether to use the account time zone or the time zone of the search user where the ads could be delivered.

> [!IMPORTANT]
> All clients should prepare for the availability of Multi-Image Ad Extensions. As soon as each customer is enabled for Multi-Image Ad Extensions ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 626) you can set the [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields. Otherwise, image ad extension scheduling is not supported.  

Set this property to *TRUE* if you want the ad extensions to be shown in the search user's time zone, and otherwise set it to *FALSE*.

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *FALSE* will be set and the account time zone will be used.  
**Update:** Optional. If you set this field to the *delete_value* string, then you are effectively resetting to the default value of *FALSE*. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.  
**Delete:** Read-only  

## <a name="version"></a>Version
The number of times the contents of the ad extension has been updated. The version is set to 1 when you add the extension and is incremented each time it's revised.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  
