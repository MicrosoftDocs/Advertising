---
title: AddNegativeKeywordsToEntities Service Operation - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Adds negative keywords to the specified campaign or ad group.
dev_langs: 
- csharp
- java
- php
- python
---
# AddNegativeKeywordsToEntities Service Operation - Campaign Management
Adds negative keywords to the specified campaign or ad group.

The operation does not add negative keywords to a shared negative keyword list. See [AddListItemsToSharedList](addlistitemstosharedlist.md) for more information. 

> [!TIP] 
> For an overview, see the [Negative Keywords](../guides/negative-keywords.md) technical guide. 

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *AddNegativeKeywordsToEntitiesRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entitynegativekeywords"></a>EntityNegativeKeywords|An array of negative keyword with associated entity such as a campaign or ad group.<br/><br/>The specified negative keywords will be appended to any existing negative keywords if the limit of 20,000 negative keywords per associated campaign or ad group would not be exceeded.<br/><br/>The *EntityType* specified within each *EntityNegativeKeyword* must be set to the same value.<br/><br/>This array can contain a maximum of 1 *EntityNegativeKeyword* element, which contains up to 20,000 negative keywords.|[EntityNegativeKeyword](entitynegativekeyword.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *AddNegativeKeywordsToEntitiesResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="negativekeywordids"></a>NegativeKeywordIds|A list of [IdCollection](idcollection.md) corresponding to the negative keywords that were added for the corresponding entity.<br/><br/>Within an [IdCollection](idcollection.md), the list of *Ids* corresponds directly to the list of negative keywords in the request. Items of the list may be returned as null. For each list index where a negative keyword was not added, the corresponding element will be null.|[IdCollection](idcollection.md) array|
|<a name="nestedpartialerrors"></a>NestedPartialErrors|An array of [BatchErrorCollection](batcherrorcollection.md) objects that contain details for any negative keyword that were not successfully added. The top level error within each [BatchErrorCollection](batcherrorcollection.md) object corresponds to potential campaign or ad group errors. The nested list of [BatchError](batcherror.md) objects would include any errors specific to the negative keywords that you attempted to add to the campaign or ad group.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchErrorCollection](batcherrorcollection.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">AddNegativeKeywordsToEntities</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <AddNegativeKeywordsToEntitiesRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <EntityNegativeKeywords i:nil="false">
        <EntityNegativeKeyword>
          <EntityId>ValueHere</EntityId>
          <EntityType i:nil="false">ValueHere</EntityType>
          <NegativeKeywords i:nil="false">
            <NegativeKeyword>
              <Id i:nil="false">ValueHere</Id>
              <MatchType i:nil="false">ValueHere</MatchType>
              <Text i:nil="false">ValueHere</Text>
            </NegativeKeyword>
          </NegativeKeywords>
        </EntityNegativeKeyword>
      </EntityNegativeKeywords>
    </AddNegativeKeywordsToEntitiesRequest>
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
    <AddNegativeKeywordsToEntitiesResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <NegativeKeywordIds d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <IdCollection>
          <Ids d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:long>ValueHere</a1:long>
          </Ids>
        </IdCollection>
      </NegativeKeywordIds>
      <NestedPartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchErrorCollection d4p1:type="-- derived type specified here with the appropriate prefix --">
          <BatchErrors d4p1:nil="false">
            <BatchError d4p1:type="-- derived type specified here with the appropriate prefix --">
              <Code>ValueHere</Code>
              <Details d4p1:nil="false">ValueHere</Details>
              <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
              <FieldPath d4p1:nil="false">ValueHere</FieldPath>
              <ForwardCompatibilityMap xmlns:e117="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
                <e117:KeyValuePairOfstringstring>
                  <e117:key d4p1:nil="false">ValueHere</e117:key>
                  <e117:value d4p1:nil="false">ValueHere</e117:value>
                </e117:KeyValuePairOfstringstring>
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
          </BatchErrors>
          <Code d4p1:nil="false">ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <FieldPath d4p1:nil="false">ValueHere</FieldPath>
          <ForwardCompatibilityMap xmlns:e118="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e118:KeyValuePairOfstringstring>
              <e118:key d4p1:nil="false">ValueHere</e118:key>
              <e118:value d4p1:nil="false">ValueHere</e118:value>
            </e118:KeyValuePairOfstringstring>
          </ForwardCompatibilityMap>
          <Index>ValueHere</Index>
          <Message d4p1:nil="false">ValueHere</Message>
          <Type d4p1:nil="false">ValueHere</Type>
          <!--These fields are applicable if the derived type attribute is set to EditorialErrorCollection-->
          <Appealable d4p1:nil="false">ValueHere</Appealable>
          <DisapprovedText d4p1:nil="false">ValueHere</DisapprovedText>
          <Location d4p1:nil="false">ValueHere</Location>
          <PublisherCountry d4p1:nil="false">ValueHere</PublisherCountry>
          <ReasonCode>ValueHere</ReasonCode>
        </BatchErrorCollection>
      </NestedPartialErrors>
    </AddNegativeKeywordsToEntitiesResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<AddNegativeKeywordsToEntitiesResponse> AddNegativeKeywordsToEntitiesAsync(
	IList<EntityNegativeKeyword> entityNegativeKeywords)
{
	var request = new AddNegativeKeywordsToEntitiesRequest
	{
		EntityNegativeKeywords = entityNegativeKeywords
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.AddNegativeKeywordsToEntitiesAsync(r), request));
}
```
```java
static AddNegativeKeywordsToEntitiesResponse addNegativeKeywordsToEntities(
	ArrayOfEntityNegativeKeyword entityNegativeKeywords) throws RemoteException, Exception
{
	AddNegativeKeywordsToEntitiesRequest request = new AddNegativeKeywordsToEntitiesRequest();

	request.setEntityNegativeKeywords(entityNegativeKeywords);

	return CampaignManagementService.getService().addNegativeKeywordsToEntities(request);
}
```
```php
static function AddNegativeKeywordsToEntities(
	$entityNegativeKeywords)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new AddNegativeKeywordsToEntitiesRequest();

	$request->EntityNegativeKeywords = $entityNegativeKeywords;

	return $GLOBALS['CampaignManagementProxy']->GetService()->AddNegativeKeywordsToEntities($request);
}
```
```python
response=campaignmanagement_service.AddNegativeKeywordsToEntities(
	EntityNegativeKeywords=EntityNegativeKeywords)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/EntityNegativeKeywords
```

# [Sandbox URL](#tab/sandbox)

```POST
https://campaign.api.sandbox.bingads.microsoft.com/CampaignManagement/v13/EntityNegativeKeywords
```

-----

## <a name="request"></a>Request Elements
The *AddNegativeKeywordsToEntitiesRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entitynegativekeywords"></a>EntityNegativeKeywords|An array of negative keyword with associated entity such as a campaign or ad group.<br/><br/>The specified negative keywords will be appended to any existing negative keywords if the limit of 20,000 negative keywords per associated campaign or ad group would not be exceeded.<br/><br/>The *EntityType* specified within each *EntityNegativeKeyword* must be set to the same value.<br/><br/>This array can contain a maximum of 1 *EntityNegativeKeyword* element, which contains up to 20,000 negative keywords.|[EntityNegativeKeyword](entitynegativekeyword.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *AddNegativeKeywordsToEntitiesResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="negativekeywordids"></a>NegativeKeywordIds|A list of [IdCollection](idcollection.md) corresponding to the negative keywords that were added for the corresponding entity.<br/><br/>Within an [IdCollection](idcollection.md), the list of *Ids* corresponds directly to the list of negative keywords in the request. Items of the list may be returned as null. For each list index where a negative keyword was not added, the corresponding element will be null.|[IdCollection](idcollection.md) array|
|<a name="nestedpartialerrors"></a>NestedPartialErrors|An array of [BatchErrorCollection](batcherrorcollection.md) objects that contain details for any negative keyword that were not successfully added. The top level error within each [BatchErrorCollection](batcherrorcollection.md) object corresponds to potential campaign or ad group errors. The nested list of [BatchError](batcherror.md) objects would include any errors specific to the negative keywords that you attempted to add to the campaign or ad group.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchErrorCollection](batcherrorcollection.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "EntityNegativeKeywords": [
    {
      "EntityId": "LongValueHere",
      "EntityType": "ValueHere",
      "NegativeKeywords": [
        {
          "Id": "LongValueHere",
          "MatchType": "ValueHere",
          "Text": "ValueHere"
        }
      ]
    }
  ]
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

Below is an example that is applicable if the type of [BatchErrorCollection](batcherrorcollection.md) is [EditorialErrorCollection](editorialerrorcollection.md), [BatchError](batcherror.md) is [EditorialError](editorialerror.md).

```json
{
  "NegativeKeywordIds": [
    {
      "Ids": [
        "LongValueHere"
      ]
    }
  ],
  "NestedPartialErrors": [
    {
      "BatchErrors": [
        {
          "Code": IntValueHere,
          "Details": "ValueHere",
          "ErrorCode": "ValueHere",
          "FieldPath": "ValueHere",
          "ForwardCompatibilityMap": [
            {
              "key": "ValueHere",
              "value": "ValueHere"
            }
          ],
          "Index": IntValueHere,
          "Message": "ValueHere",
          "Type": "EditorialError",
          "Appealable": "ValueHere",
          "DisapprovedText": "ValueHere",
          "Location": "ValueHere",
          "PublisherCountry": "ValueHere",
          "ReasonCode": IntValueHere
        }
      ],
      "Code": IntValueHere,
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "FieldPath": "ValueHere",
      "ForwardCompatibilityMap": [
        {
          "key": "ValueHere",
          "value": "ValueHere"
        }
      ],
      "Index": IntValueHere,
      "Message": "ValueHere",
      "Type": "EditorialErrorCollection",
      "Appealable": "ValueHere",
      "DisapprovedText": "ValueHere",
      "Location": "ValueHere",
      "PublisherCountry": "ValueHere",
      "ReasonCode": IntValueHere
    }
  ]
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<AddNegativeKeywordsToEntitiesResponse> AddNegativeKeywordsToEntitiesAsync(
	IList<EntityNegativeKeyword> entityNegativeKeywords)
{
	var request = new AddNegativeKeywordsToEntitiesRequest
	{
		EntityNegativeKeywords = entityNegativeKeywords
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.AddNegativeKeywordsToEntitiesAsync(r), request));
}
```
```java
static AddNegativeKeywordsToEntitiesResponse addNegativeKeywordsToEntities(
	ArrayOfEntityNegativeKeyword entityNegativeKeywords) throws RemoteException, Exception
{
	AddNegativeKeywordsToEntitiesRequest request = new AddNegativeKeywordsToEntitiesRequest();

	request.setEntityNegativeKeywords(entityNegativeKeywords);

	return CampaignManagementService.getService().addNegativeKeywordsToEntities(request);
}
```
```php
static function AddNegativeKeywordsToEntities(
	$entityNegativeKeywords)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new AddNegativeKeywordsToEntitiesRequest();

	$request->EntityNegativeKeywords = $entityNegativeKeywords;

	return $GLOBALS['CampaignManagementProxy']->GetService()->AddNegativeKeywordsToEntities($request);
}
```
```python
response=campaignmanagement_service.AddNegativeKeywordsToEntities(
	EntityNegativeKeywords=EntityNegativeKeywords)
```

::: zone-end
