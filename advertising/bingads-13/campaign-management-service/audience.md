---
title: Audience Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the base object of an audience.
---
# Audience Data Object - Campaign Management
Defines the base object of an audience.

Do not try to instantiate an *Audience*. You can create one or more of the following objects that derive from it.
- [CombinedList](combinedlist.md)  
- [CustomAudience](customaudience.md)  
- [InMarketAudience](inmarketaudience.md)  
- [ProductAudience](productaudience.md)  
- [RemarketingList](remarketinglist.md)  
- [SimilarRemarketingList](similarremarketinglist.md)  

> [!NOTE]
> Microsoft Advertising will automatically generate similar audiences for remarketing lists for pilot participants i.e., [GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns feature identifier 317.

## Syntax
```xml
<xs:complexType name="Audience" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AudienceNetworkSize" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CustomerShare" nillable="true" type="tns:CustomerShare" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element xmlns:q122="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q122:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="MembershipDuration" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ParentId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Scope" nillable="true" type="tns:EntityScope" />
    <xs:element minOccurs="0" name="SearchSize" nillable="true" type="xs:long" />
    <xs:element xmlns:q123="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="SupportedCampaignTypes" nillable="true" type="q123:ArrayOfstring" />
    <xs:element minOccurs="0" name="Type" type="tns:AudienceType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Audience](audience.md) object has the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.<br/><br/>Please see more details in documentation for the objects that inherit this element e.g., [RemarketingList](remarketinglist.md#audiencenetworksize).|**long**|
|<a name="customershare"></a>CustomerShare|Determines the list of customers and accounts that share the audience. Details include audience association counts.<br/><br/>This element is only supported with a [RemarketingList](remarketinglist.md#customershare). Audiences of other types cannot be shared in the customer hierarchy.|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|The description of the audience. Use a description to help you remember what audience you are targeting.<br/><br/>The description can contain a maximum of 1,024 characters.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the audience.|**long**|
|<a name="membershipduration"></a>MembershipDuration|When you create an audience, you can specify how far back in time Microsoft Advertising should look for actions that match your audience definition.<br/><br/>The minimum duration is 1 day and the maximum duration allowed is 180 days.|**int**|
|<a name="name"></a>Name|The name of the audience. The name can contain a maximum of 128 characters.|**string**|
|<a name="parentid"></a>ParentId|The Microsoft Advertising identifier of the account or customer. <br/><br/>If the *Scope* is set to *Account*, this is the account ID, and otherwise it is the customer ID.|**long**|
|<a name="scope"></a>Scope|Scope defines what accounts can use this audience.<br/><br/>If scope is set to *Account*, the audience can only be associated with campaigns and ad groups in one account i.e., via the [ParentId](#parentid). If scope is set to *Customer*, the audience can be associated with campaigns and ad groups in all of the customer's accounts.|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.<br/><br/>Please see more details in documentation for the objects that inherit this element e.g., [RemarketingList](remarketinglist.md#searchsize).|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|The list of campaign types that support this audience.<br/><br/>Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.|**string** array|
|<a name="type"></a>Type|The type of the audience. For more information about audience types, see the [Remarks](#remarks).|[AudienceType](audiencetype.md)|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by whether you instantiate a custom audience or another type of audience. If you generate the SOAP manually, use the *type* attribute of the *Audience* node as shown in the following example.

```xml
<Audiences xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
  <Audience i:type="CustomAudience">
    <Description i:nil="false">Custom Audience Description</Description>
    <ForwardCompatibilityMap xmlns:e43="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
      <e43:KeyValuePairOfstringstring>
        <e43:key i:nil="false"></e43:key>
        <e43:value i:nil="false"></e43:value>
      </e43:KeyValuePairOfstringstring>
    </ForwardCompatibilityMap>
    <Id i:nil="true" />
    <MembershipDuration i:nil="false">30</MembershipDuration>
    <Name i:nil="false">Custom Audience Name</Name>
    <ParentId i:nil="false">ParentIdHere</ParentId>
    <Scope>Customer</Scope>
  </Audience>
</Audiences>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAudiences](addaudiences.md)  
[GetAudiencesByIds](getaudiencesbyids.md)  
[UpdateAudiences](updateaudiences.md)  
