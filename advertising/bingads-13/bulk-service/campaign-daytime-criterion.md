---
title: "Campaign DayTime Criterion Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Campaign DayTime Criterion fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign DayTime Criterion Record - Bulk
Defines a campaign day and time criterion that can be uploaded and downloaded in a bulk file.

As your campaign progresses, you may find that your click-through rate and conversion rate are highest during certain times, for example, weeknights. This might be a perfect opportunity to use bid adjustments to improve your chances of displaying your ad Monday through Friday from 6:00 P.M. to 11:00 P.M.. When targeting by time, you are targeting the searcher's local time zone. For example, if you increase your bid by 10% for 6:00 P.M. to 11:00 P.M., that bid adjustment will be effective from 6:00 P.M. to 11:00 P.M. Eastern Time for searchers in New York, then be effective 6:00 P.M. to 11:00 P.M. Pacific Time for searchers in Seattle. Now you are showing your ads when your potential customers are online!

Each day and time criterion defines the day, from hour, from minute, to hour, and to minute requirements for the accompanying criterion bid adjustment. 

> [!NOTE]
> You cannot modify the [Target](#target), [From Hour](#fromhour), [From Minute](#fromminute), [To Hour](#tohour), or [To Minute](#tominute) values for an existing criterion. To modify the day and time ranges, you must delete the criterion and add a new criterion. 

The maximum number of day and time criterions that you can specify per campaign or ad group is 49. You may not specify any overlapping day and time ranges, for example Monday from 3:00AM to 5:00AM and Monday 4:00AM to 6:00AM are not allowed for the same campaign or ad group. Also for a given campaign or ad group, the maximum number of day and time criterions per day that you can specify is seven. For example you can specify up to 7 day and time criterions where the *Day* is set to Monday.

If ad group level day and time criterions are specified, the campaign level day and time criterions are ignored for that ad group. In other words the ad group day and time criterions override the campaign day and time criterions, and are not applied as a union. 

> [!TIP]
> For an overview of how to use target criterions, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

You can download all *Campaign DayTime Criterion* records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignTargetCriterions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new campaign day and time criterion if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Bid Adjustment,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,6.0,,,,,,,,
Campaign DayTime Criterion,Active,,-111,,,ClientIdGoesHere,,Monday,20,,,,0,0,4,0,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCampaignDayTimeCriterion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCampaignDayTimeCriterion
var bulkCampaignDayTimeCriterion = new BulkCampaignDayTimeCriterion
{
    // 'Campaign' column header in the Bulk file is read-only
    CampaignName = null,

    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // 'Modified Time' column header in the Bulk file is read-only
    //  LastModifiedTime cannot be set in the Bulk entity

    // Map properties in the Bulk file to the 
    // BiddableCampaignCriterion object of the Campaign Management service.

    CampaignCriterion = new BiddableCampaignCriterion
    {
        // 'Parent Id' column header in the Bulk file
        CampaignId = campaignIdKey,

        Criterion = new DayTimeCriterion
        {
            // 'Target' column header in the Bulk file
            Day = Day.Monday,

            // 'From Hour' column header in the Bulk file
            FromHour = 0,

            // 'To Hour' column header in the Bulk file
            ToHour = 4,

            // 'From Minute' column header in the Bulk file
            FromMinute = Minute.Zero,

            // 'To Minute' column header in the Bulk file
            ToMinute = Minute.Zero
        },

        CriterionBid = new BidMultiplier
        {
            // 'Bid Adjustment' column header in the Bulk file
            Multiplier = 20,
        },

        // 'Id' column header in the Bulk file
        Id = null,

        // 'Status' column header in the Bulk file
        Status = CampaignCriterionStatus.Active,
    }
};

uploadEntities.Add(bulkCampaignDayTimeCriterion);

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

For a *Campaign DayTime Criterion* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Bid Adjustment](#bidadjustment)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [From Hour](#fromhour)
- [From Minute](#fromminute)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Target](#target)
- [To Hour](#tohour)
- [To Minute](#tominute)

## <a name="bidadjustment"></a>Bid Adjustment
The percentage amount that you want to adjust the bid for the corresponding *Target*, *From Hour*, *From Minute*, *To Hour*, and *To Minute*. 

Supported values are negative ninety (-90) through positive nine hundred (900). 

**Add:** Optional. The bid adjustment will be set to the default of *0* if not included.  
**Update:** Required  
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign where this criterion is applied or removed.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Optional  

## <a name="fromhour"></a>From Hour
The starting hour to target.

Supported values range from 0 to 23.

**Add:** Required  
**Update:** Required. You cannot modify the [Target](#target), [From Hour](#fromhour), [From Minute](#fromminute), [To Hour](#tohour), or [To Minute](#tominute) values for an existing criterion. To modify the day and time ranges, you must delete the criterion and add a new criterion.  
**Delete:** Read-only  

## <a name="fromminute"></a>From Minute
The starting minute to target.

Supported values are 0, 15, 30, and 45. 

**Add:** Required  
**Update:** Required. You cannot modify the [Target](#target), [From Hour](#fromhour), [From Minute](#fromminute), [To Hour](#tohour), or [To Minute](#tominute) values for an existing criterion. To modify the day and time ranges, you must delete the criterion and add a new criterion.  
**Delete:** Read-only  

## <a name="id"></a>Id
The Microsoft Advertising unique identifier of the criterion.

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

## <a name="parentid"></a>Parent Id
The identifier of the campaign where this criterion is applied or removed.
	
This bulk field maps to the *Id* field of the [Campaign](campaign.md) record. 

**Add:** Read-only and Required. You must either specify an existing campaign identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Campaign](campaign.md) record. This is recommended if you are adding new criterions to a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="status"></a>Status
Represents the association status between the campaign and the criterion. If the criterion is applied to the campaign, this field's value is *Active*. To delete the criterion, set the status to *Deleted*.

**Add:** Read-only. The status will always be set to *Active* when you add criterions. If you upload another value e.g., *Foo* the result file will contain the same value although the criterion is active.  
**Update:** Optional  
**Delete:** Required. The Status must be set to *Deleted*. To delete a specific day and time criterion bid, you must upload the [Status](#status), [Id](#id), and [Parent Id](#parentid).

## <a name="target"></a>Target
The day that you want to target with the corresponding *Bid Adjustment*. 

Supported values are *Sunday*, *Monday*, *Tuesday*, *Wednesday*, *Thursday*, *Friday*, and *Saturday*. 

**Add:** Required  
**Update:** Required. You cannot modify the [Target](#target), [From Hour](#fromhour), [From Minute](#fromminute), [To Hour](#tohour), or [To Minute](#tominute) values for an existing criterion. To modify the day and time ranges, you must delete the criterion and add a new criterion.  
**Delete:** Read-only  

## <a name="tohour"></a>To Hour
The ending hour to target.

Supported values range from 0 to 24. If the [To Hour](#tohour) is set to 24, the [To Minute](#tominute) must be *Zero*.

**Add:** Required  
**Update:** Required. You cannot modify the [Target](#target), [From Hour](#fromhour), [From Minute](#fromminute), [To Hour](#tohour), or [To Minute](#tominute) values for an existing criterion. To modify the day and time ranges, you must delete the criterion and add a new criterion.  
**Delete:** Read-only  

## <a name="tominute"></a>To Minute
The ending minute to target.

Supported values are 0, 15, 30, and 45. 

**Add:** Required  
**Update:** Required. You cannot modify the [Target](#target), [From Hour](#fromhour), [From Minute](#fromminute), [To Hour](#tohour), or [To Minute](#tominute) values for an existing criterion. To modify the day and time ranges, you must delete the criterion and add a new criterion.  
**Delete:** Read-only  
