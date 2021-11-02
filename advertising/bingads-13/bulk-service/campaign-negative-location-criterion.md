---
title: "Campaign Negative Location Criterion Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Campaign Negative Location Criterion fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign Negative Location Criterion Record - Bulk
Defines a campaign negative location criterion that can be uploaded and downloaded in a bulk file.

Although location criterions are most often used to designate the specific locations where you want to show your ads, Microsoft Advertising also lets you specify locations you want to exclude from seeing your ads.

Each negative location criterion defines a location code where you do not want your ads to show. 

The maximum number of combined location and negative location criterions that you can specify per campaign or ad group is 10,000. 

If ad group level location criterions are specified (positive or negative), the campaign level location criterions are ignored for that ad group. In other words the ad group location criterions override the campaign location criterions, and are not applied as a union.  

Also note that you must consider the location, negative location, and radius criterions as a set of *geo criterions*. If the ad group has any geo criterions, then none of the campaign's geo criterions are inherited. If the ad group doesn't have any geo criterions, then all of the campaign's geo criterions are inherited. The geo criterions can be inherited from the campaign even if the ad group has a location intent criterion. If the ad group's geo criterions are used, then the ad group's location intent criterion is used; if the campaign's geo criterions are inherited, then the campaign's location intent criterion is used and the ad group's location intent criterion is ignored. You cannot delete a campaign or ad group's location intent criterion, although it has no purpose without location or radius criterions. 

> [!TIP]
> For an overview of how to use target criterions, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

You can download all *Campaign Negative Location Criterion* records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignTargetCriterions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new campaign negative location criterion if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Bid Adjustment,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,6.0,,,,,,,,
Campaign Negative Location Criterion,,,-111,PostalCode,,ClientIdGoesHere,,79381,,,,,,,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCampaignNegativeLocationCriterion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCampaignNegativeLocationCriterion
var bulkCampaignNegativeLocationCriterion = new BulkCampaignNegativeLocationCriterion
{
    // 'Campaign' column header in the Bulk file is read-only
    CampaignName = null,

    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // NegativeCampaignCriterion object of the Campaign Management service.

    NegativeCampaignCriterion = new NegativeCampaignCriterion
    {
        // 'Parent Id' column header in the Bulk file
        CampaignId = campaignIdKey,

        Criterion = new LocationCriterion
        {
            // 'Target' column header in the Bulk file
            LocationId = 79381,

            // 'Sub Type' column header in the Bulk file
            LocationType = "PostalCode"
        },

        // 'Id' column header in the Bulk file
        Id = null,

        // 'Status' column header in the Bulk file
        Status = CampaignCriterionStatus.Active,
    }
};

uploadEntities.Add(bulkCampaignNegativeLocationCriterion);

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

For a *Campaign Negative Location Criterion* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Sub Type](#subtype)
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
**Delete:** Required. The Status must be set to *Deleted*. To delete a specific negative location criterion, you must upload the [Status](#status), [Id](#id), and [Parent Id](#parentid). 

## <a name="subtype"></a>Sub Type
The location sub type that you are not targeting. For example the value is *City* if the record represents a city location criterion.

> [!NOTE]
> Neighborhood locations are coming soon. The sub type will be *Neighborhood*. 

New location sub types can be added anytime. Rarely will the location type change for a given location ID. 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="target"></a>Target
The identifier of the location that you do not want to target. 

For possible values, see the *Location Id* field of the [geographical locations file](../guides/geographical-location-codes.md). You can call the [GetGeoLocationsFileUrl](../campaign-management-service/getgeolocationsfileurl.md) operation to download the file. 

> [!IMPORTANT]
> Please check the *Status* field in the [geographical locations file](../guides/geographical-location-codes.md) before adding or updating a location criterion. If the status is *PendingDeprecation*, the location criterion is no longer used for targeting or exclusions. Deprecated location criteria can still be retrieved, but you cannot add or update deprecated location criteria.  

**Add:** Required  
**Update:** Required  
**Delete:** Read-only  
