---
title: AssetGroupReportScope Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for AssetGroupReportScope.
---
# AssetGroupReportScope Data Object - Reporting
Defines a data object for AssetGroupReportScope.

## Syntax
```xml
<xs:complexType name="AssetGroupReportScope" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="AccountId" type="xs:long" />
    <xs:element name="CampaignId" type="xs:long" />
    <xs:element name="AssetGroupId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AssetGroupReportScope](assetgroupreportscope.md) object has the following elements: [AccountId](#accountid), [AssetGroupId](#assetgroupid), [CampaignId](#campaignid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|Reserved.|**long**|
|<a name="assetgroupid"></a>AssetGroupId|Reserved.|**long**|
|<a name="campaignid"></a>CampaignId|Reserved.|**long**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AccountThroughAssetGroupReportScope](accountthroughassetgroupreportscope.md)  
