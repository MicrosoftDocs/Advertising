---
title: Webpage Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 10/10/2026
description: Defines webpage conditions for Dynamic Search Ads targeting or AI Max URL inclusions.
---
# Webpage Data Object - Campaign Management
Defines a webpage parameter that contains a list of webpage conditions or criteria. You can use a *Webpage* criterion to target webpages for Dynamic Search Ads or to define URL inclusion rules for AI Max Search campaigns.

The *Webpage* criterion can be included within [BiddableAdGroupCriterion](biddableadgroupcriterion.md), [NegativeAdGroupCriterion](negativeadgroupcriterion.md), and [NegativeCampaignCriterion](negativecampaigncriterion.md) objects. If ad group-level negative webpage criteria are specified, the campaign-level negative webpage criteria are ignored for that ad group. In other words, the ad group-level negative webpage criteria override the campaign-level negative webpage criteria and aren't applied as a union.

A *Webpage* criterion can be created in the following scenarios:

- For Dynamic Search Ads, the campaign has a [DynamicSearchAdsSetting](dynamicsearchadssetting.md), [CampaignType](campaign.md#campaigntype) is *Search*, [ExperimentId](campaign.md#experimentid) isn't set, and [AdGroupType](adgroup.md#adgrouptype) is *SearchDynamic*.
- For an AI Max URL inclusion rule, the Search campaign has an [AISearchSetting](aisearchsetting.md) with *AISearchEnabled* set to *true*, and the ad group's *AdGroupType* isn't *SearchDynamic*.
- For Performance Max URL targeting, the campaign has a [PerformanceMaxSetting](performancemaxsetting.md).

For an AI Max URL inclusion rule, include the *Webpage* criterion only within a
[BiddableAdGroupCriterion](biddableadgroupcriterion.md). AI Max URL exclusion rules aren't
supported. For targeting requirements and unsupported properties, see
[BiddableAdGroupCriterion Webpage Usage](biddableadgroupcriterion.md#webpage).

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="Webpage" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="Parameter" nillable="true" type="tns:WebpageParameter" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "Webpage",
  "Parameter": {
    "Conditions": [
      {
        "Argument": "ValueHere",
        "Operand": "ValueHere",
        "Operator": "ValueHere"
      }
    ],
    "CriterionName": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [Webpage](webpage.md) object has the following elements: [Parameter](#parameter).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="parameter"></a>Parameter|The webpage parameter that contains a list of webpage conditions or criteria. For an AI Max URL inclusion rule, at least one condition is required; targeting all webpages isn't supported. You can include up to three conditions, and a URL *Equals* condition must be the only condition in the criterion.<br/><br/>**Add:** Required<br/>**Update:** Optional. You can update the criterion name, but you can't update the webpage conditions. To change the conditions, delete the criterion and add a new criterion.|[WebpageParameter](webpageparameter.md)|

The [Webpage](webpage.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [Webpage](webpage.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [Webpage](webpage.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Webpage* when you retrieve a webpage criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  
