---
title: AdExtensionEditorialReason Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that you can use to determine the component of an ad extension that failed editorial review, and the reason for the failure.
---
# AdExtensionEditorialReason Data Object - Campaign Management
Defines an object that you can use to determine the component of an ad extension that failed editorial review, and the reason for the failure.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdExtensionEditorialReason" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Location" nillable="true" type="xs:string" />
    <xs:element xmlns:q73="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="PublisherCountries" nillable="true" type="q73:ArrayOfstring" />
    <xs:element minOccurs="0" name="ReasonCode" type="xs:int" />
    <xs:element minOccurs="0" name="Term" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Location": "ValueHere",
  "PublisherCountries": [
    "ValueHere"
  ],
  "ReasonCode": IntValueHere,
  "Term": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdExtensionEditorialReason](adextensioneditorialreason.md) object has the following elements: [Location](#location), [PublisherCountries](#publishercountries), [ReasonCode](#reasoncode), [Term](#term).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="location"></a>Location|The component of the ad extension that failed editorial review.|**string**|
|<a name="publishercountries"></a>PublisherCountries|The list of publisher countries or regions whose editorial guidelines do not allow the specified term.|**string** array|
|<a name="reasoncode"></a>ReasonCode|A code that identifies the reason for the failure. For a list of possible reason codes, see [Editorial Reason Codes](../guides/editorial-failure-reason-codes.md).|**int**|
|<a name="term"></a>Term|The term that failed editorial review.<br/><br/>This element will not be set if a combination of terms caused the failure or if the failure was based on a policy violation.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdExtensionEditorialReasonCollection](adextensioneditorialreasoncollection.md)  
