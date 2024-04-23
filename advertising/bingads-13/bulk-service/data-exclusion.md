---
title: "Data Exclusion Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Data Exclusion fields in a Bulk file.
dev_langs:
  - csharp
---
# Data Exclusion Record - Bulk
Defines the Data Exclusion fields that can be uploaded and downloaded in a bulk file.

You can download all *Data Exclusion* records in the account by including the [DownloadEntity](downloadentity.md) value of *SeasonalityAdjustments* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Data Exclusion.

<!-- ```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Bid Adjustment,Name,Audience Id,Audience
Format Version,,,,,,,,,6.0,,
data exclusion,Paused,,-1111,,,ClientIdGoesHere,,,,CustomAudienceIdHere,My Custom Audience
``` -->

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupDataExclusion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.

<!-- ```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAdGroupNegativeCustomAudienceAssociation
var bulkAdGroupNegativeCustomAudienceAssociation = new BulkAdGroupNegativeCustomAudienceAssociation
{
    // 'Ad Group' column header in the Bulk file
    AdGroupName = null,

    // Map properties in the Bulk file to the 
    // NegativeAdGroupCriterion object of the Campaign Management service.
    NegativeAdGroupCriterion = new NegativeAdGroupCriterion
    {
        // 'Parent Id' column header in the Bulk file
        AdGroupId = adGroupIdKey,
        Criterion = new AudienceCriterion
        {
            // 'Audience Id' column header in the Bulk file
            AudienceId = customAudienceIdKey,
        },
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Status' column header in the Bulk file
        Status = AdGroupCriterionStatus.Paused
    },
    // 'Campaign' column header in the Bulk file
    CampaignName = null,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
    // 'Audience' column header in the Bulk file
    AudienceName = null,
};

uploadEntities.Add(bulkAdGroupNegativeCustomAudienceAssociation);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await BulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();

``` -->

For an *Data Exclusion* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [Campaign Associations](#campaignassociations)
- [Campaign Type](#campaigntype)
- [Description](#description)
- [Device Type](#devicetype)
- [End Date](#enddate)
- [Id](#id)
- [Data Exclusion](#dataexclusion)
- [Start Date](#startdate)

## <a name="campaignassociations"></a>Campaign Associations

Make the data exclusion to these campaigns.

<!-- **Add:** Read-only and Required for some use cases. You must either specify the [Audience](#audience) or [Audience Id](#audienceid) field. If you are adding new Ad Group Negative Custom Audience Associations with new custom audiences in the same Bulk file, and if you do not set the [Audience Id](#audienceid) field, then this [Audience](#audience) field must be set as a logical key to the same value as the *Audience* field of the [Custom Audience](custom-audience.md) record. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only    
**Delete:** Read-only   -->

## <a name="campaigntype"></a>Campaign Type

Make the data exclusion to these campaign types.

<!-- **Add:** Read-only and Required for some use cases. You must either specify the [Audience](#audience) or [Audience Id](#audienceid) field. If you set the [Audience Id](#audienceid) field, you must either specify an existing custom audience identifier or specify a negative identifier that is equal to the *Id* field of the parent [Custom Audience](custom-audience.md) record. If the [Audience Id](#audienceid) field is not set, then you must set the [Audience](#audience) field as a logical key to the same value as the *Audience* field of the [Custom Audience](custom-audience.md) record. Any of these options are recommended if you are adding new Ad Group Negative Custom Audience Associations with new custom audiences in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only  
**Delete:** Read-only   -->

## <a name="description"></a>Description

A description for the data exclusion.

<!-- **Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only   -->

## <a name="devicetype"></a>Device Type

Make the data exclusion to these device types.

<!-- **Add:** Optional  
**Update:** Optional    
**Delete:** Read-only   -->

## <a name="enddate"></a>End Date

The end date.

**Important**: The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

<!-- **Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  -->

## <a name="id"></a>Id

The system-generated identifier for the data exclusion.

<!-- **Add:** Read-only  
**Update:** Read-only and Required  
**Delete:** Read-only and Required   -->

## <a name="dataexclusion"></a>Data Exclusion

The name of the data exclusion.

<!-- **Add:** Read-only and Required. You must either specify an existing ad group identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Ad Group](ad-group.md) record. This is recommended if you are associating custom audiences to a new ad group in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field. -->

## <a name="startdate"></a>Start Date

The start date.

Important: The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

<!-- **Add:** Optional. The default status value is *Active*.   
**Update:** Optional    
**Delete:** Required. The Status must be set to *Deleted*. -->