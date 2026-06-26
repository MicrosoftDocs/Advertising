---
title: Best practices for Microsoft Shopping campaigns and Product ads
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: We've summarized a list of short tips and tricks from our Microsoft Advertising experts and your fellow advertisers for creating and managing Shopping campaigns and Product ads.
---

# Best practices for Microsoft Shopping campaigns and Product ads

> [!NOTE]
> Learn more about where [Microsoft Shopping campaigns and Product ads are available](hlp_BA_CONC_Countries.md).

One of the most important things to remember when using Shopping campaigns and Product ads is to use the same strategies you're already familiar with for your other ads. Techniques like setting appropriate targeting, using negative keywords, and regular monitoring are still important. So as you [set up your Shopping campaigns](hlp_BA_PROC_CreateProductTargetAndAd.md), don't forget all those best practices you already know.

## Getting started and creating your feed

A high-quality feed is important in getting your Shopping campaign off to a good start. Here are some things to consider:

- **No need to start from scratch**: Save time and effort by importing your existing Google Ads feeds and Shopping campaigns. First, you'll want to look at this [important information about importing Shopping campaigns and Product ads](hlp_BA_CONC_ImportWhatInfo.md).
- **Create and maintain a high-quality feed**: List all available products in your feed and ensure that you’re keeping stock and availability fields current. Refresh your feed on a daily basis.
- **Populate as many attributes as possible for each product offer:** The more information you make available in your feed, the more likely your Product ads will be displayed for relevant queries. Including attributes such as custom labels, a Bing category and a merchant category are particularly helpful. A well written and complete description will also help get you more impressions.
- **Don't use "Miscellaneous" for a category:** And yes, "Misc" is even worse.
- **Use high-quality images:** Images must be 220x220 pixels or larger. Test and optimize images that show the product in the most relevant way for your customers. The image you’re using should be easily recognizable as the intended product.
- **Frequently test your feed and look at errors:** Try to review errors with each feed update to avoid a backlog.
- **Use a single store:** If you are an aggregator, you should use a single store and divide each of the seller feeds into different feeds.

## Images

Images are what make your Product ads stand out. Here are some tips for what images to include:

- **Use high-quality images:** Images must be 220x220 pixels or larger. Test and optimize images that show the product in the most relevant way for your customers. The image you’re using should be easily recognizable as the intended product.
- **No watermarks:** Watermarks, "Free shipping," or other promotional text should not be present in your images.
- **No placeholders:** Do not use "Image Not Available" or other similar placeholders. Ads with these placeholders will not display.
- **Watch your borders:** Use minimal surrounding whitespace; generally only about 10% of your image. Images with greater that 60% whitespace will very likely not display.

## Product ads

Best practices for Product ads are similar to what you probably already do for your text ads. Note that promotional text is no longer available for Product ads—we recommend that you use Merchant Promotions instead. [Learn more](hlp_BA_CONC_BMC_MerchantPromo.md)

- **Use negative keywords:** Although Shopping campaigns don't use keywords to trigger the Product ads, you can still use negative keywords to prevent your products from showing in response to irrelevant and poor-performing queries.
- **Analyze the data:**Microsoft Advertising now offers four data-rich reports to help analyze your Shopping campaigns. Get special insight into your Product ads as well as crucial information to better understand your ads performance.

## Budgeting

Now that you have a Shopping campaign, you need to consider the cost of your Product ads along with your other ads.

- **Set your Shopping campaign budget in context of the budget for your other ads:** Initially, consider allocating a similar budget to your Shopping campaigns as you would to keywords for those same products. Some advertisers have found that allocating 30% of their total budget to Shopping campaigns is a good starting point.

## Bidding

Just like text ads, you need to set and monitor your product ad bids to make sure your campaign performs as expected:

- **Don't underbid:** Because Product ads compete with text ads for every query, your bids should be comparable to bids for your text ads, at least until a click history is established. So set your initial bids to an amount that is equal to or greater than your current bids for the keywords that most closely correspond to that product or group of products.
- **Reward high-performing products with higher bids:** As your Product ads receive impressions and clicks, you should monitor their performance and adjust your bids if necessary. You might want to place higher bids on the best-performing products to gain impression share and maximize the return on your investment.
- **Set bid adjustments for smartphones and tablet audiences:** To reach mobile audiences, you should modify your bid boosts for smartphone and tablet devices (from -100% to +100%) from within the campaign UI.
- **Don't ignore low performing ads:** Review low-performing ads to ensure low bids are not limiting your ad exposure.

## Optimizing

Here are a few more things to consider as you create your campaign, and more importantly after it starts running:

- **Use campaign priority:** Set the campaign priority to **High** in order to have a specific Shopping campaigns serve ahead of your other campaigns. Setting a particular campaign's campaign priority to High will cause it to Display ads more often than other campaigns with a priority set to Low or Medium. Similarly, a Shopping campaign with a campaign priority of Medium will take precedence over other campaigns with the default Low priority. If there are multiple campaigns with different priorities targeting the same product, the campaign priority still holds true—High takes precedence over Medium, which takes precedence over Low. However, if the product gets filtered out by any business rules, like location targeting, minimum bids, etc., the campaign priority is applied to the non-filtered product. For example, let’s say you have a High and Medium campaign targeting the same product, and this product is selected to serve. But after applying location targeting, the product from the High campaign is filtered, which means the non-filtered product from the Medium campaign will serve.
- **Monitor the difference in performance between your text ads and Product ads over time:** Text ads and Product ads have different CPCs, CTRs, and conversation rates. Use Microsoft Advertising reports to monitor your performance and make appropriate optimizations to your bids, product groups and budgets to achieve your business goals.
- **Test, test, test:** Just like with text ads, testing is key to long-term success. Test different versions of text, alternative images, and the granularity of product targets. For example, you might find that product targets based on specific products or specific business goals perform better than a target that includes a wide group of products.
- **Use customized destination URLs to track Product Target performance:** Similar to [using specific destination URLs for specific keywords](hlp_BA_PROC_ChangeLandingPage.md), you can also set specific destination URLs for specific product groups. You can then track visits to those individual pages to gauge the performance of your various product groups.
- **Use the available Microsoft Advertising reports:** Track performance using performance reports, including product ad and Shopping campaign-specific reports. Useful reports include the shopping report, found on the Dimensions tab, the Share of voice report and the search term report.

## Troubleshooting

- Feeds must be renewed every 30 days.

  > [!NOTE]
  > You may need to reupload any rejected or expired feeds. Navigate to the Summary tab within your Merchant Center store to check for any product issues.
- If your Shopping campaign's Product tab is empty, check the following:

  - **Filters:** A campaign-level filter may block what's shown in the Products tab. Download the feed or published reports to double-check.
  - **Country or region of sale:** If a country or region of sale doesn't match the catalog or feed file's location, listings may be affected. Because the country or region of sale isn't changeable after campaign creation, you can instead delete and recreate the Shopping campaign, this time choosing the correct country or region of sale.
  - **Multiple stores:** Make sure campaign is set to the right store ID. Because this isn't changeable after campaign creation, you can instead delete and recreate the Shopping campaign, this time choosing the correct store ID.
- Check product groups by selecting the ellipses and:

  - Download the published feed report to check for feed changes, which could affect the product group (e.g., image URLs or some other aspect of the product in the campaign).
  - Check if the product group contains products. If it doesn't, it may indicate an import issue. Select **Edit** next to the product group and move the correct listings from the left to the right column.
