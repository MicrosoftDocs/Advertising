---
title: "Managing your Products"
description: "Learn how to manage products using the Content API."
author: jonmeyers
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Managing your Products

Content API is a RESTful API that uses the [Products](../shopping-content/products-resource.md) resource to manage product offerings in your Microsoft Merchant Center (MMC) store. 

The following is the base URI that you use to call the Content API.

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/`


Each HTTP request must include the user's OAuth access token and your developer token. To specify the user's access token, set the [AuthenticationToken](../shopping-content/products-resource.md#authtoken) header. To specify your developer token, set the [DeveloperToken](../shopping-content/products-resource.md#devtoken) header.

If you manage catalogs on behalf of other customers, you must set:

- The [CustomerId](../shopping-content/products-resource.md#customerid) header to the customer ID of the customer whose store you're managing.
- The [CustomerAccountId](../shopping-content/products-resource.md#customeraccountid) header to the account ID of any of the customer's accounts that you manage (it doesn't matter which managed account).

By default, the Content API uses JSON objects to represent the product offer. To use XML, set the [alt](../shopping-content/products-resource.md#alt) query parameter to XML.

For details about using the Products resource, see the following sections.

* [Getting a product offer from the store](#get)
* [Getting a list of product offers from the store](#list)
* [Deleting an offer from the store](#delete)
* [Adding and updating a product offer](#insert)
* [Using batch processing](#batch)

## <a name="get"></a> Getting a product offer from the store

To get a specific product offer from the store, append the following template to the base URI.

`{mmcMerchantId}/products/{productUniqueId}`

Set `{mmcMerchantId}` to your MMC store ID and set `{productUniqueId}` to the fully qualified product [ID](../shopping-content/products-resource.md#productid) (for example, Online:en:US:Sku123), not the product's [offerId](../shopping-content/products-resource.md#offerid). Because the product ID is case sensitive, use the ID that the API returned to you when you added the product. 

Send an HTTP GET request to the resulting URL. If the product was found, the response contains a [Product](../shopping-content/products-resource.md#product) object that contains the offer.

If you inserted a product with the same ID in multiple catalogs, the service returns only one of them&mdash; which product and from which catalog is undetermined. Because of this, you should not insert a product with the same product ID into multiple catalogs.

For a code example that shows how to get a product offer, see [Managing Products Code Example](../shopping-content/code-example-manage-products.md).


## <a name="list"></a> Getting a list of product offers from the store

To get a list of the product offers that are in the store, append the following template to the base URI.

`{mmcMerchantId}/products`

Set `{mmcMerchantId}` to your MMC store ID. 

To page through the list of offers, use the [max-results](../shopping-content/products-resource.md#maxresults) and [start-token](../shopping-content/products-resource.md#starttoken) query parameters. In your first call, set `max-results` to the maximum number of offers that you want the service to return. The maximum number of offers that the service can return is 250. The default is 25. Send an HTTP GET request to the resulting URL. The following shows an example of the request.

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/{mmcMerchantId}/products?max-results=250` 

If the store contains offers, the response contains a [Product](../shopping-content/products-resource.md#product) object that contains up to the requested number of offers.

If there are more offers available, the response includes the `nextPageToken` field (see [Products](../shopping-content/products-resource.md#products)). The `nextPageToken` field contains the token value that you use to set the `start-token` parameter to in your next List request. The following shows an example that uses the token.

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/{mmcMerchantId}/products?max-results=250&start-token=DFSos893j...`

For a code example that shows how to get a list of product offers, see [Managing Products Code Example](../shopping-content/code-example-manage-products.md).


## <a name="delete"></a> Deleting an offer from the store

To delete a specific product offer from the store, append the following template to the base URI.

`{mmcMerchantId}/products/{productUniqueId}`

Set `{mmcMerchantId}` to your MMC store ID and set `{productUniqueId}` to the fully qualified product [ID](../shopping-content/products-resource.md#productid) (for example, Online:en:US:Sku123), not the product's [offerId](../shopping-content/products-resource.md#offerid). Because the product ID is case sensitive, use the ID that the API returned to you when you added the product. 

Send an HTTP DELETE request to the resulting URL. If the product was found, it is deleted. 

If you inserted a product with the same product ID in multiple catalogs, the service deletes all of them. You should not insert a product with the same product ID into multiple catalogs.

For a code example that shows how to delete a product offer, see [Managing Products Code Example](../shopping-content/code-example-manage-products.md).

## <a name="insert"></a> Adding and updating a product offer

Adding or updating an offer is an insert operation. Because an update is an insert operation, you must include all fields of the offer in the request; you cannot not update a single field.

To insert a product offer, append the following template to the base URI.

`{mmcMerchantId}/products`

Set `{mmcMerchantId}` to your MMC store ID. 

Sending an HTTP POST request to the resulting URL writes the offer to the default store catalog. To write the offer to a specific catalog, include the [bmc-catalog-id](../shopping-content/products-resource.md#bmccatalogid) query parameter.

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/{mmcMerchantId}/products?bmc-catalog-id=123456` 

If the product was inserted, the response contains a [Product](../shopping-content/products-resource.md#product) object. The `Product` object includes the product [ID](../shopping-content/products-resource.md#productid), which you use to get and delete the offer.

An offer must include the following fields:

* [availability](../shopping-content/products-resource.md#availability)
* [channel](../shopping-content/products-resource.md#channel)
* [condition](../shopping-content/products-resource.md#condition)
* [contentLanguage](../shopping-content/products-resource.md#contentlanguage)
* [imageLink](../shopping-content/products-resource.md#imagelink)
* [link](../shopping-content/products-resource.md#link)
* [offerId](../shopping-content/products-resource.md#offerid)
* [price](../shopping-content/products-resource.md#price)
* [targetCountry](../shopping-content/products-resource.md#targetcountry)
* [title](../shopping-content/products-resource.md#title)

The API uses the `channel`, `contentLanguage`, `targetCountry`, and `offerId` to generate the product ID. Because these fields are used to generate the ID, you may not update them. The product ID is case sensitive; the ID uses the same casing that you used to specify `channel`, `contentLanguage`, `targetCountry`, and `offerId`. 

> [!CAUTION] 
> Be sure to use the same casing for `channel`, `contentLanguage`, `targetCountry`, and `offerId` because you can effectively add the same product multiple times if the casing is different.  

The following fields are also required if the manufacturer assigned values.

  - [brand](~/shopping-content/products-resource.md) 
  - [gtin](~/shopping-content/products-resource.md) 
  - [mpn](~/shopping-content/products-resource.md)  

You must specify the values if known. If you do not specify any of them, you must set the [identifierExists](~/shopping-content/products-resource.md) field to **false**. The default is **true**.

If the product is known to have these identifiers and you do not specify them, MMC accepts the product for now but the `Product` object in the response includes the `warnings` field. You should always check if the `warnings` field exists and fix all identified issues.

In addition to the required fields, you should also specify the date and time that you want the offer to expire (see [expirationDate](../shopping-content/products-resource.md#expirationdate)). By default, the offer expires 30 days from the date and time it is written to the store or catalog. You should track products that are nearing expiration and before they expire either update their expiration date or simply update the product (you do not have to update any of the product's fields), which automatically extends the expiration date another 30 days. If you explicitly set the expiration date, you must set a new expiration date yourself; updating the product won't automatically extend the expiration date another 30 days in this case. 

All other fields are considered optional; however, you should specify as many as are necessary to accurately describe the product. 

> [!NOTE]
> The `Product` object must include only fields that are set to values. Do not include null fields in the `Product` object. For example, do not include `"adult":null`.

Microsoft does not use all the `Product` fields. For a list of fields that the API accepts but does not use, see [What Google attributes can I use?](https://help.ads.microsoft.com/#apex/3/en/51111/1-500) All the other fields used by Microsoft are used to filter the products when serving product ads. 

If you specify a field that is unknown to the Content API, the service ignores the field.  

When you insert an offer, the service performs basic validations on the offer and returns errors and warnings as appropriate. If an error occurs, the response contains an `ErrorResponse` object. If warnings occur, the response contains a `Product` object and the `warnings` field lists the warnings. 

If the offer passes the basic validations, it undergoes offline validations and reviews, such as editorial reviews, that can take up to 36 hours. The offer won't serve until all validations and reviews are complete. To determine the status of an offer, use the [Status](../shopping-content/status-resource.md) resource.

Note that the API does not provide concurrency controls such as ETags. If two apps are trying to add or update the same product, the last one wins.   

An offer that is displayed in a product ad includes the price, title, store name (or sellerName if specified), link to the webpage that contains more information about the product, and an image of the product. 

For apparel products that are available in multiple colors, patterns or materials, create a product for each variant and use the [itemGroupId](../shopping-content/products-resource.md#itemgroupid) field to group all product variants.

For a code example that shows how to insert a product offer, see [Managing Products Code Example](../shopping-content/code-example-manage-products.md).


## <a name="batch"></a> Using batch processing

If you're processing multiple product offers, you should consider using the API's batch processing feature. This feature lets you process multiple inserts, gets, and deletes in a single request. Processing multiple offers in the same request is more efficient than sending a separate request for each offer. The cost incurred  with processing a single request is spread over the thousands of offers in the batch request instead of incurring that cost for each individual request.

Do not insert, get, or delete the same product in the same request.

To send a batch request, append the following template to the base URI.

`{mmcMerchantId}/products/batch`

Set `{mmcMerchantId}` to your MMC store ID. 

Sending an HTTP POST request to the resulting URL applies the insert operations to the default store catalog. To apply the offers to a specific catalog, include the [bmc-catalog-id](../shopping-content/products-resource.md#bmccatalogid) query parameter.

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/{mmcMerchantId}/products/batch?bmc-catalog-id=123456`

The body of the POST is a [Batch](../shopping-content/products-resource.md#batch) object that contains an array of [Item](../shopping-content/products-resource.md#item) objects. For all operations, set the `batchId`, `merchantId` and `method` fields. The `batchId` is a user-defined ID that you use to identify the batch item in the response; the `merchantId` is your store ID; and the `method` is the operation to be performed (for example, insert, delete or get).

If `method` is insert, set the `product` field to a [Product](../shopping-content/products-resource.md#product) object that contains the offer to add or update. Otherwise, if `method` is a get or delete, set `productId` to the fully qualified [ID](../shopping-content/products-resource.md#productid) of the offer that you want to get or delete.


The size of the body of a batch request may not exceed 4 MB. If the body exceeds 4 MB, the response returns HTTP status code 413. Depending on the size of each offer (the number of fields that you specify), you can send between 2,000 and 6,000 offers. If you compress the body, you can send the maximum number of offers, which is 12,000 (depending on their size).

To compress the body, use GZip compression only and set the request's Content-Encoding header to gzip.

The service processes each item in the batch. The response contains a `Batch` object that contains each `Item` that was in the request. Note that there is no guarantee that the order of the items in the response is in the same order as the items in the request. 

For insert operations, the item includes only the `batchId` and `product` fields. The `product` field contains the same offer that you sent in the request but also includes the fully qualified product ID. If an error or warning occurs, the item includes the `batchId`, `method`, and `error` fields. The `error` field contains the reasons why the insert failed or warnings about issues with the offer that you need to fix.

For get operations, the item includes the `batchId` and `product` fields. The `product` field contains the offer that you requested. If the product is not found, the object won't include the `product` field. 

For delete operations, the item includes only the `batchId` field; there is no indication of whether the offer exists and was deleted.

For a code example that shows how to use batch processing, see [Creating a Batch Request](../shopping-content/code-examples.md#batch).
  
