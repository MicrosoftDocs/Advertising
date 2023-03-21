---
title: OnlineConversionAdjustment Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object to retract or restate an online conversion.
---
# OnlineConversionAdjustment Data Object - Campaign Management
Defines an object to retract or restate an online conversion.

## Syntax
```xml
<xs:complexType name="OnlineConversionAdjustment" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdjustmentCurrencyCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AdjustmentTime" type="xs:dateTime" />
    <xs:element minOccurs="0" name="AdjustmentType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AdjustmentValue" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="ConversionName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TransactionId" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [OnlineConversionAdjustment](onlineconversionadjustment.md) object has the following elements: [AdjustmentCurrencyCode](#adjustmentcurrencycode), [AdjustmentTime](#adjustmenttime), [AdjustmentType](#adjustmenttype), [AdjustmentValue](#adjustmentvalue), [ConversionName](#conversionname), [TransactionId](#transactionid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adjustmentcurrencycode"></a>AdjustmentCurrencyCode|The currency code for the restated online conversion.<br/><br/>For more information, see [Currencies](../guides/currencies.md).<br/><br/>**Apply:** Required if [AdjustmentType](#adjustmenttype) is set to "Restate", and otherwise this field is ignored. If you do not specify an adjustment currency code with the restatement, then the *CurrencyCode* element of the goal's [ConversionGoalRevenue](conversiongoalrevenue.md) is used.|**string**|
|<a name="adjustmenttime"></a>AdjustmentTime|The date and time when the adjustment occurred.<br/><br/>The adjustment time cannot be earlier than the original offline [conversion date and time](offlineconversion.md#conversiontime).<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Apply:** Required|**dateTime**|
|<a name="adjustmenttype"></a>AdjustmentType|Determines whether to retract or restate the online conversion.<br/><br/>If this value is "Restate", the offline conversion previously attributed to the specified [MicrosoftClickId](offlineconversion.md#microsoftclickid) will be adjusted according to the new [AdjustmentCurrencyCode](#adjustmentcurrencycode), [AdjustmentTime](#adjustmenttime), and [AdjustmentValue](#adjustmentvalue).<br/><br/>If this value is "Retract", the offline conversion previously attributed to the specified [MicrosoftClickId](offlineconversion.md#microsoftclickid) will be retracted or deleted.<br/><br/>**Apply:** Required|**string**|
|<a name="adjustmentvalue"></a>AdjustmentValue|The adjusted online conversion value.<br/><br/>**Apply:** Required if [AdjustmentType](#adjustmenttype) is set to "Restate", and otherwise this field should not be set.|**double**|
|<a name="conversionname"></a>ConversionName|The conversion goal name.<br/><br/>This name must match an existing conversion goal name, otherwise the online conversion goal data will not be applied.<br/><br/>**Apply:** Required|**string**|
|<a name="transactionid"></a>TransactionId|The ID for this transaction.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyOnlineConversionAdjustments](applyonlineconversionadjustments.md)  
