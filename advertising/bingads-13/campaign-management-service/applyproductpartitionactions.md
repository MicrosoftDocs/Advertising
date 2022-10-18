---
title: ApplyProductPartitionActions Service Operation - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Applies an add, update, or delete action to each of the specified BiddableAdGroupCriterion or NegativeAdGroupCriterion, which each contain a ProductPartition.
dev_langs: 
  - csharp
  - java
  - php
  - python
---
# ApplyProductPartitionActions Service Operation - Campaign Management
Applies an add, update, or delete action to each of the specified [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md), which each contain a [ProductPartition](productpartition.md).  

> [!TIP]
> For an overview and more information about Microsoft shopping campaigns, see the [Product Ads](../guides/product-ads.md) and [Smart Shopping Campaigns](../guides/smart-shopping-campaigns.md) technical guides. 

Please note the following validation rules. 

- At minimum you must specify at least the root node for the product partition group tree structure. The product partition group's root [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must have its condition *Operand* set to "All" and *Attribute* to *null*. If you are bidding on all products in the catalog equally, set the *PartitionType* to Unit. If you are partitioning the bids based on more specific product conditions, then set the *PartitionType* to Subdivision, the *ParentCriterionId* to *null*, and the *Id* to a negative value. You will use the negative value as *ParentCriterionId* for any child nodes.

- The root node is considered level 0, and a tree can have branches up to 7 levels deep.

- You may specify up to 5,000 [AdGroupCriterionAction](adgroupcriterion.md) objects per call. The entire tree created through multiple calls can have up to 20,000 nodes.

- Each of the [AdGroupCriterionAction](adgroupcriterion.md) objects must have the same *AdGroupId*, otherwise the call will fail.

- To update the *Condition* or *Attribute* properties, you must delete the existing product partition tree node and add a new product partition tree node which will get a new identifier. Likewise to update from a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) to a [NegativeAdGroupCriterion](negativeadgroupcriterion.md) or vice versa, you must delete the existing product partition tree node and add a new product partition tree node which will get a new identifier. 

- If any action fails, all remaining actions that might have otherwise succeeded will also fail.

- All actions in one call must result in a complete tree structure. If you need to apply more than 5,000 actions per ad group, you must make multiple calls. Get the parent ad group criterion identifiers from the first call, and then add more children as needed in subsequent calls.

- Every path from the root node to the end of a branch must terminate with a leaf node (*ProductPartitionType*=Unit). Every Unit must have a bid, unless the node is a [NegativeAdGroupCriterion](negativeadgroupcriterion.md).

- Every subdivision must have at least one leaf node that bids on the remainder of the subdivision's conditions, i.e. use the same operand as its sibling unit(s) and set its *Attribute* to *null*.

- You may only specify a child node after its parent.

- If you are adding partitions with multiple levels where neither the parent or child yet exist, use a negative int value as a reference to identify the parent. For example set the both the parent's *Id*, and the child's *ParentCriterionId* element to the same negative value. The negative IDs are only valid for the duration of the call. Unique system identifiers for each successfully added ad group criterion are returned in the response message.

- The *CriterionBid* and *DestinationUrl* elements of the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) are ignored for *Subdivision* partition nodes. Those elements are only relevant for *Unit* (leaf) partition nodes.

- The *Status* element of the *AdGroupCriterion* is always ignored for product partition criterion. To add, update, or delete a product partition, set the *Action* element of the corresponding [AdGroupCriterionAction](adgroupcriterion.md).

- To pause any product partition you must pause the entire ad group by calling [UpdateAdGroups](updateadgroups.md). You can call [UpdateCampaigns](updatecampaigns.md) to pause the entire campaign.

- The *EditorialStatus* element of the *AdGroupCriterion* has no significant meaning for product partition criterion. Editorial validation for the product catalog is completed in the Microsoft Merchant Center store.

- For a *Delete* action you only need to specify the *Id* and *AdGroupId* in the  *AdGroupCriterion*.

- If you delete a parent product partition, all of its children and descendants will also be deleted.

- You may not specify duplicate product conditions in a branch. 

## <a name="request"></a>Request Elements
The *ApplyProductPartitionActionsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="criterionactions"></a>CriterionActions|A list of up to 5,000 *AdGroupCriterionAction* objects that each contain an *Action* element and either a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md). <br/><br/>All of the ad group criterion actions must be for the same ad group. For more information including validation rules, please see [Create a Microsoft Shopping campaign with the Campaign Management Service](../guides/product-ads.md#bingshopping-campaignservice).|[AdGroupCriterionAction](adgroupcriterionaction.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *ApplyProductPartitionActionsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupcriterionids"></a>AdGroupCriterionIds|A list of identifiers that identify the criterion that had the action applied. The list of identifiers corresponds directly to the list of criterion in the request.<br/><br/>If any criterion action failed, then all remaining criterion actions will fail, and all elements in this list will be null.|**long** array|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.<br/><br/>For criterion which failed due to user error, an actionable error code will be returned.<br/><br/>If any criterion action failed, then all remaining criterion actions will fail, and none of the elements in this list will be null. For criterion that might have otherwise succeeded, a generic error will be returned which explains that a related entity failed.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">ApplyProductPartitionActions</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <ApplyProductPartitionActionsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <CriterionActions i:nil="false">
        <AdGroupCriterionAction>
          <Action>ValueHere</Action>
          <AdGroupCriterion i:nil="false" i:type="-- derived type specified here with the appropriate prefix --">
            <AdGroupId>ValueHere</AdGroupId>
            <Criterion i:nil="false" i:type="-- derived type specified here with the appropriate prefix --">
              <Type i:nil="false">ValueHere</Type>
              <!--These fields are applicable if the derived type attribute is set to ProductPartition-->
              <Condition i:nil="false">
                <Attribute i:nil="false">ValueHere</Attribute>
                <Operand i:nil="false">ValueHere</Operand>
              </Condition>
              <ParentCriterionId i:nil="false">ValueHere</ParentCriterionId>
              <PartitionType>ValueHere</PartitionType>
              <!--This field is applicable if the derived type attribute is set to ProductScope-->
              <Conditions i:nil="false">
                <ProductCondition>
                  <Attribute i:nil="false">ValueHere</Attribute>
                  <Operand i:nil="false">ValueHere</Operand>
                </ProductCondition>
              </Conditions>
              <!--This field is applicable if the derived type attribute is set to Webpage-->
              <Parameter i:nil="false">
                <Conditions i:nil="false">
                  <WebpageCondition>
                    <Argument i:nil="false">ValueHere</Argument>
                    <Operand>ValueHere</Operand>
                    <Operator i:nil="false">ValueHere</Operator>
                  </WebpageCondition>
                </Conditions>
                <CriterionName i:nil="false">ValueHere</CriterionName>
              </Parameter>
              <!--This field is applicable if the derived type attribute is set to AgeCriterion-->
              <AgeRange i:nil="false">ValueHere</AgeRange>
              <!--These fields are applicable if the derived type attribute is set to DeviceCriterion-->
              <DeviceName i:nil="false">ValueHere</DeviceName>
              <OSName i:nil="false">ValueHere</OSName>
              <!--These fields are applicable if the derived type attribute is set to DayTimeCriterion-->
              <Day i:nil="false">ValueHere</Day>
              <FromHour i:nil="false">ValueHere</FromHour>
              <FromMinute i:nil="false">ValueHere</FromMinute>
              <ToHour i:nil="false">ValueHere</ToHour>
              <ToMinute i:nil="false">ValueHere</ToMinute>
              <!--This field is applicable if the derived type attribute is set to GenderCriterion-->
              <GenderType i:nil="false">ValueHere</GenderType>
              <!--These fields are applicable if the derived type attribute is set to RadiusCriterion-->
              <LatitudeDegrees i:nil="false">ValueHere</LatitudeDegrees>
              <LongitudeDegrees i:nil="false">ValueHere</LongitudeDegrees>
              <Name i:nil="false">ValueHere</Name>
              <Radius i:nil="false">ValueHere</Radius>
              <RadiusUnit i:nil="false">ValueHere</RadiusUnit>
              <!--These fields are applicable if the derived type attribute is set to LocationCriterion-->
              <DisplayName i:nil="false">ValueHere</DisplayName>
              <EnclosedLocationIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
                <a1:long>ValueHere</a1:long>
              </EnclosedLocationIds>
              <LocationId i:nil="false">ValueHere</LocationId>
              <LocationType i:nil="false">ValueHere</LocationType>
              <!--This field is applicable if the derived type attribute is set to LocationIntentCriterion-->
              <IntentOption i:nil="false">ValueHere</IntentOption>
              <!--These fields are applicable if the derived type attribute is set to AudienceCriterion-->
              <AudienceId i:nil="false">ValueHere</AudienceId>
              <AudienceType i:nil="false">ValueHere</AudienceType>
              <!--These fields are applicable if the derived type attribute is set to ProfileCriterion-->
              <ProfileId>ValueHere</ProfileId>
              <ProfileType>ValueHere</ProfileType>
              <!--This field is applicable if the derived type attribute is set to StoreCriterion-->
              <StoreId i:nil="false">ValueHere</StoreId>
            </Criterion>
            <Id i:nil="false">ValueHere</Id>
            <Status i:nil="false">ValueHere</Status>
            <Type i:nil="false">ValueHere</Type>
            <!--These fields are applicable if the derived type attribute is set to BiddableAdGroupCriterion-->
            <CriterionBid i:nil="false" i:type="-- derived type specified here with the appropriate prefix --">
              <Type i:nil="false">ValueHere</Type>
              <!--This field is applicable if the derived type attribute is set to FixedBid-->
              <Amount>ValueHere</Amount>
              <!--This field is applicable if the derived type attribute is set to BidMultiplier-->
              <Multiplier>ValueHere</Multiplier>
            </CriterionBid>
            <DestinationUrl i:nil="false">ValueHere</DestinationUrl>
            <EditorialStatus i:nil="false">ValueHere</EditorialStatus>
            <FinalAppUrls i:nil="false">
              <AppUrl>
                <OsType i:nil="false">ValueHere</OsType>
                <Url i:nil="false">ValueHere</Url>
              </AppUrl>
            </FinalAppUrls>
            <FinalMobileUrls i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
              <a1:string>ValueHere</a1:string>
            </FinalMobileUrls>
            <FinalUrlSuffix i:nil="false">ValueHere</FinalUrlSuffix>
            <FinalUrls i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
              <a1:string>ValueHere</a1:string>
            </FinalUrls>
            <TrackingUrlTemplate i:nil="false">ValueHere</TrackingUrlTemplate>
            <UrlCustomParameters i:nil="false">
              <Parameters i:nil="false">
                <CustomParameter>
                  <Key i:nil="false">ValueHere</Key>
                  <Value i:nil="false">ValueHere</Value>
                </CustomParameter>
              </Parameters>
            </UrlCustomParameters>
            <CriterionCashback i:nil="false" i:type="-- derived type specified here with the appropriate prefix --">
              <Type i:nil="false">ValueHere</Type>
              <!--This field is applicable if the derived type attribute is set to CashbackAdjustment-->
              <CashbackPercent i:nil="false">ValueHere</CashbackPercent>
            </CriterionCashback>
            <!--No additional fields are applicable if the derived type attribute is set to NegativeAdGroupCriterion-->
          </AdGroupCriterion>
        </AdGroupCriterionAction>
      </CriterionActions>
    </ApplyProductPartitionActionsRequest>
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
    <ApplyProductPartitionActionsResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <AdGroupCriterionIds d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <a1:long>ValueHere</a1:long>
      </AdGroupCriterionIds>
      <PartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchError d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <FieldPath d4p1:nil="false">ValueHere</FieldPath>
          <ForwardCompatibilityMap xmlns:e55="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e55:KeyValuePairOfstringstring>
              <e55:key d4p1:nil="false">ValueHere</e55:key>
              <e55:value d4p1:nil="false">ValueHere</e55:value>
            </e55:KeyValuePairOfstringstring>
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
    </ApplyProductPartitionActionsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<ApplyProductPartitionActionsResponse> ApplyProductPartitionActionsAsync(
	IList<AdGroupCriterionAction> criterionActions)
{
	var request = new ApplyProductPartitionActionsRequest
	{
		CriterionActions = criterionActions
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.ApplyProductPartitionActionsAsync(r), request));
}
```
```java
static ApplyProductPartitionActionsResponse applyProductPartitionActions(
	ArrayOfAdGroupCriterionAction criterionActions) throws RemoteException, Exception
{
	ApplyProductPartitionActionsRequest request = new ApplyProductPartitionActionsRequest();

	request.setCriterionActions(criterionActions);

	return CampaignManagementService.getService().applyProductPartitionActions(request);
}
```
```php
static function ApplyProductPartitionActions(
	$criterionActions)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new ApplyProductPartitionActionsRequest();

	$request->CriterionActions = $criterionActions;

	return $GLOBALS['CampaignManagementProxy']->GetService()->ApplyProductPartitionActions($request);
}
```
```python
response=campaignmanagement_service.ApplyProductPartitionActions(
	CriterionActions=CriterionActions)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

