---
title: "AdGroupExcludedAudienceSelector object"
description: "Contains the methods for filtering the list of ad group excluded audiences to return."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdGroupExcludedAudienceSelector

Contains the methods for filtering and sorting a list of ad group excluded audiences. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    // Gets the iterator that iterates all ad group excluded audiences
    // in the account.
    var iterator = AdsApp.adGroups().get();

    // Loops through all ad groups in the account.
    while (iterator.hasNext()) {
        var adGroup = iterator.next();

        // Gets the iterator that iterates all ad group excluded audiences
        // in the ad group excluded audience.
        var audienceIterator = adGroup.targeting().audiences()
            .withLimit(10)
            .withIds("123456789")
            .get();
    
        // Loops through all ad group excluded audiences in the ad group excluded audience.
        while (audienceIterator.hasNext()) {
            var audience = audienceIterator.next();
        }
    }
```

## Methods

|Method Name|Return Type|Description|
|-|-|-
[get](#get)|[AdGroupExcludedAudienceIterator](./AdGroupExcludedAudienceIterator.md)|Gets an iterator used to iterate through the list of ad group excluded audiences.
[orderBy(string orderBy)](#orderby-string-orderby-)|[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|Applies the specified ordering to the selected ad group excluded audiences.
[withCondition(string condition)](#withcondition-string-condition-)|[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|Applies filter criteria to the ad group excluded audiences.
[withIds(string[] ids)](#withids-string-ids-)|[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|Gets ad group excluded audiences with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|Gets the top *n* ad group excluded audiences that match the selection criteria.

## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of ad group excluded audiences.

### Returns
|Type|Description|
|-|-
[AdGroupExcludedAudienceIterator](./AdGroupExcludedAudienceIterator.md)|An iterator used to iterate through the selected ad group excluded audiences.

## <a name="orderby-string-orderby-"></a>orderBy(String orderBy)
Applies the specified ordering to the selected ad group excluded audiences. 

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-audience-columns). 
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns ad group excluded audiences in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`


[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]


### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the ad group excluded audiences.

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported Columns](#supported-audience-columns). 
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-audience-columns"></a>
### Supported Columns

Supported columns for ad group excluded audience filtering. The names are case sensitive. 

The following are the entity properties you may specify.

|Column|Type|Example|
|-|-|-
AdGroupName|string|The name of the association's ad group.<br /><br />`withCondition("AdGroupName CONTAINS_IGNORE_CASE 'truck'")`
AdGroupStatus|enumeration|The status of the association's ad group. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only ad group excluded audiences whose parent ad group is paused.<br /><br />`withCondition("AdGroupStatus = PAUSED")`
AudienceId|long|The associated audience's ID.<br /><br />`withCondition("AudienceId = 123456789")`
CampaignName|string|The name of the campaign that contains the association's ad group.<br /><br />`withCondition("CampaignName CONTAINS_IGNORE_CASE 'truck'")`
CampaignStatus|enumeration|The status of the campaign that contains the association's ad group. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only ad group excluded audiences whose parent campaign is paused.<br /><br />`withCondition("CampaignStatus = PAUSED")`
Status|enumeration|The association's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>This example returns only enabled ad group excluded audiences.<br /><br />`withCondition("Status = ENABLED")`
UserListName|string|The associated audience's name.<br /><br />`withCondition("UserListName = 'foo'")`


### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to apply to the selector.

### Returns
|Type|Description|
|-|-
[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets ad group excluded audiences with the specified IDs. 

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only ad group excluded audience 33333.

```javascript
var selector = AdsApp.adGroups()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of ad group excluded audience IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* ad group excluded audiences that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of ad group excluded audiences to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[AdGroupExcludedAudienceSelector](./AdGroupExcludedAudienceSelector.md)|Selector with limit applied.


