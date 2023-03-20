---
title: AdExtensionEditorialStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the editorial review status values of an ad extension.
---
# AdExtensionEditorialStatus Value Set - Campaign Management
Defines the editorial review status values of an ad extension.

## Syntax
```xml
<xs:simpleType name="AdExtensionEditorialStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Disapproved" />
    <xs:enumeration value="Inactive" />
    <xs:enumeration value="ActiveLimited" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdExtensionEditorialStatus](adextensioneditorialstatus.md) value set has the following values: [Active](#active), [ActiveLimited](#activelimited), [Disapproved](#disapproved), [Inactive](#inactive).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The ad extension passed editorial review.|
|<a name="activelimited"></a>ActiveLimited|The ad extension passed editorial review in one or more markets, and one or more elements of the ad extension is undergoing editorial review in another market. For example the ad extension passed editorial review for Canada and is still pending review in the United States.|
|<a name="disapproved"></a>Disapproved|The ad extension failed editorial review.|
|<a name="inactive"></a>Inactive|One or more elements of the ad extension is undergoing editorial review.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdExtensionAssociation](adextensionassociation.md)  
