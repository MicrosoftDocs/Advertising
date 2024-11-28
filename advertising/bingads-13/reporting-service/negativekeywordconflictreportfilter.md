---
title: NegativeKeywordConflictReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the criteria to use to filter the negative keyword conflict report data.
---
# NegativeKeywordConflictReportFilter Data Object - Reporting
Defines the criteria to use to filter the negative keyword conflict report data.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="NegativeKeywordConflictReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element minOccurs="0" name="KeywordStatus" nillable="true" type="tns:KeywordStatusReportFilter" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountStatus": "ValueHere",
  "AdGroupStatus": "ValueHere",
  "CampaignStatus": "ValueHere",
  "KeywordStatus": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [NegativeKeywordConflictReportFilter](negativekeywordconflictreportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdGroupStatus](#adgroupstatus), [CampaignStatus](#campaignstatus), [KeywordStatus](#keywordstatus).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will only include data for accounts with the specified status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|The report will only include data for ad groups with the specified status. For example, you can use the filter to include data for only active ad groups.<br/><br/>You can specify one or more ad group statuses.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will only include data for campaigns with the specified status. For example, you can use the filter to include data for only active campaigns.<br/><br/>You can specify one or more campaign statuses.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="keywordstatus"></a>KeywordStatus|The report will only include data for keywords with the specified status. For example, you can use the filter to include data for only active keywords.<br/><br/>You can specify one or more keyword statuses.|[KeywordStatusReportFilter](keywordstatusreportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[NegativeKeywordConflictReportRequest](negativekeywordconflictreportrequest.md)  
