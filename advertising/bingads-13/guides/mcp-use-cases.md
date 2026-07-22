---
title: MCP Server Use Cases
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 7/22/2026
description: The Microsoft Advertising MCP Server enables AI assistants and applications to access Microsoft Advertising account data using natural language.
---
# Microsoft Advertising MCP Server Use Cases

The Microsoft Advertising MCP Server enables AI assistants and applications to access Microsoft Advertising account data using natural language. Users can retrieve performance insights, investigate campaigns, analyze audience and keyword data, identify anomalies, and generate exportable outputs without manually creating reports.

## Supported Scenarios

The MCP Server supports:

- Reporting and campaign insights
- Campaign, ad group, asset group, ad, keyword, and audience analysis
- Entity discovery and lookup
- Anomaly and threshold detection
- Exportable reporting outputs
- Cross-platform comparison between Microsoft Advertising and Google Ads

---

## Reporting and Campaign Insights

Use natural language prompts to analyze advertising performance across your account.

### Account Performance Summaries

Generate KPI summaries across all active campaigns for a selected time range.

#### Supported metrics

- Impressions
- Clicks
- Click-through rate (CTR)
- Conversions
- Cost per acquisition (CPA)
- Return on ad spend (ROAS)
- Spend

#### Example prompts

```text
Give me a performance summary for the account for the last 7 days.

How did performance compare this week versus last week?

Summarize all active campaigns for last month and identify the strongest and weakest performers.
```

---

### Campaign Analysis

Analyze a specific campaign and identify factors affecting performance.

#### Example prompts

```text
Break down the "Summer Sale" campaign for the first half of the month.

Show which ad groups are reducing performance in the "Brand Search" campaign.

How has "General Cord Reels" changed over the last 30 days compared to the previous period?
```

---

### Ad Group and Asset Group Reporting

Compare ad groups and asset groups using performance metrics.

#### Example prompts

```text
Compare ad groups in my "Brand Search" campaign by CTR and CPA.

Which asset groups in my shopping campaign are performing best this month?

List ad groups with zero conversions and more than $50 in spend.
```

---

### Ad Performance Analysis

Review ad performance and identify top-performing and underperforming ads.

#### Example prompts

```text
Rank ads in the "Shoes - Exact" ad group by conversions.

Which responsive search ads are performing best?

Show the best and worst ads by CTR for last week.
```

---

### Keyword Analysis

Analyze keyword effectiveness across accounts, campaigns, and ad groups.

### Example prompts

```text
Show the top 20 keywords by spend in "Brand Search" this month.

Identify keywords with spend but no conversions in the last 30 days.

Compare exact and phrase match keyword performance.
```

---

### Audience Analysis

Evaluate performance by audience segment, demographic group, or geographic location.

### Example prompts

```text
Break down account performance by audience over the last 30 days.

Which audience segments are underperforming?

Which locations generate the most conversions?
```

---

### Entity Lookup and Filtering

Retrieve lists of entities based on attributes or performance thresholds.

#### Supported entities

- Campaigns
- Ad groups
- Ads
- Keywords
- Audiences

#### Example prompts

```text
Show all active Performance Max campaigns.

List paused ad groups.

Which campaigns have a daily budget greater than $500?
```

---

### Exportable Outputs

Generate reports in formats appropriate for analysis, dashboards, and presentations.

#### Supported output formats

- Structured tables
- Excel-ready datasets
- Power BI-ready datasets
- Executive summaries
- Presentation talking points

#### Example prompts

```text
Generate a Power BI-ready table for this month's account summary.

Create an Excel export containing impressions, clicks, spend, and ROAS.

Summarize quarter-to-date performance as presentation talking points.
```

---

### Anomaly Detection

Identify significant performance changes and determine which entities contributed to them.

#### Example prompts

```text
Did account spend change significantly yesterday?

Flag campaigns with conversions down more than 30%.

Show impression trends and identify anomalies.
```

---

## Cross-Platform Comparison

> [!IMPORTANT]
> Cross-platform comparison scenarios require integrations with both Microsoft Advertising and Google Ads.

Compare account structure, settings, performance, keywords, audiences, and asset groups across platforms.

---

### Account Structure Comparison

Compare campaign and entity coverage between platforms.

#### Example prompts

```text
Compare campaign, ad group, keyword, and audience coverage between Google and Microsoft.

Which campaigns exist in Google Ads but not Microsoft Advertising?

Generate a side-by-side account structure summary.
```

---

### Campaign Settings Comparison

Compare configuration settings for equivalent campaigns.

#### Settings that can be compared

- Bidding strategy
- Budget
- Network targeting
- Geographic targeting
- Language targeting
- Campaign status

#### Example prompts

```text
Compare bidding strategies and budgets for "Brand Search".

Show differences in campaign settings between platforms.

Compare network, geography, and language settings.
```

---

### Performance Comparison

Compare performance metrics across equivalent campaigns or entities.

#### Example prompts

```text
Compare conversions and ROAS for "Brand Search" this month.

Which platform delivers a lower CPA?

Show CTR and CPA side by side for the last 30 days.
```

---

### Keyword Comparison

Compare keyword coverage and match types between platforms.

### Example prompts

```text
Compare keywords and match types for "Brand Search".

Which keywords exist in Google Ads but not Microsoft Advertising?

Show match-type differences for equivalent keywords.
```

---

### Asset Group Comparison

Compare Performance Max and Shopping asset groups across platforms.

### Example prompts

```text
Compare Performance Max asset groups across platforms.

Which asset groups exist in Google Ads but not Microsoft Advertising?

Show a side-by-side asset group comparison.
```

---

### Audience Comparison

Compare audiences and audience assignments across platforms.

### Example prompts

```text
Compare audiences across platforms.

Which audiences exist in Google Ads but not Microsoft Advertising?

Show audience associations for the Retargeting campaign.
```

---

## Next Steps

These examples are intended as starting points. You can refine prompts by specifying:

- Time ranges
- Campaigns
- Ad groups
- Performance metrics
- Audience segments
- Geographic dimensions
- Output formats

The MCP Server supports iterative exploration using natural language queries against connected advertising account data.
