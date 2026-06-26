---
title: Download a spreadsheet for bulk upload
ms.service: msa-help
ms.subservice: msa-bulk-import
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to download data from multiple accounts into a spreadsheet so you can make bulk edits offline.
---

# Download a spreadsheet for bulk upload

> [!IMPORTANT]
> Not everyone has this feature. See [this article](hlp_BA_CONC_AboutBulk.md) for more information.

If you manage multiple Microsoft Advertising accounts — each of which could themselves have multiple accounts, you can make download campaign data across them all and edit it offline in a spreadsheet. This is the first step in the [bulk upload](hlp_BA_CONC_AboutBulk.md) process. You can set up a query for a bulk download on your **Accounts Summary** page by clicking **Bulk Operations** and then **Downloads** (or from the global menu at the top of the page, clicking **Tools** > **Bulk edits** > **Downloads**).

## Build the query for your download

Setting up a query for a bulk download is a four-step process:

- **Define spreadsheet scope**: Enter the appropriate manager account IDs or account numbers and then click **Continue** to go to the next step.
- **Filter spreadsheet data**: Here you tell us exactly how to filter your data. Filters are grouped by Microsoft Advertising entity (campaign, ad group, ad, keyword, etc.).

  - Click **Add** to add a filter for an entity.
  - Choose a property on which to filter. A property is a sub-entity, setting, or other attribute of the entity being queried. For example, a campaign’s keywords, an ad group’s sitelink extensions, or an ad’s performance data.
  - Choose an operand to determine *how* the entity property will be queried with your search parameter (for example, Contains, Less than or equals, or Matches all).
  - Enter a search parameter in the field to the right of operand drop-down list.
  -

    > [!NOTE]
    > If you choose **Matches all** or **Matches any** as your operand, a box will pop up, allowing you to enter multiple search parameters. If you are querying your search parameters in the same way (for example, **Contains**, **Equals**, or **Starts with**), you can hit Enter to input multiple parameters in the same field.

  > [!NOTE]
  > - **Matches all** will only return data that matches all of your search parameters. For example, if you filter on campaign names containing "holiday" and starting with "sale", your spreadsheet will only return data from campaign names that both contain "holiday" and start with "sale".
  > - **Matches any** will return data that matches any of your search parameters. For example, if you filter on campaign names containing "holiday" and starting with "sale", your spreadsheet will return data from campaign names that contain "holiday" and from campaign names that start with "sale".

  You can have as many filters as you want, but keep in mind that multiple filters will be additive. This means that only data that meets all the filters’ criteria will be included in your spreadsheet. For example, if you filter on campaign names containing "holiday" and keywords containing "new year", your spreadsheet will only return data from "holiday" campaigns that also have at least one keyword containing "new year". It will not return data for a "new year" keyword that is not in a "holiday" campaign, or for a "holiday" campaign that does not have a "new year" keyword.

  When you have finished defining your filters, click **Continue** to go to the next step.
- **Specify spreadsheet output**: Here you select exactly what data to appear in your spreadsheet. We preselect the data you filtered on by default, but you can add or remove information to appear by selecting or deselecting their checkboxes. For example, you may have filtered on campaigns, but also want to see the campaigns' ad groups or ads in the resulting spreadsheet.

  When you have finished selecting the information to appear in your spreadsheet, click **Continue** to go to the next step.

  > [!NOTE]
  > All ID columns are enclosed in brackets for Excel and CSV files, to ensure that no data is lost when opened in Excel.
- **Schedule spreadsheet download**: Here you tell us *when* you want to download your spreadsheet. If you want to run the download immediately, select **Download now**. If you want the download to run sometime (or multiple times) in the future, select **Schedule download for a later time**.

  You can also set the **Data date range** to query data only from a specific time period. For example, you may want to run it on data from just the past week.

  > [!NOTE]
  > Setting a data date range will only return meaningful results if the data you’ve filtered on is time-related (for example, ad performance data, but not ad name).

  When you have set your download's schedule, click **Done**. If you selected **Download now**, the query will start running immediately and you will be taken to the Downloads page.

> [!NOTE]
> - The maximum download file length is 500,000 rows.
> - If you are downloading from multiple accounts and your download reaches this limit, you will receive one file for each account.
> - If a single account's download reaches this limit, it will be split into multiple files. The files' names will be prefixed as in **[Account number]_File n of nn_** -- for example, **X1234567_File 1 of 3_**.
> - All files will be contained in a single zip file.

## The Downloads page

Here you’ll see all of the downloads that you’ve run in the last 180 days and all of your completed and pending scheduled downloads.

- **Downloads table**

  : In the **Actions** column of each download, you can:

  - **Download file**: After a download has been run, click this to download the resulting spreadsheet. You can edit the data, settings, etc. right in the spreadsheet and then upload it. See [this article](hlp_BA_CONC_BulkEditing.md) for more information on editing bulk spreadsheets and [this article](hlp_BA_CONC_BulkUpload.md) for information on uploading spreadsheets.
  - **View filter criteria**: Click this to review what data you queried in this download.

- **Scheduled downloads table**

  : From this table you can:

  - **Change the status of a scheduled download**: Select a scheduled download’s checkbox and then click **Change status**. The possible statuses are **Enable**, **Pause**, and **Delete**.
  - **Change the schedule of a download**: In a scheduled download’s **Actions** column, click **Edit** to change the timing of the download.
  - **Use a scheduled download as a template for a new download**: In a scheduled download’s **Actions** column, click **Create similar** to open the download query builder with everything preset to this download’s settings.

    > [!NOTE]
    > This will create a new download -- it will not change the scheduled download you based it on. If you want to change the settings of an existing scheduled download, you will need to use **Create similar** to make the changes, and then pause or delete the existing scheduled download.
