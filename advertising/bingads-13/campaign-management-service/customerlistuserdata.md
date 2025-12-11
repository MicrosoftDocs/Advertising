---
title: CustomerListUserData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a CustomerListUserData data object.
---
# CustomerListUserData Data Object - Campaign Management
Defines a CustomerListUserData data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CustomerListUserData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AcceptCustomerMatchTerm" nillable="true" type="xs:boolean" />
    <xs:element name="ActionType" type="tns:CustomerListActionType" />
    <xs:element name="AudienceId" type="xs:long" />
    <xs:element name="CustomerListItemSubType" type="tns:CustomerListItemSubType" />
    <xs:element xmlns:q132="http://schemas.microsoft.com/2003/10/Serialization/Arrays" name="CustomerListItems" nillable="true" type="q132:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AcceptCustomerMatchTerm": "BooleanValueHere",
  "ActionType": "ValueHere",
  "AudienceId": "LongValueHere",
  "CustomerListItems": [
    "ValueHere"
  ],
  "CustomerListItemSubType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CustomerListUserData](customerlistuserdata.md) object has the following elements: [AcceptCustomerMatchTerm](#acceptcustomermatchterm), [ActionType](#actiontype), [AudienceId](#audienceid), [CustomerListItems](#customerlistitems), [CustomerListItemSubType](#customerlistitemsubtype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="acceptcustomermatchterm"></a>AcceptCustomerMatchTerm|Optional flag to accept Customer Match terms for this request.<br/><br/>- `true`: Accept terms and process customer data<br/>- `false`: Reject terms and return error 3913 (TermsAndConditionsNotAccepted)<br/><br/><br/>**Add:** Optional<br/>**Update:** Optional|**boolean**|
|<a name="actiontype"></a>ActionType|The action type when uploading user data.|[CustomerListActionType](customerlistactiontype.md)|
|<a name="audienceid"></a>AudienceId|The Microsoft Advertising assigned identifier of an audience, for example the customer list ID.|**long**|
|<a name="customerlistitems"></a>CustomerListItems|An array of customer list items. When [CustomerListItemSubType](#customerlistitemsubtype) is "Email", each item must be a SHA-256 hashed email address (lowercase hexadecimal string of 64 characters). For example, the email `test@contoso.com` should be hashed as `a8e34c39d390c30c3ff245256c46c7076cecb7dfcfd60f7534d1037e901fad76`.|**string** array|
|<a name="customerlistitemsubtype"></a>CustomerListItemSubType|The user data type of the customer list item.|[CustomerListItemSubType](customerlistitemsubtype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyCustomerListUserData](applycustomerlistuserdata.md)  
