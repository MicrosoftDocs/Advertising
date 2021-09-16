---
title: "KeywordSelector object"
description: "Contains the methods for filtering the list of keywords to return."
author: eric-urban
ms.author: eur
ms.service: "bing-ads-scripts"
ms.topic: "article"
---

# KeywordSelector

Contains the methods for filtering and ordering a list of keywords. For information about selectors, see [Selectors](../concepts/selectors.md).

Example usage:
```javascript
    var iterator = AdsApp.keywords()
        .withCondition("AdGroupName = 'AD GROUP NAME GOES HERE'")
        .withCondition("CampaignName = 'CAMPAIGN NAME GOES HERE'")
        .get();

    while (iterator.hasNext()) {
        var keyword = iterator.next();
    }
```

## Methods
|Method Name|Return Type|Description|
|-|-|-
[forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-)|[KeywordSelector](./KeywordSelector.md)|Applies the start and end dates for selecting performance metrics.
[forDateRange(string dateRange)](#fordaterange-string-daterange-)|[KeywordSelector](./KeywordSelector.md)|Applies the predefined date range for selecting performance metrics.
[get](#get)|[KeywordIterator](./KeywordIterator.md)|Gets an iterator used to iterate through the list of keywords.
[orderBy(string orderBy)](#orderby-string-orderby-)|[KeywordSelector](./KeywordSelector.md)|Applies the specified ordering to the selected keywords.
[withCondition(string condition)](#withcondition-string-condition-)|[KeywordSelector](./KeywordSelector.md)|Applies filter criteria to the keywords.
[withIds(string[] ids)](#withids-string-ids-)|[KeywordSelector](./KeywordSelector.md)|Gets keywords with the specified IDs.
[withLimit(int limit)](#withlimit-int-limit-)|[KeywordSelector](./KeywordSelector.md)|Gets the top *n* keywords that match the selection criteria.

## <a name="fordaterange-object-datefrom-object-dateto-"></a>forDateRange(Object dateFrom, Object dateTo)
Applies the start and end dates for selecting performance metrics.

[!INCLUDE[date-range-objects](../includes/date-range-objects.md)]

### Arguments
|Name|Type|Description|
|-|-|-
dateFrom|Object|The start date of the date range that specifies the performance data to include in the selector.
dateTo|Object|The end date of the date range that specifies the performance data to include in the selector.

### Returns
|Type|Description|
|-|-
[KeywordSelector](./KeywordSelector.md)|Selector with date range applied.

## <a name="fordaterange-string-daterange-"></a>forDateRange(String dateRange)
Applies the predefined date range for selecting performance metrics.

[!INCLUDE[date-range-constants](../includes/date-range-constants.md)] 

[!INCLUDE[date-range-conditions-message](../includes/date-range-conditions-message.md)]

### Arguments
|Name|Type|Description|
|-|-|-
dateRange|String|The predefined date range string that specifies the performance data to include in the selector. The predefined date range string is case sensitive.

### Returns
|Type|Description|
|-|-
[KeywordSelector](./KeywordSelector.md)|Selector with date range applied.

## <a name="get"></a>get
Gets an [iterator](../concepts/iterators.md) used to iterate through the list of keywords.

### Returns
|Type|Description|
|-|-
[KeywordIterator](./KeywordIterator.md)|An iterator used to iterate through the selected keywords.

## <a name="orderby-string-orderby-"></a>orderBy(string orderBy)
Applies the specified ordering to the selected keywords.

Specify the *orderBy* parameter in the form, "columnName orderDirection" where:

- *columnName* is one of the [supported columns](#supported-keyword-columns).
- *orderDirection* is the order to sort the results in. Set to ASC to order the results in ascending order or DESC to order the results in descending order. The default is ASC.

For example, the following call returns results in ascending order by AverageCpc.

`selector = selector.orderBy("AverageCpc");`

[!INCLUDE[order-by-limit](../includes/order-by-limit.md)]

### Arguments
|Name|Type|Description|
|-|-|-
orderBy|string|The ordering to apply.

### Returns
|Type|Description|
|-|-
[KeywordSelector](./KeywordSelector.md)|Selector with ordering applied.

## <a name="withcondition-string-condition-"></a>withCondition(String condition)
Applies filter criteria to the keywords. 

Specify the *condition* parameter in the form, "columnName operator value" where: 

- *columnName* is one of the [supported columns](#supported-keyword-columns). If *columName* is set to a performance metric column name, you must specify a date range using [forDateRange(String dateRange)](#fordaterange-string-daterange-) or [forDateRange(Object dateFrom, Object dateTo)](#fordaterange-object-datefrom-object-dateto-).
- *operator* is one of the supported [operators](#operators).

[!INCLUDE[operators](../includes/operators.md)]

<a name="supported-keyword-columns"></a>
Supported columns for keyword filtering. The column names are case sensitive.

The following are the performance metrics columns you may specify.

|Column|Type|Example|Microsoft Advertising web UI filter
|-|-|-|-
AbsoluteTopImpressionRate|double|`withCondition("AbsoluteTopImpressionRate > 0.25")`|Abs. Top Impr. Rate
AverageCpc|double|`withCondition("AverageCpc < 2.75")`|Avg. CPC
AverageCpm|double|`withCondition("AverageCpm > 0.65")`|Avg. CPM
ClickConversionRate|double|`withCondition("ClickConversionRate > 0.25")`|Conv. Rate
Clicks|long|`withCondition("Clicks >= 33")`|Clicks
ConvertedClicks|long|`withCondition("ConvertedClicks >= 10")`|Conv.
Cost|double|`withCondition("Cost > 3.25")`<br /><br />The cost is in the account's currency.|Spend
Ctr|double|`withCondition("Ctr > 0.05")`<br /><br />The CTR is in the range 0..1, so use 0.05 for a 5% CTR.|CTR
Impressions|long|`withCondition("Impressions > 10")`|Impr.
TopImpressionRate|double|`withCondition("TopImpressionRate > 0.25")`|Top Impr. Rate

The following are the entity properties you may specify.

|Column|Type|Example|Microsoft Advertising web UI filter
|-|-|-|-
Status|enumeration|The keyword's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>`withCondition("Status = ENABLED")`|Status
CombinedApprovalStatus|string|The keyword's approval status. Possible case-sensitive values are: <ul><li>APPROVED</li><li>APPROVED_LIMITED</li><li>UNDER_REVIEW</li><li>DISAPPROVED</li></ul>For information about these values, see [Editorial approval status values](../concepts/editorial-approval.md).<br /><br />This example returns keywords that need attention.<br /><br />`withCondition("CombinedApprovalStatus IN ['APPROVED_LIMITED', 'DISAPPROVED']")`
Text|string|The keyword's text. Include only the keyword's text. Don't include the keyword's match type in the text. For example, if the keyword is an exact match keyword such as [books], use *books* not *[books]*.<br /><br />`withCondition("Text STARTS_WITH 'flowers'")`|Keyword Text
KeywordMatchType|enumeration|The keyword's match type. Possible case-sensitive values are: <ul><li>BROAD</li><li>EXACT</li><li>PHRASE</li></ul>`withCondition("KeywordMatchType = EXACT")`|Match type
MaxCpc|double|The keyword's maximum CPC bid amount. The CPC is in the account's currency.<br /><br />`withCondition("MaxCpc > 0.40")`|Bid
DestinationUrl|string|`withCondition("DestinationUrl STARTS_WITH 'http://www.contoso.com'")`|Destination URL
FinalUrls|string|`withCondition("FinalUrls CONTAINS 'http://www.contoso.com'")`|
QualityScore|int|`withCondition("QualityScore > 5")`|Qual. score
FirstPageCpc|double|The average amount an advertiser is charged each time their ad is clicked when it shows up on the sidebar. For example, if an advertiser paid a total of $48.35 for 300 clicks, the advertiser's average CPC is $0.16. Use this information to help decide whether to increase your keyword bid to improve the chance that your ad shows up on the sidebar. The CPC is in the account's currency.<br /><br />`withCondition("FirstPageCpc > 6.00")`|Est. first page bid
TopOfPageCpc|double|The average amount an advertiser is charged each time their ad is clicked when it shows up above the organic search results. For example, if an advertiser paid a total of $48.35 for 300 clicks, the advertiser's average CPC is $0.16. Use this information to help decide whether to increase your keyword bid to improve the chance that your ad shows up above the organic search results. The CPC is in the currency of the current account.<br /><br />`withCondition("TopOfPageCpc > 8.00")`|Best position
AdGroupName|string|The name of the ad group that contains the keywords.<br /><br />`withCondition("AdGroupName = 'foo'")`|
AdGroupStatus|enumeration|The ad group's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>`withCondition("AdGroupStatus = ENABLED")`|
CampaignName|string|The name of the campaign that contains the keywords.<br /><br />`withCondition("CampaignName = 'bar'")`|
CampaignStatus|enumeration|The campaign's status. Possible case-sensitive values are: <ul><li>ENABLED</li><li>PAUSED</li><li>REMOVED</li></ul>`withCondition("CampaignStatus = ENABLED")`|
LabelNames|string set|A list of one or more case-sensitive label names. Use to get keywords associated with the named labels.<br /><br />`withCondition("LabelNames  CONTAINS_ANY ['bar', 'foo']")`|
Id|Long|The ID of the keyword to test. For example, you can use this column to check for keywords with IDs greater than the specified ID.<br /><br />`withCondition('Id > 1234')`


### Arguments
|Name|Type|Description|
|-|-|-
condition|string|The condition to add to the selector.

### Returns
|Type|Description|
|-|-
[KeywordSelector](./KeywordSelector.md)|Selector with the condition applied.

## <a name="withids-string-ids-"></a>withIds(string[] ids)
Gets keywords with the specified IDs.

[!INCLUDE[with-ids-chaining](../includes/with-ids-chaining.md)] For example, the following call selects only keyword 33333.

```javascript
AdsApp.keywords()
    .withIds(['11111', '22222', '33333'])
    .withIds(['33333', '44444', '55555']);
```

### Arguments
|Name|Type|Description|
|-|-|-
ids|string[]|An array of keyword IDs. For limits, see [Script execution limits](../concepts/execution-limits.md).

### Returns
|Type|Description|
|-|-
[KeywordSelector](./KeywordSelector.md)|Selector with the IDs applied.

## <a name="withlimit-int-limit-"></a>withLimit(int limit)
Gets the top *n* keywords that match the selection criteria.

### Arguments
|Name|Type|Description|
|-|-|-
limit|int|The number of keywords to return. The actual number may be less.

### Returns
|Type|Description|
|-|-
[KeywordSelector](./KeywordSelector.md)|Selector with limit applied.



## See also

- [AdsApp.keywords()](AdsApp.md)
- [KeywordIterator](./KeywordIterator.md)
- [Keyword](./Keyword.md)

