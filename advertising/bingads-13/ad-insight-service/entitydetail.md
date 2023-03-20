---
title: EntityDetail Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that provides detail information for an entity for performance insights.
---
# EntityDetail Data Object - Ad Insight
Defines an object that provides detail information for an entity for performance insights.

## Syntax
```xml
<xs:complexType name="EntityDetail" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="EntityId" type="xs:long" />
    <xs:element minOccurs="0" name="EntityName" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [EntityDetail](entitydetail.md) object has the following elements: [EntityId](#entityid), [EntityName](#entityname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entityid"></a>EntityId|For account, this is *AccountId*. For campaign, this is *CampaignId*. For ad group, this is *AdGroupId*. For keyword, this is *KeywordId*. For product group, this is *ProductGroupId*. For search term/website, this is *0*.|**long**|
|<a name="entityname"></a>EntityName|For account/campaign/ad group, this is the name information. For keyword, this is the keyword text. For search term, this is the search term text. For product group, this is the node path. For website, this is the website URL.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[EntityParameter](entityparameter.md)  
