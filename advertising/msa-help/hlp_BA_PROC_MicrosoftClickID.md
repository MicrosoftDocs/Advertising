---
title: Auto-tagging of Microsoft Click ID
description: When a customer clicks your ad, Microsoft Advertising automatically appends a unique click ID to the landing page URL with Auto-tagging of Microsoft Click ID.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Auto-tagging of Microsoft Click ID

With auto-tagging of Microsoft Click ID (MSCLKID), Microsoft Advertising will automatically add a unique click ID to the landing page URL. This click ID will be included in all subsequent UET events fired whenever the same customer visits your page, thereby allowing you to track the conversion from this customer on your site.

## Why should I use auto-tagging of Microsoft Click ID?

Auto-tagging of Microsoft Click ID makes sure that no conversion tracking falls through the cracks. The [UET tag](hlp_BA_CONC_UETv2WhatIsTag.md) on your website reports user activity, including the Microsoft cookie, to Microsoft Advertising. In some cases, the Microsoft cookie can't be returned due to browser settings (for example, third-party cookie blocking) or browser type. If you don't have auto-tagging of Microsoft Click ID enabled, these conversions aren't tracked.

[Learn more about the data UET collects](https://go.microsoft.com/fwlink/?linkid=867295)

## How do I disable auto-tagging of Microsoft Click ID?

Auto-tagging of MSCLKID is enabled by default. This helps to ensure that both URL tracking and conversion tracking are accurate. You can disable auto-tagging of MSCLKID if you don't want to use this functionality.

1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options**.
1. Clear the **Add Microsoft Click ID (MSCLKID) to URLs to allow conversion tracking** checkbox.
1. Select **Save**.
