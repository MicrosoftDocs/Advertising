---
title: OfflineConversionUnattributedReason Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Indicates why a conversion failed to be attributed.
---
# OfflineConversionUnattributedReason Value Set - Campaign Management
Indicates why a conversion failed to be attributed.

## Syntax
```xml
<xs:simpleType name="OfflineConversionUnattributedReason" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="AdjustmentOriginalNotFound" />
    <xs:enumeration value="ConversionAlreadyRetracted" />
    <xs:enumeration value="DuplicateConversionKey" />
    <xs:enumeration value="ConversionTimeExceedsMaxLookback" />
    <xs:enumeration value="ConversionTimeInFuture" />
    <xs:enumeration value="GoalNotFoundOrInactive">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">11</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ClickTimestampAfterConversion">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">12</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="NoMatchingClickFound">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">13</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MissingMatchIdentifiers">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">14</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="OutsideGoalLookbackWindow">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">15</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AccountMismatch">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MalformedData">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">17</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HistoricalClickDataExpired">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">18</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [OfflineConversionUnattributedReason](offlineconversionunattributedreason.md) value set has the following values: [AccountMismatch](#accountmismatch), [AdjustmentOriginalNotFound](#adjustmentoriginalnotfound), [ClickTimestampAfterConversion](#clicktimestampafterconversion), [ConversionAlreadyRetracted](#conversionalreadyretracted), [ConversionTimeExceedsMaxLookback](#conversiontimeexceedsmaxlookback), [ConversionTimeInFuture](#conversiontimeinfuture), [DuplicateConversionKey](#duplicateconversionkey), [GoalNotFoundOrInactive](#goalnotfoundorinactive), [HistoricalClickDataExpired](#historicalclickdataexpired), [MalformedData](#malformeddata), [MissingMatchIdentifiers](#missingmatchidentifiers), [NoMatchingClickFound](#nomatchingclickfound), [OutsideGoalLookbackWindow](#outsidegoallookbackwindow), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="accountmismatch"></a>AccountMismatch|Matching clicks were found, but all clicks are from other customers or accounts.|
|<a name="adjustmentoriginalnotfound"></a>AdjustmentOriginalNotFound|The record is an adjustment (restate or retract) but the corresponding original conversion record doesn't exist.|
|<a name="clicktimestampafterconversion"></a>ClickTimestampAfterConversion|The click time is after the conversion time.|
|<a name="conversionalreadyretracted"></a>ConversionAlreadyRetracted|The conversion record has already been retracted. A second adjust attempt isn't permitted.|
|<a name="conversiontimeexceedsmaxlookback"></a>ConversionTimeExceedsMaxLookback|The conversion time is older than 90 days.|
|<a name="conversiontimeinfuture"></a>ConversionTimeInFuture|The conversion time is in the future.|
|<a name="duplicateconversionkey"></a>DuplicateConversionKey|Duplicate keys are detected (*MsClickId*, *ConversionName*, *ConversionTime*, *HashedEmailAddress*, *HashedPhoneNumber*), or a record with the same key has already been successfully attributed.|
|<a name="goalnotfoundorinactive"></a>GoalNotFoundOrInactive|No matching goal exists for the conversion name, or the associated goal is inactive.|
|<a name="historicalclickdataexpired"></a>HistoricalClickDataExpired|Original conversion exists, but the associated click is older than 90 days.|
|<a name="malformeddata"></a>MalformedData|The upload contains malformed data or characters that prevent processing.|
|<a name="missingmatchidentifiers"></a>MissingMatchIdentifiers|*MsClickId* is empty, and although *HashedEmailAddress* or *HashedPhoneNumber* is provided, no click could be found via enhanced conversions.|
|<a name="nomatchingclickfound"></a>NoMatchingClickFound|No matching click could be found based on *MsClickId*, *HashedEmailAddress*, or *HashedPhoneNumber*.|
|<a name="outsidegoallookbackwindow"></a>OutsideGoalLookbackWindow|Click falls outside the lookback window defined in the goal settings.|
|<a name="unknown"></a>Unknown|The error is unspecified. This field is used for backward compatibility.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[OfflineConversionAlert](offlineconversionalert.md)  
