---
title: Conversion value rules
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: With conversion value rules, you can adjust your conversion values if the conversion meets certain conditions that are relevant to your business goals.
---

# Conversion value rules

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

With conversion value rules, you can adjust your conversion values if the conversion meets certain conditions that are relevant to your business goals. We use the additional value information you provide to optimize your campaigns in real time to those values.

The conditions you can set include Audiences, Geographic Locations, and Devices. You can set two of these conditions simultaneously—the primary condition and the secondary condition.

> [!NOTE]
> It is not necessary to set a secondary condition.

## Types of conditions

- Location conditions let you add to or multiply the value of leads based on specific targeted and excluded locations.
- Device conditions let you target specific types of devices, either Desktop, Tablet, or Mobile.
- Audience conditions let you use audience lists to indicate which users you would like to target.

## Implement Conversion value rules

1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
1. Select the **Conversion value rules** tab.
1. Select the **Create conversion value rule** button.
1. Enter a name for the conversion value rule.
1. Select the primary condition of the rule.

   1. Select the type of condition.

      1. For a location condition, select **All available countries/regions** or **Let me choose specific locations**.

         1. If you select **Let me choose specific locations**, enter a location name in the **Search for location** text box.
         1. Select whether you want to target the location or exclude the location.

            > [!NOTE]
            > Select **Remove all** to remove any selected locations and start over.
         1. Under **For locations you want to include, adjust values for**, select **People in your targeted locations** or **People searching for or viewing pages about your targeted locations**.
         1. Under **For locations you want to exclude, select values for**, select **People in your targeted locations** or **People searching for or viewing pages about your targeted locations**.
         1. Choose a **Value adjustment** by selecting **Add** or **Multiply** and entering the adjustment and selecting the currency.
      1. For a device condition, select **Desktop**, **Tablet**, **Mobile**, or some combination of those to target those devices.
      1. For an audience condition, select **All available audiences** or **Let me choose specific audiences**.

         1. If you select **Let me choose specific audiences**, select at least one audience from the dropdown menu.

            > [!NOTE]
            > Select **Remove all** to remove any selected audiences and start over.
1. *Optional*: Select a secondary condition and repeat the process outlined in step 5 above.
1. Select **Save**.

## Frequently asked questions

- **Do all conversion value rules in an account need to have the same primary and secondary condition types?**<br> Yes. For example, if a rule has a primary condition type of location, all other rules must also have location as the primary condition type.
- **What happens if two conversion value rules have different primary and secondary condition types?**<br> If two rules overlap, e.g., one has a primary condition location of "USA", and another has a primary condition location of "Texas", the one with the narrower scope (Texas) is applied.
- **Do all conversion value rules apply to all conversion goals in an account?**<br> Yes.
- **Where can I find the impact of my conversion value rules?**<br> You can find the impact of your conversion value rules in your campaign performance reports under the columns *Conv. rule revenue adj.*, *Conv. rule all revenue adj.*, and *Conv. rule view-through revenue adj.*.
- **Will conversion value rules impact conversions that occur before the rule was created?**<br> No. Conversion value rules will only impact performance and show on reporting for conversions occurring after the rule is created.
