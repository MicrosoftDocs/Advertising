---
title: "Smart Shopping Campaigns"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Setup Smart Shopping Campaigns.
---
# Smart Shopping Campaigns
Automatically optimize your shopping campaigns to target customers who are more likely to convert at higher revenue values with smart shopping campaigns. By using a combination of traditional shopping campaigns, automated bidding and targeting, smart shopping helps you get the right ad to the right user, at the right time – at scale! 

Setting your business goals and targets provides context to automatically adjust bids and shopping ads delivery to help optimize your campaigns. This, in turn, can help increase revenue and meet return on ad spend (ROAS) targets. 

> [!NOTE]
> Smart shopping campaigns are only available for pilot customers ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 718).  

Smart shopping campaigns use the Maximize Conversion Value bid strategy (where Microsoft Advertising automatically sets your bids in real time to maximize total conversion value within your budget) and automated targeting to maximize overall revenue numbers with an option to define return on ad spend (ROAS) targets. 

Smart shopping campaigns automate bids and ads delivery based on customer signals to help create a more personalized shopping experience. 

> [!NOTE] 
> Smart shopping campaigns do not support negative keywords, website exclusions, IP exclusions, audience targets, or audience exclusions. 

## <a name="uettag-conversiongoal"></a>UET Tag and Conversion Goal
Create a [UET tag](../campaign-management-service/uettag.md) and add the tracking script to your website. The additional code needed to track variable revenue data (or fixed revenue > 0) is required for smart shopping campaigns, so be sure to have it created and added to your website before you begin creating your smart shopping campaign.  

> [!NOTE] 
> Universal event tracking is not required if you have an [OfflineConversionGoal](../campaign-management-service/offlineconversiongoal.md) and upload offline conversions. 

Variable revenue tracking is available via [EventGoal](../campaign-management-service/eventgoal.md) and [UrlGoal](../campaign-management-service/urlgoal.md), so you'll need to create and leverage at least one of those conversion goals.  

For more information see [Universal Event Tracking](universal-event-tracking.md). 

## <a name="setup-bmc"></a>Setup Microsoft Merchant Center
First you'll need to set up your own Microsoft Merchant Center store with a product catalog. 

1. In the Microsoft Advertising web application, click **Tools** &gt; **Microsoft Merchant Center**. Click on **Create store** and provide the requested store details. For information about setting up your store catalog, see [Create a Microsoft Merchant Center store](https://help.ads.microsoft.com/#apex/3/en/51085/1-500) and [How is the feed file organized](https://help.ads.microsoft.com/#apex/3/en/51084/1).

1. [Create a product catalog](https://help.ads.microsoft.com/#apex/3/en/51105/1-500), and then submit the catalog feed via [FTP/SFTP](https://help.ads.microsoft.com/#apex/ads/en/56838/1) or the [Content API](/advertising/shopping-content/index). Be sure send updated data at least every 30 days.  

1. You can get your Microsoft Merchant Center store identifier in the Microsoft Advertising web application via **Tools** &gt; **Microsoft Merchant Center**. Otherwise you can call the [GetBMCStoresByCustomerId](../campaign-management-service/getbmcstoresbycustomerid.md) operation to get the [StoreId](../campaign-management-service/bmcstore.md#id).   

    ```xml
    <GetBMCStoresByCustomerIdResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
        <BMCStores xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
            <BMCStore>
                <HasCatalog>true</HasCatalog>
                <Id>StoreIdGoesHere</Id>
                <IsActive>true</IsActive>
                <IsProductAdsEnabled>true</IsProductAdsEnabled>
                <Name>My MMC Store</Name>
                <SubType i:nil="true"/>
            </BMCStore>
        </BMCStores>
    </GetBMCStoresByCustomerIdResponse>
    ```

## <a name="campaign-campaignservice"></a>Create the campaign
You can create a smart shopping [campaign](../campaign-management-service/campaign.md) with the [AddCampaigns](../campaign-management-service/addcampaigns.md) operation. You can create a maximum of 100 smart shopping campaigns per ad account. 

- The [CampaignType](../campaign-management-service/campaign.md#campaigntype) must be set to *Shopping*. 

- The [SubType](../campaign-management-service/campaign.md#subtype) must be set to *ShoppingSmartAds*. If the sub type is not set, the campaign will be a standard Microsoft shopping campaign. 

- The [BiddingScheme](../campaign-management-service/campaign.md#biddingscheme) must be either null or set to [MaxConversionValueBiddingScheme](../campaign-management-service/maxconversionvaluebiddingscheme.md) with optional [TargetRoas](../campaign-management-service/maxconversionvaluebiddingscheme.md#targetroas). Smart shopping campaigns use the Maximize Conversion Value bid strategy (where Microsoft Advertising automatically sets your bids in real time to maximize total conversion value within your budget) and automated targeting to maximize overall revenue numbers with an option to define return on ad spend (ROAS) targets.  

- You must set the [DailyBudget](../campaign-management-service/campaign.md#dailybudget). Shared budget is not supported with smart shopping campaigns.  

- You must include a [ShoppingSetting](../campaign-management-service/shoppingsetting.md) in the list of campaign [Settings](../campaign-management-service/campaign.md#settings). You must set the [Priority](../campaign-management-service/shoppingsetting.md#priority) to 3; Set the [StoreId](../campaign-management-service/shoppingsetting.md#storeid) to one of your [Microsoft Merchant Center](#setup-bmc) store identifiers.   

Here's an example [AddCampaigns](../campaign-management-service/addcampaigns.md) SOAP request with smart shopping campaign settings. 

```xml
<AddCampaignsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <AccountId>AdAccountIdGoesHere</AccountId>
    <Campaigns xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
        <Campaign>
            <BiddingScheme i:type="MaxConversionValueBiddingScheme">
                <TargetRoas>2</TargetRoas>
            </BiddingScheme>
            <BudgetType>DailyBudgetStandard</BudgetType>
            <DailyBudget>50</DailyBudget>
            <Name>Women's Shoes</Name>
            <SubType>ShoppingSmartAds</SubType>
            <TimeZone>PacificTimeUSCanadaTijuana</TimeZone>
            <CampaignType>Shopping</CampaignType>
            <Settings>
                <Setting i:type="ShoppingSetting">
                    <Priority>3</Priority>
                    <SalesCountryCode>US</SalesCountryCode>
                    <StoreId>StoreIdGoesHere</StoreId>
                </Setting>
            </Settings>
            <Languages xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
                <a:string>All</a:string>
            </Languages>
        </Campaign>
    </Campaigns>
</AddCampaignsRequest>
```

## <a name="campaigncriteria-campaignservice"></a>Campaign criteria
To refine the audience by location and ad schedule, smart shopping campaigns support the following campaign level criteria. 
- [DayTimeCriterion](../campaign-management-service/daytimecriterion.md) (target) campaign Criterion. 
- [LocationCriterion](../campaign-management-service/locationcriterion.md) (target and exclude)
- [LocationIntentCriterion](../campaign-management-service/locationintentcriterion.md) (target)
- [RadiusCriterion](../campaign-management-service/radiuscriterion.md) (target)

For targets you must use the [BiddableCampaignCriterion](../campaign-management-service/biddablecampaigncriterion.md) object, although you cannot set any bid adjustment. For target exclusions, use the [NegativeCampaignCriterion](../campaign-management-service/negativecampaigncriterion.md) object. 

> [!NOTE]
> Smart shopping campaigns do not support any other campaign level criteria e.g., Age, Gender, Device, Product Scope, Profile, or Store criteria. Although with standard Microsoft Shopping campaigns you can filter a subset of your product catalog via the [ProductScope](../campaign-management-service/productscope.md) criterion, product scope critera are not supported with smart shopping campaigns. You can refine the product catalog with [product groups](#productgroups-campaignservice). 

Call the [AddCampaignCriterions](../campaign-management-service/addcampaigncriterions.md) operation to set the campaign level criteria. 

```xml
<AddCampaignCriterionsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <CampaignCriterions xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
        <CampaignCriterion i:type="BiddableCampaignCriterion">
            <CampaignId>CampaignIdGoesHere</CampaignId>
            <Criterion i:type="LocationCriterion">
                <Type>LocationCriterion</Type>
                <LocationId>190</LocationId>
            </Criterion>
            <CriterionBid i:nil="true"/>
        </CampaignCriterion>
        <CampaignCriterion i:type="BiddableCampaignCriterion">
            <CampaignId>CampaignIdGoesHere</CampaignId>
            <Criterion i:type="DayTimeCriterion">
                <Type>DayTimeCriterion</Type>
                <Day>Monday</Day>
                <FromHour>8</FromHour>
                <FromMinute>Zero</FromMinute>
                <ToHour>20</ToHour>
                <ToMinute>Zero</ToMinute>
            </Criterion>
            <CriterionBid i:nil="true"/>
        </CampaignCriterion>
    </CampaignCriterions>
    <CriterionType>Targets</CriterionType>
</AddCampaignCriterionsRequest>
```

## <a name="adgroup-campaignservice"></a>Create the ad group
You must create exactly one [AdGroup](../campaign-management-service/adgroup.md) in each smart shopping campaign by calling the [AddAdGroups](../campaign-management-service/addadgroups.md) operation. 

The following validation rules are unique to smart shopping campaigns, and do not apply to standard Microsoft shopping campaigns: 

- The BiddingScheme element must either be null or InheritFromParentBiddingScheme.  
- The Network element must be null and will always default to OwnedAndOperatedAndSyndicatedSearch. 

```xml
<AddAdGroupsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <CampaignId>CampaignIdGoesHere</CampaignId>
    <AdGroups xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
        <AdGroup>
            <CpcBid>
                <Amount>0.50</Amount>
            </CpcBid>
            <Name>Women's Red Shoe Sale</Name>
        </AdGroup>
    </AdGroups>
    <ReturnInheritedBidStrategyTypes>false</ReturnInheritedBidStrategyTypes>
</AddAdGroupsRequest>
```

## <a name="productgroups-campaignservice"></a>Apply product groups
Within the ad group, create a list of product groups in a tree structure that will be used to further refine the product catalog offers. Apply the list of [AdGroupCriterionAction](../campaign-management-service/adgroupcriterion.md) objects by calling [ApplyProductPartitionActions](../campaign-management-service/applyproductpartitionactions.md). 

For more details about Product Condition (operand) and Product Value (attribute) business rules for product groups, see [Product Conditions for Shopping Campaigns](../campaign-management-service/productcondition.md#productconditions-shopping). 

> [!NOTE]
> Smart shopping campaigns do not support any other ad group level criteria e.g., Age, Gender, DayTime, Device, Location, Profile, or Radius criteria. 

```xml
<ApplyProductPartitionActionsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <CriterionActions xmlns:i="http://www.w3.org/2001/XMLSchema-instance">        
    <AdGroupCriterionAction>
        <Action>Add</Action>
        <AdGroupCriterion i:type="BiddableAdGroupCriterion">
        <AdGroupId>AdGroupIdGoesHere</AdGroupId>
        <Criterion i:type="ProductPartition">
            <Type i:nil="true"/>
            <Condition>
                <Attribute i:nil="true"/>
                <Operand>All</Operand>
            </Condition>
            <ParentCriterionId i:nil="true"/>
            <PartitionType>Subdivision</PartitionType>
        </Criterion>
        <Id>-1</Id>
        </AdGroupCriterion>
    </AdGroupCriterionAction>
    <AdGroupCriterionAction>
        <Action>Add</Action>
        <AdGroupCriterion i:type="BiddableAdGroupCriterion">
        <AdGroupId>AdGroupIdGoesHere</AdGroupId>
        <Criterion i:type="ProductPartition">
            <Type i:nil="true"/>
            <Condition>
                <Attribute>Animals &amp; Pet Supplies</Attribute>
                <Operand>CategoryL1</Operand>
            </Condition>
            <ParentCriterionId>-1</ParentCriterionId>
            <PartitionType>Unit</PartitionType>
        </Criterion>
        <Id>-2</Id>
        <Status i:nil="true"/>
        <Type i:nil="true"/>
        <CriterionBid i:type="FixedBid">
            <Type>FixedBid</Type>
            <Amount>0.45</Amount>
        </CriterionBid>
        </AdGroupCriterion>
    </AdGroupCriterionAction>
    <AdGroupCriterionAction>
        <Action>Add</Action>
        <AdGroupCriterion i:type="BiddableAdGroupCriterion">
        <AdGroupId>AdGroupIdGoesHere</AdGroupId>
        <Criterion i:type="ProductPartition">
            <Type i:nil="true"/>
            <Condition>
                <Attribute i:nil="true"/>
                <Operand>CategoryL1</Operand>
            </Condition>
            <ParentCriterionId>-1</ParentCriterionId>
            <PartitionType>Unit</PartitionType>
        </Criterion>
        <Id>-3</Id>
        <Status i:nil="true"/>
        <Type i:nil="true"/>
        <CriterionBid i:type="FixedBid">
            <Type>FixedBid</Type>
            <Amount>0.45</Amount>
        </CriterionBid>
        </AdGroupCriterion>
    </AdGroupCriterionAction>
    </CriterionActions>
</ApplyProductPartitionActionsRequest>
```

## <a name="ads-campaignservice"></a>Create the ads
You must add exactly one [ProductAd](../campaign-management-service/productad.md) to the ad group. Product ads are shown to users on the Search network. A product ad is not used directly for delivered ad copy. Instead, Microsoft Advertising generates product ads from the product details that it finds in your Microsoft Merchant Center store's product catalog. The product ad identifier can be used for reporting analytics. Use [Merchant Promotions](https://help.ads.microsoft.com/#apex/3/en/56805/0) if you want tags to appear at the bottom of your product ad as "special offer" links, helping to increase customer engagement. For more information about product ads see the API [technical guide](product-ads.md) and Microsoft Advertising [help article](https://help.ads.microsoft.com/#apex/3/en/51082/1). 

> [!NOTE]
> The Microsoft Audience network does not yet support responsive ads from smart shopping campaigns. Customers in the feature pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 777) will be able to add exactly one [ResponsiveAd](../campaign-management-service/responsivead.md). Audience ads (responsive ads via API) are shown to users on the Microsoft Audience network. For more information about audience ads (responsive ads via API) see the API [technical guide](audience-ads.md) and Microsoft Advertising [help article](https://help.ads.microsoft.com/#apex/3/en/56674/0).

You can create both ad types together or separately via the [AddAds](../campaign-management-service/addads.md) operation.

```xml
<AddAdsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <AdGroupId>AdGroupIdGoesHere</AdGroupId>
    <Ads xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
        <Ad i:type="ProductAd">					
            <PromotionalText i:nil="true"/>
        </Ad>
        <Ad i:type="ResponsiveAd">
            <FinalUrls xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
                <a:string>https://www.contoso.com/womenshoesale</a:string>
            </FinalUrls>
            <BusinessName>Contoso</BusinessName>
            <CallToAction>AddToCart</CallToAction>
            <Headline>Fast &amp; Easy Setup</Headline>
            <Images>
                <AssetLink>
                    <Asset i:type="ImageAsset">
                        <Id>ImageMediaIdGoesHere</Id>
                        <Name>My LandscapeImageMedia</Name>
                        <SubType>LandscapeImageMedia</SubType>
                    </Asset>
                </AssetLink>
            </Images>
            <LongHeadlineString>Find New Customers &amp; Increase Sales!</LongHeadlineString>
            <Text>Find New Customers &amp; Increase Sales! Start Advertising on Contoso Today.</Text>
        </Ad>
    </Ads>
</AddAdsRequest>
```

Responsive ads also require at least one image asset. If you don't already have images available, you can upload [Image](../campaign-management-service/image.md) data by calling the [AddMedia](../campaign-management-service/addmedia.md) operation. 

```xml
<AddMediaRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <AccountId>AdAccountIdGoesHere</AccountId>
    <Media xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
        <Media i:type="Image">
            <MediaType>Image191x100</MediaType>
            <Type>Image</Type>
            <Data>MediaDataGoesHere</Data>
        </Media>
    </Media>
</AddMediaRequest>
```

## See Also
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
