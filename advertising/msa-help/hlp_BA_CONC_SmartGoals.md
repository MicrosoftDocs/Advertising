---
title: Smart goals
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Find out what you need to know about using Smart Goals.
---

# Smart goals

Conversion tracking helps you measure your ROI as well as improve your ROI by optimizing your bids and campaigns. However, if you are not using conversion tracking then Smart Goals can help you track the best sessions on your website as conversions.

## How do Smart Goals work?

Smart Goals use Microsoft Advertising machine learning models to identify the best sessions on your website. If you have the UET tag set up correctly, smart goal will examine all your website sessions and determine which of those sessions can be considered a “conversion”. Smart goals use multiple signals to identify conversions. Some of the signals that are used include session duration, pages per session, location, device, and browser.

Each website session is intelligently scored to evaluate its meaningfulness to your business. This score is compared to a carefully calibrated threshold score. If the score given to the session is above the threshold then the session is identified as a conversion.

## What criteria is used to create Smart Goals?

Our aim with Smart Goals is to provide you with a clear signal that surfaces only the most business-relevant interactions on your webpages as conversions. We analyze your current clicks, conversions, and UET events to assess whether you may stand to benefit from Smart Goals.

Smart goals are created by Microsoft Advertising automatically if we determine that smart goals are right for your account. You'll be notified and it will be shown with your other conversion goals.

Smart goals may be enabled whether your account is in [smart or Expert mode](hlp_BA_CONC_SmartVsExpert.md).

## What can I do with Smart Goals?

Use Smart Goal conversions to optimize your campaigns. If you want to use Smart Goals for automated bid strategies, please ensure that the "include in conversions" setting is enabled. To learn about which automated bid strategies to use for your account, see [Let Microsoft Advertising manage your bids with bid strategies](hlp_BA_CONC_BidStrategy.md).

If you have other conversion goal types set up and the criteria for the other goal is met e.g., Duration goal, the conversion will be attributed to both goal types.

## Limitations of Smart Goals

- Smart Goals are created automatically at the account level.
- You can have one Smart Goal per account.
- Smart Goals cannot be configured or edited. Smart goals can be removed.
- Smart Goals do not support View-Through Conversions (VTCs).
- You can't delete a Smart Goal. Instead, select the "Active" symbol (green dot) to the left of the conversion goal name and select **Paused**. You can then create another Smart Goal.

## Why can't I see any conversions?

Assuming your Smart Goal hasn’t been recently created in your account (in the past 30 days), the first step to figure out why no conversions are being reported is to make sure you have sufficient click volume (> 20 clicks per day).

If you have sufficient clicks, then make sure your UET tags are correctly setup and working. [Test conversion goals and audiences with UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md)

## Why are my Smart Goal conversions changing?

Our models are constantly learning and improving to provide you with the most accurate insight into your campaigns’ performance. Changes you make to your account, sudden shifts in traffic/clicks, as well as improvements we make to our models may result in changes to the Smart Goal conversions you see.
