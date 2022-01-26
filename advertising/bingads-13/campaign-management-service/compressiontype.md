---
title: CompressionType Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible compression types for the file to download.
---
# CompressionType Value Set - Campaign Management
Defines the possible compression types for the file to download.

> [!NOTE]
> Currently the only supported compression format for [GetGeoLocationsFileUrl](getgeolocationsfileurl.md) is GZip.

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
|<a name="gzip"></a>GZip|The file should be GZip compressed.|
|<a name="zip"></a>Zip|Currently the only supported compression format is GZip.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetGeoLocationsFileUrl](getgeolocationsfileurl.md)  
