---
title: AccountThroughAdGroupReportScope Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the set of accounts, campaigns, and ad groups to include in the report.
---
# AccountThroughAdGroupReportScope Data Object - Reporting
Defines the set of accounts, campaigns, and ad groups to include in the report.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AccountThroughAdGroupReportScope" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q3="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="AccountIds" nillable="true" type="q3:ArrayOflong" />
    <xs:element minOccurs="0" name="AdGroups" nillable="true" type="tns:ArrayOfAdGroupReportScope" />
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
```

-----

## <a name="elements"></a>Elements

The [AccountThroughAdGroupReportScope](accountthroughadgroupreportscope.md) object has the following elements: [AccountIds](#accountids), [AdGroups](#adgroups), [Campaigns](#campaigns).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountids"></a>AccountIds|A list of up to 1,000 account identifiers to include in the report.<br/><br/>The report scope includes a union of the [AccountIds](#accountids), [AdGroups](#adgroups), and [Campaigns](#campaigns) elements. You must include at least one of these elements.|**long** array|
|<a name="adgroups"></a>AdGroups|A list of up to 300 ad groups to include in the report.<br/><br/>The report scope includes a union of the [AccountIds](#accountids), [AdGroups](#adgroups), and [Campaigns](#campaigns) elements. You must include at least one of these elements.|[AdGroupReportScope](adgroupreportscope.md) array|
|<a name="campaigns"></a>Campaigns|A list of up to 300 campaigns to include in the report.<br/><br/>The report scope includes a union of the [AccountIds](#accountids), [AdGroups](#adgroups), and [Campaigns](#campaigns) elements. You must include at least one of these elements.|[CampaignReportScope](campaignreportscope.md) array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AdDynamicTextPerformanceReportRequest](addynamictextperformancereportrequest.md)  
[AdExtensionByAdReportRequest](adextensionbyadreportrequest.md)  
[AdExtensionByKeywordReportRequest](adextensionbykeywordreportrequest.md)  
[AdExtensionDetailReportRequest](adextensiondetailreportrequest.md)  
[AdGroupPerformanceReportRequest](adgroupperformancereportrequest.md)  
[AdPerformanceReportRequest](adperformancereportrequest.md)  
[AgeGenderAudienceReportRequest](agegenderaudiencereportrequest.md)  
[AssetPerformanceReportRequest](assetperformancereportrequest.md)  
[AudiencePerformanceReportRequest](audienceperformancereportrequest.md)  
[CallDetailReportRequest](calldetailreportrequest.md)  
[ConversionPerformanceReportRequest](conversionperformancereportrequest.md)  
[DestinationUrlPerformanceReportRequest](destinationurlperformancereportrequest.md)  
[DSAAutoTargetPerformanceReportRequest](dsaautotargetperformancereportrequest.md)  
[DSACategoryPerformanceReportRequest](dsacategoryperformancereportrequest.md)  
[DSASearchQueryPerformanceReportRequest](dsasearchqueryperformancereportrequest.md)  
[GeographicPerformanceReportRequest](geographicperformancereportrequest.md)  
[GoalsAndFunnelsReportRequest](goalsandfunnelsreportrequest.md)  
[HotelDimensionPerformanceReportRequest](hoteldimensionperformancereportrequest.md)  
[HotelGroupPerformanceReportRequest](hotelgroupperformancereportrequest.md)  
[KeywordPerformanceReportRequest](keywordperformancereportrequest.md)  
[NegativeKeywordConflictReportRequest](negativekeywordconflictreportrequest.md)  
[ProductDimensionPerformanceReportRequest](productdimensionperformancereportrequest.md)  
[ProductMatchCountReportRequest](productmatchcountreportrequest.md)  
[ProductNegativeKeywordConflictReportRequest](productnegativekeywordconflictreportrequest.md)  
[ProductPartitionPerformanceReportRequest](productpartitionperformancereportrequest.md)  
[ProductPartitionUnitPerformanceReportRequest](productpartitionunitperformancereportrequest.md)  
[ProductSearchQueryPerformanceReportRequest](productsearchqueryperformancereportrequest.md)  
[ProfessionalDemographicsAudienceReportRequest](professionaldemographicsaudiencereportrequest.md)  
[PublisherUsagePerformanceReportRequest](publisherusageperformancereportrequest.md)  
[SearchCampaignChangeHistoryReportRequest](searchcampaignchangehistoryreportrequest.md)  
[SearchQueryPerformanceReportRequest](searchqueryperformancereportrequest.md)  
[ShareOfVoiceReportRequest](shareofvoicereportrequest.md)  
[UserLocationPerformanceReportRequest](userlocationperformancereportrequest.md)  
