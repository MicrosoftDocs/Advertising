---
title: How to Use Regular Expressions When Building Destination URLs or Custom Event Type Goals
description: Find out how to use regular expressions to build destination URLs or custom event conversion goals.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# How to use regular expressions when building destination URLs or custom event type goals

- **What are regular expressions**

  : Regular expressions, often abbreviated as regex, is broadly understood as a technology to do string matching. Systems that support regular expressions allow users to use a special string, called the pattern, built using the rules of regular expressions, to perform complex string searches. This technology is meant for advanced technical users and is extremely effective. [Learn more](/dotnet/standard/base-types/regular-expressions)

- **When to use regular expressions in destination URL type goal**

  : Microsoft Advertising recommends that advertisers put one tag across their website and create multiple goals. In most cases, advertisers want to track user visits to certain pages as conversions (such as the order confirmation page or thank you page). These advertisers create destination URL type goals in order to meet their needs. Destination URL type goal supports four types of conditions that advertisers can specify on the URL.

  - **Equals To**: In this case, the input string must exactly match with the URL on which the UET event fired. However, http(s) and www are ignored, as the rest of the string must match. For example, if the advertisers provide an input string of contoso.com, and the URL is http://www.contoso.com or https://www.contoso.com, Microsoft Advertising will consider it as a match and vice versa will also be true.
  - **Begins With**: This matches identical characters starting from the beginning of the string up to and including the last character in the input string. However, http(s) and www are ignored (rest of the string must match). Use this option when your page URLs are generally unvarying but when they include additional parameters at the end that you want to exclude. For example, if you provide an input string of contoso, and the URL is http://www.contoso.com or https://www.contoso.com, Microsoft Advertising will consider it as a match and vice versa will also be true.
  - **Contains**: When this operator is used, Microsoft Advertising verifies if the input string is present anywhere in the URL reported by the UET tag.
  - **Regular Expressions**: This option is used when none of the options above are able to express the necessary conditions to match the conversion URLs.

  Here are some examples and regexes for those examples:

  - Look for a specific string in the URL. Such as OrderId. This is basically equivalent to the Contains option.

    - **Destination URL**: <br> www.contoso.com/checkout"&orderid=5467
    - **Regular expression**: <br> orderid=
  - Suppose that instead of counting every product order as a conversion, you specifically want to track those in which a user purchases your expensive items: fancyjewelry or fancycar

    - **Destination URL**: <br> http://contoso.com/products/fancyjewelry/checkout.html <br> http://contoso.com/products/fancycar/checkout.html
    - **Regular expression**: <br> http:\/\/contoso\.com\/products\/((fancyjewelry)|(fancycar))\/checkout\.html

      - \ is the escape character to be used with / and .
      - | is used for expressing OR conditions
      - Use parentheses for grouping
  - Suppose that the conversion URLs have different subdomains.

    - **Destination URL**: <br> http://domain1.contoso.com/products/fancyjewelry/checkout.html <br> http://domain2.contoso.com/products/fancycar/checkout.html
    - **Regular expression**: <br> http:\/\/[a-z]*[0-9]*\.contoso\.com\/products\/((fancyjewelry)|(fancycar))\/checkout\.html​

      - * is a wildcard character
      - [a-z] implies any text string
      - [0-9] implies any digit

- **When to use regular expressions in custom event type goal**

  : In short, Microsoft Advertising requires that advertisers report values for one or more of the following parameters when custom events happen and create custom event type goal(s) specifying which values for these parameters would qualify a custom event as a conversion. To learn more, see [How to track custom events with UET](hlp_BA_CONC_UETv2CustomEvent.md)

  - Event category - The category of event you want to track. For example, 'video'
  - Event action - The type of user interaction you want to track. For example, 'play' or 'pause'
  - Event label - The name of the element that caused the action. For example, 'trailer' or 'behindthescenes'
  - Event value - A numerical value associated with that event. For example, the length of the video played

  Of these four parameters, the first three - Event category, Event action and Event label allow regular expressions to be specified. The rules of the regular expressions are the same as what is described above for destination URL type goals.

  > [!NOTE]
  > - In the unlikely case that both you and Microsoft Advertising support aren't able to define a regex for your conversion URLs, you can provision a new UET tag, put the tag only on the conversion pages and create a Destination URL goal with a dummy condition (such as contains) that always evaluates to true. Because the tag will be fired only on the conversion URLs, you will be tracking only visits to those pages as conversions.
  > - Regular expressions is a complex topic. There are free tools available online (for example: http://www.regexr.com/) that can assist you in building and validating their regular expression patterns with your conversion URLs. ​ ​
