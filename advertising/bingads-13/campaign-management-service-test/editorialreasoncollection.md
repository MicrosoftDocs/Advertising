---
title: EditorialReasonCollection Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a collection of ads or keywords that failed editorial review, and the reason for the failure.(test)
---
# EditorialReasonCollection Data Object Test - Campaign Management
Defines a collection of ads or keywords that failed editorial review, and the reason for the failure.

# [XML](#tab/xml)

```xml
<xs:complexType name="EditorialReasonCollection" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="AdOrKeywordId" type="xs:long" />
    <xs:element minOccurs="0" name="AppealStatus" type="tns:AppealStatus" />
    <xs:element minOccurs="0" name="Reasons" nillable="true" type="tns:ArrayOfEditorialReason" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdGroupId": "LongValueHere",
  "AdOrKeywordId": "LongValueHere",
  "AppealStatus": "ValueHere",
  "Reasons": [
    {
      "Location": "ValueHere",
      "PublisherCountries": [
        "ValueHere"
      ],
      "ReasonCode": "IntValueHere",
      "Term": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [EditorialReasonCollection](editorialreasoncollection.md) object has the following elements: [AdGroupId](#adgroupid), [AdOrKeywordId](#adorkeywordid), [AppealStatus](#appealstatus), [Reasons](#reasons).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|Identifies the ad group which is the parent of the ad or keyword that failed editorial review.|**long**|
|<a name="adorkeywordid"></a>AdOrKeywordId|Identifies the ad or keyword that failed editorial review.|**long**|
|<a name="appealstatus"></a>AppealStatus|A value that determines whether you can appeal the issues found by the editorial review.|[AppealStatus](appealstatus.md)|
|<a name="reasons"></a>Reasons|An array of editorial reasons that you can use to determine the component of an ad or keyword that failed editorial review, and the reason for the failure.|[EditorialReason](editorialreason.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetEditorialReasonsByIds](geteditorialreasonsbyids.md)  
