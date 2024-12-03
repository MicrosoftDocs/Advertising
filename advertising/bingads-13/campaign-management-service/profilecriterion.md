---
title: ProfileCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a criterion that can be used to show ads to users in a specific company, industry, or job function.
---
# ProfileCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads to users in a specific company, industry, or job function. 

You can target customers by company, industry, or job function profiles (according to LinkedIn), so that your ads are displayed more frequently to people who will be interested in them. Each profile criterion defines a company, industry, or job function for the accompanying criterion bid adjustment. 
- Company, such as Microsoft, Alibaba.com, or KLM Royal Dutch Air Lines.
- Industry, such as finance, broadcast media, or law enforcement.
- Job function, such as sales, accounting, or purchasing.

The maximum number of company name profile criterions that you can apply to each campaign or ad group is 1,000. 

You can also exclude people from seeing your ads based on LinkedIn profiles. Excluded profiles are also known as negative profile criteria. Each negative profile criterion defines the company, industry, or job function of people who you do not want to see your ads. 

The supported criteria varies by campaign type. Microsoft Advertising applies a union of both campaign and ad group level profile criterions. However, if you apply a criterion with the same profile ID e.g., target or exclude the same company name at both the campaign and ad group level, then the ad group level criterion will override the campaign level criterion. 

|Criterion Association|Supported Campaign Types|
|----------|---------------|
|[BiddableCampaignCriterion](biddablecampaigncriterion.md)|DynamicSearchAds<br/>Search<br/>Shopping|
|[BiddableAdGroupCriterion](biddableadgroupcriterion.md)|Audience<br/>DynamicSearchAds<br/>Search<br/>Shopping|
|[NegativeAdGroupCriterion](negativeadgroupcriterion.md)|Audience|

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ProfileCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="ProfileId" type="xs:long" />
        <xs:element minOccurs="0" name="ProfileType" type="tns:ProfileType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "ProfileCriterion",
  "ProfileId": "LongValueHere",
  "ProfileType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ProfileCriterion](profilecriterion.md) object has the following elements: [ProfileId](#profileid), [ProfileType](#profiletype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="profileid"></a>ProfileId|The identifier of the company name, industry, or job function profile that you want to target.<br/><br/>For details about how to get profile identifiers, see [Profile Data](../guides/profile-data-files.md).<br/><br/>**Add:** Required<br/>**Update:** Required|**long**|
|<a name="profiletype"></a>ProfileType|Determines whether the profile criterion corresponds to a company name, industry, or job function.<br/><br/>**Add:** Required<br/>**Update:** Required|[ProfileType](profiletype.md)|

The [ProfileCriterion](profilecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [ProfileCriterion](profilecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ProfileCriterion](profilecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Profile* when you retrieve a profile criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

