---
title: BiddableCampaignCriterion Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a biddable criterion that you want applied to the specified campaign.(test)
---
# BiddableCampaignCriterion Data Object Test - Campaign Management
Defines a biddable criterion that you want applied to the specified campaign.

# [XML](#tab/xml)

```xml
<xs:complexType name="BiddableCampaignCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:CampaignCriterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="CriterionBid" nillable="true" type="tns:CriterionBid" />
        <xs:element minOccurs="0" name="CriterionCashback" nillable="true" type="tns:CriterionCashback">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CampaignId": "ValueHere",
  "Criterion": {
    "Type": "AgeCriterion",
    "AgeRange": "ValueHere"
  },
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "ValueHere",
  "Status": "ValueHere",
  "Type": "BiddableCampaignCriterion",
  "CriterionBid": {
    "Type": "BidMultiplier",
    "Multiplier": "ValueHere"
  },
  "CriterionCashback": {
    "Type": "CashbackAdjustment",
    "CashbackPercent": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [BiddableCampaignCriterion](biddablecampaigncriterion.md) object has the following elements: [CriterionBid](#criterionbid), [CriterionCashback](#criterioncashback).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="criterionbid"></a>CriterionBid|The bid to use in the auction.<br/><br/>If the inherited [Criterion](#criterion) is a [ProductScope](productscope.md) criterion, then you can use a [FixedBid](fixedbid.md). For all other biddable campaign criterions use the [BidMultiplier](bidmultiplier.md). If you do not use the correct object type, then your requested bid will be ignored: If the bid is required, the operation will fail; If the bid is optional, the default bid will be used.<br/><br/>**Add:** Requirements vary depending on the inherited [Criterion](#criterion) type. The bid is optional and will be set to the default of *0* if not included for [AgeCriterion](agecriterion.md), [DayTimeCriterion](daytimecriterion.md), [DeviceCriterion](devicecriterion.md), [GenderCriterion](gendercriterion.md), [LocationCriterion](locationcriterion.md), [ProfileCriterion](profilecriterion.md), and [RadiusCriterion](radiuscriterion.md). The bid is not applicable for [LocationIntentCriterion](locationintentcriterion.md) and [ProductScope](productscope.md) (The service will not return any error and the bid will be ignored even if you include it).<br/>**Update:** Requirements vary depending on the inherited [Criterion](#criterion) type. The bid is required for [AgeCriterion](agecriterion.md), [DayTimeCriterion](daytimecriterion.md), [DeviceCriterion](devicecriterion.md), [GenderCriterion](gendercriterion.md), [LocationCriterion](locationcriterion.md), [ProfileCriterion](profilecriterion.md), and [RadiusCriterion](radiuscriterion.md). The bid is not applicable for [LocationIntentCriterion](locationintentcriterion.md) and [ProductScope](productscope.md) (The service will not return any error and the bid will be ignored even if you include it).|[CriterionBid](criterionbid.md)|
|<a name="criterioncashback"></a>CriterionCashback|Reserved.|[CriterionCashback](criterioncashback.md)|

The [BiddableCampaignCriterion](biddablecampaigncriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscampaigncriterion"></a>Inherited Elements from CampaignCriterion
The [BiddableCampaignCriterion](biddablecampaigncriterion.md) object derives from the [CampaignCriterion](campaigncriterion.md) object, and inherits the following elements: [CampaignId](#campaignid), [Criterion](#criterion), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [Type](#type). The descriptions below are specific to [BiddableCampaignCriterion](biddablecampaigncriterion.md), and might not apply to other objects that inherit the same elements from the [CampaignCriterion](campaigncriterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign to apply the criterion to.<br/><br/>**Add:** Required<br/>**Update:** Required|**long**|
|<a name="criterion"></a>Criterion|The criterion to apply to the campaign. The criterion helps determine whether ads in the campaign are served.<br/><br/>For a list of available criterion types, see [CampaignCriterionType](campaigncriteriontype.md).<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[Criterion](criterion.md)|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the campaign criterion.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="status"></a>Status|A status value that determines whether the criterion applies for the campaign.<br/><br/>Currently the only supported status for biddable campaign criterions is *Active*.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[CampaignCriterionStatus](campaigncriterionstatus.md)|
|<a name="type"></a>Type|The type of the campaign criterion. This value is *BiddableCampaignCriterion* when you retrieve a biddable campaign criterion. For more information about campaign criterion types, see the [CampaignCriterion Data Object Remarks](campaigncriterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

