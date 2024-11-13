---
title: "Product Audience Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Product Audience fields in a Bulk file.
dev_langs:
  - csharp
---
# Product Audience Record - Bulk
Defines a product audience that can be downloaded and uploaded in a bulk file. 

> [!NOTE]
> Dynamic remarketing lists were formerly known as product audiences in Microsoft Advertising. You'll see "Dynamic remarketing list" in the Microsoft Advertising UI, but to avoid breaking changes the API objets are still named "product audience". 

Dynamic remarketing lists pair customers with specific products based on what they have looked at, considered, or already purchased on your website. You can use dynamic remarketing lists in both search campaigns and audience campaigns (not everyone has audience campaigns yet).  

Dynamic remarketing lists work best with both Shopping campaigns and feed-based Audience campaigns i.e., those campaigns that leverage a Microsoft Merchant Center [store ID](campaign.md#storeid). 

> [!IMPORTANT]
> Be sure to edit the script corresponding to the [UET Tag Id](#uettagid) on your website to include the `ecomm_prodid` and `ecomm_pagetype` parameters.
> The ecomm_prodid parameter is the product ID of the product on the page. It is unique for each item and must match either the id or item_group_id attribute in your product feed. Numeric and alphanumeric (including hyphens) characters only, with a maximum of 50 characters. 
> The ecomm_pagetype parameter identifies the type of page the user has visited. Valid options: home, searchresults, category, product, cart, purchase, other.

```javascript
window.uetq = window.uetq || [];
window.uetq.push('event', '', {'ecomm_prodid': 'REPLACE_WITH_PRODUCT_ID', 'ecomm_pagetype': 'REPLACE_WITH_PAGE_TYPE'});
```

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

You can download all *Product Audience* records in the account by including the [DownloadEntity](downloadentity.md) value of *ProductAudiences* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new product audience. 

```csv
Type,Status,Id,Parent Id,Client Id,Modified Time,Name,Description,Membership Duration,Scope,UET Tag Id,Audience,Product Audience Type,Supported Campaign Types
Format Version,,,,,,6.0,,,,,,,
Product Audience,Active,-10,ParentIdHere,ClientIdGoesHere,,,New product audience,30,Account,TagIdHere,My Product Audience,GeneralVisitors,Search;DynamicSearchAds;Shopping;Audience
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkProductAudience* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkProductAudience
var bulkProductAudience = new BulkProductAudience
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // ProductAudience object of the Campaign Management service.
    ProductAudience = new ProductAudience
    {
        // 'Audience Network Size' column header in the Bulk file
        AudienceNetworkSize = null,
        // 'Description' column header in the Bulk file
        Description = "New product audience",
        // 'Id' column header in the Bulk file
        Id = productAudienceIdKey,
        // 'Membership Duration' column header in the Bulk file
        MembershipDuration = 30,
        // 'Audience' column header in the Bulk file
        Name = "My Product Audience",
        // 'Parent Id' column header in the Bulk file
        ParentId = accountIdKey,
        // 'Product Audience Type' column header in the Bulk file
        ProductAudienceType = ProductAudienceType.GeneralVisitors,
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

uploadEntities.Add(bulkProductAudience);

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

For a *Product Audience* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Audience](#audience)
- [Audience Network Size](#audiencenetworksize)
- [Audience Search Size](#audiencesearchsize)
- [Client Id](#clientid)
- [Description](#description)
- [Id](#id)
- [Membership Duration](#membershipduration)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Product Audience Type](#productaudiencetype)
- [Scope](#scope)
- [Status](#status)
- [Supported Campaign Types](#supportedcampaigntypes)
- [UET Tag Id](#uettagid)

## <a name="audience"></a>Audience
The name of the product audience.

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

This property will be empty for up to 24 hours while the audience is being built, for example if you add or update the product audience membership duration, rule, or tag identifier. 

This property will be empty if the UET tag associated with the product audience has a status of Unverified or Inactive, because the product audience can't receive the customer information from your website that it needs to build the list.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="description"></a>Description
The description of the product audience. Use a description to help you remember what audience you are targeting with this product audience.

The description can contain a maximum of 1,024 characters.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the product audience.

**Add:** Read-only  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="membershipduration"></a>Membership Duration
When you create a product audience, you can specify how far back in time Microsoft Advertising should look for actions that match your product audience definition in order to add people to your list.

The minimum duration is 1 day and the maximum duration allowed is 180 days.

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

## <a name="productaudiencetype"></a>Product Audience Type
Determines who to add to your product audience.

The possible values are GeneralVisitors, ProductSearchers, ProductViewers, ShoppingCartAbandoners, and PastBuyers.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.   
**Delete:** Read-only  

## <a name="scope"></a>Scope
Scope defines what accounts can use this product audience. If scope is set to *Account*, the product audience can only be associated with campaigns and ad groups within one specified account ([Parent Id](#parentid)). If scope is set to *Customer*, the product audience can be associated with any campaigns and ad groups across all of the customer's accounts.

**Add:** Required  
**Update:** Read-only. You cannot change the scope.    
**Delete:** Read-only  

## <a name="status"></a>Status
The product audience status.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Read-only    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="supportedcampaigntypes"></a>Supported Campaign Types
The semicolon delimited list of campaign types that support this product audience.

Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only

## <a name="uettagid"></a>UET Tag Id
The Microsoft Advertising identifier of the Universal Event Tracking (UET) tag that is used with the product audience.

> [!IMPORTANT]
> Be sure to edit the UET script on your website to include the `prodid` and `pagetype` parameters.
  ```javascript
  window.uetq = window.uetq || [];
  window.uetq.push({'prodid': 'PRODUCT_ID', 'pagetype': 'PAGE_TYPE'});
  ```

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

	
## <a name="CustomEvents"></a>CustomEvents Rule Template
For the *CustomEvents* rule, you must include one or more of the following conditional event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*). If more than one condition is specified, the conditions are joined using the logical *AND* operator. In other words the visitor will only be added to your product audience if all of the specified rule conditions are met.

For example let's say that the following custom events are set as a logical expression in the bulk file:

*CustomEvents(Category Equals video) and (Action Equals play) and (Label Equals trailer) and (Value Equals 5)*

Evaluation of the logical expression determines who will be added to the product audience.


## <a name="PageVisitors"></a>PageVisitors Rule Template
For the *PageVisitors* rule, you must include one or more rule item groups. With each rule item group, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. In other words the user will be added to your product audience if all of the specified rule item conditions within any one of the rule item groups are met.

For example let's say that the following rule item groups are set as a logical expression in the bulk file:

*PageVisitors((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))*

Evaluation of the logical expression determines which of the following example users will be added to the product audience.

|User|Url Visited|Referrer Url|Added to List|
|-----------|---------------|-------------|-------------|
|User 1|A<br/>|X|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))*<br/><br/>*(False and True) or (True) or (False)*<br/><br/>*False or True or False*<br/><br/>*True*|
|User 2|B<br/>|Y|No. Evaluation of the logical expression results as *False*.<br/><br/>*((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))*<br/><br/>*(False and True) or (False) or (False)*<br/><br/>*False or False or False*<br/><br/>*False*|
|User 3|C<br/>|Z|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))*<br/><br/>*(False and False) or (True) or (True)*<br/><br/>*False or True or True*<br/><br/>*True*|

## <a name="PageVisitorsWhoDidNotVisitAnotherPage"></a>PageVisitorsWhoDidNotVisitAnotherPage Rule Template
Remarketing rules are conditions used to determine who to add to your product audience. For the *PageVisitorsWhoDidNotVisitAnotherPage* rule, you must include one or more rule item groups for the page visited (*IncludeRuleItemGroups*), and you must also include one or more rule item groups for the page that must not have been visited (*ExcludeRuleItemGroups*). 

For each rule item group within *IncludeRuleItemGroups*, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. 

Likewise for each rule item group within *ExcludeRuleItemGroups*, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. Finally, the logical *NOT* operator will be applied to the aggregated result of exclude rule item groups.

In other words the visitor will be added to your product audience if any of the include rule item group conditions are met, and none of the exclude rule item group conditions are met.

For example let's say that the following rule item groups are set as a logical expression in the bulk file:

*(((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and not (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*

Evaluation of the logical expression determines which of the following example users will be added to the product audience.

|User|Url Visited|Referrer Url|Added to List|
|-----------|---------------|-------------|-------------|
|User 1|A<br/>|X|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*(((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and not (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (False)) and not ((True and False) or (False))*<br/><br/>*(False or True or False) and not (False or False)*<br/><br/>*True and not False*<br/><br/>*True*|
|User 2|B<br/>|Y|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*(((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and not (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (False)) and not ((False and False) or (False))*<br/><br/>*(False or True or False) and not (False or False)*<br/><br/>*True and not False*<br/><br/>*True*|
|User 3|C<br/>|Z|No. Evaluation of the logical expression results as *False*.<br/><br/>*(((Url Contains X) and (ReferrerUrl DoesNotContain Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and not (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and False) or (True) or (True)) and not ((False and False) or (True))*<br/><br/>*(False or True or True) and not (False or True)*<br/><br/>*True and not True*<br/><br/>*False*|

## <a name="PageVisitorsWhoVisitedAnotherPage"></a>PageVisitorsWhoVisitedAnotherPage Rule Template
Remarketing rules are conditions used to determine who to add to your product audience. For the *PageVisitorsWhoVisitedAnotherPage* rule, you must include one or more rule item groups for the page visited (*RuleItemGroups*), and you must also include one or more rule item groups for another page that must have been visited (*AnotherRuleItemGroups*). 

For each rule item group within *RuleItemGroups*, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. 

Likewise for each rule item group within *AnotherRuleItemGroups*, the rule item conditions for the same page are joined using the logical *AND* operator. Then, each result from the list of rule item groups are joined using the logical *OR* operator. 

In other words the visitor will be added to your product audience if any of the rule item group conditions are met, and any of the another rule item group conditions are met.

For example let's say that the following rule item groups are set as a logical expression in the bulk file:

*(((Url Contains X) and (ReferrerUrl NotEquals Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*

Evaluation of the logical expression determines which of the following example users will be added to the product audience.

|User|Url Visited|Referrer Url|Added to List|
|-----------|---------------|-------------|-------------|
|User 1|A<br/>|X|No. Evaluation of the logical expression results as *False*.<br/><br/>*(((Url Contains X) and (ReferrerUrl NotEquals Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (False)) and ((True and False) or (False))*<br/><br/>*(False or True or False) and (False or False)*<br/><br/>*True and False*<br/><br/>*False*|
|User 2|B<br/>|Y|No. Evaluation of the logical expression results as *False*.<br/><br/>*(((Url Contains X) and (ReferrerUrl NotEquals Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (False)) and ((False and False) or (False))*<br/><br/>*(False or True or False) and (False or False)*<br/><br/>*True and False*<br/>*False*<br/>|
|User 3|C<br/>|Z|Yes. Evaluation of the logical expression results as *True*.<br/><br/>*(((Url Contains X) and (ReferrerUrl NotEquals Z)) or ((Url DoesNotBeginWith Y)) or ((ReferrerUrl Equals Z))) and (((Url BeginsWith A) and (ReferrerUrl BeginsWith B)) or ((Url Contains C)))*<br/><br/>*((False and True) or (True) or (True)) and ((False and False) or (True))*<br/><br/>*(False or True or True) and (False or True)*<br/><br/>*True and True*<br/><br/>*True*|
