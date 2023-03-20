---
title: LanguageType Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a selection of language values.
---
# LanguageType Value Set - Customer Management
Defines a selection of language values.

> [!NOTE]
> The value set defines a broad selection of languages; however, not all languages are supported. For a list of supported languages, see [Ad Languages](../guides/ad-languages.md).

## Syntax
```xml
<xs:simpleType name="LanguageType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Danish" />
    <xs:enumeration value="Dutch" />
    <xs:enumeration value="English" />
    <xs:enumeration value="Finnish" />
    <xs:enumeration value="French" />
    <xs:enumeration value="German" />
    <xs:enumeration value="Italian" />
    <xs:enumeration value="Japanese" />
    <xs:enumeration value="Norwegian" />
    <xs:enumeration value="Portuguese" />
    <xs:enumeration value="Swedish" />
    <xs:enumeration value="Spanish" />
    <xs:enumeration value="Arabic" />
    <xs:enumeration value="Hebrew" />
    <xs:enumeration value="Korean" />
    <xs:enumeration value="Russian" />
    <xs:enumeration value="TraditionalChinese" />
    <xs:enumeration value="SimplifiedChinese" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [LanguageType](languagetype.md) value set has the following values: [Arabic](#arabic), [Danish](#danish), [Dutch](#dutch), [English](#english), [Finnish](#finnish), [French](#french), [German](#german), [Hebrew](#hebrew), [Italian](#italian), [Japanese](#japanese), [Korean](#korean), [Norwegian](#norwegian), [Portuguese](#portuguese), [Russian](#russian), [SimplifiedChinese](#simplifiedchinese), [Spanish](#spanish), [Swedish](#swedish), [TraditionalChinese](#traditionalchinese).

|Value|Description|
|-----------|---------------|
|<a name="arabic"></a>Arabic|The corresponding language type.|
|<a name="danish"></a>Danish|The corresponding language type.|
|<a name="dutch"></a>Dutch|The corresponding language type.|
|<a name="english"></a>English|The corresponding language type.|
|<a name="finnish"></a>Finnish|The corresponding language type.|
|<a name="french"></a>French|The corresponding language type.|
|<a name="german"></a>German|The corresponding language type.|
|<a name="hebrew"></a>Hebrew|The corresponding language type.|
|<a name="italian"></a>Italian|The corresponding language type.|
|<a name="japanese"></a>Japanese|The corresponding language type.|
|<a name="korean"></a>Korean|The corresponding language type.|
|<a name="norwegian"></a>Norwegian|The corresponding language type.|
|<a name="portuguese"></a>Portuguese|The corresponding language type.|
|<a name="russian"></a>Russian|The corresponding language type.|
|<a name="simplifiedchinese"></a>SimplifiedChinese|The corresponding language type.|
|<a name="spanish"></a>Spanish|The corresponding language type.|
|<a name="swedish"></a>Swedish|The corresponding language type.|
|<a name="traditionalchinese"></a>TraditionalChinese|The corresponding language type.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
[Customer](customer.md)  
