---
title: AssociationType Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the entity types that can be associated with an ad extension.
---
# AssociationType Value Set - Campaign Management
Defines the entity types that can be associated with an ad extension.

## Syntax
```xml
<xs:simpleType name="AssociationType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
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
    <xs:enumeration value="Account">
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

The [AssociationType](associationtype.md) value set has the following values: [Account](#account), [AdGroup](#adgroup), [Campaign](#campaign).

|Value|Description|
|-----------|---------------|
|<a name="account"></a>Account|Refers to ad extension associations with accounts.<br/><br/>Call ad extensions cannot be associated with an account.|
|<a name="adgroup"></a>AdGroup|Refers to ad extension associations with ad groups.<br/><br/>Call and Location ad extensions cannot be associated with an ad group.|
|<a name="campaign"></a>Campaign|Refers to ad extension associations with campaigns.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdExtensionAssociation](adextensionassociation.md)  
[DeleteAdExtensionsAssociations](deleteadextensionsassociations.md)  
[GetAdExtensionIdsByAccountId](getadextensionidsbyaccountid.md)  
[GetAdExtensionsAssociations](getadextensionsassociations.md)  
[GetAdExtensionsEditorialReasons](getadextensionseditorialreasons.md)  
[SetAdExtensionsAssociations](setadextensionsassociations.md)  
