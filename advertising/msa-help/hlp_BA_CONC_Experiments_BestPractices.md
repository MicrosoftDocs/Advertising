---
title: Examples and tips for working with experiments
ms.service: msa-help
ms.subservice: msa-campaigns-bidding
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: See some examples of working with experiments and learn some best practices.
---

# Examples and tips for working with experiments

The purpose of experiments is to A/B-test changes to campaigns in a controlled environment. You make a tweak in the experimental campaign, and then see how its subsequent performance compares with the original campaign's. This way, you can understand the impact of the change to your business before you commit to it fully. [Learn more about creating, evaluating, and applying experiments](hlp_BA_CONC_Experiments_About.md).

## Example uses of experiments

Here are just a few of the ways you can experiment:

- **Try a bid strategy**: Compare your manual bids to an automated-bidding [bid strategy](hlp_BA_CONC_BidStrategy.md) like maximize clicks or target CPA.
- **Go after a new audience**: Try targeting a different audience and see how your performance compares. [What are my options for audiences?](hlp_BA_CONC_Audiences_Options.md)
- **Test syndication**: If your campaign's [ad distribution](hlp_BA_CONC_AboutAdDistributionHidden.md) (where on the internet you want to show ads) is set to **Bing, AOL, and Yahoo search (owned and operated) only**, run an experiment set to **All search networks** to include our syndicated search partners as well.
- **Play around with your ad copy**: Try a funnier or edgier tone! Make your text more descriptive or, conversely, more concise. Experiment with [dynamic text parameters](hlp_BA_CONC_AboutParameters.md) or [ad customizers](hlp_BA_CONC_Feeds_AdCustomizers.md).

  > [!IMPORTANT]
  > - **After February 1, 2023, you will no longer be able to create new or edit existing expanded text ads.** For more information, see [About Responsive Search ads](hlp_BA_CONC_ResponsiveSearchAds.md).
  > - [Learn more about this change](hlp_BA_CONC_AdCustomizer_RSA.md)
- **Try out another new feature**: Are you familiar with all of your [ad extension options](hlp_BA_CONC_AboutAdExtensions.md), for example?

## Tips

To get the most helpful results from your experiments, keep the following in mind:

- We recommend setting your experiment split at 50/50 to make sure the experiment gets enough traffic to make a fair comparison.
- After you create an experiment, ensure that it was successfully created without errors by checking the **Experiment status** column of the **Experiments** page. If any issues were encountered, you will see a **Download errors** link in the **Action** column. Select this link, fix the errors, and try creating the experiment again.
- In most cases, we recommend approaching experimentation like this:

  1. For the first two weeks of the experiment, keep the original and experiment campaigns identical.
  1. At that point, make the desired change to the experiment to commence A/B testing.
  1. Then let the experiment run in A/B mode for at least two weeks (so at least four weeks in total).
- You can have up to 10 experiments per campaign, but you can only have 1 experiment running on a campaign at a time. If you want to run multiple experiments on a single campaign, schedule them so they run one after another.

## Pros and cons of search-based versus cookie-based

When you create an experiment, you can specify how the campaign's ad traffic is split.

| |  Search-based | Cookie-based |
| --- | --- | --- |
| **How it works** | Every time customers search, they are randomly shown either ads from your experiment or ads from your original campaign. This means that individual customers could see ads from both sources if they search multiple times. | When individual customers search, we show ads from either your experiment or your original campaign, and use a cookie to ensure that, going forward, they will only see ads from this source. |
| **Pros** | Potentially faster to get statistically significant comparison data. | Potentially more accurate data for some experiments. |
| **Cons** | Potentially less accurate data for some experiments. | Potentially slower to get statistically significant comparison data. |
| **Tip** | Experiments on features such as automated bidding work well with a search-based split, since the comparison is on the bidding in each individual search auction. | Experiments on things like imagery and ad-copy testing work more optimally with a cookie-based split, since you're ensuring that an individual customer is only responding to one source or the other. |
