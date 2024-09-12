---
title: AdGroupBidLandscapeInput Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains the requested bid landscape type for the corresponding ad group identifier.(test)
---
# AdGroupBidLandscapeInput Data Object Test - Ad Insight
Defines an object that contains the requested bid landscape type for the corresponding ad group identifier.

# [XML](#tab/xml)

```xml
<xs:complexType name="AdGroupBidLandscapeInput" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdGroupBidLandscapeType" type="tns:AdGroupBidLandscapeType" />
    <xs:element minOccurs="0" name="AdGroupId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdGroupBidLandscapeType": "ValueHere",
  "AdGroupId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdGroupBidLandscapeInput](adgroupbidlandscapeinput.md) object has the following elements: [AdGroupBidLandscapeType](#adgroupbidlandscapetype), [AdGroupId](#adgroupid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupbidlandscapetype"></a>AdGroupBidLandscapeType|Determines whether all or a subset of an ad group's existing keywords should be used to determine the bid landscape.<br/><br/>If not specified in a request, the default value is Uniform.|[AdGroupBidLandscapeType](adgroupbidlandscapetype.md)|
|<a name="adgroupid"></a>AdGroupId|The ad group identifier.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetBidLandscapeByAdGroupIds](getbidlandscapebyadgroupids.md)  
