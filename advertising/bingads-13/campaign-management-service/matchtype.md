---
title: MatchType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible match types for a keyword or negative keyword.
---
# MatchType Value Set - Campaign Management
Defines the possible match types for a keyword or negative keyword.

## Syntax
```xml
<xs:simpleType name="MatchType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <ActualType Name="unsignedByte" Namespace="http://www.w3.org/2001/XMLSchema" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
    </xs:appinfo>
  </xs:annotation>
  <xs:restriction base="xs:string">
    <xs:enumeration value="Exact" />
    <xs:enumeration value="Phrase" />
    <xs:enumeration value="Broad" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [MatchType](matchtype.md) value set has the following values: [Broad](#broad), [Exact](#exact), [Phrase](#phrase).

|Value|Description|
|-----------|---------------|
|<a name="broad"></a>Broad|The match type is Broad.|
|<a name="exact"></a>Exact|The match type is Exact.|
|<a name="phrase"></a>Phrase|The match type is Phrase.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Keyword](keyword.md)  
[NegativeKeyword](negativekeyword.md)  
