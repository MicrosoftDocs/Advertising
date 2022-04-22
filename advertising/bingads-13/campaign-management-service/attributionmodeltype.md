---
title: AttributionModelType Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Reserved.
---
# AttributionModelType Value Set - Campaign Management
Determines which attribution model, _LastTouch_ or _LastClick_, is used with a conversion goal.

## Syntax
```xml
<xs:simpleType name="AttributionModelType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="LastClick" />
    <xs:enumeration value="LastTouch" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AttributionModelType](attributionmodeltype.md) value set has the following values: [LastClick](#lastclick), [LastTouch](#lasttouch).

|Value|Description|
|-----------|---------------|
|<a name="lastclick"></a>LastClick|View-through conversions are excluded from the "Conversions" column and reported separately under "View-through conversions" and "All conversions." <br /><br />This is the default attribution model type.|
|<a name="lasttouch"></a>LastTouch|View-through conversion are included in the "Conversions" column. <br /><br />The LastTouch attribution model is only available for Audience Workflow (AWF) campaigns.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionGoal](conversiongoal.md)  
