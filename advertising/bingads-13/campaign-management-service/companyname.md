---
title: CompanyName Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the CompanyName data object.
---
# CompanyName Data Object - Campaign Management
Defines the CompanyName data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CompanyName" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:CompanyNameStatus" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "Name": "ValueHere",
  "Status": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CompanyName](companyname.md) object has the following elements: [Id](#id), [Name](#name), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The company name ID.|**long**|
|<a name="name"></a>Name|The company name.|**string**|
|<a name="status"></a>Status|The company name status.|[CompanyNameStatus](companynamestatus.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CompanyList](companylist.md)  
