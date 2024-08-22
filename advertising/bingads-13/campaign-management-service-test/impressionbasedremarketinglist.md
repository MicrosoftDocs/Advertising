---
title: ImpressionBasedRemarketingList Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for ImpressionBasedRemarketingList.(test)
---
# ImpressionBasedRemarketingList Data Object Test - Campaign Management
Defines a data object for ImpressionBasedRemarketingList.

# [XML](#tab/xml)

```xml
<xs:complexType name="ImpressionBasedRemarketingList" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Audience">
      <xs:sequence>
        <xs:element minOccurs="0" name="AdGroupId" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="CampaignId" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="EntityType" type="tns:ImpressionBasedEntityType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AudienceNetworkSize": "LongValueHere",
  "CustomerShare": {
    "CustomerAccountShares": [
      {
        "AccountId": "LongValueHere",
        "Associations": [
          {
            "AssociationCount": "LongValueHere",
            "UsageType": "ValueHere"
          }
        ],
        "CustomerId": "LongValueHere"
      }
    ],
    "OwnerCustomerId": "LongValueHere"
  },
  "Description": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "MembershipDuration": "IntValueHere",
  "Name": "ValueHere",
  "ParentId": "LongValueHere",
  "Scope": "ValueHere",
  "SearchSize": "LongValueHere",
  "SupportedCampaignTypes": [
    "ValueHere"
  ],
  "Type": "ImpressionBasedRemarketingList",
  "AdGroupId": "LongValueHere",
  "CampaignId": "LongValueHere",
  "EntityType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md) object has the following elements: [AdGroupId](#adgroupid), [CampaignId](#campaignid), [EntityType](#entitytype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The ad group identifier to associate with the impression-based remarketing list.<br/><br/>*Note*: The *AdGroupId* is null for an impression-based remarketing list with users who have viewed an ad under campaign.|**long**|
|<a name="campaignid"></a>CampaignId|The campaign identifier to associate with the impression-based remarketing list.|**long**|
|<a name="entitytype"></a>EntityType|The entity type of an impression-based remarketing list.|[ImpressionBasedEntityType](impressionbasedentitytype.md)|

The [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudience"></a>Inherited Elements from Audience
The [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md) object derives from the [Audience](audience.md) object, and inherits the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type). The descriptions below are specific to [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md), and might not apply to other objects that inherit the same elements from the [Audience](audience.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|Reserved.|**long**|
|<a name="customershare"></a>CustomerShare|Reserved.|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|Reserved.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|Reserved.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="membershipduration"></a>MembershipDuration|Reserved.|**int**|
|<a name="name"></a>Name|Reserved.|**string**|
|<a name="parentid"></a>ParentId|Reserved.|**long**|
|<a name="scope"></a>Scope|Reserved.|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|Reserved.|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|Reserved.|**string** array|
|<a name="type"></a>Type|Reserved.|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

