---
title: KeyValuePairOfstringstring Data Object - Bulk
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The key and value pair of string and string values defined by the Bulk service.
---
# KeyValuePairOfstringstring Data Object - Bulk
The key and value pair of string and string values defined by the Bulk service.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="KeyValuePairOfstringstring" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="KeyValuePairOf{0}{1}{#}" Namespace="http://schemas.datacontract.org/2004/07/System.Collections.Generic" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="string" Namespace="http://www.w3.org/2001/XMLSchema" />
        <GenericParameter Name="string" Namespace="http://www.w3.org/2001/XMLSchema" />
      </GenericType>
      <IsValueType xmlns="http://schemas.microsoft.com/2003/10/Serialization/">true</IsValueType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element name="key" nillable="true" type="xs:string" />
    <xs:element name="value" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "key": "ValueHere",
  "value": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [KeyValuePairOfstringstring](keyvaluepairofstringstring.md) object has the following elements: [key](#key), [value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="key"></a>key|The name of the setting.|**string**|
|<a name="value"></a>value|The value of the setting.|**string**|

## Requirements
Service: [BulkService.svc v13](https://bulk.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/BulkService.svc)  
Namespace: http\://schemas.datacontract.org/2004/07/System.Collections.Generic  

## Used By
[BatchError](batcherror.md)  
[GetBulkDownloadStatus](getbulkdownloadstatus.md)  
[GetBulkUploadStatus](getbulkuploadstatus.md)  
