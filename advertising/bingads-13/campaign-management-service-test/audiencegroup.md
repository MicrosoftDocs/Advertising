---
title: AudienceGroup Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an AudienceGroup data object.(test)
---
# AudienceGroup Data Object Test - Campaign Management
Defines an AudienceGroup data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="AudienceGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssociationCount" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Dimensions" nillable="true" type="tns:ArrayOfAudienceGroupDimension" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AssociationCount": "IntValueHere",
  "Description": "ValueHere",
  "Dimensions": [
    {
      "Type": "Age",
      "AgeRanges": [
        "ValueHere"
      ]
    }
  ],
  "Id": "LongValueHere",
  "Name": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AudienceGroup](audiencegroup.md) object has the following elements: [AssociationCount](#associationcount), [Description](#description), [Dimensions](#dimensions), [Id](#id), [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="associationcount"></a>AssociationCount|The number of asset groups that associate with this audience group.  <br /><br />**Add**: Read-only <br />**Update**: Read-only |**int**|
|<a name="description"></a>Description|The description of the audience. Use a description to help you remember what audience you are using. <br /><br />**Add**: Optional <br />**Update**: Optional. If no value is set for the update, this setting is not changed. |**string**|
|<a name="dimensions"></a>Dimensions|Positive dimensions that specifying the audience composition.  It should have at least one dimension. <br /><br />**Add**: Required, at least one dimension is needed.  <br />**Update**: Optional. For each dimension type (age, gender, audience): <br />- If not present in the array, it's not changed.<br />- If it's present in the array, take Age dimension type as an example: <br />&nbsp;&nbsp;&nbsp;&nbsp;- If AgeRanges is set to null or empty, it'll remove existing values for this dimension type. <br />&nbsp;&nbsp;&nbsp;&nbsp;- If AgeRanges has data, it simply replaces existing values. <br /><br />*Note:* You can't remove all dimension types. An error will be returned and no changes will be made.|[AudienceGroupDimension](audiencegroupdimension.md) array|
|<a name="id"></a>Id|The system-generated ID. <br /><br />**Add**: Read-only <br />**Update**: Required |**long**|
|<a name="name"></a>Name|The name of the audience signal, the name must be unique among all audience groups within the account. The name can contain a maximum of 256 characters. <br /><br />**Add**: Required <br />**Update**: Optional |**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAudienceGroups](addaudiencegroups.md)  
[GetAudienceGroupsByIds](getaudiencegroupsbyids.md)  
[UpdateAudienceGroups](updateaudiencegroups.md)  
