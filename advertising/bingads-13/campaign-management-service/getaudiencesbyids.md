---
title: GetAudiencesByIds Service Operation - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Retrieves the specified audiences from the specified account.
dev_langs: 
- csharp
- java
- php
- python
---
# GetAudiencesByIds Service Operation - Campaign Management
Retrieves the specified audiences from the specified account.

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetAudiencesByIdsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audienceids"></a>AudienceIds|A maximum of 100 identifiers of the requested audiences.<br/><br/>This request element is optional. If this element is null or empty, then you are effectively requesting all customer and account scoped audiences for the specified account.<br/><br/>If the audience identifiers do not match the requested audience types, then the operation will return a batch error for each requested audience ID.|**long** array|
|<a name="returnadditionalfields"></a>ReturnAdditionalFields|The additional field values enable you to get the latest features using the current version of Campaign Management API, and in the next version the corresponding elements will be included by default.<br/><br/>This request element is optional.|[AudienceAdditionalField](audienceadditionalfield.md)|
|<a name="type"></a>Type|The type of audiences to return.<br/><br/>You may include multiple values as flags. How you specify multiple flags depends on the programming language that you use. For example, C# treats these values as flag values and Java treats them as an array of strings. The SOAP should include a string that contains a space-delimited list of values for example, `<Type>RemarketingList SimilarRemarketingList</Type>`.|[AudienceType](audiencetype.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetAudiencesByIdsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiences"></a>Audiences|The list of audiences that corresponds directly to the audience identifiers that you specified in the request. Items of the list may be returned as null. For each list index where an audience was not retrieved, the corresponding element will be null.|[Audience](audience.md) array|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">GetAudiencesByIds</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetAudiencesByIdsRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <AudienceIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
        <a1:long>ValueHere</a1:long>
      </AudienceIds>
      <Type>ValueHere</Type>
      <ReturnAdditionalFields i:nil="false">ValueHere</ReturnAdditionalFields>
    </GetAudiencesByIdsRequest>
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
    <GetAudiencesByIdsResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <Audiences d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <Audience d4p1:type="-- derived type specified here with the appropriate prefix --">
          <AudienceNetworkSize d4p1:nil="false">ValueHere</AudienceNetworkSize>
          <CustomerShare d4p1:nil="false">
            <CustomerAccountShares d4p1:nil="false">
              <CustomerAccountShare>
                <AccountId d4p1:nil="false">ValueHere</AccountId>
                <Associations d4p1:nil="false">
                  <CustomerAccountShareAssociation>
                    <AssociationCount d4p1:nil="false">ValueHere</AssociationCount>
                    <UsageType d4p1:nil="false">ValueHere</UsageType>
                  </CustomerAccountShareAssociation>
                </Associations>
                <CustomerId d4p1:nil="false">ValueHere</CustomerId>
              </CustomerAccountShare>
            </CustomerAccountShares>
            <OwnerCustomerId d4p1:nil="false">ValueHere</OwnerCustomerId>
          </CustomerShare>
          <Description d4p1:nil="false">ValueHere</Description>
          <ForwardCompatibilityMap xmlns:e275="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e275:KeyValuePairOfstringstring>
              <e275:key d4p1:nil="false">ValueHere</e275:key>
              <e275:value d4p1:nil="false">ValueHere</e275:value>
            </e275:KeyValuePairOfstringstring>
          </ForwardCompatibilityMap>
          <Id d4p1:nil="false">ValueHere</Id>
          <MembershipDuration d4p1:nil="false">ValueHere</MembershipDuration>
          <Name d4p1:nil="false">ValueHere</Name>
          <ParentId d4p1:nil="false">ValueHere</ParentId>
          <Scope d4p1:nil="false">ValueHere</Scope>
          <SearchSize d4p1:nil="false">ValueHere</SearchSize>
          <SupportedCampaignTypes d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </SupportedCampaignTypes>
          <Type>ValueHere</Type>
          <!--These fields are applicable if the derived type attribute is set to RemarketingList-->
          <Rule d4p1:nil="false" d4p1:type="-- derived type specified here with the appropriate prefix --">
            <Type d4p1:nil="false">ValueHere</Type>
            <!--These fields are applicable if the derived type attribute is set to PageVisitorsRule-->
            <NormalForm d4p1:nil="false">ValueHere</NormalForm>
            <RuleItemGroups d4p1:nil="false">
              <RuleItemGroup>
                <Items d4p1:nil="false">
                  <RuleItem d4p1:type="-- derived type specified here with the appropriate prefix --">
                    <Type d4p1:nil="false">ValueHere</Type>
                    <!--These fields are applicable if the derived type attribute is set to StringRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                    <!--These fields are applicable if the derived type attribute is set to NumberRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                  </RuleItem>
                </Items>
              </RuleItemGroup>
            </RuleItemGroups>
            <!--These fields are applicable if the derived type attribute is set to PageVisitorsWhoVisitedAnotherPageRule-->
            <AnotherRuleItemGroups d4p1:nil="false">
              <RuleItemGroup>
                <Items d4p1:nil="false">
                  <RuleItem d4p1:type="-- derived type specified here with the appropriate prefix --">
                    <Type d4p1:nil="false">ValueHere</Type>
                    <!--These fields are applicable if the derived type attribute is set to StringRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                    <!--These fields are applicable if the derived type attribute is set to NumberRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                  </RuleItem>
                </Items>
              </RuleItemGroup>
            </AnotherRuleItemGroups>
            <RuleItemGroups d4p1:nil="false">
              <RuleItemGroup>
                <Items d4p1:nil="false">
                  <RuleItem d4p1:type="-- derived type specified here with the appropriate prefix --">
                    <Type d4p1:nil="false">ValueHere</Type>
                    <!--These fields are applicable if the derived type attribute is set to StringRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                    <!--These fields are applicable if the derived type attribute is set to NumberRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                  </RuleItem>
                </Items>
              </RuleItemGroup>
            </RuleItemGroups>
            <!--These fields are applicable if the derived type attribute is set to PageVisitorsWhoDidNotVisitAnotherPageRule-->
            <ExcludeRuleItemGroups d4p1:nil="false">
              <RuleItemGroup>
                <Items d4p1:nil="false">
                  <RuleItem d4p1:type="-- derived type specified here with the appropriate prefix --">
                    <Type d4p1:nil="false">ValueHere</Type>
                    <!--These fields are applicable if the derived type attribute is set to StringRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                    <!--These fields are applicable if the derived type attribute is set to NumberRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                  </RuleItem>
                </Items>
              </RuleItemGroup>
            </ExcludeRuleItemGroups>
            <IncludeRuleItemGroups d4p1:nil="false">
              <RuleItemGroup>
                <Items d4p1:nil="false">
                  <RuleItem d4p1:type="-- derived type specified here with the appropriate prefix --">
                    <Type d4p1:nil="false">ValueHere</Type>
                    <!--These fields are applicable if the derived type attribute is set to StringRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                    <!--These fields are applicable if the derived type attribute is set to NumberRuleItem-->
                    <Operand d4p1:nil="false">ValueHere</Operand>
                    <Operator>ValueHere</Operator>
                    <Value d4p1:nil="false">ValueHere</Value>
                  </RuleItem>
                </Items>
              </RuleItemGroup>
            </IncludeRuleItemGroups>
            <!--These fields are applicable if the derived type attribute is set to CustomEventsRule-->
            <Action d4p1:nil="false">ValueHere</Action>
            <ActionOperator>ValueHere</ActionOperator>
            <Category d4p1:nil="false">ValueHere</Category>
            <CategoryOperator>ValueHere</CategoryOperator>
            <Label d4p1:nil="false">ValueHere</Label>
            <LabelOperator>ValueHere</LabelOperator>
            <Value d4p1:nil="false">ValueHere</Value>
            <ValueOperator>ValueHere</ValueOperator>
          </Rule>
          <TagId d4p1:nil="false">ValueHere</TagId>
          <!--No additional fields are applicable if the derived type attribute is set to CustomAudience-->
          <!--No additional fields are applicable if the derived type attribute is set to InMarketAudience-->
          <!--These fields are applicable if the derived type attribute is set to ProductAudience-->
          <ProductAudienceType d4p1:nil="false">ValueHere</ProductAudienceType>
          <TagId d4p1:nil="false">ValueHere</TagId>
          <!--This field is applicable if the derived type attribute is set to SimilarRemarketingList-->
          <SourceId>ValueHere</SourceId>
          <!--This field is applicable if the derived type attribute is set to CombinedList-->
          <CombinationRules d4p1:nil="false">
            <CombinationRule>
              <AudienceIds d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
                <a1:long>ValueHere</a1:long>
              </AudienceIds>
              <Operator>ValueHere</Operator>
            </CombinationRule>
          </CombinationRules>
          <!--No additional fields are applicable if the derived type attribute is set to CustomerList-->
          <!--These fields are applicable if the derived type attribute is set to ImpressionBasedRemarketingList-->
          <AdGroupId d4p1:nil="false">ValueHere</AdGroupId>
          <CampaignId d4p1:nil="false">ValueHere</CampaignId>
          <EntityType>ValueHere</EntityType>
        </Audience>
      </Audiences>
      <PartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchError d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <FieldPath d4p1:nil="false">ValueHere</FieldPath>
          <ForwardCompatibilityMap xmlns:e276="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e276:KeyValuePairOfstringstring>
              <e276:key d4p1:nil="false">ValueHere</e276:key>
              <e276:value d4p1:nil="false">ValueHere</e276:value>
            </e276:KeyValuePairOfstringstring>
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
    </GetAudiencesByIdsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetAudiencesByIdsResponse> GetAudiencesByIdsAsync(
	IList<long> audienceIds,
	AudienceType type,
	AudienceAdditionalField? returnAdditionalFields)
{
	var request = new GetAudiencesByIdsRequest
	{
		AudienceIds = audienceIds,
		Type = type,
		ReturnAdditionalFields = returnAdditionalFields
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.GetAudiencesByIdsAsync(r), request));
}
```
```java
static GetAudiencesByIdsResponse getAudiencesByIds(
	ArrayOflong audienceIds,
	ArrayList<AudienceType> type,
	ArrayList<AudienceAdditionalField> returnAdditionalFields) throws RemoteException, Exception
{
	GetAudiencesByIdsRequest request = new GetAudiencesByIdsRequest();

	request.setAudienceIds(audienceIds);
	request.setType(type);
	request.setReturnAdditionalFields(returnAdditionalFields);

	return CampaignManagementService.getService().getAudiencesByIds(request);
}
```
```php
static function GetAudiencesByIds(
	$audienceIds,
	$type,
	$returnAdditionalFields)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new GetAudiencesByIdsRequest();

	$request->AudienceIds = $audienceIds;
	$request->Type = $type;
	$request->ReturnAdditionalFields = $returnAdditionalFields;

	return $GLOBALS['CampaignManagementProxy']->GetService()->GetAudiencesByIds($request);
}
```
```python
response=campaignmanagement_service.GetAudiencesByIds(
	AudienceIds=AudienceIds,
	Type=Type,
	ReturnAdditionalFields=ReturnAdditionalFields)
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/Audiences/QueryByIds
```

# [Sandbox URL](#tab/sandbox)

```POST
https://campaign.api.sandbox.bingads.microsoft.com/CampaignManagement/v13/Audiences/QueryByIds
```

-----

## <a name="request"></a>Request Elements
The *GetAudiencesByIdsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audienceids"></a>AudienceIds|A maximum of 100 identifiers of the requested audiences.<br/><br/>This request element is optional. If this element is null or empty, then you are effectively requesting all customer and account scoped audiences for the specified account.<br/><br/>If the audience identifiers do not match the requested audience types, then the operation will return a batch error for each requested audience ID.|**long** array|
|<a name="returnadditionalfields"></a>ReturnAdditionalFields|The additional field values enable you to get the latest features using the current version of Campaign Management API, and in the next version the corresponding elements will be included by default.<br/><br/>This request element is optional.|[AudienceAdditionalField](audienceadditionalfield.md)|
|<a name="type"></a>Type|The type of audiences to return.<br/><br/>You may include multiple values as flags. How you specify multiple flags depends on the programming language that you use. For example, C# treats these values as flag values and Java treats them as an array of strings. The SOAP should include a string that contains a space-delimited list of values for example, `<Type>RemarketingList SimilarRemarketingList</Type>`.|[AudienceType](audiencetype.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetAudiencesByIdsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiences"></a>Audiences|The list of audiences that corresponds directly to the audience identifiers that you specified in the request. Items of the list may be returned as null. For each list index where an audience was not retrieved, the corresponding element will be null.|[Audience](audience.md) array|
|<a name="partialerrors"></a>PartialErrors|An array of [BatchError](batcherror.md) objects that contain details for any request items that were not successful.<br/><br/>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "AudienceIds": [
    "LongValueHere"
  ],
  "Type": "ValueHere",
  "ReturnAdditionalFields": "ValueHere"
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

Below is an example that is applicable if the type of [Audience](audience.md) is [CombinedList](combinedlist.md), [BatchError](batcherror.md) is [EditorialError](editorialerror.md).

```json
{
  "Audiences": [
    {
      "AudienceNetworkSize": "LongValueHere",
      "CustomerShare": {
        "CustomerAccountShares": [
          {
            "AccountId": "LongValueHere",
            "Associations": [
              {
                "AssociationCount": "LongValueHere",
                "UsageType": "ValueHere"
              }
            ],
            "CustomerId": "LongValueHere"
          }
        ],
        "OwnerCustomerId": "LongValueHere"
      },
      "Description": "ValueHere",
      "ForwardCompatibilityMap": [
        {
          "key": "ValueHere",
          "value": "ValueHere"
        }
      ],
      "Id": "LongValueHere",
      "MembershipDuration": IntValueHere,
      "Name": "ValueHere",
      "ParentId": "LongValueHere",
      "Scope": "ValueHere",
      "SearchSize": "LongValueHere",
      "SupportedCampaignTypes": [
        "ValueHere"
      ],
      "Type": "CombinedList",
      "CombinationRules": [
        {
          "AudienceIds": [
            "LongValueHere"
          ],
          "Operator": "ValueHere"
        }
      ]
    }
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
public async Task<GetAudiencesByIdsResponse> GetAudiencesByIdsAsync(
	IList<long> audienceIds,
	AudienceType type,
	AudienceAdditionalField? returnAdditionalFields)
{
	var request = new GetAudiencesByIdsRequest
	{
		AudienceIds = audienceIds,
		Type = type,
		ReturnAdditionalFields = returnAdditionalFields
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.GetAudiencesByIdsAsync(r), request));
}
```
```java
static GetAudiencesByIdsResponse getAudiencesByIds(
	ArrayOflong audienceIds,
	ArrayList<AudienceType> type,
	ArrayList<AudienceAdditionalField> returnAdditionalFields) throws RemoteException, Exception
{
	GetAudiencesByIdsRequest request = new GetAudiencesByIdsRequest();

	request.setAudienceIds(audienceIds);
	request.setType(type);
	request.setReturnAdditionalFields(returnAdditionalFields);

	return CampaignManagementService.getService().getAudiencesByIds(request);
}
```
```php
static function GetAudiencesByIds(
	$audienceIds,
	$type,
	$returnAdditionalFields)
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new GetAudiencesByIdsRequest();

	$request->AudienceIds = $audienceIds;
	$request->Type = $type;
	$request->ReturnAdditionalFields = $returnAdditionalFields;

	return $GLOBALS['CampaignManagementProxy']->GetService()->GetAudiencesByIds($request);
}
```
```python
response=campaignmanagement_service.GetAudiencesByIds(
	AudienceIds=AudienceIds,
	Type=Type,
	ReturnAdditionalFields=ReturnAdditionalFields)
```

::: zone-end
