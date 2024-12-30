---
title: LocationCondition Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a condition to use conversion value rules in a specific location.
---
# LocationCondition Data Object - Campaign Management
Defines a condition to use conversion value rules in a specific location.

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
|<a name="excludedlocationintent"></a>ExcludedLocationIntent|The intent option for excluded locations.|[IntentOption](intentoption.md)|
|<a name="excludedlocations"></a>ExcludedLocations|The locations excluded from the condition.|[LocationConditionItem](locationconditionitem.md) array|
|<a name="includedlocationintent"></a>IncludedLocationIntent|The intent option for included locations.|[IntentOption](intentoption.md)|
|<a name="includedlocations"></a>IncludedLocations|The locations included in the condition.|[LocationConditionItem](locationconditionitem.md) array|
|<a name="isprimary"></a>IsPrimary|Indicates if this is the primary condition. Only 1 primary condition is allowed in a conversion value rule.|**boolean**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionValueRule](conversionvaluerule.md)  
