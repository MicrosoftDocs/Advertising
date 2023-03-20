---
title: Industry Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible industry segments in which a customer operates.
---
# Industry Value Set - Customer Management
Defines the possible industry segments in which a customer operates.

## Syntax
```xml
<xs:simpleType name="Industry" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="NA" />
    <xs:enumeration value="AgencySalesHouse" />
    <xs:enumeration value="Automotive" />
    <xs:enumeration value="ConsumerPackagedGoods" />
    <xs:enumeration value="Education" />
    <xs:enumeration value="Entertainment" />
    <xs:enumeration value="FinancialServices" />
    <xs:enumeration value="FoodServices" />
    <xs:enumeration value="Gaming" />
    <xs:enumeration value="GovernmentNonprofitPolitical" />
    <xs:enumeration value="Healthcare" />
    <xs:enumeration value="Internal" />
    <xs:enumeration value="PublishingAndWebMedia" />
    <xs:enumeration value="RealEstate" />
    <xs:enumeration value="Retail" />
    <xs:enumeration value="Services" />
    <xs:enumeration value="Technology" />
    <xs:enumeration value="Telecommunications" />
    <xs:enumeration value="TravelHospitality" />
    <xs:enumeration value="Other" />
    <xs:enumeration value="Pharmaceuticals" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [Industry](industry.md) value set has the following values: [AgencySalesHouse](#agencysaleshouse), [Automotive](#automotive), [ConsumerPackagedGoods](#consumerpackagedgoods), [Education](#education), [Entertainment](#entertainment), [FinancialServices](#financialservices), [FoodServices](#foodservices), [Gaming](#gaming), [GovernmentNonprofitPolitical](#governmentnonprofitpolitical), [Healthcare](#healthcare), [Internal](#internal), [NA](#na), [Other](#other), [Pharmaceuticals](#pharmaceuticals), [PublishingAndWebMedia](#publishingandwebmedia), [RealEstate](#realestate), [Retail](#retail), [Services](#services), [Technology](#technology), [Telecommunications](#telecommunications), [TravelHospitality](#travelhospitality).

|Value|Description|
|-----------|---------------|
|<a name="agencysaleshouse"></a>AgencySalesHouse|The advertising agency sales house industry.|
|<a name="automotive"></a>Automotive|The automotive industry.|
|<a name="consumerpackagedgoods"></a>ConsumerPackagedGoods|The consumer packaged goods industry.|
|<a name="education"></a>Education|The education industry.|
|<a name="entertainment"></a>Entertainment|The entertainment industry.|
|<a name="financialservices"></a>FinancialServices|The financial services industry.|
|<a name="foodservices"></a>FoodServices|The food services industry.|
|<a name="gaming"></a>Gaming|The gaming industry.|
|<a name="governmentnonprofitpolitical"></a>GovernmentNonprofitPolitical|The government, non-profit, or political industry.|
|<a name="healthcare"></a>Healthcare|The healthcare industry.|
|<a name="internal"></a>Internal|This value is reserved for internal use.|
|<a name="na"></a>NA|Not applicable.|
|<a name="other"></a>Other|An industry that is not listed.|
|<a name="pharmaceuticals"></a>Pharmaceuticals|The pharmaceuticals industry.|
|<a name="publishingandwebmedia"></a>PublishingAndWebMedia|The publishing and web media industry.|
|<a name="realestate"></a>RealEstate|The real estate industry.|
|<a name="retail"></a>Retail|The retail industry.|
|<a name="services"></a>Services|The services industry.|
|<a name="technology"></a>Technology|The technology industry.|
|<a name="telecommunications"></a>Telecommunications|The telecommunications industry.|
|<a name="travelhospitality"></a>TravelHospitality|The travel and hospitality industry.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[Customer](customer.md)  
