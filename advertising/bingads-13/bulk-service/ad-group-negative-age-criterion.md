---
title: "Ad Group Negative Age Criterion Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Describes the Ad Group Negative Age Criterion fields in a Bulk file.
dev_langs:
  - csharp
---
# Ad Group Negative Age Criterion Record - Bulk
Defines an Ad Group Negative Age Criterion that can be uploaded and downloaded in a bulk file. 

You can exclude customers by age so that your ads are displayed more frequently to people who will be interested in them. 

If ad group level age criterions are specified, the campaign level age criterions are ignored for that ad group. In other words the ad group age criterions override the campaign age criterions, and are not applied as a union. 

> [!TIP]
> For an overview of how to use target criterions, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

You can download all *Ad Group Negative Age Criterion* records in the account by including the [DownloadEntity](downloadentity.md) value of *AdGroupTargetCriterions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Ad Group Negative Age Criterion if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Ad Group,Client Id,Modified Time,Target,,Name,OS Names,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,,6.0,,,,,,,,,
Ad Group Negative Age Criterion,Active,,-1111,,,,ClientIdGoesHere,,EighteenToTwentyFour,,,,,,,,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupNegativeAgeCriterion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAdGroupNegativeAgeCriterion
var BulkAdGroupNegativeAgeCriterion = new BulkAdGroupNegativeAgeCriterion
{
    // 'Ad Group' column header in the Bulk file is read-only
    AdGroupName = null,
                    
    // 'Campaign' column header in the Bulk file is read-only
    CampaignName = null,
    
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // NegativeAdGroupCriterion object of the Campaign Management service.

    NegativeAdGroupCriterion = new NegativeAdGroupCriterion
    {
        // 'Parent Id' column header in the Bulk file
        AdGroupId = adGroupIdKey,

        Criterion = new AgeCriterion
        {
            // 'Target' column header in the Bulk file
            AgeRange = AgeRange.EighteenToTwentyFour,
        },

        // 'Id' column header in the Bulk file
        Id = null,

        // 'Status' column header in the Bulk file
        Status = AdGroupCriterionStatus.Active,
    }
};

uploadEntities.Add(BulkAdGroupNegativeAgeCriterion);

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

For an *Ad Group Negative Age Criterion* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
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

> [!NOTE] 
> Previously with Campaign Management API version 10 it was possible to associate one target identifier with multiple campaigns and ad groups using the AddTargetsToLibrary, SetTargetToCampaign, and SetTargetToAdGroup operations. After a campaign or ad group had been disassociated from the shared target, the criterion identifier would be set to *0* (zero) in the Bulk download or Bulk upload result file. 

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
**Delete:** Required. The Status must be set to *Deleted*. To delete a specific age criterion, you must upload the [Status](#status), [Id](#id), and [Parent Id](#parentid).

## <a name="target"></a>Target
The age range that you want to exclude. 

Supported values are *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFourtyNine*, *FiftyToSixtyFour*, and *SixtyFiveAndAbove*. With Audience campaigns you can also exclude *Unknown* i.e., people whose age is not known.

> [!NOTE]
> In many countries, online advertisers are not supposed to target any users less than 18 years old. Microsoft Advertising does not deliver interest-based advertising to children whose birthdate in their Microsoft account identifies them as under 13 years of age. For more information see the [Microsoft Privacy Statement](https://privacy.microsoft.com/privacystatement).

**Add:** Required  
**Update:** Required  
**Delete:** Read-only  
