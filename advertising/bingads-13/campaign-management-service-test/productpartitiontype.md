---
title: ProductPartitionType Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible types of product partitions.(test)
---
# ProductPartitionType Value Set Test - Campaign Management
Defines the possible types of product partitions.

## Syntax
```xml
<xs:simpleType name="ProductPartitionType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Subdivision">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Unit">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ProductPartitionType](productpartitiontype.md) value set has the following values: [Subdivision](#subdivision), [Unit](#unit).

|Value|Description|
|-----------|---------------|
|<a name="subdivision"></a>Subdivision|The [ProductPartition](productpartition.md) is a product group subdivision. A subdivision is also referred to as a branch node in a tree.|
|<a name="unit"></a>Unit|The [ProductPartition](productpartition.md) is a product group unit. A unit is also referred to as a leaf node in a tree.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ProductPartition](productpartition.md)  
