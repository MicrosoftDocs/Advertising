---
title: AudienceType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible audience types.
---
# AudienceType Value Set - Campaign Management
Defines the possible audience types.

## Syntax
```xml
<xs:simpleType name="AudienceType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="RemarketingList" />
        <xs:enumeration value="Custom" />
        <xs:enumeration value="InMarket" />
        <xs:enumeration value="Product" />
        <xs:enumeration value="SimilarRemarketingList" />
        <xs:enumeration value="CombinedList" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```
> [!NOTE]
> We don't support CustomerMatch type audience in the SOAP API calls.
## <a name="values"></a>Values

The [AudienceType](audiencetype.md) value set has the following values: [CombinedList](#combinedlist), [Custom](#custom), [InMarket](#inmarket), [Product](#product), [RemarketingList](#remarketinglist), [SimilarRemarketingList](#similarremarketinglist).

|Value|Description|
|-----------|---------------|
|<a name="combinedlist"></a>CombinedList|The audience is a combined list.|
|<a name="custom"></a>Custom|The audience is a custom audience.|
|<a name="inmarket"></a>InMarket|The audience is an in-market audience.|
|<a name="product"></a>Product|The audience is a product audience.|
|<a name="remarketinglist"></a>RemarketingList|The audience is a remarketing list.|
|<a name="similarremarketinglist"></a>SimilarRemarketingList|The audience is a similar remarketing list.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Audience](audience.md)  
[AudienceCriterion](audiencecriterion.md)  
[GetAudiencesByIds](getaudiencesbyids.md)  
