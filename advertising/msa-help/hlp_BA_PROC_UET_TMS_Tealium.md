---
title: Set up UET Tags Using Tealium
description: Third-party tag managers allow you to manage your website tags in one place. Learn how to set up UET tags using Tealium.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using Tealium

> [!NOTE]
> - This article shows how to do a basic setup of UET tags with Tealium. Tealium offers several advanced features to customize when and how your tags are fired. Please refer to the [Tealium Learning Community](https://go.microsoft.com/fwlink/?linkid=2010443) for more information.
> - Microsoft Advertising is not responsible for Tealium's processes or documentation, nor for changes made to Tealium's processes or documentation.

Tag managers replace static tags with dynamic tags that are easier to implement and update. The dynamic tag is a container, a small snippet of code that allows you to dynamically insert tags into your website. You can think of the container tag as a bucket that holds other types of tags.

## Implementing UET using Tealium

1. Set up an account in Tealium, if you haven't already.
1. In Tealium, click **Code center** from the top-right menu under your account name.
1. You will see the Tealium container code and instructions. Copy the container code and paste it into the head or body section of your website's code.
1. In Tealium, click the **Tags** tab and then click on **Add Tag** to go to Tealium's **Tag Marketplace**.
1. Search for "Microsoft Advertising UET". When you find it, click **Add**.
1. In the **Tag Configuration** step, for **Tag ID** enter your Microsoft Advertising UET tag ID. You can find the tag in Microsoft Advertising by selecting **Conversion Tracking** > **UET tags**. When you're done, click **Next**.
1. In the **Load Rules** step, we recommend that you select the **Load on All Pages** checkbox. However, if required, you can create advanced rules to return the UET tag only when certain conditions are met. When you're done, click **Next**.
1. In the (optional) **Data Mappings** step, you can select data sources such as user browser, query string, and JavaScript variables to be mapped to UET [custom events](hlp_BA_CONC_UETv2CustomEvent.md) or [revenue variables](hlp_BA_CONC_UETv2RevenueVariables.md). When you're done, click **Finish**.
1. Click **Publish** in the upper-right corner of Tealium.
1. Use the [UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md) to validate that the tag is set up correctly in real-time and to troubleshoot issues if the tag is not working.

> [!NOTE]
> - To see an example of a Tealium UET tag installed in the body of a webpage, visit our [Tealium sample page](https://go.microsoft.com/fwlink/?linkid=2010817) (English only), right-click in the webpage, and then click **View source** or **View page source** depending on your browser.
> - As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.
