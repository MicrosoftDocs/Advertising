---
title: "Bing Ads API Release Notes"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Get information about changes to Bing Ads API Version 13 by month. 
---
# Bing Ads API Release Notes
See below for information about changes to Bing Ads API Version 13 by month.  

## <a name="breaking-changes"></a>Breaking changes (recent and upcoming)

> [!IMPORTANT]
> The following upcoming changes may require that you take action to avoid disruption of service or loss of functionality.  

- [Multi-factor authentication will be required](#breaking-mfa-required)  
- [Page visitors rule normal form expansion](#breaking-page-visitors-normal-form)  
- [Required conversion goal categories](#breaking-conversion-goal-categories)  
- [Reduced look back for bulk download](#breaking-bulk-download-sync-time)  

### <a name="breaking-mfa-required"></a>Multi-factor authentication will be required

[!INCLUDE[request-header](./includes/mfa-required.md)]

### <a name="breaking-page-visitors-normal-form"></a>Page visitors rule normal form expansion

If you already use **page visitors rules** for remarketing lists, please read this section about required changes.  

Remarketing rules are conditions used to determine who to add to your remarketing list. You can create rules for custom events, page visitors, page visitors who did not visit another page, and page visitors who visited another page.  

For the page visitors rule, previously Microsoft Advertising only supported disjunctive normal form (DNF). First, in each rule item group the rule item conditions for the same page are joined using the logical AND operator. Then, each result from the list of rule item groups are joined using the logical OR operator. In other words, the user will be added to your remarketing list if all of the specified rule item conditions are met within any of the rule item groups.

- Rule 1 OR Rule 2
- (Rule 1 AND Rule 2) OR Rule 3
- (Rule 1 AND Rule 2) OR (Rule 3 AND Rule 4)

We are introducing support for conjunctive normal form (CNF). First, in each rule item group the rule item conditions for the same page are joined using the logical OR operator. Then, each result from the list of rule item groups are joined using the logical AND operator. In other words, the user will be added to your remarketing list if any of the specified rule item conditions within all of the rule item groups are met.

- Rule 1 AND Rule 2
- (Rule 1 OR Rule 2) AND Rule 3
- (Rule 1 OR Rule 2) AND (Rule 3 OR Rule 4)

The addition is applicable only for the PageVisitorsRule and does not include CustomEventsRule, PageVisitorsWhoDidNotVisitAnotherPageRule, or PageVisitorsWhoVisitedAnotherPageRule.  

> [!IMPORTANT]
> The default normal form for a new page visitors rule remains DNF. However, you must ensure that your application can appropriately read and distinguish between CNF and DNF. Your application should no longer assume that the rule is disjunctive.  

For more information about how to get and set the new normal form property, see the reference documentation.

- Campaign Management API: The [NormalForm](../campaign-management-service/pagevisitorsrule.md#normalform) element of PageVisitorsRule can be set to Conjunctive or Disjunctive.
- Bulk API: Continue using the [Remarketing Rule](../bulk-service/remarketing-list.md#remarketingrule) column in the bulk file. For upload, you can choose to format the string as CNF or DNF. For download, your application must read the string in the same column and distinguish between CNF and DNF.  

### <a name="breaking-conversion-goal-categories"></a>Required conversion goal categories

If you already use conversion goals, please read this section about required changes.  

You can categorize your conversion goals however makes sense for your business. Goal categories don't affect performance - they are here to help you segment your goals and their performance metrics.

Previously Bing Ads API did not require conversion goal categories. Depending on the goal type the default category is set to Download, None, Other, or Purchase.  

Now (as of June 2021) when you add or update the custom event, offline conversion, or URL goals you must set a goal category or the Campaign Management service will return an error. There are no changes to the default category of other goal types as shown in the table.

|Goal type|Default before|Default after|
|-----------|---------------|---------------|
|EventGoal<br/>OfflineConversionGoal<br/>UrlGoal|None|No default; Service returns an error|
|DurationGoal<br/>PagesViewedPerVisitGoal|Other|Other|
|InStoreTransactionGoal|Purchase|Purchase|
|AppInstallGoal|Download|Download|

For more information, see our API documentation about [conversion goal categories](../campaign-management-service/conversiongoalcategory.md).  

### <a name="breaking-bulk-download-sync-time"></a>Reduced look back for bulk download

When [downloading campaigns](bulk-download-upload.md) with the Bulk API you can request only to get settings that have been modified (added, updated, deleted) since a specific date and time.

Previously if you set a date and time that is more than 90 days prior, an error will be returned.

The maximum look back period decreased from 90 days to 30 days on September 1st, 2021. Now, if you set a date and time that is more than 30 days prior, an error will be returned.

## <a name="december2022"></a>December 2022

See below for Bing Ads API updates during this calendar month.  
 
- [New API Interfaces](#newapiinterfaces-december2022)  
- [Bulk Services](#bulkservices-december2022)  
- [Bing Ads API SDK Updates](#sdk-december2022)  

### <a name="newapiinterfaces-december2022"></a>New API Interfaces
**AdInsight API** - [GetReccomendations](../ad-insight-service/getrecommendations.md) and [GetTextAssetSuggestionsByFinalUrls](../ad-insight-service/gettextassetsuggestionsbyfinalurls.md).
**CustomerManagement API** - [SignupCustomer](../customer-management-service/signupcustomer.md).
**Reporting API** - [Value sets](../reporting-service/reporting-value-sets.md) for HotelAd and Video reporting.
**CampaignManagement API** - [OnlineConversionAdjustment](../campaign-management-service/onlineconversionadjustment.md), [HotelAd](../campaign-management-service/hotelad.md), and new bidding schemes for [PercentCpc](../campaign-management-service/percentcpcbiddingscheme.md) and [Commission](../campaign-management-service/commissionbiddingscheme.md).

### <a name="bulkservices-december2022"></a>Bulk Services
* Bulk support for OnlineConversionAdjustment  

* Bulk support for Hotel Ad entities, i.e. HotelAdvanceBookingWindowCriterion, HotelCheckInDayCriterion, HotelCheckInDateCriterion, HotelDateSelectionTypeCriterion, HotelLengthOfStayCriterion and HotelListingGroup.  

* Bulk Support for UseOptimizedTargeting, HotelAdGroupType, CommissionRate and PercentCpcBid in BulkAdGroup.  

### <a name="sdk-december2022"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.15), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.15), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v13.0.15), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.15) SDK version 13.0.15. 

## <a name="november2021"></a>November 2021

See below for Bing Ads API updates during this calendar month.  

- [Bing Ads API SDK Updates](#sdk-november2021)  

### <a name="sdk-november2021"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.12), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.12), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.12), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.12) SDK version 13.0.12. 

## <a name="august2021"></a>August 2021

See below for Bing Ads API updates during this calendar month.  

- [Google Ads import entity map](#entity-mappings-august2021)  
- [Bing Ads API SDK Updates](#sdk-august2021)  

### <a name="entity-mappings-august2021"></a>Google Ads import entity map

Ad group, ad, and keyword ID mappings from Google Ads to Microsoft Advertising are now supported in the Campaign Management [GetImportEntityIdsMapping](../campaign-management-service/getimportentityidsmapping.md) service operation. Previously only the campaign ID mappings were available.  

### <a name="sdk-august2021"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.11), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.11), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.11), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.11) SDK version 13.0.11.  

## <a name="july2021"></a>July 2021

See below for Bing Ads API updates during this calendar month.  

- [Multimedia ads](#multimedia-ads-july2021)  
- [Unlimited and open-ended insertion order](#unlimited-io-july2021)  

### <a name="multimedia-ads-july2021"></a>Multimedia ads

Multimedia ads are supported in the Campaign Management [ResponsiveAd](../campaign-management-service/responsivead.md) object.

The [ResponsiveAd](../campaign-management-service/responsivead.md) object is used for [Multimedia ads](https://help.ads.microsoft.com/#apex/ads/en/60107/0) in the search network and [Audience ads](https://help.ads.microsoft.com/#apex/ads/en/56674/0) in the Microsoft Audience Network.

Most supported properties are the same, but there are some of the key differentiators. For more information see responsive ad [remarks](../campaign-management-service/responsivead.md#remarks).

### <a name="unlimited-io-july2021"></a>Unlimited and open-ended insertion order

Unlimited and open-ended insertion orders are supported in the Customer Billing [InsertionOrder](../customer-billing-service/insertionorder.md) object.

For an open-ended insertion order you can set the [EndDate](../customer-billing-service/insertionorder.md#enddate) element nil or empty.

For an unlimited budget insertion order you can set the [SpendCapAmount](../customer-billing-service/insertionorder.md#spendcapamount) element nil or empty.

## <a name="june2021"></a>June 2021

See below for Bing Ads API updates during this calendar month.  

- [Asset performance label for RSA](#assetperformancelabel-june2021)  
- [Dynamic search ads](#dynamic-search-ads-june2021)  
- [Bing Ads API SDK Updates](#sdk-june2021)  

### <a name="assetperformancelabel-june2021"></a>Asset performance label for RSA

The asset performance label is available as a read-only attribute when you get or download the responsive search ad.  

This lets you know how well the headline and description assets you set up for your responsive search ads are performing.

Possible values are described in the table below.  

|Value|Description|
|-----------|---------------|
|Low|This asset's performance is low and we recommend you replace this asset to improve your ad performance.|
|Good|This asset is performing well. We recommend you keep this asset and add more assets to improve your ad performance.|
|Best|This asset's performance is among the best and we recommend that you add more similar assets.|
|Unrated|We don't have any performance rating for this asset. This can be due to the asset being inactive, not having enough information to determine its performance, or if there aren't enough similar assets to compare against it.|
|Learning|The asset's performance is being actively evaluated. Once the evaluation is complete, the asset rating will be Low, Good, Best, or Unrated.|

For more details, see the [Responsive Search Ad](../bulk-service/responsive-search-ad.md) record (Bulk API) and [AssetLink](../campaign-management-service/assetlink.md#assetperformancelabel) (Campaign Management API).

### <a name="dynamic-search-ads-june2021"></a>Dynamic search ads

You can no longer add, update, or retrieve campaigns that only support dynamic search ads. The campaign type of your existing campaigns has been updated from "DynamicSearchAds" to "Search". The ad groups are now considered "dynamic" ad groups, but there are no structural changes i.e., they contain the same auto targets and dynamic search ads as before.  

### <a name="sdk-june2021"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.10), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.10), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.10), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.10) SDK version 13.0.10.  

## <a name="may2021"></a>May 2021

See below for Bing Ads API updates during this calendar month.  

- [Dynamic search ads](#dynamic-search-ads-may2021)  

### <a name="dynamic-search-ads-may2021"></a>Dynamic search ads

You can no longer add new campaigns with the DynamicSearchAds campaign type. The campaign type is being updated from "DynamicSearchAds" to "Search" during May and June. You can still view and edit these campaigns before and after the campaign type update.

## <a name="april2021"></a>April 2021

See below for Bing Ads API updates during this calendar month.  

- [Portfolio bid strategy](#portfolio-bid-strategy-april2021)  
- [Target impression share](#target-impression-share-april2021)  
- [Bing Ads API SDK Updates](#sdk-april2021)  

### <a name="portfolio-bid-strategy-april2021"></a>Portfolio bid strategy

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

A portfolio bid strategy is an automated bidding feature that manages bidding across multiple campaigns that are all working toward the same goal.  

We automatically adjust your bids to balance under- and over-performing campaigns that share the same strategy, whether to maximize conversions, clicks, target impression share, or other performance goals. Portfolio bid strategies could be a great option for advertisers who want to make sure their entire budgets are spent efficiently.

All you have to do is choose a bid strategy type and include campaigns with complementary budgets in the portfolio. Microsoft Advertising will adjust your bids based on the performance of the entire portfolio. If your portfolio includes any campaigns with a shared budget, then you should include all of the campaigns that share the same budget.  

Portfolio bid strategies work best with one goal in mind, using complementary campaign and bid strategy types. You cannot change a portfolio's bid strategy type. If you want a campaign in the portfolio to use a different bid strategy you can move it to another portfolio. Once you choose a campaign type, the portfolio can only include campaigns of that type.  

Portfolio bid strategies are supported in the Campaign Management [BidStrategy](../campaign-management-service/bidstrategy.md) object and Bulk [Bid Strategy](../bulk-service/bid-strategy.md) record.  

### <a name="target-impression-share-april2021"></a>Target impression share

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

Target impression share is an automated bidding strategy that you can use to get the target impression share for the ad position where you want your ads to appear.  

Target impression share is supported via the Campaign Management [BidStrategy](../campaign-management-service/bidstrategy.md), [Campaign](../campaign-management-service/campaign.md), and [TargetImpressionShareBiddingScheme](../campaign-management-service/targetimpressionsharebiddingscheme.md) objects and the Bulk [Bid Strategy](../bulk-service/bid-strategy.md) and [Campaign](../bulk-service/campaign.md) records.  

### <a name="sdk-april2021"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.9), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.9), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.9), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.9) SDK version 13.0.9. 

## <a name="march2021"></a>March 2021

See below for Bing Ads API updates during this calendar month.  

- [Bing Ads API SDK Updates](#sdk-march2021)  

### <a name="sdk-march2021"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.8), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.8), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.8), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.8) SDK version 13.0.8. 

## <a name="december2020"></a>December 2020
See below for Bing Ads API updates during this calendar month. 

- [Bing Ads API SDK Updates](#sdk-december2020)  

### <a name="sdk-december2020"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.7), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.7), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.7), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.7) SDK version 13.0.7. 

## <a name="november2020"></a>November 2020
See below for Bing Ads API updates during this calendar month. 

- [Auction Insight Absolute Top of Page Rate](#auctioninsightkpi-absolutetopofpagerate-november2020)  
- [Flyer Ad Extensions](#flyeradextensions-november2020)  
- [Impression Tracking URLs for Responsive Ads](#responsivead-impressiontrackingurls-november2020)  
- [Prominence Metrics](#prominence-metrics-november2020)  

### <a name="auctioninsightkpi-absolutetopofpagerate-november2020"></a>Auction Insight Absolute Top of Page Rate
Absolute top of page rate is defined as the number of times an ad is shown as the very first ad above the organic search results, divided by the total number of impressions it actually received. Ads at the absolute top of the page tend to receive more clicks.

The [AbsoluteTopOfPageRate](../ad-insight-service/auctioninsightkpi.md#absolutetopofpagerate) element is not returned by default. For more information see the [AuctionInsightKpiAdditionalField](../ad-insight-service/auctioninsightkpiadditionalfield.md#absolutetopofpagerate) value set.

### <a name="responsivead-impressiontrackingurls-november2020"></a>Impression Tracking URLs for Responsive Ads
The URLs for 1x1 impression tracking pixels. Each pixel will report Microsoft Audience Network impressions to your third-party ad reporting tool. You can include up to 2 impression tracking URLs for each responsive ad.

For each Microsoft Audience Network impression, Microsoft will ping the URL to enable impression tracking in your third party ad reporting tool. Advanced-level user tracking such as conversion tracking or tracking based on cookies or IP addresses is not supported.

Impression tracking URLs are supported in the Campaign Management [ResponsiveAd](../campaign-management-service/responsivead.md) object and Bulk [Responsive Ad](../bulk-service/responsive-ad.md) record. 

When you get ads with the Campaign Management service the [ImpressionTrackingUrls](../campaign-management-service/responsivead.md#impressiontrackingurls) element is not returned by default. For more information see the [AdAdditionalField](../campaign-management-service/adadditionalfield.md#impressiontrackingurls) value set. 

### <a name="flyeradextensions-november2020"></a>Flyer Ad Extensions
Flyer Extensions enable advertisers to distribute product or store catalogues (flyers) to potential customers. They can display prominently on broad queries like "weekly deals" or "weekly sales" and thus encourage shoppers to click on your ad instead of the competition’s. By their nature they help to better inform searchers, and as a result, increase user engagement e.g., click through rate.

Flyer extensions are supported in the Campaign Management [FlyerAdExtension](../campaign-management-service/flyeradextension.md) object and Bulk [Flyer Ad Extension](../bulk-service/flyer-ad-extension.md) record. 

> [!NOTE]
> Flyer Extensions are available for customers in the feature pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 802).  

### <a name="prominence-metrics-november2020"></a>Prominence Metrics
With prominence metrics, you can take a more holistic view of where your ads are appearing on search results pages. These clear insights can help you better optimize your bidding strategy. 

The AbsoluteTopImpressionRatePercent and TopImpressionRatePercent columns are added to the following report column value sets.

- [AdDynamicTextPerformanceReportColumn](../reporting-service/addynamictextperformancereportcolumn.md)  
- [AdPerformanceReportColumn](../reporting-service/adperformancereportcolumn.md)  
- [AgeGenderAudienceReportColumn](../reporting-service/agegenderaudiencereportcolumn.md)  
- [AudiencePerformanceReportColumn](../reporting-service/audienceperformancereportcolumn.md)  
- [DestinationUrlPerformanceReportColumn](../reporting-service/destinationurlperformancereportcolumn.md)  
- [DSAAutoTargetPerformanceReportColumn](../reporting-service/dsaautotargetperformancereportcolumn.md)  
- [DSACategoryPerformanceReportColumn](../reporting-service/dsacategoryperformancereportcolumn.md)  
- [DSASearchQueryPerformanceReportColumn](../reporting-service/dsasearchqueryperformancereportcolumn.md)  
- [GeographicPerformanceReportColumn](../reporting-service/geographicperformancereportcolumn.md)  
- [KeywordPerformanceReportColumn](../reporting-service/keywordperformancereportcolumn.md)  
- [ProductDimensionPerformanceReportColumn](../reporting-service/productdimensionperformancereportcolumn.md)  (*AbsoluteTopImpressionRatePercent* only)  
- [ProductPartitionPerformanceReportColumn](../reporting-service/productpartitionperformancereportcolumn.md)  (*AbsoluteTopImpressionRatePercent* only)  
- [ProductPartitionUnitPerformanceReportColumn](../reporting-service/productpartitionunitperformancereportcolumn.md)  (*AbsoluteTopImpressionRatePercent* only)  
- [ProductSearchQueryPerformanceReportColumn](../reporting-service/productsearchqueryperformancereportcolumn.md)  (*AbsoluteTopImpressionRatePercent* only)  
- [ProfessionalDemographicsAudienceReportColumn](../reporting-service/professionaldemographicsaudiencereportcolumn.md)  
- [PublisherUsagePerformanceReportColumn](../reporting-service/publisherusageperformancereportcolumn.md)  
- [SearchQueryPerformanceReportColumn](../reporting-service/searchqueryperformancereportcolumn.md)  
- [UserLocationPerformanceReportColumn](../reporting-service/userlocationperformancereportcolumn.md)  

## <a name="october2020"></a>October 2020
See below for Bing Ads API updates during this calendar month. 

- [Bing Ads API SDK Updates](#sdk-october2020)  

### <a name="sdk-october2020"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.6), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.6), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.6), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.6) SDK version 13.0.6. 

## <a name="august2020"></a>August 2020
See below for Bing Ads API updates during this calendar month. 

- [Report Format Version](#formatversion-reporting-august2020)  
- [Bing Ads API SDK Updates](#sdk-august2020)  

### <a name="formatversion-reporting-august2020"></a>Report Format Version
The [FormatVersion](../reporting-service/reportrequest.md#formatversion) element is added to the [ReportRequest](../reporting-service/reportrequest.md) data object. 

The data format for certain fields can be updated within the current API version without breaking existing client applications. See the [Report Format Version](reports.md#formatversion) technical guide for differences between format version 1.0 and 2.0. 

### <a name="sdk-august2020"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.5), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.5), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.5), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.5) SDK version 13.0.5. 

## <a name="july2020"></a>July 2020
See below for Bing Ads API updates during this calendar month. 

- [Bing Ads API SDK Updates](#sdk-july2020)  

### <a name="sdk-july2020"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.4), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.4), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.4), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.4) SDK version 13.0.4. 

## <a name="june2020"></a>June 2020
See below for Bing Ads API updates during this calendar month. 

- [Customer list](#customerlist-june2020) 

### <a name="customerlist-june2020"></a>Customer list

A customer list is a set of customer contact information that you have compiled to enable customer match. 

> [!NOTE]
> Customer lists are available for customers in the feature pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 579).  

Customer lists are available via the Bulk API, but not yet available via the Campaign Management API. With the Bulk API you can use the following record types for customer list targets or exclusions. 
- [Customer List](../bulk-service/customer-list.md)   
- [Customer List Item](../bulk-service/customer-list-item.md)   
- [Campaign Customer List Association](../bulk-service/campaign-customer-list-association.md)   
- [Campaign Negative Customer List Association](../bulk-service/campaign-negative-customer-list-association.md)   
- [Ad Group Customer List Association](../bulk-service/ad-group-customer-list-association.md)   
- [Ad Group Negative Customer List Association](../bulk-service/ad-group-negative-customer-list-association.md)   

For an overview and more information about audiences, see the [Audience APIs](universal-event-tracking.md#audience) technical guide. 

## <a name="may2020"></a>May 2020
See below for Bing Ads API updates during this calendar month. 

- [Combined list](#combinedlist-may2020) 
- [Parallel tracking](#paralleltracking-may2020) 
- [Bing Ads API SDK Updates](#sdk-may2020)  

### <a name="combinedlist-may2020"></a>Combined list

A combined list is an audience created from a combination of multiple existing audiences. 

> [!NOTE]
> Combined lists are available for customers in the feature pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 618).  

With the Bulk API you can use the following record types for combined list targets or exclusions.  
- [Combined List](../bulk-service/combined-list.md)   
- [Campaign Combined List Association](../bulk-service/campaign-combined-list-association.md)   
- [Campaign Negative Combined List Association](../bulk-service/campaign-negative-combined-list-association.md)   
- [Ad Group Combined List Association](../bulk-service/ad-group-combined-list-association.md)   
- [Ad Group Negative Combined List Association](../bulk-service/ad-group-negative-combined-list-association.md)   

With the Campaign Management API you can use the [CombinedList](../campaign-management-service/combinedlist.md) object.  

For an overview and more information about audiences, see the [Audience APIs](universal-event-tracking.md#audience) technical guide. 

### <a name="paralleltracking-may2020"></a>Parallel tracking

Parallel tracking is required for all accounts created after May 31st, 2020. Until November 2020 you can enable and disable the feature for accounts created prior to June 1st, 2020 i.e., set the [account property](../campaign-management-service/accountproperty.md#adclickparalleltracking) to *true* or *false*. By the end of November 2020 all accounts will be enabled for parallel tracking, and the value can only be set to *true*. 

### <a name="sdk-may2020"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.3), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.3), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.3), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.3) SDK version 13.0.3. 

## <a name="april2020"></a>April 2020
See below for Bing Ads API updates during this calendar month. 

- [Promotion Ad Extensions](#promotionadextension-april2020) 
- [Placement Exclusion List](#placementexclusionlist-april2020) 
- [Impression Share for Microsoft Audience Network](#audiencenetworksov-april2020) 

### <a name="promotionadextension-april2020"></a>Promotion Ad Extensions

Promotion Extensions highlight special sales and offers in your text ads. By making offers stand out, potential customers are more likely to click on your ad, helping to generate more sales for you. 

You can associate a promotion ad extension with the account or with campaigns and ad groups in the account. Each entity (account, campaign, or ad group) can be associated with up to 20 promotion ad extensions.  

> [!NOTE]
> Promotion Extensions are available for customers in the feature pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 720).  

#### <a name="bulk-promotionadextension-april2020"></a>Bulk API for Promotion Ad Extensions

With the Bulk API use the following record types to manage promotion ad extensions.  
- [Promotion Ad Extension](../bulk-service/promotion-ad-extension.md)   
- [Account Promotion Ad Extension](../bulk-service/account-promotion-ad-extension.md)   
- [Campaign Promotion Ad Extension](../bulk-service/campaign-promotion-ad-extension.md)   
- [Ad Group Promotion Ad Extension](../bulk-service/ad-group-promotion-ad-extension.md)   

#### <a name="campaign-promotionadextension-april2020"></a>Campaign Management API for Promotion Ad Extensions

With the Campaign Management API use the [PromotionAdExtension](../campaign-management-service/promotionadextension.md) object e.g., via the [AddAdExtensions](../campaign-management-service/addadextensions.md) service operation.  

### <a name="placementexclusionlist-april2020"></a>Placement Exclusion List

Support for Account level website exclusions is added to the Campaign Management API. Negative sites ([NegativeSite](../campaign-management-service/negativesite.md)) can be added and deleted from a shared website exclusion list ([PlacementExclusionList](../campaign-management-service/placementexclusionlist.md)). The website exclusion list can be shared or associated with multiple ad accounts. 

> [!NOTE] 
> You can only view website exclusion lists in the redesigned Microsoft Advertising UI i.e., via Tools -> Shared Library -> Website exclusion lists. If you don't see it, look for the "Try the new Microsoft Advertising" prompt when you sign in. To use the redesigned Microsoft Advertising you must also be in the UI pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 522).   

You can manage the new website exclusions lists via the shared entity and shared list operations e.g., [AddSharedEntity](../campaign-management-service/addsharedentity.md) and [AddListItemsToSharedList](../campaign-management-service/addlistitemstosharedlist.md). Previously these operations were used exclusively for negative keyword lists, and existing applications should work without any code changes. For more details, see the [Negative Sites](negative-sites.md) technical guide. 

### <a name="audiencenetworksov-april2020"></a>Impression Share for Microsoft Audience Network

The AudienceImpressionLostToBudgetPercent, AudienceImpressionLostToRankPercent, and AudienceImpressionSharePercent columns are added to the following value sets. 
- [AccountPerformanceReportColumn](../reporting-service/accountperformancereportcolumn.md) 
- [AdGroupPerformanceReportColumn](../reporting-service/adgroupperformancereportcolumn.md) 
- [CampaignPerformanceReportColumn](../reporting-service/campaignperformancereportcolumn.md) 

## <a name="march2020"></a>March 2020
See below for Bing Ads API updates during this calendar month. 

- [Ad Scheduling by Account Time Zone](#adscheduling-accounttimezone-march2020) 

### <a name="adscheduling-accounttimezone-march2020"></a>Ad Scheduling by Account Time Zone

Ad scheduling by account time zone is available for customers in the pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 655). Later this year it will be available in all customers. 

The AdScheduleUseSearcherTimeZone element is available in the [Campaign](../campaign-management-service/campaign.md#adscheduleusesearchertimezone) and [Ad Group](../campaign-management-service/adgroup.md#adscheduleusesearchertimezone) Campaign Management objects. The [Ad Schedule Use Searcher Time Zone](../bulk-service/campaign.md#adscheduleusesearchertimezone) field is available in the [Campaign](../bulk-service/campaign.md#adscheduleusesearchertimezone) and [Ad Group](../bulk-service/ad-group.md#adscheduleusesearchertimezone) Bulk records. 

The new property for each campaign and ad group determines whether to use the account time zone or the time zone of the search user where the ads could be delivered. 

> [!NOTE] 
> If you do not specify this element or leave it null, the default value of *true* will be set and the search user's time zone will be used. Towards the end of Q2 or the beginning of Q3 Calendar Year 2020 and going forward, the new default value of *false* will be set and the account time zone will be used.

## <a name="februry2020"></a>February 2020
See below for Bing Ads API updates during this calendar month. 

- [Goal and Goal Type in Reports](#goals-reporting-februry2020) 

### <a name="goals-reporting-februry2020"></a>Goal and Goal Type in Reports
The Goal and GoalType columns are added to the following value sets. 
- [AccountPerformanceReportColumn](../reporting-service/accountperformancereportcolumn.md) 
- [AdDynamicTextPerformanceReportColumn](../reporting-service/addynamictextperformancereportcolumn.md) 
- [AdExtensionByAdReportColumn](../reporting-service/adextensionbyadreportcolumn.md) 
- [AdExtensionByKeywordReportColumn](../reporting-service/adextensionbykeywordreportcolumn.md) 
- [AdExtensionDetailReportColumn](../reporting-service/adextensiondetailreportcolumn.md) 
- [AdGroupPerformanceReportColumn](../reporting-service/adgroupperformancereportcolumn.md) 
- [AdPerformanceReportColumn](../reporting-service/adperformancereportcolumn.md) 
- [AgeGenderAudienceReportColumn](../reporting-service/agegenderaudiencereportcolumn.md) 
- [AudiencePerformanceReportColumn](../reporting-service/audienceperformancereportcolumn.md) 
- [CampaignPerformanceReportColumn](../reporting-service/campaignperformancereportcolumn.md) 
- [ConversionPerformanceReportColumn](../reporting-service/conversionperformancereportcolumn.md) 
- [DestinationUrlPerformanceReportColumn](../reporting-service/destinationurlperformancereportcolumn.md) 
- [DSAAutoTargetPerformanceReportColumn](../reporting-service/dsaautotargetperformancereportcolumn.md) 
- [DSACategoryPerformanceReportColumn](../reporting-service/dsacategoryperformancereportcolumn.md) 
- [DSASearchQueryPerformanceReportColumn](../reporting-service/dsasearchqueryperformancereportcolumn.md) 
- [GeographicPerformanceReportColumn](../reporting-service/geographicperformancereportcolumn.md) 
- [KeywordPerformanceReportColumn](../reporting-service/keywordperformancereportcolumn.md) 
- [ProductDimensionPerformanceReportColumn](../reporting-service/productdimensionperformancereportcolumn.md) 
- [ProductPartitionPerformanceReportColumn](../reporting-service/productpartitionperformancereportcolumn.md) 
- [ProductPartitionUnitPerformanceReportColumn](../reporting-service/productpartitionunitperformancereportcolumn.md) 
- [ProductSearchQueryPerformanceReportColumn](../reporting-service/productsearchqueryperformancereportcolumn.md) 
- [ProfessionalDemographicsAudienceReportColumn](../reporting-service/professionaldemographicsaudiencereportcolumn.md) 
- [PublisherUsagePerformanceReportColumn](../reporting-service/publisherusageperformancereportcolumn.md) 
- [SearchQueryPerformanceReportColumn](../reporting-service/searchqueryperformancereportcolumn.md) 
- [UserLocationPerformanceReportColumn](../reporting-service/userlocationperformancereportcolumn.md) 

These columns were already available in the [GoalsAndFunnelsReportColumn](../reporting-service/goalsandfunnelsreportcolumn.md) value set.  

The goal is the name of the goal you set for the conversions you want, meaning actions customers take after clicking your ad. The goal type is the type of conversion goal. Possible values include *AppInstall*, *Duration*, *Event*, *InStoreTransaction*, *OfflineConversion*, *PagesViewedPerVisit*, and *Url*.

## <a name="january2020"></a>January 2020
See below for Bing Ads API updates during this calendar month. 

- [Deprecating Accelerated Budget Delivery](#accelerated-budget-january2020)  
- [Action Ad Extension Types](#actiontypes-january2020)  

### <a name="accelerated-budget-january2020"></a>Deprecating Accelerated Budget Delivery 
As of January 2020 the budget type for shared and unshared budgets are read-only for all DynamicSearchAds, Shopping, and Search campaigns, and any budget type value that you attempt to set will be ignored without returning an error. Previous budget settings will be migrated from accelerated to standard, and the API will only return "DailyBudgetStandard" for DynamicSearchAds, Shopping, and Search campaigns, as well as for all shared budgets. You can still use accelerated budgets with Audience campaigns. The budget type data is not migrated for Audience campaign level unshared budgets. However, the budget delivery might change as described above if the Audience campaign uses a shared budget. 

### <a name="actiontypes-january2020"></a>Action Ad Extension Types
Starting January 2020, nine action types are deprecated. For example, if you set the action type to "Browse" no error will be returned, but "LearnMore" is the effective value that will be stored and returned when retrieving the action ad extension. Your application should use the replacement values instead of the deprecated values. 

|Deprecated Action Type|Replacement Action Type| 
|-----|-----|
|Browse|LearnMore|
|Explore|LearnMore|
|Message|ContactUs|
|NewCars|ViewCars|
|SeeMore|LearnMore|
|StartFree|FreeTrial|
|UsedCars|ViewCars|
|ViewNow|LearnMore|
|VisitSite|LearnMore|

Also starting January 2020 two new action types are added i.e., RenewNow and Reorder. Please note that if you use the Campaign Management API, by default the action type returned is Unknown. (The design goal is to avoid a breaking change for clients with strict value set dependencies.) To determine the effective action type i.e., RenewNow or Reorder, include [ActionTypesPhase3](../campaign-management-service/adextensionadditionalfield.md#actiontypesphase3) when calling the [GetAdExtensionsAssociations](../campaign-management-service/getadextensionsassociations.md) and [GetAdExtensionsByIds](../campaign-management-service/getadextensionsbyids.md) operations. 

One final update starting in January 2020, only the localized text for Sale and Coupon are updated to "See Sale" and "Get Coupon" respectively for all supported languages. The API value sets are unchanged for these action types. For the current localized text please see [Action Text for Action Ad Extensions](ad-languages.md#actionadextension-actiontext).

## <a name="december2019"></a>December 2019
See below for Bing Ads API updates during this calendar month. 

- [Bing Ads API SDK Updates](#sdk-december2019)  

### <a name="sdk-december2019"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.2), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.2), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.2), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.2) SDK version 13.0.2. 

## <a name="november2019"></a>November 2019
See below for Bing Ads API updates during this calendar month. 

- [Final Url Suffix and Custom Parameter Expansion](#finalurlsuffix-customparameter-november2019)  
- [Bing Ads API SDK Updates](#sdk-november2019)  

### <a name="finalurlsuffix-customparameter-november2019"></a>Final Url Suffix and Custom Parameter Expansion
Final URL suffix is now available at the account, campaign, ad group, ad group criterion, ad, and keyword level for all customers. Final URL suffix is available at the action, price, and sitelink ad extension level for Phase 3 pilot customers ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 636).  

Up to 8 custom parameters and longer custom parameter values are now available at the account, campaign, ad group, ad group criterion, ad, and keyword level for all customers. Up to 8 custom parameters and longer custom parameter values are available at the action, price, and sitelink ad extension level for Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635).  

For more information see [URL Tracking with Upgraded URLs](url-tracking-upgraded-urls.md).  

### <a name="sdk-november2019"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v13.0.1), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v13.0.1), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.13.0.1), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v13.0.1) SDK version 13.0.1. 

## <a name="october2019"></a>October 2019
See below for Bing Ads API updates during this calendar month. 

- [Include View Through Conversions](#includeviewthroughconversions-october2019)  
- [Profile Expansion Enabled](#profileexpansionenabled-october2019)  
- [Bing Ads API SDK Updates](#sdk-october2019)  

### <a name="includeviewthroughconversions-october2019"></a>Include View Through Conversions
View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad. 

If you are in the feature pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 616) this feature is enabled by default, meaning that the values in the "All" conversions columns of your performance reports will include view-through conversions. You can choose to disable it if you don't want to include view-through conversions. 

You can enable or disable the feature for each account via Bulk and Campaign Management API.
- With the Bulk API use the Account record and get or set the [Include View Through Conversions](../bulk-service/account.md#includeviewthroughconversions) field. 
- With the Campaign Management API use the [AccountProperty](../campaign-management-service/accountproperty.md) and call [GetAccountProperties](../campaign-management-service/getaccountproperties.md) or [SetAccountProperties](../campaign-management-service/setaccountproperties.md) as needed.

You can manage the view through conversion window with the Campaign Management API i.e., get or set the ViewThroughConversionWindowInMinutes property of the [DurationGoal](../campaign-management-service/durationgoal.md#viewthroughconversionwindowinminutes), [EventGoal](../campaign-management-service/eventgoal.md#viewthroughconversionwindowinminutes), [PagesViewedPerVisitGoal](../campaign-management-service/pagesviewedpervisitgoal.md#viewthroughconversionwindowinminutes), or [UrlGoal](../campaign-management-service/urlgoal.md#viewthroughconversionwindowinminutes). Be sure to explicitly request [ViewThroughConversionWindowInMinutes](../campaign-management-service/conversiongoaladditionalfield.md#viewthroughconversionwindowinminutes) as an additional field when calling [GetConversionGoalsByIds](../campaign-management-service/getconversiongoalsbyids.md#returnadditionalfields) and [GetConversionGoalsByTagIds](../campaign-management-service/getconversiongoalsbytagids.md#returnadditionalfields). 

> [!NOTE]
> View-through conversions require a [UETTag](../campaign-management-service/uettag.md), so this property is not applicable for the [AppInstallGoal](../campaign-management-service/appinstallgoal.md), [InStoreTransactionGoal](../campaign-management-service/instoretransactiongoal.md), and [OfflineConversionGoal](../campaign-management-service/offlineconversiongoal.md). 

### <a name="profileexpansionenabled-october2019"></a>Profile Expansion Enabled
Determines whether to expand LinkedIn profile targeting across your account to reach additional customers similar to the ones you currently target. 

Enabling profile targeting expansion allows Microsoft Advertising to show your ads to additional customers similar to the ones you currently target. For example, if you target a specific LinkedIn audience segment, we will also target Bing users who don't have a confirmed LinkedIn account but who share the same characteristics as LinkedIn users in that segment. 

You can enable or disable the feature for each account via Bulk and Campaign Management API.
- With the Bulk API use the Account record and get or set the [Profile Expansion Enabled](../bulk-service/account.md#profileexpansionenabled) field. 
- With the Campaign Management API use the [AccountProperty](../campaign-management-service/accountproperty.md) and call [GetAccountProperties](../campaign-management-service/getaccountproperties.md) or [SetAccountProperties](../campaign-management-service/setaccountproperties.md) as needed.

### <a name="sdk-october2019"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v12.13.6), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v12.13.6), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.12.13.6), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v12.13.6) SDK version 12.13.6. 

## <a name="september2019"></a>September 2019
See below for Bing Ads API updates during this calendar month. 

- [Experiment Type](#experimenttype-september2019)  
- [Final Url Suffix in Reports](#finalurlsuffix-reporting-september2019)  
- [Product Negative Keyword Report](#productnegativekeyword-reporting-september2019)  
- [Bing Ads API SDK Updates](#sdk-september2019)  

### <a name="experimenttype-september2019"></a>Experiment Type
You can now set the experiment split type via the [ExperimentType](../campaign-management-service/experiment.md#experimenttype) element in the [Experiment](../campaign-management-service/experiment.md) Campaign Management object or via the [Experiment Type](../bulk-service/experiment.md#experimenttype) field in the [Experiment](../bulk-service/experiment.md) Bulk record. 

The experiment split type determines whether to show individual customers ads from the experiment and the original campaign randomly, or only from one or the other.

The possible values include TrafficBased and CookieBased. 

TrafficBased: This is also known as the search-based option. Every time customers search, they are randomly shown either ads from your experiment or ads from your original campaign. This means that individual customers could see ads from both sources if they search multiple times.

CookieBased: When individual customers search, we show ads from either your experiment or your original campaign, and use a cookie to ensure that, going forward, they will only see ads from this source. The cookie-based option has an important trade-off to consider: On one hand, you may get more accurate data, since you're ensuring that an individual customer is only responding to one source or the other. On the other hand, it may take you longer to build up statistically significant comparison data than with the search-based option.  

### <a name="finalurlsuffix-reporting-september2019"></a>Final Url Suffix in Reports
The FinalUrlSuffix column is added to the [AdPerformanceReportColumn](../reporting-service/adperformancereportcolumn.md) value set. The FinalUrlSuffix column is also available via the [AdGroupPerformanceReportColumn](../reporting-service/adgroupperformancereportcolumn.md), [CampaignPerformanceReportColumn](../reporting-service/campaignperformancereportcolumn.md), [DestinationUrlPerformanceReportColumn](../reporting-service/destinationurlperformancereportcolumn.md), and [KeywordPerformanceReportColumn](../reporting-service/keywordperformancereportcolumn.md) value sets.

The final URL suffix is a place in your final URL where you can add parameters that will be attached to the end of your landing page URL.

### <a name="productnegativekeyword-reporting-september2019"></a>Product Negative Keyword Report
The [ProductNegativeKeywordConflictReportRequest](../reporting-service/productnegativekeywordconflictreportrequest.md) is added for Microsoft Shopping Campaigns. Use this report to confirm that negative keywords applied to your Shopping campaigns are not excessively restricting campaign performance. You can request negative keywords and the corresponding products which they're preventing from showing in your Shopping campaigns.

### <a name="sdk-september2019"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v12.13.5), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v12.13.5), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.12.13.5), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v12.13.5) SDK version 12.13.5. 

## <a name="august2019"></a>August 2019
See below for Bing Ads API updates during this calendar month. 

- [Audience Association Level in Reports](#associationlevel-reporting-august2019)  
- [Bing Ads API SDK Updates](#sdk-august2019)  

### <a name="associationlevel-reporting-august2019"></a>Audience Association Level in Reports
The AssociationLevel column is added to the [AudiencePerformanceReportColumn](../reporting-service/audienceperformancereportcolumn.md) value set. 

### <a name="sdk-august2019"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v12.13.4), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v12.13.4), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.12.13.4), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v12.13.4) SDK version 12.13.4. 

## <a name="july2019"></a>July 2019
See below for Bing Ads API updates during this calendar month. 

- [Include in Conversions](#excludefrombidding-july2019)  
- [Base Campaign Id in Reports](#basecampaignid-reporting-july2019)  
- [Average Position in Reports](#averageposition-reporting-july2019)  
- [Audience Association ID in Reports](#associationid-reporting-july2019)  

### <a name="excludefrombidding-july2019"></a>Include in Conversions
Customers who are enabled for the Include in Conversions feature ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 574) can choose to exclude specific conversion goals from conversions report data. 

Data will be excluded from the `Conversions`, `ConversionRate`, `CostPerConversion`, `ReturnOnAdSpend`, `RevenuePerConversion`, and `Revenue` report columns for any conversion goal that has its [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set as true. Also, if you use an automated bidding bid strategy, setting this property true will result in the goal's conversions no longer factoring into automated bidding calculations.

The `AllConversions`, `AllConversionRate`, `AllCostPerConversion`, `AllReturnOnAdSpend`, `AllRevenuePerConversion`, and `AllRevenue` columns (NEW) will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting. 

For more information, see the help article [Conversion goals: "Conversions" versus "All conversions"](https://help.ads.microsoft.com/#apex/3/en/56920/-1/en/#ext:reporting).  

After the July service update, the table below summarizes all available conversion related report performance statistics per report type. 

|Reporting Value Set|Available Conversion Columns|
|-----|-----|
|[AccountPerformanceReportColumn](../reporting-service/accountperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[AdDynamicTextPerformanceReportColumn](../reporting-service/addynamictextperformancereportcolumn.md)|AllConversions<br/>AllConversionRate<br/>AllCostPerConversion<br/>Conversions<br/>ConversionRate<br/>CostPerConversion|
|[AdExtensionByAdReportColumn](../reporting-service/adextensionbyadreportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[AdExtensionByKeywordReportColumn](../reporting-service/adextensionbykeywordreportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[AdExtensionDetailReportColumn](../reporting-service/adextensiondetailreportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[AdGroupPerformanceReportColumn](../reporting-service/adgroupperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[AdPerformanceReportColumn](../reporting-service/adperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[AgeGenderAudienceReportColumn](../reporting-service/agegenderaudiencereportcolumn.md)|AllConversions<br/>AllRevenue<br/>Conversions<br/>Revenue|
|[AudiencePerformanceReportColumn](../reporting-service/audienceperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[CampaignPerformanceReportColumn](../reporting-service/campaignperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[ConversionPerformanceReportColumn](../reporting-service/conversionperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[DestinationUrlPerformanceReportColumn](../reporting-service/destinationurlperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[DSAAutoTargetPerformanceReportColumn](../reporting-service/dsaautotargetperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[DSACategoryPerformanceReportColumn](../reporting-service/dsacategoryperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[DSASearchQueryPerformanceReportColumn](../reporting-service/dsasearchqueryperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[GeographicPerformanceReportColumn](../reporting-service/geographicperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[GoalsAndFunnelsReportColumn](../reporting-service/goalsandfunnelsreportcolumn.md)|AllConversions<br/>AllRevenue<br/>Conversions<br/>Revenue|
|[KeywordPerformanceReportColumn](../reporting-service/keywordperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[ProductDimensionPerformanceReportColumn](../reporting-service/productdimensionperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[ProductPartitionPerformanceReportColumn](../reporting-service/productpartitionperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[ProductPartitionUnitPerformanceReportColumn](../reporting-service/productpartitionunitperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[ProductSearchQueryPerformanceReportColumn](../reporting-service/productsearchqueryperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>RevenuePerConversion|
|[ProfessionalDemographicsAudienceReportColumn](../reporting-service/professionaldemographicsaudiencereportcolumn.md)|AllConversions<br/>AllRevenue<br/>Conversions<br/>Revenue|
|[PublisherUsagePerformanceReportColumn](../reporting-service/publisherusageperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[SearchQueryPerformanceReportColumn](../reporting-service/searchqueryperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|
|[ShareOfVoiceReportColumn](../reporting-service/shareofvoicereportcolumn.md)|AllConversions<br/>AllConversionRate<br/>AllCostPerConversion<br/>Conversions<br/>ConversionRate<br/>CostPerConversion|
|[UserLocationPerformanceReportColumn](../reporting-service/userlocationperformancereportcolumn.md)|AllConversions<br/>AllRevenue<br/>AllConversionRate<br/>AllCostPerConversion<br/>AllReturnOnAdSpend<br/>AllRevenuePerConversion<br/>Conversions<br/>Revenue<br/>ConversionRate<br/>CostPerConversion<br/>ReturnOnAdSpend<br/>RevenuePerConversion|

### <a name="basecampaignid-reporting-july2019"></a>Base Campaign Id in Reports
The BaseCampaignId column is added to the following value sets. 
- [AdGroupPerformanceReportColumn](../reporting-service/adgroupperformancereportcolumn.md)  
- [AdPerformanceReportColumn](../reporting-service/adperformancereportcolumn.md)  
- [AgeGenderAudienceReportColumn](../reporting-service/agegenderaudiencereportcolumn.md)  
- [AudiencePerformanceReportColumn](../reporting-service/audienceperformancereportcolumn.md)  
- [CampaignPerformanceReportColumn](../reporting-service/campaignperformancereportcolumn.md)  
- [GeographicPerformanceReportColumn](../reporting-service/geographicperformancereportcolumn.md)  
- [KeywordPerformanceReportColumn](../reporting-service/keywordperformancereportcolumn.md)  
- [ShareOfVoiceReportColumn](../reporting-service/shareofvoicereportcolumn.md)  

### <a name="averageposition-reporting-july2019"></a>Average Position in Reports
The AveragePosition column is added to the [ProfessionalDemographicsAudienceReportColumn](../reporting-service/professionaldemographicsaudiencereportcolumn.md) value set. 

### <a name="associationid-reporting-july2019"></a>Audience Association ID in Reports
The AssociationId column is added to the [AudiencePerformanceReportColumn](../reporting-service/audienceperformancereportcolumn.md) value set. 

## <a name="june2019"></a>June 2019
See below for Bing Ads API updates during this calendar month. 

- [Bing Ads API SDK Updates](#sdk-june2019)  
- [Final Url Suffix and Custom Parameters Update](#finalurlsuffix-customparameters-june2019)  
- [Monday to Sunday Report Aggregation](#monday-sunday-june2019)  
- [Prominence Metrics](#prominence-metrics-june2019)  
- [Change History Report by Tool](#searchcampaignchangehistoryreportcolumn-june2019)  
- [Feeds via Bulk API](#feeds-june2019)  

### <a name="sdk-june2019"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v12.13.3), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v12.13.3), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.12.13.3), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v12.13.3) SDK version 12.13.3. 

### <a name="finalurlsuffix-customparameters-june2019"></a>Final Url Suffix and Custom Parameters Update
Final URL suffix and custom parameter updates are now generally available at the account, campaign, ad group, and keyword level for all customers. Similar updates for ads, ad extensions, and ad group criterions are still only available for pilot customers.  
- Final URL suffix is now available at the account, campaign, ad group, and keyword level for all customers. Final URL suffix is available for ads, ad extensions, and ad group criterions for Phase 2 pilot customers ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 566). Later this year the Final URL suffix will be available for ads, ad extensions, and ad group criterions for all customers.  
- The custom parameter limit for all customers has been increased from 3 to 8 for campaigns, ad groups, and keywords. Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned. For customers in the Custom Parameters Limit Increase Phase 2 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 565) for ads, ad extensions, and ad group criterions, Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned. During calendar year 2019 the limit for ads, ad extensions, and ad group criterions will be increased from 3 to 8 for all customers.  

### <a name="monday-sunday-june2019"></a>Monday to Sunday Report Aggregation
The Reporting API is updated to support Monday through Sunday weekly aggregation. Previously you could only aggregate weekly from Sunday through Saturday. 

The [WeeklyStartingMonday](../reporting-service/reportaggregation.md#weeklystartingmonday) value is added to the [ReportAggregation](../reporting-service/reportaggregation.md) value set.  

The [ThisWeekStartingMonday](../reporting-service/reporttimeperiod.md#thisweekstartingmonday), [LastWeekStartingMonday](../reporting-service/reporttimeperiod.md#lastweekstartingmonday), and [LastFourWeeksStartingMonday](../reporting-service/reporttimeperiod.md#lastfourweeksstartingmonday) values are added to the [ReportTimePeriod](../reporting-service/reporttimeperiod.md) value set.  

### <a name="prominence-metrics-june2019"></a>Prominence Metrics
With new and improved prominence metrics, you may now take a more holistic view of where your ads are appearing on search results pages. These clearer insights can help you better optimize your bidding strategy. 

The AbsoluteTopImpressionRatePercent, AbsoluteTopImpressionShareLostToBudgetPercent, AbsoluteTopImpressionShareLostToRankPercent, TopImpressionRatePercent, TopImpressionShareLostToBudgetPercent, TopImpressionShareLostToRankPercent, and TopImpressionSharePercent columns are added to the following report column value sets.

- [AccountPerformanceReportColumn](../reporting-service/accountperformancereportcolumn.md)  
- [AdGroupPerformanceReportColumn](../reporting-service/adgroupperformancereportcolumn.md)  
- [CampaignPerformanceReportColumn](../reporting-service/campaignperformancereportcolumn.md)  
- [ShareOfVoiceReportColumn](../reporting-service/shareofvoicereportcolumn.md)  

### <a name="searchcampaignchangehistoryreportcolumn-june2019"></a>Change History Report by Tool
The [Tool](../reporting-service/searchcampaignchangehistoryreportcolumn.md#tool) column is now available with the change history report. You can determine how changes were made to account, campaign or ad attributes e.g., whether via the Web client, Editor, Bulk upload, or Campaign Management API. 

### <a name="feeds-june2019"></a>Feeds via Bulk API
The [Feed](../bulk-service/feed.md) and [Feed Item](../bulk-service/feed-item.md) Bulk records are added to support [Bulk download and upload](bulk-download-upload.md) of both [Ad Customizer Feeds](ad-customizer-feeds.md) and [Page Feeds](page-feeds.md).  

The [Page Feed Ids](../bulk-service/campaign.md#pagefeedids) field is added to the [Campaign](../bulk-service/campaign.md) record for [Page Feeds](page-feeds.md).  

## <a name="may2019"></a>May 2019
See below for Bing Ads API updates during this calendar month. 

- [Assisted Conversions](#assistedconversions-may2019)  
- [Dynamic Search Ads Text Part 2](#textpart2dsa-may2019)  
- [Bing Ads API SDK Updates](#sdk-may2019)  

### <a name="assistedconversions-may2019"></a>Assisted Conversions
Assisted conversions are conversions resulting from the clicks on your ads that have received co-bids from your manufacturer partners. This performance statistic is only available for Sponsored Products in Microsoft Shopping Campaigns. The AssistedConversions column is added to the following report column value sets.

- [ProductDimensionPerformanceReportColumn](../reporting-service/productdimensionperformancereportcolumn.md)  
- [ProductPartitionPerformanceReportColumn](../reporting-service/productpartitionperformancereportcolumn.md)  
- [ProductPartitionUnitPerformanceReportColumn](../reporting-service/productpartitionunitperformancereportcolumn.md)  
- [ProductSearchQueryPerformanceReportColumn](../reporting-service/productsearchqueryperformancereportcolumn.md)  

### <a name="textpart2dsa-may2019"></a>Dynamic Search Ads Text Part 2
Dynamic Search Ads Text Part 2 is available for pilot customers ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 600). Later this year it will be available in all customers. 

The [TextPart2](../campaign-management-service/dynamicsearchad.md#textpart2) element is available in the [DynamicSearchAd](../campaign-management-service/dynamicsearchad.md) Campaign Management object. The [Text Part 2](../bulk-service/dynamic-search-ad.md#textpart2) field is available in the [Dynamic Search Ad](../bulk-service/dynamic-search-ad.md#textpart2) Bulk record. 

### <a name="sdk-may2019"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v12.13.2), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v12.13.2), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.12.13.2), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v12.13.2) SDK version 12.13.2. 

## <a name="april2019"></a>April 2019
See below for Bing Ads API updates during this calendar month. 

- [New Production OAuth Endpoint](#oauth-april2019)  
- [Bing Ads API SDK Updates](#sdk-april2019)  
- [Version 13 General Availability](#v13-april2019)  

### <a name="oauth-april2019"></a>New Production OAuth Endpoint
The Microsoft identity platform endpoint for developers is now available. The Microsoft identity platform endpoint allows both work or school accounts from Azure AD and personal Microsoft accounts (MSA), such as hotmail.com, outlook.com, and msn.com. The Live Connect endpoint only allows authentication with personal accounts. 

> [!IMPORTANT]
> Even if your users do not have work or school accounts, and even if you do not use the Bing Ads API SDKs we encourage you to update the authorization URL during calendar year 2019, since the Live Connect endpoint is no longer the recommended approach for Microsoft Advertising users.  

### <a name="sdk-april2019"></a>Bing Ads API SDK Updates
The Bing Ads .NET, Java, Php, and Python SDKs are updated with support for version 13. For details please see release notes for Microsoft Advertising [.NET](https://github.com/BingAds/BingAds-dotNet-SDK/releases/tag/v12.13.1), [Java](https://github.com/BingAds/BingAds-Java-SDK/releases/tag/v12.13.1), [Php](https://github.com/BingAds/BingAds-PHP-SDK/releases/tag/v0.12.13.1), and [Python](https://github.com/BingAds/BingAds-Python-SDK/releases/tag/v12.13.1) SDK version 12.13.1. 

### <a name="v13-april2019"></a>Version 13 General Availability
Bing Ads API version 13 is now generally available. With the availability of Bing Ads API version 13, version 12 is deprecated and will sunset by October 31, 2019. For more details, see [Migrate to Version 13](migration-guide.md).  

## <a name="march2019"></a>March 2019
See below for Bing Ads API updates during this calendar month. 

- [Version 13 Preview](#v13-march2019)  

### <a name="v13-march2019"></a>Version 13 Preview
Bing Ads API version 13 is available for preview. For more details about migrating from version 12, see [Migrate to Version 13](migration-guide.md). 
