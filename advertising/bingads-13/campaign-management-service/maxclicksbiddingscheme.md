---
title: MaxClicksBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that represents the maximum clicks bid strategy type.
---
# MaxClicksBiddingScheme Data Object - Campaign Management
Defines an object that represents the maximum clicks bid strategy type.  

With the *MaxClicks* bid strategy, you don't need to set ad group or keyword bids. Microsoft Advertising automatically sets your bids in real time to get as many clicks as possible within your budget.

Microsoft Advertising will always respect your overall budget limit. With a portfolio bid strategy, you can also set an optional maximum CPC (cost per click) to limit the amount spent on each individual click. For non-portfolio campaigns, you can only edit or remove an existing Max CPC value; you cannot add a new value.

> [!IMPORTANT] 
> For some bid strategy types your bid and ad rotation settings are ignored and conversion tracking (via [Universal Event Tracking](../guides/universal-event-tracking.md) tag and a conversion goal) is required. For more information including supported locations, see [Let Microsoft Advertising manage your bids with bid strategies](https://help.ads.microsoft.com/#apex/3/en/56786/1). 

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="MaxClicksBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxCpc" nillable="true" type="tns:Bid" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "MaxClicks",
  "MaxCpc": {
    "Amount": DoubleValueHere
  }
}
```

-----

## <a name="elements"></a>Elements

The [MaxClicksBiddingScheme](maxclicksbiddingscheme.md) object has the following elements: [MaxCpc](#maxcpc).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxcpc"></a>MaxCpc|The maximum cost per click that you want to spend.<br/><br/>For non-portfolio campaigns, you can only edit or remove an existing MaxCpc value. Attempting to add a new value returns error [MaxCpcCannotBeAdded](../guides/operation-error-codes.md#maxcpccannotbeadded) (611274). Portfolio bid strategies continue to support MaxCpc.<br/><br/>**Add:** Optional for portfolio bid strategies; not supported for non-portfolio campaigns.<br/>**Update:** Optional. For non-portfolio campaigns, only an existing value can be edited or removed.|[Bid](bid.md)|

The [MaxClicksBiddingScheme](maxclicksbiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [MaxClicksBiddingScheme](maxclicksbiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [MaxClicksBiddingScheme](maxclicksbiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme.<br/><br/>This value is *MaxClicksBiddingScheme* when you retrieve a maximum clicks bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  
