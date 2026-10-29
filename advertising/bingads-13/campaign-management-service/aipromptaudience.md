---
title: AIPromptAudience Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an audience based on an AI prompt.
---
# AIPromptAudience Data Object - Campaign Management
Defines an audience based on an AI prompt.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AIPromptAudience" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Audience">
      <xs:sequence>
        <xs:element minOccurs="0" name="Prompt" nillable="true" type="xs:string" />
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
  "MembershipDuration": IntValueHere,
  "Name": "ValueHere",
  "ParentId": "LongValueHere",
  "Scope": "ValueHere",
  "SearchSize": "LongValueHere",
  "SupportedCampaignTypes": [
    "ValueHere"
  ],
  "Type": "AIPromptAudience",
  "Prompt": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AIPromptAudience](aipromptaudience.md) object has the following elements: [Prompt](#prompt).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="prompt"></a>Prompt|The text prompt that describes the audience.|**string**|

The [AIPromptAudience](aipromptaudience.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudience"></a>Inherited Elements from Audience
The [AIPromptAudience](aipromptaudience.md) object derives from the [Audience](audience.md) object, and inherits the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type). The descriptions below are specific to [AIPromptAudience](aipromptaudience.md), and might not apply to other objects that inherit the same elements from the [Audience](audience.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|The total number of people who are active members of this audience in the Audience network.|**long**|
|<a name="customershare"></a>CustomerShare|The customers and accounts that share the audience.|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|The description of the audience.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the audience.|**long**|
|<a name="membershipduration"></a>MembershipDuration|The number of days to look back for actions that match the audience definition.|**int**|
|<a name="name"></a>Name|The name of the audience.|**string**|
|<a name="parentid"></a>ParentId|The Microsoft Advertising identifier of the account or customer that owns the audience.|**long**|
|<a name="scope"></a>Scope|The scope that determines which accounts can use the audience.|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|The total number of people who are active members of this audience in the Search network.|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|The list of campaign types that support this audience.|**string** array|
|<a name="type"></a>Type|The type of the audience. The value is *AIPromptAudience* for an AI prompt audience.|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  
