---
title: Enhanced conversions
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Microsoft Advertising utilizes Enhanced conversions to supplement existing conversion tracking by using first-party data.
---

# Enhanced conversions

Microsoft Advertising utilizes Enhanced conversions to supplement existing conversion tracking by using first-party data. Enhanced conversions improves the accuracy of conversion tracking because first-party data is more reliable than third-party data. Using first-party data also helps to prepare for the deprecation of third-party data due to industry trends.

Instead of using a third-party cookie with the Microsoft User ID, Enhanced conversions allows for the use of first-party information such as email address or phone number. To set up Enhanced conversions, you need to enable it during the conversion setup workflow and follow the instructions to encrypt, or hash, this information properly. [Learn more](https://go.microsoft.com/fwlink/?linkid=785817) about the Microsoft Advertising privacy standards.

## How it works

First-party customer data, in the form of an email address or phone number, can be captured when a customer completes a conversion on your website. This data can then be hashed and sent to Microsoft Advertising to enhance your conversion metrics. We attribute hashed emails or phone numbers to the relevant ad campaign by matching advertiser data to user activity on Microsoft properties.

## Before you begin

- Know the conversion page URL where the conversion tag fires (such as the confirmation page URL) and the conversion event trigger (for example, a button click or a page view).
- Make sure there is first-party customer data available (email or phone number) on the page where your conversion tracking tag fires.
- This implementation requires knowledge of how conversion tracking is set up on your website and some code changes, so make sure you're able to speak with your development team as needed.

## Set up an enhanced conversion goal

You need to create a new enhanced conversion goal or update an existing conversion goal to enhanced.

1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
1. Select **Create**.
1. Choose **Website** as the kind of conversions you'd like to track.
1. Select the goal category and goal type according to your preferences.
1. Select **Turn on Enhanced conversions**.

## Update an existing conversion goal to enhanced

1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
1. From the table, select the name of the conversion goal you want to update to enhanced.
1. Ensure **Website** is set as the type of conversions you'd like to track.
1. Review the goal category and goal type according to your preferences.
1. Select **Turn on Enhanced conversions**.

<a id="set-up-enhanced-conversions-for-online-conversions"></a>

## Set up Enhanced conversions for online conversions

After you create or update an enhanced conversion goal, you can configure your UET tag to work with that goal.

> [!NOTE]
> - Selecting **Enhanced Conversion** will only apply to the current conversion goal.
> - You can follow the following instructions manually yourself or send them via email to a developer.
> - To set up enhanced conversions in Google Tag Manager, see [Set up UET tags using Google Tag Manager](hlp_BA_PROC_UET_TMS_GTM.md).

> [!IMPORTANT]
> Before you implement the following code on your website, you need to create an enhanced conversion goal or update any existing conversion goal to an enhanced goal.

1. Copy the following snippet and paste it in between the <head> and </head> tags of the page(s) you'd like to track, right after the base UET tag. 
```
<script> // Option 1: Set the email address and phone number for all events fired from page (including pageLoad) window.uetq = window.uetq || []; window.uetq.push('set', { 'pid': { 'em': 'example@contoso.com', 'ph': '+142555512345' } }); 
// Option 2: Example for providing email address and phone number on custom event function reportCustomEvent() { window.uetq = window.uetq || []; window.uetq.push('event', 'MyAction', { 'pid': { 'em': txtEM.value.toString(), 'ph': textPH.value.toString() } }); 
} 
</script>
```
1. Ensure you replace the variable names above with the real variable names you are defining on your page for these customer attributes. For example, if your variable name is "email_address", then edit the snippet to reflect that by replacing where it says "em" with "email_address". You can also do a function call that returns the value instead of the variable name.
1. If you only pass one of the two fields (either email address or phone number), you can replace the variable name with an empty string ("") for the other property. For example, replace ph with "" if you do not want to pass a phone number.
1. Follow the instructions in the **Format and hash the data** section below if necessary.

   > [!NOTE]
   > - For online enhanced conversions using email addresses, it is optional to format and hash the data. If we detect that the email address is not formatted and hashed, we will do it for you in a privacy-safe manner.
   > - For online enhanced conversions using phone numbers, you have to format the data yourself, but hashing it is optional. If we detect that the phone number is not hashed, we will do it for you in a privacy-safe manner.

## Set up Enhanced conversions for offline conversions

For offline conversions to work, you'll need to complete the following steps before you import your conversions.

Download the import template as an [Excel](https://view.officeapps.live.com/op/view.aspx?src=https%3A%2F%2Fadsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net%2Fresources%2Ffiles%2Ftemplates%2FImport%2FEXCEL_Conversion_Enhanced_Import_Template.xlsx&wdOrigin=BROWSELINK) or [.csv](https://adsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net/resources/files/templates/Import/CSV_Conversion_Enhanced_Import_Template.csv) file.

1. From the navigation menu on the left, hover over **Conversions** and select **Offline conversions**.
1. Select **Upload** and make sure column names and your offline conversions data are formatted correctly.
1. Follow the required hashing rules in the **Format and hash the data** section below for the email address and/or phone number. In the last two columns, add the hashed versions of your customers' email address or phone number (or both) received from your website lead forms or at the time of conversion.

   > [!NOTE]
   > For offline conversions, both formatting and hashing the data is mandatory and you must do so manually.

<a id="format-and-hash-the-data"></a>

## Format and hash the data

- **Format the data**. For the privacy of your customers, the personal customer data in your file (email addresses) must be encrypted or hashed. For encryption to happen correctly, you need to format the personal customer data prior to hashing. <br><br> Please use the formatting rules below when collecting customer data: <br>

  Format phone numbers according to the E.164 standard.

  For email addresses:

  - Remove whitespaces from the beginning and end of the email address.
  - Make sure the text is in lower case.
  - Remove everything between “+” and “@” (e.g. name+withplus@outlook.com becomes name@outlook.com).
  - Remove any periods that come before “@” (e.g. ex.ample@outlook.com becomes example@outlook.com).
  - Make sure email address contains “@” sign.
  - Remove any spaces.
  - Make sure there is a period after “@”, such as “.com”.
  - Make sure it doesn't start or end with a period.
  - Remove any accents (ex: à).
- **Hash the data**. Hash the data using the SHA-256 algorithm, which is a hashing function that uses a 256-bit key to take a piece of data and convert it into a new, unrecognizable data string of a fixed length.

## Enhanced conversions FAQ


- **Does this feature help prepare me future proof my conversion tracking with Microsoft Advertising?**
  Yes, Enhanced conversions doesn't rely on 3P cookies to operate. As a result, it helps prepare advertisers for a cookieless future.

- **What types of PII information would end-users provide?**
  Either email or phone number or both. This is valuable first party data that will be collected in a privacy safe way.

- **How does personal customer data get hashed for online conversions?**
  If we detect that personal customer data is not hashed, we will hash it in the browser before we collect it. You can also hash this data yourself using the SHA-256 algorithm, which is a hashing function that uses a 256-bit key to take a piece of data and convert it into a new, unrecognizable data string of a fixed length.

- **Can I use Enhanced conversions via API?**
  Yes. The account must have a goal with enhanced conversions turned on before setting IsEnhancedConversionsEnabled=true for an API goal entity. This goal would have been created from the Microsoft Advertising UI after turning on enhanced conversions.

- **What happens if I dont hash the data I upload via offline conversions?**
  We detect that it has not been hashed and send an error in the upload status.

- **Can I use scheduled uploads the same way for enhanced conversions as I normally do?**
  Yes.

- **What happens to my uploaded conversion if Microsoft is unable to match with the provided ID?**
  Microsoft will discard and delete any unmatched data.

- **What happens if I upload a file containing enhanced conversion data (hashed first-party customer data) as an existing regular (not enhanced) offline conversion?**
  If the conversion contains an msclkid, the file will be accepted and record as a regular conversion, without the enhanced conversion fields. If it doesn't contain an msclkid, the file will be rejected.

- **Does the order of enhanced conversion tracking tags matter? If I send a purchase conversion and have a separate GTM enhanced conversion tag, can I send both the conversion and the enhanced conversion tag at the same time?**
 No, the order of enhanced conversion tracking tags doesn't matter. You can send both tags at the same time. The pid is only assigned after the second tag runs.


- **How long does Microsoft store our data?**
  Microsoft's data retention period for hashed PII provided by advertisers for Enhanced conversions for Microsoft Advertising is 30 days.

- **How does Microsoft Advertising attribute hashed emails or phone numbers for conversions?**
  When an advertiser provides hashed information, we match it to data collected from users signed into Microsoft properties (Outlook, Microsoft Edge, and other Microsoft services) while they view or click on ads. This allows us to attribute the hashed email or phone number back to the relevant Microsoft Advertising campaign.
