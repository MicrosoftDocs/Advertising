---
title: Opportunity Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: This is the base class from which opportunity objects derive.(test)
---
# Opportunity Data Object Test - Ad Insight
This is the base class from which opportunity objects derive. The class contains the unique key used to identify the opportunity.

Do not try to instantiate an *Opportunity*. You can create one or more following objects that derive from it.
- [BidOpportunity](bidopportunity.md)  
- [BudgetOpportunity](budgetopportunity.md)  
- [KeywordOpportunity](keywordopportunity.md)  
- [BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md) (derived from [KeywordOpportunity](keywordopportunity.md))

## Syntax
```xml
<xs:complexType name="Opportunity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="OpportunityKey" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Opportunity](opportunity.md) object has the following elements: [OpportunityKey](#opportunitykey).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="opportunitykey"></a>OpportunityKey|An identifier that uniquely identifies the opportunity.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

