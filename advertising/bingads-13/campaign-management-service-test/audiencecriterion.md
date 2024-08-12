---
title: AudienceCriterion Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a criterion that can be used to show ads to a specific audience.(test)
---
# AudienceCriterion Data Object Test - Campaign Management
Defines a criterion that can be used to show ads to a specific audience.

The *AudienceCriterion* can be included within [AdGroupCriterion](adgroupcriterion.md), [NegativeAdGroupCriterion](negativeadgroupcriterion.md), [CampaignCriterion](campaigncriterion.md), and [NegativeCampaignCriterion](negativecampaigncriterion.md) objects. Audience targets cannot be set both campaign and ad group level. If you set any biddable campaign level audience criteria, then you cannot set any biddable ad group level audience criteria. Audience exclusions can be set at both campaign and ad group level. Microsoft Advertising applies a union of both campaign and ad group level exclusions.

> [!NOTE]
> For new Video campaigns, only Remarketing lists, Similar audiences, In-market audiences, and Customer match lists are supported.

# [XML](#tab/xml)

```xml
<xs:complexType name="AudienceCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="AudienceId" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="AudienceType" nillable="true" type="tns:AudienceType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "AudienceCriterion",
  "AudienceId": "ValueHere",
  "AudienceType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AudienceCriterion](audiencecriterion.md) object has the following elements: [AudienceId](#audienceid), [AudienceType](#audiencetype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audienceid"></a>AudienceId|The Microsoft Advertising identifier of the [Audience](audience.md).<br/><br/>**Add:** Required<br/>**Update:** Read-only. You must leave this element null or the audience must already be associated with the specified entity. To associate a different audience with the entity, you must add a new audience criterion and optionally delete any existing audience criteria.|**long**|
|<a name="audiencetype"></a>AudienceType|The audience type.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AudienceType](audiencetype.md)|

The [AudienceCriterion](audiencecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [AudienceCriterion](audiencecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [AudienceCriterion](audiencecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Audience* when you retrieve an audience criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

