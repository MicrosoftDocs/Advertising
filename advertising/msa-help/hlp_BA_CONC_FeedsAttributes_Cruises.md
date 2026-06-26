---
title: Cruise ads' dynamic data feeds
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Get details about required, recommended, and optional Cruise ads feed attributes.
---

# Cruise ads' dynamic data feeds

A dynamic feed file is a spreadsheet that contains attributes. This file tells Microsoft Advertising the information you want inserted in your ads and under which condition each attribute should be inserted. Some attributes will be featured in the ad itself.

### Upload a feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select **Upload** > **Cruises**.
1. Enter the **Name** and select the feed file to upload.
1. You can **Upload and preview** to view your changes or **Upload and apply** to create your feed.

### Schedule your feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select the feed file you want to create a schedule for.
1. Select the **Schedules** tab.
1. Select **Schedule feed uploads** and enter the scheduling information and URL for your feed.
1. Select **Save**.

## Dynamic feed file attributes

Your dynamic feed file is a spreadsheet comprised of attributes, which we use to generate your ads. Below is a list of required, recommended, and optional attributes for [Cruise ads'](hlp_BA_CONC_Feeds_Cruises.md) feed files.

Your feed file should be tab-delimited plain text saved as any of the following file types: CSV, TSV, XLSX, or ZIP. We recommend you use UTF-8 encoding.

## Required attributes

Your dynamic data feed file must include the following attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Cruise brand** | The brand that operates the cruise.<br>This will not be shown in the ad. | Contoso cruises |
| **Cruise region** | The region the cruise travels to.<br>This will not be shown in the ad. | Caribbean |
| **Departure port city** | The city the cruise departs from. | Fort Lauderdale |
| **Destination port city** | The cruise's destination port city. | Barbados |
| **Final URL** | The same domain as your website. Must begin with http:// or https://.<br>This will not be shown in the ad. | http://www.cruiseexample.com/caribbeanluxury/id |
| **ID** | Unique ID of the item comprised of any sequence of letters and digits.<br>This will not be shown in the ad. | AB1234 |
| **Image URLs** | The URLs for the image used in your ad, which must not be redirected.<br>URLs cannot exceed 2,048 characters and must begin with http:// or https://. Any commas must be encoded.<br>If you are listing multiple Image URLs, use a semicolon (;) as delimiter.<br>We support PNG, BMP, GIF, JPEG, ICO, and MS-DDS, all of which must be saved in RGB color code with an ICC profile.<br>The recommended aspect ratios are: 4:3, 1.5:1, or 16:9.<br>The recommended resolution is: minimum 640x360 pixels and maximum 1920x1080 pixels.<br>Images shouldn't be blurry or contain people, borders, animation, watermarks, or promotional text. Placeholder images will be disapproved. | http://www.contoso.com/image1.png |
| **Itinerary days** | The number of days included in the cruise offering.<br>Either "Nights onboard" or "Itinerary days" is required. If both are provided, "Nights onboard" will be selected. | 9 |
| **Nights onboard** | The number of nights included in the cruise offering.<br>Either "Nights onboard" or "Itinerary days" is required. If both are provided, "Nights onboard" will be selected. | 8 |
| **Starting price** | Starting price for the item. Numeric value followed by currency code (ISO 4217 standard). Use "." as the decimal mark regardless of the local currency. | 900 USD |
| **Target ad group** | The name of the targeted Cruise ad group.<br>If you don't specify a target ad group, we will apply this feed to all ad groups in your targeted campaign. See Target campaign above.<br>This will not be shown in the ad. | Cruises-Ads-placement_AdGroup1 |
| **Target campaign** | The name of the targeted Cruise ads campaign.<br>In addition to targeting a campaign, you can also target a specific ad group within the campaign. See Target ad group below.<br>This will not be shown in the ad. | EMBD_Cruises_ |
| **Title** | The title of the cruise offering. | 9 Day Southern Caribbean Cruise |

## Recommended attributes

Your dynamic data feed file may include any of the following attributes, which we highly recommend:

| Attribute | Description | Example |
| --- | --- | --- |
| **Inclusions** | A list of amenities, separated by ";". | Drinks included; Free Wi-Fi; Flight packages available |
| **Itinerary URL** | The URL of the cruise itinerary. Begin with http:// or https://. | http://cruiseexample.com/caribbeanluxury/itinerary |
| **Ports** | A list of ports the cruise stops in, separated by ";".<br>This will not be shown in the ad. | Saint Lucia; Saint Maarten; Saint Kitts |
| **Ratings** | The rating for the item on a scale of 0-5. | 4.5 |
| **Reviews** | The number of reviews for the item in numerical value. | 2370 |
| **Reviews URL** | The URL for the cruise's ratings. | http://www.examplecruise.com/caribbeanluxury/ratings |

## Optional attributes

Your dynamic data feed file may include any of the following optional attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Book now URL** | The booking landing page.<br>This will not be shown in the ad. | http://cruiseexample.com/caribbeanluxury/booknow |
| **Cancellation policy text** | The cancellation policy for the cruise booking.<br>This will not be shown in the ad. | Free cancellation until 7 days before departure |
| **Contextual keywords** | Specific cruise details used to power relevancy matching, separated by ";". If provided, the information in this column will help the Microsoft AI create more relevant ads for your campaign.<br>This will not be shown in the ad. | FL cruises; Caribbean cruises |
| **Cruise name** | The name of the cruise.<br>This will not be shown in the ad. | Southern Caribbean Getaway |
| **Custom parameter** | Include up to three key and value pairs, which automatically fill up in the click URL.<br>List the key and value pairs within braces. Each term should be set in quotation marks. Separate each phrase of the pair with a colon and separate key and value pairs with commas and without any spaces.<br>The maximum limit is 16 characters or 200 bytes.<br>This will not be shown in the ad. | {"region" : "caribbean", "destination port" : "ft lauderdale"} |
| **Departure date** | The date that the cruise begins from its departure port in yyyy/mm/dd format. This will not be shown in the ad. | 2022/07/30 |
| **Departure port country** | The country/region that the cruise departs from (ISO 3166-1 standards or full country name).<br>This will not be shown in the ad. | US |
| **Departure port state** | The state or province the cruise departs from.<br>This will not be shown in the ad. | Florida |
| **Description** | A short description of the cruise offering.<br>This will not be shown in the ad. | 9-day cruise looping around the gorgeous Southern Caribbean islands, where you can explore relaxing beaches while having the comfort of a luxurious cruise to return to. |
| **Excursions** | A list of excursions for the cruise offering, separated by ";".<br>This will not be shown in the ad. | Authentic tastes of the Caribbean; Scuba diving |
| **Final mobile URL** | The item's mobile-optimized landing page when you have a different URL for mobile and computer traffic.<br>This will not be shown in the ad. | http://www.m.contoso.com/asp/sp.asp?id=abc123 |
| **Free cancellation** | Whether free cancellation is allowed. True or False is supported.<br>This will not be shown in the ad. | TRUE |
| **Number of countries** | The number of countries the cruise travels through.<br>This will not be shown in the ad. | 5 |
| **Promotions** | Any offered promotions can be listed here.<br>This will not be shown in the ad. | Summer special 20% off |
| **Safety procedure** | Use this to mark whether cruise has COVID and/or other safety precautions and requirements. True or False is supported.<br>This will not be shown in the ad. | TRUE |
| **Safety procedure URL** | The URL of the page where your cruise's COVID safety procedures are outlined.<br>This will not be shown in the ad. | http://cruiseexample.com/safetyprocedures |
| **Ship name** | The name of the cruise ship.<br>This will not be shown in the ad. | Celebrity Reflection |
| **Tracking template** | Include any tracking parameters, custom parameters, or tracking redirects for your item URL.<br>This will not be shown in the ad. | http://www.trackingtool.com/?source=Microsoft&pcategory={_pcategory}&city={_city} |
| **Video URLs** | The URL for the video used in your ad. Must begin with http:// or https://.<br>We support MPG, MP4, AVI, etc.<br>*Note:* We'll leverage this in the future. | http://www.contoso.com/video1.mpg |
| **Wheelchair accessible** | Whether the cruise is wheelchair accessible. True or False is supported.<br>This will not be shown in the ad. | TRUE |
