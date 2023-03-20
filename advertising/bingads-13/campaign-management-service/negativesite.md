---
title: NegativeSite Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a website URL where you do not want your ads displayed.
---
# NegativeSite Data Object - Campaign Management
Defines a website URL where you do not want your ads displayed. 

> [!NOTE] 
> You can only view website exclusion lists in the redesigned Microsoft Advertising UI i.e., via Tools -> Shared Library -> Website exclusion lists. If you don't see it, look for the "Try the new Microsoft Advertising" prompt when you sign in. To use the redesigned Microsoft Advertising you must also be in the UI pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 522).  

A negative site can be added and deleted from a [PlacementExclusionList](placementexclusionlist.md) (website exclusion list), but cannot be updated. 

If you associate any [website exclusion lists](placementexclusionlist.md) with an ad account, the list of [negative sites](negativesite.md) are used in addition to the [campaign negative sites](campaignnegativesites.md) or [ad group negative sites](adgroupnegativesites.md). Negative site URLs specified at the ad group level are used instead of any negative site URLs specified at the campaign level.  

For more information about managing negative sites and website exclusion lists, see the [Negative Sites](../guides/negative-sites.md) technical guide. 

## Syntax
```xml
<xs:complexType name="NegativeSite" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SharedListItem">
      <xs:sequence>
        <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [NegativeSite](negativesite.md) object has the following elements: [Id](#id), [Url](#url).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the negative site.<br/><br/>**Add:** Read-only<br/>**Delete:** Required|**long**|
|<a name="url"></a>Url|The URL of the website where you do not want your ads displayed.<br/><br/>Each URL must specify the domain name e.g., *contoso.com* which can include up to three subdomains and two subdirectories. The subdomain count includes the *www* prefix. For example *one.two.three.contoso.com/1/2*, *www.two.three.contoso.com/1/2*, and *one.two.contoso.co.uk/1/2* are valid URLs, whereas *one.two.three.contoso.co.uk/1/2* (too many subdomains) and *one.two.three.contoso.com/1/2/3* (too many subdirectories) are not. Duplicate URLs in a [website exclusion list](placementexclusionlist.md) are not allowed.<br/><br/>You can only exclude websites for syndicated search websites. The ad group's network must be set to either *OwnedAndOperatedAndSyndicatedSearch* or *SyndicatedSearchOnly*. For more information about network distribution, see [Network](network.md).<br/><br/>If you associate any [website exclusion lists](placementexclusionlist.md) with an ad account, the list of [negative sites](negativesite.md) are used in addition to the [campaign negative sites](campaignnegativesites.md) or [ad group negative sites](adgroupnegativesites.md). Negative site URLs specified at the ad group level are used instead of any negative site URLs specified at the campaign level.<br/><br/>**Add:** Required<br/>**Delete:** Optional|**string**|

The [NegativeSite](negativesite.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssharedlistitem"></a>Inherited Elements from SharedListItem
The [NegativeSite](negativesite.md) object derives from the [SharedListItem](sharedlistitem.md) object, and inherits the following elements: [ForwardCompatibilityMap](#forwardcompatibilitymap), [Type](#type). The descriptions below are specific to [NegativeSite](negativesite.md), and might not apply to other objects that inherit the same elements from the [SharedListItem](sharedlistitem.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="type"></a>Type|The type of the shared list item.<br/><br/>This value is *NegativeSite* when you retrieve a negative site. For more information about shared list item types, see [SharedListItem Data Object Remarks](sharedlistitem.md#remarks).<br/><br/>**Add:** Read-only<br/>**Delete:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

