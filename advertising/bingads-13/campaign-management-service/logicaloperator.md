---
title: LogicalOperator Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the supported set of logical operators for combined list audiences.
ms.subservice: campaign-management-api
---
# LogicalOperator Value Set - Campaign Management
Defines the supported set of logical operators for combined list audiences.

## Syntax
```xml
<xs:simpleType name="LogicalOperator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="And">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Or">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Not">
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

The [LogicalOperator](logicaloperator.md) value set has the following values: [And](#and), [Not](#not), [Or](#or).

|Value|Description|
|-----------|---------------|
|<a name="and"></a>And|Include only customers who are in every single one of these audience lists.|
|<a name="not"></a>Not|Exclude customers who are in any of these audience lists.|
|<a name="or"></a>Or|Include customers who are in any of these audience lists.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CombinationRule](combinationrule.md)  
