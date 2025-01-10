---
title: "Microsoft Advertising Scripts Iterators"
description: "Describes how iterators work in Microsoft Advertising Scripts."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# What are iterators?

Iterators enumerate items that a [selector](selectors.md) returns. Iterators are similar to arrays except you can't use an index to directly access an item. Iterators also help reduce memory pressure by loading only a single item at a time rather than the entire set of items. Iterators include the following methods.

- **boolean hasNext()** &mdash; Returns true if the current position is not the last item in the list
- **Object next()** &mdash; Advances the current position and returns the object at the new position
- **totalNumEntities()** &mdash; Returns the number of items available in the iterator.

The following code shows how to use an iterator to iterate over all ad groups in your account.

```javascript
var iterator = AdsApp.adGroups().get();

while (iterator.hasNext()) {
  var adGroup = iterator.next();
}
```

> [!NOTE]
> The iterators don't support the **for-of** loop construct. For example:
>  
> ```javascript
>     for (var campaign of AdsApp.campaigns().get())
> ```

The following is the list of iterators.

- [AdGroupIterator](../reference/AdGroupIterator.md)
- [AssetGroupIterator](../reference/AssetGroupIterator.md)
- [AdIterator](../reference/AdIterator.md)
- [AdParamIterator](../reference/AdParamIterator.md)
- [BingAdsAccountIterator](../reference/BingAdsAccountIterator.md)
- [BudgetIterator](../reference/BudgetIterator.md)
- [CampaignIterator](../reference/CampaignIterator.md)
- [ExcludedLocationIterator](../reference/ExcludedLocationIterator.md)
- [KeywordIterator](../reference/KeywordIterator.md)
- [NegativeKeywordListIterator](../reference/NegativeKeywordListIterator.md)
- [ProductGroupIterator](../reference/ProductGroupIterator.md)
- [TargetedLocationIterator](../reference/TargetedLocationIterator.md)

### Next steps

> [!div class="nextstepaction"]
> [Learn about builders](./builders.md)
