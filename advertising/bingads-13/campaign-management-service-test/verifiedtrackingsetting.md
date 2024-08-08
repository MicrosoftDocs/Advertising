---
title: VerifiedTrackingSetting Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the VerifiedTrackingSetting Data Object.(test)
---
# VerifiedTrackingSetting Data Object Test - Campaign Management
Defines the VerifiedTrackingSetting Data Object.

*VerifiedTrackingSetting* relates third-party measurement settings. This allows you to track viewability, brand safety, and invalid traffic metrics via a third-party verification provider, such as *Integral Ad Science*. This feature is available for native, display, and online video ads using the CPM bid strategy.

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon
>
> Currently, IAS is the only supported vendor (*vendorName*), but other verification providers are coming soon.

# [XML](#tab/xml)

```xml
<xs:complexType name="VerifiedTrackingSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element xmlns:q5="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="Details" nillable="true" type="q5:ArrayOfArrayOfKeyValuePairOfstringstring" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "VerifiedTrackingSetting",
  "Details": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [VerifiedTrackingSetting](verifiedtrackingsetting.md) object has the following elements: [Details](#details).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="details"></a>Details|Key-value pairs for the *VerifiedTrackingSetting* object.<br/><br/>*VerifiedTrackingSetting* relates third-party measurement settings. This allows you to track viewability, brand safety, and invalid traffic metrics via a third-party verification provider, such as *Integral Ad Science*. This feature is available for native, display, and online video ads using the CPM bid strategy.<br/><br/>*Note*: Currently, IAS is the only supported vendor (*vendorName*), but other verification providers are coming soon. The example below pertains to *IAS*.<br/><br/>There are 3 key-value pairs for *IAS*:<ul><li>"vendorName"</li><li>"advertiserEntityID" (client ID for your verification provider)</li><li>"publisherEntityID" (reporting ID for your verification provider)</li></ul>Example (*required for IAS*):<br/><ul><li>vendorName : "IAS"</li><li>advertiserEntityID : "12345678"</li><li>publisherEntityID : "12345678"</li></ul>|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|

The [VerifiedTrackingSetting](verifiedtrackingsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [VerifiedTrackingSetting](verifiedtrackingsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [VerifiedTrackingSetting](verifiedtrackingsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the setting. This value is *VerifiedTracking* when you retrieve a verified tracking setting. For more information about setting types, see the [Setting Data Object Remarks](setting.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ResponsiveAd](responsivead.md)  
