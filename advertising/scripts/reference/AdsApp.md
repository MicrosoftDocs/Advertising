---
title: "AdsApp object"
description: "The top-level object used in single-account scripts to navigate all entities in a single account."
author: rgaritta
ms.author: v-rgaritta
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# AdsApp

This is the top-level object used to access and manage a single account.

> [!NOTE]
> This object replaces the [BingAdsApp](BingAdsApp.md) object. For the immediate future, Scripts will continue to support BingAdsApp for backwards compatibility; however, you're encouraged to update your scripts to use this object at your earliest convenience.

## Methods

|Method Name|Return Type|Description|
|-|-|-
[adGroups](#adgroups)|[AdGroupSelector](./AdGroupSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of ad groups in this account.
[ads](#ads)|[AdSelector](./AdSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of ads in this account.
[budgets](#budgets)|[BudgetSelector](./BudgetSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of shared budgets in this account.
[campaigns](#campaigns)|[CampaignSelector](./CampaignSelector.md)|Gets a selector used to filter the list of campaigns in this account.
[createLabel(string name, string description, string backgroundColor)](#createlabel-string-name-string-description-string-backgroundcolor-)|void|Creates a label.
[currentAccount](#currentaccount)|[Account](./Account.md)|Gets the account that the script is currently processing.
[getExecutionInfo](#getexecutioninfo)|[ExecutionInfo](./ExecutionInfo.md)|Returns information about the environment in which the script is currently executing.
[keywords](#keywords)|[KeywordSelector](./KeywordSelector.md)|Gets a selector used to filter the list of keywords in this account.
[labels](#labels)|[LabelSelector](./LabelSelector.md)|Gets a [selector](../concepts/selectors.md) used to filter the list of labels in this account.
[negativeKeywordLists](#negativekeywordlists)|[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|Gets a selector used to filter the list of negative keyword lists in this account.
[newNegativeKeywordListBuilder](#newnegativekeywordlistbuilder)|[NegativeKeywordListBuilder](./NegativeKeywordListBuilder.md)|Gets a builder used to add a negative keyword list to this account.
[productGroups](#productgroups)|[ProductGroupSelector](./ProductGroupSelector.md)|Gets a selector used to filter the list of product groups in this account.
[shoppingAdGroups](#shoppingadgroups)|[AdGroupSelector](./AdGroupSelector.md)|Gets a selector used to filter the list of ad groups used for shopping in this account.
[shoppingCampaigns](#shoppingcampaigns)|[CampaignSelector](./CampaignSelector.md)|Gets a selector used to filter the list of campaigns used for shopping in this account.
[userLists](#userLists)|[UserListSelector](./UserListSelector.md)|Gets a selector used to filter the list of user lists in this account.


## <a name="adgroups"></a>adGroups

Gets a [selector](../concepts/selectors.md) used to filter the list of ad groups in this account. 

### Returns

|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|A selector used to filter the list of ad groups in the current account.


## <a name="ads"></a>ads

Gets a [selector](../concepts/selectors.md) used to filter the list of ads in this account. 

### Returns

|Type|Description|
|-|-
[AdSelector](./AdSelector.md)|A selector used to filter the list of ads in the current account.


## <a name="budgets"></a>budgets

Gets a [selector](../concepts/selectors.md) used to filter the list of shared budgets in this account. 

This method returns only shared budgets. To get unshared (individual campaign) budgets, call the specific campaign's [getBudget](Campaign.md#getbudget) method. The campaign's budget is not shared if the `isExplicitlyShared` method returns **false**.

### Returns

|Type|Description|
|-|-
[BudgetSelector](./BudgetSelector.md)|A selector used to filter the list of shared budgets in the current account.


## <a name="campaigns"></a>campaigns

Gets a [selector](../concepts/selectors.md) used to filter the list of campaigns in this account. 

### Returns

|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|A selector used to filter the list of campaigns in the current account.


## <a name="createlabel-string-name-string-description-string-backgroundcolor-"></a>createLabel(string name, string description, string backgroundColor)
Creates a label. 

For limits on the number of labels you may create per account, see [Limits](/advertising/guides/entity-hierarchy-limits#label). For an example that adds a label to an account, see [Using labels](../examples/labels.md).

### Arguments
|Name|Type|Description|
|-|-|-
backgroundColor|string|Optional. The background color to use in the UX for the label. You may specify the color using:<ul><li>A three-byte hexadecimal number in the form, #RRGGBB. For example, #CB0400.</li><li>One of the 16 known CSS color names. For example, aqua, yellow, and fuchsia.</li></ul>Consider accessability when choosing the color. If not specified, a random color is chosen for you.
description|string|Optional. A description that describes the label's use. The maximum size is 200 characters.<br /><br />If you specify `backgroundColor`, you must provide a description or an empty string ("").
name|string|Required. The label's name. The name is case sensitive and must be unique within the account. The maximum size is 80 characters. The method trims leading and trailing whitespace from the name. 

### Returns
|Type|Description|
|-|-
void|Returns nothing.


## <a name="currentaccount"></a>currentAccount

Gets the account that the script is currently processing.

> [!NOTE]
> To use this method in a multi-account scenario, first select an account to manage. If you call this method before selecting an account, the call returns null.

### Returns

|Type|Description|
|-|-
[Account](./Account.md)|The account that the script is currently processing. To see how to use this in a multi-account scenario, see the [select](AccountsApp.md#select-bingadsaccount-account-) method of [AccountsApp](AccountsApp.md).


## <a name="getexecutioninfo"></a>getExecutionInfo
Returns information about the environment in which the script is currently executing.

### Returns:
|Type|Description|
|-|-
[ExecutionInfo](./ExecutionInfo.md)|Information about the environment in which the script is currently executing.


## <a name="keywords"></a>keywords

Gets a [selector](../concepts/selectors.md) used to filter the list of keywords in this account.

### Returns

|Type|Description|
|-|-
[KeywordSelector](./KeywordSelector.md)|A selector used to filter the list of keywords in the current account.


## <a name="labels"></a>labels

Gets a [selector](../concepts/selectors.md) used to filter the list of labels in this account.

### Returns

|Type|Description|
|-|-
[LabelSelector](./LabelSelector.md)|A selector used to filter the list of labels in the current account.


## <a name="negativekeywordlists"></a>negativeKeywordLists

Gets a [selector](../concepts/selectors.md) used to filter the list of negative keyword lists in this account. 

### Returns

|Type|Description|
|-|-
[NegativeKeywordListSelector](./NegativeKeywordListSelector.md)|A selector used to filter the list of negative keyword lists in the current account.


## <a name="newnegativekeywordlistbuilder"></a>newNegativeKeywordListBuilder

Gets a [builder](../concepts/builders.md) used to add a negative keyword list to this account. 

### Returns

|Type|Description|
|-|-
[NegativeKeywordListBuilder](./NegativeKeywordListBuilder.md)|A builder used to add a negative keyword list to the current account.


## <a id="productgroups"></a>productGroups

Gets a [selector](../concepts/selectors.md) used to filter the list of product groups in this account. 

### Returns

|Type|Description|
|-|-
[ProductGroupSelector](./ProductGroupSelector.md)|A selector used to filter the list of product groups in the current account.


## <a id="shoppingadgroups"></a>shoppingAdGroups

Gets a [selector](../concepts/selectors.md) used to filter the list of ad groups used for shopping in this account. 

### Returns

|Type|Description|
|-|-
[AdGroupSelector](./AdGroupSelector.md)|A selector used to filter the list of ad groups used for shopping in the current account.


## <a id="shoppingcampaigns"></a>shoppingCampaigns

Gets a [selector](../concepts/selectors.md) used to filter the list of campaigns used for shopping in this account. 

### Returns

|Type|Description|
|-|-
[CampaignSelector](./CampaignSelector.md)|A selector used to filter the list of campaigns used for shopping in the current account.


## <a name="userLists"></a>userLists

Gets a [selector](../concepts/selectors.md) used to filter the list of user lists in this account.

### Returns

|Type|Description|
|-|-
[UserListSelector](./UserListSelector.md)|A selector used to filter the list of user lists in the current account.


## See also

[Single account access](../guides/single-account-access.md)
