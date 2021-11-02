---
title: "Ad object"
description: "The base object that ads such as expanded text ads derive from."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# Ad

The base object that ads, such as expanded text ads, derive from. 

This object also represents standard text ads. You may no longer create standard text ads but you may retrieve, pause, remove, and enable them. The following methods do not apply to derived objects and should not be called.

- getDestinationUrl()
- getDisplayUrl()
- getHeadline()
- isMobilePreferred()


## Methods
|Method Name|Return Type|Description|
|-|-|-
[applyLabel(string name)](#applylabel-string-name-)|void|Applies the label to this ad. 
[asType](#astype)|[AdViewSpace](AdViewSpace.md)|Contains the methods used to cast this ad to a specific ad type.
[enable](#enable)|void|Enables this ad.
[getAdGroup](#getadgroup)|[AdGroup](Adgroup.md)|Gets the ad group that this ad belongs to.
[getCampaign](#getcampaign)|[Campaign](Campaign.md)|Gets the campaign that this ad belongs to.
[getDescription](#getdescription)|string|Gets this ad's copy text.
[getDestinationUrl](#getdestinationurl)|string|Gets the URL of the webpage that the user is taken to when they click the ad.
[getDisplayUrl](#getdisplayurl)|string|Gets the URL that's displayed in the ad.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getHeadline](#getheadline)|string|Gets this ad's title.
[getId](#getid)|string|Gets the ID that uniquely identifies this ad.
[getPolicyApprovalStatus](#getpolicyapprovalstatus)|string|Gets this ad's editorial approval status.
[getStats](#getstats)|[Stats](Stats.md)|Gets this ad's performance data.
[getType](#gettype)|string|Gets this ad's derived type.
[isEnabled](#isenabled)|boolean|Gets a Boolean value that indicates whether this ad is enabled.
[isMobilePreferred](#ismobilepreferred)|boolean|Gets a Boolean value that indicates whether the preference is for this ad to be displayed on mobile devices or all devices.
[isPaused](#ispaused)|Boolean|Gets a Boolean value that indicates whether this ad is paused.
[isType](#istype)|[AdTypeSpace](AdTypeSpace.md)|Contains the methods used to test if an ad is of the specified type.
[labels](#labels)|[LabelSelector](./LabelSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of labels associated with this ad.
[pause](#pause)|void|Pauses this ad.
[remove](#remove)|void|Removes this ad.
[removeLabel(string name)](#removelabel-string-name-)|void|Removes the label from this ad.
[urls](#urls)|[AdUrls](AdUrls.md)|Contains the methods used to get this ad's final URLs, tracking template, and custom parameters.


## <a name="applylabel-string-name-"></a>applyLabel(string name)
Applies the label to the ad.

You may apply a maximum of 50 labels to an ad. For an example that adds a label to an entity, see [Using labels](../examples/labels.md).

### Arguments
|Name|Type|Description|
|-|-|-
name|string|The label's case-sensitive name. To get a list of labels in this account that you can apply, see [AdsApp.labels](AdsApp.md#labels). 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="astype"></a>asType
Contains the methods used to cast this ad to a specific ad type.

### Returns
|Type|Description|
|-|-
[AdViewSpace](AdViewSpace.md)|Contains the methods used to cast this ad to a specific ad type.


## <a name="enable"></a>enable
Enables this ad.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="getadgroup"></a>getAdGroup
Gets the ad group that this ad belongs to.

### Returns
|Type|Description|
|-|-
[AdGroup](Adgroup.md)|The ad group that this ad belongs to.


## <a name="getcampaign"></a>getCampaign
Gets the campaign that this ad belongs to.

### Returns
|Type|Description|
|-|-
[Campaign](Campaign.md)|The campaign that this ad belongs to.


## <a name="getdescription"></a>getDescription
Gets this ad's copy text.

### Returns
|Type|Description|
|-|-
string|The ad's copy text.


## <a name="getdestinationurl"></a>getDestinationUrl
Gets the URL of the webpage that the user is taken to when they click the ad.

### Returns
|Type|Description|
|-|-
string|The URL of the webpage that the user is taken to when they click the ad. Returns null if called from a derived object.


## <a name="getdisplayurl"></a>getDisplayUrl
Gets the URL that's displayed in the ad.

### Returns
|Type|Description|
|-|-
string|The URL that's displayed in the ad. Returns null if called from a derived object.


## <a name="getentitytype"></a>getEntityType
Gets this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *Ad*.


## <a name="getheadline"></a>getHeadline
Gets this ad's title.

### Returns
|Type|Description|
|-|-
string|The ad's title. Returns null if called from a derived object.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this ad.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this ad.


## <a name="getpolicyapprovalstatus"></a>getPolicyApprovalStatus
Gets this ad's editorial approval status.

### Returns
|Type|Description|
|-|-
string|The ad's editorial approval status. The following are the possible values.<ul><li>APPROVED</li><li>APPROVED_LIMITED</li><li>UNDER_REVIEW</li><li>DISAPPROVED</li></ul>


## <a name="getstats"></a>getStats
Gets this ad's performance data. 

To call this method, you must include one of the `forDateRange` methods in the [ad selector's](AdSelector.md) chain.

### Returns
|Type|Description|
|-|-
[Stats](Stats.md)|The ad's performance data.


## <a name="gettype"></a>getType
Gets this ad's derived type.

### Returns
|Type|Description|
|-|-
string|This ad's derived type. The following are the possible types.<ul><li>EXPANDED_TEXT_AD</li></ul>.


## <a name="isenabled"></a>isEnabled
Gets a Boolean value that indicates whether this ad is enabled.

### Returns
|Type|Description|
|-|-
boolean|Is **true** if this ad is enabled; otherwise, **false**.


## <a name="ismobilepreferred"></a>isMobilePreferred
Gets a Boolean value that indicates whether the preference is for this ad to be displayed on mobile devices or all devices.

### Returns
|Type|Description|
|-|-
boolean|Is **true** if the preference is for this ad to be displayed on mobile devices. If **false**, the preference is for this ad to be displayed on all devices.


## <a name="ispaused"></a>isPaused
Gets a Boolean value that indicates whether this ad is paused.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this ad is paused; otherwise, **false**.


## <a name="istype"></a>isType
Contains the methods used to test if an ad is of the specified type.

### Returns
|Type|Description|
|-|-
[AdTypeSpace](AdTypeSpace.md)|Contains the methods used to test if an ad is of the specified type.


## <a name="labels"></a>labels

Gets a [selector](../concepts/selectors.md) used to filter the list of labels associated with this ad.

### Returns

|Type|Description|
|-|-
[LabelSelector](./LabelSelector.md)|A selector used to filter the list of labels associated with this ad.


## <a name="pause"></a>pause
Pauses this ad.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="remove"></a>remove
Removes this ad.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="removelabel-string-name-"></a>removeLabel(string name)
Removes the label from the ad.

### Arguments
|Name|Type|Description|
|-|-|-
name|string|The label's case-sensitive name. To get a list of labels associated with this ad, see [labels](#labels). 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="urls"></a>urls
Contains the methods used to get this ad's final URLs, tracking template, and custom parameters.

### Returns
|Type|Description|
|-|-
[AdUrls](AdUrls.md)|The object used to get this ad's final URLs, tracking template, and custom parameters.


## See also

- [AdIterator.next()](AdIterator.md#next)
- [AdOperation.getResult()](AdOperation.md#getresult)
- [ExpandedTextAd](ExpandedTextAd.md)
