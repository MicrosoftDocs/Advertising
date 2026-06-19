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
Defines the attributes and performance statistics columns that you can include in the [SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md).

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
    <xs:enumeration value="FinalUrl">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FinalUrlSource">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">17</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Impressions">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">18</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Clicks">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">19</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Ctr">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">20</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AverageCpc">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">21</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Spend">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">22</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Conversions">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">23</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ConversionRate">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">24</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CostPerConversion">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">25</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AbsoluteTopImpressionRatePercent">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">26</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="TopImpressionRatePercent">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">27</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Revenue">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">28</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ReturnOnAdSpend">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">29</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="TimePeriod">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">30</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ConversionsQualified">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">31</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [SearchTermLandingPageReportColumn](searchtermlandingpagereportcolumn.md) value set has the following values: [AbsoluteTopImpressionRatePercent](#absolutetopimpressionratepercent), [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdId](#adid), [AdType](#adtype), [AverageCpc](#averagecpc), [BidMatchType](#bidmatchtype), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignType](#campaigntype), [Clicks](#clicks), [ConversionRate](#conversionrate), [Conversions](#conversions), [ConversionsQualified](#conversionsqualified), [CostPerConversion](#costperconversion), [Ctr](#ctr), [DeliveredMatchType](#deliveredmatchtype), [FinalUrl](#finalurl), [FinalUrlSource](#finalurlsource), [Headline](#headline), [Impressions](#impressions), [Keyword](#keyword), [Language](#language), [ReturnOnAdSpend](#returnonadspend), [Revenue](#revenue), [SearchQuery](#searchquery), [Spend](#spend), [TimePeriod](#timeperiod), [TopImpressionRatePercent](#topimpressionratepercent).

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
|<a name="finalurlsource"></a>FinalUrlSource|Reserved.|
|<a name="headline"></a>Headline|Reserved.|
|<a name="impressions"></a>Impressions|Reserved.|
|<a name="keyword"></a>Keyword|Reserved.|
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
