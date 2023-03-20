---
title: EntityType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines entity types for association and editorial service operations.
---
# EntityType Value Set - Campaign Management
Defines entity types for association and editorial service operations.

## Syntax
```xml
<xs:simpleType name="EntityType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Campaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AdGroup">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Ad">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Keyword">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [EntityType](entitytype.md) value set has the following values: [Ad](#ad), [AdGroup](#adgroup), [Campaign](#campaign), [Keyword](#keyword).

|Value|Description|
|-----------|---------------|
|<a name="ad"></a>Ad|The entity is an ad.|
|<a name="adgroup"></a>AdGroup|The entity is an ad group.|
|<a name="campaign"></a>Campaign|The entity is a campaign.|
|<a name="keyword"></a>Keyword|The entity is a keyword.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AppealEditorialRejections](appealeditorialrejections.md)  
[DeleteLabelAssociations](deletelabelassociations.md)  
[GetEditorialReasonsByIds](geteditorialreasonsbyids.md)  
[GetLabelAssociationsByEntityIds](getlabelassociationsbyentityids.md)  
[GetLabelAssociationsByLabelIds](getlabelassociationsbylabelids.md)  
[SetLabelAssociations](setlabelassociations.md)  
