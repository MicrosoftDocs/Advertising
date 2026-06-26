---
title: Microsoft Advertising on PrestaShop - The Microsoft Ads and Listings Module
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Microsoft Advertising and PrestaShop partnered to create a Microsoft Advertising module for PrestaShop - The Microsoft Ads and Listings module.
---

# Microsoft Advertising on PrestaShop - The Microsoft Ads and Listings module

Microsoft Advertising and PrestaShop have partnered to create the Microsoft Ads and Listings module. Prestashop is an open-source eCommerce solution, where you can set up and customize an online store, and then effortlessly sell, ship, and manage your products. With the Microsoft Ads and Listings module on PrestaShop, you can use your shopping catalog directly in the Microsoft Merchant Center, where you can set up Shopping campaigns to promote your products.

### The benefits of using this module

- Create paid Smart Shopping campaigns to promote your products and reach more customers.
- Showcase your products across the Microsoft Advertising Network with free listings.
- Track and manage the performance of your campaigns to maximize your business growth.

## Set up the Microsoft Ads and Listings module

To connect to Microsoft from PrestaShop, you must first install the Microsoft Ads and Listings module and then set up your shop.

> [!NOTE]
> Optionally, you can download from the PrestaShop Addons Marketplace, but we recommend installing our module directly from the back office, which is explained below.

<a id="Install"></a>

1. From the PrestaShop back office, select **Modules** > **Marketplace**.

   > [!NOTE]
   > If you're using PrestaShop version 1.7.8.0 or older, select **Modules** > **Module Catalog**.
1. Search for "Microsoft".
1. Under the **Microsoft Ads and Listings** module card, select **Install** > **Configure**.
1. Select **Get started**.
1. Select the checkbox next to each of Microsoft Advertising's requirements.
1. Select **Continue**.

   > [!NOTE]
   > We'll review your store after you complete its setup. If any requirement is unfulfilled, we may suspend your account until it's resolved. Please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) for help.
1. Under **Your Microsoft Advertising account**, select either:

   - **Connect to your Microsoft Advertising account** to connect to an existing account. If you have multiple accounts, you'll be prompted to choose the one you'd like to connect with.
   - **Create a new Microsoft Advertising account** if you don't have an existing account. You'll be prompted to sign up for a new account with basic details. We'll follow up via email to confirm.
1. Enter the **Store name** which will be displayed to your customers alongside your products and used for your MMC account.
1. Select the appropriate **Country/region of sale** option.
1. Map your product attributes to Microsoft Advertising attributes.

   > [!NOTE]
   > Some product attributes are required (e.g., product **Title** and **Price**). We'll try to automatically map required attributes to your product fields, but you may customize how Microsoft Advertising attributes map to your products. [Learn more about required and supported attributes](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md).
1. Select **Finish** to complete the setup process.

## Get started with the Microsoft Ads and Listings module

There are three tabs on the left pane:

- **Overview** displays a summary of the products you've synced with Microsoft, notifications, relevant help articles, and a link to Support.
- **Products** allows you to manage and view details on your product sync settings.
- **Campaigns** shows your campaign performance details.

## UET for PrestaShop

Universal Event Tracking (UET) is the key that unlocks powerful Microsoft Advertising features such as conversion tracking, audience targeting, and automated bidding bid strategies. The key comes in the form of the UET tag, which records what customers do on your website and sends that information to Microsoft Advertising. UET is a prerequisite for conversion tracking, remarketing in paid search, and automated bidding bid strategies. [Learn more about UET](hlp_BA_CONC_UETv2WhatIsTag.md).

By installing and setting up the Microsoft Ads and Listing module, your UET tag is automatically created and is added to your website. If you've downloaded the Microsoft Ads and Listings module from the PrestaShop Addons Marketplace instead of installing directly from the back office, you may need to grant the module permission to write UET tags.

There are two ways to add permissions:

- **Modify file permissions**

  1. Open the terminal.
  1. Enter our module folder.
  1. Run this command: “chmod -R 777 ./”

- **Reinstall the module directly from the back office**

  1. Uninstall the Microsoft Ads and Listing module.
  1. Delete the module files.
  1. Install the module from the **Marketplace** or **Module Catalog** in the **Modules** section of your back office. [(See steps above.)](#Install) This automatically grants our module permission to write.
