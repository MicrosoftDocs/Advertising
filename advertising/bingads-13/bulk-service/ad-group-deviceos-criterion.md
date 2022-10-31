---
title: "Ad Group DeviceOS Criterion Record - Bulk"
ms.service: bing-ads
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Ad Group DeviceOS Criterion fields in a Bulk file.
dev_langs:
  - csharp
ms.subservice: bulk-api
---
# Ad Group DeviceOS Criterion Record - Bulk
Defines an ad group device criterion that can be uploaded and downloaded in a bulk file.

When you target by device, you choose to show ads to potential customers when they're using desktops and tablets or smartphones. 

Each device criterion defines a device name for the accompanying criterion bid adjustment. 

The maximum number of device criterions that you can specify per campaign or ad group is three. You must either have three separate criterions for *Computers*, *Smartphones*, and *Tablets*, otherwise no device criterions can exist for the campaign or ad group.

If ad group level device criterions are specified, the campaign level device criterions are ignored for that ad group. In other words the ad group device criterions override the campaign device criterions, and are not applied as a union.   

> [!TIP]
> For an overview of how to use target criterions, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

You can download all *Ad Group DeviceOS Criterion* records in the account by including the [DownloadEntity](downloadentity.md) value of *AdGroupTargetCriterions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add three new ad group device criterions (one for each device type) if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Ad Group,Client Id,Modified Time,Target,Bid Adjustment,Name,OS Names,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,,6.0,,,,,,,,,
Ad Group DeviceOS Criterion,Active,,-1111,,,,ClientIdGoesHere,,Computers,20,,,,,,,,,,
Ad Group DeviceOS Criterion,,,-1111,,,,ClientIdGoesHere,,Smartphones,0,,,,,,,,,,
Ad Group DeviceOS Criterion,,,-1111,,,,ClientIdGoesHere,,Tablets,0,,,,,,,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupDeviceOSCriterion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

var bulkAdGroupDeviceCriterions = new [] {
    // Map properties in the Bulk file to the BulkAdGroupDeviceCriterion
    new BulkAdGroupDeviceCriterion
    {
        // 'Ad Group' column header in the Bulk file is read-only
        AdGroupName = null,
                    
        // 'Campaign' column header in the Bulk file is read-only
        CampaignName = null,

        // 'Client Id' column header in the Bulk file
        ClientId = "ClientIdGoesHere",

        // Map properties in the Bulk file to the 
        // BiddableAdGroupCriterion object of the Campaign Management service.

        BiddableAdGroupCriterion = new BiddableAdGroupCriterion
        {
            // 'Parent Id' column header in the Bulk file
            AdGroupId = adGroupIdKey,

            Criterion = new DeviceCriterion
            {
                // 'Target' column header in the Bulk file
                DeviceName = "Computers",
            },

            CriterionBid = new BidMultiplier
            {
                // 'Bid Adjustment' column header in the Bulk file
                Multiplier = 20,
            },

            // 'Id' column header in the Bulk file
            Id = null,

            // 'Status' column header in the Bulk file
            Status = AdGroupCriterionStatus.Active,
        }
    },
    new BulkAdGroupDeviceCriterion
    {
        ClientId = "ClientIdGoesHere",
        BiddableAdGroupCriterion = new BiddableAdGroupCriterion
        {
            AdGroupId = adGroupIdKey,
            Criterion = new DeviceCriterion
            {
                DeviceName = "Smartphones",
            },
            CriterionBid = new BidMultiplier
            {
                Multiplier = 0,
            },
        }
    },
    new BulkAdGroupDeviceCriterion
    {
        ClientId = "ClientIdGoesHere",
        BiddableAdGroupCriterion = new BiddableAdGroupCriterion
        {
            AdGroupId = adGroupIdKey,
            Criterion = new DeviceCriterion
            {
                DeviceName = "Tablets",
            },
            CriterionBid = new BidMultiplier
            {
                Multiplier = 0,
            },
        }
    },
};

foreach (var bulkAdGroupDeviceCriterion in bulkAdGroupDeviceCriterions)
{
    uploadEntities.Add(bulkAdGroupDeviceCriterion);
}

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

For an *Ad Group DeviceOS Criterion* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Bid Adjustment](#bidadjustment)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Target](#target)

## <a name="adgroup"></a>Ad Group
The name of the ad group where this criterion is applied or removed.  

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="bidadjustment"></a>Bid Adjustment
The percentage amount that you want to adjust the bid for the corresponding *Target*. 

Supported values are -100 (negative one hundred) through positive 900 (nine hundred) percent. Setting the bid adjustment to -100 percent will result in the exclusion of the corresponding *Target*.

**Add:** Optional. The bid adjustment will be set to the default of *0* if not included.  
**Update:** Required  
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign that contains the ad group where this criterion is applied or removed.

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
The identifier of the ad group where this criterion is applied or removed.
	
This bulk field maps to the *Id* field of the [Ad Group](ad-group.md) record. 

**Add:** Read-only and Required. You must either specify an existing ad group identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Ad Group](ad-group.md) record. This is recommended if you are adding new criterions to a new ad group in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="status"></a>Status
Represents the association status between the ad group and the criterion. If the criterion is applied to the ad group, this field's value is *Active*. To delete the criterion, set the status to *Deleted*.

**Add:** Read-only. The status will always be set to *Active* when you add criterions. If you upload another value e.g., *Foo* the result file will contain the same value although the criterion is active.  
**Update:** Optional  
**Delete:** Required. The Status must be set to *Deleted*. To delete a specific device criterion bid, you must upload the [Status](#status), [Id](#id), and [Parent Id](#parentid).

## <a name="target"></a>Target
The name of the device that you want to target with the corresponding *Bid Adjustment*. 

Supported values are *Computers*, *Smartphones*, and *Tablets*.

**Add:** Required. Three separate bids for *Computers*, *Smartphones*, and *Tablets* should be specified together in the bulk file (each bid in a separate record / row). If you do not add individual device criterions representing each of the three device types, no device criterions will be added for the ad group.  
**Update:** Required  
**Delete:** Read-only  
