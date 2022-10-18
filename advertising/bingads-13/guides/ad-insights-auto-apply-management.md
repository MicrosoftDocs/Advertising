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

> [!WARNING]
> Starting on February 1, 2023, responsive search ads (RSAs) will be the only search ad type that can be created or edited in standard search campaigns. With the focus of this migration being to help you efficiently drive a stronger return on investment (ROI), expanded text ads (EXTAs) will continue serving along with RSAs, but we’ll no longer support the ability to create new, or edit existing EXTAs moving forward.<br/><br/>We continue to see an average of 7% conversion rate improvement for advertisers who’ve switched from EXTAs to RSAs using similar assets. Now, we are offering you help with creating RSAs in one-shot by automatically applying high-quality recommendations mainly based on your existing assets.<br/><br/>Before December 1st, 2022, you can review at most the top 2000 recommended RSAs that may earn you the biggest performance uplift by [GetRecommendations](../ad-insight-service/getrecommendations.md), apply the recommendations in advance via [Bulk API](../bulk-service/responsive-search-ad.md) and [TagRecommendations](../ad-insight-service/tagrecommendations.md), or dismiss them by [TagRecommendations](../ad-insight-service/tagrecommendations.md).<br/><br/>We will start automatically adopting the recommendations from December 1st, 2022.  

Ad Insight API enables you set or get auto-apply recommendations which helps to boost your ad performance. Currently, we have five recommendations with auto-apply mode, additional recommendations will be added in the future.

- Add responsive search ads.
- Add multimedia ads.
- Create conversion goal.
- Remove conflicting negative keywords.
- Fix conversion goal setting issue.

You can either set or get the auto-apply recommendation status using the API.

## Set auto-apply status

You need to prepare Microsoft Advertising `AccountId`, `RecommendationType`, `OptInStatus`, and pass these three parameters to API [SetAutoApplyOptInStatus](../ad-insight-service/setautoapplyoptinstatus.md).

## Get auto-apply status

You need to prepare Microsoft Advertising `AccountId`, `RecommendationType` and pass these two parameters to API [GetAutoApplyOptInStatus](../ad-insight-service/getautoapplyoptinstatus.md).
