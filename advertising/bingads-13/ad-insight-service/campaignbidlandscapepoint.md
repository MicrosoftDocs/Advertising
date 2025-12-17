---
title: CampaignBidLandscapePoint Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for the total estimated performance from *StartDate* to *EndDate* by the bid or target.
---
# CampaignBidLandscapePoint Data Object - Ad Insight
Defines a data object for the total estimated performance from *StartDate* to *EndDate* by the bid or target.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignBidLandscapePoint" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Bid" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="TargetCpa" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="TargetRoas" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="Clicks" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="Impressions" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="TopImpressions" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CurrencyCode" type="tns:CurrencyCode" />
    <xs:element minOccurs="0" name="Cost" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="Conversions" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="ConversionValues" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="MarginalCPC" nillable="true" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Bid": DoubleValueHere,
  "Clicks": DoubleValueHere,
  "Conversions": DoubleValueHere,
  "ConversionValues": DoubleValueHere,
  "Cost": DoubleValueHere,
  "CurrencyCode": "ValueHere",
  "Impressions": "LongValueHere",
  "MarginalCPC": DoubleValueHere,
  "TargetCpa": DoubleValueHere,
  "TargetRoas": DoubleValueHere,
  "TopImpressions": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CampaignBidLandscapePoint](campaignbidlandscapepoint.md) object has the following elements: [Bid](#bid), [Clicks](#clicks), [Conversions](#conversions), [ConversionValues](#conversionvalues), [Cost](#cost), [CurrencyCode](#currencycode), [Impressions](#impressions), [MarginalCPC](#marginalcpc), [TargetCpa](#targetcpa), [TargetRoas](#targetroas), [TopImpressions](#topimpressions).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="bid"></a>Bid|The suggested bid value.|**double**|
|<a name="clicks"></a>Clicks|The estimated number of clicks.<br/><br/>This element will be nil if there is no estimate available.|**double**|
|<a name="conversions"></a>Conversions|The estimated number of conversions.<br/><br/>This element will be nil if there is no estimate available.|**double**|
|<a name="conversionvalues"></a>ConversionValues|The estimated conversion values.<br/><br/>This element will be nil if there is no estimate available.|**double**|
|<a name="cost"></a>Cost|The estimated cost.<br/><br/>This element will be nil if there is no estimate available.|**double**|
|<a name="currencycode"></a>CurrencyCode|The ISO code for the monetary unit of the suggested bid value and estimated performance statistics.|[CurrencyCode](currencycode.md)|
|<a name="impressions"></a>Impressions|The estimated number of impressions.|**long**|
|<a name="marginalcpc"></a>MarginalCPC|The *CampaignBidLandscapeType* is *MarginalCpc*.<br/><br/>This element will be nil if the *CampaignBidLandscapeType* isn't *MarginalCpc*.|**double**|
|<a name="targetcpa"></a>TargetCpa|The *CampaignBidLandscapeType* is *TargetCpa*.<br/><br/>This element will be nil if the *CampaignBidLandscapeType* isn't *TargetCpa*.|**double**|
|<a name="targetroas"></a>TargetRoas|The *CampaignBidLandscapeType* is *TargetRoas*.<br/><br/>This element will be nil if the *CampaignBidLandscapeType* isn't *TargetRoas*.|**double**|
|<a name="topimpressions"></a>TopImpressions|The estimated number of impressions in the top or mainline ad results.<br/><br/>This element will be nil if there is no estimate available.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[CampaignBidLandscape](campaignbidlandscape.md)  
