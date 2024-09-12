---
title: TextAssetSuggestions Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the text asset suggestions data object.(test)
---
# TextAssetSuggestions Data Object Test - Ad Insight
Defines the text asset suggestions data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="TextAssetSuggestions" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="FinalUrl" nillable="true" type="xs:string" />
    <xs:element xmlns:q30="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="TextAssets" nillable="true" type="q30:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "FinalUrl": "ValueHere",
  "TextAssets": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [TextAssetSuggestions](textassetsuggestions.md) object has the following elements: [FinalUrl](#finalurl), [TextAssets](#textassets).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="finalurl"></a>FinalUrl|The Final URL of the ad, keyword, or criterion.<br/><br/>Only the first URL in the list is reported. If the URL contains dynamic text substitution parameters (for example, {param1}), the report will contain the URL before substitution.|**string**|
|<a name="textassets"></a>TextAssets|Text assets that can be reused across multiple ads.|**string** array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetTextAssetSuggestionsByFinalUrls](gettextassetsuggestionsbyfinalurls.md)  
