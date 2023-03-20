---
title: "Keyword script examples"
description: "Shows examples that perform various actions against keywords."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Script examples for managing keywords

The following sections show examples of scripts that perform various actions against keywords.


## Add keywords

To add a keyword, first get the ad group to add the keyword to. Use the [AdGroupSelector](../reference/AdGroupSelector.md) object to select the ad group. Using the `withIds` method provides better performance than passing the ad group's name in the `withCondition` method.

Next, call the ad group's [newKeywordBuilder](../reference/AdGroup.md#newkeywordbuilder) method to get a builder that you use to specify the keyword's properties. The only property you must specify is the keyword's text (see the `withText` method). The text should include the match type (quotes for phrase match type, square brackets for exact match type, nothing for broad match type). 

If you don't specify a CPC value, it defaults to the ad group's CPC value. By default, the keyword's status is enabled.

Calling the builder's `build` method creates the keyword asynchronously; Scripts adds the keyword at some point before the script terminates or if you call one of the build operation's methods. For information about this process, see [What is a builder?](../concepts/builders.md)



```javascript
function main() {
    // The ID of the ad group to add the keywords to.
    // IDs in Scripts are string integers.
    var adGroupId = 'AD GROUP ID GOES HERE';  
    var adGroup = getAdGroup(adGroupId);

    // Keywords to add. Update as appropriate.
    var keywords = [];
    keywords.push({
        text : "keyword 1",
        cpc : 1.25,
        finalUrl : 'http://www.example.com'
    });
    keywords.push({
        text : "keyword 2",
        cpc : 1.5,
        finalUrl : 'http://www.example.com'
    });

    var operations = [];

    if (adGroup != null)
    {
        for (var keyword of keywords) {
            var operation = addKeyword(
                adGroup, 
                keyword.text, 
                keyword.cpc, 
                keyword.finalUrl);
            operations.push(operation);
        }
    }
    else {
        Logger.log("Unable to retrieve ad group, " + adGroupId);
    }

    checkBuildStatus(operations, keywords);
}

// Get the ad group using its ID.
function getAdGroup(id) {
    var iterator = AdsApp.adGroups()
        .withIds([id])
        .get();

    // Return the ad group if it exists; otherwise, null.
    if (iterator.hasNext()) {
        return iterator.next();
    }
    else {
        return null;
    }
}

// Add the keyword to the specified ad group.
function addKeyword(adGroup, text, cpc, finalUrl) {

    return adGroup.newKeywordBuilder()
        .withText(text)
        .withCpc(cpc)
        .withFinalUrl(finalUrl)
        .build();
}

// Check the keyword's build status.
function checkBuildStatus(operations, keywords) {

    for (var i = 0; i < operations.length; i++) {
        if (!operations[i].isSuccessful()) {
            for (var error of operations[i].getErrors()) {
                Logger.log(`Failed to add, ${keywords[i].text}. Error: ${error}`);
            }
        }
    }
}
```

## Pause a keyword

When you add a keyword, its status is Enabled by default. To pause the keyword, call the keyword's `pause` method. To determine the status of the keyword, call the keywords's `isEnabled` and `isPaused` methods.


```javascript
function main() {
    var campaignName = 'CAMPAIGN NAME GOES HERE';
    var adGroupName = 'AD GROUP NAME GOES HERE';
    var keywordText = 'KEYWORD TEXT GOES HERE';

    var iterator = AdsApp.keywords()
        .withCondition(`Text = '${keywordText}'`)
        .withCondition(`AdGroupName = '${adGroupName}'`)
        .withCondition(`CampaignName = '${campaignName}'`)
        .get();

    while (iterator.hasNext()) {
        var keyword = iterator.next();
        keyword.pause();
    }
}
```

## Get all keywords in an ad group

To get all keywords in an ad group, first call the [AdsApp](../reference/AdsApp.md) object's `keywords` method to get the [selector](../reference/KeywordSelector.md). Use the `withCondition` method to specify the ad group and campaign. Then, call the selector's `get` method to get an [iterator](../reference/KeywordIterator.md) that you use to iterate through the list of keywords. To determine the number of keywords in the iterator, call the iterator's `totalNumEntities` method.

If you have access to the keyword IDs, use them instead. Using IDs to get entities provides better performance. Instead of using the `withCondition` filter method, use the `withIds` method. For example, `withIds(['12345'])`. There are limits on the number of entities you can retrieve using IDs. 


```javascript
function main() {
    var campaignName = 'CAMPAIGN NAME GOES HERE';
    var adGroupName = 'AD GROUP NAME GOES HERE';

    var iterator = AdsApp.keywords()
        .withCondition(`AdGroupName = '${adGroupName}'`)
        .withCondition(`CampaignName = '${campaignName}'`)
        .get();
        
    while (iterator.hasNext()) {
        var keyword = iterator.next();
    }
}
```


## Getting all keywords in an account

There's a limit to the number of keywords that Scripts can return for an account. The limit is undefined and may change. The following example shows how you might handle cases where an account has too many keywords. The example tries to fetch all keywords at the account level first. If that fails due to the "There are too many entities" error, it tries to make multiple calls to fetch keywords by campaign, since there are typically fewer entities at the campaign level. 

For information about using the **yield** keyword, see [Use the yield keyword when getting large sets of entities](..\concepts\best-practices.md#using-yield-keyword).

```javascript
function* getEntities() {
    const applyConditions = _ => _
        .withCondition('CampaignStatus = ENABLED')
        .withCondition('AdGroupStatus = ENABLED')
        .withCondition('Status = ENABLED')
        .withCondition("CombinedApprovalStatus = DISAPPROVED");

    try {
        // Get the account's keywords. 
        const keywords = applyConditions(AdsApp.keywords()).get();

        while (keywords.hasNext()) {
            yield keywords.next();
        }
    } catch (e) {
        if (!e.message.startsWith('There are too many entities')) {
            throw e;
        }

        // If there are too many keywords at the account level,
        // get keywords by campaigns under the account.
        const campaigns = AdsApp.campaigns().get();

        while (campaigns.hasNext()) {
            const campaign = campaigns.next();

            const keywords = applyConditions(campaign.keywords()).get();

            while (keywords.hasNext()) {
                yield keywords.next();
            }
        }
    }
}
```


## Get a keyword's performance data

To get a keyword's performance metrics, call the keyword's [getStats](../reference/Keyword.md#getstats) method. When you get the keyword, you need to specify the date range of the metrics data you want. You can specify the date range using a predefined literal, such as LAST_MONTH or TODAY, or a start and end date. To specify the date range, use one of the `forDateRange` methods when you select the keyword (see [KeywordSelector](../reference/KeywordSelector.md)). 

For a list of metrics you can access, see the [Stats](../reference/Stats.md) object.


```javascript
function main() {
    var campaignName = 'CAMPAIGN NAME GOES HERE';
    var adGroupName = 'AD GROUP NAME GOES HERE';
    var keywordText = 'KEYWORD TEXT GOES HERE';

    // Get the keyword. You need to specify the date range of the
    // performance data you want to get.
    var iterator = AdsApp.keywords()
        .forDateRange('LAST_WEEK')
        .withCondition(`Text = '${keywordText}'`)
        .withCondition(`AdGroupName = '${adGroupName}'`)
        .withCondition(`CampaignName = '${campaignName}'`)
        .get();

    // If the keyword is found, log some metrics.
    if (iterator.hasNext()) {
        var keyword = iterator.next();
        var metrics = keyword.getStats(); // Gets the performance metrics.
    }
}
```

## Update a keyword's bid value.

For an example that shows how to update a keyword's bid value, see [Calling Google services](../examples/calling-google-services.md).
