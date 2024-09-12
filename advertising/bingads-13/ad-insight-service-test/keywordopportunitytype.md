---
title: KeywordOpportunityType Value Set Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible keyword opportunity types you can request when calling GetKeywordOpportunities.(test)
---
# KeywordOpportunityType Value Set Test - Ad Insight
Defines the possible keyword opportunity types you can request when calling [GetKeywordOpportunities](getkeywordopportunities.md).

## Syntax
```xml
<xs:simpleType name="KeywordOpportunityType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="BroadMatch" />
        <xs:enumeration value="CampaignContext" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [KeywordOpportunityType](keywordopportunitytype.md) value set has the following values: [BroadMatch](#broadmatch), [CampaignContext](#campaigncontext).

|Value|Description|
|-----------|---------------|
|<a name="broadmatch"></a>BroadMatch|The keyword opportunity will be suggested based on the marketplace impact of adding keywords with the broad match type.|
|<a name="campaigncontext"></a>CampaignContext|The keyword opportunity will be suggested based on the full context of the campaign, including existing keywords, landing page, and ad copy.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetKeywordOpportunities](getkeywordopportunities.md)  
