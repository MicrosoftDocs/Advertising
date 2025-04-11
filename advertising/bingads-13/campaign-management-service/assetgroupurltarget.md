---
title: AssetGroupUrlTarget Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the asset group URL target data object.
---
# AssetGroupUrlTarget Data Object - Campaign Management
Defines the asset group URL target data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AssetGroupUrlTarget" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Status" type="tns:GenericEntityStatus" />
    <xs:element minOccurs="0" name="TargetCondition1" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TargetCondition2" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TargetCondition3" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TargetConditionOperator1" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TargetConditionOperator2" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TargetConditionOperator3" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TargetValue1" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TargetValue2" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TargetValue3" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "Status": "ValueHere",
  "TargetCondition1": "ValueHere",
  "TargetCondition2": "ValueHere",
  "TargetCondition3": "ValueHere",
  "TargetConditionOperator1": "ValueHere",
  "TargetConditionOperator2": "ValueHere",
  "TargetConditionOperator3": "ValueHere",
  "TargetValue1": "ValueHere",
  "TargetValue2": "ValueHere",
  "TargetValue3": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AssetGroupUrlTarget](assetgroupurltarget.md) object has the following elements: [Id](#id), [Status](#status), [TargetCondition1](#targetcondition1), [TargetCondition2](#targetcondition2), [TargetCondition3](#targetcondition3), [TargetConditionOperator1](#targetconditionoperator1), [TargetConditionOperator2](#targetconditionoperator2), [TargetConditionOperator3](#targetconditionoperator3), [TargetValue1](#targetvalue1), [TargetValue2](#targetvalue2), [TargetValue3](#targetvalue3).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="status"></a>Status|Reserved.|[GenericEntityStatus](genericentitystatus.md)|
|<a name="targetcondition1"></a>TargetCondition1|Reserved.|**string**|
|<a name="targetcondition2"></a>TargetCondition2|Reserved.|**string**|
|<a name="targetcondition3"></a>TargetCondition3|Reserved.|**string**|
|<a name="targetconditionoperator1"></a>TargetConditionOperator1|Reserved.|**string**|
|<a name="targetconditionoperator2"></a>TargetConditionOperator2|Reserved.|**string**|
|<a name="targetconditionoperator3"></a>TargetConditionOperator3|Reserved.|**string**|
|<a name="targetvalue1"></a>TargetValue1|Reserved.|**string**|
|<a name="targetvalue2"></a>TargetValue2|Reserved.|**string**|
|<a name="targetvalue3"></a>TargetValue3|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroup](assetgroup.md)  
