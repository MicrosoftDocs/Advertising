---
title: PriceAdExtension Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an ad extension that includes between 3 and 8 price table rows.(test)
---
# PriceAdExtension Data Object Test - Campaign Management
Defines an ad extension that includes between 3 and 8 price table rows.

You can associate a price ad extension with the account or with campaigns and ad groups in the account. Each entity (account, campaign, or ad group) can be associated with up to 20 price ad extensions.

# [XML](#tab/xml)

```xml
<xs:complexType name="PriceAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Language" nillable="true" type="xs:string" />
        <xs:element name="PriceExtensionType" type="tns:PriceExtensionType" />
        <xs:element minOccurs="0" name="TableRows" nillable="true" type="tns:ArrayOfPriceTableRow" />
        <xs:element minOccurs="0" name="TrackingUrlTemplate" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="UrlCustomParameters" nillable="true" type="tns:CustomParameters" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "DevicePreference": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "ValueHere",
  "Scheduling": {
    "DayTimeRanges": [
      {
        "Day": "ValueHere",
        "EndHour": "ValueHere",
        "EndMinute": "ValueHere",
        "StartHour": "ValueHere",
        "StartMinute": "ValueHere"
      }
    ],
    "EndDate": {
      "Day": "ValueHere",
      "Month": "ValueHere",
      "Year": "ValueHere"
    },
    "StartDate": {
      "Day": "ValueHere",
      "Month": "ValueHere",
      "Year": "ValueHere"
    },
    "UseSearcherTimeZone": "ValueHere"
  },
  "Status": "ValueHere",
  "Type": "PriceAdExtension",
  "Version": "ValueHere",
  "FinalUrlSuffix": "ValueHere",
  "Language": "ValueHere",
  "PriceExtensionType": "ValueHere",
  "TableRows": [
    {
      "CurrencyCode": "ValueHere",
      "Description": "ValueHere",
      "FinalMobileUrls": [
        "ValueHere"
      ],
      "FinalUrls": [
        "ValueHere"
      ],
      "Header": "ValueHere",
      "Price": "ValueHere",
      "PriceQualifier": "ValueHere",
      "PriceUnit": "ValueHere",
      "TermsAndConditions": "ValueHere",
      "TermsAndConditionsUrl": "ValueHere"
    }
  ],
  "TrackingUrlTemplate": "ValueHere",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  }
}
```

-----

## <a name="elements"></a>Elements

The [PriceAdExtension](priceadextension.md) object has the following elements: [FinalUrlSuffix](#finalurlsuffix), [Language](#language), [PriceExtensionType](#priceextensiontype), [TableRows](#tablerows), [TrackingUrlTemplate](#trackingurltemplate), [UrlCustomParameters](#urlcustomparameters).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>This feature is only available for customers in the Final URL Suffix Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 636). If you are not in the pilot this property will be ignored and no error will be returned.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="language"></a>Language|The language for the ad copy of your price ad extension.<br/><br/>For possible values, see [Ad Languages](../guides/ad-languages.md).<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="priceextensiontype"></a>PriceExtensionType|The type of the price ad extension.<br/><br/>Possible values include: *Brands*, *Events*, *Locations*, *Neighborhoods*, *ProductCategories*, *ProductTiers*, *ServiceCategories*, *Services*, *ServiceTiers*, and *Unknown*.<br/><br/>**Add:** Required<br/>**Update:** Required|[PriceExtensionType](priceextensiontype.md)|
|<a name="tablerows"></a>TableRows|The price table rows.<br/><br/>You must have between 3 and 8 price table rows. The order you create them in is the expected order in the ad but the order is not guaranteed.<br/><br/>**Add:** Required<br/>**Update:** Required|[PriceTableRow](pricetablerow.md) array|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all landing page URLs.<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, the previous setting will be deleted.|**string**|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 3 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and any additional custom parameters will be ignored. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, the previous setting will be deleted.|[CustomParameters](customparameters.md)|

The [PriceAdExtension](priceadextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [PriceAdExtension](priceadextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [PriceAdExtension](priceadextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad extension type.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>There are currently no forward compatibility changes for the *AdExtension* object.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only and Required|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, any existing scheduling set for the ad extension will remain unchanged. If you set this to any non-null [Schedule](schedule.md) object, you are effectively replacing existing scheduling settings for the ad extension. To remove all scheduling set this element to an empty [Schedule](schedule.md) object.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of the ad extension. This value is *PriceAdExtension* when you retrieve a price ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only<br/><br/>For more information about ad extension types, see the [Ad Extension Data Object Remarks](adextension.md#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.<br/><br/>**Add:** Not allowed<br/>**Update:** Not allowed|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

