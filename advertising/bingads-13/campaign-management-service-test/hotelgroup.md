---
title: HotelGroup Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that organizes your hotel ads.(test)
---
# HotelGroup Data Object Test - Campaign Management
Defines an object that organizes your hotel ads.

# [XML](#tab/xml)

```xml
<xs:complexType name="HotelGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="Listing" nillable="true" type="tns:HotelListing" />
        <xs:element name="ListingType" type="tns:HotelListingType" />
        <xs:element minOccurs="0" name="ParentCriterionId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "HotelGroup",
  "Listing": {
    "Attribute": "ValueHere",
    "Operand": "ValueHere"
  },
  "ListingType": "ValueHere",
  "ParentCriterionId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HotelGroup](hotelgroup.md) object has the following elements: [Listing](#listing), [ListingType](#listingtype), [ParentCriterionId](#parentcriterionid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="listing"></a>Listing|Defines a hotel listing.|[HotelListing](hotellisting.md)|
|<a name="listingtype"></a>ListingType|Defines the type of hotel listing.|[HotelListingType](hotellistingtype.md)|
|<a name="parentcriterionid"></a>ParentCriterionId|The ID of the parent criterion.|**long**|

The [HotelGroup](hotelgroup.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [HotelGroup](hotelgroup.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [HotelGroup](hotelgroup.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *HotelGroup* when you retrieve a hotel group criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

