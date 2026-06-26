---
title: Billing summary in depth (enhanced)
ms.service: msa-help
ms.subservice: msa-billing-payments-tax
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Go to Billing Summary to get access to all your billing information and manage billing tasks, such as consolidating your bills, setting a limit on your billing threshold, and adding prepaid funds.
---

# Billing Summary in depth (enhanced)

Billing Summary gives you a single location for all of your billing information and tasks. On this page, the main things you can do regardless of your account type are:

- Check how much you owe (postpay accounts) or your available balance (prepay accounts).
- Filter the table to find the documents you're looking for. Filter by date, document ID, and other criteria.
- Review and download PDF versions of your billing documents.

## Views by account

Billing Summary offers additional information and tasks, but those vary depending on whether you are viewing multiple accounts or just one account (postpay threshold, monthly invoice, or prepay). The following sections describe what you can see and do in these different account views, so refer to the section that best matches your setup.

## FAQ

- **Multiple accounts**

  If you have more than one account, here's what you can see and do:

  - Review a summary of billing information for all of your accounts, including the total amount due for all postpay accounts (postpay threshold and monthly invoice) and the total balance for all your prepay accounts. Totals are broken down by currency.
  - Get billing details for individual accounts by clicking the account name and number.
  - Review and download PDF versions of your billing documents, including invoices, statements, payment receipts, and credit and debit memos.
  - [Set up consolidated billing](#consolidated), all invoices with the same currency are combined into one. (Applies only to monthly invoice billing.)
  - Choose whether to [include campaign details](#campdetails) with your bills. (Applies only to monthly invoice billing.)

- **Postpay threshold account**

  When you look at a postpay threshold account on Billing Summary, you'll see a tile towards the top of the page, showing you the amount due for the account and information about your monthly billing date and billing threshold. Here, you can [set a limit on your billing threshold](#limit).

- **Monthly invoice account**

  If you have a monthly invoice account, you'll see the amount due, which is the amount we have billed you, and the current balance, which is the amount you have not been billed for yet.

  If you have elected to consolidate your bills, you'll see references to that in the summary and in the table.

- **Prepay account**

  If you are looking at a prepay account in Billing Summary, you'll see your account balance and be able to [add funds](#addfunds) if your balance is getting low.

## Some things to know about Billing Summary

There are a few things that you should know when reviewing and using Billing Summary:

- Filtering the table does not change the amounts that appear in the summaries at the top of the page.
- There can be a delay of up to 4 hours before charges, credits, or payments are shown in Billing Summary.
- There might be small differences in the totals between the table and the summaries, because the table refers to billing documents and not all debits and credits come with a document. For example, Microsoft Advertising collects taxes on advertising costs in some countries/regions. For prepay accounts, those taxes are deducted from the prepay amount. The prepay balance in the summary at the top of the page shows the taxes deducted, but the statement line item in the table shows the total amount of funds you added.
- User roles determine whether you can change the settings or only read the items in Billing Summary. In addition, certain billing-related tasks (such as changing a credit card) can only be done by the bill-to party, regardless of user roles. Learn more [about user roles.](hlp_BA_CONC_SSUserRoles.md)

> [!NOTE]
> Account owners always have access to billing documents, even if they're not the . Direct managers linked to a Microsoft Advertising account may or may not have access to billing documents. It all depends on who's responsible for payments.
>
> - **If the account owner is the bill-to customer:**The account owner and *all direct managers* can see billing documents.
> - **If a direct manager is the bill-to customer:**Only the account owner and the direct manager responsible for payments can see billing documents. Any other direct managers on the account won't be able to see billing documents. In the second scenario, this restriction is by design. Although rare, this can happen when multiple ad agencies are linked to a client's Microsoft Advertising account, and one ad agency is responsible for payments.
> - **If the account has a direct manager and a different bill-to customer:** Only the account owner or the direct manager who's also the bill-to customer can see billing documents. Any other direct managers or bill-to customers for the account won't be able to see billing documents.

## Billing tasks

- **Download a billing document**

  Invoices are typically posted by the 2nd business day of each month for the previous month's charges. You will be able to see the invoice within Billing Summary once they have been generated. To download your billing document, follow these steps:

  1. From the navigation menu on the left, hover over **Billing** and select **Transactions**.
  1. From **Transactions page**, select **Billing documents**.
  1. Select one or more documents in the table and select **Download documents**. (If you don't see any documents in the table, select a different date range in the dropdown list to show past documents.)
  1. Open or save the zip file to your computer.

<a id="limit"></a>

- **Set a limit on your billing threshold (postpay threshold account)**

  You can limit the amount your payment method is charged on your postpay threshold account. To learn more about how billing thresholds work, see [What is billing threshold and how does it work?](hlp_BA_Conc_BillingThreshold.md)

  1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
  1. If you have multiple accounts, choose one from the account selector in the top menu.
  1. Select **Billing settings** from the main menu.
  1. Select the **Limit each charge to** checkbox and enter the payment amount you do not want to exceed.
  1. Select **Save**.

  > [!NOTE]
  > - Charges can exceed the billing threshold or your limit by a small amount. If you are setting the limit to avoid reaching a maximum amount that you can charge on your credit card, you might want to set your limit slightly below that amount.
  > - It will take about an hour for your new limit to be saved in our system.
  > - We may initiate an authorization hold on your card for the estimated amount of the advertising fee. This hold will be removed either when the time limit for the hold is up (usually, it's 7 days) or upon receipt of funds for the final transaction, whichever comes first. (Not everyone has this feature yet. If you don't, don't worry—it's coming soon!)
  > - If you set your limit below your current balance, we will charge you the full balance. After that, you will be charged your limit (or a slightly larger amount). If you need to reduce your balance before you set your limit, you can [pay your account balance](hlp_BA_PROC_MakePayment.md).
  > - If you change your postpay payment option from threshold to monthly invoice, we will remove the billing threshold limit.

<a id="consolidated"></a>

- **Set up consolidated billing (monthly invoice account)**

  Want to minimize the size of your monthly invoices? With consolidated billing, all of your monthly invoiced accounts that are billed in the same currency and language will be combined into a single invoice.

  1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
  1. Select **Billing settings** from the main menu.
  1. Select **Consolidated billing**.
  1. Select **Create billing group**. [If you've previously turned off consolidated billing, select **Enable now**.]
  1. Select **Save**.

  Your consolidated bill will arrive in your next billing period.

<a id="campdetails"></a>

- **Include or remove campaign details in your invoices (monthly invoice account)**

  If you don't need to see your monthly invoice billing broken down by campaign, then you can simplify your invoices even further.

  - **If you've already turned on consolidated billing:**

    *Turn off consolidated monthly invoice by editing the billing group settings.*

    1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
    1. Select **Billing settings** from the main menu.
    1. Select the pencil icon ![pencil icon](media/BA_icon_edit.png) in the table to edit the billing group's campaign details.
    1. Select **Save**.

    Turn off unconsolidated monthly invoice by editing the billing group settings

    1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
    1. Select **Billing settings** from the main menu.
    1. Select the **Consolidated billing** tab.
    1. Select the **Ungrouped accounts** tab.
    1. Select the pencil icon ![pencil icon](media/BA_icon_edit.png) in the table to edit the billing group's campaign details.
    1. Select **Save**.

  - **If you didn't turn on consolidated billing:**

    1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
    1. Select **Billing settings** from the main menu.
    1. Select the **Consolidated billing** tab.
    1. Select the pencil icon ![pencil icon](media/BA_icon_edit.png) in the table to edit the billing group's campaign details.
    1. Select **Save**.

<a id="addfunds"></a>

- **Add funds (prepay account)**

  You can manually add funds at any time. Or you can set up recurring payments. Learn more [about auto-recharge](hlp_BA_PROC_AutoRecharge.md).

  1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
  1. If you have multiple accounts, choose one from the account selector in the top menu.
  1. From **Billing Summary** in the **Current balance** tile, select **Add funds**.
  1. On the **Add funds** form, follow the instructions. Instructions vary based on your payment method.
  1. Select **Pay now**.

- **Receive monthly invoices by email**

  If you have a monthly invoice account, we send your invoice via email to your accounts payable contacts on file. Make sure their information is up to date.

  1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
  1. If you have multiple accounts, choose one from the account selector in the top menu.
  1. Select **Billing settings** from the main menu.
  1. Select the **SAP ID Information** tab.
  1. Find the SAP ID you want to edit. (If its details are hidden, you can reveal them by selecting the arrow.)
  1. Select **Add accounts payable contact** to add the contact's email address, first name, last name, and phone number (with country/region code).
  1. Select **Save**.

- **View monthly invoices in Microsoft Advertising**

  Invoices are typically posted by the 2nd business day of each month for the previous month's charges. Once invoices have been generated, you can see them by going to the **Billing** tab > **Transactions**. On the **Billing document** page, you can check the **Status** column of each invoice to see if an invoice is paid, open, or overdue. If your account is on hold due to overdue payments, you'll see a notification in Microsoft Advertising.

  For prepay accounts, we do not generate an invoice but rather a **Payment receipt** when funds are added. All payments and funds added are tracked as a **Payment receipt** for prepay accounts.

- **Get end-of-month billing notifications**

  You can choose to get billing notifications through email at the end of each month. If you have a prepay account, a statement will be posted in Billing Summary that summarizes your payments for the month. If you have a postpay threshold account, you will receive a notification that provides a link to Billing Summary where you can see the payments you made for the previous month. If you have a monthly invoice account, you will receive an email with a link to Billing Summary where you can see your invoices.

  1. From the navigation menu on the left, hover over **Settings** and select **Email preferences**.
  1. Under **Billing alerts**, slide the switch on to receive email notifications if you have only one account. If you have multiple accounts, select the on/off button to open a menu where you can choose to receive email notifications for one, several, or all accounts.
  1. Select **Save** when you're done.

  Changes to your billing notifications will take effect in the next billing cycle.

> [!IMPORTANT]
> > [!NOTE]
> > Your user role affects what you can see and what you can do in Billing Summary. Learn more [about user roles.](hlp_BA_CONC_SSUserRoles.md)
