---
title: LinkedInSegment Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the LinkedInSegment data object.
---
# LinkedInSegment Data Object - Campaign Management
Defines the LinkedInSegment data object.

## Syntax
```xml
<xs:complexType name="LinkedInSegment" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Reach" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:LinkedInSegmentStatus" />
    <xs:element minOccurs="0" name="Type" type="tns:ProfileType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [LinkedInSegment](linkedinsegment.md) object has the following elements: [Id](#id), [Name](#name), [Reach](#reach), [Status](#status), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The LinkedIn segment ID.|**long**|
|<a name="name"></a>Name|The name of the LinkedIn segment.|**string**|
|<a name="reach"></a>Reach|The reach of the LinkedIn segment.|**long**|
|<a name="status"></a>Status|The status of hte LinkedIn segment.|[LinkedInSegmentStatus](linkedinsegmentstatus.md)|
|<a name="type"></a>Type|The type of the LinkedIn segment.|[ProfileType](profiletype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddLinkedInSegments](addlinkedinsegments.md)  
[UpdateLinkedInSegments](updatelinkedinsegments.md)  
