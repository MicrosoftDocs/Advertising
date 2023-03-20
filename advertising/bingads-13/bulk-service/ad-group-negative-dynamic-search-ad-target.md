---
title: "Ad Group Negative Dynamic Search Ad Target Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Ad Group Negative Dynamic Search Ad Target fields in a Bulk file.
dev_langs:
  - csharp
---
# Ad Group Negative Dynamic Search Ad Target Record - Bulk
Defines an Ad Group Negative Dynamic Search Ad Target that can be uploaded and downloaded in a bulk file.  

The Ad Group Negative Dynamic Search Ad Target record can only be created within search campaigns that have valid dynamic search ads settings (comprised of the [Domain Language](campaign.md#domainlanguage), [Dynamic Description Enabled](campaign.md#dynamicdescriptionenabled), [Page Feed Ids](campaign.md#pagefeedids), [Source](campaign.md#source), and [Website](campaign.md#website) fields). The campaign's [Experiment Id](campaign.md#experimentid) must be set and the [Ad Group Type](ad-group.md#adgrouptype) must be set to "SearchDynamic".  

You can download all *Ad Group Negative Dynamic Search Ad Target* records in the account by including the [DownloadEntity](downloadentity.md) value of *AdGroupNegativeDynamicSearchAdTargets* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new ad group negative dynamic search ad target if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Bid,Name,Tracking Template,Custom Parameter,Dynamic Ad Target Condition 1,Dynamic Ad Target Condition 2,Dynamic Ad Target Condition 3,Dynamic Ad Target Value 1,Dynamic Ad Target Value 2,Dynamic Ad Target Value 3
Format Version,,,,,,,,,6.0,,,,,,,,
Ad Group Negative Dynamic Search Ad Target,Paused,,-1113,,,ClientIdGoesHere,,,Bulk Ad Group Dynamic Search Ad Target,,,Url,Category,PageContent,contoso.com,US/CA/,flowers
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupNegativeDynamicSearchAdTarget* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAdGroupNegativeDynamicSearchAdTarget
var bulkAdGroupNegativeDynamicSearchAdTarget = new BulkAdGroupNegativeDynamicSearchAdTarget
{
    // Map properties in the Bulk file to the 
    // NegativeAdGroupCriterion object of the Campaign Management service.
    NegativeAdGroupCriterion = new NegativeAdGroupCriterion
    {
        // 'Parent Id' column header in the Bulk file
        AdGroupId = adGroupIdKey,
        Criterion = new Webpage
        {
            Parameter = new WebpageParameter
            {
                Conditions = new[]
                {
                    new WebpageCondition
                    {
                        // 'Dynamic Ad Target Value 1' column header in the Bulk file
                        Argument = "contoso.com",
                        // 'Dynamic Ad Target Condition 1' column header in the Bulk file
                        Operand = WebpageConditionOperand.Url
                    },
                    new WebpageCondition
                    {
                        // 'Dynamic Ad Target Value 2' column header in the Bulk file
                        Argument = "US/CA/",
                        // 'Dynamic Ad Target Condition 2' column header in the Bulk file
                        Operand = WebpageConditionOperand.Category
                    },
                    new WebpageCondition
                    {
                        // 'Dynamic Ad Target Value 3' column header in the Bulk file
                        Argument = "flowers",
                        // 'Dynamic Ad Target Condition 3' column header in the Bulk file
                        Operand = WebpageConditionOperand.PageContent
                    },
                },
                // 'Name' column header in the Bulk file
                CriterionName = "Bulk Ad Group Negative Dynamic Search Ad Target"
            }
        },
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Status' column header in the Bulk file
        Status = AdGroupCriterionStatus.Paused,
    },
    // 'Ad Group' column header in the Bulk file
    AdGroupName = null,
    // 'Campaign' column header in the Bulk file
    CampaignName = null,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
};

uploadEntities.Add(bulkAdGroupNegativeDynamicSearchAdTarget);

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

For an *Ad Group Negative Dynamic Search Ad Target* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Dynamic Ad Target Condition 1](#dynamicadtargetcondition1)
- [Dynamic Ad Target Condition 2](#dynamicadtargetcondition2)
- [Dynamic Ad Target Condition 3](#dynamicadtargetcondition3)
- [Dynamic Ad Target Value 1](#dynamicadtargetvalue1)
- [Dynamic Ad Target Value 2](#dynamicadtargetvalue2)
- [Dynamic Ad Target Value 3](#dynamicadtargetvalue3)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Name](#name)
- [Parent Id](#parentid)
- [Status](#status)

## <a name="adgroup"></a>Ad Group
The name of the ad group that contains the dynamic ad target (webpage criterion).

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="campaign"></a>Campaign
The name of the campaign that contains the ad group and dynamic ad target (webpage criterion).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="dynamicadtargetcondition1"></a>Dynamic Ad Target Condition 1
The first of up to 3 webpage condition operands. The condition is met if the webpage property that is referenced by this field contains or equals the *Dynamic Ad Target Value 1* value.

Possible values include *Category*, *CustomLabel*, *PageContent*, *PageTitle*, and *Url*.

**Add:** Optional. If you do not set any of the dynamic ad target condition or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target condition or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
**Delete:** Read-only  

## <a name="dynamicadtargetcondition2"></a>Dynamic Ad Target Condition 2
The second of up to 3 webpage condition operands. The condition is met if the webpage property that is referenced by this field contains or equals the *Dynamic Ad Target Value 2* value.

Possible values include *Category*, *CustomLabel*, *PageContent*, *PageTitle*, and *Url*.

**Add:** Optional. If you do not set any of the dynamic ad target condition or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target condition or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
**Delete:** Read-only  

## <a name="dynamicadtargetcondition3"></a>Dynamic Ad Target Condition 3
The third of up to 3 webpage condition operands. The condition is met if the webpage property that is referenced by this field contains or equals the *Dynamic Ad Target Value 1* value.

Possible values include *Category*, *CustomLabel*, *PageContent*, *PageTitle*, and *Url*.

**Add:** Optional. If you do not set any of the dynamic ad target condition or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target condition or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
**Delete:** Read-only  

## <a name="dynamicadtargetvalue1"></a>Dynamic Ad Target Value 1
The first of up to 3 webpage condition or criterion arguments.

You can set this string to the URL, category, page title, or page content for your site. For example if the *Dynamic Ad Target Condition 1* field is set to *Url*, then you might set this field to *contoso.com/flowers*.

**Add:** Optional. If you do not set any of the dynamic ad target condition or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target condition or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
**Delete:** Read-only  

## <a name="dynamicadtargetvalue2"></a>Dynamic Ad Target Value 2
The second of up to 3 webpage condition or criterion arguments.

You can set this string to the URL, category, page title, or page content for your site. For example if the *Dynamic Ad Target Condition 2* field is set to *Url*, then you might set this field to *contoso.com/flowers*.

**Add:** Optional. If you do not set any of the dynamic ad target condition or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target condition or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
**Delete:** Read-only  

## <a name="dynamicadtargetvalue3"></a>Dynamic Ad Target Value 3
The third of up to 3 webpage condition or criterion arguments.

You can set this string to the URL, category, page title, or page content for your site. For example if the *Dynamic Ad Target Condition 3* field is set to *Url*, then you might set this field to *contoso.com/flowers*.

**Add:** Optional. If you do not set any of the dynamic ad target condition or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target condition or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the dynamic ad target (webpage criterion).

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

## <a name="name"></a>Name
The criterion name that you can use to identify the criteria, for example you can filter or sort alphabetically.

The criterion name length must be between 1 to 2048, inclusive.

**Add:** Optional. If you do not specify any name, by default the name will be set to a concatenated list of conditions. Each condition will be delimited by the *and* keyword. For example if the conditions are a) *Url contains flower* , b) *Url contains book* , and c) *PageContent contains seattle*, then the default criterion name will be *Url contains flower and Url contains book and PageContent contains seattle*. If all condition and value fields are empty, then you are effectively targeting all webpages and the name will be set to *All Webpages*.  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you specify the *delete_value* keyword, then the criterion name will be updated to the default value i.e. either *All Webpages* or a concatenated list of criterions.  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the ad group that contains the dynamic ad target (webpage criterion).

This bulk field maps to the *Id* field of the [Ad Group](ad-group.md) record.

**Add:** Read-only and Required. You must either specify an existing ad group identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Ad Group](ad-group.md) record. This is recommended if you are adding new dynamic ad targets to a new ad group in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only  
**Delete:** Read-only  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="status"></a>Status
The status of the dynamic ad target (webpage criterion).

Possible values are *Active*, *Paused*, or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

