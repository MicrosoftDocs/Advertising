---
title: Why Track Custom Events
description: Find out the benefit of tracking a custom event conversion goal.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Why track custom events

Custom events are a type of [conversion goal](hlp_BA_CONC_UETv2CTGoalType.md), which are customer actions on your website that you want to track. Custom events require a UET tag — for more information on UET, check out [What is UET and how can it help me?](hlp_BA_CONC_UETv2WhatIsTag.md)

- **Why custom events exist**:
When you add the UET tag tracking code to your website, it makes a call to Microsoft Advertising every time a user visits that page. You can then define conversion goals to record visits to particular webpages (thankyou.html for example) as conversions. However, you might have webpages that drive more than one type of conversion. For example, you may allow people to both subscribe to a newsletter and download a white paper on the same webpage. In such case, it is insufficient to just know that someone visited that webpage if the goal is to track the subscriptions and white paper downloads as separate conversions. That is where custom events come in. Another example would be that you have "click out" from your site to other seller's pages or websites that you refer traffic to. Since you don't have permissions to implement tags on those sites, you can track how many times you send a customer to another site via custom events.

- **How custom events work**:
The JavaScript version of the UET tag tracking code allows you to report custom actions that people take on your webpages. Then you create a conversion goal and select the event goal type to count custom events as conversions. As with other goal types, Microsoft Advertising matches the definition of the custom event type goal with the custom events reported by UET to count conversions.

- **Some examples of using custom events**
  - Track when people click the button to subscribe to a newsletter.
  - Track when product pages are loaded on a website that uses iFrames so the destination URLs are all the same.
  - Track when any product videos are played for more than 30 seconds.

- **Get started**: [How to track custom events with UET](hlp_BA_CONC_UETv2CustomEvent.md)
