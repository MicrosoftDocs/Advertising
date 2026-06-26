---
title: Tours and activities ads' dynamic data feeds
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Get details about required, recommended, and optional feed attributes for Tours and activities ads.
---

# Tours and activities ads' dynamic data feeds

A dynamic feed file is a spreadsheet that contains attributes. This file tells Microsoft Advertising the information you want inserted in your ads and under which condition each attribute should be inserted. Some attributes will be featured in the ad itself.

### Upload a feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select **Upload** > **Tours and activities**.
1. Enter the **Name** and select the feed file to upload.
1. You can **Upload and preview** to view your changes or **Upload and apply** to create your feed.

### Schedule your feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select the feed file you want to create a schedule for.
1. Select the **Schedules** tab.
1. Select **Schedule feed uploads** and enter the scheduling information and URL for your feed.
1. Select **Save**.

## Dynamic feed file attributes

Your dynamic feed file is a spreadsheet comprised of attributes, which we use to generate your ads. Below is a list of required, recommended, and optional attributes for [Tours and Activities ads'](hlp_BA_CONC_Feeds_ToursActivities.md) feed files.

Your feed file should be tab-delimited plain text saved as any of the following file types: CSV, TSV, XLSX, or ZIP. We recommend you use UTF-8 encoding.

## Required attributes

Your dynamic data feed file must include the following attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Final URL** | The same domain as your website. Must begin with http:// or https://.<br>This will not be shown in the ad. | http://www.contoso.com/seattle/id |
| **ID** | Unique ID of the item comprised of any sequence of letters and digits.<br>This will not be shown in the ad. | AB1234 |
| **Image URLs** | The URLs for the image used in your ad, which must not be redirected.<br>URLs cannot exceed 2,048 characters and must begin with http:// or https://. Any commas must be encoded.<br>If you are listing multiple Image URLs, use a semicolon (;) as delimiter.<br>We support PNG, BMP, GIF, JPEG, ICO, and MS-DDS, all of which must be saved in RGB color code with an ICC profile.<br>The recommended aspect ratios are: 4:3, 1.5:1, or 16:9.<br>The recommended resolution is: minimum 640x360 pixels and maximum 1920x1080 pixels.<br>Images shouldn't be blurry or contain people, borders, animation, watermarks, or promotional text. Placeholder images will be disapproved. | http://www.contoso.com/image1.png |
| **Starting price** | Starting price for the item. Numeric value followed by currency code (ISO 4217 standard). Use “.” as the decimal mark regardless of the local currency. | 200.00 USD |
| **Target ad group** | The name of the targeted ad group.<br>If you don't specify a target ad group, we will apply this feed to all ad groups in your targeted campaign. See Target campaign above.<br>This will not be shown in the ad. | Tours-Activities-Ads-Placement_AdGroup1 |
| **Target campaign** | The name of the targeted Tours and Activities ads campaign.<br>In addition to targeting a campaign, you can also target a specific ad group within the campaign. See Target ad group below.<br>This will not be shown in the ad. | EMDB_Tours |
| **Title** | The title of the item. | Contoso Wine Tour |

## Recommended attributes

Your dynamic data feed file may include the following attributes, which we highly recommend:

| Attribute | Description | Example |
| --- | --- | --- |
| **Duration** | The duration of the item in DD:HH:MM format. | 02:03:30 |
| **Num of reviews** | The number of reviews for the item in numerical value. | 12500 |
| **Primary categories** | Categories and subcategories that the item belongs to. Multiple categories can be provided, separated by “;”. | Food & Wine; Wine Tasting |
| **Provider** | The name of the provider or seller of the item. | Contoso Winery |
| **Rating** | The rating for the item on a scale of 0-5. | 4.5 |

## Optional attributes

Your dynamic data feed file may include any of the following optional attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Attractions** | List of attractions for the item (if applicable), separated by “;”. | Winery; Wine Cellar; Wine Tour |
| **Contextual keywords** | Specific tours and activities details used to power relevancy matching, separated by ";". If provided, the information in this column will help the Microsoft AI create more relevant ads for your campaign.<br>This will not be shown in the ad. | Woodinville Winery; Wine Tours; Wine Cellar |
| **Custom parameter** | Include up to 3 key and value pairs, which automatically fill up in the click URL.<br>List the key and value pairs within braces. Each term should be set in quotation marks. Separate each phrase of the pair with a colon and separate key and value pairs with commas and without any spaces.<br>The maximum limit is 16 characters or 200 bytes.<br>This will not be shown in the ad. | {“city”:”Seattle”, “pcategory”:”daytours”} |
| **Description** | A short description of the item that appears in the ad. | Sample the Pacific Northwest's most delicious red and white wines. |
| **Destination address** | Either provide the first line of the street address or the full address. If only the street address is provided, fill in the city, state, and zip code as other attributes. | 123 Contoso Ave<br>or<br>123 Contoso Ave, Bellevue, WA 98004 |
| **Destination city** | The item's destination city. | Seattle |
| **Destination country** | The item's destination country (ISO 3166-1 standards or full country name). | United States |
| **Destination ID** | A unique ID comprised of any sequence of letters and digits of the destination or geo at the city level.<br>This will not be shown in the ad. | GEO123 |
| **Destination name** | The name of the location users will be visiting. | Contoso Wine Garden |
| **Destination state** | The item's destination state or province. | Washington |
| **Final mobile URL** | The item's mobile-optimized landing page when you have a different URL for mobile and computer traffic.<br>This will not be shown in the ad. | http://www.m.contoso.com/asp/sp.asp?id=abc123 |
| **Is best seller** | Use true or false to indicate if the item is best seller. | TRUE |
| **Is hotel pickup available** | Use true or false to indicate if hotel pick-up is available. | FALSE |
| **Is likely to sell out** | Use true or false to indicate if the item is likely to sell out. | TRUE |
| **Related categories** | Other top-level categories that the item might belong to. | Wine Tasting |
| **Similar destination IDs** | Similar destination IDs at the city-level related to this item. Multiple destination IDs should be separated by ";".<br>This will not be shown in the ad. | GEO456; GEO789 |
| **Starting sale price** | The starting sale price for the item. “Starting sale price” values should be less than “Starting price”. If provided, sale price will be used.<br>Numeric value followed by currency code (ISO 4217 standard). Use “.” as the decimal mark regardless of the local currency. | 15.00 USD |
| **Tracking template** | Include any tracking parameters, custom parameters, or tracking redirects for your item URL.<br>This will not be shown in the ad. | http://www.trackingtool.com/?source=Microsoft&pcategory={_pcategory}&city={_city} |
| **Video URLs** | The URL for the video used in your ad. Must begin with http:// or https://.<br>We support: MPG, MP4, AVI, etc.<br>*Note:* We'll leverage this in the future. | http://www.contoso.com/video1.mpg |
