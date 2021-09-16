---
title: TargetSetting Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: The target settings that determines whether the Age, Audience, CompanyName, Gender, Industry, and JobFunction criterion type groups use the "target and bid" option or the "bid only" target option.
---
# TargetSetting Data Object - Campaign Management
The target settings that determines whether the Age, Audience, CompanyName, Gender, Industry, and JobFunction criterion type groups use the "target and bid" option or the "bid only" target option.

## Syntax
```xml
<xs:complexType name="TargetSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="Details" nillable="true" type="tns:ArrayOfTargetSettingDetail" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [TargetSetting](targetsetting.md) object has the following elements: [Details](#details).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="details"></a>Details|Determines whether the Age, Audience, CompanyName, Gender, Industry, and JobFunction criterion type groups use the "target and bid" option or the "bid only" target option.<br/><br/>If the [Campaign Type](campaign.md#campaigntype) is set to Audience, the supported values for the [CriterionTypeGroup](targetsettingdetail.md#criteriontypegroup) element of each [TargetSettingDetail](targetsettingdetail.md) item are Age, Audience, CompanyName, Gender, Industry, and JobFunction. Otherwise the only value currently supported for other campaign types e.g., Search is Audience.<br/><br/>Each criterion type group name is specified in a separate [TargetSettingDetail](targetsettingdetail.md) object. When you retrieve this [TargetSetting](targetsetting.md) object, a [TargetSettingDetail](targetsettingdetail.md) object will only be returned for each of the types that are setup to use the "target and bid" option.<br/><br/>Include a [TargetSettingDetail](targetsettingdetail.md) in this list for each specific criterion type group that you want to use the "target and bid" option. In this case we will only deliver ads to people who meet at least one of your criteria, while letting you make bid adjustments for specific criteria. The [TargetSettingDetail](targetsettingdetail.md) applies to all criteria of the specified type e.g., all [LocationCriterion](locationcriterion.md) that were added to the ad group.<br/><br/>Exclude the [TargetSettingDetail](targetsettingdetail.md) for a specific criterion type group name from this list if you want the "bid only" option. In this case we will deliver ads to everyone who meets your other targeting criteria, while letting you make bid adjustments for specific criteria.<br/><br/>An entity such as a remarketing list can be associated with multiple ad groups, and each ad group's target settings (e.g., the Audience criterion group name for remarketing lists) are applied independently for delivery. For example the same remarketing list can be associated with Ad Group A and Ad Group B. The [TargetSettingDetail](targetsettingdetail.md) for each ad group are set independently, and therefore the same remarketing list might be associated via the "target and bid" option for Ad Group A while associated via the "bid only" option for Ad Group B.<br/><br/>**Add:** Optional. For each criterion type group name that is excluded from this list, the default setting is effectively "bid only".<br/>**Update:** Optional. Once you create this TargetSetting object, the existing list of [TargetSettingDetail](targetsettingdetail.md) will be removed or replaced. To remove all existing [TargetSettingDetail](targetsettingdetail.md) create this TargetSetting object and set the Details element to nil. To replace or append to the list of [TargetSettingDetail](targetsettingdetail.md), create this TargetSetting object and assign to the Details element a new list of [TargetSettingDetail](targetsettingdetail.md) objects, including any previous [TargetSettingDetail](targetsettingdetail.md) items that you want to retain. To retain all of the existing [TargetSettingDetail](targetsettingdetail.md), set the element that uses this TargetSetting object to nil. For example set the [Settings](adgroup.md#settings) element of an [AdGroup](adgroup.md) to nil if you do not want to update any of the [TargetSettingDetail](targetsettingdetail.md).|[TargetSettingDetail](targetsettingdetail.md) array|

The [TargetSetting](targetsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [TargetSetting](targetsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [TargetSetting](targetsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the setting. This value is *Target* when you retrieve a target setting. For more information about setting types, see the [Setting Data Object Remarks](setting.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

