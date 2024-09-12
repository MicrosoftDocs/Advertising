---
title: KeywordIdeaCategory Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains a keyword idea category.(test)
---
# KeywordIdeaCategory Data Object Test - Ad Insight
Defines an object that contains a keyword idea category.

You can use the category identifier in the [CategorySearchParameter](categorysearchparameter.md) when calling [GetKeywordIdeas](getkeywordideas.md).

# [XML](#tab/xml)

```xml
<xs:complexType name="KeywordIdeaCategory" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CategoryId" type="xs:long" />
    <xs:element minOccurs="0" name="CategoryName" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CategoryId": "LongValueHere",
  "CategoryName": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [KeywordIdeaCategory](keywordideacategory.md) object has the following elements: [CategoryId](#categoryid), [CategoryName](#categoryname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="categoryid"></a>CategoryId|The Microsoft Advertising identifier of the keyword idea category.|**long**|
|<a name="categoryname"></a>CategoryName|The name of the keyword idea category.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetKeywordIdeaCategories](getkeywordideacategories.md)  
