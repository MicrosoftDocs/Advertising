---
title: Signing in with a work account
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: If you want to restrict access to only authenticated individuals at your organization, you can require users to sign in with a work account.
---

# Signing in with a work account

When we talk about work accounts in Microsoft Advertising, it might not be what you think at first. If your user name is myname@contoso.com it could be a personal or work account. You can’t always be sure just by looking at the email address. Even if you only use Microsoft Advertising credentials for work, your user name is most likely considered a personal account in this context.

Most users sign in to Microsoft Advertising with a Microsoft account, which includes a single user name and password that connects a user to various Microsoft products and services. Each Microsoft account is assigned for personal use, even if the user only manages advertising accounts for work.

However, your IT department may restrict access to certain assets, including data that's stored in third-party tools such as Microsoft Advertising. In Microsoft Advertising you can restrict access to only work accounts that are authenticated by Azure Active Directory. Azure Active Directory is Microsoft's cloud-based identity and access management service. It's used by IT departments to administer user names and corporate access at a global scale.

- *Personal account:* You decide whether myname@contoso.com can have access to Microsoft Advertising.
- *Work account:*Your IT department decides whether myname@contoso.com can have access to Microsoft Advertising.

If you're a small business that uses an email address with a public domain (such as Gmail, Outlook, or Yahoo), you can ignore this feature and continue signing in with that personal account.

## Benefits to requiring access with a work account

There are several benefits to requiring a work account to access Microsoft Advertising.

- Users can use their existing credentials to sign in, thereby eliminating the need to have another set of user names for Microsoft Advertising
- You can get seamless access with single sign-on (SSO), if it's enabled by your IT department.
- There's easier access management: For example, if someone leaves your organization, then that person loses access to Microsoft Advertising when their account is deactivated.
- It keeps your Microsoft Advertising account in compliance with your company's IT standards.

## How to require access with a work account

> [!IMPORTANT]
> You may lose access to third-party tools if you switch to work accounts. In that case please sign out and sign in to those tools again or check with your tool provider about support for this feature.


- **Switch your user type to a work account**

  If you're a Super Admin who wants to enable this feature, you'll first need to switch your user type to a work account before you require all other users to sign in with a work account. Once the feature is enabled, all other users will be prompted to switch to a work account as follows.

  1. From the navigation menu on the left, hover over **Settings** and select **My settings**.
  1. Select **Switch to a work account**, and follow the instructions on the screen.

- **Revert your user type to a personal account**

  If you need to revert your user type from work account to a personal account, please [contact support](https://go.microsoft.com/fwlink/?linkid=398371). This could be necessary if third-party software that you use does not yet support work accounts.

- **Enable sign-in with a work account**

  To enable this feature, you must be a Super Admin who already signs in with a work account. If you haven't done so, you'll first need to switch your user type to a work account.

  1. From the navigation menu on the left, hover over **Settings** and select **User management**.
  1. Next to **Require sign-in with a work account**, slide the switch to the right to turn on this feature.

  Once you enable this feature, your users will be prompted to confirm their work account the next time they sign in. If a user provides an email address that's not authenticated by Azure Active Directory, then that user will be blocked. See the following section on how to manage users once this feature is enabled.

- **Disable sign-in with a work account**

  To disable this feature, you must be a Super Admin.

  1. From the navigation menu on the left, hover over **Settings** and select **User management**.
  1. Next to **Require sign-in with a work account**, slide the switch to the left to turn off this feature.

- **Sign in with a work account**

  A work account is the account provided by your organization to access Microsoft services. It's typically linked to your company email address and managed by your IT administrator.

  - Use your work account credentials for secure access.
  - If you're unsure whether you have a work account, check with your IT team.

  Learn more about [how to sign in to a Microsoft account](https://support.microsoft.com/en-us/account-billing/how-to-sign-in-to-a-microsoft-account-2ffedaca-6e1b-bc18-f28c-58539e1cb6d3).

- **Troubleshooting sign-in issues**

  If you experience problems signing in, visit [Account access troubleshooting](hlp_BA_CONC_AccountAccess.md) for step-by-step solutions or [contact Support](https://go.microsoft.com/fwlink/?linkid=398371).

## Manage access with a work account

You'll need to keep a few things in mind to make sure that users don't lose access to Microsoft Advertising when you require signing in with a work account.


- **See if a user has been blocked from accessing Microsoft Advertising**

  You'll see a label that reads **Blocked** within the user's tile in **Users**.

- **Unblock a user account**

  You'll need to provide a work account to your user if they don't have one. If they do have one, then they'll be prompted at sign-in to choose whether they want to continue signing in with their organization's account or with their personal account. Be sure that they choose the option to sign in with a work account.

- **See what kind of account a user signs in with**

  In **User Management**, you'll see **Signs in with** for each user. There, it notes whether a user is signing in with a personal account or a work account.

- **Fix a work account that's classified by Azure Active Directory as a personal account**

  Users will be prompted to sign in with their work account once they select **Switch now**.

  > [!NOTE]
  > Some users may have to sign in first with their personal accounts before they can provide a new work account when switching credentials.

- **Choose work account during sign in**

  Switching to work accounts can be confusing for users who also have a personal account with the same email address. For example, during sign in they might be prompted to choose between their work and personal account.

  To stop receiving this message, follow the steps in [I want to use a different email address or phone number to sign in](https://go.microsoft.com/fwlink/?linkid=2168463) support section to change the email address that you use to sign in to your personal Microsoft account. Doing this changes the way you sign in to your personal account, but it won't affect any of the data associated with it.

- **Check for any third-party software dependencies**

  You may lose access to third-party tools if you switch to work accounts. In that case please sign out and sign in to those tools again or check with your tool provider about support for this feature.
