---
title: GetBulkUploadStatus Service Operation Test - Bulk
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
zone_pivot_groups: api-reference
description: Gets the status and completion progress of a bulk upload request.(test)
dev_langs: 
- csharp
- java
- php
- python
---
# GetBulkUploadStatus Service Operation Test - Bulk
Gets the status and completion progress of a bulk upload request.

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetBulkUploadStatusRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="requestid"></a>RequestId|The identifier of the upload request.<br/><br/>The identifier is valid for up to 15 minutes. If you have not successfully uploaded the file within this period, you will need to get a new request identifier and upload URL.|**string**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetBulkUploadStatusResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="errors"></a>Errors|An array of *OperationError* objects corresponding to errors encountered during the system processing of the bulk file after your HTTP POST upload completed.<br/><br/>For example, an *OperationError* would include the *BulkServiceFormatVersionNotSupported* error code if the uploaded file contains one or more bulk records that are not supported with the corresponding file format version.|[OperationError](operationerror.md) array|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this operation.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="percentcomplete"></a>PercentComplete|The progress completion percentage for system processing of the uploaded bulk file. The value range is between 0 and 100.<br/><br/>You should also compare the upload status. If the upload fails, the percent complete will reset to zero (0).|**int**|
|<a name="requeststatus"></a>RequestStatus|The status of the upload. The following are the possible returned status values.<br/><br/>Completed - The upload file was accepted and processed successfully without errors.<br/><br/>CompletedWithErrors - The upload completed with one or more errors. While the overall upload was successful, one or more add or update errors could have occurred. As a best practice you should request error information via the *ResponseMode* element when calling [GetBulkUploadUrl](getbulkuploadurl.md) and check the *ResultFileUrl* for any errors.<br/><br/>Failed - The entire upload failed due to an unexpected error. You may submit a new upload with fewer entities or try again to submit the same upload later.<br/><br/>FileUploaded - The upload request has been received and is in the queue for processing.<br/><br/>InProgress - The upload file has been accepted and the upload is in progress.<br/><br/>PendingFileUpload - The upload file has not been received for the corresponding *RequestId*.<br/><br/>UploadFileRowCountExceeded - The limit of bulk records in the upload file has been exceeded. For more information about limits and upload best practices, see [Bulk Upload](../guides/bulk-download-upload.md#bulkupload).<br/><br/>UploadFileFormatNotSupported - The Format Version *Name* field specified in the upload is not supported for this version of the Bulk API.|**string**|
|<a name="resultfileurl"></a>ResultFileUrl|The URL of the file that contains the requested results, for example upload error information.<br/><br/>The URL must be used within five minutes of the time that the *GetBulkUploadStatus* operation returns the *Completed* or *CompletedWithErrors* status response string. If you do not start the download within this period of time, you will need to call *GetBulkUploadStatus* again to get a new URL. You should not take a dependency on the domain of the download URL, as it is subject to change.|**string**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">GetBulkUploadStatus</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetBulkUploadStatusRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <RequestId i:nil="false">ValueHere</RequestId>
    </GetBulkUploadStatusRequest>
  </s:Body>
</s:Envelope>
```

## <a name="response-soap"></a>Response SOAP
This template was generated by a tool to show the order of the [body](#response-body) and [header](#response-header) elements for the SOAP response.

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <TrackingId d3p1:nil="false" xmlns:d3p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</TrackingId>
  </s:Header>
  <s:Body>
    <GetBulkUploadStatusResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <Errors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <OperationError>
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <Message d4p1:nil="false">ValueHere</Message>
        </OperationError>
      </Errors>
      <ForwardCompatibilityMap xmlns:e431="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <e431:KeyValuePairOfstringstring>
          <e431:key d4p1:nil="false">ValueHere</e431:key>
          <e431:value d4p1:nil="false">ValueHere</e431:value>
        </e431:KeyValuePairOfstringstring>
      </ForwardCompatibilityMap>
      <PercentComplete>ValueHere</PercentComplete>
      <RequestStatus d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</RequestStatus>
      <ResultFileUrl d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</ResultFileUrl>
    </GetBulkUploadStatusResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetBulkUploadStatusResponse> GetBulkUploadStatusAsync(
	string requestId)
{
	var request = new GetBulkUploadStatusRequest
	{
		RequestId = requestId
	};

	return (await BulkService.CallAsync((s, r) => s.GetBulkUploadStatusAsync(r), request));
}
```
```java
static GetBulkUploadStatusResponse getBulkUploadStatus(
	java.lang.String requestId) throws RemoteException, Exception
{
	GetBulkUploadStatusRequest request = new GetBulkUploadStatusRequest();

	request.setRequestId(requestId);

	return BulkService.getService().getBulkUploadStatus(request);
}
```
```php
static function GetBulkUploadStatus(
	$requestId)
{

	$GLOBALS['Proxy'] = $GLOBALS['BulkProxy'];

	$request = new GetBulkUploadStatusRequest();

	$request->RequestId = $requestId;

	return $GLOBALS['BulkProxy']->GetService()->GetBulkUploadStatus($request);
}
```
```python
response=bulk_service.GetBulkUploadStatus(
	RequestId=RequestId)
```

## Requirements
Service: [BulkService.svc v13](https://bulk.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/BulkService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```Post
https://bulk.api.bingads.microsoft.com/Bulk/v13/BulkUploadStatus/Query
```

# [Sandbox URL](#tab/sandbox)

```Post
https://bulk.api.sandbox.bingads.microsoft.com/Bulk/v13/BulkUploadStatus/Query
```

-----

## <a name="request"></a>Request Elements
The *GetBulkUploadStatusRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="requestid"></a>RequestId|The identifier of the upload request.<br/><br/>The identifier is valid for up to 15 minutes. If you have not successfully uploaded the file within this period, you will need to get a new request identifier and upload URL.|**string**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetBulkUploadStatusResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="errors"></a>Errors|An array of *OperationError* objects corresponding to errors encountered during the system processing of the bulk file after your HTTP POST upload completed.<br/><br/>For example, an *OperationError* would include the *BulkServiceFormatVersionNotSupported* error code if the uploaded file contains one or more bulk records that are not supported with the corresponding file format version.|[OperationError](operationerror.md) array|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this operation.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="percentcomplete"></a>PercentComplete|The progress completion percentage for system processing of the uploaded bulk file. The value range is between 0 and 100.<br/><br/>You should also compare the upload status. If the upload fails, the percent complete will reset to zero (0).|**int**|
|<a name="requeststatus"></a>RequestStatus|The status of the upload. The following are the possible returned status values.<br/><br/>Completed - The upload file was accepted and processed successfully without errors.<br/><br/>CompletedWithErrors - The upload completed with one or more errors. While the overall upload was successful, one or more add or update errors could have occurred. As a best practice you should request error information via the *ResponseMode* element when calling [GetBulkUploadUrl](getbulkuploadurl.md) and check the *ResultFileUrl* for any errors.<br/><br/>Failed - The entire upload failed due to an unexpected error. You may submit a new upload with fewer entities or try again to submit the same upload later.<br/><br/>FileUploaded - The upload request has been received and is in the queue for processing.<br/><br/>InProgress - The upload file has been accepted and the upload is in progress.<br/><br/>PendingFileUpload - The upload file has not been received for the corresponding *RequestId*.<br/><br/>UploadFileRowCountExceeded - The limit of bulk records in the upload file has been exceeded. For more information about limits and upload best practices, see [Bulk Upload](../guides/bulk-download-upload.md#bulkupload).<br/><br/>UploadFileFormatNotSupported - The Format Version *Name* field specified in the upload is not supported for this version of the Bulk API.|**string**|
|<a name="resultfileurl"></a>ResultFileUrl|The URL of the file that contains the requested results, for example upload error information.<br/><br/>The URL must be used within five minutes of the time that the *GetBulkUploadStatus* operation returns the *Completed* or *CompletedWithErrors* status response string. If you do not start the download within this period of time, you will need to call *GetBulkUploadStatus* again to get a new URL. You should not take a dependency on the domain of the download URL, as it is subject to change.|**string**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "RequestId": "ValueHere"
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "Errors": [
    {
      "Code": IntValueHere,
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "Message": "ValueHere"
    }
  ],
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "PercentComplete": IntValueHere,
  "RequestStatus": "ValueHere",
  "ResultFileUrl": "ValueHere"
}
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetBulkUploadStatusResponse> GetBulkUploadStatusAsync(
	string requestId)
{
	var request = new GetBulkUploadStatusRequest
	{
		RequestId = requestId
	};

	return (await BulkService.CallAsync((s, r) => s.GetBulkUploadStatusAsync(r), request));
}
```
```java
static GetBulkUploadStatusResponse getBulkUploadStatus(
	java.lang.String requestId) throws RemoteException, Exception
{
	GetBulkUploadStatusRequest request = new GetBulkUploadStatusRequest();

	request.setRequestId(requestId);

	return BulkService.getService().getBulkUploadStatus(request);
}
```
```php
static function GetBulkUploadStatus(
	$requestId)
{

	$GLOBALS['Proxy'] = $GLOBALS['BulkProxy'];

	$request = new GetBulkUploadStatusRequest();

	$request->RequestId = $requestId;

	return $GLOBALS['BulkProxy']->GetService()->GetBulkUploadStatus($request);
}
```
```python
response=bulk_service.GetBulkUploadStatus(
	RequestId=RequestId)
```

::: zone-end
