---
title: AssetGroupEditorialReasonCollection Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a collection of asset groups that failed editorial review.(test)
---
# AssetGroupEditorialReasonCollection Data Object Test - Campaign Management
Defines a collection of asset groups that failed editorial review.

# [XML](#tab/xml)

```xml
<xs:complexType name="AssetGroupEditorialReasonCollection" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AppealStatus" type="tns:AppealStatus" />
    <xs:element minOccurs="0" name="AssetGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="CampaignId" type="xs:long" />
    <xs:element minOccurs="0" name="Reasons" nillable="true" type="tns:ArrayOfAssetGroupEditorialReason" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AppealStatus": "ValueHere",
  "AssetGroupId": "ValueHere",
  "CampaignId": "ValueHere",
  "Reasons": [
    {
      "Location": "ValueHere",
      "PublisherCountries": [
        "ValueHere"
      ],
      "ReasonCode": NumbericValueHere,
      "Term": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AssetGroupEditorialReasonCollection](assetgroupeditorialreasoncollection.md) object has the following elements: [AppealStatus](#appealstatus), [AssetGroupId](#assetgroupid), [CampaignId](#campaignid), [Reasons](#reasons).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="appealstatus"></a>AppealStatus|A value that determines whether you can appeal the issues found by the editorial review.|[AppealStatus](appealstatus.md)|
|<a name="assetgroupid"></a>AssetGroupId|The identifier of the asset group that failed editorial review.|**long**|
|<a name="campaignid"></a>CampaignId|The identifier of the associated campaign.|**long**|
|<a name="reasons"></a>Reasons|A list of *AssetGroupEditorialReason* objects that identify the component of an asset group that failed editorial review, and the reason for the failure.|[AssetGroupEditorialReason](assetgroupeditorialreason.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAssetGroupsEditorialReasons](getassetgroupseditorialreasons.md)  
