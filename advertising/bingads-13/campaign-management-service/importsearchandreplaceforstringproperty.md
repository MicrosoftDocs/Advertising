---
title: ImportSearchAndReplaceForStringProperty Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the string search and replace Google import option.
---
# ImportSearchAndReplaceForStringProperty Data Object - Campaign Management
Defines the string search and replace Google import option. 

## Syntax
```xml
<xs:complexType name="ImportSearchAndReplaceForStringProperty" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ReplaceString" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="SearchString" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ImportSearchAndReplaceForStringProperty](importsearchandreplaceforstringproperty.md) object has the following elements: [ReplaceString](#replacestring), [SearchString](#searchstring).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="replacestring"></a>ReplaceString|The replacement string to use in place of the search string.|**string**|
|<a name="searchstring"></a>SearchString|The string to find.<br/><br/>The case-insensitive search string does not support regular expressions.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GoogleImportOption](googleimportoption.md)  
