---
title: AdGroupCriterion Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a criterion that you want applied to the specified ad group.(test)
---
# AdGroupCriterion Data Object Test - Campaign Management
Defines a criterion that you want applied to the specified ad group.

Do not try to instantiate an *AdGroupCriterion*. You can create one or more of the following objects that derive from it.
- [BiddableAdGroupCriterion](biddableadgroupcriterion.md)
- [NegativeAdGroupCriterion](negativeadgroupcriterion.md)

## Syntax
```xml
<xs:complexType name="AdGroupCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="Criterion" nillable="true" type="tns:Criterion" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:AdGroupCriterionStatus" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AdGroupCriterion](adgroupcriterion.md) object has the following elements: [AdGroupId](#adgroupid), [Criterion](#criterion), [Id](#id), [Status](#status), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The identifier of the ad group to apply the criterion to.|**long**|
|<a name="criterion"></a>Criterion|The criterion to apply to the ad group. The criterion helps determine whether ads in the ad group are served.<br/><br/>For a list of available criterion types, see [AdGroupCriterionType](adgroupcriteriontype.md).|[Criterion](criterion.md)|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the ad group criterion.|**long**|
|<a name="status"></a>Status|A status value that determines whether to apply the criterion to the ad group.|[AdGroupCriterionStatus](adgroupcriterionstatus.md)|
|<a name="type"></a>Type|The type of ad group criterion. For more information, see [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by whether you instantiate a [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [NegativeAdGroupCriterion](negativeadgroupcriterion.md).

If you generate the SOAP manually, use the *type* attribute of the `<AdGroupCriterion>` node as shown in the following example, to specify the type of criterion.

```xml
<AdGroupCriterion i:type="BiddableAdGroupCriterion" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <Id i:nil="true" />
    <Status i:nil="true" />
     . . .
</AdGroupCriterion>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAdGroupCriterions](addadgroupcriterions.md)  
[AdGroupCriterionAction](adgroupcriterionaction.md)  
[GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md)  
[UpdateAdGroupCriterions](updateadgroupcriterions.md)  
