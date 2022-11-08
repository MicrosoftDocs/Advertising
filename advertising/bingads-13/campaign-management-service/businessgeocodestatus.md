---
title: BusinessGeoCodeStatus Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible status values that indicate the progress of determining the latitude and longitude values of a business.
ms.subservice: campaign-management-api
---
# BusinessGeoCodeStatus Value Set - Campaign Management
Defines the possible status values that indicate the progress of determining the latitude and longitude values of a business.

## Syntax
```xml
<xs:simpleType name="BusinessGeoCodeStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Pending" />
    <xs:enumeration value="Complete" />
    <xs:enumeration value="Invalid" />
    <xs:enumeration value="Failed" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BusinessGeoCodeStatus](businessgeocodestatus.md) value set has the following values: [Complete](#complete), [Failed](#failed), [Invalid](#invalid), [Pending](#pending).

|Value|Description|
|-----------|---------------|
|<a name="complete"></a>Complete|Successfully determined the latitude and longitude of the business.|
|<a name="failed"></a>Failed|Unable to determine the latitude and longitude of the business.|
|<a name="invalid"></a>Invalid|Unable to determine the latitude and longitude of the business, possibly because the address did not resolve.|
|<a name="pending"></a>Pending|In the process of determining the latitude and longitude of the business.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[LocationAdExtension](locationadextension.md)  
