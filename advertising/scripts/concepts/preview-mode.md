---
title: "Microsoft Advertising Scripts Preview Mode"
description: "Describes how preview mode works in Microsoft Advertising Scripts."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Running scripts in Preview mode

Preview mode lets you test your script without actually making changes to the data. Instead, you’re shown the results as if the script were executed. This can reduce the amount of time spent setting up test cases. When you're satisfied with the script's output, you can run the script or schedule it to run later.

<!--
Preview mode is specific to Microsoft Advertising components only. Calls to other services execute as normal. For example, if the script sends an email, the email is sent. The same is true for spreadsheet updates. 
-->

To programmatically determine if a script is executing in preview mode, see the `isPreview` method of [ExecutionInfo](../reference/ExecutionInfo.md).

Because objects are not created, deleted, or modified in preview mode not all code will execute the same as if it were run live. The following code shows a simple example when the code behaves differently in preview mode versus live mode.

```javascript
/function main() {

    // Get an ad group that does not have keywords.
    var adGroup = AdsApp.adGroups()
        .withIds(["123456789"])
        .get()
        .next();

    // Add a keyword to the ad group
    var operation = adGroup.newKeywordBuilder()
        .withText('mykeyword')
        .build();

    // In preview mode, the keyword is not created, so getId() returns -1.
    if (operation.isSuccessful()) {
        var keyword = operation.getResult();
        Logger.log(`added keyword, ${keyword.getText()} (${keyword.getId()})`);
    }
    else {
        for (var error in operation.getErrors()) {
            Logger.log(`Error adding keyword, ${error}.`);
        }
    }

    // Get the ad group's keywords. In preview mode, the
    // keyword is not created, so no keywords are logged.
    var keywords = AdsApp.keywords()
        .withCondition(`AdGroupName CONTAINS '${adGroup.getName()}'`)
        .get();

    while (keywords.hasNext()) {
        var keyword = keywords.next();
        Logger.log(`added keyword, ${keyword.getText()} (${keyword.getId()})`);
    }
}
```

## Next steps

> [!div class="nextstepaction"]
> [Learn how authorization works](./authorization.md)
