---
title: CampaignBidLandscapeType Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible types of campaign bid landscapes.
---
# CampaignBidLandscapeType Value Set - Ad Insight
Defines the possible types of campaign bid landscapes.

## Syntax
```xml
<xs:simpleType name="CampaignBidLandscapeType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Ecpc_CampaignWideBid" />
    <xs:enumeration value="Ecpc_BidScaling" />
    <xs:enumeration value="TargetCpa" />
    <xs:enumeration value="TargetRoas" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CampaignBidLandscapeType](campaignbidlandscapetype.md) value set has the following values: [Ecpc_BidScaling](#ecpc_bidscaling), [Ecpc_CampaignWideBid](#ecpc_campaignwidebid), [TargetCpa](#targetcpa), [TargetRoas](#targetroas).

|Value|Description|
|-----------|---------------|
|<a name="ecpc_bidscaling"></a>Ecpc_BidScaling|The campaign landscape type is *Ecpc_BidScaling*.|
|<a name="ecpc_campaignwidebid"></a>Ecpc_CampaignWideBid|The campaign landscape type is *Ecpc_CampaignWideBid*.|
|<a name="targetcpa"></a>TargetCpa|The bid strategy type is *TargetCpa*.|
|<a name="targetroas"></a>TargetRoas|The bid strategy type is *TargetRoas*.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[CampaignBidLandscape](campaignbidlandscape.md)  
