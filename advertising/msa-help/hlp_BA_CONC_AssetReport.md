---
title: About Asset Reporting
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how the asset report can give you performance insights for your search, audience and Performance Max campaigns across account, ad group and campaign levels.
---

# About asset reporting

The Microsoft Advertising asset report provides performance insights for your search, audience and Performance Max campaigns across Account, Campaign, Ad group and Asset group levels. This comprehensive performance data can help you quickly understand how each asset impacts your overall campaign success. This can help you pinpoint the highest-performing assets and enable you to make better informed decisions about which assets to retain, adjust, or replace for your campaign's effectiveness.

> [!IMPORTANT]
> > [!NOTE]
> > Asset reporting only supports 30 days of reporting data and can have a 24 hour delay in data freshness.

> [!NOTE]
> You cannot download audience lists from the Audience Library. Microsoft Advertising follows strict privacy standards, and these lists may include sensitive user data. Downloading them directly could expose personally identifiable information.

The following is a detailed breakdown of where you can find asset reporting:

## Asset grids

| Level | RSA | DSA | MMA | Performance Max | Display | Native | Video |
| --- | --- | --- | --- | --- | --- | --- | --- |
| ****Account**** | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) |
| ****Campaign**** | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) |
| ****Ad group**** | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) |
| ****Ad**** | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) |
| ****Asset group**** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) |

## Asset performance report in reporting UI and API

| Level | RSA | DSA | MMA | Performance Max | Display | Native | Video |
| --- | --- | --- | --- | --- | --- | --- | --- |
| ****Account**** | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) |
| ****Campaign**** | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) |
| ****Ad group**** | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) | ![Accepted](media/Global_Icon_CheckMark.png) |
| ****Ad**** | Coming soon | Coming soon | Coming soon | ![No](media/Global_Icon_Xmark.png) | Coming soon | Coming soon | Coming soon |
| ****Asset group**** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | Coming soon | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) |

<a id="view-and-edit-disapproved-assets-in-your-asset-grid"></a>

## View and edit disapproved assets in your asset grid

- **Add the "Policy status" column to see when an asset is:**

  - Disapproved
  - Approved (limited)

  These statuses appear when an asset doesn't pass editorial review.

- **Supported scope**

  - Ad group level
  - Ad level

  Campaign and account level support will be available in a future release.

  Performance Max (PMAX) is not included in this version.

- **Edit a disapproved asset**

  1. Go to the Asset grid at the ad group or ad level.
  1. Select the disapproved asset.
  1. On the ribbon, select **Edit**.
  1. In the side panel, edit the disapproved asset text.
  1. Apply the change to:

     - All associations, or
     - A single association
  1. Review your updates on the **Bulk edit** page under **Tools**.
