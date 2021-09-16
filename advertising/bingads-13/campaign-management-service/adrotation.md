---
title: AdRotation Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines an object that specifies the type of ad rotation to apply to the ad group.
---
# AdRotation Data Object - Campaign Management
Defines an object that specifies the type of ad rotation to apply to the ad group.

## Syntax
```xml
<xs:complexType name="AdRotation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="tns:AdRotationType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AdRotation](adrotation.md) object has the following elements: [EndDate](#enddate), [StartDate](#startdate), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="enddate"></a>EndDate|Reserved for future use only. Must be null.|**dateTime**|
|<a name="startdate"></a>StartDate|Reserved for future use only. Must be null.|**dateTime**|
|<a name="type"></a>Type|The type of ad rotation to apply to the ad group.<br/><br/>Ad rotation sets how often Microsoft Advertising selects which ads to serve, if you have multiple ads within an ad group. Since no more than one ad from your account can show at a time, ad rotation prioritizes ads that appear statistically more likely to perform better.<br/><br/>**Note**: Ad rotation does not apply to Product Ads.<br/><br/>Possible values are *OptimizeForClicks* and *RotateAdsEvenly*.<br/><br/>If set to *OptimizeForClicks*, Microsoft Advertising prioritizes the ad from the ad group that appears to have the best chance of performing well, based on auction characteristics or factors, such as keyword, search term, device or location. Better-performing ads will show more frequently, and others will be served less often, if at all.<br/><br/>If set to *RotateAdsEvenly*, Microsoft Advertising provides more balance in rotation between your ads. That is, the ads in a particular ad group have a similar chance of being displayed in response to a searcher's query. Ads are prioritized lower if they have lower ad quality, and therefore might display less often, or not at all.<br/>- The *RotateAdsEvenly* setting can allow lower-performing ads to display as often as better-performing ads. This might impact ad group performance.<br/>- The *RotateAdsEvenly* setting will be ignored if you use an automated bid strategy i.e., *MaxClicks*, *MaxConversions*, *TargetCpa*, or *TargetRoas*, as these bid strategies prioritize better-performing ads.<br/><br/>**Add:** Optional. If not specified, the default value is *OptimizeForClicks*.<br/>**Update:** Optional|[AdRotationType](adrotationtype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
