---
title: Set up UET Tags Using Adobe Dynamic Tag Management
description: Third-party tag managers allow you to manage your website tags in one place. Learn how to set up UET tags using Adobe Dynamic Tag Management.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using Adobe Dynamic Tag Management

> [!NOTE]
> - This article shows how to do a basic setup of UET tags with Adobe Dynamic Tag Management (DTM). Adobe DTM offers several advanced features to customize when and how your tags are fired. Please refer to the [Adobe Help Center](https://experienceleague.adobe.com/en/docs/experience-platform/destinations/catalog/advertising/bing-ads) for more information.
> - Microsoft Advertising is not responsible for Adobe's processes or documentation, nor for changes made to Adobe's processes or documentation.

Tag managers replace static tags with dynamic tags that are easier to implement and update. The dynamic tag is a container, a small snippet of code that allows you to dynamically insert tags into your website. You can think of the container tag as a bucket that holds other types of tags.

## Implementing UET using Adobe DTM

1. Set up an account in Adobe DTM, if you haven't already.
1. In Adobe DTM, navigate to your website's dashboard.
1. Click the **Embed** tab.
1. Click **Header Code**. Copy this code and paste it into your website's header.
1. Click **Footer Code**. Copy this code and paste it into your website's footer.
1. In Adobe DTM, click the **Rules** tab and then **Page Load Rule** (there are other rule types, such as event-based rules, but for the purposes of this example, we'll stick with **Page Load Rule**).
1. Give your rule a name and select a category for it.
1. Expand the **JavaScript / Third Party Tags** section.
1. Click **Add New Script** and then:

   1. For **Type**, select **Non-Sequential JavaScript**.
   1. In the script section, paste your Microsoft Advertising UET code. You can find the tag in Microsoft Advertising by selecting **Conversion Tracking** > **UET tags**.
   1. When you're done, click **Save Code**.
1. Click the **Approvals** tab and approve these changes.
1. From your website's Adobe DTM dashboard, click **Publish Queue** and follow the steps to publish the changes.

> [!NOTE]
> - To see an example of an Adobe DTM UET tag installed in the body of a webpage, visit our [Adobe DTM sample page](https://go.microsoft.com/fwlink/?linkid=2010473) (English only), right-click in the webpage, and then click **View source** or **View page source** depending on your browser.
> - As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.
