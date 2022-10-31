---
title: "Responsive Search Ad Record - Bulk"
ms.service: bing-ads
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Responsive Search Ad fields in a Bulk file.
dev_langs:
  - csharp
ms.subservice: bulk-api
---
# Responsive Search Ad Record - Bulk
Defines a responsive search ad format for text ads in the Search network that can be downloaded and uploaded in a bulk file.

> [!NOTE]
> Duplicate responsive search ads are allowed in the same ad group. 

Responsive search ads allow you to set between 3-15 unique ad headlines (a.k.a. "titles") and 2-4 ad descriptions within a single ad. From there, Bing will select the most relevant headline and description combination for each given query and corresponding search user. By allowing Bing AI to select the most relevant headline and description for each query, we ensure that the right message lands for each of your potential customers, at the right time, across all possible intent signals. 

The responsive ads shown to users appear identical to expanded text ads i.e., up to 3 headlines (title parts via expanded text ads) and 2 descriptions (text parts via expanded text ads). However, depending on the screen size, your ad may show without the third headline or second description.

When you create responsive search ads the [Description](#description) and [Headline](#headline) lists are stored as text assets that can be shared by any responsive search ad within the account. For example if "Seamless Integration" is a text asset, you will observe that it has the same asset identifier across all ads that link to "Seamless Integration" in the same Microsoft Advertising account. After you upload a text asset the result file will include the asset identifier e.g., `""id:""123`, whether the asset is new or already existed in the account's asset library. 

> [!NOTE]
> Responsive search ads can only be created in Search campaigns where the [Ad Group Type](ad-group.md#adgrouptype) is set to "SearchStandard". If the [Ad Group Type](ad-group.md#adgrouptype) is set to "SearchDynamic", then the ad group does not support responsive search ads.  

You can download all *Responsive Search Ad* records in the account by including the [DownloadEntity](downloadentity.md) value of *ResponsiveSearchAds* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new responsive search ad if a valid [Parent Id](#parentid) value is provided.  

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Ad Format Preference,Name,App Platform,App Id,Final Url,Mobile Final Url,Tracking Template,Final Url Suffix,Custom Parameter,Description,Path 1,Path 2,Domain,Headline
Format Version,,,,,,,,,6.0,,,,,,,,,,,,
Responsive Search Ad,Active,,-1111,ParentCampaignNameGoesHere,AdGroupNameGoesHere,ClientIdGoesHere,,False,,,,https://www.contoso.com/womenshoesale,https://mobile.contoso.com/womenshoesale,,,{_promoCode}=PROMO1; {_season}=summer,"[{""text"":""Find New Customers & Increase Sales!"",""pinnedField"":""Description1""},{""text"":""Start Advertising on Contoso Today.""}]",seattle,shoe sale,,"[{""text"":""Contoso"",""pinnedField"":""Headline1""},{""text"":""Quick & Easy Setup""},{""text"":""Seamless Integration""}]"
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkResponsiveSearchAd* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkResponsiveSearchAd
var bulkResponsiveSearchAd = new BulkResponsiveSearchAd
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
    // ResponsiveSearchAd object of the Campaign Management service.
    ResponsiveSearchAd = new ResponsiveSearchAd
    {
        // 'Description' column header in the Bulk file
        Descriptions = new AssetLink[]
        {
            // Each AssetLink is represented as a JSON list item in the Bulk file.
            new AssetLink
            {
                Asset = new TextAsset
                {
                    Text = "Find New Customers & Increase Sales!"
                },
                PinnedField = "Description1"
            },
            new AssetLink
            {
                Asset = new TextAsset
                {
                    Text = "Start Advertising on Contoso Today."
                },
            },
        },
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
        Headlines = new AssetLink[]
        {
            // Each AssetLink is represented as a JSON list item in the Bulk file.
            new AssetLink
            {
                Asset = new TextAsset
                {
                    Text = "Contoso"
                },
                PinnedField = "Headline1"
            },
            new AssetLink
            {
                Asset = new TextAsset
                {
                    Text = "Quick & Easy Setup"
                },
            },
            new AssetLink
            {
                Asset = new TextAsset
                {
                    Text = "Seamless Integration"
                },
            },
        },
        // 'Id' column header in the Bulk file
        Id = responsiveSearchAdIdKey,
        // 'Path 1' column header in the Bulk file
        Path1 = "seattle",
        // 'Path 2' column header in the Bulk file
        Path2 = "shoe sale",
        // 'Status' column header in the Bulk file
        Status = AdStatus.Active,
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

uploadEntities.Add(bulkResponsiveSearchAd);

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

For a *Responsive Search Ad* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Custom Parameter](#customparameter)
- [Description](#description)
- [Domain](#domain)
- [Editorial Appeal Status](#editorialappealstatus)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [Final Url](#finalurl)
- [Headline](#headline)
- [Final Url Suffix](#finalurlsuffix)
- [Id](#id)
- [Mobile Final Url](#mobilefinalurl)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Path 1](#path1)
- [Path 2](#path2)
- [Publisher Countries](#publishercountries)
- [Status](#status)
- [Tracking Template](#trackingtemplate)


## <a name="adgroup"></a>Ad Group
The name of the ad group that contains the ad.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

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

## <a name="description"></a>Description
The list of descriptions that Bing can use to optimize the ad layout.

To maximize impressions across all ad formats the descriptions might not always be shown in your ad.

Unless you pin one of the descriptions to a specific position, Bing will optimize the ad layout dynamically with the best headlines and descriptions for the user's search query. 

From a data model perspective the descriptions are stored as text assets. The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account. 

You must set between 2-4 descriptions. The descriptions are represented in the bulk file as a JSON string. Two descriptions are included in the example JSON below, and the first is pinned to a specific position. The `id` and `text` are properties of the asset, whereas the `editorialStatus` and `pinnedField` are properties of the asset link i.e., the relationship between the asset and the ad. For more details see [editorialStatus](#description-editorialstatus), [id](#description-id), [pinnedField](#description-pinnedfield), and [text](#description-text) below.

```json
[{
	"text": "Find New Customers & Increase Sales!",
	"pinnedField": "Description1"
},
{
	"text": "Start Advertising on Contoso Today."
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""text"":""Find New Customers & Increase Sales!"",""pinnedField"":""Description1""},{""text"":""Start Advertising on Contoso Today.""}]"*. 

Here's an example Bulk download where you'll also get read-only attributes e.g., `id` and `editorialStatus`: 

```json
[{
	"id": 1,
	"text": "Contoso",
	"pinnedField": "Description1",
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

**Add:** Required. The list of 2-4 descriptions is required. Only the [pinnedField](#description-pinnedfield) and [text](#description-text) are honored. Even if the asset already exists in your account, the [id](#description-id), [assetPerformanceLabel](#description-assetperformancelabel), and [editorialStatus](#description-editorialstatus) will be ignored if you include them.  
**Update:** Optional. To retain all of the existing asset links, set or leave this field empty. If you set this field, any descriptions that were previously linked to this ad will be replaced. If you specify this field, a list of 2-4 descriptions is required. Only the [pinnedField](#description-pinnedfield) and [text](#description-text) are honored. Even if the asset already exists in your account, the [id](#description-id), [assetPerformanceLabel](#description-assetperformancelabel), and [editorialStatus](#description-editorialstatus) will be ignored if you include them.  
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

### <a name="description-pinnedfield"></a>pinnedField
To pin an asset to a specific description position, set the `pinnedField` attribute to either "Description1" or "Description2". Unless you have a specific requirement for a text asset, don't pin it and let Bing AI optimize the text placement. 

At least one eligible text asset must be available for each description position, so you cannot pin all of the assets to the same position. For example you can have 3 text assets pinned to *Description1*, so long as you have at least one text asset in the responsive search ad's [Description](#description) list that is either not pinned, or pinned to *Description2*.

When you download an asset that is not pinned, the `pinnedField` attribute is not returned.

### <a name="description-text"></a>text
Each description's `text` attribute must contain at least one word. For efficient use of resources we recommend that you use dynamic text strings such as {keyword} instead of creating new ad copy for each keyword. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).

The maximum input length of each description's `text` attribute is 1,000 characters including dynamic text strings, and of those 1,000 no more than 90 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 90 characters after dynamic text substitution occurs. For languages with double-width characters e.g. Traditional Chinese the maximum input length is 500 characters including dynamic text strings, and of those 500 no more than 45 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 45 characters after dynamic text substitution occurs. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

The `text` attribute cannot contain the newline (\n) character.  

## <a name="domain"></a>Domain
The URL that will be displayed instead of the final URL. The final URL will still be used for the landing page URL.

Reserved for limited pilot usage e.g. pharmaceutical customers.

The domain portion of the URL in combination with the path 1 and path 2 strings cannot exceed 67 characters.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.     
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
**Update:** Optional    
**Delete:** Read-only  

## <a name="headline"></a>Headline
The list of ad titles that Bing can use to optimize the ad layout.

Unless you pin one of the headlines to a specific position, Bing will optimize the ad layout dynamically with the best headlines and descriptions for the user's search query. 

From a data model perspective the headlines are stored as text assets. The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account. 

You must set between 3-15 headlines. The headlines are represented in the bulk file as a JSON string. Three headlines are included in the example JSON below, and only the first headline is pinned to specific position. The `id` and `text` are properties of the asset, whereas the `editorialStatus` and `pinnedField` are properties of the asset link i.e., the relationship between the asset and the ad. For more details see [editorialStatus](#headline-editorialstatus), [id](#headline-id), [pinnedField](#headline-pinnedfield), and [text](#headline-text) below.

```json
[{
	"text": "Contoso",
	"pinnedField": "Headline1"
},
{
	"text": "Quick & Easy Setup"
},
{
	"text": "Seamless Integration"
}]
```

> [!NOTE]
> In the comma separated bulk file you'll need to surround the list of asset links, each attribute key, and each attribute string value with an extra set of double quotes e.g., the above JSON string would be written as *"[{""text"":""Contoso"",""pinnedField"":""Headline1""},{""text"":""Quick & Easy Setup""},{""text"":""Seamless Integration""}]"*.

Here's an example Bulk download where you'll also get read-only attributes e.g., `id` and `editorialStatus`: 

```json
[{
	"id": 3,
	"text": "Contoso",
	"pinnedField": "Headline1",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
},
{
	"id": 4,
	"text": "Quick & Easy Setup",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
},
{
	"id": 5,
	"text": "Seamless Integration",
	"editorialStatus": "Active",
	"assetPerformanceLabel": "Learning"
}]
```

**Add:** Required. The list of 3-15 headlines is required. Only the [pinnedField](#headline-pinnedfield) and [text](#headline-text) are honored. Even if the asset already exists in your account, the [id](#headline-id), [assetPerformanceLabel](#headline-assetperformancelabel), and [editorialStatus](#headline-editorialstatus) will be ignored if you include them.  
**Update:** Optional. To retain all of the existing asset links, set or leave this field empty. If you set this field, any headlines that were previously linked to this ad will be replaced. If you specify this field, a list of 3-15 headlines is required. Only the [pinnedField](#headline-pinnedfield) and [text](#headline-text) are honored. Even if the asset already exists in your account, the [id](#headline-id), [assetPerformanceLabel](#headline-assetperformancelabel), and [editorialStatus](#headline-editorialstatus) will be ignored if you include them.   
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

### <a name="headline-pinnedfield"></a>pinnedField
To pin an asset to a specific headline position, set the `pinnedField` string value to either "Headline1", "Headline2", or "Headline3". Unless you have a specific requirement for a text asset, don't pin it and let Bing AI optimize the text placement. 

At least one eligible text asset must be available for each headline position, so you cannot pin all of the assets to the same position. For example you can have 3 text assets pinned to *Headline1* and 3 text assets pinned to *Headline2*, so long as you have at least one text asset in the responsive search ad's [Headline](#headline) list that is either not pinned, or pinned to *Headline3*.

When you download an asset that is not pinned, the `pinnedField` attribute is not returned.

### <a name="headline-text"></a>text
Each headline's `text` attribute must contain at least one word. For efficient use of resources we recommend that you use dynamic text strings such as {keyword} instead of creating new ad copy for each keyword. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).

The maximum input length of each headline's `text` attribute is 1,000 characters including dynamic text strings, and of those 1,000 no more than 30 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 30 characters after dynamic text substitution occurs. For languages with double-width characters e.g. Traditional Chinese the maximum input length is 500 characters including dynamic text strings, and of those 500 no more than 15 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 15 characters after dynamic text substitution occurs. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

The `text` attribute cannot contain the newline (\n) character.

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the ad.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad can then be referenced in the *Parent Id* field of dependent record types such as [Responsive Search Ad Label](responsive-search-ad-label.md#parentid). This is recommended if you are adding new ads and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

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

## <a name="path1"></a>Path 1
The first part of the optional path that will be appended to the domain portion of your display URL. The domain portion of your display URL e.g. *https://www.contoso.com* will be generated from the domain of your Final URL (*Final Url* field).  Then if you have specified a value for *Path 1* it will be appended to the display URL. If you have also specified a value for *Path 2*, then it will also be appended to the display URL after *Path 1*. For example if your *Final Url* contains *https://www.contoso.com*, *Path 1* is set to *subdirectory1*, and *Path 2* is set to *subdirectory2*, then the URL displayed will be *https://www.contoso.com/subdirectory1/subdirectory2*.

The path can contain dynamic parameters such as {MatchType}. For a list of supported parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2).

The maximum input length is 1,000 characters if you include dynamic text strings. No more than 15 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 67 characters.

For languages with double-width characters e.g. Traditional Chinese the maximum input length is 1,000 characters if you include dynamic text strings. No more than 7 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 33 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

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

For languages with double-width characters e.g. Traditional Chinese the maximum input length is 1,000 characters if you include dynamic text strings. No more than 7 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 33 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.

The path cannot contain the forward slash (/) or newline (\n) characters.
	
If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

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

## <a name="trackingtemplate"></a>Tracking Template
The tracking template to use as a default for the URL specified with FinalUrls.

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  
