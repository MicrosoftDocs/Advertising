---
title: "CampaignUrls object"
description: "Contains the methods for managing the campaign's URLs."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# CampaignUrls

Contains the methods for managing the campaign's URLs. For more information, see [URL Tracking with Upgraded URLs](/advertising/guides/url-tracking-upgraded-urls).

## Methods
|Method Name|Return Type|Description|
|-|-|-
[clearTrackingTemplate](#cleartrackingtemplate)|void|Removes the campaign's tracking template.
[getCustomParameters](#getcustomparameters)|Object|Gets the campaign's custom parameters.
[getTrackingTemplate](#gettrackingtemplate)|string|Gets the campaign's tracking template.
[setCustomParameters(Object customParameters)](#setcustomparameters-object-customparameters-)|void|Sets the campaign's custom parameters.
[setTrackingTemplate(String trackingTemplate)](#settrackingtemplate-string-trackingtemplate-)|void|Sets the campaign's tracking template.

## <a name="cleartrackingtemplate"></a>clearTrackingTemplate
Removes the campaign's tracking template. For information about tracking templates, see [Tracking Templates](/advertising/guides/url-tracking-upgraded-urls#trackingtemplatevalidation).

### Returns
|Type|Description|
|-|-
void|Returns nothing.

## <a name="getcustomparameters"></a>getCustomParameters
Gets the campaign's custom parameters.  

[!INCLUDE[custom-parameters](../includes/custom-parameters.md)]

### Returns
|Type|Description|
|-|-
Object|A map of the campaign's custom parameters.<br /><br />For example, `{key1: 'value1', key2: 'value2', key3: 'value3'}`, where key is the name of the custom parameter and value is the parameter's value.

## <a name="gettrackingtemplate"></a>getTrackingTemplate
Gets the campaign's tracking template. 

[!INCLUDE[tracking-templates](../includes/tracking-templates.md)]

### Returns
|Type|Description|
|-|-
string|The campaign's tracking template.

## <a name="setcustomparameters-object-customparameters-"></a>setCustomParameters(Object customParameters)
Sets the campaign's custom parameters. Use this method if the final URL or tracking template include custom substitution strings.

To use a customer parameter name in the final URL or tracking template, enclose the name in curly braces and prepend an underscore (\_) to the name. For example, if the parameter name is foo, use {_foo} in the tracking template or final URL. Do not add a leading underscore to the parameter name when defining the custom parameters object. 

Calling this method replaces the campaign's existing custom parameters.

To clear the custom parameters from the campaign, pass an empty object (for example, `setCustomParameters({})`). To completely clear custom parameters, clear the parameters at all levels.

[!INCLUDE[custom-parameters](../includes/custom-parameters.md)]


### Arguments
|Name|Type|Description|
|-|-|-
customParameters|Object|A map of up to three custom parameters to use in the campaign. For example, `{key1: 'value1', key2: 'value2', key3: 'value3'}`, where key is the custom parameter's name and value is the parameter's value. The parameter's name may contain only alphanumeric characters and the parameter's value may not contain white space. The name may contain a maximum of 16 8-byte characters and the value may contain a maximum of 200 8-byte characters.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

## <a name="settrackingtemplate-string-trackingtemplate-"></a>setTrackingTemplate(string trackingTemplate)
Sets the campaign's tracking template. 

[!INCLUDE[tracking-templates](../includes/tracking-templates.md)]

### Arguments
|Name|Type|Description|
|-|-|-
trackingTemplate|string|The tracking template to use with this campaign.

### Returns
|Type|Description|
|-|-
void|Returns nothing.

