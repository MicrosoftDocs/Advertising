---
title: AudienceInfo Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: An object containing and ID an type for an audience.(test)
---
# AudienceInfo Data Object Test - Campaign Management
An object containing and ID an type for an audience.

# [XML](#tab/xml)

```xml
<xs:complexType name="AudienceInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Type" type="tns:AudienceType" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "ValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AudienceInfo](audienceinfo.md) object has the following elements: [Id](#id), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The ID of the audience.|**long**|
|<a name="type"></a>Type|The type of the audience. <br /><br />**Add**: Read-only <br />**Update**: Read-only |[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AudienceDimension](audiencedimension.md)  
