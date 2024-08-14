---
title: ApplyOfflineConversions Service Operation Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
zone_pivot_groups: api-reference
description: Applies offline conversions for the account with Microsoft Click Id among other offline conversion data.(test)
dev_langs: 
- csharp
- java
- php
- python
---
# ApplyOfflineConversions Service Operation Test - Campaign Management
Applies offline conversions for the account with Microsoft Click Id among other offline conversion data.

Let's say a customer sees your ad, clicks on it, but ends up calling you, leading to a sale that was taken offline. How can you track when your search ad leads to a conversion offline and outside of your website? You can import offline conversions, to better measure what happens after your ad was clicked.

After creating an [OfflineConversionGoal](offlineconversiongoal.md), you'll need to wait two hours before sending Microsoft Advertising any offline conversions. If you do not wait two hours, then your offline conversion data might not be applied. After you send Microsoft Advertising the offline conversions, it can take up to six hours to view conversion data.

Each offline conversion can be split across multiple click IDs. A single click ID can, however, be associated with multiple conversion goals and also be associated with the same goal multiple times, as long as the conversion time is different. Also, the same conversion can't be imported more than once. If more than one is attempted, the first instance will be used and the others will be ignored.

The value of the conversion can be included in the import file along with a custom currency. If no currency is stated, the conversion goal's default will be used.

For more information, see [Tracking offline conversions](https://help.ads.microsoft.com/#apex/3/en/56852/2).

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *ApplyOfflineConversionsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="offlineconversions"></a>OfflineConversions|The list of offline conversions for the account.<br/><br/>You can add a maximum of 1,000 offline conversions per service request.<br/><br/>Each offline conversion can be split across multiple click IDs. A single click ID can, however, be associated with multiple conversion goals and also be associated with the same goal multiple times, as long as the conversion time is different. Also, the same conversion can't be applied more than once. If you send Microsoft Advertising duplicates, the first instance will be used and the others will be ignored.|[OfflineConversion](offlineconversion.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *ApplyOfflineConversionsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">ApplyOfflineConversions</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <ApplyOfflineConversionsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <OfflineConversions i:nil="false">
        <OfflineConversion>
          <ConversionCurrencyCode i:nil="false">ValueHere</ConversionCurrencyCode>
          <ConversionName i:nil="false">ValueHere</ConversionName>
          <ConversionTime>ValueHere</ConversionTime>
          <ConversionValue i:nil="false">ValueHere</ConversionValue>
          <ExternalAttributionCredit i:nil="false">ValueHere</ExternalAttributionCredit>
          <ExternalAttributionModel i:nil="false">ValueHere</ExternalAttributionModel>
          <HashedEmailAddress i:nil="false">ValueHere</HashedEmailAddress>
          <HashedPhoneNumber i:nil="false">ValueHere</HashedPhoneNumber>
          <MicrosoftClickId i:nil="false">ValueHere</MicrosoftClickId>
        </OfflineConversion>
      </OfflineConversions>
    </ApplyOfflineConversionsRequest>
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
    <ApplyOfflineConversionsResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <PartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchError d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <FieldPath d4p1:nil="false">ValueHere</FieldPath>
          <ForwardCompatibilityMap xmlns:e135="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e135:KeyValuePairOfstringstring>
              <e135:key d4p1:nil="false">ValueHere</e135:key>
              <e135:value d4p1:nil="false">ValueHere</e135:value>
            </e135:KeyValuePairOfstringstring>
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
    </ApplyOfflineConversionsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<ApplyOfflineConversionsResponse> ApplyOfflineConversionsAsync(
	IList<OfflineConversion> offlineConversions)
{
	var request = new ApplyOfflineConversionsRequest
	{
		OfflineConversions = offlineConversions
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.ApplyOfflineConversionsAsync(r), request));
}
```
```java
static ApplyOfflineConversionsResponse applyOfflineConversions(
	ArrayOfOfflineConversion offlineConversions) throws RemoteException, Exception
{
	ApplyOfflineConversionsRequest request = new ApplyOfflineConversionsRequest();

	request.setOfflineConversions(offlineConversions);

	return CampaignManagementService.getService().applyOfflineConversions(request);
}
```
```php
static function ApplyOfflineConversions(
	$offlineConversions)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new ApplyOfflineConversionsRequest();

	$request->OfflineConversions = $offlineConversions;

	return $GLOBALS['CampaignManagementProxy']->GetService()->ApplyOfflineConversions($request);
}
```
```python
response=campaignmanagement_service.ApplyOfflineConversions(
	OfflineConversions=OfflineConversions)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```Post
https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/OfflineConversions/Apply
```

# [Sandbox URL](#tab/sandbox)

```Post
https://campaign.api.sandbox.bingads.microsoft.com/CampaignManagement/v13/OfflineConversions/Apply
```

-----

## <a name="request"></a>Request Elements
The *ApplyOfflineConversionsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="offlineconversions"></a>OfflineConversions|The list of offline conversions for the account.<br/><br/>You can add a maximum of 1,000 offline conversions per service request.<br/><br/>Each offline conversion can be split across multiple click IDs. A single click ID can, however, be associated with multiple conversion goals and also be associated with the same goal multiple times, as long as the conversion time is different. Also, the same conversion can't be applied more than once. If you send Microsoft Advertising duplicates, the first instance will be used and the others will be ignored.|[OfflineConversion](offlineconversion.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *ApplyOfflineConversionsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "OfflineConversions": [
    {
      "ConversionCurrencyCode": "ValueHere",
      "ConversionName": "ValueHere",
      "ConversionTime": "ValueHere",
      "ConversionValue": "ValueHere",
      "ExternalAttributionCredit": "ValueHere",
      "ExternalAttributionModel": "ValueHere",
      "HashedEmailAddress": "ValueHere",
      "HashedPhoneNumber": "ValueHere",
      "MicrosoftClickId": "ValueHere"
    }
  ]
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

Below is an example that is applicable if the type of [BatchError](batcherror.md) is [EditorialError](editorialerror.md).

```json
{
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
public async Task<ApplyOfflineConversionsResponse> ApplyOfflineConversionsAsync(
	IList<OfflineConversion> offlineConversions)
{
	var request = new ApplyOfflineConversionsRequest
	{
		OfflineConversions = offlineConversions
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.ApplyOfflineConversionsAsync(r), request));
}
```
```java
static ApplyOfflineConversionsResponse applyOfflineConversions(
	ArrayOfOfflineConversion offlineConversions) throws RemoteException, Exception
{
	ApplyOfflineConversionsRequest request = new ApplyOfflineConversionsRequest();

	request.setOfflineConversions(offlineConversions);

	return CampaignManagementService.getService().applyOfflineConversions(request);
}
```
```php
static function ApplyOfflineConversions(
	$offlineConversions)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new ApplyOfflineConversionsRequest();

	$request->OfflineConversions = $offlineConversions;

	return $GLOBALS['CampaignManagementProxy']->GetService()->ApplyOfflineConversions($request);
}
```
```python
response=campaignmanagement_service.ApplyOfflineConversions(
	OfflineConversions=OfflineConversions)
```

::: zone-end