---
title: How do I set up final URL tracking?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Add tracking parameters to your final URL or tracking template to learn more about each click.
---

# How do I set up final URL tracking?

When a visitor views a page on your website, do you know how they got there? Did they come from your ad on Bing? Which keyword brought them to your site? Which campaign drove this traffic? You can get these answers and much more using URL tracking. To do this, you need to add some tracking information to your final URL.

Although the variable names and parameters can change, the structure is always the same:

- Your final URL
- A *parameter*, enclosed by { } that tells Microsoft Advertising the data you want returned when an ad is clicked. The specific parameters to choose from are listed in the table below.
- A *variable* that you define to store that data. The name of the variable is up to you, but it should be the name used in your website's script to store the value that the parameter is returning. Your webmaster can help you define appropriate names to use.

## Let's look at an example

If you want to track the search query that triggered your ad, you simply add the text in bold to your ad's final URL:

http://www.contoso.com**?MyQueryStringVariable={QueryString}**

In the above example:

- *http://www.contoso.com* is your final URL.
- The parameter *{QueryString}* comes from the table below and tells Microsoft Advertising to return the search query entered by the search user.
- *MyQueryStringVariable* is the variable that you define to store that data.

Putting it all together, it looks like this:

www.yourDestinationURL.com?variable={parameter}

Also, note that some parameters are conditional. For example, *{IfMobile:string}* will return the specified string only if the ad was displayed on a mobile device. Using this structure, a URL could look like this:

http://www.contoso.com**?WhereDisplayed={IfMobile:adDisplayedOnMobile}{IfNotMobile:adNotDisplayedOnMobile}**.

## How to add URL tracking to your ads

1. Determine what you want to track from the list in [What tracking or URL parameters can I use?](hlp_BA_CONC_UpgradeURL_URLParameters.md)
1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Extensions**.
1. Select an existing ad or create a new ad.
1. In the **Final URL** text box, type the URL using the format: www.yourDestinationURL.com?variable={parameter}.

   The strings are not case-sensitive, must include the opening and closing braces, and cannot be used in the ad’s title, text, or display URL.

   The *variable* is a name you define. It should be the name of a variable used in your company's website scripts to identify the value that the parameter is returning.

   The *parameter* comes from the [list of parameters](hlp_BA_CONC_UpgradeURL_URLParameters.md) and tells Microsoft Advertising specifically what data to return when an ad is clicked.
1. Select **Save**.

> [!NOTE]
> For Microsoft Shopping campaigns, you add the tracking information to the **Link** column in the feed file. To learn more, see [Creating and organizing Microsoft Shopping campaigns feed files](hlp_BA_CONC_BMCWhatIsCatalog.md)

## Examples

- **Identify which match type triggered your ad**

  - **{MatchType}**

    URL example: www.contoso.com?myMatchVariable={MatchType}<br> Let's say your ad is triggered by an exact match. The variable myMatchVariable gets set to the letter "e" and the resulting URL is www.contoso.com?myMatchVariable=e. When the search user clicks on that ad, they go to www.contoso.com?myMatchVariable=e.

    Scripts on your site can then use that information to record that this was an exact match. Tracking this information might lead you to increasing or decreasing bids on a particular match type or removing that match type altogether, which would free up budget to spend in a more efficient or cost-effective manner.

- **Track the number of times your ads are clicked on from various devices (mobile, tablet and computer)**

  - **{Device}**

    URL example: www.contoso.com?myDeviceIndicator={Device}<br> For example, your ad is displayed on and clicked from a mobile device. The variable myDeviceIndicator is therefore set to "m". The user is taken to **www.contoso.com?myDeviceIndicator=m**. Your website analytics tools capture the myDeviceIndicator value and adds that to your tally for mobile clicks. You find that certain keywords are triggering a lot of clicks from mobile devices and you choose to optimize both your ad and landing page accordingly.

- **Record both the search query and match type that triggered an ad**

  A final URL with two tracking parameters would look like:

  *http://www.DestinationURL.com?TrackingParameter1&TrackingParameter2*

  - **{QueryString} and {MatchType}**

    This example demonstrates how you can use multiple query parameters. To track more than one value returned, simply separate the parameters by an ampersand (&). Here, the variable "queryText" is set to the search query the user entered that triggered your ad *and* the variable "match" is set to "e", "p", "b", or "c" to indicate the match type that triggered your ad.

    Let's say the search user searches for "books about green tea" and you have a phrase-match keyword "green tea." The user is taken to **www.contoso.com?queryText=books about green tea&match=p**. Your website scripts record that the variable queryText is set to "books about green tea" and match is set to "p." From this joint information, you identify a problem: You don't sell books about green tea (you just sell the beverage itself). So you consider if you should perhaps change your match type to exact or include a negative keyword "books."
