---
title: Set up UET Tags Using Qubit Opentag
description: Third-party tag managers allow you to manage your website tags in one place. Learn how to set up UET tags using Qubit Opentag.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Set up UET tags using Qubit Opentag

> [!NOTE]
>
> - This article shows how to do a basic setup of UET tags with Qubit Opentag. Opentag offers several advanced features to customize when and how your tags are fired.
> - Microsoft Advertising is not responsible for Qubit's processes or documentation, nor for changes made to Qubit's processes or documentation.

Tag managers replace static tags with dynamic tags that are easier to implement and update. The dynamic tag is a container, a small snippet of code that allows you to dynamically insert tags into your website. You can think of the container tag as a bucket that holds other types of tags.

## Implementing UET using Qubit Opentag

1. Set up an account in Qubit Opentag, if you haven't already.
1. For the Opentag container you want to add your Microsoft Advertising UET tag to, click the **Add New Script** button.
1. For **Script Type**, select **Custom Script**.
1. For **Script Source**, select **HTML**.
1. In the **Inline HTML** section, paste your Microsoft Advertising UET code. You can find the tag in Microsoft Advertising by selecting **Conversion Tracking** > **UET tags**.
1. For **Script Location**, select where in your website's code you intend to place your UET code.
1. Ignore the **Cookie Consent** section, as this is not required.
1. Changes to the **Advanced Features** section are not required for a UET tag unless you want further customization.
1. When you're done, click **Save Script**. You can ignore the warning that appears.
1. Click the **Commit** button for the corresponding container.
1. In the **Committing to CDN** window that appears, type "COMMIT" to confirm.
1. Copy the script in the **Uploading to CDN...** window that appears.
1. Paste the script into the code of each page of your website in the page location you selected in step 6.

> [!NOTE]
>
> - To see an example of a Qubit Opentag UET tag installed in the body of a webpage, visit our [Qubit Opentag sample page](https://go.microsoft.com/fwlink/?linkid=2010471) (English only), right-click in the webpage, and then click **View source** or **View page source** depending on your browser.
> - As your webpage loads, it triggers the UET tag, resulting in a number of HTTP requests. The most important request is to "bat.bing" (the one that looks like "http://bat.bing.com/action/0?ti=..."). This request tells Microsoft Advertising about the user visits to your webpage. You can use third-party tools such as Fiddler to monitor all the requests that your browser is making when your webpage loads.
> - We currently do not support reporting UET [custom events](hlp_BA_CONC_UETv2CustomEvent.md) or [revenue variables](hlp_BA_CONC_UETv2RevenueVariables.md) from Qubit Opentag.
