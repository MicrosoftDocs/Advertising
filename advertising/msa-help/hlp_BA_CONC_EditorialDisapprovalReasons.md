---
title: Fix a Disapproved or Approved Limited status
ms.service: msa-help
ms.subservice: msa-ads-extensions
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to find out why your ad or keyword is *Disapproved* or *Approved Limited*, verify that you're following Microsoft Advertising policies, and fix the issue.
---

# Fix a disapproved or approved limited status

As part of the [editorial review](hlp_BA_CONC_EditProcess.md) process, the components of your ad are reviewed to ensure that they meet [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md). Ad components that don't pass the review process receive either or status.

Here's what you can do about it:

## Determine the specific reason for the *Disapproved* or *Approved Limited* status

1. From the navigation menu on the left, hover over **Campaigns** and select **Campaigns**.
1. Choose **Keywords** or **Ads & extensions**, depending on the component you'd like to review.
1. Under the **Delivery** column in the table, hover over the status to view the details.
1. To view your assets:
    1. For Multimedia, Native, and Responsive Search ads
        - From the navigation menu on the left, hover over Campaigns and select Ads & extensions > Ads.
        - In the Assets column, select View asset details for the appropriate ad.
        - Review the Policy status column.
    1. For Performance Max campaigns
        - From the navigation menu on the left, hover over Campaigns and select Campaigns.
        - Select the appropriate Performance Max campaign.
        - Hover over Campaigns and select Asset groups.
        - In the Assets column, select View asset details for the appropriate asset group.
        - Review the Policy status column.

- **Filter your account to show only disapproved assets in ads**

  Quickly identify your disapproved assets in ads by using a filter:

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. Below the appropriate ad, select **View asset details**.
  1. Select **Add Filter** > **Policy Status**.
  1. Select the checkbox next to **Disapproved**.
  1. Select **Apply**.

- **About our mode of detection and rejection**

  Our mode of detection specifies how the ad was evaluated before being marked as *Disapproved* or *Approved Limited*. The values are:

  - **System:** The ad was flagged by our system's evaluation.
  - **User:** The ad was flagged by one or more potential customers who saw the ad.
  - **Legal order:** The ad was specifically requested to be taken down by a regulatory body through a legal order.

  Once detected, the ad undergoes further review. The ad's rejection could be due to one of the following reasons:

  - **System:** The ad was disapproved by our system's evaluation.
  - **Manual:** The ad was disapproved by our reviewers.

  > [!NOTE]
  > Did you receive an email saying that you had a *Disapproved* or *Approved Limited* ad or keyword, but you took the above steps and don't see any ad or keyword listed as such? Here's what may have happened:
  >
  > - Your ad or keyword may have been pending review in one or more of your targeted locations (*Approved Limited* status), and by the time you followed these steps, it was approved. For more information on *Approved Limited*, see [What does Approved Limited status mean?](hlp_BA_CONC_ApprovedLimited.md)
  > - The Microsoft Advertising team regularly performs spot checks on its editorial rejections, and occasionally overturns rejections. Your ad or keyword may have been *Disapproved* at first, but then was approved after being spot checked.

## Consult Microsoft Advertising policies

Review the [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md) related to the **Disapproved reasons** for your ad components (see above). Note that the policies may vary depending on the country/region in which the ad is displayed.

## Fix the issue

- **Disapproved ads**

  From the **Ads** table, hover over the ad in the **Ad** column and select the pencil icon. Make any necessary edits and select **Save**. We will perform a new editorial review on the updated ad. <br> <br>

  > [!NOTE]
  > If you are seeing the **Assets disapproved** policy violation when your ads are disapproved, you can either fix the assets so that they [adhere to policy guidelines](hlp_BA_CONC_Policy_Introduction.md), or if you believe that assets shouldn't have been disapproved, you can request an exception for the disapproved assets.

- **Disapproved assets**

  You can view and edit assets that were disapproved and review their Asset ID three ways: At the ad level, at the ad group or asset group level, and at the campaign level. You can fix the disapproved assets so that they [adhere to policy guidelines](hlp_BA_CONC_Policy_Introduction.md). If you believe that the assets shouldn't have been disapproved, you can request an exception for all assets in an ad or individual assets.

  > [!NOTE]
  > You can edit assets directly in your ad or asset group. You can also add a new asset and then delete the disapproved asset. If you add and save a new asset, it'll be submitted for editorial review.

  **View and edit disapproved assets**

  - *Ad level*

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. Below the appropriate ad, select **View asset details**.
  1. Review the **Policy status** column for your assets and edit them accordingly.

  - *Ad group level*

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ad groups**.
  1. Select the appropriate ad group.
  1. Select the **Assets** page.
  1. Review the **Policy status** column for your assets and edit them accordingly.

  - *Asset group level*

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the appropriate campaign.
  1. Hover over **Campaigns** and select **Asset groups**.
  1. Review the **Policy status** column for your assets and edit them accordingly.

  - *Campaign level*

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the appropriate campaign.
  1. Select the **Assets** page.
  1. Review the **Policy status** column for your assets and edit them accordingly.

  **Request an exception for disapproved assets**

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the appropriate campaign.
  1. Select the **Assets** page.
  1. There are two ways to request an exception:

     1. Hover over the **Policy status** column for your asset and select **Request an exception for this asset**.
     1. In the table, select the checkbox next to your asset. Then:

        - Select **Edit**.
        - Select **Request exception**.
        - Choose either **Selected asset(s)** or **All assets in this ad**. (The option for **All assets in this ad** is not available for Performance Max campaigns.)
  1. In the **Tell us your reason for requesting an exception** box, enter your reasons why the asset(s) should be approved.
  1. Select **Request an exception**.

  **View and edit disapproved assets in your asset grid** **Add the "Policy status" column to see when an asset is:**

  - Disapproved
  - Approved (limited)

  These statuses appear when an asset doesn't pass editorial review.

  **Supported scope** This feature is currently supported at:

  - Ad group level
  - Ad level

  Campaign and account level support will be available in a future release.

  Performance Max (PMAX) is not included in this version.

  **Edit a disapproved asset**

  1. Go to the Asset grid at the ad group or ad level.
  1. Select the disapproved asset.
  1. On the ribbon, select **Edit**.
  1. In the side panel, edit the disapproved asset text.
  1. In the side panel, provide updated content to replace the disapproved asset.
  1. Apply the change to:

     - All associations, or
     - A single association
  1. Review your updates on the **Bulk edit** page under **Tools**.

- **Disapproved asset groups**

  To appeal disapproved asset groups, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) for assistance.

- **Disapproved keywords**

  You cannot edit a keyword. However, you can add a new keyword and then delete the disapproved keyword. If you add a new keyword, it will be submitted for editorial review when you select **Save**.

- **Disapproved ad extensions**

  From the **Ad Extensions** table, select the checkbox next to the ad extension, and then select **Edit** > **Edit an extension**. Make any necessary edits and select **Save**. We will perform a new editorial review on the updated content.

- **Disapproved disclaimers**

  In your campaign settings, below **Disclaimer**, select **Edit** for the appropriate disclaimer. Make any necessary edits to the disclaimer and select **Save**. We will perform a new editorial review on the updated content.

- **Disapproved feed items**

  Fix the issue in your feed and re-upload it, as described in [Business data feeds](hlp_BA_PROC_Feeds_WorkingWith.md).

## Request an exception

If, after reviewing the [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md), you believe you were disapproved in error, you can request an exception. With the request, you tell us the reason you want an exception and we will review the ad component again.

- **Ads and keywords**

  1. In the **Ads** or **Keywords** table, select the checkbox next to the affected ad or keyword.
  1. Select **Edit** > **Request exception**.
  1. In the **Tell us your reason for requesting an exception** box, enter your reasons why the ad or keyword should be approved.
  1. Select **Request an exception**.

- **Ad extensions and ad customizers**

  - For ad customizers, please [contact support](https://go.microsoft.com/fwlink/?linkid=398371) to request an exception.
  - For ad extensions, follow these steps to request an exception:

    1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Extensions**.
    1. In the **Delivery** column, hover over the **Disapproved extension** status for the appropriate extension.
    1. Select **Request an exception for this extension**.
    1. Below **Tell us your reason for requesting an exception**, let us know why you believe the extension meets the [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md) and shouldn't have been disapproved, or why the policy in question doesn't apply.
    1. Select **Request an exception**.

- **Assets**

  **To appeal all disapproved assets in an ad:**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. Below the appropriate ad, select **View asset details**.
  1. Hover over the **Policy status** column for the disapproved asset.
  1. Select **Request an exception for all assets in this ad**.

  **To appeal all disapproved assets in an ad group:**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ad groups**.
  1. Hover over the **Policy status** column for the appropriate ad group.
  1. Select **Request an exception for all assets in this ad group**.

  **To appeal individual assets that were disapproved:**

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the appropriate campaign.
  1. Select the **Assets** page.
  1. There are two ways to request an exception:

     1. Hover over the **Policy status** column for your asset and select **Request an exception for this asset**.
     1. In the table, select the checkbox next to your asset. Then:

        - Select **Edit**.
        - Select **Request exception**.
        - Choose **Selected asset(s)**.
  1. In the **Tell us your reason for requesting an exception** box, enter your reasons why the asset(s) should be approved.
  1. Select **Request an exception**.

- **Disclaimers**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. In the **Delivery** column, hover over the **Disapproved disclaimer** status.
  1. Select **Request an exception for disclaimer**.
  1. Below **Tell us your reason for requesting an exception**, let us know why you believe the disclaimer meets the [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md) and shouldn't have been disapproved, or why the policy in question doesn't apply.
  1. Select **Request an exception**.

## Request an exception for disapproved ads across your entire account

1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions**.
1. Use the filter to show disapprovals (i.e., the *not eligible* delivery status) by selecting **Add filter** > **Attributes** > **Delivery**.
1. Select all > **Edit** > **Request exception**.

> [!NOTE]
> You can request an exception for up to 5,000 ads.

For more information, see [How do I challenge a disapproval?](hlp_BA_PROC_RequestException.md)

## My ad was disapproved, but I see other ads with the same issues. Why?

We have many checks in place to identify and remove content that violates Microsoft Advertising policies. If there is content on our network that is in violation of our policies, it's simply a matter of time before it is found and removed.

If you find content on our network that you believe is in violation of Microsoft Advertising policies, please report it to us through our [Report Low Quality Ad form](https://go.microsoft.com/fwlink/?linkid=2239975). We will review the ad and take action if it violates our policies.

> [!NOTE]
> Most editorial reviews are completed within 48 hours. If your content still has the **Under Review** delivery status after two business days, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) for assistance.

## What does the "Disapproved, exception denied" status mean?

When your ads or keywords have the **Disapproved, exception denied** status, it means Microsoft Advertising reviewed your exception request and determined the ad or keyword still does not comply with our policies. You can make changes to the ad or keyword in question and it'll be automatically reviewed. A new delivery status will show if it follows policy guidelines.

In the event that that you have made changes to the ad or keyword but the status hasn't changed, you can [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) for further review.
