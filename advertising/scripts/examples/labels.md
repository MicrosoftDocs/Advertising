---
title: "Label script examples"
description: "Shows examples that perform various actions against labels."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# Script examples for managing labels

<!--
Labels let you organize entities such as campaigns, ad groups, ads, and keywords into groups based on whatever is important to you. You decide what your labels mean and how to apply them to your entities. You can then filter and run reports on your labels to get the data that is most meaningful to you.
-->

The following sections show examples of scripts that perform various actions against labels.


## Add labels to an account

To use labels, first add them to your account. You may add a maximum of 100,000 labels to an account. To add a label, use the [createLabel](../reference/AdsApp.md#createlabel-string-name-string-description-string-backgroundcolor-) method. The method takes as input the label's name, description, and background color. 

The name is required but the description and color are optional. The name is case sensitive, cannot exceed 80 characters, and must be unique within the account. Although the color is optional, if you don't specify it, the service chooses a random color for you. You may specify the color using a three-byte hexadecimal number in the form #RRGGBB (for example, CB0400) or one of the 16 known color names such as red, yellow, and aqua. If you specify a color, you must specify a description, but it may be an empty string.

The following example, shows three ways to call the `createLabel` method.

```javascript
function main() {

    AdsApp.createLabel("foo");
    AdsApp.createLabel("bar", "a descriptive description", "aqua");
    AdsApp.createLabel("foo foo", "", "#FF0000");

}
```


## List an account's labels

To get a list of labels in an account, use the [labels](../reference/AdsApp.md#createlabel-string-name-string-description-string-backgroundcolor-) method. You can filter the list by the label's name using the standard string operators such as =, CONTAINS, and STARTS_WITH.


```javascript
function main() {

    // Gets all the labels in the account
    var accountLabels = AdsApp.labels()
        .get();  
    
    Logger.log(`selector returned ${accountLabels.totalNumEntities()} labels that matched the selector's conditions`);

    // Gets all the labels in the account that contain foo in the name
    accountLabels = AdsApp.labels()
        .withCondition("Name CONTAINS 'foo'")
        .get();
    
    Logger.log(`selector returned ${accountLabels.totalNumEntities()} labels that matched the selector's conditions`);

    // Gets the first 15 labels in the account
    accountLabels = AdsApp.labels()
        .withLimit(15)
        .get();
    
    Logger.log(`selector returned ${accountLabels.totalNumEntities()} labels that matched the selector's conditions`);

    // Gets the first 15 labels in the account that contain foo in the name
    accountLabels = AdsApp.labels()
        .withCondition("Name CONTAINS 'foo'")
        .withLimit(15)
        .get();

    Logger.log(`selector returned ${accountLabels.totalNumEntities()} labels that matched the selector's conditions`);

    while (accountLabels.hasNext()){
        var label = accountLabels.next();
    }

}
```


## Apply a label to a keyword

Labels are only useful if you apply them to entities such as keywords. To apply a label to a keyword, use the keyword's [applyLabel](../reference/Keyword.md#applylabel-string-name-) method. You may apply a maximum of 50 labels to a keyword. The method takes as input the label's name. The label's name is case sensitive, must exist in the account, and must be unique within the keyword.

The following example shows how to add labels to a keyword, list the keyword's labels, and remove labels from a keyword.

```javascript
function main() {

    // Get a keyword to add labels to
    var keyword = AdsApp.keywords().withIds(["12345"]).get().next();

    // Print the keyword's existing labels
    var labels = keyword.labels().get();
    printLabels(labels);

    // Add labels to the keyword
    keyword.applyLabel("foo");
    keyword.applyLabel("foo foo");
    keyword.applyLabel("bar");

    // Print the new list of labels
    labels = keyword.labels().get();
    printLabels(labels);

    // Remove labels from the keyword
    keyword.removeLabel("foo");
    keyword.removeLabel("bar");

    // Print the new list of labels
    labels = keyword.labels().get();
    printLabels(labels);

}

function printLabels(labels) {
    Logger.log(`keyword has ${labels.totalNumEntities()} labels`);
    
    while (labels.hasNext()){
        var label = labels.next();

        Logger.log(`name: ${label.getName()}
            description: ${label.getDescription()}
            color: ${label.getColor()}\n\n`);
    }
}
```


## Get keywords that contains any of the specified labels

To get keywords that contain specific label names, use the KeywordSelector object's [withCondition()](../reference/KeywordSelector.md#withcondition-string-condition-) method. Use the LabelNames column name to filter by label names. You may specify an array of one or more names. The names are case sensitive, must match exactly, and must exist in the account. You may apply the following operators:

- CONTAINS_ALL &mdash; selects the keyword if it contains all of the specified labels
- CONTAINS_ANY &mdash; selects the keyword if it contains any of the specified labels
- CONTAINS_NONE &mdash; selects the keyword if it contains none of the specified labels

Note that if the label doesn't exist in the account, the selector fails and returns an error.

```javascript
function main() {

    var keywords = AdsApp.keywords()
        .withCondition('LabelNames CONTAINS_ANY ["foo", "bar"]')
        .get();
    
    while (keywords.hasNext()){
        var keyword = keywords.next();

        var labels = keyword.labels().get();

        while (labels.hasNext()) {
            var label = labels.next();
        }
    }

}
```
