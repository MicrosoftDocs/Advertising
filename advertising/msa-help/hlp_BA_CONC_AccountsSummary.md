---
title: Get the big picture from the Accounts summary page
ms.service: msa-help
ms.subservice: msa-accounts-setup
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Get a view of your Microsoft Advertising account hierarchy and take action as needed.
---

# Get the big picture from the Accounts summary page

The **Accounts summary** page provides a summary of your account hierarchy in Microsoft Advertising. It is home to other pages that allow you to work across all of your accounts: **Accounts Summary**, **Bulk Operations**, **Save Account Reports** and **Import Accounts**.

## Accounts summary

The **Accounts** page displays the parent-and-child hierarchy of accounts, along with their performance, budget data, and notifications. The individual tables within the Accounts summary's five tabs are designed to help you quickly target items that need your attention. Want to find out which of your accounts have the lowest CTR, so that you can optimize your keyword lists? Want to see which invoiced accounts need new insertion orders? Need to know which manager account owns a specific account? Want to review a summary of your most recent import? Need an update on account linking and unlinking activity? You'll find your answers on the **Accounts summary** page. To access the **Account summary** page, go to **Tools** > **Accounts** > **Accounts summary**.

This view of Accounts Summary has five tabs: Performance, Management, Notifications, Requests and Import.

In **Performance**, the table shows the totals of key performance metrics across all campaigns per account. The overall total, at the bottom of the table, sums up performance for all accounts across all manager accounts. Within **Performance**, you can also:

- [Segment your performance data](hlp_BA_CONC_Segmentation.md)
- [Compare performance by date ranges](hlp_BA_CONC_POP.md)
- [Download your Campaigns page performance data](hlp_BA_CONC_DownloadTableAsReport.md)
- [Use graphs to see data for every level of your campaign](hlp_BA_CONC_CampaignPageGraphs.md)

In **Management**, the table lists important account and billing settings, like account owner, payment settings, budget information, and the primary contact for each account.

In **Requests**, the table shows details about **Sent** and **Received** requests for linking and unlinking accounts. [Learn more about linking to an existing account.](hlp_BA_CONC_MultiAccount.md)

In **Notifications**, the table lists all current notifications by account. [Learn more about Notifications.](hlp_BA_CONC_Notifications.md)

In **Import**, the table provides a high-level summary of the latest imported campaign data by account, along with the schedule of imports.

There are shortcuts just above the **Performance**, **Management**, and **Imports tables** so that you can build your hierarchy further: **Create account**, **Deactivate** an account, **Link to accounts**, and **Unlink from accounts**.

Like other tables in Microsoft Advertising, you can filter your results and select the columns you want to view. Here are the default columns for the **Performance**, **Management**, **Notifications**, **Requests**, and **Import** tabs:

| Performance tab | Management tab | Notifications tab | Requests tab (Sent) | Requests tab (Received) | Import tab |
| --- | --- | --- | --- | --- | --- |
| **Errors** | Errors | Account Name | Account | Account | Account name |
| **Account name** | Account name | Severity | Account owner | Account owner | Errors |
| **Currency** | Actions | Category | Request type | Request type | Last import start time |
| **Owner** | Owner | Type | Who Pays | Requested by | Import name |
| **Clicks** | Bill-to customer | Action | Status | Who pays | Import tool |
| **Impressions** | Payment setting |  | Effective date | Status | Level |
| **CTR** | Balance |  | Request date | Effective date | Summary |
| **Average CPC** | Currency |  | Actions | Request date | Scheduled imports |
| **Spend** | Business location |  |  | Actions |  |
| **Conversion** | Tax ID |  |  |  |  |
|  | Payment method |  |  |  |  |
|  | Total daily budget |  |  |  |  |
|  | Primary contact |  |  |  |  |

> [!NOTE]
>
> - The **Accounts summary** page is your landing page after you sign in to Microsoft Advertising. Want to change this? At the bottom of the page, select **When I sign in, take me to the Campaigns page**.
> - Some table cells will have dashes when there isn't enough data to show any result.
> - If your accounts are in different currencies, you won't see overall totals for performance metrics and budget data that provide financial information (for example, average CPC, spend, IO budget).
> - When you filter the table data, overall totals will only include filtered accounts.

## Bulk Operations

Bulk operations allow you to make bulk updates across campaigns for all accounts. Here, you can filter and download data you want to change into a spreadsheet, make the changes you see fit, then upload the edited spreadsheet at all once. [Learn more about bulk operations.](hlp_BA_CONC_AboutBulk.md)

> [!NOTE]
> If you have a hierarchy of accounts that contains manager accounts within manager accounts, use the account selector to drill down to a specific set of accounts within a manager account.

Advanced users can also take advantage of **Scripts**. Scripts are pieces of JavaScript code you can use to automatically create, change, or delete thousands of items in your account based on custom criteria. [Learn more about using scripts.](hlp_BA_CONC_AboutScripts.md)

## Saved Account Reports

These are a collection of reports that were saved directly from the **Accounts Summary** page. Here, you can update individual reports with new settings or re-run existing reports. [Learn how to create a report.](hlp_BA_PROC_CreateReport.md)
