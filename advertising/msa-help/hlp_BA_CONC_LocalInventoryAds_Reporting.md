---
title: Using local inventory ad reports
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about the different local inventory ad reports you can view.
---

# Using local inventory ad reports

> [!NOTE]
> Learn more about where [Local inventory ads are available](hlp_BA_CONC_Countries.md).

Now that your local inventory ads are up and running, you'll want to keep track of how your ads are performing.

The following click type data is available for the reports listed below:

- **Shopping ad:** A click on your ad, showing an online product.
- **Shopping ad—local:** A click on your ad, showing a local product.
- **Shopping ad—multichannel local:** A click on the local section of your ad that has two links—one click to the local product and another click to the online product.
- **Shopping ad—multichannel online:** A click on the in-store decoration will result in the multichannel local click reporting. A click on the main ad with the in-store decoration will result in the multichannel online click.

## Availability

We are working with retailers who have physical stores in the United Kingdom and United States.

- **Add shopping ad click types to reports**

  When running product partition, product partition unit, or product dimension reports, be sure to add the click type column to view your shopping ad click type data.

  1. From the navigation menu on the left, select **Reporting** > **Home**.
  1. Select the report you want to run under **Product ads**.
  1. In the **Choose your columns** section, add the **Click type** attribute.
  1. Select **Run** to generate the report, or **Download** to get the report as a CSV or TSV file.

  You can show products sold only in local stores but not online by setting the filters to “Click type”: “Shopping ad—Local”.

- **Using reports to track local inventory ads**

  From Microsoft Merchant Center, you can see the following reports:

  | Report type | Description |
  | --- | --- |
  | **Store summary** | *What it shows*: Data for local feeds, online feeds, and all other feeds. |
  | **Published report** | *What it shows*: Data for the number of published offers. |
  | **Reject report** | *What it shows*: Data for the number of rejected offers. |
  | **Matching report** | *What it shows*: Data for the number of offers matched to the online product feed. |

  From Microsoft Advertising reporting, you can view the following reports:

  **Product partition**

  | What it shows | Why run it |
  | --- | --- |
  | The impressions, clicks, spend, average cost per click and average conversion for each product group in your Microsoft Shopping campaigns.** | To see the performance data for the product groups in your Shopping campaigns and to optimize your campaigns accordingly. This report will also allow you to segment your data by the store code and click type. |

  **Product partition unit**

  | What it shows | Why run it |
  | --- | --- |
  | The impressions, clicks, spend, average cost per click, and average conversions for each product group in your Microsoft Shopping campaigns. Depending on the report time and columns you choose, the report may include more than one row per product group. This report will also allow you to segment your data by the store code and click type.** | To see product partition unit data of your Product Groups in Shopping campaigns. |

  **Product dimension**

  | What it shows | Why run it |
  | --- | --- |
  | The impressions, clicks, spend, average cost per click and conversion for each product in your catalog [each line item in Microsoft Merchant Centercatalog]. This report will also allow you to segment your data by the store code and click type.** | To figure out which of your products are triggering ads and getting the most clicks and optimize the ones not performing so well. |
