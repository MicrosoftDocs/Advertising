---
title: "Combined Lists: Mix and Match Audiences to Reach Just the Right Customers"
ms.service: msa-help
ms.subservice: msa-audience-display-video
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to combine audiences to reach just the right set of customers.
---

# Combined lists: Mix and match audiences to reach just the right customers

> [!IMPORTANT]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

With combined lists, you combine existing audience lists to create a new one. Combine lists using AND, OR, and NOT conditions to reach just the right set of customers.

## Examples

- **Selling products**: Let's say you sell camping gear, and you want to drive sales of camping accessories:

  **List A** (Purchased a tent) **AND** ( **List B** (Viewed an air mattress) **OR** **List C** (Viewed a sleeping bag) ) **=** **Combined list** (Audience for accessories sale)

- **Getting leads**: Let's say you provide tax-preparation services, and you want to reach new customers:

  **List A** (Previous website visitor) **NOT** **List B** (Already filed taxes) **=** **Combined list** (Potential new customers)

Both of these examples were possible previously, but required multiple audience associations or audience exclusions. With combined lists, there's just one audience list to work with.

## Using combined lists

- **How do I create a combined list?**

  1. From the navigation menu on the left, select **Tools** > **Audiences**.
  1. Select **Create**.
  1. Give this audience a unique name.
  1. For **Type**, select **Custom combination list**.
  1. Select **Next**.
  1. Combine audience lists into a set of conditions:

     1. First, select *how* you want to combine audiences:

        | Combination option | What it means |
        | --- | --- |
        | **Any of these audiences (OR)** | This will include customers who are in any of these audience lists. |
        | **Each of these audiences (AND)** | This will include only customers who are in every single one of these audience lists. |
        | **None of these audiences (NOT)** | This will *exclude* customers who are in any of these audience lists. |
     1. Then, search or browse for existing audience lists and select the appropriate ones.
     1. Select **Done**.
  1. You now have the option to select **Add** and create another set of conditions to combine with the set you just created. Each condition set is combined with the other using an AND condition.
  1. When you're done, select **Save**.

  > [!NOTE]
  > Combined lists must have at least 300 members.

- **How do I associate combined lists?**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Audiences**.
  1. Select **Create association**.
  1. Select the ad group or campaign you want to associate with the combined list.
  1. Under **Ad group targeting** or **Campaign targeting**, select **Combined list** and then select the appropriate list.
  1. Select your **Targeting setting**:

     - **Bid only**: Ads in this ad group or campaign can show to everyone but the bid adjustment will apply to people included in the audience.
     - **Target and bid**: This setting limits your ads to people in your selected audiences. You may choose to make bid adjustments for those audiences.
  1. Set the **Default bid adjustment**. By default, new targeting associations are set to 15%, however, the bid adjustment can range from -90% to +900%.
  1. Select **Save**.

- **What audience types can I combine, and are there any restrictions?**

  | Audience type | Restrictions |
  | --- | --- |
  | **Remarketing list** | Can only be combined with customer match lists, custom audiences, other remarketing lists and/or dynamic remarketing lists. |
  | **Dynamic remarketing list** | Can only be combined with customer match lists, custom audiences, other dynamic remarketing lists and/or remarketing lists. |
  | **Custom audience** | Can be combined with other custom audiences, customer match lists, remarketing lists and/or dynamic remarketing lists. |
  | **Similar audience** | Can only be combined using a single OR condition with one other similar audience. |
  | **Customer match** | Can be combined with remarketing lists and/or dynamic remarketing lists or custom audiences. |
  | **In-market audience** | Not eligible for combined lists. |
  | **LinkedIn profile targeting** | Not eligible for combined lists. |
  | **Combined list** | Combined lists cannot be combined. |

> [!NOTE]
> Combined lists are just one of our [audience targeting options](hlp_BA_CONC_Audiences_Options.md).
