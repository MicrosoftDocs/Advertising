---
title: "Similar Remarketing List Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Similar Remarketing List fields in a Bulk file.
dev_langs:
  - csharp
---
# Similar Remarketing List Record - Bulk
Defines an audience that is similar to one of your remarketing lists.

Microsoft Advertising will automatically generate similar audiences for remarketing lists. 

> [!NOTE]
> You must have at least one remarketing list that has active associations with at least 1,000 users for Microsoft Advertising to generate a similar audience.
>
> A similar audience needs to have at least 300 users on the search network or the Microsoft Audience Network before it can be associated with an active campaign or ad group.
>
> A similar audience takes up to 24 hours to build and targeting for it won't take effect until that point.

You cannot create or edit the similar audience for a remarketing list. Having said that, you can add and delete similar remarketing list associations and exclusions. If you delete the source remarketing list, then the similar audience will also be deleted. If a similar audience is associated with a campaign or ad group, then you cannot delete the source remarketing list.

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

You can download all *Similar Remarketing List* records in the account by including the [DownloadEntity](downloadentity.md) value of *SimilarRemarketingLists* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following is a Bulk CSV example download for similar remarketing list. 

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Name,Scope,Audience,Supported Campaign Types,Source Id
Format Version,,,,,,6.0,,,,
Similar Remarketing List,Active,IdHere,ParentIdHere,ClientIdGoesHere,,,Account,Similar Remarketing List,Search;DynamicSearchAds;Shopping;Audience,SourceRemarketingListIdHere
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to download the *BulkSimilarRemarketingList* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
// Map properties in the Bulk file to the BulkSimilarRemarketingList
var bulkSimilarRemarketingList = new BulkSimilarRemarketingList
{
    // Map properties in the Bulk file to the 
    // SimilarRemarketingList object of the Campaign Management service.
    SimilarRemarketingList = new SimilarRemarketingList
    {
        // 'Audience Network Size' column header in the Bulk file
        AudienceNetworkSize = null,
        // 'Id' column header in the Bulk file
        Id = similarRemarketingListIdKey,
        // 'Audience' column header in the Bulk file
        Name = "Similar Remarketing List",
        // 'Parent Id' column header in the Bulk file
        ParentId = accountIdKey,
        // 'Scope' column header in the Bulk file
        Scope = EntityScope.Account,
        // 'Audience Search Size' column header in the Bulk file
        SearchSize = null,
        // 'Source Id' column header in the Bulk file
        SourceId = sourceRemarketingListId,
        // 'Supported Campaign Types' column header in the Bulk file
        SupportedCampaignTypes = null,
    },
                
    // 'Status' column header in the Bulk file
    Status = Status.Active
};
```

For a *Similar Remarketing List* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Audience](#audience)
- [Audience Network Size](#audiencenetworksize)
- [Audience Search Size](#audiencesearchsize)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Scope](#scope)
- [Source Id](#sourceid)
- [Status](#status)
- [Supported Campaign Types](#supportedcampaigntypes)

## <a name="audience"></a>Audience
The name of the similar remarketing list is set by Microsoft Advertising. The name can contain a maximum of 128 characters.

The name can contain a maximum of 128 characters

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="audiencenetworksize"></a>Audience Network Size
The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.

The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.

The audience network size of a similar audience can differ from the audience network size of the [source](#sourceid) remarketing list.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="audiencesearchsize"></a>Audience Search Size
The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.

The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.

The audience search size of a similar audience can differ from the audience search size of the [source](#sourceid) remarketing list.

This property will be nil or empty for up to 24 hours while the [source](#sourceid) remarketing list is being built, for example if you add or update the remarketing list membership duration, rule, or tag identifier of the [source](#sourceid) remarketing list.

This property will be nil or empty if the UET tag associated with the [source](#sourceid) remarketing list has a status of Unverified or Inactive, because the remarketing list can't receive the customer information from your website that it needs to build the list.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="id"></a>Id
The Microsoft Advertising identifier of the similar audience.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="parentid"></a>Parent Id
The Microsoft Advertising identifier of the account or customer. 

If the [Scope](#scope) is set to *Account*, this is the account ID, and otherwise it is the customer ID.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="scope"></a>Scope
Scope defines what accounts can use this audience.

The scope of a similar audience is automatically set to the scope of the [source](#sourceid) remarketing list.

If scope is set to *Account*, the audience can only be associated with campaigns and ad groups within one specified account (ParentId). If scope is set to *Customer*, the audience can be associated with any campaigns and ad groups across all of the customer's accounts.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="sourceid"></a>Source Id
The Microsoft Advertising identifier of the remarketing list that Microsoft Advertising used to generate this similar remarketing list.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="status"></a>Status
The similar remarketing list status.

Possible values are *Active* or *Deleted*. 

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="supportedcampaigntypes"></a>Supported Campaign Types
The semicolon delimited list of campaign types that support this similar remarketing list.

Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  
