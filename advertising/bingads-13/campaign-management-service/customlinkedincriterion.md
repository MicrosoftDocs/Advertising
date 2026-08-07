---
title: CustomLinkedInCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the custom LinkedIn criterion data object.
---
# CustomLinkedInCriterion Data Object - Campaign Management
Defines the custom LinkedIn criterion data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CustomLinkedInCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="Profile" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="ProfileId" type="xs:long" />
        <xs:element minOccurs="0" name="ProfileType" type="tns:ProfileType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "CustomLinkedInCriterion",
  "Profile": "ValueHere",
  "ProfileId": "LongValueHere",
  "ProfileType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CustomLinkedInCriterion](customlinkedincriterion.md) object has the following elements: [Profile](#profile), [ProfileId](#profileid), [ProfileType](#profiletype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="profile"></a>Profile|The LinkedIn profile.|**string**|
|<a name="profileid"></a>ProfileId|The LinkedIn profile ID.|**long**|
|<a name="profiletype"></a>ProfileType|The LinkedIn profile type.|[ProfileType](profiletype.md)|

The [CustomLinkedInCriterion](customlinkedincriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [CustomLinkedInCriterion](customlinkedincriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [CustomLinkedInCriterion](customlinkedincriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *CustomLinkedIn* when you retrieve a custom LinkedIn criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

