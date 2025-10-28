---
title: "AdViewSpace object"
description: "Contains the methods used to cast this ad to a specific type."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# AdViewSpace

Contains the methods used to cast this ad to a specific type.


Example usage:
```javascript
    if (ad.isType().expandedTextAd()) {
        var expandedAd = ad.asType().expandedTextAd();
        Logger.log(`Id: ${expandedAd.getId()}
            copy: ${expandedAd.getDescription()}
            title part 1: ${expandedAd.getHeadlinePart1()}
            title part 2: ${expandedAd.getHeadlinePart2()}
            final URL: ${expandedAd.urls().getFinalUrl()}\n\n`);
    }
```


## Methods
|Method Name|Return Type|Description|
|-|-|-
[expandedTextAd](#expandedtextad)|[ExpandedTextAd](ExpandedTextAd.md)|Casts this ad to an expanded text ad.
[responsiveSearchAd](#responsivesearchad)|[ResponsiveSearchAd](ResponsiveSearchAd.md)|Casts this ad to a responsive search ad.


## <a name="expandedtextad"></a>expandedTextAd
Casts this ad to an expanded text ad.

### Returns
|Type|Description|
|-|-
[ExpandedTextAd](ExpandedTextAd.md)|Contains the methods used to access the expanded text ad's properties.

## <a name="responsivesearchad"></a>responsiveSearchAd
Casts this ad to a responsive search ad.

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAd](ResponsiveSearchAd.md)|Contains the methods used to access the responsive search ad's properties.

