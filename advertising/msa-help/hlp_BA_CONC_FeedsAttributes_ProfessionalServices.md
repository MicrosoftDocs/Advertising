---
title: Professional services ads' dynamic data feeds
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Get details about required, recommended, and optional Professional Services ads feed attributes.
---

# Professional Services ads' dynamic data feeds

A dynamic feed file is a spreadsheet that contains attributes. This file tells Microsoft Advertising the information you want inserted in your ads and under which condition each attribute should be inserted. Some attributes will be featured in the ad itself.

### Upload a feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select **Upload** > **Professional Services**.
1. Enter the **Name** and select the feed file to upload.
1. You can **Upload and preview** to view your changes or **Upload and apply** to create your feed.

### Schedule your feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select the feed file you want to create a schedule for.
1. Select the **Schedules** tab.
1. Select **Schedule feed uploads** and enter the scheduling information and URL for your feed.
1. Select **Save**.

## Dynamic feed file attributes

Your dynamic feed file is a spreadsheet comprised of attributes, which we use to generate your ads. Below is a list of required, recommended, and optional attributes for [Professional Services ads'](hlp_BA_CONC_Feeds_ProfessionalServices.md) feed files.

Your feed file should be tab-delimited plain text saved as any of the following file types: CSV, TSV, XLSX, or ZIP. We recommend you use UTF-8 encoding.

> [!NOTE]
> - In order for your Professional Services ads to serve, your feed file needs to designate a profession from the specified list below.
> - > [!NOTE]
>   > The following examples are for a real estate professional.

## Required attributes

Your dynamic data feed file must include the following attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Description** | A short description of the company or professional. | Luxury real estate company |
| **Final URL** | The same domain as your website. Must begin with http:// or https://.<br>This will not be shown in the ad. | http://www.contoso.com/seattle/id |
| **ID** | Unique ID of the item comprised of any sequence of letters and digits.<br>This will not be shown in the ad. | AB1234 |
| **Image URLs** | The URLs for the image used in your ad. Must begin with http:// or https://.<br>We support PNG (recommended), BMP, GIF, JPG, or TIFF, all of which must be saved in RGB color code with an ICC profile. SVG is not supported.<br>If you are listing multiple Image URLs, use a semicolon (;) as delimiter.<br>The recommended aspect ratio: 0.8:1.<br>The minimum image size: 100 x 125 pixels. The maximum image size is 3.9MB. We recommend that you upload the largest possible image. | http://www.contoso.com/image1.png |
| **Name** | The name of the company or professional.<br>If it's a professional, put first name + last name. | David Johnson |
| **Profession** | The type of profession.<br>This will not be shown in the ad. Instead, we'll use this to match ads with terms people search for.<br>*Note:* You must choose one of the following examples for your ad to serve. | Doctors and clinics (available in Australia, Canada, France, Germany, India, United Kingdom, and United States)<br>Home services<br>Insurance<br>Lawyers and legal services<br>Real estate<br>Tax services (available in Canada and United States) |
| **Target ad group** | The name of the targeted Professional Services ad group.<br>This will not be shown in the ad. | Real-Estate-Placement-AdGroup |
| **Target campaign** | The name of the targeted Professional Services ads campaign.<br>This will not be shown in the ad. | Real_Estate |

## Recommended attributes

Your dynamic data feed file may include any of the following attributes, which we highly recommend:

| Attribute | Description | Example |
| --- | --- | --- |
| **City** | The city of the office or anchoring city for the designated market areas (DMA). | Bellevue |
| **In business since** | The year the company or professional started in the profession.<br>Fill out this attribute or Years of experience below. | 2007 |
| **Languages** | Languages the professional speaks. | Hebrew; Spanish |
| **Num of reviews** | The number of reviews for the company or professional. | 12500 |
| **Phone number** | The company's or professional's phone number. Follows ITU E.123 format. | +1 800 378 7262 |
| **Rating** | The rating for the company or professional on a scale of 0-5. | 4.8 |
| **Service cities** | Cities for which a real estate company or agent provide services, separated by “;”. | Bellevue; Seattle |
| **Services** | Types of services provided, separated by “;”. | Buyer service; Seller service |
| **Service subcategory** | Subcategories of the services, separated by “;”. | Full service; Self-serve |
| **Years of experience** | The number of years in business.<br>Fill out this attribute or In business since above. | 15 |

## Optional attributes

Your dynamic data feed file may include any of the following optional attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Accepting new clients** | Use true or false to indicate whether or not the professional is accepting new clients. If true, "Accepting new clients" will be displayed as a badge on the ad copy. | TRUE |
| **Address** | Either provide the first line of the street address or the full address. If only the street address is provided, fill in the city, state, and zip as other attributes.<br>This will not be shown in the ad. | 123 Boulevard Street |
| **Affiliation** | The affiliated company or organization. | Local Boutique Seattle; RE/MAX |
| **Contextual keywords** | Specific professional services details used to power relevancy matching, separated by ";". If provided, the information in this column will help the Microsoft AI create more relevant ads for your campaign.<br>This will not be shown in the ad. | Real estate; townhouse; townhouse for sale |
| **Country** | The country or countries the company or professional service (ISO 3166-1 standards or full country name), separated by “;”.<br>This will not be shown in the ad. | US |
| **County** | The county or counties the company or professional service, separated by “;”.<br>This will not be shown in the ad. | King County |
| **Custom parameter** | Include key and value pairs, which automatically fill up in the click URL.<br>List the key and value pairs within braces. Each term should be set in quotation marks. Separate each phrase of the pair with a colon and separate key and value pairs with commas and without any spaces.<br>This will not be shown in the ad. | {“pcategory”:“real estate”} |
| **Degree & certifications** | The professional's degrees or certifications. | CRS |
| **District** | The district(s) the company or professional serves.<br>This will not be shown in the ad. | Queen Anne |
| **Email** | The company's or professional's email address. | ramram@contoso.com |
| **Final mobile URL** | The item's mobile-optimized landing page when you have a different URL for mobile and computer traffic. | http://www.m.contoso.com/asp/sp.asp?id=abc123 |
| **Gender** | The professional's gender. | Male |
| **LinkedIn URL** | LinkedIn profile URL. | linkedin.com/DavidJohnson |
| **Price unit** | Used in tandem with the Starting price (see below), this helps form the price. For instance, these examples come together as 78 USD per hour. | Hour |
| **Sale price** | The starting sale price for the item or rate of services. Numeric value followed by currency code (ISO 4216 standard). Use “.” As the decimal mark regardless of the local currency. | 50 USD |
| **Service areas** | Neighborhoods for which a real estate company or agent provides services, separated by “;”. | Ballard; South Lake Union |
| **Specialties** | Any specialties, such as types or home, price ranges, etc. | Townhouses; Condominiums |
| **Starting price** | The starting price for the product or rate of services. Numeric value followed by currency code (ISO 4217 standard). Use “.” As the decimal mark regardless of local currency<br>See Price unit (above). | 78 USD |
| **State** | The state or states the company or professional services, separated by “;”.<br>This will not be shown in the ad. | Washington; Oregon; California |
| **Tracking template** | Include any tracking parameters, custom parameters, or tracking redirects for your item URL.<br>This will not be shown in the ad. | http://www.trackingtool.com/?source=Microsoft&pcategory={_pcategory}&city={_city} |
| **Video URLs** | The URL for the video used in your ad. Must begin with http:// or https://.<br>We support MPG, MP4, AVI, etc.<br>*Note:* We'll leverage this in the future. | http://www.contoso.com/video1.mpg |
| **Monday hours** | Hours of operation in local time or a closed specification. If the business doesn't have closing hours, use "24/7". | 9:00-17:00 |
| **Tuesday hours** | Hours of operation in local time or a closed specification. If the business doesn't have closing hours, use "24/7". | 9:00-17:00 |
| **Wednesday hours** | Hours of operation in local time or a closed specification. If the business doesn't have closing hours, use "24/7". | 9:00-17:00 |
| **Thursday hours** | Hours of operation in local time or a closed specification. If the business doesn't have closing hours, use "24/7". | 9:00-17:00 |
| **Friday hours** | Hours of operation in local time or a closed specification. If the business doesn't have closing hours, use "24/7". | Closed |
| **Saturday hours** | Hours of operation in local time or a closed specification. | Closed |
| **Sunday hours** | Hours of operation in local time or a closed specification. If the business doesn't have closing hours, use "24/7". | 9:00-17:00 |
