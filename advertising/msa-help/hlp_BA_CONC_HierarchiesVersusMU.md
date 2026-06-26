---
title: Choosing between a hierarchy or multi-user access
ms.service: msa-help
ms.subservice: msa-accounts-setup
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: "If you manage more than one manager account, learn which setup will work best for you: hierarchies or multi-user access."
---

# Choosing between a hierarchy or multi-user access

> [!NOTE]
> This topic provides guidance for ad agencies and for advertisers who work with ad agencies in Microsoft Advertising.

You may already have multi-user access if you work for an ad agency that manages other people's Microsoft Advertising accounts. Multi-user access allows a person to use just one user name to access multiple accounts owned by others. For example, an ad agency executive can use one set of credentials to sign in and work in multiple accounts owned by a variety of clients.

The benefits of multi-user access are twofold. First, multi-user access gives advertisers or ad agencies the flexibility to invite others to their account while keeping ultimate control on day-to-day account management. Second, invitees are able to keep one user name to sign in to Microsoft Advertising, regardless of how many accounts they have access to. This setup allows a client to directly manage a Microsoft Advertising account and grant access to other existing users of Microsoft Advertising.

Previously, some people may have used multi-user access to gain visibility into separate and distinct accounts that are organized under different manager accounts. If an agency or a large business inherited a Microsoft Advertising account (say, due to a merger), there was no way to consolidate two separate manager accounts into one parent manager account—until now.

## Things to consider before merging separate accounts into one hierarchy

Now, it's possible to consolidate separate manager accounts by linking them and establishing a parent-child hierarchy. There are clear benefits to account management via hierarchies, which allow you to:

- Build and arrange both manager and accounts so that they match the structure of your business.
- Share campaign resources, such as remarketing lists and Universal Event Tracking (UET) tags to all or selected accounts in the hierarchy.
- Use one central wallet to pay for everything.
- Manage all users and accounts from one parent account.

As a reminder, multi-user access only pertains to a user name and the accounts you have access to using a single set of credentials. When multi-user access is created, separate accounts stay separate even as you're able to access both with one user name. But when you establish a hierarchy, you're fundamentally changing the account structure, which impacts what you're able to do.

- **Access scope**

  - With **hierarchies**, you grant **management rights to a group of users** from another account.
  - With **multi-user access**, you grant **limited access for one user**.

- **Sharing scope**

  - With **hierarchies**, you can share campaign resources such as Universal Event Tracking (UET) tags and remarketing lists across manager accounts.
  - With **multi-user access**, no resource sharing is allowed.

- **Rolling back access**

  - With **hierarchies**, you remove access for an entire *group of users* from a linked manager account when you unlink a hierarchy.
  - With **multi-user access**, you remove access *one by one* for individuals.

  Depending on your needs, it's possible to have both a hierarchy and multi-user access. The two features won't conflict. If you do have both, you'll be prompted upon sign in to select the account you want to see: your hierarchy or your partner's account.

## How to upgrade to a hierarchy

To merge two separate manager accounts into one hierarchy, you'll need to [join the accounts through account linking](hlp_BA_CONC_MultiAccount.md). Here are the high-level steps to create a hierarchy:

1. Manager account 1 sends linking request to manager account 2.
1. Manager account 2 accepts linking request from manager account 1.
1. Users on manager account 1 can see both manager account 1 and 2, plus all the accounts that belong to each manager account.
1. The super admin for manager account 1 clicks **Manage access** from the multi-user drop-down menu (which can be accessed by clicking on the user name in the navigation bar). Then, the super admin removes manager account 1's user access from manager account 2.
1. Going forward, all users can access and manage all accounts by signing in to manager account 1.
