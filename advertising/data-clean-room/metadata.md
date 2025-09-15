---
title: Metadata - Data Clean Room
ms.service: bing-ads
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: This dataset captures the structural elements of advertising campaigns within Microsoft Advertising and Microsoft Monetize, which is useful for mapping campaign strategy and performance over time.
---
# Metadata

This dataset captures the structural elements of advertising campaigns within Microsoft Advertising and Microsoft Monetize, which is useful for mapping campaign strategy and performance over time. This metadata table is helpful for interpreting exposure data, linking ads to broader campaign strategy, and enabling attribution modeling in downstream analytics.

## Microsoft Advertising metadata

| Column Index | Column Name            | Type   | Description                                                        |
|--------------|------------------------|--------|--------------------------------------------------------------------|
| 01           | advertiser_account_id  | LONG   | A unique identifier for an advertiser.                             |
| 02           | advertiser_account_name| STRING | A name for an advertiser.                                          |
| 03           | campaign_id            | LONG   | A unique identifier for a campaign.                                |
| 04           | campaign_name          | STRING | A name for a campaign.                                             |
| 05           | ad_group_id            | LONG   | A unique identifer for the ad group within a campaign.             |
| 06           | ad_group_name          | STRING | A name for an ad group.                                            |
| 07           | start_date             | STRING | The start date of the campaign.                                    |
| 08           | end_date               | STRING | The end date of the campaign. (optional)                           |

## Microsoft Monetize metadata

| Column Index | Column Name           | Type    | Description                                      |
|--------------|------------------------|---------|--------------------------------------------------|
| 01           | advertiser_id          | INTEGER | A unique identifier for an advertiser.           |
| 02           | advertiser_name        | STRING  | A unique name for an advertiser.                 |
| 03           | insertion_order_id     | INTEGER | A unique identifier for an insertion order.      |
| 04           | insertion_order_name   | STRING  | A unique name for an insertion order.            |
| 05           | line_item_id           | INTEGER | A unique identifier for a line item.             |
| 06           | line_item_name         | STRING  | A unique name for a line item.                   |
| 07           | start_date             | LONG    | The start date of the line item.                 |
| 08           | end_date               | LONG    | The end date of the line item.                   |
