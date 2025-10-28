---
title: "Microsoft Advertising Scripts IDs"
description: "Describes how IDs are handled in Microsoft Advertising Scripts."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# Defining IDs in scripts

IDs in Scripts are strings not integers. For example, when calling a selector's `withIds()` method, you pass an array of string IDs, not an array of integer IDs. Or, if you call an entity's `getId()` method, it returns the ID as a string, not an integer.
