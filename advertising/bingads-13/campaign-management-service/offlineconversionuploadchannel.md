---
title: OfflineConversionUploadChannel Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The source of offline conversion data. You can combine multiple values.
---
# OfflineConversionUploadChannel Value Set - Campaign Management
The source of offline conversion data. You can combine multiple values.

## Syntax
```xml
<xs:simpleType name="OfflineConversionUploadChannel" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Unknown">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">0</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="CampaignManagementAPI">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="BulkAPI">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="WebUpload">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [OfflineConversionUploadChannel](offlineconversionuploadchannel.md) value set has the following values: [BulkAPI](#bulkapi), [CampaignManagementAPI](#campaignmanagementapi), [Unknown](#unknown), [WebUpload](#webupload).

|Value|Description|
|-----------|---------------|
|<a name="bulkapi"></a>BulkAPI|The conversion goal was uploaded via the Bulk service.|
|<a name="campaignmanagementapi"></a>CampaignManagementAPI|The conversion goal was uploaded via standard API services.|
|<a name="unknown"></a>Unknown|The upload channel isn't specified.|
|<a name="webupload"></a>WebUpload|The conversion goal was manually uploaded through the Microsoft Advertising web interface.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetOfflineConversionReportByGoalIds](getofflineconversionreportbygoalids.md)  
