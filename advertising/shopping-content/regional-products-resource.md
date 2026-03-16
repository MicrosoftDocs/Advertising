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

Use the regional products resource to manage region definitions and regional product offerings in your Microsoft Merchant Center store (MMC). For information about online products resources, see [Managing your products](manage-products.md).

## Base URI

Append the templates to this base URI:

```html
https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/
https://content.api.bingads.microsoft.com/shopping/v13/bmc/
```

## Templates

To create endpoints for managing your product offerings, append the appropriate template to the base URI.

| Template | HTTP Verb | Description | Resource |
|----------|-----------|-------------|----------|
| `{mmcMerchantId}/regions` | POST | Perform single or multiple region inserts in a single request. Include required details for each region in the batch.<br><br>Set `{mmcMerchantId}` to the MMC store ID. | Request: Batch<br>Response: Batch |
| `{mmcMerchantId}/regions/{regionId}` | DELETE | Delete a single region entity from the store.<br><br>Set `{mmcMerchantId}` to the MMC store ID.<br>Set `{regionId}` to the active region ID.<br><br>When you delete a region ID, all regional inventory data for that region becomes inactive.<br><br>Deleted regions can take up to 12 hours to stop delivering. We recommend that you update the regional inventory availability to "out of stock" before deleting. | Request: N/A<br>Response: N/A |
| `{mmcMerchantId}/regions` | GET | Get a list of regions in the store.<br><br>Set `{mmcMerchantId}` to the MMC store ID. | Request: N/A<br>Response: Regions |
| `{mmcMerchantId}/regions/{regionId}` | GET | Get details for a single region entity from the store.<br><br>Set `{mmcMerchantId}` to the MMC store ID.<br>Set `{regionId}` to the active region ID. | Request: N/A<br>Response: Region |
| `{mmcMerchantId}/regions/{countryCode}` | GET | Get a list of regions for a specific country code from the store.<br><br>Set `{mmcMerchantId}` to the MMC store ID.<br>Set `{countryCode}` to the 2-letter country code where the regions are defined. | Request: N/A<br>Response: Regions |
| `{mmcMerchantId}/regions/{regionId}` | PUT | Update a single region offering in the store. | Request: Region<br>Response: Region |
| `{mmcMerchantId}/regions/batch` | POST | Update multiple region offerings in the store.<br><br>If the region doesn't exist, it won't be updated or created. This prevents accidental updates to region IDs.<br><br>Set `{mmcMerchantId}` to the MMC store ID.<br><br>Don't insert multiple regions with the same countryCode, state, or postal codes because Create and Batch Update requests act against the store. | Request: Batch<br>Response: Batch |
| `{mmcMerchantId}/products/{productUniqueId}/regionalinventory?bmc-catalog-id={catalogId}` | POST | Add or update a single regional inventory offer.<br><br>Set `{mmcMerchantId}` to the MMC store ID.<br>Set `{catalogId}` to the MMC regional inventory feed/catalog ID.<br>Set `{productUniqueId}` to the unique product ID from the primary online feed. | Request: RegionalInventory<br>Response: N/A |
| `{mmcMerchantId}/regionalinventory/batch?bmc-catalog-id={catalogId}` | POST | Update multiple regional inventory offers.<br><br>Set `{mmcMerchantId}` to the MMC store ID.<br>Set `{catalogId}` to the MMC regional inventory feed/catalog ID. | Request: Batch<br>Response: N/A |

## Query Parameters

Your endpoints can include these query parameters:

| Parameter | Description |
|-----------|-------------|
| `alt` | Optional. Specifies the content type for the request and response. The default is json. |
| `bmc-catalog-id` | Required. Specifies the catalog for inserting or updating regional product data.<br><br>This parameter is only used for product data insertion. For Get, List, and Delete requests, this parameter is ignored because they operate across catalogs. |
| `pageSize` | Optional. Specifies the maximum number of regions to return in a List request. The maximum value is 1000. The default is 25. |
| `pageToken` | Optional. Pages through a store's list of regions. This token identifies the next page of regions to return in a List request. Don't specify this parameter in the first List request. If the merchant store contains more regions than requested (see the max-results query parameter), the response includes the nextPageToken field, which contains the token value for the next List request. |

## Headers

Use these request and response headers:

| Header | Description |
|--------|-------------|
| `AuthenticationToken` | Request header.<br><br>Set this header to an OAuth access token. For information about getting an access token, see Authenticating your credentials. |
| `DeveloperToken` | Request header.<br><br>The client application's developer token. Include this header in each request. For information about getting a token, see Do you have your Microsoft Advertising credentials and developer token? |
| `WebRequestActivityId` | Response header.<br><br>The ID of the log entry that contains request details. Always capture this ID if an error occurs. If you can't determine and resolve the issue, include this ID with the other information you provide to the Support team. |

## Request and Response Objects

These are the request and response objects that the API uses. Each object defines the JSON key name based on the content type you specify for the request.

| Object | Description |
|--------|-------------|
| Batch | Contains the list of items to process in a batch request. |
| Error | Contains an error. |
| ErrorResponse | Contains the top-level error object for a single product insert. |
| BatchItemError | Contains errors that occurred for an item during batch processing. |
| Item | Contains an item in a batch request or response. |
| Region | Contains a region. |
| Regions | Contains a list of regions. |
| RegionalInventory | Contains the price and availability of a product ID for a given region ID. |
| Warning | Contains a warning message. |

### Batch

Contains the list of items to process in a batch request. This object is used in both batch requests and responses.

| Name | Value | Type |
|------|-------|------|
| `entries` | The maximum request size is 4 MB, so the actual number of items depends upon the number of region attributes (for example, postal codes/states) that you include and whether you compress the data. For example, if you compress the data, you may be able to specify 1000 items, but if you don't, you may be able to specify only 200 items. | Item[] |

### BatchItemError

Contains errors that occurred for an item during batch processing.

| Name | Value | Type |
|------|-------|------|
| `errors` | A list of errors that occurred while processing the item. | Error[] |
| `code` | The HTTP status code of the error. | String |
| `message` | A message associated with the error. | String |

### Error

Contains an error.

| Name | Value | Type |
|------|-------|------|
| `domain` | For internal use only. | String |
| `message` | A description of the error. | String |
| `reason` | The reason why the request failed. For example, the product failed validation. | String |

### ErrorResponse

Contains the top-level error object for a single product insert.

| Name | Value | Type |
|------|-------|------|
| `error` | A list of errors that occurred while processing the item. | Errors[] |

### Errors

Contains errors and warnings for an offer.

| Name | Value | Type |
|------|-------|------|
| `errors` | A list of errors that occurred while processing the item. | Error[] |
| `warnings` | A list of warnings that occurred while processing the item. The offer was accepted, but you should address the issues as soon as possible. For example, MMC returns warnings when you don't specify the gtin, mpn, and brand identifiers that should be known. | Warning[] |
| `code` | The HTTP status code or the error. | String |
| `message` | A message associated with the error. | String |

### Item

Contains an item in a batch request.

| Name | Value | Type |
|------|-------|------|
| `batchId` | A user-defined ID that identifies this item in the batch request. For example, if your batch contains 10 items, you can assign them IDs 1 through 10. | Unsigned Integer |
| `errors` | An error object that contains a list of validation errors that occurred. The response includes this field only when an error occurs. | BatchItemError |
| `merchantId` | The Merchant Center store ID. | Unsigned Long |
| `method` | The action to apply to the item. Possible values are insert, get, and delete. For adding or updating a product offering, set method to insert. For deleting a product, set method to delete. For getting a product, set method to get. The strings are case insensitive. | String |
| `regionId` | The fully qualified region ID. Include this field only when getting, deleting, or updating a region.<br><br>Don't include multiple items with the same region ID in a batch request. | String |

### Region

Contains a region.

| JSON name | Value | Type | Required for insert |
|-----------|-------|------|-------------------|
| `id` | User-defined ID of the region you're creating. The region ID is case insensitive and limited to 50 characters. You can't change this field after adding the region to the store because the region ID is used to create the region ID. | String | Yes |
| `displayName` | The display text for the region you're creating. The display name is case insensitive. | String | Yes |
| `countryCode` | 2-letter country code of the target country/region.<br><br>Supported countries/regions: US, CA, BR, GB, FR, DE, HU, CH, NL, AU, NZ, IN, ID, MY | String | Yes |
| `postalCodes` | List of postal codes – individual postal codes or a group of codes between begin and end codes. | A list of object PostalCodeRange | No |
| `geoTargetArea` | List of location IDs<br><br>A non-empty list of Bing location IDs (states only) | String | Either postalCodes or geotargetArea |
| `isActive` | Read-only response field that indicates whether the region entity is active. | Boolean | No |
| `createdBy` | Read-only response field that captures the username registered with the authentication token who created the region. | String | No |
| `createdAt` | Read-only response field that captures when the region was created. | DateTime | No |
| `updatedAt` | Read-only response field that captures when the region was last updated. | DateTime | No |
| `inUse` | Read-only response field that indicates whether the region is being used in any regional inventory feed or catalog. | Boolean | No |

### PostalCodeRange

```json
{
  "begin": "string",
  "end": "string"
}
```

| Field Name | Required | Type | Details |
|------------|----------|------|---------|
| `begin` | Required | string | A postal code or a pattern of the form prefix* denoting the inclusive lower bound of the range defining the area. Examples values: "94108", "9410*", "9*". |
| `end` | Optional | string | A postal code or a pattern of the form prefix* denoting the inclusive upper bound of the range defining the area. It must have the same length as postalCodeRangeBegin: if postalCodeRangeBegin is a postal code then postalCodeRangeEnd must be a postal code too; if postalCodeRangeBegin is a pattern then postalCodeRangeEnd must be a pattern with the same prefix length. Optional: if not set, then the area is defined as being all the postal codes matching postalCodeRangeBegin. |

> **Note**: For Bing Location IDs, see [Geographical Location Codes - Microsoft Advertising API | Microsoft Learn](../bingads-13/guides/geographical-location-codes.md)

### Regions

Contains a list of regions. This is the top-level object that the List request returns.

| Name | Value | Type |
|------|-------|------|
| `nextPageToken` | The token used to get the next page of results. If the object doesn't include this field, there are no more pages to get. | String |
| `resources` | The list of regions. If the Merchant Center store doesn't contain any regions, the array is empty. | Region[] |

### RegionalInventory

Contains a regional inventory.

| JSON name | Value | Type | Required for insert |
|-----------|-------|------|-------------------|
| `regionId` | Unique identifier of the region where you want to override the product's price and availability. | String | Yes |
| `price` | Regional price for the product ID. All users querying from the given regionId see the product at this price.<br><br>object (Price)<br>`{`<br>`"value": "string",`<br>`"currency": "string"`<br>`}` | object (Price) | Yes |
| `salePrice` | Regional sale price for the product ID.<br><br>object (Price)<br>`{`<br>`"value": "string",`<br>`"currency": "string"`<br>`}` | object (Price) | No<br><br>Required if salePriceEffectiveDate is defined. |
| `salePriceEffectiveDate` | Start and end dates for the sale price, if applicable.<br><br>Represented by a pair of ISO 8601 dates separated by a space, comma, or slash. Both dates can be specified as 'null' if undecided. | String | No |
| `availability` | Regional availability for the product ID. All users querying from the given regionId see the product availability accordingly. | String | Yes |
