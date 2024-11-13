---
title: "Countdown Customizers"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Add a countdown to an event by day, hour, and minute. 
---
# Countdown Customizers

Countdown customizers let you easily add a countdown -- by day, hour, and then minute -- to an event in dynamic search ads, expanded text ads, and responsive search ads. The countdown, which automatically updates as the event draws nearer, is eye-catching and gives potential customers greater incentive to click your ad.

Let's say you're going to have a big online sale for 3 days from February 14 through 16 (ending at midnight as soon as February 17th begins). With the countdown syntax, you could set the ad's Title Part 2 like this: "Sale ends in {=countdown("2021/02/17 00:00:00","en-us",3)}!". Here's when your ad would run and examples of how it would look:

![Event Countdown](media/countdown.png "Event Countdown")

After an ad's countdown ends, the ad will stop running but will retain the status *Active*. You can make the ad start running again by either:  
- Updating the ad's Countdown ends date to a point in the future, or 
- Removing the ad's countdown syntax entirely.

Let's break down the countdown requirements and options. All countdown options and parameters are case-insensitive.

## <a name="adcomponent"></a>Ad Component
You can set a countdown function in the expanded text ad's path, text, or title components. Where you want the countdown to appear, begin with a '{' (known as a left brace or a left curly bracket) and end with a '}' (known as a right brace or a right curly bracket). All of the remaining countdown components will be enclosed between these brackets. 
 
> [!NOTE]
> Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available per component. For example if the title part 2 is set to *"Sale ends in {=countdown("2021/02/17 00:00:00","en-us",3)}!"* the unsubstituted character count of the countdown function (*{=countdown("2021/02/17 00:00:00","en-us",3)}*) is 46; however, only 8 characters will be used from the total of 30 available substituted characters for the title part 2 component. In this example *Sale ends in !* uses up 14 characters, so you could use up to an additional 8 characters (8 + 14 + 8 = 30). 

## <a name="function"></a>Function
Immediately after the left curly bracket you must set either the *=countdown()* or *=global_countdown()* function. The *=countdown()* function counts down to a time that is adjusted to the local time zone of the search user. The *=global_countdown()* function counts down to a set time that is based on the time zone of your Microsoft Advertising account. All of the remaining countdown components will be enclosed between the left and right function parentheses.

## <a name="end-datetime"></a>Countdown End Date and Time
The first function parameter is used to specify the date and the time you want the countdown to count down to. When this date and time is reached, the ad will stop running. For example to end the countdown on February 17 set the countdown end date parameter to *"2021/02/17 00:00:00"*. The format of the date must be *yyyy/mm/dd/* and the format of the time (if included) must be based on the 24 hour clock. The time is optional and if you do not specify the time, it will default to midnight (*00:00:00*) at the very beginning of the date you specified. 

> [!NOTE]
> This parameter must be surrounded by double quotation marks. You will also need to use the escape character e.g. *"Sale ends in {=countdown(\\"2021/02/17 00:00:00\\",\\"en-us\\",3)}!"*  

## <a name="language"></a>Countdown Language
The second function parameter is used to specify the language that the countdown will be displayed, for example *"en-us"*. This language can differ from the ad language that you defined for your ad group or campaign. For a list of possible language values, see [Countdown Languages](ad-languages.md#countdownlanguage). If not specified, the default countdown language will be set to *en-us* (English). 

> [!NOTE]
> This parameter must be surrounded by double quotation marks. You will also need to use the escape character e.g. *"Sale ends in {=countdown(\\"2021/02/17 00:00:00\\",\\"en-us\\",3)}!"*  

## <a name="daysbefore"></a>Countdown Days Before
The third function parameter is used to specify how many days before the Countdown End Date and Time you want this ad to start running e.g., *3* (the maximum is 999). If not specified, the default will be set to *5* and the countdown will start five days before your Countdown End Date and Time. 

## See Also
[Dynamic Search Ads](dynamic-search-ads.md)  
[Expanded Text Ads](expanded-text-ads.md)  
