---
title: ImportEntityStatistics Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: The statistical import results for an entity type.
---
# ImportEntityStatistics Data Object - Campaign Management
The statistical import results for an entity type.

## Syntax
```xml
<xs:complexType name="ImportEntityStatistics" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Additions" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Changes" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Deletions" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="EntityType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Errors" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Total" nillable="true" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ImportEntityStatistics](importentitystatistics.md) object has the following elements: [Additions](#additions), [Changes](#changes), [Deletions](#deletions), [EntityType](#entitytype), [Errors](#errors), [Total](#total).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="additions"></a>Additions|The count of items added during import of the [entity type](#entitytype).|**int**|
|<a name="changes"></a>Changes|The count of items changed or updated during import of the [entity type](#entitytype).|**int**|
|<a name="deletions"></a>Deletions|The count of items deleted during import of the [entity type](#entitytype).|**int**|
|<a name="entitytype"></a>EntityType|The type of entity eligible for import.<br/><br/>For more information, see the [remarks](#remarks) below.|**string**|
|<a name="errors"></a>Errors|The count of errors during import of the [entity type](#entitytype).|**int**|
|<a name="total"></a>Total|The total count of additions, changes, deletions, and errors during import of the [entity type](#entitytype).|**int**|

## <a name="remarks"></a>Remarks
Import additions, updates, deletions, and errors results are available for the following entity types. New entity types might be added in the future, so you should not take any dependency on a fixed set of values. You can download similar Google import entity statistics as follows via the Microsoft Advertising web application. 

```csv
EntityType via API,EntityType via Microsoft Advertising UI
Ad,Ads
Ad Extension,Ad extensions
Ad Group,Ad Groups
Ad Group Age Criterion,Ad Group Age Targets
Ad Group Combined List Association,Ad Group Combined List Targets
Ad Group DayTime Criterion,Ad Group Day Time Targets
Ad Group DeviceOS Criterion,Ad Group Device Targets
Ad Group Gender Criterion,Ad Group Gender Targets
Ad Group In Market Audience Association,Ad Group In-market Audience Targets
Ad Group Location Criterion,Ad Group Location Targets
Ad Group Location Intent Criterion,Ad Group Location Intent Targets
Ad Group Negative Age Criterion,Ad Group Negative Age Targets
Ad Group Negative Combined List Association,Ad Group Negative Combined List Targets
Ad Group Negative Gender Criterion,Ad Group Negative Gender Targets
Ad Group Negative In Market Audience Association,Ad Group Negative In-market Audience Targets
Ad Group Negative Keyword,Ad Group Negative Keywords
Ad Group Negative Location Criterion,Ad Group Negative Location Targets
Ad Group Negative Remarketing List Association,Ad Group Negative Remarketing List Targets
Ad Group Negative Site,Ad Group Negative Sites
Ad Group Product Partition,Product Groups
Ad Group Radius Criterion,Ad Group Radius Targets
Ad Group Remarketing List Association,Ad Group Remarketing List Targets
AdGroup DSA Criterion,Ad Group Auto Targets and Exclusions
Campaign,Campaigns
Campaign Age Criterion,Campaign Age Targets
Campaign Combined List Association,Campaign Combined List Targets
Campaign DayTime Criterion,Campaign Day Time Targets
Campaign DeviceOS Criterion,Campaign Device Targets
Campaign Feed,Campaign Criteria
Campaign Gender Criterion,Campaign Gender Targets
Campaign In Market Audience Association,Campaign In-market Audience Targets
Campaign Location Criterion,Campaign Location Targets
Campaign Location Intent Criterion,Campaign Location Intent Targets
Campaign Negative Combined List Association,Campaign Negative Combined List Targets
Campaign Negative Dynamic Search Ad Target,Campaign Auto Target Exclusions
Campaign Negative In Market Audience Association,Campaign Negative In-market Audience Targets
Campaign Negative Keyword,Campaign Negative Keywords
Campaign Negative Keyword List Association,Campaign Criteria
Campaign Negative Location Criterion,Campaign Negative Location Targets
Campaign Negative Remarketing List Association,Campaign Negative Remarketing List Targets
Campaign Negative Site,Campaign Negative Sites
Campaign Product Scope,Campaign Criteria
Campaign Radius Criterion,Campaign Radius Targets
Campaign Remarketing List Association,Campaign Remarketing List Targets
Combined List,Combined lists
Feed,Feeds
Feed Item,Feed items
Keyword,Keywords
Media,N/A
Negative Keyword List,Negative Keyword Lists
Remarketing List,Remarketing lists
Shared Negative Keyword,Shared Negative Keywords
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ImportResult](importresult.md)  
