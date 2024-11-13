---
title: "Asset Group Listing Group Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Asset Group Listing Group fields in a Bulk file.
dev_langs:
  - csharp
---
# Asset Group Listing Group Record - Bulk
Defines an asset group listing group that can be uploaded and downloaded in a bulk file.

You can upload *Asset Group Listing Group* records for multiple ad groups in the same bulk file, as long as the validation rules are satisfied as described below. 

- At minimum you must specify at least the root node for the product partition group tree structure. The product partition group's root node must have its [Product Condition 1](#productcondition1) field set to "All" and [Product Value 1](#productvalue1) null or empty. If you are bidding on all products in the catalog equally, set the *Sub Type* field to *Unit*. If you are partitioning the bids based on more specific product conditions, then set the *Sub Type* field to *Subdivision*, the *Parent Criterion Id* to null or empty, and the *Id* to a negative value. You will use the negative value as *Parent Criterion Id* for any child nodes.

- The root node is considered level 0, and a tree can have branches up to 7 levels deep.

- Per upload request, you can include a maximum of 20,000 product partition tree nodes per ad group. The entire product partition tree node count for an ad group cannot exceed 20,000.

- The product partition tree nodes for the same tree (same ad group) must be grouped together in the file.

- The order of the product partition nodes is not guaranteed during download, and parent nodes might be provided after child nodes; however, all nodes for the same ad group will be grouped together in the file.

- If you are creating or modifying the tree structure, parent product partition tree nodes must be ordered ahead of the child product partition tree nodes ; however, the order does not matter for non-structural changes such as updating the bid. For example if you want to update the bids without adding, deleting, or updating the tree structure, then you only need to upload the [Id](#id) and [Parent Id](#parentid) fields.

- To update the [Product Condition 1](#productcondition1), [Product Value 1](#productvalue1) or *Is Excluded* field, you must delete the existing product partition tree node and upload a new product partition tree node which will get a new identifier.

- If any action fails, all remaining actions that might have otherwise succeeded will also fail.

- All product partition node addition and deletion actions must result in a complete tree structure.

- Every path from the root node to the end of a branch must terminate with a leaf node (*Sub Type*=Unit). Every Unit must have a bid, unless the *Is Excluded* field is TRUE which means that the node is a negative ad group criterion.

- Every subdivision must have at least one leaf node that bids on the remainder of the subdivision's conditions, i.e. use the same operand as its sibling unit(s) and set its [Product Value 1](#productvalue1) null or empty.

- If you are adding partitions with multiple levels where neither the parent or child yet exist, use a negative int value as a reference to identify the parent. For example set the both the parent's *Id*, and the child's *Parent Criterion Id* field to the same negative value. The negative IDs are only valid for the duration of the call. Unique system identifiers for each successfully added ad group criterion are returned in the upload result file.

- To pause any product partition you must pause the entire ad group by updating the *Status* field of the [Ad Group](../bulk-service/ad-group.md) to Paused. You can pause the entire campaign by updating the *Status* field of the [Campaign](../bulk-service/campaign.md) to Paused.

- For a *Deleted* action you only need to specify the *Id* and *Parent Id*.

- If you delete a parent product partition, all of its children and descendants will also be deleted.

- You may not specify duplicate product conditions in a branch. 

You can download all *Asset Group Listing Group* records in the account by including the [DownloadEntity](downloadentity.md) value of *AssetGroupListingGroups* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

<!--The following Bulk CSV example would add a new asset group listing group if the correct campaign Id would be provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Asset Group Listing Group,Client Id,Modified Time,Start Date,End Date,Network Distribution,Ad Rotation,Cpc Bid,Language,Bid Adjustment,Name,Tracking Template,Final Url Suffix,Custom Parameter,Bid Strategy Type,Target Setting
Format Version,,,,,,,,,,,,,,,6.0,,,,,
Asset Group Listing Group,Active,,-111,ParentCampaignNameGoesHere,Women's Red Shoe Sale,ClientIdGoesHere,,11/12/2020,12/31/2021,OwnedAndOperatedAndSyndicatedSearch,RotateAdsEvenly,0.1,English,10,,https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl},,{_promoCode}=PROMO1; {_season}=summer,ManualCpc,Audience
```-->

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAssetGroupListingGroup* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

<!--```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAssetGroupListingGroup
var bulkAssetGroupListingGroup = new BulkAssetGroupListingGroup
{
    // 'Campaign' column header in the Bulk file
    CampaignName = "ParentCampaignNameGoesHere",
    // 'Parent Id' column header in the Bulk file
    CampaignId = campaignIdKey,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
                  
    // Map properties in the Bulk file to the 
    // AssetGroupListingGroup object of the Campaign Management service.
    AssetGroupListingGroup = new AssetGroupListingGroup
    {
        // 'Ad Rotation' column header in the Bulk file
        AdRotation = new AdRotation
        {
            Type = AdRotationType.RotateAdsEvenly
        },
        // 'Ad Schedule Use Searcher Time Zone' column header in the Bulk file
        AdScheduleUseSearcherTimeZone = true,
        // 'Bid Adjustment' column header in the Bulk file
        AudienceAdsBidAdjustment = 10,
        // 'Bid Strategy Type' column header in the Bulk file
        BiddingScheme = new ManualCpcBiddingScheme { },
        // 'Cpc Bid' column header in the Bulk file
        CpcBid = new Bid
        {
            Amount = 0.10
        },
        // 'End Date' column header in the Bulk file
        EndDate = new Microsoft.BingAds.V13.CampaignManagement.Date
        {
            Month = 12,
            Day = 31,
            Year = DateTime.UtcNow.Year + 1
        },
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Language' column header in the Bulk file
        Language = "English",
        // 'Asset Group Listing Group' column header in the Bulk file
        Name = "Women's Red Shoe Sale",
        // 'Network Distribution' column header in the Bulk file
        Network = Network.OwnedAndOperatedAndSyndicatedSearch,
        // 'Privacy Status' column header in the Bulk file
        PrivacyStatus = null,
        // 'Target Setting' column header in the Bulk file
        Settings = new []
        {
            new TargetSetting
            {
                // Each target setting detail is delimited by a semicolon (;) in the Bulk file
                Details = new []
                {
                    new TargetSettingDetail
                    {
                        CriterionTypeGroup = CriterionTypeGroup.Audience,
                        TargetAndBid = true
                    }
                }
            }
        },
        // 'Start Date' column header in the Bulk file
        StartDate = new Microsoft.BingAds.V13.CampaignManagement.Date
        {
            Month = DateTime.UtcNow.Month,
            Day = DateTime.UtcNow.Day,
            Year = DateTime.UtcNow.Year
        },
        // 'Status' column header in the Bulk file
        Status = AssetGroupListingGroupStatus.Paused,
        // 'Tracking Template' column header in the Bulk file
        TrackingUrlTemplate = null,
        // 'Custom Parameter' column header in the Bulk file
        UrlCustomParameters = new CustomParameters
        {
            // Each custom parameter is delimited by a semicolon (;) in the Bulk file
            Parameters = new[] {
                new CustomParameter(){
                    Key = "promoCode",
                    Value = "PROMO1"
                },
                new CustomParameter(){
                    Key = "season",
                    Value = "summer"
                },
            }
        },
    },
};

uploadEntities.Add(bulkAssetGroupListingGroup);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await BulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();
```-->

For an *Asset Group Listing Group* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Asset Group](#assetgroup)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Is Excluded](#isexcluded)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Parent Listing Group Id](#parentlistinggroupid)
- [Product Condition 1](#productcondition1)
- [Product Value 1](#productvalue1)
- [Status](#status)
- [Sub Type](#subtype)

## <a name="assetgroup"></a>Asset Group
The name of the asset group that the asset group listing group belongs to.

For add, update, and delete, you must specify either the *Parent Id*, or *Asset Group* and *Campaign* field.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="campaign"></a>Campaign
The name of the campaign that contains the asset group and listing group.

For add, update, and delete, you must specify either the *Parent Id*,  or *Asset Group* and *Campaign* field.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the asset group listing group.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the asset group listing group can then be referenced in the *Parent Id* field of dependent record types such as ads, keywords, or criterion. This is recommended if you are adding new asset group listing groups and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="isexcluded"></a>Is Excluded
Determines whether products belongs to the list group should be excluded when serving.

If set to *true* it is a negative criterion, and otherwise if *false* it is a positive criterion.

**Add:** Required  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The ID of the asset group that contains the listing group.

For add, update, and delete, you must specify either the *Parent Id* or *Asset Group* and *Campaign* field.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="parentlistinggroupid"></a>Parent Listing Group Id
At minimum you must specify at least the root node for the tree structure.

The listing group's root node must have its Product Condition 1 field set to *All* and Product Value 1 *null* or *empty*.

If you are bidding on all products in the catalog equally, set the Sub Type field to *Unit*.

If you are partitioning the products based on more specific product conditions, then set the Sub Type field to *Subdivision*, the Parent Listing Group Id to *null* or *empty*, and the Id to a negative value. You will use the negative value as Parent Listing Group Id for any child nodes.

**Add:** Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="productcondition1"></a>Product Condition 1
The condition's operand. The operands implicitly include the equal operator. For example, you can read *Brand* as *Brand=*.

Use the [Product Condition 1](#productcondition1) as the operand for the [Product Value 1](#productvalue1).

Multiple product conditions can be specified for each Microsoft Performance Max asset group. Each condition is met if the product's attribute value equals the operand's attribute value. For example, if operand is set to Brand and attribute is set to Contoso, the condition is met if the value of the product catalog's Brand attribute is equal to Contoso.

In Performance Max campaigns the product conditions can be set only at asset group level. The following table describes Product Condition (operand) and Product Value (attribute) business rules for asset group [AssetGroupListingGroup](asset-group-listing-group.md) objects. 

|Product Condition (Operand)|Product Value (Attribute) Description|Asset Group Product Partition Rules |
|----------------|-------------------------|----------------------|
|All|Must be null.|For an asset group's product partitions, the root node must have operand set to *All* and attribute set to null or empty.|
|Brand|The product's manufacturer, brand, or publisher.<br/><br/>A maximum of 1,000 characters.|For an asset group's product partitions, the root node must have operand set to *All* and attribute set to null or empty.|
|CategoryL1-5<br/><br/>Five category operand values are available i.e. CategoryL1, CategoryL2, CategoryL3, CategoryL4, and CategoryL5.|A product category defined by the Microsoft Merchant Center store.<br/><br/>CategoryL0 is the highest level category, and CategoryL4 is the lowest level or most granular category.<br/><br/>A maximum of 100 characters.|Each of the *CategoryL* operands may be used in multiple branches.<br/><br/>Each of the *CategoryL* operands may be used in multiple branches but may only be specified once per branch. For example, one branch may contain *CategoryL1* and *CategoryL2*, but may not contain another node with the *CategoryL2* operand.<br/><br/>If you set the operand to a product category from 1 through 5, they must be specified in ascending order. For example, the operand can be set to *CategoryL2* with the attribute *Pet Supplies*, if a higher-level product partition has operand *CategoryL1* with attribute *Animals & Pet Supplies*.<br/><br/>The prior level product category operand doesn't need to be specified in the immediate parent partition. For example, a *CategoryL2* condition could be specified for a product partition if the parent of its parent specified a *CategoryL1* condition.|
|Channel|The Local Inventory Ads (LIA) channel.<br/><br/>Possible values include "Local Stores" and "Online".<br/><br/>If the campaign has not opted into [Local Inventory Ads](../campaign-management-service/shoppingsetting.md#localinventoryadsenabled), all offers are by default Online only (Channel=Online) and Single-channel (ChannelExclusivity=Single-channel). For more information, see the [Local Inventory Ads](https://help.ads.microsoft.com/#apex/3/en/56858/1-500) help page.|The *Channel* operand may be used in multiple branches, but may only be specified once per branch.|
|ChannelExclusivity|The Local Inventory Ads (LIA) channel exclusivity.<br/><br/>Possible values include "Single-channel" and "Multi-channel".<br/><br/>If the campaign has not opted into [Local Inventory Ads](../campaign-management-service/shoppingsetting.md#localinventoryadsenabled), all offers are by default Online only (Channel=Online) and Single-channel (ChannelExclusivity=Single-channel). For more information, see the [Local Inventory Ads](https://help.ads.microsoft.com/#apex/3/en/56858/1-500) help page.|The *ChannelExclusivity* operand may be used in multiple branches, but may only be specified once per branch.|
|Condition|The condition of the product.<br/><br/>If operand is set to Condition, the supported attribute values that you can specify are *New*, *Used*, and *Refurbished*.|The *Condition* operand may be used in multiple branches, but may only be specified once per branch.|
|CustomLabel0-4<br/><br/>Five custom label operand values are available i.e. CustomLabel0, CustomLabel1, CustomLabel2, CustomLabel3, and CustomLabel4.|A custom label defined by the merchant.<br/><br/>Custom labels e.g. CustomLabel0 and CustomLabel4 are not validated based on any hierarchy.<br/><br/>A maximum of 100 characters.|Each of the *CustomLabel* operands may be used in multiple branches, but may only be specified once per branch. For example, one branch may contain *CustomLabel0* and *CustomLabel1*, but may not contain another node with the *CustomLabel1* operand.|
|Id|The product identifier defined by the merchant.<br/><br/>A maximum of 1,000 characters.|The *Id* operand may be used in multiple branches, but may only be specified once per branch.|
|ProductType1-5<br/><br/>Five product type operand values are available i.e. ProductType1, ProductType2, ProductType3, ProductType4, and ProductType5.|A product type or category defined by the merchant.<br/><br/>ProductType1 is the highest level product type, and ProductType5 is the lowest level or most granular product type.<br/><br/>A maximum of 100 characters.|Each of the *ProductType* operands may be used in multiple branches, but may only be specified once per branch. For example one branch may contain *ProductType1* and *ProductType2*, but may not contain another node with the *ProductType2* operand.<br/><br/>If you set the operand to a product type from 1 through 5, they must be specified in ascending order. For example, the operand can be set to *ProductType2* with attribute *Pet Supplies*, if a higher-level product partition has operand *ProductType1* with attribute *Animals & Pet Supplies*.<br/><br/>The prior level product type operand doesn't need to be specified in the immediate parent partition. For example, a *ProductType2* condition could be specified for a product partition if the parent of its parent specified a *ProductType1* condition.|

**Add:** Required  
**Update:** Read-only. You cannot update the condition or value fields. To update the conditions you must delete the product partition and add a new one.  
**Delete:** Read-only  

## <a name="productvalue1"></a>Product Value 1
The condition's attribute value.

An attribute's value must exactly match the value specified in the customer's Microsoft Merchant Center catalog file.

**Add:** Required  
**Update:** Read-only. You cannot update the condition or value fields. To update the conditions you must delete the product partition and add a new one.  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the asset group listing group.

Possible values are *Active*, *Deleted*.

**Add:** Optional.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Required. The Status must be set to Deleted.  

## <a name="subtype"></a>Sub Type
The type of asset group listing group.

Possible values are *Subdivision* and *Unit*.

**Add:** Required  
**Update:** Read-only  
**Delete:** Read-only  
