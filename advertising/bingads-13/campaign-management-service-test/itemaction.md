---
title: ItemAction Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible types of item actions, for example to add, delete, or update the product partition criterion.(test)
---
# ItemAction Value Set Test - Campaign Management
Defines the possible types of item actions, for example to add, delete, or update the product partition criterion.

## Syntax
```xml
<xs:simpleType name="ItemAction" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Add">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Delete">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Update">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ItemAction](itemaction.md) value set has the following values: [Add](#add), [Delete](#delete), [Update](#update).

|Value|Description|
|-----------|---------------|
|<a name="add"></a>Add|The requested action is to add the item, for example add the [ProductPartition](productpartition.md).|
|<a name="delete"></a>Delete|The requested action is to delete the item, for example delete the [ProductPartition](productpartition.md).|
|<a name="update"></a>Update|The requested action is to update the item, for example update the [ProductPartition](productpartition.md).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroupCriterionAction](adgroupcriterionaction.md)  
[AssetGroupListingGroupAction](assetgrouplistinggroupaction.md)  
