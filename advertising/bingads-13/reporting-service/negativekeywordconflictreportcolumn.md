---
title: NegativeKeywordConflictReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the attributes columns that you can include in the NegativeKeywordConflictReportRequest.
---
# NegativeKeywordConflictReportColumn Value Set - Reporting
Defines the attributes columns that you can include in the [NegativeKeywordConflictReportRequest](negativekeywordconflictreportrequest.md).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

## Syntax
```xml
<xs:simpleType name="NegativeKeywordConflictReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="Keyword" />
    <xs:enumeration value="KeywordId" />
    <xs:enumeration value="NegativeKeyword" />
    <xs:enumeration value="ConflictLevel" />
    <xs:enumeration value="BidMatchType" />
    <xs:enumeration value="NegativeKeywordListId" />
    <xs:enumeration value="NegativeKeywordList" />
    <xs:enumeration value="NegativeKeywordId" />
    <xs:enumeration value="NegativeKeywordMatchType" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="KeywordStatus" />
    <xs:enumeration value="ConflictType" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [NegativeKeywordConflictReportColumn](negativekeywordconflictreportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [BidMatchType](#bidmatchtype), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [ConflictLevel](#conflictlevel), [ConflictType](#conflicttype), [Keyword](#keyword), [KeywordId](#keywordid), [KeywordStatus](#keywordstatus), [NegativeKeyword](#negativekeyword), [NegativeKeywordId](#negativekeywordid), [NegativeKeywordList](#negativekeywordlist), [NegativeKeywordListId](#negativekeywordlistid), [NegativeKeywordMatchType](#negativekeywordmatchtype).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="accountstatus"></a>AccountStatus|The current account status.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The current ad group status.|
|<a name="bidmatchtype"></a>BidMatchType|The keyword bid match type. This can be different from the *DeliveredMatchType* column, for example if you bid on a broad match and the search term was an exact match. For more information, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md). The possible values are *Broad*, *Exact*, *Phrase*, and *Unknown*.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The current campaign status.|
|<a name="conflictlevel"></a>ConflictLevel|The entity level where the keyword and negative keyword conflict occurs. The possible values are AdGroup and Campaign.|
|<a name="conflicttype"></a>ConflictType|The type of negative keyword conflict encountered.<br/><br/>Some advertisers intentionally create negative keyword conflicts to block a portion of match type traffic. For example, if your phrase match keywords are "stereo plug," you might also choose "stereo plug" as an exact match negative keyword text to match only with this phrase. In this scenario, customers that are searching for specific items like "3.5mm stereo plug" or "gold stereo plug" would see ads for the "stereo plug" phrase match keyword, but customers searching for "stereo plug" would not see ads for the exact match keyword.<br/><br/>The possible values are *Possibly intentional conflict* and *True conflict*.<br/><br/>*Possibly intentional conflict* - The text of the keyword, after normalization (e.g. punctuation, capitalization removed), and the negative keyword are identical, and the match type of the negative keyword is more restrictive than the match type of the keyword (e.g. Keyword is phrase match, negative keyword is exact match).<br/><br/>*True conflict* - Any other negative keyword conflict.<br/><br/>If you are an advertiser who intentionally blocks a portion of match type traffic, you can use this column to filter out intentional negative keyword conflicts. If you're not, you should investigate and fix both types of conflicts.|
|<a name="keyword"></a>Keyword|The keyword text.|
|<a name="keywordid"></a>KeywordId|The Microsoft Advertising assigned identifier of a keyword.|
|<a name="keywordstatus"></a>KeywordStatus|The current keyword status.|
|<a name="negativekeyword"></a>NegativeKeyword|The negative keyword text.|
|<a name="negativekeywordid"></a>NegativeKeywordId|The Microsoft Advertising assigned identifier of a negative keyword.|
|<a name="negativekeywordlist"></a>NegativeKeywordList|The name of the negative keyword list.|
|<a name="negativekeywordlistid"></a>NegativeKeywordListId|The Microsoft Advertising assigned identifier of a negative keyword list.|
|<a name="negativekeywordmatchtype"></a>NegativeKeywordMatchType|The type of match to compare the negative keyword and the user's search term. The possible values for a negative keyword are *Exact* and *Phrase*.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

> [!NOTE]
> The TimePeriod column is expected for all aggregation types except Summary. It is important to note that if you do not include TimePeriod, the aggregation you chose will be ignored and Summary aggregation will be used regardless.

|Column|
|----------|
|AccountName|
|Keyword|
|NegativeKeyword|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[NegativeKeywordConflictReportRequest](negativekeywordconflictreportrequest.md)  
