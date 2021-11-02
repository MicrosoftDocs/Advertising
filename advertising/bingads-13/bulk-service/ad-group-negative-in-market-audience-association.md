---
title: "Ad Group Negative In Market Audience Association Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Ad Group Negative In Market Audience Association fields in a Bulk file.
dev_langs:
  - csharp
---
# Ad Group Negative In Market Audience Association Record - Bulk
Defines an Ad Group Negative In Market Audience Association that can be uploaded and downloaded in a bulk file. 

> [!NOTE]
> This feature is available in Australia, Canada, France, Germany, United Kingdom, and United States. 

Audience targets cannot be set both campaign and ad group level. If you set any biddable campaign level audience criteria, then you cannot set any biddable ad group level audience criteria. Audience exclusions can be set at both campaign and ad group level. Microsoft Advertising applies a union of both campaign and ad group level exclusions.

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

You can download all *Ad Group Negative In Market Audience Association* records in the account by including the [DownloadEntity](downloadentity.md) value of *AdGroupNegativeInMarketAudienceAssociations* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Ad Group Negative In Market Audience Association if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Bid Adjustment,Name,Audience Id,Audience
Format Version,,,,,,,,,6.0,,
Ad Group Negative In Market Audience Association,Paused,,-1111,,,ClientIdGoesHere,,,,InMarketAudienceIdHere,My In Market Audience
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupNegativeInMarketAudienceAssociation* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAdGroupNegativeInMarketAudienceAssociation
var bulkAdGroupNegativeInMarketAudienceAssociation = new BulkAdGroupNegativeInMarketAudienceAssociation
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
            AudienceId = inMarketAudienceIdKey,
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

uploadEntities.Add(bulkAdGroupNegativeInMarketAudienceAssociation);

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

For an *Ad Group Negative In Market Audience Association* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Audience](#audience)
- [Audience Id](#audienceid)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)

## <a name="adgroup"></a>Ad Group
The name of the ad group that is associated with the in-market audience.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.  

## <a name="audience"></a>Audience
The name of the in-market audience.

This bulk field maps to the *Audience* field of the [In Market Audience](in-market-audience.md) record.

Bulk API download returns all in-market audience associations, whether the in-market audience is active or deleted. If the association is for a deleted in-market audience, then this field will be set to the same value as the [Audience Id](#audienceid) field. 

**Add:** Read-only and Required for some use cases. You must either specify the [Audience](#audience) or [Audience Id](#audienceid) field. If you are adding new Ad Group Negative In Market Audience Associations with new in-market audiences in the same Bulk file, and if you do not set the [Audience Id](#audienceid) field, then this [Audience](#audience) field must be set as a logical key to the same value as the *Audience* field of the [In Market Audience](in-market-audience.md) record. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="audienceid"></a>Audience Id
The Microsoft Advertising identifier of the in-market audience associated with the ad group.

This bulk field maps to the *Id* field of the [In Market Audience](in-market-audience.md) record.

**Add:** Read-only and Required for some use cases. You must either specify the [Audience](#audience) or [Audience Id](#audienceid) field. If you set the [Audience Id](#audienceid) field, you must either specify an existing in-market audience identifier or specify a negative identifier that is equal to the *Id* field of the parent [In Market Audience](in-market-audience.md) record. If the [Audience Id](#audienceid) field is not set, then you must set the [Audience](#audience) field as a logical key to the same value as the *Audience* field of the [In Market Audience](in-market-audience.md) record. Any of these options are recommended if you are adding new Ad Group Negative In Market Audience Associations with new in-market audiences in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign that contains the ad group.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier for the association between an ad group and in-market audience.

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
The system-generated identifier of the ad group that is associated to the in-market audience.

This bulk field maps to the *Id* field of the [Ad Group](ad-group.md) record.

**Add:** Read-only and Required. You must either specify an existing ad group identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Ad Group](ad-group.md) record. This is recommended if you are associating in-market audiences to a new ad group in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="status"></a>Status
The association status. 

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default status value is *Active*.   
**Update:** Optional    
**Delete:** Required. The Status must be set to *Deleted*.

