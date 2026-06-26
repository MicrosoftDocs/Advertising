---
title: Import shopping campaigns from Google ads
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: You can import Merchant Center store information for shopping campaigns into Microsoft Advertising from Google ads.
---

# Import shopping campaigns from Google ads

> [!NOTE]
> During the Import process, you may be asked to confirm whether any of them are intended for political advertising.

If you're already using Google ads to advertise on Google, you can import these campaigns into Microsoft Advertising so that you can run the same ads on Bing.

You can only import shopping campaigns from Google ads to Microsoft Advertising if you have a Microsoft Merchant Center store. Without a store, your shopping campaigns will not be imported with your other campaigns and settings from Google ads. If you don't have a store yet, we'll help you set one up.

## Get started

To get started, follow the steps in [Import campaigns directly from Google ads](hlp_BA_PROC_ImportCampaign.md). Choose a Google ads account or specific campaigns within the account. If we find that you're importing shopping campaigns from Google ads, you'll have the option to select an existing store or create a new store.

You'll reach a step that will help with store selection, which will guide you to choose the appropriate store for your imported shopping campaigns. Based on your imports, we determine the unique Google Merchant Center stores that are used for those shopping campaigns. In many cases, there may just be one store.

We recommend that you sign into your Google Merchant Center account before choosing a store. This way, we'll have more information, such as the store name and domain that will help us suggest a store for you to select.

> [!NOTE]
> Remember, not all Google Ads accounts have access to Google Merchant Center stores. Try logging in from a Google account that does have access to Google Merchant Center. If you still don't have access, it's ok—create a draft store and set it up later.

We remember which Google Merchant Center store maps to which Microsoft Merchant Center store and will apply those mappings to any future imports. These settings apply to all imports in your manager account.

You'll have three options for store selection:

- **Existing Microsoft Merchant Center store.** You can choose an existing Microsoft Merchant Center store to use for your Shopping campaigns. By default, we'll suggest a matching store, but you can always change the selection.
- **Import a Google Merchant Center store.** If you log in to Google Merchant Center, we can import your stores into Microsoft Merchant Center. This will create a Microsoft Merchant Center store with the same name, domain, and settings as your Google Merchant Center store. Sometimes, these selections are read only. This means that the import tool found and locked in a perfect match from Google Merchant Center to Microsoft Merchant Center. When you create a Microsoft Merchant Center store using your Google Merchant Center credentials, we’ll import all your products from Google and create feeds in the markets we support. Any items in additional markets added to Google Merchant Center after that import will need to be created manually in Microsoft Merchant Center. Your campaigns will go live when the feed import is complete.
- **Draft store.** Draft stores are temporary stores meant to hold the place of an active, approved store. You should only choose this option if you're unsure which store to select or if you would like to setup the store later. We will create one draft store for each Google Merchant Center store detected during the import process. If there are multiple campaigns with the same Google Merchant Center store, we will create a single draft store to map to all campaigns with the same Google Merchant Center store. If your campaigns are using a draft store, they are not active. You'll need to go to Microsoft Merchant Center to finish the setup of your store in order for your campaigns to go live.

  > [!NOTE]
  > Under certain circumstances, we’ll attempt to automatically complete your draft store’s setup if we find a match with an existing Merchant Center store. See [Automatic draft store setup completion](#automatic-draft-store-setup-completion) for more information about our automatic draft store setup completion.

  > [!NOTE]
  > Microsoft Advertising will not use your Google Merchant Center sign-in information for any purpose other than the import and setup process.

<a id="complete-draft-store-setup"></a>

## Complete draft store setup

To complete the setup process for draft stores and run the Shopping campaigns created with these stores, choose from the following options in Microsoft Merchant Center:

- **Select from an existing store**

  You can select an existing store to replace your draft store:

  1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Manage stores** (shopping cart icon).
  1. Underneath Draft stores need attention, select **Complete setup**
  1. Select **Select from existing store**.
  1. Choose the store that you would like to replace your draft store with. (Only approved stores are eligible for selection.) Once you have selected a store, all campaigns including that draft store will be updated with the store you have selected.
  1. Select **Submit**.

- **Create a new store**

  You can also update your draft store to a brand new store:

  1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Manage stores** (shopping cart icon).
  1. Underneath Draft stores need attention, select **Complete setup**.
  1. Select **Complete setup**.
  1. Follow the steps provided by the Create store wizard. Learn more about [creating a Microsoft Merchant Center store](hlp_BA_PROC_CreateBingMerchantCenterStore.md).

  <a id="automatic-draft-store-setup-completion"></a>

## Automatic draft store setup completion

To help save you time, Microsoft Advertising attempts to automatically complete your draft store's setup if it matches an existing Merchant Center store. These are the following scenarios that can result in automatic draft store setup completion:

- **Domain match:** Your draft store has a domain that matches the domain of an active Merchant Center store.
- **Google Merchant ID update:** You changed the Google Merchant ID of a draft store to an approved Merchant Center store. Please note that all previously imported campaigns associated with the draft store will be automatically associated with the approved Merchant Center store.
- **Final URL match for Performance Max campaigns:** The Final URL of a Performance Max campaign for which you've created a draft store matches the URL of an active Merchant Center store. Please note that we'll complete the draft store setup *and* associate your Performance Max campaign with the active Merchant Center store. See [Create a Performance Max campaign](hlp_BA_PROC_CreatePmax.md) for more information about Final URLs for Performance Max campaigns.
