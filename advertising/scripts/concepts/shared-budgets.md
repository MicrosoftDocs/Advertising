---
title: "Shared budgets versus campaign-specific budgets"
description: "Provides the basics about using shared budgets in Microsoft Advertising Scripts."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---


# Shared budgets versus campaign-specific budgets

A campaign can specify its own budget or share a budget with other campaigns. With shared budgets, you identify the campaigns within the same account that you want to share the budget. Sharing a budget can help you fully utilize the budget. For example, if campaign A had its own $10 budget and campaign B had its own $10 budget, it's possible that campaign A may spend only $8 of its budget. But because campaign B is performing well, it spent all of its budget and could have spent more. If the campaigns shared a budget, campaign B would automatically use the $2 that campaign A didn't use, increasing the chance that more traffic is sent your way.

Campaigns and their budgets are created outside Scripts. When you create a campaign, you specify its budget. If you don't use shared budgets, that's all you do. But if you want to share a budget, you need to create a budget and share it to one or more campaigns. To create a shared budget and associate it with one or more campaigns, use the Microsoft Advertising web application. For details, see [How do I share a budget across multiple campaigns?](https://help.ads.microsoft.com/#apex/3/en/56814/1)

To get a campaign's budget, call the campaign's [getBudget](../reference/Campaign.md#getbudget) method. The [Budget](../reference/Budget.md) object includes the `isExplicitlyShared` property. Use this property to determine whether the budget is shared or is specific to the campaign. Also, the ID and Name properties return null if the budget is not shared.

You cannot update a shared budget when you access it from a [Campaign](../reference/Campaign.md) object. For example, if you called the campaign's `getBudget` method, you cannot update the budget if it's shared. The only budgets you can update from a campaign object, are campaign-specific budgets.

To update a shared budget, you must get the `Budget` object from the budget selector (see [BudgetSelector](../reference/BudgetSelector.md)). The selector returns only shared budget; the selector will not include campaign-specific budgets.

For examples that show how to get and update shared budgets, see [Managing shared budgets](../examples/budgets.md).
