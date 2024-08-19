---
title: SearchInsightPerformanceReportRequest Data Object Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for SearchInsightPerformanceReportRequest.(test)
---
# SearchInsightPerformanceReportRequest Data Object Test - Reporting
Defines a data object for SearchInsightPerformanceReportRequest.

# [XML](#tab/xml)

```xml
<xs:complexType name="SearchInsightPerformanceReportRequest" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ReportRequest">
      <xs:sequence>
        <xs:element name="Aggregation" type="tns:ReportAggregation" />
        <xs:element name="Columns" nillable="true" type="tns:ArrayOfSearchInsightPerformanceReportColumn" />
        <xs:element minOccurs="0" name="Filter" nillable="true" type="tns:SearchInsightPerformanceReportFilter" />
        <xs:element name="Scope" nillable="true" type="tns:AccountThroughCampaignReportScope" />
        <xs:element name="Time" nillable="true" type="tns:ReportTime" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ExcludeColumnHeaders": "ValueHere",
  "ExcludeReportFooter": "ValueHere",
  "ExcludeReportHeader": "ValueHere",
  "Format": "ValueHere",
  "FormatVersion": "ValueHere",
  "ReportName": "ValueHere",
  "ReturnOnlyCompleteData": "ValueHere",
  "Type": "SearchInsightPerformanceReportRequest",
  "Aggregation": "ValueHere",
  "Columns": [
    "ValueHere"
  ],
  "Filter": {
    "AccountStatus": "ValueHere",
    "AdGroupStatus": "ValueHere",
    "AssetGroupStatus": "ValueHere",
    "CampaignStatus": "ValueHere",
    "SearchCategory": [
      "ValueHere"
    ],
    "SearchQueries": [
      "ValueHere"
    ]
  },
  "Scope": {
    "AccountIds": [
      "ValueHere"
    ],
    "Campaigns": [
      {
        "AccountId": "ValueHere",
        "CampaignId": "ValueHere"
      }
    ]
  },
  "Time": {
    "CustomDateRangeEnd": {
      "Day": NumbericValueHere,
      "Month": NumbericValueHere,
      "Year": NumbericValueHere
    },
    "CustomDateRangeStart": {
      "Day": NumbericValueHere,
      "Month": NumbericValueHere,
      "Year": NumbericValueHere
    },
    "PredefinedTime": "ValueHere",
    "ReportTimeZone": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [SearchInsightPerformanceReportRequest](searchinsightperformancereportrequest.md) object has the following elements: [Aggregation](#aggregation), [Columns](#columns), [Filter](#filter), [Scope](#scope), [Time](#time).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aggregation"></a>Aggregation|Reserved.|[ReportAggregation](reportaggregation.md)|
|<a name="columns"></a>Columns|Reserved.|[SearchInsightPerformanceReportColumn](searchinsightperformancereportcolumn.md) array|
|<a name="filter"></a>Filter|Reserved.|[SearchInsightPerformanceReportFilter](searchinsightperformancereportfilter.md)|
|<a name="scope"></a>Scope|Reserved.|[AccountThroughCampaignReportScope](accountthroughcampaignreportscope.md)|
|<a name="time"></a>Time|Reserved.|[ReportTime](reporttime.md)|

The [SearchInsightPerformanceReportRequest](searchinsightperformancereportrequest.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsreportrequest"></a>Inherited Elements from ReportRequest
The [SearchInsightPerformanceReportRequest](searchinsightperformancereportrequest.md) object derives from the [ReportRequest](reportrequest.md) object, and inherits the following elements: [ExcludeColumnHeaders](#excludecolumnheaders), [ExcludeReportFooter](#excludereportfooter), [ExcludeReportHeader](#excludereportheader), [Format](#format), [FormatVersion](#formatversion), [ReportName](#reportname), [ReturnOnlyCompleteData](#returnonlycompletedata). The descriptions below are specific to [SearchInsightPerformanceReportRequest](searchinsightperformancereportrequest.md), and might not apply to other objects that inherit the same elements from the [ReportRequest](reportrequest.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludecolumnheaders"></a>ExcludeColumnHeaders|Reserved.|**boolean**|
|<a name="excludereportfooter"></a>ExcludeReportFooter|Reserved.|**boolean**|
|<a name="excludereportheader"></a>ExcludeReportHeader|Reserved.|**boolean**|
|<a name="format"></a>Format|Reserved.|[ReportFormat](reportformat.md)|
|<a name="formatversion"></a>FormatVersion|Reserved.|**string**|
|<a name="reportname"></a>ReportName|Reserved.|**string**|
|<a name="returnonlycompletedata"></a>ReturnOnlyCompleteData|Reserved.|**boolean**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

