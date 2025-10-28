---
title: "Ad script examples"
description: "Shows examples that perform various actions against ads."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# Script examples for managing ads

The following sections show examples of scripts that perform various actions against ads.

[!INCLUDE[exta-to-rsa-migration](../../scripts/includes/exta-rsa-migration.md)]

## Add ads

To add an ad, first get the ad group that you want to add the ad to. Use the [AdGroupSelector](../reference/AdGroupSelector.md) object to select the ad group. Using the `withIds` method provides better performance than passing the ad group's name in the `withCondition` method.

Next, call the ad group's [newAd](../reference/AdGroup.md#newad) method to get a builder that you use to specify the ad's properties. Unlike with other entity types, the `newAd` method returns an [AdBuilderSpace](../reference/AdBuilderSpace.md) object that contains methods for getting the builder for the type of ad you want to create. This example adds an expanded text ad, so it calls the `expandedTextAdBuilder` method to get an expanded text ad builder.

For expanded text ads, you must specify the following properties:

- Description
- FinalUrl
- HeadlinePart1
- HeadlinePart2

The combination of these properties uniquely defines an expanded text ad. The other properties are optional.

Calling the builder's `build` method creates the ad asynchronously; Scripts adds the ad at some point before the script terminates or if you call one of the build operation's methods. For information about this process, see [What is a builder?](../concepts/builders.md)



```javascript
function main() {
    var adGroupId = "AD GROUP ID GOES HERE";
    var adGroup = getAdGroup(adGroupId);

    if (adGroup != null) {

        // Get an expanded text ad builder, specify the ad's 
        // properties, and add the ad to the build queue.
        var operation = adGroup.newAd().expandedTextAdBuilder()
            .withDescription("AD COPY GOES HERE")
            .withFinalUrl("https://contoso.com")
            .withHeadlinePart1("AD TITLE PART 1 GOES HERE")
            .withHeadlinePart2("AD TITLE PART 2 GOES HERE")
            .build();

        if (!operation.isSuccessful()) {
            for (var error of operation.getErrors()) {
                Logger.log(error);
            }
        }
    }
    else {
        Logger.log(`Failed to get ad group, ${adGroupId}.`);
    }
}

function getAdGroup(id) {
    var adGroups = AdsApp.adGroups()
        .withIds([id])
        .get();

    if (adGroups.hasNext()) {
        return adGroups.next();
    }
    else {
        return null;
    }
}
```


If a previously added ad with the same values for the combination of required fields exists, the service does not add the ad but instead returns the previously added ad and ID. However, if the same ads are processed in the same build queue, the second ad fails with CampaignServiceDuplicateAd. For example, because the ads in the following example are the same, one of them fails.

```javascript
    if (adGroup != null) {
        var adOperation = adGroup.newAd().expandedTextAdBuilder()
            .withDescription("ad copy")
            .withFinalUrl("https://contoso.com")
            .withHeadlinePart1("title part 1")
            .withHeadlinePart2("title part 2")
            .build();

        operations.push(adOperation);

        adOperation = adGroup.newAd().expandedTextAdBuilder()
            .withDescription("ad copy")
            .withFinalUrl("https://contoso.com")
            .withHeadlinePart1("title part 1")
            .withHeadlinePart2("title part 2")
            .build();

        operations.push(adOperation);
        
        for (var operation of operations) {
            if (!operation.isSuccessful()) {
                for (var error of operation.getErrors()) {
                    Logger.log(error);
                }
            }
        }
    }
```


## Get ads

You have several options to get ads depending on where you are in the hierarchy.

### Get ads from an ad group

If you have an [AdGroup](../reference/AdGroup.md) object, call the object's `ads` method to get the list of ads that belong to the ad group. This example gets and prints all the ads in the group but you can use the ad selector's methods to filter the list of ads.

```javascript
function main() {
    var adGroups = AdsApp.adGroups()
        .withIds(["AD GROUP ID GOES HERE"])
        .get();

    if (adGroups.hasNext()) {
        var adGroup = adGroups.next();

        var ads = adGroup.ads().get();
        
        while (ads.hasNext()) {
            var ad = ads.next();

            if (ad.isType().expandedTextAd()) {
                var expandedAd = ad.asType().expandedTextAd();
            }
        }
    } 
}
```


### Get ads from a campaign

If you have a [Campaign](../reference/Campaign.md) object, call the object's `ads` method to get the list of ads that belong to the ad groups in the campaign. This example uses the ad selector's `withCondition` method to filter the list of ads to those in ad groups that contain the name foo. 

```javascript
function main() {
    var campaigns = AdsApp.campaigns()
        .withIds(["CAMPAIGN ID GOES HERE"])
        .get();

    while (campaigns.hasNext()) {
        var campaign = campaigns.next();

        var ads = campaign.ads()
            .withCondition("AdGroupName CONTAINS_IGNORE_CASE 'foo'")
            .get();
        
        while (ads.hasNext()) {
            var ad = ads.next();

            if (ad.isType().expandedTextAd()) {
                var expandedAd = ad.asType().expandedTextAd();
            }
        }
    } 
}
```

### Get all ads in the account

To get all the ads in an account, call the `ads` method on the [AdsApp](../reference/AdsApp.md) object. You can use the ad selector's methods to filter the list of ads to campaigns, ad groups, or based on ad performance. This example gets all ads from the account.

```javascript
function main() {
    var ads = AdsApp.ads().get();

    while (ads.hasNext()) {
        var ad = ads.next();

        if (ad.isType().expandedTextAd()) {
            var expandedAd = ad.asType().expandedTextAd();
        }
    }
} 
```


## Pause an ad

To pause an ad, call the ad's `pause` method. Because the `pause` method is on the base [Ad](../reference/Ad.md) object, you don't need to get the derived object first.

If you want to enable or remove an ad, just call the ad's `enable` or `remove` method. To check if the ad is enabled or paused, call the `isEnabled` or `isPaused` method.

To get ads with a specific status, use the ad selector's `withCondition` method. For example, `withCondition("Status = PAUSED)`.


```javascript
function main() {
    var ads = AdsApp.ads()
        .forDateRange("LAST_WEEK")
        .withCondition("AdGroupName CONTAINS_IGNORE_CASE 'foo'")
        .withCondition('Status = ENABLED')
        .withCondition('Clicks < 5')
        .get();
 
    while (ads.hasNext()) {
        var ad = ads.next();
        ad.pause();
    }
}
```

## Get disapproved ads

For an example that gets disapproved ads, see [Discovering disapproved ads](../solutions/get-disapproved-ads.md).
