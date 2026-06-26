---
title: What gets imported from Google ads
ms.service: msa-help
ms.subservice: msa-bulk-import
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Most of the information in your campaigns is included when you import it from Google Ads. Here's a list of what gets imported, as well as some exceptions.
---

# What gets imported from Google Ads

> [!IMPORTANT]
> - **Upgrade your expanded text ads to Responsive Search ads by February 1, 2023.** After this date, you will no longer be able to create new or edit existing expanded text ads.
> - [Learn more about this change](#detailed-list-of-imported-and-updated-items)

> [!NOTE]
> - During the Import process, you'll be asked to confirm if the declaration you made to Google Ads is accurate regarding whether any of your campaigns are intended for political advertising. Please note that campaigns marked as political will be skipped during import. [Learn more](hlp_BA_CONC_Policy_RestrictedPolitical.md)
> - We'll import your Google Ads Demand Gen campaigns as Audience campaigns. [Learn more about how we import Demand Gen campaigns.](#importing-demand-gen-campaigns)
> - We'll import your Google Ads Performance Max campaigns as Performance Max or Search campaigns. [Learn more about how we import Performance Max campaigns.](#importing-performance-max-campaigns)
> - We'll import the first card of your Google Ads Carousel ads as a Native ad.
> - If an entity can't be updated during import due to errors, the import skips all updates and deletions for its child entities.

Now that you've imported your campaigns from Google Ads, you can check the status of your import, review error logs, and edit, pause, or delete your import schedule. Keep in mind that not all information will be imported, but that doesn't mean it's not supported within Microsoft Advertising. So, after you import, be sure to review your campaigns to make sure everything is good to go and add the missing information back to your campaigns.

## Items you should check during import

Some specific situations require special attention during import. If you are importing any of the items below, make sure to review the following information.

## FAQ

- **Ad distribution (Network)**

  Ad distribution is where you want your ads to show. When a Google Ads ad group is imported, it is mapped in the following ways:

  - If the network is the **Search and Display Network**, we set it to **Search**.
  - If the network is the **Google Search Network**, we set it to **Search**.

  > [!NOTE]
  > - If the network is the **Google Search Network**, and **Include search partners** is selected, then Bing will target all search networks. (Bing, AOL, and Yahoo search and syndicated search partners)
  > - Syndicated search is only available in certain countries. To learn more, see [What are Search ads?](hlp_BA_CONC_SearchNetContentNet.md).
  > - Microsoft Advertising stopped serving ads on the content network.

- **Asset groups**

  Asset groups replace traditional ad groups and ad entities for Performance Max campaigns. Every time you update an asset group via import, your modifications to image assets done on Microsoft Advertising will be preserved, and any new image assets will be imported from Google Ads in addition to any assets you've already imported or modified. If this means you're trying to import more image assets per asset group than are supported, we'll drop new image assets above the supported-asset limit.

- **Audience targeting**

  Audiences are groups of potential customers that you can target. By importing your audiences from Google Ads, you can boost your campaign performance by reaching people browsing your website through Bing.

  ## Audience targeting: FAQ

  - **Which audience types can I import from Google Ads?**

    > [!NOTE]
    > > [!NOTE]
    > > Any audience list that has the following attributes, will not be imported from Google Ads:
    >
    > - Remarketing list created in Google Analytics

    Below are lists without those attributes.

    | Google Ads audience type | What gets imported | What doesn't get imported |
    | --- | --- | --- |
    | **Affinity** | N/A | All lists |
    | **App users** | N/A | All lists |
    | **Combined lists:** | Lists that use AND, OR, and NOT conditions | Lists that only use the NOT condition |
    | **Customer lists** | N/A | All lists |
    | **Detailed Demographics** | N/A | All lists |
    | **In-market** | All lists | N/A |
    | **Similar audiences** | Similar to website visitors lists (also called rule-based remarketing lists) that Microsoft Advertising supports | Similar to lists that are not based on website visitors (such as customer lists) |
    | **Website visitors (also called rule-based remarketing list)** | Lists of the following type: <br> - Vistors of a page <br>- Vistors of a page who also visited another page <br>- Vistors of a page who did not visit another page | Lists of the following type: <br> - Visitors of a page during specific dates<br>- Visitors of a page with specific tags<br>- Created using parameters that are not supported in Microsoft Advertising (for example, type and category ID)<br>- Specific date-based.<br> Any membership duration that is greater than 180 days will be lowered to 180 days during import. |
    | **YouTube vistors** | N/A | All lists |

  - **What happens when I import an individual in-market audience that doesn't exist in Microsoft Advertising?**

  - **What happens when I import multiple in-market audiences?**

    When you import multiple associations that are mapped to the same in-market audience, only associations with the *direct* audience are imported. For example, let's say you want to import an ad group or campaign with two audience associations:

    - The first association is with “Apparel & Accessories.”
    - The second association is with “Apparel & Accessories/Bow ties.”

    Only the ad group or campaign's first association will be imported because it can be mapped directly to the audience, “Apparel & Accessories.” The ad group or campaign's other association will not be imported.

    ## Importing multiple in-market audiences with no direct associations

    When you import multiple associations that are mapped to the same in-market audience, and there are *no* direct associations available, then only the association that is active *and* has the highest bid boost will be imported and mapped to its parent audience. For example, let's say you want to import an ad group or campaign with three audience associations, all of which are not available in Microsoft Advertising:

    - The first association is with “Apparel & Accessories/Bow ties,” is active, and has a 20% bid boost.
    - The second association is with “Apparel & Accessories/Belts,” is active, and has a 10% bid boost.
    - The third association is with “Apparel & Accessories/Bracelets,” is paused, and has a 30% bid boost.

    Only the ad group or campaign's first association will be imported because out of all the active associations, it has the highest bid boost. The ad group or campaign's other two associations will not be imported.

  - **What happens when I import multiple in-market audiences with no direct associations?**

    When you import multiple associations that are mapped to the same in-market audience, and there are *no* direct associations available, then only the association that is active *and* has the highest bid boost will be imported and mapped to its parent audience. For example, let's say you want to import an ad group or campaign with three audience associations, all of which are not available in Microsoft Advertising:

    - The first association is with “Apparel & Accessories/Bow ties,” is active, and has a 20% bid boost.
    - The second association is with “Apparel & Accessories/Belts,” is active, and has a 10% bid boost.
    - The third association is with “Apparel & Accessories/Bracelets,” is paused, and has a 30% bid boost.

    Only the ad group or campaign's first association will be imported because out of all the active associations, it has the highest bid boost. The ad group or campaign's other two associations will not be imported.

  - **How do I know which in-market audience associations were mapped to their parent audiences**
    After your import completes, you can see in-market audience associations and their parent audiences under Import Summary on the Import Campaigns page. Please note that if there were any issues with the import, the Logs table will include an error file to review, as well as the settings that were in effect at the time of the import.

  - **What happens to existing in-market associations if an audience becomes available in Microsoft Advertising?**
  When a Google Ads audience becomes available in Microsoft Advertising, we will update its associations automatically when you re-import. For example, let's say you have an ad group in Google Ads associated with the audience “Apparel & Accessories/Bow ties.” Since “Bow ties” is an audience not yet supported by Bing, its associations will be mapped to its parent audience, “Apparel & Accessories.” However, when “Bow ties” becomes available, Microsoft Advertising will delete the existing association, “Apparel & Accessories” and create a new association, “Apparel & Accessories/ Bow ties.”

  - **How do I associate a UET tag?**
    A Universal Event Tracking (UET) tag records what customers do on your website and sends that information to Microsoft Advertising. If you're importing remarketing lists or other audiences, you'll need to associate a specific UET tag with each. If you don't have a UET tag in Microsoft Advertising yet, we will create one for you if you select this option.
    1. When customizing import options, under UET tag, select **Associate the following UET tag with any remarketing list, audience, or conversion goal that has not previously imported into Microsoft Advertising**.
    1. Select an existing UET tag or create a new tag.
    1. If you are creating a tag, enter the **Tag name** and **Tag description**.

  > [!NOTE]
  > - Campaign-level associations will only be imported for search network campaigns.
  > - If any ad group-level associations already exists for a particular campaign in Microsoft Advertising, its campaign-level associations will not be imported from Google Ads.

- **Bids and budgets**

  > [!IMPORTANT]
  > > [!NOTE]
  > > The import option **Update bids and bid strategies** is now split into **Update bids** and **Update bid strategies**. Even with this change, your original bid settings will remain the same. You can review the **Bids and budgets** section of your import options to customize your settings at anytime.

  Both Microsoft Advertising and Google Ads offer you the ability to limit your campaign spend on a daily basis.

  Microsoft Advertising has different minimum bid and budget requirements than Google Ads. To help you import all of your data quickly, any bids or budgets that are too low will be raised to meet our minimums. These minimums can be found in the table below.

  **Minimum bids and budgets**

  | Currency | Search campaign minimum bid | Shopping campaign minimum bid | Search and Shopping campaigns minimum daily budget |
  | --- | --- | --- | --- |
  | **Argentine Peso (ARS)** | 0.05 | 0.05 | 0.05 |
  | **Australian Dollar (AUD)** | 0.01 | 0.01 | 0.05 |
  | **Thai Baht (THB)** | 0.14 | 0.14 | 2.00 |
  | **Brazilian real (BRL)** | 0.01 | 0.01 | 0.10 |
  | **Canadian dollar (CAD)** | 0.05 | 0.01 | 0.05 |
  | **Chilean peso (CLP)** | 5.10 | 5.10 | 5.10 |
  | **Colombian peso (COP)** | 18.05 | 18.05 | 18.05 |
  | **Danish krone (DKK)** | 0.06 | 0.06 | 0.06 |
  | **Euro (EUR)** | 0.05 | 0.01 (France, Germany, Spain, Switzerland, Austria, Belgium, Netherlands, Italy, and Sweden only) | 0.05 |
  | **Hong Kong dollar (HKD)** | 1.00 | 1.00 | 1.00 |
  | **Indian rupee (INR)** | 0.50 | 0.01 | 0.82 |
  | **Indonesian rupiah (IDR)** | 35.00 | 35.00 | 480.00 |
  | **Malaysian ringgit (MYR)** | 0.01 | 0.01 | 0.15 |
  | **Mexican peso (MXN)** | 0.14 | 0.14 | 0.14 |
  | **New Taiwan dollar (TWD)** | 0.01 | 0.01 | 100.00 |
  | **New Zealand dollar (NZD)** | 0.01 | 0.01 | 0.05 |
  | **Norwegian krone (NOK)** | 0.06 | 0.06 | 0.06 |
  | **Peruvian nuevo sol (PEN)** | 0.03 | 0.03 | 0.03 |
  | **Philippine peso (PHP)** | 0.20 | 0.20 | 2.00 |
  | **Polish Zloty (PLN)** | 0.01 | 0.01 | 0.10 |
  | **Pound sterling (GBP)** | 0.05 | 0.01 | 0.05 |
  | **Singapore dollar (SGD)** | 0.01 | 0.01 | 0.11 |
  | **Swedish krona (SEK)** | 0.07 | 0.07 | 0.07 |
  | **Swiss franc (CHF)** | 0.05 | 0.05 | 0.05 |
  | **South African Rand (ZAR)** | 0.01 | 0.01 | 0.10 |
  | **Turkish Lira (TRY)** | 1 | 1 | 10 |
  | **U.S. dollar (USD)** | 0.05 | 0.01 | 0.05 |

  **Currency mismatch**

  If the currencies you set for your Google Ads and Microsoft Advertising account do not match, you can either convert your currency data to match Microsoft Advertising, or opt out. If you choose to opt out, you can manually adjust your bids and budgets using the import options or after your import is complete. If you set up an account and need to [change the currency](hlp_BA_CONC_Currency.md), you will need to set up a new account. If you have campaigns, ad groups, ads, and settings in the old account, then you will want to export them from the old account and import them into the new one.

- **Bid strategies**

  > > [!NOTE]
  > > The import option **Update bids and bid strategies** is now split into **Update bids** and **Update bid strategies**. All new and scheduled imports have the **Update bid strategies** option enabled by default. To opt out, uncheck **Update bid strategies** under **Bids and budgets** in your import options.

  Some bid strategies are not supported in Microsoft Advertising. In these instances, your Audience campaign bid strategy will default to [manual CPC](hlp_BA_CONC_BidStrategy.md) and all other campaign bid strategies will default to [enhanced CPC](hlp_BA_CONC_BidStrategy.md). In each instance, bids will be set to an amount we recommend. Please note that you can update these bids after you import them to Microsoft Advertising.

  > [!NOTE]
  > - If you have an Audience campaign using portfolio bid strategies in Google Ads, we will always import it as [manual CPC](hlp_BA_CONC_BidStrategy.md) in Microsoft Advertising.
  > - If your portfolio bid strategy uses search and Shopping campaigns, we will take the majority of the campaigns with portfolio bid strategies and convert the rest to individual bid strategies.
  > - If the campaign types are equal in count, we will prioritize Search campaigns over Shopping campaigns.
  > - If you don’t have a conversion goal in Microsoft Advertising and if you have a campaign that uses a bid strategy requiring a conversion goal in Google Ads, we’ll convert your bid strategy to one that does not require a conversion goal during import. For example, if you don’t have a conversion goal in Microsoft Advertising, we’ll convert a Performance Max campaign’s bid strategy to maximize clicks.

- **Conversion tracking**

  > [!NOTE]
  > This feature is currently in pilot and not available to everyone. If you don't have it yet, don't worry—it's coming soon! You can still [set up conversion goals](hlp_BA_PROC_UETv2CreateGoal.md) on Microsoft Advertising after importing other settings from Google Ads.

  [Conversion tracking](hlp_BA_CONC_UETv2WhatIsCT.md) helps you measure the return on investment (ROI) of campaigns by tracking what people do once they get to your website. Conversion tracking entails defining the action you want to track as a [conversion goal](hlp_BA_CONC_UETv2CTGoalType.md) (e.g., a newsletter sign-up). Then, once someone accomplishes the goal (e.g., clicks your ad, visits your website, and signs up), Microsoft Advertising counts it as a conversion.

  By importing your Google Ads conversion goals, you'll be able to more effectively and efficiently sync your Google Ads and Microsoft Advertising workflows, allowing you to accomplish more with less work on each platform.

  When the checkbox next to **Import conversion goals** under **Customize your import settings** is selected, the following occurs:

  - All your Google Ads conversion goals and settings will be imported.

    > [!NOTE]
    > Any existing conversion goals and UET tags on Microsoft Advertising won't be affected.

    - If these are online conversion goals, you'll need to [set up a UET tag](hlp_BA_CONC_UET_Setup_Master.md) on your website so that your imported conversion goals can receive conversion events. (You can also set it up through Google Tag Manager.)
  - If your imported campaigns use a conversion value-based bid strategy such as Max conversions, we'll import the same strategy and optimize those campaigns based on the new conversions.

  > [!IMPORTANT]
  > If you don't see the **Import conversion goals** checkbox under **Customize your import settings**, you may not have this feature available yet. If you don't, don't worry—it's coming soon!

  **What you need to know:**

  - The conversion goals imported into Microsoft Advertising will use the same settings as those in Google Ads (attribution method, lookback window, include in conversions yes/no, primary/secondary conversion, etc.).

    > [!NOTE]
    > If you're using data-driven attribution Google Ads, we'll import it using last click attribution.
  - The only conversion goals we'll import are those that are online conversions (tag-based), destination-URL type (page visits rather than custom-event type), and those that are created on Google Ads (not Google Analytics or SA360.)

  > [!NOTE]
  > - We cannot import Google Ads conversion goals with the same name as those in Microsoft Advertising unless you update their names.
  > - We cannot import Google Hosted Conversions or Smart Goals at this time.

- **Demographics targeting**

  By importing your demographics targeting, you can reach customers who likely fall within the demographic range you choose. Note that Microsoft Advertising only imports age and gender targeting, *not* parental status or household income targeting.

  Microsoft Advertising matches most of your Google Ads demographics targets; however, there are a few differences that you can review in the tables below.

  | Google Ads age groups | Microsoft Advertising age groups |
  | --- | --- |
  | **18-24** | 18-24 |
  | **25-34** | 25-34 |
  | **35-44** | 35-49 |
  | **55-64** | 50-64 |
  | **65+** | 65+ |
  | **Unknown** | Not imported |

  | Google Ads gender groups | Microsoft Advertising gender groups |
  | --- | --- |
  | **Male** | Male |
  | **Female** | Female |
  | **Unknown** | Not imported |

  > [!IMPORTANT]
  > The Google Ads age group of 45-54 will not be imported into Microsoft Advertising.

- **Device targeting**

  If you don't choose customizations, we won't import negative bid modifiers for computer targets (except modifiers set to -100%).

  You can choose customizations to change the default option and import negative bid modifiers.

- **Dynamic Search ads**

  > [!NOTE]
  > For the list of countries/regions Dynamic Search ads are currently available in, and for more information about how to create Dynamic Search ads, please see [Dynamic Search ads](hlp_BA_CONC_DynamicSearchAds.md).

  [Dynamic Search ads](hlp_BA_CONC_DynamicSearchAds.md) provide a streamlined, low-touch way to make sure customers searching on the Microsoft Search Network find your products or services.

  Mixed mode campaigns from Google Ads are campaigns that contain both Dynamic Search ads and other types (e.g., expanded text ads). If you're in a market where Dynamic Search ads are not yet supported by Microsoft Advertising we will only import other ad types into **Standard** ad groups. Once Dynamic Search ads are available in your market, we will import Dynamic Search ads into **Dynamic** ad groups and other ad types into **Standard** ad groups. Both ad group types will be created in Search campaigns.

  If you import Dynamic Search ads containing display URL paths that exceed 15 characters, the paths will be dropped. The rest of the ad, including the URL without the excessive paths, will stay the same.

  **Asset-based feeds import**

  If you want to import your asset-based feeds from Google Ads into Microsoft Advertising, we'll automatically convert your asset-based feed into Dynamic Search ads' page feeds. There are three ways this might happen:

  - **Importing a new asset-based feed:** We'll import this as a regular page feed. Your page feed's name will remain the same as your Google Ads' AssetSet name.
  - **Importing an existing page feed that is being migrated within Google Ads to an asset-based feed with the same name:**

    - *If you keep the legacy page feed association,* we'll merge the feed items from both feeds and then import using the name of the legacy page feed.
    - *If you remove the legacy page feed association,* we'll make sure your Microsoft Advertising page feed is consistent with your new Google Ads' asset-based feed.
  - **Importing an existing page feed that is being migrated within Google Ads to an asset-based feed with a different name:**

    - *If you keep the legacy page feed association,* we'll import both your Google Ads' page feed and asset-based feed as two different page feeds into Microsoft Advertising, retaining each of their associated feed names. Both feeds will be associated with your campaign.
    - *If you remove the legacy page feed association,* we'll import your Google Ads' asset-based feed as a new page feed into Microsoft Advertising and associate it with your campaign. Any association between your legacy page feed and your campaign will be removed.

- **Language targeting**

  **Campaign and ad group languages**

  Targeting multiple languages allows you to have different ad groups in the same campaign show ads on websites in different languages. During an import, campaign languages are set to the Google Ads' target languages that we support and ad group languages are automatically set to **Use the campaign settings**.

  Microsoft Advertising supports the following ad languages:

  - Albanian
  - Bosnian
  - Bulgarian
  - Croatian
  - Czech
  - Danish
  - Dutch
  - English
  - Estonian
  - Finnish
  - French
  - German
  - Greek
  - Hungarian
  - Icelandic
  - Italian
  - Latvian
  - Lithuanian
  - Macedonian
  - Maltese
  - Norwegian
  - Polish
  - Portuguese
  - Romanian
  - Serbian
  - Slovak
  - Slovenian
  - Spanish
  - Swedish
  - Traditional Chinese
  - Turkish

  If you'd like to opt out of target language updates during a re-import, simply uncheck **Campaign and ad group languages** in your import options. Please note that if you import target languages from Google Ads but your Microsoft Advertising campaigns don't have any, all supported targeted languages will still be imported regardless of whether or not you opted out of target language updates. If we don't support any of the targeted languages you imported from Google Ads, your campaign will not import and be flagged with the error message: “Unsupported target languages.”

- **Location targeting**

  When you import your Google Ads campaigns, we take the imported location targets and automatically match them to the same location targets in Microsoft Advertising. However, there may be location targets (such as smaller cities) in Google Ads that we don't support. When this happens, we automatically expand the target so that it can be mapped to a nearby locale (such as a state, region, or a province) per Google Ads geographic data. If both the focused and expanded location targets are unsupported by Microsoft Advertising, neither will be imported.

  For example, let's say you have a campaign in Google Ads whose location target is set to an unsupported city A in the state/region/province B. In this scenario, we will automatically map it to the supported parent location, state/region/province B. If both city A and state/region/province B are unsupported by Microsoft Advertising, neither location targets will be imported.

  > [!NOTE]
  > Importing location groups isn't supported.

  **Opt out of expanding your location targets**

  1. From the navigation menu on the left, hover over **Import** and select **Import from Google Ads**.
  1. Select **Sign into Google**.
  1. Select the Google Ads campaign you want to import > **Continue**.
  1. Under **Choose Import Options**, select **Do not expand unsupported location targets**.

  > [!NOTE]
  > By selecting this option, unsupported location targets will not be imported, however, your campaigns will continue to serve worldwide without location targeting.

  **Pause campaigns containing only unsupported location targets immediately after importing**

  1. From the navigation menu on the left, hover over **Import** and select **Import from Google Ads**.
  1. Select **Sign into Google**.
  1. Select the Google Ads campaign you want to import > **Continue**.
  1. Under **Choose Import Options**, select **Pause campaigns when all imported location targets are unsupported**.

  > [!NOTE]
  > If you select this option, and a campaign contains both supported *and* unsupported location targets, the campaign will not be paused, and supported location targets will continue to serve.

  **Review your imported location targets**
  You can review all your imported location targets in the Import Summary, including which unsupported location targets were mapped to a supported parent location. If you have any items with issues from importing, you can download your import errors to a spreadsheet. Each unsupported location target that gets mapped to a parent location target will be indicated with a warning in the downloaded spreadsheet. You can then decide to keep the supported location target, update the location target, or delete it all together.

- **Negative keyword lists**

  You can use negative keywords or keyword phrases to help prevent your ad from being displayed when a search query or other input contains your keywords but is irrelevant to your landing page content. With a shared negative keyword list, you can apply entire lists of negative keywords to multiple campaigns and make changes across campaigns by editing a single list. By default, the checkbox next to **Negative keyword list** under **Choose Import Options** is selected, and the following occurs:

  - All negative keyword lists from Google Ads will be imported. Negative keyword lists with identical names in Microsoft Advertising will be updated.
  - Negative keywords from both Microsoft Advertising and Google Ads will be merged.
  - Microsoft Advertising associations will be overwritten by any current Google Ads associations.
  - We will import negative keyword lists at the account, campaign, and ad group levels.

  > [!NOTE]
  > Clear the checkbox next to **Negative keyword list** under **Choose Import Options** if you don't want to import goals from Google Ads.

- **Shopping campaigns**

  Before you import your Google Shopping campaigns into Microsoft Advertising Shopping campaigns, make sure to create a Microsoft Merchant Center store. Then, when you import, you must link your store to the incoming Shopping campaign.

  If you will be using an existing Google catalog, make sure the catalog has valid data in the *Country of sale* field. Microsoft Advertising supports the following countries/regions for this field:

  - Albania
  - Andorra
  - Argentina
  - Aruba
  - Australia
  - Austria
  - Bahamas
  - Bangladesh
  - Belgium
  - Bolivia
  - Bosnia and Herzegovina
  - Brazil
  - Brunei
  - Bulgaria
  - Canada
  - Cayman Islands
  - Chile
  - Colombia
  - Costa Rica
  - Croatia
  - Cyprus
  - Czech Republic
  - Denmark
  - Dominica
  - Dominican Republic
  - Ecuador
  - El Salvador
  - Estonia
  - Fiji
  - Finland
  - France
  - French Guiana
  - French Polynesia
  - Germany
  - Greece
  - Guam
  - Guatemala
  - Guyana
  - Haiti
  - Honduras
  - Hungary
  - Iceland
  - India
  - Indonesia
  - Ireland
  - Italy
  - Latvia
  - Liechtenstein
  - Lithuania
  - Luxembourg
  - Malaysia
  - Maldives
  - Malta
  - Martinique
  - Mexico
  - Monaco
  - Mongolia
  - Montenegro
  - Montserrat
  - Nepal
  - Netherlands
  - New Caledonia
  - New Zealand
  - North Macedonia
  - Norway
  - Panama
  - Papua New Guinea
  - Paraguay
  - Peru
  - Philippines
  - Poland
  - Portugal
  - Puerto Rico
  - Romania
  - San Marino
  - Serbia
  - Singapore
  - Slovakia
  - Slovenia
  - Spain
  - South Africa
  - Sri Lanka
  - Sweden
  - Switzerland
  - Thailand
  - Trinidad and Tobago
  - Turkey
  - United Kingdom
  - United States
  - Uruguay
  - Vatican City
  - Venezuela
  - Vietnam

- **Updated and/or 'Missing' data in existing campaigns**

  When importing from Google Ads, Microsoft Advertising may overwrite existing campaign data—this includes bids, budgets, and settings. If a campaign was previously imported, it may be:

  - Overwritten with new data
  - Paused or removed
  - Renamed or missing from its original status

  To ensure your campaigns remain intact and perform as expected:

  - *Check import settings:* After import, review the summary to see if any campaigns were overwritten or paused.
  - *Search across all statuses:* Look for the campaign under active, paused, and deleted to confirm whether it still exists.
  - *Manage scheduled imports:* If you use scheduled imports, consider editing or pausing them to prevent unintended changes to campaign status, budget, or bids.
  - *Use selective importing:* For future imports, choose the option **Items not previously imported** to avoid overwriting existing campaigns.

- **URL Tracking**

  URL tracking allows you to find out how people got to your website by adding tracking parameters in Microsoft Advertising and then using a third-party tracking tool or service to analyze the data. You should check tracking templates, custom parameters, final URL suffix, utm_source, and other settings to ensure accurate reporting.

  If your Google Ads campaign uses the utm_source parameter, the value for that parameter is likely "Google," "GoogleAds," or a close variant such as "googleshopping" or "GoogleAdsIndia." These values will be replaced by "bing." For example, *http://www.example.com/?utm_source=google* will be imported as *http://www.example.com/?utm_source=bing*.

  *Notes:*

  - We don't recommend importing URL tracking options (e.g., tracking templates, custom parameters, and final URL suffixes) if you manage these settings outside Google Ads.
  - We'll drop final URL suffixes for any video ads you import.

  > [!NOTE]
  > If you manage your account through Google Search Ads 360, we won't import updates you make to your custom parameters, tracking templates, and final URL suffixes. You can manually input any changes you'd like to make to those fields in the Campaigns grid.

- **Videos**

  When you import your Google Ads Video campaigns, we'll import all data associated with these campaigns except for the video used.

  Due to limitations imposed by YouTube's Terms of Service, Microsoft Advertising cannot import the video file used in your Google Ads Video campaigns. In order for these campaigns to serve, you'll need to upload the video you'd like to use yourself.

## Items that can't be imported but can be recreated using Microsoft Advertising

- Automated rules
- IP exclusions

> [!NOTE]
> You can now import from Google Ads:
>
> - 20 thousand campaigns
> - 10 million ad groups
> - 20 million keywords
> - 20 million ads
> - 5.5 million ad group-level and campaign-level negative keywords combined
> - 10 million ad group product partitions
> - 200,000 all other entities combined
> - 3 million targets

## Detailed list of imported and updated items

> [!IMPORTANT]
> - **After February 1, 2023, you will no longer be able to create new or edit existing expanded text ads.** For more information, see [About Responsive Search ads](hlp_BA_CONC_ResponsiveSearchAds.md).
> - For more information about ad customizers for Responsive Search ads, see [About ad customizer for Responsive Search ads](hlp_BA_CONC_AdCustomizer_RSA.md).
> - Your scheduled feeds will continue to run and existing expanded text ads using ad customizer feeds will continue to serve. You'll be able to view reports on their performance.
> - You'll still be able to pause, run, or remove your existing ad customizer feeds.
> - > [!NOTE]
>   > Starting on August 31, 2023, we'll remove all unused ad customizer feeds that haven't been referenced in expanded text ads for more than three months. This will not impact any ads that are currently serving.
> - [Learn more about this change](https://go.microsoft.com/fwlink/?linkid=2208402)

Whether this is your first time or you're re-importing an existing campaign, it's important to keep track of all the items that are either transferred or updated, and which ones are simply left untouched. To make it easier for you, please refer to the list below to see which items get brought over during your initial import as well as which items Microsoft Advertising updates when you repeat the process.

> [!NOTE]
> - > [!NOTE]
>   > The list below is not a comprehensive list of imported items. Microsoft Advertising imports all the data needed to manage your campaigns and aims to provide the best experience for you.
> - > [!NOTE]
>   > All broad match modifier keywords for Search ads now serve as broad match keywords instead of phrase match. For more information about keyword match types, see [What are keyword match types, and how do I use them?](hlp_BA_CONC_MatchOptions.md)

## Main entities imported and updated for Search campaigns

- **Campaigns**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Campaign name: Campaign names in Microsoft Advertising are not case-sensitive. If you import or re-import campaigns named “Coffee Sales” and “coffee sales” from Google Ads, you will see an error for a duplicate campaign name. However, if you import a campaign named “Coffee Sales” under an account that already contains a campaign named “coffee sales”, we recognize them as the same, and will update accordingly.<br>*Note:* If a campaign name is longer than the current character limit, we shorten it during import and add a suffix to help identify it. Even if the character limit increases later, we won't update existing campaign names to support the character increase.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Campaign labels** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Budget amount** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Budget type** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Bid strategy: Some bid strategies are not supported in Microsoft Advertising. For unsupported bid strategies, your campaign bid strategy will be set to Enhanced CPC and bids will be set to an amount we recommend. Please note that you can update these bids after you import them to Microsoft Advertising.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Start/End date: Please note that Google Ads supports start and end dates at the campaign-level, while Microsoft Advertising supports them only at the ad group-level.  That means that the imported campaign level date range will override the existing ad group date range in Microsoft Advertising. Also note that if the end date has passed for a campaign that you import, the end date for ad groups in the campaign will be set to January 1, 2050.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Status** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Tracking template** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Custom parameters** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Time zone: When you import a campaign for the first time, the time zone at account-level is used. After that, the time zone doesn't change.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Campaign type** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Sales country** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |

  > [!NOTE]
  > - Ad group and campaign updates are fetched from previous imports to match those currently in Google Ads. If these items were created by a Microsoft Advertising online import after March 21, 2016, their updates will be fetched. Ad groups and campaigns imported previous to that date will not be updated. Instead, new or duplicative items may be created.
  > - If ad groups and campaigns were created during an import using Microsoft Advertising Editor Version 11.25 and beyond, their updates will be fetched. Please note that items downloaded locally or imported using a previous version of Microsoft Advertising Editor will not be updated. Instead, new or duplicative items may be created.
  > - If the name of a Google Ads campaign you've never imported before matches the name of an existing Microsoft Advertising campaign that wasn't created with import, the two will be merged during an import. Upon importing a Google Ads campaign, the campaign and its imported Microsoft Advertising campaign will be permanently linked. In other words, no matter what changes you make to either the linked Google Ads or Microsoft Advertising campaigns, importing the linked Google Ads campaign will always update its corresponding Microsoft Advertising campaign. However, changes made in Microsoft Advertising won't affect the Google Ads campaign.
  >
  >   > [!NOTE]
  >   > In the future, if you create a new Google Ads campaign with the same name as the already-linked Microsoft Advertising campaign, it won't be merged with the Microsoft Advertising campaign.

- **Ad groups**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Ad group name: Ad group names in Microsoft Advertising are not case-sensitive. If you import or re-import ad groups named “Coffee Sales” and “coffee sales” from Google Ads, you will see an error for a duplicate ad group name. However, if you import a campaign named “Coffee Sales” under a campaign that already contains an ad group named “coffee sales”, we recognize them as the same, and will update accordingly.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Ad group labels** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Status** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Start/End date: Please note that Google Ads supports start and end dates at the campaign-level, while Microsoft Advertising supports them only at the ad group-level.  That means that the imported campaign level date range will override the existing ad group date range in Microsoft Advertising. Also note that if the end date has passed for a campaign that you import, the end date for ad groups in the campaign will be set to January 1, 2050.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Medium (ad distribution): Ad distribution is where you want your ads to show. When a Google Ads ad group is imported, it is mapped in the following ways: <br> - If the network is the **Search and Display Network**, we set it to **Search**.<br>- If the network is the **Display Network**, we do not import it.<br>- If the network is the **Google Search Network**, we set it to **Search**.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Bid strategy: Ad groups will use the campaign's bid strategy. If the ad group is explicitly set to Manual CPC, then it will be imported with Manual CPC.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Pricing model** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Ad rotation: Flattened from Google Ads campaign.<br> - Optimize For Clicks and Optimize for Conversions is mapped to Optimized For Clicks.<br>- Rotate evenly and Rotate indefinitely is mapped to Rotate Evenly.<br>- Start and End date are not imported.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Bid** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Language: Flattened from Google Ads campaign. If there are multiple languages, we select the one with the maximum market share.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Native bid adjustment** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Tracking template** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Custom parameters** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |

  > [!NOTE]
  > - Ad group and campaign updates are fetched from previous imports to match those currently in Google Ads. If these items were created by a Microsoft Advertising online import after March 21, 2016, their updates will be fetched. Ad groups and campaigns imported previous to that date will not be updated. Instead, new or duplicative items may be created.
  > - If ad groups and campaigns were created during an import using Microsoft Advertising Editor Version 11.25 and beyond, their updates will be fetched. Please note that items downloaded locally or imported using a previous version of Microsoft Advertising Editor will not be updated. Ad groups and campaigns imported using a previous version will not be updated. Instead, new or duplicative items may be created.
  > - If the name of a Google Ads campaign you've never imported before matches the name of an existing Microsoft Advertising campaign that wasn't created with import, the two will be merged during an import. Upon importing a Google Ads campaign, the campaign and its imported Microsoft Advertising campaign will be permanently linked. In other words, no matter what changes you make to either the linked Google Ads or Microsoft Advertising campaigns, importing the linked Google Ads campaign will always update its corresponding Microsoft Advertising campaign.
  >
  >   > [!NOTE]
  >   > In the future, if you create a new Google Ads campaign with the same name as the already-linked Microsoft Advertising campaign, it won't be merged with the Microsoft Advertising campaign.

- **Keywords**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Keyword text** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Match type: When you import a campaign for the first time, the match type is imported. After that, the match type is not updated. Please note: All broad match modifier keywords for Search ads now serve as broad match keywords instead of phrase match. For more information about keyword match types, see [What are keyword match types, and how do I use them?](hlp_BA_CONC_MatchOptions.md)** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Bid** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Bid strategy: Keywords will use the ad group's bid strategy. If the keyword is explicitly set to Manual CPC, then it will be imported with Manual CPC.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Status** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Param1** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Param2** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Param3** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Final URL** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Final mobile URL** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Tracking template** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Custom parameters** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |

- **Standard text ads**

  > [!NOTE]
  > Microsoft Advertising no longer supports importing standard text ads from Google Ads. However, if you imported standard text ads before August 3rd, 2017 and choose to re-import them, we will import status changes (Pause/Unpause) from Google Ads.

- **Expanded text ads**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Title part 1: Microsoft Advertising and Google Ads allow 30 characters. Google Ads calls this headline 1.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Title part 2: Microsoft Advertising and Google Ads allow 30 characters. Google Ads calls this headline 2.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Title part 3: Microsoft Advertising and Google Ads allow 30 characters. Google Ads calls this headline 3.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Description: Microsoft Advertising and Google Ads allow 90 characters.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Description 2: Microsoft Advertising and Google Ads allow 90 characters.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Path 1: Microsoft Advertising and Google Ads allow 15 characters.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Path 2: Microsoft Advertising and Google Ads allow 15 characters.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **URL custom parameters** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Tracking template** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Final URL: Microsoft Advertising has a 35-character maximum limit for the host in URL. For example, if the URL is http://www.edu.bing.co.uk/pages/one, then the host is www.edu.bing.co.uk and it can't be more than 35 characters. Google Ads allows more than 35 characters for the host in URL.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Ad labels** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |

  > [!NOTE]
  > If expanded text ads missing from your import, be sure to select **Ad customizer feeds** under the **Feeds** section of your import options. Then try your import again.

- **Product ads**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Status** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Promotion** | ![green check mark](media/Global_Icon_CheckMark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Ad labels** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |

- **Responsive display ads**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Final URL** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Ad URL option: Tracking template, Final URL suffix, custom parameters** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Business name** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Images** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Logos** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Videos** | ![red x mark](media/Global_Icon_Xmark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Headlines** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Long headline** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Call to action text** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Custom color** | ![red x mark](media/Global_Icon_Xmark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Promo text** | ![red x mark](media/Global_Icon_Xmark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Price prefix** | ![red x mark](media/Global_Icon_Xmark.png) | ![red x mark](media/Global_Icon_Xmark.png) |
  | **Additional format option: Use asset enhancements, auto-generated video, or native formats** | ![red x mark](media/Global_Icon_Xmark.png) | ![red x mark](media/Global_Icon_Xmark.png) |

- **Responsive Search ads**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Final URL: Microsoft Advertising has a 35-character maximum limit for the host in URL. For example, if the URL is http://www.edu.bing.co.uk/pages/one, then the host is www.edu.bing.co.uk and it can't be more than 35 characters. Google Ads allows more than 35 characters for the host in URL.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Headlines: Both text and pin position will be imported.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Path: Microsoft Advertising and Google Ads allow 15 characters.** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Descriptions** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Mobile URL** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Tracking template** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Final URL suffix** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Custom parameters** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |

  > > [!NOTE]
  > > There is a limit of three enabled Responsive Search ads per ad group. If you're having trouble importing Responsive Search ads from Google Ads:
  >
  > - Manually pause or delete old Responsive Search ads to make room for other enabled ones.
  > - Choose **Delete items that have been removed from your Google Ads** account in your [import options](hlp_BA_PROC_ImportCampaign.md).

  Learn more about Responsive Search ads

- **Labels**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Label name** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Label color** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Label description** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |

  We import labels at all entity levels (Campaigns, Ad groups, Text ads, Dynamic Search ads, Product ads, App Install ads, Responsive ads (MSAN/MMA), Responsive Search ads, and Keyword). To ensure your labels are imported without any issue, please select the **Labels** checkbox under the advanced options of both **Item not previously imported into Microsoft Advertising** and **Updates to existing items**.

  Choosing the appropriate import options can determine which items get imported to Microsoft Advertising for the first time, updated from a previous import, or left untouched. Below, you can review both your import goals and the options you must choose to achieve them.

  | What is your import goal? | What import options should I choose? |
  | --- | --- |
  | **Import new labels and update existing ones.** | Check **Labels** under both **Items not previously imported into Microsoft Advertising** and **Updates to existing items**. |
  | **Import new labels and ignore updating existing ones.** | Check **Labels** under **Items not previously imported into Microsoft Advertising**. Uncheck **Labels** under **Updates to existing items**. |
  | **Ignore new labels and import updates to existing ones.** | Check **Labels** under **Updates to existing items**. Uncheck **Labels** under **Items not previously imported into Microsoft Advertising**. |
  | **Ignore both new labels and updates to existing ones.** | Uncheck **Labels** under both **Items not previously imported into Microsoft Advertising** and **Updates to existing items**. |

  > > [!NOTE]
  > > If you've removed labels in Google Ads and then select **Labels** under **Updates to existing items**, those labels will be deleted during the import.

- **Ad customizer feeds**

  | Items | Imported from Google Ads | Updated during re-import |
  | --- | --- | --- |
  | **Feed name** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |
  | **Feed attribute (name and type)** | ![green check mark](media/Global_Icon_CheckMark.png) | ![green check mark](media/Global_Icon_CheckMark.png) |

  > > [!NOTE]
  > > Ad customizer feeds can only be imported at the account level, not at the campaign or ad group levels.

## Ad extensions imported for Search campaigns

- **Account-level app extensions**

  - App platform
  - App store ID
  - App version
  - Display text
  - Destination URL
  - Device preference
  - Schedule

- **Account-level image extensions**

  - End date
  - Media
  - Schedule
  - Start date

- **Account-level promotion extensions**

  - Currency code
  - Discount modifier
  - Final URL suffix
  - Language
  - Money amount off
  - Occasion
  - Orders over amount
  - Percent off
  - Promotion code
  - Promotion item
  - Promotion end date
  - Promotion start date

- **Campaign-level action extensions**

  - Action type

- **Campaign-level app extensions**

  - App platform
  - App store ID
  - App version
  - Display text
  - Destination URL
  - Device preference
  - Schedule

- **Campaign-level call extensions**

  - Campaign name
  - Phone number
  - Country code
  - Is call only
  - Is call tracking enabled
  - Require toll free tracking number
  - Device preference
  - Start date
  - End date
  - Schedule

- **Campaign-level callout extensions**

  - Campaign name
  - Text
  - Start date
  - End date
  - Schedule

- **Campaign-level image extensions**

  - End date
  - Media
  - Schedule
  - Start date

- **Campaign-level location extensions**

  - Campaign name
  - Company name
  - Street address
  - Street address2
  - City name
  - Province code
  - Postal code
  - Country code
  - Phone number
  - Latitude
  - Longitude
  - Map icon:<br> We set to empty string during import.
  - Start date
  - End date
  - Schedule

  > [!NOTE]
  > We'll import any location assets as location extensions.

- **Campaign-level logo extensions**

  - Business logo image
  - Business name

- **Campaign-level price extensions**

  - Campaign name
  - Price feed type
  - Price qualifier
  - Language
  - Currency
  - Item headers: Up to the first 8 are imported.
  - Item descriptions: Up to first 8 are imported.
  - Item prices: Up to the first 8 are imported.
  - Item final URLs: Up to first 8 are imported.
  - Item final mobile URLs: Up to the first 8 are imported.
  - Custom parameters
  - Start date
  - End date
  - Schedule

- **Campaign-level promotion extensions**

  - Currency code
  - Discount modifier
  - Final URL suffix
  - Language
  - Money amount off
  - Occasion
  - Orders over amount
  - Percent off
  - Promotion code
  - Promotion item
  - Promotion end date
  - Promotion start date

- **Campaign-level sitelink extensions**

  - Campaign name
  - Display text
  - Description1
  - Description2
  - Device preference
  - Final URL
  - Mobile final URL
  - Tracking template
  - Custom parameters: Up to the first 3 are imported.
  - Start date
  - End date
  - Schedule

- **Campaign-level structured snippet extensions**

  - Campaign name
  - Header
  - Values
  - Start date
  - End date
  - Schedule

- **Ad group-level app extensions**

  - App platform
  - App store ID
  - App version
  - Display text
  - Destination URL
  - Device preference
  - Schedule

- **Ad group-level callout extensions**

  - Campaign name
  - Ad group name
  - Text
  - Start date
  - End date
  - Schedule

- **Ad group-level image extensions**

  - End date
  - Media
  - Schedule
  - Start date

- **Ad group-level promotion extensions**

  - Currency code
  - Discount modifier
  - Final URL suffix
  - Language
  - Money amount off
  - Occasion
  - Orders over amount
  - Percent off
  - Promotion code
  - Promotion item
  - Promotion end date
  - Promotion start date

- **Ad group-level sitelink extensions**

  - Campaign name
  - Ad group name
  - Display text
  - Description1
  - Description2
  - Device preference
  - Final URL
  - Mobile final URL
  - Tracking template
  - Custom parameters
  - Start date
  - End date
  - Schedule

- **Ad group-level structured snippet extensions**

  - Campaign name
  - Ad group name
  - Header
  - Values
  - Start date
  - End date
  - Schedule

Choosing the appropriate import options can determine which items get imported to Microsoft Advertising for the first time, updated from a previous import, or left untouched. Below, you can review both your import goals and the options you must choose to achieve them.

| What is your import goal? | What import options should I choose? |
| --- | --- |
| **Import new ad extensions and update existing ones.** | Check **Ad extensions** under both **Items not previously imported into Microsoft Advertising** and **Updates to existing items**. |
| **Import new ad extensions and ignore updating existing ones.** | Check **Ad extensions** under **Items not previously imported into Microsoft Advertising**. Uncheck **Ad extensions** under **Updates to existing items**. |
| **Ignore new ad extensions and import updates to existing ones.** | Check **Ad extensions** under **Updates to existing items**. Uncheck **Ad extensions** under **Items not previously imported into Microsoft Advertising**. |
| **Ignore both ad extensions and updates to existing ones.** | Uncheck **Ad extensions** under both **Items not previously imported into Microsoft Advertising** and **Updates to existing items**. |

> [!NOTE]
> - > [!NOTE]
>   > A schedule update in Google Ads is treated the same as deleting the previous schedule and adding a new schedule. If you select ad extensions under **Updates to existing items**, and if any schedules were updated or removed in Google Ads, then those schedules will be deleted from Microsoft Advertising during the import.
> - > [!NOTE]
>   > During an import, ad extensions removed in Google Ads will not be deleted in Microsoft Advertising during import.

## Targeting and exclusions imported for campaigns

- **Campaign ad scheduling**

  - From hour
  - From minutes
  - To hour
  - To minutes
  - Bid adjustment: <br> On Par Range: -90% to +900%

- **Campaign and ad group negative keywords**

  - Match type:<br> Broad match will be imported as phase match.
  - Keyword text

- **Campaign and ad group website exclusions**

  - Campaign placement exclusions:<br> To import campaign placement exclusions from Google Ads select **Website exclusions** in your **Advanced Import Options**.

- **Campaign location targets**

  - Location:<br> If Google Ads location can't be mapped, we use the parent location and show a warning during import. If there is no parent location, an error will appear during import.
  - Bid adjustment

- **Campaign device targets**

  - Bid adjustment: <br> Google Ads allows -100% to +900%. Microsoft Advertising allows -100% to +900% and -100% means opt out.

- **Campaign negative location targets**

  - Location<br> If Google Ads location can't be mapped, an error message will appear during import.

- **Campaign radius targets**

  - Radius location

Choosing the appropriate import options can determine which items get imported to Microsoft Advertising for the first time, updated from a previous import, or left untouched. Below, you can review both your import goals and the options you must choose to achieve them.

| What is your import goal? | What import options should I choose? |
| --- | --- |
| **Import new campaign and ad group targets and update existing ones.** | Check **Targeting** under both **Items not previously imported into Microsoft Advertising** and **Updates to existing items**. |
| **Import new campaign and ad group targets and ignore updating existing ones.** | Check **Targeting** under **Items not previously imported into Microsoft Advertising**. Uncheck **Targeting** under **Updates to existing items**. |
| **Ignore new campaign and ad group targets and import updates to existing ones.** | Check **Targeting** under **Updates to existing items**. Uncheck   **Targeting** under **Items not previously imported into Microsoft Advertising**. |
| **Ignore both new campaign and ad group targets and updates to existing ones.** | Uncheck **Targeting** under both **Items not previously imported into Microsoft Advertising** and **Updates to existing items**. |

> [!NOTE]
> > [!NOTE]
> > An update in Google Ads is treated as deleting the previous target and adding a new target. If you select **Targeting** under **Updates to existing items**, and if the targets were updated or removed in Google Ads, then those targets will be deleted from Microsoft Advertising during the import.

## Main entities imported for Microsoft Shopping campaigns

- **Ad group product partitions**

  - Campaign name
  - Ad group name
  - Status
  - Is excluded
  - Parent node Id
  - Product condition
  - Product value
  - Bid
  - Tracking template
  - Custom parameters

- **Product scope campaign criterion**

  - Campaign name
  - Product condition 1
  - Product value 1
  - Product condition 2
  - Product value 2
  - Product condition 3
  - Product value 3
  - Product condition 4
  - Product value 4
  - Product condition 5
  - Product value 5
  - Product condition 6
  - Product value 6
  - Product condition 7
  - Product value 7

<a id="importing-demand-gen-campaigns"></a>

## Importing Demand Gen campaigns

When you import your Google Ads Demand Gen campaigns, we'll import them as Audience campaigns along with their [Target CPA or Max conversion bid strategies](hlp_BA_CONC_BidStrategy.md). Without [conversion goal setup](hlp_BA_CONC_UETv2HowCTWorks.md), we'll import them with the [Enhanced CPC bid strategy](hlp_BA_CONC_BidStrategy.md).

Your ads can appear on sites such as MSN, Microsoft Start, Microsoft Edge, Outlook.com, and publisher partners.

<a id="importing-performance-max-campaigns"></a>

## Importing Performance Max campaigns

> [!IMPORTANT]
> If you're on either Adobe or Marin lists, your Google Ads Performance Max campaigns will be imported as Search campaigns.

We'll import new [Google Ads Performance Max campaigns as Microsoft Advertising Performance Max campaigns](#performance-max-campaigns). However, if you've imported a Performance Max campaign from Google Ads that was originally a Dynamic Search ads campaign, it'll remain as such.

<a id="performance-max-campaigns"></a>

### Performance Max campaigns

> [!NOTE]
> If you don't have a conversion goal in Microsoft Advertising during import, we'll convert a Performance Max campaign's bid strategy to maximize clicks. Once a conversion goal is created and we track a sufficient amount of conversion data, your Performance Max campaigns will automatically switch to your selected conversion-based bid strategy. You can always change the bid strategy in the campaign's setting.

If we import your Google Ads Performance Max campaigns as Microsoft Advertising Performance Max campaigns, most items are matched. You can review these items in the table below:

| Google Ads Performance Max campaigns | Microsoft Advertising Performance Max campaigns |
| --- | --- |
| **Asset groups** | Asset groups |
| **Asset groups—Assets: <br> - Image assets<br>- Test assets<br>- Video assets<br>- Product feeds** | Asset groups—Assets: <br> - Image assets<br>- Test assets<br>- Product feeds <br> Your Video ads will not be imported yet. Don't worry—import for this item is coming soon! |
| **Audience segments: <br> - [Audience segments that include your website visitors](https://support.google.com/google-ads/answer/2454064)** | Audience segments: <br> - Rules-based remarketing audience segments |
| **Audience signals** | Audience signals |
| **Bid strategy: <br> - Maximize conversions with target CPA (cost per action) as optional<br>- Maximize conversion value with target ROAS (return on ad spend. <br> Learn more about [bid strategies](hlp_BA_CONC_BidStrategy.md)** | Bid strategy: <br> - Maximize conversions with target CPA (cost per action) as optional<br>- Maximize conversion value with target ROAS (return on ad spend) |
| **Final URL expansion** | Final URL expansion |
| **Listing groups** | Listing groups |
| **New customer acquisition goals** | New customer acquisition goals |

> [!NOTE]
> *Notes:*
>
> - We don't support videos as assets and the Asset library doesn't import videos.
> - We cannot import stock images. Any asset groups using only stock images cannot be imported either.
> - If we cannot import the audience list associated with your Google Ads-side new customer acquisition goal, then use your [All Converters auto-generated remarketing list](hlp_BA_CONC_Audiences_SystemGenerated.md). If you opt out of associating an All Converters auto-generated remarketing list with your Microsoft Advertising-side new customer acquisition goal, or if you don't have this list, then we won't import your new customer acquisition goal. We'll still import your campaign.
> - We currently support only purchase-based new customer acquisition goals. We won't import any goal that isn't purchase-based.

## Related videos

- [Import campaigns from Google Ads into Microsoft Advertising](https://www.youtube.com/watch?v=iA3fzg0i154)
