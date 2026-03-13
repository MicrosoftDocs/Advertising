---
title: "Regional Products Resource"
description: "Provides information about the regional products resource and related elements of the Content API."
author: jonmeyers
ms.service: "bing-ads"
ms.subservice: "shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Regional Products Resource

The **Regional Products** resource lets you manage **region definitions** and **regional product offerings** in your Microsoft Merchant Center (MMC) store.

For general guidance on managing products, see **Managing your Products**.

## Base URI

Append the endpoint templates described below to one of the following base URIs:

```text
https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/
https://content.api.bingads.microsoft.com/shopping/v13/bmc/
```

## Endpoint Templates

Use the following templates to manage regions and regional inventory.

### Region Management

| Template                                | HTTP Verb | Description                                                                                                                     |
| --------------------------------------- | --------- | ------------------------------------------------------------------------------------------------------------------------------- |
| `{mmcMerchantId}/regions`               | POST      | Create one or more regions in a single batch request. Required fields must be included for each region.                         |
| `{mmcMerchantId}/regions/{regionId}`    | DELETE    | Delete a single region. Deleting a region deactivates all related regional inventory. Delivery may continue for up to 12 hours. |
| `{mmcMerchantId}/regions`               | GET       | Retrieve all regions in the store.                                                                                              |
| `{mmcMerchantId}/regions/{regionId}`    | GET       | Retrieve a single region by ID.                                                                                                 |
| `{mmcMerchantId}/regions/{countryCode}` | GET       | Retrieve regions for a specific 2‑letter country code.                                                                          |
| `{mmcMerchantId}/regions/{regionId}`    | PUT       | Update a single region definition.                                                                                              |
| `{mmcMerchantId}/regions/batch`         | POST      | Update multiple regions in a single request. Existing regions only; new regions are not created.                                |

> [!NOTE]
> Avoid inserting multiple regions with the same `countryCode`, state, or postal codes.

### Regional Inventory

| Template                                                                                  | HTTP Verb | Description                                                   |
| ----------------------------------------------------------------------------------------- | --------- | ------------------------------------------------------------- |
| `{mmcMerchantId}/products/{productUniqueId}/regionalinventory?bmc-catalog-id={catalogId}` | POST      | Add or upsert a single regional inventory offer.              |
| `{mmcMerchantId}/regionalinventory/batch?bmc-catalog-id={catalogId}`                      | POST      | Update multiple regional inventory offers in a batch request. |

## Query Parameters

| Parameter        | Description                                                                                 |
| ---------------- | ------------------------------------------------------------------------------------------- |
| `alt`            | Optional. Response format. Default is `json`.                                               |
| `bmc-catalog-id` | Required for inserting or updating product data. Identifies the regional inventory catalog. |
| `pageSize`       | Optional. Maximum number of regions returned. Default is 25; maximum is 1000.               |
| `pageToken`      | Optional. Token used to retrieve the next page of results.                                  |

## Request and Response Headers

| Header                 | Description                                                             |
| ---------------------- | ----------------------------------------------------------------------- |
| `AuthenticationToken`  | OAuth access token used for authentication.                             |
| `DeveloperToken`       | Required. Identifies the calling application.                           |
| `WebRequestActivityId` | Response header. Use this value when contacting support about an error. |

## Common Objects

### Batch

Defines a list of items processed in a batch request.

| Field     | Type     | Description                                                           |
| --------- | -------- | --------------------------------------------------------------------- |
| `entries` | `Item[]` | List of batch items. Maximum size depends on payload and compression. |

### Item

Represents a single entry in a batch request.

| Field        | Type             | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| `batchId`    | Unsigned Integer | Client-defined identifier for the batch item.  |
| `method`     | String           | Action to perform (`insert`, `get`, `delete`). |
| `merchantId` | Unsigned Long    | Merchant Center store ID.                      |
| `regionId`   | String           | Region ID (required for get, delete, update).  |

### Region

Defines a region in the Merchant Center.

| Field           | Type                | Required    | Description                                              |
| --------------- | ------------------- | ----------- | -------------------------------------------------------- |
| `id`            | String              | Yes         | User-defined, immutable region ID (max 50 characters).   |
| `displayName`   | String              | Yes         | Display name of the region.                              |
| `countryCode`   | String              | Yes         | 2‑letter country code.                                   |
| `postalCodes`   | `PostalCodeRange[]` | No          | List of postal code ranges.                              |
| `geoTargetArea` | String\[]           | Conditional | List of Bing location IDs (states only).                 |
| `isActive`      | Boolean             | No          | Indicates whether the region is active.                  |
| `createdBy`     | String              | No          | User who created the region.                             |
| `createdAt`     | DateTime            | No          | Creation timestamp.                                      |
| `updatedAt`     | DateTime            | No          | Last update timestamp.                                   |
| `inUse`         | Boolean             | No          | Indicates whether the region is referenced by inventory. |

> Either `postalCodes` or `geoTargetArea` must be provided.

### PostalCodeRange

```json
{
  "begin": "string",
  "end": "string"
}
```

* **begin**: Required. Lower bound of the postal code range (supports wildcard patterns).
* **end**: Optional. Upper bound of the range. Must match the format of `begin`.

### Regions

Returned by list operations.

| Field           | Type       | Description                                      |
| --------------- | ---------- | ------------------------------------------------ |
| `resources`     | `Region[]` | List of regions in the store.                    |
| `nextPageToken` | String     | Token used to retrieve the next page of results. |

### RegionalInventory

Defines price and availability overrides for a product in a region.

| Field                    | Type    | Required | Description                                              |
| ------------------------ | ------- | -------- | -------------------------------------------------------- |
| `regionId`               | String  | Yes      | Region identifier.                                       |
| `price`                  | `Price` | Yes      | Regional price.                                          |
| `salePrice`              | `Price` | No       | Sale price. Required if `salePriceEffectiveDate` is set. |
| `salePriceEffectiveDate` | String  | No       | ISO 8601 date range for sale pricing.                    |
| `availability`           | String  | Yes      | Product availability for the region.                     |

## Regional Inventory Methods

### Insert / Update Regional Inventory

```text
POST /content/v.x/bmc/{merchantId}/products/{productId}/regionalinventory?bmc-catalog-id={catalogId}
```

Creates or updates regional inventory for a product.

### Batch Regional Inventory Update

```text
POST /content/v.x/bmc/{merchantId}/regionalinventory/batch?bmc-catalog-id={catalogId}
```

Updates regional inventory for multiple products or regions in a single request.

## Region Management Methods

* `regions.create` — Create a region definition
* `regions.delete` — Delete a region definition
* `regions.get` — Retrieve a region
* `regions.list` — List regions
* `regions.update` — Update a region
* `regions.batch` — Batch update region definitions

## References

* **Geographical Location Codes** — Microsoft Advertising API
* **REST Resource: regions** — Content API for Shopping
* **REST Resource: regionalinventory** — Content API for Shopping
