---
title: Setting up UET for consent mode
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Consent Mode allows you to adjust UET cookie access based on consent status.
---

# Setting up UET for consent mode

> [!IMPORTANT]
> Ensure proper consent transmission for users visiting from the European Economic Area (EEA), the United Kingdom, and Switzerland by implementing [Consent Mode](hlp_BA_CONC_UET_Consent.md) or the [Transparency and Consent Framework (TCF)](hlp_BA_CONC_UET_TCF.md) with your UET tags to avoid any negative impact on conversion attribution and remarketing segments. This policy reflects the requirements of the EU ePrivacy Directive and the General Data Protection Regulation (GDPR). [Learn more](hlp_BA_CONC_UET_ConsentFAQ.md)

UET Consent Mode lets you adjust UET cookie access based on the consent status of your users. This enhances the privacy capabilities of UET and gives you control over whether first and third-party cookies are stored.

For the purposes of UET Consent Mode, first-party cookies are those created by the advertiser domain (your website), and third-party cookies are created by Microsoft Advertising (Bing.com).

> [!IMPORTANT]
> - If you are using the [UET - Clarity integration](hlp_BA_CONC_UET_Clarity.md), you must set the consent setting for Clarity separately. [Learn more about Clarity cookie consent.](https://go.microsoft.com/fwlink/?linkid=2174133)
> - It is up to you to comply with local regulations when collecting and managing consent.

## Consent Management Platforms (CMPs) that support our Consent Mode

If your website uses any of these CMPs, follow the corresponding instructions to ensure Consent Mode is activated:

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

## How it works

Consent Mode is set via a property in UET called *ad_storage*. The possible values for *ad_storage* are:

| Value for *ad_storage* | Description |
| --- | --- |
| ***granted*** | First and third-party cookies may be read and written for UET. If no default is set, UET uses *granted* by default. |
| ***denied*** | First-party cookies are not read nor written for UET. Third-party cookies are not written. Third-party cookies are read-only for fraud and spam purposes—not for advertising purposes. |

## Consent Mode implementation: Basic or Advanced setup

Advertisers can implement Consent Mode using either the Basic or Advanced configuration.

Microsoft Advertising recommends Advanced Consent Mode as the technical best practice for advertisers. Advanced Consent Mode is designed to maximize campaign performance by enabling enhanced data modeling while supporting compliance with privacy laws by respecting user preferences.

*Basic Consent Mode* ensures that no tags are fired and no data collection occurs until a user explicitly grants consent.

*Advanced Consent Mode* enables tags to load immediately, and since consent status defaults to denied, anonymized data is collected until explicit consent is granted. If consent is denied, only anonymized data is collected and later aggregated prior to modeling.

| Attribute | Basic Consent Mode | Advanced Consent Mode |
| --- | --- | --- |
| **Tag Loading** | Blocked until the user grants consent | Loads immediately with consent state set to denied by default before user makes a choice |
| **Data Collection** | No data is sent before a user grants consent | If consent is denied, only anonymized data is collected and later aggregated prior to modeling |
| **Consent Status** | Set after user grants consent | Defaults to denied before user makes a choice, updates based on user choice |
| **Data Modeling** | Generic modeling | More precise modeling tailored to the advertiser |

## How to check if Consent Mode is working

To validate your Consent Mode implementation:

- *Validate Setup* — Use the validation steps provided in this documentation
- *Monitor Conversion Tracking* — Review your conversion data to ensure proper tracking

## Need help implementing Consent Mode?

Visit Microsoft Advertising Help Center or contact your account team for support.

> [!NOTE]
> Any information provided by Microsoft Advertising is for informational purposes only and does not constitute legal advice. Customers are responsible for ensuring compliance with applicable laws and regulations.

## Example setup for AdvancedConsent Mode

> [!NOTE]
> The following example is for Advanced Consent Mode. For Basic Consent Mode, skip step 1 and fire your UET tag where consent is *granted* (step 2a below) after you obtain user consent.

1. Set your default consent setting on every page of your website

   1. Use the following code on each page load to set your default consent setting:

      ```
      // UET tag is added here
      // You can set default Consent Mode right after the UET tag 
      <script>
      window.uetq = window.uetq || [];
      window.uetq.push('consent', 'default', {
          'ad_storage': 'denied'
          });
      </script>    
      ```
   1. Set *ad_storage* to *denied* by default.
1. Once the user provides or denies consent, update the consent setting on every page:

   1. Use the following code on each page to update the *ad_storage* property: 
   ```
   <script> 
   window.uetq = window.uetq || []; 
   window.uetq.push('consent', 'update', { 
   'ad_storage': 'granted' }); 
   </script>
   ```
   1. Call this script on subsequent pages for as long as the consent applies.

> [!NOTE]
> - We recommend that you use the consent script in your <head> tags so that the Consent Mode is set by default and updated when a user updates their consent settings.
> - You can prevent UET from sending events to Microsoft by setting the *_uetmsdns* cookie to a value of 1. [Learn more](hlp_BA_CONC_UET_FAQ_2.md)

> [!IMPORTANT]
> - If you use Consent Mode, you should continue to pass either a *granted* or *denied* value for *ad_storage* on every page based on your website visitors' cookie consent choices.
> - For most countries, if the consent setting is not set, UET uses *granted* by default.
> - In European Economic Area countries, along with the UK and Switzerland, Microsoft Advertising is enforcing Consent Mode. This will lead to conversion loss if the *granted* signal is not passed to UET when a user accepts consent. In scenarios where Consent Mode is enforced, the default value is *denied*.

## Reading all available consent signals

If you don't implement Consent Mode directly on your website, we support reading consent signals from all available sources, such as TCF (Transparency and Consent Framework), and other standard mechanisms.

This approach simplifies the onboarding process and enables automatic consent handling—provided that:

- Your website includes a cookie banner.
- You use a standard consent solution.

If you prefer to disable this automatic logic, you can do so by setting the following parameter during UET tag initialization: *enableAutoConsent: false*

> [!NOTE]
> We recommend explicitly implementing Consent Mode or TCF for full control.

Example UET tag with automatic consent disabled:

```
<script> 
(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[] ,f=function(){var o={ti:"TAG_ID_HERE", enableAutoSpaTracking: true, enableAutoConsent: false}; o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")} ,n=d.createElement(t),n.src=r,n.async=1,n.onload=n .onreadystatechange=function() {var s=this.readyState;s &&s!=="loaded"&& s!=="complete"||(f(),n.onload=n. onreadystatechange=null)},i= d.getElementsByTagName(t)[0],i. parentNode.insertBefore(n,i)})(window,document,"script"," //bat.bing.com/bat.js","uetq"); </script>
```

<a id="validating-consent-mode-implementation-with-uet-tag-helper-browser-plugin"></a>

## Validating Consent Mode implementation with UET Tag Helper browser plugin

Verify the implementation of Consent Mode within UET using the UET Tag Helper.

**Microsoft Edge:**
1. Download the [UET Tag Helper](https://go.microsoft.com/fwlink/?linkid=2134986) in Edge.
1. Select **Get**, and then **Add extension**. <br> By installing the UET Tag Helper, you agree to the [Microsoft Service Agreement](https://go.microsoft.com/fwlink/?linkid=789244) and [Microsoft Privacy Statement](https://go.microsoft.com/fwlink/?linkid=517636).
1. Once installed, you will see the UET Tag Helper icon in Edge.

**Google Chrome:**
1. Download the [UET Tag Helper](https://go.microsoft.com/fwlink/?linkid=847466) in Chrome.
1. Select **Add to Chrome**, and then **Add extension**. <br> By installing the UET Tag Helper, you agree to the [Microsoft Service Agreement](https://go.microsoft.com/fwlink/?linkid=789244) and [Microsoft Privacy Statement](https://go.microsoft.com/fwlink/?linkid=517636).
1. Once installed, you will see the UET Tag Helper icon in Chrome.

   :::image type="content" source="media/BA_ScreenCap_UETTagHelperIcon.png" alt-text="UET Tag Helper icon in Chrome bar.":::

Once the UET Tag Helper is installed, verify UET Consent Mode.

1. **Inspect the asc parameter**

   - The asc parameter within UET events indicates the status of user consent.
   - Possible values for this parameter are:

     - *denied*
     - *granted*

   :::image type="content" source="media/BA_Conc_UET_Consent_asc.png" alt-text="asc values.":::
1. **Expected behavior**

   - Before user consent is given

     - UET fired, the consent state (*asc*) is: *Denied* (preferred).
     - OR UET events shouldn't be fired
   - After user consent is provided

     - The *asc* parameter should be: *granted* for all subsequent UET events.
1. **Validation**

   - Use the UET Tag Helper browser plugin to monitor UET events.
   - Ensure that the *asc* parameter exists for all UET events and reflects the correct consent status as outlined above.

<a id="validating-consent-mode-implementation-with-uet-dashboard"></a>

## Validating Consent Mode implementation with UET Dashboard

The UET Dashboard includes a Consent signal column to help advertisers quickly assess whether valid consent signals are being captured for each UET tag event type. This feature supports compliance with privacy regulations in the European Economic Area (EEA), the United Kingdom (UK), and Switzerland by surfacing signal health directly in the dashboard. Consent signal is evaluated per event type—so each row (such as Page Load or Custom Event) is assessed independently.

Consent status is displayed using four clear labels: Healthy, Moderate, Missing, and “-”. A “Healthy” status means more than 75% of events from the past seven days include a valid consent signal. “Moderate” indicates coverage between 0% and 75%, while “Missing” means no valid signals were detected. The “-” symbol appears when the signal status is unclear.

1. From the navigation menu on the left, select **Conversions**.
1. Review the **Consent status** column in the **Tag Summary** header:

   - *Compliant*: Consent signals are detected in most or all UET events, indicating proper setup.
   - *Needs Attention*: Consent signals are missing or incomplete, suggesting the tag setup needs to be fixed.

1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
1. Check the status listed in the **Consent Signal** column to verify that consent signals are appropriately configured for the UET tag:

   - *Healthy*: Valid consent signal present in greater than 75% of events in the last 7 days.
   - *Moderate*: Valid consent signal present in greater than 0% and less than or equal to 75% of events in the last 7 days.
   - *Missing*: Consent signal present in 0% of events in the last 7 days.

1. From the navigation menu on the left, select **Conversions** and select the **Test your tag** tab.
1. Check the status listed in the **Consent Status** column to verify whether your UET tag is correctly transmitting consent information for users:

   - *Present*: A valid consent signal is present in the event, on the specified URL, during this session.
   - *Not present*: No consent signal is present in that event.

## Consent mode and third-party measurement

Consent mode controls whether UET cookies are set and read based on user consent signals. When implemented correctly, it helps support compliance with applicable privacy laws, such as CCPA and CPRA.

Using UET data for measurement on platforms such as LinkedIn Ads doesn't change how consent mode works or your responsibilities for managing user consent.
