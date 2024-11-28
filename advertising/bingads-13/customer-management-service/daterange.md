---
title: DateRange Data Object - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a date range object.
---
# DateRange Data Object - Customer Management
Defines a date range object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DateRange" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="MinDate" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="MaxDate" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "MaxDate": "ValueHere",
  "MinDate": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DateRange](daterange.md) object has the following elements: [MaxDate](#maxdate), [MinDate](#mindate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxdate"></a>MaxDate|The maximum date.<br/><br/>The date format should be specified as *"yyyyMMdd"*. For example December 31, 2050 should be specified as *"20501231"*.|**string**|
|<a name="mindate"></a>MinDate|The minimum date.<br/><br/>The date format should be specified as *"yyyyMMdd"*. For example April 3, 2020 should be specified as *"20200403"*.|**string**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[SearchCustomers](searchcustomers.md)  
