---
title: Setting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the base class of a setting.
---
# Setting Data Object - Campaign Management
Defines the base class of a setting.

Do not try to instantiate a *Setting*. You can create one or more of the following objects that derive from it.

|Setting|Supported Entity|
|-----|-----|
|[DisclaimerSetting](disclaimersetting.md)|[Campaign](campaign.md)|
|[DynamicFeedSetting](dynamicsearchadssetting.md)|[Campaign](campaign.md)|
|[DynamicSearchAdsSetting](dynamicsearchadssetting.md)|[Campaign](campaign.md)|
|[HotelSetting](hotelsetting.md)|[AdGroup](adgroup.md)|
|[PerformanceMaxSetting](performancemaxsetting.md)|[Campaign](campaign.md)|
|[ResponsiveSearchAdsSetting](responsivesearchadssetting.md)|[Campaign](campaign.md)|
|[ShoppingSetting](shoppingsetting.md)|[Campaign](campaign.md)|
|[TargetSetting](targetsetting.md)|[Campaign](campaign.md)<br/><br/>[AdGroup](adgroup.md)|
|[VerifiedTrackingSetting](verifiedtrackingsetting.md)|[Campaign](campaign.md)|

## Syntax
```xml
<xs:complexType name="Setting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Setting](setting.md) object has the following elements: [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of setting.<br/><br/>For more information, see [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by the type of setting you instantiate.

If you generate the SOAP manually, use the *type* attribute of the `<Setting>` node as shown in the following example, to specify that the setting is a shopping setting.

```xml
<Setting i:type="ShoppingSetting">
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
[Campaign](campaign.md)  
