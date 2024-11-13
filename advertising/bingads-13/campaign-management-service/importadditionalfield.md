---
title: ImportAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a list of optional import properties that you can request when calling GetImportJobsByIds and GetImportResults.
---
# ImportAdditionalField Value Set - Campaign Management
Defines a list of optional import properties that you can request when calling [GetImportJobsByIds](getimportjobsbyids.md#returnadditionalfields) and [GetImportResults](getimportresults.md#returnadditionalfields). The additional field values enable you to get the latest features using the current version of Campaign Management API, and in the next version the corresponding properties will be included in the ad by default. 

## Syntax
```xml
<xs:simpleType name="ImportAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="None">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">0</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="NotificationEmail">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="AutoDeviceBidOptimization">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="ActiveAdGroupsOnly">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="SearchAndReplaceForCustomParameters">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="AdScheduleUseSearcherTimezone">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="NewImageAdExtensions">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateImageAdExtensions">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">64</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="SearchAndReplaceForFinalURLSuffix">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">128</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="RenameCampaignNameWithSuffix">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">256</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateAdUrls">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">512</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="NewLogoAdExtensions">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1024</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateLogoAdExtensions">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2048</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateSitelinkUrls">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4096</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="NewLeadFormAdExtensions">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8192</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateLeadFormAdExtensions">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16384</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="NewAccountNegativeKeywords">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32768</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateAccountNegativeKeywords">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">65536</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateAdCustomizerAttributes">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">131072</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="NewConversionGoals">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">262144</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateConversionGoals">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">524288</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="NewBrandSuitability">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1048576</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UpdateBrandSuitability">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2097152</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ImportAdditionalField](importadditionalfield.md) value set has the following values: [ActiveAdGroupsOnly](#activeadgroupsonly), [AdScheduleUseSearcherTimezone](#adscheduleusesearchertimezone), [AutoDeviceBidOptimization](#autodevicebidoptimization), [NewAccountNegativeKeywords](#newaccountnegativekeywords), [NewBrandSuitability](#newbrandsuitability), [NewConversionGoals](#newconversiongoals), [NewImageAdExtensions](#newimageadextensions), [NewLeadFormAdExtensions](#newleadformadextensions), [NewLogoAdExtensions](#newlogoadextensions), [None](#none), [NotificationEmail](#notificationemail), [RenameCampaignNameWithSuffix](#renamecampaignnamewithsuffix), [SearchAndReplaceForCustomParameters](#searchandreplaceforcustomparameters), [SearchAndReplaceForFinalURLSuffix](#searchandreplaceforfinalurlsuffix), [UpdateAccountNegativeKeywords](#updateaccountnegativekeywords), [UpdateAdCustomizerAttributes](#updateadcustomizerattributes), [UpdateAdUrls](#updateadurls), [UpdateBrandSuitability](#updatebrandsuitability), [UpdateConversionGoals](#updateconversiongoals), [UpdateImageAdExtensions](#updateimageadextensions), [UpdateLeadFormAdExtensions](#updateleadformadextensions), [UpdateLogoAdExtensions](#updatelogoadextensions), [UpdateSitelinkUrls](#updatesitelinkurls).

|Value|Description|
|-----------|---------------|
|<a name="activeadgroupsonly"></a>ActiveAdGroupsOnly|Request that the [ActiveAdGroupsOnly](campaignadgroupids.md#activeadgroupsonly) element be returned within the [CampaignAdGroupIds](googleimportjob.md#campaignadgroupids) element of each returned [GoogleImportJob](googleimportjob.md) object.|
|<a name="adscheduleusesearchertimezone"></a>AdScheduleUseSearcherTimezone|Request that the [AdScheduleUseSearcherTimezone](googleimportoption.md#adscheduleusesearchertimezone) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="autodevicebidoptimization"></a>AutoDeviceBidOptimization|Request that the [AutoDeviceBidOptimization](googleimportoption.md#autodevicebidoptimization) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="newaccountnegativekeywords"></a>NewAccountNegativeKeywords|Request that the [NewAccountNegativeKeywords](googleimportoption.md#newaccountnegativekeywords) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="newbrandsuitability"></a>NewBrandSuitability|Request that the [NewBrandSuitability](googleimportoption.md#newbrandsuitability) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="newconversiongoals"></a>NewConversionGoals|Request that the [NewConversionGoals](googleimportoption.md#newconversiongoals) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="newimageadextensions"></a>NewImageAdExtensions|Request that the [NewImageAdExtensions](googleimportoption.md#newimageadextensions) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="newleadformadextensions"></a>NewLeadFormAdExtensions|Request that the [NewLeadFormAdExtensions](googleimportoption.md#newleadformadextensions) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="newlogoadextensions"></a>NewLogoAdExtensions|Request that the [NewLogoAdExtensions](googleimportoption.md#newlogoadextensions) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="none"></a>None|Reserved for internal use.|
|<a name="notificationemail"></a>NotificationEmail|Request that the [NotificationEmail](googleimportjob.md#notificationemail) element be included within each returned [GoogleImportJob](googleimportjob.md) object.|
|<a name="renamecampaignnamewithsuffix"></a>RenameCampaignNameWithSuffix|Request that the [RenameCampaignNameWithSuffix](googleimportoption.md#renamecampaignnamewithsuffix) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="searchandreplaceforcustomparameters"></a>SearchAndReplaceForCustomParameters|Request that the [SearchAndReplaceForCustomParameters](googleimportoption.md#searchandreplaceforcustomparameters) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="searchandreplaceforfinalurlsuffix"></a>SearchAndReplaceForFinalURLSuffix|Request that the [SearchAndReplaceForFinalURLSuffix](googleimportoption.md#searchandreplaceforfinalurlsuffix) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updateaccountnegativekeywords"></a>UpdateAccountNegativeKeywords|Request that the [UpdateAccountNegativeKeywords](googleimportoption.md#updateaccountnegativekeywords) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updateadcustomizerattributes"></a>UpdateAdCustomizerAttributes|Request that the [UpdateAdCustomizerAttributes](googleimportoption.md#updateadcustomizerattributes) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updateadurls"></a>UpdateAdUrls|Request that the [UpdateAdUrls](googleimportoption.md#updateadurls) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updatebrandsuitability"></a>UpdateBrandSuitability|Request that the [UpdateBrandSuitability](googleimportoption.md#updatebrandsuitability) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updateconversiongoals"></a>UpdateConversionGoals|Request that the [UpdateConversionGoals](googleimportoption.md#updateconversiongoals) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updateimageadextensions"></a>UpdateImageAdExtensions|Request that the [UpdateImageAdExtensions](googleimportoption.md#updateimageadextensions) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updateleadformadextensions"></a>UpdateLeadFormAdExtensions|Request that the [UpdateLeadFormAdExtensions](googleimportoption.md#updateleadformadextensions) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updatelogoadextensions"></a>UpdateLogoAdExtensions|Request that the [UpdateLogoAdExtensions](googleimportoption.md#updatelogoadextensions) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="updatesitelinkurls"></a>UpdateSitelinkUrls|Request that the [UpdateSitelinkUrls](googleimportoption.md#updatesitelinkurls) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetImportJobsByIds](getimportjobsbyids.md)  
[GetImportResults](getimportresults.md)  
