---
title: "Ad Insight API API Auto-apply management"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: These technical guides apply to the Ad Insight service fo auto apply management
 and may also depend on other Bing Ads API services.
---
# Ad Insights API Auto-apply management

Ad Insight API enables you set or get auto-apply recommendations which helps to boost your ad performance. Currently, we have five recommendations with auto-apply mode, additional recommendations will be added in the future.

- Add responsive search ads.
- Add multimedia ads.
- Create conversion goal.
- Remove conflicting negative keywords.
- Fix conversion goal setting issue.

You can either set or get the auto-apply recommendation status using the API.

## Set auto-apply status

You need to prepare Microsoft Advertising `AccountId`, `RecommendationType`, `OptInStatus`, and pass these three parameters to API to set [SetAutoApplyOptInStatus](../ad-insight-service/setautoapplyoptinstatus.md).

## Get auto-apply status

You need to prepare Microsoft Advertising `AccountId`, `RecommendationType` and pass these two parameters to API get the [GetAutoApplyOptInStatus](../ad-insight-service/getautoapplyoptinstatus.md).
