---
title: Verify and Claim Your Website's URL
description: If you want to create a Microsoft Merchant Center store, you need to verify and claim your website.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Verify and claim your website's URL

[New to Microsoft Shopping campaigns? Learn how to get started in this training course.](https://go.microsoft.com/fwlink/?linkid=2130007)

If you want to create a Microsoft Merchant Center store, you need to verify and claim your website through Bing Webmaster Tools or an existing Universal Event Tracking (UET) tag.

The website destination URL associated with your Microsoft Merchant Center store is used to verify that you indeed own your uploaded product offers. For this reason, the links specified in your feed file must be sub-paths of either this website destination URL or subdomain of this destination URL. Product offers with URLs that are not sub-paths of this website destination URL will be rejected.

The Microsoft account that you use to verify and claim your website depends on if the website has been previously verified on Bing Webmaster Tools. You don't necessarily need to use the same account to verify and claim your site. Details are in the instructions below.

## Determine the exact website destination URL

To ensure all your uploaded product URLs are successfully processed, you'll need to verify and claim the right website destination URL.

The best destination URL is the top-level URL of your website; for example, http://example.com if your product URLs use the format http://example.com/product/path/.

When entering this URL, there are some formatting requirements:

- The URL must start with a protocol: http:// or https://
- No IP addresses are allowed (e.g. http://127.0.0.1)
- No ports are allowed (e.g. http://example.com:8000)

## Verify your website destination URL with Bing Webmaster Tools

**New URL verification**

  If your website has not been verified via Bing Webmaster Tools:

  1. Sign in to Bing Webmaster Tools using the same Microsoft account that you will use to create your Microsoft Merchant Center store.
  1. Under **My sites**, enter your website's destination URL and select **Add**.

     If you want, you can provide more details about your website, and then select **Add**.
  1. You will be taken to a page that details three methods for verifying your website URL. Choose one of the methods and follow the steps to verify your website.
  1. Successful URL verification will take you to a website dashboard page.

**Existing URL verification**

  If your website has already been verified by another Microsoft account on Bing Webmaster Tools, follow these steps to associate the URL with your Microsoft account you use for Microsoft Advertising

  1. Sign in to Bing Webmaster Tools using the Microsoft account that verified this website.
  1. Select the website from the home page.
  1. Go to the **User Management** tab on the left panel.
  1. You will be taken to a page where website users can be added and deleted. Follow the steps to add a new user's email to your website and then add the Microsoft account you use for Microsoft Advertising.

     > [!NOTE]
     > Before you add the new user's email, you'll need to register it on Bing Webmaster Tools.

## Verify your website destination URL with a Universal Event Tracking (UET) tag

If you have a Universal Event Tracking (UET) tag on your site, Microsoft Advertising has already validated your domain. When prompted to verify your site, select **Validated via UET tag** as your choice for domain validation.

> [!NOTE]
> The following:

- If you validate your domain using a UET tag, the tag has to register at least 50 events before the domain appears as an option when you create a Microsoft Merchant Center store. After the 50 events have been registered, it can take an additional 48 hours for the domain to appear on the list.
- If you have several domains, only 100 will appear on the list. Please [contact support](https://go.microsoft.com/fwlink/?linkid=398371) if you cannot find the domain in the list.

To learn more about UET tags, see [FAQ: Universal Event Tracking](hlp_BA_CONC_UET_FAQ.md).

## Claim your website destination URL

You claim your verified website destination URL by creating a Microsoft Merchant Center store and specifying your website in the **Destination URL** field.

Once you have claimed your website destination URL, the next step is to [create your Microsoft Merchant Center store](hlp_BA_PROC_CreateBingMerchantCenterStore.md).
