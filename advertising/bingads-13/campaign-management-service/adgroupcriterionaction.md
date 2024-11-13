---
title: AdGroupCriterionAction Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the action to apply to a BiddableAdGroupCriterion or NegativeAdGroupCriterion, specifically one that contains a ProductPartition.
---
# AdGroupCriterionAction Data Object - Campaign Management
Defines the action to apply to a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md), specifically one that contains a [ProductPartition](productpartition.md). You can send a group of [AdGroupCriterionAction](adgroupcriterionaction.md) objects, also known as a product group, to the [ApplyProductPartitionActions](applyproductpartitionactions.md) service operation.

# [XML](#tab/xml)

```xml
<xs:complexType name="AdGroupCriterionAction" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="Action" type="tns:ItemAction" />
    <xs:element minOccurs="0" name="AdGroupCriterion" nillable="true" type="tns:AdGroupCriterion" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Action": "ValueHere",
  "AdGroupCriterion": {
    "AdGroupId": "LongValueHere",
    "Criterion": {
      "Type": "AgeCriterion",
      "AgeRange": "ValueHere"
    },
    "Id": "LongValueHere",
    "Status": "ValueHere",
    "Type": "BiddableAdGroupCriterion",
    "CriterionBid": {
      "Type": "BidMultiplier",
      "Multiplier": DoubleValueHere
    },
    "CriterionCashback": {
      "Type": "CashbackAdjustment",
      "CashbackPercent": DoubleValueHere
    },
    "DestinationUrl": "ValueHere",
    "EditorialStatus": "ValueHere",
    "FinalAppUrls": [
      {
        "OsType": "ValueHere",
        "Url": "ValueHere"
      }
    ],
    "FinalMobileUrls": [
      "ValueHere"
    ],
    "FinalUrls": [
      "ValueHere"
    ],
    "FinalUrlSuffix": "ValueHere",
    "TrackingUrlTemplate": "ValueHere",
    "UrlCustomParameters": {
      "Parameters": [
        {
          "Key": "ValueHere",
          "Value": "ValueHere"
        }
      ]
    }
  }
}
```

-----

## <a name="elements"></a>Elements

The [AdGroupCriterionAction](adgroupcriterionaction.md) object has the following elements: [Action](#action), [AdGroupCriterion](#adgroupcriterion).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="action"></a>Action|The action to be applied for the *AdGroupCriterion*.|[ItemAction](itemaction.md)|
|<a name="adgroupcriterion"></a>AdGroupCriterion|The [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md), either of which must contain a [ProductPartition](productpartition.md) criterion.<br/><br/>For the Update action, only the *CriterionBid* and *DestinationUrl* elements of the *AdGroupCriterion* are mutable. To update the order or structure of the product group, you cannot use the update action. You must delete ad group criterions and then add new product partitions instead.|[AdGroupCriterion](adgroupcriterion.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyHotelGroupActions](applyhotelgroupactions.md)  
[ApplyProductPartitionActions](applyproductpartitionactions.md)  
