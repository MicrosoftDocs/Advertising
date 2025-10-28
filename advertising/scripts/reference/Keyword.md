---
title: "Keyword object"
description: "Contains the methods for managing a keyword."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# Keyword
Contains the methods for managing a keyword. For information about keywords, see [Keyword](/advertising/guides/entity-hierarchy-limits#keyword).


## Methods
|Method Name|Return Type|Description|
|-|-|-
[adParams](#adparams)|[AdParamSelector](AdParamSelector.md)|Gets a selector used to get all substitution parameters used in the ad for this keyword.
[applyLabel(string name)](#applylabel-string-name-)|void|Applies the label to this keyword. 
[bidding](#bidding)|[KeywordBidding](./KeywordBidding.md)|Gets the methods used to manage this keyword's bid amount.
[clearDestinationUrl](#cleardestinationurl)|void|Removes this keyword's destination URL.
[enable](#enable)|void|Enables this keyword.
[getAdGroup](#getadgroup)|[AdGroup](AdGroup.md)|Gets the ad group that this keyword belongs to.
[getApprovalStatus](#getapprovalstatus)|string|Gets this keyword's editorial approval status.
[getCampaign](#getcampaign)|[Campaign](./Campaign.md)|Gets the campaign that this keyword belongs to.
[getEntityType](#getentitytype)|string|Gets this entity's type.
[getFirstPageCpc](#getfirstpagecpc)|double|Gets the estimated bid needed to be on the first page of the search results.
[getId](#getid)|string|Gets the ID that uniquely identifies this keyword.
[getMatchType](#getmatchtype)|string|Gets this keyword's match type.
[getQualityScore](#getqualityscore)|integer|Gets this keyword's quality score.
[getStats](#getstats)|[Stats](./Stats.md)|Gets this keyword's performance data.
[getText](#gettext)|string|Gets the keyword's text.
[getTopOfPageCpc](#gettopofpagecpc)|double|Gets the estimated bid needed to be at the top of the search results.
[isEnabled](#isenabled)|Boolean|Gets a Boolean value that indicates whether this keyword is enabled.
[isPaused](#ispaused)|Boolean|Gets a Boolean value that indicates whether this keyword is paused.
[labels](#labels)|[LabelSelector](./LabelSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of labels associated with this keyword.
[pause](#pause)|void|Pauses this keyword.
[remove](#remove)|void|Removes this keyword.
[removeLabel(string name)](#removelabel-string-name-)|void|Removes the label from this keyword.
[setAdParam(int index, string insertionText)](#setadparam-int-index-string-insertiontext-)|void|Adds the substitution parameter and sets its value to the specified text.
[urls](#urls)|[KeywordUrls](./KeywordUrls.md)|Gets the methods used to manage this keywords's final URLs, tracking template, and custom parameters.


## <a name="adparams"></a>adParams
Gets a selector of all substitution parameters used in ads for this keyword.

The substitution values are used in an ad if the ad's title, text, display URL, or destination URL contains the {Param1}, {Param2}, or {Param3} dynamic substitution string.

### Returns
|Type|Description|
|-|-
[AdParamSelector](AdParamSelector.md)|The selector that contains the list of substitution parameters for this keyword.


## <a name="applylabel-string-name-"></a>applyLabel(string name)
Applies the label to the keyword.

You may apply a maximum of 50 labels to a keyword. For an example that adds a label to a keyword, see [Using labels](../examples/labels.md).

### Arguments
|Name|Type|Description|
|-|-|-
name|string|The label's case-sensitive name. To get a list of labels in this account that you can apply, see [AdsApp.labels](AdsApp.md#labels). 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="bidding"></a>bidding
Gets the methods used to manage this keyword's bid amount.

### Returns
|Type|Description|
|-|-
[KeywordBidding](./KeywordBidding.md)|Contains the methods used to manage this keyword's bid amount.


## <a name="cleardestinationurl"></a>clearDestinationUrl
Removes this keyword's destination URL.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="enable"></a>enable
Enables this keyword.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="getadgroup"></a>getAdGroup
Gets the ad group that this keyword belongs to.

### Returns
|Type|Description|
|-|-
[AdGroup](AdGroup.md)|The ad group that this keyword belongs to.


## <a name="getapprovalstatus"></a>getApprovalStatus
Gets this keyword's editorial approval status.

### Returns
|Type|Description|
|-|-
string|The keyword's editorial approval status. The status indicates whether the keyword is under review, is approved, or is not allowed. Possible values are:<br /><ul><li>APPROVED</li><li>APPROVED_LIMITED</li><li>DISAPPROVED</li><li>UNDER_REVIEW</li></ul>For information about how these status values map to Bing Ads API, see [Mapping editorial approval status values](../concepts/editorial-approval.md).


## <a name="getcampaign"></a>getCampaign
Gets the campaign that this keyword belongs to.

### Returns
|Type|Description|
|-|-
[Campaign](./Campaign.md)|The campaign that this keyword belongs to.


## <a name="getentitytype"></a>getEntityType
Returns this entity's type.

### Returns
|Type|Description|
|-|-
string|This entity's type, which is *Keyword*.


## <a name="getid"></a>getId
Gets the ID that uniquely identifies this keyword.

### Returns
|Type|Description|
|-|-
string|The ID that uniquely identifies this keyword.


## <a name="getfirstpagecpc"></a>getFirstPageCpc
Gets the estimated bid needed for the ad to show up on the sidebar.

### Returns
|Type|Description|
|-|-
double|The estimated bid needed for the ad to show up on the sidebar.


## <a name="getmatchtype"></a>getMatchType
Gets this keyword's match type. 

### Returns
|Type|Description|
|-|-
string|The keyword's match type. Possible values are:<br /><ul><li>BROAD</li><li>PHRASE</li><li>EXACT</li></ul>For information about these types, see [What are keyword match types, and how do I use them?](https://help.ads.microsoft.com/apex/index/3/en-us/50822#!)


## <a name="getqualityscore"></a>getQualityScore
Gets this keyword's quality score. 

### Returns
|Type|Description|
|-|-
integer|The keyword's quality score. The score is in the range 1 through 10 (highest). If the keyword's quality score cannot be computed, this method returns NULL.<br/><br/>The score shows you how competitive your ads are in the marketplace by measuring how relevant your keywords and landing pages are to customers' search terms. For more information, see [Keyword Performance Report](/advertising/reporting-service/keywordperformancereportcolumn#qualityscore). 


## <a name="getstats"></a>getStats
Gets this keywords performance data. 

To call this method, you must include one of the `forDateRange` methods in the [keyword selector's](KeywordSelector.md) chain.

### Returns
|Type|Description|
|-|-
[Stats](./Stats.md)|The keyword's performance data. For example, clicks and impressions.


## <a name="gettext"></a>getText
Gets the keyword's text. The text includes the keyword's match type syntax, if any. For example:

- The keyword is *books* if the match type is **broad**, or *+books* if the keyword uses the broad type modifier 
- The keyword is *"books"* if the match type is **phrase**
- The keyword is *[hardcover books]* if the match type is **exact**

For information about these types, see [What are keyword match types, and how do I use them?](https://help.ads.microsoft.com/apex/index/3/en-us/50822#!)

### Returns
|Type|Description|
|-|-
string|The keyword's text.


## <a name="gettopofpagecpc"></a>getTopOfPageCpc
Gets the estimated bid needed for the ad to show up above the organic search results.

### Returns
|Type|Description|
|-|-
double|The estimated bid needed for the ad to show up above the organic search results.


## <a name="isenabled"></a>isEnabled
Gets a Boolean value that indicates whether this keyword is enabled.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this keyword is enabled; otherwise, **false**.


## <a name="ispaused"></a>isPaused
Gets a Boolean value that indicates whether this keyword is paused.

### Returns
|Type|Description|
|-|-
Boolean|Is **true** if this keyword is paused; otherwise, **false**.


## <a name="labels"></a>labels

Gets a [selector](../concepts/selectors.md) used to filter the list of labels associated with this keyword.

### Returns

|Type|Description|
|-|-
[LabelSelector](./LabelSelector.md)|A selector used to filter the list of labels associated with this keyword.


## <a name="pause"></a>pause
Pauses this keyword.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="remove"></a>remove
Removes this keyword.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="removelabel-string-name-"></a>removeLabel(string name)
Removes the label from the keyword.

### Arguments
|Name|Type|Description|
|-|-|-
name|string|The label's case-sensitive name. To get a list of labels associated with this keyword, see [labels](#labels). 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="setadparam-int-index-string-insertiontext-"></a>setAdParam(int index, string insertionText)
Adds the substitution parameter and sets its value to the specified text. If the substitution parameter exists, it's text is overwritten.

The substitution values are used in an ad if the ad's title, text, display URL, or final URL contains the {Param1}, {Param2}, or {Param3} dynamic substitution strings. For restrictions and information about using these parameters, see [Param1](/advertising/campaign-management-service/keyword#param1), [Param2](/advertising/campaign-management-service/keyword#param2), and [Param3](/advertising/campaign-management-service/keyword#param3).

The substitution values are also used in the tracking template if the template specifies the {param1:default}, {param2:default}, or {param3:default} placeholders. 

### Arguments
|Name|Type|Description|
|-|-|-
index|int|The index of the substitution parameter to set. Valid index values are 1 through 3, inclusive. Use 1 for Param1, 2 for Param2, and 3 for Param3.
insertionText|string|The text to set the substitution parameter to.

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="urls"></a>urls
Gets the methods used to manage this keywords's final URLs, tracking template, and custom parameters.

### Returns
|Type|Description|
|-|-
[KeywordUrls](./KeywordUrls.md)|Contains the methods used the keyword's final URLs, tracking template, and custom parameters.



## See also

- [KeywordSelector](./KeywordSelector.md)
- [KeywordIterator](./KeywordIterator.md)
