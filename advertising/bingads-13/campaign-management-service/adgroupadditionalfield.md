---
title: AdGroupAdditionalField Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a list of optional ad group properties that you can request when calling GetAdGroupsByCampaignId and GetAdGroupsByIds.
---
# AdGroupAdditionalField Value Set - Campaign Management
Defines a list of optional ad group properties that you can request when calling [GetAdGroupsByCampaignId](getadgroupsbycampaignid.md) and [GetAdGroupsByIds](getadgroupsbyids.md). The additional field values enable you to get the latest features using the current version of Campaign Management API, and in the next version the corresponding properties will be included in the ad group by default. 

## Syntax
```xml
<xs:simpleType name="AdGroupAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="AdScheduleUseSearcherTimeZone" />
        <xs:enumeration value="AdGroupType" />
        <xs:enumeration value="CpvBid" />
        <xs:enumeration value="CpmBid" />
        <xs:enumeration value="MultimediaAdsBidAdjustment" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdGroupAdditionalField](adgroupadditionalfield.md) value set has the following values: [AdGroupType](#adgrouptype), [AdScheduleUseSearcherTimeZone](#adscheduleusesearchertimezone), [CpmBid](#cpmbid), [CpvBid](#cpvbid), [MultimediaAdsBidAdjustment](#multimediaadsbidadjustment).

|Value|Description|
|-----------|---------------|
|<a name="adgrouptype"></a>AdGroupType|Request that the [AdGroupType](adgroup.md#adgrouptype) element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="adscheduleusesearchertimezone"></a>AdScheduleUseSearcherTimeZone|Request that the [AdScheduleUseSearcherTimeZone](adgroup.md#adscheduleusesearchertimezone) element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="cpmbid"></a>CpmBid|Request that the [CpmBid](adgroup.md#cpmbid) element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="cpvbid"></a>CpvBid|Request that the [CpvBid](adgroup.md#cpvbid) element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="multimediaadsbidadjustment"></a>MultimediaAdsBidAdjustment|Request that the MultimediaAdsBidAdjustment element be included within each returned [AdGroup](adgroup.md) object.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAdGroupsByCampaignId](getadgroupsbycampaignid.md)  
[GetAdGroupsByIds](getadgroupsbyids.md)  
