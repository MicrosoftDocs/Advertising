---
title: AccountPropertyName Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the name of account level properties.
---
# AccountPropertyName Value Set - Campaign Management
Defines the name of account level properties.

## Syntax
```xml
<xs:simpleType name="AccountPropertyName" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="None" />
    <xs:enumeration value="TrackingUrlTemplate" />
    <xs:enumeration value="MSCLKIDAutoTaggingEnabled" />
    <xs:enumeration value="AdClickParallelTracking">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="FinalUrlSuffix">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="IncludeViewThroughConversions">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ProfileExpansionEnabled">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">32</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AllowImageAutoRetrieve">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">64</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AutoApplyRecommendations">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">128</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="IncludeAutoBiddingViewThroughConversions">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">256</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AutoBiddingViewThroughConversionsValueAttributionWeight">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">512</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="LoopBackWindowForViewThroughConversions">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1024</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="BusinessAttributes">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2048</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="EnableMMAUnderDSAAdgroups">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4096</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AccountPropertyName](accountpropertyname.md) value set has the following values: [AdClickParallelTracking](#adclickparalleltracking), [AllowImageAutoRetrieve](#allowimageautoretrieve), [AutoApplyRecommendations](#autoapplyrecommendations), [AutoBiddingViewThroughConversionsValueAttributionWeight](#autobiddingviewthroughconversionsvalueattributionweight), [BusinessAttributes](#businessattributes), [EnableMMAUnderDSAAdgroups](#enablemmaunderdsaadgroups), [FinalUrlSuffix](#finalurlsuffix), [IncludeAutoBiddingViewThroughConversions](#includeautobiddingviewthroughconversions), [IncludeViewThroughConversions](#includeviewthroughconversions), [LoopBackWindowForViewThroughConversions](#loopbackwindowforviewthroughconversions), [MSCLKIDAutoTaggingEnabled](#msclkidautotaggingenabled), [None](#none), [ProfileExpansionEnabled](#profileexpansionenabled), [TrackingUrlTemplate](#trackingurltemplate).

|Value|Description|
|-----------|---------------|
|<a name="adclickparalleltracking"></a>AdClickParallelTracking|Used to get or set the property that determines whether you want to send customers directly to your final URL while click measurement runs in the background.<br/><br/>For more information see [AdClickParallelTracking](accountproperty.md#adclickparalleltracking).|
|<a name="allowimageautoretrieve"></a>AllowImageAutoRetrieve|Used to get or set the property that determines whether Microsoft Advertising is allowed to use images from your domain to enhance your ads on the Microsoft Audience Network.<br/><br/>For more information see [AllowImageAutoRetrieve](accountproperty.md#allowimageautoretrieve).|
|<a name="autoapplyrecommendations"></a>AutoApplyRecommendations|Used to get or set the property that determines whether Microsoft Advertising is allowed to automatically apply ad recommendations meant to help you boost ad performance.<br/><br/> AutoApplyRecommendations in Campaign Management API will be deprecated by November 30, 2022. We strongly encourage you to use the new [Auto-apply Management interface](../guides/ad-insights-auto-apply-management.md) in Ad Insight API. <br/><br/>For more information see [AutoApplyRecommendations](accountproperty.md#autoapplyrecommendations).|
|<a name="autobiddingviewthroughconversionsvalueattributionweight"></a>AutoBiddingViewThroughConversionsValueAttributionWeight|Reserved.|
|<a name="businessattributes"></a>BusinessAttributes|Used to get or set the property that determines the account's business attributes meant to help you boost ad performance.<br/><br/>For more information see [BusinessAttributes](accountproperty.md#businessattributes).|
|<a name="enablemmaunderdsaadgroups"></a>EnableMMAUnderDSAAdgroups|Reserved.|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|Used to get or set the account's Final URL Suffix.<br/><br/>For more information see [FinalUrlSuffix](accountproperty.md#finalurlsuffix).|
|<a name="includeautobiddingviewthroughconversions"></a>IncludeAutoBiddingViewThroughConversions|Reserved.|
|<a name="includeviewthroughconversions"></a>IncludeViewThroughConversions|Used to get or set the property that determines whether you want to include view-through conversions for campaigns in the account.<br/><br/>For more information see [IncludeViewThroughConversions](accountproperty.md#includeviewthroughconversions).|
|<a name="loopbackwindowforviewthroughconversions"></a>LoopBackWindowForViewThroughConversions|Reserved.|
|<a name="msclkidautotaggingenabled"></a>MSCLKIDAutoTaggingEnabled|Used to get or set the property that determines whether MSCLKID auto-tagging is enabled for the account.<br/><br/>For more information see [MSCLKIDAutoTaggingEnabled](accountproperty.md#msclkidautotaggingenabled).|
|<a name="none"></a>None|Reserved for internal use.|
|<a name="profileexpansionenabled"></a>ProfileExpansionEnabled|Used to get or set the property that determines whether LinkedIn profile targeting expansion is enabled for the account.<br/><br/>For more information see [ProfileExpansionEnabled](accountproperty.md#profileexpansionenabled).|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|Used to get or set the account's tracking template.<br/><br/>For more information see [TrackingUrlTemplate](accountproperty.md#trackingurltemplate).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AccountProperty](accountproperty.md)  
[GetAccountProperties](getaccountproperties.md)  
