---
title: AssetGroupSearchTheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an AssetGroupSearchTheme data object.
---
# AssetGroupSearchTheme Data Object - Campaign Management
Defines an AssetGroupSearchTheme data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AssetGroupSearchTheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="SearchTheme" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "SearchTheme": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AssetGroupSearchTheme](assetgroupsearchtheme.md) object has the following elements: [Id](#id), [SearchTheme](#searchtheme).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The identifier of the search theme.|**long**|
|<a name="searchtheme"></a>SearchTheme|The type of search theme.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroup](assetgroup.md)  
