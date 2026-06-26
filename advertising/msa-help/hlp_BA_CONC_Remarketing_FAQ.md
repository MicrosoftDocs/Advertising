---
title: FAQ - Remarketing
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Remarketing lets you target your ads to people who have visited or interacted with you website before. Here, find some common user questions, tips, and best practices when getting started with remarketing.
---

# FAQ - Remarketing

> [!NOTE]
> If you're advertising in connection with any financial, insurance, education, career and employment, and/or housing services, you **cannot** use individuals' demographics—such as age, gender, location, etc.—for the purpose of personalizing advertising, segmenting, or profiling customers.

Remarketing lets you target your ads to people who have visited or interacted with your website before. Here, find some common user questions, tips, and best practices when getting started with remarketing:

## FAQ

- **What is UET and how do I set it up?**
  Take a look a this [article] (https://help.ads.microsoft.com/#apex/ads/en/56681/2)

- **How are UET tags, conversion goals and remarketing lists related? Do I need to create a goal for remarketing lists? How do I create a UET tag?**

  A UET tag records what customers do on your website then Microsoft Advertising starts collecting that data allowing you to create conversion goals to track conversions or target audiences using remarketing lists. UET is a prerequisite for conversion tracking and remarketing. You create one single UET tag in Microsoft Advertising and then add it to your website once.

  It is important to note that the only thing common between conversion goals and remarketing lists is that they share the common UET tag. Beyond that there is no need to have goals created to define remarketing lists or vice versa. During the creation of a conversion goals and remarketing lists, you select what UET tag to use. We recommend that you install one UET tag across your website and use that tag for both conversion tracking and remarketing.

- **What is sharing? When should I pick On account # vs Across all accounts?**

  When you create a remarketing list, you can use **Sharing** to determine whether to add the remarketing list to the current account or allow the remarketing list to be shared across all accounts under the manager account.

  - **Across all accounts:** The remarketing list can be associated with ad groups or campaigns belonging to any account under the manager account. This is useful when you want to set up multiple accounts to manage campaigns for a single website.
  - **On account #:** The remarketing list can be associated with ad groups under the current account only.

  Once you set sharing, you can't change it. If you want to change the sharing scope, you need to create a new conversion goal and delete the old one.

- **How many remarketing list associations can I have?**
  Take a look at the table in [What are my options for audiences](https://help.ads.microsoft.com/#apex/ads/en/56892/1)

- **What is the ad delivery behavior when multiple bid boost settings are in place? What other types of bid adjustments are possible?**

  If someone qualifies to be part of multiple remarketing lists AND the remarketing lists are associated with the same ad group or campaign with different bids, the highest bid will be applied.

  If you set different bids for device, ad schedule, location and demographic, the bids get multiplied when your ad is shown.

  This is the same as Google Ads. Note that there are complex ad selection algorithms that optimize for revenue and relevance.

  It isn't always guaranteed that the highest bid wins. Microsoft Advertising allows bid adjustments to be defined based on aspects such as device and ad schedule at both the campaign and ad group level.

- **Does Microsoft Advertising honor user opt-outs as part of remarketing?**

  Yes, Microsoft Advertising does. People can opt out of personalized ads in two ways: from [Microsoft's Ad settings page](https://go.microsoft.com/fwlink/?linkid=2102708) and from Windows Settings. When someone opts out the expectation is that they don't receive any ads that are targeted based on their demographic/geographic attributes or their inferred interests based on their online behavior.

- **Does remarketing work across devices (PC, Tablet, and Mobile)?**

  Yes, remarketing works across devices. Meaning if a user uses different device + browser combinations (and hence may have different MUIDs), all their MUIDs and ANID are associated with the remarketing list that their actions qualify them to be part of.

  So, when they come back to your website, our ad delivery engines apply your specific bid boosts. Or if a user previously visited your website on a device, they will be qualified to see your ads on any other devices, as long as they have signed in with a MSA account. All this is possible because Microsoft uses a heuristics based approach to associate users MUIDs and ANID across devices.

  > [!NOTE]
  > Any heuristics based approach is ultimately an approximation science and cannot guarantee good results all the time. There are ongoing efforts to make optimizations.

  UET tag only supports browsers, which means that user actions on your apps can't be used to add them to remarketing lists.

- **Can remarketing lists be associated with ad groups or campaigns set up for Product ads and Microsoft Shopping campaigns?**

  Yes.

- **What happens when you edit a remarketing list?**

  There are 2 parts to this question:

  - **What happens to the audience**: Users that are already part of the remarketing list continue to be so for one day. Those users that exhibit the behavior specified in the new definition of the remarketing lists will get added to the list within minutes. However, old users are not flushed out for one day. Until that, the ad delivery engine will apply bid boosts/customize ads/broaden keywords to existing and new users.
  - **What happens to the reporting data**: All the old impressions, clicks, and conversion counts that were associated with the remarketing list will continue to be associated. After the changes, the impressions, clicks, and conversion counts coming out of the new set of users will get appended to the old numbers.

  Note that changing the name or description of the remarketing list will not affect the audience or the reporting data.

- **How long does it take before users are added to remarketing lists and remarketed to?**

  When you create remarketing lists, you specify what user actions on your website qualify them to be part of the remarketing lists.

  When users perform qualifying actions, they are added to the remarketing lists within minutes. If the remarketing list minimum size of 300 (minimum cookie pool) is met, and you have associated the remarketing list with an ad group or campaign (including exclusions) and set a specific bid amount, the ad delivery engine will start serving remarketed ads to those users on Microsoft Advertising.

  Note our reporting pipelines are slower and take one day to reflect the list size. When you create their remarketing lists, we try to provide an estimation of the list size in the first 6 hours based on some sample data. The data is then replaced with the actual list size when the reporting pipelines execute.

- **I don't see any impressions associated with my remarketing lists in either the Audiences table or the audience performance report. Why?**

  - Have you instrumented your site with a UET tag either directly or via a tag management/container solution?
  - Does your UET tag status show up as **Tag active** when you go to **Conversion Tracking** > **UET tags** (or **Tools** > **UET tags**)? If not, you have not installed the UET tag properly. You can use the [UET tag helper](hlp_BA_CONC_UET_TagHelper.md) to troubleshoot and validate that tag has been implemented correctly on your website. If you know how to, you can also use any network sniffing tool (for example, fiddler) to make sure that the UET tag is firing. Also make sure that you are using the right UET tag (you can look up the UET tag for each remarketing list by going to **Tools** > **Audiences**).
  - Are you using a valid criteria in your remarketing list? It is possible to define rules that will not evaluate to true and hence your lists may be empty.
  - Do you have at least 300 users in your remarketing list? That is a prerequisite for remarketing to be applied. Verify that your membership duration is not so small that fewer than 300 users would have performed the actions that you specified in your remarketing list definition in that period.
  - Did you associate remarketing lists with active ad groups or campaigns?
  - Is the association itself marked active?
  - Are you seeing any impressions attributed to those ad groups or campaigns on the Ad Groups or Campaigns table? If not, do what is necessary to win the auction (increase bid, bid boost for specific remarketing lists, improve quality score etc).
  - If you are set up correctly (1-7 above) and still not seeing any impressions, [contact Support](https://go.microsoft.com/fwlink/?linkid=398371). Please be aware that there is always a possibility that users in your remarketing list have not performed relevant searches or visited sites on the [Microsoft Advertising Network](hlp_BA_CONC_AboutAdvertisingNetwork.md) in the time frame you are looking at.

- **My remarketing list size is too small (or too large). I see different numbers in Google Ads / Google Analytics. What could be the reason?**

  - Have you instrumented your site with a UET tag either directly or via a tag management/container solution?
  - Does your UET tag status show up as **Tag active** when you go to **Conversion Tracking** > **UET tags** (or **Tools** > **UET tags**)? If not, you have not installed the UET tag properly. You can use the [UET tag helper](hlp_BA_CONC_UET_TagHelper.md) to troubleshoot and validate that tag has been implemented correctly on your website. If you know how to, you can also use any network sniffing tool (for example, fiddler) to make sure that the UET tag is firing. Also make sure that you are using the right UET tag (you can look up the UET tag for each remarketing list by going to **Tools** > **Audiences**).
  - Are you using a valid criteria in your remarketing list? It is possible to define rules that will not evaluate to true and hence your lists may be empty.
  - Verify if the membership duration is too large or too small. Larger duration translates to higher possibility of more users performing actions you specified in your remarketing list definition and hence becoming part of that list.
  - Note that the system has user activity logged from the time the UET tag was first instrumented. So regardless of when you create remarketing, as long as the system has data for the membership duration specified, it will add all those users, who performed specified actions, to the remarketing list.
  - General explanation of number mismatch with your estimation

    All platforms (Google, Microsoft, etc.) use browser cookies to track users online. These cookies are specific to a device + browser so it is commonplace for a single user to have several cookies based on device + browser combinations they use. These platforms have components in place to identify multiple cookies of the same user as duplicates and de-dup. It is commonplace hence to see variation in the counts b/w these platforms given the differences in the logic used by those components.

    A greater or smaller list size is not always a bad thing. A list is ultimately a collection of user cookies. Even if one user is represented multiple times in that list, it is still the same user. Depending on which device + browser combination the user uses, the system will identify the corresponding cookie to be associated with a remarketing list. It is impossible that a user that is not actually part of a remarketing list will ever get remarketed to.
  - If you don't think it could be 1-6 above in your case, please contact Support.

- **How can I create and edit associations in bulk?**

  - **Creating associations in Bulk**

    : While the Audiences table allows creation of associations, it can only be done for one ad group or campaign at a time. In order to support the creation of large number of associations across ad groups/campaigns in bulk, we have extended the Ad group and Campaigns tables to support associating selected ad groups/campaigns with one or more remarketing lists. Simply filter for and select the ad groups/campaigns you wish to associate with remarketing lists and click on Edit > Associate with Remarketing lists on the action bar.

  - **Managing associations in Bulk**

    : Please note that once created, associations can only be edited from the Audiences table. You can pause, enable or delete associations in bulk from the Audiences table by clicking on Edit option on the action bar. You can also convert any existing targeting association to exclusion and vice versa, through the Edit option. Similarly, bid adjustments can be edited in bulk by selecting Edit > Change bid adjustments. Please read the next FAQ for editing targeting setting.

- **Can I use a "Target and bid" setting for one audience list and a "Bid only" setting for another audience list in the same ad group or campaign?**

  No, you can only select one targeting setting per ad group/campaign that will apply to all your audience lists in that ad group/campaign (either "Target and bid" or "Bid only"). It isn't possible to use different targeting settings in the same ad group for remarketing lists, in-market audiences, and custom audiences. Whichever setting you've selected most recently ("Target and bid" or "Bid only") overrides any previous settings.

- **How do I edit targeting setting for an association?**

  Targeting settings can be edited one ad group/campaign at a time from the **Audiences** table by clicking on **Create association** and then selecting the relevant ad group/campaign. The updated targeting setting is applied to all the associations of that ad group/campaign. If you want to do this in bulk for multiple ad groups, please use [Microsoft Advertising Editor](hlp_BA_CONC_AboutDesktop.md). [Learn more about editing targeting settings for an association](hlp_BA_CONC_Audiences_TargetSettings.md)

- **Is retargeting allowed for sensitive categories?**

  All retargeting must comply with all laws and regulations, including any prohibitions to creation of remarketing lists based on sensitive data. It is the advertisers responsibility to ensure they comply with all applicable laws and regulations.

  We recommend that advertisers follow industry best practices where retargeting on sensitive categories is not prohibited by law. Advertisers can find more information on industry best practices in the NAI code of conduct. Additional information about our remarketing policy can be found on the [remarketing policy page](https://go.microsoft.com/fwlink/?linkid=852540).

- **What are sensitive data/sensitive categories?**

  Sensitive data is, among others, information about a person's physical or emotional health, sexual orientation, religion, or financial status. Some examples of sensitive categories are listed below:

  - Sexually transmitted disease
  - Mental health conditions like anxiety or depression
  - Termination of pregnancy
  - Bankruptcy
  - Bad credit score
  - Sexual orientation or gender identity

- **Are there any vertical-level restrictions for retargeting like alcohol, pharmaceutical, or religious/ethnic dating advertisers?**

  Advertisers are responsible for compliance with applicable regulations and industry best practices. Some vertical-level restrictions do exist:

  - Adult
  - [Disallowed content](https://advertise.bingads.microsoft.com/en-us/restricted-and-disallowed-content-policies)
  - Finance - Unregulated

- **Will an advertiser experience rejection due to a specific retargeting category which may be sensitive in nature?**

  As an advertiser, you are in full control of the retargeting categories you create and Microsoft Advertising requires that you to comply with any applicable restrictions. Upon receipt of an escalation or complaint for a sensitive retargeting category you created, we may reject your campaign. Ad review will otherwise work as usual.

- **Can advertisers create an audience for users under the age of 13 or implement retargeting on a site directed to children under the age of 13?**

  No, advertisers cannot create a remarketing list, retarget, or otherwise profile users under the age of 13 (or a different local age requirement). In addition, advertisers cannot target users under the minimum age required for the product they are advertising. For example, alcohol ads cannot be targeted to individuals under the minimum drinking age in the location(s) targeted.
