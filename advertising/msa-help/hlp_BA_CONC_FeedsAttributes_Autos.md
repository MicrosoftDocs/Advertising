---
title: Automotive listing inventory ads' dynamic data feeds
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Get details about required, recommended, and optional feed attributes for Automotive listing ads.
---

# Automotive listing inventory ads' dynamic data feeds

A dynamic feed file is a spreadsheet that contains attributes. This file tells Microsoft Advertising the information you want inserted in your ads and under which condition each attribute should be inserted. Some attributes will be featured in the ad itself.

### Upload a feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select **Upload** > **Autos** > **Listing inventory**.
1. Enter the **Name** and select the feed file to upload.
1. You can **Upload and preview** to view your changes or **Upload and apply** to create your feed.

### Schedule your feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select the feed file you want to create a schedule for.
1. Select the **Schedules** tab.
1. Select **Schedule feed uploads** and enter the scheduling information and URL for your feed.
1. Select **Save**.

## Dynamic feed file attributes

Your dynamic feed file is a spreadsheet comprised of attributes, which we use to generate your ads. Below is a list of required, recommended, and optional attributes for [Automotive listing inventory ads'](hlp_BA_CONC_Feeds_Autos.md) feed files.

Your feed file should be tab-delimited plain text saved as any of the following file types: CSV, TSV, XLSX, or ZIP. We recommend you use UTF-8 encoding.

## Required attributes

Your dynamic data feed file must include the following attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Country** | The country where the dealership or car listing is located (ISO 3166-1 standards or full country name).<br>This will not be shown in the ad. | USA |
| **Final URL** | The same domain as your website. Must begin with http:// or https://. | http://www.contoso.com/seattle/id |
| **Image URLs** | The URLs for the image used in your ad, which must not be redirected.<br>URLs cannot exceed 2,048 characters and must begin with http:// or https://. Any commas must be encoded.<br>If you are listing multiple Image URLs, use a semicolon (;) as delimiter.<br>We support PNG, BMP, GIF, JPEG, ICO, and MS-DDS, all of which must be saved in RGB color code with an ICC profile.<br>The recommended aspect ratios are: 4:3, 1.5:1, or 16:9.<br>The recommended resolution is: minimum 640x360 pixels and maximum 1920x1080 pixels.<br>Please use images that show a zoomed exterior of the vehicle (front, side, or back views). If there are multiple images in the URL, make sure the first few are of the exterior, followed by interior views. Ensure variety in your image selection. Images shouldn't be blurry or contain people, borders, animation, watermarks, or promotional text. Placeholder images will be disapproved. | http://www.contoso.com/image1.png |
| **Make** | The make of the vehicle. | Contoso |
| **Model** | The model of the vehicle. | Contoso Model |
| **Price** | The final cost of the vehicle.<br>Provide the number followed by the currency code (ISO 4217 standards). Use "." as the decimal mark regardless of the local currency.<br>This attribute may be omitted if you provide Monthly payment, which is for payment types such as leases and finances. | 25000.00 USD |
| **Target ad group** | The name of the targeted ad group.<br>If you don't specify a target ad group, we'll apply this feed to all ad groups in your targeted campaign. See Target campaign above.<br>This will not be shown in the ad. | AutosAdGroup |
| **Title** | The full name of the vehicle. | Subaru Outback Limited Automatic AWD |
| **Target campaign** | The name of the targeted Automotive ads campaign.<br>In addition to targeting a campaign, you can also target a specific ad group within the campaign. See Target ad group below.<br>This will not be shown in the ad. | AutosCampaign |
| **Vehicle ID** | Unique ID of the listing comprised of any sequence of letters and digits.<br>This will not be shown in the ad. | 1234XYZ |
| **Vehicle type** | The type of vehicle.<br>This attribute is required for all vehicle types that aren't cars. We'll default to "car_truck" if this attribute isn't listed. ("Car_truck" applies to both cars and non-commercial vans or trucks.)<br>This will not be shown in the ad. | boat<br>car_truck<br>commercial_trailer<br>commercial_truck<br>commercial_van<br>motorcycle<br>powersports<br>rv_camper |

## Recommended attributes

Your dynamic data feed file may include the following attributes, which we highly recommend:

| Attribute | Description | Example |
| --- | --- | --- |
| **Body style** | The body style of the vehicle. | SUV |
| **City** | The city where the dealership or the car listing is located. | Seattle |
| **CO2 emission** | Carbon dioxide emissions for the vehicle. | 119 |
| **CO2 emission unit** | Unit can be g/km or g/mi. | g/km |
| **Drivetrain** | The drivetrain of the vehicle. | AWD |
| **Engine** | The engine capacity of the vehicle. | 4 Cyl 2.4 L |
| **Exterior color** | The exterior color of the vehicle. | Black |
| **Fuel type** | The fuel type of the vehicle. | Gasoline |
| **Interior color** | The interior color of the vehicle. | Gray |
| **State** | The state where the dealership or car listing is located. | WA |
| **Trim** | The trim of the vehicle. | Limited |
| **Year** | The year the vehicle was launched in yyyy format. | 2020 |

## Optional attributes

Your dynamic data feed file may include any of the following optional attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Address** | Either provide the first line of the street address or the full address. If you only provide the street address, fill in the city, state, and zip code as other attributes. | 123 Boulevard Street |
| **Availability** | The status of the vehicle's availability.<br>This will not be shown in the ad. | Available |
| **Callout** | Can be used to call out special attributes about the product. | Pre-order availability; free delivery |
| **Contextual keywords** | Specific vehicle details used to power relevancy matching. Use ";" to separate multiple keywords.<br>This will not be shown in the ad. | Used cars for sale; SUV; Automatic; 5 seats; 4 doors |
| **Condition** | The condition of the vehicle (e.g., excellent, good, fair, poor, or other). | Excellent |
| **Custom parameters** | Include up to 3 key and value pairs, which automatically fill up in the click URL.<br>List the key and value pairs within braces. Each term should be set in quotation marks. Separate each phrase of the pair with a colon and separate key and value pairs with commas and without any spaces.<br>Neither one can exceed 16 characters or 200 bytes.<br>This will not be shown in the ad. | {"Bstyle":"SUV",“state”:”new”,”condition”:”excellent”} |
| **Daily payment** | The daily payment amount in the local currency. Use "." as the decimal mark regardless of the local currency. | 12.00 USD |
| **Dealer discount** | Any discount applied to the selling price of the vehicle in the local currency. Use "." as the decimal mark regardless of the local currency. | 2500.00 USD |
| **Dealer name** | The name of the dealer. | Contoso Dealername |
| **Description** | Short text description of the vehicle. | Supercharged! Automatic! Gasoline! |
| **Down payment** | Finance down payment in dollar value. Use "." as the decimal mark regardless of the local currency. | 2000.00 USD |
| **Due at signing** | The lease due at signing in dollar value. Use "." as the decimal mark regardless of the local currency. | 2000.00 USD |
| **Email** | The dealer's email address. | dealername@example.com |
| **Final mobile URL** | The mobile-optimized URL of the landing page in your website that people reach when they click your ad from mobile devices. Same domain as your website, begins with http:// or https://. | http://m.www.contoso.com/seattle/id |
| **Fuel efficiency average** | The vehicle's average fuel efficiency between city and highway efficiencies. | 30.7 |
| **Fuel efficiency city** | The vehicle's fuel efficiency for the city. | 29.0 |
| **Fuel efficiency highway** | The vehicle's fuel efficiency the for the highway. | 32.5 |
| **Fuel efficiency unit** | The unit of the fuel efficiency: MPG, KPL, or KMPL, etc. | MPG |
| **Latitude** | Latitude of the dealership or car listing.<br>List in the DDD.DDDDD format.<br>This will not be shown in the ad. | 37.94 |
| **Longitude** | Longitude of the dealership or car listing.<br>List in the DDD.DDDDD format.<br>This will not be shown in the ad. | -121.69 |
| **Mileage unit** | Mileage units. We support values of MI or KM. | MI |
| **Mileage value** | For used vehicles, this is the mileage of the vehicle in miles or kilometers. For new vehicles, use “zero”. | 1200 |
| **Monthly payment** | The monthly payment amount.<br>Provide the number followed by the currency code (ISO 4217 standards). Use "." as the decimal mark regardless of the local currency. Use "." as the decimal mark regardless of the local currency. | 350.00 USD |
| **Payment term** | The length of the agreement in months. | 60 months |
| **Payment type** | The payment deal type (e.g., lease, finance, balloon). | Finance |
| **Phone number** | The phone number of the dealership following ITU E.123 format. | +1 (425) 111-2222 |
| **Sale price** | The sale or special price. Use "." as the decimal mark regardless of the local currency. | 22000.00 USD |
| **State of vehicle** | The current state of the vehicle (e.g., new, used, CPO). | New |
| **Tracking template** | Upgraded URLs. Include ValueTrack parameters, custom parameters, or tracking redirects for your item URL.<br>This will not be shown in your ad. | http://www.trackingtool.com/?source |
| **Video URL** | The single URL for the video used in your ad. MP4 format only. http:// or https:// only. *Note:* We'll leverage this in the future. | http://www.contosoexample.com/video.mp4 |
| **VIN** | The VIN number of the vehicle. | V285N34S543T674 |
| **Zip code** | The postal code of the dealership or car listing.<br>This will not be shown in your ad. | 98007 |
