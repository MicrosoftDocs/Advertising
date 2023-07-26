---
title: CampaignCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a criterion that you want applied to the specified campaign.
---
# CampaignCriterion Data Object - Campaign Management
Defines a criterion that you want applied to the specified campaign.

Do not try to instantiate a *CampaignCriterion*. You can create one or more of the following objects that derive from it.
- [BiddableCampaignCriterion](biddablecampaigncriterion.md)
- [NegativeCampaignCriterion](negativecampaigncriterion.md)

## Syntax
```xml
<xs:complexType name="CampaignCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="CampaignId" type="xs:long" />
    <xs:element minOccurs="0" name="Criterion" nillable="true" type="tns:Criterion" />
    <xs:element xmlns:q97="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q97:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:CampaignCriterionStatus" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CampaignCriterion](campaigncriterion.md) object has the following elements: [CampaignId](#campaignid), [Criterion](#criterion), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign to apply the criterion to.|**long**|
|<a name="criterion"></a>Criterion|The criterion to apply to the campaign. The criterion helps determine whether ads in the campaign are served.<br/><br/>For a list of available criterion types, see [CampaignCriterionType](campaigncriteriontype.md).|[Criterion](criterion.md)|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the campaign criterion.|**long**|
|<a name="status"></a>Status|A status value that determines whether to apply the criterion to the campaign.|[CampaignCriterionStatus](campaigncriterionstatus.md)|
|<a name="type"></a>Type|The type of campaign criterion. For more information, see [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by whether you instantiate a [BiddableCampaignCriterion](biddablecampaigncriterion.md) or [NegativeCampaignCriterion](negativecampaigncriterion.md).

If you generate the SOAP manually, use the *type* attribute of the `<CampaignCriterion>` node as shown in the following example, to specify the type of criterion.

```xml
<CampaignCriterion i:type="BiddableCampaignCriterion" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <Id i:nil="true" />
    <Status i:nil="true" />
     . . .
</CampaignCriterion>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddCampaignCriterions](addcampaigncriterions.md)  
[GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md)  
[UpdateCampaignCriterions](updatecampaigncriterions.md)  
