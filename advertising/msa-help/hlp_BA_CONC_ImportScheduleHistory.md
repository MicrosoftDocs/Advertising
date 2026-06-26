---
title: Edit Your scheduled imports and review import history and results
ms.service: msa-help
ms.subservice: msa-bulk-import
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: You can edit your scheduled imports and review import history and results.
---

# Edit your scheduled imports and review import history and results

Import schedule and history is available for imports from Google Ads, Meta Ads, and Pinterest Ads. You can run an import again, modify the import schedule, and review logs to see what entities were newly added, updated, or couldn't be imported.

> [!NOTE]
> You cannot schedule file imports.

## Review import results

You can review any past imports. If there were any issues with the import, the **Logs** (results) table includes the error file to review as well the settings that were in effect at the time of the import.

1. From the navigation menu on the left, hover over **Import** and select **Import schedule & history**.
1. Under **Logs**, review the table.
1. If the import resulted in any changes, the **Summary** column will show how many items were imported successfully and how many had errors and were unsuccessful. Select the ![ellipsis icon](media/BA_ScreenCap_DeliveryDetails.png) to review the details.
1. To download and review the error file, in the **Action** column, select **Download error file**.

## Edit, pause, or delete your import schedule

1. From the navigation menu on the left, hover over **Import** and select **Import schedule & history**.
1. Under **Scheduled imports**, review the table. If the table is empty, no schedule is set.
1. If you want to change the schedule, in the **Action** column, select **Edit**.
1. To pause a scheduled import, select it and then select **Edit** > **Pause**.
1. To delete a scheduled import, select it and then select **Edit** > **Delete**.

> [!NOTE]
> - Deleting an import schedule will effectively unlink the relevant campaign(s) from your Google Ads, Meta Ads, and/or Pinterest Ads accounts.
> - In order to fully remove an account from Google Ads, Meta Ads, and/or Pinterest Ads, delete the scheduled import as well as any previously imported items, including campaigns, ads, assets, etc.
> - If the scheduled import was created by another agency linked to the account, you are unable to edit/delete it.

## Scheduling options

You can schedule when you want your Google Ads, Meta Ads, or Pinterest Ads accounts to sync automatically with Microsoft Advertising. You cannot schedule file imports. The options are:

- **Auto:**Allows Microsoft Advertising to set an import schedule to best optimize your campaigns.
- **Now:** Import happens as soon as you select the **Import** button and only runs once.
- **Once:** Import happens at the time you specify and only runs once.
- **Daily:** Import happens once a day at the time you specify until you delete or pause the schedule on the Import schedule and history page.
- **Weekly:** Import happens once a week at the time you specify until you delete or pause the schedule on the Import schedule and history page.
- **Monthly:** Import happens once a month at the time you specify until you delete or pause the schedule on the Import schedule and history page.

> [!NOTE]
> - Scheduling multiple imports at once may affect their overall start time and import speed.
> - The update count reports all existing items that are fetched from your import source. It may be higher than the actual number of updates because it includes items that may not have been updated since the previous import.
> - Scheduled imports will fetch items that have changed in your import source since your last import. To re-import items that haven't changed in your import source but have changed in Microsoft Advertising: From the navigation menu on the left, hover over **Import** and select **Import schedule & history** > **Run now**.
> - Change history reports the actual number of updates in Microsoft Advertising. It may be lower than the update count as it excludes items that do not have updates.
> - Imports can be scheduled at both the account and manager account levels. When editing, pausing, or deleting an import for one of your accounts, please make sure to review both your account level and manager account level scheduled imports to ensure your imports are modified accurately.
> - If **Updates to existing items** is turned on, then campaign status updates (such as Paused/Enabled) in Google Ads, Meta Ads, and/or Pinterest Ads will be imported as part of your scheduled import.
> - When scheduled imports are enabled, bids, bid strategies, and campaign budgets may be updated to match the values in Google Ads, Meta Ads, and/or Pinterest Ads. These updates are controlled by the **Update bids**, **Update bid strategies**, and **Update existing campaign budgets** settings under **Bids and budgets**.
