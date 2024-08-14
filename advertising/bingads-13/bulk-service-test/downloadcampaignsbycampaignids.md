---
title: DownloadCampaignsByCampaignIds Service Operation Test - Bulk
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
zone_pivot_groups: api-reference
description: Downloads settings and performance data for the specified campaigns.(test)
dev_langs: 
- csharp
- java
- php
- python
---
# DownloadCampaignsByCampaignIds Service Operation Test - Bulk
Downloads settings and performance data for the specified campaigns. You can request all campaign data or only the data that has changed since the last time you downloaded the campaign.

You must use the same user credentials for the download request operation (either [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md)) and the [GetBulkDownloadStatus](getbulkdownloadstatus.md) polling operation.

> [!TIP]
> The Bulk File Schema provides details about records that you can download and upload. Please adhere to the best practices to ensure fair usage for yourself and all Microsoft Advertising clients. For details please see [Bulk Download Best Practices](../guides/bulk-download-upload.md#downloadbestpractices) and [Bulk Upload Best Practices](../guides/bulk-download-upload.md#uploadbestpractices).

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *DownloadCampaignsByCampaignIdsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaigns"></a>Campaigns|The campaigns to download. You can specify a maximum of 1,000 campaigns. The campaigns that you specify must belong to the same account.|[CampaignScope](campaignscope.md) array|
|<a name="compressiontype"></a>CompressionType|The compression type of the download file. For possible values, see [CompressionType](compressiontype.md). The default compression type is Zip.|[CompressionType](compressiontype.md)|
|<a name="datascope"></a>DataScope|You may include quality score data such as ad relevance, in addition to entity data such as campaign settings. The default value is EntityData.<br/><br/>You may include multiple values as flags. How you specify multiple flags depends on the programming language that you use. For example, C# treats these values as flag values and Java treats them as an array of strings. The SOAP should include a string that contains a space-delimited list of values for example, `<DataScope>EntityData QualityScoreData</DataScope>`.<br/><br/>If [BidSuggestionsData](datascope.md#bidsuggestionsdata) or [QualityScoreData](datascope.md#qualityscoredata) are included, you must request a full sync. To perform a full sync, do not set [LastSyncTimeInUTC](#lastsynctimeinutc) i.e., leave it nil.|[DataScope](datascope.md)|
|<a name="downloadentities"></a>DownloadEntities|The entities to include in the download. For a list of entities that you can download, see the DownloadEntity value set.<br/><br/>You must specify at least one download entity, and otherwise the operation will error.|DownloadEntity array|
|<a name="downloadfiletype"></a>DownloadFileType|The format of the download file. For possible values, see [DownloadFileType](downloadfiletype.md). The default is CSV.|[DownloadFileType](downloadfiletype.md)|
|<a name="formatversion"></a>FormatVersion|The format for records of the download file.<br/><br/>As a best practice you should always specify the latest format version. Currently the only supported format version for Bing Ads API Version 13 is 6.0.<br/><br/>You should manage records according to the Bulk File Schema for the corresponding format version. |**string**|
|<a name="lastsynctimeinutc"></a>LastSyncTimeInUTC|The last time that you requested a download. The date and time is expressed in Coordinated Universal Time (UTC).<br/><br/>If you specify the last sync time, only those entities that have changed (added, updated, or deleted) since the specified date and time will be downloaded. If the parent campaign or ad group has been deleted since the specified last sync time, you will only see a deleted record for the deleted parent campaign or ad group. For example if a campaign was deleted, the bulk file will not contain deleted records for the ad groups, criterions, ads, and keywords that were in the campaign.<br/><br/>Target criterion are treated slightly different from other entities, and deleted records are not returned. If any changes were made to a campaign or ad group's target, then all currently active sub target criterion records are returned.<br/><br/>Typically, you request a full download the first time you call the operation by setting this element to null. On all subsequent calls you set the last sync time to the time stamp of the previous download.<br/><br/>The download file contains the time stamp of the download in the Sync Time column of the Account record. You should use the account Sync Time to set this element the next time that you request a download.<br/><br/>If you set a date and time that is more than 30 days prior, an error will be returned.|**dateTime**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *DownloadCampaignsByCampaignIdsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="downloadrequestid"></a>DownloadRequestId|The identifier of the download request.<br/><br/>You use the identifier to call the [GetBulkDownloadStatus](getbulkdownloadstatus.md) operation to check the status of the download.<br/><br/>The identifier is valid for a maximum of two days. If you have not successfully downloaded the file within this period, it is removed from the download site and you will need to get a new download request identifier.<br/><br/>The string has a length up to 40 and can contain any character.|**string**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">DownloadCampaignsByCampaignIds</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <DownloadCampaignsByCampaignIdsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <Campaigns i:nil="false">
        <CampaignScope>
          <CampaignId>ValueHere</CampaignId>
          <ParentAccountId>ValueHere</ParentAccountId>
        </CampaignScope>
      </Campaigns>
      <CompressionType i:nil="false">ValueHere</CompressionType>
      <DataScope>ValueHere</DataScope>
      <DownloadEntities i:nil="false">
        <DownloadEntity>ValueHere</DownloadEntity>
      </DownloadEntities>
      <DownloadFileType i:nil="false">ValueHere</DownloadFileType>
      <FormatVersion i:nil="false">ValueHere</FormatVersion>
      <LastSyncTimeInUTC i:nil="false">ValueHere</LastSyncTimeInUTC>
    </DownloadCampaignsByCampaignIdsRequest>
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
    <DownloadCampaignsByCampaignIdsResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <DownloadRequestId d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</DownloadRequestId>
    </DownloadCampaignsByCampaignIdsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<DownloadCampaignsByCampaignIdsResponse> DownloadCampaignsByCampaignIdsAsync(
	IList<CampaignScope> campaigns,
	CompressionType? compressionType,
	DataScope dataScope,
	IList<DownloadEntity> downloadEntities,
	DownloadFileType? downloadFileType,
	string formatVersion,
	DateTime? lastSyncTimeInUTC)
{
	var request = new DownloadCampaignsByCampaignIdsRequest
	{
		Campaigns = campaigns,
		CompressionType = compressionType,
		DataScope = dataScope,
		DownloadEntities = downloadEntities,
		DownloadFileType = downloadFileType,
		FormatVersion = formatVersion,
		LastSyncTimeInUTC = lastSyncTimeInUTC
	};

	return (await BulkService.CallAsync((s, r) => s.DownloadCampaignsByCampaignIdsAsync(r), request));
}
```
```java
static DownloadCampaignsByCampaignIdsResponse downloadCampaignsByCampaignIds(
	ArrayOfCampaignScope campaigns,
	CompressionType compressionType,
	ArrayList<DataScope> dataScope,
	ArrayOfDownloadEntity downloadEntities,
	DownloadFileType downloadFileType,
	java.lang.String formatVersion,
	Calendar lastSyncTimeInUTC) throws RemoteException, Exception
{
	DownloadCampaignsByCampaignIdsRequest request = new DownloadCampaignsByCampaignIdsRequest();

	request.setCampaigns(campaigns);
	request.setCompressionType(compressionType);
	request.setDataScope(dataScope);
	request.setDownloadEntities(downloadEntities);
	request.setDownloadFileType(downloadFileType);
	request.setFormatVersion(formatVersion);
	request.setLastSyncTimeInUTC(lastSyncTimeInUTC);

	return BulkService.getService().downloadCampaignsByCampaignIds(request);
}
```
```php
static function DownloadCampaignsByCampaignIds(
	$campaigns,
	$compressionType,
	$dataScope,
	$downloadEntities,
	$downloadFileType,
	$formatVersion,
	$lastSyncTimeInUTC)
{

	$GLOBALS['Proxy'] = $GLOBALS['BulkProxy'];

	$request = new DownloadCampaignsByCampaignIdsRequest();

	$request->Campaigns = $campaigns;
	$request->CompressionType = $compressionType;
	$request->DataScope = $dataScope;
	$request->DownloadEntities = $downloadEntities;
	$request->DownloadFileType = $downloadFileType;
	$request->FormatVersion = $formatVersion;
	$request->LastSyncTimeInUTC = $lastSyncTimeInUTC;

	return $GLOBALS['BulkProxy']->GetService()->DownloadCampaignsByCampaignIds($request);
}
```
```python
response=bulk_service.DownloadCampaignsByCampaignIds(
	Campaigns=Campaigns,
	CompressionType=CompressionType,
	DataScope=DataScope,
	DownloadEntities=DownloadEntities,
	DownloadFileType=DownloadFileType,
	FormatVersion=FormatVersion,
	LastSyncTimeInUTC=LastSyncTimeInUTC)
```

## Requirements
Service: [BulkService.svc v13](https://bulk.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/BulkService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```Post
https://bulk.api.bingads.microsoft.com/Bulk/v13/Campaigns/DownloadByCampaignIds
```

# [Sandbox URL](#tab/sandbox)

```Post
https://bulk.api.sandbox.bingads.microsoft.com/Bulk/v13/Campaigns/DownloadByCampaignIds
```

-----

## <a name="request"></a>Request Elements
The *DownloadCampaignsByCampaignIdsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaigns"></a>Campaigns|The campaigns to download. You can specify a maximum of 1,000 campaigns. The campaigns that you specify must belong to the same account.|[CampaignScope](campaignscope.md) array|
|<a name="compressiontype"></a>CompressionType|The compression type of the download file. For possible values, see [CompressionType](compressiontype.md). The default compression type is Zip.|[CompressionType](compressiontype.md)|
|<a name="datascope"></a>DataScope|You may include quality score data such as ad relevance, in addition to entity data such as campaign settings. The default value is EntityData.<br/><br/>You may include multiple values as flags. How you specify multiple flags depends on the programming language that you use. For example, C# treats these values as flag values and Java treats them as an array of strings. The SOAP should include a string that contains a space-delimited list of values for example, `<DataScope>EntityData QualityScoreData</DataScope>`.<br/><br/>If [BidSuggestionsData](datascope.md#bidsuggestionsdata) or [QualityScoreData](datascope.md#qualityscoredata) are included, you must request a full sync. To perform a full sync, do not set [LastSyncTimeInUTC](#lastsynctimeinutc) i.e., leave it nil.|[DataScope](datascope.md)|
|<a name="downloadentities"></a>DownloadEntities|The entities to include in the download. For a list of entities that you can download, see the DownloadEntity value set.<br/><br/>You must specify at least one download entity, and otherwise the operation will error.|DownloadEntity array|
|<a name="downloadfiletype"></a>DownloadFileType|The format of the download file. For possible values, see [DownloadFileType](downloadfiletype.md). The default is CSV.|[DownloadFileType](downloadfiletype.md)|
|<a name="formatversion"></a>FormatVersion|The format for records of the download file.<br/><br/>As a best practice you should always specify the latest format version. Currently the only supported format version for Bing Ads API Version 13 is 6.0.<br/><br/>You should manage records according to the Bulk File Schema for the corresponding format version. |**string**|
|<a name="lastsynctimeinutc"></a>LastSyncTimeInUTC|The last time that you requested a download. The date and time is expressed in Coordinated Universal Time (UTC).<br/><br/>If you specify the last sync time, only those entities that have changed (added, updated, or deleted) since the specified date and time will be downloaded. If the parent campaign or ad group has been deleted since the specified last sync time, you will only see a deleted record for the deleted parent campaign or ad group. For example if a campaign was deleted, the bulk file will not contain deleted records for the ad groups, criterions, ads, and keywords that were in the campaign.<br/><br/>Target criterion are treated slightly different from other entities, and deleted records are not returned. If any changes were made to a campaign or ad group's target, then all currently active sub target criterion records are returned.<br/><br/>Typically, you request a full download the first time you call the operation by setting this element to null. On all subsequent calls you set the last sync time to the time stamp of the previous download.<br/><br/>The download file contains the time stamp of the download in the Sync Time column of the Account record. You should use the account Sync Time to set this element the next time that you request a download.<br/><br/>If you set a date and time that is more than 30 days prior, an error will be returned.|**dateTime**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *DownloadCampaignsByCampaignIdsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="downloadrequestid"></a>DownloadRequestId|The identifier of the download request.<br/><br/>You use the identifier to call the [GetBulkDownloadStatus](getbulkdownloadstatus.md) operation to check the status of the download.<br/><br/>The identifier is valid for a maximum of two days. If you have not successfully downloaded the file within this period, it is removed from the download site and you will need to get a new download request identifier.<br/><br/>The string has a length up to 40 and can contain any character.|**string**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "Campaigns": [
    {
      "CampaignId": "ValueHere",
      "ParentAccountId": "ValueHere"
    }
  ],
  "CompressionType": "ValueHere",
  "DataScope": "ValueHere",
  "DownloadEntities": [
    "ValueHere"
  ],
  "DownloadFileType": "ValueHere",
  "FormatVersion": "ValueHere",
  "LastSyncTimeInUTC": "ValueHere"
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "DownloadRequestId": "ValueHere"
}
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<DownloadCampaignsByCampaignIdsResponse> DownloadCampaignsByCampaignIdsAsync(
	IList<CampaignScope> campaigns,
	CompressionType? compressionType,
	DataScope dataScope,
	IList<DownloadEntity> downloadEntities,
	DownloadFileType? downloadFileType,
	string formatVersion,
	DateTime? lastSyncTimeInUTC)
{
	var request = new DownloadCampaignsByCampaignIdsRequest
	{
		Campaigns = campaigns,
		CompressionType = compressionType,
		DataScope = dataScope,
		DownloadEntities = downloadEntities,
		DownloadFileType = downloadFileType,
		FormatVersion = formatVersion,
		LastSyncTimeInUTC = lastSyncTimeInUTC
	};

	return (await BulkService.CallAsync((s, r) => s.DownloadCampaignsByCampaignIdsAsync(r), request));
}
```
```java
static DownloadCampaignsByCampaignIdsResponse downloadCampaignsByCampaignIds(
	ArrayOfCampaignScope campaigns,
	CompressionType compressionType,
	ArrayList<DataScope> dataScope,
	ArrayOfDownloadEntity downloadEntities,
	DownloadFileType downloadFileType,
	java.lang.String formatVersion,
	Calendar lastSyncTimeInUTC) throws RemoteException, Exception
{
	DownloadCampaignsByCampaignIdsRequest request = new DownloadCampaignsByCampaignIdsRequest();

	request.setCampaigns(campaigns);
	request.setCompressionType(compressionType);
	request.setDataScope(dataScope);
	request.setDownloadEntities(downloadEntities);
	request.setDownloadFileType(downloadFileType);
	request.setFormatVersion(formatVersion);
	request.setLastSyncTimeInUTC(lastSyncTimeInUTC);

	return BulkService.getService().downloadCampaignsByCampaignIds(request);
}
```
```php
static function DownloadCampaignsByCampaignIds(
	$campaigns,
	$compressionType,
	$dataScope,
	$downloadEntities,
	$downloadFileType,
	$formatVersion,
	$lastSyncTimeInUTC)
{

	$GLOBALS['Proxy'] = $GLOBALS['BulkProxy'];

	$request = new DownloadCampaignsByCampaignIdsRequest();

	$request->Campaigns = $campaigns;
	$request->CompressionType = $compressionType;
	$request->DataScope = $dataScope;
	$request->DownloadEntities = $downloadEntities;
	$request->DownloadFileType = $downloadFileType;
	$request->FormatVersion = $formatVersion;
	$request->LastSyncTimeInUTC = $lastSyncTimeInUTC;

	return $GLOBALS['BulkProxy']->GetService()->DownloadCampaignsByCampaignIds($request);
}
```
```python
response=bulk_service.DownloadCampaignsByCampaignIds(
	Campaigns=Campaigns,
	CompressionType=CompressionType,
	DataScope=DataScope,
	DownloadEntities=DownloadEntities,
	DownloadFileType=DownloadFileType,
	FormatVersion=FormatVersion,
	LastSyncTimeInUTC=LastSyncTimeInUTC)
```

::: zone-end