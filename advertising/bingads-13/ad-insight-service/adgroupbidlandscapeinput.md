---
title: AdGroupBidLandscapeInput Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains the requested bid landscape type for the corresponding ad group identifier.
---
# AdGroupBidLandscapeInput Data Object - Ad Insight
Defines an object that contains the requested bid landscape type for the corresponding ad group identifier.

## Syntax
```xml
<xs:complexType name="AdGroupBidLandscapeInput" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdGroupBidLandscapeType" type="tns:AdGroupBidLandscapeType" />
    <xs:element minOccurs="0" name="AdGroupId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

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
