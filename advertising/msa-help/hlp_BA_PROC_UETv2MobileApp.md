---
title: Track Mobile App Installs as Conversions
description: Find out how to track every time someone installs your app as a conversion.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Track mobile app installs as conversions

What happens after a customer clicks on your app install ad or app extension? When you create a conversion goal to track mobile app installs you’ll discover:

- The ad campaigns that are most effective
- The keywords that lead to better conversions
- The ROI of your advertising dollars
- The audiences that have higher conversions
- How many people install your app

With mobile app install goals, you'll use the app-specific URL that is provided by a Microsoft Advertising-certified partner. Universal Event Tracking (UET) tags are not required or supported for mobile app installs. One conversion goal is required per app platform for each app, per manager account. Keep in mind that Microsoft Advertising treats both **app URL** and **measurement URL** the same way, so even if you don’t manually set up a conversion goal, your app install ad or app extension will still be tracked.

All you have to do is create an [app extension](hlp_BA_CONC_AdExtensionAppExtension.md) or an [app install ad](hlp_BA_CONC_AppInstallAds.md), and then create a mobile app install conversion goal.

## Create a measurement URL

Microsoft Advertising partners with third-party companies to help you create tracking/measurement URLs. Each partner has a template of exactly what Microsoft Advertising expects the tracking/measurement URL to look like, and the only mandatory parameter required is the **MSCLKID**.

You’ll need one measurement URL for each respective app in the app store. Visit one of the following sites to create an app-specific measurement URL to track installs from app extensions and app install ads as conversions:

- [Adjust](https://help.adjust.com/en/article/measure-web-campaigns#set-up-bing-ads-web-campaign)
- [Airbridge](https://help.airbridge.io/en/guides/microsoft-advertising)
- [AppsFlyer](https://go.microsoft.com/fwlink/?linkid=526951)
- [Branch](https://go.microsoft.com/fwlink/?linkid=2074143)
- [Kochava](https://go.microsoft.com/fwlink/?linkid=526947)
- [Singular](https://go.microsoft.com/fwlink/?linkid=2006381)

## Common mistakes

Before saving your tracking template, it must pass specific validation rules to ensure accuracy:

- **Single “?” requirement:** The URL must contain only one “?” symbol. Any additional query parameters should be appended with “&”.
- **Mandatory {lpurl} parameter:** Your tracking template must include the {lpurl} parameter, which is essential for directing users to the correct landing page.
- **Correct advertiser app ID:** Ensure the tracking template includes the correct advertiser app ID.

> [!NOTE]
> - *Correct usage of ? symbol:* Use ?url={lpurl}&type=1 if the URL has no parameters. Use &url={lpurl}&type=1 if parameters already exist.
> - *Common error:* Using ? instead of & when parameters are already present, which breaks the URL structure.
> - *Verification tip:* Ensure the tracking template includes only one ?. All other parameters must use &.

## Recommended tracking templates for mobile measurement partners (MMP)

To ensure accurate install tracking, each MMP has a recommended tracking template format. These templates not only adhere to our validation rules, but also help ensure accurate attribution and seamless data integration. In cases where advertisers use their own templates that pass these checks, saving is allowed with a warning prompt suggesting the recommended templates below:

> [!NOTE]
> Replace placeholder tokens like {PUT_ADVERTISER_APP_ID} or {PUT_APP_CODE} with the actual values provided by your measurement partner.

| Mobile measurement partner (MMP) | Recommended tracking template |
| --- | --- |
| **AppsFlyer** | https://app.appsflyer.com/{PUT_ADVERTISER_APP_ID}?pid=bingsearch_int&clickid={msclkid}&af_c_id={OCID}&lpurl={lpurl}&clickid={msclkid}<br><br>**OR**<br><br>https://app.appsflyer.com/{PUT_ADVERTISER_APP_ID}?pid=mssearchads_int&af_siteid=msa&c={Campaign}&af_c_id={CampaignId}&af_ad_id={AdId}&af_adset={AdGroup}&af_adset_id={AdGroupId}&af_channel={Network}&af_sub1={msclkid}&af_sub2={Device}&af_sub3={MatchType}&af_sub4={QueryString}&af_sub5={OrderItemId}&af_click_lookback=7d&af_keywords={keyword}&clickid={msclkid}&url={lpurl}&type=1 |
| **Adjust** | https://app.adjust.com/{PUT_ADVERTISER_APP_ID}?campaign={Campaign}&adgroup={AdGroup}&creative={TargetId}&r={lpurl}&install_callback=bing_cb{msclkid} |
| **Airbridge** | http://bat.bing.com/action/aips?tmstmp={eventTimestampInSec}&term_id={@trackingLink.term_id}&dappid={app.osAppID}&sappid={app.osAppID}&event=install&plat={device.platform}&device={device.osRaw}&devicetype={device.deviceType}&devicemodel={device.deviceModel}&devicemanufacturer={device.manufacturer}&bclid={attributionResult.attributedClickID}&ea=install&attvenid=1021 |
| **Branch** | https://{PUT_ADVERTISER_APP_ID}.app.link/{PUT_APP_CODE}?%243p=a_bing_ads&~ad_id={AdId}&~ad_set_id={AdGroupId}&~ad_set_name={AdGroup}&~campaign={Campaign}&~campaign_id={CampaignId}&~click_id={msclkid}&~keyword={keyword:default}&url={lpurl} |
| **Kochava** | https://control.kochava.com/v1/cpi/click?campaign_id={REPLACE_WITH_CAMPAIGN}&network_id={REPLACE_WITH_NETWORK}&site_id=none-provided&device_id=device_id&click_id={msclkid}&ad_platform=m_web |
| **Singular** | https://{PUT_ADVERTISER_APP_ID}.sng.link/{PUT_APP_CODE}/{PUT_APP2_CODE}?_smtype=3&aifa=ADIA&kw_match={MatchType}&pscn={Adgroup}&pcn={CampaignId}&pcid={CampaignId}&pscid={AdgroupId}&kw={TargetId}&cl={msclkid}&url={lpurl} |

## Create a conversion goal for mobile app installs

Now that you have your measurement URL and other tracking details prepared, you can create a mobile app install goal.

1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
1. Select **Create**.
1. Select **Mobile app install**, and then select **Next**.
1. Select the **Goal Category** and the **Goal Type**.
1. Enter a name for your goal, select the **App platform**, and then enter the **App ID**.
1. Optional: You can assign a **Revenue value** to set how much each conversion is worth to your business.

   > [!NOTE]
   > Variable revenue is not supported.
1. Optional: You can enter a conversion period under **Conversion window** to track up to 90 days in the past.
1. Select **Save**.

## How a mobile app install is tracked

- Once you enter a measurement URL from the partner, Microsoft Advertising appends a parameter called **MSCLKID** to that URL during ad delivery. When someone taps on your ad to install the app, the call goes to the partner which logs the **MSCLKID** and redirects to the app store.
- After your app is installed and opened for the first time, the partner is notified and attributes the conversion.
- The partner uploads conversion goal data back to Microsoft Advertising using the **clickID** and **appID** as the keys.
- Microsoft Advertising identifies the goals associated with the **app ID**, checks if the clicks are in the conversion window, and associates the conversion with the app extension.

## Remove an app install conversion goal

When you include app installs as conversions, it will create a goal for you. If you decide to not include app installs as conversions later, keep in mind the goal must be disabled through **Tools** > **Conversions** > **Edit conversion goal**, and then uncheck **Include in Conversions**. If you decide not to report app installs, enter the app URL from the Windows Store, the Apple App Store, or Google Play.
