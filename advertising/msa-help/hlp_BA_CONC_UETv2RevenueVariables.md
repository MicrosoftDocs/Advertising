---
title: How to report variable revenue with UET
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Conversions can range from downloading white papers to submitting contact forms and making purchases. Very often these conversions have a revenue value associated with them that you can use to track the Return on ad spend (ROAS) on Microsoft Advertising. UET allows you to report revenue for this purpose.
---

# How to report variable revenue with UET

[Conversion goals](hlp_BA_CONC_UETv2CTGoalType.md) allow you to track what your customers do on your website, which can range from making purchases to signing up for reward programs. Each of these actions probably brings a different value to your business. That's why we let you associate a different, specific revenue value to each conversion goal to track your return on investment (ROI). This is called reporting variable revenue. Both the destination URL and event conversion goals can report variable revenue.

## Requirements

Before you start setting up variable revenue, make sure you have:

- **A JavaScript UET tag**: [Create a Microsoft Advertising UET tag](hlp_BA_PROC_UETv2CreateTag.md) and [add the UET tag tracking code to every page of your website](hlp_BA_PROC_UETv2AddTag.md).

  - JavaScript is required to ensure you have access to the full functionalities of conversion tracking and remarketing. If you are using a non-JavaScript tag, please switch over to a JavaScript tag.
- **A conversion goal**: Create a destination URL or event conversion goal. To learn more, see [How do I create a conversion goal?](hlp_BA_PROC_UETv2CreateGoal.md)
- **The ability to edit website code**: Make sure that either you or your webmaster can edit your website code.

## How to set up variable revenue reporting

- **Step 1: Set up variable revenue conversion tracking in your Microsoft Advertising account**

  1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
  1. In the **Type** column, find a destination URL or event conversion goal. If you don't have one, select **Create** to create one.
  1. In the **Goal name** column, select the destination or event conversion goal's name.
  1. Set a **Goal Category**.
  1. Select **Next**.
  1. Under **Revenue value**, select **Conversion action value may vary (for instance, by purchase price)**. Then enter the default amount and select the default currency to be used when no value is received for a conversion.
  1. Select **Next**.
  1. Select the appropriate **Set up tagging option** and select **Save and next**.

  > [!NOTE]
  > To see the complete list of currencies available for conversion goals, see [Conversion Goal Revenue Currencies](https://go.microsoft.com/fwlink/?linkid=2212012).

- **Step 2: Add or modify the UET tag tracking code on your website**

  > [!NOTE]
  > - Do you use Google Tag Manager? Check out [Set up UET tags using Google Tag Manager](hlp_BA_PROC_UET_TMS_GTM.md).
  > - Do you use a different tag manager? Take a look at the "Add the UET tag tracking code using a tag manager" section of [this article](hlp_BA_PROC_UETv2AddTag.md).
  > - Do you use a website-hosting service? Take a look at the "Add the UET tag tracking code using your website platform" section of [this article](hlp_BA_PROC_UETv2AddTag.md).

  Next, you will want to edit the UET tracking code to support variable revenue. If you have already added the UET tag tracking code to your website, you can modify the tag in your website's code. If you haven't added the tag to your website yet, see [How do I add a UET tag to my website?](hlp_BA_PROC_UETv2AddTag.md), but make sure you add the tag to the body section of the conversion goal confirmation page.

  Let's look at how to pass variable revenue for a destination URL type goal in PHP pages. In the following example, it's reading a dynamic value for the variable revenue from a JavaScript function. You can just as easily send a static value or read from a JavaScript variable or HTML element.

  1. Open the code file for your conversion confirmation page (the page the customer sees after they complete the action you want to track). If multiple pages are generated from the same file, find the section in the file that generates your conversion page.
  1. First, you'll need to add one of the following variable revenue JavaScripts:

     > [!IMPORTANT]
     > You must pass the currency value in capital letters. For example, *'currency': 'USD'*, not *'currency': 'usd'*.

     1. **For destination URL conversion goals**: Add the following JavaScript below the UET tag that you have already added to your webpage's code:

        ```
        <head>Your page title 
        </head>	


        <body>

         // Let's say this is where you pasted the UET tag.

        <script>Your UET tag is here.</script> 

         // Here is where to paste the following JavaScript: <br><br>	
        <script>  <br>								
           window.uetq = window.uetq || [];  <br>
           window.uetq.push('event', '', {'revenue_value': Replace_with_Variable_Revenue_Function(), 'currency': 'REPLACE_WITH_CURRENCY_CODE'});    <br>
        </script> 



           ...

        </body>									
        ```

        > [!NOTE]
        > Even though this isn't a custom event conversion goal (see next section), you still must include the command 'event'. For a destination URL goal, just leave the event action empty (as in, 'event', '').
        
     1. **For custom event conversion goals**: Add the following JavaScript below the UET tag that you have already added to your webpage's code: `<font color="ff0027" size="2">'revenue_value': Replace_with_Variable_Revenue_Function(), 'currency': 'REPLACE_WITH_CURRENCY_CODE'</font>`

        ```
        <head>Your page title 
        </head>	


        <body>

         // Let's say this is where you pasted the UET tag.

        <script>Your UET tag is here.</script> 

         // Here is where to paste the following JavaScript: <br><br>	
        <script>  <br>								
           window.uetq = window.uetq || [];  <br>
           window.uetq.push('event', 'Event action', {'event_category': 'Replace_with_Event_Category', 'event_label': 'Replace_with_Event_Label', 'event_value': 'Replace_with_Event_Value', 'revenue_value': Replace_with_Variable_Revenue_Function(), 'currency': 'REPLACE_WITH_CURRENCY_CODE'});      <br>
        </script> 



           ...

        </body>									
        ```

        For instructions on updating custom event parameters, take a look at [How to track custom events with UET](hlp_BA_CONC_UETv2CustomEvent.md).

        If you have already added JavaScript for custom events to your website's code, for this step, you'll just need to insert the variable revenue parameters:
  1. Next, make sure your webpage has a function that defines variable revenue:

     ```
     <head>Your page title 
     </head>	


     <body>

     <script>Your UET tag is here.</script> 


     <script>  <br>								
        window.uetq = window.uetq || [];  <br>
        window.uetq.push('event', '', {'revenue_value': Replace_with_Variable_Revenue_Function(), 'currency': 'REPLACE_WITH_CURRENCY_CODE'});    <br>
     </script> 


        ...

      // Here is an example function, named "GetRevenueValue()", that defines variable revenue:
     <br> 
     <script>
        function GetRevenueValue()
           { return 6; }
     </script>  



        ...

     </body>									
     ```

     > [!NOTE]
     > When your revenue function passes values, it must use a period for decimals (as in 12.34), not a comma (as in 12,34).
  1. In the variable revenue JavaScript that you added in step 2, update the value for 'revenue_value' to match the name of the variable revenue function you added in step 3 (in this example, we changed "Replace_with_Variable_Revenue_Function()" to "GetRevenueValue()"):

     ```
     <head>Your page title 
     </head>	


     <body>

     <script>Your UET tag is here.</script> 


     <script>  <br>								
        window.uetq = window.uetq || [];  <br>
        window.uetq.push('event', '', {'revenue_value': <font color="ff0027" size="2">GetRevenueValue()</font>, 'currency': 'REPLACE_WITH_CURRENCY_CODE'});    <br>
     </script> 


        ...



     <script>
        function GetRevenueValue()
           { return 6; }
     </script>  



        ...

     </body>									
     ```
  1. In the same line, you have the option of specifying the currency you want the revenue value reported in (in this example, we changed "REPLACE_WITH_CURRENCY_CODE" to "GBP", for British pounds):

     > [!IMPORTANT]
     > You must pass the currency value in capital letters. For example, *'currency': 'USD'*, not *'currency': 'usd'*.

     ```
     <head>Your page title 
     </head>	


     <body>

     <script>Your UET tag is here.</script> 


     <script>  <br>								
        window.uetq = window.uetq || [];  <br>
        window.uetq.push('event', '', {'revenue_value': GetRevenueValue(), 'currency': '<font color="ff0027" size="2">GBP</font>'});    <br>
     </script> 


        ...



     <script>
        function GetRevenueValue()
           { return 6; }
     </script>  



        ...

     </body>									
     ```

     > [!NOTE]
     > To see the complete list of currency codes, see [Conversion Goal Revenue Currencies](https://go.microsoft.com/fwlink/?linkid=2212012). You can remove the 'currency' parameter if no currency is set in the conversion goal.
  1. Save and upload the page to your web server.

> [!NOTE]
> - To see an example of a variable revenue UET tag installed in the body of a webpage, visit [this webpage](https://go.microsoft.com/fwlink/?linkid=2010572) (English only), select and hold (or right-click) in the webpage, and then select **View source** or **View page source** depending on your browser.
> - As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.
> - For variable revenue, an additional HTTP request is triggered to report this value to Microsoft Advertising. It is similar to the bat.bing but it has different parameters to report revenue (as opposed to just page visit).
> - You can validate the variable revenue tag using [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md).
