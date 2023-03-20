---
title: ReportRequestStatusType Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the status of a report.
---
# ReportRequestStatusType Value Set - Reporting
Defines the status of a report.

## Syntax
```xml
<xs:simpleType name="ReportRequestStatusType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Error" />
    <xs:enumeration value="Success" />
    <xs:enumeration value="Pending" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ReportRequestStatusType](reportrequeststatustype.md) value set has the following values: [Error](#error), [Pending](#pending), [Success](#success).

|Value|Description|
|-----------|---------------|
|<a name="error"></a>Error|An error occurred while generating the report. You will need to submit your report request again. If the request continues to fail, consider getting the tracking identifier from the response message and contacting support.|
|<a name="pending"></a>Pending|The report is not yet complete.|
|<a name="success"></a>Success|The report was successfully completed.<br/><br/>The report can be downloaded from the URL contained in the *ReportDownloadUrl* element of the [ReportRequestStatus](reportrequeststatus.md) object.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ReportRequestStatus](reportrequeststatus.md)  
