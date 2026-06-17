---
title: Is my UET tag working?
description: You can troubleshoot the UET tag by using the tracking status in Microsoft Advertising or the UET Tag Helper browser extension.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Is my UET tag working?

If your UET tag has been on your webpage for more than 24 hours, you can review the UET tracking status in Microsoft Advertising to see if the tag is active or inactive and then you can use the UET Tag Helper to check to see if your UET tag is working or not.

Once you know that you have an issue with your UET tag, you can use UET Tag Helper to find out what the issue is and how to fix it. To learn more, see [Test conversion goals and audiences with UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md).


- **Review UET tracking status column in Microsoft Advertising**

  1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
  1. In the table, review the columns
      - Tag name: The name of the UET tag. When you create a conversion goal or remarketing list, you select the name of the UET tag that you want to use.
      - Tag description: The optional description for the UET tag. It helps you identify the UET tag. We recommend adding the website page name or URL.
      - Tag ID: The ID Microsoft Advertising associates with the UET tag.	The Conversion goals page lists the UET tag ID associated with the goal and you can view the UET tag tracking code.
      - Tracking status: This is the status of the UET tag. It can be unverified, tag active, or tag inactive. Lets you know if your UET tag is working or not.
          - Unverified: Microsoft Advertising hasn’t received any user activity data from the UET tag on your website. It can take up to 24 hours for Microsoft Advertising to verify. If you still see this status, you either have not added the UET tag tracking code to your website or there is an issue with the setup that you need to fix.
          - Tag active: Your UET tag is working and sending user activity data to Microsoft Advertising.
          - Tag inactive: Microsoft Advertising has not received any user activity data from the UET tag in the last 24 hours. Make sure that the UET tag tracking code is still on your website.
      - Goals: This is the number of conversion goals that use this UET tag. It is a link that takes you to the Conversion goals page with only the goals associated with this tag displayed.
      - Audiences: This is the number of audiences that use this UET tag.	It is a link that takes you to the Audience page with only the audiences associated with this tag displayed.
      - Action: A link that opens the UET tag tracking code box.	It allows you to email, copy, or download the UET tag tracking code at any time.


- What to do if the UET tag is inactive
If the Tracking status column lists Tag inactive, then Microsoft Advertising has not received any user activity data from the UET tag in the last 24 hours. Make sure that the UET tag tracking code is still on your website. To add the UET tag tracking code, see [How do I add a UET tag to my website?](https://help.ads.microsoft.com/#apex/ads/en/56688/2)
