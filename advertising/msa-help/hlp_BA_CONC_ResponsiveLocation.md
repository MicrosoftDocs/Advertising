---
title: Location insertion for responsive search ads and multimedia ads
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: You can automatically customize what shows in your ad based on dynamic location parameters.
---

# Location insertion for responsive search ads and multimedia ads

> [!NOTE]
> Not everyone can use location insertions in their multimedia ads yet. If you can't, don't worry—it's coming soon!

Calling out locations within ad copy can be a powerful way to improve relevancy by capturing the attention of your consumers in a highly tailored manner. This can lead to more qualified traffic to your website to drive more conversions and a better return on investment. You can now customize your ads to specific locations using the power and simplicity of [responsive search ads](hlp_BA_CONC_ResponsiveSearchAds.md) and [multimedia ads](hlp_BA_CONC_MMA_Search.md). They can be inserted within different headers and descriptions of your ads based on local areas, states, or even countries.

## How it works

You can tailor your ads to customers in different regions or cities just by changing a [dynamic text parameter](hlp_BA_CONC_AboutParameters.md). For example, if you have restaurants in several cities you can insert the location code to show specific ads to specific customers in each city.

In the above example, you would enter your headline, description, and/or URL path and type a brace ( { ). You will see a menu for parameter options. Select **location**. Select what level of location you want to show (City, State, or Country).

The syntax is {LOCATION(COUNTRY|STATE|CITY):Default text}

*Example headline code:* We have the best seafood in {LOCATION(City):the area}

In this example, a potential customer searching on the Microsoft Advertising Network for a seafood dinner will see the ad tailored for your customers. For people located in Phoenix who see your ad, the dynamic text will be replaced with "Phoenix." For people located in Chicago who see your ad, the dynamic text will be replaced with "Chicago." The ad text will default to "the area" if the web searcher's location cannot be recognized. Please note that you can use this syntax for your headline and description.
