---
title: ProductScope Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a campaign level product scope with list of conditions that help determine which items from your catalog to include in the campaign e.g., filter by brand or condition.
---
# ProductScope Data Object - Campaign Management
Defines a campaign level product scope with list of conditions that help determine which items from your catalog to include in the campaign e.g., filter by brand or condition.

You can use campaign product scopes with both Shopping campaigns and feed-based Audience campaigns i.e., those campaigns that leverage a Microsoft Merchant Center [store ID](shoppingsetting.md#storeid). 

> [!NOTE]
> Product scope conditions are not supported with smart shopping campaigns i.e., campaigns with [CampaignType](campaign.md#campaigntype) set to *Shopping* and [SubType](campaign.md#subtype) set to *ShoppingSmartAds*.  

The *ProductScope* criterion can only be included within [BiddableCampaignCriterion](biddablecampaigncriterion.md). Also note that ad group level [ProductPartition](productpartition.md) can be added to [BiddableAdGroupCriterion](biddableadgroupcriterion.md) and [NegativeAdGroupCriterion](negativeadgroupcriterion.md). Duplicate or conflicting product conditions attempted within an ad group's [ProductPartition](productpartition.md) group will fail via the [ApplyProductPartitionActions](applyproductpartitionactions.md) operation; however, the operation will not validate whether duplicate or conflicting conditions already exist within the campaign level product scope.

## Syntax
```xml
<xs:complexType name="ProductScope" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="Conditions" nillable="true" type="tns:ArrayOfProductCondition" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ProductScope](productscope.md) object has the following elements: [Conditions](#conditions).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="conditions"></a>Conditions|A list of up to 7 product conditions that helps determine whether a product from the Microsoft Merchant Center store gets served as an ad.<br/><br/>Product conditions might not be returned in the order that you submitted them.<br/><br/>The available *Attribute* and *Operand* values vary depending on the campaign type. For supported attribute and operand values, see [ProductCondition Remarks](productcondition.md#remarks).<br/><br/>Conditions might not be returned in the order that you submitted them.<br/><br/>**Add:** Required<br/>**Update:** Required|[ProductCondition](productcondition.md) array|

The [ProductScope](productscope.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [ProductScope](productscope.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ProductScope](productscope.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *ProductScope* when you retrieve a product scope criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

