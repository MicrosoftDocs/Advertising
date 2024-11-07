---
title: CustomerListActionType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a CustomerListActionType value set.
---
# CustomerListActionType Value Set - Campaign Management
Defines a CustomerListActionType value set.

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
|<a name="add"></a>Add|The requested action is to add the customer list item.|
|<a name="none"></a>None|The requested action is to take no action for the customer list item.|
|<a name="remove"></a>Remove|The requested action is to remove the customer list item.|
|<a name="replace"></a>Replace|The requested action is to replace the customer list item.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomerListUserData](customerlistuserdata.md)  
