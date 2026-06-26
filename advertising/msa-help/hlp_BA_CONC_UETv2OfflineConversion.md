---
title: Tracking offline conversions
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to track when your search ads lead to a conversion offline.
---

# Tracking offline conversions

Let’s say a customer sees your ad, clicks on it, but ends up calling you, leading to a sale that was taken offline. How can you track when your search ad leads to a conversion offline and outside of your website? You can import offline conversions, to better measure what happens after your ad was clicked.

## Why should I care about offline conversion tracking?

- **Better tracking**: You can track the impact of your campaigns for both online and offline channels.

- **Easy importing**: All you need are the time, date, Microsoft Click ID, and conversion goal name to get started.

- **Better ROI**: You can optimize your campaigns based on the full online and offline impact of your search ads.

## Privacy for conversion tracking

When tracking offline conversions, you need to provide users with a transparency notice about the data collected through your sites, apps, and other properties. You must also obtain user consent for data collection as required by law and in accordance with [applicable terms](https://help.ads.microsoft.com/resources/microsoft_advertising_agreement/en.pdf) and [Microsoft Advertising policies](hlp_BA_CONC_Policy_LegalPrivacyPersonalization.md).

## FAQ

- **How do I set up offline conversion tracking?**

  Before you begin, make sure that:

  - **Code changes can be made for all of your web pages**. This allows you to capture the click ID in the URL that customers click from one of your ads.
  - **Click IDs can be stored** with the corresponding prospect’s information that is gathered on your website.
  - **Conversion windows are under 90 days**. If a conversion is uploaded more than 90 days after the last click, it will not be imported.

  **Create a conversion goal**

  For every offline conversion you want to measure, you need to create a new offline conversion goal type. You can create as many offline conversions as you need. Also, auto-tagging of Microsoft Click ID is automatically turned on when you create your first offline conversion goal and you can [check your auto-tagging status of the click ID](hlp_BA_PROC_MicrosoftClickID.md) in the Account level options page.

  1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
  1. Select **Create conversion goal** and select the **Offline conversions** type.
  1. Enter a name for your goal in the **Goal name** box. When naming your goal, use a descriptive name that makes sense to you (for example, "Check-out page").

     > [!NOTE]
     > You cannot use the same name for two different conversion goals.
  1. Under **Sharing**, select if you want this goal to apply to all accounts or a specific account.
  1. If you want to add a monetary value for each conversion, under **Revenue value**, select one of the following checkboxes: <br>**Each time it happens, the conversion action has the same value**. Then, enter the amount and select the currency, if available. This is a static revenue value that doesn't change. <br>**The value of this conversion action may vary (for instance, by purchase price)**. Then, enter the default amount and select the default currency, if available, to be used when no value is received for a conversion.
  1. You can also assign a **Count** to the conversion and enter a **Conversion window** to track up to 90 days in the past.
  1. Select **Save**.

  After you have created a conversion goal, you’ll be prompted to upload the conversions now or later. After you create a new conversion goal, you must wait 2 hours before uploading conversions for that conversion goal. Once you have finished creating an offline conversion goal, you’ll see a dash ( - ) for **UET tag ID** and **Tracking status** in the grid, as UET tags aren’t required.

  **How can I add offline conversions?**

  You have multiple options for importing your offline conversions into Microsoft Advertising. You can either upload a file once, create a schedule to upload a file regularly, or upload conversions through APIs. [Learn more about APIs](hlp_BA_CONC_AboutTheAPI.md).

  > [!NOTE]
  > For optimal performance, we recommend uploading offline conversions daily. Otherwise, auto-bidding performance might be impacted detrimentally.

  - **Prepare your data for import**

    1. Download the template as an [Excel](https://view.officeapps.live.com/op/view.aspx?src=https%3A%2F%2Fadsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net%2Fresources%2Ffiles%2Ftemplates%2FImport%2FEXCEL_Conversion_Enhanced_Import_Template.xlsx&wdOrigin=BROWSELINK) or [.csv](https://adsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net/resources/files/templates/Import/CSV_Conversion_Enhanced_Import_Template.csv) file.
    1. Enter the following information: <br>**Microsoft Click ID**. The MSCLKID that led to the conversion (see below for click ID information). The MSCLKID is a GUID (32 characters) that is unique for each ad click. <br>**Conversion Name**. The goal name you entered when you created the conversion goal. <br>**Conversion Time**. The date and time that the conversion occurred. The accepted time zone values can be viewed [here](https://go.microsoft.com/fwlink/?linkid=851028). See below for conversion time formatting and need-to-know details. **Note**: Make sure that the conversion time is after the click time. <br> <br>**Conversion Value** (optional). 0 to 999999999999, with 3 decimal fields and no negative numbers. You must use a period for decimals (as in 12.34), not a comma (as in 12,34). <br>**Conversion Currency** (optional). The [currency](https://go.microsoft.com/fwlink/?linkid=2212012) in which the conversion value is provided.

       > [!NOTE]
       > If conversion value and conversion currency is not defined in the file, the value defined in the goal will be used.

       | Time format | Example |
       | --- | --- |
       | **MM/dd/yyyy hh:mm:ss tt** | "06/01/2017 1:00:00 PM" |
       | **MM dd,yyyy hh:mm:ss tt** | "Jun 01, 2017 1:00:00 PM" |
       | **MM/dd/yyyy HH:mm:ss** | "06/01/2017 01:00:00" |
       | **yyyy-MM-dd HH:mm:ss** | "2017-06-01 13:00:00" |
       | **yyyy-MM-ddTHH:mm:ss** | "2017-06-01T13:00:00" |
       | **yyyy-MM-dd HH:mm:ss+z** | "2017-06-01 13:00:00+0500" |
       | **yyyy-MM-ddTHH:mm:ss+z** | "2017-06-01T13:00:00-0100" |
       | **yyyy-MM-dd HH:mm:ss zzzz** | "2017-06-01 13:00:00 EasternTimeUSCanada" |
       | **yyyy-MM-ddTHH:mm:ss zzzz** | "2017-06-01T13:00:00 EasternTimeUSCanada" |

    1. Save the file locally to import it into Microsoft Advertising once. If you’re scheduling recurring imports, save the file to an online location.

  - **Import offline conversions once**

    1. From the navigation menu on the left, hover over **Conversions** and select **Offline conversions**.
    1. Under the **Uploads** tab, select **+ Upload**.
    1. Select **Browse** and select the file you want to upload.
    1. Select **Upload and preview**.
    1. When the upload is complete, you can view the results of the changes including any errors. Download errors for troubleshooting.
    1. Select **Apply changes** when you're ready.

  - **Schedule recurring imports of your offline conversions**

    > [!NOTE]
    > Scheduling recurring imports is available in the redesigned Microsoft Advertising experience only.

    You can import your offline conversions in Microsoft Advertising from an online location on a regular schedule. Create an [Excel](https://adsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net/cmuiresources-1/files/templates/Import/EXCEL_ConversionAdjustment_Enhanced_Offline_Import_Template.xlsx) or [.csv](https://adsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net/cmuiresources-1/files/templates/Import/CSV_ConversionAdjustment_Enhanced_Offline_Import_Template.csv) file of your conversions data and store the file in an online location using HTTPS, HTTP, SFTP, or FTP. Make sure you update your offline conversions data before each scheduled import.

    1. From the navigation menu on the left, hover over **Conversions** and select **Offline conversions**.
    1. Under the **Schedules** tab, select **+ Schedule**.
    1. Select the type of online source you are using: HTTPS, HTTP, SFTP, or FTP.
    1. Enter the **File URL** and the user name and password (if applicable) used to access the file. The URL should point to the Excel or csv file of your conversions data.
    1. Select the upload frequency from the drop down. This defines how often and at what time the file should be imported automatically.
    1. Select **Save and preview**. If your file is accessible, this saves the schedule. The preview will show any errors based on the file that's in your online location. Select **Download all results** or **Download errors only** to view the results.
    1. Once the schedule is saved, the **Schedules** page lists all your scheduled uploads.

  - **Use Google Sheets file for setting up schedules**

    You can also set up your offline conversions import schedule using your file from Google Docs.

    1. Open your conversions file in Google Docs.
    1. Select File and select Publish to the web.
    1. Select either Comma-separated values (.csv) or Microsoft Excel (.xlsx).
    1. Select Publish.
    1. Copy the generated link and use the link as your File URL when you set up the schedule.

  **How do I update or delete offline conversions?**

  > [!NOTE]
  > Updating and deleting offline conversions is available in the redesigned Microsoft Advertising experience only.

  You may want to update or delete offline conversions in any of the following scenarios:

  - When your customers cancel purchases or orders, you may want to delete conversions which should not be counted.
  - When your customer returns part of the purchases they made, you may want to reduce the value of the conversions.
  - You may want to correct any mistakes that were made while uploading offline conversions to Microsoft Advertising.

  > [!NOTE]
  > Conversion adjustments are available for offline conversions only.

  - **How do conversion updates work?**

    There are two ways you can make changes to your offline conversions:

    - **Restate**: This lets you update the revenue value associated with the conversion. Only the **Conv. value** and **All Conv. value** columns will be affected.
    - **Retract**: This lets you delete the conversion from the conversion count, changing the conversion value to 0. This affects the **Conv.**, **Conv. value**, and **All Conv. value** columns.

  - **How do I update offline conversions?**

    To update or delete a conversion, you will need to upload a file in the right format and specify which conversions should be updated and how. You can use the following templates for the right format: [Excel](https://adsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net/cmuiresources-1/files/templates/Import/EXCEL_ConversionAdjustment_Enhanced_Offline_Import_Template.xlsx) or [.csv](https://adsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net/cmuiresources-1/files/templates/Import/CSV_ConversionAdjustment_Enhanced_Offline_Import_Template.csv).

    > [!IMPORTANT]
    > - A maximum of 100,000 rows are allowed for each upload.
    > - Be sure to review any import errors. You have the option to **Download all results** or to **Download errors only**. The download links will be available for 180 days after the initial upload.

  - **Prepare your data to update offline conversions**

    1. Download the template as an [Excel](https://adsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net/cmuiresources-1/files/templates/Import/EXCEL_ConversionAdjustment_Enhanced_Offline_Import_Template.xlsx) or [.csv](https://adsuxprodfd-awb5gsddabddbqgv.z01.azurefd.net/cmuiresources-1/files/templates/Import/CSV_ConversionAdjustment_Enhanced_Offline_Import_Template.csv) file.
    1. Enter the following information: <br>**Microsoft Click ID**. The MSCLKID that led to the conversion. The MSCLKID is a GUID (32 characters) that is unique for each ad click. This should be the same Click ID as the conversion that was imported previously. <br>**Conversion Name**. The offline conversion goal name for the conversions you'd like to update. It's important that you use the exact same name as you did when you uploaded the conversions that you are updating. <br>**Conversion Time**. The date and time that the conversion occurred. This should match the date and time you entered when you uploaded the conversions. **Note**: Make sure that the conversion time is after the click time. <br>**Adjustment Value** (required for Restate). 0 to 999999999999, with 3 decimal fields and no negative numbers. You must use a period for decimals (as in 12.34), not a comma (as in 12,34). <br>**Adjustment Currency** (optional). The currency of the conversion adjustment. **Note**: If the conversion value and conversion currency is not defined in the file, the value defined in the goal will be used. <br>**Adjustment Type**. This value tells Microsoft Advertising whether you’re updating the value of the conversion (Restate) or deleting it (Retract). <br>**Adjustment Time**. The date and time that the conversion value was adjusted. The time formats which are accepted are in the table below. <br>

       | Time format | Example |
       | --- | --- |
       | **MM/dd/yyyy hh:mm:ss tt** | "06/01/2017 1:00:00 PM" |
       | **MM dd,yyyy hh:mm:ss tt** | "Jun 01, 2017 1:00:00 PM" |
       | **MM/dd/yyyy HH:mm:ss** | "06/01/2017 01:00:00" |
       | **yyyy-MM-dd HH:mm:ss** | "2017-06-01 13:00:00" |
       | **yyyy-MM-ddTHH:mm:ss** | "2017-06-01T13:00:00" |
       | **yyyy-MM-dd HH:mm:ss+z** | "2017-06-01 13:00:00+0500" |
       | **yyyy-MM-ddTHH:mm:ss+z** | "2017-06-01T13:00:00-0100" |
       | **yyyy-MM-dd HH:mm:ss zzzz** | "2017-06-01 13:00:00 EasternTimeUSCanada" |
       | **yyyy-MM-ddTHH:mm:ss zzzz** | "2017-06-01T13:00:00 EasternTimeUSCanada" |
       
    1. Save the file locally to import it into Microsoft Advertising once. If you’re scheduling recurring imports, save the file to an online location.

  - **Import conversion adjustments**

    Once your file is ready, you can upload conversion adjustments in the same way as you uploaded conversions. You can also schedule your conversion adjustments to import based on the **Schedule recurring imports of your offline conversions** process described above.

    1. From the navigation menu on the left, hover over **Conversions** and select **Offline conversions**.
    1. Under **Upload offline conversions**, select **+ Upload**.
    1. Select **Browse...** and choose your Excel or .csv file.

       > [!NOTE]
       > You will need to include the transaction ID as a parameter via the associated UET tag.
    1. Select **Upload and preview**.

- **Time zone formatting and need-to-know details**

  - Set the time zone once in “Parameters” if all of your conversion times are in the same time zone.
  - Add the time zone to each conversion time in the “Conversion Time" column if your conversion times are in different time zones.
  - You can leave the “Parameters” row empty if you don’t enter a time zone.
  - You can enter a time zone in the “Parameters” row and the “Conversion Time” row. If any conversion is missing the time zone, the “Parameters” value will be used.
  - Enter your time zone from [this list](https://go.microsoft.com/fwlink/?linkid=851028) to avoid errors during daylight savings time transitions.
  - Enter your GMT offset by indicating + or -, followed by the 4-digit time difference (for example, New York’s offset Is -0500). If you use Greenwich Mean Time (GMT), enter +0000.
  - Replace +z with the GMT offset and replace zzzz with the time zone value (for example, EasternTimeUSCanada)
  - All uploads through the API need to be in Greenwich Mean Time (GMT). If you didn't convert the time, some conversions may be lost.

- **What I need to know about offline conversion tracking**

  - If you have lead generation as an objective, we recommend that you use offline conversion. Lead generation is when potential customers fill out a form or quote of interest, and then the sale is completed offline in person or over the phone (for example, car purchases, insurance quotes, mortgages, etc.).
  - Auto-tagging of click ID is automatically enabled for users when creating an offline conversion goal. This allows you to import offline conversions.
  - Offline conversion tracking is not to be used if you want to track customer visits to your store or customers’ in-store purchases.
  - Each offline conversion needs to be associated to a single click ID. A single click ID can, however, be associated with multiple conversion goals and also be associated with the same goal multiple times, as long as the conversion time is different. Also, the same conversion can’t imported more than once. If more than one is attempted, the first instance will be used and the others will be ignored. You can update offline conversions once they have been processed.
  - The value of the conversion can be included in the import file along with a custom currency. If no currency is stated, the conversion goal’s default will be used.
  - After creating a conversion goal, you'll need to wait two hours before uploading the file. It can take up to six hours to view uploaded conversion data.
  - After an ad click you should wait an hour before uploading offline conversions.
  - No additional personal data is appended to the offline conversions.

- **How do I enable my website and lead tracking system to track click IDs?**

  Once auto-tagging of MSCLKID is enabled, when an ad is served, the MSCLKID is dynamically appended to your landing page URL.

  After you’ve created one or more conversion goals, you’ll need to enable your website to be able to track conversions. Be sure to consult with your webmaster when completing this step.

  1. Enable auto-tagging of MSCLKID. The MSCLKID is automatically appended to the landing page URL when a customer clicks on your ad. For example, www.contoso.com/?msclkid={msclkid}. The click ID is unique for each ad click and multiple clicks on the same ad from the same user will result in multiple click IDs.
  1. Configure your website code to capture and store the MSCLKID in a cookie. This is to ensure that the MSCLKID follows customers through their session. Keep in mind that the MSCLKID is only available on the landing page URL and doesn’t get carried out when the customer navigates to another page or comes back to the page later. <br> <br>See the sample JavaScript as shown below:

     `<script type="text/javascript"><br> function setCookie(name, value, days){<br> var date = new Date();<br> date.setTime(date.getTime() + (days*864E5));<br> var expires = "; expires=" + date.toGMTString();<br> document.cookie = name + "=" + value + expires;<br> }<br> function getParam(p){<br> var match = RegExp('[?&]' + p + '=([^&]*)').exec(window.location.search);<br> return match && decodeURIComponent(match[1].replace(/\+/g, ' '));<br> }<br> var msclkid = getParam('msclkid');<br> if(msclkid){<br> setCookie('msclkid', msclkid, 90);<br> }<br> </script>`
  1. Configure your website code to store MSCLKID with lead data. When the customer submits a lead gen form, you will need to retrieve the MSCLKID from the cookie and send it with the rest of the customer data. This way, all the data is stored in your CRM system and you can track offline conversions for this click. A common practice is to add a hidden field in the web-to-lead gen form for MSCLKID, as shown in the JavaScript sample below:

     <form action="" name="myForm"><br> Name: <input type="text" name="name"><br> <input type="hidden" id="msclkid" name="msclkid" value=""><br> <input type="submit" value="Submit Form" name="btnSubmit"><br> </form>

     `<script><br> function readCookie(name) { <br> var n = name + "="; <br> var cookie = document.cookie.split(';'); <br> for(var i=0;i < cookie.length;i++) { <br> var c = cookie[i];<br> while (c.charAt(0)==' '){c = c.substring(1,c.length);}<br> if (c.indexOf(n) == 0){return<br> c.substring(n.length,c.length);}<br> }<br> return null;<br> }<br> window.onload = function() {<br> document.getElementById('msclkid').value =<br> readCookie('msclkid’);<br> }<br> </script><br>`

- **How can I view the status of my upload?**

  Check the **Status** column in the table after your file has been uploaded. You’ll be able to see if it was uploaded successfully or if there were any errors. You can also download the results of the upload, which includes any error messages.

- **Why is there a discrepancy between the number of conversions in my upload with Microsoft Advertising?**

  There are multiple reasons why there are fewer conversions in Microsoft Advertising than what you had uploaded.

  - Duplicate conversions that contain the same click ID, conversion name, and conversion time won’t be imported more than once.
  - Click IDs that are too old or not associated with your account will still appear as having been uploaded successfully because the format is valid.
  - Conversions are uploaded within five hours after an ad click.

- **Why am I not seeing any data after a successful upload?**

  If you don't see any data after successfully uploading your file, consider manually reviewing it for potential errors. If, after a manual review and re-upload, the data is still missing, please contact [Microsoft Advertising support](https://go.microsoft.com/fwlink/?linkid=2189081) for further assistance.

- **How can I import my call conversion data if I'm using a third-party call-tracking system?**

  Advertisers using one of the following supported call-tracking providers can import their call conversion data back into Microsoft Advertising to see the full impact of their online campaigns. Please refer to these providers' documentation for details on integrating with Microsoft Advertising:

  - Avanser
  - CallTrackingMetrics
  - Delacon
  - DialogTech
  - Infinity
  - Invoca
  - ResponseTap
  - Wildjar

- **Where can I see offline conversion data that was sent via the API?**

  You can see this conversion data in the Microsoft Advertising UI.
