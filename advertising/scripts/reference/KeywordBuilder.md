---
title: "KeywordBuilder object"
description: "Contains the methods for defining a keyword."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# KeywordBuilder

Contains the methods for defining and creating a keyword. For information about builders, see [Builders](../concepts/builders.md).

> [!NOTE]
> All broad match modifier keywords for search ads now serve as broad match keywords instead of phrase match. [Learn more about keyword match types](https://help.ads.microsoft.com/#apex/ads/en/50822/1).

Example usage:
```javascript
    var operation = adGroup.newKeywordBuilder()
        .withText("KEYWORD TEXT GOES HERE")
        .withCpc(0.5)
        .withFinalUrl("http://www.contoso.com")
        .build();

    // See the Builders topic for performance considerations
    // when using the operation object's methods.
    if (!operation.isSuccessful()) {
        for (var error of operation.getErrors()) {
            Logger.log(`${error}\n`);
        }
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[build](#build)|[KeywordOperation](./KeywordOperation.md)|Creates the keyword and returns an operation object used to check whether the keyword was successfully added.
[withCpc(double cpc)](#withcpc-double-cpc-)|[KeywordBuilder](./KeywordBuilder.md)|Sets the keyword's maximum CPC bid.
[withCustomParameters(Object customParameters)](#withcustomparameters-object-customparameters-)|[KeywordBuilder](./KeywordBuilder.md)|Sets the keyword's custom parameters.
[withFinalUrl(string finalUrl)](#withfinalurl-string-finalurl-)|[KeywordBuilder](./KeywordBuilder.md)|Sets the keyword's final URL.
[withMobileFinalUrl(string mobileFinalUrl)](#withmobilefinalurl-string-mobilefinalurl-)|[KeywordBuilder](./KeywordBuilder.md)|Sets the keyword's final URL for mobile devices.
[withText(string text)](#withtext-string-text-)|[KeywordBuilder](./KeywordBuilder.md)|Sets the keyword's text.
[withTrackingTemplate(string trackingTemplate)](#withtrackingtemplate-string-trackingtemplate-)|[KeywordBuilder](./KeywordBuilder.md)|Sets the keyword's tracking template.


## <a name="build"></a>build
Creates the keyword and returns an operation object used to check whether the keyword was successfully added.

### Returns
|Type|Description|
|-|-
[KeywordOperation](./KeywordOperation.md)|An operation object used to check whether the keyword was successfully added.

## <a name="withcpc-double-cpc-"></a>withCpc(double cpc)
Sets the keyword's maximum CPC bid.

Specifies the bid amount to use when the keyword matches the user's search term. Applies only if the ad group's bidding strategy is set to MANUAL_CPC.

To use the bid amount specified at the ad group level, do not call this method.

For more information about bid amounts, see [Bid](/advertising/campaign-management-service/keyword#bid) and [BiddingScheme](/advertising/campaign-management-service/keyword#biddingscheme). 


### Arguments
|Name|Type|Description|
|-|-|-
cpc|double|The maximum CPC bid to apply to the keyword. The account's currency determines the minimum and maximum bid values. For more information, see [Bid and budget currencies](/advertising/guides/currencies#bidandbudget).

### Returns
|Type|Description|
|-|-
[KeywordBuilder](./KeywordBuilder.md)|Keyword builder with the CPC bid applied.


## <a name="withcustomparameters-object-customparameters-"></a>withCustomParameters(Object customParameters)
Sets the keyword's custom parameters. 

[!INCLUDE[custom-parameters](../includes/custom-parameters.md)]

### Arguments
|Name|Type|Description|
|-|-|-
customParameters|Object|A map of up to custom parameters to apply to the keyword's final URL. For example, `{key1: 'value1', key2: 'value2', key3: 'value3'}`, where key is the custom parameter's name and value is the parameter's value. The name may contain a maximum of 16 8-byte characters and the value may contain a maximum of 200 8-byte characters.

### Returns
|Type|Description|
|-|-
[KeywordBuilder](./KeywordBuilder.md)|Keyword builder with the custom parameters applied.


## <a name="withfinalurl-string-finalurl-"></a>withFinalUrl(string finalUrl)
Sets the keyword's final URL.  

[!INCLUDE[final-url](../includes/final-url.md)]

### Arguments
|Name|Type|Description|
|-|-|-
finalUrl|string|The final URL that identifies the webpage the user is taken to when they click the ad.

### Returns
|Type|Description|
|-|-
[KeywordBuilder](./KeywordBuilder.md)|Keyword builder with the final URL applied.


## <a name="withmobilefinalurl-string-mobilefinalurl-"></a>withMobileFinalUrl(string mobileFinalUrl)
Sets the keyword's final URL for mobile devices.

The final URL identifies the webpage that the user is taken to when they click the ad. If not specified, the entity inherits the final URL from its parent entity. For example, the keyword entity inherits the ad's final URL. Specify the keyword's final URL if you want to override the ad's final URL.

For more information, see [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

To specify a final URL for mobile devices, first specify a final URL for non-mobile devices (see `withFinalUrl()`).

### Arguments
|Name|Type|Description|
|-|-|-
mobileFinalUrl|string|The final URL for mobile devices.

### Returns
|Type|Description|
|-|-
[KeywordBuilder](./KeywordBuilder.md)|Keyword builder with the mobile final URL applied.

## <a name="withtext-string-text-"></a>withText(string text)
Sets the keyword's text. 

To specify the keyword's match type, use the following syntax:

- For broad match, use no match type syntax (for example, `keywordBuilder.withText("books")`).
- For broad match modifier, prepend the text with a plus sign (+) (for example, `keywordBuilder.withText("+books")`). *Note*: If you try to create new broad match modifier (BMM) keywords, they will be saved and served as phrase match keywords. Your existing BMM keywords will continue to serve under phrase match behavior. [Learn more about keyword match types](https://help.ads.microsoft.com/#apex/ads/en/50822/1).
- For phrase match, place quotes around the text (for example, `keywordBuilder.withText("\"books\"")`).
- For exact match, place square brackets around the text (for example, `keywordBuilder.withText("[hardcover books]")`).


### Arguments
|Name|Type|Description|
|-|-|-
text|string|The keyword's text. The keyword's text is required. The text may contain a maximum of 100 characters. Specify the text in the locale of the ad group's language value.

### Returns
|Type|Description|
|-|-
[KeywordBuilder](./KeywordBuilder.md)|Keyword builder with the keyword text applied.

## <a name="withtrackingtemplate-string-trackingtemplate-"></a>withTrackingTemplate(string trackingTemplate)
Sets the keyword's tracking template. 

[!INCLUDE[tracking-templates](../includes/tracking-templates.md)]

### Arguments
|Name|Type|Description|
|-|-|-
trackingTemplate|string|The tracking template to use with this keyword.

### Returns
|Type|Description|
|-|-
[KeywordBuilder](./KeywordBuilder.md)|Keyword builder with the tracking template applied.

