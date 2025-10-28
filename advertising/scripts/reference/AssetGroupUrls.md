---
title: "AssetGroupUrls object"
description: "Contains the methods for managing the asset group's URLs."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "advertising-scripts"
ms.topic: "article"
---

# AssetGroupUrls

Contains the methods for managing the asset group's URLs. For more information, see [URL Tracking with Upgraded URLs](/advertising/guides/url-tracking-upgraded-urls).


## Methods
|Method Name|Return Type|Description|
|-|-|-
[clearMobileFinalUrl](#clearmobilefinalurl)|void|Removes the asset group's final URL for mobile devices.
[clearPath1](#clearpath1)|void|Removes this asset group's optional first path that's appended to this asset group's display URL.
[clearPath2](#clearpath2)|void|Removes this asset group's optional second path that's appended to this asset group's display URL.
[getFinalUrl](#getfinalurl)|string|Gets the asset group's final URL.
[getMobileFinalUrl](#getmobilefinalurl)|string|Gets the asset group's final URL for mobile devices.
[getPath1](#getpath1)|string|Gets the optional first path that's appended to this asset group's display URL.
[getPath2](#getpath2)|string|Gets the optional second path that's appended to this asset group's display URL.
[setFinalUrl(String finalUrl)](#setfinalurl-string-finalurl-)|void|Sets the asset group's final URL.
[setMobileFinalUrl(String finalUrl)](#setmobilefinalurl-string-finalurl-)|void|Sets the asset group's final URL for mobile.
[setPath1](#getpath1)|string|Sets the optional first path that's appended to this asset group's display URL.
[setPath2](#getpath2)|string|Sets the optional second path that's appended to this asset group's display URL.

## <a name="clearmobilefinalurl"></a>clearMobileFinalUrl
Removes the asset group's final URL for mobile devices.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="clearpath1"></a>clearPath1
Removes this asset group's optional first path that's appended to this asset group's display URL.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="clearpath2"></a>clearPath2
Removes this asset group's optional second path that's appended to this asset group's display URL.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="getfinalurl"></a>getFinalUrl
Gets the asset group's final URL.

### Returns
|Type|Description|
|-|-
string|The asset group's final URL.


## <a name="getmobilefinalurl"></a>getMobileFinalUrl
Gets the asset group's final URL for mobile devices.

### Returns
|Type|Description|
|-|-
string|The asset group's final URL for mobile devices.


## <a name="getpath1"></a>getPath1
Gets the optional first path that's appended to this asset group's display URL.

### Returns
|Type|Description|
|-|-
string|The first path that's appended to this asset group's display URL.


## <a name="getpath2"></a>getPath2
Gets the optional second path that's appended to this asset group's display URL.

### Returns
|Type|Description|
|-|-
string|The second path that's appended to this asset group's display URL.


## <a name="setfinalurl-string-finalurl-"></a>setFinalUrl(String finalUrl)
Sets the asset group's final URL. 

[!INCLUDE[final-url](../includes/final-url.md)]

If the property's value is not valid, the call silently fails. To confirm whether the property was actually updated, get the object again and test whether the property's value equals the new value. For information, see [Handling errors and warnings](../concepts/errors-and-warnings.md).

### Arguments
|Name|Type|Description|
|-|-|-
finalUrl|string|The asset group's final URL.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setmobilefinalurl-string-finalurl-"></a>setMobileFinalUrl(String finalUrl)
Sets the asset group's final URL for mobile devices.

### Arguments
|Name|Type|Description|
|-|-|-
finalUrl|string|The asset group's final URL mobile devices.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setpath1"></a>setPath1
Sets the optional first path that's appended to this asset group's display URL.

### Returns
|Type|Description|
|-|-
string|The first path that's appended to this asset group's display URL.


## <a name="setpath2"></a>setPath2
Sets the optional second path that's appended to this asset group's display URL.

### Returns
|Type|Description|
|-|-
string|The second path that's appended to this asset group's display URL.
