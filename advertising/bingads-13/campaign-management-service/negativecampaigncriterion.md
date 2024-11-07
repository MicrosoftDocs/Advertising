---
title: NegativeCampaignCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a criterion that you want to exclude from the specified campaign.
---
# NegativeCampaignCriterion Data Object - Campaign Management
Defines a criterion that you want to exclude from the specified campaign.

# [XML](#tab/xml)

```xml
<xs:complexType name="NegativeCampaignCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:CampaignCriterion">
      <xs:sequence />
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{}
```

-----

## <a name="elements"></a>Elements

The [NegativeCampaignCriterion](negativecampaigncriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscampaigncriterion"></a>Inherited Elements from CampaignCriterion
The [NegativeCampaignCriterion](negativecampaigncriterion.md) object derives from the [CampaignCriterion](campaigncriterion.md) object, and inherits the following elements: [CampaignId](#campaignid), [Criterion](#criterion), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [Type](#type). The descriptions below are specific to [NegativeCampaignCriterion](negativecampaigncriterion.md), and might not apply to other objects that inherit the same elements from the [CampaignCriterion](campaigncriterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign to apply the criterion to.<br/><br/>**Add:** Required<br/>**Update:** Required|**long**|
|<a name="criterion"></a>Criterion|The criterion to apply to the campaign. The criterion helps determine whether ads in the campaign are served.<br/><br/>For a list of available criterion types, see [CampaignCriterionType](campaigncriteriontype.md).<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[Criterion](criterion.md)|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the campaign criterion.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="status"></a>Status|A status value that determines whether the criterion applies for the campaign.<br/><br/>Currently the only supported status for negative campaign criterions is *Active*.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[CampaignCriterionStatus](campaigncriterionstatus.md)|
|<a name="type"></a>Type|The type of the campaign criterion. This value is *NegativeCampaignCriterion* when you retrieve a negative campaign criterion. For more information about campaign criterion types, see the [CampaignCriterion Data Object Remarks](campaigncriterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

