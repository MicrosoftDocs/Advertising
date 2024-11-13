---
title: "Product group script examples"
description: "Shows examples that get product groups and updates their bid amounts."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Script examples for product groups

The following sections show examples of scripts that get product groups and update their bid amounts.

## Getting product groups

To get all product groups in an account, use the [AdsApp.productGroups()](../reference/AdsApp.md#productgroups) method. 

```javascript
function main() {

    var productGroups = AdsApp.productGroups().get();

    while (productGroups.hasNext()) {
        var productGroup = productGroups.next();

        switch (productGroup.getDimension()) {
            case "ROOT": {
                break;
            }
            case "CATEGORY": {
                var category = productGroup.getValue();
                break;
            }
            case "CHANNEL": {
                var channel = productGroup.getValue();
                break;
            }
            case "CHANNEL_EXCLUSIVITY": {
                var channelExclusivity = productGroup.getValue();
                break;
            }
            case "BRAND": {
                var brand = productGroup.getValue();
                break;
            }
            case "CONDITION": {
                var condition = productGroup.getValue();
                break;
            }
            case "CUSTOM_LABEL": {
                // It's only necessary to cast the product group to a CustomLabel product
                // group if you need to get the label's name (i.e., CustomLabel0).
                var customLabel = productGroup.asCustomLabel();
                var labelType = customLabel.getType();
                var labelValue = customLabel.getValue();
                break;
            }
            case "ITEM_ID": {
                var id = productGroup.getValue();
                break;
            }
            case "PRODUCT_TYPE": {
                // It's only necessary to cast the product group to a ProductType product
                // group if you need to get the type's name (i.e., PRODUCT_TYPE_1).
                var productType = productGroup.asProductType();
                var typeName = productType.getType();
                var typeValue = productType.getValue());
                break;
            }
        }
    }
}
```

Another option is to get product groups by shopping campaigns or shopping ad groups. To get product groups by ad groups, first call the [AdsApp.shoppingAdGroups()](../reference/AdsApp.md#shoppingadgroups) method, and then call the [AdGroup.productGroups()](../reference/AdGroup.md#productgroups) method. For campaigns, you'd similarly call the [AdsApp.shoppingCampaigns()](../reference/AdsApp.md#shoppingcampaigns) and [Campaign.productGroups()](../reference/Campaign.md#productgroups) methods. 


```javascript
function main() {

    var shoppingAdGroups = AdsApp.shoppingAdGroups()
        .get();  
    
    while (shoppingAdGroups.hasNext()) {
        var adGroup = shoppingAdGroups.next();

        var productGroups = adGroup.productGroups().get();

        while (productGroups.hasNext()) {
            var productGroup = productGroups.next();

            switch (productGroup.getDimension()) {
                case "ROOT": {
                    break;
                }
                case "CATEGORY": {
                    var category = productGroup.getValue();
                    break;
                }
                case "CHANNEL": {
                    var channel = productGroup.getValue();
                    break;
                }
                case "CHANNEL_EXCLUSIVITY": {
                    var channelExclusivity = productGroup.getValue();
                    break;
                }
                case "BRAND": {
                    var brand = productGroup.getValue();
                    break;
                }
                case "CONDITION": {
                    var condition = productGroup.getValue();
                    break;
                }
                case "CUSTOM_LABEL": {
                    // It's only necessary to cast the product group to a CustomLabel product
                    // group if you need to get the label's name (i.e., CustomLabel0).
                    var customLabel = productGroup.asCustomLabel();
                    var labelType = customLabel.getType();
                    var labelValue = customLabel.getValue();
                    break;
                }
                case "ITEM_ID": {
                    var id = productGroup.getValue();
                    break;
                }
                case "PRODUCT_TYPE": {
                    // It's only necessary to cast the product group to a ProductType product
                    // group if you need to get the type's name (i.e., PRODUCT_TYPE_1).
                        var productType = productGroup.asProductType();
                        var typeName = productType.getType();
                    var typeValue = productType.getValue());
                    break;
                }
            }
        }
    }
}
```

### Applying conditions

To filter the list of product groups, use the [withCondition](../reference/ProductGroupSelector.md#withcondition-string-condition-) method. By using `withCondition`, you can filter product groups by the standard metric values like clicks and conversions, but you can also filter by bid amount and product group.

The following example shows how to get the Skis product group if the path is 'All products > Sporting Goods > Winter Sports > Skiing > Skis > Refurbished > Cross-Country Skis'.

```javascript
function main() {
    var shoppingAdGroup = AdsApp.shoppingAdGroups().withIds(["123456789"]).get().next();

    var productGroups = shoppingAdGroup.productGroups()
        .withCondition("ProductGroup = skis")
        .get();

    while (productGroups.hasNext()) {
        var group = productGroups.next();
    }
}
```

Because Skis is subdivided by Refurbished condition, the response includes the selected Skis product group and the OtherCase product group for Refurbished.

```
dimension CATEGORY
value Skis
cpc null
parent 4578503857653096

dimension CONDITION
value OtherCase
cpc 1
parent 4578503857653099
```

## Updating a product group's bid

Typically, you want to increase bids when performance is bad and decrease bids when performance is good. This example shows how to get product groups that are performing poorly and increase their bid amount. (This example uses clicks and conversion rates to determine poorly performing groups but you should use the metrics and thresholds that are appropriate for you.)


```javascript
function main() {
    var shoppingAdGroup = AdsApp.shoppingAdGroups().withIds(["123456789"]).get().next();

    var productGroups = shoppingAdGroup.productGroups()
        .withCondition("Clicks < 30")
        .withCondition("ClickConversionRate < .25")
        .forDateRange("LAST_MONTH")
        .get();

    var groupsToUpdate = [];

    while (productGroups.hasNext()) {
        groupsToUpdate.push(productGroups.next());
    }
    
    for (var group of groupsToUpdate) {
        group.setMaxCpc(.35);
    }
}
```
