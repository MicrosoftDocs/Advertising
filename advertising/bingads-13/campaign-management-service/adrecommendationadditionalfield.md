---
title: AdRecommendationAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation additional field value set.
---
# AdRecommendationAdditionalField Value Set - Campaign Management
The ad recommendation additional field value set.

## Syntax
```xml
<xs:simpleType name="AdRecommendationAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="ImageSuggestionMetadata">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="MediaRefineResults">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="PromptBrandWarning">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdRecommendationAdditionalField](adrecommendationadditionalfield.md) value set has the following values: [ImageSuggestionMetadata](#imagesuggestionmetadata), [MediaRefineResults](#mediarefineresults), [PromptBrandWarning](#promptbrandwarning).

|Value|Description|
|-----------|---------------|
|<a name="imagesuggestionmetadata"></a>ImageSuggestionMetadata|The meta data for the suggested image.|
|<a name="mediarefineresults"></a>MediaRefineResults|The media refine results.|
|<a name="promptbrandwarning"></a>PromptBrandWarning|Whether the brand is detected in the request prompt.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CreateAssetGroupRecommendation](createassetgrouprecommendation.md)  
[CreateResponsiveAdRecommendation](createresponsiveadrecommendation.md)  
[RefineAssetGroupRecommendation](refineassetgrouprecommendation.md)  
[RefineResponsiveAdRecommendation](refineresponsiveadrecommendation.md)  
