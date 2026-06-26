---
title: Understanding the ad extension report
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Want insight into which ad extensions are getting the most impressions and clicks? The different ad extension reports (on the reports page) and the call forwarding detail report (on both the reports page and dimensions tab) are where to look.
---

# Understanding the Ad extension report

There are four types of ad extension reports:

- **Ad extension by keyword:** This report shows performance metrics for all ad extension types and click types, which are ad components that can be clicked (for example, the ad title or driving directions). You can see how many ad extension impressions you’re receiving for each keyword, and which click type is getting the most clicks and impressions. When you include the click type column, this report shows you how your ad is performing relative to different ad extensions.
- **Ad extension by ad:** This report contains the same information as Ad extension by keyword reports, sorted by ads rather than keywords.
- **Ad extension details:** This report shows performance metrics measured when different ad extensions appear in the ad. That helps you analyze which ad extension gets better impressions and clicks results.
- **Call forwarding details:** Shows the time and duration of each phone call that originated from a call extension that uses the Microsoft Advertising forwarding number. The report helps you understand how the accounts, campaigns, or ad groups are performing with call extensions.

## How to create an ad extension report

1. From the navigation menu on the left, select **Reporting** > **Home** > **Saved customized reports**.
1. Select Ad extensions.
1. Select one of the following reports to run:

   - Ad extension by keyword
   - Ad extension by ad
   - Ad extension by details
   - Car forwarding details
1. Make any desired changes to the report's conditional formatting, date/time range, account scope, or columns.

## How to read the Ad extension report

Here's an example of some of the data provided in these reports (grouped by extension type), along with a short explanation of what the data means:

| Report data |  | What it means |
| --- | --- | --- |
| **Keyword** | Ad extension type | Click type | Impressions | Clicks |  |  |
| **Contoso** | Sitelink extension | Ad title (headline) | 20 | 8 |  | Your sitelink extension was displayed with the ad title 20 times. The ad title was clicked eight times. |
| **Contoso** | Sitelink extension | Sitelink | 20 | 2 |  | Your sitelink extension was clicked two times. Note: Ad title and sitelink are always shown together in an ad. Therefore, the two click types have the same number of impressions, in this case 20. |
| **Contoso** | Sitelink extension | Driving directions | 8 | 1 |  | Of the 20 times that your sitelink extension displayed with ad title, the driving directions link was displayed eight times, and was clicked once. |
| **Contoso** | Location extension | Ad title (headline) | 15 | 5 |  | Your location extension was displayed with the ad title 15 times. The ad title was clicked five times. |
| **Contoso** | Location extension | Driving direction | 15 | 3 |  | The driving direction link was clicked three times. Note: Ad title and location extension are always shown together in an ad. Therefore, the two click types have the same number of impressions, in this case 15. |
| **Contoso** | Location extension | Sitelink | 8 | 2 |  | Of the 15 times that your location extension displayed with ad title, the sitelink was also displayed 8 times, and was clicked twice. |

## Why don't I see clicks and impressions for call extensions in reports?

Call extension data can show differently in different reports, depending on [how you set up call extensions in your ads](hlp_BA_PROC_AddCallExtension.md).

| Option selected | Report | Data shown | What it costs | Where available |
| --- | --- | --- | --- | --- |
| **Bing forwarding number and Show a toll-free number** | Ad extension by Ad/Keyword report | Ad extension type name =  Metered Extension | Click calls: Charge CPC bid<br>Manual calls: No Charge | US and UK only<br>All devices |
| **Bing forwarding number and Show a toll-free number** | Call forwarding details report | Call details information | Click calls: Charge CPC bid<br>Manual calls: No Charge | US and UK only<br>All devices |
| **Bing forwarding number and Show a local number** | Ad Extension by Ad/Keyword report | Ad Extension type name =  Metered Extension | Click calls: Charge CPC bid<br>Manual calls: No Charge | US and UK only<br>All devices |
| **Bing forwarding number and Show a local number** | Call forwarding details report | Call details information | Click calls: Charge CPC bid<br>Manual calls: No Charge | US and UK only<br>All devices |
| **On smartphones using my own phone number** | Ad Extension by Ad/Keyword report | Ad Extension type name =  call extension | Click calls only: Charge CPC bid | Global<br>Smartphones only |
| **On smartphones using my own phone number** | Call forwarding details report | Call details are not available for this selection | N/A | N/A |
