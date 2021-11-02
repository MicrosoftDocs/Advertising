---
title: "Keyword Main Line Bid Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Keyword Main Line Bid fields in a Bulk file.
---
# Keyword Main Line Bid Record - Bulk
Defines a keyword's estimated main line bid that can be downloaded in a bulk file.

## <a name="keywordmainlinebid"></a>Keyword Main Line Bid Record
For a *Keyword Main Line Bid* record, the following bulk fields are available for download. The keyword main line bid is equivalent to calling the [GetEstimatedBidByKeywordIds](../ad-insight-service/getestimatedbidbykeywordids.md) operation with the Ad Insight service, and specifying *MainLine* as the [TargetAdPosition](../ad-insight-service/targetadposition.md) value.

|Column Header|Description|
|-----------------|---------------|
|*Keyword*|The keyword to which the estimates apply.|
|*Bid*|The suggested bid value for main line positioning in search results.|
|*Spend*|The estimated average cost per week.|
|*Impressions*|The estimated average number of impressions per week.|
|*Clicks*|The estimated average number of clicks per week.|
|*CTR*|The estimated CTR.<br/><br/>The formula used to calculate the CTR is (maximum number of clicks / maximum number of impressions) &#42; 100.|
|*Avg CPC*|The estimated average CPC.<br/><br/>The formula used to calculate the average CPC is (maximum total cost / maximum number of clicks).|
|*Avg CPM*|The average of the cost per thousand impressions (CPM) of the ad.<br/><br/>The value will be 0 (zero) if the ad group to which the ad belongs does not specify the Content ad distribution medium or if the user does not belong to the CPM pilot program.|
|*Avg position*|The position in the search results given the specified bid.|
|*Conversions*|The estimated number of conversions per week.|
|*CPA*|The estimated cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (spend / conversions).|
