---
title: "Campaign Location Intent Criterion Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Campaign Location Intent Criterion fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign Location Intent Criterion Record - Bulk
Defines a campaign location criterion that can be uploaded and downloaded in a bulk file.

Each location intent criterion defines the intent option for all location and radius criterions of the campaign or ad group. There isn't any accompanying criterion bid adjustment. 

The maximum number of location intent criterions that you can specify per campaign or ad group is one.

> [!NOTE]
> You can only have one [Campaign Location Intent Criterion](campaign-location-intent-criterion.md) record per campaign to determine the location intent option that applies for all of the campaign's [Campaign Location Criterion](campaign-location-criterion.md) and [Campaign Radius Criterion](campaign-radius-criterion.md) records. When you create the campaign's first criterion, a [Campaign Location Intent Criterion](campaign-location-intent-criterion.md) record will also be added automatically with the default *Target* set to *PeopleInOrSearchingForOrViewingPages*. You can add or update a campaign's [Campaign Location Intent Criterion](campaign-location-intent-criterion.md), whether or not the campaign has any other criterions. You cannot delete a campaign's [Campaign Location Intent Criterion](campaign-location-intent-criterion.md), although it has no purpose without location or radius criterions. 

> [!TIP]
> For an overview of how to use target criterions, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

You can download all *Campaign Location Intent Criterion* records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignTargetCriterions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new campaign location intent criterion if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Bid Adjustment,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,6.0,,,,,,,,
Campaign Location Intent Criterion,Active,,-111,,,ClientIdGoesHere,,PeopleIn,,,,,,,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCampaignLocationIntentCriterion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCampaignLocationIntentCriterion
var bulkCampaignLocationIntentCriterion = new BulkCampaignLocationIntentCriterion
{
    // 'Campaign' column header in the Bulk file is read-only
    CampaignName = null,

    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // BiddableCampaignCriterion object of the Campaign Management service.

    CampaignCriterion = new BiddableCampaignCriterion
    {
        // 'Parent Id' column header in the Bulk file
        CampaignId = campaignIdKey,

        Criterion = new LocationIntentCriterion
        {
            // 'Target' column header in the Bulk file
            IntentOption = IntentOption.PeopleIn
        },

        CriterionBid = null,

        // 'Id' column header in the Bulk file
        Id = null,

        // 'Status' column header in the Bulk file
        Status = CampaignCriterionStatus.Active,
    }
};

uploadEntities.Add(bulkCampaignLocationIntentCriterion);

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

For a *Campaign Location Intent Criterion* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Target](#target)

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

## <a name="id"></a>Id
The identifier of the criterion.

> [!NOTE]
> Currently the location intent criterion identifier is equal to the parent identifier, although you should not take a dependency on that relationship. As a best practice you should consider the location intent criterion identifier as distinct.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The identifier of the a campaign where this criterion is applied or removed.
	
This bulk field maps to the *Id* field of the [Campaign](campaign.md) record. 

**Add:** Read-only and Required. You must either specify an existing a campaign identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Campaign](campaign.md) record. This is recommended if you are adding new criterions to a new a campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="status"></a>Status
Represents the association status between the a campaign and the criterion. If the criterion is set for the a campaign, this field's value is *Active*. To delete the criterion, set the status to *Deleted*.

**Add:** Read-only. The status will always be set to *Active* when you add criterions. If you upload another value e.g., *Foo* the result file will contain the same value although the criterion is active.  
**Update:** Optional  
**Delete:** Required. The Status must be set to *Deleted*. To delete a specific location intent criterion, you must upload the [Status](#status) and [Parent Id](#parentid). 


## <a name="target"></a>Target
Determines whether a person must be physically located in the targeted location in order for the ad to display.

The following values are supported. The default value is *PeopleInOrSearchingForOrViewingPages*.
  - Use *PeopleInOrSearchingForOrViewingPages* if you want to show ads to people in, searching for, or viewing pages about your targeted location.  
  - Use *PeopleSearchingForOrViewingPages* if you want to show ads to people searching for or viewing pages about your targeted location.  
  - Use *PeopleIn* if you want to show ads to people in your targeted location.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field, then it must be set to a valid value i.e., *PeopleInOrSearchingForOrViewingPages*, *PeopleSearchingForOrViewingPages*, or *PeopleIn*.  
**Delete:** Read-only  
