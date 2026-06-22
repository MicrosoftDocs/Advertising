---
title: Set up UET Tags Using Ensighten
description: Third-party tag managers allow you to manage your website tags in one place. Learn how to set up UET tags using Ensighten.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using Ensighten

> [!NOTE]
> - This article shows how to do a basic setup of UET tags with Ensighten. Ensighten offers several advanced features to customize when and how your tags are fired. Please refer to Ensighten's [support page](https://www.ensighten.com/support/) for more information.
> - Microsoft Advertising is not responsible for Ensighten's processes or documentation, nor for changes made to Ensighten's processes or documentation.

Tag managers replace static tags with dynamic tags that are easier to implement and update. The dynamic tag is a container, a small snippet of code that allows you to dynamically insert tags into your website. You can think of the container tag as a bucket that holds other types of tags.

## Implementing UET using Ensighten

1. Set up an account in Ensighten, if you haven't already.
1. In Ensighten, click **Add Tag**.
1. Search for "Microsoft Advertising UET". When you find it, hover over the Microsoft Advertising UET image and click on the **Configure** option that appears.
1. In the **Configure** step, for **Tag ID**, enter your Microsoft Advertising UET tag ID. You can find the tag in Microsoft Advertising by selecting **Conversion Tracking** > **UET tags**. When you're done, click **Next**.
1. In the **Choose Conditions** step, define the conditions that will determine when to fire the UET tag. We recommend returning the UET tag on all pages, but, if required, you can create advanced rules to return the UET tag only when certain conditions are met. When you're done, click **Next**.
1. In the **Review & Save** step, click **Save**.
1. On Ensighten's **Deployments** page, select the tag you just set up, click **Commit**, and then **Publish**.
1. In the **Publish Spaces** window that appears, select the development space you want to publish this tag in.
1. Go to the **Spaces** page, select the space you published your tag to, and then click **Publish Path(s)** to expand the Ensighten URL.
1. Copy the Ensighten URL and paste it, along with the Ensighten tag (below), in your webpage's head section. `<script type="text/javascript" src="YOURTAGHERE"> </script>`

> [!NOTE]
> - To see an example of an Ensighten UET tag installed in the body of a webpage, visit our [Ensighten sample page](https://go.microsoft.com/fwlink/?linkid=2010479) (English only), right-click in the webpage, and then click **View source** or **View page source** depending on your browser.
> - As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.
> - We currently do not support reporting UET [custom events](hlp_BA_CONC_UETv2CustomEvent.md) or [revenue variables](hlp_BA_CONC_UETv2RevenueVariables.md) from Ensighten.
