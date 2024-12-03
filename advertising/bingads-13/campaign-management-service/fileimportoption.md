---
title: FileImportOption Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: FileImportOption is reserved for future use.
---
# FileImportOption Data Object - Campaign Management
FileImportOption is reserved for future use.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="FileImportOption" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ImportOption">
      <xs:sequence />
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Type": "FileImportOption"
}
```

-----

## <a name="elements"></a>Elements

The [FileImportOption](fileimportoption.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsimportoption"></a>Inherited Elements from ImportOption
The [FileImportOption](fileimportoption.md) object derives from the [ImportOption](importoption.md) object, and inherits the following elements: [ForwardCompatibilityMap](#forwardcompatibilitymap), [Type](#type). The descriptions below are specific to [FileImportOption](fileimportoption.md), and might not apply to other objects that inherit the same elements from the [ImportOption](importoption.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="type"></a>Type|The type of the import option.<br/><br/>This value is *FileImportOption* when you retrieve a File import option.<br/><br/>For more information about import option types, see the [ImportOption Data Object Remarks](importoption.md#remarks).|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

