---
title: "ProductChannel"
subtitle: "Scripts"
description: "Contains the methods used to manage the channel product group."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# ProductChannel

Contains the methods for managing a channel product group. This object derives from [ProductGroup](ProductGroup.md).

Used by the delivery engine to determine whether a product from the advertiser's catalog is served. The engine may serve the product if the product's channel matches exactly the channel name that [getChannel](#getchannel) returns. 

Example usage:
```javascript
    var shoppingCampaign = AdsApp.shoppingCampaigns().withIds(["123456789"]).get().next();

    var productGroups = shoppingCampaign.productGroups().get();

    while (productGroups.hasNext()) {
        var group = productGroups.next();

        switch (group.getDimension()) {
            case "CHANNEL": {
                // It's not necessary to cast the product group to a channel product
                // group since the getValue() method returns the same value as getChannel().
                // var channel = group.asChannel().getChannel();

                var channel = group.getValue();
                break;
            }
            // Other cases
        }
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[children](#children)|[ProductGroupSelector](./ProductGroupSelector.md)|Gets a selector used to filter this product group's list of child product groups.
[getAdGroup](#getadgroup)|[AdGroup](./AdGroup.md)|Gets the ad group that this product group belongs to.
[getCampaign](#getcampaign)|[Campaign](./Campaign.md)|Gets the campaign that this product group belongs to.
[getChannel](#getchannel)|string|Gets the product's channel name.
[getDimension](#getdimension)|string|Gets this product group's dimension.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getId](#getid)|string|Gets the ID that uniquely identifies this product group.
[getMaxCpc](#getmaxcpc)|double|Gets the maximum cost-per-click bid amount for this product group.
[getStats](#getstats)|[Stats](Stats.md)|Gets the performance data for this product group.
[getValue](#getvalue)|string|Gets this product group's value.
[isExcluded](#isexcluded)|Boolean|Gets a Boolean value that determines whether this product group is excluded.
[isOtherCase](#isothercase)|Boolean|Gets a Boolean value that determines whether this product group represents all other cases not represented by its sibling product group.
[parent](#parent)|[ProductGroup](./ProductGroup.md)|Gets this product group's parent product group.
[setMaxCpc(double cpc)](#setmaxcpc-double-cpc-)|void|Sets the maximum cost-per-click bid amount to use for this product group.

<!--
[getFinalUrlSuffix](#getfinalurlsuffix)|String|Gets this product group's final URL suffix.
[getTrackingUrlTemplate](#gettrackingurltemplate)|String|Gets this product group's tracking URL template.
-->


## <a id="children"></a>children

Gets a [selector](../concepts/selectors.md) used to filter this product group's list of child product groups. 

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


## <a name="getchannel"></a>getChannel

Gets the product's channel name. This method returns the same value as the `getValue()` method.

### Returns

|Type|Description|
|-|-
string|The product's channel name. For example, Online or Local Stores.


## <a id="getdimension"></a>getDimension

Gets this product group's dimension. 

### Returns

|Type|Description|
|-|-
String|This product group's dimension, which is set to CHANNEL.


## <a name="getentitytype"></a>getEntityType
Gets this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *ProductChannel*.

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
Gets the product's channel name. 

### Returns:
|Type|Description|
|-|-
string|The product's channel name. This is the same value that the [getChannel](#getchannel) method returns.


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
[ProductGroup](ProductGroup.md)|This product group's parent.


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
