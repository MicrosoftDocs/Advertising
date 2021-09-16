---
title: ShoppingSetting Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the campaign level settings to leverage your Microsoft Merchant Center store.
---
# ShoppingSetting Data Object - Campaign Management
Defines the campaign level settings to leverage your Microsoft Merchant Center store.

You can include a shopping setting with both Shopping campaigns and feed-based Audience campaigns i.e., those campaigns that leverage a Microsoft Merchant Center [store ID](#storeid). 

Supported shopping settings vary by campaign type.
- Audience campaigns only support the [StoreId](#storeid) element. 
- Shopping campaigns support all shopping settings.

## Syntax
```xml
<xs:complexType name="ShoppingSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="LocalInventoryAdsEnabled" nillable="true" type="xs:boolean" />
        <xs:element minOccurs="0" name="Priority" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="SalesCountryCode" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="StoreId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ShoppingSetting](shoppingsetting.md) object has the following elements: [LocalInventoryAdsEnabled](#localinventoryadsenabled), [Priority](#priority), [SalesCountryCode](#salescountrycode), [StoreId](#storeid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="localinventoryadsenabled"></a>LocalInventoryAdsEnabled|Determines whether local inventory ads are enabled for the Microsoft Merchant Center store.<br/><br/>Not everyone has this feature yet. If you don't, don't worry. It's coming soon.<br/><br/>Set this property to *true* if you want to enable local inventory ads, and otherwise set it to *false*.<br/><br/>**Add:** Optional. If you do not specify this element or leave it empty, the default value of *false* will be set and local inventory ads will not be enabled.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**boolean**|
|<a name="priority"></a>Priority|Helps determine which Microsoft Shopping campaign serves ads, in the event that two or more campaigns use the product catalog feed from the same Microsoft Merchant Center store.<br/><br/>A higher priority value denotes a higher priority. The supported values for most shopping campaigns are 0, 1, and 2. For [smart shopping campaigns](../guides/smart-shopping-campaigns.md) (campaign [SubType](campaign.md#subtype) set to *ShoppingSmartAds*), you must set the priority to 3.<br/><br/>In the Microsoft Advertising web application, the default priority selected is "Low" which is the equivalent of '0'.<br/><br/>**Add:** Required<br/>**Update:** Optional|**int**|
|<a name="salescountrycode"></a>SalesCountryCode|The country code for the Microsoft Merchant Center store.<br/><br/>The Microsoft Merchant Center store catalog will be filtered to only include products for the specified country.<br/><br/>To get the list of supported country codes use the [GetBSCCountries](getbsccountries.md) operation. For example, supported country codes include "AU" (Australia), "AT" (Austria), "BE" (Belgium), "CA" (Canada), "CH" (Switzerland), "DE" (Germany), "ES" (Spain), "FR" (France), "GB" (United Kingdom), "IN" (India), "IT" (Italy), "NL" (Netherlands), "SE" (Sweden), and "US" (United States).<br/><br/>**Add:** Required<br/>**Update:** Read-only|**string**|
|<a name="storeid"></a>StoreId|The unique identifier for the Microsoft Merchant Center store that contains a product catalog feed that you want to use for the campaign.<br/><br/>Once you choose a store for a campaign, you can't change it. If at some point you want to use a different store, you would need to create a new shopping campaign with a new shopping setting.<br/><br/>With [Shopping Campaigns for Brands](../guides/product-ads.md#setup-cooperative) a single campaign can target all your retailer partners, and there's no need to create individual campaigns for each retailer. We recommend that you set this to the ID of your manager account's global store (store [SubType](bmcstore.md#subtype) set to [GlobalStore](bmcstoresubtype.md#globalstore)). By initially targeting all linked stores via the campaign shopping setting, you can then add up to 10 campaign negative [StoreCriterion](storecriterion.md) to exclude specific retailers as needed.<br/><br/>To get the store ID, call the [GetBMCStoresByCustomerId](getbmcstoresbycustomerid.md) operation. The [Id](bmcstore.md#id) element of each [BMCStore](bmcstore.md) represents a store ID.<br/><br/>**Add:** Required<br/>**Update:** Read-only|**long**|

The [ShoppingSetting](shoppingsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [ShoppingSetting](shoppingsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ShoppingSetting](shoppingsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the setting. This value is *Shopping* when you retrieve a shopping setting. For more information about setting types, see the [Setting Data Object Remarks](setting.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

