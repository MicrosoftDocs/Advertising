---
title: "Text Ad Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Text Ad fields in a Bulk file.
dev_langs:
  - csharp
---
# Text Ad Record - Bulk
Defines a text ad that can be downloaded and uploaded in a bulk file.

> [!IMPORTANT]
> 
> Beginning April 2020, delivery of standart text ads (STA) is not supported.  
> 
> Standard Text Ads have been deprecated in favor of Expanded Text Ads (EXTAs). Support for adding and updating standard text ads (STAs) ended on July 31, 2017. Now, advertisers can get and delete, but can no longer add new STAs or update existing standard text ads. One exception to the rule, is that you can still update the STA status e.g. from *Active* to *Paused*. Otherwise attempts to add or update STAs will result in the *CampaignServiceAdTypeInvalid* error. 

You can download all *Text Ad* records in the account by including the [DownloadEntity](downloadentity.md) value of *TextAds* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new text ad if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Title,Text,Display Url,Destination Url,Promotion,Device Preference,Ad Format Preference,Name,App Platform,App Id,Final Url,Mobile Final Url,Tracking Template,Custom Parameter,Title Part 1,Title Part 2,Path 1,Path 2
Format Version,,,,,,,,,,,,,,6.0,,,,,,,,,,
Text Ad,Active,,-1111,ParentCampaignNameGoesHere,AdGroupNameGoesHere,ClientIdGoesHere,,Contoso Quick Setup,Find New Customers & Increase Sales!,contoso.com,,,All,False,,,,https://www.contoso.com/womenshoesale,https://mobile.contoso.com/womenshoesale,,{_promoCode}=PROMO1; {_season}=summer,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkTextAd* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkTextAd
var bulkTextAd = new BulkTextAd
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
    // TextAd object of the Campaign Management service.
    TextAd = new TextAd
    {
        // 'Ad Format Preference' column header in the Bulk file
        AdFormatPreference = "All",
        // 'Destination Url' column header in the Bulk file
        DestinationUrl = null,
        // 'Device Preference' column header in the Bulk file
        DevicePreference = 0,
        // 'Display Url' column header in the Bulk file
        DisplayUrl = "contoso.com",
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
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Status' column header in the Bulk file
        Status = AdStatus.Active,
        // 'Text' column header in the Bulk file
        Text = "Find New Customers & Increase Sales!",
        // 'Title' column header in the Bulk file
        Title = "Contoso Quick Setup",
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

uploadEntities.Add(bulkTextAd);

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

For a *Text Ad* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Format Preference](#adformatpreference)
- [Ad Group](#adgroup)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Custom Parameter](#customparameter)
- [Device Preference](#devicepreference)
- [Display Url](#displayurl)
- [Editorial Appeal Status](#editorialappealstatus)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [Final Url](#finalurl)
- [Id](#id)
- [Mobile Final Url](#mobilefinalurl)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Publisher Countries](#publishercountries)
- [Status](#status)
- [Text](#text)
- [Title](#title)
- [Tracking Template](#trackingtemplate)

## <a name="adformatpreference"></a>Ad Format Preference
The *Ad Format Preference* field is used to indicate whether or not you prefer the ad copy to be shown to users as a search or audience ad. Search ads tend to be written as a call to action, whereas audience ads should be written in more of an informational style. While you have the option to use search text ads as audience ads, designating an ad as Audience ads preferred format allows you to optimize its messaging for native delivery. 

> [!IMPORTANT]
> You must define at least one text ad per ad group that does not prefer audience ads, otherwise the ad copy of all text ads will be eligible for both search and audience ads. 

Possible values are *Audience Ad* and *All*. If set to *All*, the ad will be eligible for both search and audience ad formats. If set to *Audience Ad*, the ad will only be eligible for the audience ad format.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Read-only  

## <a name="adgroup"></a>Ad Group
The name of the ad group that contains the ad.

**Add:** Not supported  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For update and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="campaign"></a>Campaign
The name of the campaign that contains the ad group and ad.

**Add:** Not supported  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Not supported  
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

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Read-only  

## <a name="devicepreference"></a>Device Preference
This field determines whether the preference is for text ads to be displayed on all devices or only on mobile devices. 

Possible values are *All* and *Mobile*, which differ from values used in the campaign management service. 

The default value is *All*.

In the bulk download and upload results file, this field will never be empty. If you did not specify a device preference, the default value of *All* will be returned.

> [!IMPORTANT]
> You must define at least one text ad per ad group that is not mobile preferred, otherwise the ad copy of all text ads will be eligible for all devices.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Read-only  

## <a name="displayurl"></a>Display Url
The URL to display in the ad.

The subdirectory of the display URL can contain dynamic text strings such as {keyword}; however, the URL hostname cannot contain dynamic text. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).

The maximum input length of the URL is 200 characters, and can contain dynamic text strings. However, the ad will fail to display if the URL exceeds 35 characters after dynamic text substitution occurs.

**Add:** Not supported  
**Update:** Not supported     
**Delete:** Read-only  

## <a name="editorialappealstatus"></a>Editorial Appeal Status
Determines whether you can appeal the issues found by the editorial review.

Possible values are described in the table below.

|Value|Description|
|-----------|---------------|
|<a name="editorialappealstatusappealable"></a>Appealable|The editorial issue is appealable.|
|<a name="editorialappealstatusappealpending"></a>AppealPending|The editorial issue is appealable and an appeal has been submitted.|
|<a name="editorialappealstatusnotappealable"></a>NotAppealable|The editorial issue is not appealable.|

**Add:** Not supported  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editoriallocation"></a>Editorial Location
The component or property of the ad that failed editorial review. 

**Add:** Not supported  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialreasoncode"></a>Editorial Reason Code
A code that identifies the reason for the failure. For a list of possible reason codes, see [Editorial Reason Codes](../guides/editorial-failure-reason-codes.md). 

**Add:** Not supported  
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

**Add:** Not supported  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialterm"></a>Editorial Term
The term that failed editorial review.

This field will not be set if a combination of terms caused the failure or if the failure was based on a policy violation.

**Add:** Not supported  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="finalurl"></a>Final Url
The landing page URL.

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

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the ad.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad can then be referenced in the *Parent Id* field of dependent record types such as [Text Ad Label](text-ad-label.md#parentid). This is recommended if you are adding new ads and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
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

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Not supported  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the ad group that contains the ad.

This bulk field maps to the *Id* field of the [Ad Group](ad-group.md) record.

**Add:** Not supported  
**Update:** Read-only  
**Delete:** Read-only  

> [!NOTE]
> For update and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="publishercountries"></a>Publisher Countries
The list of publisher countries whose editorial guidelines do not allow the specified [term](#editorialterm).

In a bulk file, the list of publisher countries are delimited with a semicolon (;).

**Add:** Not supported  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the ad.

Possible values are *Active*, *Paused*, or *Deleted*. 

**Add:** Not supported  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="text"></a>Text
The ad copy.

The text must contain at least one word and can contain dynamic text strings such as {keyword}. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).

The maximum input length of the copy is 300 characters, and can contain dynamic text strings. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 80 characters after dynamic text substitution occurs. Note that for ad groups that use Traditional Chinese the maximum input length of the copy is 150 characters, and the text is limited to 40 characters after substitution.

The text cannot contain the newline (\n) character.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Read-only  

## <a name="title"></a>Title
The title of the ad. 

The title must contain at least one word. The ad’s copy and title combined must total at least three words.

The title can contain dynamic text strings such as {keyword}. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).

The maximum input length of the title is 80 characters, and can contain dynamic text strings. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 25 characters after dynamic text substitution occurs. Note that for ad groups that use Traditional Chinese, the title is limited to 15 characters after substitution.

The title cannot contain the newline (\n) character.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Read-only  

## <a name="trackingtemplate"></a>Tracking Template
The tracking template to use as a default for the URL specified with FinalUrls.

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Read-only  
