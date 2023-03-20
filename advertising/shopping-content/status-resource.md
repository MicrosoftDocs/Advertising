---
title: "Status Resource"
description: "Describes the status resource and related programming elements of the Content API."
author: jonmeyers
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: jonmeyers
---

# Status Resource

The Status resource lets you get the status of product offers that you uploaded to the specified catalog. After you upload offers to the catalog, they go through a validation and editorial review process. This process can take up to a 36 hours. The offer is included in the report only after it completes the review process.

For an overview of how the process works, see [How Do I Get the Status of Product Offers?](../shopping-content/how-get-status-product-offers.md)

For a code example that shows how to get the catalog's status and download the report, see [Downloading the Catalog Status Report](../shopping-content/code-examples.md#status).

## Base URI

The following is the base URI that you append the templates to.  

`https://content.api.bingads.microsoft.com/shopping/v9.1/bmc/`


## <a name="templates"></a>Templates

To create the endpoints used to get the status of product offerings in a catalog, append the appropriate template to the base URI.
> [!NOTE]
> {bmcMerchantId}/catalogs/{catalogId}/status has been deprecated and we don't recommend using it.

|Template|HTTP Verb|Description|Resource
|--------|---------|-----------|--------
|`{bmcMerchantId}/catalogs/{catalogId}/status`|GET|Use to get the number of uploaded offers that passed or failed validation and editorial review.<br/><br/>Set `{bmcMerchantId}` to the MMC store ID.<br/><br/>Set `{catalogId}` to the catalog's ID.|Request: N/A<br>Response: [Status](#status) 


## <a name="queryparameters"></a> Query parameters

The endpoints may include the following query parameters.

|Parameter|Description|
|---------|-----------|
|<a name="alt"></a>alt|Optional. Use to specify the type of content that's used in the request and response. The possible values are `json` and `xml`. The default is `json`.


## <a name="headers"></a> Headers

The following are the request and response headers.
 
|Header|Description|
|---------|---------------|
|Accept|Request header.\<p>Include this header when you download the report. You must set this header to `application/x-zip-compressed`. 
|<a name="authtoken"></a>AuthenticationToken|Request header.<br/><br/>Set this header to an OAuth authentication token. For information about getting a token, see [Authenticating your credentials](../shopping-content/get-started.md#authentication).
|Content-Location|Response header.<br/><br/>A URL that identifies the store that the product was inserted into. This header is included in the response of an Insert request. 
|<a name="customeraccountid"></a> CustomerAccountId|Request header.<br/><br/>The account ID of any of the accounts that you manage on behalf of the customer specified in the `CustomerId` header. It doesn't matter which account you specify. Specify this header only if you manage an account on behalf of the customer.
|<a name="customerid"></a> CustomerId|Request header.<br/><br/>The customer ID of the customer whose store you manage. Specify this header only if you manage the store on behalf of the customer. If you set this header, you must also set the `CustomerAccountId`  header.  
|<a name="devtoken"></a> DeveloperToken|Request header.<br/><br/>The client application's developer access token. Each request must include this header. For information about getting a token, see [Do you have your Microsoft Advertising credentials and developer token?](../shopping-content/get-started.md#credentials)
|Location|Response header.<br/><br/>A URL that identifies the store that the product was inserted into. This header is included in the response of an Insert request. 
|WebRequestActivityId|Response header.<br/><br/>The ID of the log entry that contains the details about the request. You should always capture this ID if an error occurs. If you are not able to determine and resolve the issue, include this ID along with the other information that you provide the Support team.


## <a name="objects"></a> Request and response objects

The following are the request and response objects used by the API.
 
Each object defines the JSON key name and XML element name that you use depending on the content type that you specified for the request. 


|Object|Description
|------|-----------
|[Status](#status)|Defines the status of the product offerings that were uploaded to the catalog.

### <a name="status"></a>Status

Defines the status of the product offerings that were uploaded to the catalog. The object's XML name is \<catalogStatus\>.

|Name|Value|Type|XML element name
|----|-----|----|--------
|catalogId|The ID of the catalog being reported.|ulong|\<catalog_id\> 
|publishedCount|The number of offerings that passed validation and editorial review.|ulong|\<published_count\> 
|rejectedCount|The number of offerings that failed validation and editorial review. This count indicates the number of rows in the body of the report (see [Report Format](#reportformat)).|ulong|\<rejected_count\> 
|<a name="rejectionreporturl"></a>rejectionReportUrl|The URL that you use to download the report. The object includes this field only when `rejectedCount` is greater than zero.<br/><br/>The report is compressed and must be unzipped before you can read it.|string|\<catalog_id\> 


## HTTP status codes

The requests may return the following HTTP status codes.

|Status code|Description
|-----------|-----------
|200|Success.
|400|Bad request. Either a query parameter value is not valid or the report URL (see [rejectionReportUrl](#rejectionreporturl)) is no longer valid.
|401|Unauthorized. The user's credentials are not valid. 
|404|Not found. Either status is not available for the specified catalog or the catalog or store ID is not valid. 
|500|Server error.


## <a name="reportformat"></a>Report Format

The report file that you download is contained in a Zip compressed folder (*.zip). You must unzip the folder and its contents before you can read the report. The report is a comma-delimited file named  MerchantCatalogReport.csv.

The report is broken out into a header section and report body section. The first row contains the following column names for the header section.

|Column Name|Description
|-----------|-----------
|Catalog Name|The name of the catalog.
|Catalog Id|The ID of the catalog.
|Store Id|The ID of the store that contains the catalog.
|Upload Time|Do not use. If this field exists, ignore it. 

The second row contains the header data.

The third row is blank.

The fourth row contains the following column names for the report body, which starts on the fifth row. 

|Column Name|Description|
|---------------|---------------|
|Item Id|The [offerId](../shopping-content/products-resource.md#offerid) of the offer that failed validation or editorial review. The report will contain unique IDs.
|Message|The error being reported.
|Type|The type of error. The possible values are Error or Warning.
|Values|The data value that caused the error, if the error was caused by an invalid value.
|Offer Snippet|A semicolon-delimited list of subset of the offer data. The format is [title](../shopping-content/products-resource.md#title);[productType](../shopping-content/products-resource.md#producttype);[link](../shopping-content/products-resource.md#link);[imageLink](../shopping-content/products-resource.md#imagelink);[price](../shopping-content/products-resource.md#price);[salePrice](../shopping-content/products-resource.md#saleprice);[saleStartDate](../shopping-content/products-resource.md#salepricedate);[saleEndDate](../shopping-content/products-resource.md#salepricedate). Not all errors will include all components. 

For an example of the report, see [Example Report](../shopping-content/how-get-status-product-offers.md#examplereport).

