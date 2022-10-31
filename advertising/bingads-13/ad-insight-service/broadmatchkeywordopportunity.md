---
title: BroadMatchKeywordOpportunity Data Object - Ad Insight
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains the marketplace impact statistics of including broad match type keyword bids.
ms.subservice: ad-insight-api
---
# BroadMatchKeywordOpportunity Data Object - Ad Insight
Defines an object that contains the marketplace impact statistics of including broad match type keyword bids.

## Syntax
```xml
<xs:complexType name="BroadMatchKeywordOpportunity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:KeywordOpportunity">
      <xs:sequence>
        <xs:element minOccurs="0" name="AverageCPC" type="xs:double" />
        <xs:element minOccurs="0" name="AverageCTR" type="xs:double" />
        <xs:element minOccurs="0" name="ClickShare" type="xs:double" />
        <xs:element minOccurs="0" name="ImpressionShare" type="xs:double" />
        <xs:element minOccurs="0" name="ReferenceKeywordBid" type="xs:double" />
        <xs:element minOccurs="0" name="ReferenceKeywordId" type="xs:long" />
        <xs:element minOccurs="0" name="ReferenceKeywordMatchType" type="xs:int" />
        <xs:element minOccurs="0" name="SearchQueryKPIs" nillable="true" type="tns:ArrayOfBroadMatchSearchQueryKPI" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md) object has the following elements: [AverageCPC](#averagecpc), [AverageCTR](#averagectr), [ClickShare](#clickshare), [ImpressionShare](#impressionshare), [ReferenceKeywordBid](#referencekeywordbid), [ReferenceKeywordId](#referencekeywordid), [ReferenceKeywordMatchType](#referencekeywordmatchtype), [SearchQueryKPIs](#searchquerykpis).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="averagecpc"></a>AverageCPC|Broad match average CPC  in the marketplace.|**double**|
|<a name="averagectr"></a>AverageCTR|Broad match average CTR in the marketplace.|**double**|
|<a name="clickshare"></a>ClickShare|Broad match click share in the marketplace.|**double**|
|<a name="impressionshare"></a>ImpressionShare|Broad match impression share in the marketplace.|**double**|
|<a name="referencekeywordbid"></a>ReferenceKeywordBid|The bid of an existing reference keyword used by the service to offer the keyword opportunity.|**double**|
|<a name="referencekeywordid"></a>ReferenceKeywordId|The identifier of an existing reference keyword used by the service to offer the keyword opportunity.|**long**|
|<a name="referencekeywordmatchtype"></a>ReferenceKeywordMatchType|The match type of an existing reference keyword used by the service to offer the keyword opportunity.<br/><br/>The following are the possible match-type values:<br/><br/>1 - Exact match<br/><br/>2 - Phrase match|**int**|
|<a name="searchquerykpis"></a>SearchQueryKPIs|A list of up to three broad match search query KPI objects. Each item contains search query statistics of including broad match type keyword bids|[BroadMatchSearchQueryKPI](broadmatchsearchquerykpi.md) array|

The [BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementskeywordopportunity"></a>Inherited Elements from KeywordOpportunity
The [BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md) object derives from the [KeywordOpportunity](keywordopportunity.md) object, and inherits the following elements: [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [Competition](#competition), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [MatchType](#matchtype), [MonthlySearches](#monthlysearches), [SuggestedBid](#suggestedbid), [SuggestedKeyword](#suggestedkeyword). The descriptions below are specific to [BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md), and might not apply to other objects that inherit the same elements from the [KeywordOpportunity](keywordopportunity.md) object.  

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

### <a name="inheritedelementsopportunity"></a>Inherited Elements from Opportunity
The [BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md) object derives from the [Opportunity](opportunity.md) object, and inherits the following elements: [OpportunityKey](#opportunitykey). The descriptions below are specific to [BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md), and might not apply to other objects that inherit the same elements from the [Opportunity](opportunity.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="opportunitykey"></a>OpportunityKey|An identifier that uniquely identifies the opportunity.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

