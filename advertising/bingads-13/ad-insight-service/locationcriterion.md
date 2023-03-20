---
title: LocationCriterion Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: The location criterion that you can include when requesting keyword ideas or traffic estimates.
---
# LocationCriterion Data Object - Ad Insight
The location criterion that you can include when requesting keyword ideas or traffic estimates.

## Syntax
```xml
<xs:complexType name="LocationCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="LocationId" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [LocationCriterion](locationcriterion.md) object has the following elements: [LocationId](#locationid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="locationid"></a>LocationId|The Microsoft Advertising identifier of the location that you want to target.<br/><br/>You can get keyword ideas and traffic estimates for city, country, county, metro area (Nielsen DMA® in the United States), and state locations. Postal code location identifiers are not supported for keyword ideas and traffic estimate requests.<br/><br/>Currently this feature is available in the United States, United Kingdom, Canada, Australia, France, and Germany. To get a list of geographical location identifiers use the Campaign Management service i.e., the [GetGeoLocationsFileUrl](../campaign-management-service/getgeolocationsfileurl.md) service operation.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[LocationSearchParameter](locationsearchparameter.md)  
