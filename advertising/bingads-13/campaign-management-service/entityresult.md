---
title: EntityResult Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the EntityResult data object.
---
# EntityResult Data Object - Campaign Management
Defines the EntityResult data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="EntityResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Categories" nillable="true" type="tns:ArrayOfCategoryResult" />
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="SubType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Categories": [
    {
      "AuditPoints": [
        {
          "Description": "ValueHere",
          "Details": "ValueHere",
          "Key": "ValueHere",
          "Severity": "ValueHere"
        }
      ],
      "Key": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "SubType": "ValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [EntityResult](entityresult.md) object has the following elements: [Categories](#categories), [Id](#id), [SubType](#subtype), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="categories"></a>Categories|The entity categories.|[CategoryResult](categoryresult.md) array|
|<a name="id"></a>Id|The entity ID.|**long**|
|<a name="subtype"></a>SubType|The entity sub type.|**string**|
|<a name="type"></a>Type|The entity type.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetDiagnostics](getdiagnostics.md)  
