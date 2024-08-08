---
title: DisclaimerSetting Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the DisclaimerSetting Data Object.(test)
---
# DisclaimerSetting Data Object Test - Campaign Management
Defines the DisclaimerSetting Data Object.

# [XML](#tab/xml)

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

# [JSON](#tab/json)

```json
{
  "Type": "DisclaimerSetting",
  "DisclaimerAdsEnabled": "ValueHere"
}
```

-----

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
|<a name="type"></a>Type|The type of setting.<br/><br/>For more information, see [Setting Data Object Remarks](setting.md#remarks).|**string**|

## <a name="remarks"></a>Remarks
*DisclaimerSetting* will not be returned in *GetCampaign* unless explicitly requested in [CampaignAdditionalField](CampaignAdditionalField.md).

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

