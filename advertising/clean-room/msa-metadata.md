---
title: Microsoft Advertising Metadata - Clean Room
ms.service: bing-ads
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Microsoft Advertising metadata.
---
# Microsoft Advertising Metadata

This dataset captures the structural elements of advertising campaigns within Microsoft Advertising, which is useful for mapping campaign strategy and performance over time. This metadata table is helpful for interpreting exposure data, linking ads to broader campaign strategy, and enabling attribution modeling in downstream analytics.

| Column Index | Column Name           | Type  | Description                                                        |
|--------------|------------------------|--------|--------------------------------------------------------------------|
| 01           | advertiser_account_id  | LONG   | A unique identifier for an advertiser.                             |
| 02           | advertiser_account_name| STRING | A unique name for an advertiser.                                   |
| 03           | campaign_id            | LONG   | A unique identifier for a campaign.                                |
| 04           | campaign_name          | STRING | A unique name for a campaign.                                      |
| 05           | ad_group_id            | LONG   | A unique identifer for the ad group within a campaign.             |
| 06           | ad_group_name          | STRING | A unique name for an ad group.                                     |
| 07           | start_date             | STRING | The start date of the campaign.                                    |
| 08           | end_date               | STRING | The end date of the campaign. (optional)                           |
