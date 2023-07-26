---
title: AudienceDimension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: An object that inherits AudienceGroupDimension.
---
# AudienceDimension Data Object - Campaign Management
An object that inherits AudienceGroupDimension.

## Syntax
```xml
<xs:complexType name="AudienceDimension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AudienceGroupDimension">
      <xs:sequence>
        <xs:element minOccurs="0" name="Audiences" nillable="true" type="tns:ArrayOfAudienceInfo" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AudienceDimension](audiencedimension.md) object has the following elements: [Audiences](#audiences).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiences"></a>Audiences|A list of audiences. The supported audience types are: <br /><br />- CombinedList<br />- CustomAudience <br />- InMarketAudience <br />- ProductAudience <br />- RemarketingList <br />- SimilarRemarketingList <br />- CustomerList <br /><br />**Add**: Required <br />**Update**: Optional. To remove existing values, set it to null or empty; to remove a subset of audience segments, specify the audience segments that you want to keep and it will replace the existing audience segments.   |[AudienceInfo](audienceinfo.md) array|

The [AudienceDimension](audiencedimension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudiencegroupdimension"></a>Inherited Elements from AudienceGroupDimension
The [AudienceDimension](audiencedimension.md) object derives from the [AudienceGroupDimension](audiencegroupdimension.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [AudienceDimension](audiencedimension.md), and might not apply to other objects that inherit the same elements from the [AudienceGroupDimension](audiencegroupdimension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of audience.<br /><br />**Add**: Read-only <br />**Update**: Read-only |[AudienceGroupDimensionType](audiencegroupdimensiontype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  
