---
title: AccountThroughCampaignReportScope Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the set of accounts and campaigns to include in the report.
---
# AccountThroughCampaignReportScope Data Object - Reporting
Defines the set of accounts and campaigns to include in the report.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AccountThroughCampaignReportScope" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q2="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="AccountIds" nillable="true" type="q2:ArrayOflong" />
    <xs:element minOccurs="0" name="Campaigns" nillable="true" type="tns:ArrayOfCampaignReportScope" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountIds": [
    "LongValueHere"
  ],
  "Campaigns": [
    {
      "AccountId": "LongValueHere",
      "CampaignId": "LongValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AccountThroughCampaignReportScope](accountthroughcampaignreportscope.md) object has the following elements: [AccountIds](#accountids), [Campaigns](#campaigns).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountids"></a>AccountIds|A list of up to 1,000 account identifiers to include in the report.<br/><br/>The report scope includes a union of the [AccountIds](#accountids) and [Campaigns](#campaigns) elements. You must include at least one of these elements.|**long** array|
|<a name="campaigns"></a>Campaigns|A list of up to 300 campaigns to include in the report.<br/><br/>The report scope includes a union of the [AccountIds](#accountids) and [Campaigns](#campaigns) elements. You must include at least one of these elements.|[CampaignReportScope](campaignreportscope.md) array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[BidStrategyReportRequest](bidstrategyreportrequest.md)  
[BudgetSummaryReportRequest](budgetsummaryreportrequest.md)  
[CampaignPerformanceReportRequest](campaignperformancereportrequest.md)  
[CombinationPerformanceReportRequest](combinationperformancereportrequest.md)  
[SearchInsightPerformanceReportRequest](searchinsightperformancereportrequest.md)  
