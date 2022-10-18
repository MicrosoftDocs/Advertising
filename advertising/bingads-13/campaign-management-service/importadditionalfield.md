---
title: ImportAdditionalField Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
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
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ImportAdditionalField](importadditionalfield.md) value set has the following values: [ActiveAdGroupsOnly](#activeadgroupsonly), [AdScheduleUseSearcherTimezone](#adscheduleusesearchertimezone), [AutoDeviceBidOptimization](#autodevicebidoptimization), [NewImageAdExtensions](#newimageadextensions), [None](#none), [NotificationEmail](#notificationemail), [SearchAndReplaceForCustomParameters](#searchandreplaceforcustomparameters), [SearchAndReplaceForFinalURLSuffix](#searchandreplaceforfinalurlsuffix), [UpdateImageAdExtensions](#updateimageadextensions).

|Value|Description|
|-----------|---------------|
|<a name="activeadgroupsonly"></a>ActiveAdGroupsOnly|Request that the [ActiveAdGroupsOnly](campaignadgroupids.md#activeadgroupsonly) element be returned within the [CampaignAdGroupIds](googleimportjob.md#campaignadgroupids) element of each returned [GoogleImportJob](googleimportjob.md) object.|
|<a name="adscheduleusesearchertimezone"></a>AdScheduleUseSearcherTimezone|Reserved.|
|<a name="autodevicebidoptimization"></a>AutoDeviceBidOptimization|Request that the [AutoDeviceBidOptimization](googleimportoption.md#autodevicebidoptimization) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="newimageadextensions"></a>NewImageAdExtensions|Reserved.|
|<a name="none"></a>None|Reserved for internal use.|
|<a name="notificationemail"></a>NotificationEmail|Request that the [NotificationEmail](googleimportjob.md#notificationemail) element be included within each returned [GoogleImportJob](googleimportjob.md) object.|
|<a name="searchandreplaceforcustomparameters"></a>SearchAndReplaceForCustomParameters|Request that the [SearchAndReplaceForCustomParameters](googleimportoption.md#searchandreplaceforcustomparameters) element be included within each returned [GoogleImportOption](googleimportoption.md) object.|
|<a name="searchandreplaceforfinalurlsuffix"></a>SearchAndReplaceForFinalURLSuffix|Reserved.|
|<a name="updateimageadextensions"></a>UpdateImageAdExtensions|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetImportJobsByIds](getimportjobsbyids.md)  
[GetImportResults](getimportresults.md)  
