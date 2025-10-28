---
title: "AdGroupUrls object"
description: "Contains the methods for managing the ad group's URLs."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# AdGroupUrls

Contains the methods for managing the ad group's URLs. For more information, see [URL Tracking with Upgraded URLs](/advertising/guides/url-tracking-upgraded-urls).


## Methods
|Method Name|Return Type|Description|
|-|-|-
[clearTrackingTemplate](#cleartrackingtemplate)|void|Removes the tracking template from this ad group.
[getCustomParameters](#getcustomparameters)|Object|Gets the ad group's custom parameters.
[getTrackingTemplate](#gettrackingtemplate)|string|Gets the ad group's tracking template.
[setCustomParameters(Object customParameters)](#setcustomparameters-object-customparameters-)|void|Sets the ad group's custom parameters.
[setTrackingTemplate(string trackingTemplate)](#settrackingtemplate-string-trackingtemplate-)|void|Sets the ad group's tracking template.

## <a name="cleartrackingtemplate"></a>clearTrackingTemplate
Removes the tracking template from this ad group. For information about tracking templates, see [Tracking Templates](/advertising/guides/url-tracking-upgraded-urls#trackingtemplatevalidation).

### Returns
|Type|Description|
|-|-
void|Returns nothing.

## <a name="getcustomparameters"></a>getCustomParameters
Gets the ad group's custom parameters. 

[!INCLUDE[custom-parameters](../includes/custom-parameters.md)]

### Returns
|Type|Description|
|-|-
Object|A map of the ad group's custom parameters.<br /><br />For example, `{key1: 'value1', key2: 'value2', key3: 'value3'}`, where key is the name of the custom parameter and value is the parameter's value.

## <a name="gettrackingtemplate"></a>getTrackingTemplate
Gets the ad group's tracking template.

[!INCLUDE[tracking-templates](../includes/tracking-templates.md)]

### Returns
|Type|Description|
|-|-
string|The ad group's tracking template.

## <a name="setcustomparameters-object-customparameters-"></a>setCustomParameters(Object customParameters)
Sets the ad group's custom parameters. Use this method if your final URL or tracking template includes custom substitution strings.

To use a customer parameter name in the final URL or tracking template, enclose the name in curly braces and add a leading underscore (\_) to the name. For example, if the parameter name is foo, use {_foo} in the tracking template or final URL. Do not add a leading underscore to the parameter name when defining the custom parameters object. 

Calling this method replaces the ad group's existing custom parameters.

To clear the custom parameters from the ad group, pass an empty object (for example, `setCustomParameters({})`). If you clear the ad group's custom parameters, the ad group inherits the URLs from its parent campaign (if the campaign specifies URLs). To completely clear custom parameters, clear the parameters at all levels.

[!INCLUDE[custom-parameters](../includes/custom-parameters.md)]


### Arguments
|Name|Type|Description|
|-|-|-
customParameters|Object|A map of up to three custom parameters to use in the ad group. For example, `{key1: 'value1', key2: 'value2', key3: 'value3'}`, where key is the name of the custom parameter and value is the parameter's value. The parameter's name may contain only alphanumeric characters and the parameter's value may not contain white space. The name may contain a maximum of 16 8-byte characters and the value may contain a maximum of 200 8-byte characters.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

## <a name="settrackingtemplate-string-trackingtemplate-"></a>setTrackingTemplate(string trackingTemplate)
Sets the tracking template to use with this ad group. 

[!INCLUDE[tracking-templates](../includes/tracking-templates.md)]

### Arguments
|Name|Type|Description|
|-|-|-
trackingTemplate|string|The tracking template to use with this ad group.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

