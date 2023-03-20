---
title: HotelAdvanceBookingWindowCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Criterion for the number of days the booking is made prior to the hotel stay.
---
# HotelAdvanceBookingWindowCriterion Data Object - Campaign Management
Criterion for the number of days the booking is made prior to the hotel stay.

## Syntax
```xml
<xs:complexType name="HotelAdvanceBookingWindowCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxDays" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="MinDays" nillable="true" type="xs:int" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [HotelAdvanceBookingWindowCriterion](hoteladvancebookingwindowcriterion.md) object has the following elements: [MaxDays](#maxdays), [MinDays](#mindays).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxdays"></a>MaxDays|Maxmimum of days prior to the hotel stay. *Note*: This can't be more than 330.|**int**|
|<a name="mindays"></a>MinDays|Minimum number of days prior to the hotel stay.|**int**|

The [HotelAdvanceBookingWindowCriterion](hoteladvancebookingwindowcriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [HotelAdvanceBookingWindowCriterion](hoteladvancebookingwindowcriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [HotelAdvanceBookingWindowCriterion](hoteladvancebookingwindowcriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *HotelAdvanceBookingWindow* when you retrieve a hotel advance booking window criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

