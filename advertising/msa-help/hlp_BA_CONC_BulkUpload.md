---
title: Upload an edited spreadsheet
ms.service: msa-help
ms.subservice: msa-bulk-import
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to upload a campaign-data spreadsheet you have downloaded and edited.
---

# Upload an edited spreadsheet

> [!IMPORTANT]
> Not everyone has this feature. See [this article](hlp_BA_CONC_AboutBulk.md) for more information.

If you manage multiple Microsoft Advertising accounts, you can make changes to your bids, keywords, ads, ad groups, and campaigns offline using [bulk upload](hlp_BA_CONC_AboutBulk.md). Just download the information you want to change into a spreadsheet, make the changes in the downloaded spreadsheet, and then upload the edited spreadsheet. Here’s how it works:

## Download what you want to change

Download the information you want to see and change. See [this article](hlp_BA_CONC_BulkDownload.md) for more information on downloading spreadsheets.

> [!NOTE]
> - It’s a good idea to save a copy of the original spreadsheet before you make changes. A copy of the original spreadsheet allows you to review your previous settings and revert changes if necessary.
> - If you want to create your own spreadsheet to upload, do a download first to see all the columns to include.

## Make changes in the spreadsheet

Make your changes in the downloaded spreadsheet. See [this article](hlp_BA_CONC_BulkEditing.md) for more information on editing spreadsheets. Keep in mind:

- Do not modify or remove the row that contains the column names.
- Do not modify or remove the **Format Version** row. The number in the Name column must be 5 or 6.
- Required columns:<br>

  **For every spreadsheet:** **Type** (i.e., Campaign, Text Ad, etc.), **ID**, **Parent ID**, **Account ID**, and **Name** (the value in the **Name** column refers to the format version). If you are uploading a spreadsheet that you got from Bulk Upload API, you will need to add an **Account ID** column.

  **Different operations require different columns:** For example, if you want to pause keywords, you must include the **Status** column. If you want to create a new campaign, you will need to include all campaign columns. If you are not sure which columns are campaign columns and which columns are keyword columns, we recommend downloading some campaigns or keywords from your account to serve as a template.
- Image extensions cannot be uploaded at this time.
- Keep the data in the same order as in the original downloaded spreadsheet.
- When you save the spreadsheet, make sure you:

  Select **Unicode Text** for **Save as type**.

  Use quotation marks around the name you give your file, and include ".csv" at the end (as in, "YourFileName.csv"). The quotation marks will not appear in your final file name -- they are there to prevent Excel from adding ".txt" to the file name.
- The file size cannot be greater than 100 MB or have more than 4 million rows.<br> You can zip the file to make its file size smaller, but the zip file can't contain more than one .csv file.
- The data must not exceed the limits defined in [this article](https://help.ads.microsoft.com/#apex/3/en/50851).

## Upload the updated spreadsheet

Here is how you upload the updated spreadsheet:

- From the navigation menu on the left, select **Tools**.
- In the panel on the right, select **Bulk actions** > **Bulk uploads**.
- From the top menu, choose **Uploads**.
- Select **Browse...** to locate your updated spreadsheet.
- Choose **Upload and preview**.
- The preview will show you how many of each entity will be added, deleted, or changed. Review it to make sure it corresponds to what you expect to happen. For example, if you intended to edit five keywords, and the preview instead shows that you will be *adding* five keywords, you should review the spreadsheet again before uploading.

## Review Estimated changes table

When the upload is complete, review the **Estimated changes** table. This shows you the estimated number of updates, additions, and deletions you made, grouped by **Campaigns**, **Ad groups**, **Ads**, and **Keywords** (changes made to other entities are grouped under **Others**).

> [!IMPORTANT]
> Once you select **Apply changes**, there is no automatic way to cancel or revert your changes. That's why we recommend that you save a copy of the original spreadsheet before you make changes. A copy of the original spreadsheet allows you to review your previous settings and revert changes if necessary.

## Apply changes

Select **Apply changes** to apply your updates to Microsoft Advertising. When the process is complete, two things happen:

- An **Applied changes** table will appear, showing how many updates, additions, and deletions were made, and how many errors were encountered (if any). To see all the updates, additions, deletions, and errors in a spreadsheet, select **Download all results**. To review only the errors encountered, select **Download errors only** (this button only appears if your upload encountered errors). You can also select the ellipsis icon

  :::image type="content" source="media/BA_ScreenCap_DeliveryDetails.png" alt-text="More information icon.":::

  next to the upload’s **Summary** to see the **Applied changes** table again at any point.
- The upload will appear in the **Uploaded file** list. If your upload encountered no errors, you will see a **Download results** button. Choose this to get a spreadsheet listing all the updates, additions, and deletions. If your upload encountered at least one error, you will see a **Download** drop-down. select this, then choose to **Download all results** or **Download errors only**.

> [!NOTE]
> Only use **Download errors only** for reference. To fix errors, you should use **Download all results**.

## Fix errors

Fix any errors in the **Download all results** spreadsheet. In this spreadsheet, a successful update to an entity will have "#OK" in the **Result** column. If an update encountered an error, it will have "#Error" in the **Result** column and an added row below for each error encountered. These added error rows will have "#ErrorDetail" in the **Result** column and will also show you the appropriate error code and error code number. For more information about these error codes, see the Bing Ads API docs on [operation error codes](https://go.microsoft.com/fwlink/?linkid=2202885) and [editorial failure reason codes](https://go.microsoft.com/fwlink/?linkid=2202938).

You can then edit the **Download all results** spreadsheet to fix the errors and re-upload it. You do not need to delete or worry about the added error rows and columns when you re-upload. However, we recommend that you delete the rows for successful updates (the ones with "#OK" in the **Result** column) before re-uploading. If you re-upload "#OK" rows, no damage will occur, but all of the entities will subsequently appear in your Microsoft Advertising Change History.

## What if I made a mistake?

If you discover that you made mistakes in your edits after you apply the changes, you have two options:

- If you saved a copy of your original downloaded spreadsheet, you can edit it again (save a copy of the original!) or simply upload it to revert all your changes.
- If you didn't save a copy of your original downloaded spreadsheet, you can find the original download on your **Downloads** page (note: downloads are only saved here for 90 days). Re-download it and edit it again (save a copy of the original!) or upload it to revert all your changes.
