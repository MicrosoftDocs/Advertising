---
title: Microsoft Audience Segments - Clean Room
ms.service: bing-ads
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Microsoft Advertising audience segments.
---
# Microsoft Audience Segments

This dataset identifies and categorizes users into Microsoft Advertising's audience segments, using hashed identifiers to preserve privacy while enabling audience targeting and analytics. This feed is especially valuable for audience analysis, campaign targeting, personalization strategies, and cross-segment performance comparisons—all without exposing personally identifiable information.

| Column Index | Column Name   | Type    | Description                                                        |
|--------------|----------------|---------|--------------------------------------------------------------------|
| 01           | hashed_email   | STRING  | A hashed email address representing a unique user                 |
| 02           | segment_id     | INTEGER | A unique identifier for a Microsoft In-Market Audience segment    |
| 03           | segment_name   | STRING  | A name to define a Microsoft In-Market Audience segment           |
