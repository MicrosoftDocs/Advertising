---
title: Handling Service Errors and Exceptions
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Learn about error handling and troubleshooting your application.
---
# Handling Service Errors and Exceptions
This article describes details on error handling and troubleshooting your application. 

> [!TIP]
> When you create a SOAP request message, make sure that the elements are in the same order as defined in the web services description language (WSDL). If the required elements are out of order, the call will fail. If the optional elements are out of order, the call may fail or the elements will be ignored. For more details, see [SOAP XML Element Order](services-protocol.md#element-order). 

## <a name="common-api-errors"></a>Common API Errors
Here are some tips to handle common service errors that you may encounter. For a comprehensive list of Bing Ads API error codes, please see [Operation Error Codes](operation-error-codes.md). 

### Code 105
Typically indicates usage of an incorrect access token (AuthenticationToken header element) or developer token for the target environment. For example your credentials may be valid in production; however, when targeting sandbox you would observe code *105*.

### Code 106
Typically indicates that while the credentials are correct for the target environment, the user does not have access to one of the entities specified in the request. For example you would observe this error calling [SubmitGenerateReportRequest](../reporting-service/submitgeneratereport.md) if the user does not have permissions to the specified account.

### Code 117
Should you exceed the service call limit, you will see the following error:

- Numeric Error Code: *117*  
- Symbolic Error Code: *CallRateExceeded*  
- Message: *You have exceeded the number of calls that you are allowed to make in a minute. Please reduce the number of calls that you make per minute.*  

When you observe this error, you can resubmit the request under the limit after waiting 60 seconds. 

### Internal Error
Occasionally the service might return an internal error as follows:

```xml
<OperationError>
  <Code>0</Code>
  <Details i:nil="true"/>
  <ErrorCode>InternalError</ErrorCode>
  <Message>An internal error has occurred.</Message>
</OperationError>
```

Here are some possible internal error scenarios:
- This is a temporary system issue and there is nothing actionable that you can do. If the same call has worked for you before, please try again later in case we have resolved the issue server side. 
- The operation was not properly mapped to an actionable error code. Ideally if there is anything that clients can do to resolve the issue, the Bing Ads API should return an actionable error code. If you are consistently observing the internal error please [contact support](#contact-support) with details. 

### HTTP 500
All Bing Ads API service operations adhere to the Simple Object Access Protocol (SOAP) 1.1 specification whereby errors are returned with a HTTP 500 code. For example, see the following.

```http
HTTP/1.1 500 Internal Server Error
```
This is not in and of itself representative of an actionable code, and you should inspect the fault details for more information on the specific error.

### Cannot create an abstract class
You cannot create an instance of a base class such as [Ad](../campaign-management-service/ad.md). You must instantiate one of the derived classes e.g., [ExpandedTextAd](../campaign-management-service/expandedtextad.md).

### Why am I getting an empty URL from the Reporting API call? 
Even when the report [Status](../reporting-service/reportrequeststatus.md#status) is set to Success, the [ReportDownloadUrl](../reporting-service/reportrequeststatus.md#reportdownloadurl) element can be nil if no data is available for the submitted report parameters. If you see performance data in the Microsoft Advertising web application for the same date range and filter criteria, please [contact support](#contact-support) with details.  

## <a name="common-oauth-errors"></a>Common OAuth errors
Here are some tips to handle common authorization errors that you may encounter. 

### <a name="aadsts-errors"></a>AADSTS errors
The AADSTS error codes and messages are subject to change. For the most current info, take a look at the [https://login.microsoftonline.com/error](https://login.microsoftonline.com/error) page to find AADSTS error descriptions, fixes, and some suggested workarounds. 

Search on the numeric part of the returned error code. For example, if you received the error code "AADSTS650052" then do a search in [https://login.microsoftonline.com/error](https://login.microsoftonline.com/error) for "650052". You can also link directly to a specific error by adding the error code number to the URL: [https://login.microsoftonline.com/error?code=650052](https://login.microsoftonline.com/error?code=650052). 

Some of the most common AADSTS errors e.g., AADSTS50011, AADSTS650052, and AADSTS700016 are described in more detail below. 


### <a name="aadsts50011"></a>AADSTS50011

The AADSTS50011 error could be returned within a JSON string when [requesting access tokens](authentication-oauth-get-tokens.md) with the Microsoft identity platform endpoint as follows.

```json
{"error":"invalid_client","error_description":"AADSTS50011: The reply url specified in the request
does not match the reply urls configured for the application: 'foo'.\r\nTrace ID:
x\r\nCorrelation ID: x\r\nTimestamp: 2019-05-10
17:18:23Z","error_codes":[50011],"timestamp":"2019-05-10
17:18:23Z","trace_id":"x","correlation_id":"x"}
```

An invalid redirect URI error could also be returned as text in the browser window when you are requesting user consent as follows.

*invalid_request: The provided value for the input parameter 'redirect_uri' is not valid. The expected value is a URI which matches a redirect URI registered for this client application.*

If you observe this error, either your redirect URI is not properly [registered](authentication-oauth-register.md), or your application is not using the registered redirect URI. 

### <a name="aadsts650052"></a>AADSTS650052

The 650052 error code can be returned with message "The app needs access to a service (\"https://ads.microsoft.com\") that your organization \"{organization}\" has not subscribed to or enabled." 

If you observe this error, please ensure that you have at least one of the admin users from your Azure AAD tenant added and enabled for [work accounts](https://help.ads.microsoft.com/#apex/3/en/60043/-1) in the [Microsoft Advertising web application](https://ads.microsoft.com/?fdmkt=en-us&fdiso=us&fdtz=-8). 
Please [contact support](#contact-support) for further assistance. 

### <a name="aadsts700016"></a>AADSTS700016

The 700016 error code can be returned with message "Application with identifier '{appIdentifier}' was not found in the directory '{tenantName}'." 

If you have an older application ID (aka Client ID) that is formatted as a hexadecimal value e.g., 0000000012345A67, then you must [register](authentication-oauth-register.md) a new application. Valid application IDs for use with the Microsoft identity platform are formatted as a GUID with dashes e.g., 00001111-aaaa-2222-bbbb-3333cccc4444. If you don't see an existing app in the [Azure portal - App registrations](https://go.microsoft.com/fwlink/?linkid=2083908), that's another indication that you should replace it with a new app.  

### <a name="invalid-redirect-uri"></a>Invalid redirect URI

An invalid redirect URI error could be returned within a JSON string when requesting access tokens with the Live Connect endpoint as follows. 

```json
{"error":"invalid_grant","error_description":"The provided value for the 'redirect_uri' is not
valid. The value must exactly match the redirect URI used to obtain the authorization code."}
```

An invalid redirect URI error could also be returned as text in the browser window when you are requesting user consent as follows.

*invalid_request: The provided value for the input parameter 'redirect_uri' is not valid. The expected value is a URI which matches a redirect URI registered for this client application.*

If you observe this error, either your redirect URI is not properly [registered](authentication-oauth-register.md), or your application is not using the registered redirect URI. 

### <a name="invalid-grant"></a>Invalid grant

An **invalid_grant** error could be returned if you attempt to refresh the token using a scope that the user does not consent to.  

```json
{
    "error":"invalid_grant",
    "error_description":"AADSTS70000: The request was denied because one or more scopes requested are unauthorized or expired. The user must first sign in and grant the client application access to the requested scope."
}
```

An **invalid_grant** error could also be returned if the [redirect URI is invalid](#invalid-redirect-uri), the refresh token expired, the user changed their password, or the token was otherwise revoked.  

```json
{"error":"invalid_grant","error_description":"The user could not be authenticated or the grant is expired. The user must first sign in and if needed grant the client application access to the requested scope."}
```

At any time without prior warning Microsoft may determine that user consent should again be granted; however, some scenarios are within your control. Clients running apps on services that span regions and devices such as Microsoft Azure should [register](authentication-oauth-register.md) a web application with client secret. You can get a refresh token on one device and refresh it on another so long as you have the same client ID and client secret. If you register a public application without a client secret, then you cannot use a refresh token across devices. A confidential token is bound to the client secret. If you had used a public client application ID without client secret to get a refresh token in the US and then later try to refresh the token in the EU region you would observe the invalid_grant error. 

### <a name="application-not-found"></a>Application not found or unauthorized client

If you observe an error such as "unauthorized_client: The client does not exist" or "Application with identifier 'foo' was not found in the directory 'bar'", ensure that the application still exists for the correct target environment i.e., production or sandbox. 

An application not found error could be returned if you are calling the Microsoft identity platform endpoint using a Live SDK application ID with the short hexadecimal format e.g., 0000000012345A67. In that case you must [register](authentication-oauth-register.md) a new application. Valid Microsoft identity platform application IDs are formatted as a GUID with dashes e.g., 00001111-aaaa-2222-bbbb-3333cccc4444. 

If you registered the app in the Azure portal, in the Supported account types section ensure that you selected **Accounts in any organizational directory and personal Microsoft accounts**. (Please see [Register an application](authentication-oauth-register.md)) If you did not choose this option during initial setup, the Azure portal might require that you register a new application. 

### <a name="application-not-multi-tenant"></a>Application not configured as a multi-tenant application

You might observe the following error if your registered application is limited to a specific tenant. 

```
Application 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxxxx' is not configured as a multi-tenant application. Usage of the /common endpoint is not supported for such applications created after '10/15/2018'. Use a tenant-specific endpoint or configure the application to be multi-tenant.
```

If you registered the app in the Azure portal, in the Supported account types section ensure that you selected **Accounts in any organizational directory and personal Microsoft accounts**. (Please see [Register an application](authentication-oauth-register.md)) If you did not choose this option during initial setup, the Azure portal might require that you register a new application.  

## <a name="contact-support"></a>Contact Support
The [Microsoft Q&A](/answers/topics/advertising-api.html) forum is available for the developer community to ask and answer questions about the Bing Ads APIs and Microsoft Advertising Scripts. Microsoft monitors the forums and replies to questions that the community has not yet answered. 

> [!IMPORTANT]
> To make sure that we see your question, tag it with 'advertising-api'.  

If the investigation involves sensitive account or personal details, or if you are not finding the information you need to solve your problem via [Microsoft Q&A](/answers/topics/advertising-api.html), please contact [Microsoft Advertising Support](https://about.ads.microsoft.com/en-us/microsoft-advertising-support).  

> [!TIP]
> To expedite the investigation please provide support with details such as development environment, error frequency, and steps to reproduce the error.  

For help with calls to the Bing Ads API [services](web-service-addresses.md), please step through this checklist and provide the results to the [support team](https://about.ads.microsoft.com/en-us/microsoft-advertising-support). 

 - Who is the user attempting to call the service e.g., what is the login email address?
 - What is the account ID or account number the user is trying to access? 
 - What are the steps needed to reproduce the error? Include the full request, response, and timestamp, except for private credentials e.g., access token. 
 - Are you targeting the production or sandbox environment? Ensure that you are using the correct app registration and authorization endpoints for production vs sandbox. Likewise be sure to use the correct [web service addresses](web-service-addresses.md) for the same environment. 
 - Indicate whether the same request had worked for you in the past i.e., historical performance. 
 - Indicate whether you can now reproduce the issue every time or intermittently. 
 - For issues related to the Bulk or Reporting service please include the trace for both the request and status poll operations. 
 - For an authentication issue related to error code 105 or 106, please also include the system identifier for the Microsoft Advertising user's login credentials. To get the user identifier for the current user, please see the [Quick Start](authentication-oauth-quick-start.md) guide. 

For help getting access and refresh tokens for [Authentication with OAuth](authentication-oauth.md), please step through this checklist and provide the results to the [support team](https://about.ads.microsoft.com/en-us/microsoft-advertising-support). 

 - Who is the user attempting to authenticate e.g., what is the login email address?  
 - What is the account ID or account number the user is trying to access? 
 - What are the steps needed to reproduce the error? Include the full request, response, and timestamp, except for private credentials e.g., access token and client secret.  
 - Are you targeting the production or sandbox environment? Ensure that you are using the correct app registration and authorization endpoints for production vs sandbox. Likewise be sure to use the correct [web service addresses](web-service-addresses.md) for the same environment.  
 - Have you [registered](authentication-oauth-register.md) a native or web application? Clients running apps on services that span regions and devices such as Microsoft Azure should register a web application with client secret. 
 - What is your registered application ID (client_id)? If you also have an application secret (client_secret) please confirm that you are setting it when you request access tokens from the authorization endpoint, but do not share it with anyone. 
 - Run an OAuth diagnostic health check. Can you successfully obtain an access token and complete the [Quick Start](authentication-oauth-quick-start.md) guide for production or sandbox? If not, where does authentication fail and what is the error? 

## <a name="faultoverview"></a>Fault Model Overview
When a Bing Ads API service operation fails, it will return a service fault e.g., the Customer Management service can return [ApiFault](../customer-management-service/apifault.md). The fault exceptions include one or more error objects. The error objects contain the details of why the service operation failed and a code that uniquely identifies the error. For a list of error codes, see [Bing Ads API Operation Error Codes](operation-error-codes.md).

Available fault and data objects vary per service. This table describes the fault model and links to error data objects for each service.

|Service|Description|
|-----------|---------------|
|Ad Insight|All ad insight operations may throw [AdApiFaultDetail](../ad-insight-service/adapifaultdetail.md) and [ApiFaultDetail](../ad-insight-service/apifaultdetail.md).|
|Bulk|All bulk operations may throw [AdApiFaultDetail](../bulk-service/adapifaultdetail.md) and [ApiFaultDetail](../bulk-service/apifaultdetail.md).|
|Campaign Management|All campaign management operations may throw [AdApiFaultDetail](../campaign-management-service/adapifaultdetail.md).<br/><br/>Some campaign management operations may also throw [ApiFaultDetail](../campaign-management-service/apifaultdetail.md) or [EditorialApiFaultDetail](../campaign-management-service/editorialapifaultdetail.md).<br/><br/>For more information, see [Campaign Management Data Objects](../campaign-management-service/campaign-management-data-objects.md).|
|Customer Billing|All customer billing operations may throw [AdApiFaultDetail](../customer-billing-service/adapifaultdetail.md) and [ApiFault](../customer-billing-service/apifault.md).<br/><br/>Some customer billing operations may also throw [ApiBatchFault](../customer-billing-service/apibatchfault.md).|
|Customer Management|All customer management operations may throw [AdApiFaultDetail](../customer-management-service/adapifaultdetail.md) and [ApiFault](../customer-management-service/apifault.md).|
|Reporting|All reporting operations may throw *AdApiFaultDetail* and *ApiFaultDetail*.|

> [!NOTE]
> All fault objects are derived from the *ApplicationFault* object. The *ApplicationFault* object defines the *TrackingId* element, which uniquely identifies the log entry that contains the details of the API call. If you need to [contact support](https://go.microsoft.com/fwlink/?LinkId=517018), please provide the tracking ID with the date and time when you called the service operation. 

## <a name="partial-success"></a>Partial Success
Partial success means that when adding, updating, or deleting entities in batches of one or more, the operation may succeed for some and fail for part of the batch. 

### <a name="partial-success-bulk"></a>Partial Success With the Bulk Service
When you [upload](bulk-download-upload.md) records in a [Bulk file](../bulk-service/bulk-file-schema.md), the upload may succeed for some records and fail for others in the batch. When you call [GetBulkUploadUrl](../bulk-service/getbulkuploadurl.md) you can choose whether or not to receive errors in the upload results file. 

> [!NOTE]
> Microsoft Advertising doesn't support "all or nothing" error handling behavior. You will have to handle that on the client side.

### <a name="partial-success-campaign-management"></a>Partial Success With the Campaign Management Service
For most entities, partial success is supported when calling [Campaign Management](../campaign-management-service/campaign-management-service-reference.md) service operations. For each list index where an entity was not added, the corresponding element will be null. The *PartialErrors* element represents an array of [BatchError](../campaign-management-service/batcherror.md) objects that contain details for any entities that were not successfully added, updated, or deleted. The list only includes a [BatchError](../campaign-management-service/batcherror.md) for unsuccessful attempts, and does not include null elements at the index of each successfully added entity. Similarly some operations return *NestedPartialErrors* as a list of [BatchErrorCollection](../campaign-management-service/batcherrorcollection.md), or a two dimensional [BatchError](../campaign-management-service/batcherror.md).

> [!NOTE]
> The [ApplyProductPartitionActions](../campaign-management-service/applyproductpartitionactions.md) operation includes *PartialErrors* in the response; however, partial success is not supported. Either the entire set of requested actions succeed and the *AdGroupCriterionIds* response list is fully populated, or all of them fail and the *PartialErrors* response list is fully populated. 

## <a name="net-exceptions"><a/>.NET Exceptions
If you use the Bing Ads .NET [SDK](client-libraries.md), your application should be prepared to handle Bing Ads API [service level exceptions](#faultoverview), [WCF exceptions](#net-wcf-exceptions), and [Bing Ads .NET SDK](#net-sdk-exceptions) exceptions described below. 

For troubleshooting .NET applications, see [.NET SDK Troubleshooting](#net-troubleshooting).

### <a name="net-wcf-exceptions"></a>WCF Exceptions
Generic SOAP faults that are not specific to Bing Ads API may also be thrown, and should be caught by your application. For example, .NET applications may throw Windows Communication Foundation (WCF) exceptions such as Exception, TimeoutException, and CommunicationException. For information about exceptions that you should expect from WCF, see [Expected Exceptions](/dotnet/framework/wcf/samples/expected-exceptions).

You should not call the *Close* method in the finally block to release the service object. The objection is that the *Close* method can throw exceptions. If *Close* throws an exception, you must call the *Abort* method to ensure that all resources are released; otherwise, you could be leaking resources on the server. The recommended practice is to call *Close* within the try block, and call *Abort* from the caught exceptions.

For the same reason, the use of the **using** statement is not recommended. For more information, see [Avoiding Problems with the Using Statement](/dotnet/framework/wcf/samples/use-close-abort-release-wcf-client-resources).

### <a name="net-sdk-exceptions"></a>.NET SDK Exceptions
The Bing Ads .NET SDK exceptions abstract some of the service level exceptions. To work around most of the exceptions you can try again, and feel free to contact support if the issue persists after multiple retry attempts.

Exception  |Namespaces  |Description  
---------|---------|---------   
CouldNotDownloadResultFileException     |Microsoft.BingAds         |This exception is thrown by the internal SDK HttpService after a failed attempt to download a bulk or reporting result file. 
CouldNotUploadFileException     |Microsoft.BingAds        |This exception is thrown by the internal SDK HttpService after a failed attempt to upload a bulk file. 
OAuthTokenRequestException     |Microsoft.BingAds         |This exception is thrown if an error was returned from the Microsft Account authorization server. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example you might have specified an invalid client ID. 
BulkOperationCouldNotBeCompletedException     |Microsoft.BingAds.V13.Bulk        |This exception is thrown if an attempt was made to poll for a completed bulk results file and the bulk service returns a failed status. 
BulkOperationInProgressException     |Microsoft.BingAds.V13.Bulk        |This exception is thrown if an attempt was made to download a bulk results file that is not yet available.
CouldNotGetBulkOperationStatusException     |Microsoft.BingAds.V13.Bulk         |This exception is thrown if the BulkServiceManager failed to get the upload or download operation status after multiple retries. 
CouldNotSubmitBulkDownloadException     |Microsoft.BingAds.V13.Bulk         |This exception is thrown by the BulkServiceManager when the DownloadCampaignsByAccountIds service operation that it called does not return a valid response. 
CouldNotSubmitBulkUploadException     |Microsoft.BingAds.V13.Bulk         |This exception is thrown by the BulkServiceManager when the GetBulkUploadUrl service operation that it called does not return a valid response. 
EntityReadException     |Microsoft.BingAds.V13.Bulk        |This exception is thrown when attempting to read entities from a bulk file using BulkFileReader. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example the bulk file that you are attempting to read from might have an invalid value in one of the fields.
EntityWriteException     |Microsoft.BingAds.V13.Bulk        |This exception is thrown when attempting to write entities to a bulk file using BulkFileWriter. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example you might have specified an invalid value for one of the upload entities. 
CouldNotGetReportingDownloadStatusException     |Microsoft.BingAds.V13.Reporting         |This exception is thrown if the ReportingServiceManager failed to get the download operation status after multiple retries. 
CouldNotSubmitReportingDownloadException     |Microsoft.BingAds.V13.Reporting         |This exception is thrown by the ReportingServiceManager when the SubmitGenerateReport service operation that it called does not return a valid response. 
ReportingOperationCouldNotBeCompletedException     |Microsoft.BingAds.V13.Reporting         |This exception is thrown if an attempt was made to poll for a completed reporting results file and the reporting service returns a failed status. 
ReportingOperationInProgressException     |Microsoft.BingAds.V13.Reporting         |This exception is thrown if an attempt was made to download a reporting results file that is not yet available. 

### <a name="net-troubleshooting"></a>.NET SDK Troubleshooting
Unless there is a [known service issue](https://developers.ads.microsoft.com/Support), typically when a call fails it is because the SOAP elements are invalid, out of order, or you specified the wrong credentials. To verify both cases, you should capture the request SOAP envelope. You can [contact support](https://go.microsoft.com/fwlink/?LinkId=517018) or compare your capture to the corresponding SOAP example documented for each service operation. 

#### <a name="net-troubleshooting-tracebehavior"></a>SDK Trace
You can use the Bing Ads .NET SDK TraceBehavior to log the SOAP request and response. 

> [!NOTE]
> The TraceBehavior is available with Bing Ads .NET SDK version 12.13.5 and later. 

```csharp
using (StreamWriter streamWriter = new StreamWriter(@"tracelog.txt"))
{
    streamWriter.AutoFlush = true;

    // For console output instead of file output, use new TextWriterTraceListener(Console.Out).
    // If you only need debug output, you can remove the StreamWriter, TraceListener, and AddTraceSource.
    TraceListener traceListener = new TextWriterTraceListener(streamWriter.BaseStream);

    IServiceCollection serviceCollection = new ServiceCollection();
    serviceCollection.AddLogging(builder => builder
        .AddTraceSource(new SourceSwitch("ProgramSourceSwitch", "verbose"), traceListener)
        .AddDebug()
        .AddFilter(level => level >= LogLevel.Debug)
    );
    var iLoggerFactory = serviceCollection.BuildServiceProvider().GetService<ILoggerFactory>();
    TraceBehavior.Instance.AddMessageInspector(
        new LogMessageInspector(
            iLoggerFactory.CreateLogger<Program>(),
            LogLevel.Information)
    );

    Authentication authentication = AuthenticateWithOAuth();

    // This utiltiy operation sets the global authorization data instance 
    // to the first account that the current authenticated user can access. 

    SetAuthorizationDataAsync(authentication).Wait();

    // Run all of the examples that are included above.

    foreach (var example in _examples)
    {
        example.RunAsync(_authorizationData).Wait();
    }

    streamWriter.Flush();
    traceListener.Flush();
}
```

The full program using the above snippet can be found in [Program.cs](https://github.com/BingAds/BingAds-dotNet-SDK/blob/main/examples/BingAdsExamples/BingAdsConsoleApp/Program.cs).

#### <a name="net-troubleshooting-fiddler"></a>Fiddler Options
You can follow these steps to capture the SOAP envelopes from a .NET application using a third-party tool such as [Fiddler](https://fiddler2.com/get-fiddler). 
 - After installing Fiddler, export the Fiddler certificate from the root certificate store. 
 - Click **Tools** &gt; **Fiddler Options**. 
 - Select the **HTTPS** tab, and click the **Decrypt HTTPS traffic** check box. 
 - Click **OK**, and then follow the prompts to export the Fiddler certificate. 

## <a name="java-exceptions"><a/>Java Exceptions
If you use the Bing Ads Java [SDK](client-libraries.md), your application should be prepared to handle Bing Ads API [service level exceptions](#faultoverview) and [Bing Ads Java SDK](#java-sdk-exceptions) exceptions described below. 

For troubleshooting Java applications, see [Java SDK Troubleshooting](#java-troubleshooting).

### <a name="java-sdk-exceptions"></a>Java SDK Exceptions
The Bing Ads Java SDK exceptions abstract some of the service level exceptions. To work around most of the exceptions you can try again, and feel free to contact support if the issue persists after multiple retry attempts.

Exception  |Namespaces  |Description  
---------|---------|---------   
CouldNotDownloadResultFileException     |com.microsoft.bingads         |This exception is thrown by the internal SDK HttpService after a failed attempt to download a bulk or reporting result file. 
CouldNotUploadFileException     |com.microsoft.bingads        |This exception is thrown by the internal SDK HttpService after a failed attempt to upload a bulk file. 
OAuthTokenRequestException     |com.microsoft.bingads         |This exception is thrown if an error was returned from the Microsft Account authorization server. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example you might have specified an invalid client ID. 
BulkDownloadCouldNotBeCompletedException     |com.microsoft.bingads.V13.bulk        |This exception is thrown if an attempt was made to poll for a completed bulk download results file and the bulk service returns a failed status.
BulkOperationInProgressException     |com.microsoft.bingads.V13.bulk        |This exception is thrown if an attempt was made to download a bulk results file that is not yet available.
BulkUploadCouldNotBeCompletedException     |com.microsoft.bingads.V13.bulk        |This exception is thrown if an attempt was made to poll for a completed bulk upload results file and the bulk service returns a failed status. 
CouldNotGetBulkOperationStatusException     |com.microsoft.bingads.V13.bulk         |This exception is thrown if the BulkServiceManager failed to get the upload or download operation status after multiple retries. 
CouldNotSubmitBulkDownloadException     |com.microsoft.bingads.V13.bulk         |This exception is thrown by the BulkServiceManager when the DownloadCampaignsByAccountIds service operation that it called does not return a valid response. 
CouldNotSubmitBulkUploadException     |com.microsoft.bingads.V13.bulk         |This exception is thrown by the BulkServiceManager when the GetBulkUploadUrl service operation that it called does not return a valid response. 
EntityReadException     |com.microsoft.bingads.V13.bulk        |This exception is thrown when attempting to read entities from a bulk file using BulkFileReader. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example the bulk file that you are attempting to read from might have an invalid value in one of the fields.
EntityWriteException     |com.microsoft.bingads.V13.bulk        |This exception is thrown when attempting to write entities to a bulk file using BulkFileWriter. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example you might have specified an invalid value for one of the upload entities. 
CouldNotGetReportingDownloadStatusException     |com.microsoft.bingads.V13.reporting         |This exception is thrown if the ReportingServiceManager failed to get the download operation status after multiple retries. 
CouldNotSubmitReportingDownloadException     |com.microsoft.bingads.V13.reporting         |This exception is thrown by the ReportingServiceManager when the SubmitGenerateReport service operation that it called does not return a valid response. 
ReportingOperationCouldNotBeCompletedException     |com.microsoft.bingads.V13.reporting         |This exception is thrown if an attempt was made to poll for a completed reporting results file and the reporting service returns a failed status. 
ReportingOperationInProgressException     |com.microsoft.bingads.V13.reporting         |This exception is thrown if an attempt was made to download a reporting results file that is not yet available. 

### <a name="java-troubleshooting"></a>Java SDK Troubleshooting
Unless there is a [known service issue](https://developers.ads.microsoft.com/Support), typically when a call fails it is because the SOAP elements are invalid, out of order, or you specified the wrong credentials. To verify in any case, you should capture the request SOAP envelope. You can [contact support](https://go.microsoft.com/fwlink/?LinkId=517018) or compare your capture to the corresponding SOAP example documented for each service operation. 

To enable programmatic logging of request and response messages, see [Logging service calls](get-started-java.md#logging-service-calls).

#### <a name="java-troubleshooting-fiddler"></a>Fiddler Options
You can follow these steps to capture the SOAP envelopes from a Java application using a third-party tool such as [Fiddler](https://fiddler2.com/get-fiddler). 

1. After installing Fiddler, export the Fiddler certificate from the root certificate store. Click **Tools** &gt; **Fiddler Options**. Select the **HTTPS** tab, and click the **Decrypt HTTPS traffic** check box. Click **OK**, and then follow the prompts to export the Fiddler certificate.

2. Use the following command to import the certificate into the cacert store used by Java, for example execute from PowerShell as Administrator.

    ```powershell
    PS C:\Program Files\Java\jre1.8.0_201\bin> .\keytool.exe -importcert -v -alias "Fiddler cert" -trustcacerts -keystore "C:\Program Files\Java\jre1.8.0_201\lib\security\cacerts" -storepass changeit -file <PathToFiddlerRootGoesHere>\FiddlerRoot.cer
    ```

3. Add the following lines to your Java application.

    ```java
    System.setProperty("https.proxyHost", "127.0.0.1");
    System.setProperty("https.proxyPort", "8888");
    ```
    
## <a name="php-exceptions"><a/>PHP Exceptions
If you use the Bing Ads PHP [SDK](client-libraries.md), your application should be prepared to handle Bing Ads API [service level exceptions](#faultoverview) and [Bing Ads PHP SDK](#php-sdk-exceptions) exceptions described below. 

For troubleshooting PHP applications, see [PHP SDK Troubleshooting](#php-troubleshooting).

### <a name="php-troubleshooting"></a>PHP SDK Troubleshooting
Unless there is a [known service issue](https://developers.ads.microsoft.com/Support), typically when a call fails it is because the SOAP elements are invalid, out of order, or you specified the wrong credentials. To verify both cases, you should capture the request SOAP envelope. You can [contact support](https://go.microsoft.com/fwlink/?LinkId=517018) or compare your capture to the corresponding SOAP example documented for each service operation. 

#### <a name="php-troubleshooting-print"></a>Print SOAP
In PHP you can use the following methods to print the SOAP envelopes. Each of the PHP code examples include these statements to print the errors to the console. 

```php
print $proxy->GetService()->__getLastRequest()."\n";
print $proxy->GetService()->__getLastResponse()."\n";
```

### <a name="php-sdk-exceptions"></a>PHP SDK Exceptions
The Bing Ads PHP SDK exceptions abstract some of the service level exceptions. To work around most of the exceptions you can try again, and feel free to contact support if the issue persists after multiple retry attempts.

You should also handle the *OAuthTokenRequestException*, which is thrown if an error was returned from the Microsft Account authorization server. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example you might have specified an invalid client ID. 
    
## <a name="python-exceptions"><a/>Python Exceptions
If you use the Bing Ads Python [SDK](client-libraries.md), your application should be prepared to handle Bing Ads API [service level exceptions](#faultoverview) and [Bing Ads Python SDK](#python-sdk-exceptions) exceptions described below. 

For troubleshooting Python applications, see [Python SDK Troubleshooting](#python-troubleshooting).

### <a name="python-sdk-exceptions"></a>Python SDK Exceptions
The Bing Ads Python SDK exceptions abstract some of the service level exceptions. To work around most of the exceptions you can try again, and feel free to contact support if the issue persists after multiple retry attempts.

Exception  |Namespaces  |Description  
---------|---------|---------   
BulkException     |BingAds.V13.Bulk         |This exception is thrown if an attempt was made to poll for a completed bulk results file and the bulk service returns a failed status.
BulkDownloadException     |BingAds.V13.Bulk         |This exception is thrown if timeout occurs while attempting to download a bulk file.
BulkUploadException     |BingAds.V13.Bulk         |This exception is thrown if timeout occurs while attempting to download a bulk upload results file.
EntityReadException     |BingAds.V13.Bulk         |This exception is thrown when attempting to read entities from a bulk file using BulkFileReader. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example the bulk file that you are attempting to read from might have an invalid value in one of the fields.
EntityWriteException     |BingAds.V13.Bulk         |This exception is thrown when attempting to write entities to a bulk file using BulkFileWriter. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example you might have specified an invalid value for one of the upload entities.
FileDownloadException     |BingAds         |This exception is thrown if timeout occurs while attempting to download a bulk upload results file. 
FileUploadException     |BingAds         |This exception is thrown if timeout occurs while attempting to upload a bulk file. 
OAuthTokenRequestException     |BingAds         |This exception is thrown if an error was returned from the Microsft Account authorization server. To resolve this exception you can first check the stack trace to see the error details, in case there is some action you can take to resolve the issue. For example you might have specified an invalid client ID. 
ReportingException     |BingAds.V13.Reporting         |This exception is thrown if an attempt was made to poll for a completed reporting results file and the reporting service returns a failed status. 
ReportingDownloadException     |BingAds.V13.Reporting         |This exception is thrown if timeout occurs while attempting to download a reporting results file. 
SdkException      |BingAds         |The base exception class for the Bing Ads Python SDK. This exception is never raised.
TimeoutException      |BingAds         |This exception is thrown if timeout occurs.
     
### <a name="python-troubleshooting"></a>Python SDK Troubleshooting
Unless there is a [known service issue](https://developers.ads.microsoft.com/Support), typically when a call fails it is because the SOAP elements are invalid, out of order, or you specified the wrong credentials. To verify both cases, you should capture the request SOAP envelope. You can [contact support](https://go.microsoft.com/fwlink/?LinkId=517018) or compare your capture to the corresponding SOAP example documented for each service operation. 

#### <a name="python-troubleshooting-logging"></a>Logging
If you are using the Bing Ads Python SDK you can include logging to output traffic, for example the SOAP request and response. Each of the Python code examples include these statements to print the output all SOAP traffic to the console. Be sure to uncomment them if you want to view the traffic.

```python
import logging
logging.basicConfig(level=logging.INFO)
logging.getLogger('suds.client').setLevel(logging.DEBUG)
logging.getLogger('suds.transport.http').setLevel(logging.DEBUG) 
```

## See Also
[Bing Ads API Operation Error Codes](operation-error-codes.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
