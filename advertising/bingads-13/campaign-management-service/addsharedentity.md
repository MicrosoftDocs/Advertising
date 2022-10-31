---
title: AddSharedEntity Service Operation - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Adds a negative keyword list to the ad account library, or adds a website exclusion list to the manager account (customer) library.
dev_langs: 
  - csharp
  - java
  - php
  - python
ms.subservice: campaign-management-api
---
# AddSharedEntity Service Operation - Campaign Management
Adds a negative keyword list to the ad account library, or adds a website exclusion list to the manager account (customer) library. 

> [!TIP] 
> For an overview, see the [Negative Keywords](../guides/negative-keywords.md) and [Negative Sites](../guides/negative-sites.md) technical guides. 

> [!IMPORTANT]
> Only the users of the manager account (customer) that owns a website exclusion list ([PlacementExclusionList](placementexclusionlist.md)) can update or delete the list, add or delete list items, and associate the list with ad accounts. If your ad account is associated with a website exclusion list that you do not own, you can disassociate the list from your account, but the list and list items are read-only. The owner of the list is determined by the association's [SharedEntityCustomerId](sharedentityassociation.md#sharedentitycustomerid) element.
> 
> If you have access to multiple manager accounts in an account hierarchy, the operation's results can vary depending on the CustomerId [request header](#request-header) element that you set. 

## <a name="request"></a>Request Elements
The *AddSharedEntityRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="listitems"></a>ListItems|The negative keywords (5,000 total maximum) to include with the new negative keyword list, or negative sites (10,000 total maximum) to include with the new website exclusion list.<br/><br/>The list can contain a maximum of 5,000 items per service call. To add more list items, call the [AddListItemsToSharedList](addlistitemstosharedlist.md) operation.|[SharedListItem](sharedlistitem.md) array|
|<a name="sharedentity"></a>SharedEntity|The negative keyword list or website exclusion list.<br/><br/>If the [SharedEntityScope](#sharedentityscope) is either empty or set to [Account](entityscope.md#account), and if the [SharedEntity](#sharedentity) is a [NegativeKeywordList](negativekeywordlist.md), then the [ListItems](#listitems) must be negative keyword ([NegativeKeyword](negativekeyword.md)) objects.<br/><br/>If the [SharedEntityScope](#sharedentityscope) is set to [Customer](entityscope.md#customer), and if the [SharedEntity](#sharedentity) is a [PlacementExclusionList](placementexclusionlist.md), then the [ListItems](#listitems) must be negative site ([NegativeSite](negativesite.md)) objects.|[SharedEntity](sharedentity.md)|
|<a name="sharedentityscope"></a>SharedEntityScope|Indicates whether the shared entity is available at the ad account ([Account](entityscope.md#account)) or manager account ([Customer](entityscope.md#customer)) level.<br/><br/>This element is optional and defaults to [Account](entityscope.md#account) scope. The ad account scope is only applicable for negative keyword lists.<br/><br/>Set this element to [Customer](entityscope.md#customer) to add a website exclusion list in your manager account (customer) shared library.|[EntityScope](entityscope.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *AddSharedEntityResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="listitemids"></a>ListItemIds|A list of *long* values that represents the identifiers for the list items that were added.<br/><br/>Items of the list may be returned as null. For each list index where a list item was not added, the corresponding element will be null.|**long** array|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|
|<a name="sharedentityid"></a>SharedEntityId|The identifier for the shared entity that was added.|**long**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">AddSharedEntity</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <AddSharedEntityRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <SharedEntity i:nil="false" i:type="-- derived type specified here with the appropriate prefix --">
        <AssociationCount i:nil="false">ValueHere</AssociationCount>
        <ForwardCompatibilityMap xmlns:e47="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e47:KeyValuePairOfstringstring>
            <e47:key i:nil="false">ValueHere</e47:key>
            <e47:value i:nil="false">ValueHere</e47:value>
          </e47:KeyValuePairOfstringstring>
        </ForwardCompatibilityMap>
        <Id i:nil="false">ValueHere</Id>
        <Name i:nil="false">ValueHere</Name>
        <Type i:nil="false">ValueHere</Type>
        <!--This field is applicable if the derived type attribute is set to SharedList-->
        <ItemCount i:nil="false">ValueHere</ItemCount>
      </SharedEntity>
      <ListItems i:nil="false">
        <SharedListItem i:type="-- derived type specified here with the appropriate prefix --">
          <ForwardCompatibilityMap xmlns:e48="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e48:KeyValuePairOfstringstring>
              <e48:key i:nil="false">ValueHere</e48:key>
              <e48:value i:nil="false">ValueHere</e48:value>
            </e48:KeyValuePairOfstringstring>
          </ForwardCompatibilityMap>
          <Type i:nil="false">ValueHere</Type>
          <!--These fields are applicable if the derived type attribute is set to NegativeKeyword-->
          <Id i:nil="false">ValueHere</Id>
          <MatchType i:nil="false">ValueHere</MatchType>
          <Text i:nil="false">ValueHere</Text>
          <!--These fields are applicable if the derived type attribute is set to NegativeSite-->
          <Id i:nil="false">ValueHere</Id>
          <Url i:nil="false">ValueHere</Url>
        </SharedListItem>
      </ListItems>
      <SharedEntityScope i:nil="false">ValueHere</SharedEntityScope>
    </AddSharedEntityRequest>
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
    <AddSharedEntityResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <ListItemIds d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <a1:long>ValueHere</a1:long>
      </ListItemIds>
      <PartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchError d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <FieldPath d4p1:nil="false">ValueHere</FieldPath>
          <ForwardCompatibilityMap xmlns:e49="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e49:KeyValuePairOfstringstring>
              <e49:key d4p1:nil="false">ValueHere</e49:key>
              <e49:value d4p1:nil="false">ValueHere</e49:value>
            </e49:KeyValuePairOfstringstring>
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
      <SharedEntityId>ValueHere</SharedEntityId>
    </AddSharedEntityResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<AddSharedEntityResponse> AddSharedEntityAsync(
	SharedEntity sharedEntity,
	IList<SharedListItem> listItems,
	EntityScope? sharedEntityScope)
{
	var request = new AddSharedEntityRequest
	{
		SharedEntity = sharedEntity,
		ListItems = listItems,
		SharedEntityScope = sharedEntityScope
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.AddSharedEntityAsync(r), request));
}
```
```java
static AddSharedEntityResponse addSharedEntity(
	SharedEntity sharedEntity,
	ArrayOfSharedListItem listItems,
	EntityScope sharedEntityScope) throws RemoteException, Exception
{
	AddSharedEntityRequest request = new AddSharedEntityRequest();

	request.setSharedEntity(sharedEntity);
	request.setListItems(listItems);
	request.setSharedEntityScope(sharedEntityScope);

	return CampaignManagementService.getService().addSharedEntity(request);
}
```
```php
static function AddSharedEntity(
	$sharedEntity,
	$listItems,
	$sharedEntityScope)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new AddSharedEntityRequest();

	$request->SharedEntity = $sharedEntity;
	$request->ListItems = $listItems;
	$request->SharedEntityScope = $sharedEntityScope;

	return $GLOBALS['CampaignManagementProxy']->GetService()->AddSharedEntity($request);
}
```
```python
response=campaignmanagement_service.AddSharedEntity(
	SharedEntity=SharedEntity,
	ListItems=ListItems,
	SharedEntityScope=SharedEntityScope)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

