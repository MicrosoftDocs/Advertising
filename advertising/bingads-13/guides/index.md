---
title: "Bing Ads API Overview"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Find out if the Bing Ads API is right for you. 
---
# Bing Ads API Overview
Microsoft Advertising is a pay-per-click (PPC) advertising platform used to display ads based on the keywords used in a user's search query. For advertisers placing a large number of ads or developers building advertising tools, the Bing Ads API provides programmatic access to Microsoft Advertising. Using the Bing Ads API is the most efficient way to manage many large campaigns or to integrate your marketing with other in-house systems. Some organizations may choose a hybrid approach; using the web UI for most tasks but automating reporting or campaign optimization with the API. 

## <a name="who"></a>Who should use the Bing Ads API?
You should consider using the Bing Ads API if your business model resembles any of the following:

- You are a direct advertiser managing your own ad spend and you want to integrate our PPC marketing with your internal inventory management or conversion tracking systems.  
- You are a tools vendor developing advertising management solutions for advertisers or agencies.  
- You are an advertising agency and manage ad campaigns for many clients. 
- You are an aggregator and want to build Bing Ads API applications to manage the campaigns of your advertising clients.   

For more information about becoming an agency or aggregator partner, see the [Account Hierarchy](account-hierarchy-permissions.md#account-hierarchy) technical guide, the [Agency Hub](https://about.ads.microsoft.com/en-us/resources/agency-hub), and the [Microsoft Advertising Partner Program](https://about.ads.microsoft.com/en-us/partners/welcome) welcome page.

## <a name="where"></a>Where your ads will appear
When you advertise using Microsoft Advertising, your search ads can appear on the search results page on websites throughout the world. These sites can include the entire Microsoft Advertising Network, Microsoft sites and select traffic, or only partner traffic. For more information, see [About ad distribution](https://help.ads.microsoft.com/#apex/3/en/50871/0). 

Your ads can appear on search results page when a customer does a search on Bing. Where you ad appears on search results pages is determined by the keywords you use to associate your ads. For example, Pat owns a toy store and wants to create ads for kids' electronics. They might include keywords like "walkie-talkies", "electronic pets", and "kids' music players" so their ads could be more relevant to customers' searches, and show above or next to the search results.

![Expanded Text Ad](media/overview-textad.png "Expanded Text Ad")

To see where Microsoft Advertising is available and whether your ads will run, please see [Where does Microsoft Advertising show your ads?](https://help.ads.microsoft.com/#apex/3/en/50873/0) You can also set your ads to the languages your customers speak, which will influence where your ads will appear. For example, Pat's ads in German can appear not only in Germany but Austria and Switzerland as well. For more information, see [Ad Languages](ad-languages.md).

## <a name="what"></a>Enrich your ad layout
You can extend the ad layout to be more visually appealing and feature rich using [Ad Extensions](#adextensions).

### <a name="adextensions"></a>Ad Extensions
With ad extensions, you can decorate ads with additional information that helps customers find relevant information about your products and services. For example, you can include deep links into your website to quickly direct your customers to relevant promotional or technical information that may help increase conversions. Microsoft Advertising offers the following popular ad extension types. For more information please see [Ad Extensions](ad-extensions.md) and [Microsoft Advertising Web UI Help - What are ad extensions?](https://help.ads.microsoft.com/#apex/3/en/51001/1).

### <a name="shoppingcampaigns"></a>Microsoft Shopping Campaigns
A Microsoft Shopping campaign enables you to advertise the products from your Microsoft Merchant Center store product catalog. Product ads from a Microsoft Shopping campaign include details about the product, an image, and optional promotional text. After you [create a product catalog](https://help.ads.microsoft.com/#apex/3/en/51105/1), you can then submit the catalog feed using the [Content API](/advertising/shopping-content/index) or [FTP/SFTP](https://help.ads.microsoft.com/#apex/ads/en/56838/1). For more information, please see [Product Ads](product-ads.md).

## <a name="audience"></a>Show ads to your target audience
Your ads can appear specifically for customers on the go, who use their smartphones and tablets to search and browse the Internet. Or you can create ads that appear on both desktops and smartphones but prioritize where you want the ads to appear more often.

![Search results on mobile](media/overview-mobilead.png "Search results on mobile")

You can show your ads to customers in specific locations, like cities or countries/regions. For example, Pat wants only local customers to see their ads. They can set your ads to appear to customers within a 20-mile radius around their shop by using radius targeting.

You can also setup your ads to display to users of a certain age group or gender, or to display at a certain day and time of the week. For more information about showing ads to your target audience, see [Show Ads to Your Target Audience](show-ads-target-audience.md).

## <a name="optimize"></a>Optimize your campaigns
You will want to optimize your campaign budget and keyword bids for a competitive advantage. The Bing Ads API [Ad Insight](../ad-insight-service/ad-insight-service-reference.md) service uses historical performance, web page data, and demographic data to provide data and bid suggestions that you may find helpful as you optimize your campaigns over time. For more information, see [Budget and Bid Opportunities](budget-bid-opportunities.md).

Once your campaigns are up and running, you'll want to monitor their performance using the Reporting API. Microsoft Advertising can generate reports to track ad delivery, budget, and targeting. Each report type aggregates data at a different level and provides different [Report Attributes and Performance Statistics](report-attributes-performance-statistics.md). For example, You would use the account and campaign performance reports to monitor click and spend data to ensure that you are optimizing your budget, and you would use the ad and keyword performance reports to identify ads and keywords that are performing well in terms of click-through rate and conversions. For more information, see [Reporting API Guides](reporting-guides.md).

## <a name="developercommunity"></a>Join the developer community
The [Microsoft Q&A](/answers/topics/advertising-api.html) forum is available for the developer community to ask and answer questions about the Bing Ads APIs and Microsoft Advertising Scripts. Microsoft monitors the forums and replies to questions that the community has not yet answered. To make sure that we see your question, tag it with 'advertising-api'.  

If the investigation involves sensitive account or personal details, or if you are not finding the information you need to solve your problem via [Microsoft Q&A](/answers/topics/advertising-api.html), please contact [Microsoft Advertising Support](https://about.ads.microsoft.com/en-us/microsoft-advertising-support). To resolve the issue efficiently, please provide support with the details requested in [Engaging Support](handle-service-errors-exceptions.md#contact-support). 

You can sign up for the monthly newsletter via the [News](https://developers.ads.microsoft.com/News) tab of the Developer Portal, and that's also where the latest [blog](https://go.microsoft.com/fwlink/?linkid=2026358) announcements are aggregated. 
