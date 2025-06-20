---
title: DiagnosticCategoryData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the diagnostic category data data object.
---
# DiagnosticCategoryData Data Object - Campaign Management
Defines the diagnostic category data data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DiagnosticCategoryData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ActionLinks" nillable="true" type="tns:ArrayOfHealthCheckActionLinkMetadata" />
    <xs:element minOccurs="0" name="CategoryDisplayName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CategoryKey" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CategorySeverity" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CategoryStatus" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ActionLinks": [
    {
      "LinkName": "ValueHere",
      "LinkTemplate": "ValueHere",
      "LinkType": "ValueHere"
    }
  ],
  "CategoryDisplayName": "ValueHere",
  "CategoryKey": "ValueHere",
  "CategorySeverity": "ValueHere",
  "CategoryStatus": "ValueHere",
  "Description": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DiagnosticCategoryData](diagnosticcategorydata.md) object has the following elements: [ActionLinks](#actionlinks), [CategoryDisplayName](#categorydisplayname), [CategoryKey](#categorykey), [CategorySeverity](#categoryseverity), [CategoryStatus](#categorystatus), [Description](#description).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="actionlinks"></a>ActionLinks|Reserved.|[HealthCheckActionLinkMetadata](healthcheckactionlinkmetadata.md) array|
|<a name="categorydisplayname"></a>CategoryDisplayName|Reserved.|**string**|
|<a name="categorykey"></a>CategoryKey|Reserved.|**string**|
|<a name="categoryseverity"></a>CategorySeverity|Reserved.|**string**|
|<a name="categorystatus"></a>CategoryStatus|Reserved.|**string**|
|<a name="description"></a>Description|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetDiagnostics](getdiagnostics.md)  
