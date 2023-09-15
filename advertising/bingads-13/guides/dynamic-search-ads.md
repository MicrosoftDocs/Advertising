---
title: "Dynamic Search Ads"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Setup Dynamic Search ads with the Bing Ads API.
---
# Dynamic Search Ads
Dynamic search ads provide a streamlined, low-touch way to make sure customers searching on the Microsoft Advertising Network find your products or services.

> [!NOTE]
> This feature is currently available in the following countries or regions: Albania (AL), Andorra (AD), Argentina (AR), Aruba, Australia (AU), Austria (AT), Bahamas (BS), Bangladesh(BD), Belgium (BE), Bolivia(BO), Bosnia and Herzegovina (BA), Brazil (BR), Brunei(BN), Bulgaria (BG), Canada (CA), Cayman Islands(KY), Chile(CL), Colombia(CO), Costa Rica(CR), Croatia (HR), Cyprus (CY), Czech Republic (CZ), Denmark (DK), Dominica(DM), Dominican Republic(DO), Ecuador(EC), El Salvador(SV), Estonia (EE), Fiji (FJ), Finland (FI), France (FR), French Guiana(GF), French Polynesia (PF), Germany (DE), Greece (GR), Guam (GU), Guatemala (GT), Guyana (GY), Haiti (HT), Honduras (HN), Hungary (HU), Iceland (IS), India (IN), Indonesia (ID), Ireland (IE), Italy (IT), Latvia (LV), Liechtenstein (LI), Lithuania (LT), Luxembourg (LU), Malaysia (MY), Maldives (MV), Malta (MT), Martinique (MQ), Mexico (MX), Monaco (MC), Mongolia (MN), Montenegro (ME), Montserrat (MS), Nepal (NP), Netherlands (NL), New Caledonia (NC), New Zealand (NZ), Republic of North Macedonia (MK), Norway (NO), Panama (PA), Paraguay (PY), Papua New Guinea (PG), Peru (PE), Philippines (PH),  Poland (PO), Portugal (PT), Puerto Rico,  Romania (RO), San Marino (SM), Serbia (RS), Singapore(SG), Slovakia (SK), Slovenia (SI), South Africa (ZA), Spain (ES), Spain(ES), Sri Lanka(LK), Sweden (SE), Switzerland (CH), Thailand(TH), Trinidad and Tobago(TT), Türkiye (TR), Vatican City (VA), Vietnam(VN), United Kingdom (UK), United States (US), Uruguay(UY), and Venezuela(VE).

Dynamic search ads automatically target relevant search queries based on the content of your website, and are dynamically created to respond to these search queries. Using them will:

-  Create targeted and relevant ads automatically: New, dynamically-created ads for every search query based on your website content, or specific pages or categories of your website.
-  Reduce your workload: No need to maintain keyword lists, manage bids, or update and customize ad titles.
-  Find missed opportunities: Automatically adapt to new queries to drive additional conversions.

Dynamic search ads are most appropriate for two types of advertisers:

-  Advertisers who have a large catalog of webpages and a changing mix of products, making it difficult to manage search ads for each product.
-  Advertisers who are not familiar with search advertising, but who want to quickly and easily try it out.

For more information see the [Target searches automatically with dynamic search ads](https://help.ads.microsoft.com/#apex/3/en/56794/0) help documentation.

## <a name="bulk"></a>Bulk API for Dynamic Search Ads  
The following Bulk records are available for managing dynamic search ads.
* [Ad Group Dynamic Search Ad Target](../bulk-service/ad-group-dynamic-search-ad-target.md)
* [Ad Group Negative Dynamic Search Ad Target](../bulk-service/ad-group-negative-dynamic-search-ad-target.md)
* [Campaign Negative Dynamic Search Ad Target](../bulk-service/campaign-negative-dynamic-search-ad-target.md)
* [Dynamic Search Ad](../bulk-service/dynamic-search-ad.md)  

Dynamic search ads can only be created within search campaigns that have valid dynamic search ads settings (comprised of the [Domain Language](../bulk-service/campaign.md#domainlanguage), [Dynamic Description Enabled](../bulk-service/campaign.md#dynamicdescriptionenabled), [Page Feed Ids](../bulk-service/campaign.md#pagefeedids), [Source](../bulk-service/campaign.md#source), and [Website](../bulk-service/campaign.md#website) fields). The campaign [ExperimentId](../bulk-service/campaign.md#experimentid) can't be set. 

Next, reate an [Ad Group](../bulk-service/ad-group.md) and set the [AdGroupType](../bulk-service/ad-group.md#adgrouptype) to "SearchDynamic". You can add one or more [Ad Group Dynamic Search Ad Target](../bulk-service/ad-group-dynamic-search-ad-target.md) records for each ad group that helps determine whether or not to serve dynamic search ads. 

If you want to exclude certain portions of your website, you can add negative targets at the campaign and/or ad group level using the respective [Campaign Negative Dynamic Search Ad Target](../bulk-service/campaign-negative-dynamic-search-ad-target.md) and [Ad Group Negative Dynamic Search Ad Target](../bulk-service/ad-group-negative-dynamic-search-ad-target.md) records. The [Campaign Negative Dynamic Search Ad Target](../bulk-service/campaign-negative-dynamic-search-ad-target.md) at the campaign level applies to all ad groups within the campaign; however, if you define ad group level [Ad Group Negative Dynamic Search Ad Target](../bulk-service/ad-group-negative-dynamic-search-ad-target.md), the campaign target is ignored for that ad group. 

For any of the [Ad Group Dynamic Search Ad Target](../bulk-service/ad-group-dynamic-search-ad-target.md), [Ad Group Negative Dynamic Search Ad Target](../bulk-service/ad-group-negative-dynamic-search-ad-target.md), and [Campaign Negative Dynamic Search Ad Target](../bulk-service/campaign-negative-dynamic-search-ad-target.md) records, you can choose whether you want the target argument to match partial URLs, page content, page title, or categories that Bing thinks applies to your website. To discover the categories that you can use for targets (positive or negative), call the [GetDomainCategories](../ad-insight-service/getdomaincategories.md) operation with the Ad Insight service.

Finally you can define a [Dynamic Search Ad](../bulk-service/dynamic-search-ad.md) record assigned to the ad group. The ad title and display URL are generated automatically based on the website domain and language that you want to target.


## <a name="campaign"></a>Campaign Management API for Dynamic Search Ads  

Dynamic search ads can only be created within campaigns that have a [DynamicSearchAdsSetting](../campaign-management-service/dynamicsearchadssetting.md) that specifies the target website domain and language. The [ExperimentId](../campaign-management-service/campaign.md#experimentid) element can't be set.  

Next, [create](../campaign-management-service/addadgroups.md) an [AdGroup](../campaign-management-service/adgroup.md) and set the [AdGroupType](../campaign-management-service/adgroup.md#adgrouptype) to "SearchDynamic". You can add one or more [Webpage](../campaign-management-service/webpage.md) criterion to each ad group that helps determine whether or not to serve dynamic search ads, by calling the [AddAdGroupCriterions](../campaign-management-service/addadgroupcriterions.md) operation. 

If you want to exclude certain portions of your website, you can add negative [Webpage](../campaign-management-service/webpage.md) criterion at the campaign and/or ad group level using the respective [AddCampaignCriterions](../campaign-management-service/addcampaigncriterions.md) and [AddAdGroupCriterions](../campaign-management-service/addadgroupcriterions.md) service operations. The negative [Webpage](../campaign-management-service/webpage.md) criterion at the campaign level applies to all ad groups within the campaign; however, if you define ad group level negative [Webpage](../campaign-management-service/webpage.md) criterion, the campaign criterion is ignored for that ad group. 

Whether the criterion is positive or negative, you can choose whether you want the criterion argument to match partial URLs, page content, page title, or categories that Bing thinks applies to your website. To discover the categories that you can use for [Webpage](../campaign-management-service/webpage.md) criterion (positive or negative), use the [GetDomainCategories](../ad-insight-service/getdomaincategories.md) operation with the Ad Insight service.

Finally you can [add](../campaign-management-service/addads.md) a [DynamicSearchAd](../campaign-management-service/dynamicsearchad.md) into the ad group. The ad title and display URL are generated automatically based on the website domain and language that you want to target.
