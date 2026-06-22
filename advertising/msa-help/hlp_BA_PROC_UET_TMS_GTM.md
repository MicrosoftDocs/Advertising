---
title: Set up UET Tags Using Google Tag Manager
description: Third-party tag managers allow you to manage your website tags in one place. Learn how to set up UET tags using Google Tag Manager.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using Google Tag Manager

> [!NOTE]
> - We recommend using direct integration with Google Tag Manager, which is easier than other options. Learn more: [Set up UET with Google Tag Manager using direct integration](hlp_BA_PROC_UET_TMS_GTM_DI.md)
> - This article shows how to do a basic setup of UET tags with Google Tag Manager. Google Tag Manager offers several advanced features to customize when and how your tags are fired. Please refer to Google's [Tag Manager Help](https://go.microsoft.com/fwlink/?linkid=2010586) for more information.
> - Microsoft Advertising is not responsible for Google Tag Manager's processes or documentation, nor for changes made to Google Tag Manager's processes or documentation.

Tag managers replace static tags with dynamic tags that are easier to implement and update. The dynamic tag is a container: a small snippet of code that allows you to dynamically insert tags into your website. You can think of the container tag as a bucket that holds other types of tags.

## FAQ

- **Adding the base UET page for page load events on Google Tag Manager**

  To send information from Google Tag Manager to Microsoft Advertising, you need to create a "container" in Google Tag Manager and then add the Microsoft Advertising UET tag to it.

  Here's how you can get started with the basic UET tag that fires on all pages:

  1. When you set up an account in Google Tag Manager, enter your preferred name in the **Container name** box.
  1. From the **Overview** page of this container's workspace, select the container ID (formatted like "GTM-XXXXXX") in the toolbar. You will see the Google Tag Manager container code and instructions.
  1. Copy the container code and paste it into the head or body section of *every page* of your website.
  1. Back on the **Overview** page of your container's workspace, select **New tag**.
  1. In the **Tag Configuration** pane, choose a tag type to begin setup.

     1. Search for **Microsoft Advertising Universal Event Tracking**.
     1. Ensure that the track type is set to **UET config/page view (required)**. You need to add only one tag of this track type and you must trigger it on all pages.

        > [!NOTE]
        > Select the **Enable automatic tracking for page view events** checkbox under **Tag settings** (for your base tag) to automatically track page view events on navigation.
        
     1. Enter your **Microsoft Advertising UET Tag ID**. You can find the tag ID in Microsoft Advertising by selecting **Conversion Tracking > UET tags**.
     1. If you have more than one UET tag tracking code on a webpage, enter the **global event tracking object name** within the UET tag script that you want Google Tag Manager to track into the **UETQ Variable ID** box. Otherwise, use the default *uetq* value. Learn more about [reasons for creating more than one UET tag](hlp_BA_CONC_UETv2MutliTags.md) and [how to rename the uetq event tracker](hlp_BA_CONC_UETv2OverrideUetTag.md).
     1. *Optional*: Enable enhanced conversions. Select the checkbox for **Send enhanced conversion values**. Enter an email address or phone number.

        > [!NOTE]
        > Entering at least an email address or phone number is mandatory.

        > [!NOTE]
        > If the page has both page load and custom events, you only need to enable enhanced conversions here. If the page only has custom events, see instruction 3d in the "Adding UET custom events using Google Tag Manager" section below.

     > [!NOTE]
     > - If you don't use a different *uetq* variable, the [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md) will return the "Multiple UET tags on this webpage use the same event name" issue. If you have multiple tags placed on the site and one of those is implemented through Google Tag Manager, it's possible that the UET Tag Helper will fail to detect the "Multiple UET tag on this webpage use the same event name" issue.
     > - If you have already implemented the UET tag tracking code on your website, then we recommend removing the tracking code before you add the UET tag for page view from Google Tag Manager.
  1. In the **Triggering** pane, select the pencil icon and select **All pages**. A tag must have at least one trigger for it to fire. Triggers are evaluated during runtime and are fired when the trigger conditions are met. Select **Save**.
  1. Enter a **Tag Name**, and then select **Save**.
  1. In the toolbar of your container's workspace, select **Submit > Publish** to enable the tag and add a version.
  1. In Microsoft Advertising, select **Conversion Tracking** > **UET tags** to verify that you are receiving conversions. It typically takes up to 24 hours for a tag to be verified.
  1. Using the [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md), browse your website and confirm that all pages fire the UET page load event.

- **Adding UET custom events using Google Tag Manager**

  > [!IMPORTANT]
  > To set up [custom events](hlp_BA_CONC_UETv2CustomEvent.md) for scenarios like [revenue variables](hlp_BA_CONC_UETv2RevenueVariables.md) or dynamic remarketing using Google Tag Manager, you must have added your UET tag to Google Tag Manager as described in the previous section.

  Custom events require dynamic values, so you need to tell Google Tag Manager how to read them.

  1. **Set up Google Tag Manager variables to read dynamic values from your page**: While Google Tag Manager supports many types of variables (read from html elements, functions, JavaScript variables, data layer variables, etc.), we'll set up Google Tag Manager variables to read data layer variables in this example.

     1. Visit our [Google Tag Manager sample page](https://go.microsoft.com/fwlink/?linkid=2010814) (English only), right-click in the webpage, and then select **View source** or **View page source** depending on your browser. You will see the following variables:

        **For revenue tracking**: 
        ```
        <script> 
        dataLayer.push({ 
         'event': 'Purchase', 
         'revenue_value': 55.55, 
         'currency': 'USD', 
         'transaction_id': 'tid123456', 
         }); 
         </script>
        ```
        **For dynamic remarketing and other scenarios**: 
        ```
        <script> 
        dataLayer.push({ 
         'event': 'Purchase', 
         'ecomm_prodid': ['abc123', 'xyz456'], 
         'ecomm_pagetype': 'purchase', 
         'ecomm_totalvalue': 55.55, 
         'currency': 'USD', 
         'items': [{ 'id': 'abc123', 'price': 11.11, 'quantity': 1 }, { 'id': 'xyz456', 'price': 22.22, 'quantity': 2 }], 
         'transaction_id': 'tid123456', 
         }); 
         </script>
        ```

        > [!IMPORTANT]
        > You'll need to make sure that the variables in *your* website's code match the parameters needed for the custom event required for your scenarios (e.g., custom event conversions, variable revenue, or dynamic remarketing). For this example, let's say that you have the above parameters in your website, and you want Google Tag Manager to read them.
     1. In your Google Tag Manager container's workspace, select **Variables**.
     1. Under **User-Defined Variables**, select **New**.
     1. In the **Variable Configuration** pane, select the pencil icon.
     1. Under **Page Variables**, select **Data Layer Variable**.
     1. In the **Variable Name** box, enter the name you gave this variable in your data layer. In our example, this would be one of the following: *ecomm_prodid*, *ecomm_pagetype*, *ecomm_totalvalue*, *currency*, *items*, or *transaction_id*.
     1. Assign a name to your variable and select **Save**. For example, the variable for *ecomm_prodid* is named 'Product IDs'.
     1. Repeat the above process, creating a new variable for each parameter that is required for the scenario you use in Microsoft Advertising.
  1. **Set up a trigger**:

     1. In your Google Tag Manager container's workspace, select **Triggers**, and then **New**.
     1. In the **Trigger Configuration** pane, select the pencil icon and select **Custom Event**.
     1. Enter an **Event Name**, and select **Save**. In our example, the event name is 'Purchase'.
     1. Enter a **Trigger Name**, and select **Save**.

     > [!IMPORTANT]
     > - **Your triggers in Google Tag Manager must match the possible interactions that are coded on your webpage.**
     > - Look at our [Google Tag Manager sample page](https://go.microsoft.com/fwlink/?linkid=2010814) for an example. On this page, we have coded for a click on a button. Right-click in the webpage, and then select **View source** or **View page source** depending on your browser, and look for the code with *id=btnCustomEvent*.
  1. **Setting up custom events conversion tracking in Google Tag Manager**: This will be a custom event tag that ties together the event variables and trigger you just created.

     1. In Google Tag Manager, create a new tag and choose "Bing Ads Universal Event Tracking" as the tag type.
     1. From the **Event Type** dropdown select **Custom**.
     1. The values set for **Category**, **Action**, **Label**, and **Value** should match the values set for your conversion goal in your Microsoft Advertising account.
     1. Under **Tag Sequencing**, select the **Fire a tag before Microsoft Ads Variable Revenue fires** checkbox. Select **Microsoft Ads UET Tag** from the **Setup Tag** dropdown.
     1. Make sure the trigger that you set is configured prior to setting up the tag to ensure that it will fire correctly on the page where the custom event will occur.
     1. Select **Save** from the upper-right corner of the tag.
  1. **Publish your changes**: In the toolbar of your Google Tag Manager container's workspace, select **Submit > Publish**.
  1. **Check your website's code**: Verify that you have added the below variables to the data layer on the webpage where customers complete the event, e.g., the product purchase confirmation. In our example from above: 
      ```
      <script> 
       dataLayer.push({ 
         'event': 'Purchase', 
         'ecomm_prodid': ['abc123', 'xyz456'], 
         'ecomm_pagetype': 'purchase', 
         'ecomm_totalvalue': 55.55, 
         'currency': 'USD', 
         'items': [{ 'id': 'abc123', 'price': 11.11, 'quantity': 1 }, { 'id': 'xyz456', 'price': 22.22, 'quantity': 2 }], 
         'transaction_id': 'tid123456', 
       }); 
       </script>
      ```
  1. **Validate your tags**: Use the [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md) to confirm that the event and the corresponding parameters in the event are being fired from your website.
