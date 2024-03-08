---
title: "Campaign Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Campaign fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign Record - Bulk
Defines a campaign that can be uploaded and downloaded in a bulk file.  

You can download all *Campaign* records in the account by including the [DownloadEntity](downloadentity.md) value of *Campaigns* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. To include the [Keyword Relevance](#keywordrelevance), [Landing Page Relevance](#landingpagerelevance), [Landing Page User Experience](#landingpageuserexperience), and [Quality Score](#qualityscore) fields within the downloaded *Campaign* records, you must also include the [QualityScoreData](datascope.md#qualityscoredata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add one Search campaign. 

```csv
Type,Status,Id,Parent Id,Campaign,Website,Client Id,Modified Time,Budget Id,Budget Name,Budget,Budget Type,Bid Adjustment,Name,Country Code,Store Id,Campaign Type,Language,Target Setting,Priority,Tracking Template,Final Url Suffix,Custom Parameter,Bid Strategy Type,Domain Language,Source
Format Version,,,,,,,,,,,,,,6.0,,,,,,,,,,,,
Campaign,Active,-111,0,Women's Shoes,,ClientIdGoesHere,,PacificTimeUSCanadaTijuana,,,50,DailyBudgetStandard,10,,,,Search,All,Audience,,,,{_promoCode}=PROMO1; {_season}=summer,EnhancedCpc,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCampaign* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCampaign
var bulkCampaign = new BulkCampaign
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // Campaign object of the Campaign Management service.
    Campaign = new Campaign
    {        
        // 'Ad Schedule Use Searcher Time Zone' column header in the Bulk file
        AdScheduleUseSearcherTimeZone = true,
        // 'Bid Strategy Type' column header in the Bulk file
        BiddingScheme = new EnhancedCpcBiddingScheme { },
        // 'Budget Id' column header in the Bulk file
        BudgetId = null,
        // 'Budget Type' column header in the Bulk file
        BudgetType = BudgetLimitType.DailyBudgetStandard,
        // 'Campaign Type' column header in the Bulk file
        CampaignType = CampaignType.Search,
        // 'Budget' column header in the Bulk file
        DailyBudget = 50,
        // 'Experiment Id' column header in the Bulk file
        ExperimentId = null,
        // 'Id' column header in the Bulk file
        Id = campaignIdKey,
        // 'Language' column header in the Bulk file
        Languages = new string[] { "All" },
        // 'Campaign' column header in the Bulk file
        Name = "Women's Shoes",
        // 'Bid Adjustment' column header in the Bulk file
        AudienceAdsBidAdjustment = 10,
        Settings = new Setting[] 
        {
            // 'Target Setting' column header in the Bulk file
            new TargetSetting
            {
                // Each target setting detail is delimited by a semicolon (;) in the Bulk file
                Details = new TargetSettingDetail[]
                {
                    new TargetSettingDetail
                    {
                        CriterionTypeGroup = CriterionTypeGroup.Audience,
                        TargetAndBid = false
                    }
                }
            }
        },
        // 'Status' column header in the Bulk file
        Status = CampaignStatus.Active,
        // 'Sub Type' column header in the Bulk file
        SubType = null,
        // 'Tracking Template' column header in the Bulk file
        TrackingUrlTemplate = null,
        // 'Custom Parameter' column header in the Bulk file
        UrlCustomParameters = new CustomParameters
        {
            // Each custom parameter is delimited by a semicolon (;) in the Bulk file
            Parameters = new[] 
            {
                new CustomParameter(){
                    Key = "promoCode",
                    Value = "PROMO1"
                },
                new CustomParameter(){
                    Key = "season",
                    Value = "summer"
                },
            },
        },
        // 'URL Expansion Opt Out' column header in the Bulk file
        UrlExpansionOptOut = false,
    },
};

uploadEntities.Add(bulkCampaign);

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

For a *Campaign* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

|Column Header|Supported Campaign Types|
|-----------------|---------------|
|[Ad Schedule Use Searcher Time Zone](#adscheduleusesearchertimezone)|All|
|[Bid Adjustment](#bidadjustment)|All|
|[Bid Strategy Commission](#bidstrategycommission)|Hotel|
|[Bid Strategy TargetCostPerSale](#bidstrategytargetcostpersale)|Performance Max<br/>Shopping|
|[Bid Strategy Id](#bidstrategyid)|Search<br>Shopping|
|[Bid Strategy ManualCpc](#bidstrategymanualcpc)|Audience<br/>Hotel|
|[Bid Strategy MaxCpc](#bidstrategymaxcpc)|Search<br>Shopping|
|[Bid Strategy Name](#bidstrategyname)|Search<br>Shopping|
|[Bid Strategy PercentCpc](#bidstrategypercentcpc)|Hotel|
|[Bid Strategy TargetAdPosition](#bidstrategytargetadposition)|Search|
|[Bid Strategy TargetCpa](#bidstrategytargetcpa)|Performance Max<br/>Search|
|[Bid Strategy TargetImpressionShare](#bidstrategytargetimpressionshare)|Search|
|[Bid Strategy TargetRoas](#bidstrategytargetroas)|Performance Max<br/>Search<br>Shopping|
|[Bid Strategy Type](#bidstrategytype)|All|
|[Budget](#budget)|All|
|[Budget Id](#budgetid)|All|
|[Budget Name](#budgetname)|All|
|[Budget Type](#budgettype)|All|
|[Campaign](#campaign)|All|
|[Campaign Type](#campaigntype)|All|
|[Client Id](#clientid)|All|
|[Country Code](#countrycode)|Performance Max<br/>Shopping|
|[Disclaimer Ads Enabled](#disclaimeradsenabled)|Search|
|[Domain Language](#domainlanguage)|Search|
|[Dynamic Description Enabled](#dynamicdescriptionenabled)|Search|
|[Experiment Id](#experimentid)|Search|
|[Feed Label](#feedlabel)|Performance Max<br/>Search|
|[Final Url Suffix](#finalurlsuffix)|All|
|[Id](#id)|All|
|[Keyword Relevance](#keywordrelevance)|All|
|[Landing Page Relevance](#landingpagerelevance)|All|
|[Landing Page User Experience](#landingpageuserexperience)|All|
|[Language](#language)|All|
|[LocalInventoryAdsEnabled](#language)|Shopping|
|[Modified Time](#modifiedtime)|All|
|[Page Feed Ids](#pagefeedids)|Search|
|[Parent Id](#parentid)|All|
|[Priority](#priority)|Performance Max<br/>Shopping|
|[Quality Score](#qualityscore)|All|
|[Source](#source)|Search|
|[Status](#status)|All|
|[Store Id](#storeid)|Audience<br>Performance Max<br/>Shopping|
|[Sub Type](#subtype)|Shopping|
|[Target Setting](#targetsetting)|All|
|[Tracking Template](#trackingtemplate)|All|
|[URL Expansion Opt Out](#urlexpansionoptout)|Performance Max|
|[Website](#website)|Search|

## <a name="adscheduleusesearchertimezone"></a>Ad Schedule Use Searcher Time Zone
Determines whether to use the account time zone or the time zone of the search user where the ads could be delivered.

Set this property to *TRUE* if you want the ads to be shown in the search user's time zone, and otherwise set it to *FALSE*.

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *FALSE* will be set and the account time zone will be used.
**Update:** Optional. If no value is set for the update, this setting is not changed.   
**Delete:** Read-only  

## <a name="bidadjustment"></a>Bid Adjustment
The percent amount by which to adjust your bid for audience ads above or below the base ad group or keyword bid.

> [!NOTE]
> This property is available in Search campaigns if the customer is enabled for the Microsoft Audience Network. This property is not available with [smart shopping campaigns](../guides/smart-shopping-campaigns.md).

Supported values are negative one hundred (-100) through positive nine hundred (900). Setting the bid adjustment to -100 percent will prevent audience ads from showing for this campaign.

Set this field to zero (0) if you do not want any bid adjustment for audience ads.

**Add:** Optional. If you do not set this field the system default bid adjustment will be used. The system default bid adjustment is currently zero (0), and is subject to change.   
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed. If you set this field to *delete_value* then effectively the system default bid adjustment will be used. The system default bid adjustment is currently zero (0), and is subject to change.     
**Delete:** Read-only  

## <a name="bidstrategycommission"></a>Bid Strategy Commission
The amount of commission that you want to pay per stay.

The Commission bid strategy requires populating the Bid Strategy CommissionRate field.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.
**Delete:** Read-only  

## <a name="bidstrategytargetcostpersale"></a>Bid Strategy TargetCostPerSale
The target cost per sale (CPS) that you want used by Microsoft Advertising to maximize conversions.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.
**Delete:** Read-only  

## <a name="bidstrategyid"></a>Bid Strategy Id
The system-generated identifier of the [Bid Strategy](bid-strategy.md) that this campaign shares with other campaigns in the account.

If the field is empty, then the campaign is not using a portfolio bid strategy. If the field is not empty and the value is greater than zero, then the campaign is using a portfolio bid strategy. If the campaign is using a portfolio bid strategy, and you prefer that it use its own bid strategy, set this field to '0' (zero).  

> [!NOTE]
> Portfolio bid strategies are not supported with [smart shopping campaigns](../guides/smart-shopping-campaigns.md).   
	
**Add:** Optional. You can either specify an existing bid strategy identifier, or specify a negative identifier that is equal to the [Id](bid-strategy.md#id) field of a [Bid Strategy](bid-strategy.md) record. This is recommended if you are applying a new portfolio bid strategy to a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="bidstrategymanualcpc"></a>Bid Strategy ManualCpc
Set your ad group and keyword bids, and Microsoft Advertising uses these bids every time.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.
**Delete:** Read-only  

## <a name="bidstrategymaxcpc"></a>Bid Strategy MaxCpc
The maximum cost per click that you want to spend with the corresponding bid strategy type. 

This field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to MaxClicks, MaxConversions, TargetCpa, TargetImpressionShare, or TargetRoas, and otherwise this field is ignored.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.
**Delete:** Read-only  

## <a name="bidstrategyname"></a>Bid Strategy Name
The name of the bid strategy.  

If the field is empty, then the campaign is not using a portfolio bid strategy.  

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="bidstrategypercentcpc"></a>Bid Strategy PercentCpc
A percentage of the total hotel price per night, including taxes and fees.

The PercentCPC bid strategy requires populating the Bid Strategy PercentMaxCPC field.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.
**Delete:** Read-only  

## <a name="bidstrategytargetadposition"></a>Bid Strategy TargetAdPosition
The target ad position where you want your ads to appear. 

This field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetImpressionShare*, and otherwise this field is ignored.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Required if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetImpressionShare*, and otherwise this field is ignored.   
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="bidstrategytargetcpa"></a>Bid Strategy TargetCpa
The target cost per acquisition (CPA) that you want used by Microsoft Advertising to maximize conversions.

For Performance Max campaigns, this field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *MaxConversion*. For all other campaigns, this field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetCpa*. Otherwise, this field is ignored.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Optional for Performance Max campaigns if the [Bid Strategy Type](#bidstrategytype) field is set to *MaxConversion*. Required for all other campaigns if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetCpa*. Otherwise, this field is ignored.
**Update:** Optional. If no value is set for the update, this setting is not changed.
**Delete:** Read-only  

## <a name="bidstrategytargetimpressionshare"></a>Bid Strategy TargetImpressionShare
The target impression share for the ad position where you want your ads to appear.

This field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetImpressionShare*, and otherwise this field is ignored.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Required if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetImpressionShare*, and otherwise this field is ignored.   
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="bidstrategytargetroas"></a>Bid Strategy TargetRoas
The target return on ad spend (ROAS) that you want used by Microsoft Advertising to maximize conversions.  

The supported target ROAS values range from 0.01 (1 percent) to 1,000.00 (100,000 percent).  

For Performance Max campaigns, this field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *MaxConversionValue*. For all other campaigns, this field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetRoas*. Otherwise, this field is ignored.  

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Optional for Performance Max campaigns if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetRoas*. Required for all other campaigns if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetRoas*. Otherwise, this field is ignored.
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="bidstrategytype"></a>Bid Strategy Type
The bid strategy type for how you want to manage your bids.  

The possible bid strategy type values are Commission, EnhancedCpc, ManualCpc, MaxClicks, MaxConversions, PercentCpc, TargetCpa, TargetImpressionShare, and TargetRoas. For details about supported bid strategies per campaign type, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

> [!IMPORTANT]
> As of April 2021, the manual CPC bid strategy can only be used with audience campaigns. If you attempt to set manual CPC for any other campaign type, the request will be ignored without error and the bid strategy will be set to enhanced CPC.
> 
> As of April 2021, you cannot set any bid strategies for ad groups or keywords. Bid strategies can only be set at the campaign level. If you attempt to set bid strategies for ad groups or keywords, the request will be ignored without error. Ad groups and keywords will inherit their campaign's bid strategy. 

If you use the "Commission" bid strategy type, then you can optionally include the [Bid Strategy Commission](#bidstrategycommission) field.

If you use the "TargetCostPerSale" bid strategy type, then you can optionally include the [Bid Strategy TargetCostPerSale](#bidstrategytargetcostpersale) field.

If you use the "ManualCpc" bid strategy type, then you can optionally include the [Bid Strategy ManualCpc](#bidstrategymanualcpc) field.
  
If you use the "MaxClicks" bid strategy type, then you can optionally include the [Bid Strategy MaxCpc](#bidstrategymaxcpc) field.

If you use the "MaxConversions" bid strategy type, then you can optionally include the [Bid Strategy MaxCpc](#bidstrategymaxcpc) field.

If you use the "PercentCpc" bid strategy type, then you can optionally include the [Bid Strategy PercentCpc](#bidstrategypercentcpc) field.

If you use the "TargetCpa" bid strategy type, then you must include the [Bid Strategy TargetCpa](#bidstrategytargetcpa) field.

If you use the "TargetImpressionShare" bid strategy type, then you must include the [Bid Strategy TargetAdPosition](#bidstrategytargetadposition) and [Bid Strategy TargetImpressionShare](#bidstrategytargetimpressionshare) fields. You can optionally include the [Bid Strategy MaxCpc](#bidstrategymaxcpc) field.

If you use the "TargetRoas" bid strategy type, then you must include the [Bid Strategy TargetRoas](#bidstrategytargetroas) field. You can optionally include the [Bid Strategy MaxCpc](#bidstrategymaxcpc) field.

> [!IMPORTANT] 
> For some bid strategy types your bid and ad rotation settings are ignored and conversion tracking (via [Universal Event Tracking](../guides/universal-event-tracking.md) tag and a conversion goal) is required. For more information including supported locations, see [Let Microsoft Advertising manage your bids with bid strategies](https://help.ads.microsoft.com/#apex/3/en/56786/1). 

**Add:** Optional. The default value for Search and DynamicSearchAds campaigns is EnhancedCpc. The default bid strategy type for most Shopping campaigns is EnhancedCpc; however, the only supported bid strategy type for [smart shopping campaigns](../guides/smart-shopping-campaigns.md) is MaxConversionValue. The only supported value for Audience campaigns is ManualCpc. The default value for Performance Max campaigns is MaxConversions.
**Update:** Optional. If no value is set for the update, this setting is not changed. If you update the bid strategy type, then any existing values in the [Bid Strategy MaxCpc](#bidstrategymaxcpc), [Bid Strategy TargetCpa](#bidstrategytargetcpa), [Bid Strategy TargetAdPosition](#bidstrategytargetadposition), [Bid Strategy TargetImpressionShare](#bidstrategytargetimpressionshare), and [Bid Strategy TargetRoas](#bidstrategytargetroas) fields will be deleted.       
**Delete:** Read-only  

## <a name="budget"></a>Budget
The campaign's budget amount.

> [!WARNING]
> Your budget is a target; your actual spend might be higher or lower. Variations are caused by a number of factors, such as different traffic volumes in different days of the week, or automatic detection and refunding of fraud clicks that can give money back to a campaign within a few hours of the click. Microsoft Advertising anticipates and automatically compensates for the fluctuations, and usually keeps overspend to less than 100% above your daily limit.
> 
> Also note that Microsoft Advertising does not require your campaign budget to be higher than the ad group and keyword bids. In other words ad group and keyword bids are validated independently of the campaign budget. 

In the context of shared budgets, the budget amount is a read-only property that is always returned regardless of whether or not the campaign uses a shared budget. When a campaign is associated to a shared budget the amount returned is that of the shared budget. To determine whether the campaign uses a shared budget, check the value of the [Budget Id](#budgetid) field. 

With experiment campaigns you cannot update the [Budget](#budget), [Budget Type](#budgettype), or [Status](#status). The budget, and status of an experiment campaign are always inherited from the base campaign settings. 

**Add:** Required if the [Budget Id](#budgetid) is not set. Read-only if the campaign uses a shared budget.  
**Update:** Optional if the [BudgetId](#budgetid) is not set. If no value is set for the update, this setting is not changed. Not allowed if the campaign uses a shared budget. If you try to update the budget amount of a campaign that has a shared budget, the service will return the *CampaignServiceCannotUpdateSharedBudget* error code.  
**Delete:** Read-only   

## <a name="budgetid"></a>Budget Id
The system-generated identifier of the [Budget](budget.md) that this campaign shares with other campaigns in the account.

If the field is empty, then the campaign is not using a shared budget. If the field is not empty and the value is greater than zero, then the campaign is using a shared budget. If the campaign is using a shared budget, and you prefer that it use its own budget amount, set this field to '0' (zero) and set the [Budget](#budget) field to a valid budget amount.

> [!NOTE]
> This value corresponds to the *Id* field of the [Budget](budget.md) record. 

> [!NOTE]
> Shared budgets are not supported with [smart shopping campaigns](../guides/smart-shopping-campaigns.md). With [smart shopping campaigns](../guides/smart-shopping-campaigns.md), you must set the daily [Budget](#budget) amount.  
	
**Add:** Optional. You can either specify an existing budget identifier, or specify a negative identifier that is equal to the [Id](budget.md#id) field of a [Budget](budget.md) record. This is recommended if you are applying a new shared budget to a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="budgetname"></a>Budget Name
The name of the shared budget.

This value corresponds to the *Budget Name* field of the [Budget](budget.md) record. You can only set this value using the [Budget](budget.md) record.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="budgettype"></a>Budget Type
The budget type determines how the budget is spent. 

The possible values are DailyBudgetAccelerated and DailyBudgetStandard. The DailyBudgetAccelerated budget type is only available for Audience campaigns that use unshared campaign-level budgets. 

In the context of shared budgets, the budget type is a read-only property that is always returned regardless of whether or not the campaign uses a shared budget. To determine whether the campaign uses a shared budget, check the value of the [Budget Id](#budgetid) field. 

With experiment campaigns you cannot update the [Budget](#budget), [Budget Type](#budgettype), or [Status](#status). The budget, and status of an experiment campaign are always inherited from the base campaign settings. 

**Add:** Required if the [Budget Id](#budgetid) is not set. Read-only if the campaign uses a shared budget.  
**Update:** Optional if the [BudgetId](#budgetid) is not set. If no value is set for the update, this setting is not changed. Not allowed if the campaign uses a shared budget. If you try to update the budget type of a campaign that has a shared budget, the service will return the *CampaignServiceCannotUpdateSharedBudget* error code.  
**Delete:** Read-only   

## <a name="campaign"></a>Campaign
The name of the campaign.

**Add:** Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For update and delete, you must specify either the [Id](#id) or [Campaign](#campaign) field.

## <a name="campaigntype"></a>Campaign Type
The type of the campaign.

The campaign type determines whether the campaign is a Microsoft Shopping campaign, Dynamic Search Ads campaign, Lodging campaign, Search campaign, or Performance Max campaign. Possible values include *Audience*, *DynamicSearchAds*, *Hotel*, *Shopping*, *Search*, and *PerformanceMax*. 

> [!NOTE]
> You can no longer add, update, or retrieve campaigns that only support dynamic search ads. The campaign type of your existing campaigns has been updated from "DynamicSearchAds" to "Search". The ad groups are now considered "dynamic" ad groups, but there are no structural changes i.e., they contain the same auto targets and dynamic search ads as before.  

**Add:** Optional. If not specified, then default value of *Search* is used. If the campaign type is *Shopping* then you must also include the [Country Code](#countrycode), [Priority](#priority), and [Store Id](#storeid) fields. If the campaign type is *DynamicSearchAds* then you must also include the [Domain Language](#domainlanguage) and [Website](#website) fields.  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="countrycode"></a>Country Code
The country code for the Microsoft Merchant Center store.

The Microsoft Merchant Center store catalog will be filtered to only include products for the specified country or region. 

To get the list of supported country codes use the [GetBSCCountries](../campaign-management-service/getbsccountries.md) operation. For example, supported country codes include "AU" (Australia), "AT" (Austria), "BE" (Belgium), "CA" (Canada), "CH" (Switzerland), "DE" (Germany), "ES" (Spain), "FR" (France), "GB" (United Kingdom), "IN" (India), "IT" (Italy), "NL" (Netherlands), "SE" (Sweden), and "US" (United States).

**Add:** Required if the [Campaign Type](#campaigntype) field is set to *Shopping*, or if the [Campaign Type](#campaigntype) field is set to *PerformanceMax* and a store is associated to the campaign. You cannot include this column for other campaign types.  
**Update:** Read-only    
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

## <a name="destinationchannel"></a>Destination Channel
Reserved for future use.

## <a name="domainlanguage"></a>Domain Language
The [language](../guides/ad-languages.md#adlanguage) of the website pages that you want to target for dynamic search ads.

Your website language determines where your ads are eligible to appear. For example, a German-language ad can appear in Germany, Austria, and Switzerland, but not in Spain. If your website contains pages in multiple languages and you want to advertise all of these pages, you should create a separate campaign for each language. 

The supported domain languages are Dutch, English, French, German, Italian, Spanish, and Swedish. 

Note, if you set the campaign [Language](#language) or ad group [Language](ad-group.md#language), they will be ignored.  

> [!NOTE]
> Experiments are not supported for [mixed campaigns](../guides/mixed-campaigns.md) with dynamic search ads settings. Experiment campaigns and base campaigns of experiments cannot include dynamic search ads settings (comprised of the [Domain Language](#domainlanguage), [Dynamic Description Enabled](#dynamicdescriptionenabled), [Page Feed Ids](#pagefeedids), [Source](#source), and [Website](#website) fields). If you intend to use this campaign for experiments, do not include dynamic search ads settings. If an existing experiment is already based on this campaign, you cannot update the campaign to include dynamic search ads settings.  

**Add:** Required if the [Campaign Type](#campaigntype) field is set to *DynamicSearchAds*. Optional if the account is in the [mixed campaigns](../guides/mixed-campaigns.md) feature pilot, if the [Campaign Type](#campaigntype) field is set to *Search*, and if the [Experiment Id](#experimentid) field is not set. You cannot include this column for other campaign types.  
**Update:** Read-only. You cannot update the domain language.      
**Delete:** Read-only

## <a name="disclaimeradsenabled"></a>Disclaimer Ads Enabled
This is a disclaimer campaign when set to true. Disclaimer campaigns can only contain expanded text ads (EXTA) or responsive search ads (RSA).

*Note*: This will always be a disclaimer campaign once this is set to true. You can only set *DisclaimerAdsEnabled* during ad creation.

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *false* will be set and disclaimer ads will not be enabled for this campaign.  
**Update:** Read-only. You cannot update *DisclaimerAdsEnabled* after campaign creation.      
**Delete:** Read-only

## <a name="dynamicdescriptionenabled"></a>Dynamic Description Enabled
> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon!

Determines whether to automatically generate dynamic search ad text in addition to the ad text you provide. During ad delivery, we will use artificial intelligence to choose the best ad text available from these options.   

Set this element to *true* if you want to enable dynamic search ad text, and otherwise set it to *false*. 

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *false* will be set and dynamic search ad text will not be enabled.
**Update:** Optional. If no value is set for the update, this setting is not changed.
**Delete:** Read-only 

## <a name="experimentid"></a>Experiment Id
The system-generated identifier of the [Experiment](experiment.md).

This field is only set for experiment campaigns i.e., campaigns that have been created for A/B testing based on another Search campaign. Base campaigns will not contain an experiment ID. Likewise, after an experiment has been [Graduated](experiment.md#status) to an independent campaign, this field will be empty, even though the campaign was previously an experiment campaign. 

With experiment campaigns you cannot update the [Budget](#budget), [Budget Type](#budgettype), or [Status](#status). The budget, and status of an experiment campaign are always inherited from the base campaign settings. If you want to change an experiment's budget, you will need to change the base campaign's budget. The change in value will then be split based on your experiment [TrafficSplitPercent](experiment.md#trafficsplitpercent) setting.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="feedlabel"></a>Feed Label
Lets you advertise all products with the same feed label in a Shopping or Performance Max campaign.<br/><ul><li>There can only be one feed label per campaign.</li> <li>*FeedLabel* and *SalesCountryCode* are mutually exclusive You can set only one of these properties.</li><li>Each feed label can have a maximum of 20 characters.</li><li>You can't use *FeedLabel* with Shopping CoOp campaigns.</ul>

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the campaign.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the campaign can then be referenced in the *Parent Id* field of dependent record types such as ad groups or criterion. This is recommended if you are adding new campaigns and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For update and delete, you must specify either the [Id](#id) or [Campaign](#campaign) field.

## <a name="ismultichannelcampaign"></a>Is Multi Channel Campaign
Reserved for future use.

## <a name="keywordrelevance"></a>Keyword Relevance
A numeric score that indicates how likely your ads will be clicked and how well your keyword competes against other keywords targeting the same traffic. This score predicts whether your keyword is likely to lead to a click on your ads, taking into account how well your keyword has performed in the past relative to your ad's position.

> [!NOTE]
> Keyword Relevance is equivalent to the **Expected Click-Through Rate** label used in the Microsoft Advertising web application.

A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.

If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score.

Data for this column is typically updated 14-18 hours after the UTC day ends.

**Add:** Read-only    
**Update:** Read-only  
**Delete:** Read-only  

## <a name="landingpagerelevance"></a>Landing Page Relevance
A numeric score that indicates how relevant your ad and landing page are to the customer's search query or other input.

> [!NOTE]
> Landing Page Relevance is equivalent to the **Ad Relevance** label used in the Microsoft Advertising web application.

A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.

If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score.

Data for this column is typically updated 14-18 hours after the UTC day ends.

**Add:** Read-only    
**Update:** Read-only  
**Delete:** Read-only  

## <a name="landingpageuserexperience"></a>Landing Page User Experience
A numeric score that indicates whether your landing page is likely to provide a good experience to customers who click your ad and land on your website.

> [!NOTE]
> Landing Page User Experience is equivalent to the **Landing Page Experience** label used in the Microsoft Advertising web application.

A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.

If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score.

Data for this column is typically updated 14-18 hours after the UTC day ends.

**Add:** Read-only    
**Update:** Read-only  
**Delete:** Read-only  

## <a name="language"></a>Language
Your [ad language](../guides/ad-languages.md#adlanguage) setting determines the language you will use when you write your ads and should be the language of your customers.  

> [!IMPORTANT]
> If languages are set at both the ad group and campaign level, the ad group level language will override the campaign level language. 

You can specify multiple languages individually in the list, or only include one language string in this field set to "All" if you want to target all languages.

The supported language strings for Search and Shopping campaigns are: All, Bulgarian, Croatian, Czech, Danish, Dutch, English, Estonian, Finnish, French, German, Greek, Hungarian, Italian, Latvian, Lithuanian, Maltese, Norwegian, Polish, Portuguese, Romanian, Slovak, Slovenian, Spanish, Swedish, and TraditionalChinese. Each language in this bulk field is delimited by a semicolon (";"), for example *English;French;German*. 

> [!NOTE]
> The following languages are not yet available for everyone: Bulgarian, Croatian, Czech, Estonian, Greek, Hungarian, Latvian, Lithuanian, Maltese, Polish, Romanian, Slovak, Slovenian.

For Audience campaigns you must include all languages i.e., set this field to "All".

For Dynamic Search Ads campaigns, the campaign and ad group level language settings are ignored in favor of the website [domain language](#domainlanguage). You should set campaign languages to "All" and leave the ad group level [language](ad-group.md#language) empty.

**Add:** Required for Audience campaigns, and otherwise this field is optional. If there is no campaign language set, then the language of each ad group within the campaign will be required.   
**Update:** Optional. If no value is set for the update, this setting is not changed. Once campaign languages are set, you cannot delete all of them. The list of languages that you specify during update replaces the previous settings i.e. does not append to the existing set of languages.  
**Delete:** Read-only  

## <a name="localinventoryadsenabled"></a>LocalInventoryAdsEnabled
Determines whether local inventory ads are enabled for the Microsoft Merchant Center store.

Not everyone has this feature yet. If you don't, don't worry. It's coming soon.

Set this property to *TRUE* if you want to enable local inventory ads, and otherwise set it to *FALSE*.

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *FALSE* will be set and local inventory ads will not be enabled.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="pagefeedids"></a>Page Feed Ids
The page feed identifiers for dynamic search ads. 

Each page feed identifier is delimited in the Bulk file by a semicolon (";"). 

The [Source](#source) determines whether or not Microsoft Advertising will use the associated page feeds. 

> [!TIP]
> See the [Page Feeds](../guides/page-feeds.md) technical guide for an implementation overview. 

> [!NOTE]
> Experiments are not supported for [mixed campaigns](../guides/mixed-campaigns.md) with dynamic search ads settings. Experiment campaigns and base campaigns of experiments cannot include dynamic search ads settings (comprised of the [Domain Language](#domainlanguage), [Dynamic Description Enabled](#dynamicdescriptionenabled), [Page Feed Ids](#pagefeedids), [Source](#source), and [Website](#website) fields). If you intend to use this campaign for experiments, do not include dynamic search ads settings. If an existing experiment is already based on this campaign, you cannot update the campaign to include dynamic search ads settings.  

**Add:** Optional if the [Campaign Type](#campaigntype) field is set to *DynamicSearchAds*. Optional if the account is in the [mixed campaigns](../guides/mixed-campaigns.md) feature pilot, if the [Campaign Type](#campaigntype) field is set to *Search*, and if the [Experiment Id](#experimentid) field is not set. You cannot include this column for other campaign types.  
**Update:** Optional if the [Campaign Type](#campaigntype) field is set to *DynamicSearchAds*. Optional if the account is in the [mixed campaigns](../guides/mixed-campaigns.md) feature pilot, if the [Campaign Type](#campaigntype) field is set to *Search*, and if the [Experiment Id](#experimentid) field is not set. You cannot include this column for other campaign types. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.      
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account that contains the campaign.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  
  
## <a name="priority"></a>Priority
Helps determine which Microsoft Shopping campaign serves ads, in the event that two or more campaigns use the product catalog feed from the same Microsoft Merchant Center store.

A higher priority value denotes a higher priority. The supported values for most shopping campaigns are 0, 1, and 2. For [smart shopping campaigns](../guides/smart-shopping-campaigns.md) (campaign [Sub Type](#subtype) set to *ShoppingSmartAds*), you must set the priority to 3. For [Performance Max campaigns](../guides/performance-max.md), you must set the priority to 4.

> [!NOTE]
> If you create a Microsoft Shopping campaign in the Microsoft Advertising web application, the default priority selected is "Low" which is the equivalent of '0'.

**Add:** Required if the [Campaign Type](#campaigntype) field is set to *Shopping*, or if the [Campaign Type](#campaigntype) field is set to *PerformanceMax* and a store is associated to the campaign. You cannot include this column for other campaign types.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="qualityscore"></a>Quality Score
The numeric score shows you how competitive your ads are in the marketplace by measuring how relevant your keywords and landing pages are to customers' search terms. The quality score is calculated by Microsoft Advertising using the *Keyword Relevance*, *Landing Page Relevance*, and *Landing Page User Experience* sub scores. If available, the quality score can range from a low of 1 to a high of 10.

Quality score is based on the last rolling 30 days for the owned and operated search traffic. A quality score can be assigned without any impressions, in the case where a keyword bid did not win any auctions. Traffic for syndicated networks do not affect quality score. The value in the file will be "" (empty string) if the score was not computed. This can occur if there have been no impressions for the keyword for 30 days or more.<br/><br/>Quality score is typically updated 14-18 hours after the UTC day ends. Keywords in all time zones will be assigned a quality score for the corresponding UTC day.

If you run the report multiple times in a day, the quality score values could change from report to report based on when you run the report relative to when the scores are calculated.

If you specify a time period that spans multiple days, the quality score is the current and most recently calculated score and will be reported as the same for each day in the time period. Use the historic quality score to find out how quality score may have changed over time. Historical quality score is a daily snapshot of the rolling quality score. For more information on historic quality score, see the *HistoricalQualityScore* column in [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

**Add:** Read-only    
**Update:** Read-only  
**Delete:** Read-only  

## <a name="source"></a>Source
Determines whether to use Bing's index, advertiser supplied URLs, or both for dynamic search ads.

Possible values are in the table below.

|Value|Description|
|-----------|---------------|
|AdvertiserSuppliedUrls|Use URLs from my page feed only. Only URLs specified in the feed file will be served from this campaign. Please note that if you choose this option and [Page Feeds Ids](#pagefeedids) are not set, then the campaign will not serve dynamic search ads. We recommend using this option for highly specific campaigns with tailored ad copy.|
|All|Use URLs from both Bing's index of my website and my page feed. Pages from both sources will be used but URLs within the feed file will be given priority.|
|SystemIndex|Use Bing's index of my website. This is the default behavior of dynamic search ad campaigns on Bing.|

> [!NOTE]
> Experiments are not supported for [mixed campaigns](../guides/mixed-campaigns.md) with dynamic search ads settings. Experiment campaigns and base campaigns of experiments cannot include dynamic search ads settings (comprised of the [Domain Language](#domainlanguage), [Dynamic Description Enabled](#dynamicdescriptionenabled), [Page Feed Ids](#pagefeedids), [Source](#source), and [Website](#website) fields). If you intend to use this campaign for experiments, do not include dynamic search ads settings. If an existing experiment is already based on this campaign, you cannot update the campaign to include dynamic search ads settings.  

**Add:** Optional if the [Campaign Type](#campaigntype) field is set to *DynamicSearchAds*. Optional if the account is in the [mixed campaigns](../guides/mixed-campaigns.md) feature pilot, if the [Campaign Type](#campaigntype) field is set to *Search*, and if the [Experiment Id](#experimentid) field is not set. You cannot include this column for other campaign types. By default only Bing's index is used i.e., an empty value is effectively the same as specifying *SystemIndex*.  
**Update:** Optional if the [Campaign Type](#campaigntype) field is set to *DynamicSearchAds*. Optional if the account is in the [mixed campaigns](../guides/mixed-campaigns.md) feature pilot, if the [Campaign Type](#campaigntype) field is set to *Search*, and if the [Experiment Id](#experimentid) field is not set. You cannot include this column for other campaign types. If no value is set for the update, this setting is not changed.      
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the campaign.

Possible values for download and upload are Active, Paused, and Deleted. In addition, the values BudgetAndManualPaused, BudgetPaused, and Suspended are read-only via bulk download. 

With experiment campaigns you cannot update the [Budget](#budget), [Budget Type](#budgettype), or [Status](#status). The budget, and status of an experiment campaign are always inherited from the base campaign settings. 

|Value|Description|
|-----------|---------------|
|Active|The campaign is active, which indicates that the campaign's ads can be served.|
|BudgetAndManualPaused|The campaign is paused, which indicates that the campaign's ads will not serve. This status results when a user sets the campaign status to paused after the service pauses the campaign because the budget is depleted.|
|BudgetPaused|The campaign is paused, which indicates that the campaign's ads will not serve. The service sets this status when the budget is depleted. The service will set the status back to Active when the budget is restored.|
|Deleted|The campaign is deleted. This status is for internal use only. Because all Get operations do not return deleted objects, you will not see an object with this status.|
|Paused|The campaign is paused, which indicates that the campaign's ads will not serve.|
|Suspended|Your campaign has been suspended because of suspicious activity, and no ads are eligible for delivery.<br/>Please contact [Microsoft Advertising Support](https://go.microsoft.com/fwlink/?LinkId=269631).|

**Add:** Optional. The default value is Active.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to Deleted.

## <a name="storeid"></a>Store Id
The unique identifier for the Microsoft Merchant Center store that contains a product catalog feed that you want to use for the campaign.

Once you choose a store for a campaign, you can't change it. If at some point you want to use a different store, you would need to create a new shopping campaign with a new shopping setting. 

With [Shopping Campaigns for Brands](../guides/product-ads.md#setup-cooperative) a single campaign can target all your retailer partners, and there's no need to create individual campaigns for each retailer. We recommend that you set this to the ID of your manager account's global store (store [SubType](../campaign-management-service/bmcstore.md#subtype) set to [GlobalStore](../campaign-management-service/bmcstoresubtype.md#globalstore)). By initially targeting all linked stores via the campaign shopping setting, you can then upload up to 10 [Campaign Negative Store Criterion](campaign-negative-store-criterion.md) records to exclude specific retailers as needed. 

To get your store identifiers, call the [GetBMCStoresByCustomerId](../campaign-management-service/getbmcstoresbycustomerid.md) operation.

**Add:** Required if the [Campaign Type](#campaigntype) field is set to *Shopping*, or if the [Campaign Type](#campaigntype) field is set to *PerformanceMax* and a store is associated to the campaign. You cannot include this column for other campaign types.  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="subtype"></a>Sub Type
The campaign sub type.

If the sub type is not set, the campaign is created according to the campaign type.

If the sub type is set to *AudienceVideoAds* and the campaign type is *Audience*, the campaign is a video audience campaign.

If the sub type is set to *ShoppingSmartAds*, the campaign is a Microsoft Smart Shopping campaign.  

If the sub type is set to *ShoppingSponsoredProductAd*, the campaign is a Microsoft [shopping campaigns for brands](../guides/product-ads.md#setup-cooperative).  

**Add:** Optional and not applicable for most campaign types. For Microsoft [smart shopping campaigns](../guides/smart-shopping-campaigns.md) you must set the sub type to *ShoppingSmartAds*. For Microsoft [shopping campaigns for brands](../guides/product-ads.md#setup-cooperative) you must set the sub type to *ShoppingSponsoredProductAd*.  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="targetsetting"></a>Target Setting
The target settings that are applicable for criterion types e.g., audiences that are associated with this campaign. 

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry. It's coming soon.

Include the criterion type group name in this field if you want the "target and bid" option. In this case we will only deliver ads to people who meet at least one of your criteria, while letting you make bid adjustments for specific criteria. 

Exclude the criterion type group name from this field if you want the "bid only" option. In this case we will deliver ads to everyone who meets your other targeting criteria, while letting you make bid adjustments for specific criteria.

Each criterion type group name is delimited in the Bulk file by a semicolon (";"). When you download the Bulk file, only the types that are setup to use the "target and bid" option will be included in this field.

The only criterion type value currently supported for the campaign level target setting is "Audience". The "target and bid" option for the Audience criterion type is supported with all campaign types. New values may be supported in the future so you should not depend on a fixed set of values. Having said that, any possible values for this field should also be defined in the [CriterionTypeGroup](../campaign-management-service/criteriontypegroup.md) value set of the Campaign Management API. 

> [!NOTE]
> Do not confuse the Audience campaign type with the Audience criterion type group name. 

|Criterion Type Group|Supported Campaigns|Description|
|-----------------|---------------|---------------|
|Audience|All|Include the Audience criterion type group name in this field if you want to show ads only to people included in the audience, with the option to change the bid amount. Ads in this campaign will only show to people included in the audience.<br/><br/>Exclude the Audience criterion type group name from this field if you want to show ads to people searching for your ad, with the option to change the bid amount for people included in the audience. Ads in this campaign can show to everyone but the bid adjustment will apply to people included in the audience.|

An entity such as a remarketing list can be associated with multiple campaigns, and each campaign's target settings (e.g., the Audience criterion group name for remarketing lists) are applied independently for delivery. For example the same remarketing list can be associated with Campaign A and Campaign B. The Target Setting field for each campaign are set independently, and therefore the same remarketing list might be associated via the "target and bid" option for Campaign A while associated via the "bid only" option for Campaign B. 

**Add:** Optional. If the criterion type group name is excluded from this field, then the default setting is effectively "bid only".  
**Update:** Optional. If no value is set for the update, this setting is not changed. To remove all criterion type group names, set this field to *delete_value*. The *delete_value* keyword removes the previous setting. To remove a subset of criterion type group names, specify the criterion type group names that you want to keep and omit any that you do not want to keep. The new set of criterion type group names will replace any previous criterion groups that were set for the campaign.    
**Delete:** Read-only  

## <a name="trackingtemplate"></a>Tracking Template
The tracking template to use as a default for all URLs in your campaign.

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="urlexpansionoptout"></a>URL Expansion Opt out
If *false*, then the entire domain will be targeted, and ad assets will be dynamically generated to match landing page content. If *true* (opted-out), then only the final URLs and assets in the asset groups and feed will be targeted. This field only applies to Performance Max campaigns.

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *false* is set.
**Update:** Optional. If no value is set for the update, this setting is not changed.
**Delete:** Read-only  

## <a name="website"></a>Website

The domain name of the website that you want to target for dynamic search ads.
<!-- The domain or subdomain name of the website that you want to target for dynamic search ads.

> [!NOTE]
> Not everyone has the subdoamin feature yet. If you don't, don't worry. It's coming soon.   -->

The length of the string is limited to 2,048 characters. If the domain name includes *www* it will be trimmed and not used.

> [!NOTE]
> Experiments are not supported for [mixed campaigns](../guides/mixed-campaigns.md) with dynamic search ads settings. Experiment campaigns and base campaigns of experiments cannot include dynamic search ads settings (comprised of the [Domain Language](#domainlanguage), [Dynamic Description Enabled](#dynamicdescriptionenabled), [Page Feed Ids](#pagefeedids), [Source](#source), and [Website](#website) fields). If you intend to use this campaign for experiments, do not include dynamic search ads settings. If an existing experiment is already based on this campaign, you cannot update the campaign to include dynamic search ads settings.  

**Add:** Required if the [Campaign Type](#campaigntype) field is set to *DynamicSearchAds*. Optional if the account is in the [mixed campaigns](../guides/mixed-campaigns.md) feature pilot, if the [Campaign Type](#campaigntype) field is set to *Search*, and if the [Experiment Id](#experimentid) field is not set. You cannot include this column for other campaign types.  
**Update:** Read-only. You cannot update the domain name.      
**Delete:** Read-only   
