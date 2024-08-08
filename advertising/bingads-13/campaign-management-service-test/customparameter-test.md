---
title: CustomParameter Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a key and value custom parameter for URL tracking.(test)
---
# CustomParameter Data Object Test - Campaign Management
Defines a key and value custom parameter for URL tracking. Used for campaign, ad group, ad, keyword, sitelink, and ad group criterion URL custom parameters.

# [XML](#tab/xml)

```xml
<xs:complexType name="CustomParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Key" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Value" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Key": "ValueHere",
  "Value": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CustomParameter](customparameter.md) object has the following elements: [Key](#key), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="key"></a>Key|The name of the custom parameter that you want to track.<br/><br/>The maximum length of this string is 16, in UTF-8 bytes. With the Campaign Management service you may not specify special characters such as braces and underscore: \"\{\", \"\_\", and \"\}\".  With the Bulk service the surrounding braces and underscore are required. The maximum length of 16 UTF-8 bytes does not include the optional braces and underscore: \"\{\", \"\_\", and \"\}\".<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="value"></a>Value|The value to track using your custom parameter.<br/><br/>The maximum length of this string is 200, in UTF-8 bytes. You can set the value to an empty string ("") but it cannot be null or empty.<br/><br/>The maximum length of the value string is 250 for all entities except action, price, and sitelink ad extensions. The maximum length of the value string is 200 for action, price, and sitelink ad extensions. For action, price, and sitelink ad extensions, the maximum length increases to 250 for customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635).<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomParameters](customparameters.md)  
