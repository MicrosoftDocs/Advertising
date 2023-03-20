---
title: "Combined List Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Combined List fields in a Bulk file.
dev_langs:
  - csharp
---
# Combined List Record - Bulk
Defines a combined list that can be downloaded and uploaded in a bulk file. 

A combined list is an audience created from a combination of multiple existing audiences. 

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

You can download all *Combined List* records in the account by including the [DownloadEntity](downloadentity.md) value of *CombinedLists* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new combined list. 

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Name,Description,Scope,Audience,Combination Rule
Format Version,,,,,,6.0,,,,,,
Combined List,Active,-10,,ClientIdGoesHere,,,New combined list description,Customer,New Combined List,NOT(123IdGoesHere,234IdGoesHere)&AND(345IdGoesHere,456IdGoesHere)&OR(567IdGoesHere)
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCombinedList* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCombinedList
var bulkCombinedList = new BulkCombinedList
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // CombinedList object of the Campaign Management service.
    CombinedList = new CombinedList
    {
        // 'Audience Network Size' column header in the Bulk file
        AudienceNetworkSize = null,
        // 'Description' column header in the Bulk file
        Description = "New Combined List",
        // 'Id' column header in the Bulk file
        Id = combinedListIdKey,
        // 'Membership Duration' column header in the Bulk file
        MembershipDuration = 30,
        // 'Audience' column header in the Bulk file
        Name = "Combined List " + DateTime.UtcNow,
        // 'Parent Id' column header in the Bulk file
        ParentId = accountIdKey,
        // 'Combination Rule' column header in the Bulk file
        CombinationRules = new[]
        {
            // Each rule is delimited by a semicolon (;) in the Bulk file
            new CombinationRule
            {
                AudienceIds = new [] { 123, 234 },
                Operator = LogicalOperator.And
            },
            new CombinationRule
            {
                AudienceIds = new [] { 345, 456 },
                Operator = LogicalOperator.And
            },
        },
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

uploadEntities.Add(bulkCombinedList);

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

For a *Combined List* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Audience](#audience)
- [Audience Network Size](#audiencenetworksize)
- [Audience Search Size](#audiencesearchsize)
- [Client Id](#clientid)
- [Combination Rule](#combinationrule)
- [Description](#description)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Scope](#scope)
- [Status](#status)
- [Supported Campaign Types](#supportedcampaigntypes)

## <a name="audience"></a>Audience
The name of the combined list.

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

This property will be empty for up to 24 hours while the audience is being built, for example if you add or update the combined list membership duration, rule, or tag identifier. 

This property will be empty if the UET tag associated with the combined list has a status of Unverified or Inactive, because the combined list can't receive the customer information from your website that it needs to build the list.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="combinationrule"></a>Combination Rule
A combination rule includes conditions used to determine who to add to your combined list.

You can combine custom audiences, customer lists, product audiences, similar audiences, and remarketing lists. You cannot include other combined lists or in-market audiences in a combined list.  

You can create a maximum of 1,000 combined lists per ad account, and up to 5,000 per customer. The combination rule of each list can include up to 100 sets of logical conditions, and each set can contain up to 100 audience IDs.

With some restrictions described below, you can combine audiences using these logical operators:

- OR: This will include customers who are in any of these audience lists. 
- AND: This will include only customers who are in every single one of these audience lists.  
- NOT: This will exclude customers who are in any of these audience lists. 

A logical condition set refers to a group of audience IDs qualified by either OR, AND, or NOT. In the Bulk API each set is delimited by an ampersand ('&'). 

For example here are 10 sets for one combination rule, each with one audience ID:
*NOT(1)&AND(2)&OR(3)&NOT(4)&AND(5)&OR(6)&NOT(7)&AND(8)&OR(9)&NOT(10)*

Here is an example of 10 sets for one combination rule, each with two audience IDs:
*NOT(1,101)&AND(2,102)&OR(3,103)&NOT(4,104)&AND(5,105)&OR(6,106)&NOT(7,107)&AND(8,108)&OR(9,109)&NOT(10,110)*

Evaluation of the logical expression determines who will be added to the combined list. Multiple combinations are always combined with an AND function. This means that a customer must meet all of the criteria of each combination in order to appear in this custom combination audience list. For example, let's say the combination rule is set to *NOT(123,234)&NOT(345,456)&AND(567,678)&OR(789,890)&OR(987,876)*. The combined list will include customers who a) are in both audience 567 and 678, and b) are in either audience 789 or 890, and c) are in either audience 987 or 876, unless d) the customer is in either audience 123, 234, 345, or 456.  

A combined list must include at least one audience using the OR or AND operators. A combined list cannot use only the NOT operator. In that case you should use audience exclusions instead. 

Custom audiences and customer lists cannot be combined with other audience types. 

Similar audiences cannot be combined via the AND or NOT operators. Similar audiences can only be used in a single OR condition. In other words, there can only be one audience set that contains similar audiences, and that set must use the OR operator. 

Duplicate audiences are allowed, although the same audience ID cannot be combined via both the AND and NOT operator. 

If you are creating a new audience together with this Combined List in the same Bulk upload, the combination rule can include a negative identifier that is equal to the *Id* field of the other new audience. For example, if you are creating a new [Remarketing List](remarketing-list.md) and also want to include it in the combined list, you could set the remarketing list's [Id](remarketing-list.md#id) value to *-1*. In the same Bulk upload you can refer to the new remarketing list using *-1* in the combination rule e.g., *NOT(123,234)&AND(345,456)&OR(-1,678)*. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  

If you are creating a new audience together with this Combined List in the same bulk upload, the combination rule can include a negative reference key to the negative *Id* field of the other new audience. You could also use a logical reference key to the *Audience* (name) field of the other new audience. 
- As an example of using a negative reference key, in the same bulk upload include a new [Remarketing List](remarketing-list.md) where it's [Id](remarketing-list.md#id) is set to *-1*. Then refer to the new remarketing list using *-1* in the combination rule e.g., *NOT(123,234)&AND(345,456)&OR(-1,678)*. 
- As an example of using a logical reference key, in the same bulk upload include a new [Remarketing List](remarketing-list.md) where it's [Audience](remarketing-list.md#audience) name is set to *My New Audience*. Then refer to the new remarketing list using *'My Audience'* (surrounded by single quotes) in the combination rule e.g., *NOT(123,234)&AND(345,456)&OR('My New Audience',678)*. 

For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.     
**Delete:** Read-only  

## <a name="description"></a>Description
The description of the combined list. Use a description to help you remember what audience you are targeting with this combined list.

The description can contain a maximum of 1,024 characters.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.   
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the combined list.

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
The system-generated identifier of the account or customer. If the [Scope](#scope) is set to *Account*, this is the account ID, and otherwise it is the customer ID.

**Add:** Optional  
**Update:** Read-only. You cannot change the parent ID.  
**Delete:** Read-only  

## <a name="scope"></a>Scope
Scope defines what accounts can use this combined list. If scope is set to *Account*, the combined list can only be associated with campaigns and ad groups within one specified account ([Parent Id](#parentid)). If scope is set to *Customer*, the combined list can be associated with any campaigns and ad groups across all of the customer's accounts.

**Add:** Required  
**Update:** Read-only. You cannot change the scope.    
**Delete:** Read-only  

## <a name="status"></a>Status
The combined list status.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Read-only    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="supportedcampaigntypes"></a>Supported Campaign Types
The semicolon delimited list of campaign types that support this combined list.

Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only
