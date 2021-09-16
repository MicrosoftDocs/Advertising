---
title: "Campaign script examples"
description: "Shows examples that perform various actions against campaigns."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Script examples for managing campaigns

The following sections show examples of scripts that perform various actions against campaigns.


## Get all campaigns

To get all campaigns in an account, first call the [AdsApp](../reference/AdsApp.md) object's `campaigns` method to get the [selector](../reference/CampaignSelector.md). Then, call the selector's `get` method get an [iterator](../reference/CampaignIterator.md) that you use to iterate through the list of campaigns. Since the example doesn't specify any filters, the selector returns all campaigns in the account. To determine the number of campaigns in the iterator, call the iterator's `totalNumEntities` method.


```javascript
function main() {
    // Gets all campaigns in the account.
    var iterator = AdsApp.campaigns().get();

    // Iterates through the list of campaigns and logs 
    // each campaign's name.
    while (iterator.hasNext()) {
        var campaign = iterator.next();
    }
}
```

## Get a campaign by name

To get a campaign by name, first call the [AdsApp](../reference/AdsApp.md) object's `campaigns` method to get the [selector](../reference/CampaignSelector.md). The selector contains a number of filter methods that you use to filter the list of campaigns. Use the `withCondition` method to filter the campaigns for a specific campaign name. Note that the operands and operators are case sensitive.

Next, call the selector's `get` method to get the [iterator](../reference/AdGroupIterator.md). Campaign names are unique, so you'll get back only one, if it exists. 


```javascript
function main() {
    var campaignName = 'CAMPAIGN NAME GOES HERE';

    var iterator = AdsApp.campaigns()
        .withCondition(`Name = '${campaignName}'`)
        .get();

    while (iterator.hasNext()) {
        var campaign = iterator.next();
    }
}
```

### Get campaign by ID

If you have access to the campaign's ID, use it instead. Using IDs to get entities provides better performance. Instead of using the `withCondition` filter method, use the `withIds` method. For example, `withIds(['12345'])`.


```javascript
function main() {
    var campaignId = '12345';

    var iterator = AdsApp.campaigns()
        .withIds([campaignId])
        .get();

    while (iterator.hasNext()) {
        var campaign = iterator.next();
    }
}
```


## Get a campaign's performance data

To get a campaign's performance metrics, call the campaign's [getStats](../reference/Campaign.md#getstats) method. When you get the campaign, you need to specify the date range of the metrics data you want. You can specify the date range using a predefined literal, such as LAST_MONTH or TODAY, or a start and end date. To specify the date range, use one of the `forDateRange` methods when you select the campaign (see [CampaignSelector](../reference/CampaignSelector.md)). 

For a list of metrics you can access, see the [Stats](../reference/Stats.md) object.


```javascript
function main() {
    var campaignId = '12345';

    // Get the campaign. You need to specify the date range of the
    // performance data you want to get.
    var iterator = AdsApp.campaigns()
        .withIds([campaignId])
        .forDateRange('LAST_WEEK')
        .get();

    // If the campaign is found, log some metrics.
    while (iterator.hasNext()) {
        var campaign = iterator.next();
        var metrics = campaign.getStats(); // Gets the performance metrics.
    }
}
```

## Pause a campaign

To pause a campaign, call the campaign's `pause` method. To enable it again, call the campaign's `enable` method. To determine the status of the campaign, call the campaign's `isEnabled`, `isPaused`, and `isRemoved` methods.


```javascript
function main() {
    var campaignId = '12345';

    var iterator = AdsApp.campaigns()
        .withIds([campaignId])
        .get();

    // If the campaign is found, pause it.
    while (iterator.hasNext()) {
        var campaign = iterator.next();
        campaign.pause();
    }
}
```

<!--
## Get a campaign's device bid modifiers
```javascript
function getCampaignBidModifiers() {
  var campaignName = 'YOUR CAMPAIGN NAME';
  var campaignIterator = AdsApp.campaigns()
      .withCondition('Name = "' + campaignName + '"')
      .get();
  if (campaignIterator.hasNext()) {
    var campaign = campaignIterator.next();
    Logger.log('Campaign name: ' + campaign.getName());

    var platformIterator = campaign.targeting().platforms().get();
    while (platformIterator.hasNext()) {
      var platform = platformIterator.next();
      Logger.log(platform.getName() + ' bid modifier: ' +
          platform.getBidModifier());
    }
  }
```
-->
