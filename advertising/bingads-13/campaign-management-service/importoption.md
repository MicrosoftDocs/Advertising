---
title: ImportOption Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the base object of an import option.
---
# ImportOption Data Object - Campaign Management
Defines the base object of an import option.

[!INCLUDE[exta-to-rsa-migration](../../scripts/includes/exta-rsa-migration-import.md)]

Do not try to instantiate an *ImportOption*. You can create one or more of the following objects that derive from it. 
- [FileImportOption](fileimportoption.md)  
- [GoogleImportOption](googleimportoption.md)  

## Syntax
```xml
<xs:complexType name="ImportOption" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q143="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q143:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ImportOption](importoption.md) object has the following elements: [ForwardCompatibilityMap](#forwardcompatibilitymap), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="type"></a>Type|The type of import option.<br/><br/>For more information, see [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
If you generate the SOAP manually, use the *type* attribute of the `<ImportOption>` node as shown in the following example to specify the type of import option.

```xml
<ImportOption i:type="GoogleImportOption" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
      . . .
</ImportOption>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ImportJob](importjob.md)  
