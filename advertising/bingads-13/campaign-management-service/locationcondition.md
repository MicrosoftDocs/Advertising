---
title: LocationCondition Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reserved.
---
# LocationCondition Data Object - Campaign Management
Reserved.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="LocationCondition" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ExcludedLocationIntent" nillable="true" type="tns:IntentOption" />
    <xs:element minOccurs="0" name="ExcludedLocations" nillable="true" type="tns:ArrayOfLocationConditionItem" />
    <xs:element minOccurs="0" name="IncludedLocationIntent" nillable="true" type="tns:IntentOption" />
    <xs:element minOccurs="0" name="IncludedLocations" nillable="true" type="tns:ArrayOfLocationConditionItem" />
    <xs:element minOccurs="0" name="IsPrimary" type="xs:boolean" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
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
}
```

-----

## <a name="elements"></a>Elements

The [LocationCondition](locationcondition.md) object has the following elements: [ExcludedLocationIntent](#excludedlocationintent), [ExcludedLocations](#excludedlocations), [IncludedLocationIntent](#includedlocationintent), [IncludedLocations](#includedlocations), [IsPrimary](#isprimary).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludedlocationintent"></a>ExcludedLocationIntent|Reserved.|[IntentOption](intentoption.md)|
|<a name="excludedlocations"></a>ExcludedLocations|Reserved.|[LocationConditionItem](locationconditionitem.md) array|
|<a name="includedlocationintent"></a>IncludedLocationIntent|Reserved.|[IntentOption](intentoption.md)|
|<a name="includedlocations"></a>IncludedLocations|Reserved.|[LocationConditionItem](locationconditionitem.md) array|
|<a name="isprimary"></a>IsPrimary|Reserved.|**boolean**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionValueRule](conversionvaluerule.md)  
