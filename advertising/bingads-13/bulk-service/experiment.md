---
title: "Experiment Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Defines an experiment that can be downloaded in a bulk file. 
dev_langs:
  - csharp
---
# Experiment Record - Bulk
Defines an experiment that can be downloaded in a bulk file.

> [!NOTE]
> **Upgrade your expanded text ads to responsive search ads by February 1, 2023**. After this date, you will no longer be able to create new or edit existing expanded text ads. For more information, see [About responsive search ads](https://help.ads.microsoft.com/#apex/ads/en/60037/0).

With an experiment you split a campaign's budget and traffic, and then run an A/B test during a limited date range. 

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
- An *Experiment* entity is created with the [Base Campaign Id](#basecampaignid), [End Date](#enddate), [Name](#name), [Start Date](#startdate), and [Traffic Split Percent](#trafficsplitpercent) that you specified. The experiment [Status](#status) will be set automatically by Microsoft Advertising to *Creating*, and the next time you download the experiment its status will be either *Active*, *Creating*, *CreationFailed*, *Paused*, or *Scheduled*.

- An experiment [Campaign](campaign.md) is created as a copy of the [base campaign](#basecampaignid). All base campaign settings, including ad groups, ads, ad extension associations, and target settings are copied to the new experiment campaign. You can get this new campaign's system identifier via the [Experiment Campaign Id](#experimentcampaignid) field of the *Experiment* record e.g., in the bulk upload result file. The [name](campaign.md#campaign) of the [experiment campaign](#experimentcampaignid) that is created from the [base campaign](#basecampaignid) will match the experiment [Name](#name), and vice versa. If the experiment name is updated, the experiment campaign's name will automatically be updated to match, and vice versa.

  > [!NOTE]
  > The following entities will not be copied from the base campaign to the experiment campaign:
  > - Expired ad groups i.e., with an end date that has passed will not be copied from the base campaign to the experiment campaign. After the experiment is promoted and the experiment campaign settings overwrite the base campaign settings, the expired ad groups in the base campaign will be deleted. Likewise any expired ad groups in the experiment campaign will not be copied to the base campaign during promotion.
  > - Keywords with a destination URL will not be copied from the base campaign to the experiment campaign. We recommend that you upgrade to [Final Url](keyword.md#finalurl), but if you still have keywords with a destination URL they will not be used in the experiment campaign and they will remain in the base campaign (even if the experiment is later promoted). 
  > - Standard text ads (STA) will not be copied from the base campaign to the experiment campaign. We recommend that you upgrade to [Expanded Text Ads](../guides/expanded-text-ads.md), but if you still have STA they will not be used in the experiment campaign and they will remain in the base campaign (even if the experiment is later promoted).  
  > - Audience associations for deleted in-market audiences might initially be available in your base campaigns, although they will not be copied to experiment campaigns. If you later promote the experiment campaign, your base campaign will adopt all of the settings of the experiment campaign and the audience associations for deleted in-market audiences will be deleted from your base campaign. 
  > 
  > In the Microsoft Advertising web application "Experiments" tab, you can get a detailed list of items that were not copied from the base campaign to the experiment campaign. The list is formatted as a Bulk upload result file i.e., error records for the items that were not copied to the experiment campaign. If you find an error record that you believe should have been copied to the experiment campaign please feel free to contact support with details. 

After the experiment is created you can update its [End Date](#enddate), [Name](#name), [Start Date](#startdate), and [Traffic Split Percent](#trafficsplitpercent). There are some exceptions e.g., you cannot update the start date after the [Status](#status) has become *Active* (start date already arrived), and you cannot update the end date after the [Status](#status) has become *Ended* (end date already passed).   

After the experiment campaign is created you can update all of its settings except for the campaign [Budget](campaign.md#budget), [Budget Type](campaign.md#budgettype), and [Status](campaign.md#status). The budget, status, and time zone of an experiment campaign are always inherited from the base campaign settings. If you want to change an experiment's budget, you will need to change the base campaign's budget. The change in value will then be split based on your experiment [Traffic Split Percent](#trafficsplitpercent) setting. An experiment campaign will have one new property that non-experiment campaigns do not have i.e., the [Experiment Id](campaign.md#experimentid). 

> [!TIP] 
> Once you have created an experiment, any change you make to the base campaign's settings (except for budget and status) will not affect the experiment. To ensure you are seeing a fair comparison, we recommend not making any changes to the base campaign's settings while an experiment is running.

You can let the experiment run through the [End Date](#enddate), pause it temporarily, or end the experiment early. To pause an experiment, you must pause the base campaign. Pausing the base campaign also pauses the experiment campaign and the experiment itself. To end the experiment early, set the experiment [Status](#status) to *Ended*. The experiment campaign will be paused when you end the experiment. Once an experiment is ended, it cannot be restarted. You could later promote, graduate, or delete an ended experiment. 

You have several options to use what you learned from the experiment. 
- You can have your base campaign adopt all of the settings of the experiment campaign i.e., set the [Status](#status) to *Promoted*. The experiment campaign settings and entities will be copied back to the base campaign, and the experiment campaign will be paused. The base campaign will once again have 100% of its original budget and traffic. The original system identifiers will be retained as much as possible. There could be some exceptions, for example if you deleted ad groups from the base campaign after the experiment campaign was created. Any changes to the base campaign settings during the experiment e.g., new ad groups will effectively be deleted. 
- You can graduate your experiment as an independent campaign with its own budget and ad traffic i.e., set the [Status](#status) to *Graduated*. The base campaign will once again have 100% of its original budget and traffic, and the graduated campaign (previously an experiment campaign) will start with the same budget as the base campaign. 
- Instead of using all of the experiment campaign settings, you might want to merge a subset of the experiment campaign settings to your base campaign. 

When you delete an *Experiment*, the experiment [Campaign](campaign.md) will also be deleted, and vice versa; However, the base campaign will not be deleted. When you delete a base campaign, all of its related experiments and experiment campaigns will also be deleted. 

You can download all *Experiment* records in the account by including the [DownloadEntity](downloadentity.md) value of *Experiments* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new experiment. 

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Start Date, End Date,Name,Traffic Split Percent,Base Campaign Id,Experiment Campaign Id
Format Version,,,,,,,,6.0,,,
Experiment,Active,-20,,ClientIdGoesHere,11/12/2020,12/31/2021,My Campaign - Experiment,50,-111,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkExperiment* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkExperiment
var bulkExperiment = new BulkExperiment
{  
    // Map properties in the Bulk file to the 
    // Experiment object of the Campaign Management service.
    Experiment = new Experiment
    {
        // 'Base Campaign Id' column header in the Bulk file
        BaseCampaignId = campaignIdKey,
        // 'End Date' column header in the Bulk file
        EndDate = new Microsoft.BingAds.V13.CampaignManagement.Date
        {
            Month = 12,
            Day = 31,
            Year = DateTime.UtcNow.Year + 1
        },
        // 'Experiment Campaign Id' column header in the Bulk file
        ExperimentCampaignId = null,
        // 'Status' column header in the Bulk file
        ExperimentStatus = "Active",
        // 'Id' column header in the Bulk file
        Id = experimentIdKey,
        // 'Name' column header in the Bulk file
        Name = "My Campaign - Experiment",
        // 'Start Date' column header in the Bulk file
        StartDate = new Microsoft.BingAds.V13.CampaignManagement.Date
        {
            Month = DateTime.UtcNow.Month,
            Day = DateTime.UtcNow.Day,
            Year = DateTime.UtcNow.Year
        },
        // 'Traffic Split Percent' column header in the Bulk file
        TrafficSplitPercent = 50,
    },

    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkExperiment);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await BulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();
```

For an *Experiment* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Base Campaign Id](#basecampaignid)
- [End Date](#enddate)
- [Experiment Campaign Id](#experimentcampaignid)
- [Experiment Type](#experimenttype)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Name](#name)
- [Start Date](#startdate)
- [Status](#status)
- [Traffic Split Percent](#trafficsplitpercent)

## <a name="basecampaignid"></a>Base Campaign Id
The Microsoft Advertising identifier of the campaign used as the base for the experiment campaign. 

You can create up to 10 nonconcurrent experiments per base campaign. In other words multiple experiments for the same base campaign cannot have overlapping time intervals. 

> [!NOTE]
> Experiments are only available for Search campaigns. If the campaign uses a shared budget, then you cannot use it as the base campaign for an experiment. 

**Add:** Read-only and Required. You must either specify an existing campaign identifier, or specify a negative identifier that is equal to the [Id](campaign.md#id) field of the parent [Campaign](campaign.md) record. This is recommended if you are creating an experiment for a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).    
**Update:** Read-only. You cannot change the base campaign of an experiment.     
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="enddate"></a>End Date
The date that the experiment will expire.

If you do not specify an end date, the ads will not expire. Once the end date has passed, the end date cannot be extended.

The end date is inclusive. For example, if you set the end date to 12/31/2020, the experiment will end at 11:59 PM on 12/31/2020. The time is relative to the [base campaign](#basecampaignid) time zone.

**Add:**  Optional. If you leave this element nil or empty the experiment will not expire until you take further action e.g., set the experiment [status](#status) to *Ended*.  
**Update:** Optional. If no value is set for the update, this setting is not changed. To delete the current end date and effectively set no end date, set this field to the *delete_value* string. When you retrieve the experiment next time, this field will not be set.    
**Delete:** Read-only  

## <a name="experimentcampaignid"></a>Experiment Campaign Id
The Microsoft Advertising identifier of the campaign that is created as a copy of the [base campaign](#basecampaignid). 

All base campaign settings, including ad groups, ads, ad extension associations, and target settings are copied to the new experiment campaign. 

After the experiment campaign is created you can update all of its settings except for the campaign [Budget](campaign.md#budget), and [Budget Type](campaign.md#budgettype). The budget and time zone of an experiment campaign are always inherited from the base campaign settings. 

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="experimenttype"></a>Experiment Type
Determines whether to show individual customers ads from the experiment and the original campaign randomly, or only from one or the other.

The possible values include TrafficBased and CookieBased. 

TrafficBased: This is also known as the search-based option. Every time customers search, they are randomly shown either ads from your experiment or ads from your original campaign. This means that individual customers could see ads from both sources if they search multiple times.

CookieBased: When individual customers search, we show ads from either your experiment or your original campaign, and use a cookie to ensure that, going forward, they will only see ads from this source. The cookie-based option has an important trade-off to consider: On one hand, you may get more accurate data, since you're ensuring that an individual customer is only responding to one source or the other. On the other hand, it may take you longer to build up statistically significant comparison data than with the search-based option.  

**Add:** Optional. The default is TrafficBased.  
**Update:** Read-only. You cannot update the experiment type.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the experiment.

**Add:** Read-only  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="name"></a>Name
The name of the experiment. 

The [name](campaign.md#campaign) of the [experiment campaign](#experimentcampaignid) that is created from the [base campaign](#basecampaignid) will match the experiment name, and vice versa. If the experiment name is updated, the experiment campaign's name will automatically be updated to match, and vice versa. 

The name must be unique (case-insensitive) among all campaigns and experiments within the account. The name can contain a maximum of 128 characters. 

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="startdate"></a>Start Date
The date that the experiment campaign can begin serving ads.

The start date cannot be updated after the experiment has begun i.e., once the start date has arrived.

The start date is inclusive. For example, if you set start date to 5/5/2020, the experiment will start at 12:00 AM on 5/5/2020. The time is relative to the [base campaign](#basecampaignid) time zone.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed. The start date cannot be updated after the experiment has begun i.e., once the start date has arrived.  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the experiment.

Possible status values are described in the table below. 

|Status|Description|
|-----|-----|
|Active|The experiment campaign is eligible to serve ads. The experiment [Start Date](#startdate) has arrived and the [End Date](#enddate) has not yet passed.|
|Creating|The experiment was created, and the experiment campaign is still being created.|
|CreationFailed|The experiment was created, but the experiment campaign could not be created. If creation fails the experiment status can only be set to Deleted. You should delete the experiment and try to create a new one. If the issue persists please contact support for assistance.|
|Deleted|The experiment and experiment campaign have been deleted.|
|Ended|The experiment is no longer eligible to serve ads. Either the [End Date](#enddate) has passed or the status was set directly to Ended.|
|Graduated|Your experiment has been graduated as an independent campaign with its own budget and ad traffic. The base campaign once again has 100% of its original budget and traffic, and the graduated campaign (previously an experiment campaign) has started with the same budget as the base campaign.|
|Graduating|The experiment campaign is being graduated as an independent campaign with its own budget and ad traffic. Upon successful completion, the status will automatically be set to Graduated. If the graduation failed, then nothing changed and the state will return to Active. (The service does not return the internal "GraduateFailed" status.) You can try again by setting the status to Graduated, and if graduation of the experiment still does not succeed please contact support for assistance.|
|Paused|The base campaign and experiment campaign are temporarily paused and not eligible to serve ads. The experiment [Start Date](#startdate) has arrived and the [End Date](#enddate) has not yet passed.<br/><br/>Please note that when the base campaign is paused, the experiment campaign and the experiment itself are also paused. Likewise when the base campaign is unpaused, the experiment campaign and the experiment itself are unpaused. When an experiment is unpaused it will move to either an Active or Scheduled state.|
|Promoted|Your base campaign adopted all of the settings of the experiment campaign. The experiment campaign settings and entities have been copied back to the base campaign, and the experiment campaign is paused. The base campaign once again has 100% of its original budget and traffic. The original system identifiers should be retained as much as possible. There could be some exceptions, for example if you deleted ad groups from the base campaign after the experiment campaign was created. Any changes to the base campaign settings during the experiment e.g., new ad groups have effectively been deleted.|
|PromoteFailed|The experiment campaign settings could not be applied to the base campaign. You can try again by setting the status to Promoted, and if the PromoteFailed status persists please contact support for assistance.|
|Promoting|The experiment campaign settings are being applied to the base campaign. Upon successful completion, the status will automatically be set to Promoted, and otherwise the status will be set to PromoteFailed. If promotion fails the experiment status can only be set to Deleted. Before you delete the experiment and experiment campaign, consider whether you want to copy any settings from the experiment campaign to the base campaign yourself e.g., via the Microsoft Advertising web application or API.|
|Scheduled|The experiment campaign has been created, and the experiment is scheduled to begin serving ads once the [Start Date](#startdate) arrives.|

**Add:** Required. You must set the status to *Active*; however, the status will be set automatically by Microsoft Advertising to *Creating*, and the next time you retrieve the experiment its status will be either *Active*, *Creating*, *CreationFailed*, *Paused*, or *Scheduled*.  
**Update:** Read-only    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="trafficsplitpercent"></a>Traffic Split Percent
The percentage of the base campaign's budget and ad traffic that you want to allocate for this experiment. 

Ad traffic is split between the experiment and the base campaign based on individual searches. Relevant searches will randomly bring up either ads from your experiment or ads from your base campaign. This means that individual customers could see ads from both sources if they search multiple times.

Possible `int` values range from 1 to 99. 

**Add:** Required  
**Update:** Read-only. You cannot change the split while an experiment is running.    
**Delete:** Read-only  
