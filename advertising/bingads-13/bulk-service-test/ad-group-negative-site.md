---
title: "Ad Group Negative Site Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Ad Group Negative Site fields in a Bulk file.
dev_langs:
  - csharp
---
# Ad Group Negative Site Record - Bulk
Defines a negative site assigned to an ad group that can be uploaded and downloaded in a bulk file.

In the bulk schema each of the negative sites associated with an ad group are represented individually by their own row. For example if you have two negative sites, they are represented by two *Ad Group Negative Site* records in the bulk file with *Status* set to Active. When uploading or downloading records for an updated list of associated negative sites, one record will have *Status* set to Deleted with an empty *Website* field. This indicates that some changes have been made to the list, and the *Ad Group Negative Site* records that follow are active.

> [!NOTE]
> The *Ad Group Negative Site* can be added and deleted, but cannot be updated.

You can download all *Ad Group Negative Site* records in the account by including the [DownloadEntity](downloadentity.md) value of *AdGroupNegativeSites* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new ad group negative site if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Website,Client Id,Modified Time,Name
Format Version,,,,,,,,,6.0
Ad Group Negative Site,Active,,-1111,,,contoso.com,ClientIdGoesHere,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupNegativeSite* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();
	
// Map properties in the Bulk file to the BulkAdGroupNegativeSites
var bulkAdGroupNegativeSites = new BulkAdGroupNegativeSites
{
    // 'Ad Group' column header in the Bulk file
    AdGroupName = null,

    // Map properties in the Bulk file to the 
    // AdGroupNegativeSites object of the Campaign Management service.
    AdGroupNegativeSites = new AdGroupNegativeSites
    {
        // 'Parent Id' column header in the Bulk file
        AdGroupId = adGroupIdKey,
        NegativeSites = new[]
        {
            // 'Website' column header in the Bulk file
            "contoso.com",
        }
    },
                
    // 'Campaign' column header in the Bulk file
    CampaignName = null,
    // 'Status' column header in the Bulk file
    Status = Status.Active,
};

// BulkAdGroupNegativeSites does not support 'Client Id' and
// replaces all negative sites for the ad group, whereas BulkAdGroupNegativeSite
// enables you to add or delete one negative site at a time.

// Map properties in the Bulk file to the BulkAdGroupNegativeSite
var bulkAdGroupNegativeSite = new BulkAdGroupNegativeSite
{
    // 'Parent Id' column header in the Bulk file
    AdGroupId = adGroupIdKey,
    // 'Ad Group' column header in the Bulk file
    AdGroupName = null,
    // 'Campaign' column header in the Bulk file
    CampaignName = null,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
    // 'Status' column header in the Bulk file
    Status = Status.Active,
    // 'Website' column header in the Bulk file
    Website = "contoso.com",
};

uploadEntities.Add(bulkAdGroupNegativeSite);

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

For an *Ad Group Negative Site* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Website](#website)

## <a name="adgroup"></a>Ad Group
The name of the ad group that contains the negative site.

**Add:** Read-only and Required  
**Update:** Not applicable. A negative site can be added and deleted, but cannot be updated.  
**Delete:** Read-only and Required  

> [!NOTE]
> For add and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="campaign"></a>Campaign
The name of the campaign that contains the ad group and negative site.

**Add:** Read-only  
**Update:** Not applicable. A negative site can be added and deleted, but cannot be updated.  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Not applicable. A negative site can be added and deleted, but cannot be updated.    
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Not applicable. A negative site can be added and deleted, but cannot be updated.  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the ad group that contains the negative site.

This bulk field maps to the *Id* field of the [Ad Group](ad-group.md) record.

**Add:** Read-only and Required. You must either specify an existing ad group identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Ad Group](ad-group.md) record. This is recommended if you are adding new negative sites to a new ad group in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Not applicable. A negative site can be added and deleted, but cannot be updated.  
**Delete:** Read-only  

> [!NOTE]
> For add and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="status"></a>Status
Represents the association status between the ad group and the negative site.

If the negative site is associated with the ad group, this  field's value is *Active*.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Not applicable. A negative site can be added and deleted, but cannot be updated.    
**Delete:** Required. The Status must be set to *Deleted*. To delete a specific negative site, you must upload the [Status](#status), [Parent Id](#parentid), and [Website](#website). To delete all negative sites for the ad group, you only need to upload the [Status](#status) and [Parent Id](#parentid) in a single record. Then optionally you can add new negative site records to replace the deleted set.    

## <a name="website"></a>Website
The URL of the website where you do not want your ads displayed.

Each URL must specify the domain name e.g., *contoso.com* which can include up to three subdomains and two subdirectories. The subdomain count includes the *www* prefix. For example *one.two.three.contoso.com/1/2*, *www.two.three.contoso.com/1/2*, and *one.two.contoso.co.uk/1/2* are valid URLs, whereas *one.two.three.contoso.co.uk/1/2* (too many subdomains) and *one.two.three.contoso.com/1/2/3* (too many subdirectories) are not. Duplicate negative site URLs per campaign or ad group are not allowed.

You can only exclude websites for syndicated search websites. The ad group's [network](ad-group.md#networkdistribution) must be set to *OwnedAndOperatedAndSyndicatedSearch*.

Negative site URLs specified at the ad group level are used instead of any negative site URLs specified at the campaign level. If you associate any [website exclusion lists](../campaign-management-service/placementexclusionlist.md) with an ad account (available via the Campaign Management service), the list of [negative sites](../campaign-management-service/negativesite.md) are used in addition to the [campaign negative sites](campaign-negative-site.md) or [ad group negative sites](ad-group-negative-site.md).  

**Add:** Required  
**Update:** Not applicable. A negative site can be added and deleted, but cannot be updated.    
**Delete:** Read-only

