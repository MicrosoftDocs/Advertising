---
title: Microsoft Advertising click measurement - Description of methodology
ms.service: msa-help
ms.subservice: msa-policies-compliance
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Microsoft Advertising Network policies help advertisers and partners learn what makes a great ad, as well as what is and isn't allowed in them.
---

# Microsoft Advertising click measurement - Description of methodology

## What Is included in the mrc accreditation audit process?

The Media Rating Council (MRC) accreditation certifies Microsoft Advertising's click measurement systems adheres to the industry standards for counting ad clicks and the processes supporting this technology are accurate. You can view the Microsoft Advertising's [Mrc Accreditation Letter](https://advertiseonbing.z22.web.core.windows.net/blob/bingads/media/library/policies-and-guidelines/click-measurement-description-of-methodology/mrc_accreditation_letter-bing_ads.pdf).

Below is a summary of the click measurement processes and methods Microsoft Advertising employs to measure and count clicks. For additional information, please visit the [Iab/mrc Click Measurement Guidelines](https://go.microsoft.com/fwlink/?linkid=2265319).

Click-counting methodologies discussed in this article apply to the Microsoft Advertising platform. The methodologies apply to the following types of clicks:

- **Click quality definitions**

  - **Defective clicks:** Clicks that have technical problems or defects that prevent them from being billable, but otherwise might reflect actual human activity. All defective clicks are non-billable.
  - **Invalid clicks:** Clicks that fail to meet the minimum requirements outlined in the IAB Click Measurement Guidelines. Invalid clicks are a subset of low-quality clicks.
  - **Low-quality clicks:** Clicks that Microsoft Advertising classifies as non-billable. Low-quality clicks originate from a variety of sources, including:

    - Clicks that suggest low commercial intent.
    - Clicks that have been identified as likely coming from automated bots.
    - Clicks that display unusual or suspicious patterns of behavior.
  - **Search ads:** Cost-per-click advertisements that are displayed in response to a user's search query or other user input, served across the Microsoft Advertising Network. This includes Bing.com (and sites owned and operated by Microsoft Bing, such as Bing.de and Bing.co.uk) and Yahoo.com (including other sites owned and operated by Yahoo! Inc.). The Microsoft Advertising Network also includes websites owned and operated by Microsoft's and Yahoo! Inc.'s syndicated search partners.
  - **Test clicks:** Clicks that are generated due to test activity.

  All assessments of traffic are probabilistic in nature and are based on predictive algorithms. Such categorizations and assessments are the best Microsoft Advertising estimates of traffic quality.

  To prevent the click-filtration process from becoming compromised or reverse-engineered, Microsoft Advertising discloses details of specific filtration procedures—except those in the Click Measurement Guidelines—only to auditors as part of the audit process.

- **Non-accredited clicks**

  Microsoft Advertising is currently accredited against the MRC's sophisticated invalid traffic detection and filtration standards (SIVT) for Search ads clicks on desktop and mobile web. Microsoft Advertising currently does not separate billable clicks reported in the “click” metric from in-app clicks or opt-in private preview programs vs. desktop or mobile web. In-app clicks are considered clicks generated through a mobile app. Opt-in private preview programs are Microsoft Advertising features which are in the late stages of development but can be made available to certain advertisers through invite only before it is generally available. In general, clicks generated from these private preview features should also not be considered MRC accredited. Microsoft Advertising currently separates billable clicks between Search ads and Audience ads advertising campaign types in campaign reporting—Audience ads clicks are separate from Search ads and are not MRC accredited. Most advertisers should expect most of their reported clicks to be generated from desktop or mobile web traffic. To learn more on how you can customize your campaigns to target or exclude specific customers and device types such as smartphone, PC, or tablet please refer to this [Article](hlp_BA_PROC_TargetingAgeGender.md).

## Click measurement methodology

Microsoft Advertising bases its click-measurement methodology on the terms and descriptions described in this section.

- **The Microsoft Advertising Click-referral Cycle**

  *Impression*

  Preceding a click by a user is an originating event, called an ad impression, in which content and ads are first served to the user. An ad impression can be served to the user in either of two ways:

  - Search ad impression: Any Search ad served on the Microsoft Advertising Network. This includes Bing.com (and sites owned and operated by Bing, such as Bing.de and Bing.co.uk) and .com (including other sites owned and operated by Yahoo! Inc.). The Microsoft Advertising Network also includes websites owned and operated by Microsoft's and Yahoo! Inc.'s syndicated search partners.
  - Content ad impression: A user requests a website by directly typing the site URL or by clicking a link. The Microsoft Advertising delivery engine then serves an ad to the user, along with the requested webpage and content, to publishers participating in the content network. The content network includes Bing-owned-and-operated sites, and Yahoo! Inc.-owned-and-operated sites and syndicated partner sites.

  Initiated click​

  Microsoft Advertising measures a click-through event (a user-initiated action on an ad element), causing a page to navigate to another web location, which transfers the user from a publisher site to an advertiser site. For click-counting purposes, these measurements are filtered for robotic activity and invalid click activity in accordance with the provisions of this guideline. In-unit clicks are not used in Microsoft Advertising. An ad click is defined as a click on any part of the ad frame that hosts Microsoft Advertising ads. Microsoft complies with IAB ad sizes.

  Measured click

  A click on an ad leads to a request being sent to the Microsoft Advertising redirection server. The redirection server measures the click and does the following:

  1. Decrypts the query string that contains the destination URL.
  1. Records the click in the web server logs.
  1. Creates a unique ClickID that represents the potentially billable click.
  1. Validates the click to determine whether encryption has been tampered with or the click is in some other way.
  1. If an advertiser has added ClickIDs to the destination URL, replaces the {msclkid} dynamic parameter with the Microsoft Advertising internal Click ID.Finally, redirects to the new destination URL, which includes the instantiated dynamic parameters.

  Received click

  The click is received after the advertiser's server receives the redirected request. The advertiser's server can then log the incoming request, along with any instantiated dynamic parameters that have been passed by the Microsoft Advertising direction server. Microsoft Advertising does not have instrumentation that indicates whether the click was received.

  Resolved click

  After the advertiser serves back the requested destination URL page to the user and the page is rendered in the browser, the click is "resolved." Microsoft Advertising does not have instrumentation that indicates whether the click was resolved.

  Redirection counting click

  Microsoft Advertising uses redirection click tracking to ensure maximum accuracy in counting and billing clicks. According to IAB Click Measurement Guidelines, "the use of 302 redirects helps to mitigate click counting discrepancies because of their easy and objective quantification."

- **Click losses during the click referral cycle**

  The IAB's Click Measurement Guidelines point out that, even by using the redirection counting method, differences will remain between measurements taken at the destination site because of various issues, such as latency, user aborts, 404 errors, and so on. In general, the number of measured clicks should always be equal to or greater than the number of received clicks. Advertisers should consider this known difference when determining whether they have an unusual amount of click loss. For example, if the advertiser's landing page is down, Microsoft Advertising might record billable clicks even if the advertiser's web server is not receiving them.

- **Pass-through tracking**

  The click link in Microsoft Advertising is encrypted and served immediately after the ad request, a sequence that reduces the likelihood that a malicious publisher or an infected browser might alter the redirection behavior of the ad click link.

- **Additional elements of measurement methodology**

  *Cookies*

  Microsoft Advertising uses the Microsoft User Identifier (MUID) to help count valid clicks.

  Encrypted links

  - Microsoft Advertising employs an encrypted-link technique to link the impression to the click and recover the original context of the ad call. When Microsoft Advertising receives an ad call and then prepares the ad to serve back, it embeds a special RGUID (Request GUID) identifier in the encrypted link. The link is sent out with the ad text and appears on the publisher page.
  - By embedding the RGUID in an encrypted link and then extracting it from the click request, Microsoft Advertising can join the click and the impression, and all of the information present at the time of the impression can be made available to the click.
  - The link encryption prevents tampering with the RGUID and link contents, ensuring that filtration based on link click (that is, one click per impression) can be enforced reliably.

  Bot instrumentation

  Microsoft Advertising occasionally deploys code to determine whether the traffic is using deceptive practices or compromised machines to request ads. Bot instrumentation is used on a sample of traffic.

  Packet sniffing

  Microsoft Advertising occasionally uses packet sniffing techniques to determine whether the traffic is artificial or malicious. Packet sniffing is used on a sample of traffic.

  Web server logs

  - 100% of ad request and click transactions are logged. In some cases, an ad impression is relayed to Microsoft Advertising through a syndicated network, and Microsoft Advertising treats this as an impression.
  - The MB Base Ad call web server log, created by Microsoft Advertising, captures information that is generated by the delivery engine as it receives the ad call and then formulates an ad response.
  - The MR Click web server log contains information that is collected during a click.
  - The FR Fraud web server log records click events that are found to be defective for one reason or another, including encryption checksum failures.

## General and Sophisticated Invalid Traffic Filtration Methodology

To identify and filter (exclude) invalid click activity—including, but not limited to, non-human click activity and suspected click fraud—Microsoft employs techniques based on identifiers, activity and patterns found in web log data. Microsoft Advertising receives sufficient signals to apply a 100% invalid traffic decision rates on click activity including traffic from both Microsoft and partner properties. However, because user identification and intent cannot always be known or discerned by publishers, advertisers or their respective agents, it is unlikely that all invalid click activity can be identified and excluded from the reported results. Microsoft Advertising engineering will apply updates to the filtration methods below on an as needed basis.

- **Multiple-click-per-impression**

  Microsoft Advertising uses the “multiple-click-per-impression method” in which a click is discarded when the time between the click and the previous click on an ad impression or search-result content is less than the repeat-click-refractory period specified by Microsoft. This rule is meant to correct for navigational mistakes such as unintentional double-clicking on an impression.

- **User frequency caps**

  Microsoft Advertising limits the number of click events that can be billed per search user for a given period of time. If a user is found to exceed the limits, all activity from the user within the period of time is considered invalid. The definition of a search user is proprietary and varies by context, and the frequency caps employed are also proprietary and not disclosed.

- **Impression staleness**

  A click is considered invalid if the time between the ad impression (or search result) and the click is more than the impression-staleness window. For example, if a user clicks an ad outside the impression-staleness window, Microsoft Advertising considers the click “out of context” and invalid.

- **Impression-Click Refractory Period**

  The click will be filtered as invalid if the time between the ad impression (or search result) and the click is less than a minimum amount called the impression-click refractory window.

- **Repeat-click refractory period**

  Rapid repeat-clicks can also signify robotic or non-commercial intent behavior. For a second click to be considered billable, a refractory period—that is, a minimum delay between repeated ad clicks—must be met.

- **Activity-based**

  Microsoft Advertising uses machine learning systems to predict the quality of traffic and determine commercial intent. Microsoft Advertising invalidates traffic that fails to meet a minimum level of quality as assessed through these techniques.

- **Served ad location**

  Microsoft Advertising might choose to not bill for a click that originates from a source other than the source that requested the ad.

- **Protocol validation**

  Each click request must have an appropriate type Microsoft Advertising GET or POST, for example Microsoft Advertising and response code (e.g., 300-series).

- **Upfront filtration**

  Microsoft Advertising leverages different techniques including upfront filtration to detect invalid traffic and exclude it. Upfront filtration techniques may impact up to a third of the traffic and include industry standard techniques like blocklists and allowlists from risky endpoints.

- **Self-announced prefetch activity**

  Mozilla-based prefetchers should set an X-MOZ HTTP header to a value of "prefetch."

- **IAB/ABCe international spiders & robots list**

  The [IAB/ABCe International Spiders](https://go.microsoft.com/fwlink/?linkid=2265512) & Robots List is used to identify and remove known bots.

- **IAB/ABCe international known browsers list**

  The [IAB/ABCe International Known Browsers List](https://go.microsoft.com/fwlink/?linkid=2265512) (included in the Spiders & Robots List) is used to identify browsers that conform to known browser types. Browsers that are not on this list are filtered.

- **Internal Microsoft Advertising filter lists**

  Microsoft Advertising maintains various internal house filter lists, including:

  - The House User Agent (“Crawler”) Filter List is a list of user agents that Microsoft Advertising has determined are robotic.
  - The House IP Filter List helps track IPs that are identified as demonstrating robotic or unauthorized activity, so that the IPs can be removed from future billing. The IPs on this filter list are monitored to determine whether they should be removed from the list.
  - The House Formcode Filter List identifies formcodes that should not be used for billing. Formcodes refer to a parameter that is added to Microsoft-owned webpages FORM=x. One of these formcodes, MONITR, is used to identify an internal test process. Any incoming request with the query string FORM=MONITR is deemed non-billable by Microsoft Advertising.

- **External filter lists**

  Microsoft Advertising also uses many external filter lists collected by the Blacklist Capture System.

- **Defect and data integrity checks**

  Microsoft Advertising analyzes click and impression records to determine whether they are properly formed. Any records found to be defective are not billed. Note that defective records are not ordinarily reported in customer-facing reports. As a result, more clicks might be observed from an advertiser landing page than are reported by Microsoft Advertising. Here are two examples of defect and data integrity checks:

  - Missing listingIDs: A click that has a listingID that does not match any known active campaign is regarded as defective and is filtered as invalid.
  - Improper click links: A click that fails certain tests for integrity, which might indicate tampering or some other error, is rejected as defective and is filtered as invalid.

- **Test traffic**

  Test traffic is any traffic that uses FORM=MONITR, originates from a Microsoft or Yahoo internal IP address, or is a recognized benign crawler or scraper. Test traffic is not billed.

- **Microsoft crawlers**

  Microsoft Advertising uses a variety of bots, such as msnptc for page-ad analysis. These bots navigate directly to the advertiser landing page, bypassing the paid links, and do not affect click counts. The search engine index bingbot is an exception to this rule. It navigates through paid links to reach the advertiser page. This bot is critical for ensuring that the advertiser page appears in organic listings as well as paid listings. Activity from this bot is classified as test traffic and is not billed.

- **Robot instruction files**

  Microsoft Advertising maintains robots.txt files on critical servers to discourage robotic activity from affecting click counts. However, because internet bots might not comply with the robots.txt file, they might still reach the advertiser's webpage.

  - Redirection server: A robots.txt file on its redirection server contains the following: User-agent: * Disallow: /
  - This file notifies bots that they should not crawl through the paid links on the search engine results page to reach the advertiser's site.
  - Bing: To discourage inflated impressions, a robots.txt file is maintained on Bing.com to notify bots that they should not request search results.

- **Geotargeting methodology**

  IP address lookups are used to determine the geographical location of search users. Because of limitations in geographical lookups, geotargeted ads might be served outside the requested geographical area. Also, there might be opportunities to serve the ad within the location, but it is not because of an error in the lookup. For example, the IP might be a proxy located somewhere other than the location of the search user.

- **Prohibition of bot activity**

  The use of any unauthorized automated process to access Microsoft Advertising is prohibited. Unauthorized bots that ignore this prohibition and robots.txt protocols might click paid links. Microsoft Advertising makes every effort to filter out this traffic when it occurs.

- **Sophisticated invalid traffic**

  Microsoft Advertising has implemented Sophisticated Invalid Traffic (SIVT) detection procedures in line with those defined by the MRC SIVT filtration requirements. Sophisticated invalid traffic consists of more difficult to detect situations that require advanced analytics, multi-point corroboration/coordination, significant human intervention, etc., to analyze and identify. SIVT filtration methods are based on activity-based rules, machine learning, and the results of human investigations.

- **Machine learning**

  The amount of data used to train Microsoft Advertising machine learning models differ depending on the nature of the model and data availability. For some machine learning models, 100% of user activities is currently used. For other machine learning models, user activities are sampled. Currently, both approaches are done over a period of 1 week. Microsoft Advertising employs both supervised and unsupervised machine learning models, such as deep neural networks, tree-based models, and more. Systems and processes are in place to ensure machine learning models are performing properly. These rely on human activities including ongoing alert-based investigation, quarterly machine learning model review, and machine learning training label corrections. New machine learning model development occurs as frequently as weekly.

- **Nature and scope of process and transaction auditing exercised**

  On a periodic basis, internal and external auditors perform procedures to get comfort over the transactions and processes employed in invalid traffic detection.

## The Microsoft Advertising Partner Network

To expand our reach to the widest audiences, we partner with high quality publishers across the world. Partners are approved to join the Microsoft Advertising Partner Network based on a variety of factors including estimated quality of traffic and company reputation. All partners and individual domains are vetted and approved through the Microsoft Advertising SEAM (Supply Excellence and Management) process. To learn more about the Microsoft Advertising Partner Network please refer to this [Article](https://go.microsoft.com/fwlink/?linkid=2265077) or search for 'syndicated search' on the help page. Microsoft Advertising also offers the capability to control where your ads are distributed on our network. To learn how you can set up ad distribution please refer to this [Article](hlp_BA_CONC_AboutAdDistributionHidden.md).

## Data Reporting

- **Click quality reports for Microsoft Advertising advertisers**

  The account performance and campaign performance reports available on the Reports tab of Microsoft Advertising can be enhanced to view click quality information. For more information, see the topic in Microsoft Advertising Help. Several columns related to click quality may be added to this report:

  - Low-quality clicks
  - Low quality clicks general
  - Low quality clicks sophisticated
  - Low-quality impressions
  - Low-quality click rate
  - Low-quality impression rate
  - Low-quality click conversions
  - Low-quality click conversion rate

  The columns allow you to:

  - Quantify the percentage of low-quality clicks that are being removed by Microsoft Advertising.
  - Compare low-quality click removal in Search ads programs.
  - View impressions filtering.
  - Report conversions that result from low-quality clicks: Microsoft Advertising reports conversions that result from clicks that were removed because of the aggressive Microsoft Advertising filtration program.

- **Media rating council invalid traffic (ivt) reporting columns**

  > [!NOTE]
  > Microsoft Advertising does not use the standard Media Rating Council Invalid Traffic reporting columns. Refer to the table below for how you can map the click quality reporting columns used in Microsoft Advertising to Media Rating Council Invalid Traffic reporting column equivalent.

  MRC IVT Requirement

  Gross Metrics (Completely Unfiltered)

  Net Metrics (Filtered for General Invalid Traffic Requirements)

  Total Net Metrics (Filtered for general and sophisticated requirements)

  Equivalent in Microsoft Reports

  Clicks + Low Quality Clicks

  Clicks + Low Quality Clicks - Sophisticated

  Clicks

- **Data that is not reported**

  Click quality reports do not show defective or test click traffic, because such traffic is free of commercial intent and is not potentially billable.

- **Click-Through Rates Greater Than 100%**

  Microsoft Advertising reports click traffic in one-hour blocks, so that advertisers can observe patterns of behavior and more effectively target campaigns to particular hours of the day. This click-reporting technique occasionally results in click-through rates of greater than 100%. For example, an impression might occur during “hour 1,” and its corresponding click might occur during “hour 2.” When this happens, the “hour 1” report will contain 1 impression and 0 clicks, and the “hour 2” report will contain 1 click and 0 impressions.

- **Post-report billing adjustments**

  Microsoft Advertising makes every effort to eliminate and not bill for low-quality clicks within the hour, so that reports can be posted with all low-quality clicks removed. However, Microsoft Advertising occasionally does not detect low-quality clicks until after the hour's data has been processed.

  In these situations, it is no longer possible to go back and ignore the invalid clicks, as it was when the hour's data was being processed. Instead, Microsoft Advertising issues a billing adjustment in which it credits the charges for clicks that were found to be invalid. These credits are displayed on the billing report as adjustments.

- **ClickIDs and Third-Party or In-House Reporting for Advertisers**

  Third-party landing page scripts and other in-house web server logs can be used to count clicks. However, by using Microsoft Advertising ClickIDs you can more accurately count the measured clicks by differentiating them from repeated user page views. Note that not all web analytics programs support ClickIDs.

- **How ClickIDs Work**

  A. The advertiser adds {msclkid} to the destination URLs for your ad.

  1. Select the **Campaigns** tab.
  1. In the **Campaigns** list, select a campaign that contains ads for which you want to enable ClickIDs.
  1. On the **Campaign selected** page, select an ad group that contains ads for which you want to enable ClickIDs.
  1. On the **Ad group selected** page, select the Ads tab.
  1. Under **Ad title**, select the ad for which you want to enable ClickIDs.
  1. In the **Destination URL** box, at the end of the URL, type the following: /?msclkid={msclkid}

     For example: www.contoso.com/?msclkid={msclkid}

     > [!NOTE]
     > If your destination URL contains dynamic text, such as {param1}, be sure to include the forward slash in the /?msclkid={msclkid} code snippet. If your destination URL contains other dynamic URL parameters, you can place the /?msclkid={msclkid} code snippet anywhere in the parameter string by using the & operator.
  1. Select **Save**.

  B. Microsoft Advertising creates, logs, and passes on the ClickID. When a search user clicks your ad, the user is sent to the Microsoft Advertising redirection server. The redirection server then creates a ClickID. The redirection server looks for the {msclkid} parameter in the advertiser's destination URL (for example, www.contoso.com/?msclkid={msclkid}). If the parameter is present, {msclkid} is replaced with the internally generated ClickID. The redirection server logs the ClickID to the Microsoft Advertising click log, and then sends the user to the destination page with the appended ClickID.

  C. The advertiser's web server log displays the ClickID. The advertiser's web server log receives the request and then logs it along with the embedded ClickID. A typical entry might look like the following example: 131.107.0.73 - - [07/Aug/2008:04:10:38 -0400] "GET /?msclkid=cdd4afcccb1c9a4cad9544dd7e5006d5 HTTP/1.0" 200 4674 "http://search.live.com/results.aspx?q=data+mining+case+studies&form=QBRE" "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 1.1.4322; InfoPath.2; MS-RTC LM 8)"

  D. The advertiser counts the unique ClickIDs. To calculate traffic referred from Microsoft Advertising, count only the unique ClickIDs. For example, the web server log might display the following ClickIDs:

  - cdd4afcccb1c9a4cad9544dd7e5006d5
  - eef3afcccb1c9a4cad9544dd7e5006d5
  - cdd4afcccb1c9a4cad9544dd7e5006d5

    In this example, the first and third ClickIDs are the same, so you should record a total count of two clicks.

- **Microsoft Advertising pubCenter reports**

  There are no click quality fields for publishers in pubCenter reports. Microsoft Advertising pubCenter reports do not include low-quality click counts, but they do include low-quality impressions. Please be aware of this difference when reviewing pubCenter reports.

- **How to Monitor Your Account for Suspicious Activity**

  Best practices for campaign monitoring include the following:

  1. Advertisers and advertiser agents are encouraged to monitor traffic and report suspected cases of low-quality or invalid clicks to the Traffic Quality Support team.
  1. Advertisers should use the campaign report to identify how many clicks and impressions are currently being flagged as low-quality through the internal click-quality assessment systems. Even when a click is flagged as invalid and it is not billed for, the invalid click might still be recorded in the advertiser's web server log. For example, if the advertiser determines that 15% of the clicks look invalid, the campaign report might show that 20% of the clicks have already been filtered. If that is the case, it is likely that the invalid clicks have already been addressed by Microsoft Advertising systems.
  1. Keyword reports by time period often provide useful pictures of account activity. Spikes or other unusual changes in traffic are often visible when you use this kind of report.
  1. After you identify an unusual change in traffic, it is a good idea to explore some common causes of these changes before raising the issue to Microsoft Advertising. A variety of reasons could explain these changes. For example, a large spike in clicks might occur because of:

     - New keywords recently added to the campaign.
     - Sales or other price changes.
     - Articles that appear on the Microsoft Advertising Network's search-related properties.
     - News stories and current events.
     - Movement from sidebar to mainline position in the search results. Mainline ad positions are known to generate much more traffic than sidebar positions. This change might occur because of the loss of a competitor, or it might occur because of changes to the Microsoft Advertising internal ranking algorithms.
     - Changes in keyword bidding.
     - Seasonal fluctuations in search activity.
  1. If none of these explanations can account for the change in traffic, Microsoft Advertising strongly recommends that you report the issue to our Support team.
  1. The Support team will try to determine the reason for the unusual click traffic and will recommend reimbursement if the traffic is found to be invalid.

- **How to Report a Traffic Quality Issue or a Published Error Correction**

  To report a traffic quality issue, contact [Microsoft Advertising Support](https://go.microsoft.com/fwlink/?linkid=398371). Please provide the following information, as appropriate:

  - Note that it is a traffic quality, click quality, or invalid click issue so that it can be quickly routed to the appropriate Support team.
  - Affected ad group and ad group number.
  - Affected ad ID and keywords.
  - Date range of the issue.
  - A brief description of the trends in your Microsoft Advertising reports or web server logs that prompt you to suspect invalid click activity.

  For best results, be sure to file the ticket within 30 days of the occurrence of the issue. When contacting Support, you might be asked for a sample of your web server log file. Please have that information available.

- **Communication of Known Reporting Issues**

  Please visit [Status.ads.microsoft.com](https://go.microsoft.com/fwlink/?linkid=2265824) or information on known system issues affecting the accuracy of reported clicks.

- **Limitations on Investigations**

  Click measurement records are retained for at least 11 months. The Microsoft Advertising investigation process is confidential, and Microsoft Advertising is under no obligation to disclose proprietary information during the process. Microsoft Advertising will not pursue click-quality investigations after 60 days from the occurrence of the issue. If the issue is submitted to Microsoft Advertising support within 60 days, accompanied by the information requested above, Microsoft Advertising will investigate the case to the best of its ability.

- **How Quickly Will the Investigation Team Get Back to Me?**

  If all of the requested information has been provided, the ticket has been properly routed to our Support team, and the issue occurred within the last 60 days, Microsoft Advertising will try to complete the investigation within nine days. In rare cases, because of the need to thoroughly investigate the circumstances of the issue, the investigation might take longer.

  ## Additional resources

  - [Exception process](hlp_BA_PROC_RequestException.md)
  - [History of changes to policies (change log)](hlp_BA_CONC_Policy_ChangeLog.md)
  - [Publisher preferences](hlp_BA_CONC_PublisherPreferences.md)
  - [Contact us](https://go.microsoft.com/fwlink/?linkid=2189081)
  - [Pilot programs policies](hlp_BA_CONC_Policy_PilotPrograms.md)
  - [CN pilot for policy](https://help.ads.microsoft.com/resources/microsoft_advertising_policy/microsoft-advertising-pilot-policy-cn.pdf)
