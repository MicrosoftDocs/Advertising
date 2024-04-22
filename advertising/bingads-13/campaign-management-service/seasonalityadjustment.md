---
title: SeasonalityAdjustment Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for the seasonality adjustment.
---
# SeasonalityAdjustment Data Object - Campaign Management
Defines  data object for the seasonality adjustment.

## Syntax
```xml
<xs:complexType name="SeasonalityAdjustment" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdjustmentPercentage" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="CampaignAssociations" nillable="true" type="tns:ArrayOfCampaignAssociation" />
    <xs:element minOccurs="0" name="CampaignTypeFilter" nillable="true" type="tns:CampaignType" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="DeviceTypeFilter" nillable="true" type="tns:DeviceType" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [SeasonalityAdjustment](seasonalityadjustment.md) object has the following elements: [AdjustmentPercentage](#adjustmentpercentage), [CampaignAssociations](#campaignassociations), [CampaignTypeFilter](#campaigntypefilter), [Description](#description), [DeviceTypeFilter](#devicetypefilter), [EndDate](#enddate), [Id](#id), [Name](#name), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adjustmentpercentage"></a>AdjustmentPercentage|The percentage of the conversion rate adjustment.|**double**|
|<a name="campaignassociations"></a>CampaignAssociations|Make the seasonality adjustment to these campaigns.|[CampaignAssociation](campaignassociation.md) array|
|<a name="campaigntypefilter"></a>CampaignTypeFilter|Make the seasonality adjustment to these campaign types. |[CampaignType](campaigntype.md)|
|<a name="description"></a>Description|A description for the seasonality adjustment.|**string**|
|<a name="devicetypefilter"></a>DeviceTypeFilter|Make the seasonality adjustment to these device types.|[DeviceType](devicetype.md)|
|<a name="enddate"></a>EndDate|The end date.<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|
|<a name="id"></a>Id|The seasonality adjustment ID.|**long**|
|<a name="name"></a>Name|The name of the seasonality adjustment.|**string**|
|<a name="startdate"></a>StartDate|The start date.<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddSeasonalityAdjustments](addseasonalityadjustments.md)  
[GetSeasonalityAdjustmentsByAccountId](getseasonalityadjustmentsbyaccountid.md)  
[GetSeasonalityAdjustmentsByIds](getseasonalityadjustmentsbyids.md)  
[UpdateSeasonalityAdjustments](updateseasonalityadjustments.md)  
