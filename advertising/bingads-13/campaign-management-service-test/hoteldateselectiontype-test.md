---
title: HotelDateSelectionType Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Possible hotel date selection types.(test)
---
# HotelDateSelectionType Value Set Test - Campaign Management
Possible hotel date selection types.

## Syntax
```xml
<xs:simpleType name="HotelDateSelectionType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="DefaultSelection" />
    <xs:enumeration value="UserSelection" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [HotelDateSelectionType](hoteldateselectiontype.md) value set has the following values: [DefaultSelection](#defaultselection), [Unknown](#unknown), [UserSelection](#userselection).

|Value|Description|
|-----------|---------------|
|<a name="defaultselection"></a>DefaultSelection|The dates selected by default.|
|<a name="unknown"></a>Unknown|Returned when the value is unknown.|
|<a name="userselection"></a>UserSelection|The dates selected by the user.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[HotelDateSelectionTypeCriterion](hoteldateselectiontypecriterion.md)  
