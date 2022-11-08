---
title: CampaignCriterionType Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible types of campaign criterions.
ms.subservice: campaign-management-api
---
# CampaignCriterionType Value Set - Campaign Management
Defines the possible types of campaign criterions.

> [!TIP]
> For an overview of how to use target criterions e.g., company name and location, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

## Syntax
```xml
<xs:simpleType name="CampaignCriterionType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="ProductScope" />
        <xs:enumeration value="Webpage">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Targets">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Age">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="DayTime">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Gender">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">64</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Location">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">128</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Radius">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">256</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Device">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">512</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="LocationIntent">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1024</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Audience">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2048</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="CustomAudience">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4096</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="InMarketAudience">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8192</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="RemarketingList">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16384</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="CompanyName">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32768</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="JobFunction">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">65536</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Industry">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">131072</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="ProductAudience">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">262144</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="SimilarRemarketingList">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">524288</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Store">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1048576</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="CombinedList">
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

The [CampaignCriterionType](campaigncriteriontype.md) value set has the following values: [Age](#age), [Audience](#audience), [CombinedList](#combinedlist), [CompanyName](#companyname), [CustomAudience](#customaudience), [DayTime](#daytime), [Device](#device), [Gender](#gender), [Industry](#industry), [InMarketAudience](#inmarketaudience), [JobFunction](#jobfunction), [Location](#location), [LocationIntent](#locationintent), [ProductAudience](#productaudience), [ProductScope](#productscope), [Radius](#radius), [RemarketingList](#remarketinglist), [SimilarRemarketingList](#similarremarketinglist), [Store](#store), [Targets](#targets), [Webpage](#webpage).

|Value|Description|
|-----------|---------------|
|<a name="age"></a>Age|The campaign criterion is an age criterion.<br/><br/>The *Criterion* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) can be an instance of [AgeCriterion](agecriterion.md), but age criterion are not supported with [NegativeCampaignCriterion](negativecampaigncriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="audience"></a>Audience|The campaign criterion is an audience criterion.<br/><br/>The *Criterion* element of either the [BiddableCampaignCriterion](biddablecampaigncriterion.md) or [NegativeCampaignCriterion](negativecampaigncriterion.md) can be an instance of [AudienceCriterion](audiencecriterion.md). In other words you can include some audiences, and exclude other audiences.<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.<br/><br/>To add, delete, or update audience criterions i.e., combined lists, custom audiences, in-market audiences, product audiences, similar audiences, and remarketing lists, you must specify the *Audience* value. To retrieve these audience criterions via [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md) you must request the specific type i.e., *CombinedList*, *CustomAudience*, *InMarketAudience*, *ProductAudience*, *RemarketingList*, and *SimilarRemarketingList*.|
|<a name="combinedlist"></a>CombinedList|The campaign criterion is a combined list association.<br/><br/>This criterion type value is only used by the [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md) operation to request the combined list associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the combined list, see [CombinedList](combinedlist.md).|
|<a name="companyname"></a>CompanyName|The campaign criterion is a company name profile criterion.<br/><br/>The *Criterion* element of either the [BiddableCampaignCriterion](biddablecampaigncriterion.md) or [NegativeCampaignCriterion](negativecampaigncriterion.md) can be an instance of [ProfileCriterion](profilecriterion.md) where the [ProfileType](profilecriterion.md#profiletype) is set to *CompanyName*. In other words you can include some profiles, and exclude other profiles.<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="customaudience"></a>CustomAudience|The campaign criterion is a custom audience association.<br/><br/>This criterion type value is only used by the [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md) operation to request the custom audience associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the custom audience, see [CustomAudience](customaudience.md).|
|<a name="daytime"></a>DayTime|The campaign criterion is a day and time criterion.<br/><br/>The *Criterion* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) can be an instance of [DayTimeCriterion](daytimecriterion.md), but day and time criterion are not supported with [NegativeCampaignCriterion](negativecampaigncriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="device"></a>Device|The campaign criterion is a device criterion.<br/><br/>The *Criterion* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) can be an instance of [DeviceCriterion](devicecriterion.md), but device criterion are not supported with [NegativeCampaignCriterion](negativecampaigncriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="gender"></a>Gender|The campaign criterion is a gender criterion.<br/><br/>The *Criterion* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) can be an instance of [GenderCriterion](gendercriterion.md), but gender criterion are not supported with [NegativeCampaignCriterion](negativecampaigncriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="industry"></a>Industry|The campaign criterion is an industry profile criterion.<br/><br/>The *Criterion* element of either the [BiddableCampaignCriterion](biddablecampaigncriterion.md) or [NegativeCampaignCriterion](negativecampaigncriterion.md) can be an instance of [ProfileCriterion](profilecriterion.md) where the [ProfileType](profilecriterion.md#profiletype) is set to *Industry*. In other words you can include some profiles, and exclude other profiles.<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="inmarketaudience"></a>InMarketAudience|The campaign criterion is an in-market audience association.<br/><br/>This criterion type value is only used by the [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md) operation to request the in-market audience associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the in-market audience, see [InMarketAudience](inmarketaudience.md).|
|<a name="jobfunction"></a>JobFunction|The campaign criterion is a job function profile criterion.<br/><br/>The *Criterion* element of either the [BiddableCampaignCriterion](biddablecampaigncriterion.md) or [NegativeCampaignCriterion](negativecampaigncriterion.md) can be an instance of [ProfileCriterion](profilecriterion.md) where the [ProfileType](profilecriterion.md#profiletype) is set to *JobFunction*. In other words you can include some profiles, and exclude other profiles.<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="location"></a>Location|The campaign criterion is a location criterion.<br/><br/>The *Criterion* element of either a [BiddableCampaignCriterion](biddablecampaigncriterion.md) or [NegativeCampaignCriterion](negativecampaigncriterion.md) can be an instance of [LocationCriterion](locationcriterion.md). In other words you can include some locations, and exclude other locations.<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="locationintent"></a>LocationIntent|The campaign criterion is a location intent criterion.<br/><br/>The *Criterion* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) can be an instance of [LocationIntentCriterion](locationintentcriterion.md), but location intent criterion are not supported with [NegativeCampaignCriterion](negativecampaigncriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be nil or empty when paired with this criterion type.|
|<a name="productaudience"></a>ProductAudience|The campaign criterion is product audience association.<br/><br/>This criterion type value is only used by the [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md) operation to request the product audience associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the product audience, see [ProductAudience](productaudience.md).<br/><br/>This audience type can only be used with Audience campaigns that have a [ShoppingSetting](shoppingsetting.md).|
|<a name="productscope"></a>ProductScope|The campaign criterion is a product scope criterion.<br/><br/>The *Criterion* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) can be an instance of [ProductScope](productscope.md), but product scope criterion are not supported with [NegativeCampaignCriterion](negativecampaigncriterion.md).<br/><br/>This criterion type is only available with Audience, Search, and Shopping campaigns.<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [FixedBid](fixedbid.md) when paired with this criterion type.|
|<a name="radius"></a>Radius|The campaign criterion is a radius criterion.<br/><br/>The *Criterion* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) can be an instance of [RadiusCriterion](radiuscriterion.md), but radius criterion are not supported with [NegativeCampaignCriterion](negativecampaigncriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableCampaignCriterion](biddablecampaigncriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="remarketinglist"></a>RemarketingList|The campaign criterion is a remarketing list association.<br/><br/>This criterion type value is only used by the [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md) operation to request the remarketing list associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the remarketing list, see [RemarketingList](remarketinglist.md).|
|<a name="similarremarketinglist"></a>SimilarRemarketingList|The campaign criterion is a similar remarketing list association.<br/><br/>This criterion type value is only used by the [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md) operation to request the similar remarketing list associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the similar remarketing list, see [SimilarRemarketingList](similarremarketinglist.md).|
|<a name="store"></a>Store|The campaign criterion is a store criterion.<br/><br/>The *Criterion* element of a [NegativeCampaignCriterion](negativecampaigncriterion.md) can be an instance of [StoreCriterion](storecriterion.md), but store criterion are not supported with [BiddableCampaignCriterion](biddablecampaigncriterion.md).<br/><br/>This criterion type is only available with [shopping campaigns for brands](../guides/product-ads.md#setup-cooperative).|
|<a name="targets"></a>Targets|Represents one or more [AgeCriterion](agecriterion.md), [DayTimeCriterion](daytimecriterion.md), [DeviceCriterion](devicecriterion.md), [GenderCriterion](gendercriterion.md), [LocationCriterion](locationcriterion.md), [LocationIntentCriterion](locationintentcriterion.md), and [RadiusCriterion](radiuscriterion.md) objects that can be managed together to show ads based on your target criteria.<br/><br/>To add, delete, or update target criterions i.e., age, day and time, device, gender, location, location intent, and radius criterions, you must specify the *Targets* value. To retrieve these target criterions via [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md) you must request the specific type i.e., *Age*, *CompanyName*, *DayTime*, *Device*, *Gender*, *Industry*, *JobFunction*, *Location*, *LocationIntent*, and *Radius*.|
|<a name="webpage"></a>Webpage|The campaign criterion is a webpage criterion.<br/><br/>The *Criterion* element of a [NegativeCampaignCriterion](negativecampaigncriterion.md) can be an instance of [Webpage](webpage.md), but webpage criterion are not supported with [BiddableCampaignCriterion](biddablecampaigncriterion.md).<br/><br/>This criterion type is only available with Dynamic Search Ads campaigns.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddCampaignCriterions](addcampaigncriterions.md)  
[DeleteCampaignCriterions](deletecampaigncriterions.md)  
[GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md)  
[UpdateCampaignCriterions](updatecampaigncriterions.md)  
