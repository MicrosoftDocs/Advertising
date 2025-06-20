---
title: PortfolioBidStrategyAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Additional fields for the portfolio bid strategy object.
---
# PortfolioBidStrategyAdditionalField Value Set - Campaign Management
Additional fields for the portfolio bid strategy object.

## Syntax
```xml
<xs:simpleType name="PortfolioBidStrategyAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="MaxConversionValueWithMaxCpc">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PortfolioBidStrategyAdditionalField](portfoliobidstrategyadditionalfield.md) value set has the following values: [MaxConversionValueWithMaxCpc](#maxconversionvaluewithmaxcpc).

|Value|Description|
|-----------|---------------|
|<a name="maxconversionvaluewithmaxcpc"></a>MaxConversionValueWithMaxCpc|Inlcude the MaxCpc element within each returned [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md) object.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetBidStrategiesByIds](getbidstrategiesbyids.md)  
