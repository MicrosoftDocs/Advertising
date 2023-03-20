---
title: AdExtensionsTypeFilter Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible ad extension types.
---
# AdExtensionsTypeFilter Value Set - Campaign Management
Defines the possible ad extension types.

## Syntax
```xml
<xs:simpleType name="AdExtensionsTypeFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="LocationAdExtension" />
        <xs:enumeration value="CallAdExtension" />
        <xs:enumeration value="ImageAdExtension" />
        <xs:enumeration value="AppAdExtension" />
        <xs:enumeration value="ReviewAdExtension" />
        <xs:enumeration value="CalloutAdExtension" />
        <xs:enumeration value="SitelinkAdExtension" />
        <xs:enumeration value="StructuredSnippetAdExtension" />
        <xs:enumeration value="PriceAdExtension" />
        <xs:enumeration value="ActionAdExtension" />
        <xs:enumeration value="PromotionAdExtension" />
        <xs:enumeration value="FilterLinkAdExtension" />
        <xs:enumeration value="FlyerAdExtension" />
        <xs:enumeration value="VideoAdExtension" />
        <xs:enumeration value="DisclaimerAdExtension" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdExtensionsTypeFilter](adextensionstypefilter.md) value set has the following values: [ActionAdExtension](#actionadextension), [AppAdExtension](#appadextension), [CallAdExtension](#calladextension), [CalloutAdExtension](#calloutadextension), [DisclaimerAdExtension](#disclaimeradextension), [FilterLinkAdExtension](#filterlinkadextension), [FlyerAdExtension](#flyeradextension), [ImageAdExtension](#imageadextension), [LocationAdExtension](#locationadextension), [PriceAdExtension](#priceadextension), [PromotionAdExtension](#promotionadextension), [ReviewAdExtension](#reviewadextension), [SitelinkAdExtension](#sitelinkadextension), [StructuredSnippetAdExtension](#structuredsnippetadextension), [VideoAdExtension](#videoadextension).

|Value|Description|
|-----------|---------------|
|<a name="actionadextension"></a>ActionAdExtension|An ad extension that contains a call-to-action button.<br/><br/>For more information, see [ActionAdExtension](actionadextension.md).|
|<a name="appadextension"></a>AppAdExtension|An ad extension that contains a link to install an application from a supported app store.<br/><br/>For more information, see [AppAdExtension](appadextension.md).|
|<a name="calladextension"></a>CallAdExtension|An ad extension that contains a phone number and whether it's the only clickable item in an ad.<br/><br/>For more information, see [CallAdExtension](calladextension.md).|
|<a name="calloutadextension"></a>CalloutAdExtension|An ad extension that contains additional text in the ad that can describe more about your business, products, or services.<br/><br/>For more information, see [CalloutAdExtension](calloutadextension.md).|
|<a name="disclaimeradextension"></a>DisclaimerAdExtension|Reserved.|
|<a name="filterlinkadextension"></a>FilterLinkAdExtension|An ad extension that pairs one header with between 3 and 10 clickable text values that tell customers more about your business.<br/><br/>For more information, see [FilterLinkAdExtension](filterlinkadextension.md).|
|<a name="flyeradextension"></a>FlyerAdExtension|An ad extension that enables advertisers to distribute product or store catalogues (flyers) to potential customers.<br/><br/>For more information, see [FlyerAdExtension](flyeradextension.md).|
|<a name="imageadextension"></a>ImageAdExtension|An ad extension that contains an image with alternative text.<br/><br/>For more information, see [ImageAdExtension](imageadextension.md).|
|<a name="locationadextension"></a>LocationAdExtension|An ad extension that contains the address and phone number of the business.<br/><br/>For more information, see [LocationAdExtension](locationadextension.md).|
|<a name="priceadextension"></a>PriceAdExtension|An ad extension that includes between 3 and 8 price table rows.<br/><br/>For more information, see [PriceAdExtension](priceadextension.md).|
|<a name="promotionadextension"></a>PromotionAdExtension|An ad extension that highlights special sales and offers in your text ads.<br/><br/>For more information, see [PromotionAdExtension](promotionadextension.md).|
|<a name="reviewadextension"></a>ReviewAdExtension|An ad extension that contains third-party reviews (exact or paraphrased) about your business, products, or services.<br/><br/>For more information, see [ReviewAdExtension](reviewadextension.md).|
|<a name="sitelinkadextension"></a>SitelinkAdExtension|An ad extension that contains one site link.<br/><br/>For more information, see [SitelinkAdExtension](sitelinkadextension.md).|
|<a name="structuredsnippetadextension"></a>StructuredSnippetAdExtension|An ad extension that contains a header and values that tell customers more about your business.<br/><br/>For more information, see [StructuredSnippetAdExtension](structuredsnippetadextension.md).|
|<a name="videoadextension"></a>VideoAdExtension|An ad extension with a video and call-to-action button. <br/><br/>For more information, see [VideoAdExtension](videoadextension.md).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAdExtensionIdsByAccountId](getadextensionidsbyaccountid.md)  
[GetAdExtensionsAssociations](getadextensionsassociations.md)  
[GetAdExtensionsByIds](getadextensionsbyids.md)  
