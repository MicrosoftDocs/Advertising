---
title: Combine Similar Bills into a Single Invoice (Enhanced Consolidated Billing)
description: Do you have multiple invoiced accounts? Did you know that you can combine all invoices that have the same currency into a single invoice. Read this article to find out how this works.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Combine similar bills into a single invoice (Enhanced consolidated billing)

If you have more than one invoiced account, consolidated billing allows you to combine multiple bills into a single invoice, making it faster and simpler for you to review your billing across your accounts. But don't think that streamlining your paperwork means that you won't have access to the data you need. The billing details for each of your accounts are always available in the Billing tab.

## Some things to know about consolidated billing

- Consolidated billing is only an option for customers who receive monthly invoices. Only users with Super Admin permissions can sign up for consolidated billing.
- Monthly invoices that are eligible for consolidation must share the same characteristics, including the same Microsoft Advertising bill-to customer, currency, country/state or province/city of the sold-to location, SAP ID, and tax information.

  > [!NOTE]
  > Only monthly invoices in US markets need to share the same city.
- Consolidated billing is flexible according to your needs. With it, you'll be able to create multiple billing groups and place accounts in them as needed. Based on your preferences, we'll generate consolidated monthly invoices for each billing group. You'll also have the option to leave one or more accounts ungrouped to receive a separate monthly invoice for them

## How to turn on consolidated billing

1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
1. Select **Billing settings** from the main menu.
1. Select the **Consolidated billing** tab.
1. Select **Create billing group**. [If you've previously turned off consolidated billing, select **Enable now**.]
1. Select **Save**.

Your consolidated bill will arrive in your next billing period.

## How to manage consolidated billing

**Create billing group**

  To create your billing group, follow the steps below:

  1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
  1. Select **Billing settings** from the main menu.
  1. Add your **Billing group name**, **Description**, **Bill-to customer**, and **Language**.
  1. Select your **Campaign detail**.
  1. Select **Next**.
  1. Add your **Bill-to SAP ID**, **Currency**, **Sold-to location**, and **Tax number**.
  1. Select the accounts to put into the billing group.
  1. Select **Create billing group**.

**Edit billing group**

  1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
  1. Select **Billing settings** from the main menu.
  1. Select the **Consolidated billing** tab.
  1. Under **Billing group**, when you hover over the right side of the billing group you'd like to edit, a pencil icon ![pencil icon](media/BA_icon_edit.png) will appear.
  1. Select the pencil icon ![pencil icon](media/BA_icon_edit.png) on the right side of the billing group you'd like to edit.
  1. Under **Edit account details**, select the accounts you'd like to edit.
  1. Select **Save**.

**Delete billing group**

  1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
  1. Select **Billing settings** from the main menu.
  1. Select the **Consolidated billing** tab.
  1. Under **Billing group**, select the checkbox next to the billing group you'd like to delete.
  1. Select **Delete**.
  1. Under **Delete billing group(s)**, select **Confirm & remove**.

## How to turn off consolidated billing

1. From the navigation menu on the left, hover over **Billing** and select **Payment methods**.
1. Select **Billing settings** from the main menu.
1. Select the **Consolidated billing** tab.
1. Select "turn it off" in the sentence **If you no longer want to receive consolidated billing, turn it off**.
1. Select **Disable**.

We'll store your billing group settings, so you won't need to configure them again if you decide to turn consolidated billing back on.

## Frequently asked questions

**How many billing groups can I create?** <br> You can create as many billing groups as needed. You cannot have more billing groups than the number of accounts you have.

**Can I put an account into two billing groups at the same time?** <br> At this time, you are not able to put an account into two billing groups.

**What happens when I remove an account from a billing group? What happens if I delete a billing group?** <br> Whether you're removing an account from a billing group or deleting a billing group, the existing spend before the removal will still be consolidated. However, once you remove the account or the billing group, the spend after the removal will follow the new setting.

**Can I consolidate accounts across manager accounts?** <br> Yes, as long as accounts across different manager accounts are billing to the same manager account, paying with the same SAP ID, and all the accounts have matching billing group criteria of the bill-to manager account.

**What is an ungrouped account?** <br> An ungrouped account is an account that didn't meet the billing group criteria and will receive its own standalone invoice. To manage ungrouped accounts, go to the **Consolidated billing** tab. Under **Ungrouped accounts**, you'll see options to **Add to group** or **Create new group**.

**If there's a spend before I remove an account from a billing group, will that spend still be included in the consolidated monthly invoice?** <br> Yes.

**What is a monthly statement and how do you use it?** <br> If the owner of the account is not the bill-to customer for accounts with monthly invoicing, once the account's monthly invoice has been generated, Microsoft Advertising provides the account owner with a monthly statement. The monthly statement details the account's spending during the billing cycle. It also includes a notice that states, "Please note that the statement isn't for the purpose of payment and tax. For the Microsoft Advertising invoice of this account, please contact the bill-to customer." The account owner isn't required to make payment or assume any tax obligations.

The only exception is if all the monthly invoice accounts are billed to another advertiser. In this case, the owner advertiser will still receive the consolidated monthly invoice, but with that advertiser as the bill-to customer. Please note:

- Monthly statements are not consolidated; each account receives a separate monthly statement.
- The document number will be consistent with the consolidated monthly invoice, but with the account number in the file name.

**What is an auto group?** <br> *If there's no existing available billing group for the account*, we'll create a new billing group. The attributes of the account (bill-to customer, business location, currency, SAP ID, and tax number) will be used as the criteria for the new billing group. Then, the account will be included in this newly created billing group. *If there's only one available billing group for the account*, the account will automatically be included in that billing group. *If there are multiple available billing groups for the account*, the account won't be grouped into any of them. In this case, you need to manually set the account's billing group later.

**Where is the auto group option?** <br> If you've turned on consolidated billing, you'll see it when you link to other accounts, change the account's payment option to monthly invoice, etc.

**What happens if I delete a billing group that contains accounts?** <br> If you delete a billing group that still has accounts in it, the billing group history is removed. This affects how future spending is consolidated.

- **If the accounts are added to another billing group**: All spending, both from the original billing group and after leaving it, will be consolidated into the new billing group.
- **If the accounts stay out of any billing group until month-end**: Their individual monthly invoices will include both their previous spending in the deleted billing group and their spending after leaving it.

## Related links for enhanced consolided billing

Learn more about [SAP IDs](hlp_BA_CONC_BillingSettingsEnhanced.md) and [billing summaries](hlp_BA_CONC_BillingTabEnhanced.md).

## Related videos

- [Understanding billing and payment](https://www.youtube.com/watch?v=YfyZuoLOCdE)
