---
title: ResponseMode Value Set - Bulk
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines elements to specify whether the bulk service should return upload errors with their corresponding data.
ms.subservice: bulk-api
---
# ResponseMode Value Set - Bulk
Defines elements to specify whether the bulk service should return upload errors with their corresponding data.

## Syntax
```xml
<xs:simpleType name="ResponseMode" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="ErrorsOnly" />
    <xs:enumeration value="ErrorsAndResults" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ResponseMode](responsemode.md) value set has the following values: [ErrorsAndResults](#errorsandresults), [ErrorsOnly](#errorsonly).

|Value|Description|
|-----------|---------------|
|<a name="errorsandresults"></a>ErrorsAndResults|Return errors and results in the bulk upload response file.|
|<a name="errorsonly"></a>ErrorsOnly|Return errors only in the bulk upload response file.|

## Requirements
Service: [BulkService.svc v13](https://bulk.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/BulkService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetBulkUploadUrl](getbulkuploadurl.md)  
