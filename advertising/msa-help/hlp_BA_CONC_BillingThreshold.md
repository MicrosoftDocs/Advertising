---
title: What is billing threshold and how does it work?
ms.service: msa-help
ms.subservice: msa-billing-payments-tax
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Paying your postpay threshold account with a credit card? Learn about billing threshold and monthly billing date to understand when we charge your payment method.
---

# What is billing threshold and how does it work?

When met, the billing threshold is a set amount that triggers billing for advertising costs. We charge your primary payment method when you reach your billing threshold or your monthly billing date, whichever comes first. The following graph shows an example: In your first 30-day period, your charges are well below your billing threshold of $50, so we charge your primary payment method on your monthly billing date. In the next 30-day period, you hit your billing threshold a few days before your monthly billing date, so we charge your primary payment method at that time.

:::image type="content" source="media/BA_Conc_NewAdv_HowBilled.png" alt-text="How billing threshold works.":::

## Monthly billing date

Your monthly billing date is the date that you signed up for Microsoft Advertising. Your primary payment method will be charged on your monthly billing date with one exception:

- If you have made a successful payment within the past 10 days, either by reaching your billing threshold or by [paying your account balance](hlp_BA_PROC_MakePayment.md).

## Billing threshold

Billing thresholds start out low (for example, if your account is billed in US dollars, the billing threshold starts at $50) and will automatically increase when you make successful payments. The amount of increase depends on your currency and other factors. Alternatively, Microsoft Advertising automatically decreases your billing threshold if you run into problems paying your charges.

### Example: When you pay

Let’s assume you signed up for Microsoft Advertising on October 22 and have a postpay account billed in U.S. dollars. As a new customer, your billing threshold is set by default to $50 and your monthly billing date is the 22nd of each month. From October 22 to November 21, you spend $47.50, so we charge you that amount on November 22, your first monthly billing date. Your campaign takes off in late November and by December 7, you have $50 in charges. We charge your payment method on December 8. You reach the billing threshold two more times, and we increase it to $100.

> [!IMPORTANT]
> For customers in India: Due to a regulation by the Reserve Bank of India (known as [India E-Mandate](https://go.microsoft.com/fwlink/?linkid=2155636)), payments may not be processed if the credit or debit card you used was added to your account after April 1, 2021. In this case, we recommend:
>
> - For prepay auto-recharge: [Manually add funds to your prepay account](hlp_BA_PROC_AddFunds.md).
> - For postpay threshold: [Pay your account balance](hlp_BA_PROC_MakePayment.md).
>
> Microsoft Advertising will remove all stored card information from the portal to address [directives from the Reserve Bank of India restricting the storage of card data, effective September 30, 2022](https://go.microsoft.com/fwlink/?linkid=2210014). This directive prevents Microsoft Advertising and other online merchants from storing the card information of customers located in India.
>
> Starting October 1, 2022, you must add your card details for tokenization purposes and [verify your payment method in Microsoft Advertising](https://go.microsoft.com/fwlink/?linkid=2103725) to add funds to your account or settle any balances.
>
> Tokenization is a process by which sensitive credit or debit card numbers are converted to a randomly generated string of characters. This token ID is stored instead of your actual card information. This safeguards the card information and renders it unusable in the event of a data breach.
>
> Microsoft Advertising needs consent to generate the token. If you don't consent to the card tokenization, we won't be able to retain the card information and you'll need to re-enter the payment method before each transaction. If you have any recurring payments set up, they might also be declined, in which case you'll have to make your payments manually.

## About setting a limit

You can set a limit on the amount Microsoft Advertising can charge your payment method. For example, if your billing threshold is $2,500, but you don't want charges to your credit card that are greater than $2,000, you can set a limit.

Although you can set a limit that is higher than the current billing threshold, we will continue to charge you when you reach the billing threshold that is defined by Microsoft Advertising for your account. If the threshold increases and exceeds your limit, we will charge you when you reach your limit.

> [!IMPORTANT]
> The billing threshold only reflects advertising costs. It does not include any mandatory taxes. You will have to separately factor for taxes in your advertising spend if your business is located in a country/region where online services are taxed. So, using the $2,000 limit as an example, we'll charge you $2,000 plus any applicable taxes once you hit your billing threshold. See [Tax or VAT information](hlp_BA_CONC_TaxVATInfo.md) to learn more about taxes in your country/region.

### Example: Setting a limit above the billing threshold

Let's say your current billing threshold is $50 with a maximum over time of $2,500. You can set your limit at $2000, but we'll continue to charge you when you reach the billing threshold until we raise the billing threshold over time and it reaches your limit of $2,000.

:::image type="content" source="media/BA_ScreenCap_Billingthreshold.png" alt-text="billing threshold.":::

## Find your billing threshold

Only a Super Admin or a Standard User can adjust a billing threshold. Learn more [about user roles](hlp_BA_CONC_SSUserRoles.md).

To find your billing threshold, make sure you are in the account view and not the Manager account view:

1. From the navigation menu on the left, hover over **Billing** and select **Billing settings**.
1. From here, you can view and change your billing threshold.

## Set a limit

1. From the navigation menu on the left, hover over **Billing** and select **Billing settings**.
1. If you have multiple accounts, choose one from the account selector in the top menu.
1. Select the **Limit each charge to** checkbox and enter the payment amount you do not want to exceed.
1. Select **Save**.

> [!NOTE]
> - Charges can exceed the billing threshold or your limit by a small amount. If you are setting the limit to avoid reaching a maximum amount that you can charge on your credit card, you might want to set your limit slightly below that amount.
> - It will take about an hour for your new limit to be saved in our system.
> - We may initiate an authorization hold on your card for the estimated amount of the advertising fee. This hold will be removed either when the time limit for the hold is up (usually, it's 7 days) or upon receipt of funds for the final transaction, whichever comes first. (Not everyone has this feature yet. If you don't, don't worry—it's coming soon!)
> - If you set your limit below your current balance, we will charge you the full balance. After that, you will be charged your limit (or a slightly larger amount). If you need to reduce your balance before you set your limit, you can [pay your account balance](hlp_BA_PROC_MakePayment.md).
> - If you change your postpay payment option from threshold to monthly invoice, we will remove the billing threshold limit.
> - In order to use a postpay threshold account, your [advertiser identity verification (AIV) status](hlp_BA_CONC_AdvertiserIdentityVerification.md) must be verified.

## Related videos

- [Understanding billing and payment](https://www.youtube.com/watch?v=YfyZuoLOCdE)
