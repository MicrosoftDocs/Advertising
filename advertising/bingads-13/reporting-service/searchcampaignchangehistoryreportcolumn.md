---
title: SearchCampaignChangeHistoryReportColumn Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the attribute columns that you can include in the SearchCampaignChangeHistoryReportRequest.
---
# SearchCampaignChangeHistoryReportColumn Value Set - Reporting
Defines the attribute columns that you can include in the [SearchCampaignChangeHistoryReportRequest](searchcampaignchangehistoryreportrequest.md).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

## Syntax
```xml
<xs:simpleType name="SearchCampaignChangeHistoryReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="DateTime" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="ChangedBy" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AdTitle" />
    <xs:enumeration value="AdDescription" />
    <xs:enumeration value="DisplayUrl" />
    <xs:enumeration value="Keyword" />
    <xs:enumeration value="ItemChanged" />
    <xs:enumeration value="AttributeChanged" />
    <xs:enumeration value="HowChanged" />
    <xs:enumeration value="OldValue" />
    <xs:enumeration value="NewValue" />
    <xs:enumeration value="EntityName" />
    <xs:enumeration value="EntityId" />
    <xs:enumeration value="Tool" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [SearchCampaignChangeHistoryReportColumn](searchcampaignchangehistoryreportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AdDescription](#addescription), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdTitle](#adtitle), [AttributeChanged](#attributechanged), [CampaignId](#campaignid), [CampaignName](#campaignname), [ChangedBy](#changedby), [DateTime](#datetime), [DisplayUrl](#displayurl), [EntityId](#entityid), [EntityName](#entityname), [HowChanged](#howchanged), [ItemChanged](#itemchanged), [Keyword](#keyword), [NewValue](#newvalue), [OldValue](#oldvalue), [Tool](#tool).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="addescription"></a>AdDescription|The first ad description that appears below the path in your ad. This column will be empty if [ItemChanged](#itemchanged) is not Ad.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group. This column will be empty if [ItemChanged](#itemchanged) is not Ad , Ad group, or Keyword.|
|<a name="adgroupname"></a>AdGroupName|The ad group name. This column will be empty if [ItemChanged](#itemchanged) is not Ad , Ad group, or Keyword.|
|<a name="adtitle"></a>AdTitle|The ad title parts. This column will be empty if [ItemChanged](#itemchanged) is not Ad.|
|<a name="attributechanged"></a>AttributeChanged|Identifies the attribute or property of the entity from the [ItemChanged](#itemchanged) column that changed. For a list of elements whose change history is reported, see the Attribute Changed column within [Remarks](searchcampaignchangehistoryreportcolumn.md#remarks). This column is empty if a campaign, ad group, or ad entity was added or deleted.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="changedby"></a>ChangedBy|The username of the user that made the change to settings within the account. If the system made the change, the value will be Administrator.|
|<a name="datetime"></a>DateTime|The date and time of the change. The date and time will be in the time zone of the campaign.|
|<a name="displayurl"></a>DisplayUrl|The ad display URL. This column will be empty if [ItemChanged](#itemchanged) is not Ad.|
|<a name="entityid"></a>EntityId|The Microsoft Advertising system identifier of the entity that was updated.|
|<a name="entityname"></a>EntityName|The name of the entity that was updated.|
|<a name="howchanged"></a>HowChanged|The value that indicates whether the element was added, updated, or deleted. For possible values, see [ChangeTypeReportFilter Value Set](changetypereportfilter.md). For adds, the [NewValue](#newvalue) column contains the added entity. For deletes, the [OldValue](#oldvalue) column contains the deleted entity. For updates, the [NewValue](#newvalue) column contains the new value and the [OldValue](#oldvalue) column contains the old value. If an entity which has a delivery status property was added, for example a campaign, the value of [HowChanged](#howchanged) is Added. To report a deleted entity, the [ItemChanged](#itemchanged) field is Status, the [HowChanged](#howchanged) field is Changed, and the [NewValue](#newvalue) field is Deleted. Associating a target with a campaign or ad group will be reported as an add change. The [AttributeChanged](#attributechanged) column will identify the target types contained in the target object. Updates to a target object will be reported as a delete change and an add change. Removing a campaign's or ad group's association with a target object will be reported as a delete change.|
|<a name="itemchanged"></a>ItemChanged|The value that identifies the entity that changed. If the change is an update to an element of the entity or is related to a target associated with a campaign or ad group, the [AttributeChanged](#attributechanged) column contains the element of the entity that changed or the type of target that was changed.|
|<a name="keyword"></a>Keyword|The keyword text. This column will be empty if [ItemChanged](#itemchanged) is not Keyword.|
|<a name="newvalue"></a>NewValue|The value after the change. For more information, see the [HowChanged](#howchanged) column.|
|<a name="oldvalue"></a>OldValue|The value before the change. For more information, see the [HowChanged](#howchanged) column.|
|<a name="tool"></a>Tool|The Microsoft Advertising tool used to make changes.<br/><br/>The possible values include "API", "Automated rules", "Bulk upload", "Imports", "Editor", "Mobile Apps", "Other", "Scripts", and "Web client (manual)". New values can be added in the future, so you should not take any dependency on a fixed set of values.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

|Column|
|----------|
|DateTime|

### <a name="changehistorydetails"></a>Change History Details
The following are the entity types whose change history is reported.

> [!NOTE]
> If the [AttributeChanged](#attributechanged) field is blank or empty, and the [HowChanged](#howchanged) field is Added or Deleted, then the contents of the [NewValue](#newvalue) or [OldValue](#oldvalue) field represents an element of the entity that was added or deleted, respectively. For example if a keyword is added, the [NewValue](#newvalue) field contains the keyword text.

- [Account](#account)  
- [Ad](#ad)  
- [Ad group](#adgroup)  
- [Call extension](#callextension)  
- [Campaign](#campaign)  
- [Keyword](#keyword)  
- [Location extension](#locationextension)  
- [Negative Keyword List](#negativekeywordlist)  
- [Sitelink extension](#sitelinkextension)  
- [User](#user)  

### <a name="account"></a>Account
When the [ItemChanged](#itemchanged) field's value is Account, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|None (blank)|Refers to the name of the account that was added.<br/><br/>The value of the corresponding [HowChanged](#howchanged) field is Added.|
|Account|Refers to the name of the account that was changed.|
|Agency contact|Refers to the name of the agency contact.|
|Sales house customer|Refers to the sales house customer.|
|Bill-to customer|Refers to the bill-to customer|
|Financial status|Refers to the financial status|
|Lock status|Refers to the lock status|
|Payment option|Refers to the payment option|
|Preferred bill-to payment method|Refers to the preferred bill-to payment method|
|Preferred language|Refers to the preferred language|
|Sold-to payment method|Sold-to payment method|
|Status|Refers to the account status.|
|Preferred user|Refers to the preferred user|
|Spend limit|Refers to the spend limit|
|Tracking template|Refers to the tracking template of the account.|

### <a name="ad"></a>Ad
When the [ItemChanged](#itemchanged) field's value is Ad, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|None (blank)|Refers to the title of the ad that was added.<br/><br/>The value of the corresponding [HowChanged](#howchanged) field is Added.|
|Ad text|Refers to the description of the ad copy.|
|Ad title|Refers to the title of the ad that was changed.|
|Custom parameters|Refers to the custom parameters of the ad.|
|Destination URL|Refers to the destination URL of the ad.|
|Display URL|Refers to the display URL of the ad.|
|Editorial status|Refers to the editorial status of the ad.<br/><br/>If the ad is pending offline editorial review, then within a downloaded change history report the editorial status is represented as either *Pending - Active* or *Pending - Inactive*. For more information, see [Entities and Delivery Status](../guides/editorial-review-appeals.md#entitydeliverystatus).|
|Final URL|Refers to the Final URL of the ad.|
|Mobile URL|Refers to the Final Mobile URL of the ad.|
|Status|Refers to the delivery status of the ad.<br/><br/>If reporting a deleted ad, the [ItemChanged](#itemchanged) field is Status, the [HowChanged](#howchanged) field is Changed, and the [NewValue](#newvalue) field is Deleted.|
|Tracking template|Refers to the tracking template of the ad.|

### <a name="adgroup"></a>Ad group
When the [ItemChanged](#itemchanged) field's value is Ad group, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|None (blank)|Refers to the name of the ad group that was added.<br/><br/>The value of the corresponding [HowChanged](#howchanged) field is Added.|
|Ad group|Refers to the name of the ad group that was changed.|
|Advanced location targeting|Refers to intent option of the location target that is associated with the ad group.|
|Age|Refers to the age target.|
|Custom parameters|Refers to the custom parameters of the ad group.|
|Day|Refers to the day target that was deprecated after Bing Ads API version 9.|
|Default broad match bid|Refers to the default broad match bid|
|Default content match bid|Refers to the default content match bid|
|Default exact match bid|Refers to the default exact match bid|
|Default phrase match bid|Refers to the default phrase match bid|
|Device|Refers to the defers to the device target.|
|Distance|Refers to the distance of the radius target.|
|End date|Refers to the scheduled end date for the ad group.|
|End time|Refers to the combined To Hour and To Minute of the DayTime target. The bid adjustment is also included in this field, delimited from the time by a single vertical bar character. |
|Gender|Refers to the gender target.|
|Hour|Refers to the hour target that was deprecated after Bing Ads API version 9.|
|Location|Refers to the location target.|
|Location exclusion|Refers to excluding locations from a location target.|
|Medium|Refers to the Search or Content ad distribution.|
|Negative keyword|Refers to a negative keyword associated with the ad group.<br/><br/>Updates to negative keywords are reported as a Removed and Added change in two rows. The Removed record corresponds to the old value, and the Added record reflects the new value.|
|Pause status|Refers to the any of the paused states of the ad group.|
|Product group|The product conditions of a product group are delimited from each other by a backward slash ('\'), and delimited from the bid by a single space character.|
|Site Exclusion|Refers to the ad group's negative site URLs. An ad group can have multiple site exclusions, and each site exclusion is represented separately in its own report row.|
|Start time|Refers to the combined From Hour and From Minute of the DayTime target. The bid adjustment is also included in this field, delimited from the time by a single vertical bar character. |
|Status|Refers to the delivery status of the ad group.<br/><br/>If reporting a deleted ad group, the [ItemChanged](#itemchanged) field is Status, the [HowChanged](#howchanged) field is Changed, and the [NewValue](#newvalue) field is Deleted.|
|Targeted days|Refers day of the DayTime target. The bid adjustment is also included in this field, delimited from the day by a single vertical bar character. |
|Tracking template|Refers to the tracking template of the ad group.|

### <a name="callextension"></a>Call extension
When the [ItemChanged](#itemchanged) field's value is Call extension, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|Association|Refers to the association of a call extension with an entity.<br/><br/>For example, if the extension is associated with a campaign, [CampaignName](#campaignname) field's value is the name of the associated campaign, the [ItemChanged](#itemchanged) field's value is Call extension, the [AttributeChanged](#attributechanged) field's value is Association, and the [HowChanged](#howchanged) field's value is Added.<br/><br/>As another example, if the extension is associated or disassociated with a campaign, the respective NewValue or OldValue is the name of the campaign, and the EntityName column contains the name of the ad extension.|
|Country/region|Refers to the country/region of the call extension.|
|Phone Number|Refers to the phone number of the call extension.|
|Show website or phone|Refers to whether the website should be displayed  with the phone number of the call extension. Possible values in the [OldValue](#oldvalue) and [NewValue](#newvalue) columns are *Phone* and *Website and phone*.|
|Use forward number|Refers to whether forwarding is set up for the call extension. Possible values in the [OldValue](#oldvalue) and [NewValue](#newvalue) columns are No and Yes.|

### <a name="campaign"></a>Campaign
When the [ItemChanged](#itemchanged) field's value is Campaign, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|None (blank)|Refers to the name of the campaign that was added.<br/><br/>The value of the corresponding [HowChanged](#howchanged) field is Added.|
|Advanced location targeting|Refers to intent option of the location target that is associated with the campaign.|
|Age|Refers to the age target.|
|Budget type|Refers to the campaign budget type.<br/><br/>Possible values in the [OldValue](#oldvalue) and [NewValue](#newvalue) columns are as follows:<br/><br/>- Value of Daily target (accelerated) corresponds to the Microsoft Advertising web application Daily Accelerated setting.<br/><br/>- Value of Daily target (standard) corresponds to the Microsoft Advertising web application Daily Standard setting.<br/><br/>- Value of Monthly (open) corresponds to the Microsoft Advertising web application Monthly setting.|
|Campaign priority|Refers to the priority of a Microsoft Shopping campaign.|
|Custom parameters|Refers to the custom parameters of the campaign.|
|Daily budget|Refers to the campaign daily budget amount.|
|Day|Refers to the day target that was deprecated after Bing Ads API version 9.|
|Device|Refers to the device target.|
|Distance|Refers to the distance of the radius target.|
|End date|Refers to the scheduled end date for the ad group.|
|End time|Refers to the combined To Hour and To Minute of the DayTime target. The bid adjustment is also included in this field, delimited from the time by a single vertical bar character. |
|Gender|Refers to the gender target.|
|Hour|Refers to the hour target that was deprecated after Bing Ads API version 9.|
|IP exclusion|Refers to the IP exclusions created via the Microsoft Advertising web application.|
|Location|Refers to the location target.|
|Location exclusion|Refers to excluding locations from a location target.|
|Monthly budget|Refers to the campaign monthly budget amount.|
|Name|Refers to the name of the campaign that was changed.|
|Negative keyword|Refers to a negative keyword associated with the campaign.<br/><br/>Updates to negative keywords are reported as a Removed and Added change in two rows. The Removed record corresponds to the old value, and the Added record reflects the new value.|
|Pause status|Refers to the any of the paused states of the campaign.<br/><br/>Possible values in the [OldValue](#oldvalue) and [NewValue](#newvalue) columns are "Budget Paused", "Budget and user Paused", "Not paused", and "Paused".|
|Product flter|Refers to the product scope or condition of a Microsoft Shopping campaign. A Microsoft Shopping campaign can have multiple product conditions, and each condition is represented separately in its own report row.|
|Site Exclusion|Refers to the campaign's negative site URLs. A campaign can have multiple site exclusions, and each site exclusion is represented separately in its own report row.|
|Start date|For internal use.|
|Start time|Refers to the combined From Hour and From Minute of the DayTime target. The bid adjustment is also included in this field, delimited from the time by a single vertical bar character. |
|Status|Refers to the delivery status of the campaign.<br/><br/>If reporting a deleted campaign, the [ItemChanged](#itemchanged) field is Status, the [HowChanged](#howchanged) field is Changed, and the [NewValue](#newvalue) field is Deleted.|
|Targeted days|Refers day of the DayTime target. The bid adjustment is also included in this field, delimited from the day by a single vertical bar character. |
|Tracking template|Refers to the Tracking template of the campaign.|

### <a name="keyword"></a>Keyword
When the [ItemChanged](#itemchanged) field's value is Keyword, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|None (blank)|Refers to the text of the keyword that was added.<br/><br/>The value of the corresponding [HowChanged](#howchanged) field is Added.|
|Broad match bid|Refers to the broad match bid amount for the keyword.|
|Content match bid|Refers to the content match bid amount for the keyword.|
|Custom parameters|Refers to the custom parameters of the keyword.|
|Editorial status|Refers to the editorial status of the keyword.<br/><br/>If the keyword is pending offline editorial review, then within a downloaded change history report the editorial status is represented as either *Pending - Active* or *Pending - Inactive*. For more information, see [Entities and Delivery Status](../guides/editorial-review-appeals.md#entitydeliverystatus).|
|Exact match bid|Refers to the exact match bid amount for the keyword.|
|Final URL|Refers to the Final URL of the keyword.|
|Mobile URL|Refers to the Final Mobile URL of the keyword.|
|Match type|Refers to the bid match type for the keyword.<br/><br/>The bid match type cannot be updated using Bing Ads API; however, it is possible to change the bid match type using the Microsoft Advertising web application.|
|Phrase match bid|Refers to the phrase match bid amount for the keyword.|
|Status|Refers to the delivery status of the keyword.<br/><br/>If reporting a deleted keyword, the [ItemChanged](#itemchanged) field is Status, the [HowChanged](#howchanged) field is Changed, and the [NewValue](#newvalue) field is Deleted.|
|Tracking template|Refers to the tracking template of the keyword.|

### <a name="locationextension"></a>Location extension
When the [ItemChanged](#itemchanged) field's value is Location extension, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|Association|Refers to the association of a location extension with an entity.<br/><br/>For example if the extension is associated with a campaign, [CampaignName](#campaignname) field's value is the name of the associated campaign, the [ItemChanged](#itemchanged) field's value is Location extension, the [AttributeChanged](#attributechanged) field's value is Association, and the [HowChanged](#howchanged) field's value is Added.|

### <a name="negativekeywordlist"></a>Negative Keyword List
When the [ItemChanged](#itemchanged) field's value is Negative Keyword List, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|Association|Refers to the association of a Negative Keyword List with a campaign.<br/><br/>For example if the negative keyword list is associated with a campaign, [CampaignName](#campaignname) field's value is the name of the associated campaign, the [ItemChanged](#itemchanged) field's value is Negative Keyword List, the [AttributeChanged](#attributechanged) field's value is Association, and the [HowChanged](#howchanged) field's value is Added.|
|Negative keyword|Refers to the negative keyword that was added or removed from the negative keyword list.|
|Negative Keyword List Name|Refers to the name of the negative keyword list.|

### <a name="sitelinkextension"></a>Sitelink extension
When the [ItemChanged](#itemchanged) field's value is Sitelink extension, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|Association|Refers to the association of a sitelink extension with an entity.<br/><br/>For example if the extension is associated with a campaign, [CampaignName](#campaignname) field's value is the name of the associated campaign, the [ItemChanged](#itemchanged) field's value is Sitelink extension, the [AttributeChanged](#attributechanged) field's value is Association, and the [HowChanged](#howchanged) field's value is Added.|
|Custom parameters|Refers to the custom parameters of a sitelink.|
|Destination URL|Refers to the destination URL of the sitelink extension.|
|Display Text|Refers to the display text of the sitelink extension.|
|Final URL|Refers to the Final URL of a sitelink.|
|Mobile URL|Refers to the Final Mobile URL of a sitelink.|
|Tracking template|Refers to the tracking template of a sitelink.|

### <a name="user"></a>User
When the [ItemChanged](#itemchanged) field's value is User, change history for the following attributes are available.

|Attribute Changed|Description|
|---------------------|---------------|
|None (blank)|Refers to the user name of the user that was added.<br/><br/>The value of the corresponding [HowChanged](#howchanged) field is Added.|
|Code|For internal use.|
|Email|Refers to the contact email address of the user.|
|First name|Refers to the first name of the user.|
|Last name|Refers to the last name of the user.|
|Status|Refers to the status of the user.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchCampaignChangeHistoryReportRequest](searchcampaignchangehistoryreportrequest.md)  
