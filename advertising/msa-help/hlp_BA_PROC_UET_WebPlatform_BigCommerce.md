---
title: Set up UET Tags Using BigCommerce
description: If you built your website on BigCommerce, read this article to learn how to set up UET tags on it.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using BigCommerce

> [!NOTE]
> - This article shows how to do a basic setup of UET tags using BigCommerce. Please refer to [BigCommerce Support](https://go.microsoft.com/fwlink/?linkid=2010484) for more information.
> - Microsoft Advertising is not responsible for BigCommerce's processes or documentation, nor for changes made to BigCommerce's processes or documentation.

If you created and manage your website with BigCommerce, you can add and manage your UET tag there.

## Implementing UET using BigCommerce

1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
1. Copy your JavaScript UET tag tracking code.
1. Log in to your BigCommerce account.
1. From your BigCommerce dashboard, go to **Storefront** > **Footer Scripts**.
1. Paste the Microsoft Advertising UET tracking code into the script box and select **Save**.

If you want to track completed purchases as conversions and report variable revenue, please refer to BigCommerce’s support page to learn how to set up the goals and track the conversions. Here's an example:

1. From your BigCommerce dashboard, go to **Advanced Settings** > **Affiliate conversion tracking**.
1. Paste in your UET tracking code and then append the following code to the end of the UET tracking code: `<window.uetq = window.uetq || [];window.uetq.push({ 'revenue_value': '%%ORDER_AMOUNT%%'});>`
1. Select **Save** to finish.

> [!NOTE]
> To validate that your BigCommerce UET tag is working, download and install [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md). Go to your BigCommerce website and verify that a UET event is received and that the **Tag ID** matches the tag you selected in Step 1 (or defined in step 7).
