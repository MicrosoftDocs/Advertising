---
title: How do I see if Microsoft Advertising auto-tagging works?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Check to see if auto-tagging is working in Microsoft Advertising.
---

# How do I see if Microsoft Advertising auto-tagging works?

## What is auto-tagging?

When [auto-tagging](hlp_ba_proc_microsoftclickid.md) of Microsoft Click ID (*msclkid*) is enabled, Microsoft Advertising will automatically add a unique click ID to the landing page URL. This click ID will be included in all subsequent UET events fired whenever the same customer visits your page, thereby allowing you to track the conversion from this customer on your site.

## Valid auto-tagging URL

Auto-tagging appends the *msclkid* before any hash tag (*#*) fragments, or "named anchors." If your URL already contains a parameter (indicated by the presence of a *?*), then a *&* will precede the *msclkid* instead of a *?.

Examples of *msclkid* in a URL:

- example.com/foo?a=b&msclkid=Example-123#xyz
- example.com/foo?msclkid=Example-123#xyz

If your website contains redirects, it is important that you preserve the *msclkid* URL parameter in your redirect. Bat.js [UET tags](hlp_ba_conc_uet_setup_master.md) expect to observe the *msclkid* parameter as a top-level parameter in the page URL where the tags are loaded.

> [!NOTE]
> - If you're using a final URL with a tracking template or custom parameters, follow [these instructions](hlp_ba_conc_upgradeurl_testbutton.md) to get the click URL (the URL customers will actually click).<br> Paste this URL into the Edge address bar, but don't load the page yet. In the address bar, append a test Microsoft Advertising auto-tagging query parameter, like *msclkid=Example-123*. This makes the full URL: *http://www.example.com/?msclkid=Example-123*.
> - If your final URL already contains a question mark (*?*) followed by a query parameter, prefix the *msclkid* parameter with a *&* symbol. For example: *http://www.example.com/?parameter=1&msclkid=Example-123*.
> - If your final URL contains a hash (*#*) symbol, append the *msclkid* parameter before the hash. For example: *http://www.example.com/?parameter=1&msclkid=Example-123#bookmark*.

## Confirm auto-tagging works for your site

Use [Edge Developer Tools](https://go.microsoft.com/fwlink/?linkid=2178004) and follow these instructions to check if auto-tagging works on your site before [setting it up](hlp_ba_proc_microsoftclickid.md).

1. Open a new tab in Edge. Open the Edge menu, then select **More tools > Developer Tools** to open [Edge Developer Tools](https://go.microsoft.com/fwlink/?linkid=2178004). Select the **Network** tab. This pane shows the network (HTTP) requests for the page being loaded and must be opened before the page is loaded.
1. Copy your Microsoft Advertising final URL.
1. Load the URL and watch the network requests load.

> [!NOTE]
> - If the appended *msclkid* parameter is still in the URL after the page loads, then auto-tagging works.
> - If you don't see the *msclkid* parameter appended to your URLs after the page is fully loaded, then it's likely that your website isn't configured to handle query parameters in a way that lets auto-tagging work.

## Troubleshooting

You can use [Edge Developer Tools](https://go.microsoft.com/fwlink/?linkid=2178004) to help you troubleshoot the following situations:

## FAQ

- **URL redirects**

 1. You can use the Record feature in Edge Developer Tools to see if the auto-tagging parameter is removed by a redirect. 

      1. Turn on **Record** in [Edge Developer Tools](https://go.microsoft.com/fwlink/?linkid=2178004) (select the black circle on the bottom bar in the **Network** tab). Enter the original final URL with the test *msclkid* appended into the address bar. Press **Enter** to load the URL.
      1. Under the **Network** tab and **Headers** pane on the right, select some of the first requests listed—they will generally not be type-specific requests (no image or code file extensions).
      1. Inside the request, look for an HTTP status code of 301 or 302. These codes indicate a redirect.
      1. Under the **Response Headers** section, look for the **Location** value, which indicates where the browser has been redirected.

     > [!NOTE]
     > Redirects can consist of multiple legs, so you might have to check several page HTTP requests to find out where the *msclkid* is lost.

  1. If the UET tag on a previous page sent the msclkid, then you might not see it in the final landing page URL. To double check, you can use Edge Developer Tools and review the collect requests.
      1. If the new URL doesn't have the auto-tagging parameter and the value you specified earlier, then it's likely that UET has not been able to store the *msclkid* value.

      1. In [Edge Developer Tools](https://go.microsoft.com/fwlink/?linkid=2178004), under the **Networks** tab, select the collect request in the left pane.
      1. In the **Headers** pane on the right, under the **Query String Parameters** section, look for the *msclkid* parameter in the collect request.
      1. You should see *msclkid=Example-123*. If you don't see this value, then the *msclkid* parameter was not successfully parsed and stored.

  1. To resolve an issue where the UET auto-tagging parameter is being removed by a redirect, you can:

      1. Try updating your Microsoft Advertising destination URL to the final URL. For example, if your destination URL is *www.example.com/redirect-page* but this page actually redirects to *www.example.com/new-url*, then use the latter URL for your ad destination URL.
      1. If the redirect is caused by a server-side rule, try reconfiguring your server settings to stop the redirect. Every web server is different, so methods will vary. For example, Apache servers rely on a *.htaccess* file to configure redirect rules. If you can't stop the redirect, configure your server to allow redirects to carry query parameters (like the *msclkid*) from the initial URL to the final URL. For example, if the final URL with auto-tagging is *www.example.com/redirecting-page?msclkid=Example-123*, when the redirect occurs it should forward the user to *www.example.com/new-url?msclkid=Example-123* Note: Here the *msclkid* parameter remains the same, although the page URL changes).

- **UET tag issues**

  The UET tracking code snippet can cause issues if it isn't set up correctly on the page. The UET Tag Helper can tell if your UET tracking code snippet is set up correctly. [Learn more about UET tag helper](hlp_BA_CONC_UET_TagHelper.md).

- **URL value conversion**

  If the auto-tagging *msclkid* value case is being altered by a URL rewrite engine on your server (like if *msclkid=Example-123* is being changed to other values such as *msclkid=Example-456*), UET can't determine which the Microsoft Advertising click is associated with the session.

  To resolve this issue, configure your web server to simply pass in parameters.

- **Length of *msclkid* parameter**

  The *msclkid* value is a guid and always 32 characters long. Make sure your log, storage, and redirecting systems can handle *msclkid* parameters of this size appended to the original destination URL. To confirm your website will not truncate appended *msclkid* parameters, repeat the troubleshooting steps above using this value: *msclkid=01234567890123456789012345678901*
