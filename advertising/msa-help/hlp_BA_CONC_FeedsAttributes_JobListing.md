---
title: Job listing ads' dynamic data feeds
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Get details about required, recommended, and optional feed attributes for Job listing ads.
---

# Job listing ads' dynamic data feeds

A dynamic feed file is a spreadsheet that contains attributes. This file tells Microsoft Advertising the information you want inserted in your ads and under which condition each attribute should be inserted. Some attributes will be featured in the ad itself.

### Upload a feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select **Upload** > **Job listings**.
1. Enter the **Name** and select the feed file to upload.
1. You can **Upload and preview** to view your changes or **Upload and apply** to create your feed.

### Schedule your feed file

1. From the navigation menu on the left, select **Tools** > **Business data** > **Dynamic data feeds**.
1. Select the feed file you want to create a schedule for.
1. Select the **Schedules** tab.
1. Select **Schedule feed uploads** and enter the scheduling information and URL for your feed.
1. Select **Save**.

## Dynamic feed file attributes

Your dynamic feed file is a spreadsheet comprised of attributes, which we use to generate your ads. Below is a list of required, recommended, and optional attributes for [Job listing ads'](hlp_BA_CONC_Feeds_JobListing.md) feed files.

Your feed file should be tab-delimited plain text saved as any of the following file types: CSV, TSV, XLSX, or ZIP. We recommend you use UTF-8 encoding.

## Required attributes

Your dynamic data feed file must include the following attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Date posted** | The date when the job was posted, listed using the following accepted formats: yyyy/mm/dd, yyyy/m/d, or yyyy/mm/dd hh:mm:ss. | 2023/11/17 |
| **Description** | The entire job description copied from the job posting itself. |  |
| **Country** | The country where the job is located (ISO 3166-1 standards or full country name).<br>This will not be shown in the ad. | USA |
| **Employment type** | The type of employment for the job seeker (e.g., full time, part time, contract, temporary). | Full time |
| **Final URL** | The same domain as your website. Must begin with http:// or https://. | http://www.contoso.com/seattle/jobpostingid=13 |
| **Hiring organization** | The name of the hiring company or organization. | Contoso University |
| **ID** | Unique ID of the job listing comprised of any sequence of letters and digits.<br>This will not be shown in the ad. | AB1234 |
| **Target ad group** | The name of the targeted ad group.<br>This will not be shown in the ad. | Contoso_JobListingAds_1 |
| **Target campaign** | The name of the targeted Job listing ads campaign.<br>This will not be shown in the ad. | Contoso_JobListingAds_A |

## Recommended attributes

> [!NOTE]
> > [!NOTE]
> > Your Job listing ads will perform better if they include salary details.

Your dynamic data feed file may include the following attributes, which we highly recommend:

| Attribute | Description | Example |
| --- | --- | --- |
| **Actual max base salary** | The actual maximum salary for the job. Numeric value followed by currency code (ISO 4217 standard). | 135000 USD |
| **Actual min base salary** | The actual minimum salary for the job. Numeric value followed by currency code (ISO 4217 standard). | 95000 USD |
| **Address** | The address where the job is located.<br>Either provide the first line of the street address or the full address. If you only provide the street address, fill in the city, state, and zip code as other attributes.<br>This will not be shown in the ad. | 123 Boulevard Street |
| **Callout** | Can be used to call out special aspects about the job listing, such as a brief description of the job listing. |  |
| **City** | The city where the job is located. | Seattle |
| **Estimated max base salary** | The estimated maximum salary for the job. Numeric value followed by currency code (ISO 4217 standard). | 135000 USD |
| **Estimated min base salary** | The estimated minimum salary for the job. Numeric value followed by currency code (ISO 4217 standard). | 95000 USD |
| **Industry** | The industry associated with the job position.<br>This will not be shown in the ad. | Nursing |
| **Image URLs** | The URLs for the image used in your ad, which must not be redirected.<br>We support BMP, GIF, JPG, or PNG (recommended), all of which must be saved in RGB color code with an ICC profile.<br>If you are listing multiple Image URLs, use a semicolon (;) as delimiter.<br>The minimum image size is 100 x 100 pixels.<br>We recommend that you upload the largest possible image. | https://yourimage.com/image.jpg |
| **Job board** | The job board that this job listing is from. | Glassdoor |
| **Job title** | The standard job title. | Registered nurse |
| **Latitude** | The latitude of the job location.<br>List in the DDD.DDDDD format.<br>This will not be shown in the ad. | -122.30415 |
| **Location type** | A description of the type of job location (e.g., remote, telecommute, work from home, online, offsite, in-office). | Telecommute |
| **Longitude** | The longitude of the job location.<br>List in the DDD.DDDDD format.<br>This will not be shown in the ad. | 47.65617 |
| **Qualifications** | A list of job qualifications, separated by “;”.<br>This will not be shown in the ad. | 2 years ICU experience; RN license |
| **Salary unit** | Indicate “per hour” (hourly) or “per year” (annual) salary. | Per hour |
| **State** | The state or province where the job is located. | WA |
| **Zip code** | The zip code where the job is located.<br>This will not be shown in the ad. | 98195 |

## Optional attributes

Your dynamic data feed file may include any of the following optional attributes:

| Attribute | Description | Example |
| --- | --- | --- |
| **Benefits** | A list of benefits provided by the hiring company or organization, separated by “;”. | Health; Vision; Dental; 401K match |
| **Contextual keywords** | Specific job listing details used to power relevancy matching. Use ";" to separate multiple keywords.<br>This will not be shown in the ad. | Nursing; Flexible; Healthcare; Overtime |
| **Custom parameters** | Include up to three key and value pairs, which automatically fill up in the click URL.<br>List the key and value pairs within braces. Each term should be set in quotation marks. Separate each phrase of the pair with a colon and separate key and value pairs with commas and without any spaces.<br>Neither one can exceed 16 characters or 200 bytes.<br>This will not be shown in the ad. | {"jobtype":"telecommute"} |
| **Education requirements** | The highest level of education required to be eligible for employment. | Bachelor's degree |
| **Final mobile URL** | The mobile-optimized URL of the landing page in your website that people reach when they click your ad from mobile devices. Same domain as your website, begins with http:// or https://. | http://m.www.contoso.com/seattle/id |
| **Responsibilities** | A list of responsibilities the job entails, separated by “;”. | Delivering mild sedation; Monitoring of patients’ vitals during and after sedation |
| **Tracking template** | Include any tracking parameters, custom parameters, or tracking redirects for your listing URL.<br>This will not be shown in your ad. | http://www.trackingtool.com/?source |
| **Video URL** | The single URL for the video used in your ad. MP4 format only. http:// or https:// only.

> [!NOTE] 
> We'll leverage this in the future. | http://www.trackingtool.com/?source=Microsoft&pcategory={_pcategory}&city={_city} |
