---
title: FAQ - Universal event tracking
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Universal Event Tracking (UET) is a useful way to track what happens after someone has clicked on your ad. Here, find some common user questions, tips, and best practices when getting started with UET.
---

# FAQ - Universal event tracking

Universal event tracking (UET) is a useful way to track what happens after someone has clicked on your ad. Here, find some common user questions, tips, and best practices when getting started with UET:

## FAQ

- **What is UET and how does it related to conversion tracking and remarketing features?**

  Universal Event Tracking (UET) is a mechanism for advertisers to report user activity on their websites to Microsoft Advertising by installing one site-wide tag. UET is a prerequisite for advertisers to track conversions and/or do remarketing. Once the UET tag is installed by the advertiser across their website, the tag reports user activity on the advertiser website to Microsoft Advertising. Advertisers can then create conversion goals to specify which subset of user actions on the website qualify to be counted as conversions. If Microsoft Advertising finds a match between a conversion goal and the user activity logged by the UET tag installed on their website, it counts a conversion. Similarly, advertisers can create remarketing lists based on user activity on website and Microsoft Advertising matches the list definitions with UET logged user activity to put users into those lists.

  [Learn more about conversion tracking](hlp_BA_CONC_UETv2HowCTWorks.md)

  [Learn more about remarketing](hlp_BA_CONC_Remarketing_FAQ.md)

- **Which tag management systems can I use when working with UET?**

  UET will work with all industry ready tag management systems. Here is the current list of (and links to instructions for) tested and supported tag managers:

  - [Google Tag Manager](hlp_BA_PROC_UET_TMS_GTM.md)
  - [Qubit Opentag](hlp_BA_PROC_UET_TMS_Qubit.md)
  - [Tealium](hlp_BA_PROC_UET_TMS_Tealium.md)
  - [Ensighten](hlp_BA_PROC_UET_TMS_Ensighten.md)
  - [Signal](hlp_BA_PROC_UET_TMS_Signal.md)
  - [Adobe Dynamic Tag Manager](hlp_BA_PROC_UET_TMS_AdobeDTM.md)
  - [Adobe Experience Platform](hlp_BA_PROC_UET_TMS_AdobeLaunch.md)

- **Which website platforms can I use when working with UET?**

  UET is designed to work with all major website platforms. Here is the current list of (and links to instructions for) tested and supported platforms that allow you to install UET tags:

  - [BigCommerce](hlp_BA_PROC_UET_WebPlatform_BigCommerce.md)
  - [Shopify](hlp_BA_PROC_UET_WebPlatform_Shopify.md)
  - [WordPress.com](hlp_BA_PROC_UET_WebPlatform_WordPress.md)
  - [Wix](hlp_BA_PROC_UET_WebPlatform_Wix.md)

- **How do I validate if my UET tag is set up properly?**

  See [this troubleshooter](hlp_BA_CONC_UET_TroubleshootCT.md) to find out how to validate if your UET tag is set up properly.

- **Should I update my existing UET tags to the new syntax?**

  We recommend doing so to take advantage of the new syntax's benefits. [Learn more about the new syntax.](hlp_BA_CONC_UETv2SyntaxUpdate.md)

- **When should I be creating more than one UET tag?**

  See [Reasons for creating more than one UET tag](hlp_BA_CONC_UETv2MutliTags.md) to find if you should create more than one UET tag.

- **Are the tags SSL compliant? If so, how does it work?**

  Yes, the tags are SSL compliant. The way it works is that it reads the protocol of whatever page it's placed on (http or https) and matches the protocol.

- **What data does UET collect once I install it on my website?**

  UET collects the following data and Microsoft Advertising retains it for 390 days. UET will also collect the IP address and the Microsoft cookie (with an expiration date of 13 months). This cookie contains a GUID assigned to the user’s browser, and/or an ID assigned to a user as long as it authenticated through their Microsoft account. In general, the cookie in the relevant domain and IP address are always passed with every http request and not just via UET. Microsoft Advertising doesn't resell this data to third parties or share it with other advertisers.

  | Parameter | Value Passed | Purpose |
  | --- | --- | --- |
  | **ea** | Event action (custom value passed by advertiser) |  |
  | **ec** | Event category (custom value passed by advertiser) | These are needed if advertiser chooses to use custom events for conversion tracking or remarketing. |
  | **el** | Event label (custom value passed by advertiser) |  |
  | **ev** | Event value (custom value passed by advertiser) |  |
  | **evt** | Event type (page load or custom) | Distinguishes page load event from custom events. |
  | **gc** | Variable revenue currency (custom value passed by advertiser) | Needed if advertiser chooses to track variable revenue. |
  | **gv** | Variable revenue (custom value passed by advertiser) | Needed if advertiser chooses to track variable revenue. |
  | **ifm** | 1 | A value of 1 indicates that the tag is being fired from within an iFrame. |
  | **kw** | Keyword |  |
  | **lg** | Browser language setting |  |
  | **lt** | Page load time |  |
  | **mid** | GUID generated by UET tag | Used to relate page load and any custom events passed with each other. |
  | **msclkid** | Ad select information, generated at ad select time and appended to the landing page URL when auto-tagging of Microsoft Click ID is enabled.<br>Format: GUID followed by extra byte indicating whether the current value is a new one (unique to that session), as in "cdd4afcccb1c9a4cad9544dd7e5006d5-1". Note: This value will be "N" if cookies are blocked by the browser or no ad select information exists in cookie, and the msclkid parameter *isn't* in the landing page URL. The Microsoft Click ID will have "1N" added to the end if cookies are blocked by the browser and the msclkid parameter *is* in the landing page URL.<br>Cookie name: _uetmsclkid<br>Cookie expiration date: 90 days | Microsoft Click ID, which is used to improve the accuracy of conversion tracking. Note: UET sets a first-party cookie on your site’s domain for this parameter. |
  | **p** | URL of the page | Identifies webpage. |
  | **pi** | Digital signature - one way hash of tl, lt, lg, sc, sh, sw. |  |
  | **r** | Referrer URL | Identifies referrer URL. |
  | **rn** | Random number | Handles browser cache. |
  | **sc** | Screen color depth |  |
  | **sh** | Screen height |  |
  | **sid** | Session ID |  |
  | **sv** | Subversion | Identifies the version of UET. |
  | **sw** | Screen width |  |
  | **ti** | UET tag ID | Identifies tag. |
  | **tl** | Page title | Used to construct digital signature so that we can detect fraud. |
  | **uid** | User ID | A unique, non-personally identifiable ID representing a signed-in user. Advertisers may choose to store the user ID in a first-party cookie named "_uetuid". It'll be automatically read when UET events fire. |
  | **ver** | Version | Identifies the version of UET. |
  | **vid** | Visitor ID | A unique, anonymized visitor ID, assigned by UET, representing a unique visitor. UET stores this data in a first-party cookie named "_uetvid". |

  | Data point | Purpose |
  | --- | --- |
  | **Interactions: clicks, scroll** | Helps us detect fraud activity to optimize advertiser spend |
  | **Number of visits per page** | Helps advertisers optimize their websites for greater engagement and conversions |
  | **Page performance (speed, load time)** | Helps us detect fraud activity to optimize advertiser spend |
  | **Purchase cart extraction (product name, price, number of products)** | Helps us improve audience targeting for advertisers |
  | **Cart abandonment extraction** | Helps us improve audience targeting for advertisers |
  | **Traffic: user and session breakdown by country, device** | Helps advertisers optimize their websites for greater engagement and conversions |
  | **Browser-based signal** | Helps us detect fraud activity to optimize advertiser spend |
  | **Quick backs** | Helps advertisers optimize their websites for greater engagement and conversions |
  | **JavaScript errors in browser** | Helps us detect drops in conversions |
  | **Time spent** | Helps advertisers optimize their websites for greater engagement and conversions |

  If you do not want the UET tag to set any first-party cookies, you can opt-out by including the following parameter in your UET tracking code: **storeConvTrackCookies:false**

  ### Example:

  Here is what this opt-out code looks like within your UET tracking code:

  <script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"TAG_ID_HERE", **storeConvTrackCookies:false**};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>

  > [!NOTE]
  > For additional details about Microsoft privacy policies for usage of data, please refer to [Microsoft Privacy Statement](https://go.microsoft.com/fwlink/?linkid=517636). Also note that we will not be reselling the data we collect via UET to third parties and/or share it with other advertisers using Microsoft Advertising.

- **What cookies does UET use?**

  The following table lists the cookies that UET stores or accesses in your browser. Microsoft Advertising doesn't resell this data to third parties or share it with other advertisers.

  | Cookie ID | Cookie Description |
  | --- | --- |
  | **MR** | This is a Microsoft cookie that contains a binary flag. It gets set when you interact with a Microsoft property, including a UET beacon call or a visit to a Microsoft property through the browser. |
  | **MSPTC** | UET assigns this unique, pseudoanonymized visitor ID, representing a unique visitor. It's a partition cookie. This cookie is used in the browsers' Privacy API. |
  | **MUID** | This is a Microsoft cookie that contains a GUID assigned to your browser. It gets set when you interact with a Microsoft property, including a UET beacon call or a visit to a Microsoft property through the browser. |
  | **_uetmsclkid** | This is the Microsoft Click ID, which is used to improve the accuracy of conversion tracking.<br>**Note:** UET sets a first-party cookie on your site’s domain for this parameter. When auto-tagging of the Microsoft Click ID is enabled, the ad click information is generated at ad click time and appended to the landing page URL. |
  | **_uetsid** | This contains the session ID for a unique session on the site. *Note*: As of as of July 2023, _uetsid has been updated with additional parameters as follows: insights_sessionId, timestamp, pagenumber, upgrade, upload. |
  | **_uetvid** | UET assigns this unique, pseudoanonymized visitor ID, representing a unique visitor. UET stores this data in a first-party cookie. *Note*: As of as of July 2023, _uetvid has been updated with additional parameters as follows: insights_userId, cookieVersion, expiryTime, consent,  cookie_creation_time. |

- **How can I mark first-party cookies set by UET as secure?**

  If your website enforces the https protocol for all pages, you can modify your UET tag to mark first-party cookies as secure. Just add the highlighted code to the base UET tag on each page of your website:

  <script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"TAG_ID_HERE", **cookieFlags: "SameSite=None;Secure"**};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>

  > [!IMPORTANT]
  > This change will break UET functionality if any part of your site is not using the https protocol.

- **How can I stop UET events from being fired for users who request to restrict data sharing?**

  Set the cookie named "_uetmsdns" with a value of 1. Advertisers are responsible for setting this cookie, and it must be set in a first-party context (for example, in the advertiser's domain, such as contoso.com). This cookie is read by the client-side UET JavaScript during runtime, and if the value is set to 1, no UET events will fire.

- **What other data privacy measures can I effect with respect to UET**

  If you enable Restricted Event Processing (REP) for your applicable Microsoft Advertising services, Microsoft will process the personal data collected on your online properties via the UET tag subject to limitations under applicable data protection laws for a "processor" or "service provider" (although Microsoft will continue to be characterized as an independent "controller", "third party", or third-party "business").

- **Does the tag use browser caching and does it have an expiration date?**

  Yes, it leverages browser caching with an expiration time of 30 minutes.

- **I received the following warning message in Google Chrome: "A cookie associated with a cross-site resource at http://bat.bing.com/ was set without the 'SameSite' attribute." What does this mean?**

  This is a temporary warning, and clearing your browser's cookies should resolve it. It has no impact on your website or conversion tracking functionality for your website.

- **Can I share a UET tag at the manager account (MCC) level with child accounts for conversion tracking?**

  Yes, you can create new and share existing UET tags across accounts to simplify the management of conversion tracking and audiences.

- **Can I share a UET tag across multiple manager accounts for conversion tracking?**

  Yes, but only with Manager accounts that are part of a hierarchy and are positioned below the account where the UET tag is being created.

- **What should I do if I get the error: "Could not fetch UET tags for your account. Please try again later."**

  If you get the above error, try either refreshing the page or clearing your browser cache. If you still encounter problems, [contact support](https://go.microsoft.com/fwlink/?linkid=398371) for further assistance.

- **What should I do if I get the error: "TypeError: this.shouldEnforce is not a function?"**

  The error message "this.shouldEnforce is not a function", appearing since April 29, 2025, suggests a possible recent change or compatibility issue with the script bat.bing.com/bat.js. Try the following troubleshooting steps:

  - Check for recent changes: If any updates were made to your website's implementation of the script or related settings, consider reverting them to test their impact.
  - Review browser settings: Ensure that browser security features or extensions aren't blocking or modifying the script's behavior.
  - Monitor error logs: If possible, provide more details on where the error occurs (specific pages, user environments, browser versions).
  - Check console errors: In your browser's developer tools (F12 > Console), look for additional messages that might offer more context.
  - Test different browsers: If the issue appears only in certain browsers, it could point to a compatibility concern.
  - Inspect network requests: In the developer tools Network tab, confirm whether requests to bat.bing.com are failing or being blocked.
  - Temporarily disable extensions: Some browser extensions or ad blockers may interfere with tracking scripts like this one.

  If the error persists after trying these steps, [contact support](https://go.microsoft.com/fwlink/?linkid=2189081) for further assistance.

- **How can I fix the "UET tag extension is no longer available because it doesn't follow best practices for Chrome extensions" issue?**

  If you're seeing the error message, “UET tag extension is no longer available because it doesn't follow best practices for Chrome extensions,” when trying to use the UET Tag Helper extension in Chrome, it's likely that you're using an outdated version. Please uninstall the extension and reinstall the latest version of the UET Tag Helper in your browser.

- **Is UET data used to measure campaigns on platforms outside Microsoft Advertising?**

  UET data can be used to measure ads on Microsoft-owned and affiliated platforms, such as LinkedIn Ads, when you enable measurement for those campaigns.

  This doesn't change how the UET tag works or introduce new types of data collection. You can opt out by [disconnecting your UET tag from LinkedIn Ads Campaign Manager](https://www.linkedin.com/help/lms/answer/a10820016)
