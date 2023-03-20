---
title: "AdBuilderSpace object"
description: "Describes the methods for getting ad builders."
author: jonmeyers
ms.author: jonmeyers
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdBuilderSpace

Contains the methods used to get ad builders.

[!INCLUDE[exta-to-rsa-migration](../../scripts/includes/exta-rsa-migration.md)]

Example usage:
```javascript
    var builder = adGroup.newAd().expandedTextAdBuilder();
```


## Methods
|Method Name|Return Type|Description|
|-|-|-
[expandedTextAdBuilder](#expandedTextAdBuilder)|[ExpandedTextAdBuilder](ExpandedTextAdBuilder.md)|Gets a builder used to add an expanded text ad to the ad group.
[responsiveSearchAdBuilder](#responsiveSearchAdBuilder)|[ResponsiveSearchAdBuilder](ResponsiveSearchAdBuilder.md)|Gets a builder used to add a responsive search ad to the ad group.


## <a name="expandedTextAdBuilder"></a>expandedTextAdBuilder
Gets a [builder](../concepts/builders.md) used to add an expanded text ad to this ad group.

### Returns

|Type|Description|
|-|-
[ExpandedTextAdBuilder](ExpandedTextAdBuilder.md)|The builder used to add expanded text ads to this ad group.


## <a name="responsiveSearchAdBuilder"></a>responsiveSearchAdBuilder
Gets a [builder](../concepts/builders.md) used to add a responsive search ad to this ad group.

### Returns

|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](ResponsiveSearchAdBuilder.md)|The builder used to add responsive search ads to this ad group.
