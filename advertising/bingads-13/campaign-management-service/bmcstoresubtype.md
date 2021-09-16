---
title: BMCStoreSubType Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the possible values for Microsoft Merchant Center store sub types.
---
# BMCStoreSubType Value Set - Campaign Management
Defines the possible values for Microsoft Merchant Center store sub types.

## Syntax
```xml
<xs:simpleType name="BMCStoreSubType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="CoOp">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="GlobalStore">
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

The [BMCStoreSubType](bmcstoresubtype.md) value set has the following values: [CoOp](#coop), [GlobalStore](#globalstore).

|Value|Description|
|-----------|---------------|
|<a name="coop"></a>CoOp|The Microsoft Merchant Center store supports Shopping Campaigns for Brands.|
|<a name="globalstore"></a>GlobalStore|With Shopping Campaigns for Brands the global store encompasses all linked stores under the current manager account.<br/><br/>You cannot exclude a global store via negative [StoreCriterion](storecriterion.md).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BMCStore](bmcstore.md)  
