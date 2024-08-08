---
title: ProductAd Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a product ad.(test)
---
# ProductAd Data Object Test - Campaign Management
Defines a product ad. A product ad is not used directly for delivered ad copy.  Instead, the delivery engine generates product ads from the product details that it finds in the customer's Microsoft Merchant Center store.

# [XML](#tab/xml)

```xml
<xs:complexType name="ProductAd" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Ad">
      <xs:sequence>
        <xs:element minOccurs="0" name="PromotionalText" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdFormatPreference": "ValueHere",
  "DevicePreference": "ValueHere",
  "EditorialStatus": "ValueHere",
  "FinalAppUrls": [
    {
      "OsType": "ValueHere",
      "Url": "ValueHere"
    }
  ],
  "FinalMobileUrls": [
    "ValueHere"
  ],
  "FinalUrls": [
    "ValueHere"
  ],
  "FinalUrlSuffix": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "ValueHere",
  "Status": "ValueHere",
  "TrackingUrlTemplate": "ValueHere",
  "Type": "Product",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  },
  "PromotionalText": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ProductAd](productad.md) object has the following elements: [PromotionalText](#promotionaltext).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="promotionaltext"></a>PromotionalText|This property is reserved for internal use and will be removed from a future version of the API.<br/><br/>You can use [Merchant Promotions](https://help.ads.microsoft.com/#apex/3/en/56805/0) if you want tags to appear at the bottom of your product ad as "special offer" links, helping to increase customer engagement.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|

The [ProductAd](productad.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsad"></a>Inherited Elements from Ad
The [ProductAd](productad.md) object derives from the [Ad](ad.md) object, and inherits the following elements: [AdFormatPreference](#adformatpreference), [DevicePreference](#devicepreference), [EditorialStatus](#editorialstatus), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [TrackingUrlTemplate](#trackingurltemplate), [Type](#type), [UrlCustomParameters](#urlcustomparameters). The descriptions below are specific to [ProductAd](productad.md), and might not apply to other objects that inherit the same elements from the [Ad](ad.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adformatpreference"></a>AdFormatPreference|Not supported for this ad type.|**string**|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad type.|**long**|
|<a name="editorialstatus"></a>EditorialStatus|The editorial review status of the ad, which indicates whether the ad is pending review, has been approved, or has been disapproved.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdEditorialStatus](adeditorialstatus.md)|
|<a name="finalappurls"></a>FinalAppUrls|Not supported for this ad type.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|Not supported for this ad type.|**string** array|
|<a name="finalurls"></a>FinalUrls|Not supported for this ad type.|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|Not supported for this ad type.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>There are currently not any ForwardCompatibilityMap key and value pairs that are applicable for product ads.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the ad.<br/><br/>**Add:** Read-only<br/>**Update:** Required and Read-only|**long**|
|<a name="status"></a>Status|The status of the ad.<br/><br/>You can set the ad status to Active or Paused.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[AdStatus](adstatus.md)|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|Not supported for this ad type.|**string**|
|<a name="type"></a>Type|The type of the ad. This value is *Product* when you retrieve a product ad. For more information about ad types, see the [Ad Data Object Remarks](ad.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdType](adtype.md)|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Not supported for this ad type.|[CustomParameters](customparameters.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

