---
title: AdGroupPrivacyStatus Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines possible values for ad group privacy status in Audience campaigns.
ms.subservice: campaign-management-api
---
# AdGroupPrivacyStatus Value Set - Campaign Management
Defines possible values for ad group privacy status in Audience campaigns.

## Syntax
```xml
<xs:simpleType name="AdGroupPrivacyStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="Active" />
    <xs:enumeration value="TargetingTooNarrow" />
    <xs:enumeration value="Pending" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdGroupPrivacyStatus](adgroupprivacystatus.md) value set has the following values: [Active](#active), [Pending](#pending), [TargetingTooNarrow](#targetingtoonarrow), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The ad group is eligible to serve.|
|<a name="pending"></a>Pending|The privacy evaluation is still in progress, and the ad group is not yet eligible to serve.|
|<a name="targetingtoonarrow"></a>TargetingTooNarrow|The ad group is not eligible to serve because your ad group target criteria e.g., [ProfileCriterion](profilecriterion.md) are too narrowly defined. Update your target criteria or remarketing lists to broaden your audience and increase estimated unique users.|
|<a name="unknown"></a>Unknown|Reserved for future use.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
