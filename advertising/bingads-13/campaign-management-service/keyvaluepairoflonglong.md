---
title: KeyValuePairOflonglong Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The key and value pair of long and long values defined by the Campaign Management service.
---
# KeyValuePairOflonglong Data Object - Campaign Management
The key and value pair of long and long values defined by the Campaign Management service.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="KeyValuePairOflonglong" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="KeyValuePairOf{0}{1}{#}" Namespace="http://schemas.datacontract.org/2004/07/System.Collections.Generic" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="long" Namespace="http://www.w3.org/2001/XMLSchema" />
        <GenericParameter Name="long" Namespace="http://www.w3.org/2001/XMLSchema" />
      </GenericType>
      <IsValueType xmlns="http://schemas.microsoft.com/2003/10/Serialization/">true</IsValueType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element name="key" type="xs:long" />
    <xs:element name="value" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "key": "LongValueHere",
  "value": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [KeyValuePairOflonglong](keyvaluepairoflonglong.md) object has the following elements: [key](#key), [value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="key"></a>key|The key to the value.|**long**|
|<a name="value"></a>value|The value mapped to the key.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: http\://schemas.datacontract.org/2004/07/System.Collections.Generic  

## Used By
[GetImportEntityIdsMapping](getimportentityidsmapping.md)  
