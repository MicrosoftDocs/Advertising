---
title: Why isn’t my tracking template working?
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn the validation rules so that you can fix issues with your tracking template.
---

# Why isn’t my tracking template working?

Your tracking template might not be working because your final URL, mobile URL or tracking templates don't meet the following validation rules.

- Final and Mobile URLs must start with either http:// or https://
- Tracking templates must reference a landing page URL using {lpurl} or a permutation of that tag

  Tracking templates at the account, campaign, and ad group level must include a parameter that inserts your landing page URL using either the {lpurl} or other advanced parameters. Once your ad is clicked, these parameters will insert your final URL. If you don’t include a URL insertion parameter in your tracking template, your landing page URL will break.

  | Parameter | What it returns |
  | --- | --- |
  | **{lpurl}** | The Final URL. It will be escaped unless you put {lpurl} at the beginning of your tracking template. If {lpurl} isn't at the beginning of your tracking template, all characters that are not letters, numbers, or the following punctuation characters will be escaped: -, _, ., !, *, (, and ).<br>**Example:** <br>- **Final URL:** http://example.com<br>- **Tracking template:** {lpurl}?matchtype={matchtype}<br>- **Landing page URL:** http://example.com?matchtype={matchtype} |
  | **{lpurl+2}** | The Final URL, escaped twice. Useful when you have a chain of redirects. |
  | **{lpurl+3}** | The Final URL, escaped three times. Useful when you have a chain of redirects. |
  | **{unescapedlpurl}** | The Final URL, unescaped. |
  | **{escapedlpurl}** | The Final URL, escaped. Escapes all characters that are not letters, numbers, or the following punctuation characters: -, _, ., !, *, (, and ). |
  | **{escapedlpurl+2}** | The Final URL, escaped twice. Useful when you have a chain of redirects. |
  | **{escapedlpurl+3}** | The Final URL, escaped three times. Useful when you have a chain of redirects. |
- Domain name of Display URL must match website’s landing page URL after redirect and tracking is applied.
