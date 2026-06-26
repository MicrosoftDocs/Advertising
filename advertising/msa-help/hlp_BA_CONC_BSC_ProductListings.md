---
title: About Product listings
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Product listings show in the Bing shopping tab for free.
---

# About Product listings

> [!NOTE]
> Learn more about where [Product listings are available](hlp_BA_CONC_Countries.md).

With Product listings, your products can show in the Bing shopping tab for free. The Bing shopping tab has a dedicated unpaid section, where any clicks from the unpaid section are free. Free listings give you wider exposure for your products by displaying them in more places. With more impressions to a wider audience, you can increase your click-through and conversion rates.

You can also show list your products on supported e-commerce platforms, such as [BigCommerce](https://go.microsoft.com/fwlink/?linkid=2244515), [PrestaShop](https://go.microsoft.com/fwlink/?linkid=2244131), and [Shopify](https://go.microsoft.com/fwlink/?linkid=2244516). You can easily add your products to Microsoft Advertising when you link your e-commerce store to your Microsoft Merchant Center. Any subsequent changes you make to your products will sync with Microsoft Advertising. Learn more about Microsoft Advertising and [BigCommerce](hlp_BA_CONC_BMC_BigCommerce.md), [PrestaShop](hlp_BA_CONC_BMC_PrestaShop.md), and [Shopify](hlp_BA_CONC_BMC_Shopify.md).

If you don't use a supported platform, you can upload your product offerings with a feed file or manually enter individual products.

## Requirements for eligibility

- Submitted and approved products in [Microsoft Merchant Center store](hlp_BA_PROC_CreateBingMerchantCenterStore.md)
- Comply with [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md)

## How do I enable Product listings?

If you have a Microsoft Merchant Center store with approved offers, you're automatically opted into Product listings with no additional work for you to do.

If you want to opt out of Product listings, select the **Show free Product Listings in the shopping tab** and toggle from the **Product Listings** page of your Merchant Center store.

## Product listings requirements

- Submit products to Microsoft Merchant Center using any of the feed submission methods: Feed file upload, the content API, or Google Merchant Center import. [Learn more](hlp_BA_CONC_BMCWhatIsCatalog.md)
- Approved products in the store will be eligible to show in the free section of the Bing shopping tab.
- Products must comply with [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md).
- Products must meet the [product specification requirements](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md).
- The “link” attribute must point to the direct URL of the product's page on the retailer's website.

  - The URL must be a direct link to the product's landing page.
  - The URL cannot contain any campaign tracking parameters.
- The “ads_redirect” attribute will not be used and if it's included in the feed file, will be ignored.

## Tracking Product listings

1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
1. Select the store whose delivery status you want to check.

   > [!NOTE]
   > If there is only one store, it will be selected automatically.
1. Select the **Product performance** tab. Here, you'll see Product listings' click and impression data.
1. If there are clicks and impressions, your Product listings are serving correctly. If there are no clicks and impressions, follow the troubleshooting steps below.

## Troubleshooting Product listings

Check whether or not your Product listings are delivering by following the steps above. Here are some troubleshooting tips in case they aren't:

1. Check that the store is active and approved:

   1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
   1. In the grid, ensure that the store in question shows an **Approved** status.
1. Check that Product listings are enabled:

   1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
   1. Select the store in question.
   1. From the Pages menu on the left, select **Settings**.
   1. Select the **Product listings** tab.
   1. Make sure that the **Show free Product Listings in the shopping tab** toggle is switched on.
1. Check that the product feed is enabled for publishing:

   1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
   1. Select the store in question.
   1. From the Pages menu on the left, select **Feeds**.
   1. Select the checkbox of a feed with products.
   1. Select **Update feed** to refresh the feed data, which will update your product listings.
   1. Make sure the feed is configured properly:

      1. Give your feed a clear and descriptive **Feed name**.
      1. Select **Online product ads** under **Destinations**.
      1. Add at least one country where you want your products to appear under **Target regions**.
      1. Choose an **Input method**.
      1. Ensure the feed is set to **Run**.
      1. Select **Update feed**.
1. Check that there are approved products in the product feed:

   1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
   1. From the Pages menu on the left, select **Summary**.
   1. In the **Product issues** tab, confirm that there are approved products available.
   1. Run some test searches in [Bing Shopping](https://www.bing.com/shop?) with an example product whose title you search for to see if it's delivering.

If you moved through the above troubleshooting steps and you still don't have any Product listing delivery, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371).

Take a look at the details you need to know about URLs and tracking for Product listings.

- If you want to track Product listings and Product ads traffic, be sure to include the "link" and "ads_redirect" attributes in the feed file, with different tracking parameters.
- Use the "link" attribute to track free clicks. This URL must point to the product page and you can add tracking parameters to track the free clicks.

  - Free Product listings will use this URL to drive clicks to the products on the retailers' site. The "ads_redirect" attribute will not be used for Product listings.
  - Example URL: http://www.contoso.com/product.asp?pn=ISI1&utm_source=Bing&utm_medium=freeproductlistings​
  -

    > [!NOTE]
    > Do not add campaign tracking parameters to the "link" attribute. The tracking template values will not be replaced with campaign values, as there are no campaigns associated with Product listings.
- Use the "ads_redirect" attribute to track clicks from Product ads. This URL must point to the product page and you can add tracking parameters to track paid Product ads clicks.

  - For Product ads, when both "link" and "ads_redirect" attributes are present, the URL from the "ads_redirect" attribute will be used to drive clicks.
  - Ensure that tracking parameters used to track Product listings are not in the "ads_redirect" attribute.

## Frequently asked questions

- **Are products associated with bids from MSC eligible to show in the unpaid section?** Yes, if the products are relevant to users' searches, they are eligible to show in the unpaid section.
- **Will I be charged for clicks from the unpaid section?** No, all clicks from the unpaid section is free with no charges to clicks for you.
- **What reporting data will be available for Product listings?** Impressions and clicks will be reported for your Product listings, available in your Microsoft Merchant Center.
- While there is no option to exclude products from unpaid listings, you may update your feed by removing the product you wish to exclude and then re-uploading the updated feed file to your Microsoft Merchant Center store.
