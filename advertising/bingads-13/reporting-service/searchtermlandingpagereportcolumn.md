---
title: SearchTermLandingPageReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the attributes and performance statistics columns that you can include in the SearchTermLandingPageReportRequest.
---
# SearchTermLandingPageReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the SearchTermLandingPageReportRequest.

## Syntax
```xml
<xs:simpleType name="SearchTermLandingPageReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AdId" />
    <xs:enumeration value="AdType" />
    <xs:enumeration value="CampaignType" />
    <xs:enumeration value="Language" />
    <xs:enumeration value="SearchQuery" />
    <xs:enumeration value="Keyword" />
    <xs:enumeration value="BidMatchType" />
    <xs:enumeration value="DeliveredMatchType" />
    <xs:enumeration value="Headline" />
    <xs:enumeration value="LandingPageUrl" />
    <xs:enumeration value="FinalUrl" />
    <xs:enumeration value="FinalUrlSource" />
    <xs:enumeration value="FinalURLExpansion" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="ConversionRate" />
    <xs:enumeration value="CostPerConversion" />
    <xs:enumeration value="AbsoluteTopImpressionRatePercent" />
    <xs:enumeration value="TopImpressionRatePercent" />
    <xs:enumeration value="Revenue" />
    <xs:enumeration value="ReturnOnAdSpend" />
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="ConversionsQualified" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [SearchTermLandingPageReportColumn](searchtermlandingpagereportcolumn.md) value set has the following values: [AbsoluteTopImpressionRatePercent](#absolutetopimpressionratepercent), [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdId](#adid), [AdType](#adtype), [AverageCpc](#averagecpc), [BidMatchType](#bidmatchtype), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignType](#campaigntype), [Clicks](#clicks), [ConversionRate](#conversionrate), [Conversions](#conversions), [ConversionsQualified](#conversionsqualified), [CostPerConversion](#costperconversion), [Ctr](#ctr), [DeliveredMatchType](#deliveredmatchtype), [FinalUrl](#finalurl), [FinalURLExpansion](#finalurlexpansion), [FinalUrlSource](#finalurlsource), [Headline](#headline), [Impressions](#impressions), [Keyword](#keyword), [LandingPageUrl](#landingpageurl), [Language](#language), [ReturnOnAdSpend](#returnonadspend), [Revenue](#revenue), [SearchQuery](#searchquery), [Spend](#spend), [TimePeriod](#timeperiod), [TopImpressionRatePercent](#topimpressionratepercent).

|Value|Description|
|-----------|---------------|
|<a name="absolutetopimpressionratepercent"></a>AbsoluteTopImpressionRatePercent|Reserved.|
|<a name="accountid"></a>AccountId|Reserved.|
|<a name="accountname"></a>AccountName|Reserved.|
|<a name="adgroupid"></a>AdGroupId|Reserved.|
|<a name="adgroupname"></a>AdGroupName|Reserved.|
|<a name="adid"></a>AdId|Reserved.|
|<a name="adtype"></a>AdType|Reserved.|
|<a name="averagecpc"></a>AverageCpc|Reserved.|
|<a name="bidmatchtype"></a>BidMatchType|Reserved.|
|<a name="campaignid"></a>CampaignId|Reserved.|
|<a name="campaignname"></a>CampaignName|Reserved.|
|<a name="campaigntype"></a>CampaignType|Reserved.|
|<a name="clicks"></a>Clicks|Reserved.|
|<a name="conversionrate"></a>ConversionRate|Reserved.|
|<a name="conversions"></a>Conversions|Reserved.|
|<a name="conversionsqualified"></a>ConversionsQualified|Reserved.|
|<a name="costperconversion"></a>CostPerConversion|Reserved.|
|<a name="ctr"></a>Ctr|Reserved.|
|<a name="deliveredmatchtype"></a>DeliveredMatchType|Reserved.|
|<a name="finalurl"></a>FinalUrl|Reserved.|
|<a name="finalurlexpansion"></a>FinalURLExpansion|Reserved.|
|<a name="finalurlsource"></a>FinalUrlSource|Reserved.|
|<a name="headline"></a>Headline|Reserved.|
|<a name="impressions"></a>Impressions|Reserved.|
|<a name="keyword"></a>Keyword|Reserved.|
|<a name="landingpageurl"></a>LandingPageUrl|Reserved.|
|<a name="language"></a>Language|Reserved.|
|<a name="returnonadspend"></a>ReturnOnAdSpend|Reserved.|
|<a name="revenue"></a>Revenue|Reserved.|
|<a name="searchquery"></a>SearchQuery|Reserved.|
|<a name="spend"></a>Spend|Reserved.|
|<a name="timeperiod"></a>TimePeriod|Reserved.|
|<a name="topimpressionratepercent"></a>TopImpressionRatePercent|Reserved.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md)  
