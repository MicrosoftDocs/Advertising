---
title: FAQ - UET and user consent
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Microsoft Advertising requires advertisers using our Universal Event Tag (UET) to provide user consent signals, by implementing either Consent Mode for UET or the IAB's Transparency and Consent Framework (TCF) on their websites.
---

# FAQ - UET and user consent

> [!NOTE]
> Per the terms of the [Microsoft Advertising Agreement](hlp_BA_CONC_Policy_AgreementPDF.md): In the European Economic Area and United Kingdom or other jurisdictions where data privacy laws require consent as a lawful basis for processing personal data and/or for activating the UET tag, you must obtain consent in the manner dictated by applicable data privacy laws before activating the UET tag on your properties and/or disclosing any personal data to Microsoft.

## Overview

- **What is Microsoft Advertising asking us to do?**

  Microsoft Advertising requires advertisers using our Universal Event Tag (UET) to provide user consent signals, by implementing either Consent Mode for UET or the IAB's Transparency and Consent Framework (TCF) on their websites. This ensures that Microsoft Advertising will only collect and process end users' data through UET in line with their wishes, i.e., when they have given their consent. This also ensures compliance with the applicable terms of service, regulations and industry best practices.

  If you implement Consent Mode for UET or the TCF, you will maintain accurate conversion tracking, retargeting, and other essential campaign features, preventing potential disruptions to campaign performance as Microsoft begins enforcing these requirements.

- **What are the consequences if we do not implement Consent Mode or TCF for UET?**

  If you are using UET, but have not implemented Consent Mode or the TCF, then we will stop tracking your UET-based conversions and populating your remarketing lists.

  This will negatively impact the performance of your campaigns, as critical tracking and targeting capabilities will be lost, as will other features that rely on UET data. Therefore, it's essential to comply with these requirements to avoid disruption to your Microsoft Advertising strategy and ensure your campaigns continue to perform effectively.

  Implementing Consent Mode or TCF will enable us to continue tracking conversions, retargeting, and other features via UET although you may observe a drop in these volumes depending on user cookie consent choices.

- **Should I use Consent Mode, TCF or both?**

  Either Consent Mode or TCF can be used with Microsoft Advertising, but you should never use both simultaneously. Choose the option that best aligns with your compliance needs and technical setup.

## Consent Mode

- **What is Consent Mode?**

  Consent Mode allows you to adjust how Microsoft tags behave based on the consent status of users to maintain accurate conversion tracking.

- **How can I use Consent Mode with Microsoft Advertising?**

  Consent Mode can be integrated with Microsoft Advertising through UET by following the directions on [this page](hlp_BA_CONC_UET_Consent.md). You should always ensure that consent signals are passed to Microsoft to track conversions properly.

- **Does this mean I only need to send the value *ad_storage*, or do I need to send additional values like *ad_user_data* or *ad_personalization*?**

  Currently, we are only planning to enforce consent based on the *ad_storage* value. However, you can choose to send additional values such as *ad_user_data* and *ad_personalization* depending on your specific needs and compliance requirements.

- **Where should the UET Consent Mode script be placed on the website?**

  Ideally, the UET Consent Mode script should be placed as high as possible within the head section of the webpage. The default needs to be set before the page is fully loaded.

- **Should UET be loaded before a user has interacted with the banner and given consent?**

  Yes, UET must be loaded before the user interacts with the consent banner, but the default setting for Consent Mode must be set to *Denied* to prevent processing information without consent. Once the user gives consent, this setting should be updated to *Granted.* If consent is not given, the *Denied* setting will remain as is.

- **Can I simply use Consent Mode from Google Tag Manager (GTM)?**

  Google provides an API for retrieving Consent Mode information, and we are in the process of supporting Google Consent Mode through the official UET template. It will then work automatically when the advertiser uses the UET GTM template and the CMP is integrated with Google Consent Mode.

  Additionally, we have created a [GTM guide](hlp_BA_CONC_UET_DynamicConsentGTM.md) to assist with custom implementation.

- **How does Microsoft Advertising handle consent signals received through UET for Consent Mode?**

  If Microsoft Advertising receives a consent signal, as described in [Setting up UET for consent mode](hlp_BA_CONC_UET_Consent.md), Microsoft Advertising will honor that signal.

- **Which configuration is preferred for advertisers implementing Consent Mode, Basic or Advanced?**

  Microsoft Advertising recommends Advanced Consent Mode as the technical best practice for advertisers. Advanced Consent Mode is designed to maximize campaign performance by enabling enhanced data modeling, while supporting compliance with privacy laws through respect for user preferences.

  | Attribute | Basic Consent Mode | Advanced Consent Mode |
  | --- | --- | --- |
  | **Tag Loading** | Blocked until the user grants consent | Loads immediately with consent state set to denied by default (or can be implemented otherwise) |
  | **Data Collection** | No data is sent before a user grants consent | If consent is denied, only anonymized data is collected and later aggregated prior to modeling. |
  | **Consent Status** | Set after user grants consent | Defaults to denied (or can be implemented otherwise), updates based on user choice |
  | **Data Modeling** | Generic modeling | More precise modeling tailored to the advertiser |

## Transparency and Consent Framework (TCF)

- **What is the Transparency and Consent Framework (TCF)?**

  TCF is a standard framework developed by IAB Europe that allows websites to obtain, manage, and share user consent signals in a way that complies with GDPR and other privacy regulations.

- **How can I use TCF with Microsoft Advertising?**

  TCF can be integrated with Microsoft Advertising, ensuring that user choices about how Microsoft Advertising may use their data are properly recorded and shared with Microsoft. To fully implement TCF with Microsoft Advertising, follow these steps:

  - Implement a TCF-Compliant Consent Banner: Ensure your website uses a TCF-compliant consent management platform (CMP) to display a consent banner. This banner must clearly inform users about data processing activities and request their consent for these activities.
  - Add Microsoft and Xandr as Vendors: Within your TCF-compliant CMP, add Microsoft (Vendor ID 1126) and Xandr (Vendor ID 32) as authorized vendors. This ensures that the consent banner will ask users for their consent to Microsoft's and Xandr's processing of their data.
  - Ensure Consent for Specific Purposes: Make sure that the consent banner requests user consent for the following TCF purposes:

    - Purpose 1: Store and/or access information on a device
    - Purpose 2: Select basic ads
    - Purpose 3: Create a personalized ads profile
    - Purpose 4: Select personalized ads
    - Purpose 7: Measure ad performance
    - Purpose 9: Apply market research to generate audience insights
    - Purpose 10: Develop and improve products

  By following these steps, you ensure that Microsoft Advertising will receive signals indicating whether or not a user has given their consent to each of these purposes. Where they have consented, it means that Microsoft Advertising can process user data in compliance with the TCF documentation, allowing you to maintain accurate tracking and reporting while adhering to privacy regulations.

<a id="consent-verification"></a>

## Consent verification

- **Why is my site performance impacted?**

  A UET tag associated with your site has violated the applicable [Microsoft Advertising terms](hlp_BA_CONC_Policy_AgreementPDF.md) and [policies](hlp_BA_CONC_Policy_LegalPrivacyPersonalization.md) by utilizing Microsoft device identifiers on end-user devices without proper consent.

- **Which cookies are you referring to specifically?**

  One or more of the following cookies were set without the appropriate user consent: *MUID*, *_uetvid*, *_uetsid*, *_uetsid_exp*, *_uetvid_exp*, and/or *MSPTC*.

- **In what instances will Microsoft stop tracking my UET-based conversions and populating my remarketing list?**

  We review various criteria, including but not limited to the following:

  - One or more Microsoft cookies are set before interaction with the cookie banner.
  - One or more Microsoft cookies are set after the user clicks on **Refuse**.

- **What happens if my site is incorrectly instrumenting consent signals?**

  If your site is incorrectly instrumenting consent signals, then Microsoft device identifiers will neither be set nor read on end-user devices visiting your site. This will impact your conversion tracking, remarketing/retargeting, and thereby impacting advertising performance.

- **How can I resolve the non-compliance issue?**

  To resolve this issue, please ensure your site has an appropriate consent banner and provides a consent signal either through [TCF](hlp_BA_CONC_UET_TCF.md) or [UET Consent Mode](hlp_BA_CONC_UET_Consent.md).

## Other questions

- **Will Microsoft Advertising use modeled conversions to help estimate the performance of campaigns?**

  Yes, we plan to release modeled conversions soon. This feature will help estimate campaign performance when full conversion tracking isn't possible due to user consent choices or data limitations. Modeled conversions will use aggregated data to provide a fuller picture of campaign effectiveness. We'll share more details as the release date approaches.

- **How can we measure the impact of modeled conversions?**

  We will provide an uplift report which will indicate the conversion uplift gained from Consent Mode implementation.

- **Is there a list of certified Consent Management Platforms (CMPs) supported by UET?**

  Yes, use one of the following CMPs with support for UET Consent Mode integrated into these solutions:

  - [Complianz](https://nam06.safelinks.protection.outlook.com/?url=https%3A%2F%2Fcomplianz.io%2Fmicrosofts-universal-event-tracking-uet-consent-mode%2F%3Futm_source%3Dmcr%26utm_medium%3Demail%26utm_campaign%3Duet%26utm_id%3DQ424&data=05%7C02%7Cv-strelitzsa%40microsoft.com%7Cd0286d3fa4554c4fd38308dd65616218%7C72f988bf86f141af91ab2d7cd011db47%7C1%7C0%7C638778191124527192%7CUnknown%7CTWFpbGZsb3d8eyJFbXB0eU1hcGkiOnRydWUsIlYiOiIwLjAuMDAwMCIsIlAiOiJXaW4zMiIsIkFOIjoiTWFpbCIsIldUIjoyfQ%3D%3D%7C0%7C%7C%7C&sdata=bLlpxWgvvciWHK3XBjrIbmm4ympwhIALJcOri1Ekxfk%3D&reserved=0)
  - [Consent Manager](https://nam06.safelinks.protection.outlook.com/?url=https%3A%2F%2Fhelp.consentmanager.net%2Fbooks%2Fcmp%2Fpage%2Fworking-with-microsoft-advertising-uet-consent-mode%3Futm_source%3Dmsuet&data=05%7C02%7Cv-strelitzsa%40microsoft.com%7Cd0286d3fa4554c4fd38308dd65616218%7C72f988bf86f141af91ab2d7cd011db47%7C1%7C0%7C638778191124515058%7CUnknown%7CTWFpbGZsb3d8eyJFbXB0eU1hcGkiOnRydWUsIlYiOiIwLjAuMDAwMCIsIlAiOiJXaW4zMiIsIkFOIjoiTWFpbCIsIldUIjoyfQ%3D%3D%7C0%7C%7C%7C&sdata=7w7dfyv%2BxvTnMT%2FyCYjk26KB0d%2FsKZNUlXSOvQBKfqM%3D&reserved=0)
  - [Consentik](https://docs.consentik.com/integrations/microsoft-universal-event-tracking-consent-mode-integrated)
  - [Consentmo](https://support.consentmo.com/en/article/microsoft-uet-consent-mode-integration-12ti1jd/)
  - [Cookiebot](https://support.cookiebot.com/hc/en-us/articles/12452886794908-Setting-up-Microsoft-Universal-Event-Tracking-for-Consent-Mode)
  - [CookieFirst](https://support.cookiefirst.com/hc/en-us/articles/20923321993501-Microsoft-Ads-consent-mode)
  - [CookieHub](https://www.cookiehub.com/microsoft-uet)
  - [Cookie Information](https://cookieinformation.com/resources/blog/implement-microsoft-uet-consent-mode/)
  - [CookieTractor](https://www.cookietractor.com/documentation/manage-cookies/microsoft-uet-consent-mode)
  - [CookieYes](https://www.cookieyes.com/documentation/microsoft-uet-consent-mode/)
  - [Didomi](https://www.didomi.io/blog/microsoft-universal-event-tracking-uet-consent-mode)
  - [Iubenda](https://www.iubenda.com/en/help/169657-microsoft-universal-event-tracking-consent-mode)
  - [My Agile Privacy](https://www.myagileprivacy.com/en/how-to-implement-microsoft-consent-mode-with-my-agile-privacy/)
  - [OneTrust](https://my.onetrust.com/s/article/UUID-2229ff55-895a-11da-1b5f-79e1785b6e02?language=en_US)
  - [Pandectes](https://help.pandectes.io/en/article/microsoft-universal-event-tracking-consent-mode-1pg9j1a/)
  - [Seers AI](https://seerssupport.zendesk.com/hc/en-us/articles/19858529288860-How-to-Set-Up-Microsoft-Consent-Mode-V2-with-Seers-AI)
  - [Tealium](https://docs.tealium.com/client-side-tags/microsoft-advertising-universal-event-tracking-uet-tag/)
  - [TrustArc](https://trustarchelp.zendesk.com/hc/en-us/articles/40951290261523-Cookie-Consent-Manager-Microsoft-UET-Integration)
  - [UserCentrics](https://support.usercentrics.com/hc/en-us/articles/16979383837468-Setting-up-Microsoft-Universal-Event-Tracking-for-Consent-Mode)
  - [WebToffee](https://www.webtoffee.com/docs/gdpr-plugin/configure-uet-consent-mode-for-microsoft-advertising/)
  - [Google Tag Manager](hlp_BA_CONC_UET_DynamicConsentGTM.md)

  > [!NOTE]
  > Although Google Tag Manager (GTM) is not a Consent Management Platform (CMP), it integrates with most CMPs to get consent signals. Follow the instructions provided in our [GTM UET official template"](hlp_BA_CONC_UET_DynamicConsentGTM.md) to configure sending consent signals.

- **How can I verify that I have implemented UET Consent Mode or TCF correctly?**

  The following checks can be made on your website to verify that your implementation is working correctly when the UET tag is fired.

  1. UET Tag Helper

     - Documentation: [Setting up UET for Consent Mode](hlp_BA_CONC_UET_Consent.md)
     - Consent Mode: To validate your UET Consent Mode implementation via the UET Tag Helper, check the asc parameter in the Page Load event once the UET tag is fired. This should be set to “G” when consent is granted and “D” when consent has been denied
     - TCF: To validate your UET TCF implementation via the UET Tag Helper, check the TCF parameter in the Page Load event - if consent is granted, you will see “&ms=G”
  1. Web Browser Checks - Developer Tools:

     - The following code snippets can be executed in the Browser Developer Tools Console:

       - For TCF: window.uetq.uetConfig.tcf.enabled (will return “true” if the UET TCF code has been implemented correctly)
       - For UET Consent Mode:

         - window.uetq.uetConfig.consent.adStorageAllowed (will return “true” when cookie consent has been granted, “false” when cookie consent has been denied or before cookie consent is accepted)
         - window.uetq.uetConfig.consent.enabled (will return “true” if the UET Consent Mode is correctly implemented and enabled)
         - window.uetq.uetConfig.consent.enforced (will return “false” after accepting/denying cookies)
         - For instructions on how to open and use Developer Tools go [here](https://learn.microsoft.com/en-us/microsoft-edge/devtools/overview).

- **Why am I being impacted by consent enforcement when the official date to adopt Consent Mode is/was May 5, 2025?**

  Our internal review has identified a violation of Section 9. b. of the [Microsoft Advertising Agreement](hlp_BA_CONC_Policy_AgreementPDF.md) concerning your deployment of the UET tag on your website, which appears to be activated without securing user consent. Given this violation, you must adopt Consent Mode as soon as possible. Starting May 5, we will be enforcing all clients with end-users in the EEA, UK, and Switzerland to send Consent Mode, regardless of whether or not they are in violation.
