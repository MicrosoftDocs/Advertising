---
title: "Custom Segment Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Custom Segment fields in a Bulk file.
dev_langs:
  - csharp
---
# Custom Segment Record - Bulk
Defines a custom segment that can be downloaded and uploaded in a bulk file. 

> [!IMPORTANT]
> **Programmatic Terms Acceptance (Recommended):** You can now accept Customer Match terms programmatically when uploading customer data via Bulk API by setting the `Accept Customer Match Term` field to `True` in your bulk file. This eliminates the requirement to accept terms through the Microsoft Advertising UI.
>
> **Legacy Requirement (if not using the new field):** Before you can upload custom segment data via Bulk API without using the `Accept Customer Match Term` field, you must first create one custom segment audience and accept the terms and conditions in the Microsoft Advertising UI. The initial custom segment doesn't need to contain any customer data, but you must select I ACCEPT.
>
> By selecting "I accept" in the UI or by setting `Accept Customer Match Term=True` in the bulk file, you (1) agree that you are able to lawfully disclose audience details, which is personal data, to Microsoft and (2) accept the Customer Match Terms, the Microsoft Advertising Agreement, and the Microsoft Advertising policies. Microsoft will use the data that you upload in accordance with the [Customer Match Terms](https://help.ads.microsoft.com/#apex/ads/en/56921/1).

After 48 hours, check the Audience Size fields e.g., [Audience Search Size](#audiencesearchsize) to see how many of these customers we matched on the Bing Network. At that point, your ads can start showing for this new audience.

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

You can download all *Custom Segment* records in the account by including the [DownloadEntity](downloadentity.md) value of *CustomSegments* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new custom segment with programmatic terms acceptance.

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Name,Description,Scope,Audience,Text
Format Version,,,,,,6.0,,,,
Custom Segment,Active,-10,,ClientIdGoesHere,,,New custom segment description,Account,New custom segment name,keyword1;keyword2;keyword3
```

For a *Custom Segment* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [Audience](#audience)
- [Audience Network Size](#audiencenetworksize)
- [Audience Search Size](#audiencesearchsize)
- [Client Id](#clientid)
- [Description](#description)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Scope](#scope)
- [Status](#status)
- [Supported Campaign Types](#supportedcampaigntypes)

## <a name="audience"></a>Audience
The name of the custom segment.

The name can contain a maximum of 128 characters.  

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="audiencenetworksize"></a>Audience Network Size
The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.

The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="audiencesearchsize"></a>Audience Search Size
The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.

The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.

This property will be empty for up to 24 hours while the audience is being built, for example if you add or update the custom segment membership duration, rule, or tag identifier. 

This property will be empty if the UET tag associated with the custom segment has a status of Unverified or Inactive, because the custom segment can't receive the customer information from your website that it needs to build the list.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="description"></a>Description
The description of the custom segment. Use a description to help you remember what audience you are targeting with this custom segment.

The description can contain a maximum of 1,024 characters.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.   
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the custom segment.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the custom segment can then be referenced in the *Parent Id* field of dependent record types. This is required if you are adding a new custom segment and new custom segment items in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
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
The Microsoft Advertising identifier of the customer that contains the custom segment. 

**Add:** Optional  
**Update:** Read-only. You cannot change the parent ID.  
**Delete:** Read-only  

## <a name="scope"></a>Scope
Scope defines what accounts can use this custom segment. For a custom segment the only supported scope is *Customer*, and the custom segment can be associated with any campaigns and ad groups across all of the customer's accounts.  

**Add:** Required  
**Update:** Read-only. You cannot change the scope.    
**Delete:** Read-only  

## <a name="status"></a>Status
The custom segment status.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Read-only    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="supportedcampaigntypes"></a>Supported Campaign Types
The semicolon delimited list of campaign types that support this custom segment.

Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only
