---
title: "Keyword Ideas and Traffic Estimates"
ms.service: "bing-ads"
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Get keyword ideas and traffic estimates.
---
# Keyword Ideas and Traffic Estimates
Choosing keywords is one of the most important aspects of creating and maintaining a successful advertising campaign. But where to start? How do you identify the many possible keywords that describe your business? How much should you bid on those keywords to be competitive with other advertisers?

This guide describes how you can discover [keyword ideas](#keywordideas) and [traffic estimates](#keywordtrafficestimates) for your search advertising campaigns with the the [Ad Insight](../ad-insight-service/ad-insight-service-reference.md) service. The same data is available through the API and the Keyword Planner tool in the Microsoft Advertising web application, although the results can vary significantly depending on the respective filter criteria for each entry point. For additional keyword research, campaign budget opportunities, and ad group bid opportunities, see [Bid and Budget Opportunities](budget-bid-opportunities.md). 

> [!NOTE]
> Keyword planner is now available to all customers, and more capabilities are coming soon!


## <a name="keywordideas"></a>Keyword Ideas
Given a list of existing keywords, the [GetKeywordIdeas](../ad-insight-service/getkeywordideas.md) operation suggests new ad groups and keywords based on your existing keywords, website, and product category. You can also request historical statistics for keywords e.g., monthly searches, competition, average CPC, and ad impression share. You can use the returned suggested keyword bids as input to the [GetKeywordTrafficEstimates](../ad-insight-service/getkeywordtrafficestimates.md) operation.

With the Microsoft Advertising web application's Keyword Planner tool you search for new keywords using a phrase, website, or category as shown in the screen shot below.
 
![GetKeywordIdeas to Keyword Planner UI](media/getkeywordideas-keyword-planner-ui.png "GetKeywordIdeas to Keyword Planner UI")

Likewise with the [GetKeywordIdeas](../ad-insight-service/getkeywordideas.md) operation you must specify one or more of the corresponding search parameters.
-  The [QuerySearchParameter](../ad-insight-service/querysearchparameter.md) corresponds to filling in *Product or service*.
-  The [UrlSearchParameter](../ad-insight-service/urlsearchparameter.md) corresponds to filling in *Your landing page*.
-  The [CategorySearchParameter](../ad-insight-service/categorysearchparameter.md) corresponds to filling in *Your product category*. To get a list of keyword category identifiers, use the [GetKeywordIdeaCategories](../ad-insight-service/getkeywordideacategories.md) service operation.

With the Microsoft Advertising web application's Keyword Planner tool you can refine the search for example, by location, language, network, and negative keywords. Likewise with the [GetKeywordIdeas](../ad-insight-service/getkeywordideas.md) operation you must specify all of these search parameters: [LanguageSearchParameter](../ad-insight-service/languagesearchparameter.md), [LocationSearchParameter](../ad-insight-service/locationsearchparameter.md), and [NetworkSearchParameter](../ad-insight-service/networksearchparameter.md). 

Each of the [CompetitionSearchParameter](../ad-insight-service/competitionsearchparameter.md), [DateRangeSearchParameter](../ad-insight-service/daterangesearchparameter.md), [ExcludeAccountKeywordsSearchParameter](../ad-insight-service/excludeaccountkeywordssearchparameter.md), [IdeaTextSearchParameter](../ad-insight-service/ideatextsearchparameter.md), [ImpressionShareSearchParameter](../ad-insight-service/impressionsharesearchparameter.md), [SearchVolumeSearchParameter](../ad-insight-service/searchvolumesearchparameter.md), and [SuggestedBidSearchParameter](../ad-insight-service/suggestedbidsearchparameter.md) are optional. Use these search options to refine what keywords we suggest. You can limit the keywords by historical data, hide keywords already in your account, and include or exclude specific keywords.

The result is a [KeywordIdea](../ad-insight-service/keywordidea.md) list. Each keyword idea includes historical statistics for keywords e.g., monthly searches, competition, average CPC, and ad impression share. Whereas the Microsoft Advertising web application returns a 12 month average of the historical monthly search counts, each [KeywordIdea](../ad-insight-service/keywordidea.md) includes a list of monthly search counts. You can use each count individually or average them for parity with the Microsoft Advertising web application's calculation.

## <a name="keywordtrafficestimates"></a>Keyword Traffic Estimates
Once you have already settled on an initial set of keywords, the [GetKeywordTrafficEstimates](../ad-insight-service/getkeywordtrafficestimates.md) operation provides traffic estimates for keywords e.g., average CPC, average position, clicks, CTR, impressions, and total cost. As input you provide the keyword, bid, language, location, and network, with optional campaign budget and negative keyword filters.

With the Microsoft Advertising web application's Keyword Planner tool under *Get performance and cost estimates* you are prompted to either enter keywords or upload a file with keywords. The [GetKeywordTrafficEstimates](../ad-insight-service/getkeywordtrafficestimates.md) operation requires that you already have a list of keywords e.g., retrieved via the [GetKeywordIdeas](../ad-insight-service/getkeywordideas.md) operation. 

![GetKeywordTrafficEstimates to Keyword Planner UI](media/getkeywordtrafficestimates-keyword-planner-ui.png "GetKeywordTrafficEstimates to Keyword Planner UI")

The following inputs are required for the [GetKeywordTrafficEstimates](../ad-insight-service/getkeywordtrafficestimates.md) operation.
-  In the *Criteria* element of the [CampaignEstimator](../ad-insight-service/campaignestimator.md) object you must specify all of these criteria: [LanguageCriterion](../ad-insight-service/languagecriterion.md), [LocationCriterion](../ad-insight-service/locationcriterion.md), and [NetworkCriterion](../ad-insight-service/networkcriterion.md).
- In the *AdGroupEstimators* element of the [CampaignEstimator](../ad-insight-service/campaignestimator.md) object you must include one or more [AdGroupEstimator](../ad-insight-service/adgroupestimator.md) objects. Each [AdGroupEstimator](../ad-insight-service/adgroupestimator.md) must include one or more [KeywordEstimator](../ad-insight-service/keywordestimator.md) objects. Each [KeywordEstimator](../ad-insight-service/keywordestimator.md) object must contain the keyword text and match type.

The following inputs are optional for the [GetKeywordTrafficEstimates](../ad-insight-service/getkeywordtrafficestimates.md) operation.
- Include exactly one [DeviceCriterion](../ad-insight-service/devicecriterion.md) in the *Criteria* element of the [CampaignEstimator](../ad-insight-service/campaignestimator.md) object if you want to filter the results for one device. If you do not specify a device, the returned traffic estimates are aggregated for all devices.
- Include *DailyBudget* with the [CampaignEstimator](../ad-insight-service/campaignestimator.md) object if you want to constrain the results given a specific campaign daily budget.
- Include *NegativeKeywords* with the [CampaignEstimator](../ad-insight-service/campaignestimator.md) object if you want to filter the results by specific negative keywords.
- Include *MaxCpc* with the [AdGroupEstimator](../ad-insight-service/adgroupestimator.md) object if you want to get the results with a specific ad group bid setting.
- Include *MaxCpc* with the [KeywordEstimator](../ad-insight-service/keywordestimator.md) object if you want to get the results with a specific keyword bid setting.

The result is a [KeywordEstimate](../ad-insight-service/keywordestimate.md) list for each [AdGroupEstimate](../ad-insight-service/adgroupestimate.md), which are all nested within one [CampaignEstimate](../ad-insight-service/campaignestimate.md). Each keyword estimate includes a minimum and maximum [TrafficEstimate](../ad-insight-service/trafficestimate.md). As previously mentioned, the traffic estimates for keywords include average CPC, average position, clicks, CTR, impressions, and total cost.

## See Also
[Ad Insight Service Reference](../ad-insight-service/ad-insight-service-reference.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
