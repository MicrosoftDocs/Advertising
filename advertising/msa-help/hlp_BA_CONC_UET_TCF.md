---
title: Transparency and consent framework (TCF) for UET
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Transparency and consent framework (TCF) for UET
---

# Transparency and consent framework (TCF) for UET

The Interactive Advertising Bureau (IAB) has finalized v2.0 of its Transparency and Consent Framework (TCF). Microsoft integrates with IAB TCF v2.0 so that you may pass consent signals directly or via a consent management platform (CMP) to Microsoft Advertising.

> [!NOTE]
> Microsoft Advertising supports IAB TCF v2.0 as of July 24, 2023.

## How it works

Microsoft Advertising can read and interpret the TCF v2.0 transparency and consent (TC) string for UET tags. Consent management platforms (CMPs) that create TCF v2.0 strings based on user choices can send consent signals to Microsoft Advertising. Your associated UET tags adjust their behavior based on the contents of the TC string.

## Setting up the Transparency Consent Framework v2.0

To use the TCF v2.0 string with your UET tags, you'll need to opt in by adding a code snippet above your tags for them to read the TCF string. To enable TCF v2.0 support, you'll need to:

- Make sure you are using a UET tag on your site.
- Adopt a TCF v2.0 CMP.
- Add the TCF code snippet before your UET tag code.

  Add the following code snippet above your UET code on all pages where you have UET tags: <br> `<script> window.uetq = window.uetq || []; window.uetq.push('config', 'tcf', { 'enabled' : true }); </script>`
- Add Microsoft and Xandr as vendors within your TCF-compliant CMP. Include Microsoft (Vendor ID: 1126) and Xandr (Vendor ID: 32) as authorized vendors to ensure that the consent banner prompts users to grant consent for Microsoft's and Xandr's data processing.

## Microsoft Advertising behavior with the Transparency and Consent Framework v2.0M

The TCF uses “Purposes” to organize data processing. Each purpose has a corresponding "Registered Lawful Basis." Microsoft Advertising Here is how UET tags handle requests that contain the consent string:

| Purpose | Microsoft's Registered Lawful Basis | Description | Impact to Microsoft Advertising if missing |
| --- | --- | --- | --- |
| **1** | Consent | Store and/or access information on a device. | Cookies will not be created or used by Microsoft Ads for measurement or personalization. Remarketing lists will not accumulate data for unconsented users, and attribution reports may be more limited. |
| **3** | Consent | Create profiles for personalised advertising. | Events are not eligible for ads personalization, and are not used for remarketing lists. Users already added to audience lists are unaffected. |
| **4** | Consent | Use profiles to select personalised advertising. | Events are not eligible for ads personalization, and are not used for remarketing lists. Users already added to audience lists are unaffected. |
| **7** | Consent | Measure advertising performance. | Microsoft Advertising requires this purpose for all conversions. If this purpose is not present, Microsoft Ads will not record the conversion. |
| **9** | Consent | Understand audiences through statistics or combinations from different sources. | Microsoft Advertising requires this purpose for all conversions. If this purpose is not present, Microsoft Ads will not record the conversion. |
| **10** | Consent | Develop and improve services. | Microsoft Advertising requires this purpose for all conversions. If this purpose is not present, Microsoft Ads will not record the conversion. |

> [!NOTE]
> UET tags only accept TCF strings that are correctly implemented according to the TCF policies and technical specifications. If your CMP doesn't respond within 500 milliseconds or you see a status of “error”, “stub”, or “loading”, the tag will continue to function without TCF support.
