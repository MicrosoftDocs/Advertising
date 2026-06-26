---
title: Understanding negative keyword conflicts and their reports
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: "\"Possibly intentional\" negative keyword conflicts"
---

# Understanding negative keyword conflicts and their reports

You can use [negative keywords](hlp_BA_CONC_AboutNegativeKeywords.md) to help prevent your ads from being displayed to customers who are unlikely to click them. However, if you choose a negative keyword that is identical to an existing keyword, it will result in a conflict.

Possible conflict types are:

- **Possibly intentional:** Some advertisers *intentionally* create negative keyword conflicts to block a portion of match types from triggering your ads. For example, if your phrase match keyword is “stereo plug”, you might also choose “stereo plug” as your exact match negative keyword text to match only with this phrase. In this scenario, customers that are searching for specific items like “3.5mm stereo plug” or “gold stereo plug” are more likely to see your ad.

  If you intentionally created this conflict to block certain match types from triggering your ads, no action may be required.
- **True:** Any other negative keyword conflict. This conflict can be resolved by deleting the conflicting negative keyword.

## Run a negative keyword conflict report

1. From the navigation menu on the left, select **Reporting** > **Templates** > **Performance** > **Negative keyword conflicts**.
1. Choose the settings for **Show (unit of time)**, **Date range**, and **Format**.
1. For **What to report on**, choose either **All accounts and campaigns**, or choose **Specific accounts and campaigns**.
1. You can **Choose your columns** to display and add **Filters** to your report.
1. **Run** the report or **Download** it as CSV, TSV, or XLSX.

## Run a product negative keyword conflict report

1. From the navigation menu on the left, select **Reporting** > **Templates** > **Product ads** > **Product negative keyword conflicts**.
1. Choose the settings for **Show (unit of time)**, **Date range**, and **Format**.
1. You can **Choose your columns** to display and add **Filters** to your report.
1. **Run** the report or **Download** it as CSV, TSV, or XLSX.

> [!NOTE]
> > [!NOTE]
> > The **Conflict type** column, which shows “possibly intentional” or “true,” is not available in product negative keyword conflict reports.

## Resolving negative keyword conflicts in bulk

For help resolving multiple negative keyword conflicts, we recommend the following process:

1. Run the **Negative keyword conflict report** within Microsoft Advertising.
1. **Export** the report to Excel, so that you can have it open while you work in Microsoft Advertising.
1. Go to **Keywords** > **Negative Keywords**.
1. Using your negative keyword conflict report, select the relevant negative keywords by selecting the checkboxes next to them.
1. Select **Edit** > **Delete** to remove the conflicting terms.
