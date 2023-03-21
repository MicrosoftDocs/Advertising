---
title: "Microsoft Ads Scripts single account access"
description: "Provides an overview of how you use AdsApp to access a single account's entities."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Single account access

If you want to access a single user account, everything starts with the [AdsApp](../reference/AdsApp.md) object.  

## How do I access the entities in my account?

Use `AdsApp` to access all entities in the account. The object contains a selector method for each type of entity (for example, campaigns, ad groups, and keywords). The selector method returns all entities for that entity type. For example, to get all the ad groups in the account, call the `adGroups()` method.

```javascript
    var iterator = AdsApp.adGroups().get();
```

### But what if I want a specific entity or subset of entities?

The selector provides different ways to filter the list of entities. You can use the selector's `withIds()` method to get specific entities by IDs or you can use `withCondition()` to specify the selection criteria for selecting the entities. The selectors for all entity types, except for negative keyword lists, provide the ability to filter the list of entities.

Use dot notation to string multiple filters together. If you specify multiple filters, they're treated as an AND operation &mdash; the selector returns only those entities that match all the conditions. 

To get all ad groups in a campaign, use the `withCondition()` method to specify the campaign's name.

```javascript
    var campaignName = 'My Campaign';
    var iterator = AdsApp.adGroups()
        .withCondition(`CampaignName = '${campaignName}'`)
        .get();
```

For a list of conditions and operators that you can use to filter the list of entities, see the selector's `withCondition()` method. For example, for a list of ad group conditions, see the ad group selector's [withCondition](../reference/AdGroupSelector.md#withcondition-string-condition-) method.

To get an ad group by ID, use the `withIds()` method to specify the ad group to get.

```javascript
    var ids = ["123456789"];
    var iterator = AdsApp.adGroups()
        .withIds(ids)
        .get();
```

Or, you can get the ad group by name.

```javascript
    var campaignName = 'My Campaign';
    var adGroupName = 'My AdGroup';
    var iterator = AdsApp.adGroups()
        .withCondition(`CampaignName = '${campaignName}'`)
        .withCondition(`Name = '${adGroupName}'`)
        .get();
```

For more information about selectors, see [What are selectors?](../concepts/selectors.md)


### How do I use the selector to iterate through the filtered list of entities?

You don't. The selector just defines the entities you want to get. To actually get the entities, you use an iterator. To get the iterator, you call the selector's `get()` method.

```javascript
    var ids = ["123456789"];
    var iterator = AdsApp.adGroups()
        .withIds(ids)
        .get();
```

Use a simple **while** loop to iterate over the list of entities.

```javascript
    while (iterator.hasNext()) {
        var adGroup = iterator.next();
        
        // Do something with the entity
    }
```

For more information about iterators, see [What are iterators?](../concepts/iterators.md)


### How do I get performance data for an entity?

Most entities let you request performance data, if available. But first you need to tell Scripts the date range for the performance data when you specify the selector. To specify a date range, use a predefined literal, such as YESTERDAY or LAST_MONTH, or use a start and end date. For more information, see [forDateRange(string dateRange)](../reference/AdGroupSelector.md#fordaterange-string-daterange-) and [forDateRange(Object dateFrom, Object dateTo)](../reference/AdGroupSelector.md#fordaterange-object-datefrom-object-dateto-).

```javascript
    var campaignName = 'My Campaign';
    var adGroupName = 'My AdGroup';
    var iterator = AdsApp.adGroups()
        .forDateRange('LAST_30_DAYS')
        .withCondition(`CampaignName = '${campaignName}'`)
        .withCondition(`Name = '${adGroupName}'`)
        .get();

    while (iterator.hasNext()) {
        var adGroup = iterator.next();
        var stats = adGroup.getStats();
    }
```


You also need to specify a date range if you specify a performance data column in a selector's `withCondition()` method. For example, if you want only ad groups that have a CTR of greater than .22 percent, you need to specify a date range.

```javascript
    var startDate = {year: 2018, month: 6, day: 3};
    var endDate = {year: 2018, month: 6, day: 13};

    var iterator = AdsApp.adGroups()
        .forDateRange(startDate, endDate)
        .withCondition("Ctr > 0.22")
        .get();
```


## How do I add an entity?

To add an entity, you use a builder object. To get a builder object, call the **new*** method on the parent object that you're adding children to. For example, to add ad groups to a campaign, call the campaign's `newAdGroupBuilder()` method.

The builder object contains methods for setting all the object's properties that you're allowed to specify. It also includes a `build()` method that you use to create the entity. The following shows how to build an ad group. (For information about how to get a campaign object, see [Get a campaign by name](../examples/campaigns.md#get-a-campaign-by-name).)

```javascript
        var adGroupName = "My ad group";
        var endDate = {year: 2018, month: 6, day: 13};
        var customParameters = {key1: 'value1', key2: 'value2', key3: 'value3'};

        var adGroupOperation = campaign.newAdGroupBuilder()
            .withName(adGroupName)
            .withStatus('ENABLED')
            .withLanguage('English')
            .withBiddingStrategy('MANUAL_CPC')
            .withCpc(1.2)
            .withCustomParameters(customParameters)
            .withEndDate(endDate)
            .build();
```

The `build` method returns an operation object, which you can use to check whether Scripts successfully created the entity. The following shows the typical calling pattern. Call the `getResult` method only if you want to access the new entity's properties.

```javascript
    if (adGroupOperation.isSuccessful()) {
        var adGroup = adGroupOperation.getResult();

    }
    else {
        for (var error of adGroupOperation.getErrors()) {
            Logger.log(`${error}\n`);
        }
    }
```

For more details about builders and performance considerations when calling the operation methods, see [What are builders?](../concepts/builders.md)

## How do I update an entity?

After using a builder object to add an entity, you use the entity's methods to update its properties. The following example updates the ad group's CPC bid amount.

```javascript
    var ids = ["123456789"];
    var adGroups = AdsApp.adGroups()
        .withIds(ids)
        .get();

    if (adGroups.hasNext()) {
        var adGroup = adGroups.next();
        adGroup.bidding().setCpc(2.5);
    }
```

### But how do I know that the update worked?

If you try to update a property with an invalid value, Scripts writes an error to the Change log but it doesn't throw an exception, so your script continues executing. Don't get the property after updating it to check if the property contains the new value; doing this negatively affects performance.

```javascript
function main() {
    var id = "123456789";
    var bidAmount = -2.5;  
    var keyword = getKeyword(id); 

    if (keyword != null) {
        keyword.bidding().setCpc(bidAmount);  // Bid is not set because bid amount is not valid
    }

}

function getKeyword(id) {
    var keywords = AdsApp.keywords()
        .withIds([id])
        .get();

    if (keywords.hasNext()) {
        return keywords.next();
    }
    else {
        return null;
    }    
}
```

## Writing to the log file

Scripts provides a log file for you to write tracing and debug information to. For information, see [Change logs and text logs](../concepts/change-and-text-logs.md).


## Next steps

> [!div class="nextstepaction"]
> [Get Started](../get-started.md)
