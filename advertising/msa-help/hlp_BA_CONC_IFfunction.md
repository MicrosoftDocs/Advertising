---
title: About IF functions
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Customize your ads to show specific text based on what potential customers are searching for by using IF functions.
---

# About IF functions

Customize your ads to show specific text based on what potential customers are searching for by using IF functions. IF functions are specific parameters that are used in Responsive Search ads; so, when a person is searching for something and the conditions are met, the parameter is replaced by the text you specify.

Below, you can learn how to [add IF functions to your Responsive Search ad](#add-if-functions-to-your-responsive-search-ad), [how to create an IF function manually](#create-an-if-function-manually), and [how to escape special characters with backslashes (\)](#escape-special-characters-with-backslashes).

> [!NOTE]
> You cannot create new expanded text ads with IF functions, but your existing expanded text ads with IF functions will continue to serve. For more information, see [How to create or edit expanded text ads](hlp_BA_PROC_CreateEXTA.md).

## Why use IF functions?

- **Save time!** IF functions reduce the need for you to create separate campaigns or ad groups for different devices and different audiences. You can customize a single Responsive Search ad with messages based on a customer's device or specific audience segment.
- **Send the right message** at the right time to the right people. Your Responsive Search ad gets customized based on two targets: Device and audience.

Here are the supported targets for IF functions, with the syntax you'll need to enter directly in the ads field:

| Target | Value | Syntax | How it appears |
| --- | --- | --- | --- |
| **Device** | Mobile | {=IF (device = mobile, text to insert): default text} | If the user is on a mobile device, the entire IF function is replaced with the value in “text to insert”. Otherwise, the “default text” that is provided will be used. Learn more about [targeting](hlp_BA_PROC_TargetingAgeGender.md). |
| **Audience** | Any valid audience list name | {=IF (audience IN (<audience list 1>, <audience list 2>), text to insert): default text} | If the user is in audience list 1 or audience list 2, the IF function is replaced with the “text to insert”. Otherwise, the “default text” that is provided will be used. Learn more about [audience options](hlp_BA_CONC_Audiences_Options.md). |

## What you need to know

- Audience names containing { } can't be used in an IF function.
- Both device and audience cannot be referenced in one IF function syntax.

<a id="add-if-functions-to-your-responsive-search-ad"></a>

## Add IF functions to your Responsive Search ad

IF functions are encased in brackets and inserted anywhere into a Responsive Search ad, except for the URL fields.

1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
1. Select **Create**.
1. Choose an ad by selecting **Select an ad group** from the **Ad group** dropdown menu.
1. Under **Ad type**, select **Responsive Search ad**.
1. In the **Headlines**, **Descriptions**, or **Display URL** path fields, enter a left brace ( { ) where you want the IF function to appear.
1. In the **Title** or **Ad text** fields, enter a left brace ( { ) where you want the IF function to appear.
1. In the resulting dropdown menu, select **IF function**.
1. If you want to target by **Device** (mobile only), enter the text you want to appear in the **Then only** field. You can also add text in **Otherwise (optional)** for text to appear if the end-user isn't on a mobile device.

   If you want to target by **Audience**, select **Audience** from the **If** dropdown menu, then select the audience list to target. We recommend that you add text in **Otherwise (optional)** for text to appear in case the end-user doesn't belong to any of the selected audience lists. This ensures that your ad always serves.
1. Select **Apply**.
1. Select **Save**.

### Examples

| Microsoft Advertising | Bing Search |
| --- | --- |
| ****Headline 1**: Contoso Shoes<br>**Headline 2**: Summer Sale Going On Now<br>**Headline 3**: Best Selections Available<br>**Description**: Check Out The Best Selection Of Shoes. {=IF (device = mobile,Free Delivery with Mobile Orders!): Free Delivery!}** | **Mobile**<br>![Mobile ad example with IF function](media/BA_CONC_IFFunctions_Mobile.png)<br><br>**Desktop**<br>![Computer ad example with IF function](media/BA_CONC_IFFunctions_Desktop.png) |
| ****Headline 1**: Contoso Jewelry<br>**Headline 2**: Find {=IF(audience in(/Apparel&Accessories), Best Selection Of Women’s Jewelry): Women’s Jewelry} Here<br>**Headline 3**: Best Prices Available<br>**Description**: Find The Perfect Piece Of Jewelry To Treat Yourself!** | **Audience** = Apparal&Accessories<br>![Audience ad example with IF function](media/BA_CONC_IFFunctions_Audience.png)<br><br>**Other audiences**<br>![Other audiences ad example with IF function](media/BA_CONC_IFFunctions_OtherAudiences.png) |

<a id="create-an-if-function-manually"></a>

## Create an IF function manually

You can create an IF function manually by typing directly in the **Create ad** input boxes, by using a bulk upload spreadsheet, or by using Microsoft Advertising Editor. To ensure that you enter it correctly, here's an example of the IF function's components:

{=IF (device = mobile,Free Delivery with Mobile Orders!): Free Delivery!}

| Component | What you need to know |
| --- | --- |
| **{ ... }** | **Mandatory**. The entire IF function syntax must be within a pair of braces (also called curly brackets). |
| **=IF** | **Mandatory**. This component needs to be met so that the text defined in the **Then insert** box can appear in your title, path, or ad text fields. |
| **( ... )** | **Mandatory**. The other components of the syntax must be within a pair of parentheses. *Note:* Individual components within the parentheses must be separated by commas. |
| **"device"** | If the user is on a mobile device, the entire IF function is replaced with the value in “text to insert”. Otherwise, the “default text” that is provided will be used. |
| **"Free Delivery with Mobile Orders!"** | If the user is on a mobile device, the entire IF function is replaced with the value in “text to insert”. Otherwise, the “default text” that is provided will be used. |
| **"Free Delivery!"** | *Optional:* This is the text that will appear in your title, path, or ad text field if the IF function isn't met. |
| **{=IF(audience in(/Apparel&AccessoriesAccessories), Best Selection Of Women’s Jewelry): Women’s Jewelry}** | Example of an IF function targeting an audience list. |

| Component | What you need to know |
| --- | --- |
| **{ ... }** | **Mandatory**. The entire IF function syntax must be within a pair of braces (also called curly brackets). |
| **=IF** | **Mandatory**. This component needs to be met so that the text defined in the **Then insert** box can appear in your title, path, or ad text fields. |
| **( ... )** | **Mandatory**. The other components of the syntax must be within a pair of parentheses. *Note:* Individual components within the parentheses must be separated by commas. |
| **"audience in(/Apparel&AccessoriesAccessories)"** | If the user is on an audience list, the entire IF function is replaced with the value in “text to insert”. Otherwise, the “default text” that is provided will be used. |
| **"Women's Jewelry"** | This is the text that will appear in your title, path, or ad text fields if the IF function conditions are met (must be within a pair of double quotation marks). |
| **"Best Selection of Women's Jewelry"** | *Optional:* This is the text that will appear in your title, path, or ad text field if the IF function isn't met. |

<a id="escape-special-characters-with-backslashes"></a>

## Escape special characters with backslashes (\)

Certain special characters used in an audience name or in the text field can break the syntax, so you'll want to use backslashes (\) to escape the special characters. Below are the rules if these characters are referenced in the IF function syntax.

| Syntax field | Characters to escape | Example | System will detect as |
| --- | --- | --- | --- |
| **Audience name** | ) and , | {=IF(audience IN (Audiencelist\)te\,st),Insert text):Default text } | Audience name =  Audiencelist)te,st |
| **Insert text** | ) | {=IF(audience IN (Audience list),Insert \)text):Default text } | Insert text = Insert )text |
| **Default text** | } | {=IF(device = mobile, Insert Text):Default\}text} | Default text = Default }text |
| **All fields** | \ | {=IF(audience IN (Audience\\list),Insert text):Default text } | Audience name = Audience\list |
