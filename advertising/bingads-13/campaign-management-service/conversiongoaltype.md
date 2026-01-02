---
title: ConversionGoalType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the current possible types of conversion goals.
---
# ConversionGoalType Value Set - Campaign Management
Defines the current possible types of conversion goals. 

## Syntax
```xml
<xs:simpleType name="ConversionGoalType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Url" />
        <xs:enumeration value="Duration" />
        <xs:enumeration value="PagesViewedPerVisit" />
        <xs:enumeration value="Event" />
        <xs:enumeration value="AppInstall" />
        <xs:enumeration value="OfflineConversion" />
        <xs:enumeration value="InStoreTransaction" />
        <xs:enumeration value="AppDownload" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ConversionGoalType](conversiongoaltype.md) value set has the following values: [AppDownload](#appdownload), [AppInstall](#appinstall), [Duration](#duration), [Event](#event), [InStoreTransaction](#instoretransaction), [OfflineConversion](#offlineconversion), [PagesViewedPerVisit](#pagesviewedpervisit), [Url](#url).

|Value|Description|
|-----------|---------------|
|<a name="appdownload"></a>AppDownload|Refers to an [AppDownloadGoal](appdownloadgoal.md).|
|<a name="appinstall"></a>AppInstall|Refers to an [AppInstallGoal](appinstallgoal.md)|
|<a name="duration"></a>Duration|Refers to a [DurationGoal](durationgoal.md)|
|<a name="event"></a>Event|Refers to an [EventGoal](eventgoal.md)|
|<a name="instoretransaction"></a>InStoreTransaction|Refers to an [InStoreTransactionGoal](instoretransactiongoal.md)|
|<a name="offlineconversion"></a>OfflineConversion|Refers to an [OfflineConversionGoal](offlineconversiongoal.md)|
|<a name="pagesviewedpervisit"></a>PagesViewedPerVisit|Refers to a [PagesViewedPerVisitGoal](pagesviewedpervisitgoal.md)|
|<a name="url"></a>Url|Refers to a [UrlGoal](urlgoal.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionGoal](conversiongoal.md)  
[GetConversionGoalsByIds](getconversiongoalsbyids.md)  
[GetConversionGoalsByTagIds](getconversiongoalsbytagids.md)  
