---
title: URL Tracking with Upgraded URLs
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: URL tracking allows you to find out how people got to your website by adding tracking parameters in Microsoft Advertising and then using a third-party tracking tool or service to analyze the data.
---
# URL Tracking with Upgraded URLs
URL tracking allows you to find out how people got to your website by adding tracking parameters in Microsoft Advertising and then using a third-party tracking tool or service to analyze the data. When an ad is served, the tracking parameters are dynamically appended to your landing page URL. This landing page URL is recorded on your web server and then a third-party tracking tool, like Adobe or Google Analytics, can interpret the data.

If you have set up [URL tracking in Microsoft Advertising](https://help.ads.microsoft.com/#apex/3/en/56798/2), you will be interested in Upgraded URLs. Upgraded URLs separate the landing page URL from the tracking or URL parameters so if you want to edit your URL parameters, your ad doesn't have to go through another editorial review. It also allows you to define a separate mobile landing page URL if you have a website that is optimized for smaller devices.

By separating the tracking template details from the final URLs you can take advantage of the following benefits:
- You can define tracking templates for one or more account, campaign, ad group, keyword, ad, or Sitelink Extension. If you use a common tracking template for all ads in your campaign for example, you can update it once at the campaign level instead of making changes to all of your ads. Tracking templates and custom parameters defined for lower level entities e.g. keyword override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](entity-hierarchy-limits.md). 
- When you update your tracking template information, the URL doesn't need to go through editorial review and your ads will continue to serve uninterrupted. Editorial review is only required when you change your actual ads, keywords or extensions. 
- Doing so helps Microsoft Advertising understand what information is URL versus tracking template information, and reduces crawling on your website. 

For an overview of Final URLs and tracking templates, see the following Microsoft Advertising help articles.
- [How do I create an account tracking template?](https://help.ads.microsoft.com/#apex/3/en/56772/-1)  
- [Can I use custom parameters?](https://help.ads.microsoft.com/#apex/3/en/56774/-1)  
- [What are Upgraded URLs and how do I upgrade?](https://help.ads.microsoft.com/#apex/3/en/56751/-1)  

## <a name="trackingtemplatevalidation"></a>Tracking Templates
Tracking templates can be used in tandem with final URLs to assemble the landing page URL where a user is directed after the ad is clicked. Here is an example:

**Final URL:** *https://contoso.com/contact-us*

**Tracking template:** *{lpurl}?ref=bing&keyword={Keyword}&cmpid={CampaignID}&agid={AdGroupID}&adid={AdID}*. The *{lpurl}* tag references the Landing Page URL. Bing will replace this with your Final URL when your ad is served.

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2) 
- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](entity-hierarchy-limits.md). 
- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit. 
- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.  
- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

For an account, campaign, or ad group level tracking template, please note the following:

- Additionally you must include at least one of the following landing page URL tags: *{lpurl}*, *{lpurl+2}*, *{lpurl+3}*, *{unescapedlpurl}*, *{escapedlpurl}*.

We recommend adding a default tracking template at the account level so that all the campaigns, ad groups, ads, and Sitelink Extensions use the same URL format. If you add more tracking templates at the campaign, ad group, ad or Sitelink Extension level, they will override the account level settings. You can set the account level tracking template using the [SetAccountProperties](../campaign-management-service/setaccountproperties.md) operation via the Campaign Management service, or set the *Tracking Template* field of the [Account](../bulk-service/account.md) record via the Bulk service.

## <a name="finalurlvalidation"></a>Final URLs
The following validation rules apply to Final URLs and Final Mobile URLs.  

- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.  
- You may specify up to 10 items for both *FinalUrls* and *FinalMobileUrls*; however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.  
- Usage of '{' and '}' is only allowed to delineate tags, for example "{lpurl}".  
- Final URLs must each be a well-formed URL starting with either http:// or https://.  
- If you specify *FinalMobileUrls*, you must also specify *FinalUrls*.  
- You may not specify *FinalMobileUrls* if the device preference is set to mobile.  

Also note the following validation rules for ad and site link final URLs.

- You may not specify final mobile URLs if the device preference is set to mobile.  
- If the ad or site link's tracking template or custom parameters are specified, then at least one final URL is required.  

## <a name="finalurlsuffixvalidation"></a>Final URL Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. Learn more about [Using a final URL suffix](https://help.ads.microsoft.com/#apex/ads/en/56925/2).

Final URL suffixes defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](entity-hierarchy-limits.md). 

Final URL suffix can contain one of the following:
- Static URL parameters  
- URL parameters that specify Microsoft Advertising URL parameters as values  
- URL parameters supported for [Final URL, tracking template, or custom parameter](https://help.ads.microsoft.com/#apex/3/en/56799/0)  

Final URL suffix cannot start with the following characters: ?, &, or #. However you should use "&" to append multiple parameter key and value pairs. For example: *src=bing&kwd={keyword}*

Final URL Suffix cannot contain the following URL parameters: {ignore}, {lpurl}, or {escapedlpurl}, or other variations of final URL placeholders ([Tracking templates only](https://help.ads.microsoft.com/#apex/3/en/56799/0) section).

## <a name="customparametersvalidation"></a>Custom Parameters
URL parameters are used to track information about the source of an ad click. By adding these parameters to your ads and campaigns, you can learn if people who clicked on your ads came from mobile devices, where they were located when they clicked your ads, and much more. For example if you use the {AdId} tag in your URL, then when the user clicks your ad the unique system identifier for that ad will be included in the URL where the user lands. For a list of supported parameters, see the *Available parameters* sections within the Microsoft Advertising help article [How do I create an account tracking template?](https://help.ads.microsoft.com/#apex/3/en/56772/-1).

Custom parameters work exactly the same as URL parameters with respect to dynamic substitutions, except that you will choose the parameter names and values (also known as key and value pairs). You can define custom parameters for one or more campaign, ad group, keyword, ad, or Sitelink Extension. If you use a common custom parameter for all ads in your campaign for example, you can update it once at the campaign level instead of making changes to all of your ads.

Custom parameters are helpful with sharing dynamic information across multiple URLs in a meaningful way for you to report on. Similarly how dynamic texts are provided by Microsoft Advertising to give you more campaign insights on your performance. Custom parameters are advertiser created. 

The following validation rules apply to custom parameters.
- Custom parameters defined for lower level entities e.g. keyword override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](entity-hierarchy-limits.md). 
- For campaigns, ad groups, and ad groups, ad group criterions, and ads Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.  
- For action, price, and sitelink ad extensions Microsoft Advertising will accept the first 3 custom parameter key and value pairs that you include, and any additional custom parameters will be ignored. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635) for action, price, and sitelink ad extensions, Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.   

## See Also
[Bing Ads API Web Service Addresses](web-service-addresses.md)

