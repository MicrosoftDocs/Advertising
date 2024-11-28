---
title: NegativeKeywordConflictReportRequest Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a negative keyword conflict report request.
---
# NegativeKeywordConflictReportRequest Data Object - Reporting
Defines a negative keyword conflict report request. Use this report to discover which keywords and negative keywords are in conflict, and whether the conflict is at the campaign or ad group level. Use this list to figure out which negative keywords to delete.

You can request negative keywords that conflict with some of your keywords, and block your ad from showing.

To request a report of this type, pass this object to the [SubmitGenerateReport](submitgeneratereport.md) operation.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="NegativeKeywordConflictReportRequest" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ReportRequest">
      <xs:sequence>
        <xs:element name="Columns" nillable="true" type="tns:ArrayOfNegativeKeywordConflictReportColumn" />
        <xs:element minOccurs="0" name="Filter" nillable="true" type="tns:NegativeKeywordConflictReportFilter" />
        <xs:element name="Scope" nillable="true" type="tns:AccountThroughAdGroupReportScope" />
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
  "Type": "NegativeKeywordConflictReportRequest",
  "Columns": [
    "ValueHere"
  ],
  "Filter": {
    "AccountStatus": "ValueHere",
    "AdGroupStatus": "ValueHere",
    "CampaignStatus": "ValueHere",
    "KeywordStatus": "ValueHere"
  },
  "Scope": {
    "AccountIds": [
      "LongValueHere"
    ],
    "AdGroups": [
      {
        "AccountId": "LongValueHere",
        "AdGroupId": "LongValueHere",
        "CampaignId": "LongValueHere"
      }
    ],
    "Campaigns": [
      {
        "AccountId": "LongValueHere",
        "CampaignId": "LongValueHere"
      }
    ]
  }
}
```

-----

## <a name="elements"></a>Elements

The [NegativeKeywordConflictReportRequest](negativekeywordconflictreportrequest.md) object has the following elements: [Columns](#columns), [Filter](#filter), [Scope](#scope).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="columns"></a>Columns|The list of attributes and performance statistics to include in the report. The report will include the columns in the order that you specify them.|[NegativeKeywordConflictReportColumn](negativekeywordconflictreportcolumn.md) array|
|<a name="filter"></a>Filter|The filter information to use to filter the report data.|[NegativeKeywordConflictReportFilter](negativekeywordconflictreportfilter.md)|
|<a name="scope"></a>Scope|The entity scope of the report.<br/><br/>Use this element to limit the report data to specific accounts, ad groups, or campaigns.|[AccountThroughAdGroupReportScope](accountthroughadgroupreportscope.md)|

The [NegativeKeywordConflictReportRequest](negativekeywordconflictreportrequest.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsreportrequest"></a>Inherited Elements from ReportRequest
The [NegativeKeywordConflictReportRequest](negativekeywordconflictreportrequest.md) object derives from the [ReportRequest](reportrequest.md) object, and inherits the following elements: [ExcludeColumnHeaders](#excludecolumnheaders), [ExcludeReportFooter](#excludereportfooter), [ExcludeReportHeader](#excludereportheader), [Format](#format), [FormatVersion](#formatversion), [ReportName](#reportname), [ReturnOnlyCompleteData](#returnonlycompletedata). The descriptions below are specific to [NegativeKeywordConflictReportRequest](negativekeywordconflictreportrequest.md), and might not apply to other objects that inherit the same elements from the [ReportRequest](reportrequest.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludecolumnheaders"></a>ExcludeColumnHeaders|Determines whether or not the downloaded report should contain header descriptions for each column. The report column header matches the requested column name e.g. *Impressions* and *Clicks*.<br/><br/>Set this property *true* if you want the report column headers excluded from the downloaded report. The default value is *false*.|**boolean**|
|<a name="excludereportfooter"></a>ExcludeReportFooter|Determines whether or not the downloaded report should contain footer metadata such as Microsoft copyright (*@2020 Microsoft Corporation. All rights reserved.*). <br/><br/>Set this property *true* if you want the report footer metadata excluded from the downloaded report. The default value is *false*.|**boolean**|
|<a name="excludereportheader"></a>ExcludeReportHeader|Determines whether or not the downloaded report should contain header metadata such as report name, date range, and aggregation.<br/><br/>Set this property *true* if you want the report header metadata excluded from the downloaded report. The default value is *false*.|**boolean**|
|<a name="format"></a>Format|The format of the report data. For example, you can request the data in comma-separated values (Csv) format or tab-separated values (Tsv) format.<br/><br/>The default value is Csv.<br/><br/>All downloaded files are ZIP compressed.|[ReportFormat](reportformat.md)|
|<a name="formatversion"></a>FormatVersion|Determines the format for certain fields in the downloaded report file.<br/><br/>The data format for certain fields can be updated within the current API version without breaking existing client applications. You can get the latest data format by setting this optional request field to 2.0. If you do not set this field, the service defaults to version 1.0.<br/><br/>For details about changes between format versions, see [Report Format Version](../guides/reports.md#formatversion).|**string**|
|<a name="reportname"></a>ReportName|The name of the report. The name is included in the report header. If you do not specify a report name, the system generates a name in the form, ReportType-ReportDateTime.<br/><br/>The maximum length of the report name is 200.|**string**|
|<a name="returnonlycompletedata"></a>ReturnOnlyCompleteData|Not applicable for the negative keyword conflict report.|**boolean**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

