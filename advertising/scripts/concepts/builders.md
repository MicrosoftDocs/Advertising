---
title: "Microsoft Advertising Scripts Builders"
description: "Describes how builders work in Microsoft Advertising Scripts."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# What are builders?

You use builders to add an entity. Each parent object, such as [Campaign](../reference/Campaign.md), includes methods for getting builder objects that you use to add child entities. For example, to add an ad group to a campaign, you'd call the `Campaign` object's `newAdGroupBuilder` method. 

The builder object includes methods that you use to set the entity's property values. For example, to specify a keyword's CPC, you'd use the `withCpc` method. After setting all the entity's property values, you'd call the `build` method to create the entity. The build process is an asynchronous process where the request is queued with other build requests and processed in a batch. The batched requests will complete before the script terminates.

To determine whether the build requests succeeded, you can look at the logs or you can use the operation object that the `build` method returns. For example, [AdGroupBuilder](../reference/AdGroupBuilder.md) returns [AdGroupOperation](../reference/AdGroupOperation.md). You can call any of the operation object's methods (`isSuccessful`, `getResult`, or `getErrors`) to determine whether Scripts successfully created the entity. But there are performance considerations when calling these methods (see [Performance considerations](#performance-considerations)).

The following example conceptually shows how to create a keyword using the builder and operation objects. You should probably use this flow only if you're creating a single entity (or maybe a few).


```javascript
    // Gets the first ad group in the account.
    var adGroup = AdsApp.adGroups().get().next();

    // Use the 'with' methods to specify the keyword's property values.
    // The .build() method adds the build request to the build queue.
    var keywordOperation = adGroup.newKeywordBuilder()
        .withCpc(1.2)
        .withText("shirts")
        .withFinalUrl("https://www.contoso.com/shirts")
        .build();

    // Call isSuccessful() to determine if the build succeeded.
    // Calling any of the operation object's method processes the
    // build request immediately. 
    if (keywordOperation.isSuccessful()) {
        // You only need to call getResult if you need to access
        // the new keyword entity.
        var keyword = keywordOperation.getResult();
    } else {
        // Handle the errors.
        for (var error of keywordOperation.getErrors()) {
            Logger.log(`${error}\n`);
        }
    }
```

## Performance considerations

In order to improve performance, Scripts processes build requests in batches. If you call a build request's operation method, it forces Scripts to process the queued build requests immediately, negating any performance gains. If you're creating more than one entity, don't execute the operation methods in the same loop that you use to build the entity. This leads to poor performance because only one entity at a time is processed. Instead, create an array of the operations and process them after the build loop.


### Do this

``` javascript
    // An array to hold the operations, so you 
    // can process them after all the entities are queued.
    var operations = []; 

    // Create all the new entities.
    for (var i = 0; i < keywords.length; i++) {
        var keywordOperation = AdsApp.adGroups().get().next()
          .newKeywordBuilder()
          .withText(keywords[i])
          .build();
        operations.push(keywordOperation);
    }

    // Now call the operation method so the build requests
    // get processed in batches.
    for (var i = 0; i < operations.length; i++) {
        var newKeyword = operations[i].getResult();
    }
```

### Don't do this

``` javascript
    for (var i = 0; i < keywords.length; i++) {
        var keywordOperation = AdsApp.adGroups().get().next()
          .newKeywordBuilder()
          .withText(keywords[i])
          .build();

        // Don't get results in the same loop that creates
        // the entity because Scripts then only processes one
        // entity at a time.
        var newKeyword = keywordOperation.getResult();
    }
```



The following is the list of builders.

- [AdGroupBuilder](../reference/AdGroupBuilder.md)
- [ExpandedTextAdBuilder](../reference/ExpandedTextAdBuilder.md)
- [KeywordBuilder](../reference/KeywordBuilder.md)
- [NegativeKeywordListBuilder](../reference/NegativeKeywordListBuilder.md)

## Next steps

> [!div class="nextstepaction"]
> [Learn about preview mode](../concepts/preview-mode.md)
