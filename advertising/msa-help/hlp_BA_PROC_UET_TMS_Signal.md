---
title: Set up UET Tags Using Signal
description: Third-party tag managers allow you to manage your website tags in one place. Learn how to set up UET tags using Signal.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using Signal

> [!NOTE]
> - This article shows how to do a basic setup of UET tags with Signal. Signal offers several advanced features to customize when and how your tags are fired. Please refer to Signal's [Tag Management 101](https://www.signal.co/resources/tag-management-101/) for more information.
> - Microsoft Advertising is not responsible for Signal's processes or documentation, nor for changes made to Signal's processes or documentation.

Tag managers replace static tags with dynamic tags that are easier to implement and update. The dynamic tag is a container, a small snippet of code that allows you to dynamically insert tags into your website. You can think of the container tag as a bucket that holds other types of tags.

## Implementing UET using Signal

1. Set up an account in Signal, if you haven't already.
1. In Signal, go to the **Tags** tab and click **Add a Tag**.
1. Type "smart custom" into the search bar.
1. From the **Client Tag Selection** screen, select the **Smart Custom Tag (Client-Side)** tag.
1. In the **Smart Custom Tag (Client-Side)** page, paste your Microsoft Advertising UET tag ID in the **Custom Markup** field. You can find the tag in Microsoft Advertising by selecting **Conversion Tracking** > **UET tags**. When you're done, click **Create Tag**.
1. You will be directed to your tag's **Assign Inputs to Smart Custom Tag (Client-Side)** page. For each page of your website you'd like assign the tag to, click its **Unassigned** button (which will flip it to **Assigned**).
1. Back on the **Smart Custom Tag (Client-Side)** page, click **Active** in the upper right corner of the screen to activate your tag.
1. In Signal's left pane, select **Data Dictionary** to add data elements as necessary to your inputs.

> [!NOTE]
> - To see an example of an Signal UET tag installed in the body of a webpage, visit our [Signal sample page](https://go.microsoft.com/fwlink/?linkid=2010829) (English only), right-click in the webpage, and then click **View source** or **View page source** depending on your browser.
> - As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.
> - We currently do not support reporting UET [custom events](hlp_BA_CONC_UETv2CustomEvent.md) or [revenue variables](hlp_BA_CONC_UETv2RevenueVariables.md) from Signal.
