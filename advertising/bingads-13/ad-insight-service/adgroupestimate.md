---
title: AdGroupEstimate Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Contains a list of suggested keywords for the ad group with minimum and maximum traffic estimates.
---
# AdGroupEstimate Data Object - Ad Insight
Contains a list of suggested keywords for the ad group with minimum and maximum traffic estimates. Traffic estimates include average CPC, average position, clicks, CTR, impressions, and total cost.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance.

## Syntax
```xml
<xs:complexType name="AdGroupEstimate" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdGroupId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="KeywordEstimates" nillable="true" type="tns:ArrayOfKeywordEstimate" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AdGroupEstimate](adgroupestimate.md) object has the following elements: [AdGroupId](#adgroupid), [KeywordEstimates](#keywordestimates).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The ad group identifier.|**long**|
|<a name="keywordestimates"></a>KeywordEstimates|The list of suggested keywords with minimum and maximum traffic estimates.<br/><br/>Traffic estimates include average CPC, average position, clicks, CTR, impressions, and total cost.|[KeywordEstimate](keywordestimate.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[CampaignEstimate](campaignestimate.md)  
