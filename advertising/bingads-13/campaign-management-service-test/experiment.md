---
title: Experiment Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an experiment where you split a campaign's budget and traffic, and then run an A/B test during a limited date range.(test)
---
# Experiment Data Object Test - Campaign Management
Defines an experiment where you split a campaign's budget and traffic, and then run an A/B test during a limited date range.

> [!NOTE]
> **Starting February 1, 2023, you'll only be able to copy expanded text ads from the base campaign to the experiment campaign, but you'll no longer be able to edit these expanded text ads**. Please create at least one [responsive search ad](https://help.ads.microsoft.com/#apex/ads/en/60131/1) in each ad group.

How would using a different bid strategy, or a different kind of targeting, affect your ad campaign's performance? Would it be better, worse, or basically the same? Now you can run an A/B test to find out!

With Microsoft Advertising experiments, you create a duplicate of a search campaign that receives a split of your base campaign's budget and ad traffic. You can create up to 10 nonconcurrent experiments per base campaign. Then, you can:
- Try out changes in the experiment campaign.
- See how the experiment campaign performs compared to the base campaign.
- If you like the experiment's results, apply the changes to the base campaign or create a whole new campaign.

> [!NOTE]
> Experiments are only available for Search campaigns that do not have Dynamic Search Ads settings. A [mixed campaign](../guides/mixed-campaigns.md) cannot be an experiment campaign or the base campaign of an experiment. 
> 
> Experiments do not support shared budgets. If a campaign uses a shared budget, then you cannot use it as the base campaign for an experiment.  

When you create an experiment in your account, a new experiment and a new campaign are both created. Here are some of the notable details:  
- An *Experiment* entity is created with the [BaseCampaignId](#basecampaignid), [EndDate](#enddate), [Name](#name), [StartDate](#startdate), and [TrafficSplitPercent](#trafficsplitpercent) that you specified. The experiment [ExperimentStatus](#experimentstatus) will be set automatically by Microsoft Advertising to *Creating*, and the next time you retrieve the experiment its status will be either *Active*, *Creating*, *CreationFailed*, *Paused*, or *Scheduled*.

- An experiment [Campaign](campaign.md) is created as a copy of the [base campaign](#basecampaignid). All base campaign settings, including ad groups, ads, ad extension associations, and target settings are copied to the new experiment campaign. You can get this new campaign's system identifier via the [ExperimentCampaignId](#experimentcampaignid) element of the *Experiment* object e.g., in the bulk upload result file. The [name](campaign.md#name) of the [experiment campaign](#experimentcampaignid) that is created from the [base campaign](#basecampaignid) will match the experiment [Name](#name), and vice versa. If the experiment name is updated, the experiment campaign's name will automatically be updated to match, and vice versa.

  > [!NOTE]
  > The following entities will not be copied from the base campaign to the experiment campaign:
  > - Expired ad groups i.e., with an end date that has passed will not be copied from the base campaign to the experiment campaign. After the experiment is promoted and the experiment campaign settings overwrite the base campaign settings, the expired ad groups in the base campaign will be deleted. Likewise any expired ad groups in the experiment campaign will not be copied to the base campaign during promotion.
  > - Keywords with a destination URL will not be copied from the base campaign to the experiment campaign. We recommend that you upgrade to [FinalUrls](keyword.md#finalurls), but if you still have keywords with a destination URL they will not be used in the experiment campaign and they will remain in the base campaign (even if the experiment is later promoted). 
  > - Standard text ads (STA) will not be copied from the base campaign to the experiment campaign. We recommend that you upgrade to [Expanded Text Ads](../guides/expanded-text-ads.md), but if you still have STA they will not be used in the experiment campaign and they will remain in the base campaign (even if the experiment is later promoted).  
  > - Audience associations for deleted in-market audiences might initially be available in your base campaigns, although they will not be copied to experiment campaigns. If you later promote the experiment campaign, your base campaign will adopt all of the settings of the experiment campaign and the audience associations for deleted in-market audiences will be deleted from your base campaign.
  > 
  > In the Microsoft Advertising web application "Experiments" tab, you can get a detailed list of items that were not copied from the base campaign to the experiment campaign. The list is formatted as a Bulk upload result file i.e., error records for the items that were not copied to the experiment campaign. If you find an error record that you believe should have been copied to the experiment campaign please feel free to contact support with details. 

After the experiment is created you can update its [EndDate](#enddate), [Name](#name), [StartDate](#startdate), and [TrafficSplitPercent](#trafficsplitpercent). There are some exceptions e.g., you cannot update the start date after the [ExperimentStatus](#experimentstatus) has become *Active* (start date already arrived), and you cannot update the end date after the [ExperimentStatus](#experimentstatus) has become *Ended* (end date already passed).   

After the experiment campaign is created you can update all of its settings except for the campaign [Budget](campaign.md#dailybudget), [BudgetType](campaign.md#budgettype), [Status](campaign.md#status), and [TimeZone](campaign.md#timezone). The budget, status, and time zone of an experiment campaign are always inherited from the base campaign settings. If you want to change an experiment's budget, you will need to change the base campaign's budget. The change in value will then be split based on your experiment [TrafficSplitPercent](#trafficsplitpercent) setting. An experiment campaign will have one new property that non-experiment campaigns do not have i.e., the [ExperimentId](campaign.md#experimentid). 

> [!TIP] 
> Once you have created an experiment, any change you make to the base campaign's settings (except for budget and status) will not affect the experiment. To ensure you are seeing a fair comparison, we recommend not making any changes to the base campaign's settings while an experiment is running.

You can let the experiment run through the [EndDate](#enddate), pause it temporarily, or end the experiment early. To pause an experiment, you must pause the base campaign. Pausing the base campaign also pauses the experiment campaign and the experiment itself. To end the experiment early, set the experiment [ExperimentStatus](#experimentstatus) to *Ended*. The experiment campaign will be paused when you end the experiment. Once an experiment is ended, it cannot be restarted. You could later promote, graduate, or delete an ended experiment. 

You have several options to use what you learned from the experiment. 
- You can have your base campaign adopt all of the settings of the experiment campaign i.e., set the [ExperimentStatus](#experimentstatus) to *Promoted*. The experiment campaign settings and entities will be copied back to the base campaign, and the experiment campaign will be paused. The base campaign will once again have 100% of its original budget and traffic. The original system identifiers will be retained as much as possible. There could be some exceptions, for example if you deleted ad groups from the base campaign after the experiment campaign was created. Any changes to the base campaign settings during the experiment e.g., new ad groups will effectively be deleted. 
- You can graduate your experiment as an independent campaign with its own budget and ad traffic i.e., set the [ExperimentStatus](#experimentstatus) to *Graduated*. The base campaign will once again have 100% of its original budget and traffic, and the graduated campaign (previously an experiment campaign) will start with the same budget as the base campaign. 
- Instead of using all of the experiment campaign settings, you might want to merge a subset of the experiment campaign settings to your base campaign. 

When you delete an *Experiment*, the experiment [Campaign](campaign.md) will also be deleted, and vice versa; However, the base campaign will not be deleted. When you delete a base campaign, all of its related experiments and experiment campaigns will also be deleted. 

# [XML](#tab/xml)

```xml
<xs:complexType name="Experiment" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="BaseCampaignId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="tns:Date" />
    <xs:element minOccurs="0" name="ExperimentCampaignId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="ExperimentStatus" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ExperimentType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="tns:Date" />
    <xs:element minOccurs="0" name="TrafficSplitPercent" nillable="true" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "BaseCampaignId": "LongValueHere",
  "EndDate": {
    "Day": IntValueHere,
    "Month": IntValueHere,
    "Year": IntValueHere
  },
  "ExperimentCampaignId": "LongValueHere",
  "ExperimentStatus": "ValueHere",
  "ExperimentType": "ValueHere",
  "Id": "LongValueHere",
  "Name": "ValueHere",
  "StartDate": {
    "Day": IntValueHere,
    "Month": IntValueHere,
    "Year": IntValueHere
  },
  "TrafficSplitPercent": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [Experiment](experiment.md) object has the following elements: [BaseCampaignId](#basecampaignid), [EndDate](#enddate), [ExperimentCampaignId](#experimentcampaignid), [ExperimentStatus](#experimentstatus), [ExperimentType](#experimenttype), [Id](#id), [Name](#name), [StartDate](#startdate), [TrafficSplitPercent](#trafficsplitpercent).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="basecampaignid"></a>BaseCampaignId|The Microsoft Advertising identifier of the campaign used as the base for the experiment campaign.<br/><br/>You can create up to 10 nonconcurrent experiments per base campaign. In other words multiple experiments for the same base campaign cannot have overlapping time intervals.<br/><br/>Experiments are only available for Search campaigns. If the campaign uses a shared budget, then you cannot use it as the base campaign for an experiment.<br/><br/>**Add:** Read-only and Required.<br/>**Update:** Read-only. You cannot change the base campaign of an experiment.|**long**|
|<a name="enddate"></a>EndDate|The date that the experiment will expire.<br/><br/>If you do not specify an end date, the ads will not expire. Once the end date has passed, the end date cannot be extended.<br/><br/>The end date is inclusive. For example, if you set the end date to 12/31/2020, the experiment will end at 11:59 PM on 12/31/2020. The time is relative to the [base campaign](#basecampaignid) time zone.<br/><br/>**Add:**  Optional. If you leave this element nil or empty the experiment will not expire until you take further action e.g., set the experiment [status](#experimentstatus) to *Ended*.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. To delete the current end date and effectively set no end date, set the [Day](date.md#day), [Month](date.md#month), and [Year](date.md#year) each to '0' (zero). When you retrieve the experiment next time, this element will not be set.|[Date](date.md)|
|<a name="experimentcampaignid"></a>ExperimentCampaignId|The Microsoft Advertising identifier of the campaign that is created as a copy of the [base campaign](#basecampaignid).<br/><br/>All base campaign settings, including ad groups, ads, ad extension associations, and target settings are copied to the new experiment campaign.<br/><br/>After the experiment campaign is created you can update all of its settings except for the campaign [Budget](campaign.md#dailybudget), [BudgetType](campaign.md#budgettype), and [TimeZone](campaign.md#timezone). The budget and time zone of an experiment campaign are always inherited from the base campaign settings.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="experimentstatus"></a>ExperimentStatus|The status of the experiment.<br/><br/>Possible status values are described in the [remarks](#remarks) below.<br/><br/>**Add:** Required. You must set the status to *Active*; however, the status will be set automatically by Microsoft Advertising to *Creating*, and the next time you retrieve the experiment its status will be either *Active*, *Creating*, *CreationFailed*, *Paused*, or *Scheduled*.<br/>**Update:** Read-only|**string**|
|<a name="experimenttype"></a>ExperimentType|Determines whether to show individual customers ads from the experiment and the original campaign randomly, or only from one or the other.<br/><br/>The possible values include TrafficBased and CookieBased.<br/><br/>TrafficBased: This is also known as the search-based option. Every time customers search, they are randomly shown either ads from your experiment or ads from your original campaign. This means that individual customers could see ads from both sources if they search multiple times.<br/><br/>CookieBased: When individual customers search, we show ads from either your experiment or your original campaign, and use a cookie to ensure that, going forward, they will only see ads from this source. The cookie-based option has an important trade-off to consider: On one hand, you may get more accurate data, since you're ensuring that an individual customer is only responding to one source or the other. On the other hand, it may take you longer to build up statistically significant comparison data than with the search-based option.<br/><br/>**Add:** Optional. The default is TrafficBased.<br/>**Update:** Read-only. You cannot update the experiment type.|**string**|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the experiment.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="name"></a>Name|The name of the experiment.<br/><br/>The [name](campaign.md#name) of the [experiment campaign](#experimentcampaignid) that is created from the [base campaign](#basecampaignid) will match the experiment name, and vice versa. If the experiment name is updated, the experiment campaign's name will automatically be updated to match, and vice versa.<br/><br/>The name must be unique (case-insensitive) among all campaigns and experiments within the account. The name can contain a maximum of 128 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="startdate"></a>StartDate|The date that the experiment campaign can begin serving ads.<br/><br/>The start date cannot be updated after the experiment has begun i.e., once the start date has arrived.<br/><br/>The start date is inclusive. For example, if you set start date to 5/5/2020, the experiment will start at 12:00 AM on 5/5/2020. The time is relative to the [base campaign](#basecampaignid) time zone.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[Date](date.md)|
|<a name="trafficsplitpercent"></a>TrafficSplitPercent|The percentage of the base campaign's budget and ad traffic that you want to allocate for this experiment.<br/><br/>Ad traffic is split between the experiment and the base campaign based on individual searches. Relevant searches will randomly bring up either ads from your experiment or ads from your base campaign. This means that individual customers could see ads from both sources if they search multiple times.<br/><br/>Possible values range from 1 to 99.<br/><br/>**Add:** Required<br/>**Update:** Read-only. You cannot change the split while an experiment is running.|**int**|

## <a name="remarks"></a>Remarks
Possible experiment status values are described in the table below. 

|Status|Description|
|-----|-----|
|Active|The experiment campaign is eligible to serve ads. The experiment [StartDate](#startdate) has arrived and the [EndDate](#enddate) has not yet passed.|
|Creating|The experiment was created, and the experiment campaign is still being created.|
|CreationFailed|The experiment was created, but the experiment campaign could not be created. If creation fails the experiment status can only be set to Deleted. You should delete the experiment and try to create a new one. If the issue persists please contact support for assistance.|
|Deleted|The experiment and experiment campaign have been deleted.|
|Ended|The experiment is no longer eligible to serve ads. Either the [EndDate](#enddate) has passed or the status was set directly to Ended.|
|Graduated|Your experiment has been graduated as an independent campaign with its own budget and ad traffic. The base campaign once again has 100% of its original budget and traffic, and the graduated campaign (previously an experiment campaign) has started with the same budget as the base campaign.|
|Graduating|The experiment campaign is being graduated as an independent campaign with its own budget and ad traffic. Upon successful completion, the status will automatically be set to Graduated. If the graduation failed, then nothing changed and the state will return to Active. (The service does not return the internal "GraduateFailed" status.) You can try again by setting the status to Graduated, and if graduation of the experiment still does not succeed please contact support for assistance.|
|Paused|The base campaign and experiment campaign are temporarily paused and not eligible to serve ads. The experiment [StartDate](#startdate) has arrived and the [EndDate](#enddate) has not yet passed.<br/><br/>Please note that when the base campaign is paused, the experiment campaign and the experiment itself are also paused. Likewise when the base campaign is unpaused, the experiment campaign and the experiment itself are unpaused. When an experiment is unpaused it will move to either an Active or Scheduled state.|
|Promoted|Your base campaign adopted all of the settings of the experiment campaign. The experiment campaign settings and entities have been copied back to the base campaign, and the experiment campaign is paused. The base campaign once again has 100% of its original budget and traffic. The original system identifiers should be retained as much as possible. There could be some exceptions, for example if you deleted ad groups from the base campaign after the experiment campaign was created. Any changes to the base campaign settings during the experiment e.g., new ad groups have effectively been deleted.|
|PromoteFailed|The experiment campaign settings could not be applied to the base campaign. You can try again by setting the status to Promoted, and if the PromoteFailed status persists please contact support for assistance.|
|Promoting|The experiment campaign settings are being applied to the base campaign. Upon successful completion, the status will automatically be set to Promoted, and otherwise the status will be set to PromoteFailed. If promotion fails the experiment status can only be set to Deleted. Before you delete the experiment and experiment campaign, consider whether you want to copy any settings from the experiment campaign to the base campaign yourself e.g., via the Microsoft Advertising web application or API.|
|Scheduled|The experiment campaign has been created, and the experiment is scheduled to begin serving ads once the [StartDate](#startdate) arrives.|   

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddExperiments](addexperiments.md)  
[GetExperimentsByIds](getexperimentsbyids.md)  
[UpdateExperiments](updateexperiments.md)  
