---
title: PromotionDiscountModifier Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible types of promotion discount modifiers.(test)
---
# PromotionDiscountModifier Value Set Test - Campaign Management
Defines the possible types of promotion discount modifiers.

## Syntax
```xml
<xs:simpleType name="PromotionDiscountModifier" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="UpTo" />
    <xs:enumeration value="None" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PromotionDiscountModifier](promotiondiscountmodifier.md) value set has the following values: [None](#none), [Unknown](#unknown), [UpTo](#upto).

|Value|Description|
|-----------|---------------|
|<a name="none"></a>None|The promotion discount is not modified.|
|<a name="unknown"></a>Unknown|Reserved for future use.|
|<a name="upto"></a>UpTo|The promotion discount is modified with the "Up to" string prefix.<br/><br/>For example, if the unmodified promotion discount would be "$20 off shoes", the modified promotion is "Up to $20 off shoes."|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[PromotionAdExtension](promotionadextension.md)  
