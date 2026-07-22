---
title: MCP Server Tools
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 7/22/2026
description: The Microsoft Advertising MCP server provides a set of read-only entity tools that enable AI agents and MCP clients to retrieve Microsoft Advertising data through a consistent query model.
---
# Microsoft Advertising MCP Entity Tools

The Microsoft Advertising MCP server provides a set of read-only entity tools that enable AI agents and MCP clients to retrieve Microsoft Advertising data through a consistent query model. All entity tools use the same request and response structure, making it easy to query different entity types without learning a new API pattern for each operation. 【1-a45ec0】

## Overview

Entity tools retrieve Microsoft Advertising objects such as campaigns, ad groups, ads, keywords, asset groups, audiences, and accounts. Each tool supports:

- Filtering
- Sorting
- Pagination
- Optional performance reporting
- Read-only access

The tools never modify account data. They only return information from Microsoft Advertising.

## Available Entity Tools

| Tool | Description |
|--------|-------------|
| GetAccounts | Retrieve advertiser accounts |
| GetCampaigns | Retrieve campaigns |
| GetAdGroups | Retrieve ad groups |
| GetAds | Retrieve ads |
| GetKeywords | Retrieve keywords |
| GetAssetGroups | Retrieve Performance Max asset groups |
| GetAudienceAssociations | Retrieve audience targeting associations |

---

## Common Request Model

All entity tools use a shared request structure.

```json
{
  "request": {
    "CustomerId": 1234567,
    "AccountId": 7654321,
    "Filter": {},
    "Sorting": {},
    "PerformanceDateRange": {},
    "PageSize": 20
  }
}
```

### Request Properties

| Property | Description |
|-----------|-------------|
| CustomerId | Microsoft Advertising customer ID |
| AccountId | Microsoft Advertising account ID |
| Filter | Entity-specific filters |
| Sorting | Sort configuration |
| PerformanceDateRange | Enables performance metrics |
| PageSize | Number of results returned |

Most entity tools require both `CustomerId` and `AccountId`. `GetAccounts` allows these values to be omitted.

---

## Common Response Model

All tools return the same response structure.

```json
{
  "Entities": [],
  "TotalCount": 0,
  "NextPageToken": null
}
```

### Response Properties

| Property | Description |
|-----------|-------------|
| Entities | Matching entities |
| TotalCount | Total matching records |
| NextPageToken | Token for retrieving the next page |

Use `NextPageToken` when additional pages are available.

---

## GetAccounts

Retrieves advertiser accounts.

### When to use

- List accessible accounts
- Retrieve account numbers
- Retrieve billing information
- View account ownership details

### Returned Data

- Account ID
- Account Name
- Account Number
- Currency
- Billing Customer
- Parent Customer
- Owner

#### Example

```json
{
  "name": "get_accounts",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "Filter": {
        "Currency": {
          "IsEqualTo": "USD"
        }
      }
    }
  }
}
```

---

## GetCampaigns

Retrieves campaigns within an account.

### When to use

- List active campaigns
- Find campaigns by type
- Rank campaigns by spend or conversions
- Diagnose delivery issues

### Supported Filters

- Campaign ID
- Name
- Campaign Type
- Budget Amount
- Status
- Bidding Strategy
- Delivery Status
- Performance Metrics

#### Example

```json
{
  "name": "get_campaigns",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "AccountId": 7654321,
      "Filter": {
        "Status": {
          "IsEqualToAny": ["Active"]
        }
      },
      "Sorting": {
        "SortBy": "Spend",
        "Descending": true
      },
      "PerformanceDateRange": {
        "Preset": "LastThirtyDays"
      }
    }
  }
}
```

#### Campaign Properties

Returned campaign data may include:

- Id
- Name
- DailyBudget
- BudgetType
- CampaignType
- Status
- DeliveryStatus
- BiddingScheme
- StartDate
- EndDate

---

## GetAdGroups

Retrieves ad groups.

### When to use

- List ad groups within a campaign
- Find active ad groups
- Compare ad-group performance
- Review bid settings

### Supported Filters

- Ad Group ID
- Campaign ID
- Name
- Campaign Name
- Status
- Campaign Type
- Performance Metrics

#### Example

```json
{
  "name": "get_ad_groups",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "AccountId": 7654321,
      "Filter": {
        "CampaignId": {
          "IsEqualTo": 123456789
        }
      }
    }
  }
}
```

---

## GetAds

Retrieves ads across campaigns and ad groups.

### When to use

- Review ad creative
- Retrieve responsive search ads
- Find ads by type
- Audit ad status

### Supported Ad Types

| Ad Type |
|----------|
| Text |
| Product |
| AppInstall |
| DynamicSearch |
| ExpandedText |
| Hotel |
| ResponsiveSearch |
| ResponsiveAd |

### Supported Filters

- Ad ID
- Ad Type
- Campaign ID
- Campaign Name
- Ad Group ID
- Ad Group Name
- Status
- Performance Metrics

#### Example

```json
{
  "name": "get_ads",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "AccountId": 7654321,
      "Filter": {
        "AdGroupId": {
          "IsEqualTo": 987654321
        }
      }
    }
  }
}
```

---

## GetKeywords

Retrieves keywords and keyword targeting settings.

### When to use

- Review keyword inventory
- Analyze keyword performance
- Retrieve bids
- Filter by match type

### Supported Match Types

| Match Type |
|------------|
| Exact |
| Phrase |
| Broad |
| AIOptimized |

### Supported Filters

- Keyword ID
- Keyword Text
- Match Type
- Campaign ID
- Campaign Name
- Ad Group ID
- Ad Group Name
- Status
- Performance Metrics

#### Example

```json
{
  "name": "get_keywords",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "AccountId": 7654321,
      "Filter": {
        "MatchType": {
          "IsEqualToAny": [
            "Exact",
            "Phrase"
          ]
        }
      }
    }
  }
}
```

---

## GetAssetGroups

Retrieves Performance Max asset groups.

### When to use

- Review Performance Max assets
- Analyze creative assets
- Inspect search themes
- Review asset group delivery

### Required Parameters

`CampaignId` is required.

### Returned Data

- Headlines
- Long Headlines
- Descriptions
- Images
- Videos
- Search Themes
- Landing URLs
- Delivery Status

#### Example

```json
{
  "name": "get_asset_groups",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "AccountId": 7654321,
      "CampaignId": 111222333,
      "Filter": {
        "Status": {
          "IsEqualToAny": ["Active"]
        }
      }
    }
  }
}
```

---

## GetAudienceAssociations

Retrieves audience targeting associations.

### When to use

- Review audience targeting
- View audience bid adjustments
- Retrieve campaign audiences
- Retrieve ad-group audiences

### Supported Filters

- Audience ID
- Audience Name
- Audience Type
- Level
- Campaign ID
- Campaign Name
- Ad Group ID
- Ad Group Name
- Status
- Performance Metrics

#### Example

```json
{
  "name": "get_audience_associations",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "AccountId": 7654321,
      "Filter": {
        "Level": {
          "IsEqualToAny": ["Campaign"]
        }
      }
    }
  }
}
```

---

## Performance Metrics

Performance metrics are returned only when a `PerformanceDateRange` is provided.

### Supported Metrics

- Spend
- Impressions
- Clicks
- ClickThroughRate
- AverageCostPerClick
- AverageCostPerThousandImpressions
- Conversions
- ClickConversionRate
- Revenue
- ReturnOnAdSpend
- TopImpressionRate
- AbsoluteTopImpressionRate
- CPA
- CostPerInstall

### Date Range Presets

```json
{
  "Preset": "LastThirtyDays"
}
```

Supported presets:

- Today
- Yesterday
- LastSevenDays
- LastFourteenDays
- LastThirtyDays
- ThisMonth
- LastMonth
- ThisWeekFromMon
- LastWeekStartingMon

---

## Filtering

### String Filters

```json
{
  "Contains": "Brand"
}
```

Supported operators:

- IsEqualTo
- IsNotEqualTo
- Contains
- StartsWith

### Number Filters

```json
{
  "IsGreaterThan": 100
}
```

Supported operators:

- IsEqualTo
- IsNotEqualTo
- IsGreaterThan
- IsGreaterThanOrEqualTo
- IsLessThan
- IsLessThanOrEqualTo
- IsEqualToAny

### Enum Filters

```json
{
  "IsEqualToAny": [
    "Active",
    "Paused"
  ]
}
```

Supported operators:

- IsEqualTo
- IsEqualToAny

---

## Sorting

Sort results using an entity field or a performance metric.

```json
{
  "Sorting": {
    "SortBy": "Spend",
    "Descending": true
  }
}
```

---

## Pagination

All entity tools support paging.

### Request

```json
{
  "request": {
    "PageSize": 100
  }
}
```

### Response

```json
{
  "NextPageToken": "..."
}
```

Pass the returned `NextPageToken` into the next request to retrieve additional records.

---

## Next Steps

Use MCP entity tools to retrieve Microsoft Advertising account structure, campaign hierarchy, performance metrics, creatives, keywords, audiences, and Performance Max assets through a consistent and reusable query model. All tools share the same request and response patterns, making it straightforward to build AI-powered reporting, diagnostics, and account analysis experiences.
