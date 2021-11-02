---
title: "ExpandedTextAdBuilder object"
description: "Contains the methods for creating an expanded text ad."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# ExpandedTextAdBuilder

Contains the methods for defining and creating an expanded text ad. For information about builders, see [Builders](../concepts/builders.md).

Example usage:
```javascript
    var operation = adGroup.newAd().expandedTextAdBuilder()
        .withHeadlinePart1('FIRST PART OF TITLE GOES HERE')
        .withHeadlinePart2('SECOND PART OF TITLE GOES HERE')
        .withDescription('AD TEXT GOES HERE')
        .withFinalUrl('LANDING PAGE URL GOES HERE')
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
[build](#build)|[AdOperation](./AdOperation.md)|Creates the ad and returns an operation object used to check whether Scripts successfully added the ad.
[withCustomParameters(Object customParameters)](#withcustomparameters-object-customparameters-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the ad's custom parameters.
[withDescription(string description)](#withdescription-string-description-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the ad's first description. This method is deprecated in favor of [withDescription1(string description1)](#withdescription1-string-description1-).
[withDescription1(string description1)](#withdescription1-string-description1-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the ad's first description. This method sets the same field as [withDescription(string description)](#withdescription-string-description-).
[withDescription2(string description2)](#withdescription2-string-description2-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the ad's second description.
[withFinalUrl(string finalUrl)](#withfinalurl-string-finalurl-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the ad's landing page URL.
[withHeadlinePart1(string headlinePart1)](#withheadlinepart1-string-headlinepart1-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the first part of the ad's title.
[withHeadlinePart2(string headlinePart2)](#withheadlinepart2-string-headlinepart2-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the second part of the ad's title.
[withHeadlinePart3(string headlinePart3)](#withheadlinepart3-string-headlinepart3-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the third part of the ad's title.
[withMobileFinalUrl(string mobileFinalUrl)](#withmobilefinalurl-string-mobilefinalurl-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the ad's final URL for mobile devices.
[withPath1(string urlPath1)](#withpath1-string-urlpath1-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the first optional path to append to the ad's display URL.
[withPath2(string urlPath2)](#withpath2-string-urlpath2-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the second optional path to append to the ad's display URL.
[withTrackingTemplate(string trackingTemplate)](#withtrackingtemplate-string-trackingtemplate-)|[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Sets the ad's tracking template.


## <a name="build"></a>build
Creates the ad and returns an operation object used to check whether Scripts successfully added the ad.

For limits on the number of ads you can add to an ad group, see [Entity hierarch limits](/advertising/guides/entity-hierarchy-limits#ads).

### Returns
|Type|Description|
|-|-
[AdOperation](./AdOperation.md)|An operation object used to check whether Scripts successfully added the ad.


## <a name="withcustomparameters-object-customparameters-"></a>withCustomParameters(Object customParameters)
Sets the ad's custom parameters. 

[!INCLUDE[custom-parameters](../includes/custom-parameters.md)]

### Arguments
|Name|Type|Description|
|-|-|-
customParameters|Object|A map of up to custom parameters to apply to the ad's final URL. For example, `{key1: 'value1', key2: 'value2', key3: 'value3'}`, where key is the custom parameter's name and value is the parameter's value. The name may contain a maximum of 16 8-byte characters and the value may contain a maximum of 200 8-byte characters.

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the custom parameters applied.


## <a name="withdescription-string-description-"></a>withDescription(string description)
Sets the ad's first description. This method is deprecated in favor of [withDescription1(string description1)](#withdescription1-string-description1-).

### Arguments
|Name|Type|Description|
|-|-|-
description|string|The ad's first description. For information about copy limits and including dynamic text strings, see [Bing Ads API](/advertising/campaign-management-service/expandedtextad#text). 

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the description applied.


## <a name="withdescription1-string-description1-"></a>withDescription1(string description1)
Sets the ad's first description. This method sets the same field as [withDescription(string description)](#withdescription-string-description-).

### Arguments
|Name|Type|Description|
|-|-|-
description1|string|The ad's first description. For information about copy limits and including dynamic text strings, see [Bing Ads API](/advertising/campaign-management-service/expandedtextad#text). 

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the description applied.

## <a name="withdescription2-string-description2-"></a>withDescription2(string description2)
Sets the ad's second description.

### Arguments
|Name|Type|Description|
|-|-|-
description2|string|The ad's second description. For information about copy limits and including dynamic text strings, see [Bing Ads API](/advertising/campaign-management-service/expandedtextad#text). 

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the description applied.


## <a name="withfinalurl-string-finalurl-"></a>withFinalUrl(string finalUrl)
Sets the ad's landing page URL. 

### Arguments
|Name|Type|Description|
|-|-|-
finalUrl|string|The ad's landing page URL. For information about URL limits, see [Bing Ads API](/advertising/campaign-management-service/expandedtextad#finalurls). 

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the final URL applied.


## <a name="withheadlinepart1-string-headlinepart1-"></a>withHeadlinePart1(string headlinePart1)
Sets the first part of the ad's title.

### Arguments
|Name|Type|Description|
|-|-|-
headlinePart1|string|The first part of the ad's title. When Microsoft generates the ad's title using parts 1, 2, and 3 of the title, it concatenates the parts using " - ". Do not specify the dash in any title parts. Each part of the title must contain at least one word. For information about additional title limits and including dynamic text strings in the title, see [Bing Ads API](/advertising/campaign-management-service/expandedtextad#titlepart1). 

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with part 1 of the ad's title applied.


## <a name="withheadlinepart2-string-headlinepart2-"></a>withHeadlinePart2(string headlinePart2)
Sets the second part of the ad's title.

### Arguments
|Name|Type|Description|
|-|-|-
headlinePart2|string|The second part of the ad's title. When Microsoft generates the ad's title using parts 1, 2, and 3 of the title, it concatenates the parts using " - ". Do not specify the dash in any title parts. Each part of the title must contain at least one word. For information about additional title limits and including dynamic text strings in the title, see [Bing Ads API](/advertising/campaign-management-service/expandedtextad#titlepart1). 

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with part 1 of the ad's title applied.

## <a name="withheadlinepart3-string-headlinepart3-"></a>withHeadlinePart3(string headlinePart3)
Sets the third part of the ad's title.

### Arguments
|Name|Type|Description|
|-|-|-
headlinePart3|string|The third part of the ad's title. When Microsoft generates the ad's title using parts 1, 2, and 3 of the title, it concatenates the parts using " - ". Do not specify the dash in any title parts. Each part of the title must contain at least one word. For information about additional title limits and including dynamic text strings in the title, see [Bing Ads API](/advertising/campaign-management-service/expandedtextad#titlepart1). 

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with part 1 of the ad's title applied.

## <a name="withmobilefinalurl-string-mobilefinalurl-"></a>withMobileFinalUrl(string mobileFinalUrl)
Sets the ad's final URL for mobile devices. 

The final URL identifies the webpage that the user is taken to when they click the ad. To specify a final URL for mobile devices, first specify a final URL for non-mobile devices (see `withFinalUrl()`).

For more information, see [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)


### Arguments
|Name|Type|Description|
|-|-|-
mobileFinalUrl|string|The final URL for mobile devices.

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the mobile final URL applied.


## <a name="withpath1-string-urlpath1-"></a>withPath1(string urlPath1)
Sets the first optional path to append to the ad's display URL.

### Arguments
|Name|Type|Description|
|-|-|-
mobileFinalUrl|string|The first optional path to append to the ad's display URL. Microsoft uses the domain specified in `withFinalUrl` as the display URL. If the final URL's domain is *contoso.com* and the path is *shoes*, the ad's display URL is *contoso.com/shoes*. For usage and limits, see [Path1](/advertising/campaign-management-service/expandedtextad#path1).

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the path applied.


## <a name="withpath2-string-urlpath2-"></a>withPath2(string urlPath2)
Sets the second optional path to append to the ad's display URL.

### Arguments
|Name|Type|Description|
|-|-|-
mobileFinalUrl|string|The second optional path to append to the ad's display URL. To specify the second path, first specify the first path (see `withPath1`). Microsoft uses the domain specified in `withFinalUrl` as the display URL. If the final URL's domain is *contoso.com*, the first path is *shoes*, and the second path is *ladies*, the ad's display URL is *contoso.com/shoes/ladies*. For usage and limits, see [Path2](/advertising/campaign-management-service/expandedtextad#path2).

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the path applied.


## <a name="withtrackingtemplate-string-trackingtemplate-"></a>withTrackingTemplate(string trackingTemplate)
Sets the ad's tracking template. 

[!INCLUDE[tracking-templates](../includes/tracking-templates.md)]

### Arguments
|Name|Type|Description|
|-|-|-
trackingTemplate|string|The tracking template to use with this ad.

### Returns
|Type|Description|
|-|-
[ExpandedTextAdBuilder](./ExpandedTextAdBuilder.md)|Ad builder with the tracking template applied.
