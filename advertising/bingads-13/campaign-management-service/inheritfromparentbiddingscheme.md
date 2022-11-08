---
title: InheritFromParentBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that represents the inherit from parent bid strategy type.
ms.subservice: campaign-management-api
---
# InheritFromParentBiddingScheme Data Object - Campaign Management
Defines an object that represents the inherit from parent bid strategy type.

This is the default bid strategy type for your ad groups and keywords. Use this bid strategy type to inherit the bid strategy type of the respective parent campaign or ad group.

## Syntax
```xml
<xs:complexType name="InheritFromParentBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="InheritedBidStrategyType" nillable="true" type="xs:string">
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

## <a name="elements"></a>Elements

The [InheritFromParentBiddingScheme](inheritfromparentbiddingscheme.md) object has the following elements: [InheritedBidStrategyType](#inheritedbidstrategytype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="inheritedbidstrategytype"></a>InheritedBidStrategyType|The type of bidding scheme (a.k.a. bid strategy type) that is inherited from the parent campaign or ad group.<br/><br/>This value is equal to the *Type* element of the parent campaign or ad group's [BiddingScheme](biddingscheme.md) object. Possible values include *EnhancedCpc*, *ManualCpc*, *MaxClicks*, *MaxConversions*, *MaxConversionValue*, *TargetCpa*, *TargetImpressionShare*, and *TargetRoas*. New bid strategy types might be added in the future, so you should not take any dependency on a fixed set of values.|**string**|

The [InheritFromParentBiddingScheme](inheritfromparentbiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [InheritFromParentBiddingScheme](inheritfromparentbiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [InheritFromParentBiddingScheme](inheritfromparentbiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme. This value is *InheritFromParentBiddingScheme* when you retrieve an "inherit from parent" bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

