---
title: BidOpportunity Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains the suggested bid with estimated clicks and impressions opportunities.
---
# BidOpportunity Data Object - Ad Insight
Defines an object that contains the suggested bid with estimated clicks and impressions opportunities.

> [!NOTE]
> The bid opportunity is an estimate based on the last 7 days of performance data, and not a prediction or guarantee of future performance.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BidOpportunity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Opportunity">
      <xs:sequence>
        <xs:element minOccurs="0" name="AdGroupId" type="xs:long" />
        <xs:element minOccurs="0" name="CampaignId" type="xs:long" />
        <xs:element minOccurs="0" name="CurrentBid" type="xs:double" />
        <xs:element minOccurs="0" name="EstimatedIncreaseInClicks" type="xs:double" />
        <xs:element minOccurs="0" name="EstimatedIncreaseInCost" type="xs:double" />
        <xs:element minOccurs="0" name="EstimatedIncreaseInImpressions" type="xs:long" />
        <xs:element minOccurs="0" name="KeywordId" type="xs:long" />
        <xs:element minOccurs="0" name="MatchType" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="SuggestedBid" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "OpportunityKey": "ValueHere",
  "Type": "BidOpportunity",
  "AdGroupId": "LongValueHere",
  "CampaignId": "LongValueHere",
  "CurrentBid": DoubleValueHere,
  "EstimatedIncreaseInClicks": DoubleValueHere,
  "EstimatedIncreaseInCost": DoubleValueHere,
  "EstimatedIncreaseInImpressions": "LongValueHere",
  "KeywordId": "LongValueHere",
  "MatchType": "ValueHere",
  "SuggestedBid": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [BidOpportunity](bidopportunity.md) object has the following elements: [AdGroupId](#adgroupid), [CampaignId](#campaignid), [CurrentBid](#currentbid), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [KeywordId](#keywordid), [MatchType](#matchtype), [SuggestedBid](#suggestedbid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The identifier of the ad group that owns the keyword.|**long**|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign for the ad group that owns the keyword.|**long**|
|<a name="currentbid"></a>CurrentBid|The current keyword bid amount specified for the match type in the *MatchType* element.|**double**|
|<a name="estimatedincreaseinclicks"></a>EstimatedIncreaseInClicks|The estimated clicks opportunities corresponding to the suggested bid.|**double**|
|<a name="estimatedincreaseincost"></a>EstimatedIncreaseInCost|The estimated increase in spend corresponding to the suggested bid.|**double**|
|<a name="estimatedincreaseinimpressions"></a>EstimatedIncreaseInImpressions|The estimated impressions opportunities corresponding to the suggested bid.|**long**|
|<a name="keywordid"></a>KeywordId|The identifier of the keyword to which the bid opportunity applies.|**long**|
|<a name="matchtype"></a>MatchType|The match type to which the suggested bid value applies. The possible values are BroadMatch, ExactMatch, and PhraseMatch.|**string**|
|<a name="suggestedbid"></a>SuggestedBid|The suggested bid based on the last 7 days of performance history for the corresponding ad group.|**double**|

The [BidOpportunity](bidopportunity.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsopportunity"></a>Inherited Elements from Opportunity
The [BidOpportunity](bidopportunity.md) object derives from the [Opportunity](opportunity.md) object, and inherits the following elements: [OpportunityKey](#opportunitykey). The descriptions below are specific to [BidOpportunity](bidopportunity.md), and might not apply to other objects that inherit the same elements from the [Opportunity](opportunity.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="opportunitykey"></a>OpportunityKey|An identifier that uniquely identifies the opportunity.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetBidOpportunities](getbidopportunities.md)  
