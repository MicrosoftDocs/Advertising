---
title: SearchTermLandingPageReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the attribute and performance statistic columns available in the Search Term Landing Page report.
---
# SearchTermLandingPageReportColumn Value Set - Reporting
Defines the attribute and performance statistic columns available in the Search Term Landing Page report. Columns are returned in the order specified in the request.

Attribute columns describe the entity or search term. Performance statistic columns contain aggregated metrics for the requested time period and aggregation level.

> [!NOTE]
> The request must include the *FinalUrl* attribute column and at least one performance statistic column, such as *Impressions*.

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
|<a name="absolutetopimpressionratepercent"></a>AbsoluteTopImpressionRatePercent|How often the ad was shown in the first (absolute top) position, as a percentage of total impressions.|
|<a name="accountid"></a>AccountId|The Microsoft Advertising-assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising-assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adid"></a>AdId|The Microsoft Advertising-assigned identifier of an ad.|
|<a name="adtype"></a>AdType|The ad type. Can be filtered with the AdType filter element.|
|<a name="averagecpc"></a>AverageCpc|The average cost per click, calculated as Spend divided by Clicks.|
|<a name="bidmatchtype"></a>BidMatchType|The keyword bid match type. Displays **AI Optimized** when the bid match was performed by AI.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising-assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaigntype"></a>CampaignType|The campaign type, for example Search, DynamicSearchAds, or PerformanceMax.|
|<a name="clicks"></a>Clicks|The number of clicks.|
|<a name="conversionrate"></a>ConversionRate|The conversion rate as a percentage, calculated as Conversions divided by Clicks.|
|<a name="conversions"></a>Conversions|The number of conversions.|
|<a name="conversionsqualified"></a>ConversionsQualified|The number of qualified conversions.|
|<a name="costperconversion"></a>CostPerConversion|The cost per conversion, calculated as Spend divided by Conversions.|
|<a name="ctr"></a>Ctr|The click-through rate as a percentage, calculated as Clicks divided by Impressions.|
|<a name="deliveredmatchtype"></a>DeliveredMatchType|The match type used to deliver the ad, which can differ from the bid match type. Displays **AI Optimized** when the ad was delivered by AI match. Can be filtered with the DeliveredMatchType filter element.|
|<a name="finalurl"></a>FinalUrl|The landing page URL (Final URL) that the user was sent to for the impression. This column is required.|
|<a name="finalurlsource"></a>FinalUrlSource|The source of the Final URL. Indicates whether the landing page URL came from the ad's specified Final URL or was expanded from the domain.|
|<a name="headline"></a>Headline|The headlines delivered for the impression, returned as a pipe-delimited string in the format `h1\|h2\|h3\|lh` (up to three headlines and one long headline). Empty slots are omitted.|
|<a name="impressions"></a>Impressions|The number of times the ad was displayed.|
|<a name="keyword"></a>Keyword|The keyword text that matched the search term. Displays **AI Optimized** when the match was performed by AI.|
|<a name="language"></a>Language|The display language of the search term. Can be filtered with the Language filter element.|
|<a name="returnonadspend"></a>ReturnOnAdSpend|The return on ad spend (ROAS), calculated as Revenue divided by Spend.|
|<a name="revenue"></a>Revenue|The advertiser-reported revenue attributed to conversions.|
|<a name="searchquery"></a>SearchQuery|The search term (query) that matched and caused the ad to be delivered. Can be filtered with the SearchQueries filter element. This is a primary dimension of the report.|
|<a name="spend"></a>Spend|The cost per impression (CPM) and cost per click (CPC) summed for the time period.|
|<a name="timeperiod"></a>TimePeriod|The time period of the report row. Available only when Aggregation is set to a value other than Summary. The date format depends on the aggregation level.|
|<a name="topimpressionratepercent"></a>TopImpressionRatePercent|How often the ad was shown at the top of the search results (above the organic results), as a percentage of total impressions.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md)  
