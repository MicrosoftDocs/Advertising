---
title: "In Market Audience Record - Bulk"
ms.service: bing-ads
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the In Market Audience fields in a Bulk file.
dev_langs:
  - csharp
ms.subservice: bulk-api
---
# In Market Audience Record - Bulk
Defines an in-market audience that can be downloaded in a bulk file. 

> [!NOTE]
> This feature is available in AD, AR, AT, AU, AW, BD, BE, BG, BN, BO, BR, BS, CA, CH, CL, CO, CR, CY, CZ, DE, DK, DM, DO, EC, EE, ES, FI, FJ, FR, GF, GR, GT, GU, GY, HN, HR, HT, HU, ID, IE, IN, IT, KY, LI, LK, LT, LU, LV, MC, MN, MQ, MS, MT, MV, MX, MY, NC, NL, NO, NP, NZ, PA, PE, PF, PG, PH, PL, PR, PT, PY, RO, SE, SG, SI, SK, SM, SV, TH, TT, UK, US, UY, VA, VE, and VN.

> [!NOTE]
> Bulk upload is not supported. You cannot add, update, or delete an in-market audience using the Bing Ads API. Having said that, you can add and delete in-market audience associations and exclusions. 
> Bing Ads API will always return all currently active in-market audiences. The service does not return deleted in-market audiences, or any delta download to see what changed. 
> The in-market audiences returned via Bing Ads API is a union of all available in-market audiences across all markets e.g., AU, CA, DE, FR, UK, and US. The [Audience Network Size](#audiencenetworksize) and [Audience Search Size](#audiencesearchsize) are a sum of lists sizes across all supported markets for a given in-market audience in the corresponding network. The Bing Ads API does not provide details of list sizes per market. For example the "Advertising and Marketing" in-market audience size in the search network might be returned as 17070879 (17.1M) via the Bing Ads API. The breakdown per market shown in the Microsoft Advertising web application might be: 2.88M in US; 474K in AU; 13.7M in UK.   
> You should not take any dependencies on the sandbox in-market audiences. Some in-market audiences are available in sandbox, but not in production. The in-market audience property values can also differ between sandbox and production e.g., the audience name and size. 

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

You can download all *In Market Audience* records in the account by including the [DownloadEntity](downloadentity.md) value of *InMarketAudiences* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following is a Bulk CSV example download for in-market audience. 

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Name,Description,Membership Duration,Scope,Audience,Supported Campaign Types
Format Version,,,,,,6.0,,,,,
In Market Audience,Active,IdHere,ParentIdHere,ClientIdGoesHere,,,In Market Audience Description,30,Account,In Market Audience,Search;DynamicSearchAds;Shopping;Audience
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to download the *BulkInMarketAudience* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
// Map properties in the Bulk file to the BulkInMarketAudience
var bulkInMarketAudience = new BulkInMarketAudience
{
    // Map properties in the Bulk file to the 
    // InMarketAudience object of the Campaign Management service.
    InMarketAudience = new InMarketAudience
    {
        // 'Audience Network Size' column header in the Bulk file
        AudienceNetworkSize = null,
        // 'Description' column header in the Bulk file
        Description = "In Market Audience Description",
        // 'Id' column header in the Bulk file
        Id = InMarketAudienceIdKey,
        // 'Membership Duration' column header in the Bulk file
        MembershipDuration = 30,
        // 'Audience' column header in the Bulk file
        Name = "In Market Audience",
        // 'Parent Id' column header in the Bulk file
        ParentId = accountIdKey,
        // 'Scope' column header in the Bulk file
        Scope = EntityScope.Account,
        // 'Audience Search Size' column header in the Bulk file
        SearchSize = null,
        // 'Supported Campaign Types' column header in the Bulk file
        SupportedCampaignTypes = null,
    },
                
    // 'Status' column header in the Bulk file
    Status = Status.Active
};
```

For an *In Market Audience* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Audience](#audience)
- [Audience Network Size](#audiencenetworksize)
- [Audience Search Size](#audiencesearchsize)
- [Description](#description)
- [Id](#id)
- [Membership Duration](#membershipduration)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Scope](#scope)
- [Status](#status)
- [Supported Campaign Types](#supportedcampaigntypes)

## <a name="audience"></a>Audience
The name of the in-market audience.

The name can contain a maximum of 128 characters.  

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="audiencenetworksize"></a>Audience Network Size
The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="audiencesearchsize"></a>Audience Search Size
The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.

**Add:** Not supported  
**Update:** Not supported   
**Delete:** Not supported  

## <a name="description"></a>Description
The description of the in-market audience. Use a description to help you remember what audience you are targeting with this in-market audience.

The description can contain a maximum of 1,024 characters.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="id"></a>Id
The system-generated identifier of the in-market audience.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="membershipduration"></a>Membership Duration
When you create an in-market audience in the Microsoft Advertising web application, you can specify how far back in time Microsoft Advertising should look for actions that match your in-market audience definition in order to add people to your list.

The mimimum duration is 1 day and the maximum duration allowed is 180 days.

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
The Microsoft Advertising identifier of the customer that contains the in-market audience.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="scope"></a>Scope
Scope defines what accounts can use this in-market audience. For an in-market audience the only supported scope is *Customer*, and the in-market audience can be associated with any campaigns and ad groups across all of the customer's accounts.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported  

## <a name="status"></a>Status
The in-market audience status.

Possible values are *Active* or *Deleted*. 

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported

## <a name="supportedcampaigntypes"></a>Supported Campaign Types
The semicolon delimited list of campaign types that support this in-market audience.

Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.

**Add:** Not supported  
**Update:** Not supported    
**Delete:** Not supported
