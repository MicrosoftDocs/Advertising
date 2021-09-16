---
title: "AdTypeSpace object"
description: "Contains the methods used to test if an ad is of the specified type."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdTypeSpace

Contains the methods used to test if an ad is of the specified type.


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
[expandedTextAd](#expandedtextad)|Boolean|Gets a Boolean value that indicates whether the ad is an expanded text ad.
[responsiveSearchAd](#responsivesearchad)|Boolean|Gets a Boolean value that indicates whether the ad is a responsive search ad.


## <a name="expandedtextad"></a>expandedTextAd
Gets a Boolean value that indicates whether the ad is an expanded text ad.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if the ad is an expanded text ad; otherwise, **false**.


## <a name="responsivesearchad"></a>responsiveSearchAd
Gets a Boolean value that indicates whether the ad is a responsive search ad.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if the ad is a responsive search ad; otherwise, **false**.

