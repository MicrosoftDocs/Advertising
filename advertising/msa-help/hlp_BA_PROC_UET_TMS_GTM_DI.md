---
title: Set up UET with Google Tag Manager Using Direct Integration
description: Direct integration with Google Tag Manager makes UET setup automatic.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET with Google Tag Manager using direct integration

Direct integration with Google Tag Manager makes UET setup automatic. From within Microsoft Advertising, we copy your Google tags and set up matching UET tags. You can get up and running with UET using your Google tags in just a few steps.

## Set up UET with Google Tag Manager from within Microsoft Advertising

1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
1. Select **Create**.
1. Enter a UET tag name and description. Enable or disable Microsoft Clarity via the check box.
1. Select **Save and next**.
1. Select **Automatically add the tracking tag through Google Tag Manager**.
1. Select **Sign in with Google** to connect your Google Tag Manager account.

   > [!IMPORTANT]
   > Make sure you are logged in to the Google profile associated with the Google Tag Manager account you want to use.
1. From the **Account** and **Container** dropdown menus, select the Google Tag Manager account and container you want to integrate with.
1. Optional: Clear the **Allow Microsoft Advertising UET tag to use my Universal Analytics or Google Analytics GA4 Event tags used on the same container** checkbox.
1. Select **Next**.
1. Select **Done**.

   > [!NOTE]
   > - It can take Microsoft Advertising up to 24 hours to verify your UET tags.
   > - You can check your UET tag status and test whether your conversion goals are setup correctly using the UET tag helper. Learn more: [Test conversion goals and audiences with UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md).
   > - You can also use the Microsoft Advertising UET template on Google Tag Manager. Learn more: [Set up UET tags using Google Tag Manager](hlp_BA_PROC_UET_TMS_GTM.md)
   > - You have to create conversion goals in Microsoft Advertising after setting up UET with Google Tag Manager. [Learn more about creating conversion goals](hlp_BA_PROC_UETv2CreateGoal.md).

## What changes are made to the Google Tag Manager account?

Setting up Google Tag Manager with direct integration makes the following changes to the selected Google Tag Manager container:

- It adds the base UET tag for page load events that gets fired on all pages.
- Optional: It adds multiple UET tags by copying the setup for Universal Analytics or Google Analytics 4 tags. Either of the following Google tags will be used as reference to create new UET tags:

  - Universal Analytics Standard
  - Universal Analytics enhanced ecommerce
  - Google Analytics 4 event tag

  You can decide to not use this feature by clearing the checkbox.
