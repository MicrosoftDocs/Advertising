---
title: AdExtensionEditorialReasonCollection Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a collection of ad extensions that failed editorial review.(test)
---
# AdExtensionEditorialReasonCollection Data Object Test - Campaign Management
Defines a collection of ad extensions that failed editorial review.

# [XML](#tab/xml)

```xml
<xs:complexType name="AdExtensionEditorialReasonCollection" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdExtensionId" type="xs:long" />
    <xs:element minOccurs="0" name="Reasons" nillable="true" type="tns:ArrayOfAdExtensionEditorialReason" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdExtensionId": "ValueHere",
  "Reasons": [
    {
      "Location": "ValueHere",
      "PublisherCountries": [
        "ValueHere"
      ],
      "ReasonCode": "ValueHere",
      "Term": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AdExtensionEditorialReasonCollection](adextensioneditorialreasoncollection.md) object has the following elements: [AdExtensionId](#adextensionid), [Reasons](#reasons).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adextensionid"></a>AdExtensionId|The identifier of the ad extension that failed editorial review.|**long**|
|<a name="reasons"></a>Reasons|A list of *AdExtensionEditorialReason* objects that identify the component of an ad extension that failed editorial review, and the reason for the failure.|[AdExtensionEditorialReason](adextensioneditorialreason.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAdExtensionsEditorialReasons](getadextensionseditorialreasons.md)  
