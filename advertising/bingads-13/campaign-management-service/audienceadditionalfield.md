---
title: AudienceAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a list of optional audience properties that you can request when calling GetAudiencesByIds.
---
# AudienceAdditionalField Value Set - Campaign Management
Defines a list of optional audience properties that you can request when calling [GetAudiencesByIds](getaudiencesbyids.md#returnadditionalfields). The additional field values enable you to get the latest features using the current version of Campaign Management API, and in the next version the corresponding properties will be included in the audience by default.  

## Syntax
```xml
<xs:simpleType name="AudienceAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="NormalForm" />
        <xs:enumeration value="NumberRuleItem" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AudienceAdditionalField](audienceadditionalfield.md) value set has the following values: [NormalForm](#normalform), [NumberRuleItem](#numberruleitem).

|Value|Description|
|-----------|---------------|
|<a name="normalform"></a>NormalForm|Request that the [NormalForm](pagevisitorsrule.md#normalform) element be included within each returned [PageVisitorsRule](pagevisitorsrule.md) object.|
|<a name="numberruleitem"></a>NumberRuleItem|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAudiencesByIds](getaudiencesbyids.md)  
