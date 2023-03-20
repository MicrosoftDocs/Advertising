---
title: VerifiedTrackingSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the VerifiedTrackingSetting Data Object.
---
# VerifiedTrackingSetting Data Object - Campaign Management
Defines the VerifiedTrackingSetting Data Object.

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon!

## Syntax
```xml
<xs:complexType name="VerifiedTrackingSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="Details" nillable="true" type="q9:ArrayOfArrayOfKeyValuePairOfstringstring" xmlns:q9="http://schemas.datacontract.org/2004/07/System.Collections.Generic" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [VerifiedTrackingSetting](verifiedtrackingsetting.md) object has the following elements: [Details](#details).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="details"></a>Details|Reserved.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|

The [VerifiedTrackingSetting](verifiedtrackingsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [VerifiedTrackingSetting](verifiedtrackingsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [VerifiedTrackingSetting](verifiedtrackingsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the setting. This value is *VerifiedTracking* when you retrieve a verified tracking setting. For more information about setting types, see the [Setting Data Object Remarks](setting.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

