---
title: "Audience Ads"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Setup Audience ads with the Bing Ads API.
---
# Audience Ads
Microsoft Audience Ads appear on the [Microsoft Audience Network](https://about.ads.microsoft.com/en-us/solutions/microsoft-audience-network). These ad placements are cross-device and include premium sites like MSN, Microsoft Outlook, Microsoft Edge, and other partners (with more to come). Clicks on these ads will take users to the landing page you specified when you created your ads.

Microsoft Audience Ads is a native advertising solution optimized for search advertisers. This feature enables advertisers to get additional high-quality traffic from non-search placements. Microsoft Audience Ads experiences, such as ads placed within articles, are engaging for users, integrate naturally into page content, and deliver visually rich ads for advertisers. Microsoft Audience Ads campaigns are easy to set up, maintain, and optimize because they are fully integrated with existing Microsoft Advertising workflows.

![Audience Ads](media/audience-ads.png "Audience Ads")  

> [!NOTE]
> This feature is currently available in the United States, Canada, the United Kingdom, and Australia. If you advertise in the United States, Canada, the United Kingdom, or Australia and want to opt in to audience ads, [contact support](https://about.ads.microsoft.com/support). 

> [!TIP]
> You can prepare for the Microsoft Audience Network now by:
> - Add images via Image Extensions. By adding high-quality images, you can gain access to more volume outside of the SERP, and more high-quality clicks and conversions in brand-safe placements. All the while, you get to manage Microsoft Audience Ads in the familiar, easy-to-use Microsoft Advertising platform. 
> - Optimize Microsoft Audience Ads. You can optimize Microsoft Audience Ads by extending search campaigns and ad groups with audience ads bid adjustments. 
> - Refine your audience targeting strategy on search. Get up and running with Remarketing, In-Market Audiences (in pilot) and Custom Audiences (in pilot). That way an audience targeting strategy will be ready to go with separate audience campaigns if you choose to run them later. 
> - Implement and update your UET tag. Ensure you're ready to use the Product Audiences targeting dimension with new parameters – available as part of the audience campaigns pilot. 

Intent data from search can be used outside of search to create a powerful match between the user's intent and your offering.
- User intent targeting e.g., Remarketing in paid search, In-market​ audiences​, Custom audiences, and Product audiences (Coming soon with [Audience campaigns](#audience-campaigns)).
- User profile targeting​ e.g., Professional profile targeting via LinkedIn (Coming soon with [Audience campaigns](#audience-campaigns)), Age and gender​ targeting​
- Location and device​ targeting

Our advertising offers, including audience marketing solutions, are anchored in the consumer audience understanding provided by the Microsoft Graph. The Microsoft Graph data sets include search and web activity, LinkedIn profile data, demographic and customer data. 

There are two great ways to run Microsoft Audience Ads:
1. For convenience, you can extend existing Search campaigns with image ad extensions and audience ads bid adjustments. 
2. With Audience campaigns you will have control to separate your budgets, ads, and bids from Search campaigns.

![Microsoft Advertising Buying Platform](media/bing-ads-buying-platform.png "Microsoft Advertising Buying Platform")  

The Microsoft Audience Network supports three ad formats: image-based ads, text ads and feed-based ads. For convenience, you can extend existing [Search campaigns](#search-campaigns) with image ad extensions and audience ads bid adjustments. With [Audience campaigns](#audience-campaigns) you will have control to separate your budgets, ads, and bids from search campaigns.
- Bing search ads in the Microsoft Advertising Network: For example, create a [Search campaign](#search-campaigns), expanded text ads and image ad extensions. 
- Bing search ads in the Microsoft Audience Network: For example, create a [Search campaign](#search-campaigns), expanded text ads and image ad extensions. In addition, set the audience ads bid adjustment to indicate whether you prefer audience ads for the campaign or ad group. 
- Microsoft Audience Ads (image-based) in the Microsoft Audience Network: For example, create an [Audience campaign](#audience-campaigns) and responsive ads. Note that Microsoft Audience Ads refers to the ad placement, while "responsive ad" refers to the data type that is used via the Bing Ads API for specific scenarios. 
- Microsoft Audience Ads (feed-based) in the Microsoft Audience Network: For example, create an [Audience campaign](#audience-campaigns) with a Microsoft Shopping Campaigns setting. 

## <a name="audience-campaigns"></a>Audience Campaigns
For image-based or feed-based ads in the Microsoft Audience Network, you'll need to be enabled for Audience campaigns. With Audience campaigns you will have control to separate your budgets, ads, and bids from search campaigns. 

### <a name="responsive-audience-ads"></a>Responsive Audience Ads
For image-based Audience Ads in the Microsoft Audience Network you'll create an Audience campaign with responsive ads. Note that Microsoft Audience Ads refers to the ad placement, while "responsive ad" refers to the data type that is used via the Bing Ads API for specific scenarios.

1. Create the [Campaign](../campaign-management-service/campaign.md)
   - The CampaignType must be set to Audience.
   - The Languages list must include All.
1. Create the [AdGroup](../campaign-management-service/adgroup.md)
   - The Language and Network are not applicable for ad groups in Audience campaigns and cannot be set.
   - Include a [TargetSetting](../campaign-management-service/targetsetting.md) with one [TargetSettingDetail](../campaign-management-service/targetsettingdetail.md) for each [CriterionTypeGroup](../campaign-management-service/criteriontypegroup.md) that you will use. Your target criteria might change over time, so you can always go back to add or update the ad group setting later.
1. Add images via [AddMedia](../campaign-management-service/addmedia.md) that will be used later with your ad. At miniumum you'll need to add one landscape (wide) image. For more information about required dimensions and aspect ratios, see [Image Data Object Remarks](../campaign-management-service/image.md#remarks).  
1. Create the [ResponsiveAd](../campaign-management-service/responsivead.md) with image assets via the [Images](../campaign-management-service/responsivead.md#images) element.  
1. Add age, company name, gender, industry, job function, location, or radius criteria for the ad group e.g., via [AddAdGroupCriterions](../campaign-management-service/addadgroupcriterions.md). 
1. Retrieve the [AdGroup](../campaign-management-service/adgroup.md) e.g., via [GetAdGroupsByIds](../campaign-management-service/getadgroupsbyids.md) and make sure the PrivacyStatus is Active. If your targeting is too narrow then you'll need to include more targeting dimensions e.g., a broader set of industries or locations. 

### <a name="feed-based-audience-ads"></a>Feed-Based Audience Ads
For feed-based Audience Ads in the Microsoft Audience Network you'll create an Audience campaign with shopping settings. 

> [!NOTE]
> For details about feed-based product ads via Microsoft Shopping Campaigns in the Microsoft Advertising Network, see [Product Ads](product-ads.md). 

1. Set up the customer's Microsoft Merchant Center store. In the Microsoft Advertising web application, click **Tools** &gt; **Microsoft Merchant Center**. Click on **Create store** and provide the requested store details. For information about setting up your store catalog, see [Create a Microsoft Merchant Center store](https://help.ads.microsoft.com/#apex/3/en/51085/1-500) and [How is the feed file organized](https://help.ads.microsoft.com/#apex/3/en/51084/1).
1. Create a [product catalog](https://help.ads.microsoft.com/#apex/3/en/51105/1-500), and then submit the catalog feed via [FTP/SFTP](https://help.ads.microsoft.com/#apex/ads/en/56838/1) or the [Content API](/advertising/shopping-content/index).
1. Get your Microsoft Merchant Center store unique system identifier. Call [GetBMCStoresByCustomerId](../campaign-management-service/getbmcstoresbycustomerid.md) and get the *StoreId* from of one of the returned [BMCStore](../campaign-management-service/bmcstore.md) objects, or in the Microsoft Advertising web application, click **Tools** &gt; **Microsoft Merchant Center** to access your store details.
1. Create the Campaign
   - The CampaignType must be set to Audience.
   - The Languages list must include All.
   - Include a [ShoppingSetting](../campaign-management-service/shoppingsetting.md) and set its *StoreId* element.
1. Create the [AdGroup](../campaign-management-service/adgroup.md)
   - The Language and Network are not applicable for ad groups in Audience campaigns and cannot be set.
   - Include a TargetSetting with one TargetSettingDetail for each CriterionTypeGroup that you will use. Your target criteria might change over time, so you can always go back to add or update the ad group setting later. 
1. Optionally, you can create a [ProductScope](../campaign-management-service/productscope.md) criterion via [AddCampaignCriterions](../campaign-management-service/addcampaigncriterions.md) that will be associated with your Microsoft Shopping campaign. Use the product scope criterion to include a subset of your product catalog, for example a specific brand or product type. A campaign can only be associated with one [ProductScope](../campaign-management-service/productscope.md), which contains a list of up to 7 [ProductCondition](../campaign-management-service/productcondition.md). 
1. Add age, audience, company name, gender, industry, job function, location, or radius criteria for the ad group e.g., via [AddAdGroupCriterions](../campaign-management-service/addadgroupcriterions.md). 
1. Retrieve the [AdGroup](../campaign-management-service/adgroup.md) e.g., via [GetAdGroupsByIds](../campaign-management-service/getadgroupsbyids.md) and make sure the PrivacyStatus is Active. If your targeting is too narrow then you'll need to include more targeting dimensions e.g., a broader set of industries or locations. 

## <a name="search-campaigns"></a>Search Campaigns
For convenience, Audience ads are also available as an extension of search network via image ad extensions, and are targeted to user intent based on various combinations of search history, page content, and past user behavior. Audience ads on the search network are created automatically by Microsoft Advertising leveraging all of your Microsoft Advertising creative elements including ad title, text, URL, and ad extensions including image extensions. The ads created using the search creative assets are then displayed to the user in native placements depending upon the surface area e.g. if a user is reading an email in Outlook then the placement will be native to the inbox environment versus if the user is clicking through a slideshow on MSN, then the ad will match the slideshow look and feel. This kind of native placement enhances user experience and delivers better engagement with the campaign. 

> [!NOTE]
> Images play a key role in getting people's attention and driving clicks. You can define the imagery to use in your ads by associating Image Extensions to your campaign or ad group. If you don't have Image Extensions, our system may automatically use Image Annotations to increase the number of placements for your Microsoft Audience Ad. Image Annotations are licensed stock images that are editorially reviewed for quality and relevance and then matched with appropriate ads (to opt out of Image Annotations, [contact support](https://about.ads.microsoft.com/support)).

You can manage audience ads settings with either the [Bulk Service](../bulk-service/bulk-service-reference.md) or [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md). You should use the [Bulk Service](../bulk-service/bulk-service-reference.md) if you need to upload or download a high volume of entity settings. For example you can update all ad groups for your entire account in a single upload. In comparison, with the [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md) you can only update 100 ad groups per call and those ad groups must be in the same campaign. For details see the following sections.

### <a name="imageadextensions-bulkservice"></a>Image Ad Extensions with the Bulk Service
The [Bulk Service](../bulk-service/bulk-service-reference.md) service create, update, and delete operations can be completed using Bulk upload. You can use Bulk download to read back your data. For more information see [Bulk File Schema](../bulk-service/bulk-file-schema.md) and [Bulk Download and Upload](bulk-download-upload.md).

These are the Bing Ads API entities with properties for managing Audience ads that can be accessed using the [Bulk Service](../bulk-service/bulk-service-reference.md). Use the *Bid Adjustment* column of the following records to get and set the Audience Ads bid adjustment.

- [Campaign](../bulk-service/campaign.md)  
- [Ad Group](../bulk-service/ad-group.md)  
- [Image Ad Extension](../bulk-service/image-ad-extension.md)  
- [Campaign Image Ad Extension](../bulk-service/campaign-image-ad-extension.md)  
- [Ad Group Image Ad Extension](../bulk-service/ad-group-image-ad-extension.md)  

For example you can follow these steps to set up an image ad extension for audience ads.

> [!NOTE]
> You can use the [Bulk Service](../bulk-service/bulk-service-reference.md) for most steps, but you will still need to use the [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md) to add media to your account's media library.

1. Add one to six [Image](../campaign-management-service/image.md) items to your account's media library with the [AddMedia](../campaign-management-service/addmedia.md) operation. While the minimum required for an image ad extension is one image, in order to qualify for all audience ad placements you must provide four images, where each [Image](../campaign-management-service/image.md) corresponds to one of the supported aspect ratios for image extensions. For more information about required dimensions and aspect ratios, see [Image Data Object Remarks](../campaign-management-service/image.md#remarks).  
1. Upload an [Image Ad Extension](../bulk-service/image-ad-extension.md) record to your account's ad extension library. You will set the *Media Ids* field of the [Image Ad Extension](../bulk-service/image-ad-extension.md) record with the media identifiers returned from [AddMedia](../campaign-management-service/addmedia.md) in the previous step. This will link the images from your media library to a specific image ad extension.
1. Associate your [Image Ad Extension](../bulk-service/image-ad-extension.md) record to one or more [Campaign](../bulk-service/campaign.md) or [Ad Group](../bulk-service/ad-group.md) records by uploading the corresponding [Campaign Image Ad Extension](../bulk-service/campaign-image-ad-extension.md) or [Ad Group Image Ad Extension](../bulk-service/ad-group-image-ad-extension.md) records.
1. Optionally use the *Bid Adjustment* column of the [Campaign](../bulk-service/campaign.md) and [Ad Group](../bulk-service/ad-group.md) records to get and set the audience ads bid adjustment.

### <a name="imageadextensions-campaignservice"></a>Image Ad Extensions with the Campaign Management Service
Bing Audience ads can be accessed using the [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md). You can create, read, update, and delete these entities.

1. Add one to six [Image](../campaign-management-service/image.md) items to your account's media library with the [AddMedia](../campaign-management-service/addmedia.md) operation. While the minimum required for an image ad extension is one image, in order to qualify for all audience ad placements you must provide four images, where each [Image](../campaign-management-service/image.md) corresponds to one of the supported aspect ratios for image extensions. For more information about required dimensions and aspect ratios, see [Image Data Object Remarks](../campaign-management-service/image.md#remarks).  
1. Add an [ImageAdExtension](../campaign-management-service/imageadextension.md) to your account's ad extension library with the [AddAdExtensions](../campaign-management-service/addadextensions.md) operation. You will set the *ImageMediaIds* element of the [ImageAdExtension](../campaign-management-service/imageadextension.md) with the media identifiers returned from [AddMedia](../campaign-management-service/addmedia.md) in the previous step. This will link the images from your media library to a specific image ad extension. 
1. Associate your [ImageAdExtension](../campaign-management-service/imageadextension.md) to one or more [Campaign](../campaign-management-service/campaign.md) or [AdGroup](../campaign-management-service/adgroup.md) objects with the [SetAdExtensionsAssociations](../campaign-management-service/setadextensionsassociations.md) operation.
1. Optionally use the *AudienceAdsBidAdjustment* property of the [Campaign](../campaign-management-service/campaign.md) and [AdGroup](../campaign-management-service/adgroup.md) to get and set the audience ads bid adjustment.

## <a name="audience-ads-reporting"></a>Performance Reports for Audience Ads
For Audience ads reporting and analysis you can use the two new Audience specific reports i.e., [AgeGenderAudienceReportRequest](../reporting-service/agegenderaudiencereportrequest.md) and [ProfessionalDemographicsAudienceReportRequest](../reporting-service/professionaldemographicsaudiencereportrequest.md). 

For reports that are not specific to Audience campaigns e.g., [KeywordPerformanceReportRequest](../reporting-service/keywordperformancereportrequest.md), you can set the [AdDistributionReportFilter](../reporting-service/addistributionreportfilter.md) to *Audience* if you only want audience ads data. You can also include the *AdDistribution* column in most performance reports. The possible values returned in the downloaded report are Search and Audience, so you can quickly discover performance data specific to Audience ads.

Performance data for audience ads will be included in existing reports by default, with a few exceptions. The [SearchQueryPerformanceReportRequest](../reporting-service/searchqueryperformancereportrequest.md) and [ShareOfVoiceReportRequest](../reporting-service/shareofvoicereportrequest.md) reports will not have Audience Ads performance metrics even when ad distribution is an included column or included filter.

For more information about reporting, see [Reporting API Guides](reporting-guides.md) and [Request and Download a Report](request-download-report.md).

## See Also
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
