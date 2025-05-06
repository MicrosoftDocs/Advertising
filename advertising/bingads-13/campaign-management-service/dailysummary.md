---
title: DailySummary Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for a summary of the offline conversion reports for the day.
---
# DailySummary Data Object - Campaign Management
Defines a data object for a summary of the offline conversion reports for the day.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DailySummary" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="FailureCount" type="xs:int" />
    <xs:element minOccurs="0" name="FileUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="FileUrlExpiryTimeUtc" type="xs:dateTime" />
    <xs:element minOccurs="0" name="SuccessCount" type="xs:int" />
    <xs:element minOccurs="0" name="UploadDate" type="xs:dateTime" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "FailureCount": IntValueHere,
  "FileUrl": "ValueHere",
  "FileUrlExpiryTimeUtc": "ValueHere",
  "SuccessCount": IntValueHere,
  "UploadDate": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DailySummary](dailysummary.md) object has the following elements: [FailureCount](#failurecount), [FileUrl](#fileurl), [FileUrlExpiryTimeUtc](#fileurlexpirytimeutc), [SuccessCount](#successcount), [UploadDate](#uploaddate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="failurecount"></a>FailureCount|The number of failed conversions.|**int**|
|<a name="fileurl"></a>FileUrl|The URL of the report.|**string**|
|<a name="fileurlexpirytimeutc"></a>FileUrlExpiryTimeUtc|The expiry time of the report in UTC time.|**dateTime**|
|<a name="successcount"></a>SuccessCount|The number of successful conversions.|**int**|
|<a name="uploaddate"></a>UploadDate|The date of the report in local time.|**dateTime**|

The following elements are available in select pilot programs: [ChannelName](#channelname), [ConversionName](#conversionname), [ConversionOrAdjustmentValue](#conversionoradjustmentvalue), [ConversionOrAdjustmentValueCurrency](#conversionoradjustmentvaluecurrency), [ConversionTime](#conversiontime), [GoalId](#goalid), [HashedEmailAddress](#hashedemailaddress), [HashedPhoneNumber](#hashedphonenumber), [IdIdentifier](#ididentifier), [MSClickId](#msclickid), [RecordId](#recordid), [Status](#status), [TimeZone](#timezone)

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="channelname"></a>ChannelName|The channel name.|**string**|
|<a name="conversionname"></a>ConversionName|The conversion goal name.<br/><br/>This name must match an existing conversion goal name, otherwise the offline conversion goal data will not be applied.<br/><br/>**Apply:** Required|**string**|
|<a name="conversionoradjustmentvalue"></a>ConversionOrAdjustmentValue|Reserved.||
|<a name="conversionoradjustmentvaluecurrency"></a>ConversionOrAdjustmentCurrency|Reserved.||
|<a name="conversiontime"></a>ConversionTime|The date and time when the offline conversion occurred.<br/><br/>The date and time must be within the last 90 days, otherwise the operation will fail when you attempt to send Microsoft Advertising the offline conversion data.<br/><br/>To be counted by Microsoft Advertising as an offline conversion after successful upload, the following additional requirements must be met:<br/>-  The date and time of the conversion must be set later than the date and time of the recorded click.<br/>-  The date and time must be within the conversion window. The *ConversionWindowInMinutes* property of the [OfflineConversionGoal](offlineconversiongoal.md) determines the maximum length of time in minutes after a click that conversions will be tracked.<br/><br/>For example if three clicks were recorded on April 30th, if the *ConversionWindowInMinutes* of the [OfflineConversionGoal](offlineconversiongoal.md) is equal to 30 days (43200 minutes), and if you send Microsoft Advertising the following offline conversions on July 31st, then Microsoft Advertising will only count the one with MicrosoftClickId=*2* as an offline conversion.<br/>-  MicrosoftClickId=*1*; ConversionTime=*2020-04-30T17:02:35.6853793Z*<br/>-  MicrosoftClickId=*2*; ConversionTime=*2020-05-15T17:02:35.6853793Z*<br/>-  MicrosoftClickId=*3*; ConversionTime=*2020-06-15T17:02:35.6853793Z*<br/><br/>The offline conversion data with MicrosoftClickId=*1* will not be uploaded since the conversion date and time is more than 90 days ago, and the offline conversion data with MicrosoftClickId=*3* will not be counted because it does not fall within the conversion window (April 30 through May 29).<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).<br/><br/>**Apply:** Required|**dateTime**|
|<a name="goalid"></a>GoalId|The Microsoft Advertising assigned identifier of a conversion goal.|**long**|
|<a name="hashedemailaddress"></a>HashedEmailAddress|The hashed email address using the SHA-256 algorithm for use with enhanced conversions.|**string**|
|<a name="hashedphonenumber"></a>HashedPhoneNumber|The hashed phone number according to the E.164 standard for use with enhanced conversions.|**string**|
|<a name="ididentifier"></a>IdIdentifier|The identifier of the daily summary.|**int**|
|<a name="microsoftclickid"></a>MicrosoftClickId|The MSCLKID for the offline conversion.<br/><br/>To ensure that auto-tagging is enabled for Microsoft click ID tracking, use the [GetAccountProperties](getaccountproperties.md) and [SetAccountProperties](setaccountproperties.md) operations.<br/><br/>**Apply:** Optional<br/><br/>*Note*: The MSCLKID is optional when you provide a hashed email address or phone number for enhanced conversions.|**string**|
|<a name="recordid"></a>RecordId|Reserved.||
|<a name="status"></a>Status|The status of the daily summary. Either **Success** or one of the following: <ul><li>**OfflineConversionsNullOrEmpty** - Indicates that the offline conversions array is null or empty.</li><li>**OfflineConversionBatchSizeExceedsLimit** - The number of offline conversions exceeds the allowed batch size limit.</li><li>**OfflineConversionIsNull** - An individual offline conversion object is null.</li><li>**OfflineConversionGoalTooRecent** - The offline conversion goal was created less than two hours before the import.</li><li>**OfflineConversionNameInvalid** - The provided offline conversion name does not match any existing goal.</li><li>**NotEligibleForEnhancedConversions** - The conversion goal is not eligible for enhanced conversions.</li><li>**ConversionEmailAddressIsNotHashed** - The provided email address is not hashed as required.</li><li>**ConversionPhoneNumberIsNotHashed** - The provided phone number is not hashed as required.</li><li>**OfflineConversionMSClickIdNullOrEmpty** - The MSClickId field is null or empty.</li><li>**OfflineConversionMSClickIdInvalid** - The MSClickId field is invalid.</li><li>**OfflineConversionNameNullOrEmpty** - The conversion name is null or empty.</li><li>**OfflineConversionValueInvalid** - The conversion value is invalid (e.g., exceeds the maximum allowed value or is negative).</li><li>**OfflineConversionCurrencyCodeInvalid** - The currency code for the conversion value is invalid.</li><li>**OfflineConversionTimeNullOrEmpty** - The conversion time is null or empty.</li><li>**OfflineConversionTimeInvalid** - The conversion time is invalid or cannot be parsed.</li><li>**FutureConversionTimeCannotBeSet** - The conversion time is set to a future date.</li><li>**OfflineConversionTimeOutOfWindow** - The conversion time is outside the allowed lookback window.</li><li>**ConversionTimeEarlierThanClickTime** - The conversion time is earlier than the click time.</li><li>**ClickIdDateTimeOutsideGoalConversionWindow** - The click ID's date-time is outside the goal's conversion window.</li><li>**OfflineConversionInvalidAdjustmentType** - The adjustment type for the offline conversion is invalid.</li><li>**ExternalAttributionRequiredFieldEmpty** - One of the required external attribution fields is empty.</li><li>**ExternalAttributionModelTooLong** - The external attribution model exceeds the maximum allowed length.</li><li>**ExternalAttributionCreditValueInvalid** - The external attribution credit value is invalid (e.g., not between 0 and 1).</li><li>**GoalNotEligibleForExternalAttribution** - The goal is not eligible for external attribution.</li><li>**OfflineConversionRestateRetractNotSupported** - Restate or retract adjustment types are not supported.</li><li>**OfflineConversionAdjustmentTimeNullOrEmpty** - The adjustment time is null or empty.</li><li>**OfflineConversionAdjustmentTimeInvalid** - The adjustment time is invalid or cannot be parsed.</li><li>**OfflineConversionFutureAdjustmentTimeCannotBeSet** - The adjustment time is set to a future date.</li><li>**OfflineConversionAdjustmentTimeOutOfWindow** - The adjustment time is outside the allowed lookback window.</li><li>**OfflineConversionAdjustmentTimeEarlierThanConversionTime** - The adjustment time is earlier than the conversion time.</li><li>**OfflineConversionAdjustmentValueNotExpected** - An adjustment value is provided when it is not expected.</li><li>**OfflineConversionAdjustmentValueRequired** - An adjustment value is required but not provided.</li></ul>|**string**|
|<a name="timezone"></a>TimeZone|Determines the time zone that is used to establish today's date.<br/><br/>When you submit the report request today's date can vary around the world depending on the time zone. The report time period that you choose e.g., 'Yesterday' is then relative to today's date.<br/><br/>If you do not choose a time zone, the Reporting service uses PacificTimeUSCanadaTijuana by default. For example, a report requested without a time zone specified at 2 AM EasternTimeUSCanada on 2/2/2019 for 'Yesterday' will be interpreted as a request for 1/31/2019. A report requested at the same time for 'Yesterday' with time zone set as EasternTimeUSCanada will be interpreted as a request for 2/1/2019|**dateTime**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetOfflineConversionReports](getofflineconversionreports.md)  
