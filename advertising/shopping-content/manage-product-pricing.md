---
title: "Manage product pricing"
description: "Learn how to manage update product pricing and availability."
author: rgaritta
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: v-rgaritta
---

# Updating product pricing and availability

> [!NOTE]
> The Inventory API is available to closed pilot participants only. The API and documentation are subject to change.

If all you need to do is update the pricing and availability of a product in your Bing Merchant Center (BMC) store, you should use the [Inventory](inventory-resource.md) resource instead of the [Product](products-resource.md) resource. With the Product resource, you must provide the full details of the product but the Inventory resource lets you specify just price and availability.

## Updating a single product

To update a single product, use the `/bmc/{bmcMerchantId}/inventory/{storeCode}/products/{productUniqueId}` template in an HTTP POST request. Set {bmcMerchantId} to your store ID, {storeCode} to *online*, and {productUniqueId} to the product's fully qualified ID.

The request's body is a [Product](inventory-resource.md#product) object that includes the following fields only:

- price
- availability
- salePrice
- salePriceEffectiveDate

The `price` and `availability` fields are required; the call fails if you don't specify both fields. The `salePrice` and `salePriceEffectiveDate` are optional. If you don't specify them, the product's current sale price and effective date values are removed from the offer.

The following shows an example POST request.

```
POST https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/1234/inventory/online/products/online:en:US:5678 HTTP/1.1
AuthenticationToken: EwAAA3hl...
DeveloperToken: 0417...
Content-Type: application/json
Host: content.api.bingads.microsoft.com
Content-Length: 73

{
    "availability":"out of stock",
    "price":{
        "currency":"USD",
        "value":1234.0
    }
}
```

If the request succeeds, it returns status code 200 and the URI of the updated product in the Location header. 

```
HTTP/1.1 200 OK
Content-Type: application/json
Location: https://content.api.bingads.microsoft.com/shopping.svc/v9.1/bmc/1234/products/online:en:US:5678
WebRequestActivityId: e2c53946-e18c-4302-a40a-6d174429574a
Date: Fri, 09 Nov 2018 20:34:35 GMT
Content-Length: 46

{
  "kind": "content#inventorySetResponse"
}
```

And if the response fails, the request returns status code 400; the body contains an [error response](inventory-resource.md#errorresponse) object that identifies the issue.

```
HTTP/1.1 400 Bad Request
Content-Type: application/json
Location: https://content.api.bingads.microsoft.com/shopping.svc/v9.1/bmc/1234/products/online:en:US:5678
WebRequestActivityId: d3d31a3f-8993-428e-858c-730032e32a46
Date: Sat, 10 Nov 2018 14:35:14 GMT
Content-Length: 305

{
  "error": {
    "errors": [
      {
        "reason": "invalid",
        "message": "Invalid value for: availability, stock is not a valid value",
        "domain": "global"
      }
    ],
    "code": "400",
    "message": "Invalid value for: availability, stock is not a valid value"
  }
}
```

For example code that shows how to use the Inventory resource to update a single product, see [Updating pricing and availability for a single product](code-example-single-product-update.md).


## Updating multiple products

To update multiple products, use the `/bmc/{bmcMerchantId}/inventory/batch` template in an HTTP POST request. Set {bmcMerchantId} to your store ID.

The request's body is a [Batch](inventory-resource.md#batch) object that may contain a maximum of 400 products to update. Each entry in the batch provides a user-defined batch ID, a store code that's set to *online*, the product's fully qualified ID, and the product's pricing and availability fields to update. The [Product](inventory-resource.md#product) object may include the following fields only: 

- price
- availability
- salePrice
- salePriceEffectiveDate

The `price` and `availability` fields are required; the call fails if you don't specify both fields. The `salePrice` and `salePriceEffectiveDate` are optional. If you don't specify them, the product's current sale price and effective date values are removed from the offer.

The following shows an example POST request.

```
POST https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/1234/inventory/batch HTTP/1.1
AuthenticationToken: EwAAA3hl...
DeveloperToken: 0417...
Content-Type: application/json
Host: content.api.bingads.microsoft.com
Content-Length: 194

{
    "entries":[
        {
            "batchId":1,
            "storeCode":"online",
            "productId":"online:en:US:5678",
            "inventory":{
                "availability":"in stock",
                "price":{
                    "currency":"USD",
                    "value":4567.0
                }
            }
        },
        {
            "batchId":2,
            "storeCode":"online",
            "productId":"online:en:US:9012",
            "inventory":{
                "availability":"bad in stock",
                "price":{
                    "currency":"USD",
                    "value":678.0
                }
            }
        }
    ]
}
```

Because the request tries to update every product in the batch, it returns status code 200. To determine if an update failed, you need to iterate through all entries in the batch. An update failed if the entry includes the `errors` field; otherwise, it succeeded.

```
HTTP/1.1 200 OK
Content-Type: application/json
WebRequestActivityId: bf019ef5-fa76-4703-9132-7954b0323c81
Date: Fri, 09 Nov 2018 20:48:15 GMT
Content-Length: 172

{
  "kind": "content#inventoryCustomBatchResponse",
  "entries": [
    {
      "kind": "content#inventoryCustomBatchEntryResponse",
      "batchId": "1"
    },
    {
      "kind": "content#inventoryCustomBatchEntryResponse",
      "batchId": "2",
      "errors": {
        "errors": [
          {
            "reason": "invalid",
            "message": "Invalid value for: availability, bad in stock is not a valid value",
            "domain": "global"
          }
        ]
      }
    }
  ]
}
```

For example code that shows how to use the Inventory resource to update a batch of products, see [Updating pricing and availability for a batch of products](code-example-batch-product-update.md).


## See also

[Managing product offers](manage-products.md)
