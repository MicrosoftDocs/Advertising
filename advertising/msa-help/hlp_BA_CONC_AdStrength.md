---
title: About Ad strength
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how Ad strength maximizes campaign performance by helping you strengthen asset coverage in Microsoft Advertising campaigns.
ROBOTS: NOINDEX, NOFOLLOW
---

# About Ad strength

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worryâ€”it's coming soon!

Ad strength maximizes campaign performance by helping you strengthen asset coverage. As you build your campaign, Ad strength evaluates your text and image assets based on coverage, relevance, and diversity, then shows a score with clear suggestions to help you improve campaign performance.

The score updates as you make changes, so you can see the impact of your actions in real time.

## How Ad strength works

Ad strength score combines signals from your text assets (headlines and descriptions) and image assets to estimate how ready your ads are to drive performance.

### You see the score as:

- A percentage, 0â€”100%, and
- A rating category:

  - Poor (0â€”50%)
  - Average (51â€”60%)
  - Good (61â€”70%)
  - Excellent (71â€”100%)

## What the score evaluates

- **Text assets**

  Your text score is based on headlines and descriptions and looks at:

  - Volume â€” whether you've added enough headlines and descriptions
  - Length â€” whether your text provides enough detail
  - Pinning (Responsive Search ads only) â€” whether pinning limits ad combinations
  - Keyword usage â€” whether popular keywords are included
  - Relevance â€” whether copy or image quality matches your landing page

  | Feature | Action | Good score |
  | --- | --- | --- |
  | **Short headline count** | Add more headlines | 9â€”12 headlines |
  | **Long headline count** | Add more headlines | 3â€”4 long headlines |
  | **Description count** | Add more descriptions | 3 descriptions |
  | **Short headline length** | Create longer headlines | Average length 17â€”24 characters |
  | **Long headline length** | Create longer headlines | Average length 46â€”85 characters |
  | **Description length** | Add longer descriptions | Average length 46â€”85 characters |
  | **Pinned headlines (RSA only)** | Unpin headlines for more combinations | 1â€”7 pinned |
  | **Pinned descriptions (RSA only)** | Unpin descriptions for more combinations | 1 pinned |
  | **Headlines include popular keyword (RSA only)** | Include popular keyword in headlines | 25%â€”75% headlines contain keyword |
  | **Descriptions include popular keyword (RSA only)** | Include popular keyword in descriptions | 25%â€”75% descriptions contain keyword |
  | **Headline relevance** | Replace headlines not relevant to landing page | 66%â€”99% headlines relevant |
  | **Description relevance** | Replace descriptions not relevant to landing page | 66%â€”99% descriptions relevant |

- **Image assets**

  Your image score evaluates:

  - Volume â€” whether you've added enough images
  - Diversity â€” whether images show distinct visuals and ideas
  - Relevance â€” whether images align with your landing page
  - Recontextualization â€” whether images have enough visual context (for example, not simple or white backgrounds)

  | Feature | Action | Good score |
  | --- | --- | --- |
  | **PMAX image count** | Add more images | 11â€”15 images |
  | **MMA / AWF image count** | Add more images | 9â€”12 images |
  | **Image relevance** | Replace images not relevant to landing page | 66%â€”99% images relevant |
  | **Add context to images** | Replace images with complex backgrounds | 26%â€”50% images have poor score |

## How to improve your score

When your score is below excellent, you'll see recommended actions with a **Fix it** option. Selecting **Fix it** takes you directly to the place where you can make changes.

Depending on the issue, recommendations may include:

- **Improve text assets**

  - *Add more headlines or descriptions.* This increases asset coverage and ad combinations, which directly improves Ad strength, which results in more opportunities to show the most relevant message and drive better performance.
  - *Create longer text.* This occurs when headlines or descriptions are too short. You'll see a **Fix it** prompt that lets you edit or choose autoâ€”generated text that meets length guidelines, with Ad strength updating in real time.
  - *Unpin headlines or descriptions.* Unpinning headlines or descriptions allows more flexibility to combine assets, improve diversity, and show the most relevant message, which directly improves Ad strength and performance prediction.

    > [!NOTE]
    > Only available for RSA campaigns.
  - *Add keywords.* These are the keywords you've already selected for your campaign.

    > [!NOTE]
    > Only available for RSA campaigns.
  - *Replace text that isn't relevant to your landing page*

- **Improve image assets**

  - Use highâ€”resolution image assets, and replace any that aren't to ensure clarity for your audience.
  - Add more images
  - Update or remove images that are inconsistent with the landing page, such as those showing the wrong product or making conflicting claims.
  - Replace images with simple backgrounds using suggested alternatives

## Realâ€”time updates

### Your Ad strength updates as soon as you:

- Add or remove assets
- Select recommended AI assets
- Replace existing text or images
- Pin or unpin text assets

## Where you can see the score

### You can view Ad strength in:

- Campaign creation workflows. You can view Ad strength while creating RSA, PMAX, Audience, and Multimedia Ads.
- Campaign edit workflows
- Ad and asset grids (with a short delay for offline reporting)
- API responses (where supported)

For offline scenarios such as ad grids or API usage, scores may update within 24 hours, and the UI indicates when the data was last refreshed.

## What else should I know?

- The score helps guide improvements but doesn't guarantee performance results.
- Text and image scores are weighted equally in the final score.
- Improving relevance and diversity can help your ads stand out and reach more audiences.
