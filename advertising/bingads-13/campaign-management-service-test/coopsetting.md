---
title: CoOpSetting Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the ad group level settings for feed-based Microsoft Shopping Campaigns.(test)
---
# CoOpSetting Data Object Test - Campaign Management
Defines the ad group level settings for feed-based Microsoft Shopping Campaigns.

> [!NOTE]
> This object is reserved for internal use, and will be removed in a future API version.  

# [XML](#tab/xml)

```xml
<xs:complexType name="CoOpSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="BidBoostValue" nillable="true" type="xs:double" />
        <xs:element minOccurs="0" name="BidMaxValue" nillable="true" type="xs:double" />
        <xs:element minOccurs="0" name="BidOption" nillable="true" type="tns:BidOption" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "CoOpSetting",
  "BidBoostValue": "DoubleValueHere",
  "BidMaxValue": "DoubleValueHere",
  "BidOption": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CoOpSetting](coopsetting.md) object has the following elements: [BidBoostValue](#bidboostvalue), [BidMaxValue](#bidmaxvalue), [BidOption](#bidoption).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="bidboostvalue"></a>BidBoostValue|The default bid boost percentage that you'll see in the Microsoft Advertising web application for new product groups.<br/><br/>This ad group level target setting is not used directly in the auction. The product group bids are used to boost your partner's bid.<br/><br/>**Add:** Required if the [BidOption](#bidoption) is set to BidBoost, and otherwise you may not set this element.<br/>**Update:** Required if the [BidOption](#bidoption) is set to BidBoost, and otherwise you may not set this element.|**double**|
|<a name="bidmaxvalue"></a>BidMaxValue|The fixed bid maximum.<br/><br/>**Add:** Required if the [BidOption](#bidoption) is set to BidBoost, and otherwise you may not set this element.<br/>**Update:** Optional if the [BidOption](#bidoption) is set to BidBoost, and otherwise you may not set this element.|**double**|
|<a name="bidoption"></a>BidOption|Determines whether or not to amplify your partner's bid.<br/><br/>A bid value ad group allows you to bid on products that your merchandising partner doesn't target. If this element is set to BidValue, the auction will use use a [FixedBid](fixedbid.md) for product groups that have a [CriterionBid](biddableadgroupcriterion.md#criterionbid).<br/><br/>A bid boost allows you to amplify your partner's bid. If this element is set to BidBoost, the auction will use use a [BidMultiplier](bidmultiplier.md) for product groups that have a [CriterionBid](biddableadgroupcriterion.md#criterionbid). You should only use BidBoost if your partner uses BidValue.<br/><br/>**Add:** If this element is not set, the default bid option is BidValue.<br/>**Update:** Read-only. If you attempt to change the previous bid option an error will be returned.|[BidOption](bidoption.md)|

The [CoOpSetting](coopsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [CoOpSetting](coopsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [CoOpSetting](coopsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the setting.<br/><br/>This value is *CoOp* when you retrieve a CoOp setting. For more information about setting types, see the [Setting Data Object Remarks](setting.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

