---
title: AdvertiserAILabel Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the advertiser's declaration about AI-generated content and visible watermarks in an asset.
---
# AdvertiserAILabel Value Set - Campaign Management
Defines the advertiser's declaration about AI-generated content and visible watermarks in an asset.

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon!

Advertisers can set this value when adding or updating supported image and video assets. After the label has been set, it cannot be cleared. To declare that an asset does not contain AI-generated content, use *NoAIContent*.

This declaration is separate from Microsoft's read-only [SystemAIDetectionSignal](systemaidetectionsignal.md). For more information, see [AI transparency](../guides/ai-transparency.md).

## Syntax
```xml
<xs:simpleType name="AdvertiserAILabel" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <ActualType Name="unsignedByte" Namespace="http://www.w3.org/2001/XMLSchema" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
    </xs:appinfo>
  </xs:annotation>
  <xs:restriction base="xs:string">
    <xs:enumeration value="NotSupportedForGivenRevision" />
    <xs:enumeration value="AIWithVisibleWatermark" />
    <xs:enumeration value="AIContent" />
    <xs:enumeration value="NoAIContent" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdvertiserAILabel](advertiserailabel.md) value set has the following values: [AIContent](#aicontent), [AIWithVisibleWatermark](#aiwithvisiblewatermark), [NoAIContent](#noaicontent), [NotSupportedForGivenRevision](#notsupportedforgivenrevision).

|Value|Description|
|-----------|---------------|
|<a name="aicontent"></a>AIContent|The asset contains AI-generated content but does not have a visible watermark.|
|<a name="aiwithvisiblewatermark"></a>AIWithVisibleWatermark|The asset contains AI-generated content and has a visible watermark.|
|<a name="noaicontent"></a>NoAIContent|The advertiser declares that the asset does not contain AI-generated content.|
|<a name="notsupportedforgivenrevision"></a>NotSupportedForGivenRevision|The requested API revision does not expose this capability.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Media](media.md)  
[MediaMetaData](mediametadata.md)  
[Video](video.md)  
