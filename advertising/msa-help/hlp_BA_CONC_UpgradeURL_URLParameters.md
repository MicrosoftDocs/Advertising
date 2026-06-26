---
title: What tracking or URL parameters can I use?
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Review the URL parameters you can add to your tracking template or destination URLs to find out how visitors got to your website.
---

# What tracking or URL parameters can I use?

You add URL parameters to your destination URL or tracking template to find out how visitors got to your website. URL parameters allow you to track information about the source of an ad click.

Although the variable names and the parameters can change, the structure is always the same:

- A *parameter*, enclosed by *{ }* that tells Microsoft Advertising what data you want returned when an ad is clicked. The specific parameters to choose from are listed in the table below.
- A *variable* that you define to store that data. The name of the variable is up to you, but it should be the name used in your website's script to store the value that the parameter is returning. Work with your website programmers who can help you define appropriate names to use.

Putting it all together, it looks like this:

www.yourLandingPageURL.com?variable={parameter}

variable

parameter

## Available parameters for:

- **Destination URL, final URLs, tracking templates and custom parameters**

  > [!NOTE]
  > For Performance Max campaigns, we do not support parameters for asset group or asset group ID. You must use the **{AdGroupId}** and **{AdGroup}** parameters if you want to get the asset group and asset group ID.

  | Parameter | What it returns |
  | --- | --- |
  | **{CampaignId}** | The ID of the campaign that triggered the ad. For example, suppose your destination URL is www.northwindtraders.com/{CampaignId}. Assuming that your campaign ID is 2410012280, the destination URL will be www.northwindtraders.com/2410012280. |
  | **{Campaign}** | The name of the campaign that triggered the ad. For example, suppose your destination URL is www.northwindtraders.com/{Campaign}. Assuming that your campaign name is Sale, the destination URL will be www.northwindtraders.com/Sale. |
  | **{AdGroupId}** | The ID of the ad group that triggered the ad. For example, suppose your destination URL is www.northwindtraders.com/{AdGroupId}. Assuming that your ad group ID is 2410012280, the destination URL will be www.northwindtraders.com/2410012280. |
  | **{AdGroup}** | The name of the ad group that triggered the ad. For example, suppose your destination URL is www.northwindtraders.com/{AdGroup}. Assuming that your ad group ID is Clearance, the destination URL will be www.northwindtraders.com/Clearance. |
  | **{TargetId}** | The ID of the keyword ("kwd"), remarketing or audience list ("aud"), dynamic ad target ("dat"), product partition ("pla"), or targeted location ID ("loc") that triggered the ad.<br>If there are more than one ID, they will appear in the following order: aud, dat, kwd, pla. For example, if you associate remarketing list "1234" with keyword "5678", the {TargetId} would be replaced by "aud-1234:kwd-5678".<br>Note: In-market audiences and LinkedIn profile targeting cannot be tracked through this parameter as this would expose individual user behavior on Bing and other Microsoft properties. |
  | **{MatchType}** | The match type used to deliver an ad. This can be different from the {BidMatchType}. For example, if you bid on a broad match and the search term was an exact match. This can help you determine what match types are getting the most clicks.<br>- e=exact<br>- p=phrase<br>- b=broad<br>- b=expanded (Expanded match is treated as a broad match.) |
  | **{BidMatchType}** | The keyword bid match type. This can be different than {MatchType}. For example, if you bid on a broad match and the search term was an exact match. When used with {MatchType} this can help you refine your bidding, keyword and landing page strategies.<br>- be=bidded exact<br>- bp=bidded phrase<br>- bb=bidded broad |
  | **{Network}** | The ad network type on which the ad was served.<br>- o = owned and operated (Bing, AOL, and Yahoo search results)<br>- s = syndicated (search partner site results)<br>- a = [audience placements](hlp_BA_CONC_NativeAds.md)<br>For example, suppose your destination URL is www.northwindtraders.com/network={Network}. Assuming that your network (ad distribution) is *Bing, AOL and Yahoo search (owned and operated) only*, the destination URL will be www.northwindtraders.com/network=o. |
  | **{Device}** | One of the following codes depending on where the click came from. This list can help you determine what type of devices are generating the most clicks. You can then customize your ads and bids accordingly.<br>- m=mobile device<br>- t=tablet device<br>- c=desktop or laptop computer |
  | **{IfMobile:string}** | The *string* text (that you define) to the right of the colon if the ad is displayed on a mobile device. For example, if your parameter was {IfMobile:adDisplayedOnMobile} and your ad was displayed on a mobile device, your server log would receive *adDisplayedOnMobile*. |
  | **{IfNotMobile:string}** | The *string* text (that you define) to the right of the colon if the ad is displayed on a computer, laptop, or tablet device. For example, if your parameter looked like this: {IfNotMobile:adNotOnMobile} and your ad was displayed on a mobile device, your server log would receive: adNotOnMobile. |
  | **{IfSearch:string}** | The *string* text (that you define) to the right of the colon if the ad is displayed in [search placements](hlp_BA_CONC_SearchNetContentNet.md). For example, if your parameter looked like this: {IfSearch:adDisplayedOnSearch} and your ad was displayed in [search placements](hlp_BA_CONC_SearchNetContentNet.md), your server log would receive: adDisplayedOnSearch. |
  | **{IfNative:string}** | The *string* text (that you define) to the right of the colon will be substituted into the URL if the ad is displayed as a Microsoft Audience ad. For example, if your parameter looked like this: {IfNative:nativeAd} and your ad was displayed as an Audience ad, your server log would receive: nativeAd. |
  | **{IfPLA:string}** | The *string* text (that you define) to the right of the colon will be substituted into the URL if the ad is displayed as a product ad. For example, if your parameter looked like this: {IfPLA:productAd} and your ad was displayed as a product ad, your server log would receive: productAd. |
  | **{AdId}** | The numeric ID of the displayed ad.<br>You can get your ad ID on the Ads table on the Campaigns page. If the **Ad ID** column is not displayed in the table, click **Columns** and select **Ad ID**. Then click **OK**. |
  | **{keyword:default}** | Substitutes the keyword that matched the user's search term. Spaces in the keyword will each be substituted with "%20" to ensure the URL is valid.<br>Note: You should provide a default string that the system will use if including the substitution value will cause the expanded string to exceed the string limit of the URL. Substitution of your default text is not supported, so you should not include characters such as a space which would cause the URL to be invalid. |
  | **{msclkid}** | A unique ClickID for the clicks on the ad. To learn more, see [Description of methodology](https://go.microsoft.com/fwlink/?linkid=398319). |
  | **{OrderItemId}** | The numeric ID for the keyword that triggered the display of your ad. For Shopping campaigns, *{OrderItemId}* will return the product group ID. |
  | **{param1:default}** | Substitutes {Param1} in the URL with the Param1 setting of the keyword that matched the user's search term.<br>Note: You should provide a default string that the system will use if including the substitution value will cause the expanded string to exceed the string limit of the URL. |
  | **{param2:default}** | Substitutes {Param2} in the URL with the Param2 setting of the keyword that matched the user's search term.<br>Note: You should provide a default string that the system will use if including the substitution value will cause the expanded string to exceed the string limit of the URL. |
  | **{param3:default}** | Substitutes {Param3} in the URL with the Param3 setting of the keyword that matched the user's search term.<br>Note: You should provide a default string that the system will use if including the substitution value will cause the expanded string to exceed the string limit of the URL. |
  | **{QueryString}** | The search query text that the user entered. |
  | **{copy:queryparameter}** | {copy} parameter doesn't work with final URLs but it does work with destination URLs.<br>When an ad with an app extension, Image ad extension or sitelink extension is served, the {copy} string in the ad extension's destination URL is replaced with the specified query parameter from the ad's resolved destination URL. The resolved destination URL is the URL used by the ad at the time the ad is served; after all dynamic text strings in the ad's destination URL are substituted with actual values. For example, if a sitelink extension's destination URL contains {copy:myId} and the ad's resolved destination URL includes ?myId=123, the {copy:myId} string will be replaced with myId=123. If the ad's resolved destination URL does not include the query parameter, the {copy} string will be replaced with the name portion of the query parameter. For example, myId=.<br>If you have upgraded your keyword destination URLs to final URL but haven't upgraded your sitelink extension URLs yet, the {copy} parameter will still work for the sitelink extension. For example:<br>**Keyword Final URL (upgraded):** http://www.example.com?a=1&b=desk<br>**Keyword Mobile URL (upgraded):** http://www.example.com?a=1&b=mob<br>**Sitelink extension URL (not upgraded):** http://www.example.com?a=1&{copy:b} |
  | **{feeditemid}** | The ID of the ad extension that was clicked. |
  | **{loc_physical_ms}** | The geographical location code of the physical location of the click. For more information on geographical location codes, take a look at [this Bing Ads API doc](https://go.microsoft.com/fwlink/?linkid=536556). |
  | **{loc_interest_ms}** | The geographical location code of the location of interest that triggered the ad. For more information on geographical location codes, take a look at [this Bing Ads API doc](https://go.microsoft.com/fwlink/?linkid=536556). |

  > [!IMPORTANT]
  > Custom parameters will return the variable if added to a tracking template but will return an empty value if added to a destination URL.

- **Tracking templates only**

  Tracking templates should include a parameter that inserts your landing page URL using either the {lpurl} or other advanced parameters. Once your ad is clicked, these parameters will insert your final URL. If you don't include a URL insertion parameter in your tracking template, your landing page URL will break.

  | Parameter | Description |
  | --- | --- |
  | **{lpurl} Basic setup** | **When to use:** You track your tags on the actual landing page.<br>**Tracking template structure:** {lpurl}, a question mark, and then any parameters<br>**Example:**<br>**Final URL:** http://example.com<br>**Tracking template:** {lpurl}?matchtype={matchtype}<br>**Landing page URL:** http://example.com?matchtype={matchtype} |
  | **{lpurl} 1 redirect and parameters** | **When to use:** You have 1 redirect to a tracking website and want to send parameters to it.<br>**Tracking template structure:** Redirect URL, a question mark, url={lpurl}, an ampersand, and then any parameters<br>**Example:**<br>**Final URL:** http://example.com<br>**Tracking template:** http://tracker.com?url={lpurl}&matchtype={matchtype}<br>**Landing page URL:** http://tracker.com?url=http%3A%2F%2Fexample.com&matchtype={matchtype} |
  | **{lpurl} 1 redirect and landing page parameters (tracking template)** | **When to use:** You have 1 redirect to a tracking website and want to send parameters to your landing page using a tracking template.<br>**Tracking template structure:** Redirect URL, a question mark, url={lpurl}, %3F, %26, and then any parameters. Since {lpurl} is not at the beginning of the tracking template, you need to add %3F after {lpurl} instead of a question mark. You also need to replace the ampersand (&) with %26.<br>**Example:**<br>**Final URL:** http://example.com<br>**Tracking template:** http://tracker.com?url={lpurl}%3F%26matchtype={matchtype}<br>**Landing page URL:** http://tracker.com?url=http%3A%2F%2Fexample.com%3F%26matchtype={matchtype} |
  | **{lpurl} 1 redirect and landing page parameters (no tracking template)** | **When to use:** You have 1 redirect to a tracking website and want to send parameters to your landing page without using a tracking template.<br>**Tracking template structure:** Redirect URL, a question mark, url={lpurl}. Best to store landing page parameters in the final URL when using a redirect URL so that Bing does all the encoding inside {lpurl} when evaluating the tracking template.<br>**Example:**<br>**Final URL:** http://example.com?matchtype={matchtype}<br>**Tracking template:** http://tracker.com?url={lpurl}<br>**Landing page URL:** http://tracker.com?url=http%3A%2F%2Fexample.com%3F%26matchtype={matchtype} |

  > [!NOTE]
  > We recommend that you put the {lpurl} at the beginning of the tracking template. If you don't, the final URL will be escaped. All characters that are not letters, numbers, or the following punctuation characters will be escaped: -, _, ., !, *, (, and ).

  ## Advanced parameters

  | Parameter | What it returns |
  | --- | --- |
  | **{lpurl+2}** | The Final URL escaped twice. Also known as double encoding. You use this when you have 2 redirects before reaching the landing page.<br>**Final URL:** http://example.com<br>**Tracking template:** http://a-tracker.com?urlb=http%3A%2F%2Fb-tracker.com%3Furl%3D{lpurl+2}<br>**Landing page URL:** http://a-tracker.com?urlb=http%3A%2F%2Fb-tracker.com%3Furl%3Dhttp%253A%252F%252Fexample.com |
  | **{lpurl+3}** | The Final URL, escaped three times. Also known as triple encoding. You use this when you have 3 redirects before reaching the landing page.<br>**Final URL:** http://example.com<br>**Tracking template:** http://a-tracker.com?urlb=http%3A%2F%2Fb-tracker.com%3Furlc%3Dhttp%253A%252F%252Fc-tracker.com%253Furl%253D{lpurl+3}<br>**Landing page URL:** http://a-tracker.com?urlb=http%3A%2F%2Fb-tracker.com%3Furlc%3Dhttp%253A%252F%252Fc-tracker.com%253Furl%253Dhttp%25253A%25252F%25252Fexample.com |
  | **{unescapedlpurl}** | The Final URL, unescaped. |
  | **{escapedlpurl}** | The Final URL, escaped. Escapes all characters that are not letters, numbers, or the following punctuation characters: -, _, ., !, *, (, and ). |
  | **{escapedlpurl+2}** | The Final URL, escaped twice. Useful when you have a chain of redirects. |
  | **{escapedlpurl+3}** | The Final URL, escaped three times. Useful when you have a chain of redirects. |

  - **What characters to add after the URL insertion parameter?**

    As seen in the examples above, what you add after the URL insertion parameter is dependent on where in the tracking template you place it. You will want to adhere to the following rules or your website/third-party system may not properly save the information from your URL parameters.

    | Parameter | Tracking template location | Followed by | Example |
    | --- | --- | --- | --- |
    | **{lpurl}** | Beginning | ? | {lpurl}? |
    | **{lpurl}** | Not at the beginning | %3F | {lpurl}%3F |
    | **{lpurl+2}** | Not at the beginning | %253F | {lpurl+2}%253F |
    | **{lpurl+3}** | Not at the beginning | %25253F | {lpurl+3}%25253F |
    | **{unescapedlpurl}** | Anywhere | ? | {unescapedlpurl}? |
    | **{escapedlpurl}** | Anywhere | %3F | {escapedlpurl}%3F |
    | **{escapedlpurl+2}** | Anywhere | %253F | {escapedlpurl+2}%253F |
    | **{escapedlpurl+3}** | Anywhere | %25253F | {escapedlpurl+2}%253F |

    Microsoft Advertising will replace the question mark in your tracking template with an ampersand or a correctly escaped version of an ampersand if your final URL already contains a question mark.

- **Final URL only**

  | Parameter | What it returns |
  | --- | --- |
  | **{ignore}** | Ignores the tracking elements of your Final URL to help to reduce the crawl load on your website. It can only be used in your Final or Final mobile URL.<br>For example, if your Final URL is http://www.example.com/product?p1=a&/p2=b&p3=c&p4=d, and the tracking info following the question mark in the URL doesn't change the landing page, you can insert {ignore} before your tracking info to indicate that everything after it is merely tracking info. Here's an example of how to do this: http://www.example.com/product?{ignore}p1=a&p2=b&p3=c&p4=d |

  Here are some things to bear in mind when using {ignore}

  - {ignore} can't be embedded inside other parameters.
  - You must use {ignore} in your Final URL if anything in your Final URL can be modified by a third party when someone clicks your ad.

- **Microsoft Shopping campaigns only**

  If you advertise with Product ads in your Microsoft Shopping campaigns, the DestinationUrl of a BiddableAdGroupCriterion can include the following dynamic text strings. The strings are case-insensitive and must include the opening and closing braces.

  | Parameter | What it returns |
  | --- | --- |
  | **{CriterionId}** | The identifier of the Microsoft Shopping product group used with Product ads. *Note*: For Shopping campaigns, *{CriterionId}* is the same as *{OrderItemId}*. |
  | **{OrderItemId}** | The identifier of the Microsoft Shopping product group used with Product ads. *Note*: For Shopping campaigns, *{OrderItemId}* is the same as *{CriterionId}*. |
  | **{product_channel}** | The type of shopping channel (online or local) that the product in the clicked ad is sold. |
  | **{product_country}** | The country of sale for the product in the clicked ad. For example, US, UK, etc. |
  | **{ProductId}** | The numeric ID of the product that triggered your ad. This comes from your Microsoft Merchant Center catalog and is used with Product ads. |
  | **{product_language}** | The language of your product information, as indicated in your Merchant Center data feed. For example, EN, FR. |
  | **{seller_name}** | The value associated with the seller for that product, which can be the seller name from the feed or the store name based on if the advertiser is an aggregator or not. |

- **Microsoft lodging campaigns only**

  | Parameter | What it returns |
  | --- | --- |
  | **{hotelcenter_id}** | The ID of the Hotel Center account linked to the campaign that generated the ad when clicked. |
  | **{property_id}** | The property ID of the property from the associated account's property feed. |
  | **{hotel_partition_id}** | The unique ID of the property group that the clicked hotel ad belongs to. |
  | **{hotel_adtype}** | - *Hotel* if an ad for a hotel was clicked.<br>- *Room* if an ad for a Room Bundle was clicked. |
  | **{travel_start_day} {travel_start_month} {travel_start_year}** | The check-in date's day, month, and year displayed in the ad. |
  | **{travel_end_day} {travel_end_month} {travel_end_year}** | The check-out day, month, and year displayed in the ad. |
  | **{advanced_booking_window}** | The number of days between the date of the ad click and the check-in date being advertised (for example, "3" for an ad clicked on June 5 with a check-in date of June 8). |
  | **{date_type}** | - *default* if Microsoft Advertising selected the start and end dates (to show the user representative prices).<br>- *selected* if the end-user picked the dates themselves in a date picker. |
  | **{number_of_adults}** | The number of adults who will stay in the room that was shown in the ad. |
  | **{price_displayed_total}** | The total cost of the room that is displayed to the user in the user's local currency. |
  | **{price_displayed_tax}** | The amount of taxes and fees displayed to the user in the user's local currency. |
  | **{user_currency}** | Three-letter currency code indicating the user's local currency. This is also the currency for {price_displayed_total} and {price_displayed_tax}. For example, "USD" or "CAD". |
  | **{user_language}** | The two-letter language code that specifies the display language of the ad. For example, "en" or "fr". |
  | **{adtype}** | The type of Travel ad that was clicked on.<br>- *travel_booking* if the click was on a booking module.<br>- *travel_promoted* if the click was on a property promotion ad. |
  | **{rate_rule_id}** | The identifier of any special price that was clicked on. Travel advertisers can apply conditional rates to specific users (for example, loyalty members), specific devices (for example, discount for mobile users), and specific countries. |
