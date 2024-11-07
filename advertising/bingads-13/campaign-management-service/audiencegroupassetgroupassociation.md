---
title: AudienceGroupAssetGroupAssociation Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an AudienceGroupAssetGroupAssociation data object.
---
# AudienceGroupAssetGroupAssociation Data Object - Campaign Management
Defines an AudienceGroupAssetGroupAssociation data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="AudienceGroupAssetGroupAssociation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="AssetGroupId" type="xs:long" />
    <xs:element name="AudienceGroupId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AssetGroupId": "LongValueHere",
  "AudienceGroupId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AudienceGroupAssetGroupAssociation](audiencegroupassetgroupassociation.md) object has the following elements: [AssetGroupId](#assetgroupid), [AudienceGroupId](#audiencegroupid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="assetgroupid"></a>AssetGroupId|The ID of the asset group.<br /><br />**Set**: Required<br />**Delete**: Required |**long**|
|<a name="audiencegroupid"></a>AudienceGroupId|The ID of the audience group.<br /><br />**Set**: Required<br />**Delete**: Required|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[DeleteAudienceGroupAssetGroupAssociations](deleteaudiencegroupassetgroupassociations.md)  
[GetAudienceGroupAssetGroupAssociationsByAssetGroupIds](getaudiencegroupassetgroupassociationsbyassetgroupids.md)  
[GetAudienceGroupAssetGroupAssociationsByAudienceGroupIds](getaudiencegroupassetgroupassociationsbyaudiencegroupids.md)  
[SetAudienceGroupAssetGroupAssociations](setaudiencegroupassetgroupassociations.md)  
