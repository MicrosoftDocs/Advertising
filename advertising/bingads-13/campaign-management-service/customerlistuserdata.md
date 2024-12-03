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
    <xs:element name="ActionType" type="tns:CustomerListActionType" />
    <xs:element name="AudienceId" type="xs:long" />
    <xs:element name="CustomerListItemSubType" type="tns:CustomerListItemSubType" />
    <xs:element xmlns:q130="http://schemas.microsoft.com/2003/10/Serialization/Arrays" name="CustomerListItems" nillable="true" type="q130:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
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

The [CustomerListUserData](customerlistuserdata.md) object has the following elements: [ActionType](#actiontype), [AudienceId](#audienceid), [CustomerListItems](#customerlistitems), [CustomerListItemSubType](#customerlistitemsubtype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="actiontype"></a>ActionType|The action type when uploading user data.|[CustomerListActionType](customerlistactiontype.md)|
|<a name="audienceid"></a>AudienceId|The Microsoft Advertising assigned identifier of an audience, for example the customer list ID.|**long**|
|<a name="customerlistitems"></a>CustomerListItems|Take an action for a customer list item within this array.|**string** array|
|<a name="customerlistitemsubtype"></a>CustomerListItemSubType|The user data type of the customer list item.|[CustomerListItemSubType](customerlistitemsubtype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyCustomerListUserData](applycustomerlistuserdata.md)  
