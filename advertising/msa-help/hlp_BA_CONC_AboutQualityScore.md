---
title: Quality score and quality impact in depth
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Your quality score shows you how competitive your ads are in the marketplace. Quality impact is a way to forecast possible impressions resulting from quality improvements.
---

# Quality score and quality impact in depth

The Microsoft Advertising quality score shows you how competitive your ads are in the marketplace by measuring how relevant your keywords, ads, and landing pages are to customers' search queries and other input.

The quality score can range from 1 to 10, with 10 being the highest. You can see the quality score on the **Keywords**, **Campaigns**, and **Ad Groups** tables.

Use your quality score to help determine where to focus your optimization efforts and improve your ROI.

## Quality impact: Forecast possible impressions from quality improvements

Quality impact is a way to forecast possible impressions resulting from quality improvements. This column allows you to see estimates of how many impressions you could gain by optimizing your keywords with a low-quality score, helping you to focus your optimization efforts on the terms that will provide you the higher number of impressions after optimization, and therefore the greatest return on your time.

When you have run your keyword performance report with the quality impact column, the report will then report a forecast on the impact of optimiz ing your keywords quality score. The results will either be 3 (could gain more than 500 impressions each day), 2 (could gain between 100 and 500 impressions each day) or 1 (could gain less than 100 impressions). If no data is returned in your report for some keywords, there will not yet be enough performance data for Bing Ads to forecast.

This report then allows you to see exactly which keywords you should spend your time on, to ensure you are only focusing your time on the keywords that will give you a great return for the time and effort you put in.

## View your keyword quality score and quality impact

1. From the navigation menu on the left, hover over **Campaigns** and select **Keywords** > **Keywords**.
1. Select the **Delivery status** to see its quality score and ratings for each performance measure.

## View your quality scores

1. From the navigation menu on the left, select **Reporting** > **Templates** > **Performance** > **Keyword**.
1. Name your report and choose a format **Type**. Complete the **General settings** section. For more info on the basics of creating a report, see [Understanding the Report Builder](hlp_BA_PROC_CreateReport.md).
1. In the **Choose your columns** section, under **Attributes**, add **Quality score**. To see the number of impressions per keyword you could gain by improving your current quality score, select **Quality impact**.
1. Select **Run**.

## Quality score values

Here's what the numbers mean:

| Quality Score | Description |
| --- | --- |
| **1-5** | The keyword is *underperforming* in the marketplace, so your ads are less likely to appear on the Microsoft Advertising Network when that keyword is matched. If one or more of the three components of quality score are Below Average, most likely your score will be 5 or below. If you want to improve your quality score, you need to make changes to improve the poor performing component. |
| **6** | The keyword is competitive, but no better than average compared to other keywords targeting the same traffic. If all three components are Average, or a combination of Average and Above Average, most likely your score will be 6 or higher. If you want to improve your quality score, you need to make changes to get all three components to Above Average. |
| **7-10** | The keyword is *very competitive* in the marketplace, and its CTR is higher than the average CTR of keywords targeting the same traffic. If all three components are Above Average, most likely your score will be 7 or above. |

> [!IMPORTANT]
> Quality score is an evaluation of your ads, keywords, and landing pages based on historical performance in past auctions. It is not used at auction time to determine ad rank, and does not affect cost or spend.

## How quality score is calculated

The quality score has three components, and each in turn has a score.

:::image type="content" source="media/BA_Conc_QSPerfComp.png" alt-text="Factors in calculating quality score.":::


- **Expected click-through rate score**

  The expected click-through rate score reflects how likely your ads will be clicked and how well your keyword competes against other keywords targeting the same traffic. This score predicts whether your keyword is likely to lead to a click on your ads, taking into account how well your keyword has performed in the past relative to your ad's position. A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.

  Here are some ideas to improve the score:

  - **Improve your click-through rate (CTR)**

    **How**: There are several ways to potentially improve your CTR, such as improving your ad copy, properly organizing your campaign, and improving your ad position. For details on each of these options and more, see [How do I improve my ad campaign performance?](hlp_BA_CONC_AboutImprovingCampaignPerformance.md)

  - **Make sure your ad grabs the attention of your audience**

    **How**: Speak to your customers, use their language, and be specific about what you are offering. For more suggestions, see [What makes an effective ad?](hlp_BA_CONC_AboutWritingEffectiveAds.md)

  - **Remove underperforming ads and keywords**

    **How**: Track how ads and keywords are performing using performance reports every two to four weeks. Delete ads and keywords that have a low click-through rates, especially if they also do not have a good conversion rate. For details on using reports, see [Understanding the Report Builder](hlp_BA_PROC_CreateReport.md).

  - **Add relevant keywords**

    **How**: Use the [keyword planner](hlp_BA_CONC_KeywordPlannerIntro.md) to identify new keywords that are relevant to your site content. You'll find the keyword planner tool on the Microsoft Advertising Tools menu.

- **Ad relevance score**

  The ad relevance score indicates how relevant your ad is to the customer's search query or other input. A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.

  Here are some ideas to improve the score:

  - **Keep related keywords and ads together**

    **How**: Group related keywords and ads into their own ad groups, and then create a unique landing page for each group of ads and keywords. For example, if you're a tea retailer you could have separate ad groups with keywords and ads for green tea, black tea, and herbal tea.

  - **Make sure your ad is relevant**

    **How**: Ads that are relevant to searchers' queries or other input are more likely to have a higher click-through rate and, therefore, a greater positive effect on your quality score. For example, write an ad for green teas that includes appropriate keywords (green tea, sencha, dragonwell) and that sends your customers to a landing page optimized for those keywords. For more information, see [About improving ad relevance](hlp_BA_CONC_AboutIncreasingAdRelevance.md).

  - **One landing page per product**

    **How**: If your business sells different products or offers a suite of services, create individual landing pages for each of your products or services (such as green teas, black teas, and herbal teas). Then be sure to use these landing page URLs for your final URLs. For more information on how to do this, see [Send your customers to a specific landing page](hlp_BA_PROC_ChangeLandingPage.md).

- **Landing page experience score**

  The landing page experience score describes whether your landing page is likely to provide a good experience to customers who click your ad and land on your website. It is based on how many times customers leave your ad's landing page shortly after arriving. A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.

  Here are some ideas to improve the score:

  - **Make sure your landing page loads quickly**

    **Why and how**: If a potential customer thinks your website is down because it is taking too long to load, they are more likely to leave your website. Make sure your landing page loads quickly once someone clicks on your ad from any device.

  - **Give customers an overview**

    **How**: Create a landing page that gives potential customers an overview of your products or services (for example, the different types of tea you sell).

  - **Improve your website quality**

    **Why and how**: If your website is slow and difficult to understand, your potential customers will go elsewhere. Make sure your landing page is easy to read. Try reducing the number of graphic images, for example, or taking other appropriate measures to help it load faster. Also, it's best to use image alt tags and header tags to make sure the Microsoft Advertising quality score checker has access to the information regardless of whether or not your image or video links are crawled.

  - **Link your final URLs to the correct webpages**

    **Why and how**: Customers aren't pleased if they click your ad title and end up on a page unrelated to the ad content. So if your ad is selling green teas, users should land on a page about green teas instead of one about teapots.

  - **Keep advertising links on your webpages to a minimum**

    **Why and how**: Websites whose content includes a large amount of advertising, without offering any other significant value to site visitors, are not attractive to customers. Instead, focus your content on what potential customers really want to know about: *your* services or products.

  - **Use original, in-depth content**

    **Why and how**: Landing pages with original content (not copied from other sites) can improve your quality score and landing page user experience score, and may help improve your conversion rates.

## Learn more about quality score and quality impact

- **Track your quality score changes over time**: You can use the quality score options in performance reports to review historic averages of expected click-through rate, ad relevance, landing page experience, and quality scores going back as far as 18 months from the current date.

- **Your quality score may have suddenly changed — here's what it means**: 
If your competitors keep optimizing their campaigns to make them more competitive, that could affect your quality score. Also the quality score is updated every day so changes to any of the components (expected click-through rate, ad relevance, landing page relevance) can impact your quality score. So track your historic quality score in performance reports to monitor changes in your quality score over time. Then respond by making some of the changes recommended above.

- **Run quality score reports for campaigns, ad groups, and keywords**: Microsoft Advertising provides quality scores at the ad group and campaign level by aggregating the quality scores of the keywords associated with those ad groups and campaigns. You can track aggregated quality scores over time [by running campaign and ad group performance reports](https://help.ads.microsoft.com/#apex/ads/en/50833/2) that include the quality score.

- **What blank values mean in your quality score report**: Quality scores are calculated only based on search traffic. You may find blank values in the following areas of your report if there isn't enough search traffic data available.

> [!NOTE]
> - The Microsoft Advertising quality score is based on customers' search queries and other input that matched keywords exactly in the last 30 days. In international markets, you may see a decrease in quality score coverage for phrase match and broad match keywords. Microsoft Advertising is working to improve the quality score coverage to international markets and will update this topic when available.
> - Traffic in the Bing, AOL, and Yahoo [syndicated search partner sites](hlp_BA_CONC_SearchNetContentNet.md) are not included when calculating your quality score.
> - The quality score is usually updated between 2 and 6 p.m., GMT (Greenwich Mean Time).
> - If you want to learn more about impression share, see [The share of voice report shows how well you're competing](hlp_BA_CONC_ImprShareReports.md).
