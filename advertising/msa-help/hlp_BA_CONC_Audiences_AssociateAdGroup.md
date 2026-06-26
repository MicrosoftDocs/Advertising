---
title: Associate audiences with ad groups or campaigns
ms.service: msa-help
ms.subservice: msa-audience-display-video
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Once you have created or selected an audience, you can associate it with one or more ad groups or campaigns.
---

# Associate audiences with ad groups or campaigns

> [!IMPORTANT]
> Campaign-level audience associations are not available for [Audience ads](hlp_BA_CONC_NativeAds.md).

Once you have created or selected an [audience](hlp_BA_CONC_Audiences_Options.md), you need to associate it with an ad group or campaign, or with multiple ad groups or campaigns. The association can increase bids for, target, or exclude the people included in your audience.

## Should I associate audiences to my ad groups or my campaigns?

| Scenario | You should associate audiences to |
| --- | --- |
| **You're using different audiences and bids for different ad groups in the same campaign.** | **Ad groups**: That way, you can manage and optimize each audience individually. |
| **Your account is segmented at the ad group level, or you otherwise want to keep precise control over each ad group.** | **Ad groups**: For example, you could test a particular audience in one ad group  before applying it to other ad groups. |
| **You're using the same audience and bid for each ad group in your campaign.** | **Campaigns**: You just need to set them up once, and don't have to create a new association each time you create a new ad group. |

## Create associations

- **Create a targeting association**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Audiences**.
  1. Select **Create association**.
  1. In the drop-down menu, select either **Campaign** or **Ad group**.
  1. Select the appropriate ad group or campaign.
  1. Select **Add targeting**.
  1. In the **Select audience** drop-down menu, select the appropriate audience type.
  1. Select the appropriate audience.
  1. Choose your **Ad group targeting setting** or **Campaign targeting setting**:

     | Targeting setting | What it means |
     | --- | --- |
     | **Bid only** | Ads in this ad group or campaign can show to everyone but the bid adjustment will apply to people included in the audience. |
     | **Target and bid** | This setting limits your ads to people in your selected audiences. You may choose to make bid adjustments for those audiences. |
  1. Set a **Default bid adjustment** for new targeting associations. By default, your bid adjustment is set to 15%, however, the bid adjustment can range from -90% to +900%.
  1. Select **Save**.

  > [!NOTE]
  > - You will need to remove any ad group-level audience targeting associations within a campaign before you can create a campaign-level targeting association for that campaign.
  > - Similarly, you will need to remove any campaign-level audience targeting associations before you can create an ad group-level targeting association within that campaign.

- **Create an exclusion association**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Audiences**.
  1. Select **Create association**.
  1. In the drop-down menu, select either **Campaign** or **Ad group**.
  1. Select the appropriate ad group or campaign.
  1. Select **Add exclusions**.
  1. In the **Select audience** drop-down menu, select the appropriate audience type.
  1. Select the appropriate audience.
  1. Select **Save**.

- **Associate audiences with multiple ad groups or campaigns**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Campaigns** or **Ad Groups**.
  1. Select the ad groups or campaigns you want to associate with the audience.
  1. Select **Edit** and then **Associate with audiences**.
  1. Follow the same steps above for targeting or exclusion associations.

  > [!NOTE]
  > - You will need to remove any ad group-level audience targeting associations within a campaign before you can create a campaign-level targeting association for that campaign.
  > - Similarly, you will need to remove any campaign-level audience targeting associations before you can create an ad group-level targeting association within that campaign.

## About shared audiences

- Audiences can be added at the manager account level, allowing you to centralize audience creation for use across multiple accounts. The benefit of creating shared audiences at the manager account level is that it eliminates the need to upload or recreate the same audience list multiple times in each individual account.
- Audiences created at the manager account level won't be automatically applied to campaigns. You still need to apply the audience manually at the campaign or ad group levels.

## Audience targeting and exclusion rules

- A campaign can't have targeting associations at both the campaign and ad-group level. Exclusions are allowed at both levels regardless of whether any targeting associations are set.
- The same audience can't be both targeted and excluded at the same level.
- The same audience can be excluded at both campaign and ad group levels.
- If an audience is targeted at the campaign level, it can't be excluded at the campaign level, but it *can* be excluded at the ad-group level.
- If multiple audiences are associated with one ad group, then the most recent ad group targeting setting (Bid only or Target and bid) will be applied to all of these audiences. [Learn how to edit the targeting setting for an association](hlp_BA_CONC_Audiences_TargetSettings.md).

## Next steps

- [Optimize for audience targeting](hlp_BA_CONC_Audiences_Optimize.md)
- [Set up UET if you haven't already](hlp_BA_CONC_UET_Setup_Master.md)
