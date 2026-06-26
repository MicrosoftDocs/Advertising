---
title: Merchant promotions
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how you can promote products directly from your Microsoft Shopping campaigns with Merchant promotions.
---

# Merchant promotions

> [!NOTE]
> Learn more about where [Merchant promotions are available](hlp_BA_CONC_Countries.md).

With Merchant promotions, you can promote products directly from your Microsoft Shopping campaigns inventory with special offer tags. These tags appear at the bottom of your product ad as “special offer” links, helping to increase customer engagement. Merchant promotions are free to add to your Product ads, with the usual charges for any clicks you get. Including Merchant promotions can improve the visibility of your ads, which can lead to more clicks and improve your ROI.

## Get started with Merchant promotions

The participation requirements for Merchant promotions are:

- **Microsoft Merchant Center store:** If you don't have one, learn [how to create a Microsoft Merchant Center store.](hlp_BA_PROC_CreateBingMerchantCenterStore.md)
- **Microsoft Merchant Center catalog feed:** Your Microsoft Merchant Center store must have at least one catalog feed file. Your feed file is a text delimited file that contains all the information needed to submit a promotion. For manual uploads, TSV or XML file formats are accepted. For FTP uploads (available in the United States only), TSV, TXT, or XML file formats are accepted. After you create a feed file, you will [submit it to Microsoft Merchant Center](hlp_BA_CONC_BMCWhatIsCatalog.md). If you don't have a catalog feed file, learn [how to create a feed file.](hlp_BA_CONC_BMCWhatIsCatalog.md)

Once you've been approved, take a look at how to create a promotion below.

## Option 1: Create multiple promotions by uploading a feed file

If you want to submit promotions in bulk, use a promotions feed file to submit multiple promotions with one feed from a spreadsheet. Take a look at the [Merchant promotions feed specifications](#the-merchant-promotions-feed-file) or view an example of a [TXT](https://advertiseonbing.z22.web.core.windows.net/blob/bingads/media/library/docs/promotions-sample.txt) or [XML](https://advertiseonbing.blob.core.windows.net/blob/bingads/media/library/docs/promotions-sample.xml) feed before submitting your feed. (You must use Edge, Chrome, or Firefox browsers to view the .xml feed example.)

1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
1. Select the store name > the **Feeds** tab.
1. Select **Create feed**.
1. Enter the **Feed name**.
1. Select the **Feed type**, **Country of sale**, **Language**, and **Default Currency** (optional) from the preset lists.
1. Select your **Input Method** and input the feed file accordingly.
1. Select **Create feed**.

### What you need to know

- If the promotion doesn't apply to all products, be sure to map the promotion ID to the correct set of products in the master feed.
- The name of the file needs to start with Promotions_. If uploading via FTP, the file name of TSV, TXT, or XML files must match the file name specified for a catalog's settings. In the case of compressed text format, the compressed .TXT file inside the archive (.ZIP, GZ, GZIP, TAR.GZ, TGZ) must have the matching file name.
- You can use Microsoft Advertising to upload the file manually.
- You can use FTP to send the file programmatically. If you use FTP, make sure that the file name starts with Promotions_.

## Option 2: Create a promotion

If you want to create a single promotion, create the promotion directly in Microsoft Merchant Center.

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Promotions**.
1. Select **Create** > **Promotion**.
1. Enter the **Promotion ID**.
1. Select the **Target country/region & language** from the preset list.
1. Choose the **Promotion type**:

   - **Amount off**: Offer a monetary discount. Enter the **Discount amount** and, optionally, **Minimum purchase amount**. (For example: $5 off a purchase of $50 or more.)
   - **Percent off**: Offer a percent discount. Enter the **Discount percentage** and, optionally, **Minimum purchase amount**. (For example: 15% off a purchase of $100 or more, or 15% off select products.)
   - **Free gift**: Offer a free gift. Choose your **Gift type**, and optionally, enter the **Minimum purchase amount** and **Minimum quantity of products**. (For example: Free makeup gift with a purchase of $45 or more.) For **Gift type**, choose from these options:

     - *Free gift with value*: This is your free gift offer's monetary value.
     - *Free gift with description*: This is a description of your free gift offer as you would explain it to potential customers.
   - **Free shipping**: Offer free shipping. Select a **Shipping type**, and optionally, enter the **Minimum purchase amount** and **Minimum quantity of products**. (For example: Free overnight shipping on purchases of $500 or more.)
1. Enter the promotion **Title**.
1. Enter the **Promotion ID**.
1. Select the **Promotion date & time**.
1. Provide a **Redemption code**, if applicable. You have the option to indicate to potential customers that the redemption code is only available on the Microsoft Advertising Network by selecting the **Exclusive to Microsoft Network** checkbox.
1. Under **Product applicability**, select the products that are eligible for the promotion.
1. Select **Save**.

> [!NOTE]
> - A redemption code must be in English to redeem.
> - If the promotion doesn't apply to all products, be sure to map the promotion ID to the correct set of products in the master feed.
> - The promotion's date and time is based on your local time zone. Keep this in mind if you want to run the promotion in any other time zone.

## Edit an existing promotion

Once active, you cannot edit your promotion. You can only edit promotions that are listed as In Review or Rejected in the Status column of the Promotions grid in Merchant Center.

To edit an existing promotion, follow these steps:

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Promotions**.
1. Select the checkbox next to the appropriate promotion > **Edit**.
1. You will be required to specify the **Promotion type** if you have not yet done so.
1. Update your promotion.
1. Select **Save**.

## Automated Merchant promotions and data crawling

In addition to the promotions you create in your feed file or in Microsoft Advertising, we'll crawl your website's data to find and display relevant Merchant promotions during ad delivery. Ad decorations like Merchant promotions can increase your Product ads' performance. We'll automatically crawl your website's data to enhance your product offers unless you opt out of crawled data.

### Opt out of crawled data

1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
1. Select the appropriate Microsoft Merchant Center store > **Settings** > **Automatic updates**.
1. Under **Crawled data**, select the **Block crawled data** checkbox.
1. Select **Submit**.

## Why is my Merchant promotion not serving?

All promotions must comply with the [Merchant promotions policies and editorial guidelines](#merchant-promotions-policies-and-editorial-guidelines) and be verified the merchant's site at the time of review. If the reviewer or validation systems cannot access or confirm the promotion on the destination site the promotion will be rejected due to a "site block issue".

Even if a Merchant promotion is eligible to serve, they're not guaranteed to always serve. Whether an extension serves depends on a number of factors, such as:

- The relevance and quality of your ad
- The relevance and quality of the extension data provided
- Ad space availability on the page
- User signals, such as location, device used, etc.
- Other extensions you enabled for your ad
- Availability of extension data for competing ads

Our algorithms optimize and balance the needs of users, advertisers, and constraints of the search results page. Our algorithms choose the best layout for each ad by evaluating hundreds of possible combinations based on all available extension data, space allocated, and the positive impact it can provide for advertiser and user.

### Best practice
Providing extension data allows our algorithms to evaluate all the possible layouts for your ad. It increases the chances of additional space being allocated, increasing clicks for your ad.

<a id="the-merchant-promotions-feed-file"></a>

## The Merchant promotions feed file

Your feed file is a text delimited file that contains all the information needed to submit a promotion. For manual uploads, TSV or XML file formats are accepted. For FTP uploads (available in the United States only), TSV, TXT, or XML file formats are accepted. After you create a feed file, [submit it to Microsoft Merchant Center](hlp_BA_CONC_BMCWhatIsCatalog.md).

Here are the required and optional fields you can include in the catalog feed:

- **Required fields**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **promotion_id** | The unique ID for the promotion.<br>**Example:**<br>50off<br>**Requirements:**<br>Alphanumeric<br>60-character limit | - ID must be unique for each promotion.<br>- For online promotions that apply to specific products, the promotion_id in the promotions feed must match the promotion_id in the product feed so Microsoft Advertising knows which products apply to the promotion.<br>- Spaces or symbols (for example, $ or %) are not allowed.<br>- Values must be separated by commas. |
  | **product_applicability** | Indicates if the promotion is applicable to all products or specific products.<br>**Valid values:**<br>ALL_PRODUCTS<br>SPECIFIC_PRODUCTS | - If the promotion is only applicable to specific products, the promotion_id column must be present in the product feeds. This is to ensure that the promotion is mapped to the right products.<br>- If the promotion applies to all products, the promotion_id does not need to be added in the products feed. |
  | **offer_type** | Indicates if there is a code or not.<br>**Valid values:**<br>NO_CODE<br>GENERIC_CODE | - This determines if the coupon code is required to redeem the offer.<br>- A GENERIC_CODE is a code that is the same for all users. |
  | **long_title** | The full title of the promotion.<br>**Example:**<br>Extra 50% off shoes<br>**Requirements:**<br>60-character limit | - The full description of the promotion should be accurate and meet the editorial requirements. |
  | **promotion_effective_dates** | Date and time that the promotion will be live on Bing.com.<br>**Example:**<br>2016-07-07T01:00:00-08:00/2016-08-07T01:00:00-08:00<br>**Requirements:**<br>Format is Start-Date-Time/End-Date-Time | - The promotion must be live on your website to be live on Bing.com.<br>- Separate the start and end date with a forward slash (/).<br>- The start and end date format is: (YYYY-MM-DD), followed by the letter T, then the time of day when the promotion starts, followed by the time zone expression as defined by the ISo 8601 standard. For example:<br><br>If you want your promotion to run from 1:00 p.m. on July 7, 2016, to 1:00 p.m. on August 7, 2016 (Pacific Standard Time), you would submit: 2016_07-07T13:00:00-08:00/2016-08-07T13:00:00-08:00.<br><br>If you want your promotion to run from 1:00 p.m. on July 7, 2016, to 1:00 p.m. on August 7, 2016 (Greenwich Mean Time), you would submit: 2016_07-07T13:00:00-00:00/2016-08-07T13:00:00-00:00.<br><br>If you want your promotion to run from 1:00 p.m. on July 7, 2016, to 1:00 p.m. on August 7, 2016 (Eastern Standard Time), you would submit: 2016_07-07T13:00:00-05:00/2016-08-07T13:00:00-05:00. |
  | **redemption_channel** | Indicates if the promotion is online.<br>**Valid value:**<br>ONLINE |  |

- **Optional fields**

  | Field name | Description | What you need to know |
  | --- | --- | --- |
  | **generic_redemption_code** | The text code that customers use online.<br>**Example:**<br>EXTRA50<br>**Requirements:**<br>Alphanumeric<br>60-character limit | - This code is provided only when offer_type has a value of GENERIC_CODE. |
  | **promotion_display_dates** | Date and time that the promotion will be live on Bing.com that falls within the promotion_effective_dates.<br>**Example:**<br>2016-07-07T01:00:00-08:00/2016-08-07T01:00:00-08:00<br>**Requirements:**<br>Format is Start-Date-Time/End-Date-Time | - This can be used with promotion_effective_date to validate promotions before they are active.<br>- Separate the start and end date with a forward slash (/).<br>- The start and end date format is: (YYYY-MM-DD), followed by the letter T, then the time of day when the promotion starts, followed by the time zone expression as defined by the ISo 8601 standard. For example:<br><br>If you want your promotion to run from 1:00 p.m. on July 7, 2016, to 1:00 p.m. on August 7, 2016 (Pacific Standard Time), you would submit: 2016_07-07T13:00:00-08:00/2016-08-07T13:00:00-08:00.<br><br>If you want your promotion to run from 1:00 p.m. on July 7, 2016, to 1:00 p.m. on August 7, 2016 (Greenwich Mean Time), you would submit: 2016_07-07T13:00:00-00:00/2016-08-07T13:00:00-00:00.<br><br>If you want your promotion to run from 1:00 p.m. on July 7, 2016, to 1:00 p.m. on August 7, 2016 (Eastern Standard Time), you would submit: 2016_07-07T13:00:00-05:00/2016-08-07T13:00:00-05:00. |
  | **microsoft_exclusive** | This allows you to indicate to potential customers that your promotional code is only available on the Microsoft Advertising Network.<br>**Valid values:**<br>0 or 1 | - Enter 1 as the value for this field to indicate that your promotion is only available on the MSA_Networkk. Otherwise, enter 0. |
  | **coupon_value_type** | Indicates the type of promotion that you would like to offer potential customers.<br>**Valid values:**<br>MONEY_OFF<br>PERCENT_OFF<br>FREE_GIFT<br>FREE_GIFT_WITH_VALUE<br>FREE_SHIPPING_STANDARD<br>FREE_SHIPPING_OVERNIGHT<br>FREE_SHIPPING_TWO_DAY | - MONEY_OFF indicates that you are offering a monetary discount. You must provide the MONEY_OFF_AMOUNT, and optionally, MINIMUM_PURCHASE_AMOUNT.<br>- PERCENT_OFF indicates that you are offering a percentage discount. You must provide the PERCENT_OFF discount percentage, and optionally, the MINIMUM_PURCHASE_AMOUNT.<br>- FREE_GIFT indicates that you are offering a free gift. You must provide the FREE_GIFT_DESCRIPTION or FREE_GIFT_ITEM_ID, and optionally, MINIMUM_PURCHASE_AMOUNT and BUY_THIS_QUANTITY.<br>- FREE_GIFT_WITH_VALUE indicates that you are offering a free gift and that you will showcase your free gift’s value to potential customers. You must provide the FREE_GIFT_VALUE, and optionally, MINIMUM_PURCHASE_AMOUNT and BUY_THIS_QUANTITY.<br>- FREE_SHIPPING_STANDARD indicates that you are offering free standard shipping. You can optionally provide the MINIMUM_PURCHASE_AMOUNT and BUY_THIS_QUANTITY.<br>- FREE_SHIPPING_OVERNIGHT indicates that you are offering free overnight shipping. You can optionally provide the MINIMUM_PURCHASE_AMOUNT and BUY_THIS_QUANTITY.<br>- FREE_SHIPPING_TWO_DAY indicates that you are offering free two-day shipping. You can optionally provide the MINIMUM_PURCHASE_AMOUNT and BUY_THIS_QUANTITY. |
  | **minimum_purchase_amount** | The minimum amount of purchase for the promotion to be applicable.<br>**Example:**<br>15 USD<br>**Requirements:**<br>Numerical<br>No symbols (for example, $) | - Only currencies in the specified country/region are supported.<br>- This attribute is optional for MONEY_OFF, PERCENT_OFF, FREE_GIFT, FREE_GIFT_WITH_VALUE, FREE_SHIPPING_STANDARD, FREE_SHIPPING_OVERNIGHT, and FREE_SHIPPING_TWO_DAY. |
  | **money_off_amount** | The discount amount that you are offering.<br>**Example:**<br>15 USD<br>**Requirements:**<br>Must be a number and must specify currency | - This attribute is required if you have entered MONEY_OFF as the value for COUPON_VALUE_TYPE. |
  | **percent_off** | Indicates the percentage discount offered in the promotion.<br>**Example:**<br>10<br>**Requirements:**<br>Must be an integer | - This attribute is required if you have entered PERCENT_OFF as the value for COUPON_VALUE_TYPE. |
  | **free_gift_description** | Indicates the description (but not the value) of any free gift offered in the promotion.<br>**Example:**<br>Free tote bag with $100 purchase<br>**Requirements:**<br>Should not exceed 100 characters | - Only use FREE_GIFT_DESCRIPTION when the free gift is not in your Merchant Center store catalog feed. Otherwise, enter the product ID in the FREE_GIFT_ITEM_ID field. |
  | **free_gift_item_id** | The free gift item’s unique identifier in your Merchant Center store feed file.<br>**Example:**<br>ISI1<br>**Requirements:**<br>50 Unicode character limit |  |
  | **free_gift_value** | Indicates the monetary value of the free gift offered in the promotion.<br>**Example:**<br>50 USD<br>**Requirements:**<br>Must be a number and must specify currency | - This attribute is required if you have entered FREE_GIFT_WITH_VALUE as the value for COUPON_VALUE_TYPE. |
  | **buy_this_quantity** | The minimum quantity of purchased products required for the promotion to be applicable.<br>**Example:**<br>10<br>**Requirements:**<br>Must be an integer | - This attribute is optional for FREE_GIFT, FREE_SHIPPING_STANDARD, FREE_SHIPPING_OVERNIGHT, and FREE_SHIPPING_TWO_DAY. |
  | **free_shipping_type** | Indicates the type of free shipping that you are offering.<br>**Valid values:**<br>FREE_SHIPPING_STANDARD<br>FREE_SHIPPING_OVERNIGHT<br>FREE_SHIPPING_TWO_DAY |  |

  <a id="merchant-promotions-policies-and-editorial-guidelines"></a>

## Merchant Promotions policies and editorial guidelines

Every Merchant Promotion submitted to Microsoft Advertising must be accurate, truthful, and comply with [Microsoft Advertising policies](https://go.microsoft.com/fwlink/?linkid=2295044). Take a look at the [policies that are specific to Merchant promotions below](#merchant-promotions-policies-and-editorial-guidelines). Familiarizing yourself with these policies before you submit your promotion can make the approval process much smoother, so you can start displaying your promotions faster!

- **Merchant Promotion policies**

  - **Availability**: United States, Canada, United Kingdom, Australia, India, France, and Germany on PC and mobile devices .
  - Each merchant can have a maximum of 1,000 live promotions at any given time.
  - A maximum of 10 promotion IDs can be mapped to one item in the product feed.
  - The minimum discount amount must be at least $5 or 5% off the current price of the item.
  - Promotions can’t last longer than 6 months.
  - Promotion redemption cannot be restricted to a certain audience (for example, military discounts, birthdays, first-time customers).
  - Discounts and promotions must be applied at checkout or point of sale. Do not have discounts and promotions reflected in the SKU price on the MicrosoftShopping product page or your product landing page.
  - Receipt of free gifts or e-cards can be displayed on the product landing page and must also be displayed in the cart or on the checkout page.
  - Any duplicate promotions (identical promotions with different promotion IDs) will be rejected.
  - Promotions for products or services that are normally free, sweepstake offers, or text-only offers meant to advertise the product without a discount are not allowed.
  - Additional costs cannot be added to promotional items to offset the promotion cost. In other words, you cannot add a fee to customers redeeming a promotion that is not applicable to customers who are not using the promotion.
  - Promotions must be redeemable without additional user requirements, such as signing up for a store credit card or taking a survey to redeem the promotion.
  - Promotion titles must be clear, concise, accurate, and only represent the value of the specific promotional offer.
  - Any promotion that is tied to a product that is not participating in the promotion will be rejected.

- **Merchant Promotion editorial policies/guidelines**

  - Promotion titles must include the value of the promotion (for example, $ of % off).

    ![Green check mark](media/Global_Icon_CheckMark.png) - Free $5 gift card with purchase

    ![Red X.](media/Global_Icon_Xmark.png) - Free gift card with purchase
  - Promotion titles must state the item or service required for the discount.

    ![Green check mark.](media/Global_Icon_CheckMark.png) - Free $5 gift card with purchases over $50

    ![Red X.](media/Global_Icon_Xmark.png) - Free $5 gift card with purchases
  - Promotions with a range of possible discounts or levels must have the lowest possible promotion value in the title.

    ![Green check mark.](media/Global_Icon_CheckMark.png) - 10% off purchases, 10% - 25% off purchases

    ![Red X.](media/Global_Icon_Xmark.png) - Up to 25% off purchases
  - Maximum discount limits in title are recommended.

    ![Green check mark.](media/Global_Icon_CheckMark.png) - 10% off purchases (max discount $20)
  - Redemption details, such as coupon codes or promotion dates, cannot be included in the title.

    ![Red X.](media/Global_Icon_Xmark.png) - 10% off purchases by July
  - The currency in the title must match the country/region for where the promotion is targeted.

    ![Green check mark.](media/Global_Icon_CheckMark.png) - US Dollars = en-US

    ![Red X.](media/Global_Icon_Xmark.png) - US Dollars = en-AU
  - Gimmicky words or phrases, or irrelevant text cannot be used in the title.

    ![Red X.](media/Global_Icon_Xmark.png) - Save save save! 10% off all purchases
  - Missing spaces or extra spaces between letters, words, or punctuation cannot be used in the title.

    ![Red X.](media/Global_Icon_Xmark.png) - F R E E $5 gift card with purchases over $50
  - Unnecessary punctuation, letters, numbers, or symbols cannot be used in the title.

    ![Green check mark.](media/Global_Icon_CheckMark.png) - Free! $5 gift card with purchases over $50!!!
  - Unnecessary capitalization cannot be used in the title.

    ![Red X.](media/Global_Icon_Xmark.png) - FREE $5 GIFT CARD with purchases over $50
  - Titles cannot exceed 60 characters.
