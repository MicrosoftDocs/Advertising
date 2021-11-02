---
title: "Microsoft Advertising Scripts Selectors"
description: "Describes how selectors work in Microsoft Advertising Scripts."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# What are selectors?

Selectors let you apply filter and sort criteria when retrieving Microsoft Advertising entities such as keywords and campaigns.  Selectors provide functionality roughly equivalent to SQL `WHERE` and `ORDER BY` clauses. Selectors include the following methods:

- **withCondition()** &mdash; Use to specify conditions that entities must meet to be selected. This is equivalent to a SQL `WHERE` clause.  
  
  Example: `withCondition('Name STARTS_WITH "Contoso"')`  
  
  You may apply one or more conditions to a selector. Specifying multiple conditions is considered an AND operation. For example, the entity is selected only if condition A is true AND condition B is true. 
  
- **withIds()** &mdash; Use to specify the IDs of entities to select. This is equivalent to a SQL `IN` clause.  
  
  Example: `withIds(["1","2","3","4"])`  

- **forDateRange()** &mdash; Use to return entities with performance data that match the specified date range. If a condition specifies a metric column, you must include `forDateRange` in the selector's chain.  
  
  Example: `forDateRange("LAST_14_DAYS")`  

- **orderBy()** &mdash; Use to order the entities that the selector returns by a specified field. This is equivalent to a SQL `ORDER BY` clause.  
  
  Example: `orderBy("Clicks DESC")`  

- **withLimit()** &mdash; Use to return at most the specified number of entities. This is equivalent to a SQL `TOP` clause.  
  
  Example: `withLimit(50)`  

Because each method returns the selector with the filter criteria applied, you may chain together (using dot notation) multiple conditions to refine the filter criteria. For example:

```javascript
var selector = AdsApp.campaigns()
    .withCondition("ClickConversionRate > 0.5")
    .withCondition("Cost > 4.0")
    .forDateRange("LAST_WEEK")
    .withLimit(10);
```

To improve script performance, use specific filter conditions to ensure that you retrieve only the entities you want. After getting the selector, call the `get()` method to retrieve an iterator that you use to iterate through the list of entities.

```javascript
var campaigns = selector.get();
```

Or 

```javascript
var campaigns = AdsApp.campaigns()
    .withCondition("ClickConversionRate > 0.5")
    .withCondition("Cost > 4.0")
    .forDateRange("LAST_WEEK")
    .withLimit(10)
    .get();
```


The following is the list of selectors.

- [AdGroupSelector](../reference/AdGroupSelector.md)
- [AdParamSelector](../reference/AdParamSelector.md)
- [AdSelector](../reference/AdSelector.md)
- [BingAdsAccountSelector](../reference/BingAdsAccountSelector.md)
- [BudgetSelector](../reference/BudgetSelector.md)
- [CampaignSelector](../reference/CampaignSelector.md)
- [ExcludedLocationSelector](../reference/ExcludedLocationSelector.md)
- [KeywordSelector](../reference/KeywordSelector.md)
- [NegativeKeywordListSelector](../reference/NegativeKeywordListSelector.md)
- [ProductGroupSelector](../reference/ProductGroupSelector.md)
- [TargetedLocationSelector](../reference/TargetedLocationSelector.md)

### Next steps

> [!div class="nextstepaction"]
> [Learn about iterators](./iterators.md)
