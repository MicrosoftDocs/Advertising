---
title: MediaAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a value set for MediaAdditionalField.
---
# MediaAdditionalField Value Set - Campaign Management
Defines a value set for MediaAdditionalField.

## Syntax
```xml
<xs:simpleType name="MediaAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Text" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [MediaAdditionalField](mediaadditionalfield.md) value set has the following values: [Text](#text).

|Value|Description|
|-----------|---------------|
|<a name="text"></a>Text|The media text.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetMediaMetaDataByAccountId](getmediametadatabyaccountid.md)  
[GetMediaMetaDataByIds](getmediametadatabyids.md)  
