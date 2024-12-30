---
title: ConversionValueRule Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defintes a conversion value rule data object.
---
# ConversionValueRule Data Object - Campaign Management
Defintes a conversion value rule data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ConversionValueRule" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AudienceCondition" nillable="true" type="tns:AudienceCondition" />
    <xs:element minOccurs="0" name="CurrencyCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="DeviceCondition" nillable="true" type="tns:DeviceCondition" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="LocationCondition" nillable="true" type="tns:LocationCondition" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Operation" nillable="true" type="tns:ConversionValueRuleOperator" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:ConversionValueRuleStatus" />
    <xs:element minOccurs="0" name="Value" nillable="true" type="xs:decimal" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AudienceCondition": {
    "Audiences": [
      {
        "Id": "LongValueHere",
        "Name": "ValueHere",
        "Type": "ValueHere"
      }
    ],
    "IsPrimary": "ValueHere"
  },
  "CurrencyCode": "ValueHere",
  "DeviceCondition": {
    "DeviceTypes": "ValueHere",
    "IsPrimary": "ValueHere"
  },
  "Id": "LongValueHere",
  "LocationCondition": {
    "ExcludedLocationIntent": "ValueHere",
    "ExcludedLocations": [
      {
        "Id": IntValueHere,
        "Name": "ValueHere",
        "Type": "ValueHere"
      }
    ],
    "IncludedLocationIntent": "ValueHere",
    "IncludedLocations": [
      {
        "Id": IntValueHere,
        "Name": "ValueHere",
        "Type": "ValueHere"
      }
    ],
    "IsPrimary": "ValueHere"
  },
  "Name": "ValueHere",
  "Operation": "ValueHere",
  "Status": "ValueHere",
  "Value": DecimalValueHere
}
```

-----

## <a name="elements"></a>Elements

The [ConversionValueRule](conversionvaluerule.md) object has the following elements: [AudienceCondition](#audiencecondition), [CurrencyCode](#currencycode), [DeviceCondition](#devicecondition), [Id](#id), [LocationCondition](#locationcondition), [Name](#name), [Operation](#operation), [Status](#status), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencecondition"></a>AudienceCondition|The audience condition associated with the conversion value rule. Each conversion value rule can have up to 2 conditions.|[AudienceCondition](audiencecondition.md)|
|<a name="currencycode"></a>CurrencyCode|The currency code for the conversion value rule.|**string**|
|<a name="devicecondition"></a>DeviceCondition|The device condition associated with the conversion value rule. Each conversion value rule can have up to 2 conditions.|[DeviceCondition](devicecondition.md)|
|<a name="id"></a>Id|The unique identifier of the conversion value rule.<br /><br />**Add**: Optional <br />**Update**: Required|**long**|
|<a name="locationcondition"></a>LocationCondition|The location condition associated with the conversion value rule. Each conversion value rule can have up to 2 conditions.|[LocationCondition](locationcondition.md)|
|<a name="name"></a>Name|The name of the conversion value rule.|**string**|
|<a name="operation"></a>Operation|The operation type of the conversion value rule.|[ConversionValueRuleOperator](conversionvalueruleoperator.md)|
|<a name="status"></a>Status|The status of the conversion value rule.|[ConversionValueRuleStatus](conversionvaluerulestatus.md)|
|<a name="value"></a>Value|The value of the conversion value rule. It should be greater than 0.<br /><br />**Add**: Required <br />**Update**: Optional|**decimal**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddConversionValueRules](addconversionvaluerules.md)  
[GetConversionValueRulesByAccountId](getconversionvaluerulesbyaccountid.md)  
[GetConversionValueRulesByIds](getconversionvaluerulesbyids.md)  
[UpdateConversionValueRules](updateconversionvaluerules.md)  
