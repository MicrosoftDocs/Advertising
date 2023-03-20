---
title: "Auto Inventory Feeds"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Manage Auto Inventory Ads using the bulk API. Add feeds so your ads update dynamically under specific circumstances. 
---
# Auto Inventory Feeds

With Automotive Ads, your ads are feed-based product ads where you can upload all the attributes of your car inventory (make, model, year, trim, image, URLs, etc.) and showcase them on the Microsoft Bing.com, SERP right rail/mainline and the Bing image results page, as well as on native placements on the [Microsoft Audience Network](https://about.ads.microsoft.com/solutions/microsoft-audience-network).

Why use auto inventory feeds?

- More volume. Reach new car shoppers who are closer to making a purchase and are in the comparison and transaction stages of the consumer decision journey, across both the Microsoft Search and Audience Network.
- Richer experience. Showcase your vehicle photos, prices and more to help drive additional qualified leads.
- Save time with automation. Use feeds with keyword-less campaigns to generate your ads faster and easily keep those ads accurate as inventory and prices change. No need to tie your feed to Bing Places.  

You can have 100 feeds per account (this maximum number includes all feed types) and the maximum number of feed items (rows) per account is 5 million.

> [!NOTE]
> Feeds and feed items can only be created, retrieved, updated, and deleted using the Bulk service. You can manage ads and audiences e.g., remarketing lists using either the Bulk or Campaign Management service. 

> [!TIP]
> For code examples please see the [C#](https://github.com/BingAds/BingAds-dotNet-SDK/blob/main/examples/BingAdsExamples/BingAdsExamplesLibrary/v13/BulkExpandedTextAds.cs), [Java](https://github.com/BingAds/BingAds-Java-SDK/blob/main/examples/BingAdsDesktopApp/src/main/java/com/microsoft/bingads/examples/v13/BulkExpandedTextAds.java), and [Python](https://github.com/BingAds/BingAds-Python-SDK/blob/main/examples/v13/bulk_expanded_text_ads.py) repositories on GitHub i.e., the Bulk Expanded Text Ads example shows how to create and use an auto inventory feed. 

## <a name="upload-autoinventoryads"></a>Upload auto inventory feeds

You can upload auto inventory feeds and feed items with the Bulk service. 

- The [Feed](../bulk-service/feed.md) record defines the name and data type of attributes that are allowed for the corresponding feed items.
- The [Feed Item](../bulk-service/feed-item.md) record defines additional information about your products or services and under what conditions that information should be inserted into your ads. The Microsoft Advertising system attributes define under what conditions each feed item should be inserted into your ads, whereas the custom attributes define what information about your products or services you want to insert into your ads. Your auto inventory feed items can be referenced from all ads in your Microsoft Advertising account by default. Optionally you can restrict each feed item to a specific campaign or ad group.  

> [!NOTE]
> The [Feed](../bulk-service/feed.md) and [Feed Item](../bulk-service/feed-item.md) record types are used for either auto inventory feeds, page feeds and ad customizers. When you download feeds and feed items, be sure to check the "Sub Type" column to find out whether the data is applicable for either auto inventory, Sub Type `DynamicDataAutosListingFeed`, or other feed types.  

You might visualize the feed column names and field values in a table:

|Column1_Name (DateTime)|Column2_Name (Int64)|Column3_Name (Price)|Column4_Name (String)|
|-----|-----|-----|-----|
|2020/06/22 00:00:00|8|$24.99|Contoso 700|
|2020/06/22 01:00:00|10|$24.99|Contoso 800|
|2020/06/22 02:00:00|12|$24.99|Contoso 900|

You could upload the auto inventory feed and feed items via the Bulk API as follows:
```csv
Type,Status,Account ID,Feed Name,Campaign,Ad Group,Id,Parent Id,Sub Type,Name,,
Format Version,,,,,,,,,6,Custom Attributes,
Feed,Active,123456789,DynamicDataAutoListingFeedNew,CampaignName,AUTO ad group,-21,,DynamicDataAutosListingFeed,,"[{""name"":""Vehicle ID""},{""name"":""Final URL""},{""name"":""Image URL""},{""name"":""Make""},{""name"":""Model""},{""name"":""Price""},{""name"":""Title""},{""name"":""Target campaign""},{""name"":""Target ad group""},{""name"":""Latitude""},{""name"":""Longitude""},{""name"":""Mileage value""},{""name"":""Mileage unit""},{""name"":""Year""},{""name"":""Fuel type""},{""name"":""Transmission""},{""name"":""City""},{""name"":""VIN""},{""name"":""State of vehicle""}]",
Feed Item,Active,123456789,DynamicDataAutoListingFeedNew,CampaignName,AUTO ad group,,-21,,,"{""Vehicle Id"":""2g161290-1d13"",""""Final Url"""":""https:\/\/www.contoso.com\/used-Redmond1"",""Image Urls"":""https:\/\/www.contoso.com\/inventoryphotos\/01.jpg;https:\/\/www.contoso.com\/inventoryphotos\/02.jpg"",""Make"":""Contoso"",""Model"":""SUV"",""Price"":""65495.00 USD"",""Title"":""2020 SUV"",""Target campaign"":""CampaignName"",""Target ad group"":"""",""Latitude"":"""",""Logitude"":"""",""Mileage Value"":""13000"",""Mileage Unit"":""MI"",""Year"":""2020"",""Fuel Type"":"""",""Transmission"":"""",""City"":""Redmond"",""Vin"":""SALLJGML8HA004044"",""State of Vehicle"":""USED"",""Trim"":""HSE""}",
Feed Item,Active,123456789,DynamicDataAutoListingFeedNew,CampaignName,AUTO ad group,,-21,,,"{""Vehicle Id"":""ag567h11-962d"",""""Final Url"""":""https:\/\/www.contoso.com\/used-Redmond2"",""Image Urls"":""https:\/\/www.contoso.com\/inventoryphotos\/03.jpg;https:\/\/www.contoso.com\/inventoryphotos\/04.jpg;https:\/\/www.contoso.com\/inventoryphotos\/05.jpg"",""Make"":""Contoso"",""Model"":""Sedan"",""Price"":""18695.00 USD"",""Title"":""2017 Toyota Corolla LE"",""Target campaign"":""CampaignName"",""Target ad group"":"""",""Latitude"":"""",""Logitude"":"""",""Mileage Value"":""41000"",""Mileage Unit"":""MI"",""Year"":""2017"",""Fuel Type"":"""",""Transmission"":"""",""City"":""Redmond"",""Vin"":""4TARN81A3PZ107768"",""State of Vehicle"":""USED"",""Trim"":""LE""}",
```

> [!NOTE]
> Updates to an existing feed will replace the existing feed information in Microsoft Advertising.

## <a name="expandedtextad-examples"></a>Adding auto inventories to Expanded Text Ads and Responsive Search Ads

You will need to ensure that a new campaign, ad group and Expanded Text Ad or Responsive Search Ad has been created with the explicit purpose of being used for Auto Inventory Ads. 

Responsive Search Ads do not yet support disclaimers , if a [disclaimer](../campaign-management-service/disclaimeradextension.md) is required, use an Expanded Text Ad.

Feed files are associated with their campaign using the Campaign field of the feed. The Campaign field is populated with the associated campaign's name.

> [!NOTE]
> The keyword for your ad groups should be set to a string of text and symbols unlikely to be searched for to prevent ads from serving outside of automotive ads.

## See Also
[Expanded Text Ads](expanded-text-ads.md)  
[Page Feeds](page-feeds.md)  
