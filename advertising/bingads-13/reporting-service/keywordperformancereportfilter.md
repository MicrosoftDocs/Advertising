---
title: KeywordPerformanceReportFilter Data Object - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the criteria to use to filter the keyword performance report data.
---
# KeywordPerformanceReportFilter Data Object - Reporting
Defines the criteria to use to filter the keyword performance report data.

## Syntax
```xml
<xs:complexType name="KeywordPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdDistribution" nillable="true" type="tns:AdDistributionReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="AdRelevance" nillable="true" type="q4:ArrayOfint" xmlns:q4="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="AdType" nillable="true" type="tns:AdTypeReportFilter" />
    <xs:element minOccurs="0" name="BidMatchType" nillable="true" type="tns:BidMatchTypeReportFilter" />
    <xs:element minOccurs="0" name="BidStrategyType" nillable="true" type="tns:BidStrategyTypeReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element minOccurs="0" name="DeliveredMatchType" nillable="true" type="tns:DeliveredMatchTypeReportFilter" />
    <xs:element minOccurs="0" name="DeviceType" nillable="true" type="tns:DeviceTypeReportFilter" />
    <xs:element minOccurs="0" name="ExpectedCtr" nillable="true" type="q5:ArrayOfint" xmlns:q5="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="KeywordStatus" nillable="true" type="tns:KeywordStatusReportFilter" />
    <xs:element minOccurs="0" name="Keywords" nillable="true" type="q6:ArrayOfstring" xmlns:q6="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="LandingPageExperience" nillable="true" type="q7:ArrayOfint" xmlns:q7="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageReportFilter" />
    <xs:element minOccurs="0" name="QualityScore" nillable="true" type="q8:ArrayOfint" xmlns:q8="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordPerformanceReportFilter](keywordperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdDistribution](#addistribution), [AdGroupStatus](#adgroupstatus), [AdRelevance](#adrelevance), [AdType](#adtype), [BidMatchType](#bidmatchtype), [BidStrategyType](#bidstrategytype), [CampaignStatus](#campaignstatus), [DeliveredMatchType](#deliveredmatchtype), [DeviceType](#devicetype), [ExpectedCtr](#expectedctr), [Keywords](#keywords), [KeywordStatus](#keywordstatus), [LandingPageExperience](#landingpageexperience), [Language](#language), [QualityScore](#qualityscore).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will include data for only the account status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="addistribution"></a>AdDistribution|The report will include data for only the specified distribution medium. For example, you can use the filter to include data for only search ads.<br/><br/>You can specify one or more distribution mediums.|[AdDistributionReportFilter](addistributionreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|The report will include data for only the ad group status. For example, you can use the filter to include data for only active ad groups.<br/><br/>You can specify one or more ad group statuses.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="adrelevance"></a>AdRelevance|How closely related your ads is to the customer's search query or other input. It tells you how relevant your ad and landing page are to potential customers.<br/><br/>A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.<br/><br/>If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score.<br/><br/>Data for this column is typically updated 14-18 hours after the UTC day ends.|**int** array|
|<a name="adtype"></a>AdType|The report will include data for only the specified ad types. For example, the report can include data for product or expanded text ads. You can specify one or more ad types.|[AdTypeReportFilter](adtypereportfilter.md)|
|<a name="bidmatchtype"></a>BidMatchType|The report will include data for only the specified bid match types. For example, you can use the filter to include data for ads that were bid on using the exact or phrase match type.<br/><br/>You can specify one or more bid match types.<br/><br/>To filter on delivered match types, see the *DeliveredMatchType* element.|[BidMatchTypeReportFilter](bidmatchtypereportfilter.md)|
|<a name="bidstrategytype"></a>BidStrategyType|The report will include data for only the specified bid strategy type or types. For example, you can use the filter to include data only for keywords that were bid on using the enhanced bid strategy type.<br/><br/>You can specify one or more bid strategy types.|[BidStrategyTypeReportFilter](bidstrategytypereportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will include data for only the campaign status. For example, you can use the filter to include data for only active campaigns.<br/><br/>You can specify one or more campaign statuses.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="deliveredmatchtype"></a>DeliveredMatchType|The report will include data for only the specified delivered match types. For example, you can use the filter to include data for ads that were delivered using the exact or phrase match type.<br/><br/>You can specify one or more delivered match types.<br/><br/>To filter on bid match types, see the *BidMatchType* element.|[DeliveredMatchTypeReportFilter](deliveredmatchtypereportfilter.md)|
|<a name="devicetype"></a>DeviceType|The report will include data for only the specified types of devices on which the ad is displayed. For example, you can use the filter to include data for only text ads displayed on smartphones.<br/><br/>You can specify one or more device types.|[DeviceTypeReportFilter](devicetypereportfilter.md)|
|<a name="expectedctr"></a>ExpectedCtr|How well your keyword competes against other keywords targeting the same traffic. Ads that are relevant to searchers' queries or other input are more likely to have a higher click-through rate. This metric tells you if a keyword is underperforming and causing a loss in impression share, so you can make keyword changes or remove ads altogether.<br/><br/>A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.<br/><br/>If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score.<br/><br/>Data for this column is typically updated 14-18 hours after the UTC day ends.|**int** array|
|<a name="keywords"></a>Keywords|The report will include data for only the specified keywords. You can specify a maximum of 75 keywords. Each keyword can contain a maximum of 100 characters.|**string** array|
|<a name="keywordstatus"></a>KeywordStatus|The report will include data for only the keyword status. For example, you can use the filter to include data for only active keywords.<br/><br/>You can specify one or more keyword statuses.|[KeywordStatusReportFilter](keywordstatusreportfilter.md)|
|<a name="landingpageexperience"></a>LandingPageExperience|An aggregate quality assessment of all landing pages on your site. The landing page experience score measures whether your landing page is likely to provide a good experience to customers who click your ad and land on your website.<br/><br/>A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average.<br/><br/>If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score.<br/><br/>Data for this column is typically updated 14-18 hours after the UTC day ends.|**int** array|
|<a name="language"></a>Language|The report will include data for only websites that used the specified languages.<br/><br/>You can specify one or more languages.|[LanguageReportFilter](languagereportfilter.md)|
|<a name="qualityscore"></a>QualityScore|The report will include data for only keywords with the specified quality scores. You can filter the report based on one or more of the following relevance values:<br/><br/>0 - N/A (as shown in the web application)<br/><br/>1 - Underperforming<br/><br/>2 - Underperforming<br/><br/>3 - Underperforming<br/><br/>4 - Underperforming<br/><br/>5 - Underperforming<br/><br/>6 - Average performance<br/><br/>7 - Competitive<br/><br/>8 - Competitive<br/><br/>9 - Competitive<br/><br/>10 - Competitive|**int** array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[KeywordPerformanceReportRequest](keywordperformancereportrequest.md)  
