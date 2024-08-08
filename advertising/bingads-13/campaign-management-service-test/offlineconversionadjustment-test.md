---
title: OfflineConversionAdjustment Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object to retract or restate an offline conversion via the ApplyOfflineConversionAdjustments operation.(test)
---
# OfflineConversionAdjustment Data Object Test - Campaign Management
Defines an object to retract or restate an offline conversion via the [ApplyOfflineConversionAdjustments](applyofflineconversionadjustments.md) operation.  

You can adjust the conversion time and value for offline conversions previously applied via the [ApplyOfflineConversions](applyofflineconversions.md) operation. 

# [XML](#tab/xml)

```xml
<xs:complexType name="OfflineConversionAdjustment" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdjustmentCurrencyCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AdjustmentTime" type="xs:dateTime" />
    <xs:element minOccurs="0" name="AdjustmentType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AdjustmentValue" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="ConversionName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ConversionTime" type="xs:dateTime" />
    <xs:element minOccurs="0" name="HashedEmailAddress" nillable="true" type="xs:string">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="HashedPhoneNumber" nillable="true" type="xs:string">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="MicrosoftClickId" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdjustmentCurrencyCode": "ValueHere",
  "AdjustmentTime": "ValueHere",
  "AdjustmentType": "ValueHere",
  "AdjustmentValue": "ValueHere",
  "ConversionName": "ValueHere",
  "ConversionTime": "ValueHere",
  "HashedEmailAddress": "ValueHere",
  "HashedPhoneNumber": "ValueHere",
  "MicrosoftClickId": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [OfflineConversionAdjustment](offlineconversionadjustment.md) object has the following elements: [AdjustmentCurrencyCode](#adjustmentcurrencycode), [AdjustmentTime](#adjustmenttime), [AdjustmentType](#adjustmenttype), [AdjustmentValue](#adjustmentvalue), [ConversionName](#conversionname), [ConversionTime](#conversiontime), [HashedEmailAddress](#hashedemailaddress), [HashedPhoneNumber](#hashedphonenumber), [MicrosoftClickId](#microsoftclickid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adjustmentcurrencycode"></a>AdjustmentCurrencyCode|The currency code for the restated offline conversion.<br/><br/>For more information, see [Currencies](../guides/currencies.md).<br/><br/>**Apply:** Required if [AdjustmentType](#adjustmenttype) is set to "Restate", and otherwise this field is ignored. If you do not specify an adjustment currency code with the restatement, then the *CurrencyCode* element of the goal's [ConversionGoalRevenue](conversiongoalrevenue.md) is used.|**string**|
|<a name="adjustmenttime"></a>AdjustmentTime|The date and time when the adjustment occurred.<br/><br/>The adjustment time cannot be earlier than the original offline [conversion date and time](#conversiontime).<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Apply:** Required|**dateTime**|
|<a name="adjustmenttype"></a>AdjustmentType|Determines whether to retract or restate the offline conversion.<br/><br/>If this value is "Restate", the offline conversion previously attributed to the specified [MicrosoftClickId](#microsoftclickid) will be adjusted according to the new [AdjustmentCurrencyCode](#adjustmentcurrencycode), [AdjustmentTime](#adjustmenttime), and [AdjustmentValue](#adjustmentvalue).<br/><br/>If this value is "Retract", the offline conversion previously attributed to the specified [MicrosoftClickId](#microsoftclickid) will be retracted or deleted.<br/><br/>**Apply:** Required|**string**|
|<a name="adjustmentvalue"></a>AdjustmentValue|The adjusted offline conversion value.<br/><br/>**Apply:** Required if [AdjustmentType](#adjustmenttype) is set to "Restate", and otherwise this field should not be set.|**double**|
|<a name="conversionname"></a>ConversionName|The conversion goal name.<br/><br/>This name must match an existing conversion goal name, otherwise the offline conversion goal data will not be applied.<br/><br/>**Apply:** Required|**string**|
|<a name="conversiontime"></a>ConversionTime|The date and time when the original offline conversion occurred.<br/><br/>The date and time must be within the last 90 days, otherwise the operation will fail when you attempt to send Microsoft Advertising the offline conversion data.<br/><br/>To be counted by Microsoft Advertising as an offline conversion after successful upload, the following additional requirements must be met:<br/>-  The date and time of the conversion must be set later than the date and time of the recorded click.<br/>-  The date and time must be within the conversion window. The *ConversionWindowInMinutes* property of the [OfflineConversionGoal](offlineconversiongoal.md) determines the maximum length of time in minutes after a click that conversions will be tracked.<br/><br/>For example if three clicks were recorded on April 30th, if the *ConversionWindowInMinutes* of the [OfflineConversionGoal](offlineconversiongoal.md) is equal to 30 days (43200 minutes), and if you send Microsoft Advertising the following offline conversions on July 31st, then Microsoft Advertising will only count the one with MicrosoftClickId=*2* as an offline conversion.<br/>-  MicrosoftClickId=*1*; ConversionTime=*2020-04-30T17:02:35.6853793Z*<br/>-  MicrosoftClickId=*2*; ConversionTime=*2020-05-15T17:02:35.6853793Z*<br/>-  MicrosoftClickId=*3*; ConversionTime=*2020-06-15T17:02:35.6853793Z*<br/><br/>The offline conversion data with MicrosoftClickId=*1* will not be uploaded since the conversion date and time is more than 90 days ago, and the offline conversion data with MicrosoftClickId=*3* will not be counted because it does not fall within the conversion window (April 30 through May 29).<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Apply:** Required|**dateTime**|
|<a name="hashedemailaddress"></a>HashedEmailAddress|The hashed email address using the SHA-256 algorithm for use with enhanced conversions.|**string**|
|<a name="hashedphonenumber"></a>HashedPhoneNumber|The hashed phone number according to the E.164 standard for use with enhanced conversions.|**string**|
|<a name="microsoftclickid"></a>MicrosoftClickId|The MSCLKID for the offline conversion.<br/><br/>To ensure that auto-tagging is enabled for Microsoft click ID tracking, use the [GetAccountProperties](getaccountproperties.md) and [SetAccountProperties](setaccountproperties.md) operations. <br/><br/>**Apply:** Optional<br/><br/>*Note*: The MSCLKID is optional when you provide a hashed email address or phone number for enhanced conversions.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyOfflineConversionAdjustments](applyofflineconversionadjustments.md)  
