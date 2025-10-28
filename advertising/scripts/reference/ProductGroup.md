---
title: "ProductGroup"
subtitle: "Scripts"
description: "Contains the methods used to manage the product group."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# ProductGroup

The base product group object, which contains the methods used to manage a [product group](/advertising/guides/entity-hierarchy-limits#productgroup).

Example usage:
```javascript
    var shoppingCampaign = AdsApp.shoppingCampaigns().withIds(["123456789"]).get().next();

    var productGroups = shoppingCampaign.productGroups().get();

    while (productGroups.hasNext()) {
        var group = productGroups.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[asBrand](#asbrand)|[ProductBrand](./ProductBrand.md)|Casts the product group to a brand product group.
[asCategory](#ascategory)|[ProductCategory](./ProductCategory.md)|Casts the product group to a category product group.
[asChannel](#aschannel)|[ProductChannel](./ProductChannel.md)|Casts the product group to a channel product group.
[asChannelExclusivity](#aschannelexclusivity)|[ProductChannelExclusivity](./ProductChannelExclusivity.md)|Casts the product group to a channel exclusivity product group.
[asCondition](#ascondition)|[ProductCondition](./ProductCondition.md)|Casts the product group to a condition product group.
[asCustomLabel](#ascustomlabel)|[ProductCustomLabel](./ProductCustomLabel.md)|Casts the product group to a custom label product group.
[asItemId](#asitemid)|[ProductItemId](./ProductItemId.md)|Casts the product group to an item ID product group.
[asProductType](#asproducttype)|[ProductType](./ProductBrand.md)|Casts the product group to a product type product group.
[children](#children)|[ProductGroupSelector](./ProductGroupSelector.md)|Gets a selector used to filter this product group's list of child product groups.
[getAdGroup](#getadgroup)|[AdGroup](./AdGroup.md)|Gets the ad group that this product group belongs to.
[getCampaign](#getcampaign)|[Campaign](./Campaign.md)|Gets the campaign that this product group belongs to.
[getDimension](#getdimension)|string|Gets this product group's dimension.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getId](#getid)|string|Gets the ID that uniquely identifies this product group.
[getMaxCpc](#getmaxcpc)|double|Gets the maximum cost-per-click bid amount for this product group.
[getStats](#getstats)|[Stats](Stats.md)|Gets the performance data for this product group.
[getValue](#getvalue)|String|Gets this product group's value.
[isExcluded](#isexcluded)|Boolean|Gets a Boolean value that determines whether this product group is excluded.
[isOtherCase](#isothercase)|Boolean|Gets a Boolean value that determines whether this product group represents all other cases not represented by its sibling product group.
[parent](#parent)|[ProductGroup](./ProductGroup.md)|Gets this product group's parent product group.
[setMaxCpc(double cpc)](#setmaxcpc-double-cpc-)|void|Sets the maximum cost-per-click bid amount to use for this product group.

<!--
[getFinalUrlSuffix](#getfinalurlsuffix)|String|Gets this product group's final URL suffix.
[getTrackingUrlTemplate](#gettrackingurltemplate)|String|Gets this product group's tracking URL template.
-->

## <a id="asbrand"></a>asBrand

Casts this product group to a brand product group. 

> [!NOTE]
> It's not necessary to cast the product group to a Brand product group to access the brand's value. You can access the brand's value by calling the [getValue](#getvalue) method.

### Returns

|Type|Description|
|-|-
[ProductBrand](./ProductBrand.md)|Contains the methods used to access the product group's properties.


## <a id="ascategory"></a>asCategory

Casts this product group to a category product group. 

> [!NOTE]
> It's not necessary to cast the product group to a Category product group to access the category's value. You can access the category's value by calling the [getValue](#getvalue) method.

### Returns

|Type|Description|
|-|-
[ProductCategory](./ProductCategory.md)|Contains the methods used to access the product group's properties.


## <a id="aschannel"></a>asChannel

Casts this product group to a Channel product group. 

> [!NOTE]
> It's not necessary to cast the product group to a Channel product group to access the channel's value. You can access the channel's value by calling the [getValue](#getvalue) method.

### Returns

|Type|Description|
|-|-
[ProductChannel](./ProductChannel.md)|Contains the methods used to access the product group's properties.


## <a id="aschannelexclusivity"></a>asChannelExclusivity

Casts this product group to a Channel Exclusivity product group. 

> [!NOTE]
> It's not necessary to cast the product group to a Channel Exclusivity product group to access the channel's value. You can access the channel's value by calling the [getValue](#getvalue) method.

### Returns

|Type|Description|
|-|-
[ProductChannelExclusivity](./ProductChannelExclusivity.md)|Contains the methods used to access the product group's properties.


## <a id="ascondition"></a>asCondition

Casts this product group to a condition product group. 

> [!NOTE]
> It's not necessary to cast the product group to a Condition product group to access the condition's value. You can access the condition's value by calling the [getValue](#getvalue) method.

### Returns

|Type|Description|
|-|-
[ProductCondition](./ProductCondition.md)|Contains the methods used to access the product group's properties.


## <a id="ascustomlabel"></a>asCustomLabel

Casts this product group to a custom label product group. 

> [!NOTE]
> It's not necessary to cast the product group to a CustomLabel product group to access the label's value. You can access the label's value by calling the [getValue](#getvalue) method. You only need to cast the product group to CustomLabel if you need to know which label type the value is for. For example, custom label 0 through 4.

### Returns

|Type|Description|
|-|-
[ProductCustomLabel](./ProductCustomLabel.md)|Contains the methods used to access the product group's properties.


## <a id="asitemid"></a>asItemId

Casts this product group to an item ID product group. 

> [!NOTE]
> It's not necessary to cast the product group to an ItemId product group to access the ID's value. You can access the ID's value by calling the [getValue](#getvalue) method.

### Returns

|Type|Description|
|-|-
[ProductItemId](./ProductItemId.md)|Contains the methods used to access the product group's properties.


## <a id="asproducttype"></a>asProductType

Casts this product group to a product type product group. 

> [!NOTE]
> It's not necessary to cast the product group to a ProductType product group to access the type's value. You can access the type's value by calling the [getValue](#getvalue) method. You only need to cast the product group to ProductType if you need to know which type the value is for. For example, PRODUCT_TYPE_L1, etc.

### Returns

|Type|Description|
|-|-
[ProductType](./ProductType.md)|Contains the methods used to access the product group's properties.


## <a id="children"></a>children

Gets a [selector](../concepts/selectors.md) used to filter this product group's list of child product groups 

### Returns

|Type|Description|
|-|-
[ProductGroupSelector](./ProductGroupSelector.md)|A selector used to filter the list of children in this product group.


## <a name="getadgroup"></a>getAdGroup
Gets the ad group that this product group belongs to.

### Returns
|Type|Description|
|-|-
[AdGroup](Adgroup.md)|The ad group that this product group belongs to.


## <a name="getcampaign"></a>getCampaign
Gets the campaign that this product group belongs to.

### Returns
|Type|Description|
|-|-
[Campaign](Campaign.md)|The campaign that this product group belongs to.


## <a id="getdimension"></a>getDimension

Gets this product group's dimension. 

### Returns

|Type|Description|
|-|-
String|This product group's dimension. Possible values are:<ul><li>ROOT &mdash; The top of the tree</li><li>BRAND</li><li>CATEGORY</li><li>CONDITION</li><li>CUSTOM_LABEL</li><li>ITEM_ID</li><li>PRODUCT_TYPE</li></ul>


## <a name="getentitytype"></a>getEntityType
Gets this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *ProductGroup*.

<!--
## <a name="getfinalurlsuffix"></a>getFinalUrlSuffix
Gets the product group's final URL suffix. This is the URL of the webpage that the user is taken to when they click the ad. 

The same override rules apply as elsewhere. For example, specifying a keyword's final URL overrides the ad's final URL.

### Returns
|Type|Description|
|-|-
string|The product group's final URL suffix.
-->

## <a name="getid"></a>getId
Gets the ID that uniquely identifies this product group.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this product group.


## <a id="getmaxcpc"></a>getMaxCpc

Gets this product group's maximum cost-per-click bid amount. 

### Returns

|Type|Description|
|-|-
double|The bid amount. Returns null if not set or this is a negative product group (`isExluded` is **true**).


## <a name="getstats"></a>getStats
Gets the performance data for this product group. 

To call this method, you must include one of the `forDateRange` methods in the [product group selector's](ProductGroupSelector.md) chain.

### Returns:
|Type|Description|
|-|-
[Stats](Stats.md)|The performance data for this product group.

<!--
## <a name="gettrackingurltemplate"></a>getTrackingUrlTemplate
Gets the product group's tracking template. 

[!INCLUDE[tracking-templates](../includes/tracking-templates.md)]

### Returns
|Type|Description|
|-|-
string|The product group's tracking template.
-->

## <a name="getvalue"></a>getValue
Gets this product group's value. 

### Returns:
|Type|Description|
|-|-
String|This product group's value. Returns null if this is the root group.


## <a name="isexcluded"></a>isExcluded
Gets a Boolean value that determines whether this product group is a negative product group.

### Returns:
|Type|Description|
|-|-
Boolean|Is **true** if this product group is a negative group; otherwise, **false**. For example, instead of including all downhill skis, you exclude them.


## <a name="isothercase"></a>isOtherCase
Gets a Boolean value that determines whether this product group represents everything else not represented by its sibling product group (aka., the other case).

### Returns:
|Type|Description|
|-|-
Boolean|Is **true** if this product group represents the "other" case; otherwise, **false**. For example, if you divide All products (the root node) by Sporting Goods, the service creates a sibling product group that represents the products not in Sporting Goods and sets this field to **true**. The parent ID of this product group and the Sporting Goods product group point to the root node.


## <a name="parent"></a>parent
Gets this product group's parent. 

### Returns:
|Type|Description|
|-|-
[ProductGroup](ProductGroup.md)|This product group's parent. Returns null if this is the root group.


## <a name="setmaxcpc-double-cpc-"></a>setMaxCpc(double cpc)
Sets the maximum cost-per-click bid amount for this product group. 

### Arguments
|Name|Type|Description|
|-|-|-
cpc|double|The bid amount. The bid amount is in the account's currency, which determines the minimum and maximum bid values you may specify. Do not set the bid if this product group is subdivided (has children) or is a negative product group (`isExcluded` is **true**).

### Returns
|Type|Description|
|-|-
void|Returns nothing.
