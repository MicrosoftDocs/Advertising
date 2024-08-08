---
title: HotelCheckInDateCriterion Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Criterion for a check-in date range.(test)
---
# HotelCheckInDateCriterion Data Object Test - Campaign Management
Criterion for a check-in date range.

# [XML](#tab/xml)

```xml
<xs:complexType name="HotelCheckInDateCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="EndDate" nillable="true" type="xs:dateTime" />
        <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "HotelCheckInDateCriterion",
  "EndDate": "ValueHere",
  "StartDate": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HotelCheckInDateCriterion](hotelcheckindatecriterion.md) object has the following elements: [EndDate](#enddate), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="enddate"></a>EndDate|End date in the YYYY-MM-DD format.|**dateTime**|
|<a name="startdate"></a>StartDate|Start date in the YYYY-MM-DD format.|**dateTime**|

The [HotelCheckInDateCriterion](hotelcheckindatecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [HotelCheckInDateCriterion](hotelcheckindatecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [HotelCheckInDateCriterion](hotelcheckindatecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *HotelCheckInDate* when you retrieve a hotel check in date criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

