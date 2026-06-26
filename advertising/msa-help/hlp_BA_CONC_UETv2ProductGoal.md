---
title: Using the product conversion goal
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: With the product conversion goal, you can more accurately track purchases of products as conversions for the ads shown for those products.
---

# Using the product conversion goal

> [!IMPORTANT]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

The product conversion goal can help your feed-based campaign ensure that ads that eventually lead to conversions get credit for those conversions. It can work in two different ways:

- **As a retailer, accurately attribute purchases**: A customer clicks an ad for Product A, navigates away without purchasing, subsequently clicks an ad for Product B, but ends up purchasing Product A. Normally, this conversion would be attributed to the ad for Product B because that was the ad last clicked. However, with the product conversion goal, you can track this as a conversion for the ad for Product A.
- **As a retailer participating in Microsoft Shopping campaigns for Brands, attribute same-brand purchases**: A customer clicks an ad for Product A (Brand X), but ends up purchasing Product B (Brand X). Normally, no conversion would be reported. However, with the product conversion goal for brands, you can track this as a conversion for Brand X. You must have [Microsoft Shopping campaigns for Brands](hlp_BA_PROC_BMC_CoopBid.md) set up for this scenario.

> [!NOTE]
> **What's the difference between product conversion goals and dynamic remarketing?** Product conversion goals are used to track purchases or other conversions on your website. Dynamic remarketing informs how you show ads to people who have already purchased or otherwise interacted with products on your website. [Learn more about dynamic remarketing](hlp_BA_CONC_Audiences_ProductAudience.md).

## Requirements

Before you start setting up a product conversion goal, make sure you have:

- **A Microsoft Merchant Center Shopping campaign** or other feed-based ad campaign. [What is Microsoft Merchant Center?](hlp_BA_CONC_AboutBingMerchantCenter.md)
- **A JavaScript UET tag**: [Create a Microsoft Advertising UET tag](hlp_BA_PROC_UETv2CreateTag.md) and [add the UET tag tracking code to every page of your website](hlp_BA_PROC_UETv2AddTag.md).

  - JavaScript is required to ensure you have access to the full functionalities of conversion tracking and remarketing. If you are using a non-JavaScript tag, please switch over to a JavaScript tag.
- **The ability to edit website code**: Make sure that either you or your webmaster can edit your website code.

## How to set up a product conversion goal

- **Step 1: Add the UET tag tracking code to your website**

  1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
  1. Find the tag you want to use and, in the **Action** column, select **View tag**.
  1. Click **Copy**.
  1. In your website's code, paste the tag in one of the following locations:

     ```
     <head>Your page title 
      // Option 1: Insert your UET tag here, between the "head" tags. 

     </head>


     <body>  					  
      // Option 2: Insert your UET tag here, right after beginning of the "body" tag.

        ...

     <button>Buy now</button>

        ...

     </body>								
     ```

- **Step 2: Create a product conversion goal**

  1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
  1. Select **Create**.
  1. Give your conversion goal a name, select **Product** for **Type**, and then select **Next**.
  1. Under **Sharing**, select if you want this goal to apply to all accounts or a specific account.
  1. You can also assign a **Count** to the conversion and enter a **Conversion window** to track up to 90 days in the past.
  1. Select the UET tag that you want to associate with this conversion goal.
  1. Select **Save**.

- **Step 3: Modify the UET tag tracking code in your website**

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
        window.uetq.push ('event', 'PRODUCT_PURCHASE', {'ecomm_prodid': 'REPLACE_WITH_PRODUCT_ID', 'ecomm_pagetype': 'PURCHASE'});  <br>
     </script> 


        ...

     <button>Buy now</button>


        ...

     </body>									
     ```
  1. Give this code snippet a function name. The function name can be anything, as long as it hasn't already been used in your website. In this example, we're naming it "GetProductEvent()":

     ```
     <head>Your page title 
     </head>	


     <body>

     <script>Your UET tag is here.</script> 


     <script>		 						

        function GetProductEvent() { 

        window.uetq = window.uetq || [];  <br>
        window.uetq.push ('event', 'PRODUCT_PURCHASE', {'ecomm_prodid': 'REPLACE_WITH_PRODUCT_ID', 'ecomm_pagetype': 'PURCHASE'});   

        } 

     </script> 



        ...


     <button>Buy now</button>



        ...


     </body>									
     ```
  1. You now need to customize your webpage's code to call this function when the appropriate action occurs. In our example, this action is the customer clicking the "Buy now" button, so we need to add a call in the button's code:

     ```
     <head>Your page title 
     </head>	


     <body>

     <script>Your UET tag is here.</script> 


     </script> 


     <script>		 


        function GetProductEvent() { 

        window.uetq = window.uetq || [];  <br>
        window.uetq.push ('event', 'PRODUCT_PURCHASE', {'ecomm_prodid': 'REPLACE_WITH_PRODUCT_ID', 'ecomm_pagetype': 'PURCHASE'});   

        } 

     </script> 



        ...


     <button <font color="ff0027" size="2">OnClick="GetProductEvent()"</font>>Buy now</button>



        ...


     </body>									
     ```
  1. Note that in the JavaScript you added, there are placeholders for event action ('PRODUCT_PURCHASE'), product ID ('REPLACE_WITH_PRODUCT_ID'), and page type ('PURCHASE'). For these:

     1. **Event action ('PRODUCT_PURCHASE')**: Either leave this placeholder as is or update it to match your scenario (for example, 'order_confirmation'), but you must not leave it empty.
     1. **Product ID ('REPLACE_WITH_PRODUCT_ID')**: Change the placeholder to one or more of your product IDs (an array of product IDs are supported when the page has more than one product). The product ID(s) you add must match the Product IDs added in the product feed in your Microsoft Merchant Center store.
     1. **Page type ('PURCHASE')**: Leave this as 'PURCHASE'.
  1. If your goal is defined to send variable revenue as part of each conversion, then you also need to modify the custom event JavaScript to send this information to Microsoft Advertising. You have two options here: For more information on updating variable revenue parameters, take a look at [How to report variable revenue with UET](hlp_BA_CONC_UETv2RevenueVariables.md).

     1. **Send the total value of all items in the product conversion**: Add the highlighted parameters after the 'ecomm_pagetype' parameter:

        ```
        <script>		 


           function GetProductEvent() { 

           window.uetq = window.uetq || [];  <br>
           window.uetq.push ('event', 'PRODUCT_PURCHASE', {'ecomm_prodid': 'REPLACE_WITH_PRODUCT_ID', 'ecomm_pagetype': 'PURCHASE', <font color="ff0027" size="2">'revenue_value': Replace_with_Variable_Revenue_Function(), 'currency': 'Replace_with_Currency_Code'</font>});   

           } 

        </script> 
        ```
     1. **Send the value for each item in the conversion separately** (this is required for brand attribution, for retailers participating in Microsoft Shopping campaigns for Brands). You'll need to define each item after the 'ecomm_pagetype' parameter. In the below example, two item placeholders are shown following the 'items' parameter, but you'll need to include one for each item you want to track:

        ```
        <script>		 


           function GetProductEvent() { 

           window.uetq = window.uetq || [];  <br>
           window.uetq.push ('event', 'PRODUCT_PURCHASE', {'ecomm_prodid': 'REPLACE_WITH_PRODUCT_ID', 'ecomm_pagetype': 'PURCHASE', <font color="ff0027" size="2">'currency': 'Replace_with_Currency_Code', 'items': [{'id': 'Replace_with_product_ID', 'quantity': 'Replace_with_quantity', 'price': 'Replace_with_selling_price' }, {'id': 'Replace_with_product_ID', 'quantity': 'Replace_with_quantity', 'price': 'Replace_with_selling_price'}] </font>});   

           } 

        </script> 
        ```
  1. Save and deploy your edited website code.
