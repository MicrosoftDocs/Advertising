---
title: CallToActionSetting Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the CallToActionSetting data object.(test)
---
# CallToActionSetting Data Object Test - Campaign Management
Defines the CallToActionSetting data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="CallToActionSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="AutomatedCallToActionOptOut" nillable="true" type="xs:boolean" />
        <xs:element minOccurs="0" name="CallToActionOptOut" nillable="true" type="xs:boolean">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "CallToActionSetting",
  "AutomatedCallToActionOptOut": "ValueHere",
  "CallToActionOptOut": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CallToActionSetting](calltoactionsetting.md) object has the following elements: [AutomatedCallToActionOptOut](#automatedcalltoactionoptout), [CallToActionOptOut](#calltoactionoptout).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="automatedcalltoactionoptout"></a>AutomatedCallToActionOptOut|Determines whether to opt out of automatic selection of call to action ad asset for the multimedia ads in the campaign. When opted in, we will use artificial intelligence during ad delivery to choose the call to action asset and ignore the ad's call to action setting.<br/><br/>*Note*: Not everyone has this feature yet. If you don't, don't worry - it's coming soon!<br/><br/>**Add**: Optional. The default value of *false* will be set if not otherwise specified.<br/>**Update**: Optional. If no value is set for the update, this setting is not changed.|**boolean**|
|<a name="calltoactionoptout"></a>CallToActionOptOut|Determines whether to opt out of call to action ad asset for the audience ads in the campaign.<br/><br/>**Add**: Optional. The default value of *false* will be set if not otherwise specified.<br/>**Update**: Optional. If no value is set for the update, this setting is not changed.|**boolean**|

The [CallToActionSetting](calltoactionsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [CallToActionSetting](calltoactionsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [CallToActionSetting](calltoactionsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of setting. This value is *CallToActionSetting* when you retrieve the setting.<br/><br/>For more information, see [Setting Data Object Remarks](./setting.md#remarks).<br/><br/>**Add**: Read-only<br/>**Update**: Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

