---
title: "Products Resource"
description: "Provides information about the products resource and related elements of the Content API."
author: jonmeyers
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Products Resource

The Products resource lets you manage product offerings in your Microsoft Merchant Center store (MMC). For information about using the Products resources, see [Managing your Products](../shopping-content/manage-products.md). For examples that show how to add, delete, and get products, see [Code Examples](../shopping-content/code-examples.md).

## Base URI

The following is the base URI that you append the templates to.  

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/`


## <a name="templates"></a>Templates

To create the endpoints used to manage your product offerings, append the appropriate template to the base URI.

|Template|HTTP Verb|Description|Resource
|--------|---------|-----------|--------
|`{mmcMerchantId}/products/batch`|POST|Use to perform multiple inserts (updates), gets, and deletes in a single request. The batch must not include multiple actions for the same product. For example, the request must not try to insert and delete the same product.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.|Request: [Batch](#batch)<br>Response: [Batch](#batch) 
|`{mmcMerchantId}/products/{productUniqueId}`|DELETE|Use to delete a single product offering from the store.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.<br/><br/>Set `{productUniqueId}` to the fully qualified product [ID](#productid) (for example, Online:en:US:Sku123).<br/><br/>If you inserted a product with the same ID in multiple catalogs, it's deleted from all of them.<br/><br/>Deleted products can take up to 12 hours to stop delivering. We recommend updating the product availability to “out of stock” prior to deleting.|Request: N/A<br>Response: N/A
|`{mmcMerchantId}/products/{productUniqueId}`|GET|Use to get a single product offering from the store.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.<br/><br/>Set `{productUniqueId}` to the fully qualified product [ID](#productid) (for example, Online:en:US:Sku123).<br/><br/>If you inserted a product with the same ID in multiple catalogs, the service returns only one of them, and which one is undetermined.|Request: N/A<br>Response: [Product](#product) 
|`{mmcMerchantId}/products`|GET|Use to get a list of products in the store.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.|Request: N/A<br>Response: [Products](#products)
|`{mmcMerchantId}/products`|POST|Use to insert (update) a single product offering in the store.<br/><br/>If the product doesn't exist, it's added; otherwise, the product is updated. Because updates overwrite the current offering, you must include all fields that make up the offer.<br/><br/>To insert the offer into a specific catalog, specify the [bmc-catalog-id](#bmccatalogid) query parameter; otherwise, the product is inserted into the store's default catalog.<br/><br/>Set `{mmcMerchantId}` to the MMC store ID.<br/><br/>**Note** that because Get/List and Delete requests act against the store and not a specific catalog, you should not insert a product with the same [channel](#channel), [contentLanguage](#contentlanguage), [targetCountry](#targetcountry), and [offerId](#offerid) into multiple catalogs.|Request: [Product](#product)<br>Response: [Product](#product)

## <a name="queryparameters"></a> Query parameters

The endpoints may include the following query parameters.

|Parameter|Description|
|---------|-----------|
|<a name="alt"></a>alt|Optional. Use to specify the type of content that's used in the request and response. The possible values are `json` and `xml`. The default is `json`.
|<a name="bmccatalogid"></a>bmc-catalog-id|Optional. Use to specify the catalog to insert (update) product offerings into.<br/><br/>Use this parameter if your store contains multiple catalogs. If you do not specify this parameter, the product is inserted into the store's default catalog.<br/><br/>This parameter is only used to insert product offerings. This parameter is ignored for Get, List, and Delete requests because they operate across catalogs. 
|<a name="dryrun"></a>dry-run|Optional. Use when debugging your application to test calls. Calls that include this parameter won't affect production data (products are not inserted or deleted); however, the response will contain any errors that the call generates.<br/><br/>Consider the following limitations when using this parameter.<ul><li>Insert operations don't return IDs.</li><li>The service doesn't generate or return secondary error messages such as data quality, editorial issues, and database-related validations.</li></ul>For more information about testing your application, see [Sandbox](../shopping-content/test-code-sandbox.md). 
|<a name="maxresults"></a>max-results|Optional. Use to specify the maximum number of items to return in a List request. The maximum value that you may specify is 250. The default is 25. 
|<a name="starttoken"></a>start-token|Optional. Use to page through a store's list of products. The token identifies the next page of products to return in a List request. Do not specify this parameter in the first List request. If the catalog contains more than the requested number of products (see the **max-results** query parameter), the response includes the `nextPageToken` field (see [Products](#products)), which contains the token value that you use in the next List request.

## <a name="headers"></a> Headers

The following are the request and response headers.
 
|Header|Description|
|---------|---------------|
|<a name="authtoken"></a>AuthenticationToken|Request header.<br/><br/>Set this header to an OAuth access token. For information about getting an access token, see [Authenticating your credentials](../shopping-content/get-started.md#authentication).
|Content-Location|Response header.<br/><br/>A URL that identifies the store that the product was inserted into. This header is included in the response of an Insert request.
|Content-Type|Request and response header.<br/><br/>The type of content in the body of the request or response. For POSTs, if you use JSON, set this header to `application/json`. Otherwise, if you use XML, set this header to `application/xml`.
|<a name="customeraccountid"></a> CustomerAccountId|Request header.<br/><br/>The account ID of any account that you manage on behalf of the customer specified in the `CustomerId` header. It doesn't matter which account you specify. Specify this header only if you manage an account on behalf of the customer.
|<a name="customerid"></a> CustomerId|Request header.<br/><br/>The customer ID of the customer whose store you manage. Specify this header only if you manage the store on behalf of the customer. If you set this header, you must also set the `CustomerAccountId`  header.  
|<a name="devtoken"></a> DeveloperToken|Request header.<br/><br/>The client application's developer token. Each request must include this header. For information about getting a token, see [Do you have your Microsoft Advertising credentials and developer token?](../shopping-content/get-started.md#credentials)
|Location|Response header.<br/><br/>A URL that identifies the store that the product was inserted into. This header is included in the response of an Insert request. 
|WebRequestActivityId|Response header.<br/><br/>The ID of the log entry that contains details of the request. You should always capture this ID if an error occurs. If you are not able to determine and resolve the issue, include this ID along with the other information that you provide the Support team.


## <a name="objects"></a> Request and response objects

The following are the request and response objects used by the API.
 
Each object defines the JSON key name and XML element name that you use depending on the content type that you specified for the request. 


|Object|Description
|------|-----------
|[Batch](#batch)|Defines the list of items to process in a batch request.
|[Error](#error)|Defines an error.
|[ErrorResponse](#errorresponse)|Defines the top-level error object for a single product insert.
|[BatchItemError](#batchitemerror)|Defines errors that occurred for an item during batch processing.
|[Item](#item)|Defines an item in a batch request or response.
|[Product](#product)|Defines a product.
|[ProductCustomAttribute](#productcustomattribute)|Defines a custom attribute.
|[ProductCustomGroup](#productcustomgroup)|Defines a group of custom attributes.
|[ProductDestination](#productdestination)|Defines a destination.
|[ProductPrice](#productprice)|Defines a product's price.
|[ProductTax](#producttax)|Defines the geographic location that determines the applicable taxes.
|[Products](#products)|Defines a list of products.
|[ProductShipping](#productshipping)|Defines the shipping cost.
|[ProductShippingWeight](#productshippingweight)|Defines the item's shipping weight.
|[UnitPricing](#unitpricing)|Defines the item's per unit price.
|[Warning](#warning)|Defines a warning message.


### <a name="batch"></a>Batch

Defines the list of items to process in a batch request.
**Note** that this object is used in a batch request and response. 

|Name|Value|Type|XML element name
|----|-----|----|--------
|entries|An array of items to process in a batch request.<br/><br/>The maximum number of items that you can specify is 12,000. However, the maximum request size is 4 MB, so the actual number of items depends upon the number of product attributes (for example, size, color, pattern) that you include and whether you compress the data. For example, if you compress the data you may be able to specify 12,000 items, but if you don't, you may be able to specify only 2,000 items.|[Item](#item)[]|\<batch\>

### <a name="batchitemerror"></a>BatchItemError

Defines errors that occurred for an item during batch processing.

|Name|Value|Type|XML element name
|----|-----|----|--------
|errors|A list of errors that occurred while processing the item.|[Error](#error)[]|\<errors\> 
|code|The HTTP status code of the error.|String
|message|A message associated with the error.|String
 

### <a name="error"></a>Error

Defines an error.

|Name|Value|Type|XML element name
|----|-----|----|--------
|domain|For internal use only.|String|\<domain\>
|location|Not used.|String|\<location type="string"\> 
|locationType|Not used.|String|See the **type** attribute of the \<location\> element  
|message|A description of the error.|String|\<internalReason\> 
|reason|The reason why the request failed. For example, the product failed validation.|String|\<reason\> 


### <a name="errorresponse"></a>ErrorResponse

Defines the top-level error object for a single product insert.

|Name|Value|Type|XML element name
|----|-----|----|--------
|error|A list of errors that occurred while processing the item.|[Errors](#errors)[]|\<error\> 

### <a name="errors"></a>Errors

Defines the list of errors and warnings for an offer.

|Name|Value|Type|XML element name
|----|-----|----|--------
|errors|A list of errors that occurred while processing the item.|[Error](#error)[]|\<errors\> 
|warnings|A list of warnings that occurred while processing the item. The offer was accepted but you should address the issues at your earliest convenience. For example,  MMC returns warnings if you do not specify the [gtin](#gtin), [mpn](#mpn), and [brand](#brand) identifiers if they should be known.|[Warning](#warning)[]|\<warnings\> 
|code|The HTTP status code or the error.|String
|message|A message associated with the error.|String



### <a name="item"></a>Item

Defines an item in a batch request.

|Name|Value|Type|XML element name
|----|-----|----|--------
|batchId|A user-defined ID that identifies this item in the batch request. For example, if the batch contains 10 items, you can assign them IDs 1 through 10.|Unsigned Integer|\<entry batch_id="unsigned integer" method="string"\>
|errors|An error object that contains a list of validation errors that occurred. The response includes this field only when an error occurs.|[BatchItemError](#batchitemerror)|\<errors\>
|merchantId|The Merchant Center store ID.|Unsigned Long|\<merchant_id\>
|method|The action to apply to the item. The possible values are `insert`, `get`, and `delete`. If the item is adding or updating a product offering, set **method** to `insert`; if the item is deleting a product, set **method** to `delete`; and if the item is getting a product, set **method** to ```get```. The strings are case insensitive.|String|See the `method` attribute of the \<entry\> element
|product|The product offering. Specify this field in a request only if inserting (updating) a product. The response will include this field for gets and inserts (updates) only.|[Product](#product)|\<product\>
|productId|The fully qualified product ID (for example, Online:en:US:Sku123). Include this field only when getting or deleting a product offering.<br/><br/>Do not include multiple items with the same product ID in a batch request.|String|\<product_id\>

### <a name="product"></a>Product

Defines a product. For more information about the fields in this object, see [How is the feed file organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1-500)

|JSON and XML Name|Value|Type|Required for insert
|----|-----|----|-------------------
|additionalImageLinks<br/><br/>\<additional_image_link\>|The URLs of additional images of the product that can be used in the product ad. To specify multiple images,<br/><br/>MMC does not use the additional images; this field is included for Google compatibility.|String[]|No
|adult<br/><br/>\<adult\>|A Boolean value that determines whether the item is an adult  product. Set to **true** if the item's target market is adults. The default is **false**.<br/><br/>Note that adult products are not supported and will be rejected.|Boolean|No
|adwordsGrouping<br/><br/>\<adwords_grouping\>|A group of items for Cost-per-acquisition (CPA) bidding.<br/><br/>MMC does not use this field; it's included for Google compatibility.|String|No
|adwordsLabels<br/><br/>\<adwords_label\>|The labels for grouped items (see adwordsGrouping). Applies to Cost-per-click (CPC) only.<br/><br/>MMC does not use this field; it's included for Google compatibility.|String[]|No
|<a name="adwordsredirect"></a>adwordsRedirect<br/><br/>\<adwords_redirect\>|The URL to use in the product ad. If specified, this URL must redirect to the URL specified in [link](#link).|String|No
|ageGroup<br/><br/>\<age_group\>|The target age group of the item. The following are the possible values.<br/><br/><ul><li>adult</li><li>kids</li><li>toddler</li><li>infant</li><li>newborn</li></ul>|String|No
|<a name="availability"></a>availability<br/><br/>\<availability\>|The availability status of the product. The following are the possible values.<br/><br/><ul><li>in stock</li><li>out of stock</li><li>preorder</li></ul>The default is *in stock*.<!--<br/><br/>If you specify preorder, and know the date that the product will be available for shipping, you should also set the `availabilityDate` field.--><br/>|String|Yes
|availabilityDate<br/><br/>\<availability_date\>|The UTC date that a pre-order product will be available for shipping (see the `availability` field). This field is optional but if you know the date that the pre-ordered product will be available for shipping, you should set this field. Specify the date in ISO 8601 format.<br/><br/>**NOTE:** MMC currently ignores the contents of this field.|String|No
|<a name="brand"></a>brand<br/><br/>\<brand\>|The item's brand, manufacturer, or publisher. The string may contain a maximum of 10 words and 1,000 characters. To ensure the string displays well in the UX, you should limit the brand name to no more than 70 characters.|String|Yes
|<a name="channel"></a>channel<br/><br/>\<channel\>|The sales channel for the product. The following are the possible case-insensitive values.<br/><br/><ul><li>Local</li><li>Online</li></ul>Because channel is used to create the product [ID](#productid), you may not change this field after adding the product to the store.|String|Yes
|color<br/><br/>\<color\>|The product's dominant color. If the color is a blend of colors, you may specify a slash-delimited list of up to 3 colors (for example, red/green/blue).<br/><br/>If a dress is available in multiple colors, you would create a product for each color and use [itemGroupId](#itemgroupid) to group the product's variants.<br/><br/>The field is limited to 100 characters.<br/><br/>Recommended for apparel items.|String|No
|<a name="condition"></a>condition<br/><br/>\<condition\>|The condition of the product. The following are the possible values.<br/><br/><ul><li>new</li><li>refurbished</li><li>used</li></ul>The default is *new*.|String|Yes
|<a name="contentlanguage"></a>contentLanguage<br/><br/>\<content_language\>|The two-letter [ISO 639-1](http://loc.gov/standards/iso639-2/php/code_list.php) language code for the product. The following are the possible case-insensitive values:<ul><li>Albanian (sq)</li><li>Bosnian (bs)</li><li>Bulgarian (bg)</li><li>Croatian (hr)</li><li>Czech (cs)</li><li>Dutch (nl)</li><li>English (en)</li><li>Estonian (et)</li><li>French (fr)</li><li>German (de)</li><li>Greek (el)</li><li>Hungarian (hu)</li><li>Icelandic (is)</li><li>Italian (it)</li><li>Latvian (lv)</li><li>Lithuanian (lt)</li><li>Macedonian (mk)</li><li>Maltese (mt)</li><li>Polish (pl)</li><li>Portuguese (pt)</li><li>Romanian (ro)</li><li>Serbian (sr)</li><li>Slovak (sk)</li><li>Slovenian (sl)</li><li>Spanish (es)</li><li>Swedish (sv)</li><li>Turkish (tr)</li></ul><br Because the language is used to create the product [ID](#productid), you may not change this field after adding the product to the store.|String|Yes
|customAttributes<br/><br/>\<custom_attribute\>|A list of custom attributes used by the merchant.|[ProductCustomAttribute](#productcustomattribute)[]|No
|customGroups\<custom_group\>|A list of custom groups used by the merchant.|[ProductCustomGroup](#productcustomgroup)[]|No
|customLabel0<br/><br/>\<custom_label_0\>|Custom label 0, which is used to filter products for Microsoft Shopping campaigns. The label is limited to 100 characters.|String|No
|customLabel1<br/><br/>\<custom_label_1\>|Custom label 1, which is used to filter products for Microsoft Shopping campaigns. The label is limited to 100 characters.|String|No
|customLabel2<br/><br/>\<custom_label_2\>|Custom label 2, which is used to filter products for Microsoft Shopping campaigns. The label is limited to 100 characters.|String|No
|customLabel3<br/><br/>\<custom_label_3\>|Custom label 3, which is used to filter products for Microsoft Shopping campaigns. The label is limited to 100 characters.|String|No
|customLabel4<br/><br/>\<custom_label_4\>|Custom label 4, which is used to filter products for Microsoft Shopping campaigns. The label is limited to 100 characters.|String|No
|description<br/><br/>\<description\>|A description of the product. The description may not include promotional text. The description is limited to a maximum of 10,000 characters, and may include any Unicode characters.<br/><br/>The description will undergo editorial review.|String|No
|destinations<br/><br/>\<destination\>|The intended destinations of the product.<br/><br/>MMC does not use this field; it's included for Google compatibility.|[ProductDestination](#productdestination)[]|No
|energyEfficiencyClass<br/><br/>\<energy_efficiency_class\>|The energy efficiency class as defined in [EU directive 2010/30/EU](http://www.eea.europa.eu/policy-documents/directive-2010-30-eu). The following are the possible values.<br/><br/><ul><li>A</li><li>A+</li><li>A++</li><li>A+++</li><li>B</li><li>C</li><li>D</li><li>E</li><li>F</li><li>G</li></ul>|String|No
|<a name="expirationdate"></a>expirationDate<br/><br/>\<expiration_date\>|The UTC date and time that specifies when the product will expire.<br/><br/>If you do not specify an expiration date, the product expires 30 days from the date and time that you add or update the product (the date and time are based on the Microsoft server's timezone).<br/><br/>Use this field to specify an expiration date that's less than 30 days from today.<br/><br/>Your expiration date should always include the time component and specify the timezone or offset information. If it doesn't, the API will try to determine the timezone by using [targetCountry](#targetcountry). For countries or regions with multiple time zones, the API determines the timezone to use. For example, if the country is US, the API will use pacific standard time (PST).<br/><br/>You should track products that are nearing expiration and before they expire either update their expiration date or simply update the product (you do not have to update any of the product's fields) which will automatically extend the expiration date another 30 days. If you explicitly set the expiration date, you must set a new expiration date yourself; updating the product will not automatically extend the expiration date another 30 days in this case.|String|No
|gender<br/><br/>\<gender\>|The gender that the product targets. The following are the possible values.<br/><br/><ul><li>female</li><li>male</li><li>unisex</li></ul>|String|No
|<a name="productcategory"></a>googleProductCategory<br/><br/>\<google_product_category\>|The product category that the product is found in. You may specify either a category string (for example, Animals & Pet Supplies > Pet supplies > Bird Supplies) or a category ID (for example, 3). For a category string, the list of subcategories is delimited by the greater than symbol ('>'). The field is limited to 255 characters.|String|No
|<a name="gtin"></a>gtin<br/><br/>\<gtin\>|The Global Trade Item Number (GTIN) assigned by the manufacturer. If the manufacturer assigns a GTIN, you must specify it. The following are types of GTINs.<br /><br /><ul><li>EAN (European Article Number)</li><li>ISBN (International Standard Book Number)</li><li>JAN (Japanese Article Number)</li><li>UPC (Universal Product Code)</li></ul>|String|Yes
|<a name="productid"></a>id<br/><br/>\<id\>|The fully qualified product id. The ID is a composite of [channel](#channel), [contentLanguage](#contentlanguage), [targetCountry](#targetcountry), and [offerId](#offerid). The ID is case sensitive.<br/><br/>Use this ID to get or delete a product.|String|No
|<a name="identifierexists"></a>identifierExists<br/><br/>\<identifier_exists\>|A Boolean value that determines whether the product offer specifies the [gtin](#gtin), [mpn](#mpn), or [brand](#brand) identifiers. The default is **true**. Set to **false** if you do not specify all three of the identifiers. <br /><br />Unique product identifiers define a product in a global marketplace. Tagging your products with unique identifiers makes it easier for customers to find your products. You should specify all three identifiers, if known. |Boolean|No
|<a name="imagelink"></a>imageLink<br/><br/>\<image_link\>|The URL to an image of the product that can be used in the product ad. The URL is limited to 1,000 characters and may use the HTTP or HTTPS protocol. The allowed image types are bmp, gif, exif, jpg, png, and tiff. The recommended image size is 200x200 pixels. The image may not exceed 3.9 MB.<br/><br/>The image will undergo editorial review.|String|Yes
|isBundle<br/><br/>\<is_bundle\>|A Boolean value that determines whether the product is a merchant-defined bundle. The value is **true** if the product is a bundle.|Boolean|No
|<a name="itemgroupid"></a>itemGroupId<br/><br/>\<item_group_id\>|An ID that can be used to group all variants of the same product. For example, if the dress is available in 3 colors, you could create a product for each color and use this ID to group them. Typically, you group items that vary by color, material, pattern or size.<br/><br/>The ID must be unique within a catalog, and is limited to 50 characters.|String|No
|kind<br/><br/>\<kind\>|The object's type. This field is set to `content#product`.|String|No
|<a name="link"></a>link<br/><br/>\<link\>|The URL to the product's page on your website. The URL is limited to 2,000 characters and may use the HTTP or HTTPS protocol. The domain must match the store's domain.<br/><br/>The link is used in the product ad. The URL may not be redirected. To use another URL in the product ad that may be redirected to this URL, see [adwordsRedirect](#adwordsredirect).<br/><br/>The webpage that this link points to will undergo editorial review.|String|Yes
|material<br/><br/>\<material\>|The product's dominant material. If the material is a blend of materials, you may specify a slash-delimited list of up to 3 materials (for example, leather/suede/silk).<br/><br/>If a dress is available in multiple materials, you would create a product for each material and use [itemGroupId](#itemgroupid) to group the product's variants.<br/><br/>The field is limited to 200 characters.<br/><br/>Recommended for apparel items.|String|No
|mobileLink<br/><br/>\<mobile_link\>|A URL to a mobile-optimized version of the webpage that contains information about the product (see [link](#link)).|String|No
|multipack<br/><br/>\<multipack\>|The number of identical products being sold as a single unit (for example, 4 flashlights). When setting the price, it must be the **total** price of the multipack.|Integer|No
|<a name="mpn"></a>mpn<br/><br/>\<mpn\>|The manufacturer part number (MPN) of the product. If the manufacturer assigns an MPN, you must specify it. The MPN is limited to 70 characters.|String|Yes
|<a name="offerid"></a>offerId<br/><br/>\<offer_id\>|The user-defined ID of the product being offered. The offer ID is case insensitive and must be unique within a catalog, and is limited to a maximum of 50 characters.<br/><br/>Because the offer ID is used to create the product [ID](#productid), you may not change this field after adding the product to the store.|String|Yes
|onlineOnly<br/><br/>\<online_only\>|A Boolean value that determines whether the product is only available for purchase online. The value is **true** if the product is available only online. The default is **false**.|Boolean|No
|pattern<br/><br/>\<pattern\>|The pattern or graphic print of the product (for example, plaid). The pattern is limited to 100 characters.<br/><br/>If a dress is available in multiple patterns, you would create a product for each pattern and use [itemGroupId](#itemgroupid) to group the product's variants.<br/><br/>Recommended for apparel items.|String|No
|<a name="price"></a>price<br/><br/>\<price\>|The product's price. Specify the price in the currency of the target country. For information about whether to include tax in the price, see [Microsoft Merchant Center catalog tax policy](https://help.ads.microsoft.com/#apex/3/en/56731/1). The price must match the price shown on the product's webpage (see [link](#link)), and must be in the range 0.01 (1 cent) through 10000000.00 (10 million).<br/><br/>However, if the following conditions are met, you may set the price to 0.0 (zero).<br/><br/>1. The [googleProductCategory](#productcategory) field is set to one of the following categories:<br/>&nbsp;&nbsp;&nbsp;&nbsp;- Electronics > Communications > Telephony > Mobile Phones<br/>&nbsp;&nbsp;&nbsp;&nbsp;- Electronics > Computers > Tablet Computers<br/>2. The [title](#title) field contains one of the following keywords:<br/>&nbsp;&nbsp;&nbsp;&nbsp;- contract<br/>&nbsp;&nbsp;&nbsp;&nbsp;- installment<br/>&nbsp;&nbsp;&nbsp;&nbsp;- lease<br/>&nbsp;&nbsp;&nbsp;&nbsp;- payment<br/><br/>The above keywords are shown in English; however, the title and keyword must be in the language of the specified market.<br/><br/>Typically, the title will contain phrasing such as "... with installment plan" or "... with contract only". The *contract* keyword may be used in all markets; however, *installment*, *payment*, and *lease* may be used only in the US market.|[ProductPrice](#productprice)|Yes
|<a name="producttype"></a>productType<br/><br/>\<product_type\>|The advertiser-defined product category, which may be different from `googleProductCategory`. For example, Animals & Pet Supplies > Pet supplies > Bird Supplies > Veterinary. The list of subcategories is delimited by the greater than symbol ('>'). The field is limited to 750 characters.<br/><br/>You may specify multiple category strings that are comma delimited. For example, Costumes & Accessories > Wig Accessories > Wig Caps, Costumes & Accessories > Wig Accessories > Wig Glue.|String|No
|<a name="promotionid"></a>promotionId<br/><br/>\<promotion_id\>|A comma-delimited list of IDs that identify promotions in your Promotions feed. You may specify a maximum of 10 promotion IDs.<br/><br/>The ID must contain a minimum of 1 character and a maximum of 60 characters. The allowed characters are any alphanumeric characters, a dash (-), and an underscore (_).<br/><br/>All IDs for a market (see [contentLanguage](#contentlanguage) and [targetCountry](#targetcountry)) must be unique. For example, within a market, you may not use *PROMO1* and *promo1*, but you could use *PROMO1* in the en-US market and *promo1* in the en-GB market. You may specify the same unique promotion ID on one or more products.<br/><br/>Microsoft promotes the product if the ID that you specify matches a promotion ID in your Promotions feed (for the same target country). The IDs match only if the casing is the same. For example, the IDs match if the product's ID is *PROMO1* and the feed's ID is *PROMO1*, but they do not match if the feed's ID is *Promo1*. <br/><br/>To ensure that the product is not accidentally promoted in the future, you should remove the IDs of promotions that have ended. Although the ID cannot be used again in a Promotions feed for 6 months after the promotion ends, if the ID is reused in another promotion after that, the product will be promoted.|String|No	
|<a name="saleprice"></a>salePrice<br/><br/>\<sale_price\>|The item's sale price. The sale price must be in the range 0.01 (1 cent) through 10000000.00 (10 million).<br/><br/>For sale items, set both the sale price and sale effective date (see `salePriceEffectiveDate`). If you set the sale price but not the sale price effective date, the sale price will continue to be used until the product expires or you set an effective date.<br/><br/>If the following conditions are met, you may set the sale price to 0.0 (zero).<br/><br/>1. The [googleProductCategory](#productcategory) field is set to one of the following categories:<br/>&nbsp;&nbsp;&nbsp;&nbsp;- Electronics > Communications > Telephony > Mobile Phones<br/>&nbsp;&nbsp;&nbsp;&nbsp;- Electronics > Computers > Tablet Computers<br/>2. The [title](#title) field contains one of the following keywords:<br/>&nbsp;&nbsp;&nbsp;&nbsp;- contract<br/>&nbsp;&nbsp;&nbsp;&nbsp;- installment<br/>&nbsp;&nbsp;&nbsp;&nbsp;- lease<br/>&nbsp;&nbsp;&nbsp;&nbsp;- payment<br/><br/>The above keywords are shown in English; however, the title and keyword must be in the language of the specified market.<br/><br/>Typically, the title will contain phrasing such as "... with installment plan" or "... with contract only". The *contract* keyword may be used in all markets; however, *installment*, *payment*, and *lease* may be used only in the US market.|[ProductPrice](#productprice)|No
|<a name="salepricedate"></a>salePriceEffectiveDate<br/><br/>\<sale_price_effective_date\>|The sale's UTC start and end date. Specify the dates in [ISO 8601](http://www.iso.org/iso/iso8601) format. For example, 2016-04-05T08:00-08:00/2016-04-10T19:30-08:00 (use a slash ('/') to separate the start and end dates). For more information, see `salePrice`.|String|No
|sellerName<br/><br/>\<seller_name\>|The name of the merchant that's selling the product. Used only by aggregators to identify the merchant. Aggregators are third party sites that behave on behalf of individual merchants. The products that an aggregator submits on behalf of the merchant must comply with Microsoft Advertising policies and [Terms of Service](https://help.ads.microsoft.com/#apex/3/en/52023/1).<br/><br/>Aggregators must set this field to the sellers name. If the caller is not an aggregator and this field is not set, it will default to the store name.<br/><br/>The name is limited to 255 characters.|String|No
|shipping<br/><br/>\<shipping\>|The price to ship the product based on location.<br/><br/>NOTE: Shipping is required if the target country is DE (Germany); otherwise, it's optional.|[ProductShipping](#productshipping)[]|Yes
|shippingLabel<br/><br/>\<shipping_label\>|The shipping label.<br/><br/>NOTE: Shipping information is required if the target country is DE (Germany); otherwise, it's optional.|String|Yes
|shippingWeight<br/><br/>\<shipping_weight\>|The weight of the product. The weight is used for shipping purposes.<br/><br/>NOTE: Shipping information is required if the target country is DE (Germany); otherwise, it's optional.|[ProductShippingWeight](#productshippingweight)|Yes
|sizes<br/><br/>\<size\>|The available sizes of the product. For example, small, medium, and large. Apply the sizing consistently. The size value is user-defined but should be based on your target country. This field is required for all Apparel & Accessories products when targeting: France, Germany, United Kingdom, and United States.|String[]|No
|sizeSystem<br/><br/>\<size_system\>|The measurement system used to size the product. For example, shoes may be sized using the US system or the UK system.<br/><br/>The following are the possible values.<br/><br/><ul><li>AU</li><li>DE</li><li>FR</li><li>UK</li><li>US</li></ul>Defaults to the system used by the target country. Recommended for apparel items. |String|No
|sizeType<br/><br/>\<size_type\>|The cut of the product. The following are the possible values.<br/><br/><ul><li>regular</li><li>maternity</li><li>petite</li><li>plus</li><li>big and tall</li></ul>Defaults to Regular. Recommended for apparel items.|String|No
|<a name="targetcountry"></a>targetCountry<br/><br/>\<target_country\>|The two-letter [ISO 3166](https://www.iso.org/obp/ui/#search/code/) country code of the target country (the country where you want to advertise the product). The country must match the market specified by the catalog.<br/><br/>The following are the possible case-insensitive values:<br/><br/><ul><li>AD (Andorra)</li><li>AL (Albania)</li><li>AR (Argentina)</li><li>AW (Aruba)</li><li>AT (Austria)</li><li>AU (Australia)</li><li>BS (Bahamas)</li><li>BD (Bangladesh)</li><li>BA (Bosnia and Herzegovina)</li><li>BE (Belgium)</li><li>BO (Bolivia)</li><li>BG (Bulgaria)</li><li>BR (Brazil)</li><li>BN (Brunei)</li><li>CA (Canada)</li><li>KY (Cayman Islands)</li><li>CH (Switzerland)</li><li>CL (Chile)</li><li>CO (Colombia)</li><li>CR (Costa Rica)</li><li>CY (Cyprus)</li><li>CZ (Czech Republic)</li><li>DE (Germany)</li><li>DK (Denmark)</li><li>DM (Dominica)</li><li>DO (Dominican Republic)</li><li>EC (Ecuador)</li><li>SV (El Salvador)</li><li>EE (Estonia)</li><li>ES (Spain)</li><li>FJ (Fiji)</li><li>FI (Finland)</li><li>FR (France)</li><li>GF (French Guiana)</li><li>PF (French Polynesia)</li><li>GB (Great Britain)</li><li>GR (Greece)</li><li>GU (Guam)</li><li>GT (Guatemala)</li><li>GY (Guyana)</li><li>HT (Haiti)</li><li>HN (Honduras)</li><li>HR (Croatia)</li><li>HU (Hungary)</li><li>ID (Indonesia)</li><li>IE (Ireland)</li><li>IN (India)</li><li>IS (Iceland)</li><li>IT (Italy)</li><li>LI (Liechtenstein)</li> <li>LT (Lithuania)</li><li>LU (Luxembourg)</li><li>LV (Latvia)</li><li>MV (Maldives)</li><li>MC (Monaco)</li><li>ME (Montenegro)</li><li>MK (North Macedonia)</li><li>MT (Malta)</li><li>MQ (Martinique)</li><li>MY (Malaysia)</li><li>MX (Mexico)</li><li>MN (Mongolia)</li><li>MS (Montserrat)</li><li>NP (Nepal)</li><li>NL (Netherlands)</li><li>NC (New Caledonia)</li><li>NO (Norway)</li><li>NZ (New Zealand)</li><li>PA (Panama)</li><li>PG (Papua New Guinea)</li><li>PH (Philippines)</li><li>PY (Paraguay)</li><li>PE (Peru)</li><li>PL (Poland)</li><li>PT (Portugal)</li><li>PR (Puerto Rico)</li><li>RO (Romania)</li><li>RS (Serbia)</li><li>LK (Sri Lanka)</li><li>SE (Sweden)</li><li>SG (Singapore)</li><li>SI (Slovenia)</li><li>SK (Slovakia)</li><li>SM (San Marino)</li><li>TH (Thailand)</li><li>TT (Trinidad and Tobago)</li><li>TR (Türkiye)</li><li>US (United States)</li><li>UT (Uruguay)</li><li>VA (Vatican City)</li><li>VE (Venezuela)</li><li>VN (Vietnam)</li><li>ZA (South Africa)</li></ul>Because the country is used to create the product [ID](#productid), you may not change this field after adding the product to the store.|String|Yes
|taxes<br/><br/>\<tax\>|The tax information of the product.<br/><br/>MMC does not use this field; it's included for Google compatibility.|[ProductTax](#producttax)[]|No
|<a name="title"></a>title<br/><br/>\<title\>|The product's title (for example, Women's Shoes). The title may not include promotional text. The title is limited to a maximum of 150 characters, and may include any Unicode character.<br/><br/>The title will undergo editorial review.|String|Yes
|unitPricingBaseMeasure<br/><br/>\<unit_pricing_base_measure\>|The product's base measure for pricing (for example, 100ml means the price is calculated based on a 100ml unit).<ul><li>Weight: oz, lb, mg, g, kg</li><li>Volume (US imperial): floz, pt, qt, gal</li><li>Volume: ml, cl, l, cbm</li><li>Length: in, ft, yd, cm, m</li><li>Area: sqft, sqm</li><li>Per unit: ct</li></ul><br/>|[UnitPricing](#unitpricing)|No
|unitPricingMeasure<br/><br/>\<unit_pricing_measure\>|The measure and dimension of product as it is sold.<ul><li>Weight: oz, lb, mg, g, kg</li><li>Volume (US imperial): floz, pt, qt, gal</li><li>Volume: ml, cl, l, cbm</li><li>Length: in, ft, yd, cm, m</li><li>Area: sqft, sqm</li><li>Per unit: ct</li></ul><br/>|[UnitPricing](#unitpricing)|No
|validatedDestinations<br/><br/>\<validated_destination\>|The read-only list of intended destinations that have passed validation.<br/><br/>MMC does not use this field; it's included for Google compatibility.|String[]|No
|<a name="warnings"></a>warnings|A list of warnings about issues with the product offer. The offer was accepted but you should address the issues at your earliest convenience. For example,  MMC returns warnings if you do not specify the [gtin](#gtin), [mpn](#mpn), and [brand](#brand) identifiers if they should be known.<br /><br />The offer includes this field only in the response of an insert/update.|[Warning](#warning)[]|No

### <a name="productcustomattribute"></a>ProductCustomAttribute

Defines a custom attribute.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|name|Gets or sets the attribute's name.|String|\<name\>
|type|Gets or sets the attribute's type. The following are the possible values.<br/><br/><ul><li>boolean</li><li>datetimerange</li><li>float</li><li>group</li><li>int</li><li>price</li><li>text</li><li>time</li><li>url</li></ul>|String|\<type\>
|unit|Gets or sets the attribute's unit of measure. Used for values of type INT and FLOAT only.|String|\<unit\>
|value|Gets or sets the attribute's value.|String|\<value\>

### <a name="productcustomgroup"></a>ProductCustomGroup

Defines a group of customer attributes.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|attributes|Gets or sets the attributes for the group.|[ProductCustomAttribute](#productcustomattribute)|\<attributes\>
|name|Gets or sets the name of the group.|String|\<name\>

### <a name="productdestination"></a>ProductDestination

Defines a destination.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|intention|The following are the possible values.<br/><br/><ul><li>default</li><li>excluded</li><li>optional</li><li>required</li></ul>|String|\<intention\>
|destinationName|Gets or sets the name of the destination.|String|\<destination_name\>

	
### <a name="productprice"></a>ProductPrice

Defines a product's price or sale price.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|currency|Gets or sets the currency that the price is stated in. Specify the currency using ISO 4217 currency codes. The following are the possible values.<br/><br/><ul><li>AUD (Australian dollar)</li><li>CHF (Swiss franc)</li><li>CAD (Canadian dollar)</li><li>EUR (Euro)</li><li>GBP (Great Britain pound)</li><li>IDR (Indonesian rupiah)</li><li>INR (Indian rupee)</li><li>MYR (Malaysian ringgit)</li><li>NZD (New Zealand dollar)</li><li>PHP (Philippine peso)</li><li>SEK (Swedish krona)</li><li>SGD (Singapore dollar)</li><li>THB (Thai baht)</li><li>USD (United States dollar)</li><li>VND (Vietnamese dong)</li></ul>|String|`currency` attribute.<br/><br/>For example, \<price currency="USD"\>.
|value|Gets or sets the price of the item. Do not include currency symbols such as '$'.|Double|Text value.<br/><br/>For example, \<price currency="USD"\>38.0\<\\price\>.

### <a name="products"></a>Products

Defines a list of products.
**Note** that this is the top-level object that the List request returns.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|kind|Gets the object's type. This field is set to content#productsListResponse.|String|\<kind\>
|nextPageToken|Gets the token used to get the next page of results. If the object does not include this field, there are no more pages to get. See [start-token](#starttoken). |String|\<next_page_token\>
|resources|Gets the list of products. If the catalog does not contain any offers, the array is empty.|[Product](#product)[]|\<products\>  

### <a name="productshipping"></a>ProductShipping

Defines the shipping cost.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|country|Gets or sets the two-letter [ISO 3166](http://loc.gov/standards/iso639-2/php/code_list.php) country code of the country where the item is being shipped to.|String|\<country\>
|locationGroupName|Gets or sets the location group name.|String|\<location_group_name\>
|locationId|Gets or sets the ID of the geographic location where the item is being shipped to. For a list of IDs, see [Geographical Location Codes](/advertising/guides/geographical-location-codes).|String|\<location_id\>
|postalCode|Gets or sets the postal code or postal code range of the location where the item is being shipped to. You may specify the postal code as follows:<br/><br/><ul><li>A complete postal code: 94114<br /><br /></li><li>A postal code with a wildcard (suffix only): 94\*<br /><br /></li><li>A range of codes: 94002-95460<br /><br /></li><li>A range of codes with wildcards (the postal code prefixes must be of equal length: 94\*-95\*</li></ul>|String|\<postal_code\>
|price|Gets or sets the fixed price to ship the item to the specified location.|[ProductPrice](#productprice)|\<price\>
|region|Gets or sets geographical region where the item is being shipped to (for example, zip code).|String|\<region\>
|service|Gets or sets a text description that describes the service class or delivery speed.|String|\<service\>

### <a name="productshippingweight"></a>ProductShippingWeight

Defines the item's shipping weight.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|unit|Gets or sets the unit of measure.|String|`unit` attribute.<br/><br/>For example, \<shipping_weight unit="oz"\>.
|value|Gets or sets the item's weight, which is used to calculate the item's shipping cost.|String|Text value.<br/><br/>For example, \<shipping_weight unit="oz"\>20.3\<shipping_weight\>.

### <a name="producttax"></a>ProductTax

Defines the geographical location that determines the applicable taxes.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|country|Gets or sets the country whose tax rate applies. Uses the two-letter [ISO 3166](http://loc.gov/standards/iso639-2/php/code_list.php) country code.|String|\<country\>
|locationId|Gets or sets the ID of the geographic location whose tax rate applies. For a list of IDs, see [Geographical Location Codes](/advertising/guides/geographical-location-codes).|Long|\<location_id\>
|postalCode|Gets or sets the postal code or range of postal codes whose tax rate applies. You may specify the postal code as follows:<br/><br/><ul><li>A complete postal code: 94114<br /><br /></li><li>A postal code with a wildcard (suffix only): 94\*<br /><br /></li><li>A range of codes: 94002-95460<br /><br /></li><li>A range of codes with wildcards (the postal code prefixes must be of equal length: 94\*-95\*</li></ul>|String|\<postal_code\>|
|rate|Gets or sets the percentage tax rate to apply to the price of the item. To specify a 5% rate, set this field to 5. To specify a 9.8% rate, set this field to 9.8.|Double|\<rate\>
|region|Gets or sets a geographical region whose tax rate applies.|String|\<region\>
|taxShip|Gets or sets a Boolean value that determines whether to apply the tax to the cost of shipping. Set to *true* if tax is charged on shipping.|Boolean|\<ship\>

### <a name="unitpricing"></a>UnitPricing

Defines the item's per unit price.

|Name|Value|Type|XML element name
|----|-----|----|----------------
|unit|Gets or sets the unit of measure. For example, *oz* if the price is per ounce.|String|`unit` attribute.<br/><br/>For example, \<unit_pricing_measure unit="oz"\>
|value|Gets or sets the price per unit.|Double|Text value.<br/><br/>For example, \<unit_pricing_measure unit="oz"\>34.5\<\\unit_pricing_measure\>


### <a name="warning"></a>Warning

Defines a warning message.

|Name|Value|Type|XML element name
|----|-----|----|--------
|domain|For internal use only.|String|\<domain\>
|message|A description of the warning.|String|\<internalReason\> 
|reason|The reason why the offer generated a warning. For example, you did not provide an identifier ([gtin](#gtin), [mpn](#mpn), or [brand](#brand)) when the manufacturer is known to have assigned them.|String|\<reason\> 


## HTTP status codes

The requests may return the following HTTP status codes.

|Status code|Description
|-----------|-----------
|200|Success.
|204|Successfully deleted the product.
|400|Bad request. Either a query parameter value is not valid or something in the request body is not valid.<br/><br/>Batch: If an error occurs, the batch item that failed will include the errors.
|401|Unauthorized. The user's credentials are not valid. 
|404|Not found. 
|409|Conflict. The operation could not be completed due to a conflict with the current state of the resource.
|413|Request entity too large. The size of the request exceeds the maximum allowed.
|500|Server error.

