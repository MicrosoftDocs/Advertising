---
title: FAQ - Modeled conversions
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: This FAQ explains how Microsoft Advertising uses modeled conversions to supplement conversion tracking when user consent isn't provided. It covers how UET consent mode works, the benefits and eligibility of modeled conversions, where to find modeled conversion data in reports, and best practices for advertisers to maximize results while respecting user privacy.
---

# FAQ - Modeled conversions

> [!NOTE]
> - This feature is generally available (GA) in the European Economic Area (EEA), Switzerland, and Great Britain for eligible advertisers.
> - This feature is currently in pilot in the US.

This FAQ answers common questions about how modeled conversions work, their benefits, and best practices for advertisers.

## FAQ

- **What are modeled conversions??**
  Modeled conversions help fill the gap in scenarios when it's not possible to observe the path between ad interactions and conversions. Modeled conversions apply advanced modeling techniques to analyze observable data and historical trends, delivering a more comprehensive and accurate view of your conversion and revenue reporting. This is done without using any personal data of end users.

- **What are the key benefits of modeled conversions?**

  - *Improved measurement:* Helps estimate lost conversion metrics due to lack of consent.
  - *Better optimization:* Provides greater accuracy in the conversion data used by Microsoft's bidding algorithms, thereby optimizing your campaign's performance more effectively.
  - *Compliance:* Ensures that user privacy choices are respected while still gaining insights.

- **Where will modeled conversions be reported?**
  Modeled conversions are fractional conversions and will be directly integrated into your Microsoft Advertising campaign reports. In the Conversions column, Microsoft Advertising reports both modeled and observed conversions.

  > [!NOTE]
  > The Conversions column will show the total of observed and modeled conversions. If you're tracking values, modeled conversion values will also appear in the Revenue column.

- **Where will the incremental impact from modeled conversions be shown?**
  The incremental impact from modeled conversions will be shown in the Conversions column of your Microsoft Advertising campaign reports. The Conversions column will show the total of observed and modeled conversions. If you're tracking values, modeled conversion values will also appear in the Revenue column.    

- **How do I interpret conversion uplift in the report?**
  Conversion uplift is calculated for each domain-country pair. Each pairing represents a distinct traffic segment with its own consent mode impact results. This metric is refreshed daily throughout the 60-day period. Uplift is defined as the ratio of modeled conversions to observed conversions (Uplift = Modeled conversions / Observed conversions).

- **What are the eligibility requirements for modeled conversions?**
  Modeled conversions may be applied to an account when the following criteria are met:    

  - Advertisers are using UET conversion tracking—offline conversions don't apply.
  - Advertisers have correctly implemented UET Consent Mode or a similar framework (applicable for EEA, Great Britain, and Switzerland markets).
  - The account meets a minimum weekly click threshold of 700 ad clicks in the targeted market.

  > [!NOTE]
  > Not all accounts that meet these criteria will necessarily receive modeled conversions. An account must also meet the confidence threshold to continue receiving them. Eligible accounts will automatically start receiving modeled conversions, and you can expect to gradually see these conversions appear in your reporting—along with likely improvements in reported performance.

- **What best practices should advertisers follow to maximize the benefits of modeled conversions?**
  The best practices to ensure you continue receiving optimal results from modeled conversions include:

  - Ensure 100% UET coverage on all landing pages.
  - Ensure Consent Mode is implemented accurately (for EEA, Great Britain, and Switzerland markets).
  - Adopt advanced Consent Mode for improved results (for EEA, Great Britain, and Switzerland markets).
  - Ensure no gaps/breakages in conversion tracking.

- **Is any action required from advertisers to enable this feature?**
  No further action beyond the practices outlined above are necessary to benefit from consent modeling for eligible accounts. If you previously adjusted auto-bidding targets (TCPA/TROAS) to mitigate the impact of consent changes, we recommend monitoring spend and gradually adjusting your targets to return to your desired return on investment (ROI).

- **How will advertisers be notified when their account is enabled for this feature?**
  Accounts receive a notification in the campaign UI when modeled conversions are activated.
