---
title: Company Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the profile data for a company.
---
# Company Data Object - Campaign Management
Defines the profile data for a company. 

## Syntax
```xml
<xs:complexType name="Company" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="LogoUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element name="ProfileId" type="xs:long" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Company](company.md) object has the following elements: [LogoUrl](#logourl), [Name](#name), [ProfileId](#profileid), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="logourl"></a>LogoUrl|The full https path for the company's logo image.|**string**|
|<a name="name"></a>Name|The company name.|**string**|
|<a name="profileid"></a>ProfileId|The company name profile identifier that you can use with [ProfileCriterion](profilecriterion.md#profileid).|**long**|
|<a name="status"></a>Status|The company name profile status.<br/><br/>Possible status values include Active and Inactive.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[SearchCompanies](searchcompanies.md)  
