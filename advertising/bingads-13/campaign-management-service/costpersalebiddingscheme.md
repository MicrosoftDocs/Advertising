---
title: CostPerSaleBiddingScheme Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that represents the cost per sale bid strategy type.
---
# CostPerSaleBiddingScheme Data Object - Campaign Management
Defines an object that represents the cost per sale bid strategy type.

## Syntax
```xml
<xs:complexType name="CostPerSaleBiddingScheme" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:BiddingScheme">
      <xs:sequence>
        <xs:element minOccurs="0" name="TargetCostPerSale" nillable="true" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CostPerSaleBiddingScheme](costpersalebiddingscheme.md) object has the following elements: [TargetCostPerSale](#targetcostpersale).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="targetcostpersale"></a>TargetCostPerSale|The target cost per sale that you want used by Microsoft Advertising to maximize conversions.|**double**|

The [CostPerSaleBiddingScheme](costpersalebiddingscheme.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbiddingscheme"></a>Inherited Elements from BiddingScheme
The [CostPerSaleBiddingScheme](costpersalebiddingscheme.md) object derives from the [BiddingScheme](biddingscheme.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [CostPerSaleBiddingScheme](costpersalebiddingscheme.md), and might not apply to other objects that inherit the same elements from the [BiddingScheme](biddingscheme.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the bidding scheme.<br/><br/>This value is *CostPerSaleBiddingScheme* when you retrieve a cost per sale bidding scheme. For more information about bidding scheme types, see the [BiddingScheme Data Object Remarks](biddingscheme.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

