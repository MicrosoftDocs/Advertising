---
title: About website control lists
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn more about website control lists.
---

# About website control lists

> [!NOTE]
> Not everyone has targeted website lists yet. If you don't, don't worry—they're coming soon!

Website control lists allow advertisers to better control where their ads appear. Website exclusion lists help prevent ads from being shown on certain websites, whereas targeted website lists allow the advertiser to specify the websites where they want their ads to appear.

> [!NOTE]
> Microsoft sites such as MSN.com cannot be excluded. Similarly, Microsoft sites will continue to be targeted in addition to your specified targeted websites.

## Using website control lists

> [!NOTE]
> - To add URLs to an existing account-level exclusion list, go to your manager account. Navigate to **Tools** > **Content suitability** > **Website control lists**, and select the list you want to edit. Select **Add website** to update the list with new URLs.
> - If you're signed in at the account level, you can only view account-level exclusion lists but cannot edit them.
> - To add URLs to an existing campaign-level exclusion list, use the account selector to choose the appropriate account. Then, return to the **Website control lists** page and go to **Campaign exclusions**. Select the list you want to edit. Select **Add website** to update the list with new URLs.

- **At the manager account level:**

  | Create lists | Associate lists with |
  | --- | --- |
  | **You can create website exclusion lists,<br>but not targeted website lists** | Any account you manage |

- **At the account level:**

  | Create lists | Associate lists with |
  | --- | --- |
  | **You can create website exclusion lists<br>and targeted website lists.<br>Cross-account website exclusion lists<br>can only be created at the manager level.** | Any campaign in your account |

- **In your campaign settings:**

  | Associate lists | Manually add websites |
  | --- | --- |
  | **You can associate existing website exclusion<br>lists and targeted website lists<br>with your campaign** | You can manually add websites<br>that you want to exclude or target |

## What you need to know

- You may use these example URL formats:

  - contoso.com
  - www.contoso.com
  - autos.contoso.com
  - contoso.com/widgets
  - http://www.contoso.com
  - https://www.contoso.com
- To exclude or target all traffic from a specific domain, omit the "www" prefix. For example, use "contoso.com" if you want to block traffic from www.contoso.com and www2.contoso.com.
- Once you create a website exclusion list at the manager account level, you must associate it with at least one account for it to take effect. Similarly, once you create a website exclusion list at the account level, you must associate it with at least one campaign for it to take effect.
- You can remove account and campaign associations at any time, so they will no longer be associated with your list. After deleting a list, it will be removed from all associated accounts and campaigns.
- All associated manager account and account-level website exclusion lists are automatically applied in addition to any exclusions set at the campaign or ad group level.
- Audience campaigns will always serve on Microsoft sites (e.g., Microsoft Bing, Microsoft Casual Games, MSN, and Outlook.com) even if you've added website exclusions for them. Similarly, Microsoft sites will continue to be targeted in addition to your specified targeted websites for Audience campaigns.
- For Search campaigns, we won't show your ads on Microsoft sites if you've added website exclusions for them.
- Campaign-level website exclusion lists can be associated with any Audience, Search, Shopping, or Lodging campaigns in your account. Campaign-level targeted website lists can be associated with any Audience campaign in your account.

## FAQ

- **Account-level website exclusion lists**

  You can only create account exclusions at the manager account level. However, you can view and remove any website exclusion lists associated with your account at the manager account level as well as account level.

  - **Create lists**

    1. From the navigation menu on the left, select **Tools** > **Content suitability** > **Website control lists**.
    1. Select **Create**.
    1. Enter your **List name**.
    1. In the **Website exclusions** box, enter the URLs of websites that you don't want your ads to show on.

       > [!NOTE]
       > We'll validate your websites after you enter them. If you've entered any invalid URLs, we'll let you know so you can fix them accordingly.
    1. Select **Save**.

    > [!NOTE]
    > - To add URLs to an existing account-level exclusion list, go to your manager account. Navigate to **Tools** > **Content suitability** > **Website control lists**, and select the list you want to edit. Select **Add website** to update the list with new URLs.
    > - If you're signed in at the account level, you can only view account-level exclusion lists but cannot edit them.
    > - To add URLs to an existing campaign-level exclusion list, use the account selector to choose the appropriate account. Then, return to the **Website control lists** page and go to **Campaign exclusions**. Select the list you want to edit. Select **Add website** to update the list with new URLs.

  - **Associate lists with any account you manage**

    1. From the navigation menu on the left, select **Tools** > **Content suitability** > **Website control lists**.
    1. Select the checkbox next to the appropriate lists.
    1. In the toolbar, select **Associate account(s) to list**.
    1. Select the appropriate accounts.
    1. Select **Save**.

  - **Remove account associations from list**

    You can remove account associations two ways: at the manager account level and at the account level.

    Manager account level

    1. From the navigation menu on the left, select **Tools** > **Content suitability** > **Website control lists**.
    1. Select the appropriate lists.
    1. Select **Accounts sharing this list**.
    1. Select the checkbox next to the appropriate accounts.
    1. In the toolbar, select **Remove account(s) from this list**.
    1. Select **Save**.

    Account level

    1. From the navigation menu on the left, select **Tools** > **Content suitability** > **Website control lists**.
    1. Select **Account exclusions**.
    1. Select the checkbox next to the appropriate list(s).
    1. Select **Disassociate from account**.

- **Campaign-level website exclusion and targeted website lists**

  Website exclusion lists and targeted website lists for your campaigns are created at the account level.

  - **Create lists**

    1. From the navigation menu on the left, select **Tools** > **Content suitability** > **Website control lists**.
    1. Choose **Campaign exclusions** or **Targeted websites**.
    1. Select **Create**.
    1. Enter your **List name**.
    1. In the **Website exclusions** or **Targeted websites** box, enter the URLs.

       > [!NOTE]
       > We'll validate your websites after you enter them. If you've entered any invalid URLs, we'll let you know so you can fix them accordingly.
    1. Select **Save**.

    > [!NOTE]
    > - To add URLs to an existing account-level exclusion list, go to your manager account. Navigate to **Tools** > **Content suitability** > **Website control lists**, and select the list you want to edit. Select **Add website** to update the list with new URLs.
    > - If you're signed in at the account level, you can only view account-level exclusion lists but cannot edit them.
    > - To add URLs to an existing campaign-level exclusion list, use the account selector to choose the appropriate account. Then, return to the **Website control lists** page and go to **Campaign exclusions**. Select the list you want to edit. Select **Add website** to update the list with new URLs.

  - **Associate lists with campaigns in your account**

    1. From the navigation menu on the left, select **Tools** > **Content suitability** > **Website control lists**.
    1. Select the checkbox next to the appropriate lists.
    1. In the toolbar, select **Associate campaign(s) to list**.
    1. Select the appropriate campaigns.
    1. Select **Save**.

  - **Remove campaign associations from list**

    1. From the navigation menu on the left, select **Tools** > **Content suitability** > **Website control lists**.
    1. In the **Campaign exclusions** or **Targeted websites** tabs, select the appropriate lists.
    1. Select **Campaigns sharing this list**.
    1. Select the checkbox next to the appropriate campaigns.
    1. In the toolbar, select **Remove campaign(s) from this list**.
    1. Select **Save**.

- **Add or remove website exclusion and targeted website lists in your campaign settings**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Campaign settings**.
  1. Select the appropriate campaign.
  1. In your advanced settings, below **Website control lists**, choose which website exclusion or targeted website lists you want to associate with your campaign. You may also choose to remove them.
  1. Below **Manually add websites**, you may choose to add URLs in addition to those in your selected list(s).
  1. Select **Save**.

- **Ad group-level website exclusions**

  Ad group-level website exclusions override any exclusions set at the campaign level.

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ad groups** > **Ad groups**.
  1. Select the checkbox next to the ad group that you want to edit.
  1. Select **Edit** > **Other changes**.
  1. For **Select a setting**, select **Website exclusions** and then enter the URLs of websites you want to exclude in the box.
  1. Select **Apply**.
