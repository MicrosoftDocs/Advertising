---
title: "Bid Strategy Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Bid Strategy fields in a Bulk file.
dev_langs:
  - csharp
---
# Bid Strategy Record - Bulk
Defines a bid strategy that can be uploaded and downloaded in a bulk file.  

A portfolio bid strategy is an automated bidding feature that manages bidding across multiple campaigns that are all working toward the same goal.

We automatically adjust your bids to balance under- and over-performing campaigns that share the same strategy, whether to maximize conversions, clicks, target impression share, or other performance goals. Portfolio bid strategies could be a great option for advertisers who want to make sure their entire budgets are spent efficiently.

All you have to do is choose a bid strategy type and include campaigns with complementary budgets in the portfolio. Microsoft Advertising will adjust your bids based on the performance of the entire portfolio. If your portfolio includes any campaigns with a shared budget, then you should include all of the campaigns that share the same budget.  

You can have up to 11,000 portfolio bid strategies in an account, and each portfolio can include 10,000 campaigns. 

Portfolio bid strategies work best with one goal in mind, using complementary campaign and bid strategy types. You cannot change a portfolio's bid strategy type. If you want a campaign in the portfolio to use a different bid strategy you can move it to another portfolio. Once you choose a campaign type, the portfolio can only include campaigns of that type.  

|Bid strategy type|Campaign types supported|
|-----|-----|
|Commission|Search, Shopping, Hotel|
|Maximize clicks|Search, Shopping|
|Maximize conversions|Search, Audience|
|PercentCpc|Search, Shopping, Hotel|
|Target CPA|Search|
|Target impression share|Search|
|Target ROAS|Search, Shopping|

You can download all *Bid Strategy* records in the account by including the [DownloadEntity](downloadentity.md) value of *BidStrategies* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new bid strategy. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Sync Time,Client Id,Modified Time,Language,Time Zone,Budget Id,Budget Name,Budget,Budget Type,Name,Campaign Type,Bid Strategy Id,Bid Strategy Name,Bid Strategy Type,Bid Strategy MaxCpc,Bid Strategy TargetCpa,Bid Strategy TargetRoas,Bid Strategy TargetAdPosition,Bid Strategy TargetImpressionShare
Format Version,,,,,,,,,,,,,,,6,,,,,,,,,,
Bid Strategy,,-24,0,,,,ClientIdGoesHere,,,,,,,,,Search,,My MaxCpc Bid Strategy,MaxClicks,1.5,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkBidStrategy* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkBidStrategy
var bulkBidStrategy = new BulkBidStrategy
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,

    // Map properties in the Bulk file to the 
    // BidStrategy object of the Campaign Management service.
    BidStrategy = new BidStrategy
    {
        // 'Campaign Type' column header in the Bulk file
        AssociatedCampaignType = CampaignType.Search,

        // 'Bid Strategy Type' column header in the Bulk file
        BiddingScheme = new MaxClicksBiddingScheme
        {
            // 'Bid Strategy MaxCpc' column header in the Bulk file
            MaxCpc = new Bid
            {
                Amount = 1.50
            }
        },
        // 'Budget Name' column header in the Bulk file
        Name = "My MaxCpc Bid Strategy " + DateTime.UtcNow,
        // 'Id' column header in the Bulk file
        Id = bidStrategyIdKey,
    },

    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkBidStrategy);

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

For a *Bid Strategy* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).  

- [Bid Strategy MaxCpc](#bidstrategymaxcpc)
- [Bid Strategy Name](#bidstrategyname)
- [Bid Strategy TargetAdPosition](#bidstrategytargetadposition)
- [Bid Strategy TargetCpa](#bidstrategytargetcpa)
- [Bid Strategy TargetImpressionShare](#bidstrategytargetimpressionshare)
- [Bid Strategy TargetRoas](#bidstrategytargetroas)
- [Bid Strategy Type](#bidstrategytype)
- [Campaign Type](#campaigntype)
- [Client Id](#clientid)
- [Currency Code](#currencycode)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Reporting Time Zone](#reportingtimezone)
- [Scope](#scope)
- [Status](#status)

## <a name="bidstrategymaxcpc"></a>Bid Strategy MaxCpc
The maximum cost per click that you want to spend with the corresponding bid strategy type.  

This field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to MaxClicks, MaxConversions, TargetCpa, TargetImpressionShare, or TargetRoas, and otherwise this field is ignored.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

## <a name="bidstrategyname"></a>Bid Strategy Name
The name of the bid strategy. The name must be unique among all bid strategies within the account. The name can contain a maximum of 255 characters.

The service performs a case-insensitive comparison when it compares the name to existing bid strategy names.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="bidstrategytargetadposition"></a>Bid Strategy TargetAdPosition
The target ad position where you want your ads to appear.  

Possible values include FirstPage, MainLine, and MainLine1.  

- FirstPage: Anywhere on the page
- MainLine: Top of the page
- MainLine1: Absolute top of the page

This field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetImpressionShare*, and otherwise this field is ignored.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Required if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetImpressionShare*, and otherwise this field is ignored.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="bidstrategytargetcpa"></a>Bid Strategy TargetCpa
The target cost per acquisition (CPA) that you want used by Microsoft Advertising to maximize conversions.  

This field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetCpa*, and otherwise this field is ignored.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Required if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetCpa*, optional if the [Bid Strategy Type](#bidstrategytype) field is set to *MaximizeConversions*. Otherwise, this field is ignored.
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="bidstrategytargetimpressionshare"></a>Bid Strategy TargetImpressionShare
The target impression share for the ad position where you want your ads to appear.  

This field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetImpressionShare*, and otherwise this field is ignored.

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Required if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetImpressionShare*, and otherwise this field is ignored.   
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="bidstrategytargetroas"></a>Bid Strategy TargetRoas
The target return on ad spend (ROAS) that you want used by Microsoft Advertising to maximize conversions.  

The supported target ROAS values range from 0.01 (1 percent) to 1,000.00 (100,000 percent).  

This field is only used if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetRoas*, and otherwise this field is ignored.  

For more details, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).

**Add:** Required if the [Bid Strategy Type](#bidstrategytype) field is set to *TargetRoas*, and otherwise this field is ignored.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="bidstrategytype"></a>Bid Strategy Type
The bid strategy type for how you want to manage your bids.  

Portfolio bid strategies work best with one goal in mind, using complementary campaign and bid strategy types. You cannot change a portfolio's bid strategy type. If you want a campaign in the portfolio to use a different bid strategy you can move it to another portfolio. Once you choose a campaign type, the portfolio can only include campaigns of that type.  

|Bid strategy type|Campaign types supported|
|-----|-----|
|Maximize clicks|Search, Shopping|
|Maximize conversions|Search|
|Target CPA|Search|
|Target impression share|Search|
|Target ROAS|Search, Shopping|

For details about bid strategies, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).
  
If you use the "MaxClicks" bid strategy type, then you can optionally include the [Bid Strategy MaxCpc](#bidstrategymaxcpc) field.

If you use the "MaxConversions" bid strategy type, then you can optionally include the [Bid Strategy MaxCpc](#bidstrategymaxcpc) field.

If you use the "TargetCpa" bid strategy type, then you must include the [Bid Strategy TargetCpa](#bidstrategytargetcpa) field.

If you use the "TargetImpressionShare" bid strategy type, then you must include the [Bid Strategy TargetAdPosition](#bidstrategytargetadposition) and [Bid Strategy TargetImpressionShare](#bidstrategytargetimpressionshare) fields. You can optionally include the [Bid Strategy MaxCpc](#bidstrategymaxcpc) field.

If you use the "TargetRoas" bid strategy type, then you must include the [Bid Strategy TargetRoas](#bidstrategytargetroas) field. You can optionally include the [Bid Strategy MaxCpc](#bidstrategymaxcpc) field.

> [!IMPORTANT] 
> For some bid strategy types your bid and ad rotation settings are ignored and conversion tracking (via [Universal Event Tracking](../guides/universal-event-tracking.md) tag and a conversion goal) is required. For more information including supported locations, see [Let Microsoft Advertising manage your bids with bid strategies](https://help.ads.microsoft.com/#apex/3/en/56786/1). 

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you update the bid strategy type, then any existing values in the [Bid Strategy MaxCpc](#bidstrategymaxcpc), [Bid Strategy TargetCpa](#bidstrategytargetcpa), [Bid Strategy TargetAdPosition](#bidstrategytargetadposition), [Bid Strategy TargetImpressionShare](#bidstrategytargetimpressionshare), and [Bid Strategy TargetRoas](#bidstrategytargetroas) fields will be deleted.  
**Delete:** Read-only  

## <a name="campaigntype"></a>Campaign Type
The type of ad campaign that can be included the portfolio bid strategy.  

|Bid strategy type|Campaign types supported|
|-----|-----|
|Maximize clicks|Search, Shopping|
|Maximize conversions|Search|
|Target CPA|Search|
|Target impression share|Search|
|Target ROAS|Search, Shopping|

Once you choose a campaign type, the portfolio can only include campaigns of that type.  

**Add:** Optional. The default campaign type is *Search*.  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional  
**Delete:** Read-only  

## <a name="currencycode"></a>Currency Code
The currency for the cross-account portfolio. It must match the account currency provided. If *null*, it defaults to the account’s currency. This field can't be updated.

## <a name="id"></a>Id
The system-generated identifier of the bid strategy.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the bid strategy can then be referenced in the *Bid Strategy Id* field of dependent record types such as [Campaign](campaign.md). This is recommended if you are adding new bid strategy and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
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
The system-generated identifier of the account that contains the bid strategy.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="reportingtimezone"></a>Reporting Time Zone
Specifies the reporting timezone for the campaign. If no value is provided, it defaults to the account’s timezone. This field can be updated.

## <a name="scope"></a>Scope
A nullable field that indicates whether the bid strategy is created at the customer level or the account level. If no value is provided, the default scope is *Account*.

## <a name="status"></a>Status
The status of the bid strategy.

Possible values are *Active* or *Deleted*.  

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Required. The Status must be set to *Deleted*.  
