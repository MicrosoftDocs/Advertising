---
title: Connecting to third-party measurement partners
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn more about how to connect to third-party measurement partners.
---

# Connecting to third-party measurement partners

> [!NOTE]
> DoubleVerify and Integral Ad Science (IAS) measurement supports Display ads, Online Video ads, and Native ads (non-shopping). Performance Max isn't supported at this time.

Microsoft Advertising partners with third-party measurement providers that offer verification services and reporting from trusted sources, such as DoubleVerify and Integral Ad Science (IAS). These providers offer additional measurement and reporting capabilities that can help advertisers better understand the value of their Microsoft Advertising campaigns.

Third-party measurement providers present a range of services, such as verification, brand lift, and audience reach studies. You'll have access to their metrics after you set up third-party measurement.

Reports from third-party measurement providers supplement the standard reporting available in Microsoft Advertising. For more information about reporting, see [Understanding the Report Builder](hlp_BA_PROC_CreateReport.md).

> [!NOTE]
> DoubleVerify and IAS require different steps for setting up third-party measurement. For a list of frequently asked questions about DoubleVerify, see [Frequently asked questions about DoubleVerify](#frequently-asked-questions-about-doubleverify).

## Set up DoubleVerify

You must be an existing DoubleVerify customer to enable this measurement partner for your campaigns. Your DoubleVerify account and Microsoft Advertising account must be linked with a one-time code (or “link token”) generated in [DoubleVerify's Pinnacle platform](https://pinnacle.doubleverify.com/login) and saved in your Microsoft Advertising account.

- **Generate a link token for your Microsoft Advertising account**

  1. Sign in to [Pinnacle](https://pinnacle.doubleverify.com/login).
  1. Hover over **IQ Blueprint** and select **DV Campaign Automator**.

     > [!NOTE]
     > If you already have a DoubleVerify baseline set up, go to the next step. Otherwise, you should create a baseline in DoubleVerify's Pinnacle platform by selecting **Setting** > **Create New Setting** and then completing the one-time process.
  1. Select **Account Linking**.
  1. Select **Link DV Advertiser**.
  1. Select **Link Microsoft Advertising**.
  1. Enter the **Account ID** for your Microsoft Advertising account.

     > [!NOTE]
     > Your **Account ID** (AID) can be found in the URL for Microsoft Advertising when you first log in. In this example, the AID would be **123456789**: *https://ui.ads.microsoft.com/campaign/vnext/overview?aid=123456789&cid=987654321&uid=987654321*.
  1. Select which baseline settings you want to use.
  1. Select **Continue**.
  1. After reviewing and confirming, select **Everything looks good**.
  1. Copy or save the link token.

  To complete the account linking process, you now need to save the link token in your Microsoft Advertising account.

- **Save the link token in your Microsoft Advertising account**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options**.
  1. Below **DoubleVerify**, enter the **Link token**.
  1. Select **Save**.

     > [!NOTE]
     > If the link was successful, you will see a notification stating that **This measurement provider is activated for your account**.

  Next, you can either apply DoubleVerify to all new, eligible campaigns in your account or apply it to individual campaigns.

- **Enable DoubleVerify for all new, eligible campaigns in your account**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options**.
  1. Below **DoubleVerify**, select the checkbox next to **Enable DoubleVerify measurement for all new, eligible campaigns**.
  1. Select **Save**.

  > [!NOTE]
  > This option will only apply DoubleVerify to *newly created* campaigns. It will not retrospectively add DoubleVerify to existing campaigns.

- **Enable DoubleVerify for a single campaign**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Campaign settings**.
  1. Select the appropriate campaign.
  1. Below **Third-party measurement** in your Advanced settings, you should see a notification that DoubleVerify has been activated for your account. If it hasn't, you will need to activate it in **Settings** > **Account level options**.
  1. Select **Add**.
  1. Select **DoubleVerify** from the dropdown.
  1. Select **Save**.

## Set up Integral Ad Science

First, you need to locate your Tag URL. Then you can connect IAS to your ads.

<a id="locate-your-tag-url"></a>

## Locate your Tag URL

1. [Log in](https://go.microsoft.com/fwlink/?linkid=2234105) to your account in **IAS Signal**.
1. Go to **Campaigns** > **Campaign Setup**.
1. Create your campaign.
1. Add **Microsoft Advertising Network** as a media partner to your campaign.
1. Go to **Media Partner Blocking**.
1. Select **Monitoring**.
1. Finish setting up your campaign.
1. Select **Save**.
1. You'll be prompted to download the Microsoft Advertising Network tag in **Tag Manager**.
1. Go to **Tag Manager** to download the **Tag URL**.

This is an example of what your Tag URL will look like for Video ads: https://unified.adsafeprotected.com/v2/XXXXX/YYYYY (X is the Advertiser ID and Y is the Publisher ID).

This is an example of what your Tag URL will look like for display or Microsoft Audience Ads (non-shopping): https://pixel.adsafeprotected.com/rjss/st/XXXXX/YYYYY/skeleton.js (X is the Advertiser ID and Y is the Publisher ID).

### Connect IAS to your ads

1. When creating or editing your ad, choose from the list of **Third-party partners** below **Third-party measurement**.

   > [!NOTE]
   > Integral Ad Science (IAS) is currently the only available third-party measurement. More partners will be available soon.
1. Enter your **Tag URL**. See [Locate your Tag URL](#locate-your-tag-url) for instructions on locating your **Tag URL**.

   > [!NOTE]
   > When you enter your **Tag URL**, we automatically detect your Advertiser ID and Publisher ID. This information allows us to successfully connect third-party measurement. If we're unable to detect the Advertiser ID and Publisher ID from your **Tag URL**, then we can't connect third-party measurement. To fix this, you need to enter the correct **Tag URL**. See [Locate your Tag URL](#locate-your-tag-url) for instructions on locating your **Tag URL**.
1. Select **Add**.

<a id="frequently-asked-questions-about-doubleverify"></a>

## Frequently asked questions about DoubleVerify

- **Do I require an existing DoubleVerfiy (DV) account to access DV measurement and services?**

  Yes.

- **What DV services are enabled with this integration?**

  DV's viewability measurement and brand suitability services are enabled.

  DV's invalid traffic/fraud and geolocations services will be available in the coming months.

- **How do I access DV measurement reports?**

  DV reports are accessed through their Pinnacle UI. DV data is not yet available in Microsoft Advertising's reporting.

- **What type of campaigns are eligible for DV measurement?**

  DV measurement is currently only enabled for Display ads. Other Audience campaign ad types (Native ads and Online Video ads) are coming soon.

  > [!NOTE]
  > Targeting and bid strategy settings do not impact whether or not you can enable DV measurement for your campaigns.

- **Where can I find my Microsoft Advertising Advertiser ID (AID) so I can enter it into DV's Pinnacle platform?**

  This can be found in the web address when you first log in to Microsoft Advertising. In the example below, the AID would be **112395911**.

  https://ui.ads.microsoft.com/campaign/vnext/campaigns?**aid=112395911**&cid=252345163&uid=134123302

- **I have multiple Microsoft advertising accounts, but I want to enable DV for only one of my accounts. Is this possible?**

  Yes. Each account is individually linked using its own unique link token.

- **Can I link multiple DV advertisers to a single Microsoft advertising account?**

  No. Currently we don't support this.

- **Does Microsoft Advertising's integration with DV support multiple baseline settings?**

  Not currently. Only the default baseline settings are supported.

- **I have applied DV measurement following the above process—should I also upload DV monitoring tags at the ad level?**

  No, this could lead to double counting of impressions. Activating the integration and uploading DV monitoring tags will result in DV reporting and billing issues.

- **How can I unlink my Microsoft Advertising and DV accounts?**

  Follow these steps in Microsoft Advertising:

  1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options**.
  1. Below **DoubleVerify**, select the trash bin.
  1. Select **Save**.

- **What metrics should I be comparing between DV and Microsoft Advertising?**

  Customers are only billed for viewable impressions in Microsoft Advertising, so you can compare impression metrics in Microsoft Advertising's reporting with viewable impressions in DV's reporting.

- **Why am I seeing a difference between DV and Microsoft Advertising's reported impressions?**

  Some variations in measurement between platforms should be expected. For Microsoft-owned sites, the delta between reported impression and DoubleVerify views should be < 15%. For third-party supply, more variability is possible. To report a material measurability gap or discrepancy, please [contact Support](https://go.microsoft.com/fwlink/?linkid=398371).

  When comparing viewable impression count, we recommend looking at the total impressions served for a campaign. This helps to avoid discrepancies introduced by time zone differences between Microsoft Advertising and DV's reporting (which can have an especially large impact on daily splits).

- **How do DV and Microsoft Advertising define viewable impressions?**

  The default definition for viewable impressions used by both Microsoft Advertising and DV aligns with the Interactive Advertising Bureau (IAB): A viewable impression counts when 50% of pixels are in view for at least one second for Display and Native ads, and when 50% of pixels are in view for at least two seconds for Online Video ads.

  Custom viewability definitions are not supported within Microsoft Advertising. If a custom viewability definition is applied to a DV advertiser, please factor this in when comparing DV and Microsoft Advertising reporting.

- **How can I provide feedback on Microsoft Advertising's integration with DV?**

  Please share your feedback with [Support](https://go.microsoft.com/fwlink/?linkid=398371) or email the Measurement Product Team at measurementproduct@microsoft.com.

- **Where can I find more information on DV's measurement services?**

  Current DV clients should reach out to their appropriate account manager. Advertisers who are not current DV clients can reach out to sales@doubleverify.com.
