---
title: "Ad Customizer Feeds for responsive search ads"
ms.service: "bing-ads"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Add feeds so your responsive search ads update dynamically under specific circumstances. 
---

# Ad Customizer Feeds for Responsive Search Ads

With ad customizers for responsive search ads, your ads will dynamically update themselves in real-time to appeal to specific customers' web searches and will adapt at scale.

Your ad customizers for responsive search ads will inherit the targeting settings of the campaigns, ad groups, and keywords that you associate with them. 

Why use ad customizer for responsive search ads?

- Save time. Transform a single responsive search ad into hundreds of variations without having to manually update the ad.
- More relevant ads. Leverage dynamic content to customize ads based on what potential customers are searching for.
- Better results. See higher click-through (CTR) and conversion rates.

## <a name="upload-adcustomizerfeed"></a>Upload ad customizer feeds

You can upload your ad customizer feed for responsive search ads with the Bulk service.

The Ad customizer feed record defines the name and data type of attributes that are allowed for the file upload.

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Ad Group,Website,Sync Time,Client Id,Bid Strategy Id,Bid Strategy Name,Bid Strategy Type,Bid Strategy MaxCpc,Bid Strategy TargetCpa,Bid Strategy TargetRoas,Bid Strategy TargetAdPosition,Bid Strategy TargetImpressionShare,Modified Time,Tracking Template,Final Url Suffix,Custom Parameter,Final Url,Mobile Final Url,Time Zone,Budget Id,Budget,Budget Type,Campaign Type,Priority,Country Code,LocalInventoryAdsEnabled,Ad Schedule Use Searcher Time Zone,Start Date,End Date,Network Distribution,Ad Rotation,Cpc Bid,Language,Target Setting,Bid Option,Bid Boost Value,Ad Group Type,Title,Text,Display Url,Domain,Destination Url,Business Name,Phone Number,Promotion,Editorial Status,Editorial Appeal Status,Editorial Justification,Device Preference,Ad Format Preference,Keyword,Match Type,Bid,Param1,Param2,Param3,Transaction Id,Target,Physical Intent,Bid Adjustment,OS Names,Radius Target Id,Name,AdCustomizer DataType,AdCustomizer AttributeValue
Format Version,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,6,,
Campaign,Active,-1,232000627,,myCampaign,,,,,,,,,,,,,,,,,,,KuwaitRiyadh,,278.12,DailyBudgetAccelerated,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
Ad Group,Active,-2,-1,,myCampaign,myAdGroup,,,,,,,,,,,,,,,,,,,,,,,,,,,,,OwnedAndOperatedAndSyndicatedSearch,,6.55,French,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
Keyword,Active,-3,-2,,myCampaign,myAdGroup,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,YXkNHeEwy0i9IpR2AsXnV,Phrase,1.59,,,,,,,,,,,,
Adcustomizer Attribute,Active,-4,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,StringAttribute,String,StringValue
Adcustomizer Attribute,Active,-5,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,NumberAttribute,Number,10
Adcustomizer Attribute,Active,-6,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,PriceAttribute,Price,12.12
Adcustomizer Attribute,Active,-7,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,PercentAttribute,Percent,9.9
Campaign Adcustomizer Attribute,,-4,-1,,myCampaign,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,StringAttribute,,CampaignStringValue
Campaign Adcustomizer Attribute,,-5,-1,,myCampaign,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,NumberAttribute,,100
Campaign Adcustomizer Attribute,,13200021,9876521,,exisingCampaign,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,ExistingNumberAttribute,,delete_value
Adgroup Adcustomizer Attribute,,-5,-2,,myCampaign,myAdGroup,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,NumberAttribute,,1000
Keyword Adcustomizer Attribute,,-5,-3,,myCampaign,myAdGroup,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,NumberAttribute,,10000
```

For a *AdCustomizer Attribute* record, the following attribute fields are available in the [Bulk File Schema](../bulk-service/bulk-file-schema.md). 

- [Id](#id)
- [Name](#name)
- [AdCustomizer Data Type](#datatype)
- [AdCustomizer Attributevalue](#attributevalue)
- [Status](#status)

For a *Campaign AdCustomizer Attribute*, *AdGroup AdCustomizer Attribute*, *KeyWord AdCustomizer Attribute* record, the following attribute fields are available in the [Bulk File Schema](../bulk-service/bulk-file-schema.md). 

- [Id](#id)
- [Name](#name)
- [AdCustomizer Data Type](#datatype)
- [AdCustomizer Attributevalue](#attributevalue)
- [Parent Id](#parentid)
- [Campaign](#campaign)
- [Ad Group](#adgroup)


## <a name="adgroup"></a>Ad Group

The name of the existing ad group to which you are assigning attribute value.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="datatype"></a>AdCustomizer Data Type

The data type of each custom attribute. You define the data type in the feed record, and then set values in the feed item. So long as each custom attribute name is unique within the feed you can define multiple attributes with the same data type.

There are four different custom attribute data types you can set for ad customizer responsive search ads:


|Custom attribute type|Examples|Accepted values|
|-----|-----|-----|
|Text|Product names, product categories, descriptions|Any letters, numbers, or symbols.<br/> Requirements: 90-character limit|
|Number|Inventory count, number of colors available|Any whole number|
|Price|Product cost, sale discount|Any number (including decimals) and valid currency characters.<br/> Example: $15, USD 15|
 |Percent|Discount rate, interest rate|Any number (including decimals) and the percent symbol[%]<br/>Example: 15%|


## <a name="attributevalue"></a>AdCustomizer Attributevalue

Attribute value at account level.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  


## <a name="campaign"></a>Campaign

The name of the existing campaign to which you are assigning attribute value.

**Add:** Read-only  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The identifier of the ad customizer that is associated or removed from the ad group.

**Add:** Read-only  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="name"></a>Name

The name of your customizer attribute.

- Each customizer attribute must have a unique name.
- Attribute names can be up to 40 characters.
- You can have a maximum of 40 attributes per account.
- Attribute names cannot contain the following characters: {, }, (, ), :, /, ”, '

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id

The identifier of the account where this ad customizer is associated or removed.
This bulk field maps to the *Id* field of the Account record. 

**Add:** Read-only  
**Delete:** Read-only  

## <a name="status"></a>Status
Represents the ad customizer attribute status. 

Possible values are *Active* and *Deleted*. If the ad customizer attribute is associated with the account, this field's value is *Active*.

**Add:** Read-only  
**Delete:** Required. The Status must be set to *Deleted*. 

## <a name="expandedtextad-examples"></a>Adding ad customizers to responsive search Ads

You can add ad customizers to these responsive search ad text fields: Headlines, Descriptions, and your Display URL's first and second paths (Path 1 and Path 2).

The ad customizer will appear in Microsoft Advertising in the following syntax: {CUSTOMIZER.Attribute name:default text}. So, if your attribute name is "Count" and your default text is "10," the syntax will be {CUSTOMIZER.Count:10}.


## See Also
[Expanded Text Ads](expanded-text-ads.md)  
[Page Feeds](page-feeds.md)  
