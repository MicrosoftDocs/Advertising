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

You can upload ad customizer feed for responsive search ads with the Bulk service.

The Ad customizer feed record defines the name and data type of attributes that are allowed for the corresponding feed item.

```csv
Attribute,Data type,Account value,Campaign,Ad group,Keyword,Customizer:Name,Customizer:Count,Customizer:Discount,Customizer:Cost
Name,Text,Furniture,,,,,,,
Count,Number,3000,,,,,,,
Discount,Percent,,,,,,,,
Cost,Price,,,,,,,,
,,,Campaign A,,,Living Room Furniture,1000,10%,"$2,000 "
,,,Campaign A,Ad group #1,,Modern Sectionals,500,10%,"$2,000 "
,,,Campaign A,Ad group #1,corner sectionals,Modern Corner Sectionals,100,25%,"$2,500 "
,,,Campaign A,Ad group #1,leather sectionals,Modern Leather Sectionals,100,15%,"$4,000 "
,,,Campaign A,Ad group #1,luxury sectionals,Modern Luxury Sectionals,200,5%,"$3,000 "

```

For a *Ad Customizer feed* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Attribute](#attribute)
- [Data Type](#datatype)
- [Account value](#accountvalue)
- [Campaign](#campaign)
- [Ad Group](#adgroup)
- [Keyword](#keyword)
- [Customizer:{Attribute name}](#customizer)


## <a name="attribute"></a>Attribute

The name of your customizer attribute.

- Each customizer attribute must have a unique name.
- Attribute names can be up to 40 characters.
- You can have a maximum of 40 attributes per account.
- Attribute names cannot contain the following characters: {, }, (, ), :, /, ”, '

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="datatype"></a>Data Type

The data type of each custom attribute. You define the data type in the feed record, and then set values in the feed item. So long as each custom attribute name is unique within the feed you can define multiple attributes with the same data type.

There are four different custom attribute data types you can set for ad customizer responsive search ads:


|Custom attribute type|Examples|Accepted values|
|-----|-----|-----|
|Text|Product names, product categories, descriptions|Any letters, numbers, or symbols.<br/> Requirements: 90-character limit|
|Number|Inventory count, number of colors available|Any whole number|
|Price|Product cost, sale discount|Any number (including decimals) and valid currency characters.<br/> Example: $15, USD 15|
 |Percent|Discount rate, interest rate|Any number (including decimals) and the percent symbol[%]<br/>Example: 15%|


## <a name="accountvalue"></a>Account value

Attribute value at account level.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  


## <a name="campaign"></a>Campaign

The name of the campaign that contains the ad group and negative keyword.

**Add:** Read-only  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="adgroup"></a>Ad Group
The name of the existing ad group to which you are assigning attribute value.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="keyword"></a>Keyword

The existing keyword to which you are assigning attribute value.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  


## <a name="customizer"></a>Customizer:{Attribute name}
Each customizer value will have its own column.

**Valid values**:
The value of the customizer attribute should be based on the data type. See the [custom attribute data type table](ad-customizer-feeds-responsive-search-ads.md/#a-name"datatype"adata-type) above for a list of requirements per attribute type.

## <a name="expandedtextad-examples"></a>Adding ad customizers to responsive search Ads

You can add ad customizers to these responsive search ad text fields: Headlines, Descriptions, and your Display URL's first and second paths (Path 1 and Path 2).

The ad customizer will appear in Microsoft Advertising in the following syntax: {CUSTOMIZER.Attribute name:default text}. So, if your attribute name is "Count" and your default text is "10," the syntax will be {CUSTOMIZER.Count:10}.



## See Also
[Expanded Text Ads](expanded-text-ads.md)  
[Page Feeds](page-feeds.md)  
