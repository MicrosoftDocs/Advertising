---
title: ProductPartition Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an ad group level product partition with one condition that helps determine whether a product from the Microsoft Merchant Center store gets served as a product ad.
---
# ProductPartition Data Object - Campaign Management
Defines an ad group level product partition with one condition that helps determine whether a product from the Microsoft Merchant Center store gets served as a product ad.

The *ProductPartition* criterion can be included within [BiddableAdGroupCriterion](biddableadgroupcriterion.md) and [NegativeAdGroupCriterion](negativeadgroupcriterion.md). Also note that campaign level [ProductScope](productscope.md) can be added to [BiddableCampaignCriterion](biddablecampaigncriterion.md). Duplicate or conflicting product conditions attempted within an ad group's product partition group will fail via the [ApplyProductPartitionActions](applyproductpartitionactions.md) operation; however, the operation will not validate whether duplicate or conflicting conditions already exist within the campaign level [ProductScope](productscope.md).

> [!TIP]
> For an implementation overview, see the [Microsoft Shopping Campaigns](../guides/product-ads.md) technical guide.

## Syntax
```xml
<xs:complexType name="ProductPartition" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="Condition" nillable="true" type="tns:ProductCondition" />
        <xs:element minOccurs="0" name="ParentCriterionId" nillable="true" type="xs:long" />
        <xs:element name="PartitionType" type="tns:ProductPartitionType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ProductPartition](productpartition.md) object has the following elements: [Condition](#condition), [ParentCriterionId](#parentcriterionid), [PartitionType](#partitiontype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="condition"></a>Condition|A condition that helps determine whether a product from the Microsoft Merchant Center store gets served as an ad.<br/><br/>Multiple product conditions can be specified by creating a tree of *ProductPartition* objects using [ApplyProductPartitionActions](applyproductpartitionactions.md). For a catalog item to be served as an ad, it must meet all conditions. To get a list of all conditions for an ad group, call [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) with the *AdGroupCriterionIds* element set to null and the *CriterionType* element set to ProductPartition.<br/><br/>**Add:** Required<br/>**Update:** Update is not supported for this object|[ProductCondition](productcondition.md)|
|<a name="parentcriterionid"></a>ParentCriterionId|The identifier of the parent [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md).<br/><br/>This element must be set to null if the product partition represents the root node of a product partition tree.<br/><br/>**Add:** Required<br/>**Update:** Update is not supported for this object<br/>**Delete:** Required|**long**|
|<a name="partitiontype"></a>PartitionType|The type of product partition, for example *Subdivision* or *Unit*.<br/><br/>**Add:** Required<br/>**Update:** Update is not supported for this object|[ProductPartitionType](productpartitiontype.md)|

The [ProductPartition](productpartition.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [ProductPartition](productpartition.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ProductPartition](productpartition.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *ProductPartition* when you retrieve a product partition criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

