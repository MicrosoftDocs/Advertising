---
title: "Ad group script examples"
description: "Shows examples that perform various actions against ad groups."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Script examples for managing ad groups

The following sections show examples of scripts that perform various actions against ad groups.


## Add ad groups

To add an ad group, first get the campaign to add the ad group to. Use the [CampaignSelector](../reference/CampaignSelector.md) object to select the campaign. Using the `withIds` method provides better performance than passing the campaign's name in the `withCondition` method.

Next, call the campaign's [newAdGroupBuilder](../reference/Campaign.md#newadgroupbuilder) method to get a builder that you use to specify the ad group's properties. The only required property is the ad group's name (see the `withName` method), which must be unique within the campaign. If you don't specify a CPC value, it defaults to the minimum bid amount for your account's currency. You only need to specify language if the campaign doesn't specify it; otherwise, it inherits the campaign's language value. By default, the ad group's status is paused.

Calling the builder's `build` method creates the ad group asynchronously; Scripts adds the ad group at some point before the script terminates or if you call one of the build operation's methods. For information about this process, see [What is a builder?](../concepts/builders.md)


```javascript
function main() {
    // The ID of the campaign to add the ad groups to.
    // IDs in Scripts are string integers.
    var campaignId = 'CAMPAIGN ID GOES HERE';  
    var campaign = getCampaign(campaignId);

    // Ad groups to add.
    var adGroups = [];
    adGroups.push({
        name : 'AD GROUP NAME GOES HERE',
        cpc : 2.25,
        language : 'English' // Required if the campaign doesn't specify a language
    });
    adGroups.push({
        name : 'AD GROUP NAME GOES HERE',
        cpc : 1.25,
        language : 'English' // Required if the campaign doesn't specify a language
    });

    var operations = [];

    if (campaign != null)
    {
        for (var adGroup of adGroups) {
            var operation = addAdGroup(
                campaign, 
                adGroup.name, 
                adGroup.cpc, 
                adGroup.language);
            operations.push(operation);
        }
    }
    else {
        Logger.log("Unable to retrieve campaign, " + campaignId);
    }

    checkBuildStatus(operations, adGroups);
}

// Get the campaign using its ID.
function getCampaign(id) {
    var iterator = AdsApp.campaigns()
        .withIds([id])
        .get();

    // Return the campaign if it exists; otherwise, null.
    if (iterator.hasNext()) {
        return iterator.next();
    }
    else {
        return null;
    }
}

// Add the ad group to the specified campaign.
// Returns the builder's operation object, which you use to 
// check the status of the add operation.
function addAdGroup(campaign, name, cpc, language) {

    return campaign.newAdGroupBuilder()
        .withName(name)
        .withCpc(cpc)
        .withLanguage(language)
        .build();
}

// Check the ad group's build status.
function checkBuildStatus(operations, adGroups) {

    for (var i = 0; i < operations.length; i++) {
        if (!operations[i].isSuccessful()) {
            for (var error of operations[i].getErrors()) {
                Logger.log(`Failed to add, ${adGroups[i].name}. Error: ${error}`);
            }
        }
    }
}
```

## Get all ad groups

To get all ad groups in an account, first call the [AdsApp](../reference/AdsApp.md) object's `adGroups` method to get the [selector](../reference/AdGroupSelector.md). Then, call the selector's `get` method to get an [iterator](../reference/AdGroupIterator.md) that you use to iterate through the list of ad groups. Since the example doesn't specify any filters, the selector returns all ad groups in the account. To determine the number of ad groups in the iterator, call the iterator's `totalNumEntities` method.

```javascript
function main() {
    // Gets all ad groups in the account.
    var iterator = AdsApp.adGroups().get();
    
    // Iterates through the list of ad groups and logs 
    // each ad group's name.
    while (iterator.hasNext()) {
        var adGroup = iterator.next();
    }
}
```

## Get an ad group by name

To get an ad group by name, first call the [AdsApp](../reference/AdsApp.md) object's `adGroups` method to get the [selector](../reference/AdGroupSelector.md). The selector contains a number of filter methods that you use to filter the list of ad groups. Use the `withCondition` method to filter the ad groups for a specific ad group name. Note that the operands and operators are case sensitive.

Next, call the selector's `get` method to get the [iterator](../reference/AdGroupIterator.md). Ad group names within a campaign are unique but it is possible for multiple campaigns to have ad groups with the same name. Because of this, if you filter only by name, the iterator may contain more than one ad group. 

If you want to get an ad group by name from a specific campaign, include a `withCondition` method that specifies the campaign's name (`CampaignName = '<campaignnamegoeshere>'`).


```javascript
function main() {
    // The name of the ad group to get.
    var adGroupName = 'AD GROUP NAME GOES HERE';

    // Get the ad groups with the specified name.
    var iterator = AdsApp.adGroups()
          .withCondition(`Name = '${adGroupName}'`)
          .get();

    // Need a loop because multiple campaigns can have 
    // an ad group with the same name.
    while (iterator.hasNext()) {
        var adGroup = iterator.next();
    }
}
```

### Get ad group by ID

If you have access to the ad group's ID, use it instead. Using IDs to get entities provides better performance. Instead of using the `withCondition` filter method, use the `withIds` method. For example, `withIds(['12345'])`.


```javascript
function main() {
    var adGroupId = '12345';

    var iterator = AdsApp.adGroups()
        .withIds([adGroupId])
        .get();

    if (iterator.hasNext()) {
        var adGroup = iterator.next();
    }
}
```


### Get ad group by name from a specific campaign

```javascript
function main() {
    var adGroupName = 'AD GROUP NAME GOES HERE';
    var campaignName = "CAMPAIGN NAME GOES HERE";

    var iterator = AdsApp.adGroups()
        .withCondition(`Name = '${adGroupName}'`)
        .withCondition(`CampaignName = '${campaignName}'`)
        .get();

    if (iterator.hasNext()) {
        var adGroup = iterator.next();
    }
}
```



## Get an ad group's performance data

To get an ad group's performance metrics, call the ad group's [getStats](../reference/AdGroup.md#getstats) method. When you get the ad group, you need to specify the date range of the metrics data you want. You can specify the date range using a predefined literal, such as LAST_MONTH or TODAY, or a start and end date. To specify the date range, use one of the `forDateRange` methods when you select the ad group (see [AdGroupSelector](../reference/AdGroupSelector.md)). 

For a list of metrics you can access, see the [Stats](../reference/Stats.md) object.

```javascript
function main() {
    var campaignName = 'CAMPAIGN NAME GOES HERE';
    var adGroupName = 'AD GROUP NAME GOES HERE';

    // Get the ad group. You need to specify the date range of the
    // performance data you want to get.
    var iterator = AdsApp.adGroups()
        .forDateRange('LAST_WEEK')
        .withCondition(`Name = '${adGroupName}'`)
        .withCondition(`CampaignName = '${campaignName}'`)
        .get();
    
    // If the ad group is found, log some metrics.
    if (iterator.hasNext()) {
        var adGroup = iterator.next();
        var metrics = adGroup.getStats(); // Gets the performance metrics.
    }
}
```

## Pause an ad group

When you add an ad group, its status is Paused by default. To enable the ad group, call the ad group's `enable` method. To change the ad group's status to Paused, call the ad group's `pause` method. To determine the status of the ad group, call the ad group's `isEnabled`, `isPaused`, and `isRemoved` methods.

```javascript
function main() {
    var campaignName = 'CAMPAIGN NAME GOES HERE';
    var adGroupName = 'AD GROUP NAME GOES HERE';

    // Get the ad group. 
    var iterator = AdsApp.adGroups()
        .withCondition(`Name = '${adGroupName}'`)
        .withCondition(`CampaignName = '${campaignName}'`)
        .get();

    if (iterator.hasNext()) {
        var adGroup = iterator.next();
        adGroup.pause();
    }
}
```
