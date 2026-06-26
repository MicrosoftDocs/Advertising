---
title: What are product ratings?
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Display ratings from customers' sites and trusted third parties on your Product ads with product ratings.
---

# What are product ratings?

Display ratings from customers’ sites and trusted third parties on your Product ads with product ratings. Product ratings are an Automated Extension type available for your Microsoft Shopping campaigns, playing an important role in customers’ purchase decisions. Keep in mind that even if a product rating is eligible to serve, they're not guaranteed to always serve. Whether an extension serves depends on a number of factors.

## Benefits of product ratings

- **Increased traffic volume.** Adding product ratings to your Product ads can increase ad engagement and potential click-through rate.
- **More informed customers.** Product ratings are displayed before a customer clicks on an ad, providing more information upfront.
- **Improved market share.** Additional details on your ads can encourage customers to click on yours over your competitors' ads.

**Availability:** All markets where Product Ads are available.

**Devices:** Computer and tablet

## FAQ

- **Automated Product Ratings requirements**

  - Provide the following product identifiers: GTIN, Brand, and MPN
  - The product must have at least 1 review to display.
  - If you sell products on your website that has reviews from BazaarVoice, you don't need to submit a separate Product Review feed file. All you need to do is provide the accurate product identifiers (GTIN, Brand, and MPN) in your shopping feed and your Product ads will automatically display the BazaarVoice ratings. Learn more about [BazaarVoice ratings](https://go.microsoft.com/fwlink/?linkid=2097169).

    > [!NOTE]
    > If your website sells unique products, we may not have ratings for them through BazaarVoice. For these products, we recommend that you upload your own product rating data.

- **Feed requirements**

  - When submitting via FTP:

    - **Product Review feeds** include all of your inventory for all of your stores. You submit the feed on a daily basis.
    - **Product Review update feeds** are only used for new reviews that weren't provided in the most recent full feed upload or any subsequent incremental rating feeds.
  - Feed files must be an existing Google-formatted .xml file.
  - Name of file must start with **ProductReviews** or **ProductReviewsupdate** (for example, ProductReviews.Contoso.xml).
  - The maximum feed file size is 1 GB.
  - If you're using ratings from BazaarVoice, you do not have to upload a separate feed for your product ratings. You must, however, still provide the accurate product identifiers (GTIN, Brand, and MPN) in your shopping feed.

- **Upload feed file via FTP**

  Once you create the product review .xml, submit the file via FTP.

  **FTP server requirements**

  The recommended FTP upload mechanism is via an FTP program. It is, however, possible to do so via the command line or custom scripts (such as Python’s ftplib.FTP module). The FileZilla FTP client is recommended for all platforms.

  - Host: ftps://feeds.adcenter.microsoft.com
  - Username: Your store’s FTP user name. Your user name must be 6 - 64 characters and cannot include any special characters. Use only a - z, A- Z, and 0 - 9.
  - Password: Your store’s FTP password
  - Transfer Mode: Passive

  Learn more about [FTP upload](hlp_BA_CONC_BMCFTPRequirements.md).

- **What you need to know**

  - If your website sells unique products we may not have ratings for through BazaarVoice, we recommend that you upload your own product review data.
  - Product identifiers for product offers must be included in the feed file. GTIN is the most important attribute but Brand and MPN are also recommended.
  - For product ratings to display, the product must have at least 1 review.
  - Clicking on the review count will take customers to another page with more details about review sources. You are not charged for clicks on the review count.
  - We recommend that you upload your own product review data for unique products your site offers.
