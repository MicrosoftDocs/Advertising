---
title: BidMultiplier Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the multiplier by which to adjust your base bid for the corresponding criterion.
---
# BidMultiplier Data Object - Campaign Management
Defines the multiplier by which to adjust your base bid for the corresponding criterion.

# [XML](#tab/xml)

```xml
<xs:complexType name="BidMultiplier" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:CriterionBid">
      <xs:sequence>
        <xs:element minOccurs="0" name="Multiplier" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "BidMultiplier",
  "Multiplier": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [BidMultiplier](bidmultiplier.md) object has the following elements: [Multiplier](#multiplier).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="multiplier"></a>Multiplier|The percentage amount that you want to adjust the bid for the corresponding criterion. If the campaign uses MaxClicks, MaxConversions, TargetCpa, or TargetRoas bid strategy types, then the multiplier will inform rather than directly modify or override the automated bid.<br/><br/>For most criterion types the valid bid multiplier range is -90 through 900. For exceptions, see [DeviceCriterion Usage](#devicecriterion) and [LocationIntentCriterion Usage](#locationintentcriterion) below.<br/><br/>Although this element supports a double data type, you should use whole integer values i.e., -90 through 900, for parity with the web application.<br/><br/>**Add:** Required<br/>**Update:** Required|**double**|

The [BidMultiplier](bidmultiplier.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterionbid"></a>Inherited Elements from CriterionBid
The [BidMultiplier](bidmultiplier.md) object derives from the [CriterionBid](criterionbid.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [BidMultiplier](bidmultiplier.md), and might not apply to other objects that inherit the same elements from the [CriterionBid](criterionbid.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion bid. This value is *BidMultiplier* when you retrieve a bid multiplier. For more information about criterion types, see the [CriterionBid Data Object Remarks](criterionbid.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## <a name="remarks"></a>Remarks
### <a name="devicecriterion"></a>DeviceCriterion Usage
If the *Criterion* property of the [BiddableCampaignCriterion](biddablecampaigncriterion.md) or [BiddableAdGroupCriterion](biddableadgroupcriterion.md) object is a [DeviceCriterion](devicecriterion.md), please note the following usage of *BidMultiplier* properties.

#### <a name="devicecriterion_multiplier"></a>Multiplier
Supported values are -100 (negative one hundred) through positive 900 (nine hundred) percent. Setting the bid adjustment to -100 percent will result in the exclusion of the corresponding *DeviceName* for the [DeviceCriterion](devicecriterion.md). 

### <a name="locationintentcriterion"></a>LocationIntentCriterion Usage
If the *Criterion* property of the [BiddableCampaignCriterion](biddablecampaigncriterion.md) or [BiddableAdGroupCriterion](biddableadgroupcriterion.md) object is a [LocationIntentCriterion](locationintentcriterion.md), please note the following usage of *BidMultiplier* properties.

#### <a name="locationintentcriterion_multiplier"></a>Multiplier
You cannot bid on a location intent criterion. The service will ignore the multiplier without returning any error.

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

