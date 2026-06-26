---
title: How can I get my ads in front of my customers?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Use targeting to help focus your ads on potential customers who meet specific criteria (such as location or age), increasing the chance that they see your ads.
---

# How can I get my ads in front of my customers?

> [!NOTE]
> If you're advertising in connection with any financial, insurance, education, career and employment, and/or housing services, you **cannot** use individuals' demographics—such as age, gender, location, etc.—for the purpose of personalizing advertising, segmenting, or profiling customers.

Getting your ad in front of the right people—that's what targeting is all about. With targeting, Microsoft Advertising can help you focus a campaign or ad group on potential customers who meet specific criteria, so you can increase the chance that they see your ads. To learn how, see [How to target customers](hlp_BA_PROC_TargetingAgeGender.md).

There are four ways to target your ads. You can use these individually or in combination:

## FAQ

- **Target by geographic location**

  - Select **Locations**.
  - Select locations you want to target or exclude. You can target:

    - All available countries/regions
    - Selected countries/regions and states/provinces
    - Selected counties within the United States
    - Selected cities, metro areas, and postal codes.* For a full list of country/region availability for ad language and location targeting, see [How does ad language and location targeting affect who can see my ads?](hlp_BA_CONC_LocTargetAndLang.md)

      > [!NOTE]
      > - Not all postal codes are supported for targeting exactly within their boundaries. If you target an unsupported postal code, it will be converted into a radius target (see below).
      > - For Canadian and UK postal codes, only the first segment (for Canada, the first 3 characters; for UK, the first 2-to-4-character segment) is recognized. If you enter the second segment, you will only be able to use radius targeting.
      > - The boundaries of some postal codes in Australia, Canada, France, Germany, and United Kingdom do not appear accurately on the map you see in Microsoft Advertising, but targeting within them will still function accurately.
    - A specified radius around a postal code, coordinates*, landmark, or area. (Note: You cannot exclude using radius targeting.)

      *Coordinates can be searched for in the format "[latitude], [longitude]" with the degrees in decimal form — for example, "44.590,-104.716".

    > [!IMPORTANT]
    > Microsoft Advertising will honor your location targeting settings and exclude locations you don't want to target. However, location targeting and exclusions may not always work because of factors beyond the control of Microsoft Advertising, such as a customer’s device settings or the inherent limits of geolocation via GPS, IP addresses, Wi-Fi networks, and Bluetooth.
  - You can also target multiple locations in bulk by selecting **Add bulk locations** below the option for **Let me choose specific locations**. Then, you can: (1) Optionally choose the country/region for the locations you want to add, (2) enter your locations to target or exclude, and (3) select **Find locations**. You can always add more locations later by selecting **Add locations**.

    > [!NOTE]
    > You can target by country/region, state/province, city, or ZIP/postal code.

    > [!NOTE]
    > Bulk locations are currently available for Search campaigns. Not everyone can add bulk locations yet. If you can't, don't worry—it's coming soon!

    > [!NOTE]
    > If you're using this feature in Smart mode, it's only available in United States and Canada. For more information, see [Get to know your Microsoft Advertising account modes](hlp_BA_CONC_SmartVsExpert.md).
  - Select who exactly should see your ads: a) People in your targeted locations, or b) people in, searching for, or viewing webpages about your targeted locations.

- **Target by day of the week or time of day**

  To target by specific day or time of day, adjust the settings in **Ad schedule**. From the navigation menu on the left, select **Ad schedule**. Select **Add** and choose the campaign or ad group you want to create an ad schedule for. Fill in the required information for targeted days, start time, end time, and bid adjustment. You can increase bid adjustments up to 900% and decrease them by as much as 90%. You can create as many ad schedules as you need. Then choose between 12- or 24-hour display times and if your ad schedule should follow your account's time zone or the ad viewer's time zone. Lastly, select **Save** to apply your ad schedule. Once the ad schedule has been created, you can view and edit the existing ad schedules in the table near the bottom of the page.

  > [!NOTE]
  > You can always view reports for your ad schedule by following these steps:

  From the navigation menu on the left, hover over **Campaigns** and select **Ad schedule** > **Ad schedule**.

  Then, select the time period you want to view (day, hour, date, week, month, quarter, or year) and specify the calendar selection. You can add any necessary columns by selecting **Columns** and then selecting **Modify columns** to add or change what appears in the chart.

- **Target by demographic**

  - Select **Demographics** to adjust other campaign targets like **Age**, **Gender**, **Company**, **Industry**, and **Job Function**.
  - To target by company, industry, and/or job function, select **Edit target** under each target type. Search or browse for companies, industries, and/or job functions, and select **Target** for the appropriate ones. Select **Done** for each target type. Finally, set a bid adjustment for each target.

    > [!NOTE]
    > Targeting by company, industry, job function, and specific day or time of day isn't available for Smart mode.
  - For Search campaigns, you can adjust your targets for **Company lists** and **Job seniority** during ad group creation or later in your campaign/ad group settings after creating your campaign. **Company lists** can also be created and associated with your campaigns and ad groups in the Audience library by going to **Tools** > **Audiences**. For instructions and more information, see [How do I create a Search campaign?](hlp_BA_PROC_Create1stAd.md)

    > [!NOTE]
    > Company list and job seniority targeting is only available for Search campaigns. Not everyone has these features yet. If you don't, don't worry—they're coming soon!
  - For all demographics, you can increase bid adjustments up to 900% and decrease them by as much as 90%.

    > [!NOTE]
    > Excluding age targeting can only be done within your ad group level settings. To exclude age targeting from the ad group level in Microsoft Advertising, follow these steps:

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ad groups**.
  1. Select the approprirate ad group.
  1. Select **Demographics** > **Age**.
  1. In the **Age** column, select the green circle next to the age targeting option you want to exclude.
  1. Select **Excluded**.

     > [!NOTE]
     > You can always enable it again by selecting **Enabled**.

     > [!NOTE]
     > - Ads will not be shown to customers under 18 years of age if the ad content is determined to deal with mature subjects such as gambling, tobacco, weapons, violence, alcohol, or hate speech.
     > - To opt out of showing ads to customers under 18 years of age regardless of your ads' content, just submit [this form](https://go.microsoft.com/fwlink/?linkid=875182) (when you select the link, you will need to sign in to Microsoft Advertising if you aren't currently signed in). You can opt back in using the same form.
     > - Age information from the customer's Microsoft account will be used to determine the customer's age.

- **Target by device**

  - To target by device type, select **Devices**. You can target computers, tablets, or smartphones. Bid adjustments for device types can be anywhere from -100% to +900%. Please note that we'll automatically change your bid adjustments for device type in real time to optimize performance and increase your chances for a conversion. We'll use your bid adjustment as a reference point, but the actual bid amount may be higher or lower.

    > [!NOTE]
    > Targeting by device isn't available for Smart mode or within Performance Max campaigns.

    > [!NOTE]
    > Microsoft Advertising does not support device targeting by model/brand.

When you select any of these targets, you can place an optional extra bid, known as an . Placing a bid adjustment increases the likelihood that your ad is displayed in a better position for customers who meet your targeting criteria. For more information about incremental bids, including a couple of examples, take a look at [How to target my customers by adjusting my bids](hlp_BA_CONC_AboutAdvancedBidding.md).

If you use targeting, you should set your basic targets at the campaign level and then refine your targets at the ad group level. If there is no conflict between the targeting settings at both the campaign and ad group levels, Microsoft Advertising uses both. If there's a conflict, ad group targets take precedence. Campaign targets apply to all ad groups in that campaign. Ad group targets override campaign targets within that ad group.
