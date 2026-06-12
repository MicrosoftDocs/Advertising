---
title: Everything you need to know about setting up UET
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/11/2026
description: This article will show you how to create a UET tag, add it to your website, modify it for advanced tracking and targeting features, and troubleshoot issues you may encounter.
---

# Everything you need to know about setting up UET

This article will show you how to create a UET tag, add it to your website, modify it for advanced tracking and targeting features, and troubleshoot issues you may encounter.

Don't know what UET is? Check out [What is UET and how can it help me](hlp_BA_CONC_UETv2WhatIsTag.md)?

## [1. Create a UET tag](#tab/uet-1-create-a-uet-tag-1)

Before you can track conversions or target audiences using a remarketing list, you need to create a UET tag in Microsoft Advertising and then add the UET tag tracking code to every page of your website.

- [include: UetTag]

- Select **Create UET tag** and then enter a name.

- Optional: Enter a description that helps you identify the UET tag in the future. This could relate to the purpose the tag will serve or to the name or URL of your website.

- Select the industry of the website associated with your UET tag. Possible values include: **AdultGambling**, **Autos**, **B2BServices**, **B2CServices**, **CareersEducation**, **CommunitySocialCharitableGroups**, **CPG (consumer packaged goods)**, **Entertainment**, **FinancialServicesInsurance**, **Government**, **HealthWellness**, **Other**, **RealEstate**, **RestaurantsFood**, **Retail**, **ScienceSocialScienceOthers**, **TechnologyTelecommunications**, **TravelTransportation**, and **Unknown**.


Microsoft Advertising applies privacy and compliance filtering to healthcare-related traffic collected by your UET tag.

If you set your UET tag industry to **HealthWellness**, events from pages associated with that tag may not be eligible for use in audience targeting. This can affect audience segments that rely on those events.

If you need to build audience segments for non-healthcare pages on your site, consider using separate UET tags (one tag for healthcare-related pages and another for non-healthcare pages) so your audience strategies can continue to work as expected.

- Optional: Clear the **Enable Microsoft Microsoft Clarity** checkbox. [Learn more about UET and Clarity integration](hlp_BA_CONC_UET_Clarity).

- Optional: Select the Manager accounts with which you would like to share the UET tag. **Note**: This is applicable if you have a hierarchy of accounts that contains manager accounts within manager accounts. [Learn more about hierarchies in Microsoft Advertising](hlp_BA_CONC_Hierarchies).

- Select **Save**.

- In the **View UET tag tracking code** box, select either **Copy**, **Download**, or **Email**, and then close the **View UET tag tracking code** box.

## [2. Add the tag to your website](#tab/uet-2-add-the-tag-to-your-website-2)


> You need to be able to edit your website's code in order to add your UET tag tracking code. If you're not sure how to edit your website's code, contact your webmaster.

After you create a UET tag, the next step is to add the UET tag tracking code to your website. We recommend that you, or your webmaster, add it to every page of your website in the head or body section.

You have a few options when working with UET tags. You can either add the UET tag tracking code directly into your website's code using JavaScript or use a third-party tag manager. Additionally, if your website was built on a website platform (such as Shopify or WordPress), you can use that system to add your UET tag.


> You can add the UET tag tracking code anywhere in your webpage's head section (before the closing head tag: "") or body section (before the closing body tag: "").

Add the UET tag tracking code to your website directly

If you have copied the tracking code, or have a downloaded or email version of it, you are ready to paste it to your website and can skip to step 4.

- [include: UetTag]

- In the table, find the UET tag that you want to use and, in the **Action** column, select **View tag**.

- In the **UET tag tracking code** box, select **Copy** and then **Done**.

- Paste the UET tag tracking code on every page of your website, either in the head or body section.
In the image, the UET tag tracking code is pasted at the top of the body section of the webpage.

![UET tag](BA_ScreenCap_ConvTrack_AddTag.png)

Add the UET tag tracking code using a tag manager

Tag managers replace static tags with dynamic tags that are easier to implement and update. The dynamic tag is a container, a small snippet of code that allows you to dynamically insert tags into your website. You can think of the container tag as a bucket that holds other types of tags.

UET works with all major tag management systems. Here is the current list of (and links to instructions for) tested and supported tag managers:

- [Google Tag Manager](hlp_BA_PROC_UET_TMS_GTM)

- [Qubit Opentag](hlp_BA_PROC_UET_TMS_Qubit)

- [Tealium](hlp_BA_PROC_UET_TMS_Tealium)

- [Ensighten](hlp_BA_PROC_UET_TMS_Ensighten)

- [Signal](hlp_BA_PROC_UET_TMS_Signal)

- [Adobe Dynamic Tag Manager](hlp_BA_PROC_UET_TMS_AdobeDTM)

- [Adobe Experience Platform](hlp_BA_PROC_UET_TMS_AdobeLaunch)

Add the UET tag tracking code using your website platform

UET is designed to work with all major website platforms. Here is the current list of (and links to instructions for) tested and supported platforms that allow you to install UET tags:

- [BigCommerce](hlp_BA_PROC_UET_WebPlatform_BigCommerce)

- [Shopify](hlp_BA_PROC_UET_WebPlatform_Shopify)

- [WordPress.com](hlp_BA_PROC_UET_WebPlatform_WordPress)

- [Wix](hlp_BA_PROC_UET_WebPlatform_Wix)


> To see an example of a JavaScript UET tag tracking code installed in the body of a webpage, visit [this webpage](UET_BasicJavaScript) (English-only), right-click in the webpage, and then select **View source** or **View page source** depending on your browser.

> As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.

### Using UET tags with single-page application (SPA) websites

Although common, single-page application (SPA) websites are challenging to track. With SPAs, content is dynamically loaded without a typical navigation event occurring. In a sense, the page is only loaded once. However, from an analytics and goal-tracking standpoint, it is necessary to treat each separate navigation as a new page load.

Learn what you need to do to enable UET tags in SPAs

SPA websites are required to use the JavaScript UET tag tracking code. If you recently added your UET tracking code, it might already be enabled for SPA tracking by default. To verify, you can check whether your tag snippet has the following **bolded text** or not:

```html
(function(w,d,t,r,u) {var f,n,i;w[u]=w[u]||[] ,f=function(){var o={ti:"TAG_ID_HERE", **enableAutoSpaTracking: true**}; o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")} ,n=d.createElement(t),n.src=r,n.async=1,n.onload=n .onreadystatechange=function() {var s=this.readyState;s &&s!=="loaded"&& s!=="complete"||(f(),n.onload=n. onreadystatechange=null)},i= d.getElementsByTagName(t)[0],i. parentNode.insertBefore(n,i)})(window,document,"script"," //bat.bing.com/bat.js","uetq");
```

If your tag snippet does not contain the above parameter and you want to make use of auto-SPA tracking, you can go to the Microsoft Advertising UI and get the new event snippet with the above behavior enabled by default. You can then update your website to use the new snippet.

You might want to disable this behavior if you are already tracking SPA pageviews manually. To do so, change the value of the **enableAutoSpaTracking** parameter in your tag snippet to **false**. You may also want to disable this if your website does not use browser history state for navigation, although we recommend keeping it turned on if you're not sure.

**For legacy instructions on manually tracking SPA pageviews, see below:**

SPA events are triggered using the same syntax as with [custom events](hlp_BA_CONC_UETv2CustomEvent), with the action 'page_view' and at a required 'page_path' parameter ('page_title' is optional). The parameter 'page_path' must start with a '/'. Example:

```ext
window.uetq = window.uetq || [];
window.uetq.push('event', 'page_view', { 'page_path': '/spa_page' });
```


If you’re sending page_view events, you need to make sure you don't have any custom event conversion goals or remarketing lists that have their "event action" parameter set to "page_view".

Here are three different ways of triggering SPA events. Note that we recommend using the first way. For each option, we have a sample webpage that you can visit to see the appropriate code in action.

- **Content change**: Trigger an SPA event any time your application loads dynamic content. In this case, the real URL is automatically sent in a standard pageLoad event on the first load. You can use this URL in your destination goals, and any custom events triggered on that first page will be associated with it. Each SPA event will generate a pageLoad event with the SPA URL, which is not required to be a loadable path. You can reference these URLs in your goals as well. Any custom events triggered after an SPA event will only be associated with the SPA pageLoad (in other words, not the original URL).

- Visit our [sample "Content change" webpage](UET_SPA_ContentChange) to see this code in action.

- **All pages**: Trigger an SPA event on all pages, including the initial load. This scenario is the same as the preceding one, except the auto pageLoad event is not used. Because it still triggers, it is important to order your events so that the SPA event triggers before any other custom events. If they trigger out of order, some or all may be associated with the auto pageLoad event (and original URL), instead of the SPA pageLoad event (and SPA URL including page_path).

- Visit our [sample "All pages" webpage](UET_SPA_AllPages) to see this code in action.

- **All pages, auto-disabled**: Trigger an SPA event on all pages and additionally disable the auto page load. This is accomplished by adding 'disableAutoPageView: true' to the initialization parameters (Note: Do not modify the snippet code directly to disable). This is the same as the previous scenario but removes the requirement that the SPA event must be triggered first on the initial page load. However, subsequent SPA events are still required to be triggered before any custom events that are associated with them (or they will be attributed to the previous SPA event).

- Visit our [sample "All pages, auto-disabled" webpage](UET_SPA_AllPagesAutoDisabled) to see this code in action.

## [3. Modify your tag to enable additional features](#tab/uet-3-modify-your-tag-to-enable-additional-features-3)

Some targeting and tracking features require you to modify your UET tag. The instructions below assume that you have already created a UET tag and added it to your website.

### Modifying your UET tag...

To track custom events

Once you've created a custom event conversion goal or remarketing list using custom events (see [hlp_BA_CONC_UETv2CustomEvent](hlp_BA_CONC_UETv2CustomEvent)), you need to add the custom event JavaScript to your UET tag tracking code. Let's say that the custom event you want to track on your webpage is **people selecting a "Download now" button** on one of your webpages.

- Add the following custom event JavaScript below the UET tag that you added to your webpage's code in Step 1:

```html
Your page title

 // Let's say this is where you pasted the UET tag in Step 1.

Your UET tag is here.

 // Here is where to paste the following JavaScript:

   window.uetq = window.uetq || [];

   window.uetq.push ('event', 'Replace_with_Event_Action', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value'});

   ...

Download now

   ...
```

- Give this code snippet a function name. The function name can be anything, as long as it hasn't already been used in your website. In this example, we're naming it "GetCustomEvent()":

```html
Your page title

Your UET tag is here.

   function GetCustomEvent() {

   window.uetq = window.uetq || [];

   window.uetq.push ('event', 'Replace_with_Event_Action', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value'});

   }

   ...

Download now

   ...
```

- You now need to customize your webpage's code to call this function when the appropriate action occurs. In our example, the custom event is a select of the "Download now" button, so we'd need to add a call in the button's code:

```html
Your page title

Your UET tag is here.

   function GetCustomEvent() {

   window.uetq = window.uetq || [];

   window.uetq.push ('event', 'Replace_with_Event_Action', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value'});

   }

   ...

OnClick="GetCustomEvent()"]]>>Download now

   ...
```

- Note the four different parameters in the custom event JavaScript: 'event', 'event_category', 'event_label', and 'event_value'. These correspond to the parameters you had the option to define for your custom event conversion goal in Step 2. In the JavaScript you added, the parameters have placeholder values assigned to them:

```html
Your page title

Your UET tag is here.

   function GetCustomEvent() {

   window.uetq = window.uetq || [];

   window.uetq.push ('event', 'Replace_with_Event_Action]]>', {'event_category': 'Replace_with_Event_Category]]>', 'event_label': 'Replace_with_Event_Label]]>', 'event_value': 'Replace_with_Event_Value]]>'});

   }

   ...

Download now

   ...
```

- The JavaScript you added needs to return a value to Microsoft Advertising when the custom event occurs, and that value needs to match what you entered in Step 2. In our example, we are tracking button clicks, which are **Action** events as shown in Step 2 (and are represented by 'event' in the JavaScript). So we would need to modify the placeholder value of the 'event' parameter (and we can remove the other three parameters):

```html
Your page title

								Your UET tag is here.

								   function GetCustomEvent() {

								   window.uetq = window.uetq || [];

								   window.uetq.push ('event', 'downloadbuttonselect]]>', {});

								   }

								   ...

								Download now

								   ...
```

- Save and deploy your edited website code.

To see an example of a custom event UET tag tracking code installed in the body of a webpage, visit [this webpage](UET_CustomEvent) (English only), right-click in the webpage, and then select **View source** or **View page source** depending on your browser. On this page, you'll also see some buttons. Selecting each button will trigger a custom event. If you use a third-party monitoring tool like Fiddler, you can see the HTTP request generated to bat.bing.com to report each custom event.


> As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.

For custom events, an additional HTTP request is triggered to report the same to Microsoft Advertising. The request is similar to the bat.bing but it has different parameters to report custom event (as opposed to just page visit).

To track custom e-commerce events

For example custom e-commerce events, see [hlp_BA_PROC_UET_ExampleEventsEcommerce](hlp_BA_PROC_UET_ExampleEventsEcommerce).

To track variable revenue

Once you've created a variable revenue conversion goal (see [hlp_BA_CONC_UETv2RevenueVariables](hlp_BA_CONC_UETv2RevenueVariables)), you need to edit the UET tracking code to support it.

Let's look at how to pass variable revenue for a destination URL type goal in PHP pages. In the below example, it's reading a dynamic value for the variable revenue from a JavaScript function. You can just as easily send a static value or read from a JavaScript variable or HTML element.

To add the code to PHP pages using your webpage editor, see the sample UET tag tracking code below:

```ext
(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[] ,f=function(){var o={ti:"TAG_ID_HERE"}; o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")} ,n=d.createElement(t),n.src=r,n.async=1,n.onload=n .onreadystatechange=function() {var s=this.readyState;s &&s!=="loaded"&& s!=="complete"||(f(),n.onload=n. onreadystatechange=null)},i= d.getElementsByTagName(t)[0],i. parentNode.insertBefore(n,i)})(window,document,"script"," //bat.bing.com/bat.js","uetq");

   function GetRevenueValue()
	  {
		 return 6;
	  }

   window.uetq = window.uetq || [];
   window.uetq.push('event', '', {'revenue_value': GetRevenueValue(), 'currency': 'Replace_with_Currency_Code'});
```

- Open your conversion confirmation page file. If multiple pages are generated from the same file, find the section in the file that generates your conversion page.

- Add or confirm that your site has a JavaScript function that defines variable revenue. In the above code, it is:

```ext
function GetRevenueValue()
	  {
		 return 6;
	  }
```

You’ll need to replace this section with your own JavaScript function.

- Append the uetq.push code to the end of the UET tag tracking code to associate the revenue value with a conversion goal. Update the amount value for 'revenue_value' parameter with value defined in step 2. In the above code, it is:

```ext
window.uetq = window.uetq || [];
   window.uetq.push('event', '', {'revenue_value': GetRevenueValue(), 'currency': 'Replace_with_Currency_Code'});
```


> The command 'event' is always required, even if you're not reporting any Event action. When you're reporting variable revenue for a destination URL goal, you need to leave Event action empty (as in, 'event', '') and can only have revenue_value and currency parameters in the event.

> To see the complete list of currency codes, see [MSDN_ConversionCurrency](MSDN_ConversionCurrency). You can remove the 'currency' parameter if no currency is set in the conversion goal.

- Make sure you add the modified UET tag tracking code to the body of the conversion confirmation page, which is the page the customer sees after they complete the action you want to track (for example, the Purchase confirmation page).

Tip: Search for the "" tag and place the UET tag tracking code immediately above it.

- Save and upload the page to your web server.

Advanced: Code samples for event conversion goals

Now that you know the code to append to the end of the UET tag tracking code for destination URL conversion goals, here are a few others you might want to try:

### Event conversion goal

There is different code you need to append to report variable revenue for an event conversion goal. If you are using the same JavaScript function as in Step 2, it would look like this:

```ext
window.uetq = window.uetq || [];
   window.uetq.push('event', 'Event action', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value', 'revenue_value': GetRevenueValue(), 'currency': 'Replace_with_Currency_Code'});
```

Note: To see the complete list of currency codes, see [MSDN_ConversionCurrency](MSDN_ConversionCurrency).


> To see an example of a variable revenue UET tag installed in the body of a webpage, visit [this webpage](UET_VariableRevenue) (English only), right-click in the webpage, and then select **View source** or **View page source** depending on your browser.

> As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.

For variable revenue, an additional HTTP request is triggered to report this value to Microsoft Advertising. It is similar to the bat.bing but it has different parameters to report revenue (as opposed to just page visit).

You can validate the variable revenue tag using [UET Tag Helper](hlp_BA_CONC_UET_TagHelper).

To use dynamic remarketing

Once you've created a dynamic remarketing list (see [hlp_BA_CONC_Audiences_ProductAudience](hlp_BA_CONC_Audiences_ProductAudience)), you need to add custom parameters to your UET tag tracking code to make it work.

Add the following JavaScript in each page of your website:

```html
window.uetq = window.uetq || [];

   window.uetq.push ('event', '', {'ecomm_prodid': 'Replace_with_Product_ID]]>', 'ecomm_pagetype': 'Replace_with_Page_Type]]>'});
```


> Both product ID and pagetype must be included on every page you want to update a dynamic remarketing list for. Missing either value would keep your dynamic remarketing list from updating for that page. For example, if you pass product IDs on all of your product pages, but not on your home page, then the "Product viewers" list will be updated with visitors to your product pages, but the "General visitors" list will not record people who visited your home page. To target visitors to pages that cannot pass product IDs for any reason, you can use regular [remarketing lists](hlp_BA_CONC_Audiences_Remarketing).

> In the **'event', '',** part of the tag, make sure the two single-quotation marks after **'event',** remain empty.

> You can track multiple products in the same UET tag by including an array of product IDs like this:

```html
'ecomm_prodid': ['Replace_with_Product_ID_1','Replace_with_Product_ID_2','Replace_with_Product_ID_3']
```

In the above JavaScript, change the following parameters:

**event_name**: (Optional) Replace this with one of the following values, depending on what you want to track for this product audience:

- add_payment_info, add_to_cart, add_to_wishlist, begin_checkout, checkout_progress, exception, generate_lead, login, page_view, purchase, refund, remove_from_cart, screen_view, search, select_content, set_checkout_option, share, sign_up, timing_complete, view_item, view_item_list, view_promotion, view_search_results


- **Replace_with_Product_ID**: Replace this with one of the following product IDs:

- The exact SKU ID that uniquely identifies a product. This is sometimes called a UPC (universal product code).

- An item group ID representing a set of variants for the same product (such as color or size options).


> The product ID in your JavaScript code must match an ID in your [Microsoft Merchant Center product feed](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile).

- **Replace_with_Page_Type**: Replace this with the one of the following values in the right-hand column of this table, depending on the page you will be using this JavaScript in:

| Dynamic remarketing list you're tracking | Required page type |
|---|---|
| General visitors | 'ecomm_pagetype': 'home' <br> 'ecomm_pagetype': 'category' <br> 'ecomm_pagetype': 'other' <br><br> Note: Any user not included in the page type for searchresults, product, cart, or purchase is included in the general visitors audience. |
| Product searchers | 'ecomm_pagetype': 'searchresults' |
| Product viewers | 'ecomm_pagetype': 'product' |
| Shopping cart abandoners | 'ecomm_pagetype': 'cart' |
| Past buyers | 'ecomm_pagetype': 'purchase' |

**Note: Customers who buy a product are added to the "past buyers" list and are removed from other lists (for that particular product). For this to work, the UET tag on your purchase confirmation page must send both product ID (ecomm_prodid) and pagetype (ecomm_pagetype).**

To see an example of a dynamic remarketing UET tag tracking code installed in the body of a webpage, visit [this webpage](UET_ProductAudience) (English only), right-click in the webpage, and then select **View source** or **View page source** depending on your browser. On this page, you can also define a product ID and page type, and then select a button to trigger a custom event for this dynamic remarketing list. If you use a third-party monitoring tool like Fiddler, you can see the HTTP request generated to bat.bing.com to report each custom event.


> As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.

For custom events, an additional HTTP request is triggered to report the same to Microsoft Advertising. The request is similar to the bat.bing but it has different parameters to report custom event (as opposed to just page visit).

> You can validate that your dynamic remarketing UET tag tracking codes are working using the [UET Tag Helper](hlp_BA_CONC_UET_TagHelper).

When implementing multiple features

As discussed in the above sections, certain Microsoft Advertising features require you to add and modify a JavaScript snippet to your existing UET tag:

- **Custom events**: For conversion goals or remarketing lists based on custom events, you need to modify the following snippet to return the **event action**, **event category**, **event label**, and/or **event value**:

```html
window.uetq = window.uetq || [];

   window.uetq.push ('event', 'Replace_with_Event_Action]]>', {'event_category': 'Replace_with_Event_Category]]>', 'event_label': 'Replace_with_Event_Label]]>', 'event_value': 'Replace_with_Event_Value]]>'});
```

- **Variable revenue**: For conversion goals tracking variable revenue, you need to modify the following snippet to return the **revenue value** and **currency code**:

```html
window.uetq = window.uetq || [];

   window.uetq.push ('event', '', {'revenue_value': 'Replace_with_Revenue_Value]]>', 'currency': 'Replace_with_Currency_Code]]>'});
```

- **Dynamic remarketing**: To target a dynamic remarketing list, you need to modify the following snippet to return the **product ID** and **page type**:

```html
window.uetq = window.uetq || [];

   window.uetq.push ('event', '', {'ecomm_prodid': 'Replace_with_Product_ID]]>', 'ecomm_pagetype': 'Replace_with_Page_Type]]>'});
```

If you are implementing more than one of these features, there are a couple things to keep in mind:

- **We recommend keeping each feature's JavaScript snippet separate in your webpage's code** (in other words, in separate 	 sections) because each snippet sends out one event.

- In specific, you **can't** use one JavaScript snippet to track both of the following on the same webpage:

- Variable revenue for the **Destination URL** conversion goal

- Custom events based on a conversion goal or remarketing list

In this case, you will need to have two separate snippets in your webpage's code:

- Snippet 1 -- for variable revenue for the Destination URL conversion goal:

```html
window.uetq = window.uetq || [];

   window.uetq.push ('event', '', {'revenue_value': 'Replace_with_Revenue_Value]]>', 'currency': 'Replace_with_Currency_Code]]>'});
```

- Snippet 2 -- for custom events based on a conversion goal or remarketing list. However, note that, if you are tracking variable revenue for a custom event conversion goal (**not** a Destination URL conversion goal), you would include this in the custom event code snippet:

```html
window.uetq = window.uetq || [];

   window.uetq.push ('event', 'Replace_with_Event_Action]]>', {'event_category': 'Replace_with_Event_Category]]>', 'event_label': 'Replace_with_Event_Label]]>', 'event_value': 'Replace_with_Event_Value]]>', 'revenue_value': 'Replace_with_Revenue_Value]]>', 'currency': 'Replace_with_Currency_Code]]>'});
```

## [4. Verify your tag is working and troubleshoot issues](#tab/uet-4-verify-your-tag-is-working-and-troubleshoot-issues-4)

### UET Tag Helper

The easiest way to validate that your UET tag is working properly on any given webpage is to use UET Tag Helper (a browser extension):

[How to install and use UET Tag Helper](hlp_BA_CONC_UET_TagHelper)

### Review the UET tracking status column in Microsoft Advertising

You can also use Microsoft Advertising to validate:

- [include: UetTag]

- In the table, review the columns:

| Column | What it is | Why it's important |
|---|---|---|
| Tag name | The name of the UET tag. | When you create a conversion goal or remarketing list, you select the name of the UET tag that you want to use. |
| Tag description | The optional description for the UET tag. | It helps you identify the UET tag. We recommend adding the website page name or URL. |
| Tag ID | The ID Microsoft Advertising associates with the UET tag. | The Conversion goals page lists the UET tag ID associated with the goal, and you can view the UET tag tracking code. |
| Tracking status | The status of the UET tag: unverified, tag active, or tag inactive. | Lets you know if your UET tag is working. |
| Goals | The number of conversion goals that use this UET tag. | It links to the Conversion goals page with only the goals associated with this tag displayed. |
| Audiences | The number of audiences that use this UET tag. | It links to the Audience page with only the audiences associated with this tag displayed. |
| Action | A link that opens the UET tag tracking code box. | It lets you email, copy, or download the UET tag tracking code at any time. |

Tracking status values:

- **Unverified**: Microsoft Advertising has not received user activity data from the UET tag on your website yet. Verification can take up to 24 hours. If the status remains unverified, either the UET tag tracking code hasn't been added to your website or there is a setup issue to fix.
- **Tag active**: Your UET tag is working and sending user activity data to Microsoft Advertising.
- **Tag inactive**: Microsoft Advertising has not received user activity data from the UET tag in the last 24 hours. Make sure that the UET tag tracking code is still on your website.

- **What to do if the UET tag is inactive:** If the **Tracking status** column lists **Tag inactive**, Microsoft Advertising has not received user activity data from the UET tag in the last 24 hours. Make sure the UET tag tracking code is still on your website and, if it is not, add it again. You can also use [UET Tag Helper](hlp_BA_CONC_UET_TagHelper) to validate your tag.

**Limitations of the tracking status column**: While we believe the tracking status will help you validate your setup, we do want to call out that the following cannot be verified from the tracking status column:

- Whether or not the UET tag has been installed across the site: Microsoft Advertising reports status of the UET tag as **Tag active** as long as at least one UET event was logged (from any part of your website).

- Whether or not custom events/variable revenue values are being reported: As explained above Microsoft Advertising does not distinguish between page load events (logged by default) or custom events reported when the tracking status column.

Therefore, we recommend using [UET Tag Helper](hlp_BA_CONC_UET_TagHelper) to validate your tag on your individual webpages.

---

