---
title: Discover the possibilities with experiments
ms.service: msa-help
ms.subservice: msa-campaigns-bidding
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how you can A/B test specific changes to a campaign and come up with the recipe for success!
---

# Discover the possibilities with experiments

How would using a different bid strategy, or a different kind of targeting, affect your ad campaign's performance? Would it be better, worse, or basically the same? Now you can run an A/B test to find out!

With Microsoft Advertising experiments, you create a duplicate of a Search campaign that receives a split of your original campaign's budget and ad traffic. Then, you can:

- Try out changes in the experiment.
- See how the experiment performs compared to the original campaign.
- If you like the experiment's results, apply the changes to the original campaign or create a whole new campaign.

> [!NOTE]
> Experiments cannot be created for campaigns with Dynamic Search ads enabled in the campaign settings.

## FAQ

- **Creating an experiment**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Experiments**.
  1. Select **Create**.
  1. Select the campaign you want to experiment on.

     > [!NOTE]
     > Currently, only Search campaigns are eligible for experiments.
  1. Once you've selected a campaign, we'll provide you with an **Experiment name** based on the campaign's name. You can edit this name however you see fit.
  1. Select a **Start date**. The default start date is the next day, which gives you time to make the changes you want to test.
  1. If you only want the experiment to run for a certain period, select an **End date**. Otherwise, select **None**.
  1. Set your **Experiment split**. This is the percentage of the original campaign's budget and ad traffic that you want to allocate for this experiment. To make sure the experiment gets enough traffic to make a fair comparison, we recommend setting your experiment split at 50/50. <br>

     > [!NOTE]
     > You cannot change the split while an experiment is running.*
  1. Optional: Select **Advanced options** and choose whether your experiment's ad traffic should be **Search-based** or **Cookie-based**.

     - **Search-based**: Every time customers search, they are randomly shown either ads from your experiment or ads from your original campaign. This means that individual customers could see ads from both sources if they search multiple times.
     - **Cookie-based**: When individual customers search, we show ads from either your experiment or your original campaign, and use a cookie to ensure that, going forward, they will only see ads from this source.

     > [!NOTE]
     > You cannot change this setting while an experiment is running. For the pros and cons of each option, take a look at [Examples and tips for working with experiments](hlp_BA_CONC_Experiments_BestPractices.md).
  1. Select **Save**.
  1. After a few minutes, check to make sure there were no errors in experiment creation:

     1. Go back to the **Experiments** page and find the experiment you just created.
     1. If errors were encountered in experiment creation, there will be a **Download errors** link in this experiment's **Actions** column. Select this link, fix the errors, and try creating the experiment again.

- **Experimenting!**

  If you didn't make any changes to your experiment's settings, it wouldn't be much of an experiment, would it?

  1. In the **Experiments** or the **Campaigns** table, select the name of the experiment.
  1. Select **Settings**.
  1. Make whatever changes you want to test out. [Here are some examples and tips for working with experiments](hlp_BA_CONC_Experiments_BestPractices.md).
  1. Select **Save**.

  > [!IMPORTANT]
  > - The one experiment setting you cannot change here is the experiment's budget. If you want to change an experiment's budget, you will need to change the original campaign's budget. The change in value will then be split based on your experiment split setting.
  > - Once you have created an experiment, any change you make to the original campaign's settings (except for budget) will not affect the experiment. To ensure you are seeing a fair comparison, we strongly recommend *not* making any changes to the original campaign's settings while an experiment is running.

  OK, you have your experiment set up and running alongside the original campaign. Now let's see how they compare.

  On an experiment's page, you'll see a table that compares performance metrics between the experiment and the original campaign. Pick the metrics that are important to you to be visible in the table, and then evaluate how the experiment is performing relative to the original campaign. The color of a metric's value reflects how well the experiment is performing:

  - Green means that the experiment is performing better than the original campaign for this metric.
  - Red means the experiment is performing worse than the original campaign for this metric.
  - Grey means that there is no statistically significant performance difference between the two.

  > [!NOTE]
  > Each difference's statistical significance is shown below the metric value. You can learn more about the statistical significance by hovering over these figures.

- **Applying or ending an experiment**

  If your experiment is performing better than its original campaign and you're pleased with the results— congrats! Let's apply it.

  1. On the experiment's page, select **Apply experiment to...**
  1. Choose whether to apply the experiment to the original campaign or to a new campaign:

     1. If you apply it to the original campaign, all of the experiment's settings will take effect in the original campaign and the experiment will end. The original campaign will once again have 100% of its original budget and traffic.
     1. If you apply it to a new campaign, your original campaign will be paused and a new campaign will be created with all of the current settings of this experiment. The new campaign will have the same budget as the original campaign.
  1. Select **Save**.

  If, on the other hand, you're not pleased with your experiment's results and you're done testing, you can end an experiment before its scheduled end date.

  1. On the experiment's page, select **End experiment now**.
  1. This experiment will continue to be listed on your **Experiments** page for your reference. If you want to remove it completely, select the checkbox for the experiment and then select **Edit** > **Delete experiment** .

- **What experiment statuses mean**

  Experiment status

  Experiments

  | Experiment status | What it means |
  | --- | --- |
  | **Active** | The experiment is running as expected. |
  | **Creating experiment** | Microsoft Advertising is in the process of creating the experiment based on your settings. Check back in a few minutes. |
  | **Experiment creation failed** | Something went wrong with the creation of the experiment. Select **Download errors** in the **Actions** column, fix the errors, and try creating the experiment again. |
  | **Scheduled** | The experiment has been created successfully, but it is not yet running because its start date is still in the future. |
  | **Completed** | The experiment was created successfully and ran until it reached its end date. |
  | **Applying experiment** | Microsoft Advertising is in the process of applying the experiment to either the original campaign or a new campaign, based on your selection. Check back in a few minutes. |
  | **Experiment applied** | The experiment has been applied to either the original campaign or a new campaign, based on your selection. |
  | **Applying experiment failed** | Something went wrong with applying the experiment to either the original campaign or a new campaign. Select **Download errors** in the **Actions** column, fix the errors, and try applying the experiment again. |
