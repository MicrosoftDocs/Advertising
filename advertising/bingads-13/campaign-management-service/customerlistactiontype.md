---
title: CustomerListActionType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.
---
# CustomerListActionType Value Set - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="CustomerListActionType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="None" />
    <xs:enumeration value="Add" />
    <xs:enumeration value="Remove" />
    <xs:enumeration value="Replace" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CustomerListActionType](customerlistactiontype.md) value set has the following values: [Add](#add), [None](#none), [Remove](#remove), [Replace](#replace).

|Value|Description|
|-----------|---------------|
|<a name="add"></a>Add|Reserved.|
|<a name="none"></a>None|Reserved.|
|<a name="remove"></a>Remove|Reserved.|
|<a name="replace"></a>Replace|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomerList](customerlist.md)  
