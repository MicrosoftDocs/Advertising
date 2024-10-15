---
title: ApplyHotelGroupActions Service Operation Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
zone_pivot_groups: api-reference
description: Applies an add, update, or delete action to each of the specified BiddableAdGroupCriterion or NegativeAdGroupCriterion, which each contain a HotelGroup.(test)
dev_langs: 
- csharp
- java
- php
- python
---
# ApplyHotelGroupActions Service Operation Test - Campaign Management
Applies an add, update, or delete action to each of the specified [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md), which each contain a [HotelGroup](hotelgroup.md).

> [!TIP]
> For an overview and more information about Microsoft Lodging campaigns, see the [Hotel Ads](../guides/hotel-ads.md) guide. 

Please note the following validation rules. 

- At minimum you must specify at least the root node for the hotel listing group group tree structure. The hotel listing group group's root node must have its [Hotel Attribute](../bulk-service/ad-group-hotel-listing-group.md#hotelattribute) field set to "All" and [Hotel Attribute Value](../bulk-service/ad-group-hotel-listing-group.md#hotelattributevalue) null or empty. If you are bidding on all hotels in the catalog equally, set the *Sub Type* field to *Unit*. If you are partitioning the bids based on more specific hotel attributes, then set the *Sub Type* field to *Subdivision*, the *Parent Criterion Id* to null or empty, and the *Id* to a negative value. You will use the negative value as *Parent Criterion Id* for any child nodes.

- The root node is considered level 0, and a tree can have branches up to 7 levels deep.

- Per upload request, you can include a maximum of 20,000 hotel listing group tree nodes per ad group. The entire hotel listing group tree node count for an ad group cannot exceed 20,000.

- The hotel listing group tree nodes for the same tree (same ad group) must be grouped together in the file.

- The order of the hotel listing group nodes is not guaranteed during download, and parent nodes might be provided after child nodes; however, all nodes for the same ad group will be grouped together in the file.

- If you are creating or modifying the tree structure, parent hotel listing group tree nodes must be ordered ahead of the child hotel listing group tree nodes ; however, the order does not matter for non-structural changes such as updating the bid. For example if you want to update the bids without adding, deleting, or updating the tree structure, then you only need to upload the [Id](../bulk-service/ad-group-hotel-listing-group.md#id), [Parent Id](../bulk-service/ad-group-hotel-listing-group.md#parentid), and [Bid](../bulk-service/ad-group-hotel-listing-group.md#bid) fields.

- To update the [Hotel Attribute](../bulk-service/ad-group-hotel-listing-group.md#hotelattribute), [Hotel Attribute Value](../bulk-service/ad-group-hotel-listing-group.md#hotelattributevalue) or *Is Excluded* field, you must delete the existing hotel listing group tree node and upload a new hotel listing group tree node which will get a new identifier.

- If any action fails, all remaining actions that might have otherwise succeeded will also fail.

- All hotel listing group node addition and deletion actions must result in a complete tree structure.

- Every path from the root node to the end of a branch must terminate with a leaf node (*Sub Type*=Unit). Every Unit must have a bid, unless the *Is Excluded* field is *true* which means that the node is a negative ad group criterion.

- Every subdivision must have at least one leaf node that bids on the remainder of the subdivision's conditions, i.e. use the same operand as its sibling unit(s) and set its [Hotel Attribute Value](../bulk-service/ad-group-hotel-listing-group.md#hotelattributevalue) null or empty.

- If you are adding partitions with multiple levels where neither the parent or child yet exist, use a negative int value as a reference to identify the parent. For example set the both the parent's *Id*, and the child's *Parent Criterion Id* field to the same negative value. The negative IDs are only valid for the duration of the call. Unique system identifiers for each successfully added ad group criterion are returned in the upload result file.

- The *Bid* field is only applicable if the *Is Excluded* field is *false* which means that the node is a biddable ad group criterion. However, *Bid* is ignored for *Subdivision* partition nodes. Those elements are only relevant for *Unit* (leaf) partition nodes.

- For a *Deleted* action you only need to specify the *Id* and *Parent Id*.

- If you delete a parent hotel listing group, all of its children and descendants will also be deleted.

- You may not specify duplicate hotel attributes in a branch. 

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *ApplyHotelGroupActionsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="criterionactions"></a>CriterionActions|A list of up to 5,000 *AdGroupCriterionAction* objects that each contain an *Action* element and a [BiddableAdGroupCriterion](biddableadgroupcriterion.md). <br/><br/>All of the ad group criterion actions must be for the same ad group. For more information including validation rules, please see [Create a Microsoft Shopping campaign with the Campaign Management Service](../guides/product-ads.md#bingshopping-campaignservice).|[AdGroupCriterionAction](adgroupcriterionaction.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *ApplyHotelGroupActionsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

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
    <Action mustUnderstand="1">ApplyHotelGroupActions</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <ApplyHotelGroupActionsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
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
                <Operator i:nil="false">ValueHere</Operator>
              </Condition>
              <ParentCriterionId i:nil="false">ValueHere</ParentCriterionId>
              <PartitionType>ValueHere</PartitionType>
              <!--These fields are applicable if the derived type attribute is set to HotelGroup-->
              <Listing i:nil="false">
                <Attribute i:nil="false">ValueHere</Attribute>
                <Operand i:nil="false">ValueHere</Operand>
              </Listing>
              <ListingType>ValueHere</ListingType>
              <ParentCriterionId i:nil="false">ValueHere</ParentCriterionId>
              <!--These fields are applicable if the derived type attribute is set to HotelAdvanceBookingWindowCriterion-->
              <MaxDays i:nil="false">ValueHere</MaxDays>
              <MinDays i:nil="false">ValueHere</MinDays>
              <!--These fields are applicable if the derived type attribute is set to HotelCheckInDateCriterion-->
              <EndDate i:nil="false">ValueHere</EndDate>
              <StartDate i:nil="false">ValueHere</StartDate>
              <!--This field is applicable if the derived type attribute is set to HotelCheckInDayCriterion-->
              <CheckInDay i:nil="false">ValueHere</CheckInDay>
              <!--This field is applicable if the derived type attribute is set to HotelDateSelectionTypeCriterion-->
              <HotelDateSelectionType i:nil="false">ValueHere</HotelDateSelectionType>
              <!--These fields are applicable if the derived type attribute is set to HotelLengthOfStayCriterion-->
              <MaxNights i:nil="false">ValueHere</MaxNights>
              <MinNights i:nil="false">ValueHere</MinNights>
              <!--This field is applicable if the derived type attribute is set to ProductScope-->
              <Conditions i:nil="false">
                <ProductCondition>
                  <Attribute i:nil="false">ValueHere</Attribute>
                  <Operand i:nil="false">ValueHere</Operand>
                  <Operator i:nil="false">ValueHere</Operator>
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
              <!--This field is applicable if the derived type attribute is set to DealCriterion-->
              <DealId>ValueHere</DealId>
              <!--This field is applicable if the derived type attribute is set to GenreCriterion-->
              <GenreId>ValueHere</GenreId>
              <!--These fields are applicable if the derived type attribute is set to PlacementCriterion-->
              <PlacementId>ValueHere</PlacementId>
              <PlacementName i:nil="false">ValueHere</PlacementName>
            </Criterion>
            <Id i:nil="false">ValueHere</Id>
            <Status i:nil="false">ValueHere</Status>
            <Type i:nil="false">ValueHere</Type>
            <!--These fields are applicable if the derived type attribute is set to BiddableAdGroupCriterion-->
            <CriterionBid i:nil="false" i:type="-- derived type specified here with the appropriate prefix --">
              <Type i:nil="false">ValueHere</Type>
              <!--This field is applicable if the derived type attribute is set to RateBid-->
              <RateAmount i:nil="false">
                <Amount i:nil="false">ValueHere</Amount>
              </RateAmount>
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
    </ApplyHotelGroupActionsRequest>
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
    <ApplyHotelGroupActionsResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <AdGroupCriterionIds d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <a1:long>ValueHere</a1:long>
      </AdGroupCriterionIds>
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
    </ApplyHotelGroupActionsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<ApplyHotelGroupActionsResponse> ApplyHotelGroupActionsAsync(
	IList<AdGroupCriterionAction> criterionActions)
{
	var request = new ApplyHotelGroupActionsRequest
	{
		CriterionActions = criterionActions
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.ApplyHotelGroupActionsAsync(r), request));
}
```
```java
static ApplyHotelGroupActionsResponse applyHotelGroupActions(
	ArrayOfAdGroupCriterionAction criterionActions) throws RemoteException, Exception
{
	ApplyHotelGroupActionsRequest request = new ApplyHotelGroupActionsRequest();

	request.setCriterionActions(criterionActions);

	return CampaignManagementService.getService().applyHotelGroupActions(request);
}
```
```php
static function ApplyHotelGroupActions(
	$criterionActions)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new ApplyHotelGroupActionsRequest();

	$request->CriterionActions = $criterionActions;

	return $GLOBALS['CampaignManagementProxy']->GetService()->ApplyHotelGroupActions($request);
}
```
```python
response=campaignmanagement_service.ApplyHotelGroupActions(
	CriterionActions=CriterionActions)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/HotelGroupActions/Apply
```

# [Sandbox URL](#tab/sandbox)

```POST
https://campaign.api.sandbox.bingads.microsoft.com/CampaignManagement/v13/HotelGroupActions/Apply
```

-----

## <a name="request"></a>Request Elements
The *ApplyHotelGroupActionsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="criterionactions"></a>CriterionActions|A list of up to 5,000 *AdGroupCriterionAction* objects that each contain an *Action* element and a [BiddableAdGroupCriterion](biddableadgroupcriterion.md). <br/><br/>All of the ad group criterion actions must be for the same ad group. For more information including validation rules, please see [Create a Microsoft Shopping campaign with the Campaign Management Service](../guides/product-ads.md#bingshopping-campaignservice).|[AdGroupCriterionAction](adgroupcriterionaction.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *ApplyHotelGroupActionsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupcriterionids"></a>AdGroupCriterionIds|A list of identifiers that identify the criterion that had the action applied. The list of identifiers corresponds directly to the list of criterion in the request.<br/><br/>If any criterion action failed, then all remaining criterion actions will fail, and all elements in this list will be null.|**long** array|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.<br/><br/>For criterion which failed due to user error, an actionable error code will be returned.<br/><br/>If any criterion action failed, then all remaining criterion actions will fail, and none of the elements in this list will be null. For criterion that might have otherwise succeeded, a generic error will be returned which explains that a related entity failed.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

Below is an example that is applicable if the type of [AdGroupCriterion](adgroupcriterion.md) is [BiddableAdGroupCriterion](biddableadgroupcriterion.md), [Criterion](criterion.md) is [AgeCriterion](agecriterion.md), [CriterionBid](criterionbid.md) is [BidMultiplier](bidmultiplier.md), [CriterionCashback](criterioncashback.md) is [CashbackAdjustment](cashbackadjustment.md).

```json
{
  "CriterionActions": [
    {
      "Action": "ValueHere",
      "AdGroupCriterion": {
        "AdGroupId": "LongValueHere",
        "Criterion": {
          "Type": "AgeCriterion",
          "AgeRange": "ValueHere"
        },
        "Id": "LongValueHere",
        "Status": "ValueHere",
        "Type": "BiddableAdGroupCriterion",
        "CriterionBid": {
          "Type": "BidMultiplier",
          "Multiplier": DoubleValueHere
        },
        "CriterionCashback": {
          "Type": "CashbackAdjustment",
          "CashbackPercent": DoubleValueHere
        },
        "DestinationUrl": "ValueHere",
        "EditorialStatus": "ValueHere",
        "FinalAppUrls": [
          {
            "OsType": "ValueHere",
            "Url": "ValueHere"
          }
        ],
        "FinalMobileUrls": [
          "ValueHere"
        ],
        "FinalUrls": [
          "ValueHere"
        ],
        "FinalUrlSuffix": "ValueHere",
        "TrackingUrlTemplate": "ValueHere",
        "UrlCustomParameters": {
          "Parameters": [
            {
              "Key": "ValueHere",
              "Value": "ValueHere"
            }
          ]
        }
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
  "AdGroupCriterionIds": [
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
public async Task<ApplyHotelGroupActionsResponse> ApplyHotelGroupActionsAsync(
	IList<AdGroupCriterionAction> criterionActions)
{
	var request = new ApplyHotelGroupActionsRequest
	{
		CriterionActions = criterionActions
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.ApplyHotelGroupActionsAsync(r), request));
}
```
```java
static ApplyHotelGroupActionsResponse applyHotelGroupActions(
	ArrayOfAdGroupCriterionAction criterionActions) throws RemoteException, Exception
{
	ApplyHotelGroupActionsRequest request = new ApplyHotelGroupActionsRequest();

	request.setCriterionActions(criterionActions);

	return CampaignManagementService.getService().applyHotelGroupActions(request);
}
```
```php
static function ApplyHotelGroupActions(
	$criterionActions)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new ApplyHotelGroupActionsRequest();

	$request->CriterionActions = $criterionActions;

	return $GLOBALS['CampaignManagementProxy']->GetService()->ApplyHotelGroupActions($request);
}
```
```python
response=campaignmanagement_service.ApplyHotelGroupActions(
	CriterionActions=CriterionActions)
```

::: zone-end
