---
title: Overriding UET tag tracking code
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: You can make changes to the UET tag tracking code to report custom events, variable revenue and rename the event tracker.
---

# Overriding UET tag tracking code

You can customize your UET tag to do the following:

- [Report custom events](hlp_BA_CONC_UETv2CustomEvent.md),
- [Report variable revenue](hlp_BA_CONC_UETv2RevenueVariables.md),
- **Rename the event tracker**:<br> By default, the global event tracker object created by Universal Event Tracking script is named uetq. If you want, you can rename the global event tracker to a desired value by replacing the default event tracker name parameter value in the original tracking code.

  In the example code below, the default name of *uetq* has been changed to *myTracker*. If you change the name of the global event tracking object, then all references to the global tracking object, for example wherever the push() API is used to report custom events and dynamic revenue, must be renamed to the new name for the global event tracker.

  `<script><br> (function(w,d,t,r,u){var f,n,i;w[u]=w[u]|| [],f=function(){var o={ti:"tagId"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)}) <br> (window,document,"script","//bat.bing.com/bat.js","myTracker");<br> </script>`

> [!NOTE]
> A JavaScript UET tag is required to ensure you have access to the full functionalities of conversion tracking and remarketing. If you are using a non-JavaScript tag, please switch over to a JavaScript tag.
