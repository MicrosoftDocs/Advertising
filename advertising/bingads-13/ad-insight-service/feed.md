---
title: Feed Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a Feed data object.
---
# Feed Data Object - Ad Insight
Defines a Feed data object.
---

## Syntax
```xml
<xs:complexType name="Feed" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="StoreId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="FeedId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="FeedType" nillable="true" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Feed](feed.md) object has the following elements: [FeedId](#feedid), [FeedType](#feedtype), [StoreId](#storeid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="feedid"></a>FeedId|The identifier of the feed.|**long**|
|<a name="feedtype"></a>FeedType|The feed type.|**long**|
|<a name="storeid"></a>StoreId|The identifier of the store.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
