---
title: ApplyAssetGroupListingGroupActions Service Operation - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Applies an action to an asset group listing group.
dev_langs: 
- csharp
- java
- php
- python
---
# ApplyAssetGroupListingGroupActions Service Operation - Campaign Management
Applies an action to an asset group listing group.

Please note the following validation rules:

- At minimum you must specify at least the root node for the listing group tree structure. The listing group's root [AssetGroupListingGroup](./assetgrouplistinggroup.md) must have its condition *Operand* set to "All" and *Attribute* to *null*. If you are serving ads for all products in the catalog, set the *PartitionType* to "Unit". If you are serving ads on more specific product conditions, then set the YPartitionTypeY to "Subdivision", the *ParentCriterionId* to *null*, and the *Id* to a negative value. You will use the negative value as *ParentCriterionId* for any child nodes.

- The root node is considered level 0, and a tree can have branches up to 7 levels deep.

- You may specify up to 5,000 [AssetGroupListingGroupAction](./assetgrouplistinggroupaction.md) objects per call. The entire tree created through multiple calls can have up to 20,000 nodes.

- Each of the [AssetGroupListingGroup](./assetgrouplistinggroup.md) objects must have the same *AssetGroupId*, otherwise the call will fail.

- To update the *Condition* or *Attribute* properties, you must delete the existing product partition tree node and add a new product partition tree node which will get a new identifier. To update from a non-excluded to an excluded [AssetGroupListingGroup](./assetgrouplistinggroup.md) or the other way around, you must delete the existing product partition tree node and add a new product partition tree node which will get a new identifier.

- If any action fails, all remaining actions that might have otherwise succeeded will also fail.

- All actions in one call must result in a complete tree structure. If you need to apply more than 5,000 actions per asset group, you must make multiple calls. Get the parent asset group identifiers from the first call, and then add more children as needed in subsequent calls.

- Every path from the root node to the end of a branch must terminate with a leaf node (*ProductPartitionType*=Unit).

- Every subdivision must have at least one leaf node for the remainder of the subdivision's conditions. For example, use the same operand as its sibling unit(s) and set its *Attribute* to null.

- You may only specify a child node after its parent.

- If you are adding partitions with multiple levels where neither the parent or child yet exist, use a negative int value as a reference to identify the parent. For example set the both the parent's *Id*, and the child's *ParentListingGroupId* element to the same negative value. The negative IDs are only valid for the duration of the call. Unique system identifiers for each successfully added asset group listing group are returned in the response message.

- To pause any product partition you must pause the entire asset group by calling [UpdateAssetGroups](./updateassetgroups.md). You can call *UpdateCampaigns* to pause the entire campaign.

- For a *Delete* action you only need to specify the *Id* and *AssetGroupId* in the [AssetGroupListingGroup](./assetgrouplistinggroup.md).

- If you delete a parent product partition, all of its children and descendants will also be deleted.

- You may not specify duplicate product conditions in a branch. 

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *ApplyAssetGroupListingGroupActionsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="listinggroupactions"></a>ListingGroupActions|A list of *AssetGroupListingGroupAction* objects that each contain an *Action* element and a *ListingGroup* element. All of the asset group listing group actions must be for the same asset group.<br/><br/>You can pass 5,000 *AssetGroupListingGroupAction* per call and apply a maximum of 20,000 listing groups to each asset group.|[AssetGroupListingGroupAction](assetgrouplistinggroupaction.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *ApplyAssetGroupListingGroupActionsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="assetgrouplistinggroupids"></a>AssetGroupListingGroupIds|A list of IDs that for the listing groups that had the action applied. The list of IDs corresponds directly to the list of listing groups in the request.<br /><br />If any listing group action failed, then all remaining listing group actions will fail and all elements in this list will be null.|**long** array|
|<a name="partialerrors"></a>PartialErrors|An array of *BatchError* objects that contain details for any request items that weren't successful.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">ApplyAssetGroupListingGroupActions</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <ApplyAssetGroupListingGroupActionsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <ListingGroupActions i:nil="false">
        <AssetGroupListingGroupAction>
          <Action>ValueHere</Action>
          <ListingGroup i:nil="false">
            <AssetGroupId>ValueHere</AssetGroupId>
            <AssetGroupListingType>ValueHere</AssetGroupListingType>
            <Dimension i:nil="false">
              <Attribute i:nil="false">ValueHere</Attribute>
              <Operand i:nil="false">ValueHere</Operand>
              <Operator i:nil="false">ValueHere</Operator>
            </Dimension>
            <Id i:nil="false">ValueHere</Id>
            <IsExcluded>ValueHere</IsExcluded>
            <ListingGroupPath i:nil="false">ValueHere</ListingGroupPath>
            <ParentListingGroupId i:nil="false">ValueHere</ParentListingGroupId>
          </ListingGroup>
        </AssetGroupListingGroupAction>
      </ListingGroupActions>
    </ApplyAssetGroupListingGroupActionsRequest>
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
    <ApplyAssetGroupListingGroupActionsResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <AssetGroupListingGroupIds d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <a1:long>ValueHere</a1:long>
      </AssetGroupListingGroupIds>
      <PartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchError d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <FieldPath d4p1:nil="false">ValueHere</FieldPath>
          <ForwardCompatibilityMap xmlns:e137="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e137:KeyValuePairOfstringstring>
              <e137:key d4p1:nil="false">ValueHere</e137:key>
              <e137:value d4p1:nil="false">ValueHere</e137:value>
            </e137:KeyValuePairOfstringstring>
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
    </ApplyAssetGroupListingGroupActionsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<ApplyAssetGroupListingGroupActionsResponse> ApplyAssetGroupListingGroupActionsAsync(
	IList<AssetGroupListingGroupAction> listingGroupActions)
{
	var request = new ApplyAssetGroupListingGroupActionsRequest
	{
		ListingGroupActions = listingGroupActions
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.ApplyAssetGroupListingGroupActionsAsync(r), request));
}
```
```java
static ApplyAssetGroupListingGroupActionsResponse applyAssetGroupListingGroupActions(
	ArrayOfAssetGroupListingGroupAction listingGroupActions) throws RemoteException, Exception
{
	ApplyAssetGroupListingGroupActionsRequest request = new ApplyAssetGroupListingGroupActionsRequest();

	request.setListingGroupActions(listingGroupActions);

	return CampaignManagementService.getService().applyAssetGroupListingGroupActions(request);
}
```
```php
static function ApplyAssetGroupListingGroupActions(
	$listingGroupActions)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new ApplyAssetGroupListingGroupActionsRequest();

	$request->ListingGroupActions = $listingGroupActions;

	return $GLOBALS['CampaignManagementProxy']->GetService()->ApplyAssetGroupListingGroupActions($request);
}
```
```python
response=campaignmanagement_service.ApplyAssetGroupListingGroupActions(
	ListingGroupActions=ListingGroupActions)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/AssetGroupListingGroupActions/Apply
```

# [Sandbox URL](#tab/sandbox)

```POST
https://campaign.api.sandbox.bingads.microsoft.com/CampaignManagement/v13/AssetGroupListingGroupActions/Apply
```

-----

## <a name="request"></a>Request Elements
The *ApplyAssetGroupListingGroupActionsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="listinggroupactions"></a>ListingGroupActions|A list of *AssetGroupListingGroupAction* objects that each contain an *Action* element and a *ListingGroup* element. All of the asset group listing group actions must be for the same asset group.<br/><br/>You can pass 5,000 *AssetGroupListingGroupAction* per call and apply a maximum of 20,000 listing groups to each asset group.|[AssetGroupListingGroupAction](assetgrouplistinggroupaction.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *ApplyAssetGroupListingGroupActionsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="assetgrouplistinggroupids"></a>AssetGroupListingGroupIds|A list of IDs that for the listing groups that had the action applied. The list of IDs corresponds directly to the list of listing groups in the request.<br /><br />If any listing group action failed, then all remaining listing group actions will fail and all elements in this list will be null.|**long** array|
|<a name="partialerrors"></a>PartialErrors|An array of *BatchError* objects that contain details for any request items that weren't successful.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "ListingGroupActions": [
    {
      "Action": "ValueHere",
      "ListingGroup": {
        "AssetGroupId": "LongValueHere",
        "AssetGroupListingType": "ValueHere",
        "Dimension": {
          "Attribute": "ValueHere",
          "Operand": "ValueHere",
          "Operator": "ValueHere"
        },
        "Id": "LongValueHere",
        "IsExcluded": "ValueHere",
        "ListingGroupPath": "ValueHere",
        "ParentListingGroupId": "LongValueHere"
      }
    }
  ]
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

Below is an example that is applicable if the type of [BatchError](batcherror.md) is [EditorialError](editorialerror.md).

```json
{
  "AssetGroupListingGroupIds": [
    "LongValueHere"
  ],
  "PartialErrors": [
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
  ]
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<ApplyAssetGroupListingGroupActionsResponse> ApplyAssetGroupListingGroupActionsAsync(
	IList<AssetGroupListingGroupAction> listingGroupActions)
{
	var request = new ApplyAssetGroupListingGroupActionsRequest
	{
		ListingGroupActions = listingGroupActions
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.ApplyAssetGroupListingGroupActionsAsync(r), request));
}
```
```java
static ApplyAssetGroupListingGroupActionsResponse applyAssetGroupListingGroupActions(
	ArrayOfAssetGroupListingGroupAction listingGroupActions) throws RemoteException, Exception
{
	ApplyAssetGroupListingGroupActionsRequest request = new ApplyAssetGroupListingGroupActionsRequest();

	request.setListingGroupActions(listingGroupActions);

	return CampaignManagementService.getService().applyAssetGroupListingGroupActions(request);
}
```
```php
static function ApplyAssetGroupListingGroupActions(
	$listingGroupActions)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new ApplyAssetGroupListingGroupActionsRequest();

	$request->ListingGroupActions = $listingGroupActions;

	return $GLOBALS['CampaignManagementProxy']->GetService()->ApplyAssetGroupListingGroupActions($request);
}
```
```python
response=campaignmanagement_service.ApplyAssetGroupListingGroupActions(
	ListingGroupActions=ListingGroupActions)
```

::: zone-end
