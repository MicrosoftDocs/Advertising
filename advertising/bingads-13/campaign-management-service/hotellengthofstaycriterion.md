---
title: HotelLengthOfStayCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Criterion for length of hotel stay in nights.
---
# HotelLengthOfStayCriterion Data Object - Campaign Management
Criterion for length of hotel stay in nights.

## Syntax
```xml
<xs:complexType name="HotelLengthOfStayCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxNights" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="MinNights" nillable="true" type="xs:int" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [HotelLengthOfStayCriterion](hotellengthofstaycriterion.md) object has the following elements: [MaxNights](#maxnights), [MinNights](#minnights).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxnights"></a>MaxNights|Maxmimum of nights prior to the hotel stay. *Note*: This can't be more than 30.|**int**|
|<a name="minnights"></a>MinNights|Minimum of days prior to the hotel stay. |**int**|

The [HotelLengthOfStayCriterion](hotellengthofstaycriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [HotelLengthOfStayCriterion](hotellengthofstaycriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [HotelLengthOfStayCriterion](hotellengthofstaycriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *HotelLengthOfStay* when you retrieve a hotel length of stay criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

