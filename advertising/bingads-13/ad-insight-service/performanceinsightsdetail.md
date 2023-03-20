---
title: PerformanceInsightsDetail Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the details for performance insights.
---
# PerformanceInsightsDetail Data Object - Ad Insight
Defines the details for performance insights.

## Syntax
```xml
<xs:complexType name="PerformanceInsightsDetail" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="EntityId" type="xs:long" />
    <xs:element minOccurs="0" name="EntityType" type="tns:EntityType" />
    <xs:element minOccurs="0" name="KPIType" type="tns:KPIType" />
    <xs:element minOccurs="0" name="Date" nillable="true" type="tns:DayMonthAndYear" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="tns:PerformanceInsightsMessage" />
    <xs:element minOccurs="0" name="RootCauses" nillable="true" type="tns:ArrayOfPerformanceInsightsMessage" />
    <xs:element minOccurs="0" name="Actions" nillable="true" type="tns:ArrayOfPerformanceInsightsMessage" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [PerformanceInsightsDetail](performanceinsightsdetail.md) object has the following elements: [Actions](#actions), [Date](#date), [Description](#description), [EntityId](#entityid), [EntityType](#entitytype), [KPIType](#kpitype), [RootCauses](#rootcauses).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="actions"></a>Actions|Messages that describe the actions in "What can I do."|[PerformanceInsightsMessage](performanceinsightsmessage.md) array|
|<a name="date"></a>Date|The date of the detected performance insights.|[DayMonthAndYear](daymonthandyear.md)|
|<a name="description"></a>Description|A message to describe the performance insights.|[PerformanceInsightsMessage](performanceinsightsmessage.md)|
|<a name="entityid"></a>EntityId|For account level, this is *AccountId*. For campaign level, this is *CampaignId*.|**long**|
|<a name="entitytype"></a>EntityType|The supported types are *account* and *campaign*.|[EntityType](entitytype.md)|
|<a name="kpitype"></a>KPIType|Defines the type of key performance indicator. At the account level, we support *impression*, *click*, *spend*, and *conversion*. At the campaign level, we support *impression*, *click*, and *spend*.|[KPIType](kpitype.md)|
|<a name="rootcauses"></a>RootCauses|Messages that describe the root causes in "What happened."|[PerformanceInsightsMessage](performanceinsightsmessage.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetPerformanceInsightsDetailDataByAccountId](getperformanceinsightsdetaildatabyaccountid.md)  
