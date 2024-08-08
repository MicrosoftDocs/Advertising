---
title: UetTagTrackingStatus Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible system-determined status values of a UET tag.(test)
---
# UetTagTrackingStatus Value Set Test - Campaign Management
Defines the possible system-determined status values of a UET tag. These are the status values that can be set by the system, for example the system sets the status to *Unverified* if the UET tag has not yet been verified. 

> [!NOTE]
> The *UetTagTrackingStatus* in part influences the system-determined [ConversionGoalTrackingStatus](conversiongoaltrackingstatus.md) of any [ConversionGoal](conversiongoal.md) that is associated with the [UetTag](uettag.md). If the *UetTagTrackingStatus* is *Active* then the [ConversionGoalTrackingStatus](conversiongoaltrackingstatus.md) can be either *NoRecentConversions* or *RecordingConversions*, and otherwise the conversion goal tracking status mirrors the tag status.  

## Syntax
```xml
<xs:simpleType name="UetTagTrackingStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unverified" />
    <xs:enumeration value="Active" />
    <xs:enumeration value="Inactive" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [UetTagTrackingStatus](uettagtrackingstatus.md) value set has the following values: [Active](#active), [Inactive](#inactive), [Unverified](#unverified).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active| Your UET tag is working and sending user activity data to Microsoft Advertising.|
|<a name="inactive"></a>Inactive|Microsoft Advertising has not received any user activity data from the UET tag in the last 24 hours. Make sure that the UET tag tracking code is still on your website.|
|<a name="unverified"></a>Unverified|Microsoft Advertising hasn't received any user activity data from the UET tag on your website. It can take up to 24 hours for Microsoft Advertising to verify. If you still see this status, you either have not added the UET tag tracking code to your website or there is an issue with the setup that you need to fix.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[UetTag](uettag.md)  
