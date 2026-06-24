---
title: Account Access Troubleshooting
ms.service: msa-help
ms.subservice: msa-accounts-setup
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Ways you can troubleshoot account access issues.
---

# Account access troubleshooting

Having trouble signing in? This guide covers common Microsoft account errors, what they mean, and how to fix them. It also includes links to helpful tools and support resources.

## Get help

If you can't sign in to your Microsoft account, we suggest that you start by clearing browser cache and cookies and trying a different browser or incognito mode. These common troubleshooting steps typically resolve most issues. If these haven't helped, try using the automated [Microsoft Identity troubleshooting tool](https://support.microsoft.com/home/contact?linkquery=Help%20me%20sign%20in%20to%20my%20account) to run diagnostics and get sign-in help.

Visit [Get help with your Microsoft account](https://support.microsoft.com/en-us/account-billing/get-help-with-your-microsoft-account-ace6f3b3-e2d3-aeb1-6b96-d2e9e7e52133?WT.mc_id=365AdminCSH_Smc) for detailed guidance.

## Common errors and fixes

- **“We couldn't find a Microsoft account. Try entering your details again, or create an account.”**

  - **What it means:**

    The email you entered isn't linked to a Microsoft account.

  - **How to fix:**

    - Double-check your email for typos or wrong domain (e.g., @hotmail.com vs @outlook.com).
    - Make sure you're using the right account type ([personal vs work](hlp_BA_CONC_AAD.md)).
    - If no account exists, create a new Microsoft account or ask your admin to set one up for your work email.

    [Learn more](https://support.microsoft.com/en-us/account-billing/how-to-check-if-your-email-address-is-a-microsoft-account-b3ba5b92-5ead-4a28-adc9-b40558bb697e)

- **“That password is incorrect for your Microsoft account.”**

  - **What it means:**

    The password is wrong.

  - **How to fix:**

    - Re-enter your password and check if Caps lock is on.
    - Select “Forgot password?” to reset it.
    - If you have both personal and work accounts with the same email, make sure you select the correct one.

- **“Sorry, we're unable to sign you in because of an issue with your username. Please contact Microsoft Advertising support for further assistance.”**

  - **What it means:**

    Your IT admin has made changes to your work account. This may happen even if your email appears unchanged after an update.

  - **How to fix:**

    - Confirm with your IT admin whether your email was updated.
    - If so, ask a super admin on your advertising account, or [contact Support](https://go.microsoft.com/fwlink/?linkid=398371), to remove and re-invite you using the new email.

- **“Switch to a work account to access Microsoft Advertising. Your IT department requires that you use a work account to access this account.”**

  - **What it means:**

    Some IT departments do not allow personal accounts; you'll need a work (Entra) account.

  - **How to fix:**

    - Select **Switch now** and sign in with your work credentials.
    - If you don't have a work account, contact your IT or account admin.
    - Ask your your Microsoft Advertising account super admin to delete and re-invite you with the correct work account.
    - Sign in with your work account, not your personal account. Choose “work account” when signing in.

- **“You can't sign up here with a work or school email address. Use a personal email, such as Gmail or Yahoo!, or get a new Outlook email.”**

  - **What it means:**

    You may need to sign in with a personal email instead of a business email address.

  - **How to fix:**

    - Use a personal Microsoft email to sign up. Choose “Personal” when prompted. [Learn more](https://support.microsoft.com/en-us/account-billing/how-to-sign-in-to-a-microsoft-account-2ffedaca-6e1b-bc18-f28c-58539e1cb6d3)
    - If it's a work account, verify with your IT administrator that you're authorized to access it.
    - If you're still blocked, contact your IT administrator to add you as an authorized user. Share [this link](/entra/identity/enterprise-apps/configure-user-consent?tabs=azure-portal&pivots=portal) for reference.

- **“Something went wrong and we can't sign you in right now. Please try again later.”**

  - **What it means:**

    There may have been too many failed attempts to log in or system issues.

  - **How to fix:**

    - Wait about 30 minutes and try again.
    - Clear browser cache and cookies, or try a different browser or incognito mode.
    - Disable VPN or proxy if you're using one.

- **“App needs permission to access resources in your organization that only an admin can grant.”**

  - **What it means:**

    Admin consent is required for app access.

  - **How to fix:**

    - Contact your IT admin to grant permission.
    - Retry login after consent is granted.

- **“Your access to Microsoft Advertising is currently blocked. We have detected unusual activity in your account…”**

  - **What it means:**

    Your account is suspended for security or policy reasons.

  - **How to fix:**

    - [Review possible violations](hlp_BA_CONC_Policy_StrikeViolations.md).
    - Submit an appeal via the portal or [contact Support](https://go.microsoft.com/fwlink/?linkid=398371).

- **“Multi-Factor Authentication (MFA) Issues”**

  - **What it means:**

    MFA prompt not completed or device unavailable.

  - **How to fix:**

    - Approve or [retry MFA](https://support.microsoft.com/en-us/topic/what-is-multifactor-authentication-e5e39437-121c-be60-d123-eda06bddf661) on your device.
    - Use backup verification methods.
    - Contact your admin or [Support](https://go.microsoft.com/fwlink/?linkid=398371) if all methods are unavailable.

- **“Verification code not received”**

  - **How to fix:**

      - Check your junk or spam folder.
      - Add sender addresses to your safe list.
      - Request a new code after a short wait.

- **“Timed out” or “Session expired”**

  - **How to fix:**

      - Wait and retry.
      - Clear cache and cookies.
      - Try a different browser or incognito mode.
      - Disable VPN or proxy.
  - [Contact Support](https://go.microsoft.com/fwlink/?linkid=398371) for technical review.

## Need more help?

[Contact Support](https://go.microsoft.com/fwlink/?linkid=398371)
