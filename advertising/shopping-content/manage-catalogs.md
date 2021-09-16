---
title: "Managing your Catalogs"
description: "Learn how to manage catalogs using the Content API."
author: eric-urban
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: eur
---

# Managing your Catalogs

Content API is a RESTful API that uses the [Catalogs](../shopping-content/catalogs-resource.md) resource to manage catalogs in your Microsoft Merchant Center (MMC) store. 

The following is the base URI that you use to call the Content API.

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/`


Each HTTP request must include the user's OAuth access token and your developer token. To specify the user's access token, set the [AuthenticationToken](../shopping-content/catalogs-resource.md#authtoken) header. To specify your developer token, set the [DeveloperToken](../shopping-content/catalogs-resource.md#devtoken) header.

If you manage catalogs on behalf of other customers, you must set:

- The [CustomerId](../shopping-content/catalogs-resource.md#customerid) header to the customer ID of the customer whose store you're managing.
- The [CustomerAccountId](../shopping-content/catalogs-resource.md#customeraccountid) header to the account ID of any of the customer's accounts that you manage (it doesn't matter which managed account).

By default, the Content API uses JSON objects to represent the catalogs. To use XML, set the [alt](../shopping-content/products-resource.md#alt) query parameter to XML.

For details about using the Catalogs resource, see the following sections.

* [Getting a catalog from the store](#get)
* [Getting the list of catalogs from the store](#list)
* [Deleting a catalog from the store](#delete)
* [Adding a catalog to the store](#insert)
* [Updating a catalog in the store](#update)

For a code example that shows how to get, add, update, and delete catalogs, see [Managing Catalogs Code Example](../shopping-content/code-examples.md#catalog).


## <a name="get"></a> Getting a catalog from the store

To get a catalog from the store, append the following template to the base URI.

`{bmcMerchantId}/catalogs/{catalogId}`

Set `{bmcMerchantId}` to your MMC store ID and set `{catalogId}` to the catalog's [ID](../shopping-content/catalogs-resource.md#id). 

Send an HTTP GET request to the resulting URL. If the catalog was found, the response contains a [Catalog](../shopping-content/catalogs-resource.md#catalog) object that contains the catalog's details.


## <a name="list"></a> Getting a list of catalogs from the store

To get a list of catalogs from the store, append the following template to the base URI.

`{bmcMerchantId}/catalogs`

Set `{bmcMerchantId}` to your MMC store ID.

Send an HTTP GET request to the resulting URL. If the store contains catalogs, the response contains a [Catalogs](../shopping-content/catalogs-resource.md#catalogs) object that contains the list of catalogs. 


## <a name="delete"></a> Deleting a catalog from the store

To delete a catalog from the store, append the following template to the base URI.

`{bmcMerchantId}/catalogs/{catalogId}`

Set `{bmcMerchantId}` to your MMC store ID and set `{catalogId}` to the catalog's [ID](../shopping-content/catalogs-resource.md#id). 

Send an HTTP DELETE request to the resulting URL. If the catalog was found, it is deleted. 


## <a name="insert"></a> Adding a catalog to the store

You use catalogs to logically group your products. To add a catalog to the store, append the following template to the base URI.

`{bmcMerchantId}/catalogs`

Set `{bmcMerchantId}` to your MMC store ID. 

Send an HTTP POST request to the resulting URL. If the catalog is added, the response contains a [Catalog](../shopping-content/catalogs-resource.md#catalog) object. The `Catalog` object includes the catalog's [ID](../shopping-content/catalogs-resource.md#id). Use the ID to get and delete the catalog.

The body of the request is a [Catalog](../shopping-content/catalogs-resource.md#catalog) object. You must specify the following fields.

* [name](../shopping-content/catalogs-resource.md#name)
* [market](../shopping-content/catalogs-resource.md#market)
* [isPublishingEnabled](../shopping-content/catalogs-resource.md#ispublishingenabled)

The name that you specify must be unique within the store, and is limited to a maximum of 70 characters. The market identifies where the products are served. For a list of supported markets, see [market](../shopping-content/catalogs-resource.md#market). Products are served only if `isPublishingEnabled` is **true**. For details about how you can use `isPublishingEnabled` for testing your app, see [Testing your Code in Sandbox](../shopping-content/test-code-sandbox.md).
 

## <a name="update"></a> Updating a catalog in the store

To update a catalog in the store, append the following template to the base URI.

`{bmcMerchantId}/catalogs/{catalogId}`

Set `{bmcMerchantId}` to your MMC store ID and set `{catalogId}` to the catalog's [ID](../shopping-content/catalogs-resource.md#id). 

The body of the request is a [Catalog](../shopping-content/catalogs-resource.md#catalog) object. You must specify the following fields.

* [name](../shopping-content/catalogs-resource.md#name)
* [isPublishingEnabled](../shopping-content/catalogs-resource.md#ispublishingenabled)

Send an HTTP PUT request to the resulting URL. If the catalog is updated, the response contains the updated [Catalog](../shopping-content/catalogs-resource.md#catalog) object. 

<!--
This has to be a bug; Irfan checking.
You may not update the default catalog. If you try to update the default catalog, the request fails.
-->
