---
title: TargetImpressionShareBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: An automated bidding strategy to get the target impression share for the ad position where you want your ads to appear.
---
# TargetImpressionShareBiddingScheme Data Object - Campaign Management
An automated bidding strategy to get the target impression share for the ad position where you want your ads to appear.

## Syntax
```xml
<xs:complexType name="TargetImpressionShareBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="MaxCpc" nillable="true" type="tns:Bid" />
        <xs:element minOccurs="0" name="TargetAdPosition" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="TargetImpressionShare" nillable="true" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md) object has the following elements: [MaxCpc](#maxcpc), [TargetAdPosition](#targetadposition), [TargetImpressionShare](#targetimpressionshare).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maxcpc"></a>MaxCpc|This is the maximum amount that you're willing to pay for a click on your ad.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[Bid](bid.md)|
|<a name="targetadposition"></a>TargetAdPosition|This is where on search results pages you want your ads to appear for the target impression share you set.<br/><br/>Possible values include FirstPage, MainLine, and MainLine1.<br/><br/>- FirstPage: In any position on the first search results page.<br/>- MainLine: In the first set of ads that appear on the first search results page.<br/>- MainLine1: The very first ad that appears on the first search results page.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|
|<a name="targetimpressionshare"></a>TargetImpressionShare|The target impression share for the ad position where you want your ads to appear.<br/><br/>**Add:** Required<br/>**Update:** Optional|**double**|

The [TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme.<br/><br/>This value is *TargetImpressionShareBiddingScheme* when you retrieve a target impression share bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

