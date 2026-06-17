---
title: Submit Online Product Inventory Update Feeds
description: Here is how you create a feed file using a spreadsheet program.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
ms.author: jonmeyers
author: jonmeyers
---

# Submit online product inventory update feeds

For product attributes that you update frequently—such as price, availability, sale price, and sale price effective date—you can easily make updates using online product inventory update feeds. While you will still need to submit your full product feed at least once every 30 days, you can use the update feed for the specific attributes that are already in your full product feed: Price, availability, sale price, and sale price effective date.

## Why should I use the online product inventory update feed?

- Allows for faster processing for frequently changing attributes.
- Keeps your Product ads data up-to-date.
- Allows the option to submit only offers that have changed.

## When should I use the online product inventory update feed?

There are two different feed types you can use to upload your product data. The first is the main product feed file for your Microsoft Merchant Center product data, which should be submitted at least every 30 days. Any time you upload a new product feed file, it overwrites the previous uploads.

You'll also want to use the online product inventory update feed when you want to update only price, availability, sale price, and sale price effective date that's already been submitted in your main product feed file. This means:

- You can update the price, availability, sale price, and sale price effective date quickly and frequently,
- You can make updates only to these attributes without having to update the entire feed file, and
- If there is an error with the update feed file, it won't impact the main product feed file.

The online product inventory update feed can be uploaded manually through the update feed tab or via FTP/SFTP. Once the feed has been processed, the report will be available in the update feed tab on the top banner. Below, you can learn how to [upload a feed file via FTP/SFTP](#upload-a-feed-file-via-ftpsftp-files-under-1gb), [upload a feed file manually](#upload-a-feed-file-manually-files-under-4mb), and [check the feed status](#check-feed-status). You can also see [an example of an online product inventory feed](#example-submissions-of-the-online-product-inventory-update-feed), [file format requirements](#file-format-requirements), and [accepted symbols in feed files](#accepted-symbols-in-feed-files).

## Upload a feed file via FTP/SFTP (files under 1GB)

You may use this option if the feed file is smaller than 1GB. This is the recommended option if the feed file is larger than 4MB.

- **When submitting via FTP/SFTP:**

  - The file name must be in the following format: inventoryfeed_{market}.txt (for example, inventoryfeed_enus.txt).
  - The supported market values are enus, enuk, dede, frfr, enau, enca, and enin.
  - The file name is case sensitive.
  - If you send the file with a ZIP file, both the ZIP file name and the file name must follow the naming format above.

- **FTP/SFTP server requirements**

  The recommended FTP/SFTP upload mechanism is via an FTP/SFTP program. It is, however, possible to do so via the command line or custom scripts (such as Python's ftplib.FTP module). The FileZilla FTP/SFTP client is recommended for all platforms.

  Use the following settings for file transfer with your FTP/SFTP client:

  - Host: ftps://feeds.adcenter.microsoft.com
  - Username: Your store's FTP/SFTP user name. Your user name must be 6-64 characters and cannot include any special characters. Use only a-z, A-Z, and 0-9.
  - Password: Your store's FTP/SFTP password
  - Transfer Mode: Passive

  Learn more about [FTP/SFTP upload](hlp_BA_CONC_BMCFTPRequirements.md).

  The feed contains five attributes, as detailed below.

  | Attribute | What it is | Required in txt header row? | Can value be blank? |
  | --- | --- | --- | --- |
  | **'id'** | The ID of the product that will be updated. The ID must match the ID provided in the full product feed file. | Yes | No |
  | **'price'** | The price submitted here overrides the price from the last submission of the product feed file. If price is submitted, the value cannot be blank. No changes will be made if the value is blank and you’ll receive the following error message:<br>*Offer cannot be updated as price cannot be blank. Please add a valid price value.* | No | No |
  | **'availability'** | The availability submitted here overrides the availability from the last submission of the product feed file. If availability is submitted, the value cannot be blank. No changes will be made if the value is blank and you’ll receive the following error message:<br>*Offer cannot be updated as availability cannot be blank. Please add a valid availability value.* | No | No |
  | **'sale price' and 'sale price effective date'** | The sale price and sale price effective date submitted here overrides what was last submitted from the product feed file. If blank values are submitted, it will void the previous sale details submitted from the last product feed file. | No | Yes |

## Upload a feed file manually (files under 4MB)

You may use this option if the feed file is smaller than 4MB.

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Feeds**.
1. Select the name of the feed you want to update > **Update feed**.
1. Select **Manual Upload**.
1. Select **Browse** > find and select the online product inventory update feed file.
1. Select **Update feed**.

## Check feed status

Once the feed has been processed, the report will be available in the update feed tab on the top banner.

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Feeds**.
1. Select the name of the feed whose status you want to see.
1. Select **More details** or **Less details** for more or less details, respectively.

## Example submissions of the online product inventory update feed

- **Update price**

  | id | price |
  | --- | --- |
  | **Offer1** | 20 |

- **Update availability**

  | id | availability |
  | --- | --- |
  | **Offer2** | Out of stock |

- **Update sale price and sale price effective date**

  | id | sale_price | sale_price_effective_date |
  | --- | --- | --- |
  | **Offer3** | 30 | 2017-01-01T00:00/2017-04-30T00:00 |

- **Void sale price**

  | id | sale_price | sale_price_effective_date |
  | --- | --- | --- |
  | **Offer4** |  |  |

## File format requirements

- File must be tab delimited plain text with extensions: TXT, ZIP, GZ, GZIP, TAR.GZ, TGZ. XML files are also accepted only if they are Google-formatted.
- The file name must be in the following format: inventoryfeed_{market}.txt (for example, inventoryfeed_enus.txt). This also applies to the file inside compressed files.
- In the case of compressed text format, the compressed TXT file inside the archive (ZIP, GZ, GZIP, TAR.GZ, TGZ) must have the matching file name.
- File must start with a single header row.
- Each product offer must be on a separate line of the file.
- Do not include HTML in the text files.
- Do not include trailing tabs at the end of lines.
- Do not include tabs or line breaks in the middle of offer attributes.
- Special/invalid characters will cause processing problems. Learn more about accepted symbols in feed files.

## Accepted symbols in feed files

Below are the symbols/special characters and what attribute they are accepted in.

| Symbols | Where you can use them |
| --- | --- |
| **Period [.]** | Prices, URLs |
| **Colon [:]<br>Question [?]<br>Forward-slash [/]<br>Equal [=]** | URLs |
| **Hyphen [-]** | Offer Identifiers where this is valid (eg: ISBN, MPN) |
| **Pipe [\|]<br>Comma [,]<br>Greater [>]** | Multi-value fields (MerchantCategory, B_Category, ads_label) |
| **Any Unicode symbol** | Brand, Title, Description |
