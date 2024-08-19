---
title: ConversionGoalRevenue Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines properties for revenue that can be tracked by a conversion goal.(test)
---
# ConversionGoalRevenue Data Object Test - Campaign Management
Defines properties for revenue that can be tracked by a conversion goal.

# [XML](#tab/xml)

```xml
<xs:complexType name="ConversionGoalRevenue" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CurrencyCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="tns:ConversionGoalRevenueType" />
    <xs:element minOccurs="0" name="Value" nillable="true" type="xs:decimal" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CurrencyCode": "ValueHere",
  "Type": "ValueHere",
  "Value": NumbericValueHere
}
```

-----

## <a name="elements"></a>Elements

The [ConversionGoalRevenue](conversiongoalrevenue.md) object has the following elements: [CurrencyCode](#currencycode), [Type](#type), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="currencycode"></a>CurrencyCode|The currency type that you want the conversion goal revenue to be reported.<br/><br/>For a list of possible string values see [Microsoft Advertising Currencies](../guides/currencies.md).<br/><br/>For the [EventGoal](eventgoal.md), [InStoreTransactionGoal](instoretransactiongoal.md), [OfflineConversionGoal](offlineconversiongoal.md), and [UrlGoal](urlgoal.md) objects, if their *Scope* element is set to *Customer* and if the [Type](#type) is *FixedValue* or *VariableValue*, this property is required.<br/><br/>For the [OfflineConversionGoal](offlineconversiongoal.md), the *ConversionCurrencyCode* element of the applied [OfflineConversion](offlineconversion.md) data takes precedence over this currency code. For the other supported conversion goals if you modify your UET tag tracking code to pass back both a revenue value and a currency, then the UET tag currency value takes precedence over this currency code. For more information on modifying your UET tag tracking code for variable revenue reporting, see [How to report variable revenue with UET](https://help.ads.microsoft.com/#apex/3/en/56687/2).<br/><br/>If the *Scope* element of any [ConversionGoal](conversiongoal.md) is set to *Account* and you do not specify the *CurrencyCode*, then by default the account level billing currency will be used to report conversion goal revenue.<br/><br/>This element is not available for the [AppInstallGoal](appinstallgoal.md), [DurationGoal](durationgoal.md), or [PagesViewedPerVisitGoal](pagesviewedpervisitgoal.md). You cannot set this property for those goal types.<br/><br/>**Add:** Optional unless otherwise noted above.<br/>**Update:**  Optional unless otherwise noted above.|**string**|
|<a name="type"></a>Type|Determines how revenue is tracked. The possible types are *FixedValue*, *NoValue* (the default type), and *VariableValue*. <br/><br/>If the type is *FixedValue* then you must specify the *Value* element.<br/><br/>If the type is *NoValue* then you must not specify the *Value* element.<br/><br/>If the type is *VariableValue* then you can optionally specify a default value with the *Value* element.<br/><br/>**Add:** Optional. If not specified, the default type is *NoValue*.<br/>**Update:**  Optional. If not specified, the default type is *NoValue*.|[ConversionGoalRevenueType](conversiongoalrevenuetype.md)|
|<a name="value"></a>Value|The revenue value or amount.  If you assign values to your conversions, you'll be able to see the total value driven by your advertising across different conversions, rather than simply the number of conversions that have happened.<br/><br/>The default value is effectively 0, and possible values range from 0 to 999,9999. Accepted values depend on the revenue type, so please see the *Type* element for details.<br/><br/>For the [OfflineConversionGoal](offlineconversiongoal.md), the *ConversionValue* element of the applied [OfflineConversion](offlineconversion.md) data takes precedence over this currency value.<br/><br/>**Add:** Optional. If not specified, the default type is effectively 0.<br/>**Update:**  Optional. If not specified, the default type is effectively 0.|**decimal**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionGoal](conversiongoal.md)  
