---
title: "Customer Match: Use Your Own Data to Find Customers"
ms.service: msa-help
ms.subservice: msa-audience-display-video
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to upload your own customer match lists to Microsoft Advertising and then target this audience.
---

# Customer match: Use your own data to find customers

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

With customer match, you can use the email addresses your customers have shared with you to reengage with them across the [Microsoft Advertising Network](hlp_BA_CONC_AboutAdvertisingNetwork.md) through both search and Audience ads. You can [link Zapier to your Microsoft Advertising account](#link-zapier-to-your-account) to automate your customer match lists across the applications you use for your business. This makes it easy to create lists and add or remove contacts all in one place.

- **Boosted performance**. Use your complete user understanding, including offline data, to target customers who are more likely to convert.
- **Full control and flexibility over the customer data that's uploaded**. You decide how to use your own first-party data - build and modify any number of lists to help you reach your business goals.
- **Streamlined management**. Use your existing segmentation and customer match lists by uploading them to your Microsoft Advertising account.

Use your customer match lists to grow brand awareness, increase conversions by reengaging with them, or tailor messaging to upsell or cross-sell other products and services. You can also use your lists as exclusions to ensure you're only engaging with potential new customers. Some example customer match list use cases include:

- Loyalty programs
- Credit card holders
- Rewards club members
- Newsletter subscribers
- Greatest lifetime value
- Recent purchasers
- Highest spend potential

> [!NOTE]
> Customer match is not allowed for sensitive content categories, products, or services. Additional information about our remarketing policy can be found on the [remarketing policy page](https://go.microsoft.com/fwlink/?linkid=852540).

Third-party user data cannot be used for customer match. If you are currently working with a supported data management provider (DMP) and would like to use that data in your Microsoft Advertising campaigns, check out [custom audiences](hlp_BA_CONC_Audiences_CustomAudience.md). If your DMP is not supported, you can export the data and then upload it as a customer match list.

## Upload customer match lists to Microsoft Advertising or connect your customer data platform

- **Directly upload customer lists to Microsoft Advertising:** Upload a file of your custom email addresses into your Microsoft Advertising acccount to create a customer match audience for targeting. 
- **Upload customer lists to your customer data platform:** Upload a file of your custom email addresses to your customer data platform and connect it to your Microsoft Advertising account.

> [!NOTE]
> Microsoft Advertising is currently partnered with ActionIQ, Adobe Advertising Cloud, Amperity, BlueConic, Hightouch, LiveRamp, Lytics, Salesforce, Simprosys, Skai, Tealium, TransUnion, Treasure Data, Zapier, and Zeotap, and we are constantly adding new partners. If you are interested in leveraging one of our partners for customer match, please reach out to your account team.

## Preparing customer match lists for upload in Microsoft Advertising or API

To get started with customer match, you must first prepare your customer list. A customer list is the contact information that you have compiled to enable customer match. The requirements for the list are:

- Files must be in a .csv format. A template file is available during customer match list setup.
- Each email address per user must be contained within its own cell (row and column)
- Set the column header (the first line in the file) to "Email," and then provide email addresses in the lines below.
- The list should have at least 300 active email users if being used for targeting across the [Microsoft Advertising Network](hlp_BA_CONC_AboutAdvertisingNetwork.md).
- Each customer list file can contain up to 4 million entries per upload. To apply more than 4 million email addresses to one customer match list, you must upload multiple files.

For the privacy of your customers, the personal customer data in your file (email addresses) must be encrypted, or hashed, using the SHA-256 algorithm. We recommend that you hash your data before you submit the file in Microsoft Advertising. If you choose to upload your list in plain text, the personal customer data in your file (email addresses) will be encrypted on your computer before it is sent to Microsoft Advertising.

<a id="create-an-audience-with-your-customer-match-list"></a>

## Create an audience with your customer match list

Once you have your customer list in a file, you can create a new audience for targeting.

1. From the navigation menu on the left, select **Tools** > **Audiences**.
1. Select **Create**.
1. Give this audience a unique name.
1. For **Type**, select **Customer match list**.
1. Select **Next**.
1. Choose **Plain text** or **Hashed file**.
1. Select the checkbox confirming that you will comply with the listed policies and terms.
1. Choose the membership duration and description (optional).
1. Under **Sharing**, select the accounts you want the customer match list to apply to. You can either share it across all accounts or on a specific account.
1. Select **Next**.
1. Preview the changes and then select **Apply changes** to start the upload.

> [!NOTE]
> Customer match lists are ready to be associated with campaigns and ad groups 48 hours after upload.

## Associate the audience with campaigns and ad groups

Customer lists are just one of our [audience targeting options](hlp_BA_CONC_Audiences_Options.md). Once you have created or selected an audience, you need to associate it with an ad group or campaign, or with multiple ad groups or campaigns. The association can increase bids for, target, or exclude the people included in your audience.

[Learn more about associating audiences with ad groups or campaigns](hlp_BA_CONC_Audiences_AssociateAdGroup.md).

<a id="link-zapier-to-your-account"></a>

## Link Zapier to your Microsoft Advertising account

Streamline your customer match lists by integrating Zapier with your Microsoft Advertising account. Zapier is a third-party partner that automates data transfers and updates between the applications you use for your business, such as Salesforce, HubSpot, and Microsoft Excel. Zapier applies those updates to your Microsoft Advertising account.

We currently support creating customer match lists and adding/removing contacts with Zapier. For more information, see [Zapier's Microsoft Advertising integration templates](TODO-FWLINK-2245480).

> [!IMPORTANT]
> Advertisers *must not* hash any personal customer data sent through Zapier to Microsoft Advertising. We handle the hashing process, ensuring you're adequately protecting customer privacy and that no raw data is uploaded against our APIs.

- **Link Zapier to Microsoft Advertising**

  > [!NOTE]
  > Accept the **Customer Match Terms** before linking your Microsoft Advertising account with Zapier. For instructions, see [Create an audience with your customer match list](#create-an-audience-with-your-customer-match-list).

  1. [Log in](TODO-FWLINK-2245480) to Zapier.
  1. Select **Create Zap**.
  1. Connect the app of your choice with Microsoft Advertising.
  1. Select a trigger from the dropdown menu.
  1. Select an action from the dropdown menu.
  1. Set up your trigger. For more information about triggers, see [Zapier's Microsoft Advertising integration templates](TODO-FWLINK-2245480).
  1. Choose the Microsoft Advertising account you want to link to Zapier.
  1. Select **Accept** to allow Zapier to access your information.

- **Unlink Zapier and Microsoft Advertising**

  1. Go to [Manage apps & services](TODO-FWLINK-2245380).
  1. Log in with your Microsoft Advertising account's email.
  1. Select **Edit** below the ZapierApp.
  1. Select **Remove these permissions**.

## Related links

- [What are my options for audiences?](hlp_BA_CONC_Audiences_Options.md)
- [Predictive targeting](hlp_BA_CONC_PredictiveTargeting.md)
- [Combined lists: Mix and match audiences to reach just the right customers](hlp_BA_CONC_Audiences_CustomCombo.md)
