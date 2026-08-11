---
title: SearchTermLandingPageReportRequest Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a search term landing page report request.
---
# SearchTermLandingPageReportRequest Data Object - Reporting
Defines a Search Term Landing Page report request. Use this request with the [SubmitGenerateReport](submitgeneratereport.md) operation to generate a report that includes the search term, delivered headline, and landing page URL for each ad impression.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SearchTermLandingPageReportRequest" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ReportRequest">
      <xs:sequence>
        <xs:element name="Aggregation" type="tns:ReportAggregation" />
        <xs:element name="Columns" nillable="true" type="tns:ArrayOfSearchTermLandingPageReportColumn" />
        <xs:element minOccurs="0" name="Filter" nillable="true" type="tns:SearchTermLandingPageReportFilter" />
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
  "Type": "SearchTermLandingPageReportRequest",
  "Aggregation": "ValueHere",
  "Columns": [
    "ValueHere"
  ],
  "Filter": {
    "AdType": "ValueHere",
    "DeliveredMatchType": "ValueHere",
    "Language": "ValueHere",
    "SearchQueries": [
      "ValueHere"
    ]
  },
  "Scope": {
    "AccountIds": [
      "LongValueHere"
    ],
    "Campaigns": [
      {
        "AccountId": "LongValueHere",
        "CampaignId": "LongValueHere"
      }
    ]
  },
  "Time": {
    "CustomDateRangeEnd": {
      "Day": IntValueHere,
      "Month": IntValueHere,
      "Year": IntValueHere
    },
    "CustomDateRangeStart": {
      "Day": IntValueHere,
      "Month": IntValueHere,
      "Year": IntValueHere
    },
    "PredefinedTime": "ValueHere",
    "ReportTimeZone": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md) object has the following elements: [Aggregation](#aggregation), [Columns](#columns), [Filter](#filter), [Scope](#scope), [Time](#time).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aggregation"></a>Aggregation|The type of aggregation to use to aggregate the report data. For example, you can aggregate the report data by day or week.<br/><br/>Supported values are *Hourly*, *Daily*, *Weekly, *Monthly*, *Yearly*, *DayOfWeek*, and *HourOfDay*.<br/><br/>This element is required.|[ReportAggregation](reportaggregation.md)|
|<a name="columns"></a>Columns|The list of attributes and performance statistics to include in the report. The report will include the columns in the order that you specify them.<br/><br/>You must specify Final URL and at least one performance statistics column, e.g., *Impressions*.<br/><br/>This element is required.|[SearchTermLandingPageReportColumn](searchtermlandingpagereportcolumn.md) array|
|<a name="filter"></a>Filter|The filter information to use to filter the report data.<br/><br/>This element is optional.|[SearchTermLandingPageReportFilter](searchtermlandingpagereportfilter.md)|
|<a name="scope"></a>Scope|The entities and their scope to include in the report. Use this element to limit the report data to specific accounts and campaigns.<br/><br/>This element is required.|[AccountThroughCampaignReportScope](accountthroughcampaignreportscope.md)|
|<a name="time"></a>Time|The time frame to use to aggregate the report data. You can specify a custom date range or select a predefined date range, for example, *Today* or *ThisWeek*.<br/><br/>This element is required.|[ReportTime](reporttime.md)|

The [SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsreportrequest"></a>Inherited Elements from ReportRequest
The [SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md) object derives from the [ReportRequest](reportrequest.md) object, and inherits the following elements: [ExcludeColumnHeaders](#excludecolumnheaders), [ExcludeReportFooter](#excludereportfooter), [ExcludeReportHeader](#excludereportheader), [Format](#format), [FormatVersion](#formatversion), [ReportName](#reportname), [ReturnOnlyCompleteData](#returnonlycompletedata). The descriptions below are specific to [SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md), and might not apply to other objects that inherit the same elements from the [ReportRequest](reportrequest.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludecolumnheaders"></a>ExcludeColumnHeaders|Determines whether or not the report includes header descriptions for each column of data.<br/><br/>This element is optional and defaults to *false*.|**boolean**|
|<a name="excludereportfooter"></a>ExcludeReportFooter|Determines whether or not the report includes footer information such as copyright.<br/><br/>This element is optional and defaults to *false*.|**boolean**|
|<a name="excludereportheader"></a>ExcludeReportHeader|Determines whether or not the report includes header information such as the report name and date range.<br/><br/>This element is optional and defaults to *false*.|**boolean**|
|<a name="format"></a>Format|The format of the report file. For example you can specify to have the report data written to a file that uses comma-separated values (CSV).<br/><br/>This element is optional and defaults to *Csv*.|[ReportFormat](reportformat.md)|
|<a name="formatversion"></a>FormatVersion|The format version of the report file.<br/><br/>This element is optional.|**string**|
|<a name="reportname"></a>ReportName|The name of the report. The name will be used as the name of the download file.<br/><br/>This element is optional.|**string**|
|<a name="returnonlycompletedata"></a>ReturnOnlyCompleteData|Determines whether the operation returns data for only fully processed time periods.<br/><br/>This element is optional and defaults to false.|**boolean**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  
