---
title: Set up UET Tags Using Adobe Experience Platform
description: Third-party tag managers allow you to manage your website tags in one place. Learn how to set up UET tags using Adobe Experience Platform.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using Adobe Experience Platform

> [!NOTE]
> - This article shows how to do a basic setup of UET tags with Adobe Experience Platform. Adobe Experience Platform offers several advanced features to customize when and how your tags are fired. Please refer to the [Adobe Help Center](https://experienceleague.adobe.com/en/docs/experience-platform/destinations/catalog/advertising/bing-ads) for more information.
> - Microsoft Advertising is not responsible for Adobe's processes or documentation, nor for changes made to Adobe's processes or documentation.

Tag managers replace static tags with dynamic tags that are easier to implement and update. The dynamic tag is a container, a small snippet of code that allows you to dynamically insert tags into your website. You can think of the container tag as a bucket that holds other types of tags.

## Implementing UET using Adobe Experience Platform

1. Set up an account in Adobe Experience Platform, if you haven't already.
1. Create a property in Adobe Experience Platform:

   1. Navigate to your company page, then click **New Property**.
   1. For **Name**, give your property a unique name.
   1. For **Domain**, enter the root URL of the property.
   1. (Optional) Select the **Return an empty string for undefined values of Data Elements** check box if you want undefined values to be empty, rather than assigned default values.
   1. Click **Save**.
1. In your Launch Admin Console, go to the **Extensions** tab and click **Catalog**.
1. Search for "Microsoft Advertising UET Tag" and click **Install**.
1. In the **Install Extension** page, input your Microsoft Advertising UET tag ID and modify the settings for the tag (enable navigation timing metrics, conversion tracking cookie, update global event tracking name — we recommend keeping the default setting for performance setting and cookie).

   > [!NOTE]
   > You can find your UET tag by selecting **Conversion Tracking** > **UET tags** in your Microsoft Advertising account.
   
1. Click **Save**. You can now find the newly installed "Microsoft Advertising UET Tag" extension under **Extensions** > **Installed**.
1. Go to the **Rules** tab and click **Create New Rule** to ensure a UET event is sent on every page view.
1. Give the rule a name, and then configure it with the following conditions:

   1. Create a new event and set **Event Type** to **DOM Ready**.
   1. Create a new action and select **Microsoft Advertising UET Tag** as the **Extension** and then **Base Tag** as the **Action Type**.
1. If you are using any features that are based on custom events (for example, reporting variable revenue, custom event remarketing list, dynamic remarketing), you will need to create another rule and a data element for any event that dynamically retrieves a value from the page. Otherwise, skip to the next step.

   1. Go to the **Data Elements** tab and click on **Create New Data Element**. (Data elements let you create a data map of commonly used items on a page — we suggest creating a data element, then setting up a rule, and lastly binding action parameters to data elements.)
   1. Enter a name and then define the data element.
   1. Click **Save**.
   1. Go to the **Rules** page and click **Add Rule**.
   1. Configure the rule to match your scenario:

      - For **Events**, select how the custom parameter is being triggered (for example, on page click).
      - For **Actions**, select what values should be sent via UET. If you're using custom parameters, you'll need to select **Microsoft Advertising UET Tag** as the **Extension** and **Custom Event** as the **Action Type**. Then add the parameters in the right-hand side.
      - If you’re using an event action parameter (to build custom event remarketing or to track conversions), you will need to configure the **Select event action** field.
1. Go to the **Publishing** tab.
1. Under **Development**, click **Add New Library**.
1. Enter a name, select a development environment to deploy to, and then add the resources you created earlier (for example, extensions, data elements, and rules).
1. Click **Save**.
1. Build and deploy to the development environment you specified.
1. Embed the environment's instrument snippet on your test page. You can find the instrument snippet on the **Environments** page by clicking the **Install** button.
1. Go to your page and verify your data elements and rules are working as expected. Use the [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md) to verify all events and parameters are being sent via UET correctly.
1. Once you've validated the test page, go back to Adobe Experience Platform and publish the changes in the **Publishing** tab.
1. Go to the **Environments** page to obtain the Adobe Experience Platform script snippet for the **Production** environment and place the new snippet in your website's code.

## Example

To see an example of an Adobe Experience Platform UET tag installed in the body of a webpage, visit our [Adobe Experience Platform sample page](https://go.microsoft.com/fwlink/?linkid=2016557) (English only), right-click in the webpage, and then click **View source** or **View page source** depending on your browser.

This page is set up to support:

- Variable revenue for conversion goals
- Dynamic remarketing: product ID and page type
- Custom event for remarketing list

On the page is a JavaScript variable "cart" that stores the contents of a shopping cart and sends the values to UET when you click the Submit button. Here's what it looks like in the website's code:
```
var cart = { 
    'currency': 'USD', 
    'total': product.price * product.quantity, 
    'transaction_id': '105305b2-134f-4479-a2c3-b456170d060c', 
    'items': [ product ] 
};
```

Let's configure Adobe Experience Platform to report the sample page's parameters.

1. In Adobe Experience Platform, create a new data element that defines where the custom parameter values are stored. Take transaction_id as an example: Set **Data Element Type** as **JavaScript Variable**, and **Path to variable** as **cart.transaction_id**.
1. Repeat this process for each custom parameter on the page: currency, revenue value, and items.
1. Create a rule to trigger a UET event when you perform a certain action. In our example, various custom parameters (such as event category and product ID) will be fired when you click the button.

   1. Under **Events**, click **Add** to determine when to fire the rule.
   1. Set **Event Type** as **Click**, and **Elements matching the CSS selector** as "#purchase" (the JavaScript element in the page).
   1. Under **Actions**, click **Add** to determine what will be fired.
   1. For **Extension**, select **Microsoft Advertising UET Tag**, and for **Action Type**, select **Custom Event**.
   1. For **Select event type**, select **Purchase**.
   1. Continue to add all the parameters that the page is sending and select the matching data element for each. For example, for **Items**, select **transaction_id**.
1. Go to the **Publishing** tab and under **Development**, click **Add New Library**.
1. Enter a name and then add the resources created earlier (extension, data elements, rules).
1. Click **Save**.
1. Build and deploy to a development environment.
1. Embed the environment's instrument snippet on your test page. You can find the instrument snippet on the **Environments** page by clicking the **Install** button.
1. Go to the sample page and verify your data elements and rules are working as expected. In the sample page, a page load event is always sent when you load the page and a custom event is sent only when you click the Submit button. These events trigger the UET tag, resulting in HTTP requests. The most important requests are to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when the webpage loads and when the button is pressed.

## Tips

- If you want to return an array of values in the UET event, we recommend using a data element to return the array object for the array-typed parameters rather than directly set it in the parameter value field. For example, to return this array of values **([{'id':'0', 'name':'a'}, {'id':'1', 'name':'b'}])** for items parameter in the UET event:

  1. Create a data element: Set **Name** as "obj01", **Extension** as "Core", and **Data Element Type** as "Custom Code".
  1. Click **Open Editor** in the right panel and paste the JavaScript code that returns an object for this data element "return [{'id':'0', 'name':'a'}, {'id':'1', 'name':'b'}]".
  1. In the **Rule** section, set the parameter value for the item parameter as "%obj01%".
