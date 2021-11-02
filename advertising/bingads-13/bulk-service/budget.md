---
title: "Budget Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Budget fields in a Bulk file.
dev_langs:
  - csharp
---
# Budget Record - Bulk
Defines a budget that can be uploaded and downloaded in a bulk file. 

You can set a single daily budget that can be used by any campaign within the same account. This will enable you to efficiently distribute a single daily budget across all campaigns or across a defined group of campaigns within your Microsoft Advertising account.

Say you have a budget of $20 to be used uniformly between two campaigns every day. On a given day Campaign A spends only $8 (of its $10 budget) because it got a smaller amount of impressions and clicks than usual. Using a Shared Budget, if Campaign B is performing well then Microsoft Advertising will automatically take the remaining $2 and allocate it to Campaign B. This will increase the chances that the remaining budget will be used to send you more traffic.

You can download all *Budget* records in the account by including the [DownloadEntity](downloadentity.md) value of *Budgets* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new budget. 

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Budget Id,Budget Name,Budget,Budget Type,Name
Format Version,,,,,,,,,,6.0
Budget,Active,-20,0,ClientIdGoesHere,,,My Shared Budget,50,DailyBudgetStandard,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkBudget* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkBudget
var bulkBudget = new BulkBudget
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
                
    // Map properties in the Bulk file to the 
    // Budget object of the Campaign Management service.
    Budget = new Budget
    {
        // 'Budget' column header in the Bulk file
        Amount = 50,
        // 'Budget Type' column header in the Bulk file
        BudgetType = BudgetLimitType.DailyBudgetStandard,
        // 'Budget Name' column header in the Bulk file
        Name = "My Shared Budget",
        // 'Id' column header in the Bulk file
        Id = budgetIdKey,
    },

    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkBudget);

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

For a *Budget* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Budget](#budget)
- [Budget Name](#budgetname)
- [Budget Type](#budgettype)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)

## <a name="budget"></a>Budget
The amount to spend daily across all campaigns that share the budget.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="budgetname"></a>Budget Name
The name of the budget. The name must be unique among all budgets within the account. The name can contain a maximum of 255 characters.

The service performs a case-insensitive comparison when it compares the name to existing budget names.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="budgettype"></a>Budget Type
The budget type determines the pace at which the budget is spent throughout the day.  

The only valid budget type that you can set is DailyBudgetStandard. 

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the budget.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the budget can then be referenced in the *Budget Id* field of dependent record types such as [Campaign](campaign.md). This is recommended if you are adding new budget and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
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
The system-generated identifier of the account that contains the budget.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the budget.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.


