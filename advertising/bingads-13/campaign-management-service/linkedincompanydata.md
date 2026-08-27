---
title: LinkedInCompanyData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The LinkedIn company data object.
---
# LinkedInCompanyData Data Object - Campaign Management
The LinkedIn company data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="LinkedInCompanyData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CompanyId" type="xs:long" />
    <xs:element minOccurs="0" name="CompanyLogo" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CompanyName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CompanySize" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CompanySizeCategory" type="tns:CompanySizeCategory" />
    <xs:element minOccurs="0" name="CompanyUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Industry" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CompanyId": "LongValueHere",
  "CompanyLogo": "ValueHere",
  "CompanyName": "ValueHere",
  "CompanySize": "ValueHere",
  "CompanySizeCategory": "ValueHere",
  "CompanyUrl": "ValueHere",
  "Industry": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [LinkedInCompanyData](linkedincompanydata.md) object has the following elements: [CompanyId](#companyid), [CompanyLogo](#companylogo), [CompanyName](#companyname), [CompanySize](#companysize), [CompanySizeCategory](#companysizecategory), [CompanyUrl](#companyurl), [Industry](#industry).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="companyid"></a>CompanyId|The company ID.|**long**|
|<a name="companylogo"></a>CompanyLogo|The company logo.|**string**|
|<a name="companyname"></a>CompanyName|The company name.|**string**|
|<a name="companysize"></a>CompanySize|The company size.|**string**|
|<a name="companysizecategory"></a>CompanySizeCategory|The company size category|[CompanySizeCategory](companysizecategory.md)|
|<a name="companyurl"></a>CompanyUrl|The company URL.|**string**|
|<a name="industry"></a>Industry|The company industry.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CompanyName](companyname.md)  
