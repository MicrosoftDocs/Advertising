---
title: DisclaimerSetting Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the DisclaimerSetting Data Object.
---
# DisclaimerSetting Data Object - Campaign Management
Defines the DisclaimerSetting Data Object.

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon!

## Syntax
```xml
<xs:complexType name="DisclaimerSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="DisclaimerAdsEnabled" type="xs:boolean" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [DisclaimerSetting](disclaimersetting.md) object has the following elements: [DisclaimerAdsEnabled](#disclaimeradsenabled).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="disclaimeradsenabled"></a>DisclaimerAdsEnabled|This is a disclaimer ad when set to *true*. Note: This will always be a disclaimer ad once this is set to *true*. You can only set *DiscalimerAdsEnabled* during ad creation.|**boolean**|

The [DisclaimerSetting](disclaimersetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [DisclaimerSetting](disclaimersetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [DisclaimerSetting](disclaimersetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of setting.<br/><br/>For more information, see [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by the type of setting you instantiate.

If you generate the SOAP manually, use the *type* attribute of the `<Setting>` node as shown in the following example, to specify that the setting is a shopping setting.

```xml
<Setting i:type="ShoppingSetting">
```

*DisclaimerSetting* will not be returned in *GetCampaign* unless explicitly requested in [CampaignAdditionalField](CampaignAdditionalField.md).

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

