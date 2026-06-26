---
title: Parallel tracking gets customers to your landing page more quickly
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how parallel tracking lets you send customers directly to your final URL while click measurement runs in the background.
---

# Parallel tracking gets customers to your landing page more quickly

If you use URL tracking, when customers click your ad, they usually have to go through a number of redirects before reaching your page. This is known as sequential tracking.

With parallel tracking, when customers click your ad, they immediately see your landing page. Simultaneously, Microsoft Advertising runs your tracking URLs in the background. So your customers' user experience is improved and you still get the same great measurement tracking.

## Working with parallel tracking

> [!NOTE]
> Parallel tracking is mandatory for all accounts.


- **Requirements**

  - **Compatibility**: Check with your click measurement provider to make sure they support parallel tracking. Compatibility will depend on how you have implemented URL tracking, and incompatibilities could make click measurement stop working.
  - **{lpurl}**: You need to have {lpurl} or one of its variants in your URL's tracking template for parallel tracking to work. [Learn more about tracking and URL parameters](hlp_BA_CONC_UpgradeURL_URLParameters.md). Parameters that are being sent to the landing page during click redirection should be entered in the final URL or attached to the {lpurl} parameter in your tracking template.
  - **Redirects**: Only server-side redirects are supported. The tracking sequence will break if there are any JavaScript-based or HTML-based redirects at the previous URL.
  - **HTTPS**: The HTTPS protocol is required. Each tracker URL (including interim/internal URLs) in your redirection chain needs to support HTTPS.
  - **Unique Click ID**: If you require a unique click identifier to be associated with your website or landing page per click, use the Microsoft Click ID {MSCLKID}. This is available as a value track parameter, and you can replace the value of a dynamically generated click ID with {MSCLKID}. Alternatively, you can also [enable auto-tagging](hlp_BA_PROC_MicrosoftClickID.md), which will result in MSCLKID being appended to the end of landing page and tracking template URLs at the time of serving.

- **URL reconfiguration**

  - **Landing page URL**: All parameters associated with the {lpurl} value track parameter will be parsed and appended to the landing page URL call.
  - **Tracking template URL**:

    - The {lpurl} field in the tracker UL will be substituted with a Microsoft URL (for example, https://www.bing.com/ack/rlinkping.htm?t=123445) to avoid multiple calls to the landing page. The substituted Microsoft URL will result in HTTP status code 204 upon redirection.
    - All parameters associated with the landing page will be also be appended to this substituted URL.
    - The tracker should continue to redirect to this substitute URL as it would normally handle the {lpurl} parameter.
    - The parameter gb=1 will be appended to the end of tracker to indicate that this is a parallel tracking call.

  Here are some examples that demonstrate how parallel tracking reconfigures URLs differently than sequential tracking.

  - **When the {lpurl} parameter or its variants is used**

    **Initial values:**

    - **Final URL**: http://www.contoso.com?par=abc
    - **Tracking template**: https://www.contosotracker.com?u={lpurl}%3Fvar1%3Dvalue1&var2=value2

    **Sequential tracking:**

    - **Tracking template**: https://www.contosotracker.com?u=http%3A%2F%2Fwww.contoso.com%3Fpar%3Dabc%26var1%3Dvalue1&var2=value2

    **Parallel tracking:**

    - **Landing page**: http://www.contoso.com?par=abc&var1=value1

      - The var1=value1 parameter from the tracking template is parsed and appended to the landing page URL.
    - **Tracking template**: https://www.contosotracker.com?u=https%3A%2F%2Fwww.bing.com%2Fack%2Frlinkping.htm%3Ft%3D66e3b646097442588350823de19d9793_7%26par%3Dabc%26var1%3Dvalue1&var2=value2&gb=1

      - The {lpurl} parameter in the tracker call is replaced with a substitute URL.
      - The substitute URL includes all parameters sent to the landing page with appropriate encoding so that the tracking server can process it as needed.
      - A parameter gb=1 is appended at the end to indicate that call is routed via parallel tracking

  - **When the {unescapedlpurl} parameter or its variants is used**

    **Initial values:**

    - **Final URL**: http://www.contoso.com?par=abc
    - **Tracking template**: https://www.contosotracker.com?u={unescapedlpurl}?var1=value1&var2=value2

    **Sequential tracking:**

    - **Tracking template**: https://www.contosotracker.com?u=http://contoso.com?par=abc&var1=value1&var2=value2

    **Parallel tracking:**

    - **Landing page**: http://www.contoso.com?par=abc&var1=value1&var2=value2

      - The var1=value1 and var 2=value 2 parameter from the tracking template is parsed and appended to the landing page URL.
      - All subsequent parameters are sent to the landing page (irrespective of any immediately following "?" or "&").
    - **Tracking template**: https://www.contosotracker.com?u=https%3A%2F%2Fwww.bing.com%2Fack%2Frlinkping.htm%3Ft%3D66e3b646097442588350823de19d9793_7%26par%3Dabc%26var1%3Dvalue1&var2=value2&gb=1

      - The {lpurl} parameter in the tracker call is replaced with a substitute URL.
      - The substitute URL includes all parameters sent to the landing page with appropriate encoding so that the tracking server can process it as needed.
      - A parameter gb=1 is appended at the end to indicate that call is routed via parallel tracking

  - **When the {escapedlpurl} parameter or its variants is used**

    **Initial values:**

    - **Final URL**: http://www.contoso.com?par=abc
    - **Tracking template**: https://www.contosotracker.com?u={escapedlpurl}%3Fvar1%3Dvalue1&var2=value2

    **Sequential tracking:**

    - **Tracking template**: https://www.contosotracker.com?u=http%3A%2F%2Fwww.contoso.com%3Fpar%3Dabc%26var1%3Dvalue1&var2=value2

    **Parallel tracking:**

    - **Landing page**: http://www.contoso.com?par=abc&var1=value1

      - The var1=value1 parameter from tracking template is parsed and appended to the landing page URL.
    - **Tracking template**: https://www.contosotracker.com?u=https%3A%2F%2Fwww.bing.com%2Fack%2Frlinkping.htm%3Ft%3D66e3b646097442588350823de19d9793_7%26par%3Dabc%26var1%3Dvalue1&var2=value2&gb=1

      - The {lpurl} parameter in the tracker call is replaced with a substitute URL.
      - The substitute URL includes all parameters sent to the landing page with appropriate encoding so that the tracking server can process it as needed.
      - A parameter gb=1 is appended at the end to indicate that call is routed via parallel tracking

  > [!NOTE]
  > Microsoft Advertising will automatically switch "?" and "&" in your URLs immediately following the landing page parameter ({lpurl} or other variations) as needed to ensure that they are in a valid format. For more details, take a look at [What tracking or URL parameters can I use?](hlp_BA_CONC_UpgradeURL_URLParameters.md)

- **Landing page parameters**

  Parallel tracking will not allow any click trackers to add or modify landing page parameters during click redirection. Instead, use a [final URL suffix](hlp_BA_CONC_UpgradeURL_FinalURLSuffix.md) to pass those parameters directly. This parameter will be supported for all entities where the tracking template is supported and will be appended to the landing page call as well as the substituted Microsoft URL.

  It's possible to set landing page parameters at the tracking template level by inserting appropriate encoding for key value pairs to be inserted, but we recommend that you use the final URL or final URL suffix field to avoid any encoding related issues.

  - **Example**

    **Initial values:**

    - Final URL: http://www.contoso.com?par=abc
    - Tracking template: https://www.contosotracker.com?u={lpurl}&var2=value2

    The parameter is attached by the tracking template at the time of click redirection: var1=value1. To support parallel tracking, we'll use a final URL suffix: var1=value1.

    **Sequential tracking:**

    - Tracking template: https://www.contosotracker.com?u=http%3A%2F%2Fwww.contoso.com%3Fpar%3Dabc%26var1%3Dvalue1&var2=value2

    **Parallel tracking:**

    - Landing page: http://www.contoso.com?par=abc&var1=value1
    - Tracking template: https://www.contosotracker.com?u=https%3A%2F%2Fwww.bing.com%2Fack%2Frlinkping.htm%3Ft%3D66e3b646097442588350823de19d9793_7%26par%3Dabc%26var1%3Dvalue1&var2=value2&gb=1

- **Cookie context**: With parallel tracking, browser cookies will always be written to the main browser jar in third-party context. In contrast, in sequential tracking they are set in the first-party context for the tracker's domain.

- **Testing that parallel tracking is working**: You can verify that parallel tracking is working by looking for *&gb=1* in your tracking calls when you click the ad. To learn more, see [Test your tracking templates](hlp_BA_CONC_UpgradeURL_TestButton.md).

- **Frequently asked questions**

  - **Does parallel tracking work for all Microsoft Advertising clicks?**

    Not at this time. Currently, parallel tracking is only available for search clicks from the following supported browsers: Microsoft Edge, Chrome, and Firefox. When parallel tracking is unsupported, sequential tracking will be used instead.

  - **Do my tracking template URLs need to use HTTPS?**

    Yes, every URL in the tracking redirect chain must support HTTPS. Example tracking template: https://contosotracker.com?url={lpurl}&matchtype={matchtype}

  - **Does the final URL field need to use HTTPS?**

    No, the final URL can be either HTTP or HTTPS. However, we strongly recommend all advertisers to use HTTPS, as it provides a more secure user experience.

  - **If I append static parameters to the URL on redirect, what are my options?**

    If you currently append static parameters while redirecting to the landing page, you should enter those in Microsoft Advertising as a [final URL suffix](hlp_BA_CONC_UpgradeURL_FinalURLSuffix.md) (recommended) or onto the final URL itself. These options will send the parameters to the landing page.

  - **Does URL reconfiguration apply if I enter a value in the final URL suffix field, regardless of parallel tracking?**

    Yes, parameters entered in the final URL suffix field are sent to the landing page in addition to tracking template parameters per the encoding.

  - **If I have landing page parameters already in tracking templates, should I move them to the final URL suffix field?**

    Yes, we strongly recommend you enter all landing page parameters in the final URL suffix field for simplicity. However, if you choose not to, URL reconfiguration will parse the parameters from your tracking template and send them to the landing page based on encoding rules. Please ensure that you specify parameters for the landing page via one of the aforementioned means.

  - **If I append dynamic parameters to the URL on redirect, what are my options?**

    You can make use of the Microosft Click ID {MSCLKID} parameter by [enabling auto-tagging](hlp_BA_PROC_MicrosoftClickID.md) or using it as tracking template parameter.

  - **What does the {gb} parameter help with?**

    This parameter will be appended to the tracker URL so that tool providers know a parallel tracking call was made. It will be primarily used for scenarios where a tracking template doesn't contain the {lpurl} parameter and the tracking template is static in nature. For these static tracking templates, if gb=1 is present, a tool provider can avoid redirecting to the advertiser's landing page two times via the search user and the parallel tracking stream.

  - **Does parallel tracking impact website analytics and conversion tracking tags on the landing page?**

    If you tag URL parameters or if the analytics provider captures certain URL parameters, then you need to ensure continuity for those parameters being sent to the landing page by entering them in the tracking template, final URL or final URL suffix. This is applicable for any script referencing URL parameters.
