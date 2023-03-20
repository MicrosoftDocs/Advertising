---
title: "Campaign Customer List Association Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Campaign Customer List Association fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign Customer List Association Record - Bulk
Defines a Campaign Customer List Association that can be uploaded and downloaded in a bulk file. 

Audience targets cannot be set both campaign and ad group level. If you set any biddable campaign level audience criteria, then you cannot set any biddable ad group level audience criteria. Audience exclusions can be set at both campaign and ad group level. Microsoft Advertising applies a union of both campaign and ad group level exclusions.

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

You can download all *Campaign Customer List Association* records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignCustomerListAssociations* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Campaign Customer List Association if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Bid Adjustment,Name,Audience Id,Audience
Format Version,,,,,,,,,6.0,,
Campaign Customer List Association,Paused,,-1111,,,ClientIdGoesHere,,10,,CustomerListIdHere,My Customer List
```

For a *Campaign Customer List Association* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Audience](#audience)
- [Audience Id](#audienceid)
- [Bid Adjustment](#bidadjustment)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)


## <a name="audience"></a>Audience
The name of the customer list.

This bulk field maps to the *Audience* field of the [Customer List](customer-list.md) record.

**Add:** Read-only and Required for some use cases. You must either specify the [Audience](#audience) or [Audience Id](#audienceid) field. If you are adding new Campaign Customer List Associations with new customer lists in the same Bulk file, and if you do not set the [Audience Id](#audienceid) field, then this [Audience](#audience) field must be set as a logical key to the same value as the *Audience* field of the [Customer List](customer-list.md) record. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="audienceid"></a>Audience Id
The Microsoft Advertising identifier of the customer list associated with the campaign.

This bulk field maps to the *Id* field of the [Customer List](customer-list.md) record.

**Add:** Read-only and Required for some use cases. You must either specify the [Audience](#audience) or [Audience Id](#audienceid) field. If you set the [Audience Id](#audienceid) field, you must either specify an existing customer list identifier or specify a negative identifier that is equal to the *Id* field of the parent [Customer List](customer-list.md) record. If the [Audience Id](#audienceid) field is not set, then you must set the [Audience](#audience) field as a logical key to the same value as the *Audience* field of the [Customer List](customer-list.md) record. Any of these options are recommended if you are adding new Campaign Customer List Associations with new customer lists in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="bidadjustment"></a>Bid Adjustment
The percentage you want to increase/decrease the bid amount for the customer list.

Supported values are negative ninety (-90.00) through positive nine hundred (900.00).

> [!IMPORTANT]
> If not specified, the default bid adjustment value is *0*. The default value is subject to change.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign that is associated with the customer list.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Campaign](#campaign) field.

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier for the association between a campaign and customer list.

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
The system-generated identifier of the campaign that is associated to the customer list.

This bulk field maps to the *Id* field of the [Campaign](#campaign) record.

**Add:** Read-only and Required. You must either specify an existing campaign identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Campaign](#campaign) record. This is recommended if you are associating customer lists to a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Campaign](#campaign) field.

## <a name="status"></a>Status
The association status. 

Possible values are *Active*, *Paused*, or *Deleted*. 

**Add:** Optional. The default status value is *Active*.   
**Update:** Optional    
**Delete:** Required. The Status must be set to *Deleted*.

