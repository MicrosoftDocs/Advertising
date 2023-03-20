---
title: BidOption Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Determines whether or not to amplify your partner's bid.
---
# BidOption Value Set - Campaign Management
Determines whether or not to amplify your partner's bid. 

> [!NOTE]
> This value set is reserved for internal use, and will be removed in a future API version.  

## Syntax
```xml
<xs:simpleType name="BidOption" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="BidValue" />
    <xs:enumeration value="BidBoost" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BidOption](bidoption.md) value set has the following values: [BidBoost](#bidboost), [BidValue](#bidvalue).

|Value|Description|
|-----------|---------------|
|<a name="bidboost"></a>BidBoost|A bid boost allows you to amplify your partner's bid.<br/><br/>You should only use BidBoost if your partner uses BidValue.|
|<a name="bidvalue"></a>BidValue|A bid value ad group allows you to bid on products that your merchandising partner doesn't target.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CoOpSetting](coopsetting.md)  
