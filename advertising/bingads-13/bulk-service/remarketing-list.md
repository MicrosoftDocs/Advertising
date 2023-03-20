---
title: "Remarketing List Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Remarketing List fields in a Bulk file.
dev_langs:
  - csharp
---
# Remarketing List Record - Bulk
Defines a remarketing list that can be downloaded and uploaded in a bulk file. 

> [!NOTE]
> Microsoft Advertising will automatically generate similar audiences for remarketing lists if you are a pilot participant. You cannot create or edit the similar audience for a remarketing list. Having said that, you can add and delete similar remarketing list associations and exclusions. If you delete the source remarketing list, then the similar audience will also be deleted. If a similar audience is associated with a campaign or ad group, then you cannot delete the source remarketing list. See [Similar Remarketing List](similar-remarketing-list.md) for more details. 

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

You can download all *Remarketing List* records in the account by including the [DownloadEntity](downloadentity.md) value of *RemarketingLists* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new remarketing list. 

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Name,Description,Membership Duration,Scope,UET Tag Id,Audience,Remarketing Rule
Format Version,,,,,,6.0,,,,,,
Remarketing List,Active,-10,ParentIdHere,ClientIdGoesHere,,,New list with CustomEventsRule,30,Account,TagIdHere,Remarketing List with CustomEventsRule,CustomEvents(Action Equals play) and (Category Equals video) and (Label Equals trailer) and (Value Equals 5.00)
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkRemarketingList* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkRemarketingList
var bulkRemarketingList = new BulkRemarketingList
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // RemarketingList object of the Campaign Management service.
    RemarketingList = new RemarketingList
    {
        // 'Audience Network Size' column header in the Bulk file
        AudienceNetworkSize = null,
        // 'Description' column header in the Bulk file
        Description = "New list with CustomEventsRule",
        // 'Id' column header in the Bulk file
        Id = remarketingListIdKey,
        // 'Membership Duration' column header in the Bulk file
        MembershipDuration = 30,
        // 'Audience' column header in the Bulk file
        Name = "Remarketing List with CustomEventsRule " + DateTime.UtcNow,
        // 'Parent Id' column header in the Bulk file
        ParentId = accountIdKey,
        // 'Remarketing Rule' column header in the Bulk file
        Rule = new CustomEventsRule
        {
            // The rule definition is translated to the following logical expression: 
            // CustomEvents(Category Equals video) and (Action Equals play) and (Label Equals trailer) 
            // and (Value Equals 5)
            Action = "play",
            ActionOperator = StringOperator.Equals,
            Category = "video",
            CategoryOperator = StringOperator.Equals,
            Label = "trailer",
            LabelOperator = StringOperator.Equals,
            Value = 5.00m,
            ValueOperator = NumberOperator.Equals,
        },
        // 'Scope' column header in the Bulk file
        Scope = EntityScope.Account,
        // 'Audience Search Size' column header in the Bulk file
        SearchSize = null,
        // 'Supported Campaign Types' column header in the Bulk file
        SupportedCampaignTypes = null,
        // 'UET Tag Id' column header in the Bulk file
        TagId = tagIdKey
    },
                
    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkRemarketingList);

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

For a *Remarketing List* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Audience](#audience)
- [Audience Network Size](#audiencenetworksize)
- [Audience Search Size](#audiencesearchsize)
- [Client Id](#clientid)
- [Description](#description)
- [Id](#id)
- [Membership Duration](#membershipduration)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Remarketing Rule](#remarketingrule)
- [Scope](#scope)
- [Status](#status)
- [Supported Campaign Types](#supportedcampaigntypes)
- [UET Tag Id](#uettagid)

## <a name="audience"></a>Audience
The name of the remarketing list.

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

This property will be empty for up to 24 hours while the audience is being built, for example if you add or update the remarketing list membership duration, rule, or tag identifier. 

This property will be empty if the UET tag associated with the remarketing list has a status of Unverified or Inactive, because the remarketing list can't receive the customer information from your website that it needs to build the list.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="description"></a>Description
The description of the remarketing list. Use a description to help you remember what audience you are targeting with this remarketing list.

The description can contain a maximum of 1,024 characters.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.   
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the remarketing list.

**Add:** Read-only  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="membershipduration"></a>Membership Duration
When you create a remarketing list, you can specify how far back in time Microsoft Advertising should look for actions that match your remarketing list definition in order to add people to your list.

The mimimum duration is 1 day and the maximum duration allowed is 180 days.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

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

## <a name="remarketingrule"></a>Remarketing Rule
A rule template includes conditions used to determine who to add to your remarketing list.

You can choose one of the four types of rules to target different audiences: *CustomEventsRule*, *PageVisitorsRule*, *PageVisitorsWhoDidNotVisitAnotherPageRule*, and *PageVisitorsWhoVisitedAnotherPageRule*. For details on the format of each rule in the bulk file, see the [CustomEvents](#CustomEvents), [PageVisitors](#PageVisitors), [PageVisitorsWhoDidNotVisitAnotherPage](#PageVisitorsWhoDidNotVisitAnotherPage), and [PageVisitorsWhoVisitedAnotherPage](#PageVisitorsWhoVisitedAnotherPage) rule template remarks sections below.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you want to keep any of the previous rule items, then you must explicitly set them again during update. You can choose to change the type of rule during update.    
**Delete:** Read-only  

### <a name="CustomEvents"></a>CustomEvents Rule Template
For the *CustomEvents* rule, you must include one or more of the following conditional event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*). If more than one condition is specified, the conditions are joined using the logical *AND* operator. In other words the visitor will only be added to your remarketing list if all of the specified rule conditions are met.

For example let's say that the following custom events are set as a logical expression in the bulk file:

*CustomEvents(Category Equals video) and (Action Equals play) and (Label Equals trailer) and (Value Equals 5)*

Evaluation of the logical expression determines who will be added to the remarketing list.  

### <a name="PageVisitors"></a>PageVisitors Rule Template
For the *PageVisitors* rule, you must include one or more rule item groups. 

> [!IMPORTANT]
> During calendar year 2021 we added support for conjunctive normal form (CNF). Previously Microsoft Advertising only supported disjunctive normal form (DNF). The default normal form for a new page visitors rule remains DNF. However, you must ensure that your application can appropriately read and distinguish between CNF and DNF. Your application should no longer assume that the rule is disjunctive.  

If the normal form is conjunctive (CNF), the rule item conditions for the same page are first joined using the logical *OR* operator. Then, each result from the list of rule item groups are joined using the logical *AND* operator. In other words the user will be added to your remarketing list if any of the specified rule item conditions within all of the rule item groups are met.

- Rule 1 AND Rule 2
- (Rule 1 OR Rule 2) AND Rule 3
- (Rule 1 OR Rule 2) AND (Rule 3 OR Rule 4)

If the normal form is disjunctive (DNF), the rule item conditions for the same page are first joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. In other words the user will be added to your remarketing list if all of the specified rule item conditions within any one of the rule item groups are met.

- Rule 1 OR Rule 2
- (Rule 1 AND Rule 2) OR Rule 3
- (Rule 1 AND Rule 2) OR (Rule 3 AND Rule 4)

For an example of DNF evaluation, let's say that the following rule item groups are set as a logical expression in the bulk file:

*PageVisitors((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))*

Evaluation of the logical expression determines which of the following example users will be added to the remarketing list.

|User|Url Visited|Referrer Url|Added to List|
|-----------|---------------|-------------|-------------|
|User 1|A<br/>|X|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))*<br/><br/>*(False and True) or (True) or (False)*<br/><br/>*False or True or False*<br/><br/>*True*|
|User 2|B<br/>|Y|No. Evaluation of the logical expression results as *False*.<br/><br/>*((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))*<br/><br/>*(False and True) or (False) or (False)*<br/><br/>*False or False or False*<br/><br/>*False*|
|User 3|C<br/>|Z|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))*<br/><br/>*(False and False) or (True) or (True)*<br/><br/>*False or True or True*<br/><br/>*True*|

### <a name="PageVisitorsWhoDidNotVisitAnotherPage"></a>PageVisitorsWhoDidNotVisitAnotherPage Rule Template
Remarketing rules are conditions used to determine who to add to your remarketing list. For the *PageVisitorsWhoDidNotVisitAnotherPage* rule, you must include one or more rule item groups for the page visited (*IncludeRuleItemGroups*), and you must also include one or more rule item groups for the page that must not have been visited (*ExcludeRuleItemGroups*). 

For each rule item group within *IncludeRuleItemGroups*, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. 

Likewise for each rule item group within *ExcludeRuleItemGroups*, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. Finally, the logical *NOT* operator will be applied to the aggregated result of exclude rule item groups.

In other words the visitor will be added to your remarketing list if any of the include rule item group conditions are met, and none of the exclude rule item group conditions are met.

For example let's say that the following rule item groups are set as a logical expression in the bulk file:

*(((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and not (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*

Evaluation of the logical expression determines which of the following example users will be added to the remarketing list.

|User|Url Visited|Referrer Url|Added to List|
|-----------|---------------|-------------|-------------|
|User 1|A<br/>|X|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*(((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and not (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (False)) and not ((True and False) or (False))*<br/><br/>*(False or True or False) and not (False or False)*<br/><br/>*True and not False*<br/><br/>*True*|
|User 2|B<br/>|Y|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*(((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and not (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (False)) and not ((False and False) or (False))*<br/><br/>*(False or True or False) and not (False or False)*<br/><br/>*True and not False*<br/><br/>*True*|
|User 3|C<br/>|Z|No. Evaluation of the logical expression results as *False*.<br/><br/>*(((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and not (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and False) or (True) or (True)) and not ((False and False) or (True))*<br/><br/>*(False or True or True) and not (False or True)*<br/><br/>*True and not True*<br/><br/>*False*|

### <a name="PageVisitorsWhoVisitedAnotherPage"></a>PageVisitorsWhoVisitedAnotherPage Rule Template
Remarketing rules are conditions used to determine who to add to your remarketing list. For the *PageVisitorsWhoVisitedAnotherPage* rule, you must include one or more rule item groups for the page visited (*RuleItemGroups*), and you must also include one or more rule item groups for another page that must have been visited (*AnotherRuleItemGroups*). 

For each rule item group within *RuleItemGroups*, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. 

Likewise for each rule item group within *AnotherRuleItemGroups*, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. 

In other words the visitor will be added to your remarketing list if any of the rule item group conditions are met, and any of the another rule item group conditions are met.

For example let's say that the following rule item groups are set as a logical expression in the bulk file:

*(((Url Contains X) and (ReferrerUrl NotEquals Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*

Evaluation of the logical expression determines which of the following example users will be added to the remarketing list.

|User|Url Visited|Referrer Url|Added to List|
|-----------|---------------|-------------|-------------|
|User 1|A<br/>|X|No. Evaluation of the logical expression results as *False*.<br/><br/>*(((Url Contains X) and (ReferrerUrl NotEquals Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (False)) and ((True and False) or (False))*<br/><br/>*(False or True or False) and (False or False)*<br/><br/>*True and False*<br/><br/>*False*|
|User 2|B<br/>|Y|No. Evaluation of the logical expression results as *False*.<br/><br/>*(((Url Contains X) and (ReferrerUrl NotEquals Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (False)) and ((False and False) or (False))*<br/><br/>*(False or True or False) and (False or False)*<br/><br/>*True and False*<br/>*False*<br/>|
|User 3|C<br/>|Z|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*(((Url Contains X) and (ReferrerUrl NotEquals Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (True)) and ((False and False) or (True))*<br/><br/>*(False or True or True) and (False or True)*<br/><br/>*True and True*<br/><br/>*True*|

## <a name="scope"></a>Scope
Scope defines what accounts can use this remarketing list. If scope is set to *Account*, the remarketing list can only be associated with campaigns and ad groups within one specified account ([Parent Id](#parentid)). If scope is set to *Customer*, the remarketing list can be associated with any campaigns and ad groups across all of the customer's accounts.

**Add:** Required  
**Update:** Read-only. You cannot change the scope.    
**Delete:** Read-only  

## <a name="status"></a>Status
The remarketing list status.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Read-only    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="supportedcampaigntypes"></a>Supported Campaign Types
The semicolon delimited list of campaign types that support this remarketing list.

Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only

## <a name="uettagid"></a>UET Tag Id
The Microsoft Advertising identifier of the Universal Event Tracking (UET) tag that is used with the remarketing list.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

