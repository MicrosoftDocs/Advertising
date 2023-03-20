---
title: CampaignAdGroupIds Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Identifies a campaign and the list of its ad groups to import.
---
# CampaignAdGroupIds Data Object - Campaign Management
Identifies a campaign and the list of its ad groups to import. 

## Syntax
```xml
<xs:complexType name="CampaignAdGroupIds" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ActiveAdGroupsOnly" nillable="true" type="xs:boolean">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element name="AdGroupIds" nillable="true" type="q125:ArrayOflong" xmlns:q125="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element name="CampaignId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CampaignAdGroupIds](campaignadgroupids.md) object has the following elements: [ActiveAdGroupsOnly](#activeadgroupsonly), [AdGroupIds](#adgroupids), [CampaignId](#campaignid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="activeadgroupsonly"></a>ActiveAdGroupsOnly|Determines whether to include paused ad groups or only import active ad groups.<br/><br/>This element is not returned by default. To get this element, include the ActiveAdGroupsOnly value in the ReturnAdditionalFields element when you call the [GetImportJobsByIds](getimportjobsbyids.md#returnadditionalfields) and [GetImportResults](getimportresults.md#returnadditionalfields) service operations.<br/><br/>If this element is *true* and if the [AdGroupIds](#adgroupids) is not set, then only active ad groups from the campaign will be imported. Paused ad groups will not be imported.<br/><br/>If this element is *false* or empty, then all of the campaign's ad groups will be imported.<br/><br/>This element is ignored if specific ad groups are selected in the [AdGroupIds](#adgroupids) element.|**boolean**|
|<a name="adgroupids"></a>AdGroupIds|Identifies the list of specific ad groups to import within the campaign.<br/><br/>If this element is nil or empty, include all ad groups of the campaign. The [ActiveAdGroupsOnly](#activeadgroupsonly) element determines whether to include paused ad groups or only import active ad groups.|**long** array|
|<a name="campaignid"></a>CampaignId|Identifies the campaign to import.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GoogleImportJob](googleimportjob.md)  
