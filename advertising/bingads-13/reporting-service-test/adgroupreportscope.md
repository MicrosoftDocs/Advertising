---
title: AdGroupReportScope Data Object Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an ad group to include in the report.(test)
---
# AdGroupReportScope Data Object Test - Reporting
Defines an ad group to include in the report.

# [XML](#tab/xml)

```xml
<xs:complexType name="AdGroupReportScope" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="AccountId" type="xs:long" />
    <xs:element name="CampaignId" type="xs:long" />
    <xs:element name="AdGroupId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountId": "LongValueHere",
  "AdGroupId": "LongValueHere",
  "CampaignId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdGroupReportScope](adgroupreportscope.md) object has the following elements: [AccountId](#accountid), [AdGroupId](#adgroupid), [CampaignId](#campaignid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of the account that the ad group belongs to.|**long**|
|<a name="adgroupid"></a>AdGroupId|The identifier of the ad group to limit the scope to.|**long**|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign that the ad group belongs to.|**long**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AccountThroughAdGroupReportScope](accountthroughadgroupreportscope.md)  
