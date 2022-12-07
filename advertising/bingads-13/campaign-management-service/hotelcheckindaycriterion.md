---
title: HotelCheckInDayCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Criterion for day of the week the booking is for.
ms.subservice: campaign-management-api
---
# HotelCheckInDayCriterion Data Object - Campaign Management
Criterion for day of the week the booking is for.

## Syntax
```xml
<xs:complexType name="HotelCheckInDayCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="CheckInDay" nillable="true" type="tns:Day" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [HotelCheckInDayCriterion](hotelcheckindaycriterion.md) object has the following elements: [CheckInDay](#checkinday).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="checkinday"></a>CheckInDay|The day of the week for check in.|[Day](day.md)|

The [HotelCheckInDayCriterion](hotelcheckindaycriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [HotelCheckInDayCriterion](hotelcheckindaycriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [HotelCheckInDayCriterion](hotelcheckindaycriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *HotelCheckInDay* when you retrieve a hotel check in day criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

