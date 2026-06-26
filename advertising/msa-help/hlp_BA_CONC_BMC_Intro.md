---
title: Microsoft Merchant Center
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: 
---

# Microsoft Merchant Center

> [!NOTE]
> Learn more about where [Microsoft Shopping campaigns and Product ads are available](hlp_BA_CONC_Countries.md).

Microsoft Merchant Center allows you to create a feed, which includes images and other information about your products, so that your products can display on the [Microsoft Advertising Network](hlp_BA_CONC_AboutAdvertisingNetwork.md).

Product ads allow you to include product details such as image and price within your ads, delivering key information about the product offers that will help users make informed decisions before clicking on the ads (which often improves the conversions). Product ads pull inventory from the Microsoft Merchant Center feed files that you submit.


- **Step 1: Verify and claim your website's URL**

  If you want to create a Microsoft Merchant Center Store, you need to verify and claim your website through Bing Webmaster Tools or an existing Universal Event Tracking (UET) tag.

  The website destination URL associated with your Microsoft Merchant Center store is used to verify that you indeed own your uploaded product offers. For this reason the Links specified in your feed file must be a sub-path of either this website destination URL or subdomain of this destination URL. Product offers with URLs that are not sub-paths of this website destination URL will be rejected.

  The Microsoft account that you use to verify and claim your website depends on if the website has been previously verified on Bing Webmaster Tools. You do not necessarily need to use the same account to verify and claim your site. Details are in the instructions below.


  - **Determine the exact website destination URL**

    To ensure all your uploaded product URLs are successfully processed, you'll need to verify and claim the right website destination URL.

    The best destination URL is the top-level URL of your website, e.g. http://example.com if your product URLs use the format http://example.com/product/path/.

    When entering this URL, there are some formatting requirements:

    - The URL must start with a protocol: http:// or https://
    - No IP addresses: e.g. http://127.0.0.1
    - No ports are allowed: e.g. http://example.com:8000

  - **Verify your website destination URL with Bing Webmaster Tools**

    If your website has not been verified via Bing Webmaster Tools, follow the first set of instructions below.

    If your website has already been verified via another Microsoft account on Bing Webmaster Tools, you should follow the second set of instructions.

    > [!IMPORTANT]
    > For existing URL verification, you should sign in to the Bing Webmaster Tools using the Microsoft account. that verified this website.

    **New URL Verification**

    If your website has not been verified via Bing Webmaster Tools, follow these steps below to do so:

    1. Sign in to Bing Webmaster Tools using the same Microsoft account that you will use to create your Microsoft Merchant Center store.
    1. Under **My sites**, enter your website's destination URL and select **Add**.
    1. If you want, you can provide more details about your website, and then select **Add**.
    1. You will be taken to a page which details three methods for verifying your website URL. Choose one of the methods and follow the steps to verify your website.
    1. Successful URL verification will take you to a website dashboard page.

    **Existing URL Verification**

    If your website has already been verified via another Microsoft account on Bing Webmaster Tools, follow these steps to associate your Microsoft account used for Microsoft Advertising with the URL:

    1. Sign in to Bing Webmaster Tools using the Microsoft account. that verified this website.
    1. Select the website from the home page.
    1. Select **Configure my site** and then select **Users**.
    1. You will be taken to a page where website users can be added and deleted. Follow the steps to add a new user's email to your website, and then add the Microsoft account. used for Microsoft Advertising.

  - **Verify your website destination URL with a Universal Event Tracking (UET) tag**

    If you have a Universal Event Tracking (UET) tag on your site, Microsoft Advertising has already validated your domain. When prompted to verify your site, select **Validated via UET tag** as your choice for domain validation.

    > [!NOTE]
    > - If you validate your domain using a UET tag, the tag has to register at least 50 events before the domain appears as an option when you create a Microsoft Merchant Center store. After the 50 events have been registered, it can take an additional 48 hours for the domain to appear on the list.
    > - If you have several domains, only 100 will appear on the list. Please [contact support](https://go.microsoft.com/fwlink/?linkid=398371) if you cannot find the domain in the list.

    To learn more about UET tags, see [FAQ: Universal Event Tracking](hlp_BA_CONC_UET_FAQ.md).

  - **Claim your website destination URL**

    You claim your verified website destination URL by creating a Microsoft Merchant Center store and specifying your website in the “Destination URL” field.

  Once you have claimed your website destination URL, the next step is to create your Microsoft Merchant Center store.

  > [!NOTE]
  > Once you set your website destination URL, you cannot change it for your respective stores.

- **Step 2: Create your Microsoft Merchant Center**

  To list your feed on Bing, you first need to create a Microsoft Merchant Center store. Once you create a store, it will either be auto-approved, auto-rejected, or queued for a manual review. The review can take up to 5 days, but you will receive an email when an approval decision has been made.

  1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Manage stores** (shopping cart icon).
  1. Select **Create store**.
  1. Enter your store info, including your Store description and SSL Checkout selection. You also have the option to block aggregators here.
  1. You'll also be asked to verify your site through **Domain validation**. You have two choices:

     - Validated via Bing Webmaster Tools
     - Validated via [Universal Event Tracking (UET) tag](hlp_BA_CONC_UETv2WhatIsTag.md)

     > [!NOTE]
     > If you validate your domain using a UET tag, the tag has to register at least 50 events before the domain appears as an option when you create a Microsoft Merchant Center store.

  1. Select **Save**. <br> After successful store creation, you will be taken to a page where you will be informed of the store status. You'll be able to check if your store was automatically approved/rejected or is queued up for manual review.

  After your store is approved, you can [create your feed](hlp_BA_CONC_BMCWhatIsCatalog.md).

  **Things to keep in mind when creating a store**

  - Your store name is required and can be edited. It will appear in your Product ads, so accuracy is important.
  - Destination URL has to have been verified using Bing Webmaster Tools or a UET tag. It must also comply with URL formatting rules such as starting with a protocol (http:// or https://).
  - If you want to use the content API for creating and sending feeds, you will need to get a tenant URL. [Learn more](https://go.microsoft.com/fwlink/?linkid=843127)
  - If you validate your domain using a UET tag, the tag has to register at least 50 events before the domain appears as an option when you create a Microsoft Merchant Center store.

  <a id="potential-store-rejection-reasons"></a>

  **Potential store rejection reasons**

  - Attempting to claim an unverified domain.
  - The Microsoft Advertising customer has been identified as an adult advertiser.
  - Lack of presence in the markets supported for Product ads by Microsoft Advertising.
  - Lack of a “real” privacy policy on website.
  - Non-encrypted (non-SSL) checkout. You will want to verify that your SSL certificates are valid.

  **Creating multiple stores**

  You can create multiple stores but you cannot create multiple stores for the same domain and you are not allowed to sell the same products through multiple stores. For example, if you sell sporting equipment you can create a golf store and a basketball store. You can only create a feed that targets a specific market from one of those stores. You can create as many feeds targeting that market from within that one store, but only that store.

- **Step 3: Create and submit a feed file**

  Now that your MMC store is created, you need to create a feed file that contains the information you want to insert into your ad that will define how the ads will display on Bing. Each store can have more than one feed but the products in each file must be unique per market.


  - **How do I create a feed?**

    After you [verify that you own your URL](hlp_BA_PROC_ClaimYourDomain.md) and your newly [created store](hlp_BA_PROC_CreateBingMerchantCenterStore.md) is approved, you create your feed.

    - From the navigation menu on the left, select **Tools** > **Merchant Center**.
    - Select the store that you want to update.
    - Select the **Feeds** tab and then **Create feed**.

    **What you need to know**

    - Your feed file must be tab delimited plain text with extensions: TXT, ZIP, GZ, GZIP, TAR.GZ, TGZ. We only support XML files if it is an existing Google-formatted XML file.
    - The feed name is used for identifying your feed on Feed management and in Feed reports. It can be modified at a later time.
    - The Feed location specifies which market (country and language) the feed would be used for.
    - Feed file submission methods specify how you will transfer the product offer information files to Microsoft Merchant Center.

  - **How to I create or update a feed file?**

    Here is how you create a feed file using a spreadsheet program. If you want to use a text editor, make sure to use [the required attributes](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md). You can also take a look at a [short example of a feed file](https://advertiseonbing.z22.web.core.windows.net/blob/bingads/media/library/docs/bingmerchantcenter_example_feed.txt).

    > [!NOTE]
    > Your feed file must be tab delimited plain text with extensions: TXT, ZIP, GZ, GZIP, TAR.GZ, TGZ. We only support XML files if it is an existing Google-formatted XML file.

    1. Open Microsoft Excel or other spreadsheet program.
    1. Create a header row in the first row entering the attribute names that would be used to describe products. <br> Be sure each attribute is in its own column and you include all [required attributes](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md).
    1. Enter your product offer information in the rows below the header row, using one row for each product. <br> Each item's attribute values should be listed in the same column as the corresponding header attribute name. This means a product's id must be in the column with header attribute “id”.
    1. Save your spreadsheet as a tab delimited excel file. If using Microsoft Excel, save as Text (Tab delimited) (TXT).

    - **How do I update the feed file?**

      Your feed expires after 30 days, which causes the products to stop publishing, so you need to update your feed file. To keep your product information fresh, it is a good practice to upload your feed daily.

      1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
      1. Select the store that you want to update.
      1. Select the **Feeds** tab.
      1. Select the checkbox beside the feed file's associated feed.
      1. Select **Update feed**.
      1. Use one of the [three methods to submit your feed file.](#SubmitFeedFile)
      1. Select **Update feed**.

  - **How do I submit my feed file?**

    After you have created and (optionally) tested a corresponding feed file, it can be submitted to the associated feed. There are four different ways to submit:

    <a id="SubmitFeedFile"></a>


  - **Upload feed file manually (Files under 4MB)**
    You can use this option if the feed file is smaller than 4MB.

      1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
      1. Select the store name and then the **Feeds** tab. Select the checkbox beside the feed file’s associated feed.
      1. Select **Update feed**.
      1. Under **Input method**, select **Manually upload**.
      1. Browse for feed file and select **Update feed**.

    - **Upload feed file via FTP (Files under 1GB)**

      You can use this option if the feed file is smaller than 1GB. This is the recommended option if the feed file is larger than 4MB.

      1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
      1. Select the store name and then the **Feeds** tab. Select the checkbox beside the feed file's associated feed.
      1. Select **Update feed**.
      1. Under **Input method**, select **Upload file via FTP/SFTP**
      1. Enter **File name**. Do not include the file extension. For example, “merchant”.
      1. Select **Update feed**.
      1. If necessary, select **change FTP account** and update your FTP user name and password. <br>Your user name must be 6 - 64 characters and cannot include any special characters. Use only a - z, A- Z, and 0 - 9.<br> You can now upload the file of specified file name via the FTP tool of your choice.

      **FTP server requirements**

      The recommended FTP upload mechanism is via an FTP program. It is however possible to do so via the command line or custom scripts (such as Python’s ftplib.FTP module). The FileZilla FTP client is recommended for all platforms.

      Use the following settings for file transfer with your FTP client:

      - Host: ftps://feeds.adcenter.microsoft.com
      - Username: Your store's FTP user name. Your user name must be 6 - 64 characters and cannot include any special characters. Use only a - z, A- Z, and 0 - 9.
      - Password: Your store's FTP password
      - Transfer Mode: Passive

      Learn more about [FTP upload](hlp_BA_CONC_BMCFTPRequirements.md).

    - **Automatically download from URL (Files under 1GB)**

      You can use this option if the feed file is smaller than 1GB and on a publicly accessible server. The feed file will be downloaded once every 24 hours.

      1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
      1. Select the store name and then the **Feeds** tab. Select the checkbox beside the feed file's associated feed.
      1. Select **Update feed**.
      1. Under **Input method**, select **Automatically download file from URL**
      1. Enter **Source URL**. For example, https://www.contoso.com/feeds/merchant.txt.
      1. If required, enter **User name** and **Password**.
      1. Select **Update feed**.

      **Downloading your feed file from Google**

      1. Open your feed file in Google Docs.
      1. Select File and select Publish to the web.
      1. Select Web page and select either Comma-separated values (.csv) or Tab-separated values (TSV).
      1. Select Publish.
      1. Copy the generated link and use the link as your automatic download URL in your Microsoft Merchant Center feed.

    - **Use the Google Merchant Center import tool**

      You can use the Google Merchant Center import tool, if you already have Product ads in your Google Merchant Center. Learn how to [use the Google Merchant Center import tool](hlp_BA_CONC_BMC_GMCImportIntro.md).

    - **What are the file format requirements and accepted symbols?**

    **File format requirements**

    > [!NOTE]
    > If the following file format requirements are not met, your feed file will not be processed.

    - File must be tab delimited plain text with extensions: TXT, ZIP, GZ, GZIP, TAR.GZ, TGZ. <br> - XML files are also accepted (if Google-formatted).
    - If uploading via FTP, the file name of TXT or XML files have to match the file name specified for a feed’s settings. <br> In the case of compressed text format, the compressed TXT file inside the archive (ZIP, GZ, GZIP, TAR.GZ, TGZ) must have the matching file name. Any feed file that is archived needs to have a single compressed file inside.
    - File must start with a single header row.
    - Each product offer has to be on a separate line of the file.
    - Do not include HTML in the text files.
    - Do not include trailing tabs at the end of lines.
    - Do not include tabs or line breaks in the middle of offer attributes.
    - Special/Invalid characters will cause processing problems. Learn more about Accepted Symbols in Feed Files next.

    **Accepted symbols in feed files**

    Here are the symbols/special characters and what attribute they are accepted in.

    | Symbols | Where you can use |
    | --- | --- |
    | **Period [.]** | Prices, URLs |
    | **Colon [:]<br>Question [?]<br>Forward-slash [/]<br>Equal [=]** | URLs |
    | **Hyphen [-]** | Offer Identifiers where this is valid (eg: ISBN, MPN) |
    | **Pipe [\|]<br>Comma [,]<br>Greater [>]** | Multi-value fields (MerchantCategory, B_Category) |
    | **Percent [%]<br>Special ASCII characters** | Redirect URL (ads_redirect) |
    | **Any Unicode symbol** | Brand, Title, Description |

> [!NOTE]
> Next up—take a closer look at all you need to know about [feed files](hlp_BA_CONC_BMC_FeedFiles.md).
