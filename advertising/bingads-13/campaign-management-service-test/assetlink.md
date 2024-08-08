---
title: AssetLink Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the relationship of an asset to an ad.(test)
---
# AssetLink Data Object Test - Campaign Management
Defines the relationship of an asset to an ad.

For example, within a [ResponsiveSearchAd](responsivesearchad.md) there is an array of asset links that each contain a [TextAsset](textasset.md). 

# [XML](#tab/xml)

```xml
<xs:complexType name="AssetLink" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Asset" nillable="true" type="tns:Asset" />
    <xs:element minOccurs="0" name="AssetPerformanceLabel" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="EditorialStatus" nillable="true" type="tns:AssetLinkEditorialStatus" />
    <xs:element minOccurs="0" name="PinnedField" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Asset": {
    "Id": "ValueHere",
    "Name": "ValueHere",
    "Type": "ImageAsset",
    "CropHeight": "ValueHere",
    "CropWidth": "ValueHere",
    "CropX": "ValueHere",
    "CropY": "ValueHere",
    "SubType": "ValueHere",
    "TargetHeight": "ValueHere",
    "TargetWidth": "ValueHere"
  },
  "AssetPerformanceLabel": "ValueHere",
  "EditorialStatus": "ValueHere",
  "PinnedField": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AssetLink](assetlink.md) object has the following elements: [Asset](#asset), [AssetPerformanceLabel](#assetperformancelabel), [EditorialStatus](#editorialstatus), [PinnedField](#pinnedfield).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="asset"></a>Asset|The asset with a unique Microsoft Advertising identifier that can be reused across multiple ads.<br/><br/>For asset links included in a responsive search ad's [Headlines](responsivesearchad.md#headlines) and [Descriptions](responsivesearchad.md#descriptions) lists, the asset must be a [TextAsset](textasset.md).<br/><br/>**Add:** Required<br/>**Update:** Required|[Asset](asset.md)|
|<a name="assetperformancelabel"></a>AssetPerformanceLabel|This lets you know how well the asset is performing.<br/><br/>The possible ratings include:<br/>- **Low**: This asset's performance is low and we recommend you replace this asset to improve your ad performance.<br/>- **Good**: This asset is performing well. We recommend you keep this asset and add more assets to improve your ad performance.<br/>- **Best**: This asset's performance is among the best and we recommend that you add more similar assets.<br/>- **Unrated**: We don't have any performance rating for this asset. This can be due to the asset being inactive, not having enough information to determine its performance, or if there aren't enough similar assets to compare against it.<br/>- **Learning**: The asset's performance is being actively evaluated. Once the evaluation is complete, the asset rating will be Low, Good, Best, or Unrated.<br/><br/>**Add:** Read-only. The service will ignore this value if set.<br/>**Update:** Read-only. The service will ignore this value if set.|**string**|
|<a name="editorialstatus"></a>EditorialStatus|The editorial review status of the asset link, which indicates whether the asset is pending review, has been approved, or has been disapproved.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AssetLinkEditorialStatus](assetlinkeditorialstatus.md)|
|<a name="pinnedfield"></a>PinnedField|Determines whether the asset should only be used for a specific ad component, or whether you want Bing AI to optimize the layout for this asset.<br/><br/>Unless you have a specific requirement for an asset, don't pin it and let Bing AI optimize the placement.<br/><br/>If the [Asset](#asset) is a [TextAsset](textasset.md) and included in the responsive search ad's [Descriptions](responsivesearchad.md#descriptions) list, the valid pinned field values are *Description1* and *Description2*. At least one eligible [TextAsset](textasset.md) must be available for each description position, so you cannot pin all of the assets to the same position. For example you can have 3 text assets pinned to *Description1*, so long as you have at least one text asset in the responsive search ad's [Descriptions](responsivesearchad.md#descriptions) list that is either not pinned, or pinned to *Description2*.<br/><br/>If the [Asset](#asset) is a [TextAsset](textasset.md) and included in the responsive search ad's [Headlines](responsivesearchad.md#headlines) list, the valid pinned field values are *Headline1*, *Headline2*, and *Headline3*. At least one eligible [TextAsset](textasset.md) must be available for each headline position, so you cannot pin all of the assets to the same position. For example you can have 3 text assets pinned to *Headline1* and 3 text assets pinned to *Headline2*, so long as you have at least one text asset in the responsive search ad's [Headlines](responsivesearchad.md#headlines) list that is either not pinned, or pinned to *Headline3*.<br/><br/>If you previously pinned an asset to an ad component and later want to remove the pin, you'll need to update the ad with the existing assets and leave the pinned field element empty for the asset or assets that you want to unpin. When you retrieve an asset that is not pinned, the string value is nil or empty.<br/><br/>PinnedField shouldn't be set for Performance Max AssetGroup as it doesn't apply.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroup](assetgroup.md)  
[ImageAdExtension](imageadextension.md)  
[ResponsiveAd](responsivead.md)  
[ResponsiveSearchAd](responsivesearchad.md)  
