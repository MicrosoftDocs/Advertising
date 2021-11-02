---
title: "BingAdsDate object"
description: "Contains properties that define a date."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# BingAdsDate

Contains properties that define a date.

Do not use this object to specify a date when calling one of the `forDateRange()` methods such as [AdGroupSelector.forDateRange()](AdGroupSelector.md#fordaterange-object-datefrom-object-dateto-). Instead, use this object to receive a date from methods such as [AdGroup.getStartDate()](AdGroup.md#getstartdate).


## Properties

|Property|Type|Description|
|-|-
|day|integer|The day of the month. For example, 30.
|month|integer|The numeric calendar month, where 1 is January and 12 is December.
|year|integer|The four-digit calendar year. For example, 2018.

