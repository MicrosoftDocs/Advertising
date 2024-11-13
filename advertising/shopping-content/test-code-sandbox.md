---
title: "Testing your Code in Sandbox"
description: "Describes options for testing Content API client code."
author: jonmeyers
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---
# Testing your Code in Sandbox

Microsoft does not provide a sandbox for Content API where you can test your application before you deploy it to the production environment. 

However, you can use the following options to test your application in production without affecting live data. These options apply only to the [Product](products-resource.md) and [Inventory](inventory-resource.md) resources and not to the [Catalog](../shopping-content/catalogs-resource.md) resource.

## Using dry-run query parameter

To test your code in  production without modifying your live feed and impacting served ads, include the [dry-run](../shopping-content/products-resource.md#dryrun) query parameter in the endpoint URL as shown below. 

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/{bmcMerchantId}/products/{itemUniqueId}?dry-run` 

Using `dry-run` will not change your live feed, but it will return validation errors.

Because data is not stored in the database when using the dry-run parameter, consider the following limitations when using this option:
* Insert operations will not return an ID
* The service will not generate and return secondary error messages such as data quality, editorial issues, and database related validations

Note that the Catalogs resource does not support the `dry-run` query parameter.

## Disabling publishing

Another option is to disable a catalog's ability to publish content. Catalogs that are disabled will not serve ads. This allows you to perform operations against the catalog and capture any errors that occur.  

To disable a catalog in the Microsoft Advertising web application, select the catalog from the **Catalog management** tab. Then, on the **Catalog settings** tab, deselect **Enable publishing**. 

You may also use the [Catalogs](../shopping-content/catalogs-resource.md) resource to disable publishing. For details see, [Managing your Catalogs](../shopping-content/manage-catalogs.md).

As with using the `dry-run` query parameter, secondary error messages such as data quality, editorial issues, and database related validations are not generated and will not be returned. However, Insert operations will return IDs.

> [!CAUTION]
> Products are unique within a store, not a catalog. If you have a product with the same [id](../shopping-content/products-resource.md#productid) in more than one catalog, then any changes that you make to the product in the disabled catalog will also occur in the enabled catalogs. This means that even with publishing disabled in one catalog, another catalog may serve ads for that product. 

> [!NOTE]
> You may not update a store's default catalog. If you try to update the default catalog, the request fails.
