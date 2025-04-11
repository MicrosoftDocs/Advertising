---
title: NewCustomerAcquisitionGoal Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the new customer acquisition goal data object.
---
# NewCustomerAcquisitionGoal Data Object - Campaign Management
Defines the new customer acquisition goal data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="NewCustomerAcquisitionGoal" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdditionalValue" nillable="true" type="xs:decimal" />
    <xs:element minOccurs="0" name="Audiences" nillable="true" type="tns:ArrayOfAudienceIdName" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdditionalValue": DecimalValueHere,
  "Audiences": [
    {
      "Id": "LongValueHere",
      "Name": "ValueHere"
    }
  ],
  "Id": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [NewCustomerAcquisitionGoal](newcustomeracquisitiongoal.md) object has the following elements: [AdditionalValue](#additionalvalue), [Audiences](#audiences), [Id](#id).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="additionalvalue"></a>AdditionalValue|Reserved.|**decimal**|
|<a name="audiences"></a>Audiences|Reserved.|[AudienceIdName](audienceidname.md) array|
|<a name="id"></a>Id|Reserved.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddNewCustomerAcquisitionGoals](addnewcustomeracquisitiongoals.md)  
[GetNewCustomerAcquisitionGoalsByAccountId](getnewcustomeracquisitiongoalsbyaccountid.md)  
[UpdateNewCustomerAcquisitionGoals](updatenewcustomeracquisitiongoals.md)  
