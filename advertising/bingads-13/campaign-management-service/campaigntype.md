---
title: CampaignType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible campaign types.
---
# CampaignType Value Set - Campaign Management
Defines the possible campaign types.

## Syntax
```xml
<xs:simpleType name="CampaignType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Search" />
        <xs:enumeration value="Shopping" />
        <xs:enumeration value="DynamicSearchAds" />
        <xs:enumeration value="Audience" />
        <xs:enumeration value="Hotel">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="PerformanceMax">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">64</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CampaignType](campaigntype.md) value set has the following values: [Audience](#audience), [DynamicSearchAds](#dynamicsearchads), [Hotel](#hotel), [PerformanceMax](#performancemax), [Search](#search), [Shopping](#shopping).

|Value|Description|
|-----------|---------------|
|<a name="audience"></a>Audience|The campaign is an Audience campaign.<br/><br/>If the sub type is set to *AudienceVideoAds*, the campaign is a video audience campaign.|
|<a name="dynamicsearchads"></a>DynamicSearchAds|The campaign is a Dynamic Search Ads campaign.<br/><br/>Dynamic search ads campaign type is no longer supported. Dynamic search ads can be created in "SearchDynamic" ad groups of a search campaign.|
|<a name="hotel"></a>Hotel|The campaign is a Hotel campaign.|
|<a name="performancemax"></a>PerformanceMax|The campaign is a Performance max campaign.|
|<a name="search"></a>Search|The campaign is a Search campaign.|
|<a name="shopping"></a>Shopping|The campaign is a Microsoft Shopping campaign.<br/><br/>You should also check the campaign [SubType](campaign.md#subtype) to determine whether the shopping campaign is setup for [Shopping Campaigns for Brands](../guides/product-ads.md#setup-cooperative).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BidStrategy](bidstrategy.md)  
[Campaign](campaign.md)  
[GetCampaignsByAccountId](getcampaignsbyaccountid.md)  
[GetCampaignsByIds](getcampaignsbyids.md)  
