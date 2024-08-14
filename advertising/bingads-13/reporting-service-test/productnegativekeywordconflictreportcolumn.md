---
title: ProductNegativeKeywordConflictReportColumn Value Set Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the attributes columns that you can include in the ProductNegativeKeywordConflictReportRequest.(test)
---
# ProductNegativeKeywordConflictReportColumn Value Set Test - Reporting
Defines the attributes columns that you can include in the [ProductNegativeKeywordConflictReportRequest](productnegativekeywordconflictreportrequest.md).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

## Syntax
```xml
<xs:simpleType name="ProductNegativeKeywordConflictReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="MerchantProductId" />
    <xs:enumeration value="Title" />
    <xs:enumeration value="AdGroupCriterionId" />
    <xs:enumeration value="ProductGroup" />
    <xs:enumeration value="NegativeKeywordId" />
    <xs:enumeration value="NegativeKeyword" />
    <xs:enumeration value="NegativeKeywordListId" />
    <xs:enumeration value="ConflictLevel" />
    <xs:enumeration value="NegativeKeywordMatchType" />
    <xs:enumeration value="CampaignType" />
    <xs:enumeration value="AssetGroupId" />
    <xs:enumeration value="AssetGroupName" />
    <xs:enumeration value="AssetGroupStatus" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ProductNegativeKeywordConflictReportColumn](productnegativekeywordconflictreportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AdGroupCriterionId](#adgroupcriterionid), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AssetGroupId](#assetgroupid), [AssetGroupName](#assetgroupname), [AssetGroupStatus](#assetgroupstatus), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [CampaignType](#campaigntype), [ConflictLevel](#conflictlevel), [MerchantProductId](#merchantproductid), [NegativeKeyword](#negativekeyword), [NegativeKeywordId](#negativekeywordid), [NegativeKeywordListId](#negativekeywordlistid), [NegativeKeywordMatchType](#negativekeywordmatchtype), [ProductGroup](#productgroup), [Title](#title).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="accountstatus"></a>AccountStatus|The current account status.|
|<a name="adgroupcriterionid"></a>AdGroupCriterionId|The Microsoft Advertising assigned identifier of an ad group criterion.<br/><br/>*Note*: In Performance max campaigns, this is *ListingGroupId*.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The current ad group status.|
|<a name="assetgroupid"></a>AssetGroupId|The Microsoft Advertising assigned identifier of an asset group.|
|<a name="assetgroupname"></a>AssetGroupName|The asset group name.|
|<a name="assetgroupstatus"></a>AssetGroupStatus|The asset group status.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The current campaign status.|
|<a name="campaigntype"></a>CampaignType|The campaign type.<br/><br/>Possible values include *Audience*, *Dynamic search*, *Performance max*, *Search & content*, and *Shopping*.|
|<a name="conflictlevel"></a>ConflictLevel|The entity level where the keyword and negative keyword conflict occurs. The possible values are AdGroup and Campaign.|
|<a name="merchantproductid"></a>MerchantProductId|The unique identifier provided by a merchant for each product offer.|
|<a name="negativekeyword"></a>NegativeKeyword|The negative keyword text.|
|<a name="negativekeywordid"></a>NegativeKeywordId|The Microsoft Advertising assigned identifier of a negative keyword.|
|<a name="negativekeywordlistid"></a>NegativeKeywordListId|The Microsoft Advertising assigned identifier of a negative keyword list.|
|<a name="negativekeywordmatchtype"></a>NegativeKeywordMatchType|The type of match to compare the negative keyword and the user's search term. The possible values for a negative keyword are *Exact* and *Phrase*.|
|<a name="productgroup"></a>ProductGroup|The backward slash delimited list of product conditions, reported as Operand = Attribute. The attribute values are surrounded by "" (double quotes). Here is an example: * / Category="Animals & Pet Supplies" / Category="Pet Supplies" / Category="Bird Supplies". The "\*" (single asterisk) refers to a product group that matches everything else besides the other filters for the product group.<br/><br/>*Note*: In Performance max campaigns, this is *ListingGroup*.|
|<a name="title"></a>Title|The product item name. For example the title of a book, DVD, or game.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

> [!NOTE]
> The TimePeriod column is expected for all aggregation types except Summary. It is important to note that if you do not include TimePeriod, the aggregation you chose will be ignored and Summary aggregation will be used regardless.

|Column|
|----------|
|AccountName|
|AdGroupName|
|CampaignName|
|NegativeKeyword|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ProductNegativeKeywordConflictReportRequest](productnegativekeywordconflictreportrequest.md)  
