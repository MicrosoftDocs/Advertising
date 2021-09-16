---
title: LocationSearchParameter Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: The location search parameter filter that you can include when requesting keyword ideas.
---
# LocationSearchParameter Data Object - Ad Insight
The location search parameter filter that you can include when requesting keyword ideas.

If you do not include the location search parameter when calling [GetKeywordIdeas](getkeywordideas.md), then keyword ideas will be returned for all locations.

## Syntax
```xml
<xs:complexType name="LocationSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Locations" nillable="true" type="tns:ArrayOfLocationCriterion" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [LocationSearchParameter](locationsearchparameter.md) object has the following elements: [Locations](#locations).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="locations"></a>Locations|The location criterion list for the returned keyword ideas.<br/><br/>You must include between 1 to 2,000 locations.|[LocationCriterion](locationcriterion.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

