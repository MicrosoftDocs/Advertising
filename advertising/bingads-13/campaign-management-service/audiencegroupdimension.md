---
title: AudienceGroupDimension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an AudienceGroupDimension data object.
---
# AudienceGroupDimension Data Object - Campaign Management
Defines an AudienceGroupDimension data object.

> [!WARNING]
> Do not try to instantiate an AudienceGroupDimension. You can create one or more of the following objects that derive from it: AgeDimension, GenderDimension, AudienceDimension.

## Syntax
```xml
<xs:complexType name="AudienceGroupDimension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Type" type="tns:AudienceGroupDimensionType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AudienceGroupDimension](audiencegroupdimension.md) object has the following elements: [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of audience dimensions, the following dimension types are supported as of now: *Age*, *Gender*, *Audience*.   <br /><br />**Add**: For more information about audience types, see the [Remarks](../campaign-management-service/audience.md#remarks). <br />**Update**: For more information about audience types, see the [Remarks](../campaign-management-service/audience.md#remarks). |[AudienceGroupDimensionType](audiencegroupdimensiontype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AudienceGroup](audiencegroup.md)  
