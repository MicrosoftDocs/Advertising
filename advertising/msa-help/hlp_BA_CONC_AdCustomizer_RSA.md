---
title: About ad customizer for ads
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to set up ad customizer for ads.
---

# About ad customizer for ads

With ad customizers, your ads will dynamically update themselves in real time to appeal to specific customers' web searches and will adapt at scale. Simply create your custom attributes in Microsoft Advertising or upload an ad customizer feed that tells us what information you want inserted into your ads based on potential customers' search queries. Your ad customizers for ads will inherit the targeting settings of the campaigns, ad groups, and keywords that you associate with them. Please note that ad delivery can be blocked when your countdown is both expired and pinned.

> [!NOTE]
> Ad customizer for ads is available in Multimedia ads and Responsive Search ads.

Note that the setup for [ad customizers for expanded text ads](hlp_BA_CONC_Feeds_AdCustomizers.md) is different.

## The benefits of using ad customizer for ads

- **Save time**. Transform a single ad into hundreds of variations without having to manually update the ad.
- **More relevant ads**. Leverage dynamic content to customize ads based on what potential customers are searching for.
- **Better results**. See higher click-through rates (CTR) and conversion rates.

<a id="about-custom-attributes"></a>

## About custom attributes

You can define custom attributes to insert dynamic information into your ads. There are four different types of custom attributes you can use:

| Custom attribute type | Example | Accepted values |
| --- | --- | --- |
| **Number** | Inventory count, number of colors available | Any whole number |
| **Percent** | Discount rate, interest rate | Any number (including decimals) and the percent symbol [%]<br>Example: 15% |
| **Price** | Product cost, sale discount | Any number (including decimals) and valid currency characters<br>Example: $15, USD 15 |
| **Text** | Product names, product categories, descriptions | Any letters, numbers, or symbols<br>Requirements: 90-character limit |

## How do ad customizer feeds for ads work?

An ad customizer feed is a spreadsheet. Each column in the spreadsheet tells Microsoft Advertising the type of information about your products or services you want to include in your ads.

Here are the required and optional fields to include in the ad customizer feed for ads:

| Field name | Description |
| --- | --- |
| **Account value** | Attribute value at the account level.<br>This field is optional.<br><br>**Requirements:**<br>See the [custom attribute type table](#about-custom-attributes) above for a list of attribute requirements.<br><br>**Example:**<br>If your business sells home goods and your attribute data type is Text, then you might include “Appliances” as the value for this column. |
| **Ad group** | The name of the existing ad group to which you're assigning an attribute value. |
| **Attribute** | The name of your customizer attribute.<br>Each customizer attribute must have a unique name. Attribute names can be up to 40 characters. You can have a maximum of 40 attributes per account. Attribute names cannot contain the following characters: {, }, (, ), :, /, “, ' |
| **Campaign** | The name of the existing campaign to which you're assigning an attribute value. |
| **Customizer:{Attribute name}** | Each customizer value must have its own column.<br><br>**Valid values:**<br>Base the value of the customizer attribute on the data type. See the [custom attribute type table](#about-custom-attributes) above for a list of attribute requirements. |
| **Data type** | The type of customizer attribute.<br><br>**Valid values:**<br>Number<br>Percent<br>Price<br>Text |
| **Keyword** | The existing keyword to which you're assigning an attribute value. |

## Create ad customizers for ads

There are two ways to create ad customizer attributes for ads: 1) Manually create your custom attributes in Microsoft Advertising, or 2) upload a feed file. The feed file allows you to assign attribute values at the account, campaign, ad group, and keyword levels, whereas when you create your custom attributes manually, you can only assign an attribute value at the account level.

- **Create attributes in Microsoft Advertising**

  1. From the navigation menu on the left, select **Tools** > **Business data** > **Ad customizer attributes** > **Ad customizer attributes**.
  1. Select **Add attribute**.
  1. Enter a unique attribute name in the **Attribute** field.
  1. Select the **Data type**.
  1. Optionally, enter the **Account value**.
  1. Select **Save**.

- **Create attributes by uploading a feed file**

  All feed files must be saved as any of the following file types: CSV, TSV, XLSX, or ZIP.

  1. From the navigation menu on the left, select **Tools** > **Business data** > **Ad customizer attributes** > **Ad customizer attributes**.
  1. Select **Upload** and then browse for your feed file.
  1. Select **Upload and apply**.

## Add ad customizers to ads

You can add ad customizers to these ad text fields: **Headlines**, **Descriptions**, and your **Display URL**'s first and second paths (Path 1 and Path 2).

Make sure that all customizer references in your ad text fields contain an attribute value for at least one level—account, campaign, ad group, and/or keyword. If any of the customizers in the ad don't contain an attribute value, all the customizer references in that ad will use defaults. Therefore, if you don't add a default, the ad will get filtered.

1. When creating or editing an ad, enter an open brace ( { ) where you want the ad customizer to appear.
1. In the resulting dropdown menu, select **Ad customizer**.
1. **Default text** is optional. If you want your ad to appear *even if you did not enter a value for your selected attribute in the feed file*, enter a word, phrase, or number to appear instead of the custom attribute value.
1. Select **Save**.

> [!NOTE]
> The ad customizer will appear in Microsoft Advertising in the following syntax: {CUSTOMIZER.Attribute name:default text}. So, if your attribute name is "Count" and your default text is "10," the syntax will be {CUSTOMIZER.Count:10}.

<a id="layout-of-an-ad-customizer-feed"></a>

## Layout of an ad customizer feed

The header row of the spreadsheet includes fields for attribute, data type, and account value (optional); the specific customizer information you want to insert into your ads; and the names of the campaigns, ad groups, and keywords to which you would like to assign an attribute value. Assigning an attribute value indicates where you want to apply your attributes—at account, campaign, ad group, and keyword levels. Please make sure to include attribute rows before the customizer value rows.

To see an example of an ad customizer feed, follow these steps:

1. From the navigation menu on the left, select **Tools** > **Business data** > **Ad customizer attributes** > **Ad customizer attributes**.
1. Select **Upload**.
1. Select **Sample file** below the **File to upload** field to download an example ad customizer spreadsheet.

> [!NOTE]
> For details on uploading and managing ad customizer feeds, take a look at [Business data feeds](hlp_BA_PROC_Feeds_WorkingWith.md).
