---
title: "Campaign Negative Age Criterion Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 5/18/2026
description: Describes the Campaign Negative Age Criterion fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign Negative Age Criterion Record - Bulk API

Defines a campaign negative age criterion that can be uploaded and downloaded in a bulk file.

You can exclude customers by age so that your ads are not displayed to people in specified age ranges. Each negative age criterion defines an age range to exclude for the campaign.

The maximum number of age criterions that you can specify per campaign is five, i.e. one for each of the supported age ranges *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFourtyNine*, *FiftyToSixtyFour*, and *SixtyFiveAndAbove*. You can also exclude *Unknown* i.e., people whose age is not known.

Negative age criterions at the campaign level are only supported for Performance Max campaigns.

> **Tip**
> For an overview of how to use target criterions, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

You can download all Campaign Negative Age Criterion records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignTargetCriterions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new campaign negative age criterion if a valid *Parent Id* value is provided.

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Client Id,Modified Time,Target,Bid Adjustment,Name,Radius,Unit,From Hour,From Minute,To Hour,To Minute,Latitude,Longitude
Format Version,,,,,,,,,,6.0,,,,,,,,
Campaign Negative Age Criterion,Active,,-111,,,ClientIdGoesHere,,EighteenToTwentyFour,,,,,,,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCampaignNegativeAgeCriterion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCampaignNegativeAgeCriterion
var bulkCampaignNegativeAgeCriterion = new BulkCampaignNegativeAgeCriterion
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

        Criterion = new AgeCriterion
        {
            // 'Target' column header in the Bulk file
            AgeRange = AgeRange.EighteenToTwentyFour,
        },

        // 'Id' column header in the Bulk file
        Id = null,

        // 'Status' column header in the Bulk file
        Status = CampaignCriterionStatus.Active,
    }
};

uploadEntities.Add(bulkCampaignNegativeAgeCriterion);

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

For a Campaign Negative Age Criterion record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Target](#target)

## Campaign

The name of the campaign where this criterion is applied or removed.

**Add:** Read-only
**Delete:** Read-only

## <a name="clientid"></a>Client Id

Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional
**Delete:** Optional

## Id

The Microsoft Advertising unique identifier of the criterion.

**Add:** Read-only
**Delete:** Read-only and Required

## <a name="modifiedtime"></a>Modified Time

The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> **Note**
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only
**Delete:** Read-only

## <a name="parentid"></a>Parent Id

The identifier of the campaign where this criterion is applied or removed.

This bulk field maps to the *Id* field of the [Campaign](campaign.md) record.

**Add:** Read-only and Required. You must either specify an existing campaign identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Campaign](campaign.md) record. This is recommended if you are adding new criterions to a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](bulk-file-schema.md#referencekeys).
**Delete:** Read-only and Required

## Status

Represents the association status between the campaign and the criterion. If the criterion is applied to the campaign, this field's value is *Active*. To delete the criterion, set the status to *Deleted*.

**Add:** Read-only. The status will always be set to *Active* when you add criterions. If you upload another value e.g., *Foo* the result file will contain the same value although the criterion is active.
**Delete:** Required. The Status must be set to *Deleted*. To delete a specific negative age criterion, you must upload the *Status*, *Id*, and *Parent Id*.

## Target

The age range that you want to exclude.

Supported values are *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFourtyNine*, *FiftyToSixtyFour*, and *SixtyFiveAndAbove*. You can also exclude *Unknown* i.e., people whose age is not known.

> **Warning**
> Your reach may be significantly reduced if you exclude the Unknown category for a campaign.

> **Note**
> In many countries or regions, online advertisers are not supposed to target any users less than 18 years old. Microsoft Advertising does not deliver interest-based advertising to children whose birthdate in their Microsoft account identifies them as under 13 years of age. For more information see the [Microsoft Privacy Statement](https://privacy.microsoft.com/privacystatement).

**Add:** Required
**Delete:** Read-only
