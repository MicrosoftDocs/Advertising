---
title: Using the JavaScript UET tag tracking code
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: After you create a UET tag, the next step is to add the UET tag tracking code to your website.
---

# Using the JavaScript UET tag tracking code

Before you can track conversions or target audiences using a remarketing list, you need to create a UET tag in Microsoft Advertising and then add the UET tag tracking code to every page of your website. We strongly recommend that you use JavaScript to ensure accurate conversion tracking.

## What are the advantages of using JavaScript?

- The tag updates automatically when we receive any changes to the UET tag tracking code.
- JavaScript allows Microsoft Advertising to collect richer activity data to ensure accurate conversion tracking as well as improve remarketing in paid search.

## What does the JavaScript tag look like?

A JavaScript tracking code allows Microsoft Advertising to collect richer activity data that improves conversion tracking and remarketing in paid search. The only time you shouldn't use this is if your website has rules that prohibit JavaScript from being installed on it.

Here is an example of the JavaScript UET tag tracking code:

```
<script>
(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[] ,f=function(){var o={ti:"TAG_ID_HERE", enableAutoSpaTracking: true}; o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")} ,n=d.createElement(t),n.src=r,n.async=1,n.onload=n .onreadystatechange=function() {var s=this.readyState;s &&s!=="loaded"&& s!=="complete"||(f(),n.onload=n. onreadystatechange=null)},i= d.getElementsByTagName(t)[0],i. parentNode.insertBefore(n,i)})(window,document,"script"," //bat.bing.com/bat.js","uetq");
</script>
```


> [!NOTE]
> Don't know what UET is? See [What is UET and how can it help me?](hlp_BA_CONC_UETv2WhatIsTag.md)
