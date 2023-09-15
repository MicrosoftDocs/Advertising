---
title: "Product Ads"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Setup Product ads with the Bing Ads API.
---
# Product Ads
A Microsoft Shopping campaign enables you to advertise the products from your Microsoft Merchant Center store product catalog. Product ads from a Microsoft Shopping campaign include details about the product, an image, and optional promotional text. 

> [!NOTE]
> Microsoft Shopping Campaigns and product ads are available in Albania, Algeria, Andorra, Argentina, Armenia, Australia, Austria, Azerbaijan, Bahrain, Belgium, Bosnia and Herzegovina, Brazil, Bulgaria, Canada, Chile, Colombia, Croatia, Cyprus, Czech, Democratic Republic of the Congo, Denmark, Egypt, Estonia, Ethiopia, Finland, France, Georgia, Germany, Greece, Guinea, Hong Kong SAR, Hungary, Iceland, India, Indonesia, Iraq, Ireland, Israel, Italy, Japan, Kyrgyzstan, Latvia, Lesotho, Libya, Liechtenstein, Lithuania, Luxembourg, North Macedonia, Madagascar, Malawi, Malaysia, Malta, Mauritania, Mauritius, Mexico, Moldova, Monaco, Montenegro, Namibia, Netherlands, New Zealand, Nigeria, Norway, Oman, Pakistan, Peru, Philipines, Poland, Portugal, Qatar, Reunion, Romania, San Marino, Saudi Arabia, Serbia, Seychelles, Singapore, Slovakia, Slovenia, South Africa, Spain, Sweden, Switzerland, Taiwan, Tajikistan, Tanzania, Thailand, The Gambia, Togo, Türkiye, United Arab Emirates, United Kingdom, United States, Vatican, Venezuela, Vietnam, Yemen, and Zimbabwe.

> [!NOTE]
> Microsoft Shopping Campaigns and product ads are available for pilot customers in Aruba, Bahamas, Bangladesh, Bolivia, Brunei, Cayman Islands, Costa Rica, Dominica, Dominican Republic, Ecuador, El Salvador, Fiji, French Guiana, French Polynesia, Guam, Guatemala, Guyana, Haiti, Honduras, Maldives, Martinique, Mongolia, Montserrat, Nepal, New Caledonia, Panama, Papua New Guinea, Paraguay, Puerto Rico, Sri Lanka, Trinidad and Tobago, and Uruguay.

You can manage Bing Shopping settings with either the [Bulk Service](../bulk-service/bulk-service-reference.md) or [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md). You should use the [Bulk Service](../bulk-service/bulk-service-reference.md) if you need to upload or download a high volume of entity settings. For example you can update all ad groups for your entire account in a single upload. In comparison, with the [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md) you can only update 100 ad groups per call and those ad groups must be in the same campaign. For details see the following sections. 

## <a name="setup"></a>Setup Microsoft Shopping Campaigns
You can run Microsoft Shopping Campaigns for [your own](#setup-bmc) Microsoft Merchant Center store, or bid via Shopping Campaigns for Brands in [your partner's](#setup-cooperative) Microsoft Merchant Center store. 

### <a name="setup-bmc"></a>Setup Microsoft Merchant Center
To set up your own Microsoft Merchant Center store with a catalog that can be used with Microsoft Shopping Campaigns, follow these steps.
1. Set up the customer's Microsoft Merchant Center store. In the Microsoft Advertising web application, click **Tools** &gt; **Microsoft Merchant Center**. Click on **Create store** and provide the requested store details. For information about setting up your store catalog, see [Create a Microsoft Merchant Center store](https://help.ads.microsoft.com/#apex/3/en/51085/1-500) and [How is the feed file organized](https://help.ads.microsoft.com/#apex/3/en/51084/1).

2. [Create a product catalog](https://help.ads.microsoft.com/#apex/3/en/51105/1-500), and then submit the catalog feed via [FTP/SFTP](https://help.ads.microsoft.com/#apex/ads/en/56838/1) or the [Content API](/advertising/shopping-content/index).

3. Get your Microsoft Merchant Center store unique system identifier. Call [GetBMCStoresByCustomerId](../campaign-management-service/getbmcstoresbycustomerid.md) and get the *StoreId* from of one of the returned [BMCStore](../campaign-management-service/bmcstore.md) objects, or in the Microsoft Advertising web application, click **Tools** &gt; **Microsoft Merchant Center** to access your store details.

4. Follow the steps to Create a Microsoft Shopping campaign with the [Bulk Service](#bingshopping-bulkservice) or [Campaign Management Service](#bingshopping-campaignservice).

### <a name="setup-cooperative"></a>Setup Shopping Campaigns for Brands
In Microsoft Shopping Campaigns for Brands, two partners share the cost of advertising as they work to drive product sales through certain channels. Typically, these two partners are manufacturers and retailers (or ad agencies and their clients) who have merchandising agreements with one another.  

Let's say you manufacture widgets, and Contoso is one of your many authorized dealers. Contoso wants to feature your widgets during their upcoming sale. They've approached you to partner on a marketing blitz of targeted ads designed to drive widget sales and conversions on their website. In partnership, you both agree to share the cost of clicks on a promoted product through your own ad group and your partner's own ad group. 

> [!NOTE]
> Shopping Campaigns for Brands are only available in the United States and United Kingdom and are currently under open beta for pilot customers ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 684).  

Both the manufacturer and the retailer have key roles in setting up Shopping Campaigns for Brands. Manufactures must upload a product list with Brand, GTIN, and MPN only. Retailers must grant their partners access to their Microsoft Merchant Center store, which is the gateway to a sales channel. Both manufacturers and retailers are then able to bid on the shared list of goods in the product feed through ad groups.
To set up Shopping Campaigns for Brands for your partner's Microsoft Merchant Center store with Microsoft Shopping Campaigns, follow these steps.

1. In the Microsoft Advertising [web application](https://ads.microsoft.com/), create a product feed and link to your partner's Microsoft Merchant Center store as described in this [help article](https://help.ads.microsoft.com/#apex/3/en/60004/-1/en/#ext:Default). Put simply, a product feed is a list of items you're promoting with a third party. Typically, a manufacturer or an advertising client is responsible for this step. A product feed contains a list of product attributes, such as Brand, GTIN, and MPN. Once you have your product feed, you'll need access to your retail partner's Microsoft Merchant Center store. Once you have access, keep in mind that you won't be able to see all of the products in your partner's store. You'll only see the products that are a direct match of the items in your product feed. 

2. Follow the steps to Create a Microsoft Shopping campaign with the [Bulk Service](#bingshopping-bulkservice) or [Campaign Management Service](#bingshopping-campaignservice). Please take note of the additional settings available to support shopping campaigns for brands. 
    - When you retrieve Microsoft Merchant Center stores via [GetBMCStoresByCustomerId](../campaign-management-service/getbmcstoresbycustomerid.md), the [SubType](../campaign-management-service/bmcstore.md#subtype) element of the returned [BMCStore](../campaign-management-service/bmcstore.md) must be set to [CoOp](../campaign-management-service/bmcstoresubtype.md#coop) or [GlobalStore](../campaign-management-service/bmcstoresubtype.md#globalstore) in order to be eligible for Shopping Campaigns for Brands. 
    - With Shopping Campaigns for Brands a single campaign can target all your retailer partners, and there's no need to create individual campaigns for each retailer. We recommend that you set the [StoreId](../campaign-management-service/shoppingsetting.md#storeid) to the ID of your manager account's global store (store [SubType](../campaign-management-service/bmcstore.md#subtype) set to [GlobalStore](../campaign-management-service/bmcstoresubtype.md#globalstore)).  By initially targeting all linked stores via the campaign shopping setting, you can then add up to 10 campaign negative [StoreCriterion](../campaign-management-service/storecriterion.md) to exclude specific retailers as needed.  
    - Optionally you can exclude stores by setting a negative store criterion. Each campaign can have a maximum of 10 excluded stores. For Bulk API details see [Campaign Negative Store Criterion](../bulk-service/campaign-negative-store-criterion.md). For Campaign Management API details see [StoreCriterion](../campaign-management-service/storecriterion.md), [NegativeCampaignCriterion](../campaign-management-service/negativecampaigncriterion.md), and [AddCampaignCriterions](../campaign-management-service/addcampaigncriterions.md). You cannot exclude the global store. 
    - The campaign subtype must be set to ShoppingSponsoredProductAd. 
    - Please note the ProductType and CustomLabel [product conditions](../campaign-management-service/productcondition.md) are not supported with Shopping Campaigns for Brands. The GTIN and MPN operands are optional and only available via campaign and ad group level product conditions. 

## <a name="bingshopping-bulkservice"></a>Create a Microsoft Shopping campaign with the Bulk Service
The [Bulk Service](../bulk-service/bulk-service-reference.md) create, update, and delete operations can be completed using Bulk upload. You can use Bulk download to read back your data. For more information see [Bulk File Schema](../bulk-service/bulk-file-schema.md) and [Bulk Download and Upload](bulk-download-upload.md).

These are the Bing Shopping entities that can be accessed using the [Bulk Service](../bulk-service/bulk-service-reference.md).

- [Campaign](../bulk-service/campaign.md)
- [Campaign Product Scope](../bulk-service/campaign-product-scope.md)
- [Ad Group](../bulk-service/ad-group.md)
- [Ad Group Product Partition](../bulk-service/ad-group-product-partition.md)
- [Product Ad](../bulk-service/product-ad.md)

To create a Microsoft Shopping campaign, follow these steps.

1. Create one or more Microsoft Shopping Campaigns.

    - Set the *Campaign Type* field of the [Campaign](../bulk-service/campaign.md) to *Shopping*.

    - Set the *Priority* field of the [Campaign](../bulk-service/campaign.md) to 0, 1, or 2.

    - Set the *COUNTRY_CODE* field of the [Campaign](../bulk-service/campaign.md).

    - Set the *Store Id* field of the [Campaign](../bulk-service/campaign.md).

2. Optionally, you can upload a [Campaign Product Scope](../bulk-service/campaign-product-scope.md) criterion that will be associated with your Microsoft Shopping campaign. Use the product scope criterion to include a subset of your product catalog, for example a specific brand, category, or product type. A campaign can only be associated with one [Campaign Product Scope](../bulk-service/campaign-product-scope.md), which contains a list of up to 7 product conditions. You'll also be able to specify more specific product conditions for each ad group.

3. Upload an [Ad Group](../bulk-service/ad-group.md) and set its *Parent Id* field to the *Id* of the campaign added above.

4. Upload one or more [Ad Group Product Partition](../bulk-service/ad-group-product-partition.md) records which represent product partition nodes in a tree structure that will be used to further refine the product catalog offers. Duplicate or conflicting product conditions attempted within an ad group's product partition group will fail during the upload operation; however, the operation will not validate whether duplicate or conflicting conditions already exist within the campaign level [Campaign Product Scope](../bulk-service/campaign-product-scope.md). For example given one ad group and one campaign, the [Campaign Product Scope](../bulk-service/campaign-product-scope.md) and [Ad Group Product Partition](../bulk-service/ad-group-product-partition.md) may each have *Product Condition 1* set to CategoryL1 and *Product Value 1* set to Animals &amp; Pet Supplies, and the service will not throw any error or warning for a duplicate condition.

    > [!NOTE]
    > There is a 1 to 1 relationship between ad groups and product groups. In other words, each ad group has one product group and vice versa. In the Microsoft Advertising web application, for each ad group you would add one product group with multiple levels of division or multiple partitions. This is the equivalent of adding ad group level product partitions using the Bing Ads API. 

    Please also consider the validation rules described in the [Ad Group Product Partition](../bulk-service/ad-group-product-partition.md) documentation. 

5. Upload a product ad. You must add at least one [Product Ad](../bulk-service/product-ad.md) to the corresponding ad group. A product ad is not used directly for delivered ad copy. Instead, the delivery engine generates product ads from the product details that it finds in your Microsoft Merchant Center store's product catalog. The product ad identifier can be used for reporting analytics. Use [Merchant Promotions](https://help.ads.microsoft.com/#apex/3/en/56805/0) if you want tags to appear at the bottom of your product ad as "special offer" links, helping to increase customer engagement. 

After you complete these steps, the delivery engine can begin serving product ads for the products that it finds in the customer's Microsoft Merchant Center store. If the user's search query has product intent, the delivery engine searches the customer's Microsoft Merchant Center store for products that matches the query. If it finds a product, and the product meets the conditions of the product filters specified in the product scope and product partitions, the delivery engine generates a product ad using the product details from the store.

## <a name="bingshopping-campaignservice"></a>Create a Microsoft Shopping campaign with the Campaign Management Service
To create a Microsoft Shopping campaign with the Campaign Management API, follow these steps.

> [!TIP]
> For code examples that show how to apply product conditions for Microsoft Shopping Campaigns using the Campaign Management service, see [Product Ads Code Example](code-example-product-ads.md).

1. Create one or more Microsoft Shopping Campaigns.

    - Set the *CampaignType* element of the [Campaign](../campaign-management-service/campaign.md) to *Shopping*.

    - Create a [ShoppingSetting](../campaign-management-service/shoppingsetting.md) instance and set its *Priority* (0, 1, or 2), *SalesCountryCode*, and *StoreId* elements. Add this shopping setting to the *Settings* list of the [Campaign](../campaign-management-service/campaign.md).

2. Optionally, you can create a [ProductScope](../campaign-management-service/productscope.md) criterion that will be associated with your Microsoft Shopping campaign. Use the product scope criterion to include a subset of your product catalog, for example a specific brand, category, or product type. A campaign can only be associated with one *ProductScope*, which contains a list of up to 7 [ProductCondition](../campaign-management-service/productcondition.md). You'll also be able to specify more specific product conditions for each ad group.

    Call the [AddCampaignCriterions](../campaign-management-service/addcampaigncriterions.md) operation to associate the Microsoft Shopping campaign with your product scope criterion.  

3. Create an [AdGroup](../campaign-management-service/adgroup.md) and add it to the campaign by calling [AddAdGroups](../campaign-management-service/addadgroups.md).

4. Create a list of [AdGroupCriterionAction](../campaign-management-service/adgroupcriterion.md) objects in a tree structure that will be used to further refine the product catalog offers. Apply the list of actions by calling [ApplyProductPartitionActions](../campaign-management-service/applyproductpartitionactions.md). Duplicate or conflicting product conditions attempted within an ad group's product partition group will fail via the [ApplyProductPartitionActions](../campaign-management-service/applyproductpartitionactions.md) operation; however, the operation will not validate whether duplicate or conflicting conditions already exist within the campaign level [ProductScope](../campaign-management-service/productscope.md).

    > [!NOTE]
    > To retrieve product partitions after they have been applied, call [GetAdGroupCriterionsByIds](../campaign-management-service/getadgroupcriterionsbyids.md) and set the *AdGroupCriterionIds* element to *null* to get all product partitions for the ad group. The product partition with *ParentCriterionId* set to *null* is the root node.

    Please also consider the validation rules described in the [ApplyProductPartitionActions](../campaign-management-service/applyproductpartitionactions.md) documentation. 

5. Create a product ad. You must add at least one [ProductAd](../campaign-management-service/productad.md) to the ad group via the [AddAds](../campaign-management-service/addads.md) operation. A product ad is not used directly for delivered ad copy. Instead, the delivery engine generates product ads from the product details that it finds in your Microsoft Merchant Center store's product catalog. The product ad identifier can be used for reporting analytics. Use [Merchant Promotions](https://help.ads.microsoft.com/#apex/3/en/56805/0) if you want tags to appear at the bottom of your product ad as "special offer" links, helping to increase customer engagement. 

After you complete these steps, the delivery engine can begin serving product ads for the products that it finds in the customer's Microsoft Merchant Center store. If the user's search query has product intent, the delivery engine searches the customer's Microsoft Merchant Center store for products that matches the query. If it finds a product, and the product meets the conditions of the product filters specified in the product scope and product partitions, the delivery engine generates a product ad using the product details from the store.

## <a name="reports"></a>Performance Statistics for Microsoft Shopping Campaigns
The [Product Ads Reports](report-types.md#productads) can be submitted and downloaded with the [Reporting Service](../reporting-service/reporting-service-reference.md) to get performance data for Microsoft Shopping Campaigns.

If you request a report using account level scope, then the performance reports will include aggregated data for all campaigns, whether or not the campaign type is Bing Shopping. To only get data for Microsoft Shopping Campaigns, use campaign scope or ad group scope. The following is an example SOAP request that specifies campaign level scope.

```xml
<Scope>
    <AccountIds i:nil="true" xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <AdGroups i:nil="true" />
    <Campaigns>
    <CampaignReportScope>
        <AccountId>AccountIdGoesHere</AccountId>
        <CampaignId>CampaignIdGoesHere</CampaignId>
    </CampaignReportScope>
    </Campaigns>
</Scope>
```
For more information about using the [Reporting Service](../reporting-service/reporting-service-reference.md), see [Reporting API Guides](reporting-guides.md) and [Request and Download a Report](request-download-report.md).

> [!NOTE]
> Performance statistics and the product partition tree structure returned by the Reporting service lags behind the performance statistics that you see in the Microsoft Advertising web application by up to an hour. 

