---
title: Audience Ads
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Setup Audience ads with the Bing Ads API.
---
# Audience Ads

With Audience ads, you can target ads to your ideal audience based on powerful intent signals and reach them with highly relevant messages in display, native, and video placements. These ad placements are cross-device and include premium sites like MSN, Microsoft Outlook, Microsoft 365, Microsoft Casual Games, and other partners. Clicks on these ads will take users to the landing page you specified when you created your ads.

Audience ads experiences are engaging for users, integrate naturally into page content, and deliver visually rich ads for advertisers. Audience ads are easy to set up, maintain, and optimize.

<!-- ![Audience ads](media/audience-ads.png "Audience ads")   -->

Our advertising offers, including audience marketing solutions, are anchored in the consumer audience understanding from Microsoft's audience intelligence, which includes search and web activity, LinkedIn profile data, demographic and customer data.

## <a name="responsive-audience-ads"></a>Responsive Audience Ads
For image-based Audience ads, you'll create an Audience campaign with responsive ads. Note that Microsoft Audience ads refers to the ad placement, while "responsive ad" refers to the data type that is used via the Bing Ads API for specific scenarios.

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

## <a name="feed-based-audience-ads"></a>Feed-Based Audience Ads
For feed-based Audience ads, you'll create an Audience campaign with shopping settings.

> [!NOTE]
> For details about feed-based product ads via Shopping campaigns in the Microsoft Advertising Network, see [Product Ads](product-ads.md).

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

## <a name="search-ads-extended-to-native"></a>Search Ads Extended to Native
For convenience, you can also extend search into native via image ad extensions. These ads are targeted to user intent based on various combinations of search history, page content, and past user behavior. Search ads are automatically extended to native by leveraging all your Microsoft Advertising creative elements including ad title, text, URL, and ad extensions including image extensions. The ads created using the search creative assets are then displayed to the user in native placements depending upon the surface area e.g. if a user is reading an email in Outlook then the placement will be native to the inbox environment versus if the user is clicking through a slideshow on MSN, then the ad will match the slideshow look and feel. This kind of native placement enhances user experience and delivers better engagement with the campaign.

> [!NOTE]
> Images play a key role in getting people's attention and driving clicks. You can define the imagery to use in your ads by associating Image extensions to your campaign or ad group. If you don't have Image extensions, our system may automatically use Image Annotations to increase the number of placements for your Audience ad. Image annotations are licensed stock images that are editorially reviewed for quality and relevance and then matched with appropriate ads (to opt out of Image annotations, [contact support](https://about.ads.microsoft.com/support)).

You can manage audience ads settings with either the [Bulk Service](../bulk-service/bulk-service-reference.md) or [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md). You should use the [Bulk Service](../bulk-service/bulk-service-reference.md) if you need to upload or download a high volume of entity settings. For example you can update all ad groups for your entire account in a single upload. In comparison, with the [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md) you can only update 100 ad groups per call and those ad groups must be in the same campaign. For details see the following sections.

### <a name="imageadextensions-bulkservice"></a>Image Ad Extensions with the Bulk Service
The [Bulk Service](../bulk-service/bulk-service-reference.md) service create, update, and delete operations can be completed using Bulk upload. You can use Bulk download to read back your data. For more information see [Bulk File Schema](../bulk-service/bulk-file-schema.md) and [Bulk Download and Upload](bulk-download-upload.md).

These are the Bing Ads API entities with properties for managing Audience ads that can be accessed using the [Bulk Service](../bulk-service/bulk-service-reference.md).  

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

### <a name="imageadextensions-campaignservice"></a>Image Ad Extensions with the Campaign Management Service
Audience ads can be accessed using the [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md). You can create, read, update, and delete these entities.

1. Add one to six [Image](../campaign-management-service/image.md) items to your account's media library with the [AddMedia](../campaign-management-service/addmedia.md) operation. While the minimum required for an image ad extension is one image, in order to qualify for all audience ad placements you must provide four images, where each [Image](../campaign-management-service/image.md) corresponds to one of the supported aspect ratios for image extensions. For more information about required dimensions and aspect ratios, see [Image Data Object Remarks](../campaign-management-service/image.md#remarks).  
1. Add an [ImageAdExtension](../campaign-management-service/imageadextension.md) to your account's ad extension library with the [AddAdExtensions](../campaign-management-service/addadextensions.md) operation. You will set the *ImageMediaIds* element of the [ImageAdExtension](../campaign-management-service/imageadextension.md) with the media identifiers returned from [AddMedia](../campaign-management-service/addmedia.md) in the previous step. This will link the images from your media library to a specific image ad extension. 
1. Associate your [ImageAdExtension](../campaign-management-service/imageadextension.md) to one or more [Campaign](../campaign-management-service/campaign.md) or [AdGroup](../campaign-management-service/adgroup.md) objects with the [SetAdExtensionsAssociations](../campaign-management-service/setadextensionsassociations.md) operation.

## <a name="audience-ads-reporting"></a>Performance Reports for Audience Ads
For Audience ads reporting and analysis you can use the two new Audience specific reports i.e., [AgeGenderAudienceReportRequest](../reporting-service/agegenderaudiencereportrequest.md) and [ProfessionalDemographicsAudienceReportRequest](../reporting-service/professionaldemographicsaudiencereportrequest.md). 

For reports that are not specific to Audience campaigns e.g., [KeywordPerformanceReportRequest](../reporting-service/keywordperformancereportrequest.md), you can set the [AdDistributionReportFilter](../reporting-service/addistributionreportfilter.md) to *Audience* if you only want audience ads data. You can also include the *AdDistribution* column in most performance reports. The possible values returned in the downloaded report are Search and Audience, so you can quickly discover performance data specific to Audience ads.

Performance data for audience ads will be included in existing reports by default, with a few exceptions. The [SearchQueryPerformanceReportRequest](../reporting-service/searchqueryperformancereportrequest.md) and [ShareOfVoiceReportRequest](../reporting-service/shareofvoicereportrequest.md) reports will not have Audience ads performance metrics even when ad distribution is an included column or included filter.

For more information about reporting, see [Reporting API Guides](reporting-guides.md) and [Request and Download a Report](request-download-report.md).

## See Also
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
