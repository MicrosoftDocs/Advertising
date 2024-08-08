---
title: PriceQualifier Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines price qualifiers for price ad extensions.(test)
---
# PriceQualifier Value Set Test - Campaign Management
Defines price qualifiers for price ad extensions.

## Syntax
```xml
<xs:simpleType name="PriceQualifier" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="From" />
    <xs:enumeration value="UpTo" />
    <xs:enumeration value="None" />
    <xs:enumeration value="Average" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PriceQualifier](pricequalifier.md) value set has the following values: [Average](#average), [From](#from), [None](#none), [Unknown](#unknown), [UpTo](#upto).

|Value|Description|
|-----------|---------------|
|<a name="average"></a>Average|The price of the [PriceAdExtension](priceadextension.md) is prefixed with price qualifier text *Average*, for example *Average $9.99*.|
|<a name="from"></a>From|The price of the [PriceAdExtension](priceadextension.md) is prefixed with price qualifier text *From*, for example *From $9.99*.|
|<a name="none"></a>None|The price of the [PriceAdExtension](priceadextension.md) is not prefixed with price qualifier text.|
|<a name="unknown"></a>Unknown|Reserved for forward compatibility.|
|<a name="upto"></a>UpTo|The price of the [PriceAdExtension](priceadextension.md) is prefixed with the price qualifier text *Up to*, for example *Up to $9.99*.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[PriceTableRow](pricetablerow.md)  
