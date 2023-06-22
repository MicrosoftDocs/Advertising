---
title: AudienceGroup Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.
---
# AudienceGroup Data Object - Campaign Management
Reserved.

## Syntax
```xml
<xs:complexType name="AudienceGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssociationCount" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Dimensions" nillable="true" type="tns:ArrayOfAudienceGroupDimension" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AudienceGroup](audiencegroup.md) object has the following elements: [AssociationCount](#associationcount), [Description](#description), [Dimensions](#dimensions), [Id](#id), [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="associationcount"></a>AssociationCount|Reserved.|**int**|
|<a name="description"></a>Description|Reserved.|**string**|
|<a name="dimensions"></a>Dimensions|Reserved.|[AudienceGroupDimension](audiencegroupdimension.md) array|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="name"></a>Name|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAudienceGroups](addaudiencegroups.md)  
[GetAudienceGroupsByIds](getaudiencegroupsbyids.md)  
[UpdateAudienceGroups](updateaudiencegroups.md)  
