---
title: How to track custom events with UET
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to create custom events that allow you to track more than one type of conversion for a single webpage.
---

# How to track custom events with UET

Microsoft Advertising allows you to track custom events on your website, such as when people subscribe to a newsletter or download a white paper, as conversions. To learn more, see [Why track custom events](hlp_BA_PROC_UETv2TrackCustomEvent.md).

## Requirements

Before you start setting up custom events, make sure you have:

- **A JavaScript UET tag**: [Create a Microsoft Advertising UET tag](hlp_BA_PROC_UETv2CreateTag.md) and [add the UET tag tracking code to every page of your website](hlp_BA_PROC_UETv2AddTag.md).

  - JavaScript is required to ensure you have access to the full functionalities of conversion tracking and remarketing. If you are using a non-JavaScript tag, please switch over to a JavaScript tag.
- **The ability to edit website code**: Make sure that either you or your webmaster can edit your website code.

## How to set up custom events

- **Step 1: Add the UET tag tracking code to your website**

  > [!NOTE]
  > - Do you use Google Tag Manager? Check out [Set up UET tags using Google Tag Manager](hlp_BA_PROC_UET_TMS_GTM.md).
  > - Do you use a different tag manager? Take a look at the "Add the UET tag tracking code using a tag manager" section of [this article](hlp_BA_PROC_UETv2AddTag.md).
  > - Do you use a website-hosting service? Take a look at the "Add the UET tag tracking code using your website platform" section of [this article](hlp_BA_PROC_UETv2AddTag.md).

  1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
  1. Find the tag you want to use and, in the **Action** column, select **View tag**.
  1. Select **Copy**.
  1. In your website's code, paste the tag in one of the following locations:

     ```
     <head>Your page title 
      // Option 1: Insert your UET tag here, between the "head" tags. 

     </head>


     <body>  					  
      // Option 2: Insert your UET tag here, right after beginning of the "body" tag.

        ...

     <button>Download now</button>

        ...

     </body>								
     ```

- **Step 2: Create a conversion goal or remarketing list**

  - Creating a conversion goal for a custom event:

    1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
    1. Select **Create**.
    1. Choose the type of conversion you want to track: **Website**, **Mobile app install**, or **Offline**.
    1. Select **Next**.
    1. Choose a [goal category](hlp_BA_CONC_UET_GoalCategory.md) from the dropdown menu and then choose a [goal type](hlp_BA_CONC_UETv2CTGoalType.md).
    1. Enter a name for your goal in the **Goal name** box. When naming your goal, use a descriptive name that makes sense to you. (For example, "Checkout page".) Please note that after you choose a name for your conversion goal, the same name may not be used again in the future.
    1. Fill in the appropriate values for your selected goal type.
    1. If you want to add a monetary value for each conversion, select one of the following from the **Revenue**, dropdown menu:

       - **Each conversion action has the same value**, and then enter the amount and select the currency (if available). This is a static revenue value that doesn't change.
       - **Conversion action value may vary (for instance, by purchase price)**, and then enter the default amount and select the default currency (if available) to be used when no value is received for a conversion. The revenue value will change based on the customization you make to the UET tag tracking code that you add to your website. To learn more, see [How to report variable revenue with UET](hlp_BA_CONC_UETv2RevenueVariables.md). This option is only available for destination URL and event conversion goals.
    1. Fine-tune your conversion goal with **Advanced settings**:

       - Set the **Scope** of this goal to all accounts or a specific account. Please note that once selected, this property can't be changed.
       - Change how you **Count** your conversions. [Learn more](hlp_BA_CONC_UETv2Count.md).
       - Enter a **Conversion window** to track up to 90 days in the past.
       - Set a **View-through conversion window** to track conversions that occur in this period of time after a customer views (but doesn't click) your ad. [Learn more about view-through conversions](hlp_BA_CONC_ViewThroughConv.md).
       - Check or clear the **Include in "Conversions"** checkbox depending on whether or not you want to track all conversions. Learn more about ["Conversions" versus "All conversions"](hlp_BA_CONC_ConvsVsAllConvs.md).
    1. Select **Next**.
    1. Select the UET tag that you want to associate with this conversion goal (not applicable to offline conversions).
    1. Choose an answer for **Do you have this UET tag installed on your website?**

       > [!NOTE]
       > If you choose either **No, this UET tag is not installed on all your website pages** or **I’m not sure. I need instructions to install the tag**, select **Install the tag yourself** or **Send the tag to a developer**. Select **Next** and follow the onscreen instructions. Select **Next** to finish setting up the conversion goal. [Learn more about adding a UET tag to your website](hlp_BA_PROC_UETv2AddTag.md).
    1. Select **Save and next**.
    1. For **Custom Event** goals, specify when you want to track this event (choose **Track event on inline action** or **Track event on page load**). Follow the provided instructions to set up the event tag on your website.

    > [!NOTE]
    > Every action that we detect that matches your conversion goal will be counted as one conversion.
  - Creating a remarketing list for a custom event:

    1. From the navigation menu on the left, hover over **Campaigns** and select **Audiences**.
    1. Select **Create association**.
    1. Name your remarketing list, select **Remarketing list**, and then select **Next**.
    1. For **Whom to add to your audience**, select **Custom events**.
    1. Choose the parameters to report when logging custom events by assigning each one you want to use a text string or numeric value. The possible parameters are:

       - **Category**: The category of the event you want to track. Let's say you want to track downloads of a document on a page of your site. For this example, the category could be "downloads".
       - **Action**: The type of user interaction you want to track. For our example, "downloadbuttonclick".
       - **Label**: The name of the element that caused the action. For our example, "document05".
       - **Value**: A numerical value associated with that event. For our example, the number of pages in the document: "4".<br> The event value can be any value from 0 to 9999999 to 3 decimal places.

       > [!IMPORTANT]
       > You'll customize your UET tag tracking code to match the values defined here (this is discussed in Step 3). This will allow Microsoft Advertising to match these values with the custom events being logged via UET to count them as conversions.
    1. Set the **Membership duration** to tell Microsoft Advertising how far back in time to look for actions that match your remarketing list definition in order to add people to your list.
    1. For **Tag name**, select the UET tag that you added to your website in Step 1.
    1. Select **Save**.
    1. [Associate this remarketing list with an ad group](hlp_BA_CONC_Audiences_AssociateAdGroup.md)

- **Step 3: Modify the UET tag tracking code in your website**

  ### people clicking the "Download now" button

  Action

  1. Add the following custom event JavaScript below the UET tag that you added to your webpage's code in Step 1:

     ```
     <head>Your page title 
     </head>	


     <body>

      // Let's say this is where you pasted the UET tag in Step 1.

     <script>Your UET tag is here.</script> 

      // Here is where to paste the following JavaScript: <br><br>	
     <script>  <br>								
        window.uetq = window.uetq || [];  <br>
        window.uetq.push ('event', 'Replace_with_Event_Action', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value'});  <br>
     </script> 


        ...

     <button>Download now</button>


        ...

     </body>									
     ```
  1. Give this code snippet a function name. The function name can be anything, as long as it hasn't already been used in your website. In this example, we're naming it "GetCustomEvent()":

     ```
     <head>Your page title 
     </head>	


     <body>

     <script>Your UET tag is here.</script> 


     <script>		 						

        function GetCustomEvent() { 

        window.uetq = window.uetq || [];  <br>
        window.uetq.push ('event', 'Replace_with_Event_Action', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value'});   

        } 

     </script> 



        ...


     <button>Download now</button>



        ...


     </body>									
     ```
  1. You now need to customize your webpage's code to call this function when the appropriate action occurs. In our example, the custom event is a click of the "Download now" button, so we'd need to add a call in the button's code:

     ```
     <head>Your page title 
     </head>	


     <body>

     <script>Your UET tag is here.</script> 


     </script> 


     <script>		 


        function GetCustomEvent() { 

        window.uetq = window.uetq || [];  <br>
        window.uetq.push ('event', 'Replace_with_Event_Action', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value'});   

        } 

     </script> 



        ...


     <button <font color="ff0027" size="2">OnClick="GetCustomEvent()"</font>>Download now</button>



        ...


     </body>									
     ```
  1. Note the four different parameters in the custom event JavaScript: 'event', 'event_category', 'event_label', and 'event_value'. These correspond to the parameters you had the option to define for your custom event conversion goal in Step 2. In the JavaScript you added, the parameters have placeholder values assigned to them:

     ```
     <head>Your page title 
     </head>	


     <body>

     <script>Your UET tag is here.</script> 


     </script> 


     <script>		 


        function GetCustomEvent() { 

        window.uetq = window.uetq || [];  <br>
        window.uetq.push ('event', '<font color="ff0027" size="2">Replace_with_Event_Action</font>', {'event_category': '<font color="ff0027" size="2">Replace_with_Event_Category</font>', 'event_label': '<font color="ff0027" size="2">Replace_with_Event_Label</font>', 'event_value': '<font color="ff0027" size="2">Replace_with_Event_Value</font>'});   

        } 

     </script> 



        ...


     <button OnClick="GetCustomEvent()>Download now</button>



        ...


     </body>									
     ```
  1. The JavaScript you added needs to return a value to Microsoft Advertising when the custom event occurs, and that value needs to match what you entered in Step 2. In our example, we are tracking button clicks, which are **Action** events as shown in Step 2 (and are represented by 'event' in the JavaScript). So we would need to modify the placeholder value of the 'event' parameter (and we can remove the other three parameters):

     ```
     								<head>Your page title 
     								</head>	


     								<body>

     								<script>Your UET tag is here.</script> 


     								<script>		 


     								   function GetCustomEvent() { 

     								   window.uetq = window.uetq || [];  <br>
     								   window.uetq.push ('event', '<font color="ff0027" size="2">downloadbuttonclick</font>', {});   

     								   } 

     								</script>



     								   ... 


     								<button OnClick="GetCustomEvent()>Download now</button>



     								   ...


     								</body>									
     ```
  1. Save and deploy your edited website code.

- **Tips for working with custom events**

  - uetq is a JavaScript object instantiated by the UET tracking code when the page is loaded.
  - The code inside the <script></script> tag should be instantiated when the user action (for example, a button click) is complete. It could be wired up directly to an onclick event or wrapped inside a JavaScript function that is wired to the onclick event.
  - The command 'event' is always required, even if you're not reporting any Event action. If that's the case, you can set Event action either as:

    - Empty. For example: <br> `<script> window.uetq = window.uetq || []; window.uetq.push('event', '', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value'}); </script>`
    - One of the following actions that might help you identify the event action in the future:<br> add_payment_info, add_to_cart, add_to_wishlist, begin_checkout, checkout_progress, exception, generate_lead, login, page_view, purchase, refund, remove_from_cart, screen_view, search, select_content, set_checkout_option, share, sign_up, timing_complete, view_item, view_item_list, view_promotion, view_search_results <br> For example: <br> `<script> window.uetq = window.uetq || []; window.uetq.push('event', 'add_payment_info', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value'}); </script>`
  - If you're only tracking Event action, you can remove the other parameters from the code. For example: <br> `<script> window.uetq = window.uetq || []; window.uetq.push('event', 'Event action', {}); </script>`
  - You can use any string value for Replace_with_Event_Category, Event action, and Replace_with_Event_Label.
  - You can send the event value without quotes given that it's a numerical value. For example, <button onclick="window.uetq = window.uetq || []; window.uetq.push({ 'event_category':'Video', 'event':'Play', 'event_label':'Product Demo', 'event_value':5 });">Play</button>. Event value 5 is passed without quotes.
  - You can also pass variable revenue with the custom events. To learn more, see [How to report variable revenue with UET](hlp_BA_CONC_UETv2RevenueVariables.md).

> [!NOTE]
> - You can validate that your custom events are working using the [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md).
> - To see an example of a custom event UET tag tracking code installed in the body of a webpage, visit [this webpage](https://go.microsoft.com/fwlink/?linkid=2010575) (English only), right-click in the webpage, and then select **View source** or **View page source** depending on your browser. On this page, you'll also see some buttons. Clicking each button will trigger a custom event. If you use a third-party monitoring tool like Fiddler, you can see the HTTP request generated to bat.bing.com to report each custom event.
> - As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.
> - For custom events, an additional HTTP request is triggered to report the same to Microsoft Advertising. The request is similar to the bat.bing but it has different parameters to report custom event (as opposed to just page visit).
