---
title: "Responsive Search Ads Opportunities"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Ad Insight API enables you to discover high-quality recommendations to create responsive search ads and tag them as applied or dismissed.
---
# Responsive Search Ads Opportunities
Ad Insight API enables you to discover high-quality recommendations to create responsive search ads and tag them as *applied* or *dismissed*. Ad Insight API doesn’t upload the responsive search ads from the recommendations that you have adopted from the Microsoft Advertising user interface. Instead, you need to call Bulk API to upload them to your account. Once we recognize the recommendations that you tagged as *applied* or *dismissed*, they will not be surfaced to you any longer.

## <a name="getrecommendations"></a>Get Responsive Search Ads Recommendations 
Pass the CampaignId (optional), AdGroupId (optional), and RecommendationType parameters to [GetRecommendations](../ad-insight-service/getrecommendations.md). The response will let you know if the operation is successful or not.

## <a name="tagrecommendations"></a>Tag Responsive Search Ads Recommendation as *applied* or *dismissed*
Pass the RecommendationType, RecommendationId, RecommendationHash, and CreatedAdId (when applied)  parameters to [TagRecommendations](../ad-insight-service/tagrecommendations.md). The response will let you know if the operation is successful or not.
