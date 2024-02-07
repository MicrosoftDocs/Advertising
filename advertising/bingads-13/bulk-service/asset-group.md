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
Type,Status,Id,Parent Id,Campaign,Asset Group,Sync Time,Client Id,Modified Time,Tracking Template,Final Url Suffix,Custom Parameter,Final Url,Mobile Final Url,Text,Business Name,Device Preference,Ad Format Preference,Name,Call To Action,Headline,Long Headline,Images
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
    // 'Asset Group' column header in the Bulk file
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

## <a name="assetgroup"></a>Asset Group
The name of the asset group.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.
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

The possible values are ActNow, AddToCart, ApplyNow, Automated, BetNow, BidNow, BookACar, BookHotel, BookNow, BookTravel, Browse, BuildNow, Buy, BuyNow, ChatNow, Compare, ContactUs, Coupon, Dealers, Default, Directions, Donate, Download, EmailNow, EnrollNow, Explore, FileNow, FindJob, FindStore, FreePlay, FreeQuote, FreeTrial, GetDeals, GetDemo, GetNow, GetOffer, GetQuote, GoToDemo, Install, JoinNow, LearnMore, ListenNow, LogIn, Message, NewCars, NoButton, OpenLink, OrderNow, PlayGame, PlayNow, PostJob, Register, RegisterNow, RenewNow, RentACar, RentNow, Reorder, Reserve, Sale, SaveNow, Schedule, SeeDemo, SeeMenu, SeeModels, SeeMore, SeeOffer, SeeOffers, SellNow, ShopNow, Showtimes, SignIn, SignUp, StartFree, StartNow, Subscribe, SwitchNow, TestDrive, TryNow, Unknown, UsedCars, ViewCars, ViewDemo, ViewNow, ViewPlans, VisitSite, VisitStore, VoteNow, Watch, WatchMore, WatchNow.

**Add:** Required.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign that contains the asset group.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Campaign](#campaign) field.

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. To remove all custom parameters, set this field to *delete_value*. The *delete_value* keyword removes the previous setting. To remove a subset of custom parameters, specify the custom parameters that you want to keep and omit any that you do not want to keep. The new set of custom parameters will replace any previous custom parameter set.   
**Delete:** Read-only  

## <a name="descriptions"></a>Descriptions
The list of descriptions that Bing can use to optimize the ad layout.

To maximize impressions across all ad formats the descriptions might not always be shown in your ad.

From a data model perspective the descriptions are stored as text assets. The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.

You must set between 2-5 descriptions. The descriptions are represented in the bulk file as a JSON string. Two descriptions are included in the example JSON below, and the first is pinned to a specific position. The `id` and `text` are properties of the asset, whereas the `editorialStatus` and `assetPerformanceLabel` are properties of the asset link i.e., the relationship between the asset and the ad. For more details see [assetPerformanceLabel](#description-assetperformancelabel), [editorialStatus](#description-editorialstatus), [id](#description-id), and [text](#description-text) below.

```json
[{
	"text": "Find New Customers & Increase Sales!",
},
{
	"text": "Start Advertising on Contoso Today."
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""text"":""Find New Customers & Increase Sales!""},{""text"":""Start Advertising on Contoso Today.""}]"*.

Here's an example Bulk download where you'll also get read-only attributes e.g., `id` and `editorialStatus`:

```json
[{
	"id": 1,
	"text": "Contoso",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
},
{
	"id": 2,
	"text": "Seamless Integration",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
}]
```

**Add:** Required if its parent campaign does not associate to a store, optional if the parent campaign associates to a store. If the parent campaign associates to a store and you specify Descriptions, you must also specify Headlines, LongHeadlines, and Images.  Only the [text](#description-text) is honored. Even if the asset already exists in your account, the [id](#description-id), [assetPerformanceLabel](#description-assetperformancelabel), and [editorialStatus](#description-editorialstatus) will be ignored if you include them.  
**Update:** Optional. To retain all of the existing asset links, set or leave this field empty. If you set this field, any descriptions that were previously linked to this ad will be replaced. If you specify this field, a list of 2-5 descriptions is required. Only the [text](#description-text) is honored. Even if the asset already exists in your account, the [id](#description-id), [assetPerformanceLabel](#description-assetperformancelabel), and [editorialStatus](#description-editorialstatus) will be ignored if you include them.  
**Delete:** Read-only  

### <a name="description-assetperformancelabel"></a>assetPerformanceLabel
This lets you know how well the asset is performing.

The `assetPerformanceLabel` attribute is read-only when you download the responsive search ad. Possible values are described in the table below.  

|Value|Description|
|-----------|---------------|
|Low|This asset's performance is low and we recommend you replace this asset to improve your ad performance.|
|Good|This asset is performing well. We recommend you keep this asset and add more assets to improve your ad performance.|
|Best|This asset's performance is among the best and we recommend that you add more similar assets.|
|Unrated|We don't have any performance rating for this asset. This can be due to the asset being inactive, not having enough information to determine its performance, or if there aren't enough similar assets to compare against it.|
|Learning|The asset's performance is being actively evaluated. Once the evaluation is complete, the asset rating will be Low, Good, Best, or Unrated.|

### <a name="description-editorialstatus"></a>editorialStatus
The `editorialStatus` attribute is read-only when you download the responsive search ad. Possible values are described in the table below.  

|Value|Description|
|-----------|---------------|
|Active|The asset passed editorial review.|
|ActiveLimited|The asset passed editorial review in one or more markets, and one or more elements of the asset is undergoing editorial review in another market. For example the asset passed editorial review for Canada and is still pending review in the United States.|
|Disapproved|The asset failed editorial review.|
|Inactive|One or more elements of the asset is undergoing editorial review.|
|Unknown|Reserved for future use.|

### <a name="description-id"></a>id
The `id` attribute is a unique Microsoft Advertising identifier for the asset in a Microsoft Advertising account. 

The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account. After you upload a text asset the result file will include the asset identifier e.g., `""id:""123`, whether the asset is new or already existed in the account's asset library. 

### <a name="description-text"></a>text
Each description's `text` attribute must contain at least one word. The maximum input length of each description's `text` attribute is 90 characters. For languages with double-width characters e.g. Traditional Chinese the maximum input length is 45 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

The `text` attribute cannot contain the newline (\n) character.  

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
The editorial status of the asset group.

Possible values are described in the table below.

|Value|Description|
|-----------|---------------|
|<a name="editorialstatusactive"></a>Active|The asset group passed editorial review.|
|<a name="editorialstatusactivelimited"></a>ActiveLimited|The asset group passed editorial review in one or more markets, and one or more elements of the asset group is undergoing editorial review in another market. For example the asset group passed editorial review for Canada and is still pending review in the United States.|
|<a name="editorialstatusdisapproved"></a>Disapproved|The asset group failed editorial review.|
|<a name="editorialstatusinactive"></a>Inactive|One or more elements of the asset group is undergoing editorial review.|

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
The date that the asset group will expire.

If you do not specify an end date, the asset group will not expire. The end date can be extended to make an asset group eligible for delivery, even after the asset group expires.

The end date is inclusive. For example, if you set *End Date* to 12/31/2020, the asset group will expire at 11:59 PM on 12/31/2020. The time is based on the time zone that you specify at the campaign level.

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

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="headlines"></a>Headlines
The list of headlines that Bing can use to optimize the ad layout.

To maximize performance across all ad formats the headlines might not always be shown in your ad.

From a data model perspective the headlines are stored as text assets. The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.

You must set between 3-15 headlines. The headlines are represented in the bulk file as a JSON string. Two headlines are included in the example JSON below. The `id` and `text` are properties of the asset, whereas the `editorialStatus` and `assetPerformanceLabel` are properties of the asset link i.e., the relationship between the asset and the ad. For more details see [assetPerformanceLabel](#headline-assetperformancelabel), [editorialStatus](#headline-editorialstatus), [id](#headline-id), and [text](#headline-text) below.

```json
[{
	"text": "Contoso",
},
{
	"text": "Seamless Integration"
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""text"":""Contoso""},{""text"":""Seamless Integration""}]"*.

Here's an example Bulk download where you'll also get read-only attributes e.g., `id` and `editorialStatus`:

```json
[{
	"id": 1,
	"text": "Contoso",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
},
{
	"id": 2,
	"text": "Seamless Integration",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
}]
```

**Add:** Required if its parent campaign does not associate to a store, optional if the parent campaign associates to a store. If the parent campaign associates to a store and you specify Headlines, you must also specify LongHeadlines, Descriptions, and Images. Only the [text](#headline-text) is honored. Even if the asset already exists in your account, the [id](#headline-id), [assetPerformanceLabel](#headline-assetperformancelabel), and [editorialStatus](#headline-editorialstatus) will be ignored if you include them.  
**Update:** Optional. To retain all of the existing asset links, set or leave this field empty. If you set this field, any headlines that were previously linked to this ad will be replaced. If you specify this field, a list of 3-15 headlines is required. Only the [text](#headline-text) is honored. Even if the asset already exists in your account, the [id](#headline-id), [assetPerformanceLabel](#headline-assetperformancelabel), and [editorialStatus](#headline-editorialstatus) will be ignored if you include them.  
**Delete:** Read-only  

### <a name="headline-assetperformancelabel"></a>assetPerformanceLabel
This lets you know how well the asset is performing.

The `assetPerformanceLabel` attribute is read-only when you download the responsive search ad. Possible values are described in the table below.  

|Value|Description|
|-----------|---------------|
|Low|This asset's performance is low and we recommend you replace this asset to improve your ad performance.|
|Good|This asset is performing well. We recommend you keep this asset and add more assets to improve your ad performance.|
|Best|This asset's performance is among the best and we recommend that you add more similar assets.|
|Unrated|We don't have any performance rating for this asset. This can be due to the asset being inactive, not having enough information to determine its performance, or if there aren't enough similar assets to compare against it.|
|Learning|The asset's performance is being actively evaluated. Once the evaluation is complete, the asset rating will be Low, Good, Best, or Unrated.|

### <a name="headline-editorialstatus"></a>editorialStatus
The `editorialStatus` attribute is a read-only string when you download the responsive search ad. Possible values are described in the table below.  

|Value|Description|
|-----------|---------------|
|Active|The asset passed editorial review.|
|ActiveLimited|The asset passed editorial review in one or more markets, and one or more elements of The asset is undergoing editorial review in another market. For example The asset passed editorial review for Canada and is still pending review in the United States.|
|Disapproved|The asset failed editorial review.|
|Inactive|One or more elements of The asset is undergoing editorial review.|
|Unknown|Reserved for future use.|

### <a name="headline-id"></a>id
The `id` attribute is a unique Microsoft Advertising identifier for the asset in a Microsoft Advertising account. 

The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account. After you upload a text asset the result file will include the asset identifier e.g., `""id:""123`, whether the asset is new or already existed in the account's asset library. 

### <a name="headline-text"></a>text
Each headline's `text` attribute must contain at least one word. The maximum input length of each headline's `text` attribute is 30 characters. For languages with double-width characters e.g. Traditional Chinese the maximum input length is 15 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

The `text` attribute cannot contain the newline (\n) character.

## <a name="id"></a>Id
The system-generated identifier of the asset group.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="images"></a>Images
Create multiple image assets with different sizes and aspect ratios so they can flexibly display across a variety of publishers and placements.

You are required to provide at least 1 LandscapeImageMedia and 1 SquareImageMedia. A total of up to 20 images and a total of up to 5 logos can be saved.

The image assets are represented in the bulk file as a JSON string. Nine images are included in the example JSON below, and only the LandscapeImageMedia `subType` is not cropped. The `id` is a property of the asset, whereas the `cropHeight`, `cropWidth`, `cropX`, `cropY`, and `subType` are properties of the asset link i.e., the relationship between the asset and the ad. For more details see [cropHeight](#images-cropheight), [cropWidth](#images-cropwidth), [cropX](#images-cropx), [cropY](#images-cropy), [id](#images-id), and [subType](#images-subtype) below.


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
	"subType": "LandscapeLogoMedia",
	"cropX": 70,
	"cropY": 0,
	"cropWidth": 200,
	"cropHeight": 50
},
{
	"id": 1234567890000,
	"subType": "SquareLogoMedia",
	"cropX": 308,
	"cropY": 0,
	"cropWidth": 120,
	"cropHeight": 120
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
	"subType": "ImageMedia1x2",
	"cropX": 41,
	"cropY": 0,
	"cropWidth": 500,
	"cropHeight": 1000
},
{
	"id": 1234567890000,
	"subType": "ImageMedia4x1",
	"cropX": 60,
	"cropY": 0,
	"cropWidth": 1000,
	"cropHeight": 250
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""id"":1234567890000,""subType"":""LandscapeImageMedia""},{""id"":1234567890000,""subType"":""SquareImageMedia"",""cropX"":286,""cropY"":0,""cropWidth"":628,""cropHeight"":628},{""id"":1234567890000,""subType"":""LandscapeLogoMedia"",""cropX"":70,""cropY"":0,""cropWidth"":200,""cropHeight"":50},{""id"":1234567890000,""subType"":""SquareLogoMedia"",""cropX"":308,""cropY"":0,""cropWidth"":120,""cropHeight"":120},{""id"":1234567890000,""subType"":""ImageMedia15X10"",""cropX"":129,""cropY"":0,""cropWidth"":942,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia133X100"",""cropX"":183,""cropY"":0,""cropWidth"":835,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia178X100"",""cropX"":41,""cropY"":0,""cropWidth"":1118,""cropHeight"":628},{""id"":1234567890000,""subType"":""ImageMedia1X2"",""cropX"":41,""cropY"":0,""cropWidth"":500,""cropHeight"":1000},{""id"":1234567890000,""subType"":""ImageMedia4X1"",""cropX"":60,""cropY"":0,""cropWidth"":1000,""cropHeight"":250}]"*.  

**Add:** Required if its parent campaign does not associate to a store, optional if the parent campaign associates to a store. If the parent campaign associates to a store and you specify Images, you must also specify Headlines, LongHeadlines, and Descriptions. Only the [id](#images-id) and [subType](#images-subtype) are required for each asset link.  
**Update:** Optional. To retain all of the existing asset links, set or leave this field empty. If you set this field, any images that were previously linked to this ad will be replaced. If you set this field, only the [id](#images-id) and [subType](#images-subtype) are required for each asset link.  
**Delete:** Read-only  

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

The same image asset identifier can be used multiple times in the same ad for different aspect ratios, and can also be used by multiple ads in the same Microsoft Advertising account. You can create images for responsive ads via the [Image](image.md) bulk record. Then you can use the returned media identifier as the image asset ID. The aspect ratio of the image that you added must be supported for the image asset [subType](#images-subtype).

### <a name="images-subtype"></a>subType
The `subType` attribute represents the aspect ratio for this image asset.

The true aspect ratio of the [Image](image.md) that is stored in the account level media library can vary, so long as the resulting dimensions result in the expected aspect ratio per sub type.

The possible sub type values include LandscapeImageMedia, SquareImageMedia, LandscapeLogoMedia, SquareLogoMedia, ImageMedia15X10, ImageMedia133X100, ImageMedia178X100, ImageMedia1X2, and ImageMedia4X1. New sub types might be added in the future, so you should not take any dependency on a fixed set of values.

|Sub Type|Aspect ratio|Minimum dimensions in pixels|
|--------|--------|--------|
|LandscapeImageMedia|1.91:1|703 width x 368 height|
|SquareImageMedia|1:1|300 width x 300 height|
|LandscapeLogoMedia|4:1|160 width x 40 height|
|SquareLogoMedia|1:1|40 width x 40 height|
|ImageMedia15x10|1.5:1|300 width x 200 height|
|ImageMedia133x100|1.33:1|100 width x 75 height|
|ImageMedia178x100|1.78:1|624 width x 350 height|
|ImageMedia1x2|1:2|470 width x 940 height|
|ImageMedia4x1|4:1|608 width x 152 height|

## <a name="longheadlines"></a>Long Headlines
The list of long headlines that Bing can use to optimize the ad layout.

To maximize performance across all ad formats the long headlines might not always be shown in your ad.

From a data model perspective the long headlines are stored as text assets. The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.

You must set between 1-5 long headlines. The long headlines are represented in the bulk file as a JSON string. Two long headlines are included in the example JSON below. The `id` and `text` are properties of the asset, whereas the `editorialStatus` and `assetPerformanceLabel` are properties of the asset link i.e., the relationship between the asset and the ad. For more details see [assetPerformanceLabel](#longheadline-assetperformancelabel), [editorialStatus](#longheadline-editorialstatus), [id](#longheadline-id), and [text](#longheadline-text) below.

```json
[{
	"text": "Find New Customers & Increase Sales!",
},
{
	"text": "Start Advertising on Contoso Today."
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""text"":""Find New Customers & Increase Sales!""},{""text"":""Start Advertising on Contoso Today.""}]"*.

Here's an example Bulk download where you'll also get read-only attributes e.g., `id` and `editorialStatus`:

```json
[{
	"id": 1,
	"text": "Find New Customers & Increase Sales!",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
},
{
	"id": 2,
	"text": "Start Advertising on Contoso Today",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
}]
```

**Add:** Required if its parent campaign does not associate to a store, optional if the parent campaign associates to a store. If the parent campaign associates to a store and you specify LongHeadlines, you must also specify Headlines, Descriptions, and Images. Only the [text](#longheadline-text) is honored. Even if the asset already exists in your account, the [id](#longheadline-id), [assetPerformanceLabel](#longheadline-assetperformancelabel), and [editorialStatus](#longheadline-editorialstatus) will be ignored if you include them.  
**Update:** Optional. To retain all of the existing asset links, set or leave this field empty. If you set this field, any headlines that were previously linked to this ad will be replaced. If you specify this field, a list of 1-5 headlines is required. Only the [text](#longheadline-text) is honored. Even if the asset already exists in your account, the [id](#longheadline-id), [assetPerformanceLabel](#longheadline-assetperformancelabel), and [editorialStatus](#longheadline-editorialstatus) will be ignored if you include them.  
**Delete:** Read-only  

### <a name="longheadline-assetperformancelabel"></a>assetPerformanceLabel
This lets you know how well the asset is performing.

The `assetPerformanceLabel` attribute is read-only when you download the responsive search ad. Possible values are described in the table below.  

|Value|Description|
|-----------|---------------|
|Low|This asset's performance is low and we recommend you replace this asset to improve your ad performance.|
|Good|This asset is performing well. We recommend you keep this asset and add more assets to improve your ad performance.|
|Best|This asset's performance is among the best and we recommend that you add more similar assets.|
|Unrated|We don't have any performance rating for this asset. This can be due to the asset being inactive, not having enough information to determine its performance, or if there aren't enough similar assets to compare against it.|
|Learning|The asset's performance is being actively evaluated. Once the evaluation is complete, the asset rating will be Low, Good, Best, or Unrated.|

### <a name="longheadline-editorialstatus"></a>editorialStatus
The `editorialStatus` attribute is a read-only string when you download the responsive search ad. Possible values are described in the table below.  

|Value|Description|
|-----------|---------------|
|Active|The asset passed editorial review.|
|ActiveLimited|The asset passed editorial review in one or more markets, and one or more elements of The asset is undergoing editorial review in another market. For example The asset passed editorial review for Canada and is still pending review in the United States.|
|Disapproved|The asset failed editorial review.|
|Inactive|One or more elements of The asset is undergoing editorial review.|
|Unknown|Reserved for future use.|

### <a name="longheadline-id"></a>id
The `id` attribute is a unique Microsoft Advertising identifier for the asset in a Microsoft Advertising account.

The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account. After you upload a text asset the result file will include the asset identifier e.g., `""id:""123`, whether the asset is new or already existed in the account's asset library.

### <a name="longheadline-text"></a>text
Each long headline's `text` attribute must contain at least one word. The maximum input length of each headline's `text` attribute is 90 characters. For languages with double-width characters e.g. Traditional Chinese the maximum input length is 45 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

The `text` attribute cannot contain the newline (\n) character.

## <a name="mobilefinalurl"></a>Mobile Final Url
The mobile landing page URL.

The following validation rules apply to Final URLs and Final Mobile URLs.

- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- You may specify up to 10 items for both Final URLs and Final Mobile URLs; however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.

- Each URL is delimited by a semicolon and space ("; ").

- Usage of '{' and '}' is only allowed to delineate tags, for example "{lpurl}".

- Each URL must be a well-formed URL starting with either http:// or https://.

- If you specify Final Mobile URLs, you must also specify Final Url.

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
The system-generated identifier of the campaign that contains the asset group.

This bulk field maps to the *Id* field of the [Campaign](campaign.md) record.

**Add:** Read-only and Required. You must either specify an existing campaign identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Campaign](campaign.md) record. This is recommended if you are adding new ad groups to a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

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

Possible values are *Active*, *Deleted*, *Expired*, or *Paused*. The *Expired* status is read-only.

**Add:** Optional. The default value is *Paused*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Required. The Status must be set to *Deleted*.  

## <a name="startdate"></a>Start Date
The date that the asset group can begin serving; otherwise, the service can begin serving the asset group the day that the asset group becomes active.

The start date is inclusive. For example, if you set *Start Date* to 5/5/2020, the asset group will start at 12:00 AM on 5/5/2020. The time is based on the time zone that you specify at the campaign level.

**Add:** Optional. If you do not set this field or if the date you submit is prior to today's date, then today's date will be set and the service can begin serving the asset group as soon as the asset group status is active.  
**Update:** Optional. If no value is set for the update, this setting is not changed. The start date cannot be updated after the asset group is submitted i.e., once the start date has arrived.  
**Delete:** Read-only  
