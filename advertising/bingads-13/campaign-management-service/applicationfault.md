---
title: ApplicationFault Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the base object from which all Campaign Management fault detail objects derive.
ms.subservice: campaign-management-api
---
# ApplicationFault Data Object - Campaign Management
Defines the base object from which all Campaign Management fault detail objects derive.

## Syntax
```xml
<xs:complexType name="ApplicationFault" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="TrackingId" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ApplicationFault](applicationfault.md) object has the following elements: [TrackingId](#trackingid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="trackingid"></a>TrackingId|The identifier of the log entry that contains the details of the API call.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://adapi.microsoft.com  

