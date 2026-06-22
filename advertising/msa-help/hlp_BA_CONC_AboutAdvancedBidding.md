---
title: How to Target My Customers by Adjusting My Bids
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Use bid adjustments to increase your bid for the demographics (e.g. time of day) that are most important to your advertising campaign.
---

# How to target my customers by adjusting my bids

> [!NOTE]
> If you're advertising in connection with any financial, insurance, education, career and employment, and/or housing services, you **cannot** use individuals' demographics—such as age, gender, location, etc.—for the purpose of personalizing advertising, segmenting, or profiling customers.

:::image type="content" source="media/BA_Conc_Target.png" alt-text="Target.":::

Bid adjustments increase or decrease your bid for specifically targeted customers. They provide the capability to fine-tune your bids on the fly, offering control over how much you bid in different scenarios. By using bid adjustments, you can strategically increase or decrease your bids in response to factors that you believe will impact the likelihood of conversion.Please note that if you're using [automated bid strategies](hlp_BA_CONC_BidStrategy.md), we'll utilize bid adjustments as signals to optimize performance.

## Multiple bid adjustments

If more than one of your target criterion is met and your ad is clicked, you pay for each of the bid adjustments that match (but not for those that don't match). For example, let's say you have set up the following bids and targeting:

- Keyword bid = $3.00
- Target days = Saturday, Bid adjustment = Bid + 10%
- Target device = Tablet, Bid adjustment = Bid - 20%

Some items to be aware of when using bid adjustments:

- Bid adjustments are rounded down to the nearest cent.
- Bid adjustments for most variables can range, in 1% increments, from -90% to + 900%.
- As per above, negative bid adjustments for most targets can go to -90%.
-

  > [!NOTE]
  > We'll automatically change your bid adjustments for device type in real time to optimize performance and increase your chances for a conversion. We'll use your bid adjustment as a reference point, but the actual bid amount may be higher or lower.
- When you place a bid adjustment for day of the week or time of day, you can use targeting to choose whether to display your ads only to target customers or to all customers. In all cases, you pay the adjusted bid only when one or more of the target criterion is met and your ad is clicked.
- If a customer's criterion is unknown, then no bid adjustment for this criterion will be applied.
- By default, bid adjustments of 15% will be applied to new targeting associations. Existing associations in the ad groups will not be changed.
- If you use an automated [bid strategy](hlp_BA_CONC_BidStrategy.md), it will be informed by any bid adjustments you set.
- [LinkedIn profile targeting](hlp_BA_CONC_LinkedInTargeting.md) bids will multiply if a customer is included in multiple segments. For example, if you target Industry=Financial services with a bid adjustment of 10%, and also target Job function=Consulting with a bid adjustment of 20%, the resulting bid adjustment for a customer matching both targets will be 32% (1.10 x 1.20 = 1.32).

> [!NOTE]
> Want expert advice on your ads? [Schedule a no-cost session with a personal Microsoft Advertising consultant](https://go.microsoft.com/fwlink/?linkid=837456).
