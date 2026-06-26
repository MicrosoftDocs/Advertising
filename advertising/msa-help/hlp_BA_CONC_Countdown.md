---
title: Show a countdown to an event in your ad
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Countdown customizers are tags you can insert into your ad title, body, or paths that show an automatically-updated countdown to an event.
---

# Show a countdown to an event in your ad

> [!NOTE]
> - Countdowns in the ad preview area of Microsoft Advertising Platform appear exclusively in English except in mainland China, where countdowns appear in Chinese. During ad delivery, the language your countdown appears in will be determined by your campaign settings.
> - Not everyone can show a countdown to an event in their Multimedia ads yet. If you can't, don't worry—it's coming soon!

Countdown customizers let you easily add a countdown — by day, hour, and then minute — to an event in expanded text ads, Dynamic Search ads, Responsive Search ads, and Multimedia ads. The countdown, which automatically updates as the event draws nearer, is eye-catching and gives potential customers greater incentive to select your ad.

For example, you can use a countdown to draw attention to a sale that is ending:

:::image type="content" source="media/BA_CONC_CountdownExample1.png" alt-text="Ad with a countdown in hours.":::

...or to promote an upcoming event:

:::image type="content" source="media/BA_CONC_CountdownExample2.png" alt-text="Ad with a countdown in days.":::

Ads with countdowns only run while the countdown is relevant — they won't start running until a specific day and time that you set, and they'll stop running when the countdown timer expires.

## Create an ad with a countdown

1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
1. Select **Create ad**, and then select an **ad group** that contains expanded search, dynamic search, Responsive Search ads, or Multimedia ads.
1. You can insert a countdown as you are entering your ad copy. Simply enter an open curly bracket ( { ), and then select **Countdown** from the drop-down list that appears under the box.
1. **Countdown ends**: Select the date and enter the time you want the countdown to end. When this date and time is reached, the ad will stop running. If you leave the time box empty, it will default to midnight at the very beginning of the date you selected.
1. **Countdown starts**: Enter how many days before the **Countdown ends** date/time you want this ad to start running (the maximum is 999).

   > [!NOTE]
   > If you leave this empty, the countdown will start five days before your **Countdown ends** date/time.
1. **Time zone**: You can choose to have the **Countdown ends** date/time in the viewer's local time zone or your account's time zone.

   > [!NOTE]
   > There are two different syntaxes for expanded text ads and Responsive Search ads/Multimedia ads. If you are creating an expanded text ad and are using the ad viewer's time zone, your countdown's syntax will start with "=COUNTDOWN"; if you use your account's time zone, it will start with "=GLOBAL_COUNTDOWN". If you are creating a Responsive Search ad or Multimedia ad and are using the ad viewer's time zone, your countdown's syntax will start with "COUNTDOWN"; if you use your account's time zone, it will start with "GLOBAL_COUNTDOWN".
1. **Language**: For dynamic search and expanded text ads, the countdown will appear in English (for example, "3 days"), unless you change it here. To display the countdown in a different language (for example, "3 jours" or "3 Tage"), select the appropriate language from the drop-down list.

   > [!NOTE]
   > The countdown language for Responsive Search ads and Multimedia ads will be determined by the language the ad copy is served in.
1. Select **Set**. You will see this countdown's syntax appear where you typed the { .
1. Select **Save**.

## How to create a countdown manually

You can also create a countdown manually, either by typing directly in the **Create ad** input boxes, by using a [bulk upload](hlp_BA_CONC_AboutBulk.md) spreadsheet, or by using [Microsoft Advertising Editor](hlp_BA_CONC_AboutDesktop.md).

To make sure you enter it correctly, let's look at the components of a countdown's syntax using the below examples for expanded text ads and Responsive Search ads/Multimedia ads:

- **Expanded text ads**

  > [!IMPORTANT]
  > **Advertisers can no longer create new or edit existing Expanded Text ads or Standard Text ads. Standard Text ads stopped serving in February 2025.**[Learn more](hlp_BA_CONC_ResponsiveSearchAds.md)

  **{=COUNTDOWN("2018/02/17 00:00:00","en-us",3)}**

  | Component | What you need to know |
  | --- | --- |
  | **{ ... }** | **Mandatory**. The entire countdown syntax must be within a pair of braces (also called curly brackets). |
  | **=COUNTDOWN** | **Mandatory**. This component determines whether the countdown is based on the ad viewer's local time zone or on your account's time zone. The possible values are "=COUNTDOWN" (the ad viewer's local time zone) or "=GLOBAL_COUNTDOWN" (your account's time zone). |
  | **( ... )** | **Mandatory**. The other components of the syntax must be within a pair of parentheses.<br>**Note**: Individual components within the parentheses must be separated by commas. |
  | **"2018/02/17 00:00:00"** | This is the countdown end date and time (must be within a pair of double quotation marks). **The date is mandatory, but the time is optional**. If you do not specify the time, it will default to midnight (00:00:00) at the very beginning of the date you specified. |
  | **"en-us"** | This is the language the countdown will appear in (must be within a pair of double quotation marks). For example, "3 days", "3 jours", or "3 Tage"). **This component is only mandatory if you define how many days before the countdown end date/time you want the ad to start running** (see next component). If you do not specify the language, it will default to English. |
  | **3** | **Optional**. This is how many days before the countdown end date/time you want the ad to start running (the maximum is 999). If you do not specify the number of days, it will default to 5. |

- **Responsive Search ads and Multimedia ads**

- **{COUNTDOWN(2021-12-12 11:59:59,5)}**

  | Component | What you need to know |
  | --- | --- |
  | **{ ... }** | **Mandatory**. The entire countdown syntax must be within a pair of braces (also called curly brackets). |
  | **COUNTDOWN** | **Mandatory**. This component determines whether the countdown is based on the ad viewer's local time zone or on your account's time zone. The possible values are "COUNTDOWN" (the ad viewer's local time zone) or "GLOBAL_COUNTDOWN" (your account's time zone). |
  | **( ... )** | **Mandatory**. The other components of the syntax must be within a pair of parentheses.<br>**Note**: Individual components within the parentheses must be separated by commas. |
  | **2021-12-12 11:59:59** | This is the countdown end date and time. **The date is mandatory, but the time is optional**. If you do not specify the time, it will default to midnight (00:00:00) at the very beginning of the date you specified. |
  | **5** | **Optional**. This is how many days before the countdown end date/time you want the ad to start running (the maximum is 999). If you do not specify the number of days, it will default to 5. |

  <a id="how-to-pause-an-active-ad-using-a-countdown"></a>

## How to pause an active ad using a countdown

1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
1. In the Ads grid, find the ad that you wish to pause and select the checkbox next to it.
1. In the blue bar, select **Edit** > **Pause**.

## How to pause or edit an ad that has an expired countdown

- **Edit an ad**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. In the Ads grid, select the pencil icon ![pencil icon](media/BA_icon_edit.png) next to the ad you would like to change.
  1. Enter your changes.
  1. Select **Save**.

- **Pause an ad**

  See [How to pause an active ad using a countdown](#how-to-pause-an-active-ad-using-a-countdown) for instructions on how to pause an ad using a countdown.

## Example of a countdown in action (expanded text ads)

Let's say you're going to have a big online sale. You pick 12:00 AM on February 17 as your **Countdown ends** date/time, enter 3 for **Countdown starts**, and base the date/time on the ad viewer's time zone. Here's when your ad would run and examples of how it would look:

:::image type="content" source="media/BA_CONC_Countdown.png" alt-text="Timeline showing when the ad would appear.":::

With the countdown syntax, this ad's **Title Part 2** would look like this when you create it: "Sale ends in {=COUNTDOWN("2018/02/17 00:00:00","en-us",3)}!".

> [!NOTE]
> After an ad's countdown ends, the ad will stop running but will retain the status **Enabled**. You can make the ad start running again by either:
>
> - Updating the ad's **Countdown ends** date to a point in the future, or
> - Removing the ad's countdown syntax entirely.

## Before you start: Consider character length

The countdown syntax will always use a specified number of characters, depending on the language:

- **For single-width characters, such as English,** the final displayed countdown will use 8 characters out of the total available per component.
- **For double-width characters, such as Chinese,** the final displayed countdown will use 4 characters out of the total available per component.

Keep in mind that your text will be too long if the countdown syntax makes it exceed the maximum character length. Here are some examples:

- If the ad text limit is *90 single-width characters*, you can only use up to 82 characters (or 41 double-width characters).
- If the ad title limit is *30 single-width characters*, you can only use up to 22 characters (or 11 double-width characters).

## Best practices for ads with countdowns

- **Don't have all of the ads in an ad group use countdowns**

  Having a countdown in an ad means that the ad won't start running until a certain date and time, and then will stop running a few days later. If all of the ads in an ad group use countdowns, it's easy to end up having no ads running for some periods of time. To ensure that you always have ads running, we recommend having at least one ad without a countdown in each ad group.

- **Don't have multiple countdowns in a single ad if they have different date ranges**

  It is possible to have more than one countdown in an ad. However, if they are based on different time ranges, the ad will only appear when the two time ranges overlap. We recommend avoiding this scenario.

- **Choose the right time zone setting**

  - If you're counting down to an event that will take place at a specific location — such as an in-store appearance, sporting event, or convention — it's probably best to base the countdown on your account time zone.
  - If you're counting down to an event that isn't tied to a specific location (like an online sale), it's probably best to base the countdown on the ad viewer's time zone.
