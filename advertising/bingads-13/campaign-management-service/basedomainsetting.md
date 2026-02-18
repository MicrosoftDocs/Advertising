---
title: BaseDomainSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the BaseDomainSetting data object.
---
# BaseDomainSetting Data Object - Campaign Management
Defines the BaseDomainSetting data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BaseDomainSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="BaseDomain" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "BaseDomainSetting",
  "BaseDomain": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [BaseDomainSetting](basedomainsetting.md) object has the following elements: [BaseDomain](#basedomain).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="basedomain"></a>BaseDomain|The fundamental part of the URL (e.g., contoso.com).<br/><br/>*Note*: *BaseDomain* is initially set automatically, you can't set it. For existing ad groups, if *BaseDomain* isn't the same, it will be backfilled.<br/><br/>**Add:** Read only.<br/>**Update:** Read only.|**string**|

The [BaseDomainSetting](basedomainsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [BaseDomainSetting](basedomainsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [BaseDomainSetting](basedomainsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of setting. This value is *BaseDomainSetting* when you retrieve the setting.<br/><br/>For more information, see [Setting Data Object Remarks](./setting.md#remarks).<br/><br/>**Add**: Read-only<br/>**Update**: Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

