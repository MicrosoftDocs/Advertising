---
title: How Can I Automate My Campaigns with Microsoft Advertising Scripts?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to automate your account and campaigns with Microsoft Advertising scripts.
---

# How can I automate my campaigns with Microsoft Advertising scripts?

Microsoft Advertising scripts are pieces of JavaScript code you can use to automatically create, change, or delete items in your account based on custom criteria. You can make hundreds (or thousands!) of changes across your account all at once without needing to make the changes manually.

Here are some examples of using scripts:

- Schedule campaigns linked to a launch or sale.
- Have an ad pause automatically when the item it's advertising is out of stock.
- Make a rule across your account to increase broad match keyword bids by 25% for keywords that generated more than 100 impressions that day.

## Using Microsoft Advertising scripts

- **Who should use scripts?**

  Scripts are most helpful for people who manage large campaigns and/or a large number of campaigns. It also helps to have some experience scripting in JavaScript.

  It's important to keep in mind that Microsoft Advertising scripts can make wide-ranging changes to your campaigns and that scripts do not have an "Undo" button. If you find this prospect daunting, then [automated rules](hlp_BA_CONC_AutoRuleIntro.md) might be more suitable for you.

- **Create and run Microsoft Advertising scripts**

  1. From the navigation menu on the left, select **Tools** > **Bulk actions** > **Scripts**.

     This is the main **Scripts** page where you will see any scripts you have already created.
  1. Select **Create script**.
  1. In the script editor, enter in your script.

     1. To see examples of scripts that you can copy, select **Examples**.
     1. For instructions on scripting, take a look at our [scripts documentation](https://go.microsoft.com/fwlink/?linkid=871630) and for more scripts you can copy, check out our [scripts code examples](https://go.microsoft.com/fwlink/?linkid=871631).
  1. Select **Save**.
  1. Select **Preview** to see a list of all the changes this script will make. Previewing a script is optional, but *strongly* recommended.
  1. If you want to run the script right away, select **Run script now**.
  1. If you want to run the script at a certain time or multiple specific times, select **Create schedule**.

  > [!NOTE]
  > - If you have multiple accounts and want to run a script across all of them, you'll need to create the script from your manager account. From the top menu, select your account number and then select a manager account (not an ad account). Move through the same steps above and your script will run across all accounts.
  > - If you share accounts with other account managers, be aware that only the author of a script will be able to see and run that script.

- **Manage your scripts**

  After you run a script, it will appear under **Script** on the main **Scripts** page (

  From the navigation menu on the left, select **Tools** > **Bulk actions** > **Scripts**.

  ) Here, you will see when the script ran, how long it took to run, how many changes were made, and how many changes failed. For more information on what the script did:

  1. Select **Scripts History** > **Summary** > **View details**.
  1. In the **Log details** page, you'll see all the changes the script made.
  1. To see how the script made these changes, as well as any errors encountered and log messages you included with the script, select **Logs**.

  To run a script you have already created:

  1. Find the script in your list of previously-created scripts on the main **Scripts** page.
  1. Select **Run** or select **Create schedule** to have the script run at a certain time or at multiple specific times.

- **Can I use the scripts that I created in Google Ads?**

    You can drag any script you created in Google into Microsoft Advertising. When you select Save, we will automatically make some changes to make them compatible with Microsoft Advertising. However, you will need to update the script manually to fix any of the following compatibility issues:

  - If the script calls the budget selector, it returns only shared budgets. To get a campaign's individual budget, you must access it directly from the campaign.
  - If the script includes IDs, you’ll need to turn them into strings by wrapping them in double quotation marks. For example, you’ll need to change .withIds([1234]) to .withIds("1234"]).
  - If the script calls an entity's getStatsFor() method, you’ll need to change the call to getStats() and specify the date range using the selector's forDateRange() method.
  - If the script calls the keyword selector's withIds() method, make sure you pass only an array of keyword IDs. In Microsoft Advertising, keyword IDs are unique, so there’s no need to pass an array of ad group ID and keyword ID pairs.

  > [!NOTE]
  > If the script adds negative keywords with broad match type, Microsoft Advertising converts them to phrase match type when adding them to the account. Microsoft Advertising doesn't support broad match type for negative keywords.

- **Can I set a script to run hourly?**

  No, you can't set a script to run hourly. Instead, create multiple scripts and schedule them for each hour of the day that you want them to run. There's no maximum limit to the number of scripts that you can create.

  1. Duplicate or add the script.
  1. Select **Change schedule**.
  1. Set each hour you would like to run the script.

- **Is there a script I can use to extract account insertion orders (IOs)?**

## For more information

Visit our documentation site for details on scripting:
- [Get Started with Microsoft Advertising Scripts](https://go.microsoft.com/fwlink/?linkid=871630)
- [Microsoft Advertising Scripts Code Examples](https://go.microsoft.com/fwlink/?linkid=871631)
