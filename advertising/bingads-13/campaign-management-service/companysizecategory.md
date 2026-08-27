---
title: CompanySizeCategory Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the company size category object.
---
# CompanySizeCategory Value Set - Campaign Management
Defines the company size category object.

## Syntax
```xml
<xs:simpleType name="CompanySizeCategory" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="MyselfOnly">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">65</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Size2To10">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">66</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Size11To50">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">67</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Size51To200">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">68</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Size201To500">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">69</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Size501To1000">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">70</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Size1001To5000">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">71</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Size5001To10000">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">72</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Size10001Plus">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">73</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CompanySizeCategory](companysizecategory.md) value set has the following values: [MyselfOnly](#myselfonly), [Size10001Plus](#size10001plus), [Size1001To5000](#size1001to5000), [Size11To50](#size11to50), [Size201To500](#size201to500), [Size2To10](#size2to10), [Size5001To10000](#size5001to10000), [Size501To1000](#size501to1000), [Size51To200](#size51to200), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="myselfonly"></a>MyselfOnly|The company size is myself only.|
|<a name="size10001plus"></a>Size10001Plus|The company size is more than 10001.|
|<a name="size1001to5000"></a>Size1001To5000|The company size is 1001-5000.|
|<a name="size11to50"></a>Size11To50|The company size is 1-50.|
|<a name="size201to500"></a>Size201To500|The company size is 201-500.|
|<a name="size2to10"></a>Size2To10|The company size is 2-10.|
|<a name="size5001to10000"></a>Size5001To10000|The company size is 5001-10000.|
|<a name="size501to1000"></a>Size501To1000|The company size is 501-1000.|
|<a name="size51to200"></a>Size51To200|The company size is 51-200.|
|<a name="unknown"></a>Unknown|The company size is unknown.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[LinkedInCompanyData](linkedincompanydata.md)  
