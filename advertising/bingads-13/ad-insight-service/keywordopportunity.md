---
title: KeywordOpportunity Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines an object that contains a suggested keyword and bid value.
---
# KeywordOpportunity Data Object - Ad Insight
Defines an object that contains a suggested keyword and bid value.

## Syntax
```xml
<xs:complexType name="KeywordOpportunity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Opportunity">
      <xs:sequence>
        <xs:element minOccurs="0" name="AdGroupId" type="xs:long" />
        <xs:element minOccurs="0" name="AdGroupName" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="CampaignId" type="xs:long" />
        <xs:element minOccurs="0" name="CampaignName" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Competition" type="xs:double" />
        <xs:element minOccurs="0" name="EstimatedIncreaseInClicks" type="xs:double" />
        <xs:element minOccurs="0" name="EstimatedIncreaseInCost" type="xs:double" />
        <xs:element minOccurs="0" name="EstimatedIncreaseInImpressions" type="xs:long" />
        <xs:element minOccurs="0" name="MatchType" type="xs:int" />
        <xs:element minOccurs="0" name="MonthlySearches" type="xs:long" />
        <xs:element minOccurs="0" name="SuggestedBid" type="xs:double" />
        <xs:element minOccurs="0" name="SuggestedKeyword" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordOpportunity](keywordopportunity.md) object has the following elements: [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [Competition](#competition), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [MatchType](#matchtype), [MonthlySearches](#monthlysearches), [SuggestedBid](#suggestedbid), [SuggestedKeyword](#suggestedkeyword).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The identifier of the ad group to apply the suggested keyword to.|**long**|
|<a name="adgroupname"></a>AdGroupName|The name of the ad group to apply the suggested keyword to.|**string**|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign that owns the ad group.|**long**|
|<a name="campaignname"></a>CampaignName|The name of the campaign that owns the ad group.|**string**|
|<a name="competition"></a>Competition|An indicator of competitive bids for this keyword relative to all search keywords. The competition score ranges from 0 to 1.00, where 0 indicates low competition and 1.00 indicates that there is a high number of advertisers competing for this keyword.|**double**|
|<a name="estimatedincreaseinclicks"></a>EstimatedIncreaseInClicks|Estimated increase in clicks if the opportunity is applied.|**double**|
|<a name="estimatedincreaseincost"></a>EstimatedIncreaseInCost|Estimated increase in cost if the opportunity is applied.|**double**|
|<a name="estimatedincreaseinimpressions"></a>EstimatedIncreaseInImpressions|Estimated increase in impressions if the opportunity is applied.|**long**|
|<a name="matchtype"></a>MatchType|The match type that the suggested bid applies to. The following are the possible match-type values:<br/><br/>1 - Exact match<br/><br/>2 - Phrase match<br/><br/>3 - Broad match|**int**|
|<a name="monthlysearches"></a>MonthlySearches|The estimated monthly volume of user search queries that may match the suggested keyword for the corresponding *MatchType* element.|**long**|
|<a name="suggestedbid"></a>SuggestedBid|The suggested bid that may result in your ads serving on the first page of the search query results.|**double**|
|<a name="suggestedkeyword"></a>SuggestedKeyword|The suggested keyword.|**string**|

The [KeywordOpportunity](keywordopportunity.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsopportunity"></a>Inherited Elements from Opportunity
The [KeywordOpportunity](keywordopportunity.md) object derives from the [Opportunity](opportunity.md) object, and inherits the following elements: [OpportunityKey](#opportunitykey). The descriptions below are specific to [KeywordOpportunity](keywordopportunity.md), and might not apply to other objects that inherit the same elements from the [Opportunity](opportunity.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="opportunitykey"></a>OpportunityKey|An identifier that uniquely identifies the opportunity.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetKeywordOpportunities](getkeywordopportunities.md)  
