---
title: Advertise software subscriptions with Microsoft Shopping campaigns
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Sell software subscriptions where customers can buy a prepaid license to use for 1 year or longer.
---

# Advertise software subscriptions with Microsoft Shopping campaigns

Use Microsoft Shopping campaigns to sell your software subscriptions where customers can buy a prepaid license to use for 1 year or longer.

For the subscriptions to be supported by Microsoft Shopping campaigns, they must:

- Be sold in prepaid, yearly (12 month) increments of at least 1 year.
- Contain all required attributes listed below.
- Meet all landing page requirements listed below.

Here’s a closer look at the requirements for your product feed and landing pages for software subscriptions.

## FAQ

- **Required fields to include in feed**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **title** | Title of the subscription<br>**Example:**<br>Contoso 1-year subscription<br>**Requirements:**<br>Include the word "subscription"<br>Alphanumeric<br>150 character limit<br>Don't enclose in quotes | You must include the word "subscription" and the duration in the title. |
  | **price** | Base price, excluding tax and shipping, submitted in local currency.<br>**Example:**<br>23.99<br>**Requirements:**<br>Numeric<br>0.00 to 10000000.00 (10 million)<br>Use two decimal places and no symbols (e.g.. $) | - The price must be for the full software subscription, with a minimum of 1 year.<br>- If you offer any subsidized periods for prepaid 12-month subscriptions, you must include it in the total price.<br>- If the subscription price is different after the first year, enter the prepaid price for the first year. |
  | **product_category** | Predefined product category (equivalent to google_product_category)<br>**Example:**<br>Software \| Computer Software<br>**Requirements:**<br>Alphanumeric<br>255 character limit<br>Delimiters: greater than symbol [>].<br>Only the greater than symbol > is a valid delimiter. Any other value is treated as invalid.<br>**Full list of taxonomy values**:<br>[English](https://help.ads.microsoft.com/#apex/ads/en/51112/1)<br>[French](https://advertiseonbing.z22.web.core.windows.net/blob/bingads/media/library/docs/bing-category-taxonomy-fr.txt)<br>[German](https://advertiseonbing.z22.web.core.windows.net/blob/bingads/media/library/docs/bing-category-taxonomy-de.txt)<br>[Example feed file](https://advertiseonbing.z22.web.core.windows.net/blob/bingads/media/library/docs/bingmerchantcenter_example_feed.txt) | Use the following category: Software \| Computer Software \| \[Category\]. For example, Software \| Computer Software > Business & Productivity Software |
  | **mpn** | Manufacturer Part Number<br>**Example:**<br>ADNK-5020<br>**Requirements:**<br>Alphanumeric<br>70 character limit | - MPN should be specific to one unique product.<br>- MPNs are assigned by the manufacturer.<br>- Learn more about [unique identifiers for your Product ads](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md). |
  | **gtin** | Global Trade Item Number.<br>Up to 10 GTIN values can be provided, with a maximum of 14 digits per value. For multiple GTIN values, separate by a comma and space.<br>**Example:**<br>00012345600012<br>**Requirements:**<br>Numeric<br>14 digits max per value<br>Multi-value | Learn more about [unique identifiers for your Product ads](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md). |
  | **brand** | Item’s manufacturer, brand or publisher<br>**Example:**<br>Contoso<br>**Requirements:**<br>Alphanumeric<br>70 character limit | - Do not add your store name as the brand unless you manufacture the product.<br>- We recommend to keep the brand character limit to 70, but it can be up to 1000 characters.<br>- Uploading an item for the first time will be pending review until the brand has been successfully crawled. Updating the brand of an existing item will be reverted to the pending review status until it has been successfully re-crawled. The review process can take up to 3 business days.<br>- Learn more about [unique identifiers for your Product ads](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md). |
  | **shipping** | Cost of shipping, submitted in local currency. This is a required field for Germany only.Shipping has multiple subfields and can have the following headers: shipping(price) shipping(country:price) shipping(country:service:price) shipping **Example:**<br>12.99<br>**Requirements:**<br>Numeric<br>0.01 to 10000000.00 (10 million)<br>Use two decimal places and no symbols (e.g., €)<br>Use a period for decimal places, regardless of currency (e.g., "€12.99" instead of "€12,99")<br>For free shipping, use 0 | The shipping field is required for Germany only. For software subscriptions sold in Germany, enter the shipping cost as 0.00 EUR. |
  | **image_link** | URL of an image of the item<br>**Example:**<br>http://www.bingshop.com/<br>images/ISI1.jpg<br>**Requirements:**<br>Alphanumeric<br>1000 character limit<br>Link must be HTTP or HTTPs only<br>Image must be: bmp, gif, exif, jpg, png, tiff<br>The recommended minimum size is 220px by 220px<br>The image size cannot exceed 3.9 MB<br>No watermarks or free shipping text<br>Only one image per item | - We recommend that you submit an image of the software box, if possible. Logos and icons are also accepted.<br>- Do not include any text within your images, including promotional messaging.<br>- Use images with a white background for a “pop” effect.<br>- Update robots.txt file to allow Microsoft Advertising to crawl your site. Your ad cannot be served if the crawling is incomplete. [Learn more](https://go.microsoft.com/fwlink/?linkid=690094).<br>- The image link URL is case-sensitive. Changing the casing on the URL will cause the URL to be re-crawled.<br>- Uploading an item for the first time will be pending review until the image URL has been successfully crawled. Updating the image URL of an existing item will be reverted to the pending review status until it has been successfully re-crawled. The review process can take up to 3 business days. |

- **Landing page requirements**

  For software subscriptions, you need to send your customers to specific landing pages that outlines the details of the subscriptions. Take a look at the requirements for the software subscription landing pages:

  - **Create different landing pages for each product variant**. For example, if your software subscription has different versions, each version needs a separate landing page.
  - **Show the total price of the full software subscription** and make sure that it is preselected. The total price must be preselected and be for the full subscription, with a minimum of 1 year. Any subsidized periods for the prepaid 12-month subscriptions must be included in the total price.
  - **Disclose renewal and cancellation terms**. Be sure to include all renewal information (is the subscription automatically renewed or a fixed term?) and any cancellation details (what happens if a customer wants to cancel a prepaid subscription before the 1-year period is up?).

  For more information, see our article on [setting up landing pages](hlp_BA_PROC_ChangeLandingPage.md).
