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

> **Note**: For Bing Location IDs, see [Geographical Location Codes - Microsoft Advertising API | Microsoft Learn](../advertising/guides/geographical-location-codes)

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

## Implementation Details

### JSON representation: RegionalInventory

```json
{
  "regionCode": "string",
  "price": {
    "object": "(Price)"
  },
  "salePrice": {
    "object": "(Price)"
  },
  "salePriceEffectiveDate": "string",
  "availability": "string",
  "customAttributes": [
    {
      "object": "(CustomAttribute)"
    }
  ],
  "kind": "string"
}
```

#### Fields

| Field Name | Required | Type | Details |
|------------|----------|------|---------|
| `regionId` | Yes | string | The ID uniquely identifying each region. |
| `price` | Either Price or Availability | object (Price) | `{ "value": "string", "currency": "string" }`<br><br>Price>value: The price represented as a number<br><br>Price>currency: The currency of the price |
| `salePrice` | Optional | object (Price) | The sale price of the product. Required if salePriceEffectiveDate is defined. |
| `salePriceEffectiveDate` | Optional | string | A date range represented by a pair of ISO 8601 dates separated by a space, comma, or slash. Both dates can be specified as 'null' if undecided. |
| `availability` | Either Price or Availability | string | The availability of the product. |

## Methods

| Method | Description |
|--------|-------------|
| batch insert/update | Updates/creates regional inventory for multiple products or regions in a single request |
| insert/update | Updates/creates the regional inventory of a product in your Merchant Center account |

### Method 1. regionalinventory.insert/update

Creates or updates the regional inventory of a product in your Merchant Center account. If a regional inventory with the same region ID already exists, this method updates that entry.

#### HTTP request

```html
POST content/v.x/bmc/?{merchantId}/products/{productId}/regionalinventory?bmc-catalog-id={catalogId}&alt=json
```

#### Path Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `merchantId` | string | The ID of the merchant center |
| `productId` | string | Product.id<br><br>Product ID of the SKU from the primary online feed (corresponding to the same Feed label/target country/region) |
| `catalogId` | string | Catalog/Feed ID of the respective regional Inventory feed in merchant center |

#### Request body

The request body contains an instance of RegionalInventory.

#### Response body

If successful, the response body contains a newly created instance of RegionalInventory.

### Method 2. regionalinventory.batch

Creates or updates regional inventory for multiple products or regions in a single request.

#### HTTP request

```html
POST /content/v2.1/bmc/{merchantId}/regionalinventory/batch?bmc-catalog-id={catalogId}&alt=json
```

#### Request body

The request body contains an instance of RegionalinventoryCustomBatchRequest

##### JSON representation: RegionalinventoryCustomBatchRequest

```json
{
  "entries": [
    {
      "object": "(RegionalinventoryCustomBatchRequestEntry)"
    }
  ]
}
```

##### JSON representation: RegionalinventoryCustomBatchRequestEntry

A batch entry that encodes a single non-batch regional inventory request.

```json
{
  "batchId": "integer",
  "method": "string",
  "productId": "string",
  "regionalInventory": {
    "object": "(RegionalInventory)"
  }
}
```

###### Fields

| Field Name | Required | Type | Details |
|------------|----------|------|---------|
| `batchId` | Yes | integer | An entry ID that's unique within the batch request. |
| `method` | ? | string | Method of the batch request entry.<br>"insert" |
| `productId` | Yes | string | The ID of the product for which to update price and availability. |
| `regionalInventory` | Yes | object (RegionalInventory) | Price and availability of the product. |

#### Response body

##### JSON representation: RegionalinventoryCustomBatchResponseEntry

```json
{
  "batchId": "integer",
  "errors": {
    "object": "(Errors)"
  },
  "regionalInventory": {
    "object": "(RegionalInventory)"
  }
}
```

###### Fields

| Field Name | Type | Details |
|------------|------|---------|
| `batchId` | integer (uint32 format) | The ID of the request entry this entry responds to. |
| `errors` | object (Errors) | A list of errors for failed custombatch entries.<br>* Schema errors fail the whole request. |
| `regionalInventory` | object (RegionalInventory) | Price and availability of the product. |

##### JSON Representation: Errors

```json
{
  "errors": [
    {
      "object": "(Error)"
    }
  ],
  "code": "integer",
  "message": "string"
}
```

###### Fields

| Field Name | Type | Details |
|------------|------|---------|
| `errors[]` | object (Error) | A list of errors. |
| `code` | integer (uint32 format) | The HTTP status of the first error in errors. |
| `message` | string | The message of the first error in errors. |

##### JSON Representation: Error

```json
{
  "domain": "string",
  "reason": "string",
  "message": "string"
}
```

###### Fields

| Field Name | Type | Details |
|------------|------|---------|
| `domain` | string | The domain of the error. |
| `reason` | string | The error code. |
| `message` | string | A description of the error. |

## Support for Regions

### JSON representation: Region

```json
{
  "regionId": "string",
  "merchantId": "string",
  "displayName": "string",
  "countryCode": "string",
  "postalCodes": [
    {
      "object": "(PostalCodeRange)"
    }
  ],
  "geotargetArea": [
    "location Id"
  ],
  "regionalInventoryEligible": "boolean",
  "shippingEligible": "boolean"
}
```

#### Fields

| Field Name | Required | Type | Details |
|------------|----------|------|---------|
| `regionId` | Yes | string | Output only. Immutable. The ID uniquely identifying each region. |
| `merchantId` | Yes | string (int64 format) | Output only. Immutable. Merchant that owns the region. |
| `displayName` | Yes | string | The display name of the region. |
| `countryCode` | Required | string | Country/region the postal code group applies to. |
| `postalCodes[]` | Required | string (int64 format) | A range of postal codes. |
| `geotargetArea` | Either postalCode or geotargetArea | string (int64 format) | A non-empty list of location IDs (states only). |
| `regionalInventoryEligible` | | boolean | Output only. Indicates if the country/region is eligible to use in the regional pos.inventory configuration. |

### JSON Representation PostalCodeArea

```json
{
  "regionCode": "string",
  "postalCodes": [
    {
      "object": "(PostalCodeRange)"
    }
  ]
}
```

| Field Name | Required | Type | Details |
|------------|----------|------|---------|
| `geotargetArea[]` | Required | string (int64 format) | A non-empty list of location IDs (states only) |

### JSON Representation PostalCodeRange

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

## Region Methods

| Method | Description |
|--------|-------------|
| create | Creates a region definition in your Merchant Center id. |
| delete | Deletes a region definition from your Merchant Center id. |
| get | Retrieves a region defined in your Merchant Center id. |
| list | Lists the regions in your Merchant Center id. |
| patch | Updates a region definition in your Merchant Center id. |

### Method 1. regions.create

Creates a region definition in your Merchant Center account.

#### HTTP request

```html
POST /content/v.x/Stores/{merchantId}/regions
```

#### Path Parameters

| Parameter | Required | Type | Description |
|-----------|----------|------|-------------|
| `merchantId` | Required | string (int64 format) | The id of the merchant for which to create region definition |

#### Request body

The request body contains an instance of Region.

#### Response body

If successful, the response body contains a newly created instance of Region.

### Method 2. regions.delete

Deletes a region definition from your Merchant Center account.

#### HTTP request

```html
DELETE /content/v.x/{merchantId}/regions/{regionId}
```

#### Path Parameters

| Parameter | Required | Type | Description |
|-----------|----------|------|-------------|
| `merchantId` | Required | string (int64 format) | The id of the merchant for which to create region definition |
| `regionId` | Required | string | The id of the region to retrieve. |

#### Request body

The request body must be empty.

#### Response body

If successful, the response body is an empty JSON object.

### Method 3. regions.get

Retrieves a region defined in your Merchant Center account.

#### HTTP request

```html
GET /content/v.x/{merchantId}/regions/{regionId}
```

#### Path Parameters

| Parameter | Required | Type | Description |
|-----------|----------|------|-------------|
| `merchantId` | Required | string (int64 format) | The id of the merchant for which to create region definition |
| `regionId` | Required | string | The id of the region to retrieve. |

#### Request body

The request body must be empty.

#### Response body

If successful, the response body contains an instance of Region.

### Method 4. regions.list

Lists the regions in your Merchant Center account.

#### HTTP request

```html
GET /content/v.x/{merchantId}/regions
```

#### Path Parameters

| Parameter | Required | Type | Description |
|-----------|----------|------|-------------|
| `merchantId` | Required | string (int64 format) | The id of the merchant for which to list region definitions. |

#### Query Parameters

| Parameter | Required | Type | Description |
|-----------|----------|------|-------------|
| `pageSize` | | integer | The maximum number of regions to return. The service may return fewer than this value. If unspecified, at most 50 rules will be returned. The maximum value is 1000; values above 1000 will be coerced to 1000. |
| `pageToken` | | string | A page token, received from a previous regions.list call. Provide this to retrieve the subsequent page.<br><br>When paginating, all other parameters provided to regions.list must match the call that provided the page token. |

#### Request body

The request body must be empty.

#### Response body

If successful, the response body contains data with the following structure:

```json
{
  "regions": [
    {
      "object": "(Region)"
    }
  ],
  "nextPageToken": "string",
  "isActive": true,
  "createdBy": "string",
  "createdAt": "dateTime",
  "updatedAt": "dateTime",
  "inUse": "boolean"
}
```

| Field Name | Type | Details |
|------------|------|---------|
| `regions[]` | object (Region) | The regions from the specified merchant. |
| `nextPageToken` | string | A token, which can be sent as pageToken to retrieve the next page. If this field is omitted, there are no subsequent pages. |

### Method 5. regions.update

Updates a region definition in your Merchant Center account.

#### HTTP request

```
PUT /content/v.x/Stores/{merchantId}/regions/{regionId}
```

#### Path Parameters

| Parameter | Required | Type | Description |
|-----------|----------|------|-------------|
| `merchantId` | Required | string (int64 format) | The id of the merchant for which to list region definitions. |
| `regionId` | Required | string | The id of the region to update. |

#### Request body

The request body contains an instance of Region, which will get overridden

#### Response body

If successful, the response body contains an instance of Region.

### Method 6. regions.batch

Batch updates region definitions in your Merchant Center account.

#### HTTP request

```
PUT /content/v.x/Stores/{merchantId}/regions/batch
```

#### Path Parameters

| Parameter | Required | Type | Description |
|-----------|----------|------|-------------|
| `merchantId` | Required | string (int64 format) | The id of the merchant for which to list region definitions. |

#### Request body

The request body contains multiple instances of Region, which will get overridden

#### Response body

If successful, the response body contains an instance of Region.

## Appendix

- [REST Resource: regions | Content API for Shopping | Google for Developers](https://developers.google.com/shopping-content/reference/rest/v2.1/regions)
- [REST Resource: regionalinventory | Content API for Shopping | Google for Developers](https://developers.google.com/shopping-content/reference/rest/v2.1/regionalinventory)
