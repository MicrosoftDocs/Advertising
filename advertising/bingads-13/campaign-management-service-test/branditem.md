---
title: BrandItem Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: A data object for the BrandItem.(test)
---
# BrandItem Data Object Test - Campaign Management
A data object for the BrandItem.

# [XML](#tab/xml)

```xml
<xs:complexType name="BrandItem" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SharedListItem">
      <xs:sequence>
        <xs:element minOccurs="0" name="BrandId" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Type": "BrandItem",
  "BrandId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [BrandItem](branditem.md) object has the following elements: [BrandId](#brandid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="brandid"></a>BrandId|Reserved.|**long**|

The [BrandItem](branditem.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssharedlistitem"></a>Inherited Elements from SharedListItem
The [BrandItem](branditem.md) object derives from the [SharedListItem](sharedlistitem.md) object, and inherits the following elements: [ForwardCompatibilityMap](#forwardcompatibilitymap), [Type](#type). The descriptions below are specific to [BrandItem](branditem.md), and might not apply to other objects that inherit the same elements from the [SharedListItem](sharedlistitem.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|Reserved.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

