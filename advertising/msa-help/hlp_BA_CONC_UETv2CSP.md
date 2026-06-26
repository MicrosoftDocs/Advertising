---
title: Use Microsoft UET tag with content security policy
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Content Security Policy (CSP) is a widely-used web security standard that helps to detect and mitigate certain types of website related attacks including cross-site scripting, click jacking and data injections.
---

# Use Microsoft UET tag with Content Security Policy

Content Security Policy (CSP) is a widely-used web security standard that helps to detect and mitigate certain types of website related attacks including cross-site scripting, click jacking and data injections.

## UET page load event

To use UET tag on a web page with CSP, the execution of the tag code must be allowed by content polocy. The tag code consists of inline JavaScript code that injects the bat.js script. We recommend you use *nonce* (number used once) to solve this problem. The *nonce* attribute is an arbitrary number instead of a fixed value within the static page. Your website gets the new *nonce* value from the server for each request. You can reference [this page for more about nonce](https://go.microsoft.com/fwlink/?linkid=2227830).

Use this code to provide the *nonce* value for your CSP: `<meta http-equiv="Content-Security-Policy" content="default-src 'self'; child-src 'none'; script-src 'nonce-{NONCE-FROM-SERVER}' https://bat.bing.com https://bat.bing.net; img-src https://bat.bing.com https://bat.bing.net" />`

Use the same *nonce* value in the tag code. Here is an example for a page load event: `<script nonce='{NONCE-FROM-SERVER}'>(function (w, d, t, r, u) { var f, n, i; w[u] = w[u] || [], f = function () { var o = { ti: "16017482" }; o.q = w[u], w[u] = new UET(o), w[u].push("pageLoad") }, n = d.createElement(t), n.src = r, n.async = 1, n.onload = n.onreadystatechange = function () { var s = this.readyState; s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null) }, m = d.querySelector('[nonce]'), m&&n.setAttribute('nonce', m.nonce||m.getAttribute('nonce')), i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i) })(window, document, "script", "//bat.bing.com/bat.js", "uetq"); </script>`

## UET custom event

Setting up a UET custom event for websites with CSP is similar. Here is an example for triggering a button click event: `<!--Here we invoke a javascript function when the button is clicked to execute the code to report custom event--> <input type="button" id="button1" value="(CSP) Click here to report a standard custom event with static values"/> <script nonce='{NONCE-FROM-SERVER}'> document.getElementById('button1').addEventListener('click', function(){ window.uetq = window.uetq || []; window.uetq.push({ 'ec': 'MyCategory', 'ea': 'MyAction', 'el': 'MyLabel', 'ev': 3 }); }, true); </script>` You can try this out [here](https://go.microsoft.com/fwlink/?linkid=2227663).

> [!NOTE]
> Your server generates the random *nonce* value. Static values are only for demonstration purposes.

If the *nonce* solution does not work for you, you can add 'unsafe-inline' for the script-src section: `<meta http-equiv="Content-Security-Policy" content="img-src https://*; child-src 'none'; script-src 'unsafe-inline' https://bat.bing.com https://bat.bing.net;" />`

## Use UET with Google Tag Manager

If you enabled UET tag by using Google Tag Manager, follow [Google's documentation to unblock the GTM on your CSP website](https://go.microsoft.com/fwlink/?linkid=2227831). However, typical CSP would still prevent our JavaScript if you only complete Google's guidance. To remove the block, the CSP must include https://bat.bing.com as a directive. Here is an example: : `<meta http-equiv="Content-Security-Policy" content="child-src 'none'; script-src 'nonce-{NONCE-FROM-SERVER}' https://bat.bing.com/ https://bat.bing.net/;" />`

## Use UET with Clarity

Typically, Clarity works if your website doesn't have a CSP. If you want to use Clarity on your CSP website, add the domain as "unsafe-inline" in the script-src section: `<meta http-equiv="Content-Security-Policy" content="img-src https://*; child-src 'none'; script-src 'unsafe-inline' https://bat.bing.com https://bat.bing.net https://www.clarity.ms;" />`
