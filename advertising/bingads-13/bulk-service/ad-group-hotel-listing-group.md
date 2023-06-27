---
title: "Ad Group Hotel Listing Group Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Ad Group Hotel Listing Group fields in a Bulk file.
dev_langs:
  - csharp
---
# Ad Group Hotel Listing Group Record - Bulk
Defines an ad group hotel listing group that can be uploaded and downloaded in a bulk file.

You can upload *Ad Group Hotel Listing Group* records for multiple ad groups in the same bulk file, as long as the validation rules are satisfied as described below. 

- At minimum you must specify at least the root node for the hotel listing group group tree structure. The hotel listing group group's root node must have its [Hotel Attribute](#hotelattribute) field set to "All" and [Hotel Attribute Value](#hotelattributevalue) null or empty. If you are bidding on all hotels in the catalog equally, set the *Sub Type* field to *Unit*. If you are partitioning the bids based on more specific hotel attributes, then set the *Sub Type* field to *Subdivision*, the *Parent Criterion Id* to null or empty, and the *Id* to a negative value. You will use the negative value as *Parent Criterion Id* for any child nodes.

- The root node is considered level 0, and a tree can have branches up to 7 levels deep.

- Per upload request, you can include a maximum of 20,000 hotel listing group tree nodes per ad group. The entire hotel listing group tree node count for an ad group cannot exceed 20,000.

- The hotel listing group tree nodes for the same tree (same ad group) must be grouped together in the file.

- The order of the hotel listing group nodes is not guaranteed during download, and parent nodes might be provided after child nodes; however, all nodes for the same ad group will be grouped together in the file.

- If you are creating or modifying the tree structure, parent hotel listing group tree nodes must be ordered ahead of the child hotel listing group tree nodes ; however, the order does not matter for non-structural changes such as updating the bid. For example if you want to update the bids without adding, deleting, or updating the tree structure, then you only need to upload the [Id](#id), [Parent Id](#parentid), and [Bid](#bid) fields.

- To update the [Hotel Attribute](#hotelattribute), [Hotel Attribute Value](#hotelattributevalue) or *Is Excluded* field, you must delete the existing hotel listing group tree node and upload a new hotel listing group tree node which will get a new identifier.

- If any action fails, all remaining actions that might have otherwise succeeded will also fail.

- All hotel listing group node addition and deletion actions must result in a complete tree structure.

- Every path from the root node to the end of a branch must terminate with a leaf node (*Sub Type*=Unit). Every Unit must have a bid, unless the *Is Excluded* field is TRUE which means that the node is a negative ad group criterion.

- Every subdivision must have at least one leaf node that bids on the remainder of the subdivision's conditions, i.e. use the same operand as its sibling unit(s) and set its [Hotel Attribute Value](#hotelattributevalue) null or empty.

- If you are adding partitions with multiple levels where neither the parent or child yet exist, use a negative int value as a reference to identify the parent. For example set the both the parent's *Id*, and the child's *Parent Criterion Id* field to the same negative value. The negative IDs are only valid for the duration of the call. Unique system identifiers for each successfully added ad group criterion are returned in the upload result file.

- The *Bid* field is only applicable if the *Is Excluded* field is FALSE which means that the node is a biddable ad group criterion. However, *Bid* is ignored for *Subdivision* partition nodes. Those elements are only relevant for *Unit* (leaf) partition nodes.

- To pause any hotel listing group you must pause the entire ad group by updating the *Status* field of the [Ad Group](../bulk-service/ad-group.md) to Paused. You can pause the entire campaign by updating the *Status* field of the [Campaign](../bulk-service/campaign.md) to Paused.

- For a *Deleted* action you only need to specify the *Id* and *Parent Id*.

- If you delete a parent hotel listing group, all of its children and descendants will also be deleted.

- You may not specify duplicate hotel attributes in a branch. 

You can download all *Ad Group Hotel Listing Group* records in the account by including the [DownloadEntity](downloadentity.md) value of *AdGroupProductPartitions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new ad group hotel listing group if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Name,Campaign,Time Zone,Campaign Type,Language,Sub Type,Budget Id,Budget,Budget Type,Bid Strategy Type,Bid Strategy PercentMaxCpc,Ad Schedule Use Searcher Time Zone,Client Id,Id,Parent ID,Parent Criterion Id,Ad Group,Ad Group Type,Search Network,Content Network,Percent Cpc Bid,Hotel Ad Group Type,Percent Bid,Hotel Attribute,Hotel Attribute Value,Is Excluded
Format Version,6,,,,,,,,,,,,,,,,,,,,,,,,,
Campaign,,Test Hotel Campaign HLG,PacificTimeUSCanadaTijuana,Hotel,All,,delete_value,25,DailyBudgetStandard,PercentCpc,8.3,false,0,,,,,,,,,,,,,,
AdGroup,,Test Hotel Campaign HLG,,,,,,,,,,,,,,,Test Hotel AdGroup,Hotel,On,Off,3.74,HotelAd,,,,,
Ad Group Hotel Listing Group,,Test Hotel Campaign HLG,,,,Subdivision,,,,,,,,-1,,,Test Hotel AdGroup,,,,,HotelAd,,All,,no
Ad Group Hotel Listing Group,,Test Hotel Campaign HLG,,,,Unit,,,,,,,,-2,,-1,Test Hotel AdGroup,,,,,HotelAd,4.1,Brand,Marriott,no
Ad Group Hotel Listing Group,,Test Hotel Campaign HLG,,,,Unit,,,,,,,,-3,,-1,Test Hotel AdGroup,,,,,HotelAd,4.1,Brand,Hilton,no
Ad Group Hotel Listing Group,,Test Hotel Campaign HLG,,,,Unit,,,,,,,,-4,,-1,Test Hotel AdGroup,,,,,HotelAd,4.1,Brand,,no
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupProductPartition* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAdGroupProductPartition
var bulkAdGroupProductPartition = new BulkAdGroupProductPartition
{
    // Map properties in the Bulk file to the BiddableAdGroupCriterion or
    // NegativeAdGroupCriterion object of the Campaign Management service.
    // Use the BiddableAdGroupCriterion to set the 'Is Excluded' field in the Bulk file to True,
    // and otherwise use the NegativeAdGroupCriterion to set the 'Is Excluded' field to False.
    BiddableAdGroupCriterion = new BiddableAdGroupCriterion
    {
        // 'Parent Id' column header in the Bulk file
        AdGroupId = adGroupIdKey,
        Criterion = new HotelListingGroup { 
            Condition = new HotelListingCondition
            {
                // 'Hotel Attribute Value' column header in the Bulk file
                Attribute = null,
                // 'Hotel Attribute' column header in the Bulk file
                Operand = "All",
            },
            // 'Parent Criterion Id' column header in the Bulk file
            ParentCriterionId = null
        },
        CriterionBid = new FixedBid
        {
            // 'Bid' column header in the Bulk file is only applicable for BiddableAdGroupCriterion
            Amount = 0.50
        },
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Status' column header in the Bulk file
        Status = AdGroupCriterionStatus.Paused,
        // 'Tracking Template' column header in the Bulk file is only applicable for BiddableAdGroupCriterion
        TrackingUrlTemplate = null,
        // 'Custom Parameter' column header in the Bulk file is only applicable for BiddableAdGroupCriterion
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
    // 'Ad Group' column header in the Bulk file
    AdGroupName = null,
    // 'Campaign' column header in the Bulk file
    CampaignName = null,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
};

uploadEntities.Add(bulkAdGroupProductPartition);

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

For an *Ad Group Hotel Listing Group* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Bid](#bid)
- [Percent Bid](#percentbid)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Custom Parameter](#customparameter)
- [Final Url Suffix](#finalurlsuffix)
- [Id](#id)
- [Is Excluded](#isexcluded)
- [Modified Time](#modifiedtime)
- [Parent Criterion Id](#parentcriterionid)
- [Parent Id](#parentid)
- [Hotel Attribute](#hotelattribute)
- [Hotel Attribute Value](#hotelattributevalue)
- [Status](#status)
- [Sub Type](#subtype)
- [Tracking Template](#trackingtemplate)

## <a name="adgroup"></a>Ad Group
The name of the ad group that contains the hotel listing group.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="bid"></a>Bid
The amount to bid in the auction. This is used when the campaign bidding scheme is ManualCpc.

**Add:** Required if [Is Excluded](#isexcluded) is *FALSE* and the [Sub Type](#subtype) is *Unit*, and otherwise the bid is not allowed.       
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="percentbid"></a>Percent Bid
The amount to bid in the auction. This is used when the campaign bidding scheme is PercentCpc or Commission.

**Add:** Required if [Is Excluded](#isexcluded) is *FALSE* and the [Sub Type](#subtype) is *Unit*, and otherwise the bid is not allowed.       
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign that contains the ad group and hotel listing group.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="customparameter"></a>Custom Parameter
Your custom collection of key and value parameters for URL tracking.

In a bulk file, the list of custom parameters are formatted as follows.

- Format each custom parameter pair as Key=Value, for example {_promoCode}=PROMO1.

- Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.  

- Each key and value pair are delimited by a semicolon and space ("; "), for example {_promoCode}=PROMO1; {_season}=summer.  

- A Key cannot contain a semicolon. If a Value contains a semicolon it must be escaped as '\\;'. Additionally if the Value contains a backslash it must also be escaped as '\\'.

- The Key cannot exceed 16 UTF-8 bytes, and the Value cannot exceed 250 UTF-8 bytes. The Key is required and the Value is optional. The maximum size of the Key does not include the braces and underscore i.e., '{', '_', and '}'. 

    > [!NOTE] 
    > With the Bulk service the Key must be formatted with surrounding braces and a leading underscore, for example if the Key is promoCode, it must be formatted as {_promoCode}. With the Campaign Management service you cannot specify the surrounding braces and underscore.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. To remove all custom parameters, set this field to *delete_value*. The *delete_value* keyword removes the previous setting. To remove a subset of custom parameters, specify the custom parameters that you want to keep and omit any that you do not want to keep. The new set of custom parameters will replace any previous custom parameter set.    
**Delete:** Read-only   

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the hotel listing group.

**Add:** Read-only  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="isexcluded"></a>Is Excluded
Determines whether the hotel listing group represents a biddable or negative criterion. 

If set to *TRUE* it is a negative criterion, and otherwise if *FALSE* it is a biddable criterion.

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

## <a name="parentcriterionid"></a>Parent Criterion Id
The criterion identifier of the parent hotel listing group.

This bulk field maps to *ParentNodeId* and must be null to point to the root node.

> [!NOTE]
> This field is not applicable for the tree root hotel listing group node, which has no parent.

**Add:** Read-only and Required  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the ad group that contains the hotel listing group.

This bulk field maps to the *Id* field of the [Ad Group](ad-group.md) record.

**Add:** Read-only and Required. You must either specify an existing ad group identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Ad Group](ad-group.md) record. This is recommended if you are adding new hotel listing groups to a new ad group in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="hotelattribute"></a>Hotel Attribute
The condition's operand. The operands implicitly include the equal operator. For example, you can read *Brand* as *Brand=*.

Use the [Hotel Attribute](#hotelattribute) as the operand for the [Hotel Attribute Value](#hotelattributevalue).

Multiple hotel attributes can be specified for each campaign and ad group. Each condition is met if the hotel's attribute value equals the operand's attribute value. For example, if operand is set to Brand and attribute is set to Contoso, the condition is met if the value of the hotel catalog's Brand attribute is equal to Contoso.

In your campaigns the hotel attributes can be set at campaign and ad group level. The following table describes Hotel Attribute (operand) and Hotel Attribute Value (attribute) business rules for [Ad Group Hotel Listing Group](ad-group-hotel-listing-group.md) records.

> [!NOTE]
> Hotel Attribute must be "All" when Hotel Value is set to null or empty for the root node.

|Hotel Attribute (Operand)|Hotel Attribute Value (Attribute) Description|Ad Group Hotel Listing Group Rules|
|----------------|-------------------------|----------------------|--------------------------|
|All|Not applicable.|For an ad group's hotel listing groups, the root node must have operand set to "All" and attribute set to null or empty.|
|Brand|The hotel's manufacturer, brand, or publisher.<br/><br/>A maximum of 200 characters.|The *Brand* operand may be used in multiple branches, but may only be specified once per branch.|
|Category|A hotel category, such as "Inn", "Motel", "Resort", etc.<br/><br/>A maximum of 200 characters.|Not applicable.|
|City|The city where the hotel is located.|Not applicable.|
|Country|The country or region where the hotel is located.|Not applicable.|
|CustomLabel0-4<br/><br/>Five custom label operand values are available i.e. CustomLabel0, CustomLabel1, CustomLabel2, CustomLabel3, and CustomLabel4.|Each of the *CustomLabel* operands may be used in multiple branches, but may only be specified once per branch. For example one branch may contain *CustomLabel0* and *CustomLabel1*, but may not contain another node with the *CustomLabel1* operand.<br/><br/>A maximum of 200 characters.|Not applicable.|
|HotelId|The hotel identifier.<br/><br/>A maximum of 1,024 characters.|The *Id* operand may be used in multiple branches, but may only be specified once per branch.|
|StarRating|A hotel rating from 1-5 stars.|Not applicable.|
|State|The state where the hotel is located.|Not applicable.|

**Add:** Required  
**Update:** Read-only. You cannot update the condition or value fields. To update the conditions you must delete the hotel listing group and add a new one.    
**Delete:** Read-only  

## <a name="hotelattributevalue"></a>Hotel Attribute Value
The condition's attribute value.

**Add:** Required  
**Update:** Read-only. You cannot update the condition or value fields. To update the conditions you must delete the hotel listing group and add a new one.    
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the hotel listing group.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The only possible status is *Active*. If you set the status to *Deleted* it will be ignored and the returned record will have status set to *Active*.  
**Update:** Optional    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="subtype"></a>Sub Type
The type of hotel listing group.

Possible values are *Subdivision* and *Unit*.

**Add:** Required  
**Update:** Read-only    
**Delete:** Read-only  

## <a name="trackingtemplate"></a>Tracking Template
The tracking templates can be used in tandem with the URL specified in the 'Link' field for the hotel offer that you submitted via the [Content API](/advertising/shopping-content/index). By combining the feed URL with the tracking template, the landing page URL is assembled where a user is directed after clicking the ad. When you use the *Tracking Template* field to update the URL parameters instead of updating them in the feed URL, the feed URL doesn't need to go through editorial review and your ads will continue to serve uninterrupted. For example if your hotel offer URL in the catalog feed is *https://contoso.com/*, you could specify the following tracking template: *{lpurl}?matchtype={matchtype}&device={device}*.

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
**Delete:** Read-only  
