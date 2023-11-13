---
title: CustomerList Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a CustomerList data object.
---
# CustomerList Data Object - Campaign Management
Defines a CustomerList data object.

> [!WARNING]
> The CustomerList data object is for internal use only. You can't access it via the public API.

## Syntax
```xml
<xs:complexType name="CustomerList" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Audience">
      <xs:sequence>
        <xs:element minOccurs="0" name="ActionType" nillable="true" type="tns:CustomerListActionType">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="CustomerListItems" nillable="true" type="tns:ArrayOfCustomerListItem">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CustomerList](customerlist.md) object has the following elements: [ActionType](#actiontype), [CustomerListItems](#customerlistitems).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="actiontype"></a>ActionType|For internal use only.|[CustomerListActionType](customerlistactiontype.md)|
|<a name="customerlistitems"></a>CustomerListItems|For internal use only.|[CustomerListItem](customerlistitem.md) array|

The [CustomerList](customerlist.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudience"></a>Inherited Elements from Audience
The [CustomerList](customerlist.md) object derives from the [Audience](audience.md) object, and inherits the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type). The descriptions below are specific to [CustomerList](customerlist.md), and might not apply to other objects that inherit the same elements from the [Audience](audience.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|Reserved.|**long**|
|<a name="customershare"></a>CustomerShare|Reserved.|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|Reserved.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|Reserved.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="membershipduration"></a>MembershipDuration|Reserved.|**int**|
|<a name="name"></a>Name|Reserved.|**string**|
|<a name="parentid"></a>ParentId|Reserved.|**long**|
|<a name="scope"></a>Scope|Reserved.|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|Reserved.|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|Reserved.|**string** array|
|<a name="type"></a>Type|Reserved.|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyCustomerListItems](applycustomerlistitems.md)  
