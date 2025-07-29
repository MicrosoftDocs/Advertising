---
title: "Ad Group Topic Criterion Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Ad Group Topic Criterion fields in a Bulk file.
dev_langs:
  - csharp
---
# Ad Group Topic Criterion Record - Bulk
Defines an ad group topic criterion that can be uploaded and downloaded in a bulk file.  

Topic targeting allows advertisers to choose thematic topics for ad placement, enhancing the effectiveness of targeted advertising.  

> [!NOTE]
> We only support ad group level topic criterions now.  
> [!TIP]
> For an overview of how to use target criterions, see [Show Ads to Your Target Audience](../guides/show-ads-target-audience.md).

You can download all *Ad Group Topic Criterion* records in the account by including the [DownloadEntity](downloadentity.md) value of *AdGroupTargetCriterions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new ad group topic criterion if a valid [Parent Id](#parentid) value is provided.  

```csv
Type,Status,Id,Parent Id,Target,Bid Adjustment,Name
Format Version,,,,,,6.0
Ad Group Topic Criterion,Active,,parentId,topicId,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupTopicCriterion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.  

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAdGroupTopicCriterion
var bulkAdGroupTopicCriterion = new BulkAdGroupTopicCriterion
{
    // 'Ad Group' column header in the Bulk file is read-only
    AdGroupName = null,

    // 'Campaign' column header in the Bulk file is read-only
    CampaignName = null,

    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // BiddableAdGroupCriterion object of the Campaign Management service.

    BiddableAdGroupCriterion = new BiddableAdGroupCriterion
    {
        // 'Parent Id' column header in the Bulk file
        AdGroupId = adGroupIdKey,

        Criterion = new TopicCriterion
        {
            // 'Target' column header in the Bulk file
            TopicId = topicIdKey
        },

        CriterionBid = new BidMultiplier
        {
            // 'Bid Adjustment' column header in the Bulk file
            Multiplier = 0,
        },

        // 'Id' column header in the Bulk file
        Id = null,

        // 'Status' column header in the Bulk file
        Status = AdGroupCriterionStatus.Active,
    }
};

uploadEntities.Add(bulkAdGroupTopicCriterion);

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

For an *Ad Group Topic Criterion* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Bid Adjustment](#bidadjustment)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Parent Id](#parentid)
- [Status](#status)
- [Target](#target)

## <a name="adgroup"></a>Ad Group
The name of the ad group where this criterion is applied or removed.  

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="bidadjustment"></a>Bid Adjustment
The percentage amount that you want to adjust the bid for the corresponding *Target*.  

> [!WARNING]
> We don’t currently support bid adjustment for ad group topic criterion. The bid adjustment value will reset to 0.

**Add:** Optional  
**Update:** Optional  
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign that contains the ad group where this criterion is applied or removed.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional  
**Delete:** Optional  

## <a name="id"></a>Id
The Microsoft Advertising unique identifier of the criterion.

**Add:** Read-only  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="parentid"></a>Parent Id
The identifier of the ad group where this criterion is applied or removed.  

This bulk field maps to the *Id* field of the [Ad Group](ad-group.md) record.  

**Add:** Read-only and Required. You must either specify an existing ad group identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Ad Group](ad-group.md) record. This is recommended if you are adding new criterions to a new ad group in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="status"></a>Status
Represents the association status between the ad group and the criterion. If the criterion is applied to the ad group, this field's value is *Active*. To delete the criterion, set the status to *Deleted*.

**Add:** Read-only. The status will always be set to *Active* when you add criterions. If you upload another value e.g., *Foo* the result file will contain the same value although the criterion is active.  
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="target"></a>Target
The topic that you want to target with the corresponding *Bid Adjustment*.  

Possible values include:<ul><li>1: Games</li><li>2: Shopping</li><li>3: Business & Industrial</li><li>4: Sports</li><li>5: Home & Garden</li><li>6: News</li><li>7: Travel & Transportation</li><li>8: Finance</li><li>9: Health</li><li>10: Jobs & Education</li><li>11: Arts & Entertainment</li><li>12: Autos & Vehicles</li><li>13: Computers & Electronics</li><li>14: Real Estate</li><li>15: Hobbies & Leisure</li><li>16: Beauty & Fitness</li><li>17: Internet & Telecom</li><li>18: Books & Literature</li><li>19: Law & Government</li><li>20: Food & Drink</li><li>21: People & Society</li><li>22: Online Communities</li><li>23: Science</li><li>24: Pets & Animals</li><li>25: Reference</li><li>26: World Localities</li></ul>  

**Add:** Required  
**Update:** Required  
**Delete:** Read-only  
