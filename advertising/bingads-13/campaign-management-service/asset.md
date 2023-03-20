---
title: Asset Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the base object of an asset with a unique Microsoft Advertising identifier that can be reused across multiple ads.
---
# Asset Data Object - Campaign Management
Defines the base object of an asset with a unique Microsoft Advertising identifier that can be reused across multiple ads.

Do not try to instantiate an *Asset*. You can create one or more of the following objects that derive from it.
- [ImageAsset](imageasset.md)
- [TextAsset](textasset.md)
- [VideoAsset](videoasset.md)

## Syntax
```xml
<xs:complexType name="Asset" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Asset](asset.md) object has the following elements: [Id](#id), [Name](#name), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the asset in a Microsoft Advertising account.<br/><br/>The same asset can be used by multiple ads. For example if *Seemless Integration* is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.|**long**|
|<a name="name"></a>Name|Reserved for future use.|**string**|
|<a name="type"></a>Type|The type of the asset.<br/><br/>For more information about asset types, see the [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by whether you instantiate a text asset or another asset type.

If you generate the SOAP manually, use the *type* attribute of the `<Asset>` node (as shown in the following example) to specify the type of asset.

```xml
<Asset i:type="TextAsset" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
     . . .
</Asset>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetLink](assetlink.md)  
