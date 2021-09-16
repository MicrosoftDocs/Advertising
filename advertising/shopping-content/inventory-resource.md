---
title: "Inventory Resource"
description: "Used to update product pricing."
author: eric-urban
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: eur
---

# Inventory resource

> [!NOTE]
> The Inventory API is available to closed pilot participants only. The API and documentation are subject to change.

The Inventory resource lets you update pricing and availability of products in your Microsoft Merchant Center (MMC) store. For information about using the Inventory resources, see [Updating product pricing](manage-product-pricing.md). For examples that show how to update pricing and availability, see [Code Examples](code-examples.md).

## Base URI

The following is the base URI that you append the templates to.  

`https://content.api.bingads.microsoft.com/shopping/v9.1`


## <a name="templates"></a>Templates

To create the endpoints used to update your product offerings, append the appropriate template to the base URI.

|Template|HTTP Verb|Description
|--------|---------|-----------
|/bmc/{mmcMerchantId}/inventory/batch|POST|Use to perform multiple product pricing updates in a single request.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.<br/><br/>Request object: [Batch](#batch)<br>Response object: [Batch](#batch) 
|/bmc/{mmcMerchantId}/inventory/{storeCode}/products/{productUniqueId}|POST|Use to update pricing and availability of a single product.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.<br/><br/>Set `{storeCode}` to online.<br/><br/>Set `{productUniqueId}` to the fully qualified product ID (for example, Online:en:US:Sku123).<br/><br/>Request object: [Product](#product)<br>Response object: [Product](#product)

## <a name="queryparameters"></a> Query parameters

The endpoints may include the following query parameters.

|Parameter|Description|
|---------|-----------|
|<a name="dryrun"></a>dry-run|Optional. Use when debugging your application to test calls. Calls that include this parameter won't affect production data. If an error occurs, the response contains any errors that the call normally generates except secondary error messages such as data quality, editorial issues, and database-related validations. For more information about testing your application, see [Sandbox](../shopping-content/test-code-sandbox.md). 

## <a name="headers"></a> Headers

The following are the request and response headers.
 
|Header|Description|
|---------|---------------|
|<a name="authtoken"></a>AuthenticationToken|Request header.<br/><br/>Set this header to an OAuth access token. For information about getting an access token, see [Authenticating your credentials](../shopping-content/get-started.md#authentication).
|Content-Type|Request and response header.<br/><br/>The type of content in the body of the request or response. Set to *application/json*.
|<a name="customeraccountid"></a> CustomerAccountId|Request header.<br/><br/>The account ID of any account that you manage on behalf of the customer specified in the `CustomerId` header. It doesn't matter which account you specify. Specify this header only if you manage an account on behalf of the customer.
|<a name="customerid"></a> CustomerId|Request header.<br/><br/>The customer ID of the customer whose store you manage. Specify this header only if you manage the store on behalf of the customer. If you set this header, you must also set the `CustomerAccountId`  header.  
|<a name="devtoken"></a> DeveloperToken|Request header.<br/><br/>The client application's developer token. Each request must include this header. For information about getting a token, see [Do you have your Microsoft Advertising credentials and developer token?](../shopping-content/get-started.md#credentials)
|Location|Response header.<br/><br/>The URL of the product that was updated.
|WebRequestActivityId|Response header.<br/><br/>The ID of the log entry that contains details of the request. You should always capture this ID if an error occurs. If you are not able to determine and resolve the issue, include this ID along with the other information that you provide the Support team.


## <a name="objects"></a> Request and response objects

The following are the request and response objects used by the API.
 
|Object|Description
|------|-----------
|[Batch](#batch)|Defines the list of products to update in a batch request.
|[Error](#error)|Defines an error.
|[ErrorResponse](#errorresponse)|Defines the top-level error object for a non-batch update.
|[BatchEntryError](#batchentryerror)|Defines errors that occurred for an item during batch processing.
|[Entry](#entry)|Defines an entry in a batch request or response.
|[Product](#product)|Defines a product.
|[ProductPrice](#productprice)|Defines a product's price.


### <a name="batch"></a>Batch

Defines the list of products to update in a batch.

|Name|Value|Type
|----|-----|----
|entries|A list of products to update in a batch. The maximum number of products that you can specify is 400.|[Entry](#entry)[]

### <a name="batchentryerror"></a>BatchEntryError

Defines errors that occurred for an entry during batch processing.

|Name|Value|Type
|----|-----|----
|errors|A list of errors that occurred while processing the entry.|[Error](#error)[]
|code|The HTTP status code of the error.|String
|message|The message associated with the error.|String
 

### <a name="error"></a>Error

Defines an error.

|Name|Value|Type
|----|-----|----
|domain|For internal use only.|String
|message|A description of the error.|String
|reason|The reason why the request failed. For example, the product failed validation.|String


### <a name="errorresponse"></a>ErrorResponse

Defines the top-level error object for a single product update.

|Name|Value|Type
|----|-----|----
|error|A list of errors that occurred while processing the item.|[Errors](#errors)[]

### <a name="errors"></a>Errors

Defines the list of errors for a product.

|Name|Value|Type
|----|-----|----
|errors|A list of errors that occurred while processing the entry.|[Error](#error)[]
|code|The HTTP status code of the error.|String
|message|A message associated with the error.|String



### <a name="entry"></a>Entry

Defines an entry in a batch request.

|Name|Value|Type
|----|-----|----
|batchId|A user-defined ID that uniquely identifies this entry in the batch request. For example, if the batch contains 10 entries, you can assign them IDs 1 through 10.|Unsigned Integer
|errors|An error object that contains a list of validation errors that occurred. The response includes this field only when an error occurs.|[BatchEntryError](#batchentryerror)
|inventory|The updated price and availability.|[Product](#product)
|merchantId|The Merchant Center store ID. Because the URL includes the store ID, this field is ignored.|Unsigned Long
|productId|The fully qualified product ID (for example, Online:en:US:Sku123) of the product to update. Do not include multiple entries with the same product ID.|String
|storeCode|The code that identifies the store to update. Set to *online* to update price and availability of products in the online store.|String

### <a name="product"></a>Product

Defines a product. 

|Property|Description|Type|Required
|----|-----|----|-
|<a name="availability"></a>availability|The product's availability. Possible values:<ul><li>in stock</li><li>out of stock</li><li>preorder</li></ul>|String|Yes
|kind|The object's type. Set to *content#inventory*.|String|No
|<a name="price"></a>price|The product's new price. Specify the price in the currency of the target country. For information about whether to include tax in the price, see [Microsoft Merchant Center catalog tax policy](https://help.ads.microsoft.com/#apex/3/en/56731/1).<br/><br/>The price must match the price shown on the product's webpage, and must be in the range 0.01 (1 cent) through 10000000.00 (10 million). However, if the following conditions are met, you may set the price to 0.0 (zero).<ol><li>The product's `googleProductCategory` field is set to one of the following categories:<ul><li>Electronics > Communications > Telephony > Mobile Phones</li><li>Electronics > Computers > Tablet Computers</li></ul><li>The product's `title` field contains one of the following keywords:<ul><li>contract</li><li>installment</li><li>lease</li><li>payment</li></ul>The above keywords are shown in English; however, the title and keyword must be in the language of the specified market.<br/><br/>Typically, the title will contain phrasing such as "... with installment plan" or "... with contract only". The *contract* keyword may be used in all markets; however, *installment*, *payment*, and *lease* may be used only in the US market.</li></ol>|[ProductPrice](#productprice)|Yes
|<a name="saleprice"></a>salePrice|The product's sale price. For sale items, set both the sale price and sale effective date (see `salePriceEffectiveDate`). If you set the sale price but not the sale price effective date, the sale price will continue to be used until the product expires or you set an effective date.<br/><br/>The sale price must be in the range 0.01 (1 cent) through 10000000.00 (10 million). However, if the following conditions are met, you may set the sale price to 0.0 (zero).<ol><li>The googleProductCategory field is set to one of the following categories:<ul><li>Electronics > Communications > Telephony > Mobile Phones</li><li>Electronics > Computers > Tablet Computers</li></ul></li><li>The title field contains one of the following keywords:<ul><li>contract</li><li>installment</li><li>lease</li><li>payment</li></ul>The above keywords are shown in English; however, the title and keyword must be in the language of the specified market.<br/><br/>Typically, the title will contain phrasing such as "... with installment plan" or "... with contract only". The *contract* keyword may be used in all markets; however, *installment*, *payment*, and *lease* may be used only in the US market.</li></ol>If not specified, the current sale's price is removed from the offer. Do not pass null.|[ProductPrice](#productprice)|No
|<a name="salepricedate"></a>salePriceEffectiveDate|The sale's UTC start and end date. Specify a date only if you set `salePrice`.<br/><br/>Specify the begin and end dates in [ISO 8601](https://www.iso.org/iso/iso8601) format. For example, 2016-04-05T08:00-08:00/2016-04-10T19:30-08:00 (use a slash ('/') to separate the start and end dates). For more information, see `salePrice`.<br/><br/>If not specified, the current sale's date is removed from the offer. Do not pass null.|String|No

	
### <a name="productprice"></a>ProductPrice

Defines a product's price or sale price.

|Name|Value|Type
|----|-----|----
|currency|The currency that the price is stated in. Possible values:<ul><li>AUD (Australian dollar)</li><li>CAD (Canadian dollar)</li><li>CHF (Swiss franc)</li><li>EUR (Euro)</li><li>GBP (Great Britain pound)</li><li>INR (Indian rupee)</li><li>SEK (Swedish krona)</li><li>USD (United States dollar)</li></ul>|String
|value|The product's price.|Double



## HTTP status codes

The requests may return the following HTTP status codes.

|Status code|Description
|-----------|-----------
|200|Success.
|400|Bad request. Either a query parameter value is not valid or something in the request body is not valid.<br/><br/>If an error occurs, the batch entry that failed will include the errors.
|401|Unauthorized. The user's credentials are not valid. 
|403|Forbidden. The user does not have permissions to use the resource.
|404|Not found. 
|409|Conflict. The operation could not be completed due to a conflict with the current state of the resource.
|413|Request entity too large. The size of the request exceeds the maximum allowed.
|500|Server error.

