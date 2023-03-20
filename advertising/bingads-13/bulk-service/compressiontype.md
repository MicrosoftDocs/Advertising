---
title: CompressionType Value Set - Bulk
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible compression types for the file to download.
---
# CompressionType Value Set - Bulk
Defines the possible compression types for the file to download.

## Syntax
```xml
<xs:simpleType name="CompressionType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Zip" />
    <xs:enumeration value="GZip" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CompressionType](compressiontype.md) value set has the following values: [GZip](#gzip), [Zip](#zip).

|Value|Description|
|-----------|---------------|
|<a name="gzip"></a>GZip|The file should be GZIP compressed.|
|<a name="zip"></a>Zip|The file should be ZIP compressed.|

## Requirements
Service: [BulkService.svc v13](https://bulk.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/BulkService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md)  
[DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md)  
