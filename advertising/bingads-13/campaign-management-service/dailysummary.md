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
|<a name="channelname"></a>ChannelName|The channel name: *WebUI*, *SOAP*, or *Bulk*.|**string**|
|<a name="conversionname"></a>ConversionName|The conversion goal name.|**string**|
|<a name="conversionoradjustmentvalue"></a>ConversionOrAdjustmentValue|The offline conversion value or adjustment value.|**double**|
|<a name="conversionoradjustmentvaluecurrency"></a>ConversionOrAdjustmentCurrency|The currency of the offline conversion value or adjustment value.|**string**|
|<a name="conversiontime"></a>ConversionTime|The date and time when the offline conversion occurred.|**dateTime**|
|<a name="goalid"></a>GoalId|The Microsoft Advertising assigned identifier of a conversion goal.|**long**|
|<a name="hashedemailaddress"></a>HashedEmailAddress|The hashed email address using the SHA-256 algorithm for use with enhanced conversions.|**string**|
|<a name="hashedphonenumber"></a>HashedPhoneNumber|The hashed phone number according to the E.164 standard for use with enhanced conversions.|**string**|
|<a name="ididentifier"></a>IdIdentifier|The unique identifier for the upload request.|**string**|
|<a name="microsoftclickid"></a>MicrosoftClickId|The MSCLKID for the offline conversion.|**string**|
|<a name="recordid"></a>RecordId|The unique identifier for each offline conversion.|**string**|
|<a name="status"></a>Status|The status of the daily summary. Either **Success** or one of the following: <ul><li>**OfflineConversionsNullOrEmpty** - Indicates that the offline conversions array is null or empty.</li><li>**OfflineConversionBatchSizeExceedsLimit** - The number of offline conversions exceeds the allowed batch size limit.</li><li>**OfflineConversionIsNull** - An individual offline conversion object is null.</li><li>**OfflineConversionGoalTooRecent** - The offline conversion goal was created less than two hours before the import.</li><li>**OfflineConversionNameInvalid** - The provided offline conversion name does not match any existing goal.</li><li>**NotEligibleForEnhancedConversions** - The conversion goal is not eligible for enhanced conversions.</li><li>**ConversionEmailAddressIsNotHashed** - The provided email address is not hashed as required.</li><li>**ConversionPhoneNumberIsNotHashed** - The provided phone number is not hashed as required.</li><li>**OfflineConversionMSClickIdNullOrEmpty** - The MSClickId field is null or empty.</li><li>**OfflineConversionMSClickIdInvalid** - The MSClickId field is invalid.</li><li>**OfflineConversionNameNullOrEmpty** - The conversion name is null or empty.</li><li>**OfflineConversionValueInvalid** - The conversion value is invalid (e.g., exceeds the maximum allowed value or is negative).</li><li>**OfflineConversionCurrencyCodeInvalid** - The currency code for the conversion value is invalid.</li><li>**OfflineConversionTimeNullOrEmpty** - The conversion time is null or empty.</li><li>**OfflineConversionTimeInvalid** - The conversion time is invalid or cannot be parsed.</li><li>**FutureConversionTimeCannotBeSet** - The conversion time is set to a future date.</li><li>**OfflineConversionTimeOutOfWindow** - The conversion time is outside the allowed lookback window.</li><li>**ConversionTimeEarlierThanClickTime** - The conversion time is earlier than the click time.</li><li>**ClickIdDateTimeOutsideGoalConversionWindow** - The click ID's date-time is outside the goal's conversion window.</li><li>**OfflineConversionInvalidAdjustmentType** - The adjustment type for the offline conversion is invalid.</li><li>**ExternalAttributionRequiredFieldEmpty** - One of the required external attribution fields is empty.</li><li>**ExternalAttributionModelTooLong** - The external attribution model exceeds the maximum allowed length.</li><li>**ExternalAttributionCreditValueInvalid** - The external attribution credit value is invalid (e.g., not between 0 and 1).</li><li>**GoalNotEligibleForExternalAttribution** - The goal is not eligible for external attribution.</li><li>**OfflineConversionRestateRetractNotSupported** - Restate or retract adjustment types are not supported.</li><li>**OfflineConversionAdjustmentTimeNullOrEmpty** - The adjustment time is null or empty.</li><li>**OfflineConversionAdjustmentTimeInvalid** - The adjustment time is invalid or cannot be parsed.</li><li>**OfflineConversionFutureAdjustmentTimeCannotBeSet** - The adjustment time is set to a future date.</li><li>**OfflineConversionAdjustmentTimeOutOfWindow** - The adjustment time is outside the allowed lookback window.</li><li>**OfflineConversionAdjustmentTimeEarlierThanConversionTime** - The adjustment time is earlier than the conversion time.</li><li>**OfflineConversionAdjustmentValueNotExpected** - An adjustment value is provided when it is not expected.</li><li>**OfflineConversionAdjustmentValueRequired** - An adjustment value is required but not provided.</li></ul>|**string**|
|<a name="timezone"></a>TimeZone|Determines the time zone that is used to establish today's date.|**dateTime**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetOfflineConversionReports](getofflineconversionreports.md)  
