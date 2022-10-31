---
title: CustomParameters Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a collection of key and value custom parameters for URL tracking.
ms.subservice: campaign-management-api
---
# CustomParameters Data Object - Campaign Management
Defines a collection of key and value custom parameters for URL tracking. Used for campaign, ad group, ad, keyword, sitelink, and ad group criterion URL custom parameters.

## Syntax
```xml
<xs:complexType name="CustomParameters" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Parameters" nillable="true" type="tns:ArrayOfCustomParameter" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CustomParameters](customparameters.md) object has the following elements: [Parameters](#parameters).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="parameters"></a>Parameters|The collection of key and value custom parameters for URL tracking.<br/><br/>For campaigns, ad groups, and ad groups, ad group criterions, and ads Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.<br/><br/>For action, price, and sitelink ad extensions Microsoft Advertising will accept the first 3 custom parameter key and value pairs that you include, and any additional custom parameters will be ignored. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635) for action, price, and sitelink ad extensions, Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.<br/><br/>**Add:** Required<br/>**Update:** Optional. Once you create this CustomParameters object, the existing custom parameters will be removed or replaced. To remove all existing custom parameters create this CustomParameters object and set the Parameters element to nil. To replace or append to the list of custom parameters, create this CustomParameters object and assign to the Parameters element a new list of [CustomParameter](customparameter.md) objects, including any previous custom parameters that you want to retain. To retain all of the existing custom parameters, set the element that uses this CustomParameters object to nil. For example set the [UrlCustomParameters](expandedtextad.md#urlcustomparameters) element of an [ExpandedTextAd](expandedtextad.md) to nil if you do not want to update any of the custom parameters.[CustomParameter](customparameter.md) array|[CustomParameter](customparameter.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ActionAdExtension](actionadextension.md)  
[Ad](ad.md)  
[AdGroup](adgroup.md)  
[AppAdExtension](appadextension.md)  
[BiddableAdGroupCriterion](biddableadgroupcriterion.md)  
[Campaign](campaign.md)  
[DisclaimerAdExtension](disclaimeradextension.md)  
[FilterLinkAdExtension](filterlinkadextension.md)  
[FlyerAdExtension](flyeradextension.md)  
[ImageAdExtension](imageadextension.md)  
[Keyword](keyword.md)  
[PriceAdExtension](priceadextension.md)  
[PromotionAdExtension](promotionadextension.md)  
[SitelinkAdExtension](sitelinkadextension.md)  
[VideoAdExtension](videoadextension.md)  
