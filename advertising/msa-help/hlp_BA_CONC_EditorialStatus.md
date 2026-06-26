---
title: Delivery status
ms.service: msa-help
ms.subservice: msa-ads-extensions
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about delivery statuses and how they affect your campaigns, ad groups, ads, keywords, ad extensions, ad customizers, or audience associations.
---

# Delivery status

Delivery status tells you if your campaign, ad group, ad, keyword, ad extension, ad customizer, audience association, dynamic ad target, or asset is operating correctly. The status *Eligible* indicates that your ad or ads are available to be displayed, unless there is [an error with your account](hlp_BA_CONC_AccountErrors.md).

To determine the delivery status of your campaign, ad group, ad, keyword, ad extension, audience association, or dynamic ad target:

1. From the navigation menu on the left, hover over **Campaigns**, and then select either **Campaigns**, **Ad groups**, **Ads & extensions**, **Keywords**, **Audiences**, or **Dynamic ad targets**.
1. Check the statuses of individual items in the **Delivery** column.
1. To make it easier to find non-*Eligible* statuses, you can sort the **Delivery** column by selecting the **Delivery** column header.

To determine the delivery status of your assets:

1. For Native and Responsive Search ads, go to **Campaigns** > **Ads & extensions** > **Ads** and select **View asset details**. Then, review the **Policy status** column.
1. For Performance Max campaigns, go to **Campaigns** > **Asset groups** and select **View asset details**. Then, review the **Policy status** column.

> [!NOTE]
> You can hover over an item's delivery status to get an explanation of the status and how to fix it.

## Possible delivery statuses

- **Address is invalid**
  - **What this means:** The address for your location extension is invalid.
  - **How to fix it:** Please correct the address for your location extension to match the valid location address in Bing Maps.

- **Ad group expired**
  - **What this means:** No ads are running for this ad group, ad, keyword, or dynamic ad target because the ad group's end date has passed.
  - **How to fix it:** To start running ads again, adjust the end date in the ad group table.

- **Ad group paused**
  - **What this means:** No ads are running for this ad group, ad, keyword, or dynamic ad target because the ad group is set to **Pause**.
  - **How to fix it:** To start running ads again, go to the **Ad groups** table, select the checkbox next to the appropriate ad group, and select **Edit** > **Enable**.

- **Ad group targeting check pending**
  - **What this means:** No ads are running for this ad group or ad because the ad group's targeting scope is under review.
  - **How to fix it:** We review an ad group's audience targeting scope every time you create or modify an ad group's audience. If the scope is wide enough, this status will change to *Eligible* (barring other issues). If the scope is *not* wide enough, this status will change to *Ad targeting too narrow*. Most reviews of targeting modifications are completed in less than an hour, but reviews of newly-created audience lists may take longer than a day.

- **Ad group targeting too narrow**
  - **What this means:** No ads are running for this ad group or ad because the ad group's targeting scope is not wide enough.
  - **How to fix it:** Adjust the targeting criteria for this ad group to make it less restrictive. After you modify the targeting, we will review it again.

- **Ad paused**
  - **What this means:** This ad isn't running because the ad is set to **Pause**.
  - **How to fix it:** To start running this ad again, go to the **Ads** table, select the checkbox next to the appropriate ad, and select **Edit** > **Enable**.

- **Ad target paused**
  - **What this means:** You've paused the dynamic ad target.
  - **How to fix it:** To enable the dynamic ad target, select the checkbox next to it. Then, select **Edit** > **Enable**.

- **App not found**
  - **What this means:** Your app cannot be found.
  - **How to fix it:** Try doing a manual search by entering your app ID or package name. Note that, if your app is brand-new, it can take up to 96 hours to sync.

- **App URL incorrect**
  - **What this means:** The link to your app is incorrect.
  - **How to fix it:** Check the link and make any necessary updates.

- **Approved limited**
  - **What this means:** The ad or keyword has been approved in at least one of your targeted locations, but has also been disapproved in at least one other targeted location.
  - **How to fix it:** For more information, see [What does Approved Limited status mean?](hlp_BA_CONC_ApprovedLimited.md)

- **Approved limited, exception denied**
  - **What this means:** After reviewing your exception request, the ad or keyword has been approved in one or more locations but has also been disapproved in one or more locations.
  - **How to fix it:** Make sure your ad or keyword adheres to [Microsoft Advertising's policies](hlp_BA_CONC_EditorialGuidelines.md) and update them accordingly. After you update your ad or keyword, we'll review them again. See [Fix a Disapproved or Approved Limited status](hlp_BA_CONC_EditorialDisapprovalReasons.md) for more information.

- **Association deleted (ad extension)**
  - **What this means:** This ad extension is not running because it is not associated with any campaigns.
  - **How to fix it:** Create one or more associations.

- **Association excluded (audience)**
  - **What this means:** The association for this audience has been excluded.
  - **How to fix it:** No action is required. Change the association status to **Enabled** if you want to start targeting this audience.

- **Association paused (audience)**
  - **What this means:** The association for this audience is set to **Pause**.
  - **How to fix it:** To start running the audience association again, change the association status to either **Enabled** or **Excluded**.

- **Below first page bid** This delivery status can be for either dynamic ad targets or keywords:
    - *Keyword*
        - **What this means:** Your bid on this keyword is too low for ads associated with it to appear on the first page of search results. If you see this status even though your ads *are* appearing on the first page, it means that your keywords competed in only a small number of auctions in the marketplace. Increasing your bid to our estimated first page bid can help your ads gain more visibility on the Microsoft Advertising Network.
      - **How to fix it:** In the **Keywords** table, select the checkbox next to the keyword, and then select **Edit** > **Change current bid**. Select either **Increase to estimated top of page bid** or **Increase to estimated first page bid**.
    - *Dynamic ad targets*
        - **What this means:** Your bid on this dynamic ad target is too low for ads associated with it to appear on the first page of search results.
        - **How to fix it:** To increase the bid, select the checkbox next to the dynamic ad target. Then, select **Edit** > **Change bids**.

- **Bid strategy is learning**
  - **What this means:** You have recently turned on or switched to a new automated bid strategy. It takes some time for our algorithms to gather enough performance data to learn how to bid most effectively.
  - **How to fix it:** This issue will resolve itself when we gather enough performance data.

- **Campaign out of budget**
  - **What this means:** No ads are running for this campaign, ad group, ad, keyword, or dynamic ad target because your campaign budget has been used up.
  - **How to fix it:** Select the **Out of budget** status in the **Delivery** column to review our recommended budget increase. If there is no recommendation, you can increase your budget manually: Go to the **Campaigns** table, and in the **Budget** column for the campaign, increase the budget amount, and then select **Save**.

- **Campaign paused**
  - **What this means:** No ads are running for this campaign, ad group, ad, keyword, or dynamic ad target because the campaign is set to **Pause**.
  - **How to fix it:** To start running ads again, go to the **Campaigns** table, select the checkbox next to the appropriate campaign, and select **Edit** > **Enable**.

- **Campaign suspended**
  - **What this means:** Your account has been suspended because of suspicious activity.
  - **How to fix it:** Please [contact support](https://go.microsoft.com/fwlink/?linkid=398371).

- **Deleted store**
  - **What this means:** The store associated with this campaign has been deleted.
  - **How to fix it:** Create a new campaign with an active store.

- **Disapproved**
  - **What this means:** We reviewed your ad or keyword and determined that it doesn't adhere to the [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md).
  - **How to fix it:** For information about disapprovals, and how to fix them or request exceptions, see [Fix a Disapproved or Approved Limited status](hlp_BA_CONC_EditorialDisapprovalReasons.md)

- **Disapproved, exception denied**
  - **What this means:** We reviewed your exception request for the disapproved ad or keyword and determined that it doesn't adhere to [Microsoft Advertising's policies](hlp_BA_CONC_EditorialGuidelines.md).
  - **How to fix it:** Make sure your ad or keyword adheres to [Microsoft Advertising's policies](hlp_BA_CONC_EditorialGuidelines.md) and update them accordingly. After you update your ad or keyword, we'll review them again. See [Fix a Disapproved or Approved Limited status](hlp_BA_CONC_EditorialDisapprovalReasons.md) for more information.

- **Draft ad group**
  - **What this means:** No ads are running for this ad group, ad, keyword, or dynamic ad target because the associated ad group is still in draft form.
  - **How to fix it:** To start running ads, go to the **Ad groups** table, select the checkbox next to the appropriate ad group, and select **Edit** > **Enable**.

- **Draft store**
  - **What this means:** The store associated with this campaign is in draft status.
  - **How to fix it:** Go to Merchant Center and complete the store's setup to start advertising your products.

- **Eligible (Ads or Keywords tab)**
  - **What this means:** Your ad or keyword passed the [editorial review](hlp_BA_CONC_EditProcess.md).
  - **How to fix it:** As long as your active ad content has at least one active keyword associated with it (and there are no [errors with your account](hlp_BA_CONC_AccountErrors.md)), your ad is available for people to see.

- **Eligible (Campaigns or Ad groups tab)**
  - **What this means:** Your campaign or ad group is functional.
  - **How to fix it:** There are no campaign-level or ad-group-level issues.

- **Eligible, limited by budget**
  - **What this means:** Your average daily budget is lower than the amount we recommend, so your ads aren't regularly showing as often as they could. This status means that your campaign ran out of budget at least once in the past seven days or that we've determined that your campaign will run out of budget in the coming weeks. A campaign that's limited by budget can still be successful and meet your business goals, but there might be opportunities to gain more exposure if you're able to increase your budget.
  - **Why it appears:** When your budget is below the recommended amount, it's possible that your budget can't accommodate all of the traffic available for your keywords and other campaign targeting settings. To make sure that your budget lasts throughout each day, Microsoft Advertising will reduce how often your ads appear.
  - **How to fix it:** Hover over the **Eligible, limited by budget** status in the **Delivery** column to review how your performance could be affected if you use a different budget.

- **Essential assets disapproved**
  - **What this means:** Essential assets in this ad were disapproved, which means your ad may have limited reach or be blocked from serving.
  - **How to fix it:** To see which assets were disapproved, review the **Policy status** column in the assets grid (**Campaigns** > **Assets**). [Contact Support](https://go.microsoft.com/fwlink/?linkid=398371) to request an exception for individual disapproved assets.

    > [!NOTE]
    > You can edit assets directly in your ad or asset group. You can also add a new asset and then delete the disapproved asset. If you add and save a new asset, it'll be submitted for editorial review.

- **Exception under review**
  - **What this means:** This ad or keyword is not running because it is still pending [editorial review](hlp_BA_CONC_EditProcess.md) after your [disapproval exception request](hlp_BA_PROC_RequestException.md).
  - **How to fix it:** The Microsoft Advertising team responds to requests as quickly as possible—most reviews are completed within a day. After we've reviewed your request, we'll change the status of the ad or keyword and send you an email summarizing any approvals or disapprovals.

- **Extension and association deleted**
  - **What this means:** This ad extension and all its associations are not running because the ad extension has been deleted.
  - **How to fix it:** You cannot undo a deletion, but you could recreate the ad extension and associations.

- **Hold**
  - **What this means:** We tried to charge your primary payment method five times (and, if you have one set, your backup payment method three times), but the charges were not authorized. All of your accounts have been paused, and none of your ads are displaying.
  - **How to fix it:** To fix this, see [Why is my account on hold?](hlp_BA_PROC_AlertAcctHold.md)

- **In review (store)**
  - **What this means:** The store associated with this campaign is under editorial review.
  - **How to fix it:** The Microsoft Advertising team performs editorial reviews as quickly as possible—typically within a day. After we've completed the review, we'll change the status of the store.

- **Keyword paused**
  - **What this means:** No ads are running for this keyword because the keyword is set to **Pause**.
  - **How to fix it:** To start running ads for this keyword again, go to the **Keywords** table, select the checkbox next to the appropriate keyword, and select **Edit** > **Enable**.

- **Limited by auto-bidding target**
  - **What this means:** This status means that your campaign could gain additional opportunities by adjusting the target for Target ROAS and Target CPA bid strategies. This will adjust your acceptable target range so that we can find new opportunities that align with your performance goals. For more information and a list of frequently asked questions about this status, see [Let Microsoft Advertising manage your bids with bid strategies](hlp_BA_CONC_BidStrategy.md).
  - **How to fix it:** For Target ROAS, this status means that we recommend you lower the target. For Target CPA, this status means that we recommend you increase the target.

- **Limited (eligible): Sensitive content**
  - **What this means:** Your Audience ad may contain sensitive content, which limits where it can serve. Please note that this doesn't impact your Search ad delivery, unless labeled as **Disapproved**.
  - **How to fix it:** Review the sensitive content category (i.e., the reason your ad is limited) in the ad grid by hovering over the **Delivery** column status. Then, you can update your ad accordingly to remove the sensitive content. After you save the update, the ad will undergo an editorial review. There are two ways to review your ad's sensitive content category: By going directly to the ad grid or by reviewing your campaign's **Diagnostics** tile, which will filter the ad grid to show only the ads in your campaign that have sensitive content.
      - **Campaign diagnostics tile**
        1. From your Audience campaign, select the **Campaign overview** page.
        1. Locate the **Diagnostics** tile.
        1. Review the health status and messages.
        1. Select **Manage ads** in the message associated with limited ad delivery due to sensitive content.
        1. Hover over the **Delivery** column status and review the sensitive content category for your ad(s).
        1. Select the pencil ![pencil icon](media/BA_icon_edit.png) next to your ad(s).
        1. Edit your ad(s) accordingly.
        1. Select **Save**.

    > [!NOTE]
    > After you save the update, your ads will undergo an editorial review.

- **Limited (eligible): Size issue**
  - **What this means:** Your [Display ad](hlp_BA_CONC_DisplayAds.md) doesn't meet the size requirements to deliver in all available Audience placements, which limits its reach. This may include your [targeted placements](hlp_BA_CONC_AboutAdDistributionHidden.md), if you have any.
  - **How to fix it:** You'll need to update your ad's size so that your ad delivery isn't limited. You can update it according to the specifications below per placement.
  - **Update your Display ad size**
    1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
    1. Select the pencil ![pencil icon](media/BA_icon_edit.png) next to your ad.
    1. Below **Size**, update your ad to one of the appropriate sizes listed below.
    1. Select **Save**.

    | Placements | Size (pixels) |
    | --- | --- |
    | **Microsoft Edge browsers<br>(included in [targeted placements](hlp_BA_CONC_AboutAdDistributionHidden.md))** | - 300 x 250 (Medium rectangle)<br>- 728 x 90 (Leaderboard)<br>- 970 x 250 (Billboard) |
    | **Outlook<br>(included in the **Productivity**<br>[targeted placement](hlp_BA_CONC_AboutAdDistributionHidden.md))** | - 160 x 600 (Wide skyscraper)<br>- 300 x 600 (Half page)<br>- 300 x 250 (Medium rectangle)<br>- 728 x 90 (Leaderboard) |
    | **Microsoft Casual Games and MSN Games<br>(included in the **Gaming**<br>[targeted placement](hlp_BA_CONC_AboutAdDistributionHidden.md))** | - 300 x 250 (Medium rectangle)<br>- 300 x 600 (Half page)<br>- 728 x 90 (Leaderboard)<br>- 300 x 250 (Medium rectangle) |
    | **MSN (included in [targeted placements](hlp_BA_CONC_AboutAdDistributionHidden.md))** | - 300 x 250 (Medium rectangle)<br>- 300 x 600 (Half page)<br>- 728 x 90 (Leaderboard)<br>- 970 x 250 (Billboard) |

    > [!NOTE]
    > Not everyone has [targeted placements](hlp_BA_CONC_AboutAdDistributionHidden.md) for Audience campaigns yet. If you don't, don't worry— it's coming soon!

- **Limited: Not enough conversion data**
  - **What this means:** Your campaign has a low volume of conversions, which can limit the bid strategy from maximizing performance.
  - **How to fix it:** Verify that conversion tracking is set up correctly. If this campaign continues to have low conversions and your performance goal is not being met, consider using the Maximize clicks or Enhanced CPC bid strategies.

- **Limited: Not enough revenue data**
  - **What this means:** Your campaign has low revenue, which can limit the bid strategy from maximizing performance.
  - **How to fix it:** Verify that conversion tracking is set up correctly. If this campaign continues to have low conversions and your performance goal is not being met, consider using the Maximize clicks or Enhanced CPC bid strategies.

- **Low quality score**
  - **What this means:** Your ads are running, but you may be missing potential traffic because the low quality score of one or more of your keywords is making your ads less competitive.
  - **How to fix it:** For more information, see [Quality score and quality impact in depth](hlp_BA_CONC_AboutQualityScore.md)

- **Low search volume**
  - **What this means:** This keyword has very little or no search history on the Microsoft Advertising Network. The keyword will be inactive until its search traffic increases, at which point it can start triggering your ads to appear. Our system checks and updates this status weekly.
  - **How to fix it:** You have a couple of options:
    - You can choose to do nothing and wait for our system to check again in a week. If more people start searching for your keyword, we'll reactivate it. This option might be best if you're advertising a new brand, term, or product.
    - You can remove the keyword and use [Keyword Planner](hlp_BA_CONC_KeywordPlannerIntro.md) to find additional keyword ideas.

- **Most assets disapproved**
  - **What this means:** Most of the assets in your ad did not pass the [editorial review](hlp_BA_CONC_EditProcess.md).
  - **How to fix it:** To appeal individual assets that were disapproved, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) for assistance. You can view which assets were disapproved and review their Asset ID by following these steps:

    1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
    1. Below the appropriate ad, select **View asset details**.
    1. Review the **Policy status** column for your assets.

    > [!NOTE]
    > You can edit assets directly in your ad, ad group, or asset group. You can also add a new asset and then delete the disapproved asset. If you add and save a new asset, it'll be submitted for editorial review.

- **Negative keyword conflict**
  - **What this means:** This keyword isn't in effect because it conflicts with a negative keyword.
  - **How to fix it:** To start showing ads for this keyword again, first create a negative keyword conflicts report. From the navigation menu on the left, select **Reporting** > **Templates** > **Performance** > **Negative keyword conflicts**. Run the report to find the conflicting negative keyword, and then delete it.

- **Negative ad target conflict**
  - **What this means:** This dynamic ad target isn't in effect because it conflicts with a negative dynamic ad target.
  - **How to fix it:** You can find **Negative dynamic ad targets** by following these steps:
      - From the navigation menu on the left, hover over **Campaigns** and select **Dynamic ad targets** > **Negative dynamic ad targets**.
      - Remove negative dynamic ad targets that may be impacting the ad target.

- **No matching landing page**
  - **What this means:** We can't find any webpages that match the dynamic ad target. There may be an issue with how the target is set up, incompatible campaign settings, or the webpages aren't crawlable.
  - **How to fix it:** You can reset your dynamic ad target so it matches with a webpage that's crawlable. Also, check your campaign settings to make sure they're compatible with the dynamic ad target.

- **No targeted products**
  - **What this means:** There are no targeted products.
  - **How to fix it:** Check the product filters and feed labels in Campaign settings to make sure that there are active products.

- **Pending app verification**
  - **What this means:** Your app is currently being verified.
  - **How to fix it:** It can take up to a business day for your app to be verified. For brand-new apps, it can take up to 96 hours to sync.

- **Pending editorial review**
  - **What this means:** This ad or keyword is not running because it is still under [editorial review](hlp_BA_CONC_EditProcess.md).
  - **How to fix it:** The Microsoft Advertising team performs editorial reviews as quickly as possible—most reviews are completed within a day. After we've completed the review, we'll change the status of the ad or keyword.

- **Pending targeting review**
  - **What this means:** The ad group is not serving ads yet because we are evaluating the scope of your ad group's targeting.
  - **How to fix it:** We are performing a review of your targeting to make sure it's broad enough to serve. Most reviews are completed within 15 minutes, but some ad groups can take a full day. After we've completed the review, we'll change the status of the ad group's ads and keywords:
    - If your targeting is broad enough—and there are no other issues—the status will change to *Eligible*.
    - If your targeting is not broad enough, the status will change to *Targeting too narrow*.

- **Processing**
  - **What this means:** Your dynamic ad target is processing. After creating your dynamic ad group, it can take up to seven days for your dynamic ad target to serve. In your delivery status, we tell you how much your processing has progressed (for example, **10% processing** means that your dynamic ad target processing is 10% complete, and there is still 90% left to process). If your processing status is stuck at any stage for longer than 72 hours, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371).

- **Product offers not found**

  - **What this means:** There are no active product offers.
  - **How to fix it:** Go to Microsoft Merchant Center to ensure that the store associated with your campaign contains active product offers.

- **Rejected store**

  - **What this means:** The store associated with your campaign has been rejected.
  - **How to fix it:** You can request an appeal for another review.

- **Sensitive content**

  - **What this means:** Your ad has been flagged for sensitive content. This may include topics related to violence, hate speech, suffering, inappropriate language, or other restricted themes that violate Microsoft Advertising policies.
  - **How to fix it:**

    1. Review Microsoft Advertising's [content policies](hlp_BA_CONC_EditorialGuidelines.md).
    1. Adjust ad text, images, or messaging to align with policy guidelines.
    1. If you're unsure why the ad was flagged, you can reach out to [Microsoft Advertising support](https://go.microsoft.com/fwlink/?linkid=2189081) for further investigation.

- **Some assets disapproved**

  - **What this means:** Some assets were disapproved and can't serve in certain markets or placements.
  - **How to fix it:**

    1. Review Microsoft Advertising's [content policies](hlp_BA_CONC_EditorialGuidelines.md).
    1. Adjust your assets to align with policy guidelines.
    1. You may also request an exception if you believe your assets shouldn't have been disapproved. For more information about requesting an exception for assets, see [How do I challenge a disapproval?](hlp_BA_PROC_RequestException.md).

- **Store not found**

  - **What this means:** This campaign's store cannot be found.
  - **How to fix it:** Go to Microsoft Merchant Center to make sure that the associated store is active and contains approved offers.

- **Targeting too narrow**

  - **What this means:** The ad group is not serving ads because your ad group targeting is too narrow.
  - **How to fix it:** Update your ad group targeting to be more broad and/or increase the membership of your audiences. To avoid targeting too narrowly, we recommend expanding your ad group targeting to at least 1, 000 possible monthly impressions.

- **URL is invalid**

  - **What this means:** The URL is invalid.
  - **How to fix it:** Check the link and make any necessary updates.

> [!NOTE]
> Most editorial reviews are completed within 48 hours. If your content still has the **Under Review** delivery status after two business days, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371) for assistance.
