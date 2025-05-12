---
title: AssetGroupListingGroup Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: A listing group that corresponds directly to the identifiers specified in the request.
---
# AssetGroupListingGroup Data Object - Campaign Management
A listing group that corresponds directly to the identifiers specified in the request. If an identifier in the list is not valid, the corresponding item in the response is set to null.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AssetGroupListingGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssetGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="AssetGroupListingType" type="tns:AssetGroupListingType" />
    <xs:element minOccurs="0" name="Dimension" nillable="true" type="tns:ProductCondition" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="IsExcluded" type="xs:boolean" />
    <xs:element minOccurs="0" name="ListingGroupPath" nillable="true" type="xs:string">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="ParentListingGroupId" nillable="true" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AssetGroupId": "LongValueHere",
  "AssetGroupListingType": "ValueHere",
  "Dimension": {
    "Attribute": "ValueHere",
    "Operand": "ValueHere",
    "Operator": "ValueHere"
  },
  "Id": "LongValueHere",
  "IsExcluded": "ValueHere",
  "ListingGroupPath": "ValueHere",
  "ParentListingGroupId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AssetGroupListingGroup](assetgrouplistinggroup.md) object has the following elements: [AssetGroupId](#assetgroupid), [AssetGroupListingType](#assetgrouplistingtype), [Dimension](#dimension), [Id](#id), [IsExcluded](#isexcluded), [ListingGroupPath](#listinggrouppath), [ParentListingGroupId](#parentlistinggroupid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="assetgroupid"></a>AssetGroupId|The identifier of the asset group this listing group belongs to.<br /><br />**Add**: Required <br />**Update**: Not supported <br />**Delete**: Required |**long**|
|<a name="assetgrouplistingtype"></a>AssetGroupListingType|The type of listing group, e.g., *Subdivision* or *Unit*.<br /><br />**Add**: Required<br />**Update**: Not supported<br />**Delete**: Optional|[AssetGroupListingType](assetgrouplistingtype.md)|
|<a name="dimension"></a>Dimension|A condition that helps determine whether a product from the Microsoft Merchant Center store gets served as an ad. <br /><br />Multiple product conditions can be specified by creating a tree of AssetGroupListingGroup objects using ApplyAssetGroupListingGroupActions. For a catalog item to be served as an ad, it must meet all conditions. <br /><br />**Add**: Required <br />**Update**: Not supported <br />**Delete**: Optional |[ProductCondition](productcondition.md)|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the AssetGroupListingGroup. <br /><br />**Add**: Read-only <br />**Update**: Read-only |**long**|
|<a name="isexcluded"></a>IsExcluded|Set to *true* If you want to exclude products specified by current. Otherwise, the products will be included. <br /><br />Default value is *false*. <br /><br />**Add**: Optional <br />**Update**: Not supported<br />**Delete**: Optional |**boolean**|
|<a name="listinggrouppath"></a>ListingGroupPath|The path of a listing group node.<br /><br />**Add**: Read-only <br />**Update**: Read-only <br />**Delete**: Read-only|**string**|
|<a name="parentlistinggroupid"></a>ParentListingGroupId|The identifier of the parent listing group. <br /><br />This element must be set to null if the listing group node represents the root node of a listing group tree.<br /><br />**Add**: Required <br />**Update**: Not supported <br />**Delete**: Required|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroupListingGroupAction](assetgrouplistinggroupaction.md)  
[GetAssetGroupListingGroupsByIds](getassetgrouplistinggroupsbyids.md)  
