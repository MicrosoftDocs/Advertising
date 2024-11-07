---
title: AutoTagType Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines possible values for an account level setting that determines whether to append or replace the supported UTM tracking codes.
---
# AutoTagType Value Set - Customer Management
Defines possible values for an account level setting that determines whether to append or replace the supported UTM tracking codes.

Microsoft Advertising can automatically add UTM tags to your destination URL so you can use your website analytics tool, for example Google Analytics, to track how people got to your website. Auto-tags are applied for example to expanded text ads, keywords, Microsoft Shopping Campaigns, and Sitelink Extensions. For details about auto-tagging, please see the Microsoft Advertising help article [How do I add UTM tags to my landing page URL?](https://help.ads.microsoft.com/#apex/3/en/56762/-1).

## Syntax
```xml
<xs:simpleType name="AutoTagType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Inactive" />
    <xs:enumeration value="Preserve" />
    <xs:enumeration value="Replace" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AutoTagType](autotagtype.md) value set has the following values: [Inactive](#inactive), [Preserve](#preserve), [Replace](#replace).

|Value|Description|
|-----------|---------------|
|<a name="inactive"></a>Inactive|Microsoft Advertising will not append any UTM tracking codes to your ad or keyword final URL.|
|<a name="preserve"></a>Preserve|Microsoft Advertising will automatically append the supported UTM tracking codes, and preserve any existing UTM tracking codes that you added to your ad or keyword's final URL.|
|<a name="replace"></a>Replace|Microsoft Advertising will automatically append the supported UTM tracking codes, and replace any of the existing and supported UTM tracking codes that you added to your ad or keyword's final URL.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
