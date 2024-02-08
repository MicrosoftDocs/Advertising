---
title: CustomerListItemSubType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a CustomerListItemSubType value set.
---
# CustomerListItemSubType Value Set - Campaign Management
Defines a CustomerListItemSubType value set.

## Syntax
```xml
<xs:simpleType name="CustomerListItemSubType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Email" />
    <xs:enumeration value="CRM" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CustomerListItemSubType](customerlistitemsubtype.md) value set has the following values: [CRM](#crm), [Email](#email).

|Value|Description|
|-----------|---------------|
|<a name="crm"></a>CRM|The user data type is CRM.|
|<a name="email"></a>Email|The user data type is email.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomerListUserData](customerlistuserdata.md)  
