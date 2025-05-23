---
title: AnnotationOptOut Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Represents the annotation opt-out configuration for an account.
---
# AnnotationOptOut Data Object - Campaign Management
Represents the annotation opt-out configuration for an account.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AnnotationOptOut" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="AnnotationGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="CustomerId" type="xs:long" />
    <xs:element minOccurs="0" name="IsOptOut" type="xs:boolean" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountId": "LongValueHere",
  "AnnotationGroupId": "LongValueHere",
  "CustomerId": "LongValueHere",
  "IsOptOut": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AnnotationOptOut](annotationoptout.md) object has the following elements: [AccountId](#accountid), [AnnotationGroupId](#annotationgroupid), [CustomerId](#customerid), [IsOptOut](#isoptout).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The account ID.|**long**|
|<a name="annotationgroupid"></a>AnnotationGroupId|The annotation group ID.|**long**|
|<a name="customerid"></a>CustomerId|The customer ID.|**long**|
|<a name="isoptout"></a>IsOptOut|Whether or not the entity is opted out.|**boolean**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAnnotationOptOut](getannotationoptout.md)  
[UpdateAnnotationOptOut](updateannotationoptout.md)  
