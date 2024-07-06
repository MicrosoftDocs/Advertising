---
title: "Performance Max Campaigns"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Performance Max campaigns are designed to find and convert more customers across the entire network.
---
# Performance Max Campaigns

Performance Max campaigns are designed to find and convert more customers across the entire network. We do this in real-time by pairing the right creative assets with the right targeting parameters and creating new combinations until we find the most high-performing ad for the market. You choose the strategy, input creative assets, and articulate your goals—Performance Max leverages Microsoft AI to do the rest.

> [!NOTE]
> Performance Max is currently available in open beta worldwide.

## <a name="basic-setup"></a>Basic setup

### <a name="uet-tag-conversion-goal"></a>UET tag and conversion setup

Create a [UET tag](../campaign-management-service/uettag.md) and add the tracking script to your website.  

If you are using the Maximize Conversion Value bid strategy, additional code to track variable revenue data (or fixed revenue > 0) is required. You need to generate this code and add it to your website before you begin creating your Performance Max campaign. Variable revenue tracking is available via [EventGoal](../campaign-management-service/eventgoal.md) and [UrlGoal](../campaign-management-service/urlgoal.md). You can create and leverage at least one of those conversion goals.

> [!NOTE]
> Universal event tracking is not required if you have an [OfflineConversionGoal](../campaign-management-service/offlineconversiongoal.md) and upload offline conversions.

For more information, see [Universal Event Tracking](./universal-event-tracking.md).

### <a name="create-campaign"></a>Create the campaign

You can create a Performance Max [campaign](../campaign-management-service/campaign.md) with the [AddCampaigns](../campaign-management-service/addcampaigns.md) operation. You can create a maximum of 100 Performance Max campaigns per ad account.

- The [CampaignType](../campaign-management-service/campaigntype.md) must be set to *PerformanceMax*.
- The [BiddingScheme](../campaign-management-service/biddingscheme.md) must be set to [MaxConversionValueBiddingScheme](../campaign-management-service/maxconversionvaluebiddingscheme.md) with optional [TargetRoas](../campaign-management-service/targetroasbiddingscheme.md) or [MaxConversionsBiddingScheme](../campaign-management-service/maxconversionsbiddingscheme.md) with optional [TargetCpa](../campaign-management-service/targetcpabiddingscheme.md). Performance Max campaigns use the Maximize Conversion Value bid strategy (where Microsoft Advertising automatically sets your bids in real time to maximize total conversion value within your budget) and automated targeting to maximize overall revenue numbers with an option to define return on ad spend (ROAS) targets.
- You must set the [DailyBudget](../campaign-management-service/campaign.md#dailybudget). Shared budget is not supported with Performance Max campaigns.
- You must include a [PerformanceMaxSetting](../campaign-management-service/performancemaxsetting.md) in the list of campaign [Settings](../campaign-management-service/campaign.md#settings). [FinalUrlExpansionOptOut](../campaign-management-service/performancemaxsetting.md#finalurlexpansionoptout) will be used to determine whether Microsoft will use the entire domain and dynamically generate assets to match landing page content.

### <a name="create-asset-group"></a>Create the asset group

In Performance Max, asset groups replace the traditional ad group and ad entities. They contain all the information needed for Microsoft to dynamically generate ads based on the assets you provide. You can create up to 100 [AssetGroup](../campaign-management-service/assetgroup.md) objects in each Performance Max campaign by calling the [AddAssetGroups](../campaign-management-service/addassetgroups.md) operation.

Asset groups also require text assets ([Headlines](../campaign-management-service/assetgroup.md#headlines), [LongHeadlines](../campaign-management-service/assetgroup.md#longheadlines), [Descriptions](../campaign-management-service/assetgroup.md#descriptions)) and image assets ([Images](../campaign-management-service/assetgroup.md#images)). If you don't already have images available, you can upload [Image](../campaign-management-service/image.md) data by calling the [AddMedia](../campaign-management-service/addmedia.md) operation.

## <a name="retail-campaign-setup"></a>Retail campaign setup

### <a name="set-up-mmc"></a>Set up Microsoft Merchant Center

If you are setting up a retail campaign to show Product Ads, you’ll need to set up your own Microsoft Merchant Center store with a product catalog.  

1. In the Microsoft Advertising web application, select **Tools** > **Microsoft Merchant Center**. Select **Create store** and provide the requested store details. For information about setting up your store catalog, see [Create a Microsoft Merchant Center](https://help.ads.microsoft.com/#apex/3/en/51085/1-500) store and [How is the feed file organized](https://help.ads.microsoft.com/#apex/3/en/51084/1).
2. [Create a product catalog](https://help.ads.microsoft.com/#apex/3/en/51105/1-500), and then submit the catalog feed via [FTP/SFTP](https://help.ads.microsoft.com/#apex/ads/en/56838/1) or the [Content API](../../shopping-content/index.md). Be sure to send updated data at least every 30 days.
3. You can get your Microsoft Merchant Center store identifier in the Microsoft Advertising web application via **Tools** > **Microsoft Merchant Center**. Otherwise, you can call the [GetBMCStoresByCustomerId](../campaign-management-service/getbmcstoresbycustomerid.md) operation to get the StoreId.

### <a name="shopping-settings"></a>Shopping settings

When creating the campaign, make sure to also include a [ShoppingSetting](../campaign-management-service/shoppingsetting.md) in the list of campaign [Settings](../campaign-management-service/campaign.md#settings). You must set the [Priority](../campaign-management-service/shoppingsetting.md#priority) to 4; Set the [StoreId](../campaign-management-service/shoppingsetting.md#storeid) to one of your [Microsoft Merchant Center](../guides/smart-shopping-campaigns.md#setup-bmc) store identifiers.

### <a name="asset-group-setup"></a>Asset group setup

If the asset groups are created under a retail campaign that is associated with a store, Microsoft Advertising generates Product Ads from the product details that it finds in your Microsoft Merchant Center store's product catalog. The asset group identifier can be used for reporting analytics.

Text and image assets are optional for these asset groups.

### <a name="apply-listing-groups"></a>Apply listing groups

Create a list of listing groups in a tree structure at the asset group level that will be used to select product catalog offers to serve. Apply the list of [AssetGroupListingGroupAction](../campaign-management-service/assetgrouplistinggroupaction.md) objects by calling [ApplyAssetGroupListingGroupActions](../campaign-management-service/applyassetgrouplistinggroupactions.md).

For more details about Product Condition (operand) and Product Value (attribute) business rules for product groups, see [Product Conditions for Shopping Campaigns](../campaign-management-service/productcondition.md#productconditions-shopping).

## <a name="refining-your-audience"></a>Refining your audience

### <a name="campaign-criteria"></a>Campaign criteria

To refine the audience by location and ad schedule, Performance Max campaigns support the following campaign level criteria.

- [DayTimeCriterion](../campaign-management-service/daytimecriterion.md)(target) campaign Criterion.
- [LocationCriterion](../campaign-management-service/locationcriterion.md) (target and exclude)
- [LocationIntentCriterion](../campaign-management-service/locationcriterion.md) (target)
- [RadiusCriterion](../campaign-management-service/radiuscriterion.md) (target)
- [Webpage](../campaign-management-service/webpage.md) (exclude)

For targets you must use the [BiddableCampaignCriterion](../campaign-management-service/biddablecampaigncriterion.md) object, although you cannot set any bid adjustment. For target exclusions, use the [NegativeCampaignCriterion](../campaign-management-service/negativecampaigncriterion.md) object.

> [!NOTE]
> Performance Max campaigns do not support any other campaign level criteria e.g., Age, Gender, Device, Product Scope, Profile, or Store criteria. To further refine your audience, you can indicate your preferences to us using [audience groups](#apply-audience-groups). Although with standard Microsoft Shopping campaigns you can filter a subset of your product catalog via the [ProductScope](../campaign-management-service/productscope.md) criterion, product scope criteria are not supported with Performance Max campaigns. You can refine the product catalog with [listing groups](#apply-listing-groups). 

Call the [AddCampaignCriterions](../campaign-management-service/addcampaigncriterions.md) operation to set the campaign level criteria.

### <a name="apply-audience-groups"></a>Apply audience groups

To give us a starting point to find customers and determine who sees your ads, you can create [AudienceGroup](../campaign-management-service/audiencegroup.md) objects under your account by calling [AddAudienceGroups](../campaign-management-service/addaudiencegroups.md). Each audience group is a collection of audience group dimensions, which can be an [AgeDimension](../campaign-management-service/agedimension.md), [GenderDimension](../campaign-management-service/genderdimension.md), or [AudienceDimension](../campaign-management-service/audiencedimension.md).  

Each asset group can be associated to one audience group. Create these associations by calling [SetAudienceGroupAssetGroupAssociations](../campaign-management-service/setaudiencegroupassetgroupassociations.md).  
