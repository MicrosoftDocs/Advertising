---
title: DeviceOSReportFilter Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the device operating system values that you can use to filter the report data.
---
# DeviceOSReportFilter Value Set - Reporting
Defines the device operating system values that you can use to filter the report data.

## Syntax
```xml
<xs:simpleType name="DeviceOSReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Other" />
        <xs:enumeration value="Windows" />
        <xs:enumeration value="iOS" />
        <xs:enumeration value="Android" />
        <xs:enumeration value="BlackBerry" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [DeviceOSReportFilter](deviceosreportfilter.md) value set has the following values: [Android](#android), [BlackBerry](#blackberry), [iOS](#ios), [Other](#other), [Windows](#windows).

|Value|Description|
|-----------|---------------|
|<a name="android"></a>Android|The report will include ads displayed on Android device operating systems.|
|<a name="blackberry"></a>BlackBerry|The report will include ads displayed on BlackBerry device operating systems.|
|<a name="ios"></a>iOS|The report will include ads displayed on iOS device operating systems.|
|<a name="other"></a>Other|The report will include ads displayed on a device operating system other than Android, BlackBerry, iOS, and Windows.|
|<a name="windows"></a>Windows|The report will include ads displayed on Windows device operating systems.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AccountPerformanceReportFilter](accountperformancereportfilter.md)  
[AdExtensionByAdReportFilter](adextensionbyadreportfilter.md)  
[AdExtensionByKeywordReportFilter](adextensionbykeywordreportfilter.md)  
[AdExtensionDetailReportFilter](adextensiondetailreportfilter.md)  
[AdGroupPerformanceReportFilter](adgroupperformancereportfilter.md)  
[CampaignPerformanceReportFilter](campaignperformancereportfilter.md)  
[GoalsAndFunnelsReportFilter](goalsandfunnelsreportfilter.md)  
