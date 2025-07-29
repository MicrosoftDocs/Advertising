---
title: AdGroupCriterionType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible types of ad group criterions.
---
# AdGroupCriterionType Value Set - Campaign Management
Defines the possible types of ad group criterions.

> [!TIP]
> For an overview of how to use target criterions e.g., company name and location, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

## Syntax
```xml
<xs:simpleType name="AdGroupCriterionType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <ActualType Name="long" Namespace="http://www.w3.org/2001/XMLSchema" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
    </xs:appinfo>
  </xs:annotation>
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="ProductPartition">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
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
        <xs:enumeration value="Gender">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="DayTime">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">64</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Device">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">128</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Location">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">256</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="LocationIntent">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">512</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Radius">
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
        <xs:enumeration value="CombinedList">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1048576</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="HotelGroup">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2097152</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="HotelAdvanceBookingWindow">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4194304</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="HotelCheckInDay">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8388608</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="HotelLengthOfStay">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16777216</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="HotelDateSelectionType">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">33554432</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="HotelCheckInDate">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">67108864</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Genre">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">134217728</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="CustomerList">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">268435456</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="ImpressionBasedRemarketingList">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">536870912</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Placement">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1073741824</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Topic">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2147483648</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdGroupCriterionType](adgroupcriteriontype.md) value set has the following values: [Age](#age), [Audience](#audience), [CombinedList](#combinedlist), [CompanyName](#companyname), [CustomAudience](#customaudience), [CustomerList](#customerlist), [DayTime](#daytime), [Device](#device), [Gender](#gender), [Genre](#genre), [HotelAdvanceBookingWindow](#hoteladvancebookingwindow), [HotelCheckInDate](#hotelcheckindate), [HotelCheckInDay](#hotelcheckinday), [HotelDateSelectionType](#hoteldateselectiontype), [HotelGroup](#hotelgroup), [HotelLengthOfStay](#hotellengthofstay), [ImpressionBasedRemarketingList](#impressionbasedremarketinglist), [Industry](#industry), [InMarketAudience](#inmarketaudience), [JobFunction](#jobfunction), [Location](#location), [LocationIntent](#locationintent), [Placement](#placement), [ProductAudience](#productaudience), [ProductPartition](#productpartition), [Radius](#radius), [RemarketingList](#remarketinglist), [SimilarRemarketingList](#similarremarketinglist), [Targets](#targets), [Topic](#topic), [Webpage](#webpage).

|Value|Description|
|-----------|---------------|
|<a name="age"></a>Age|The ad group criterion is an age criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [AgeCriterion](agecriterion.md). The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.<br/><br/>Age exclusions with [NegativeAdGroupCriterion](negativeadgroupcriterion.md) are only supported with Audience campaigns.|
|<a name="audience"></a>Audience|The ad group criterion is an audience criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [AudienceCriterion](audiencecriterion.md). In other words you can include some audiences, and exclude other audiences.<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.<br/><br/>To add, delete, or update audience criterions i.e., combined lists, custom audiences, customer lists, impression-based remarketing lists, in-market audiences, product audiences, similar audiences, and remarketing lists, you must specify the *Audience* value. To retrieve these audience criterions via [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) you must request the specific type i.e., *CombinedList*, *CustomAudience*, *CustomerList*, *ImpressionBasedRemarketingList*, *InMarketAudience*, *ProductAudience*, *RemarketingList*, and *SimilarRemarketingList*.|
|<a name="combinedlist"></a>CombinedList|The ad group criterion is a combined list association.<br/><br/>This criterion type value is only used by the [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) operation to request the combined list associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the combined list, see [CombinedList](combinedlist.md).|
|<a name="companyname"></a>CompanyName|The ad group criterion is a company name profile criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [ProfileCriterion](profilecriterion.md) where the [ProfileType](profilecriterion.md#profiletype) is set to *CompanyName*. In other words you can include some profiles, and exclude other profiles.<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="customaudience"></a>CustomAudience|The ad group criterion is a custom audience association.<br/><br/>This criterion type value is only used by the [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) operation to request the custom audience associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the custom audience, see [CustomAudience](customaudience.md).|
|<a name="customerlist"></a>CustomerList|The ad group criterion is a customer list.<br/><br/>This criterion type value is only used by the [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) operation to request the customer lists represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the custom audience, see [CustomerList](customerlist.md).|
|<a name="daytime"></a>DayTime|The ad group criterion is a day and time criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [DayTimeCriterion](daytimecriterion.md), but day and time criterion are not supported with [NegativeAdGroupCriterion](negativeadgroupcriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="device"></a>Device|The ad group criterion is a device criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [DeviceCriterion](devicecriterion.md), but device criterion are not supported with [NegativeAdGroupCriterion](negativeadgroupcriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="gender"></a>Gender|The ad group criterion is a gender criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [GenderCriterion](gendercriterion.md). The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.<br/><br/>Gender exclusions with [NegativeAdGroupCriterion](negativeadgroupcriterion.md) are only supported with Audience campaigns.|
|<a name="genre"></a>Genre|The ad group criterion is a genre criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [GenreCriterion](genrecriterion.md). The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="hoteladvancebookingwindow"></a>HotelAdvanceBookingWindow|The ad group criterion is a hotel advance booking window criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [HotelAdvanceBookingWindowCriterion](hoteladvancebookingwindowcriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="hotelcheckindate"></a>HotelCheckInDate|The ad group criterion is a hotel check in date criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [HotelCheckInDateCriterion](hotelcheckindatecriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="hotelcheckinday"></a>HotelCheckInDay|The ad group criterion is a hotel check in day criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [HotelCheckInDayCriterion](hotelcheckindaycriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="hoteldateselectiontype"></a>HotelDateSelectionType|The ad group criterion is a hotel date selection type criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [HotelDateSelectionTypeCriterion](hoteldateselectiontype.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="hotelgroup"></a>HotelGroup|The criterion type for lodging campaigns. Set *AdGroupCriterions* to *HotelGroup*.|
|<a name="hotellengthofstay"></a>HotelLengthOfStay|The ad group criterion is a hotel length of stay criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [HotelLengthOfStayCriterion](hotellengthofstaycriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="impressionbasedremarketinglist"></a>ImpressionBasedRemarketingList|The ad group criterion is an impression-based remarketing list.<br/><br/>This criterion type value is only used by the [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) operation to request the impression-based remarketing lists represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the impression-based remarketing list, see [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md).|
|<a name="industry"></a>Industry|The ad group criterion is an industry profile criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [ProfileCriterion](profilecriterion.md) where the [ProfileType](profilecriterion.md#profiletype) is set to *Industry*. In other words you can include some profiles, and exclude other profiles.<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="inmarketaudience"></a>InMarketAudience|The ad group criterion is an in-market audience association.<br/><br/>This criterion type value is only used by the [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) operation to request the in-market audience associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the in-market audience, see [InMarketAudience](inmarketaudience.md).|
|<a name="jobfunction"></a>JobFunction|The ad group criterion is a job function profile criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [ProfileCriterion](profilecriterion.md) where the [ProfileType](profilecriterion.md#profiletype) is set to *JobFunction*. In other words you can include some profiles, and exclude other profiles.<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="location"></a>Location|The ad group criterion is a location criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [LocationCriterion](locationcriterion.md). In other words you can include some locations, and exclude other locations.<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="locationintent"></a>LocationIntent|The ad group criterion is a location intent criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [LocationIntentCriterion](locationintentcriterion.md), but location intent criterion are not supported with [NegativeAdGroupCriterion](negativeadgroupcriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be nil or empty when paired with this criterion type.|
|<a name="placement"></a>Placement|The ad group criterion is a placement criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [PlacementCriterion](placementcriterion.md), but placement criterion are not supported with [NegativeAdGroupCriterion](negativeadgroupcriterion.md).|
|<a name="productaudience"></a>ProductAudience|The ad group criterion is product audience association.<br/><br/>This criterion type value is only used by the [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) operation to request the product audience associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the product audience, see [ProductAudience](productaudience.md).<br/><br/>This audience type can only be used with Audience campaigns that have a [ShoppingSetting](shoppingsetting.md).|
|<a name="productpartition"></a>ProductPartition|The ad group criterion is a product partition criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [ProductPartition](productpartition.md). In other words you can include some product partitions, and exclude other product partitions.<br/><br/>This criterion type is only used with Microsoft Shopping Campaigns.<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [FixedBid](fixedbid.md) when paired with this criterion type.|
|<a name="radius"></a>Radius|The ad group criterion is a radius criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [RadiusCriterion](radiuscriterion.md), but radius criterion are not supported with [NegativeAdGroupCriterion](negativeadgroupcriterion.md).<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [BidMultiplier](bidmultiplier.md) when paired with this criterion type.|
|<a name="remarketinglist"></a>RemarketingList|The ad group criterion is a remarketing list association.<br/><br/>This criterion type value is only used by the [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) operation to request the remarketing list associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the remarketing list, see [RemarketingList](remarketinglist.md).|
|<a name="similarremarketinglist"></a>SimilarRemarketingList|The ad group criterion is a similar remarketing list association.<br/><br/>This criterion type value is only used by the [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) operation to request the similar remarketing list associations represented by the [AudienceCriterion](audiencecriterion.md) objects. To manage the similar remarketing list, see [SimilarRemarketingList](similarremarketinglist.md).|
|<a name="targets"></a>Targets|Represents one or more [AgeCriterion](agecriterion.md), [DayTimeCriterion](daytimecriterion.md), [DeviceCriterion](devicecriterion.md), [GenderCriterion](gendercriterion.md), [LocationCriterion](locationcriterion.md), [LocationIntentCriterion](locationintentcriterion.md), [PlacementCriterion](placementcriterion.md), [ProfileCriterion](profilecriterion.md), [RadiusCriterion](radiuscriterion.md), and [TopicCriterion](topiccriterion.md) objects that can be managed together to show ads based on your target criteria.<br/><br/>To add, delete, or update target criterions i.e., age, company name, day and time, device, gender, industry, job function, location, location intent, placement, radius and topic criterions, you must specify the *CriterionType* value as *Targets*. You can add, delete, and update multiple target criterion types in the same operation. To retrieve these target criterions via [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) you must request the specific type individually i.e., *Age*, *CompanyName*, *DayTime*, *Device*, *Gender*, *Industry*, *JobFunction*, *Location*, *LocationIntent*, *Placement*, *Radius*, and *Topic*.|
|<a name="topic"></a>Topic|The ad group criterion is a topic criterion.<br/><br/>The *Criterion* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) can be an instance of [TopicCriterion](topiccriterion.md), but topic criterion are not supported with [NegativeAdGroupCriterion](negativeadgroupcriterion.md).|
|<a name="webpage"></a>Webpage|The ad group criterion is a webpage criterion.<br/><br/>The *Criterion* element of either the [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md) can be an instance of [Webpage](webpage.md), but webpage criterion are not supported with [BiddableAdGroupCriterion](biddableadgroupcriterion.md). In other words you can include some webpages, and exclude other webpages.<br/><br/>This criterion type can only be used with Dynamic Search Ads campaigns.<br/><br/>The *CriterionBid* element of a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) must be an instance of [FixedBid](fixedbid.md) when paired with this criterion type.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAdGroupCriterions](addadgroupcriterions.md)  
[DeleteAdGroupCriterions](deleteadgroupcriterions.md)  
[GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md)  
[UpdateAdGroupCriterions](updateadgroupcriterions.md)  
