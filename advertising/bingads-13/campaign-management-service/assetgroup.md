---
title: AssetGroup Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an asset group in an advertising campaign.
---
# AssetGroup Data Object - Campaign Management
Defines an asset group in an advertising campaign.

## Syntax
```xml
<xs:complexType name="AssetGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="BusinessName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CallToAction" nillable="true" type="tns:CallToAction" />
    <xs:element minOccurs="0" name="Descriptions" nillable="true" type="tns:ArrayOfAssetLink" />
    <xs:element minOccurs="0" name="EditorialStatus" nillable="true" type="tns:AssetGroupEditorialStatus" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="tns:Date" />
    <xs:element xmlns:q112="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FinalMobileUrls" nillable="true" type="q112:ArrayOfstring" />
    <xs:element xmlns:q113="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FinalUrls" nillable="true" type="q113:ArrayOfstring" />
    <xs:element xmlns:q114="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q114:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="Headlines" nillable="true" type="tns:ArrayOfAssetLink" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Images" nillable="true" type="tns:ArrayOfAssetLink" />
    <xs:element minOccurs="0" name="LongHeadlines" nillable="true" type="tns:ArrayOfAssetLink" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Path1" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Path2" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="tns:Date" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:AssetGroupStatus" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AssetGroup](assetgroup.md) object has the following elements: [BusinessName](#businessname), [CallToAction](#calltoaction), [Descriptions](#descriptions), [EditorialStatus](#editorialstatus), [EndDate](#enddate), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Headlines](#headlines), [Id](#id), [Images](#images), [LongHeadlines](#longheadlines), [Name](#name), [Path1](#path1), [Path2](#path2), [StartDate](#startdate), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="businessname"></a>BusinessName|The name of the business.<br/><br/>Your business's name may appear in your ad, depending on the ad placement.<br/><br/>The length of the string is limited to 25 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="calltoaction"></a>CallToAction|A brief, punchy reason for customers to click your ad right now.<br/><br/>This is displayed on your call to action button.<br/><br/>**Add:** Not applicable for audience ads; Required for multimedia ads<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[CallToAction](calltoaction.md)|
|<a name="descriptions"></a>Descriptions|Reserved.|[AssetLink](assetlink.md) array|
|<a name="editorialstatus"></a>EditorialStatus|Reserved.|[AssetGroupEditorialStatus](assetgroupeditorialstatus.md)|
|<a name="enddate"></a>EndDate|Reserved.|[Date](date.md)|
|<a name="finalmobileurls"></a>FinalMobileUrls|Reserved.|**string** array|
|<a name="finalurls"></a>FinalUrls|Reserved.|**string** array|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|Reserved.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="headlines"></a>Headlines|Reserved.|[AssetLink](assetlink.md) array|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="images"></a>Images|Reserved.|[AssetLink](assetlink.md) array|
|<a name="longheadlines"></a>LongHeadlines|Reserved.|[AssetLink](assetlink.md) array|
|<a name="name"></a>Name|Reserved.|**string**|
|<a name="path1"></a>Path1|Reserved.|**string**|
|<a name="path2"></a>Path2|Reserved.|**string**|
|<a name="startdate"></a>StartDate|Reserved.|[Date](date.md)|
|<a name="status"></a>Status|Reserved.|[AssetGroupStatus](assetgroupstatus.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAssetGroups](addassetgroups.md)  
[GetAssetGroupsByCampaignId](getassetgroupsbycampaignid.md)  
[GetAssetGroupsByIds](getassetgroupsbyids.md)  
[UpdateAssetGroups](updateassetgroups.md)  
