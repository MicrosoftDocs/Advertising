---
title: NormalForm Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible normal form types.
ms.subservice: campaign-management-api
---
# NormalForm Value Set - Campaign Management
Defines the possible normal form types.

## Syntax
```xml
<xs:simpleType name="NormalForm" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Conjunctive">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Disjunctive">
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

The [NormalForm](normalform.md) value set has the following values: [Conjunctive](#conjunctive), [Disjunctive](#disjunctive).

|Value|Description|
|-----------|---------------|
|<a name="conjunctive"></a>Conjunctive|Refers to conjunctive normal form (CNF) that can be described as an AND of ORs or a product of sums.<br/><br/>First, a set of conditions are joined using the logical OR operator. Then, the results are joined using the logical AND operator. The boolean logic will be evaluated as true if any of the conditions are met within all of the groups.|
|<a name="disjunctive"></a>Disjunctive|Refers to disjunctive normal form (DNF) that can be described as an OR of ANDs or a sum of products.<br/><br/>First, a set of conditions are joined using the logical AND operator. Then, the results are joined using the logical OR operator. The boolean logic will be evaluated as true if all of the conditions are met within any of the groups.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[PageVisitorsRule](pagevisitorsrule.md)  
