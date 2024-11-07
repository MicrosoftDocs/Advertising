---
title: CampaignEstimate Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Contains a nested list of suggested keywords for the campaign's ad groups with minimum and maximum traffic estimates.
---
# CampaignEstimate Data Object - Ad Insight
Contains a nested list of suggested keywords for the campaign's ad groups with minimum and maximum traffic estimates. Traffic estimates include average CPC, average position, clicks, CTR, impressions, and total cost.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance.

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignEstimate" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdGroupEstimates" nillable="true" type="tns:ArrayOfAdGroupEstimate" />
    <xs:element minOccurs="0" name="CampaignId" nillable="true" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdGroupEstimates": [
    {
      "AdGroupId": "LongValueHere",
      "KeywordEstimates": [
        {
          "Keyword": {
            "Id": "LongValueHere",
            "MatchType": "ValueHere",
            "Text": "ValueHere"
          },
          "Maximum": {
            "AverageCpc": DoubleValueHere,
            "AveragePosition": DoubleValueHere,
            "Clicks": DoubleValueHere,
            "Ctr": DoubleValueHere,
            "Impressions": DoubleValueHere,
            "TotalCost": DoubleValueHere
          },
          "Minimum": {
            "AverageCpc": DoubleValueHere,
            "AveragePosition": DoubleValueHere,
            "Clicks": DoubleValueHere,
            "Ctr": DoubleValueHere,
            "Impressions": DoubleValueHere,
            "TotalCost": DoubleValueHere
          }
        }
      ]
    }
  ],
  "CampaignId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CampaignEstimate](campaignestimate.md) object has the following elements: [AdGroupEstimates](#adgroupestimates), [CampaignId](#campaignid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupestimates"></a>AdGroupEstimates|The nested list of suggested keywords for the campaign's ad groups with minimum and maximum traffic estimates.<br/><br/>Traffic estimates include average CPC, average position, clicks, CTR, impressions, and total cost.|[AdGroupEstimate](adgroupestimate.md) array|
|<a name="campaignid"></a>CampaignId|The ad group identifier.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetKeywordTrafficEstimates](getkeywordtrafficestimates.md)  
