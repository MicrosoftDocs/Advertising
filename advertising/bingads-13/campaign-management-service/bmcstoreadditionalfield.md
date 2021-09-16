---
title: BMCStoreAdditionalField Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a list of optional store properties that you can request when calling GetBMCStoresByCustomerId.
---
# BMCStoreAdditionalField Value Set - Campaign Management
Defines a list of optional store properties that you can request when calling [GetBMCStoresByCustomerId](getbmcstoresbycustomerid.md).

## Syntax
```xml
<xs:simpleType name="BMCStoreAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="GlobalStore" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BMCStoreAdditionalField](bmcstoreadditionalfield.md) value set has the following values: [GlobalStore](#globalstore).

|Value|Description|
|-----------|---------------|
|<a name="globalstore"></a>GlobalStore|Request that the service return global stores with [SubType](bmcstore.md#subtype) set to [GlobalStore](bmcstoresubtype.md#globalstore).<br/><br/>Global stores are not included by default when you call [GetBMCStoresByCustomerId](getbmcstoresbycustomerid.md).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetBMCStoresByCustomerId](getbmcstoresbycustomerid.md)  
