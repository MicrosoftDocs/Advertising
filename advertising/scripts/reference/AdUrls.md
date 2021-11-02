---
title: "AdUrls object"
description: "Contains the methods used to get the ad's URLs, tracking template, and custom parameters."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdUrls

Contains the methods used to get the ad's URLs, tracking template, and custom parameters. For information, see [URL Tracking with Upgraded URLs](/advertising/guides/url-tracking-upgraded-urls).

## Methods
|Method Name|Return Type|Description|
|-|-|-
[getCustomParameters](#getcustomparameters)|Object|Gets the ad's custom parameters.
[getFinalUrl](#getfinalurl)|string|Gets the ad's final URL.
[getMobileFinalUrl](#getmobilefinalurl)|string|Gets the ad's final URL for mobile devices.
[getTrackingTemplate](#gettrackingtemplate)|string|Gets the ad's tracking template.


## <a name="getcustomparameters"></a>getCustomParameters
Gets the ad's custom parameters. 

[!INCLUDE[custom-parameters](../includes/custom-parameters.md)]

### Returns
|Type|Description|
|-|-
Object|A map of the ad's custom parameters.<br /><br />For example, `{key1: 'value1', key2: 'value2', key3: 'value3'}`, where key is the name of the custom parameter and value is the parameter's value.


## <a name="getfinalurl"></a>getFinalUrl
Gets the ad's final URL. This is the URL of the webpage that the user is taken to when they click the ad. 

The same override rules apply as elsewhere. For example, specifying a keyword's final URL overrides the ad's final URL.

### Returns
|Type|Description|
|-|-
string|The ad's final URL.


## <a name="getmobilefinalurl"></a>getMobileFinalUrl
Gets the ad's final URL for mobile devices. This is the URL of the mobile webpage that the user is taken to when they click the ad. 

The same override rules apply as elsewhere. For example, specifying a keyword's mobile final URL overrides the ad's mobile final URL.

### Returns
|Type|Description|
|-|-
string|The ad's final URL for mobile devices.


## <a name="gettrackingtemplate"></a>getTrackingTemplate
Gets the ad's tracking template. 

[!INCLUDE[tracking-templates](../includes/tracking-templates.md)]

### Returns
|Type|Description|
|-|-
string|The ad's tracking template.
