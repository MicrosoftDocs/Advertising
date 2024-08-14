---
title: GetImportEntityIdsMapping Service Operation Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
zone_pivot_groups: api-reference
description: Gets mappings of your source entity IDs to Microsoft Advertising entity IDs.(test)
dev_langs: 
- csharp
- java
- php
- python
---
# GetImportEntityIdsMapping Service Operation Test - Campaign Management
Gets mappings of your source entity IDs to Microsoft Advertising entity IDs.

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetImportEntityIdsMappingRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="importentitytype"></a>ImportEntityType|The type of entity to get ID mappings.<br/><br/>For example, set this element to "Campaign" to get campaign ID mappings.|[ImportEntityType](importentitytype.md)|
|<a name="importtype"></a>ImportType|The type of import job to get entity ID mappings.<br/><br/>To get Google Ads to Microsoft Advertising entity ID mappings for each [GoogleImportJob](googleimportjob.md), set this element to "GoogleImportJob".|**string**|
|<a name="sourceentityids"></a>SourceEntityIds|The source entity IDs that you want mapped to Microsoft Advertising entity IDs.<br/><br/>If [ImportEntityType](#importentitytype) is set to "Campaign" and [ImportType](#importtype) is set to "GoogleImportJob", the operation will return Google Ads to Microsoft Advertising entity ID mappings.<br/><br/>You can specify a maximum of 100 source IDs.|**long** array|
|<a name="sourceparentid"></a>SourceParentId|Reserved.|**long**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetImportEntityIdsMappingResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entityidsmapping"></a>EntityIdsMapping|The resulting list of key and value pairs.<br/><br/>Each [key](keyvaluepairoflonglong.md#key) represents a source ID that you requested mappings for. The referenced [key](keyvaluepairoflonglong.md#value) is the mapped Microsoft Advertising entity ID.<br/><br/>If you requested a mapping with an invalid source ID, it will still be returned as the key but the referenced value will be set to *0* (zero).|[KeyValuePairOflonglong](keyvaluepairoflonglong.md) array|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">GetImportEntityIdsMapping</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetImportEntityIdsMappingRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <ImportType i:nil="false">ValueHere</ImportType>
      <SourceEntityIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
        <a1:long>ValueHere</a1:long>
      </SourceEntityIds>
      <ImportEntityType>ValueHere</ImportEntityType>
      <SourceParentId i:nil="false">ValueHere</SourceParentId>
    </GetImportEntityIdsMappingRequest>
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
    <GetImportEntityIdsMappingResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <EntityIdsMapping xmlns:e289="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <e289:KeyValuePairOflonglong>
          <e289:key>ValueHere</e289:key>
          <e289:value>ValueHere</e289:value>
        </e289:KeyValuePairOflonglong>
      </EntityIdsMapping>
      <PartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchError d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <FieldPath d4p1:nil="false">ValueHere</FieldPath>
          <ForwardCompatibilityMap xmlns:e290="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e290:KeyValuePairOfstringstring>
              <e290:key d4p1:nil="false">ValueHere</e290:key>
              <e290:value d4p1:nil="false">ValueHere</e290:value>
            </e290:KeyValuePairOfstringstring>
          </ForwardCompatibilityMap>
          <Index>ValueHere</Index>
          <Message d4p1:nil="false">ValueHere</Message>
          <Type d4p1:nil="false">ValueHere</Type>
          <!--These fields are applicable if the derived type attribute is set to EditorialError-->
          <Appealable d4p1:nil="false">ValueHere</Appealable>
          <DisapprovedText d4p1:nil="false">ValueHere</DisapprovedText>
          <Location d4p1:nil="false">ValueHere</Location>
          <PublisherCountry d4p1:nil="false">ValueHere</PublisherCountry>
          <ReasonCode>ValueHere</ReasonCode>
        </BatchError>
      </PartialErrors>
    </GetImportEntityIdsMappingResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetImportEntityIdsMappingResponse> GetImportEntityIdsMappingAsync(
	string importType,
	IList<long> sourceEntityIds,
	ImportEntityType importEntityType,
	long? sourceParentId)
{
	var request = new GetImportEntityIdsMappingRequest
	{
		ImportType = importType,
		SourceEntityIds = sourceEntityIds,
		ImportEntityType = importEntityType,
		SourceParentId = sourceParentId
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.GetImportEntityIdsMappingAsync(r), request));
}
```
```java
static GetImportEntityIdsMappingResponse getImportEntityIdsMapping(
	java.lang.String importType,
	ArrayOflong sourceEntityIds,
	ImportEntityType importEntityType,
	java.lang.Long sourceParentId) throws RemoteException, Exception
{
	GetImportEntityIdsMappingRequest request = new GetImportEntityIdsMappingRequest();

	request.setImportType(importType);
	request.setSourceEntityIds(sourceEntityIds);
	request.setImportEntityType(importEntityType);
	request.setSourceParentId(sourceParentId);

	return CampaignManagementService.getService().getImportEntityIdsMapping(request);
}
```
```php
static function GetImportEntityIdsMapping(
	$importType,
	$sourceEntityIds,
	$importEntityType,
	$sourceParentId)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new GetImportEntityIdsMappingRequest();

	$request->ImportType = $importType;
	$request->SourceEntityIds = $sourceEntityIds;
	$request->ImportEntityType = $importEntityType;
	$request->SourceParentId = $sourceParentId;

	return $GLOBALS['CampaignManagementProxy']->GetService()->GetImportEntityIdsMapping($request);
}
```
```python
response=campaignmanagement_service.GetImportEntityIdsMapping(
	ImportType=ImportType,
	SourceEntityIds=SourceEntityIds,
	ImportEntityType=ImportEntityType,
	SourceParentId=SourceParentId)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```Post
https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/ImportEntityIdsMapping/Query
```

# [Sandbox URL](#tab/sandbox)

```Post
https://campaign.api.sandbox.bingads.microsoft.com/CampaignManagement/v13/ImportEntityIdsMapping/Query
```

-----

## <a name="request"></a>Request Elements
The *GetImportEntityIdsMappingRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="importentitytype"></a>ImportEntityType|The type of entity to get ID mappings.<br/><br/>For example, set this element to "Campaign" to get campaign ID mappings.|[ImportEntityType](importentitytype.md)|
|<a name="importtype"></a>ImportType|The type of import job to get entity ID mappings.<br/><br/>To get Google Ads to Microsoft Advertising entity ID mappings for each [GoogleImportJob](googleimportjob.md), set this element to "GoogleImportJob".|**string**|
|<a name="sourceentityids"></a>SourceEntityIds|The source entity IDs that you want mapped to Microsoft Advertising entity IDs.<br/><br/>If [ImportEntityType](#importentitytype) is set to "Campaign" and [ImportType](#importtype) is set to "GoogleImportJob", the operation will return Google Ads to Microsoft Advertising entity ID mappings.<br/><br/>You can specify a maximum of 100 source IDs.|**long** array|
|<a name="sourceparentid"></a>SourceParentId|Reserved.|**long**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetImportEntityIdsMappingResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entityidsmapping"></a>EntityIdsMapping|The resulting list of key and value pairs.<br/><br/>Each [key](keyvaluepairoflonglong.md#key) represents a source ID that you requested mappings for. The referenced [key](keyvaluepairoflonglong.md#value) is the mapped Microsoft Advertising entity ID.<br/><br/>If you requested a mapping with an invalid source ID, it will still be returned as the key but the referenced value will be set to *0* (zero).|[KeyValuePairOflonglong](keyvaluepairoflonglong.md) array|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "ImportType": "ValueHere",
  "SourceEntityIds": [
    "ValueHere"
  ],
  "ImportEntityType": "ValueHere",
  "SourceParentId": "ValueHere"
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

Below is an example that is applicable if the type of [BatchError](batcherror.md) is [EditorialError](editorialerror.md).

```json
{
  "EntityIdsMapping": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "PartialErrors": [
    {
      "Code": "ValueHere",
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "FieldPath": "ValueHere",
      "ForwardCompatibilityMap": [
        {
          "key": "ValueHere",
          "value": "ValueHere"
        }
      ],
      "Index": "ValueHere",
      "Message": "ValueHere",
      "Type": "EditorialError",
      "Appealable": "ValueHere",
      "DisapprovedText": "ValueHere",
      "Location": "ValueHere",
      "PublisherCountry": "ValueHere",
      "ReasonCode": "ValueHere"
    }
  ]
}
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetImportEntityIdsMappingResponse> GetImportEntityIdsMappingAsync(
	string importType,
	IList<long> sourceEntityIds,
	ImportEntityType importEntityType,
	long? sourceParentId)
{
	var request = new GetImportEntityIdsMappingRequest
	{
		ImportType = importType,
		SourceEntityIds = sourceEntityIds,
		ImportEntityType = importEntityType,
		SourceParentId = sourceParentId
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.GetImportEntityIdsMappingAsync(r), request));
}
```
```java
static GetImportEntityIdsMappingResponse getImportEntityIdsMapping(
	java.lang.String importType,
	ArrayOflong sourceEntityIds,
	ImportEntityType importEntityType,
	java.lang.Long sourceParentId) throws RemoteException, Exception
{
	GetImportEntityIdsMappingRequest request = new GetImportEntityIdsMappingRequest();

	request.setImportType(importType);
	request.setSourceEntityIds(sourceEntityIds);
	request.setImportEntityType(importEntityType);
	request.setSourceParentId(sourceParentId);

	return CampaignManagementService.getService().getImportEntityIdsMapping(request);
}
```
```php
static function GetImportEntityIdsMapping(
	$importType,
	$sourceEntityIds,
	$importEntityType,
	$sourceParentId)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new GetImportEntityIdsMappingRequest();

	$request->ImportType = $importType;
	$request->SourceEntityIds = $sourceEntityIds;
	$request->ImportEntityType = $importEntityType;
	$request->SourceParentId = $sourceParentId;

	return $GLOBALS['CampaignManagementProxy']->GetService()->GetImportEntityIdsMapping($request);
}
```
```python
response=campaignmanagement_service.GetImportEntityIdsMapping(
	ImportType=ImportType,
	SourceEntityIds=SourceEntityIds,
	ImportEntityType=ImportEntityType,
	SourceParentId=SourceParentId)
```

::: zone-end