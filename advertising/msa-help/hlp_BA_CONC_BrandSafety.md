---
title: About content suitability
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn all about content suitability.
---

# About content suitability

> [!NOTE]
> This feature is available for Audience, Performance Max, Search, and Shopping campaigns. Premium Streaming campaigns aren't supported yet.

Safeguard your brand image by blocking your ads from appearing with specific websites, terms, and types of content. There are three content suitability controls: [Website control lists](hlp_BA_CONC_WebExclusionsTargetedWebsites.md), [content exclusions](#content-exclusions), and [excluded content terms](#excluded-content-terms). These are account-level settings that help you protect how your brand is presented across all campaigns and ads. Whereas website exclusion lists prevent your ads from showing on specific websites, content exclusions prevent your ads from appearing with [sensitive content categories](#about-sensitive-content-categories) that are unsuitable for your brand. Excluded content terms block your ads from showing next to unwanted terms (i.e., page titles).

Website exclusion lists are applied at the account level in addition to any exclusions you set at the campaign or ad group levels. See [How to prevent your ads from showing to certain people](hlp_BA_PROC_AddExclusions.md) for more information about setting website exclusions at the campaign or ad group levels.

<a id="content-exclusions"></a>

## Content exclusions

> [!IMPORTANT]
> - While content suitability controls help advertisers maintain a positive online presence and mitigate risk, we cannot guarantee that all content exclusions will be blocked.
> - For some advertisers, **Content exclusions** are called **Excluded content themes** in Microsoft Advertising Platform.

Content exclusions allow you to choose which [sensitive content categories](#about-sensitive-content-categories) you want to prevent your ads from appearing alongside. See [below](#get-started-with-content-exclusions) for information on how to apply content exclusions.

We partner with Integral Ad Science (IAS) to protect your ads from serving with your selected content categories. Content exclusions provide additional safeguards alongside IAS's automatic brand protection. By default, our partnership with IAS helps prevent ads that serve in audience placements from appearing with content that's *never* suitable for advertising. IAS checks websites for the following content, and we automatically block your ads from serving on websites deemed to be of medium and high-risk:

- Adult
- Alcohol
- Gambling
- Hate speech
- Illegal downloads
- Illegal drugs
- Offensive language
- Violence

> [!NOTE]
> These content categories broadly align with the Global Alliance for Responsible Media (GARM) framework for unsafe content.

If you want added protection for sensitive content categories beyond those listed above, you can always [update your content exclusion settings](#get-started-with-content-exclusions).

> [!NOTE]
> Microsoft Advertising completes brand safety checks for Microsoft owned and operated sites in addition to IAS. We don't serve ads with any content we deem to be unsafe.

<a id="get-started-with-content-exclusions"></a>

- **Get started with content exclusions**

  You can choose the [sensitive content categories](#about-sensitive-content-categories) that you want to exclude your ads from serving alongside by following these instructions:

  1. From the navigation menu on the left, hover over **Tools** and select **Content suitability**.
  1. Select **Content exclusions**.
  1. Below **Select sensitive content categories to exclude**, select the checkbox next to the appropriate content categories.
  1. Select **Save**.

  <a id="about-sensitive-content-categories"></a>

- **About sensitive content categories**

  These content categories are powered by IAS using their Context Control Avoidance solution:

  | Category | Description |
  | --- | --- |
  | ****Crime**** | Content relating to crime and harmful acts to individuals and society, including human rights violations. This includes educational, informative, and scientific content related to the topic. |
  | ****Infectious diseases & outbreaks**** | Content relating to infectious diseases, epidemics, and outbreaks (e.g., Coronavirus, Zika, and Norovirus). |
  | ****Kids' content**** | Content relating to topics for and about kids. This includes pages targeted at kids (e.g., movies and TV shows for kids, children's books, songs, and toys, etc.) and pages targeted at their parents (e.g., forums and blogs about parenting, traveling with kids, activities to do with kids, children's health, etc.). |
  | ****Natural disasters**** | Content relating to negative news or sentiment around disasters, such as hurricanes, tropical storms, and the aftermath of these catastrophes, such as structural collapses and transit disasters. |
  | ****Politics**** | Content relating to governmental politics. |
  | ****Protests & demonstrations**** | Content relating to protests, demonstrations, brutality, and riots. |
  | ****Sensitive social issues**** | Content relating to sensitive social issues, such as immigration, abortion, euthanasia, vaccines, and other inflammatory content. |

  <a id="excluded-content-terms"></a>

## Excluded content terms

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

Excluded content terms block your ads from showing next to unwanted terms (i.e., page titles). They can be added at the account or campaign level, with a maximum of 1000 terms. Any terms you add to your campaign will be automatically applied to all campaigns in your account to save you time later.

For example, if you're selling tech devices and your excluded content term is “faulty tech devices,” then we won't show your ads next to page titles mentioning faulty tech devices.

- **Add excluded content terms during campaign creation**

  For instructions on adding these terms while creating your Performance Max campaign, see [this help page](hlp_BA_PROC_CreatePmax.md) and select the **Targeting settings** dropdown.

- **Add excluded content terms to your account**

  1. From the navigation menu on the left, select **Tools** > **Content suitability**.
  1. Select **Excluded content terms**.
  1. Select **Add**.
  1. Enter your terms, one per line.
  1. Select **Save**.
