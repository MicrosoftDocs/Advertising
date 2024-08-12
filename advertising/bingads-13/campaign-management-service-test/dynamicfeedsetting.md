---
title: DynamicFeedSetting Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the DynamicFeedSetting Data Object.(test)
---
# DynamicFeedSetting Data Object Test - Campaign Management
Defines the DynamicFeedSetting Data Object.

# [XML](#tab/xml)

```xml
<xs:complexType name="DynamicFeedSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="FeedId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "DynamicFeedSetting",
  "FeedId": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DynamicFeedSetting](dynamicfeedsetting.md) object has the following elements: [FeedId](#feedid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="feedid"></a>FeedId|Reserved.|**long**|

The [DynamicFeedSetting](dynamicfeedsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [DynamicFeedSetting](dynamicfeedsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [DynamicFeedSetting](dynamicfeedsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

