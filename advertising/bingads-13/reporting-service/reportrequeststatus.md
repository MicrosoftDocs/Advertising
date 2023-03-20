---
title: ReportRequestStatus Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the status of a report request.
---
# ReportRequestStatus Data Object - Reporting
Defines the status of a report request.

## Syntax
```xml
<xs:complexType name="ReportRequestStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ReportDownloadUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Status" type="tns:ReportRequestStatusType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ReportRequestStatus](reportrequeststatus.md) object has the following elements: [ReportDownloadUrl](#reportdownloadurl), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="reportdownloadurl"></a>ReportDownloadUrl|The encoded URL from where the report can be downloaded.<br/><br/>Once returned, the URL is valid for five minutes. You should not take a dependency on the domain of the download URL as it is subject to change.<br/><br/>The report that you download is compressed by using zip compression. You must first unzip the report before you can use its contents.<br/><br/>Use the download URL only if the *Status* element is set to *Success*. Even when the *Status* is set to *Success*, this element can be nil if no data is available for the submitted report parameters.|**string**|
|<a name="status"></a>Status|The status of a report request.|[ReportRequestStatusType](reportrequeststatustype.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[PollGenerateReport](pollgeneratereport.md)  
