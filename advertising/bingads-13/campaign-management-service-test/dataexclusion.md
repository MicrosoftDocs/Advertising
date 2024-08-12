---
title: DataExclusion Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for DataExclusion.(test)
---
# DataExclusion Data Object Test - Campaign Management
Defines a data object for DataExclusion.

# [XML](#tab/xml)

```xml
<xs:complexType name="DataExclusion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CampaignAssociations" nillable="true" type="tns:ArrayOfCampaignAssociation" />
    <xs:element minOccurs="0" name="CampaignTypeFilter" nillable="true" type="tns:CampaignType" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="DeviceTypeFilter" nillable="true" type="tns:DeviceType" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CampaignAssociations": [
    {
      "CampaignId": "ValueHere"
    }
  ],
  "CampaignTypeFilter": "ValueHere",
  "Description": "ValueHere",
  "DeviceTypeFilter": "ValueHere",
  "EndDate": "ValueHere",
  "Id": "ValueHere",
  "Name": "ValueHere",
  "StartDate": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DataExclusion](dataexclusion.md) object has the following elements: [CampaignAssociations](#campaignassociations), [CampaignTypeFilter](#campaigntypefilter), [Description](#description), [DeviceTypeFilter](#devicetypefilter), [EndDate](#enddate), [Id](#id), [Name](#name), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignassociations"></a>CampaignAssociations|Which campaigns to include for the data exclusion.|[CampaignAssociation](campaignassociation.md) array|
|<a name="campaigntypefilter"></a>CampaignTypeFilter|Which campaign types to include for the data exclusion.|[CampaignType](campaigntype.md)|
|<a name="description"></a>Description|A description for the data exclusion.|**string**|
|<a name="devicetypefilter"></a>DeviceTypeFilter|Which devices types to include for the data exclusion.|[DeviceType](devicetype.md)|
|<a name="enddate"></a>EndDate|The end date.<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|
|<a name="id"></a>Id|The data exclusion ID.|**long**|
|<a name="name"></a>Name|The data exclusion name.|**string**|
|<a name="startdate"></a>StartDate|The start date.<br/><br/>**Important:** The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddDataExclusions](adddataexclusions.md)  
[GetDataExclusionsByAccountId](getdataexclusionsbyaccountid.md)  
[GetDataExclusionsByIds](getdataexclusionsbyids.md)  
[UpdateDataExclusions](updatedataexclusions.md)  
