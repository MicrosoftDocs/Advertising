---
title: ConversionGoalRevenueType Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines conversion goal revenue models that you can use to track how much each conversion is worth to your business.(test)
---
# ConversionGoalRevenueType Value Set Test - Campaign Management
Defines conversion goal revenue models that you can use to track how much each conversion is worth to your business.   

## Syntax
```xml
<xs:simpleType name="ConversionGoalRevenueType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="FixedValue" />
    <xs:enumeration value="VariableValue" />
    <xs:enumeration value="NoValue" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ConversionGoalRevenueType](conversiongoalrevenuetype.md) value set has the following values: [FixedValue](#fixedvalue), [NoValue](#novalue), [VariableValue](#variablevalue).

|Value|Description|
|-----------|---------------|
|<a name="fixedvalue"></a>FixedValue|Each time it happens, the conversion has the same value.|
|<a name="novalue"></a>NoValue|Don't assign a value for the conversion.|
|<a name="variablevalue"></a>VariableValue|The value of the conversion may vary for example, by purchase price. You'll need to customize your UET tag tracking code to report variable revenue. For more information, see [How to report variable revenue with UET](https://help.ads.microsoft.com/#apex/3/en/56687/2/en/#ext:none).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionGoalRevenue](conversiongoalrevenue.md)  
