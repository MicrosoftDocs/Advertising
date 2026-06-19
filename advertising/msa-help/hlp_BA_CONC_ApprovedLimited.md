---
title: What Does Approved Limited Status Mean?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: "*Approved Limited* status means that your ad or keyword is eligible for delivery in some, but not all, targeted locations."
---

# What does Approved Limited status mean?

*Approved Limited* is a [delivery status](hlp_BA_CONC_EditorialStatus.md) for ads, assets, asset groups, and keywords. For ads and keywords, *Approved Limited* is related to location targeting. It means two things:

- Your ad or keyword is approved and eligible to serve in at least one of its targeted locations, and
- Your ad or keyword is either pending or disapproved in at least one other targeted location.

For example, if keywords in your campaigns target US and Canada, an *Approved Limited* keyword might be approved for serving in the US, but require review in Canada.

Your ads and keywords are reviewed against the [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md) specific to each location. This means that sometimes your ad may go online immediately in one of your targeted locations, but require additional review (or be disapproved) in another of your targeted locations. This is what triggers the *Approved Limited* status.

## What can I do if I have ads or keywords with *Approved Limited* status?

If an ad or keyword is listed as *Approved Limited* in Microsoft Advertising (see [this article](hlp_BA_CONC_EditorialStatus.md) to learn how to find the status of ads and keywords), click on the ellipsis icon ![More information icon.](media/BA_ScreenCap_DeliveryDetails.png) next to (or hover over) the words *Approved Limited*.

If it was disapproved in at least one of your targeted locations, you will see:

- The reason it was disapproved.
- The location(s) in which the disapproval occurred.
- The part of the submission that triggered the disapproval.

> [!NOTE]
> Your ad or keyword is approved and eligible to serve in any targeted location not listed here.

You can edit the ad to make it compliant with that location's [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md). When you save the changes, it will be reviewed again. Individual keywords cannot be edited, but you can delete them and add new keywords. If you disagree with the decision, you can request an exception directly from the Microsoft Advertising UI. See [How do I challenge a disapproval?](hlp_BA_PROC_RequestException.md)

When you click the ellipsis icon ![More information icon.](media/BA_ScreenCap_DeliveryDetails.png) next to (or hover over) the *Approved Limited* status, you may see the message "No rejection data is available at this time. Please try again later." This means that your ad or keyword is pending additional review in at least one of your targeted locations. Most reviews are completed within 48 hours, and at that point, one of two things will happen:

- If the ad or keyword is approved for all locations, its status will change from *Approved Limited* to *Eligible*. This means it is being served in all targeted locations.
- If the ad or keyword is disapproved in at least one targeted location, you will see the reason and affected location(s) when you click the ellipsis icon ![More information icon.](media/BA_ScreenCap_DeliveryDetails.png) next to (or hover over) the words *Approved Limited* (see above).

## What can I do if asset groups in my Performance Max campaign have the *Approved Limited* status?

If your asset group has been marked with an *Approved Limited* status, this means it's eligbile to serve in some locations but is either pending review or disapproved in others. To see which asset groups have the *Approved Limited* status, follow these steps:

1. From the navigation menu on the left, select **Campaigns**.
1. Select the appropriate Performance Max campaign.
1. Select **Asset groups**.
1. Select **View asset details** for the appropriate asset group.
1. Check the **Policy status** column to see if you have the *Approved Limited* status.

## What can I do if my assets have the *Approved Limited* status?

Review the instructions on this page: [Fix a Disapproved or Approved Limited status](hlp_BA_CONC_EditorialDisapprovalReasons.md).

> [!NOTE]
> Most editorial reviews are completed within 48 hours. If your content still has the **Under Review** delivery status after two business days, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) for assistance.
