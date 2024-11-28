---
title: CategoryClickCoverageReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the criteria to use to filter the category click coverage report data.
---
# CategoryClickCoverageReportFilter Data Object - Reporting
Defines the criteria to use to filter the category click coverage report data.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CategoryClickCoverageReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q24="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="CountryCode" nillable="true" type="q24:ArrayOfstring" />
    <xs:element xmlns:q25="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="L1Vertical" nillable="true" type="q25:ArrayOfstring" />
    <xs:element xmlns:q26="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="L2Vertical" nillable="true" type="q26:ArrayOfstring" />
    <xs:element xmlns:q27="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="L3Vertical" nillable="true" type="q27:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CountryCode": [
    "ValueHere"
  ],
  "L1Vertical": [
    "ValueHere"
  ],
  "L2Vertical": [
    "ValueHere"
  ],
  "L3Vertical": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [CategoryClickCoverageReportFilter](categoryclickcoveragereportfilter.md) object has the following elements: [CountryCode](#countrycode), [L1Vertical](#l1vertical), [L2Vertical](#l2vertical), [L3Vertical](#l3vertical).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="countrycode"></a>CountryCode|The report will include data for only the specified countries/regions where the user that clicked the ad is located.<br/><br/>For a list of possible values, see [Geographical Location Codes](../guides/geographical-location-codes.md).|**string** array|
|<a name="l1vertical"></a>L1Vertical|A particular supply sector, such as Travel and Tourism or Apparel.<br/><br/>[View a list of L1 verticals](../guides/reporting-verticals.md#l1verticals).|**string** array|
|<a name="l2vertical"></a>L2Vertical|A more detailed segment of an L1 vertical. For instance, within the L1 vertical travel and tourism, L2 verticals might include Accommodations or Air travel.<br/><br/>[View a list of L2 verticals](../guides/reporting-verticals.md#l2verticals).|**string** array|
|<a name="l3vertical"></a>L3Vertical|The most specific segment within a larger L1 vertical. For example, if the L1 vertical is travel and tourism and the L2 vertical is Accommodations, an L3 vertical might be Bed and Breakfasts or Camping and RV.<br/><br/>[View a list of L3 verticals](../guides/reporting-verticals.md#l3verticals).|**string** array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CategoryClickCoverageReportRequest](categoryclickcoveragereportrequest.md)  
