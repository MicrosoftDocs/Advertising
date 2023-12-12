---
title: "Asset Group Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Asset Group fields in a Bulk file.
dev_langs:
  - csharp
---
# Asset Group Record - Bulk
Defines a asset group that can be downloaded and uploaded in a bulk file.

You can download all *Asset Group* records in the account by including the [DownloadEntity](downloadentity.md) value of *AssetGroups* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

<!--The following Bulk CSV example would add a new asset group if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Sync Time,Client Id,Modified Time,Tracking Template,Final Url Suffix,Custom Parameter,Final Url,Mobile Final Url,Text,Business Name,Device Preference,Ad Format Preference,Name,Call To Action,Headline,Long Headline,Images
Format Version,,,,,,,,,,,,,,,,,,6.0,,,,
Asset Group,Active,,-1111,ParentCampaignNameGoesHere,AdGroupNameGoesHere,ClientIdGoesHere,,,,{_promoCode}=PROMO1; {_season}=summer,,https://www.contoso.com/womenshoesale,https://mobile.contoso.com/womenshoesale,Find New Customers & Increase Sales! Start Advertising on Contoso Today.,Contoso,,,,,Short Headline Here,Long Headline Here,"[{""id"":1234567890000,""subType"":""LandscapeImageMedia""}]"
```-->

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAssetGroup* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.

<!--```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAssetGroup
var bulkAssetGroup = new BulkAssetGroup
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
    // AssetGroup object of the Campaign Management service.
    AssetGroup = new AssetGroup
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

uploadEntities.Add(bulkAssetGroup);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await BulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();
```-->

For a *Asset Group* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Asset Group](#assetgroup)
- [Business Name](#businessname)
- [Call To Action](#calltoaction)
- [Campaign](#campaign)
- [Campaign Type](#campaigntype)
- [Client Id](#clientid)
- [Descriptions](#descriptions)
- [Editorial Appeal Status](#editorialappealstatus)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [End Date](#enddate)
- [Final Url](#finalurl)
- [Headlines](#headlines)
- [Id](#id)
- [Images](#images)
- [Long Headlines](#longheadlines)
- [Mobile Final Url](#mobilefinalurl)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Path 1](#path1)
- [Path 2](#path2)
- [Status](#status)
- [Start Date](#startdate)
- [Type](#type)

## <a name="assetgroup"></a>Ad Group
The name of the asset group.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

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

**Add:** Not applicable for audience ads.   
**Update:** Read-only     
**Delete:** Read-only 

## <a name="campaign"></a>Campaign
The name of the campaign that contains the asset group.

**Add:** Read-only and Required
**Update:** Read-only and Required
**Delete:** Read-only and Required

## <a name="campaigntype"></a>Campaign Type
The type of campaign that contains the asset group. The campaign type is only used in bulk download. It is usually not documented, but gets filled out in bulk download for many existing entities.

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. To remove all custom parameters, set this field to *delete_value*. The *delete_value* keyword removes the previous setting. To remove a subset of custom parameters, specify the custom parameters that you want to keep and omit any that you do not want to keep. The new set of custom parameters will replace any previous custom parameter set.    
**Delete:** Read-only  

## <a name="descriptions"></a>Descriptions
Depending on your audience ad's placement, this text will appear below or adjacent to your ad's long or short headline.  

You have more character space to work with in the ad text than in the headline. So once the imagery and headline have a potential customer's attention, the ad text needs to convince them to click it. What sets your product or service apart?

The text must contain at least one word.

The upperlimit of descriptions is 5. The length of the string is limited to 90 characters.
The data format of headlines are included in the example JSON below.
```json
[{
	"text": "Contoso",
},
{
	"text": "Quick & Easy Setup"
},
{
	"text": "Seamless Integration"
}]
```
**Add:** Required for audience ads and multimedia ads. Not applicable for video ads.
**Update:** Optional. If no value is set for the update, this setting is not changed.
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

## <a name="enddate"></a>End Date
The date that the ads in the asset group will expire.

If you do not specify an end date, the ads will not expire. The end date can be extended to make an asset group's ads eligible for delivery, even after the asset group expires.

The end date is inclusive. For example, if you set *End Date* to 12/31/2020, the ads in the asset group will expire at 11:59 PM on 12/31/2020. The time is based on the time zone that you specify at the campaign level.

**Add:** Optional. To set no end date when adding an asset group, do not set this field.  
**Update:** Optional. If no value is set for the update, this setting is not changed. To delete the current end date and effectively set no end date, set this field to the "delete_value" string. When you retrieve the asset group next time, this field will not be set.    
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

## <a name="headlines"></a>Headlines
We require multiple headlines so they can flexibly serve across a variety of publishers and placements. 

The upper limit of headlines is 15. And the length of each headline is limited to 30 characters. The data format of headlines are included in the example JSON below.
```json
[{
	"text": "Contoso",
},
{
	"text": "Quick & Easy Setup"
},
{
	"text": "Seamless Integration"
}]
```
**Add:** Required for multimedia ads and audience ads. Not applicable for video ads.
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only 

## <a name="id"></a>Id
The system-generated identifier of the asset group.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="images"></a>Images
Because audience ads are responsive, you can create multiple image assets with different sizes and aspect ratios so they can flexibly display across a variety of publishers and placements.

> [!NOTE]
>As of now, the SubType OriginalImage replaces the role of LandscapeImageMedia as the default image for AssetGroup of Audience Campaign.

You are only required to provide an OriginalImage asset i.e., this field must contain one image asset with [subType](#images-subtype) set to OriginalImage. The recommended dimensions for the OriginalImage are 1200 width x 628 height. Optionally you can include additional asset links, i.e., one image asset for each supported sub type. For any image asset sub types that you do not explicitly set, Microsoft Advertising will automatically create image asset links by cropping the OriginalImage.

> [!NOTE]
> If this field is set (not empty), then [Landscape Image Media Id](#landscapeimagemediaid) and [Square Image Media Id](#squareimagemediaid) are both ignored. 

The image assets are represented in the bulk file as a JSON string. Nine images are included in the example JSON below, and only the OriginalImage `subType` is not cropped. The `id` is a property of the asset, whereas the `cropHeight`, `cropWidth`, `cropX`, `cropY`, and `subType` are properties of the asset link i.e., the relationship between the asset and the ad. For more details see [cropHeight](#images-cropheight), [cropWidth](#images-cropwidth), [cropX](#images-cropx), [cropY](#images-cropy), [id](#images-id), and [subType](#images-subtype) below.


```json
[{
	"id": 1234567890000,
	"subType": "OriginalImage"
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
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""id"":1234567890000,""subType"":""OriginalImage""},{""id"":1234567890000,""subType"":""SquareImageMedia"",""cropX"":286,""cropY"":0,""cropWidth"":628,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia169X100"",""cropX"":70,""cropY"":0,""cropWidth"":1061,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia93X100"",""cropX"":308,""cropY"":0,""cropWidth"":584,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia15X10"",""cropX"":129,""cropY"":0,""cropWidth"":942,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia155X100"",""cropX"":114,""cropY"":0,""cropWidth"":973,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia133X100"",""cropX"":183,""cropY"":0,""cropWidth"":835,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia178X100"",""cropX"":41,""cropY"":0,""cropWidth"":1118,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia172X100"",""cropX"":60,""cropY"":0,""cropWidth"":1080,""cropHeight"":628}]"*.  

Given the upload response JSON example above, please take note of the following:
- The same image asset identifier (e.g., 1234567890000) is used for all auto-generated image asset sub types. Whether or not you let Microsoft Advertising automatically generate the cropped images, the [Id](#images-id) does not need to be unique among the image assets linked to the same ad. 
- Because the ad in this example was created without crop settings for the OriginalImage image asset sub type, all image assets are cropped except for the OriginalImage associated image.
- Whether or not the OriginalImage has its own crop settings, Microsoft Advertising uses the true height of the OriginalImage associated image for all of the default crop settings. In this example the crop height for all system-generated image assets is 628, and we can infer that the OriginalImage (OriginalImage sub type) with 1.91:1 aspect ratio has width and height of 1200x628. Even if the OriginalImage asset link had been created with crop settings e.g., 703x368, the crop settings of the auto-generated image assets are based on the full dimensions of the OriginalImage (again that would be 1200x628 in this example). 
- Although in Bing Ads API version 12 you could use the [Landscape Image Media Id](#landscapeimagemediaid) and [Square Image Media Id](#squareimagemediaid), these fields are deprecated and will be removed in a future version. You have more flexibility and control of cropped images via the [Images](#images) field. 

## <a name="longheadlines"></a>Long Headlines
We require multiple headlines so they can flexibly serve across a variety of publishers and placements. 

The upper limit of long headlines is 5. And the length of each headline is limited to 90 characters. The data format of long headlines are included in the example JSON below.
```json
[{
	"text": "Contoso",
},
{
	"text": "Quick & Easy Setup"
},
{
	"text": "Seamless Integration"
}]
```
**Add:** Required for multimedia ads and audience ads. Not applicable for video ads.
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
The campaign ID.

**Add:** Read-only and Required.  
**Update:** Read-only and Required.  
**Delete:** Read-only and Required.  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Campaign](#campaign) field.

## <a name="path1"></a>Path 1
The first part of the optional path that will be appended to the domain portion of your display URL. The domain portion of your display URL e.g. *https://www.contoso.com* will be generated from the domain of your Final URL (*Final Url* field).  Then if you have specified a value for *Path 1* it will be appended to the display URL. If you have also specified a value for *Path 2*, then it will also be appended to the display URL after *Path 1*. For example if your *Final Url* contains *https://www.contoso.com*, *Path 1* is set to *subdirectory1*, and *Path 2* is set to *subdirectory2*, then the URL displayed will be *https://www.contoso.com/subdirectory1/subdirectory2*.

The path can contain dynamic parameters such as {MatchType}. For a list of supported parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2).

The maximum input length is 1,000 characters if you include dynamic text strings. No more than 15 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 67 characters.

For languages with double-width characters e.g. Traditional Chinese the maximum input length is 1,000 characters if you include dynamic text strings. No more than 7 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 33 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or asset group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

The path cannot contain the forward slash (/) or newline (\n) characters.

If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="path2"></a>Path 2
The second part of the optional path that will be appended to the domain portion of your display URL. The domain portion of your display URL e.g. *https://www.contoso.com* will be generated from the domain of your Final URL (*Final Url* field).  Then if you have specified a value for *Path 1* it will be appended to the display URL. If you have also specified a value for *Path 2*, then it will also be appended to the display URL after *Path 1*. For example if your *Final Url* contains *https://www.contoso.com*, *Path 1* is set to *subdirectory1*, and *Path 2* is set to *subdirectory2*, then the URL displayed will be *https://www.contoso.com/subdirectory1/subdirectory2*.

You can only specify *Path 2* if *Path 1* is also set.

The path can contain dynamic parameters such as {MatchType}. For a list of supported parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2).

The maximum input length is 1,000 characters if you include dynamic text strings. No more than 15 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 67 characters.

For languages with double-width characters e.g. Traditional Chinese the maximum input length is 1,000 characters if you include dynamic text strings. No more than 7 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 33 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or asset group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

The path cannot contain the forward slash (/) or newline (\n) characters.
	
If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the asset group.

Possible values are *Active*, *Paused*, or *Deleted*.

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="startdate"></a>Start Date
The date that the ads in the asset group can begin serving; otherwise, the service can begin serving the ads in the asset group the day that the asset group becomes active.

The start date is inclusive. For example, if you set *Start Date* to 5/5/2020, the ads in the asset group will start at 12:00 AM on 5/5/2020. The time is based on the time zone that you specify at the campaign level.

**Add:** Optional. If you do not set this field or if the date you submit is prior to today's date, then today's date will be set and the service can begin serving the ads in the asset group as soon as the asset group status is active.  
**Update:** Optional. If no value is set for the update, this setting is not changed. The start date cannot be updated after the asset group is submitted i.e., once the start date has arrived.  
**Delete:** Read-only  

## <a name="type"></a>Type
The entity type, *Asset Group*.

**Add:** Required for video ads. Not applicable for audience ads or multimedia ads.
**Update:** Optional for video ads. Use Descriptions instead for audience ads or multimedia ads (deprecated).   
**Delete:** Read-only  
