---
title: PerformanceInsightsUrlId Value Set Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the URL ID for performance insights.(test)
---
# PerformanceInsightsUrlId Value Set Test - Ad Insight
Defines the URL ID for performance insights.

## Syntax
```xml
<xs:simpleType name="PerformanceInsightsUrlId" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="RecRecommendationPage">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RecCompetitionPage">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SettingCreateOrder">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SettingRemoveHold">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SettingAddFunds">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">5</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ReportSearchTerm">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ReportPublisherWebsite">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">7</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ReportAuctionInsights">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocNetworkSetting">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">9</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocEditorial">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">10</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocWebsiteReport">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">11</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocWebsiteExclusion">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">12</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocCreateOrder">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">13</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocRemoveHold">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">14</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocAddFunds">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">15</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocRecommendation">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDocAudienceNetwork">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">17</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PerformanceInsightsUrlId](performanceinsightsurlid.md) value set has the following values: [HelpDocAddFunds](#helpdocaddfunds), [HelpDocAudienceNetwork](#helpdocaudiencenetwork), [HelpDocCreateOrder](#helpdoccreateorder), [HelpDocEditorial](#helpdoceditorial), [HelpDocNetworkSetting](#helpdocnetworksetting), [HelpDocRecommendation](#helpdocrecommendation), [HelpDocRemoveHold](#helpdocremovehold), [HelpDocWebsiteExclusion](#helpdocwebsiteexclusion), [HelpDocWebsiteReport](#helpdocwebsitereport), [RecCompetitionPage](#reccompetitionpage), [RecRecommendationPage](#recrecommendationpage), [ReportAuctionInsights](#reportauctioninsights), [ReportPublisherWebsite](#reportpublisherwebsite), [ReportSearchTerm](#reportsearchterm), [SettingAddFunds](#settingaddfunds), [SettingCreateOrder](#settingcreateorder), [SettingRemoveHold](#settingremovehold).

|Value|Description|
|-----------|---------------|
|<a name="helpdocaddfunds"></a>HelpDocAddFunds|Learn more about adding funds.|
|<a name="helpdocaudiencenetwork"></a>HelpDocAudienceNetwork|Learn more about the Microsoft Audience Network.|
|<a name="helpdoccreateorder"></a>HelpDocCreateOrder|Learn more about creating an order.|
|<a name="helpdoceditorial"></a>HelpDocEditorial|Learn more about editorials.|
|<a name="helpdocnetworksetting"></a>HelpDocNetworkSetting|Learn more about network settings.|
|<a name="helpdocrecommendation"></a>HelpDocRecommendation|Learn more about recommendations.|
|<a name="helpdocremovehold"></a>HelpDocRemoveHold|Learn more about removing a hold.|
|<a name="helpdocwebsiteexclusion"></a>HelpDocWebsiteExclusion|Learn more about website exclusion.|
|<a name="helpdocwebsitereport"></a>HelpDocWebsiteReport|Learn more about website reports.|
|<a name="reccompetitionpage"></a>RecCompetitionPage|Competition recommendation page.|
|<a name="recrecommendationpage"></a>RecRecommendationPage|Recommendation page.|
|<a name="reportauctioninsights"></a>ReportAuctionInsights|Auction insights report.|
|<a name="reportpublisherwebsite"></a>ReportPublisherWebsite|Publisher report.|
|<a name="reportsearchterm"></a>ReportSearchTerm|Search term report.|
|<a name="settingaddfunds"></a>SettingAddFunds|Add funds.|
|<a name="settingcreateorder"></a>SettingCreateOrder|Create order.|
|<a name="settingremovehold"></a>SettingRemoveHold|Remove hold.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[UrlParameter](urlparameter.md)  
