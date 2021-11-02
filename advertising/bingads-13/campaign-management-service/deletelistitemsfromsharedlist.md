---
title: DeleteListItemsFromSharedList Service Operation - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Deletes negative keywords from a negative keyword list, or negative sites from a website exclusion list.
dev_langs: 
  - csharp
  - java
  - php
  - python
---
# DeleteListItemsFromSharedList Service Operation - Campaign Management
Deletes negative keywords from a negative keyword list, or negative sites from a website exclusion list.

The operation is only used for negative keywords and negative sites via shared lists. To remove negative keywords that are assigned directly to campaigns or ad groups, see [DeleteNegativeKeywordsFromEntities](deletenegativekeywordsfromentities.md). To set or replace negative sites that are assigned directly to campaigns or ad groups, see [SetNegativeSitesToCampaigns](setnegativesitestocampaigns.md) and [SetNegativeSitesToAdGroups](setnegativesitestoadgroups.md). 

> [!TIP] 
> For an overview, see the [Negative Keywords](../guides/negative-keywords.md) and [Negative Sites](../guides/negative-sites.md) technical guides. 

> [!IMPORTANT]
> Only the users of the manager account (customer) that owns a website exclusion list ([PlacementExclusionList](placementexclusionlist.md)) can update or delete the list, add or delete list items, and associate the list with ad accounts. If your ad account is associated with a website exclusion list that you do not own, you can disassociate the list from your account, but the list and list items are read-only. The owner of the list is determined by the association's [SharedEntityCustomerId](sharedentityassociation.md#sharedentitycustomerid) element.
> 
> If you have access to multiple manager accounts in an account hierarchy, the operation's results can vary depending on the CustomerId [request header](#request-header) element that you set. 

## <a name="request"></a>Request Elements
The *DeleteListItemsFromSharedListRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="listitemids"></a>ListItemIds|The list of identifiers of negative keywords to delete from the negative keyword list, or the negative sites to delete from the website exclusion list.<br/><br/>The list can contain a maximum of 5,000 items per service call.|**long** array|
|<a name="sharedentityscope"></a>SharedEntityScope|Indicates whether the shared entity is available at the ad account ([Account](entityscope.md#account)) or manager account ([Customer](entityscope.md#customer)) level.<br/><br/>This element is optional and defaults to [Account](entityscope.md#account) scope. The ad account scope is only applicable for negative keyword lists.<br/><br/>Set this element to [Customer](entityscope.md#customer) to delete negative sites from a website exclusion list in your manager account (customer) shared library.|[EntityScope](entityscope.md)|
|<a name="sharedlist"></a>SharedList|The negative keyword list or website exclusion list.<br/><br/>If the [SharedEntityScope](#sharedentityscope) is either empty or set to [Account](entityscope.md#account), and if the [SharedList](#sharedlist) is a [NegativeKeywordList](negativekeywordlist.md), then the [ListItemIds](#listitemids) must identify negative keyword ([NegativeKeyword](negativekeyword.md)) objects.<br/><br/>If the [SharedEntityScope](#sharedentityscope) is set to [Customer](entityscope.md#customer), and if the [SharedList](#sharedlist) is a [PlacementExclusionList](placementexclusionlist.md), then the [ListItemIds](#listitemids) must identify negative site ([NegativeSite](negativesite.md)) objects.|[SharedList](sharedlist.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *DeleteListItemsFromSharedListResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

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
    <Action mustUnderstand="1">DeleteListItemsFromSharedList</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <DeleteListItemsFromSharedListRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <ListItemIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
        <a1:long>ValueHere</a1:long>
      </ListItemIds>
      <SharedList i:nil="false" i:type="-- derived type specified here with the appropriate prefix --">
        <ItemCount i:nil="false">ValueHere</ItemCount>
        <!--No additional fields are applicable if the derived type attribute is set to NegativeKeywordList-->
        <!--No additional fields are applicable if the derived type attribute is set to PlacementExclusionList-->
      </SharedList>
      <SharedEntityScope i:nil="false">ValueHere</SharedEntityScope>
    </DeleteListItemsFromSharedListRequest>
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
    <DeleteListItemsFromSharedListResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <PartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchError d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <FieldPath d4p1:nil="false">ValueHere</FieldPath>
          <ForwardCompatibilityMap xmlns:e70="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e70:KeyValuePairOfstringstring>
              <e70:key d4p1:nil="false">ValueHere</e70:key>
              <e70:value d4p1:nil="false">ValueHere</e70:value>
            </e70:KeyValuePairOfstringstring>
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
    </DeleteListItemsFromSharedListResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<DeleteListItemsFromSharedListResponse> DeleteListItemsFromSharedListAsync(
	IList<long> listItemIds,
	SharedList sharedList,
	EntityScope? sharedEntityScope)
{
	var request = new DeleteListItemsFromSharedListRequest
	{
		ListItemIds = listItemIds,
		SharedList = sharedList,
		SharedEntityScope = sharedEntityScope
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.DeleteListItemsFromSharedListAsync(r), request));
}
```
```java
static DeleteListItemsFromSharedListResponse deleteListItemsFromSharedList(
	ArrayOflong listItemIds,
	SharedList sharedList,
	EntityScope sharedEntityScope) throws RemoteException, Exception
{
	DeleteListItemsFromSharedListRequest request = new DeleteListItemsFromSharedListRequest();

	request.setListItemIds(listItemIds);
	request.setSharedList(sharedList);
	request.setSharedEntityScope(sharedEntityScope);

	return CampaignManagementService.getService().deleteListItemsFromSharedList(request);
}
```
```php
static function DeleteListItemsFromSharedList(
	$listItemIds,
	$sharedList,
	$sharedEntityScope)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new DeleteListItemsFromSharedListRequest();

	$request->ListItemIds = $listItemIds;
	$request->SharedList = $sharedList;
	$request->SharedEntityScope = $sharedEntityScope;

	return $GLOBALS['CampaignManagementProxy']->GetService()->DeleteListItemsFromSharedList($request);
}
```
```python
response=campaignmanagement_service.DeleteListItemsFromSharedList(
	ListItemIds=ListItemIds,
	SharedList=SharedList,
	SharedEntityScope=SharedEntityScope)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

