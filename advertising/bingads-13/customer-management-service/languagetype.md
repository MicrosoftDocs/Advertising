---
title: LanguageType Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
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
    <xs:enumeration value="Thai" />
    <xs:enumeration value="Turkish" />
    <xs:enumeration value="Filipino" />
    <xs:enumeration value="Indonesian" />
    <xs:enumeration value="Polish" />
    <xs:enumeration value="Vietnamese" />
    <xs:enumeration value="Malay" />
    <xs:enumeration value="Ukrainian" />
    <xs:enumeration value="Czech" />
    <xs:enumeration value="Romanian" />
    <xs:enumeration value="Greek" />
    <xs:enumeration value="Hungarian" />
    <xs:enumeration value="Hindi" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [LanguageType](languagetype.md) value set has the following values: [Arabic](#arabic), [Czech](#czech), [Danish](#danish), [Dutch](#dutch), [English](#english), [Filipino](#filipino), [Finnish](#finnish), [French](#french), [German](#german), [Greek](#greek), [Hebrew](#hebrew), [Hindi](#hindi), [Hungarian](#hungarian), [Indonesian](#indonesian), [Italian](#italian), [Japanese](#japanese), [Korean](#korean), [Malay](#malay), [Norwegian](#norwegian), [Polish](#polish), [Portuguese](#portuguese), [Romanian](#romanian), [Russian](#russian), [SimplifiedChinese](#simplifiedchinese), [Spanish](#spanish), [Swedish](#swedish), [Thai](#thai), [TraditionalChinese](#traditionalchinese), [Turkish](#turkish), [Ukrainian](#ukrainian), [Vietnamese](#vietnamese).

|Value|Description|
|-----------|---------------|
|<a name="arabic"></a>Arabic|The corresponding language type.|
|<a name="czech"></a>Czech|Reserved.|
|<a name="danish"></a>Danish|The corresponding language type.|
|<a name="dutch"></a>Dutch|The corresponding language type.|
|<a name="english"></a>English|The corresponding language type.|
|<a name="filipino"></a>Filipino|The corresponding language type.|
|<a name="finnish"></a>Finnish|The corresponding language type.|
|<a name="french"></a>French|The corresponding language type.|
|<a name="german"></a>German|The corresponding language type.|
|<a name="greek"></a>Greek|Reserved.|
|<a name="hebrew"></a>Hebrew|The corresponding language type.|
|<a name="hindi"></a>Hindi|Reserved.|
|<a name="hungarian"></a>Hungarian|Reserved.|
|<a name="indonesian"></a>Indonesian|Reserved.|
|<a name="italian"></a>Italian|The corresponding language type.|
|<a name="japanese"></a>Japanese|The corresponding language type.|
|<a name="korean"></a>Korean|The corresponding language type.|
|<a name="malay"></a>Malay|Reserved.|
|<a name="norwegian"></a>Norwegian|The corresponding language type.|
|<a name="polish"></a>Polish|Reserved.|
|<a name="portuguese"></a>Portuguese|The corresponding language type.|
|<a name="romanian"></a>Romanian|Reserved.|
|<a name="russian"></a>Russian|The corresponding language type.|
|<a name="simplifiedchinese"></a>SimplifiedChinese|The corresponding language type.|
|<a name="spanish"></a>Spanish|The corresponding language type.|
|<a name="swedish"></a>Swedish|The corresponding language type.|
|<a name="thai"></a>Thai|The corresponding language type.|
|<a name="traditionalchinese"></a>TraditionalChinese|The corresponding language type.|
|<a name="turkish"></a>Turkish|The corresponding language type.|
|<a name="ukrainian"></a>Ukrainian|Reserved.|
|<a name="vietnamese"></a>Vietnamese|Reserved.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
[Customer](customer.md)  
