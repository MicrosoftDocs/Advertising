---
title: "Ad Group Dynamic Search Ad Target Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Ad Group Dynamic Search Ad Target fields in a Bulk file.
dev_langs:
  - csharp
---
# Ad Group Dynamic Search Ad Target Record - Bulk
Defines an Ad Group Dynamic Search Ad Target that can be uploaded and downloaded in a bulk file.  

The Ad Group Dynamic Search Ad Target record can only be created within search campaigns that have valid dynamic search ads settings (comprised of the [Domain Language](campaign.md#domainlanguage), [Dynamic Description Enabled](campaign.md#dynamicdescriptionenabled), [Page Feed Ids](campaign.md#pagefeedids), [Source](campaign.md#source), and [Website](campaign.md#website) fields). The campaign's [Experiment Id](campaign.md#experimentid) must be set and the [Ad Group Type](ad-group.md#adgrouptype) must be set to "SearchDynamic".  

You can download all *Ad Group Dynamic Search Ad Target* records in the account by including the [DownloadEntity](downloadentity.md) value of *AdGroupDynamicSearchAdTargets* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new ad group dynamic search ad target if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Bid,Name,Tracking Template,Custom Parameter,Dynamic Ad Target Condition 1,Dynamic Ad Target Condition 2,Dynamic Ad Target Condition 3,Dynamic Ad Target Value 1,Dynamic Ad Target Value 2,Dynamic Ad Target Value 3
Format Version,,,,,,,,,6.0,,,,,,,,
Ad Group Dynamic Search Ad Target,Paused,,-1113,,,ClientIdGoesHere,,0.5,Bulk Ad Group Dynamic Search Ad Target,,{_promoCode}=PROMO1; {_season}=summer,Url,Category,PageContent,contoso.com,US/CA/SFO,flowers
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupDynamicSearchAdTarget* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.  

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAdGroupDynamicSearchAdTarget
var bulkAdGroupDynamicSearchAdTarget = new BulkAdGroupDynamicSearchAdTarget
{
    // Map properties in the Bulk file to the 
    // BiddableAdGroupCriterion object of the Campaign Management service.
    BiddableAdGroupCriterion = new BiddableAdGroupCriterion
    {
        // 'Parent Id' column header in the Bulk file
        AdGroupId = adGroupIdKey,
        Criterion = new Webpage
        {
            Parameter = new WebpageParameter
            {
                // Set Conditions null if you want to target all webpages
                Conditions = new []
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
                        Argument = "US/CA/SFO",
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
                CriterionName = "Bulk Ad Group Dynamic Search Ad Target"
            }
        },
        CriterionBid = new FixedBid
        {
            // 'Bid' column header in the Bulk file
            Amount = 0.50
        },
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Status' column header in the Bulk file
        Status = AdGroupCriterionStatus.Paused,
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
    // 'Ad Group' column header in the Bulk file
    AdGroupName = null,
    // 'Campaign' column header in the Bulk file
    CampaignName = null,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
};

uploadEntities.Add(bulkAdGroupDynamicSearchAdTarget);

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

For an *Ad Group Dynamic Search Ad Target* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Group](#adgroup)
- [Bid](#bid)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Custom Parameter](#customparameter)
- [Dynamic Ad Target Condition 1](#dynamicadtargetcondition1)
- [Dynamic Ad Target Condition 2](#dynamicadtargetcondition2)
- [Dynamic Ad Target Condition 3](#dynamicadtargetcondition3)
- [Dynamic Ad Target Operator 1](#dynamicadtargetoperator1)
- [Dynamic Ad Target Operator 2](#dynamicadtargetoperator2)
- [Dynamic Ad Target Operator 3](#dynamicadtargetoperator3)
- [Dynamic Ad Target Value 1](#dynamicadtargetvalue1)
- [Dynamic Ad Target Value 2](#dynamicadtargetvalue2)
- [Dynamic Ad Target Value 3](#dynamicadtargetvalue3)
- [Final Url Suffix](#finalurlsuffix)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Name](#name)
- [Parent Id](#parentid)
- [Status](#status)
- [Tracking Template](#trackingtemplate)

## <a name="adgroup"></a>Ad Group
The name of the ad group that contains the dynamic ad target (webpage criterion).

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Ad Group](#adgroup) field.

## <a name="bid"></a>Bid
The amount to bid in the auction.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

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

> [!NOTE]
> If you use *Operand* as **URL** and *Operator* as **Equals** you can only specify one condition.

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



## <a name="dynamicadtargetoperator1"></a>Dynamic Ad Target Operator 1

The first of up to 3 webpage condition operators. The condition is met if the webpage property that is referenced by this field contains or equals the *Dynamic Ad Target Value 1* value.

Possible values include *Contains* and *Equals*.

**Add:** Optional. If you do not set any of the dynamic ad target operator or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target operator or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
**Delete:** Read-only  


## <a name="dynamicadtargetoperator2"></a>Dynamic Ad Target Operator 2

The second of up to 3 webpage condition operators. The condition is met if the webpage property that is referenced by this field contains or equals the *Dynamic Ad Target Value 2* value.

Possible values include *Contains* and *Equals*.

**Add:** Optional. If you do not set any of the dynamic ad target operator or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target operator or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
**Delete:** Read-only  


## <a name="dynamicadtargetoperator3"></a>Dynamic Ad Target Operator 3

The third of up to 3 webpage condition operators. The condition is met if the webpage property that is referenced by this field contains or equals the *Dynamic Ad Target Value 3* value.

Possible values include *Contains* and *Equals*.

**Add:** Optional. If you do not set any of the dynamic ad target operator or value fields, then you are effectively targeting all webpages. You can only have one dynamic ad target per ad group for all webpages.  
**Update:** Not allowed. You cannot update the dynamic ad target operator or value fields. To update the webpage conditions you must delete the dynamic ad target and add a new one.    
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

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  

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

## <a name="trackingtemplate"></a>Tracking Template
Tracking templates can be used in tandem with the landing page URL that is generated dynamically from the domain that you specified for your Dynamic Search Ads campaign. By combining the domain with the tracking template, the landing page URL is assembled where a user is directed after clicking the ad. 

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.  
**Delete:** Read-only  
