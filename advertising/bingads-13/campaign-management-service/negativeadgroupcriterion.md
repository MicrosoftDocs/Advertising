---
title: NegativeAdGroupCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a criterion that you want to exclude from the specified ad group.
---
# NegativeAdGroupCriterion Data Object - Campaign Management
Defines a criterion that you want to exclude from the specified ad group.

## Syntax
```xml
<xs:complexType name="NegativeAdGroupCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdGroupCriterion">
      <xs:sequence />
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [NegativeAdGroupCriterion](negativeadgroupcriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadgroupcriterion"></a>Inherited Elements from AdGroupCriterion
The [NegativeAdGroupCriterion](negativeadgroupcriterion.md) object derives from the [AdGroupCriterion](adgroupcriterion.md) object, and inherits the following elements: [AdGroupId](#adgroupid), [Criterion](#criterion), [Id](#id), [Status](#status), [Type](#type). The descriptions below are specific to [NegativeAdGroupCriterion](negativeadgroupcriterion.md), and might not apply to other objects that inherit the same elements from the [AdGroupCriterion](adgroupcriterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The identifier of the ad group to apply the criterion to.<br/><br/>**Add:** Required<br/>**Update:** Required|**long**|
|<a name="criterion"></a>Criterion|The criterion to apply to the ad group. The criterion helps determine whether ads in the ad group are served.<br/><br/>For a list of available criterion types, see [AdGroupCriterionType](adgroupcriteriontype.md).<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[Criterion](criterion.md)|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the ad group criterion.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="status"></a>Status|A status value that determines whether the criterion applies for the ad group.<br/><br/>Currently the only supported status for negative ad group criterions is *Active*.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdGroupCriterionStatus](adgroupcriterionstatus.md)|
|<a name="type"></a>Type|The type of the ad group criterion. This value is *NegativeAdGroupCriterion* when you retrieve a negative ad group criterion. For more information about ad group criterion types, see the [AdGroupCriterion Data Object Remarks](adgroupcriterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

