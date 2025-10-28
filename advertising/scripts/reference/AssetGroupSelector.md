---
title: "AssetGroupSelector object"
description: "Contains the methods for filtering the list of asset groups to return."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# AssetGroupSelector

Contains the methods for filtering and sorting a list of asset groups. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var iterator = Campaign.assetGroups()
        .withCondition("ClickConversionRate > 0.3")
        .forDateRange("LAST_WEEK")
        .orderBy("Clicks DESC")
        .get();

    while (iterator.hasNext()) {
        var assetGroup = iterator.next();
        var metrics = assetGroup.getStats();
    }
```

## Methods

|Method Name|Return Type|Description|
|-|-|-
[get](#get)|[AssetGroupIterator](./AssetGroupIterator.md)|Gets an iterator used to iterate through the list of asset groups.
[orderBy(string orderBy)](#orderby-string-orderby-)|[AssetGroupSelector](./AssetGroupSelector.md)|Applies the specified ordering to the selected asset groups.
[withCondition(string condition)](#withcondition-string-condition-)|[AssetGroupSelector](./AssetGroupSelector.md)|Applies filter criteria to the asset groups.
[withIds(string[] ids)](#withids-string-ids-)|[AssetGroupSelector](./AssetGroupSelector.md)|Gets asset groups with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[AssetGroupSelector](./AssetGroupSelector.md)|Gets the top *n* asset groups that match the selection criteria.

## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of asset groups.

### Returns
|Type|Description|
|-|-
[AssetGroupIterator](./AssetGroupIterator.md)|An iterator used to iterate through the selected asset groups.

## <a name="orderby-string-orderby-"></a>orderBy(String orderBy)
Applies the specified ordering to the selected asset groups. 

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-asset-group-columns). 
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns asset groups in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`


[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]


### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[AssetGroupSelector](./AssetGroupSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the asset groups.

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported Columns](#supported-asset-group-columns).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-asset-group-columns"></a>
### Supported Columns

Supported columns for asset group filtering. The names are case sensitive. 

The following are the performance metrics columns you may specify.

|Column|Type|Example|
|-|-|-
AbsoluteTopImpressionRate|double|`withCondition("AbsoluteTopImpressionRate > 0.25")`
AverageCpc|double|`withCondition("AverageCpc < 2.75")`
AverageCpm|double|`withCondition("AverageCpm > 0.65")`
ClickConversionRate|double|`withCondition("ClickConversionRate > 0.25")`
Clicks|long|`withCondition("Clicks >= 33")`
ConvertedClicks|long|`withCondition("ConvertedClicks >= 10")`
Cost|double|`withCondition("Cost > 3.25")`<br /><br />The cost is in the account's currency.
Ctr|double|`withCondition("Ctr > 0.05")`<br /><br />The CTR is in the range 0..1, so use 0.05 for a 5% CTR.
Impressions|long|`withCondition("Impressions > 10")`
TopImpressionRate|double|`withCondition("TopImpressionRate > 0.25")`

The following are the entity properties you may specify.

|Column|Type|Example|
|-|-|-
Status|enumeration|The asset group's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only enabled asset groups.<br /><br />`withCondition("Status = ENABLED")`
Name|string|The asset group's name.<br /><br />`withCondition("Name CONTAINS_IGNORE_CASE 'sport'")`
CampaignName|string|The campaign's name.<br /><br />`withCondition("CampaignName CONTAINS_IGNORE_CASE 'truck'")`
KeywordMaxCpc|double|The asset group's CPC bid. The bid is in the account's currency.<br /><br />`withCondition("KeywordMaxCpc > 5.0")`
CampaignStatus|enumeration|The campaign's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only asset groups whose parent campaign is paused.<br /><br />`withCondition("CampaignStatus = PAUSED")`
LabelNames|string set|A list of one or more case-sensitive label names. Use to get asset groups associated with the named labels.<br /><br />`withCondition("LabelNames  CONTAINS_ANY ['bar', 'foo']")`
CampaignType|enumeration|The campaign's type. Possible case-sensitive values are: <ul><li>SEARCH_AND_CONTENT</li><li>SHOPPING</li><li>DYNAMIC_SEARCH_ADS</li></ul>This example returns only asset groups whose parent campaign's type is Shopping.<br /><br />`withCondition("CampaignType = SHOPPING")`


### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to apply to the selector.

### Returns
|Type|Description|
|-|-
[AssetGroupSelector](./AssetGroupSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets asset groups with the specified IDs. 

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only asset group 33333.

```javascript
var selector = Campaign.assetGroups()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of asset group IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[AssetGroupSelector](./AssetGroupSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* asset groups that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of asset groups to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[AssetGroupSelector](./AssetGroupSelector.md)|Selector with limit applied.



## See also

[Campaign.assetGroups()](Campaign.md#assetgroups)
