---
title: Hierarchies in Microsoft Advertising
ms.service: msa-help
ms.subservice: msa-accounts-setup
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how a hierarchy of Microsoft Advertising manager accounts and accounts can work for you.
---

# Hierarchies in Microsoft Advertising

With hierarchies, you can scale Microsoft Advertising to meet the demands of your business, no matter its size. This feature allows you to create and arrange your Microsoft Advertising accounts so that they match the structure of your company, just like an org chart. Start with just one account and build up from there into a hierarchy of parent and subsidiary accounts.

This feature is geared towards agencies and large businesses to allow for easier and more centralized management of campaigns, users, access, and billing.

:::image type="content" source="media/BA_Conc_AcctHeirarchy.gif" alt-text="Example of Hierarchies.":::

## How it works: A manager account vs. an account

When you sign up for a Microsoft Advertising account for the first time, you're technically getting two accounts in one:

- A **manager account**, which is a container for one account or for multiple accounts in a hierarchy. Additionally, a manager account can link to other manager accounts. Visually, think of a manager account as a file folder. A manager account, also known as an MCC, is the parent account that allows you to share important items across several child accounts. Items that can be shared include:

  - Users and user roles
  - Payment methods
  - Universal Event Tracking (UET) tags
  - Remarketing lists
- An **account**, which is the account that directly serves ads. Continuing with the folder analogy with the manager account, think of an account as a file within the folder. An account contains:

  - Campaigns
  - Ad groups
  - Keywords
  - Budgets
  - Account settings, which can specify such things as currency and time zone.

These two account types are complementary, meaning that you can't have a manager account without at least one account, and you can't have an account without a manager account. Both work in harmony to provide the flexibility you need to build a hierarchy, from the simple to the complex. So, whether you're a mom-and-pop shop or a global ad agency, we've got you covered.

> [!NOTE]
> It's not possible to convert a regular account to a manager account (or a manager account to a regular account). To change the kind of account you have, you'll need to create a new manager account and then copy the information from the regular account into the new manager account.

A standard manager account can have up to six accounts (though advertisers who meet certain criteria and spend minimums are entitled to more accounts). Most small businesses have and need only one account. Why do you need both a manager account and an account? In a word: scale.

For example, imagine that you manage advertising for a large conglomerate. You want to create a nested account structure using manager accounts that reflect how your company is organized, with each layer nested under one another from top to bottom. Here's how you could order your setup:

- Parent company
- Geographic continent
- Market
- Brand name
- Product line

Each of those manager accounts has control over those below it. Each manager account can also have up to six accounts under it.

As a central folder, a manager account allows you to share important items—such as users, user roles, payment methods, and campaign resources like Universal Event Tracking (UET) tags and remarketing lists—across multiple accounts. And as you add accounts, you're able to leverage the manager account's central folder, thereby saving you time and effort by eliminating duplicate data entry.

When you go to the account level, you're freed to focus on campaign management within that space. Accounts are home to campaigns, ad groups, keywords, and budgets. The settings for accounts can also be customized to the needs of a marketplace. You can specify things such as an account's currency, time zone, and payment setting, which could all be different from account to account. You'll find this flexibility useful if, for example, your business targets customers in Canada, Mexico, and the United States, and you must track campaign performance by country and pay for advertising in different currencies.

## Using a manager account and an account

> [!NOTE]
> The account selector at the top of each Microsoft Advertising page helps you hop to any account you manage. Select the account selector to see all accounts in your hierarchy structure. You might need to select the arrow at the side of a manager account to show the accounts it manages. When you select any account in the selector, the data and information shown on Microsoft Advertising updates to reflect and apply to only the account you've selected.

Day to day, you'll work mostly within an account as you monitor and refine your campaigns. Occasionally, you may need to update a payment method or to add a user, both of which are managed in the overall manager account. Once you sign in to Microsoft Advertising, you'll be able to access both your manager account and your account. You won't need to sign in and out to go from one to the other.

Although you'll have a unique number for both a manager account and an account, you won't need to memorize either number, because they're listed in Microsoft Advertising in both the Accounts dashboard page and the account selector at the top of each page. Both types of numbers serve a specific purpose.

- **Use a manager account number to:**

  - Verify your manager account when you call in for support.
  - Choose which account to sign in to through [multi-user access](hlp_BA_CONC_UserNamePermissions.md), if you have access to more than one manager account (which is common for ad agencies or if you work with an ad agency to manage your Microsoft Advertising account).
  - Send a linking request for access to another manager account.

- **Use an account number to:**

  - Review and compare performance data across accounts.
  - Drill down into specific accounts.
  - See spend by accounts on a billing document.
  - Send a linking request to access another account.

## Building a hierarchy

You can build your hierarchy by [creating new accounts](hlp_BA_PROC_CreateAcctSelfServe.md) and [linking to an existing ad or manager account](hlp_BA_CONC_MultiAccount.md).

> [!NOTE]
> If you've already linked to all accounts within someone else's manager account, you can now gain greater control by linking to that manager account by [upgrading to a hierarchy](hlp_BA_CONC_HierarchiesVersusMU.md).

To link to a manager account or to one or more accounts under a manager account, you will need the manager account number or account numbers of any account you want to link to. It's easiest to get that number from the account owner.

1. From the navigation menu on the left, select **Tools** > **All accounts**.
1. Select **Accounts Summary** > **Requests**.
1. Above the table, select **Link to accounts**.
1. Under **Enter Account IDs**, select whether you're linking to a manager account or to one or more accounts.
1. Enter the manager account number, or up to 20 account numbers, in the space provided and select **Next**.
1. Under **Linking details**, set the **Start date** for the link, select whether you want to set the permissions as Standard or Administrative, and select **Next**.
1. Under **Review details**, check to make sure the details are correct.
1. Select **Send request**.
1. You can check the status of your request by going to the **Accounts summary** page, selecting the **Requests** tab, and selecting **Sent**.
