---
title: TargetSettingDetail Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Determines whether you want to use the "target and bid" option or the "bid only" target option for the criterion type group.
---
# TargetSettingDetail Data Object - Campaign Management
Determines whether you want to use the "target and bid" option or the "bid only" target option for the criterion type group.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="TargetSettingDetail" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CriterionTypeGroup" type="tns:CriterionTypeGroup" />
    <xs:element minOccurs="0" name="TargetAndBid" type="xs:boolean" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CriterionTypeGroup": "ValueHere",
  "TargetAndBid": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [TargetSettingDetail](targetsettingdetail.md) object has the following elements: [CriterionTypeGroup](#criteriontypegroup), [TargetAndBid](#targetandbid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="criteriontypegroup"></a>CriterionTypeGroup|The criterion type group that you want to set either the "target and bid" option or the "bid only" target option.<br/><br/>If the [Campaign Type](campaign.md#campaigntype) is set to Audience, the supported values are Age, Audience, CompanyName, Gender, Industry, and JobFunction. Otherwise the only value currently supported for other campaign types e.g., Search is Audience. For more details see the [Remarks](#remarks) below.<br/><br/>**Add:** Required<br/>**Update:** Required|[CriterionTypeGroup](criteriontypegroup.md)|
|<a name="targetandbid"></a>TargetAndBid|Determines whether you want to use the "target and bid" option or the "bid only" target option for the criterion type group. A value of *True* corresponds to the "target and bid" option, and in this case we will only deliver ads to people who meet at least one of your criteria, while letting you make bid adjustments for specific criteria. A value of *False* corresponds to the "bid only" option, and in this case we will deliver ads to everyone who meets your other targeting criteria, while letting you make bid adjustments for specific criteria.<br/><br/>**Add:** Required<br/>**Update:** Required|**boolean**|

## <a name="remarks"></a>Remarks
If the [Campaign Type](campaign.md#campaigntype) is set to Audience, the supported values are Age, Audience, CompanyName, Gender, Industry, and JobFunction. Otherwise the only value currently supported for other campaign types e.g., Search campaigns is "Audience". In other words, the "target and bid" option for the Audience criterion type is supported with all campaign types, whereas the "target and bid" option for Age, CompanyName, Gender, Industry, and JobFunction criterion groups is only supported with the Audience campaign type. 

> [!NOTE]
> Do not confuse the Audience campaign type with the Audience criterion type group name. 

|Criterion Type Group|Supported Campaigns|Description|
|-----------------|---------------|---------------|
|Age|Audience|If you set [TargetAndBid](#targetandbid) true for age criterions, we will only deliver ads to people who meet at least one of your age criteria, while letting you make bid adjustments for specific age ranges. This setting ensures that the people seeing your ads meet your age criteria.<br/><br/>If you set [TargetAndBid](#targetandbid) false for age criterions, or if no TargetSettingDetail object exists with the [CriterionTypeGroup](#criteriontypegroup) set to Age, we will deliver ads to everyone who meets your other targeting criteria, while letting you make bid adjustments for specific age ranges. This setting lets you bid more (or less) aggressively for the people who meet specific age criteria, without restricting your ads to those people.|
|Audience|All|If you set [TargetAndBid](#targetandbid) true for audience criterions, we will only deliver ads to people included in the audience, with the option to change the bid amount. Ads will only show to people included in the audience.<br/><br/>If you set [TargetAndBid](#targetandbid) false for audience criterions, or if no TargetSettingDetail object exists with the [CriterionTypeGroup](#criteriontypegroup) set to Audience, we will show ads to people searching for your ad, with the option to change the bid amount for people included in the audience. Ads can show to everyone but the bid adjustment will apply to people included in the audience.|
|CompanyName|Audience|If you set [TargetAndBid](#targetandbid) true for company name criterions, we will only deliver ads to people who meet at least one of your company criteria, while letting you make bid adjustments for specific companies. This setting ensures that the people seeing your ads meet your company criteria.<br/><br/>If you set [TargetAndBid](#targetandbid) false for company name criterions, or if no TargetSettingDetail object exists with the [CriterionTypeGroup](#criteriontypegroup) set to CompanyName, we will deliver ads to everyone who meets your other targeting criteria, while letting you make bid adjustments for specific companies. This setting lets you bid more (or less) aggressively for the people who meet specific company criteria, without restricting your ads to those people.|
|Gender|Audience|If you set [TargetAndBid](#targetandbid) true for gender criterions, we will only deliver ads to people who meet your gender criteria, while letting you make bid adjustments for a specific gender. This setting ensures that the people seeing your ads meet your gender criteria.<br/><br/>If you set [TargetAndBid](#targetandbid) false for gender criterions, or if no TargetSettingDetail object exists with the [CriterionTypeGroup](#criteriontypegroup) set to Gender, we will deliver ads to everyone who meets your other targeting criteria, while letting you make bid adjustments for a specific gender. This setting lets you bid more (or less) aggressively for the people who meet specific gender criteria, without restricting your ads to those people.|
|Industry|Audience|If you set [TargetAndBid](#targetandbid) true for industry criterions, we will only deliver ads to people who meet at least one of your industry criteria, while letting you make bid adjustments for specific industries. This setting ensures that the people seeing your ads meet your industry criteria.<br/><br/>If you set [TargetAndBid](#targetandbid) false for industry criterions, or if no TargetSettingDetail object exists with the [CriterionTypeGroup](#criteriontypegroup) set to Industry, we will deliver ads to everyone who meets your other targeting criteria, while letting you make bid adjustments for specific industries. This setting lets you bid more (or less) aggressively for the people who meet specific industry criteria, without restricting your ads to those people.|
|JobFunction|Audience|If you set [TargetAndBid](#targetandbid) true for job function criterions, we will only deliver ads to people who meet at least one of your job function criteria, while letting you make bid adjustments for specific job functions. This setting ensures that the people seeing your ads meet your job function criteria.<br/><br/>If you set [TargetAndBid](#targetandbid) false for job function criterions, or if no TargetSettingDetail object exists with the [CriterionTypeGroup](#criteriontypegroup) set to JobFunction, we will deliver ads to everyone who meets your other targeting criteria, while letting you make bid adjustments for specific job functions. This setting lets you bid more (or less) aggressively for the people who meet specific job function criteria, without restricting your ads to those people.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[TargetSetting](targetsetting.md)  
