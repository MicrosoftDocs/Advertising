---
title: Performance Max UET and conversion issues
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: If you aren't receiving conversions in your Performance Max (PMax) campaign, it could be due to setup issues with UET or your campaign.
---

# Performance Max UET and conversion issues

If you aren't receiving conversions in your Performance Max (PMax) campaign, it could be due to setup issues with UET or your campaign. We have compiled some of the potential reasons for not receiving conversions below. If you need additional help, please reach out to [Microsoft Advertising support](https://go.microsoft.com/fwlink/?linkid=2189081).

## Offline conversions

Check if you've uploaded offline conversions with time, date, Microsoft Click ID and conversion goal information. If you've uploaded these conversions in the last 90 days, they may not be attributed to this campaign. Learn more: [Tracking offline conversions](hlp_BA_CONC_UETv2OfflineConversion.md).

## Included in conversions

Conversion goals linked to this Performance Max campaign may not have the "Include in conversions" setting turned on. This results in no conversions for the campaign, even though it may still be generating "All conversions". Learn more about the distinction: [Conversion goals: "Conversions" versus "All conversions"](hlp_BA_CONC_ConvsVsAllConvs.md).

## UET tracking issues

There could also be an issue with the UET tag associated with your campaign's conversion goals. Some common examples of setup errors are:

- The UET tracking status is "Unverified" or "Tag inactive".
- You didn't add the UET tag to every page of the Final URL used in the PMax campaign.
- You've added parameters for the UET tag that are wrong or outdated (e.g., page visits to a website that no longer exists).

Learn more about issues related to UET tracking issues: [Why am I not recording conversions or tracked revenue?](hlp_BA_CONC_UET_TroubleshootCT.md).

## Budget limitations

Setting your daily budget too low or setting target CPA higher than daily budget is another common mistake. This won't allow the campaign to optimize for conversions. The daily budget should be set higher than the Target CPA, and it's recommended to consider higher budgets or budget suggestions when provided. Review common budget best practices: [Let Microsoft Advertising manage your bids with bid strategies](hlp_BA_CONC_BidStrategy.md).
