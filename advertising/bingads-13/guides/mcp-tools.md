---
title: MCP Server Tools
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 10/20/2026
description: Explore read-only Microsoft Advertising MCP tools for retrieving entities, creative asset performance, and account change history.
---
# Microsoft Advertising MCP Entity Tools

The Microsoft Advertising MCP server provides a set of read-only tools that enable AI agents and MCP clients to retrieve Microsoft Advertising data. Entity tools use a shared request and response structure. `GetChangeHistory` follows the per-field `Filter` convention but uses its own request structure with `DateRange` and without `Sorting` or `PerformanceDateRange`.

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
| GetAssets | Retrieve reusable creative assets and usage context |
| GetAudienceAssociations | Retrieve audience targeting associations |
| GetChangeHistory | Retrieve account change history |

---

## Common Request Model

Entity tools use the shared request structure below. `GetChangeHistory` uses its own request structure with `DateRange` instead of `Sorting` or `PerformanceDateRange`. Its `Filter` follows the same per-field convention with the supported predicates listed in its section.

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

## GetAssets

Retrieves reusable creative assets and their performance for each association. If `PerformanceDateRange` is omitted, results default to the last 30 days.

### When to use

- Find text, image, and video assets
- Review asset usage and pinned-position counts
- Analyze performance within an account, campaign, or ad group

### Supported Asset Types

| Type |
|------|
| TextAsset |
| ImageAsset |
| VideoAsset |

### Supported Filters

- Asset ID
- Asset Text
- Performance Metrics

Revenue can be returned, but it can't be used for filtering or sorting. CPA and conversion rate aren't supported.

### Required Parameters

`CustomerId` and `AccountId` are required. `CampaignId` is optional. `AdGroupId` is optional and requires `CampaignId`. These IDs define the measurement scope; Performance Max asset group IDs aren't supported as an ad-group scope.

### Returned Data

- Asset ID and type, with text for text assets
- Image and video subtype, URL, crop, and thumbnail details where applicable
- Association type, usage counts, and pinned-position counts
- Performance metrics for each association usage, including revenue when available

Rows are returned per asset and association type, and each row's performance applies only to that usage. The same asset ID can appear more than once, and `TotalCount` counts rows rather than distinct assets. Don't add performance across rows that share an asset ID.

#### Example

```json
{
  "name": "get_assets",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "AccountId": 7654321,
      "PerformanceDateRange": {
        "Preset": "LastThirtyDays"
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

## GetChangeHistory

Retrieves change history for one account as paged rows, newest first. Each row represents one changed attribute, so one edit can produce several rows.

### When to use

- Review recent changes within an account or campaign
- Find who changed a budget, bid, or status
- Compare previous and new values, or find added and removed items

### Supported Filters

- `CampaignId`, `CampaignName`, `AdGroupId`, and `AdGroupName`
- `ChangedBy`, `EntityName`, and `EntityId`
- `ItemChanged`, `AttributeChanged`, and `HowChanged`
- `OldValue`, `NewValue`, `AdTitle`, `AdDescription`, `DisplayUrl`, and `Keyword`

Use the per-field `Filter` object, for example `CampaignId: { IsEqualTo: 9876543 }` or `ItemChanged: { IsEqualToAny: ["Ad group"] }`.

- ID and category fields support `IsEqualTo`, `IsNotEqualTo`, `IsEqualToAny`, and `IsNotEqualToAny`.
- `CampaignId`, `AdGroupId`, and `EntityId` also support `IsGreaterThan`, `IsGreaterThanOrEqualTo`, `IsLessThan`, and `IsLessThanOrEqualTo`, each with one threshold.
- Text fields also support `Contains`, `StartsWith`, and `EndsWith`.

IDs and thresholds are non-negative JSON integers. All predicates are AND-combined, including both bounds of a range such as `EntityId: { IsGreaterThan: 12345, IsLessThanOrEqualTo: 67890 }`. `IsEqualToAny` matches any listed value; `IsNotEqualToAny` excludes every listed value. Text equality is case-sensitive; other text predicates ignore case. `DateTime` and `ChangeSource` aren't filterable.

`ItemChanged` filters support only Account, Campaign, Ad group, Ad, and Keyword. AdGroup is also accepted for Ad group; matching is case-insensitive. Other returned categories, such as Asset Group or Responsive search ad, cannot be used as `ItemChanged` filter values. Use the returned property label for `AttributeChanged`, such as Pause status. `HowChanged` accepts Added, Removed, or Changed.

Rows without a campaign or ad group are filtered as if their `CampaignId` or `AdGroupId` were 0, so upper-bound or exclusion filters can include them. To exclude those rows, add `IsGreaterThan: 0` or `IsNotEqualTo: 0` on the same ID field.

### Required Parameters

`CustomerId` and `AccountId` are required. This tool uses `DateRange` instead of `PerformanceDateRange` and doesn't support `Sorting`.

`DateRange` defaults to the last 30 days. Specify either a `Preset`, such as `LastSevenDays`, or both inclusive `StartDate` and `EndDate` in YYYY-MM-DD format. Custom dates must fall entirely between 180 days before today and today in UTC; unavailable ranges are rejected, not clipped.

`ReportTimeZone` controls relative preset boundaries and defaults to `PacificTimeUSCanadaTijuana`. It doesn't change explicit custom dates or convert returned `DateTime` values, whose timezone is unspecified.

### Returned Data

- `DateTime`, `CampaignName`, and `AdGroupName`
- `ChangedBy` and `ChangeSource`
- `ItemChanged`, `EntityName`, and `EntityId`
- `AttributeChanged`, `HowChanged`, `OldValue`, and `NewValue`

`ChangedBy` can identify a user, application, or system actor. `ChangeSource` is a coarse tool or source category, not proof of a human actor. Previous values may be absent or blank.

The response contains `Entities`, `TotalCount`, and `NextPageToken`. `TotalCount` counts matching attribute-change rows, not distinct edits. `PageSize` defaults to 20 and accepts 10 through 100. To continue, resend the unchanged request with `nextPageToken` as a separate argument until `NextPageToken` is null. Paging is best-effort; don't use timestamps as unique identifiers or assume a stable order for rows with equal timestamps.

#### Example

```json
{
  "name": "get_change_history",
  "arguments": {
    "request": {
      "CustomerId": 1234567,
      "AccountId": 7654321,
      "DateRange": {
        "Preset": "LastSevenDays"
      },
      "Filter": {
        "CampaignId": {
          "IsEqualTo": 9876543
        },
        "ItemChanged": {
          "IsEqualToAny": ["Ad group"]
        }
      },
      "PageSize": 20
    }
  }
}
```

---

## Performance Metrics

For most entity tools, performance metrics are returned only when a `PerformanceDateRange` is provided. `GetAssets` defaults to the last 30 days when this property is omitted; its metric limitations are described above. `GetChangeHistory` returns change records, not performance metrics.

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

Use MCP tools to retrieve Microsoft Advertising account structure, campaign hierarchy, performance metrics, creatives, keywords, audiences, Performance Max assets, and change history. Entity tools share request and response patterns; `GetChangeHistory` uses its own request structure as described above.
