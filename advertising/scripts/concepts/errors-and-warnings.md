---
title: "Microsoft Advertising Scripts Errors and Warnings"
description: "Describes how errors and warnings are handled in Microsoft Advertising Scripts."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Handling errors and warnings in your script

The only time Scripts returns errors is when you add an entity with invalid values. For example, if you try to add a keyword entity with a bid amount that's not valid, the build operation fails and returns one or more errors.

```javascript
        var operation = adGroup.newKeywordBuilder()
            .withText(keywordText)
            .withCpc(-5)
            .build();

        if (operation.isSuccessful()) {
            var keyword = operation.getResult();
            Logger.log(`Added keyword, ${keyword.getText()}.`);
        }
        else {
            // The bid amount is not valid, so this path executes
            for (var error of operation.getErrors()) {
                Logger.log(error);
            }
        }
``` 

However, if you try to update an entity’s properties with an invalid value, Scripts does not return an error. Instead, Scripts writes an error message to the [Change Log](./change-and-text-logs.md#change-log) and your code continues executing. For example, the following code attempts to set the ad group's CPC bid. Because the amount is not valid, the call silently fails, the script continues executing, and an error message is written to the change log.

```javascript
function main() {
    var adGroup = AdsApp.adGroups().get().next();
    adGroup.bidding().setCpc(-5);
}
```

> [!NOTE]
> Although you may be tempted to call `getCpc` method after setting its value to verify that the update succeeded, don't. Calling the get method after calling the set method degrades performance by eliminating the batch update feature. For more information, see [Batching updates](best-practices.md#batching-updates) in [Best practices](best-practices.md).


Other errors such as runtime errors or entity retrieval failures cause script execution to stop. When this happens, the error message is written to the [Text Log](./change-and-text-logs.md#text-log). The following code attempts to call the `foo()` function but because the function is not defined the script terminates execution. 

```javascript
function main() {
    foo(); // The script stops because foo() is undefined and generates a reference error
    Logger.log('This line is never logged!');
}
```

You should always review all messages logged to the change log and text log.

<!--
## What does Internal Error mean?

If you receive a runtime error and the text log lists InternalError, the following are the reasons why you might be getting it.

|Reason|Remedy
|-|-
|An enumeration value you specified is not valid.|Enumeration values are case sensitive, so make sure that all enumeration values are valid and use the correct casing.
|An operator you specified in the `.withCondition()` method is not valid.|Operators are case sensitive, so make sure that all operators are valid and use the correct casing.
|A column you specified in the `.withCondition()` or `.orderBy()` method is not valid.|Column names are case sensitive, so make sure that all column names are valid and use the correct casing.
|You specified too may IDs in the `.withIds()` method.|Reduce the number of IDs to the allowed maximum (see documentation for the method).
|The date range specified in the `.forDateRange()` method is not valid.|Make sure that the start and end dates are valid and that the end date is not earlier than the start date.

-->
