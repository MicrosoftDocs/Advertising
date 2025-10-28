---
title: "ResponsiveSearchAdBuilder object"
description: "Contains the methods for creating a responsive search ad."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# ResponsiveSearchAdBuilder

Contains the methods for defining and creating a responsive search ad. For information about builders, see [Builders](../concepts/builders.md).

Example usage:
```javascript
    var operation = adGroup.newAd().responsiveSearchAdBuilder()
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
[addDescription(string description, string pinning)](#adddescription-string-string-description-pinning-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Adds the provided description to the current list of descriptions. At least 2 descriptions must be specified using either this or the addDescription() method.
[addHeadline(string headline, string pinning)](#addheadline-string-string-headline-pinning-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Adds the provided headline to the current list of headlines. At least 3 headlines must be specified using either this or the addHeadline() method.
[build](#build)|[AdOperation](./AdOperation.md)|Creates the ad and returns an operation object used to check whether Scripts successfully added the ad.
[withCustomParameters(Object customParameters)](#withcustomparameters-object-customparameters-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the ad's custom parameters.
[withDescriptions(object[] descriptions)](#withdescriptions-object-descriptions-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the ad's descriptions.
[withFinalUrl(string finalUrl)](#withfinalurl-string-finalurl-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the ad's landing page URL.
[withFinalUrlSuffix(string finalUrlSuffix)](#withfinalurlsuffix-string-finalurlsuffix-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the ad's final URL suffix.
[withHeadlines(object[] headlines)](#withheadlines-object-headlines-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the ad's headlines.
[withMobileFinalUrl(string mobileFinalUrl)](#withmobilefinalurl-string-mobilefinalurl-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the ad's final URL for mobile devices.
[withPath1(string urlPath1)](#withpath1-string-urlpath1-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the first optional path to append to the ad's display URL.
[withPath2(string urlPath2)](#withpath2-string-urlpath2-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the second optional path to append to the ad's display URL.
[withTrackingTemplate(string trackingTemplate)](#withtrackingtemplate-string-trackingtemplate-)|[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Sets the ad's tracking template.


## <a name="adddescription-string-string-description-pinning-"></a>addDescription(string description, string pinning)
Adds the provided description to the current list of descriptions. At least 2 descriptions must be specified using either this or the addDescription() method.

### Arguments
|Name|Type|Description|
|-|-|-
description|string|The ad description to add. For information about limits and including dynamic text strings, see [Bing Ads API](/advertising/campaign-management-service/responsivesearchad#text). 
pinning|string|The optional pinned location.<br/><br/>Possible values for descriptions are: DESCRIPTION_1, DESCRIPTION_2
|text|string|The text of this asset. 

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the description applied.


## <a name="addheadline-string-string-headline-pinning-"></a>addHeadline(string headline, string pinning)
Adds the provided headline to the current list of headlines. At least 3 headlines must be specified using either this or the addHeadline() method.

### Arguments
|Name|Type|Description|
|-|-|-
headline|string|The ad headline to add. For information about limits and including dynamic text strings, see [Bing Ads API](/advertising/campaign-management-service/responsivesearchad#text). 
pinning|string|The optional pinned location.<br/><br/>Possible values for headlines are: HEADLINE_1, HEADLINE_2, HEADLINE_3

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the headline applied.

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
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the custom parameters applied.


## <a name="withdescriptions-object-descriptions-"></a>withDescriptions(object[] descriptions)
Sets the ad's descriptions. 

### Arguments
|Name|Type|Description|
|-|-|-
descriptions|[AdTextAsset](AdTextAsset.md)[]|The ad's descriptions. For information about limits and including dynamic text strings, see [Bing Ads API](/advertising/campaign-management-service/responsivesearchad#text). 

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the descriptions applied.


## <a name="withfinalurl-string-finalurl-"></a>withFinalUrl(string finalUrl)
Sets the ad's landing page URL. 

### Arguments
|Name|Type|Description|
|-|-|-
finalUrl|string|The ad's landing page URL. For information about URL limits, see [Bing Ads API](/advertising/campaign-management-service/responsivesearchad#finalurls). 

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the final URL applied.


## <a name="withfinalurlsuffix-string-finalurlsuffix-"></a>withFinalUrlSuffix(string finalUrlSuffix)
Sets the ad's final URL suffix. 

### Arguments
|Name|Type|Description|
|-|-|-
finalUrl|string|The ad's final URL suffix. For information about URL limits, see [Bing Ads API](/advertising/campaign-management-service/responsivesearchad#finalurls). 

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the final URL applied.


## <a name="withheadlines-object-headlines-"></a>withHeadlines(object[] headlines
Sets the ad's headlines.

### Arguments
|Name|Type|Description|
|-|-|-
headlines|[AdTextAsset](AdTextAsset.md)[]|The ad's headlines. For information about limits and including dynamic text strings, see [Bing Ads API](/advertising/campaign-management-service/responsivesearchad#text).

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the ad's headlines applied.


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
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the mobile final URL applied.


## <a name="withpath1-string-urlpath1-"></a>withPath1(string urlPath1)
Sets the first optional path to append to the ad's display URL.

### Arguments
|Name|Type|Description|
|-|-|-
mobileFinalUrl|string|The first optional path to append to the ad's display URL. Microsoft uses the domain specified in `withFinalUrl` as the display URL. If the final URL's domain is *contoso.com* and the path is *shoes*, the ad's display URL is *contoso.com/shoes*. For usage and limits, see [Path1](/advertising/campaign-management-service/responsivesearchad#path1).

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the path applied.


## <a name="withpath2-string-urlpath2-"></a>withPath2(string urlPath2)
Sets the second optional path to append to the ad's display URL.

### Arguments
|Name|Type|Description|
|-|-|-
mobileFinalUrl|string|The second optional path to append to the ad's display URL. To specify the second path, first specify the first path (see `withPath1`). Microsoft uses the domain specified in `withFinalUrl` as the display URL. If the final URL's domain is *contoso.com*, the first path is *shoes*, and the second path is *ladies*, the ad's display URL is *contoso.com/shoes/ladies*. For usage and limits, see [Path2](/advertising/campaign-management-service/responsivesearchad#path2).

### Returns
|Type|Description|
|-|-
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the path applied.


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
[ResponsiveSearchAdBuilder](./ResponsiveSearchAdBuilder.md)|Ad builder with the tracking template applied.
