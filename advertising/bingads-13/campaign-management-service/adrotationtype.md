---
title: AdRotationType Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible ad rotation types that you can apply to an ad group.
---
# AdRotationType Value Set - Campaign Management
Defines the possible ad rotation types that you can apply to an ad group. 

For ad groups with more than one ad, these options determine how the ads are rotated into the auction.

## Syntax
```xml
<xs:simpleType name="AdRotationType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="OptimizeForClicks" />
    <xs:enumeration value="RotateAdsEvenly" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdRotationType](adrotationtype.md) value set has the following values: [OptimizeForClicks](#optimizeforclicks), [RotateAdsEvenly](#rotateadsevenly).

|Value|Description|
|-----------|---------------|
|<a name="optimizeforclicks"></a>OptimizeForClicks|Microsoft Advertising prioritizes the ad from the ad group that appears to have the best chance of performing well, based on auction characteristics or factors, such as keyword, search term, device or location. Better-performing ads will show more frequently, and others will be served less often, if at all.<br/><br/>This is the default.|
|<a name="rotateadsevenly"></a>RotateAdsEvenly|Microsoft Advertising provides more balance in rotation between your ads. That is, the ads in a particular ad group have a similar chance of being displayed in response to a searcher's query. Ads are prioritized lower if they have lower ad quality, and therefore might display less often, or not at all.<br/><br/>This setting can allow lower-performing ads to display as often as better-performing ads. This might impact ad group performance.<br/><br/>This setting will be ignored if you use an automated bid strategy i.e., *MaxClicks*, *MaxConversions*, *TargetCpa*, or *TargetRoas*, as these bid strategies prioritize better-performing ads.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRotation](adrotation.md)  
