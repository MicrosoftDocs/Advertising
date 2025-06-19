---
title: Bing Ads API Services Protocol
ms.service: bing-ads
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: You can write your Bing Ads API application in any language that supports web services.
---
# Bing Ads API Services Protocol
You can write your Bing Ads API application in any language that supports web services. A web services description language (WSDL) document is defined for each web service. The WSDL defines the operations that a web service offers and the format of the request and response messages that the client sends to and receives from the operations. The request and response messages define the names and types of the data that the client exchanges with the operation. For more information about WSDLs, see the [W3C WSDL specification](https://www.w3.org/TR/wsdl).

## SOAP for Bing Ads API
Bing Ads API supports Simple Object Access Protocol (SOAP). Some languages, such as C# and Java, provide tools that generate proxy classes from the WSDL. If your language of choice does not provide a tool to generate proxy classes, you will need to generate your own proxy classes or SOAP envelopes. To generate the proxy classes, you need the web address of the WSDL document of the service that you want to use. The Microsoft Advertising sandbox and production environments each have a unique address. The addresses also include the version number of the WSDL that is specific to a major Bing Ads API release. For production and sandbox service WSDLs of the latest Bing Ads API version, see [Bing Ads API Web Service Addresses](web-service-addresses.md).

## <a name="element-order"></a>SOAP XML Element Order
When you create a SOAP request message, the order of the elements within the SOAP body is critical. The elements must be in the same order as defined in the web services description language (WSDL). If the required elements are out of order, the call will fail. If the optional elements are out of order, the call may fail or the elements will be ignored. The WSDL syntax, which shows the correct order of the elements, is included with each request message, response message, and data object documented in the reference content. In addition, each request and response message shows an example SOAP envelope.

> [!NOTE]
> XML is case-sensitive. You must use the correct case for the value names. Strongly-typed programming languages such as C# ensure that you have the correct case before you can compile. Other languages might not give you a compile error if the correct case is not used; however, the code fails at run time.

## Partial Success
Bing Ads API supports partial completions for add, update, and delete operations; if one of the objects in the list of objects that you are adding, updating or deleting fails, the operation may succeed for others in the collection. When you call a Get operation that takes a list of identifiers for example, the [GetKeywordsByIds](../campaign-management-service/getkeywordsbyids.md) operation, and one of the identifiers in the list is not valid, the operation will succeed and the response element that corresponds to the invalid request identifier will be nil.

## Partial Update

### Campaign Management Partial Update
Partial update is supported for most, but not all campaign management data objects. For example when updating the *Text* property of an [ExpandedTextAd](../campaign-management-service/expandedtextad.md) you need only specify the *Id* and *Text* elements. Read-only elements such as the ad editorial status must be left nil or empty. Unless otherwise documented explicitly, the optional elements may be left empty and their existing settings are unchanged. 

Partial update is not supported for ad extensions. Any optional elements which are not sent with the update request will in effect be deleted from the respective ad extension.

### Customer Management Partial Update
The customer management service performs a full update of entities, so in addition to the documented required properties you must provide values for all optional properties that you do not want to be nil or empty. 

> [!NOTE]
> One exception to this rule is the *ForwardCompatibilityMap* element of any object. For example if you do not provide the *ForwardCompatibilityMap* element of the [AdvertiserAccount](../customer-management-service/advertiseraccount.md), the service will not update or nullify any properties that would otherwise have been represented by key and value pairs.

## <a name="store-locally"></a>Store Your Entity Identifiers Locally
You should maintain a local store of your account and campaign entities. Specifically, you should locally store the identifiers of your accounts, customers, campaigns, ad groups, and keywords. Most calls require the identifier of the entity. If you store the identifier, you eliminate the call that is required to get the identifier.

For example, many of the campaign management calls require an account identifier. To get the account identifier, you can use the customer management service. However, instead of calling the service repeatedly, store the account identifier locally, so that you can use it in subsequent calls.

## <a name="manage-overhead"></a>Manage the Overhead Associated with Making Web Service Calls
The following are the overhead costs, in processing time, that are associated with each web service call.

- Establishing an HTTPS connection to the web service. 
- Authenticating the user name and password. 
- Validating the developer token. 

These costs occur whether you process a single item or a set of items. To minimize overhead, in general, you should try to process as many items in one call as possible. For example, instead of calling [UpdateCampaigns](../campaign-management-service/updatecampaigns.md) for each campaign that you want to update, call it only once for multiple campaigns that you want to update. To manage large scale data, especially if you need to add or update ads and keywords across multiple ad groups or campaigns in an account, you should use the [Bulk service](../bulk-service/bulk-service-reference.md). The Bulk service allows you to download data as a TSV or CSV file, modify it as needed, and then upload your changes. For more information about using the Bulk service, see [Bulk Download and Upload](bulk-download-upload.md).

Because of the costs associated with establishing a connection to a web service, you should maintain the connection for as long as it is needed. For example, if you need to request multiple reports, use the same reporting service client object for all reporting service operation calls. Explicitly close the connection when you no longer need the service.

## <a name="throttling"></a>Handle Throttling
Throttling extremely high-volume usage maintains fair usage for all Microsoft Advertising clients.

### <a name="throttling-adinsight"></a>Ad Insight API
For the Ad Insight service, throttling limits the number of calls to the API that any one user can make in a minute's time.

At the customer level, the number of calls a customer can make to the customer data is restricted using a sliding protocol with a 60 second window.

Should you exceed the service call limit, you will see the following error:

- Numeric Error Code: 117  
- Symbolic Error Code: CallRateExceeded  
- Message: You have exceeded the number of calls that you are allowed to make in a minute. Please reduce the number of calls that you make per minute.  

When you observe this error, you can resubmit the request under the limit after waiting 60 seconds.

### <a name="throttling-bulk"></a>Bulk API
The Bulk service limits the number of requests that you can make to [DownloadCampaignsByAccountIds](../bulk-service/downloadcampaignsbyaccountids.md), [DownloadCampaignsByCampaignIds](../bulk-service/downloadcampaignsbycampaignids.md), and [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md). The details of the service limits are internal and subject to change.

Should you hit the service call limit, you will see the following error:

- Numeric Error Code: *4204*  
- Symbolic Error Code: *BulkServiceNoMoreCallsPermittedForTheTimePeriod*  
- Message: *No more bulk upload or download calls will be permitted for this account for the current time period. If you have reached your bulk upload limit, the bulk download operations may still be available, or vice versa.*  

If you observe this error, you can resubmit your request after waiting up to 15 minutes. For more details please see [Bulk Download Best Practices](bulk-download-upload.md#downloadbestpractices) and [Bulk Upload Best Practices](bulk-download-upload.md#uploadbestpractices).

Also note the size limit per file for bulk upload in production is 100MB and up to 4 million rows. For [Sandbox](sandbox.md) the limit is 20K rows.

### <a name="throttling-campaign"></a>Campaign Management API
For the Campaign Management service, throttling limits the number of calls to the API that any one user can make in a minute's time.

At the customer level, the number of calls a customer can make to the customer data is restricted using a sliding protocol with a 60 second window.

Should you hit the service call limit, you will see the following error:

- Numeric Error Code: 117  
- Symbolic Error Code: CallRateExceeded  
- Message: You have exceeded the number of calls that you are allowed to make in a minute. Please reduce the number of calls that you make per minute.  

When you observe this error, you can resubmit the request under the limit after waiting 60 seconds.

### <a name="throttling-reporting"></a>Reporting API
The Reporting service limits the number of requests that you can make to [SubmitGenerateReportRequest](../reporting-service/submitgeneratereport.md). The details of the service limits are internal and subject to change.

Should you hit the service call limit, you will see the following error:

- Numeric Error Code: 207  
- Symbolic Error Code: ConcurrentRequestOverLimit  
- Message: You have already reached the maximum number of concurrent report requests. Please wait until the previous reports are completed and then try to submit a new request.  

If you observe this error, please wait until the previous reports are completed and then try to submit a new request.  

## See Also
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
[Bing Ads API Overview](index.md)  

