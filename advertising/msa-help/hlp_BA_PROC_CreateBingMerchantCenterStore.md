---
title: Create a Microsoft Merchant Center Store
description: If you want to list your feed on search placements across the Microsoft Advertising Network, you first need to create Microsoft Merchant Center store.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Create a Microsoft Merchant Center store

> [!TIP]
> [New to Microsoft Shopping campaigns? Learn how to get started in this training course.](https://go.microsoft.com/fwlink/?linkid=2130007)

If you want to list your feed on search placements across the Microsoft Advertising Network, you first need to create a Microsoft Merchant Center store. Once you create a store, it will either be auto-approved, auto-rejected, or queued for a manual review. The review process can take up to five days, but you'll receive an email when an approval decision has been made.

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Manage stores** (shopping cart icon).
1. Select **Create store**.
1. You'll be asked to verify your site through **Domain validation**. You have two choices:

   - Validated via Bing Webmaster Tools. [Learn more](hlp_BA_PROC_ClaimYourDomain.md)
   - Validated via [Universal Event Tracking (UET) tag](hlp_BA_CONC_UETv2WhatIsTag.md)

   > [!NOTE]
   > If you validate your domain using a UET tag, the tag must register at least 50 events before the domain appears as an option when you create a Microsoft Merchant Center store.
1. Enter your store info, including your **Store description**.
1. Select **Save**. <br> After successful store creation, you will be taken to a page where you will be informed of the store status. You'll be able to check if your store was automatically approved/rejected or is queued up for manual review.

After your store is approved, you can [create your feed](hlp_BA_CONC_BMCWhatIsCatalog.md).

## Things to keep in mind when creating a store

- Your store name is required and can be edited. It will appear in your Product ads, so accuracy is important.
- Your destination URL must have been verified using Bing Webmaster Tools or a UET tag. It must also comply with URL formatting rules such as starting with a protocol (http:// or https://).
- If you want to use the content API for creating and sending feeds, you will need to get a tenant URL. [Learn more](https://go.microsoft.com/fwlink/?linkid=843127)
- If you validate your domain using a UET tag, the tag must register at least 50 events before the domain appears as an option when you create a Microsoft Merchant Center store.
- Stores created by a Manager account will be visible under all of its associated accounts.
- Currently we do not allow duplicate named or owned stores to be active simultaneously (i.e., if a store's URL is already being used by another store).
- A store will be denied if there's already a store registered for the domain name, or if there's an existing store registered within the account. We do not allow duplicate named or owned stores to be active simultaneously. For further assistance, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371).
- You cannot change the domain once a store is created.

<a id="guidelines"></a>

## Potential store rejection reasons

- Attempting to claim an unverified domain.
- Microsoft Advertising customer has been identified as an adult advertiser.
- Lack of presence in the markets supported for Product ads by Microsoft Advertising.
- Lack of a “real” privacy policy on website.
- Non-encrypted (non-SSL) checkout. You will want to verify that your SSL certificates are valid.
- There's already a store registered for the domain name, or there is an existing store registered with the account ID. If you have access to the Microsoft Advertising account in which the URL is already being used, you can deactivate the duplicate store. If you don't have access to the account or the store has been rejected, [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) to deactivate the duplicate store.

## Create multiple stores

You can create multiple stores, but you are not allowed to sell the same products through multiple stores. For example, if you sell sporting equipment, you can create a golf store and a basketball store.

<a id="RequestReview"></a>

## My store was rejected. What can I do?

We reject stores that violate one or more of the [above guidelines](#potential-store-rejection-reasons). Please review your store information and feed(s) to make sure they comply with our policies and guidelines. If you believe we have incorrectly rejected your store, you may request a review.

### Request a review

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Summary**. Here, you can view information about your store's or feed(s) issues.
1. Make the appropriate changes to fix your store's or feed(s) issues.
1. In the **Product issues** tab, select **Request a review**.

> [!NOTE]
> You can only request one review per store.

## View and edit store details

You can view your store's details, including the store ID, store name, destination URL, and store description. You can also edit some of these details.

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Manage stores** (shopping cart icon).
1. In the grid, find the store whose details you'd like to view and select the corresponding **Edit** under the **Edit store** column.

> [!NOTE]
> To update the name of your Merchant Center store, [contact Support](https://go.microsoft.com/fwlink/?linkid=398371). If your store is new and you haven't set up campaigns within it, we suggest deleting the store and creating a new one with the correct store name.

## Delete a store

> [!NOTE]
> Only approved stores can be deleted. If you need to delete a rejected store, you'll need to request a review of your store or reach out to [Support](https://go.microsoft.com/fwlink/?linkid=398371) for assistance if the store is rejected again.

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Manage stores** (shopping cart icon).
1. Select the store(s) you'd like to delete.
1. In the banner above the grid, select **Delete store**.
