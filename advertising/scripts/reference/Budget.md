---
title: "Budget object"
description: "Contains the methods for managing the budget."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Budget

Contains the methods for managing a budget. For more information, see [Budget](/advertising/guides/entity-hierarchy-limits#budget).

## Methods

|Method Name|Return Type|Description|
|-|-|-
[campaigns](#campaigns)|[CampaignSelector](./CampaignSelector.md)|Gets a selector used to filter the list of campaigns that share this budget.
[getAmount](#getamount)|double|Gets the budget's amount.
[getDeliveryMethod](#getdeliverymethod)|string|Gets the delivery method (budget type) for this budget.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getId](#getid)|string|Gets the ID that uniquely identifies this shared budget.
[getName](#getname)|string|Gets this shared budget's name.
[getStats](#getstats)|[Stats](Stats.md)|Gets the performance data for the campaigns that share this budget.
[getType](#gettype)|string|Gets this budget's type.
[isExplicitlyShared](#isexplicitlyshared)|Boolean|Gets a Boolean value that indicates whether this budget is a shared budget.
[setAmount(double amount)](#setamount-double-amount-)|void|Sets the budget to the specified amount.
[setDeliveryMethod(String method)](#setdeliverymethod-string-method-)|void|Sets the delivery method for this budget.


## <a name="campaigns"></a>campaigns

Gets a [selector](../concepts/selectors.md) used to filter the list of campaigns that share this budget. 

Call this method only from a budget object retrieved using [BudgetSelector](BudgetSelector.md); you may not call it if you retrieved the budget using the campaign's [getBudget](Campaign.md#getbudget) method.

### Returns

|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|A selector used to filter the list of campaigns that share this budget. 


## <a name="getamount"></a>getAmount
Gets the budget's amount.

### Returns
|Type|Description|
|-|-
double|The budget, in the account's currency.


## <a name="getdeliverymethod"></a>getDeliveryMethod
Gets the budget's delivery method (budget type). 

### Returns
|Type|Description|
|-|-
string|The budget's delivery method. Possible values are:<br /><ul><li>STANDARD</li><li>ACCELERATED</li></ul>For more information, see [What are my budget options?](https://help.ads.microsoft.com/#apex/3/en/51006/1)


## <a name="getentitytype"></a>getEntityType
Gets this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *Budget*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this shared budget.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this shared budget. Returns null if the budget is not a shared budget.


## <a name="getname"></a>getName
Gets this shared budget's name.

### Returns:
|Type|Description|
|-|-
string|The shared budget's name. Returns null if the budget is not a shared budget.


## <a name="gettype"></a>getType
Gets this budget's type.

### Returns:
|Type|Description|
|-|-
string|The budget's type. The following are the possible types.<ul><li>DAILY</li></ul>


## <a name="getstats"></a>getStats
Gets the performance data for for campaigns that share this budget. 

Performance data is available for shared budgets only. To call this method, you must include the [forDateRange(String dateRange)](BudgetSelector.md#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](BudgetSelector.md#fordaterange-object-datefrom-object-dateto-) method in the budget selector's chain. 

### Returns:
|Type|Description|
|-|-
[Stats](Stats.md)|The performance data for campaigns that share this budget. Returns null if the budget is not a shared budget.


## <a name="isexplicitlyshared"></a>isExplicitlyShared
Gets a Boolean value that indicates whether this budget is a shared budget.

The campaigns and the budget they share must be in the same account. Sharing a budget can help fully utilize the budget. For example, if campaign A had its own $10 budget and campaign B had its own $10 budget, it's possible that campaign A may spend only $8 of its budget. But because campaign B is performing well, it spent all of its budget and could have spent more. If the campaigns shared a budget, campaign B would automatically use the $2 that campaign A didn't use, increasing the chance that more traffic is sent your way.

### Returns:
|Type|Description|
|-|-
Boolean|Is **true** if the budget is meant to be shared by multiple campaigns; otherwise, **false**.


## <a name="setamount-double-amount-"></a>setAmount(double amount)
Sets the budget's amount.

To update a shared budget, you must get the budget using [BudgetSelector](./BudgetSelector.md) and [BudgetIterator](./BudgetIterator.md). Setting the budget's amount fails if you get the budget using the [Campaign](./Campaign.md) entity's `getBudget` method.

### Arguments
|Name|Type|Description|
|-|-|-
amount|double|The budget, in the account's currency.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setdeliverymethod-string-method-"></a>setDeliveryMethod(string method)
Sets the budget's delivery method. 

### Arguments
|Name|Type|Description|
|-|-|-
method|string|The budget's delivery method. Possible case-sensitive values are:<ul><li>STANDARD</li><li>ACCELERATED</li></ul>For more information, see [What are my budget options?](https://help.ads.microsoft.com/#apex/3/en/51006/1)

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## See also

[Campaign.getBudget()](Campaign.md#getbudget)
[BudgetIterator.next()](BudgetIterator.md#next)
