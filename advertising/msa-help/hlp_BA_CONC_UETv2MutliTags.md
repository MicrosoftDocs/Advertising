---
title: Reasons for creating more than one UET tag
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: A good way to think about UET tags is - One tag per website. Learn when you would create multiple ones.
---

# Reasons for creating more than one UET tag

A best practice for UET tags is - One tag per website. So if all your ads point to the same website, you only need one UET tag. If you manage more than one website, you should consider creating multiple UET tags.

> [!IMPORTANT]
> The per account limit for UET tags is 1200. You can't create more UET tags without deleting existing tags once you've reached this limit.

In Microsoft Advertising, UET tags are stored at the manager account level, so if you have multiple ad accounts under the same manager account, the UET tag is shared across them all. We recommend that if each account has a different website that you create a separate UET tag because:

- **Incorrect status:** In Microsoft Advertising, we show the tracking status for each tag that tells you whether or not Microsoft Advertising is able to see the UET tag on your website. If the same tag is used for multiple websites, it is possible that only one of the websites has been properly installed with a UET tag but you would not be able to tell since Microsoft Advertising will mark the status of the UET tag as active.
- **Incorrect data:** Websites pages can have the same file name, for example thankyou.html. So when you define a conversion goal, there is a higher chance that a goal set with "destination URL contains thankyou" will match both websites and then lead to incorrect conversion counting.

If you have a separate UET tag for each website, you avoid these issues.

## Multiple UET tags for advanced conversion tracking

You can also use multiple UET tags to set up advanced conversion tracking on the same website. Some examples are listed below. Note that multiple tags should be created sparingly since multiple tags can become difficult to manage which is exactly the problem UET was designed to address with one tag for your website.

- If you want to track the number of times people viewed a specific webpage or a collection of webpages, you can create separate UET tags, add them to the webpages you want to track, and then define a **Pages viewed per visit** conversion goal for each UET tag.
- If you want to track how much time people spend on specific sections of your website, create separate UET tags, add them to the webpages you want to track, and then define a **Duration** conversion goal for each UET tag.
- If you have multiple webpages that you treat as conversion goals, you can put the UET tag on those webpages. Since you know the UET tag can only be fired from the conversion webpages, you can then define a destination URL conversion goal using this UET tag and configure it to always evaluate to true (use condition such as URL contains ".").
