---
title: AdGroupAdditionalField Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a list of optional ad group properties that you can request when calling GetAdGroupsByCampaignId and GetAdGroupsByIds.(test)
---
# AdGroupAdditionalField Value Set Test - Campaign Management
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
        <xs:enumeration value="CommissionRate" />
        <xs:enumeration value="PercentCpcBid" />
        <xs:enumeration value="McpaBid" />
        <xs:enumeration value="UseOptimizedTargeting" />
        <xs:enumeration value="FrequencyCapSettings" />
        <xs:enumeration value="UsePredictiveTargeting" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdGroupAdditionalField](adgroupadditionalfield.md) value set has the following values: [AdGroupType](#adgrouptype), [AdScheduleUseSearcherTimeZone](#adscheduleusesearchertimezone), [CommissionRate](#commissionrate), [CpmBid](#cpmbid), [CpvBid](#cpvbid), [FrequencyCapSettings](#frequencycapsettings), [McpaBid](#mcpabid), [MultimediaAdsBidAdjustment](#multimediaadsbidadjustment), [PercentCpcBid](#percentcpcbid), [UseOptimizedTargeting](#useoptimizedtargeting), [UsePredictiveTargeting](#usepredictivetargeting).

|Value|Description|
|-----------|---------------|
|<a name="adgrouptype"></a>AdGroupType|Request that the [AdGroupType](adgroup.md#adgrouptype) element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="adscheduleusesearchertimezone"></a>AdScheduleUseSearcherTimeZone|Request that the [AdScheduleUseSearcherTimeZone](adgroup.md#adscheduleusesearchertimezone) element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="commissionrate"></a>CommissionRate|Reserved.|
|<a name="cpmbid"></a>CpmBid|Request that the [CpmBid](adgroup.md#cpmbid) element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="cpvbid"></a>CpvBid|Request that the [CpvBid](adgroup.md#cpvbid) element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="frequencycapsettings"></a>FrequencyCapSettings|Settings for the frequency cap.|
|<a name="mcpabid"></a>McpaBid|Reserved.|
|<a name="multimediaadsbidadjustment"></a>MultimediaAdsBidAdjustment|Request that the MultimediaAdsBidAdjustment element be included within each returned [AdGroup](adgroup.md) object.|
|<a name="percentcpcbid"></a>PercentCpcBid|Reserved.|
|<a name="useoptimizedtargeting"></a>UseOptimizedTargeting|This will be deprecated. Use *UsePredictiveTargeting* instead.|
|<a name="usepredictivetargeting"></a>UsePredictiveTargeting|Indicates if predictive targeting is enabled for an AdGroup.<br/><br/>*Note*: UsePredictiveTargeting is only available for Audience campaigns.<br/><br/>**Add:** Optional<br/>**Update:** Optional.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAdGroupsByCampaignId](getadgroupsbycampaignid.md)  
[GetAdGroupsByIds](getadgroupsbyids.md)  
