---
title: AssetGroupSearchTheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an AssetGroupSearchTheme data object.
---
# AssetGroupSearchTheme Data Object - Campaign Management
Defines an AssetGroupSearchTheme data object.

## Syntax
```xml
<xs:complexType name="AssetGroupSearchTheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="AssetGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="CampaignId" type="xs:long" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="SearchTheme" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AssetGroupSearchTheme](assetgroupsearchtheme.md) object has the following elements: [AccountId](#accountid), [AssetGroupId](#assetgroupid), [CampaignId](#campaignid), [Id](#id), [SearchTheme](#searchtheme).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|Reserved.|**long**|
|<a name="assetgroupid"></a>AssetGroupId|Reserved.|**long**|
|<a name="campaignid"></a>CampaignId|Reserved.|**long**|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="searchtheme"></a>SearchTheme|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroup](assetgroup.md)  
