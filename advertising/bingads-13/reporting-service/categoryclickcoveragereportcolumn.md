---
title: CategoryClickCoverageReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the attributes and performance statistics columns that you can include in the CategoryClickCoverageReportColumn.
---
# CategoryClickCoverageReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the CategoryClickCoverageReportColumn.

## Syntax
```xml
<xs:simpleType name="CategoryClickCoverageReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="CustomerName" />
    <xs:enumeration value="L1Vertical" />
    <xs:enumeration value="L2Vertical" />
    <xs:enumeration value="L3Vertical" />
    <xs:enumeration value="WeekStartingMonday" />
    <xs:enumeration value="MarketplaceClickCoverage" />
    <xs:enumeration value="Country" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CategoryClickCoverageReportColumn](categoryclickcoveragereportcolumn.md) value set has the following values: [AccountName](#accountname), [Country](#country), [CustomerName](#customername), [L1Vertical](#l1vertical), [L2Vertical](#l2vertical), [L3Vertical](#l3vertical), [MarketplaceClickCoverage](#marketplaceclickcoverage), [WeekStartingMonday](#weekstartingmonday).

|Value|Description|
|-----------|---------------|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="country"></a>Country|The country-specific Bing marketplace, such as Bing France or Bing India.|
|<a name="customername"></a>CustomerName|The customer name.|
|<a name="l1vertical"></a>L1Vertical|A particular supply sector, such as Travel and Tourism or Apparel.<br/><br/>[View a list of L1 verticals](../guides/reporting-verticals.md#l1-verticals).|
|<a name="l2vertical"></a>L2Vertical|A more detailed segment of an L1 vertical. For instance, within the L1 vertical travel and tourism, L2 verticals might include Accommodations or Air travel.<br/><br/>[View a list of L2 verticals](../guides/reporting-verticals.md#l2-verticals).|
|<a name="l3vertical"></a>L3Vertical|The most specific segment within a larger L1 vertical. For example, if the L1 vertical is travel and tourism and the L2 vertical is Accommodations, an L3 vertical might be Bed and Breakfasts or Camping and RV.<br/><br/>[View a list of L3 verticals](../guides/reporting-verticals.md#l4-verticals).|
|<a name="marketplaceclickcoverage"></a>MarketplaceClickCoverage|The percentage of clicks your account(s) received compared to the total number of clicks by all advertisers for a specific L1 – L3 slice. Clickshare is calculated as your account's clicks divided by total clicks from all market advertisers.|
|<a name="weekstartingmonday"></a>WeekStartingMonday|The date range for the week that your data is from starting with Monday.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CategoryClickCoverageReportRequest](categoryclickcoveragereportrequest.md)  
