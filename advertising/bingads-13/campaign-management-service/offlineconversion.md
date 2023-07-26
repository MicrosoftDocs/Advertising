---
title: OfflineConversion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an offline conversion that you send to Microsoft Advertising.
---
# OfflineConversion Data Object - Campaign Management
Defines an offline conversion that you send to Microsoft Advertising. 

To set up offline conversion tracking, create an [OfflineConversionGoal](offlineconversiongoal.md). If you set the *CountType* of the [OfflineConversionGoal](offlineconversiongoal.md) to *All*, then all offline conversions for the same *MicrosoftClickId* with different conversion times will be added cumulatively. If you set the *CountType* of the [OfflineConversionGoal](offlineconversiongoal.md) to *Unique*, then only the first conversion that happens after an ad click will be counted. Duplicate offline conversions with the same *MicrosoftClickId* and *ConversionTime* will be ignored. In other words only the first offline conversion for a given *MicrosoftClickId* and *ConversionTime* will be counted.

> [!IMPORTANT]
> After the [OfflineConversionGoal](offlineconversiongoal.md) is set up, wait two hours and then send Microsoft Advertising the [OfflineConversion](offlineconversion.md) data via the [ApplyOfflineConversions](applyofflineconversions.md) operation. It can take up to five hours to view conversion data in the Microsoft Advertising reporting. 
> 
> As a best practice after an ad click you should wait an hour before uploading offline conversions. 

> [!NOTE]
> Although you can upload offline conversions in sandbox for functional testing, the offline conversion data will not be attributed in sandbox performance reporting data.

## Syntax
```xml
<xs:complexType name="OfflineConversion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ConversionCurrencyCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ConversionName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ConversionTime" type="xs:dateTime" />
    <xs:element minOccurs="0" name="ConversionValue" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="ExternalAttributionCredit" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="ExternalAttributionModel" nillable="true" type="xs:string" />
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

## <a name="elements"></a>Elements

The [OfflineConversion](offlineconversion.md) object has the following elements: [ConversionCurrencyCode](#conversioncurrencycode), [ConversionName](#conversionname), [ConversionTime](#conversiontime), [ConversionValue](#conversionvalue), [ExternalAttributionCredit](#externalattributioncredit), [ExternalAttributionModel](#externalattributionmodel), [HashedEmailAddress](#hashedemailaddress), [HashedPhoneNumber](#hashedphonenumber), [MicrosoftClickId](#microsoftclickid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="conversioncurrencycode"></a>ConversionCurrencyCode|The currency code for the offline conversion.<br/><br/>For more information, see [Currencies](../guides/currencies.md).<br/><br/>**Apply:** Optional. If you do not specify an offline conversion currency code, then the *CurrencyCode* element of the goal's [ConversionGoalRevenue](conversiongoalrevenue.md) is used.|**string**|
|<a name="conversionname"></a>ConversionName|The conversion goal name.<br/><br/>This name must match an existing conversion goal name, otherwise the offline conversion goal data will not be applied.<br/><br/>**Apply:** Required|**string**|
|<a name="conversiontime"></a>ConversionTime|The date and time when the offline conversion occurred.<br/><br/>The date and time must be within the last 90 days, otherwise the operation will fail when you attempt to send Microsoft Advertising the offline conversion data.<br/><br/>To be counted by Microsoft Advertising as an offline conversion after successful upload, the following additional requirements must be met:<br/>-  The date and time of the conversion must be set later than the date and time of the recorded click.<br/>-  The date and time must be within the conversion window. The *ConversionWindowInMinutes* property of the [OfflineConversionGoal](offlineconversiongoal.md) determines the maximum length of time in minutes after a click that conversions will be tracked.<br/><br/>For example if three clicks were recorded on April 30th, if the *ConversionWindowInMinutes* of the [OfflineConversionGoal](offlineconversiongoal.md) is equal to 30 days (43200 minutes), and if you send Microsoft Advertising the following offline conversions on July 31st, then Microsoft Advertising will only count the one with MicrosoftClickId=*2* as an offline conversion.<br/>-  MicrosoftClickId=*1*; ConversionTime=*2020-04-30T17:02:35.6853793Z*<br/>-  MicrosoftClickId=*2*; ConversionTime=*2020-05-15T17:02:35.6853793Z*<br/>-  MicrosoftClickId=*3*; ConversionTime=*2020-06-15T17:02:35.6853793Z*<br/><br/>The offline conversion data with MicrosoftClickId=*1* will not be uploaded since the conversion date and time is more than 90 days ago, and the offline conversion data with MicrosoftClickId=*3* will not be counted because it does not fall within the conversion window (April 30 through May 29).<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Apply:** Required|**dateTime**|
|<a name="conversionvalue"></a>ConversionValue|The offline conversion value.<br/><br/>**Apply:** Optional. If you do not specify an offline conversion value, then the *Value* element of the goal's [ConversionGoalRevenue](conversiongoalrevenue.md) is used.|**double**|
|<a name="externalattributioncredit"></a>ExternalAttributionCredit|This field can only be set for conversions actions which use external attribution. It represents the fraction of the conversion that is attributed to each click. Its value must be greater than 0 and less than or equal to 1.<br/><br/>A GoalNotEligibleForExternalAttribution error will be returned if this field is used with a non-externally attributed conversion action. <br/><br/>**Apply:** Optional|**double**|
|<a name="externalattributionmodel"></a>ExternalAttributionModel|This field can only be set for conversions actions which use external attribution. It specifies the attribution model name.<br/><br/>A GoalNotEligibleForExternalAttribution error will be returned if this field is used with a non-externally attributed conversion action. <br/><br/>**Apply:** Optional|**string**|
|<a name="hashedemailaddress"></a>HashedEmailAddress|The hashed email address using the SHA-256 algorithm for use with enhanced conversions.|**string**|
|<a name="hashedphonenumber"></a>HashedPhoneNumber|The hashed phone number according to the E.164 standard for use with enhanced conversions.|**string**|
|<a name="microsoftclickid"></a>MicrosoftClickId|The MSCLKID for the offline conversion.<br/><br/>To ensure that auto-tagging is enabled for Microsoft click ID tracking, use the [GetAccountProperties](getaccountproperties.md) and [SetAccountProperties](setaccountproperties.md) operations.<br/><br/>**Apply:** Required|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyOfflineConversions](applyofflineconversions.md)  
