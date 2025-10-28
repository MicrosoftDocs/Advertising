---
title: "Store Resource"
description: "Describes the Store resource and related programming elements of Content API."
author: jonmeyers
ms.service: "bing-ads"
ms.subservice: "shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Store Resource

> [!NOTE]
> The Store resource is available to closed-beta participants only. For information about participating in the closed-beta or open-beta program, please contact your account manager.
>
> All Store programming elements and documentation are subject to change during the beta.

Use the Store resource to manage the stores owned by the user. You can add stores, get a specific store, or get all stores owned by the user. [Read more](manage-stores.md). 


## Base URI

The following is the base URI that you append the [templates](#templates) to.  

`https://content.api.ads.microsoft.com/v9.1/bmc`

For example, to add a store or get a list of stores owned by the user, use the following endpoint:

`https://content.api.ads.microsoft.com/v9.1/bmc/stores` 


## Templates

These are the templates that you append to the [base URI](#base-uri) to create an HTTP endpoint.

### /stores template

|HTTP Verb|Description|Resource
|-|-|-
|<a name="addstorepost"></a>POST|Adds a store. The following limits apply and are subject to change:<ul><li>A customer may add a maximum of 14 stores that specify the same store URL.</li><li>A customer may add a maximum of 1,024 stores.</li></ul>|Request: [StoreCreate](#storecreate)<br/>Response: [Store](#store)
|GET|Gets a list of stores owned by the user.|Request: N/A<br/>Response: [StoreCollection](#storecollection)


### /stores/{merchantId} template

|HTTP Verb|Description|Resource
|-|-|-
|GET|Gets the specified store. Set `{merchantId}` to the ID of the store you want to get.|Request: N/A<br/>Response: [Store](#store)


## Query parameters

The request may include the following query parameters:

|Parameter|Description
|-|-
|<a name="dryrun"></a>dry-run|Optional. Use to test or debug your application. Calls that include this parameter won't affect production data (stores are not added); however, the response will contain any errors that the call generates.<br/><br/>Consider the following limitations when using this parameter.<ul><li>Add operations don't return IDs.</li><li>The service doesn't generate or return secondary error messages such as data quality, editorial issues, and database-related validations.</li></ul>For more information about testing your application, see [Sandbox](test-code-sandbox.md). 


## Headers

The following are the request and response headers.
 
|Header|Description
|-|-
|<a name="authtoken"></a>AuthenticationToken|Request header.<br/><br/>Set this header to an OAuth access token. For information about getting an access token, see [Authenticating your credentials](get-started.md#authentication).
|Content-Type|Request header.<br/><br/>All POST requests must specify this header and it must be set to `application/json`.
|<a name="customeraccountid"></a>CustomerAccountId|Request header.<br/><br/>The account ID of any account that you manage on behalf of the customer specified in the `CustomerId` header. It doesn't matter which account you specify. Specify this header only if you manage an account on behalf of the customer.
|<a name="customerid"></a>CustomerId|Request header.<br/><br/>The customer ID of the customer whose store you manage. Specify this header only if you manage the store on behalf of the customer. If you set this header, you must also set the `CustomerAccountId`  header.  
|<a name="devtoken"></a>DeveloperToken|Request header.<br/><br/>The client application's developer token. Each request must include this header. For information about getting a token, see [Do you have your Microsoft Advertising credentials and developer token?](get-started.md#credentials)
|WebRequestActivityId|Response header.<br/><br/>The ID of the log entry that contains details of the request. You should always capture this ID if an error occurs. If you are not able to determine and resolve the issue, include this ID along with the other information that you provide the Support team.


## Request and response objects

The following are the request and response objects used by the API.
 
|Object|Description
|-|-
|[Error](#error)|Defines an error.
|[ErrorResponse](#errorresponse)|Defines the top-level error object.
|[Store](#store)|Defines a store in Microsoft Merchant Center.
|[StoreCollection](#storecollection)|Defines a collection of stores in Microsoft Merchant Center.
|[StoreCreate](#storecreate)|Defines a store to add to Microsoft Merchant Center.
|[StoreStatus](#storestatus)|Defines the store's status.


### Error

Defines an error.

|Name|Value|Type
|-|-|-
|code|The reason why the request failed. For example, the code is InvalidStoreNameErr if the `storeName` field failed validation.|String
|message|A description of the error.|String


### ErrorResponse

Defines the top-level error object.

|Name|Value|Type
|-|-|-
|errors|A list of errors that occurred while processing the request.|[Error](#error)[]


### Store

Defines a store in Microsoft Merchant Center.

|Name|Value|Type
|-|-|-
|isBlockAggregator|A Boolean value that indicates whether you want to prevent aggregators from serving any ads from your store. Aggregators consolidate product offers from multiple, often unrelated, businesses. By default, aggregators can include your catalog in their ads.<br/><br/>Is **true** if you want to prevent your products from showing up in aggregators' ads on Bing. If you have two stores (one for the United States and one for the United Kingdom) that use http:\//www.contoso.com and either one of them blocks aggregators, then both stores block aggregators.|Boolean
|isSslCheckout|A Boolean value that indicates whether your store is SSL enabled. All stores must have SSL log-in and checkout pages. Is **true** if your store's website is SSL enabled.|Boolean|
|merchantId|The store's ID.|Unsigned long
|notificationEmail|A list of recipients to receive notification emails. The emails notify you when the store is approved or if there are validation errors with the store.|String[]
|notificationLanguage|The language used to write the notification emails. The language is in the form, \<language>-<country/region>. For example, en-US.|String
|storeDescription|A description that describes the store's use.|String
|storeName|The store's name.|String
|storeStatus|The store's status.|[StoreStatus](#storestatus)
|storeUrl|The store's destination URL. The destination URL is the web page where people are directed to when they click your ad.|String


### StoreCollection

Defines a list of stores.

|Name|Value|Type
|-|-|-
|stores|A list of stores owned by the user.|[Store](#store)[]


### StoreCreate

Defines a store to add to Microsoft Merchant Center.

|Name|Value|Type|Required
|-|-|-|-
|isBlockAggregator|A Boolean value that indicates whether you want to prevent aggregators from serving any ads from your store. Aggregators consolidate product offers from multiple, often unrelated, businesses. By default, aggregators can include your catalog in their ads.<br/><br/>Set to **true** to prevent your products from showing up in aggregators' ads on Bing. If you have two stores (one for the United States and one for the United Kingdom) that use http:\//www.contoso.com and either one of them blocks aggregators, then both stores block aggregators.<br/><br/>Defaults to **false**.|Boolean|No
|isSslCheckout|A Boolean value that indicates whether your store is SSL enabled. All stores must have SSL log-in and checkout pages. Set to **true** if your store's website is SSL enabled. If **false** the store is disapproved.<br/><br/>Defaults to **true**.|Boolean|No
|notificationEmail|A list of recipients to receive notification emails. The emails notify you when the store is approved or if there are validation errors with the store. The maximum number of email addresses that you may specify is 14.|String[]|Yes
|<a name="notificationlanguage"></a>notificationLanguage|The language used to write the notification emails. The language is in the form, \<language>-<country/region>. The following are the possible case-insensitive values that you may specify.<ul><li>en-US (English-United States)</li><li>en-AU (English-Australia)</li><li>en-GB (English-United Kingdom)</li><li>fr-FR (French-France)</li><li>de-DE (German-Germany)</li><li>ja-JP (Japanese-Japan)</li></ul>|String|Yes
|<a name="storedescription"></a>storeDescription|A description that describes the store's use. The description is limited to a maximum of 350 characters and may contain only alphanumeric characters ([a-zA-Z0-9]).|String|No
|<a name="storename"></a>storeName|The store's name. Because the store's name appears in your product ads, be sure to use a name that accurately represents your website. The name must:<ul><li>Be unique within Bing Merchant Center</li><li>Contain no more than 70 characters</li><li>Contain only alphanumeric characters ([a-zA-Z0-9])</li></ul>|String|Yes
|<a name="storeurl"></a>storeUrl|The store's destination URL. The destination URL is the web page where people are directed to when they click your ad. The URL must not redirect to another location. The URL must be well formed and have a maximum of 1,024 characters. You must <a href="https://help.ads.microsoft.com/#apex/3/en/50888/1" target="_blank">verify and claim your website's URL</a>. Stores are disapproved if Microsoft cannot verify that your website is SSL compliant. Merchant websites must have SSL log-in and checkout pages. Verify that your SSL certificates are valid.|String|Yes


### StoreStatus

Defines the store's status.

|Name|Value|Type
|-|-|-
|message|The reason why the store was disapproved. The object includes this field only if `status` is Disapproved.|String
|status|The store's status. The following are the possible values.<ul><li>Approved</li><li>Disapproved</li><li>ManualReview</li></ul>If the store is disapproved, see `message` for the reason.<br/><br/>A store that was initially automatically approved, may move from Approved to ManualReview. You cannot add products to a store that's under manual review and products in the store will not serve.<br/><br/>Depending on the disapproval reason, you may be able to fix the issue by using the Microsoft Ads application. Otherwise, you will need to create a new store with appropriate values.|String


## HTTP status codes

The requests may return the following HTTP status codes.

|Status code|Description
|-|-
|200|Success.
|201|Store was successfully added.
|400|Bad request. Most likely the body of the POST request contains invalid data or is malformed.
|401|Unauthorized. The user's credentials are not valid. 
|404|Not found. The requested store was not found. 
|500|Server error.


## Error codes

The requests may return the following error codes.

|Error code|Description
|-|-
|AdultAdvertiserErr|Adult advertisers may not create stores.
|DomainNotOwnedByCustomerErr|The domain specified in the [storeUrl](#storeurl) field is not owned by the customer. Make sure the customer verified that they own the domain.
|DuplicateStoreNameErr|Another store with the specified store name exists; store names must be unique with Microsoft Merchant Center.
|ExceededMaxStoresForCustomerErr|The customer exceeded the number of stores they may create. For limits, see [Add store POST](#addstorepost).
|ExceededMaxStoresForDestinationUrlErr|The customer exceeded the number of stores they may create using the same destination URL. For limits, see [Add store POST](#addstorepost).
|InvalidStoreDescriptionErr|The store's description is not valid. For limits, see [storeDescription](#storedescription).
|InvalidStoreDestinationUrlErr|The store's destination URL that you specified in the [storeUrl](#storeurl) field is not valid.
|InvalidStoreNameErr|The store's name is not valid. For limits, see [storeName](#storename).
|MarketNotSupportedErr|The market that you specified in the [notificationLanguage](#notificationlanguage) field is not valid.
|NoDomainsFoundForCustomerErr|There are no verified domains owned by the customer.
