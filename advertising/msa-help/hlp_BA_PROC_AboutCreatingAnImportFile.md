---
title: Import Data using a File
description: Import your campaign data from other online advertising programs into MSA using a file.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Import data using a file

If you already have campaigns in other online advertising programs, you can import the data into MSA using a file. We provide an import template that you can manually fill out with your campaign information to ready it for import into MSA.

## Things to know about the file

- It must be an Excel, CSV (comma-separated values), or TSV (tab-separated values) file.
- Imported column headers must be in Google_Ads or MSA format in order to be recognized.
- Duplicate keywords will be skipped during import. For example, "Apple" and "apple" will appear as duplicates and will therefore be skipped.
- Words like “gambling” or “firearms” may require further inspection, so they will either be editorially reviewed and skipped during an import or editorially reviewed after the import.

## Create the file using a MSA template

First, you'll need to download the template from MSA and then you can add your data.

1. <!-- include: ImportFile -->
2. Select **Download the import template**.
3. Fill the template out with your campaign data.
4. Select **File** and then **Save as**.
5. Name the import template. Use quotation marks around the name and include .csv at the end. For example, "YourFileName.csv". The quotation marks will not appear in your final file name, but are used to prevent Excel from adding ".txt".

## Import the file into MSA

1. <!-- include: ImportFile -->
2. If you have imported from a file in the past 90 days, you will see a table that tells you the **Date/Time** and **Uploaded file** that was imported along with:

   | Column Name | Description |
   | --- | --- |
   | Summary | Shows how many entities were imported successfully and how many had errors. Click the ellipsis ellipse to see details. |
   | Actions | If you had errors, you will see a link to download the error file which you can review. |
3. Select **Browse** and open the file.
4. Choose either **Microsoft Advertising format** or **Google format**.
5. Select **Continue**.
6. Use the dropdown lists under **Review column matching** to adjust any MSA column headings to match those in your import file.
7. Select **Continue**.
8. Select your desired options under **What to import**, **Bids and budgets**, and **Other options**.
9. Select **Import**.
10. Review the **Import summary** to see what entities were newly added, updated, or couldn't be imported (skipped).
11. If you want to review the details of the campaigns and make changes, select **View imported campaigns**.

Unmatched columns will not be imported. You have the option to edit destination URLs and choose to share identical sets of ad extensions between campaigns. You cannot update or delete existing ad extensions through file import.

## File import with a different locale

Due to some inconsistencies between decimal points and commas that present with European locale settings on MSA and/or your operating system, we recommend the following instructions, which apply if your updated file is based on the report file downloaded from MSA.

Please review the decimal delimiter of numerical values in the data preview grid during the **Review column matching** step before importing to make sure that the delimiter matches the locale of your MSA account.

If both your MSA and your operating system are set to a European locale,

1. Download the file with a decimal point as the delimiter.
2. Open the file using Excel, which will translate decimal points to commas.
3. Save it as a “Text (tab delimited)” file, which allows you to modify the document while maintaining commas.
4. Rename the TXT file to TSV.
5. Import the file as a TSV file.

If only your MSA is set to a European locale, set the local override in Excel and follow the steps above.

If only your operating system is set to a European locale, save the file as an Excel file. Excel doesn't change any commas, so you can edit freely.
