---
title: "Shared budget script examples"
description: "Shows examples that perform various actions against shared budgets."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Script examples for managing shared budgets

The following sections show examples of scripts that perform various actions against [shared budgets](../concepts/shared-budgets.md).


## Add shared budgets

To add a shared budget, you must use the Microsoft Advertising web application. For details, see [How do I share a budget across multiple campaigns?](https://help.ads.microsoft.com/#apex/3/en/56814/1)


## Associate a campaign with a shared budget

To associate a campaign with a shared budget, you must use the Microsoft Advertising web application. For details, see [How do I share a budget across multiple campaigns?](https://help.ads.microsoft.com/#apex/3/en/56814/1)


## Get all shared budgets

To get all shared budgets in an account, first call the [AdsApp](../reference/AdsApp.md) object's `budgets` method to get the [selector](../reference/BudgetSelector.md). Then, call the selector's `get` method to get an [iterator](../reference/BudgetIterator.md) that you use to iterate through the list of Shared budgets. Since the example doesn't specify any filters, the selector returns all shared budgets in the account. To determine the number of shared budgets in the iterator, call the iterator's `totalNumEntities` method.

> [!NOTE]
> Shared budgets doesn't include unshared (individual campaign) budgets.

```javascript
function main() {
    // Gets all shared budgets in the account.
    var iterator = AdsApp.budgets().get();
    
    // Iterates through the list of shared budgets and logs 
    // each budgets's name and amount.
    while (iterator.hasNext()) {
        var budget = iterator.next();
    }
}
```

## Get a shared budget by name

To get a shared budget by name, first call the [AdsApp](../reference/AdsApp.md) object's `budgets` method to get the [selector](../reference/BudgetSelector.md). The selector contains a number of filter methods that you use to filter the list of budgets. Use the `withCondition` method to filter the budgets by name. For example, to filter the list for a specific name, use: `withCondition("BudgetName = '<budgetnamegoeshere>'")`. To filter the list by a partial name, use: `withCondition("BudgetName CONTAINS_IGNORE_CASE '<partialnamegoeshere>'")`. Note that the operands and operators are case sensitive.

Next, call the selector's `get` method to get the [iterator](../reference/BudgetIterator.md). 


```javascript
function main() {
    // Partial name of the shared budget to get.
    var budgetName = 'PARTIAL NAME GOES HERE';

    // Get the budgets that contain the partial name.
    var iterator = AdsApp.budgets()
          .withCondition(`BudgetName CONTAINS_IGNORE_CASE '${budgetName}'`)
          .get();

    // Iterates through the list of shared budgets and logs 
    // each budget's name and amount.
    while (iterator.hasNext()) {
        var budget = iterator.next();
    }
}
```

## Get shared budgets by ID

If you have access to the shared budget's ID, use it instead. Using IDs to get entities provides better performance. Instead of using the `withCondition` filter method, use the `withIds` method. For example, `withIds(['12345'])`.


```javascript
function main() {
    var sharedBudgetId = '12345';

    var iterator = AdsApp.budgets()
        .withIds([sharedBudgetId])
        .get();

    while (iterator.hasNext()) {
        var budget = iterator.next();
    }
}
```


## Get all campaigns that share the budget

To get all the campaigns that share the budget, call budget's [campaigns](../reference/Budget.md#campaigns) method. You can call this method only from a [Budget](../reference/Budget.md) object that you get from [BudgetSelector](../reference/BudgetSelector.md); you cannot call it if the source of the budget is the campaign's [getBudget](../reference/Campaign.md#getbudget) method.



```javascript
function main() {
    var sharedBudgetId = '12345';

    var budgets = AdsApp.budgets()
        .withIds([sharedBudgetId])
        .get();

    while (budgets.hasNext()) {
        var budget = budgets.next();

        var campaigns = budget.campaigns().get();

        while (campaigns.hasNext()) {
            var campaign = campaigns.next();
        }
    }
}
```



## Get a shared budget's performance data

To get a shared budget's performance metrics, call the budget's [getStats](../reference/Budget.md#getstats) method. When you get the list of share budgets, you need to specify the date range of the metrics data you want. You can specify the date range using a predefined literal, such as LAST_MONTH or TODAY, or a start and end date. To specify the date range, use one of the `forDateRange` methods when you select the budgets (see [BudgetSelector](../reference/BudgetSelector.md)). 

For a list of metrics you can access, see the [Stats](../reference/Stats.md) object. The metrics are the aggregation of all campaigns that share the budget.

```javascript
function main() {
    var sharedBudgetId = '12345';

    // Get the shared budget. You need to specify the date range of the
    // performance data you want to get.
    var budgets = AdsApp.budgets()
        .forDateRange('LAST_WEEK')
        .withIds([sharedBudgetId])
        .get();
    
    // If the budget is found, log some metrics.
    while (budgets.hasNext()) {
        var budget = budgets.next();
        var metrics = budget.getStats(); // Gets the performance metrics.
    }
}
```


