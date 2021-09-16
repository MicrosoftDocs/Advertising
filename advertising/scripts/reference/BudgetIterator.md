---
title: "BudgetIterator object"
description: "Contains the methods for iterating through a list of shared budgets."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# BudgetIterator

Contains the methods for iterating through a list of shared budgets. For information about iterators, see [Iterators](../concepts/iterators.md).

Example usage:
```javascript
    // Gets the iterator that iterates all shared budgets
    // in the account.
    var iterator = AdsApp.budgets().get();

    // Loops through all shared budgets in the account.
    while (iterator.hasNext()) {
        var budget = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[hasNext](#hasnext)|Boolean|Gets a Boolean value that indicates whether the iterator has more elements.
[next](#next)|[Budget](./Budget.md)|Advances the iterator and returns the next shared budget.
[totalNumEntities](#totalnumentities)|int|Gets the number of shared budgets that matched the selector's selection criteria.

## <a name="hasnext"></a>hasNext
Gets a Boolean value that indicates whether the iterator has more elements.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if the iterator has more elements; otherwise, **false**.

## <a name="next"></a>next
Advances the iterator and returns the next shared budget.

### Returns
|Type|Description|
|-|-
[Budget](./Budget.md)|The next shared budget in the iterator.

## <a name="totalnumentities"></a>totalNumEntities
Gets the number of shared budgets that matched the selector's selection criteria. 

### Returns
|Type|Description|
|-|-
int|The number of shared budgets that matched the selector's selection criteria.



## See also
- [BudgetSelector.get()](./BudgetSelector.md#get)
- [Budget](./Budget.md)
