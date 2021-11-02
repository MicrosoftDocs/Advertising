---
title: "Responsive Ad Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Responsive Ad fields in a Bulk file.
dev_langs:
  - csharp
---
# Responsive Ad Record - Bulk
Defines a responsive ad that can be downloaded and uploaded in a bulk file.

Responsive ads automatically adjust to accommodate the sizes and shapes of audience ad formats. These ads work best with informative text rather than calls to action. 

> [!NOTE]
> This feature is currently available in the United States, Canada, the United Kingdom, and Australia. If you advertise in the United States, Canada, the United Kingdom, or Australia and want to opt in to audience ads, [contact support](https://go.microsoft.com/fwlink?LinkId=398371). 

> [!NOTE]
> Duplicate responsive ads are allowed in the same ad group. 

You can download all *Responsive Ad* records in the account by including the [DownloadEntity](downloadentity.md) value of *ResponsiveAds* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new responsive ad if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Sync Time,Client Id,Modified Time,Tracking Template,Final Url Suffix,Custom Parameter,Final Url,Mobile Final Url,Text,Business Name,Device Preference,Ad Format Preference,Name,Call To Action,Headline,Long Headline,Images
Format Version,,,,,,,,,,,,,,,,,,6.0,,,,
Responsive Ad,Active,,-1111,ParentCampaignNameGoesHere,AdGroupNameGoesHere,ClientIdGoesHere,,,,{_promoCode}=PROMO1; {_season}=summer,,https://www.contoso.com/womenshoesale,https://mobile.contoso.com/womenshoesale,Find New Customers & Increase Sales! Start Advertising on Contoso Today.,Contoso,,,,,Short Headline Here,Long Headline Here,"[{""id"":1234567890000,""subType"":""LandscapeImageMedia""}]"
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkResponsiveAd* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkResponsiveAd
var bulkResponsiveAd = new BulkResponsiveAd
{
    // 'Parent Id' column header in the Bulk file
    AdGroupId = adGroupIdKey,
    // 'Ad Group' column header in the Bulk file
    AdGroupName = "AdGroupNameGoesHere",
    // 'Campaign' column header in the Bulk file
    CampaignName = "ParentCampaignNameGoesHere",
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // ResponsiveAd object of the Campaign Management service.
    ResponsiveAd = new ResponsiveAd
    {
        // 'Call To Action' column header in the Bulk file
        CallToAction = CallToAction.AddToCart,
        // 'Mobile Final Url' column header in the Bulk file
        FinalMobileUrls = new[] {
            // Each Url is delimited by a semicolon (;) in the Bulk file
            "https://mobile.contoso.com/womenshoesale"
        },
        // 'Final Url' column header in the Bulk file
        FinalUrls = new[] {
            // Each Url is delimited by a semicolon (;) in the Bulk file
            "https://www.contoso.com/womenshoesale"
        },
        // 'Headline' column header in the Bulk file
        Headline = "Short Headline Here",
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Images' column header in the Bulk file
        Images = new[]
        {
            // Each AssetLink is represented as a JSON list item in the Bulk file.
            new AssetLink
            {
                Asset = new ImageAsset
                {
                    CropHeight = null,
                    CropWidth = null,
                    CropX = null,
                    CropY = null,
                    Id = landscapeImageMediaId,
                    SubType = "LandscapeImageMedia"
                },
            },
        },
        // 'Long Headline' column header in the Bulk file
        LongHeadlineString = "Long Headline Here",
        // 'Status' column header in the Bulk file
        Status = AdStatus.Active,
        // 'Text' column header in the Bulk file
        Text = "Find New Customers & Increase Sales! Start Advertising on Contoso Today.",
        // 'Tracking Template' column header in the Bulk file
        TrackingUrlTemplate = null,
        // 'Custom Parameter' column header in the Bulk file
        UrlCustomParameters = new CustomParameters
        {
            // Each custom parameter is delimited by a semicolon (;) in the Bulk file
            Parameters = new[] {
                new CustomParameter(){
                    Key = "promoCode",
                    Value = "PROMO1"
                },
                new CustomParameter(){
                    Key = "season",
                    Value = "summer"
                },
            }
        },
    },
};

uploadEntities.Add(bulkResponsiveAd);

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

For a *Responsive Ad* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Business Name](#businessname)
- [Call To Action](#calltoaction)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Custom Parameter](#customparameter)
- [Editorial Appeal Status](#editorialappealstatus)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [Final Url](#finalurl)
- [Headline](#headline)
- [Final Url Suffix](#finalurlsuffix)
- [Id](#id)
- [Images](#images)
- [Impression Tracking Urls](#impressiontrackingurls)
- [Landscape Image Media Id](#landscapeimagemediaid)
- [Landscape Logo Media Id](#landscapelogomediaid)
- [Long Headline](#longheadline)
- [Mobile Final Url](#mobilefinalurl)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Publisher Countries](#publishercountries)
- [Status](#status)
- [Square Image Media Id](#squareimagemediaid)
- [Square Logo Media Id](#squarelogomediaid)
- [Text](#text)
- [Tracking Template](#trackingtemplate)

## <a name="adgroup"></a>Ad Group
The name of the ad group that contains the ad.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="businessname"></a>Business Name
The name of the business.

Depending on your audience ad's placement, your business's name may appear in your ad. 

The length of the string is limited to 25 characters.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only 

## <a name="calltoaction"></a>Call To Action
A brief, punchy reason for customers to click your ad right now. 

The possible values are AddToCart, ApplyNow, BookNow, BookTravel, Buy, BuyNow, ContactUs, Download, GetQuote, Install, LearnMore, NoButton, OpenLink, OrderNow, RegisterNow, SeeMore, ShopNow, SignUp, Subscribe, and VisitSite.

**Add:** Read-only  
**Update:** Read-only     
**Delete:** Read-only 

## <a name="campaign"></a>Campaign
The name of the campaign that contains the ad group and ad.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="customparameter"></a>Custom Parameter
Your custom collection of key and value parameters for URL tracking.

In a bulk file, the list of custom parameters are formatted as follows.

- Format each custom parameter pair as Key=Value, for example {_promoCode}=PROMO1.

- Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned. Each key and value pair are delimited by a semicolon and space ("; "), for example {_promoCode}=PROMO1; {_season}=summer.  

- A Key cannot contain a semicolon. If a Value contains a semicolon it must be escaped as '\\;'. Additionally if the Value contains a backslash it must also be escaped as '\\'.

- The Key cannot exceed 16 UTF-8 bytes, and the Value cannot exceed 250 UTF-8 bytes. The Key is required and the Value is optional. The maximum size of the Key does not include the braces and underscore i.e., '{', '_', and '}'. 

    > [!NOTE] 
    > With the Bulk service the Key must be formatted with surrounding braces and a leading underscore, for example if the Key is promoCode, it must be formatted as {_promoCode}. With the Campaign Management service you cannot specify the surrounding braces and underscore.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. To remove all custom parameters, set this field to *delete_value*. The *delete_value* keyword removes the previous setting. To remove a subset of custom parameters, specify the custom parameters that you want to keep and omit any that you do not want to keep. The new set of custom parameters will replace any previous custom parameter set.    
**Delete:** Read-only  

## <a name="editorialappealstatus"></a>Editorial Appeal Status
Determines whether you can appeal the issues found by the editorial review.

Possible values are described in the table below.

|Value|Description|
|-----------|---------------|
|<a name="editorialappealstatusappealable"></a>Appealable|The editorial issue is appealable.|
|<a name="editorialappealstatusappealpending"></a>AppealPending|The editorial issue is appealable and an appeal has been submitted.|
|<a name="editorialappealstatusnotappealable"></a>NotAppealable|The editorial issue is not appealable.|

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editoriallocation"></a>Editorial Location
The component or property of the ad that failed editorial review. 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialreasoncode"></a>Editorial Reason Code
A code that identifies the reason for the failure. For a list of possible reason codes, see [Editorial Reason Codes](../guides/editorial-failure-reason-codes.md). 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialstatus"></a>Editorial Status
The editorial status of the ad.

Possible values are described in the table below.

|Value|Description|
|-----------|---------------|
|<a name="editorialstatusactive"></a>Active|The ad passed editorial review.|
|<a name="editorialstatusactivelimited"></a>ActiveLimited|The ad passed editorial review in one or more markets, and one or more elements of the ad is undergoing editorial review in another market. For example the ad passed editorial review for Canada and is still pending review in the United States.|
|<a name="editorialstatusdisapproved"></a>Disapproved|The ad failed editorial review.|
|<a name="editorialstatusinactive"></a>Inactive|One or more elements of the ad is undergoing editorial review.|

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialterm"></a>Editorial Term
The term that failed editorial review.

This field will not be set if a combination of terms caused the failure or if the failure was based on a policy violation.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="finalurl"></a>Final Url
The landing page URL.

The domain portion of the URL in combination with the path 1 and path 2 strings cannot exceed 67 characters.

The following validation rules apply to Final URLs and Final Mobile URLs.

- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- You may specify up to 10 items for both Final URLs and Final Mobile URLs; however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.

- Each URL is delimited by a semicolon and space ("; ").

- Usage of '{' and '}' is only allowed to delineate tags, for example "{lpurl}".

- Each URL must be a well-formed URL starting with either http:// or https://.

- If you specify Final Mobile URLs, you must also specify Final Url.

Also note that  if the *Tracking Template* or *Custom Parameter* fields are set, then at least one Final URL is required.

> [!NOTE]
> This URL is used only if the keyword does not specify a final URL.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only  

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="headline"></a>Headline
This is one of two possible headlines that could appear in your audience ads. 

Because audience ads are responsive, we require multiple headlines so they can flexibly serve across a variety of publishers and placements. 

The length of the string is limited to 30 characters.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only 

## <a name="id"></a>Id
The system-generated identifier of the ad.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad can then be referenced in the *Parent Id* field of dependent record types such as [Responsive Ad Label](responsive-ad-label.md#parentid). This is recommended if you are adding new ads and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="images"></a>Images
Because audience ads are responsive, you can create multiple image assets with different sizes and aspect ratios so they can flexibly display across a variety of publishers and placements.

You are only required to provide a landscape image asset i.e., this field must contain one image asset with [subType](#images-subtype) set to LandscapeImageMedia. The recommended dimensions for the LandscapeImageMedia are 1200 width x 628 height. Optionally you can include additional asset links, i.e., one image asset for each supported sub type. For any image asset sub types that you do not explicitly set, Microsoft Advertising will automatically create image asset links by cropping the LandscapeImageMedia. 

> [!NOTE]
> If this field is set (not empty), then [Landscape Image Media Id](#landscapeimagemediaid) and [Square Image Media Id](#squareimagemediaid) are both ignored. 

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
- Although in Bing Ads API version 12 you could use the [Landscape Image Media Id](#landscapeimagemediaid) and [Square Image Media Id](#squareimagemediaid), these fields are deprecated and will be removed in a future version. You have more flexibility and control of cropped images via the [Images](#images) field. 

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

You can create images for responsive ads via the [Image](image.md) bulk record. Then you can use the returned media identifier as the image asset ID. The aspect ratio of the image that you added must be supported for the image asset [subType](#images-subtype). 

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

**Add:** Required if [Landscape Image Media Id](#landscapeimagemediaid) is empty. Only the [id](#images-id) and [subType](#images-subtype) are required for each asset link.  
**Update:** Optional. To retain all of the existing asset links, set or leave this field empty. If you set this field, any images that were previously linked to this ad will be replaced. If you set this field, only the [id](#images-id) and [subType](#images-subtype) are required for each asset link.   
**Delete:** Read-only  

## <a name="impressiontrackingurls"></a>Impression Tracking Urls
The URLs for 1x1 impression tracking pixels. Each pixel will report Microsoft Audience Network impressions to your third-party ad reporting tool. 

You can include up to 2 impression tracking URLs for each responsive ad. Each URL is delimited by a semicolon and space ("; "). 

Each URL must be accessible. The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

For each Microsoft Audience Network impression, Microsoft will ping the URL to enable impression tracking in your third party ad reporting tool. Advanced-level user tracking such as conversion tracking or tracking based on cookies or IP addresses is not supported.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.          
**Delete:** Read-only 

## <a name="landscapeimagemediaid"></a>Landscape Image Media Id
The identifier of the image asset used for landscape images with 1.91:1 aspect ratio that could appear in your audience ads.

The aspect ratio of the stored image media can vary, so long as the image asset crop settings result in the supported aspect ratio for this field. To confirm the effective aspect ratio with crop settings, use the [Images](#images) field.

> [!NOTE]
> Although in Bing Ads API version 12 you can use the [Landscape Image Media Id](#landscapeimagemediaid) and [SquareImageMediaId](#squareimagemediaid), these fields are deprecated and will be removed in a future version. You have more flexibility and control of cropped images via the [Images](#images) field.

**Add:** Required if [Images](#images) is not set. If [Images](#images) is set, this field is ignored.  
**Update:** Optional. If [Images](#images) is set, this field is ignored. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only 

## <a name="landscapelogomediaid"></a>Landscape Logo Media Id
This field is reserved for internal use, and will be removed from a future version of the Bing Ads API.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only 

## <a name="longheadline"></a>Long Headline
This is one of two possible headlines that could appear in your audience ads. 

Because audience ads are responsive, we require multiple headlines so they can flexibly serve across a variety of publishers and placements. 

The length of the string is limited to 90 characters.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only 

## <a name="mobilefinalurl"></a>Mobile Final Url
The mobile landing page URL.

The following validation rules apply to Final URLs and Final Mobile URLs.

- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- You may specify up to 10 items for both Final URLs and Final Mobile URLs; however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.

- Each URL is delimited by a semicolon and space ("; ").

- Usage of '{' and '}' is only allowed to delineate tags, for example "{lpurl}".

- Each URL must be a well-formed URL starting with either http:// or https://.

- If you specify Final Mobile URLs, you must also specify Final Url.

> [!NOTE]
> This URL is used only if the keyword does not specify a *Mobile Final Url*.

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
The system-generated identifier of the ad group that contains the ad.

This bulk field maps to the *Id* field of the [Ad Group](ad-group.md) record.

**Add:** Read-only and Required. You must either specify an existing ad group identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Ad Group](ad-group.md) record. This is recommended if you are adding new ads to a new ad group in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only  
**Delete:** Read-only  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="publishercountries"></a>Publisher Countries
The list of publisher countries whose editorial guidelines do not allow the specified [term](#editorialterm).

In a bulk file, the list of publisher countries are delimited with a semicolon (;).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the ad.

Possible values are *Active*, *Paused*, or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="squareimagemediaid"></a>Square Image Media Id
The identifier of the image asset used for square images with 1:1 aspect ratio that could appear in your audience ads.

The aspect ratio of the stored image media can vary, so long as the image asset crop settings result in the supported aspect ratio for this field. To confirm the effective aspect ratio with crop settings, use the [Images](#images) field.

> [!NOTE]
> Although in Bing Ads API version 12 you can use the [Landscape Image Media Id](#landscapeimagemediaid) and [SquareImageMediaId](#squareimagemediaid), these fields are deprecated and will be removed in a future version. You have more flexibility and control of cropped images via the [Images](#images) field.

**Add:** Optional. If [Images](#images) is set, this field is ignored and Microsoft Advertising will automatically create a new square image asset by cropping the LandscapeImageMedia image asset. If [Images](#images) is not set, and if you do not set this field, Microsoft Advertising will automatically create a new square image asset by cropping the [Landscape Image Media Id](#landscapeimagemediaid).  
**Update:** Optional. If [Images](#images) is set, this field is ignored and Microsoft Advertising will automatically create a new square image asset by cropping the LandscapeImageMedia image asset. If [Images](#images) is not set, and if you do not set this field, Microsoft Advertising will automatically create a new square image asset by cropping the [Landscape Image Media Id](#landscapeimagemediaid). If no value is set for the update, this setting is not changed.     
**Delete:** Read-only 

## <a name="squarelogomediaid"></a>Square Logo Media Id
This field is reserved for internal use, and will be removed from a future version of the Bing Ads API.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only 

## <a name="text"></a>Text
Depending on your audience ad's placement, this text will appear below or adjacent to your ad's long or short headline.  

You have more character space to work with in the ad text than in the headline. So once the imagery and headline have a potential customer's attention, the ad text needs to convince them to click it. What sets your product or service apart?

The text must contain at least one word.

The length of the string is limited to 90 characters.

The text cannot contain the newline (\n) character.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only  

## <a name="trackingtemplate"></a>Tracking Template
The tracking template to use as a default for the URL specified with FinalUrls.

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  
