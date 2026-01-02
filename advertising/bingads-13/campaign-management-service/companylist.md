---
title: CompanyList Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the CompanyList data object.
---
# CompanyList Data Object - Campaign Management
Defines the CompanyList data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CompanyList" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:LinkedInSegment">
      <xs:sequence>
        <xs:element minOccurs="0" name="CompanyNames" nillable="true" type="tns:ArrayOfCompanyName" />
        <xs:element minOccurs="0" name="Matched" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="Total" nillable="true" type="xs:int" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "Name": "ValueHere",
  "Reach": "LongValueHere",
  "Status": "ValueHere",
  "Type": "CompanyList",
  "CompanyNames": [
    {
      "Id": "LongValueHere",
      "Name": "ValueHere",
      "Status": "ValueHere"
    }
  ],
  "Matched": IntValueHere,
  "Total": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [CompanyList](companylist.md) object has the following elements: [CompanyNames](#companynames), [Matched](#matched), [Total](#total).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="companynames"></a>CompanyNames|Reserved.|[CompanyName](companyname.md) array|
|<a name="matched"></a>Matched|Reserved.|**int**|
|<a name="total"></a>Total|Reserved.|**int**|

The [CompanyList](companylist.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementslinkedinsegment"></a>Inherited Elements from LinkedInSegment
The [CompanyList](companylist.md) object derives from the [LinkedInSegment](linkedinsegment.md) object, and inherits the following elements: [Id](#id), [Name](#name), [Reach](#reach), [Status](#status), [Type](#type). The descriptions below are specific to [CompanyList](companylist.md), and might not apply to other objects that inherit the same elements from the [LinkedInSegment](linkedinsegment.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="name"></a>Name|Reserved.|**string**|
|<a name="reach"></a>Reach|Reserved.|**long**|
|<a name="status"></a>Status|Reserved.|[LinkedInSegmentStatus](linkedinsegmentstatus.md)|
|<a name="type"></a>Type|Reserved.|[ProfileType](profiletype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

