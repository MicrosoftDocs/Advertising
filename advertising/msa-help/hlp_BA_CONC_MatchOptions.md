---
title: What are keyword match types, and how do I use them?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Broad, phrase, exact.... Get help figuring out which ones are available in Microsoft Advertising and which ones are right for your campaigns and ad groups.
---

# What are keyword match types, and how do I use them?

> [!NOTE]
> Keywords can only be added to Search campaigns. It's not possible to add keywords to other campaign types.

> [!NOTE]
> > [!NOTE]
> > All broad match modifier keywords for Search ads now serve as broad match keywords instead of phrase match. For more information about broad match, see [About broad match](hlp_BA_CONC_BroadMatch.md).

:::image type="content" source="media/BA_Conc_MatchTypesIcons.png" alt-text="Match Types.":::

Keyword match types help Microsoft Advertising determine how closely you want your keywords to match potential customers' search queries. Keyword match types include broad match, phrase match, and exact match. When your keywords match with search queries, your ads are considered for the ad auction.

See [Negative keywords](#negative-keywords) for information about negative keyword matching.

## How keyword match types work

Based on the keyword match type you choose, your ad will surface on a wide variety of search queries (broad match) or specific search queries (exact match).

Broad match captures all the search queries of narrower match types and more. This means that a broad match keyword will match all the search queries of phrase and exact match keywords, and additional relevant search queries.

You can use [auto-bidding strategies](hlp_BA_CONC_BidStrategy.md) to help ensure that you're reaching the right audience at the right time and getting a good return on investment (ROI). Auto-bidding strategies work best with the broad match keyword type because it provides Microsoft AI with a wide variety of search queries that help us learn what bids are best suited for your ads.

Predictive matching acts as a complement to your existing keywords to more accurately match your ads with relevant search queries.

You can choose to enable predictive matching for Search campaigns if you use conversion-based auto-bidding strategies (maximize conversions, target CPA, and target ROAS). Note: Predictive matching is available for Search campaigns, while predictive targeting is available for Audience campaigns.

> [!NOTE]
> Not everyone has predictive matching for Search campaigns yet. If you don't, don't worry—it's coming soon!

The table below shows how the keyword “Contoso tea” would match with the different keyword match types.

| Search query | Broad match (Syntax: *keyword*) | Phrase match (Syntax: "*keyword*") | Exact match (Syntax: [*keyword*]) |
| --- | --- | --- | --- |
| **Where can I find the best tea** | ![Yes](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) |
| **What does Contoso sell** | ![Yes](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) |
| **Contoso tea reviews** | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) |
| **Contoso tea near me** | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) |
| **Contoso tea** | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) |
| **Tea made by contoso** | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) |

## Keyword match type options

#### Syntax: *keyword*
- **Broad match**
- **What it does**: Broad match is the default keyword match type that makes your ad eligible to be displayed when someone searches words *related* to your keyword. This can include searches that don't contain the keyword terms. Broad match will also match synonyms and other similar keywords, including those with spelling errors.
- **Examples**:
  | Broad match keyword | Ads may show for these search queries: |
  | --- | --- |
  | **winter vacations** | winter vacation<br>vacations winter<br>tropical winter vacations<br>winter ski vacation<br>ski trips |
  | **red flower** | crimson poppies<br>buy crimson flower<br>red roses |
  | **mobile phone** | cell phone<br>telephone |

#### Syntax: *"keyword"*
- **Phrase match** 
- **What it does**: Phrase match is the keyword match type that makes your ad eligible to be displayed when the search query's meaning is similar to your keyword or a part of your keyword. With phrase match, you can reach more search queries than exact match, but fewer search queries than broad match.<br>
- **Examples**:
  | Phrase match keyword | Ads may show for these search queries: | Ads won't show for these search queries: |
  | --- | ---- | -- |
  | **winter vacations** | ski winter vacations<br>ski vacations winter<br>winter vacations discount<br>Lake Tahoe winter vacations deals | vacations abroad<br>maui vacations |
  | **chocolate milk** | chocolate milk | milk chocolate |
  | **miami vacation** | winter vacation in miami | vacation spot outside miami |
  | **garden tools** | best gardening tools | gardening without tools |

#### Syntax: *[keyword]*
- **Exact match** <br>
- **What it does**: Exact match is the keyword match type that makes your ad eligible to be displayed when the exact meaning of your keyword appears in a search query. This matching option gives you the most control over who views your ad but reaches fewer searches than both phrase and broad match.<br>
- **Examples**:
  | **Exact match keyword** | Ads may show for these search queries: |
  | --- | --- |
  | **winter vacations** | winter vacations<br>winter vacation<br>vacations winter |

## Which match type is used?

If you bid on the same keyword on exact and broad match, exact match will take precedence when your ad is displayed. For example, if you bid on both the exact match keyword [red flower] and the broad match keywords *red flower* or *flower*, a search on *red flower* will trigger the exact match and not the broad match. Additionally, exact match is preferred over exact match close variants.

> [!NOTE]
> If you see "(close variant)" in your search term report in the **Match type** column, this means that minor variations of your keyword (e.g., misspellings, plurals, same search intent, etc.) triggered your ad to be displayed, so you can maximize relevant matches without having to add all of these variations yourself.

To avoid duplicate reporting, all reports, such as keyword performance reports, will only report the match type that took precedence. In this example, an impression would be reported for the exact match *[red flower]* and *not* the broad match *flower*.

## How bids are inherited from one match type to another

Match types are on a spectrum from least restrictive (broad match) to most restrictive (exact match), in this order: **Broad match > Phrase match > Exact match**.

If you do not specify bids for all match types, bids are inherited from less restrictive match types. So, while bidding on broad match is convenient and easy to manage, bidding on each match type independently gives you greater control and allows performance data to be broken out by match type.

In the absence of a bid, the next less restrictive bid is inherited by the match type without a bid. This means exact match inherits the phrase match bid, and the phrase match inherits the broad match bid. If neither exact match nor phrase match bids are specified, then both match types inherit the broad match bid. This is never reversed: Exact match bids are never applied to a phrase match, and phrase match bids are never applied to a broad match.

## Choosing the right match type

When choosing a keyword match type, consider your advertising goals, the audience you're targeting, and make sure to cross-reference your keywords with your bids and budgets. We recommend you use broad match because it can help you reach the best audience for your ads. However, please consider all regulatory policies and risks before using broad match if your ads are for highly regulated industries, such as adult content, financial products and services, gambling/contests, and pharmacy and health care products and services. For all regulatory issues and region-specific policies, please check with your legal team and [review our guidelines](hlp_BA_CONC_EditorialGuidelines.md).

## Best practices for optimizing your keyword lists

- You can [run a search term report](hlp_BA_CONC_AboutSearchQueryReport.md) and use the results to refine your keyword list. <br>

  > [!NOTE]
  > If the majority of search terms in your report are unrelated to your ad, consider using phrase or exact match for your keyword.
- If there are specific search terms that you want to trigger your ad more often, we recommend you add them to your keyword list and pair them with phrase or exact match.
- For keywords that you don't want to trigger your ad, add them to your [negative keyword list](hlp_BA_PROC_AddNegativeKeywords.md).

<a id="negative-keywords"></a>

## Negative keywords

- **Negative keywords** <br>
- **Syntax**: *[keyword]* or *"keyword"*<br>
- **What it does**: Negative keywords define search queries that should *not* trigger your ad. Negative keywords can be exact or phrase matches. For more information about the negative keyword match types and using negative keywords to reach potential customers, see [Learn about using negative keywords to get to the right customers](hlp_BA_CONC_AboutNegativeKeywords.md).<br>
- **Why use it**: Negative keywords let you specify words that you want to ignore.<br>
- **Examples**: Let's say you have a broad match bid *wide shoes*, and you have a negative keyword with either exact match *[womens shoes]* or phrase match *"womens shoes"*.
  | Search term | Is ad eligible? (**Negative EXACT**) | Is ad eligible? (**Negative PHRASE**) |
  | --- | --- | --- |
  | **mens wide shoes** | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) |
  | **womens wide shoes** | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) |
  | **womens shoes** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) |
  | **wide womens shoes** | ![Yes](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) |

<a id="about-predictive-matching"></a>

## About predictive matching

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

> [!NOTE]
> Predictive matching is only available for Search campaigns.

When enabled, predictive matching leverages your **Final URL**, **Ad titles**, **Ad text**, and existing keywords to match your ads with new, highly relevant search queries. This setting optimizes your campaign for conversions by driving traffic to your website and preventing missed opportunities. With predictive matching, you no longer need to analyze search query reports to find new keywords for your Search campaigns—we automatically stay on top of search trends that will deliver the most conversions. Broad match will also be applied to all keywords in your campaign, ensuring that your ads will be eligible to be displayed when someone searches words related to your keyword. While we'll continue to prioritize keyword targeting when matching your ads with search queries, predictive matching helps ensure that your ads reach the right customers at the right time.

Note:

> [!NOTE]
> If you enable predictive matching, you cannot adjust the match type for individual keywords. Broad match will be automatically applied to all keywords in your campaign.

- **Enable predictive matching**

  There are two ways to enable predictive matching: During campaign creation and in your campaign settings.

  Campaign creation

  1. From the navigation menu on the left, select **Create**.
  1. Choose **Drive conversions** or **Generate leads** as your campaign goal.
  1. Select **Search** as your campaign type.
  1. Select **Search ads** below **Which ad type would you like to serve?**
  1. Select **Continue**.
  1. Follow the steps provided by the campaign creation wizard. For more information about what's required in each step, please see [How do I create a Search campaign?](hlp_BA_PROC_Create1stAd.md)
  1. In Budgets and bids, choose either **Maximize Conversions**, **Target CPA**, or **Target ROAS** under **Bid strategy**.
  1. Choose your campaign targets.
  1. In your Advanced campaign settings, select the checkbox under **Predictive matching**.
  1. Select **Save**.

  Campaign settings

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the appropriate campaign.
  1. Select **Settings**.
  1. Select the checkbox under **Predictive matching**.
  1. Select **Save**.

- **Disable predictive matching**

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the appropriate campaign.
  1. Select **Settings**.
  1. Clear the checkbox under **Predictive matching**.
  1. Select **Save**.
