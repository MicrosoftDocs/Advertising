---
title: Create a mobile app campaign
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn all about mobile app campaigns.
---

# Create a mobile app campaign

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

Mobile App campaigns help you enhance discoverability and increase downloads of your iOS and Android apps. By promoting your apps across the entire Microsoft Advertising Network, you can reach a wide audience on a variety of sites and placements.

Rather than manually creating ads, you only need to add assets (such as images, text, and videos) to your asset groups. Then, we optimize your ads to capture the attention of customers who are ready to purchase your app. We use the most optimal asset combinations to create effective ads based on your settings, which includes your audience signals.

## Create your Mobile App campaign

1. From the navigation menu on the left, select **Create**.
1. Choose **Promote apps** as your campaign goal.
1. Select **Android** or **iOS**.
1. Select **Continue**.
1. Follow the steps provided by the campaign creation wizard.

   Here's some information about what you'll see in your [asset group](#asset-group-settings), [targeting](#targeting-settings), [campaign](#campaign-settings), and [budget](#budget-settings) settings:

<a id="asset-group-settings"></a>

- **Asset group settings**

  - **Choose the app you want to promote**

    Choose your app. You can search by app name, ID, or company. If you're unable to find your app, refine your search by selecting a country/region where the app is available.

  - **Asset group name**

    Give your asset group a unique name. You should base your asset groups on your campaign's goal, and it's a good idea to have your asset group's name reflect its goal. <br> <br>

    > [!NOTE]
    > An asset group name cannot contain scripts, HTML, or other markup language.

  - **Images**

    Add at least one image to your ads. You may use an image from your existing images, **Website images**, **Stock images**, **Social**, or upload an image. <br> <br>

    > [!NOTE]
    > See [Best practices for images](#best-practices-for-images) for more information about best practices for images.

  - **Headlines**

    Enter up to 15 **Short headlines**. <br> <br>

    > [!NOTE]
    > Short headlines must be 30 characters or fewer. Headlines are the most prominent text that appears in your ad, so you should make the most out of the available characters.

  - **Descriptions**

    Enter up to five descriptions. <br> <br>

    > [!NOTE]
    > Descriptions must be 90 characters or fewer.

  - **Video**

    Add at least one video. You can add up to five videos. <br> <br>

    > [!NOTE]
    > An engaging video delivers a message to interested customers and can lead to clicks. Based on your video's quality, the placements where your ads are eligible to serve may vary. For information about the technical requirements, see [Technical requirements for videos](#technical-requirements-for-videos).

  - **Start and end dates**

    Choose when you want your ads to run.

  <a id="targeting-settings"></a>

- **Targeting settings**

  - **Location**

    Choose where you want your ads to appear. You can target or exclude specific countries/regions, states/provinces, cities, or zip/postal codes. [Learn more about how language and location targeting affect who can see your ads](hlp_BA_CONC_LocTargetAndLang.md).

  - **Language**

    Choose the language of the sites where your ads appear. This is the language you write your ads in. [Learn more about language options in Microsoft Advertising](hlp_BA_CONC_AboutLanguageOptions.md).

  - **Placements**

    Choose to show your ads on **All Microsoft mobile placements** or **Microsoft owned and operated mobile placements**.

  - **Audience signals (optional)**

    Create an audience signal or choose from your existing audience signals. We'll use them as a starting point to find customers and determine who sees your ads.

  <a id="campaign-settings"></a>

- **Campaign settings**

  - **Campaign name**

    Give your campaign a unique name. It's a good idea to have your campaign's name reflect its goal. <br> <br>

    > [!NOTE]
    > A campaign name cannot contain scripts, HTML, or other markup language.

  - **Ad schedule**

    Select **Ad schedule** if you want to show your ads only on certain days or certain times of day. Learn more about ad schedule settings: [How can I get my ads in front of my customers?](hlp_BA_CONC_Targeting.md)

  - **Campaign URL options (optional)**

    Set up the tracking and redirect information for your ads. [Learn more about including tracking templates or URL parameters in your final URL](hlp_BA_CONC_UpgradeURL_URLParameters.md).

  - **Conversions**

    This allows you to specify which actions to count as conversions, as recorded by UET. You have two options for choosing conversion goals: <br> <br>

    - Use your account's **Include in “Conversions”** setting. This applies your account's conversion goals to this campaign. To see which conversion goals are included in your account settings: From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
    - Choose specific conversion goals for this campaign.

    Learn more about conversion goals: [What are conversion goals and goal types?](hlp_BA_CONC_UETv2CTGoalType.md)

  <a id="budget-settings"></a>

- **Budget settings**

  - **Bid strategy**

    [Manual CPC (cost per click)](hlp_BA_CONC_BidStrategy.md) is the only bid strategy available for this campaign type.

  - **Budget**

    Enter the amount of money you want to spend per day on this campaign.

  <a id="best-practices-for-images"></a>

## Best practices for images

- Use high-resolution .JPG or .PNG images, so they don't pixelate or degrade across devices.
- Before you upload your images, make sure they meet the [imagery guidelines](https://go.microsoft.com/fwlink/?linkid=2246909).
- If you don't have advertising-ready images, Microsoft Advertising has partnered with Shutterstock with free access to over 300 million commercially licensed images. To learn more, see [About stock images](hlp_BA_CONC_StockImages.md).
- We don't recommend images with text or logo overlays, because they may appear distorted in different aspect ratios and ad placements. Some publishers may also prohibit the use of embedded text within images. Your text and logos may either appear invisible or may be cut off in smaller ad placements or when images are resized. Make sure to use your headlines and descriptions for all ad messaging. If text is required for legal or other reasons, we recommend using as few words as possible, small font size, and centered text.
- Review your images in the ad preview tool before saving your ad to ensure that they look as expected. Re-crop your images as necessary.

<a id="technical-requirements-for-videos"></a>

## Technical requirements for videos

- **File size:** Up to 256 GB
- **Duration:** Must be between 6 and 75 seconds
- **Supported file types:** .MP4, .MOV, .WEBM, .MKV, .VOB, .OGV, .OGG, .AVI, .QT, .WMV, .RM, .ASF, .M4P, .M4V, .MPG, .MP2, .MPEG, .MPE, .MPV, .M2V, .3GP, .3G2, .SWF, and .TS
- **Resolution:** 960 x 720, 1280 x 720, 1440 x 1080, or 1920 x 1080, and 1080 x 1920
- **Aspect ratio:** 16:9 or 4:3 for horizontal, 9:16 for vertical
- **Recommended minimum bitrate:** 2.5 Mbps - 60 mbps
- **Frame rate:** 23.976, 24, 25, 29.97, 30 fps
- **Audio bitrate:** 124+ kbps
