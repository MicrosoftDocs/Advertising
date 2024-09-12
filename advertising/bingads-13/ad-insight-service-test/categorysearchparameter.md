---
title: CategorySearchParameter Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The keyword category search parameter that you can use as a seed for new keyword ideas.(test)
---
# CategorySearchParameter Data Object Test - Ad Insight
The keyword category search parameter that you can use as a seed for new keyword ideas.

> [!NOTE]
> The CategorySearchParamater data object is deprecated as of August 21, 2023. [Learn more](https://techcommunity.microsoft.com/t5/bing-ads-api-blog/deprecation-of-legacy-ad-insight-keyword-apis-and-features/ba-p/3878600).

# [XML](#tab/xml)

```xml
<xs:complexType name="CategorySearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="CategoryId" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CategoryId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CategorySearchParameter](categorysearchparameter.md) object has the following elements: [CategoryId](#categoryid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="categoryid"></a>CategoryId|The Microsoft Advertising identifier for the keyword category.<br/><br/>To get a list of keyword category identifiers, use the [GetKeywordIdeaCategories](getkeywordideacategories.md) service operation.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

