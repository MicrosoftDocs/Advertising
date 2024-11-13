---
title: "Dynamic Search Ad Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Dynamic Search Ad fields in a Bulk file.
dev_langs:
  - csharp
---
# Dynamic Search Ad Record - Bulk
Defines a dynamic search ad that can be downloaded and uploaded in a bulk file.

With dynamic search ads, the headline and display URL are generated automatically based on the website domain and language that you want to target. The combination of the Path1, Path2, and Text elements make the dynamic search ad unique. Optionally you can supply a static headline using [page feeds](../guides/page-feeds.md). 

> [!NOTE]
> This feature is currently available in the following countries: Albania (AL), Andorra (AD), Argentina (AR), Aruba, Australia (AU), Austria (AT), Bahamas (BS), Bangladesh(BD), Belgium (BE), Bolivia(BO), Bosnia and Herzegovina (BA), Brazil (BR), Brunei(BN), Bulgaria (BG), Canada (CA), Cayman Islands(KY), Chile(CL), Colombia(CO), Costa Rica(CR), Croatia (HR), Cyprus (CY), Czech Republic (CZ), Denmark (DK), Dominica(DM), Dominican Republic(DO), Ecuador(EC), El Salvador(SV), Estonia (EE), Fiji (FJ), Finland (FI), France (FR), French Guiana(GF), French Polynesia (PF), Germany (DE), Greece (GR), Guam (GU), Guatemala (GT), Guyana (GY), Haiti (HT), Honduras (HN), Hungary (HU), Iceland (IS), India (IN), Indonesia (ID), Ireland (IE), Italy (IT), Latvia (LV), Liechtenstein (LI), Lithuania (LT), Luxembourg (LU), Malaysia (MY), Maldives (MV), Malta (MT), Martinique (MQ), Mexico (MX), Monaco (MC), Mongolia (MN), Montenegro (ME), Montserrat (MS), Nepal (NP), Netherlands (NL), New Caledonia (NC), New Zealand (NZ), Republic of North Macedonia (MK), Norway (NO), Panama (PA), Paraguay (PY), Papua New Guinea (PG), Peru (PE), Philippines (PH),  Poland (PO), Portugal (PT), Puerto Rico,  Romania (RO), San Marino (SM), Serbia (RS), Singapore(SG), Slovakia (SK), Slovenia (SI), South Africa (ZA), Spain (ES), Spain(ES), Sri Lanka(LK), Sweden (SE), Switzerland (CH), Thailand(TH), Trinidad and Tobago(TT), Türkiye (TR), Vatican City (VA), Vietnam(VN), United Kingdom (UK), United States (US), Uruguay(UY), and Venezuela(VE).  

The Dynamic Search Ad record can only be created within search campaigns that have valid dynamic search ads settings (comprised of the [Domain Language](campaign.md#domainlanguage), [Dynamic Description Enabled](campaign.md#dynamicdescriptionenabled), [Page Feed Ids](campaign.md#pagefeedids), [Source](campaign.md#source), and [Website](campaign.md#website) fields). The campaign's [Experiment Id](campaign.md#experimentid) must be set and the [Ad Group Type](ad-group.md#adgrouptype) must be set to "SearchDynamic".  

> [!NOTE]
> You can no longer add, update, or retrieve campaigns that only support dynamic search ads. The campaign type of your existing campaigns has been updated from "DynamicSearchAds" to "Search". The ad groups are now considered "dynamic" ad groups, but there are no structural changes i.e., they contain the same auto targets and dynamic search ads as before.   

You can download all *Dynamic Search Ad* records in the account by including the [DownloadEntity](downloadentity.md) value of *DynamicSearchAds* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new dynamic search ad if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Title,Text,Display Url,Destination Url,Promotion,Device Preference,Name,App Platform,App Id,Final Url,Mobile Final Url,Tracking Template,Final Url Suffix,Custom Parameter,Title Part 1,Title Part 2,Path 1,Path 2
Format Version,,,,,,,,,,,,,,6.0,,,,,,,,,,,
Dynamic Search Ad,Active,,-1113,ParentCampaignNameGoesHere,AdGroupNameGoesHere,ClientIdGoesHere,,,Find New Customers & Increase Sales! Start Advertising on Contoso Today.,,,,,,,,,,,,{_promoCode}=PROMO1; {_season}=summer,,,seattle,shoe sale
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkDynamicSearchAd* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkDynamicSearchAd
var bulkDynamicSearchAd = new BulkDynamicSearchAd
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
    // DynamicSearchAd object of the Campaign Management service.
    DynamicSearchAd = new DynamicSearchAd
    {
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Path 1' column header in the Bulk file
        Path1 = "seattle",
        // 'Path 2' column header in the Bulk file
        Path2 = "shoe sale",
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

uploadEntities.Add(bulkDynamicSearchAd);

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

For a *Dynamic Search Ad* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). The combination of the Path 1, Path 2, and Text fields make the dynamic search ad unique.

- [Ad Group](#adgroup)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Custom Parameter](#customparameter)
- [Editorial Appeal Status](#editorialappealstatus)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [Final Url Suffix](#finalurlsuffix)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Path 1](#path1)
- [Path 2](#path2)
- [Publisher Countries](#publishercountries)
- [Status](#status)
- [Text](#text)
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

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the ad.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad can then be referenced in the *Parent Id* field of dependent record types such as [Dynamic Search Ad Label](dynamic-search-ad-label.md#parentid). This is recommended if you are adding new ads and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

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
The first part of the optional path that will be appended to the domain portion of your display URL. The display URL e.g. *www.contoso.com* will be generated from the domain of your display URL. Then if you have specified a value for *Path 1* it will be appended to the display URL. If you have also specified a value for *Path 2*, then it will also be appended to the display URL after *Path 1*. For example if your domain is *contoso.com*, *Path 1* is set to *subdirectory1*, and *Path 2* is set to *subdirectory2*, then the URL displayed will be *www.contoso.com/subdirectory1/subdirectory2*.

The maximum input length of the path is 15 characters. Note that for languages with double-width characters e.g. Traditional Chinese the maximum input length of the path is 7 characters. 

The path can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) and [countdown](https://help.ads.microsoft.com/#apex/3/en/56853/0-500) functions. Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available. For more details see [Countdown Customizers](../guides/countdown-customizers.md). 

The path cannot contain the forward slash (/) or newline (\n) characters.

If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="path2"></a>Path 2
The second part of the optional path that will be appended to the domain portion of your display URL. The display URL e.g. *www.contoso.com* will be generated from the domain of your dynamic search ads campaign level settings. Then if you have specified a value for *Path 1* it will be appended to the display URL. If you have also specified a value for *Path 2*, then it will also be appended to the display URL after *Path 1*. For example if your domain is *contoso.com*, *Path 1* is set to *subdirectory1*, and *Path 2* is set to *subdirectory2*, then the URL displayed will be *www.contoso.com/subdirectory1/subdirectory2*.

You can only specify *Path 2* if *Path 1* is also set.

The maximum input length of the path is 15 characters. Note that for languages with double-width characters e.g. Traditional Chinese the maximum input length of the path is 7 characters. 

The path can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) and [countdown](https://help.ads.microsoft.com/#apex/3/en/56853/0-500) functions. Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available. For more details see [Countdown Customizers](../guides/countdown-customizers.md). 

The path cannot contain the forward slash (/) or newline (\n) characters. If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="publishercountries"></a>Publisher Countries
The list of publisher countries or regions whose editorial guidelines do not allow the specified [term](#editorialterm).

In a bulk file, the list of publisher countries or regions are delimited with a semicolon (;).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the ad.

Possible values are *Active*, *Paused*, or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="text"></a>Text
The first part of the ad description.

The text must contain at least one word. 

The maximum input length of the copy is 90 characters. Note that for ad groups that use Traditional Chinese the maximum input length of the copy is 45 characters.  

The text can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) and [countdown](https://help.ads.microsoft.com/#apex/3/en/56853/0-500) functions. Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available. For more details see [Countdown Customizers](../guides/countdown-customizers.md). 

The text cannot contain the newline (\n) character.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="textpart2"></a>Text Part 2
The second part of the ad description.

The text must contain at least one word.

The maximum input length of the copy is 90 characters. Note that for ad groups that use Traditional Chinese the maximum input length of the copy is 45 characters.  

The text can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) and [countdown](https://help.ads.microsoft.com/#apex/3/en/56853/0-500) functions. Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available. For more details see [Countdown Customizers](../guides/countdown-customizers.md). 

The text cannot contain the newline (\n) character.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

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
