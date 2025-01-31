---
title: "Conversion Value Rule - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a conversion value rule. Adjusts your conversion values if the conversion meets certain conditions that are relevant to your business goals.
dev_langs:
  - csharp
---
# Conversion Value Rule Record - Bulk
Defines a conversion value rule. Adjusts your conversion values if the conversion meets certain conditions that are relevant to your business goals.

You can download all *Conversion Value Rule* records in the account by including the [DownloadEntity](downloadentity.md) value of *ConversionValueRules* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datadevicetype.md#entitydata) devicetype. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new conversion value rule.

```csv
Type,Id,Name,Status,ConversionValueRuleValue,ConversionValueRuleOperator,CurrencyCode,PrimaryConditionType,IncludedLocations,ExcludedLocations,IncludedLocationIntent,ExcludedLocationIntent,DeviceType,Audiences,LCID,,,,
Format Version,,,,,,,6.0,,,,,,,,,,,,,,,,,,,,,,  
ConversionValueRule,,Example Location and Audience Rule,Active,100,Add,USD,Location,1,2,3,,PeopleIn,,,123,345,456,1033
```

For a *Conversion Value Rule* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [Audiences](#audiences)
- [Conversion Value Rule Value](#conversionvaluerulevalue)
- [Conversion Value Rule Operator](#conversionvalueruleoperator)
- [Currency Code](#currencycode)
- [Device Type](#devicetype)
- [Excluded Location Intent](#excludedlocationintent)
- [Excluded Locations](#excludedlocations)
- [Id](#id)
- [Included Location Intent](#includedlocationintent)
- [Included Locations](#includedlocations)
- [LCID](#lcid)
- [Name](#name)
- [Primary Condition Type](#primaryconditiontype)
- [Status](#status)
- [Type](#type)

## <a name="audiences"></a>Audiences
The audience condition associated with the conversion value rule. Each conversion value rule can have up to 2 conditions.

## <a name="conversionvaluerulevalue"></a>Conversion Value Rule Operator
The value of the conversion value rule. It should be greater than 0.  

**Add**: Required  
**Update**: Optional  

## <a name="conversionvalueruleoperator"></a>Conversion Value Rule Operator
The ConversionValueRuleOperator value set has the following values: Add, Multiply.

## <a name="currencycode"></a>Currency Code
The currency code for the conversion value rule.

## <a name="devicetype"></a>Device Type
The device condition associated with the conversion value rule. Each conversion value rule can have up to 2 conditions.

## <a name="excludedlocationintent"></a>Excluded Location Intent
The intent option for excluded locations.

## <a name="excludedlocations"></a>Excluded Locations
The locations excluded from the condition.

## <a name="id"></a>Id
The unique Microsoft Advertising identifier for the conversion goal.

**Add:** Read-only  
**Update:** Read-only and Required  

## <a name="includedlocationintent"></a>Included Location Intent
The intent option for included locations.

## <a name="includedlocations"></a>Included Locations
The locations included in the condition.

## <a name="lcid"></a>LCID
The locale identifier. See [LCID](../customer-management-service/lcid.md)

## <a name="name"></a>Name
The name of the conversion value rule.

## <a name="primaryconditiontype"></a>Primary Condition Type
Indicates if this is the primary condition. Only 1 primary condition is allowed in a conversion value rule.

## <a name="status"></a>Status
The status of the conversion value rule. Can be *Active*, *Deleted*, *Invalid*, or *Paused*.

## <a name="type"></a>Type
The type of the conversion value rule. This value is *ConversionValueRule* when you retrieve a conversion value rule.

**Add**: Read-only  
**Update**: Read-only  
