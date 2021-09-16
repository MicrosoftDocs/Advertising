---
title: "Campaign Product Scope Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Describes the Campaign Product Scope fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign Product Scope Record - Bulk
Defines a campaign level product scope with list of conditions that help determine which items from your catalog to include in the campaign e.g., filter by brand or condition.

You can use campaign product scopes with both Shopping campaigns and feed-based Audience campaigns i.e., those campaigns that leverage a Microsoft Merchant Center [store ID](campaign.md#storeid). The product scope allows you to choose which items from your catalog to include in the campaign e.g., filter by  brand or condition. 

> [!TIP]
> For an overview and more information about Microsoft shopping campaigns, see the [Product Ads](../guides/product-ads.md) technical guide. 

> [!NOTE]
> Campaign level product scope conditions are not supported with [Smart Shopping Campaigns](../guides/smart-shopping-campaigns.md) i.e., campaigns with [Campaign Type](campaign.md#campaigntype) set to *Shopping* and [Sub Type](campaign.md#subtype) set to *ShoppingSmartAds*.  

You can download all *Campaign Product Scope* records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignProductScopes* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new campaign product scope if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Sub Type,Campaign,Ad Group,Client Id,Modified Time,Bid,Name,Product Condition 1,Product Value 1,Product Condition 2,Product Value 2,Product Condition 3,Product Value 3,Product Condition 4,Product Value 4,Product Condition 5,Product Value 5,Product Condition 6,Product Value 6,Product Condition 7,Product Value 7,Is Excluded,Parent Criterion Id,Tracking Template,Custom Parameter
Format Version,,,,,,,,,,6.0,,,,,,,,,,,,,,,,,,
Campaign Product Scope,Active,,-113,,,,ClientIdGoesHere,,,,Condition,New,CustomLabel0,MerchantDefinedCustomLabel,,,,,,,,,,,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCampaignProductScope* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCampaignProductScope
var bulkCampaignProductScope = new BulkCampaignProductScope
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
                
    // Map properties in the Bulk file to the 
    // SharedEntityAssociation object of the Campaign Management service.
    CampaignCriterion = new CampaignCriterion
    {
        // 'Parent Id' column header in the Bulk file
        CampaignId = campaignIdKey,
        Criterion = new ProductScope
        {
            // Conditions are mapped to Product Value 1..7 and Product Condition 1..7 columns
            Conditions = new []
            {
                new ProductCondition
                {
                    // 'Product Value 1' column header in the Bulk file
                    Attribute = "New",
                    // 'Product Condition 1' column header in the Bulk file
                    Operand = "Condition",
                },
                new ProductCondition
                {
                    // 'Product Value 2' column header in the Bulk file
                    Attribute = "MerchantDefinedCustomLabel",
                    // 'Product Condition 2' column header in the Bulk file
                    Operand = "CustomLabel0",
                },
            },
        },
        // 'Id' column header in the Bulk file
        Id = null,
    },

    // 'Campaign' column header in the Bulk file
    CampaignName = null,
    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkCampaignProductScope);

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

For a *Campaign Product Scope* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Product Condition 1](#productcondition1)
- [Product Condition 2](#productcondition2)
- [Product Condition 3](#productcondition3)
- [Product Condition 4](#productcondition4)
- [Product Condition 5](#productcondition5)
- [Product Condition 6](#productcondition6)
- [Product Condition 7](#productcondition7)
- [Product Value 1](#productvalue1)
- [Product Value 2](#productvalue2)
- [Product Value 3](#productvalue3)
- [Product Value 4](#productvalue4)
- [Product Value 5](#productvalue5)
- [Product Value 6](#productvalue6)
- [Product Value 7](#productvalue7)
- [Status](#status)

## <a name="campaign"></a>Campaign
The name of the campaign that contains product scope.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Campaign](#campaign) field.

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the product scope.

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
The system-generated identifier of the campaign that contains the product scope.

This bulk field maps to the *Id* field of the [Campaign](campaign.md) record.

**Add:** Read-only and Required. You must either specify an existing campaign identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Campaign](campaign.md) record. This is recommended if you are adding new product scopes to a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only  
**Delete:** Read-only  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Campaign](#campaign) field.

## <a name="productcondition1"></a>Product Condition 1
The condition's operand. The operands implicitly include the equal operator. For example, you can read *Brand* as *Brand=*.

Use each product condition as the operand for the corresponding product value.

|Product Condition (Operand)|Product Value (Attribute)|
|----------------|-------------------------|
|[Product Condition 1](#productcondition1)|[Product Value 1](#productvalue1)|
|[Product Condition 2](#productcondition2)|[Product Value 2](#productvalue2)|
|[Product Condition 3](#productcondition3)|[Product Value 3](#productvalue3)|
|[Product Condition 4](#productcondition4)|[Product Value 4](#productvalue4)|
|[Product Condition 5](#productcondition5)|[Product Value 5](#productvalue5)|
|[Product Condition 6](#productcondition6)|[Product Value 6](#productvalue6)|
|[Product Condition 7](#productcondition7)|[Product Value 7](#productvalue7)|

Each condition is met if the product's attribute value equals the operand's attribute value. For example, if the operand is set to Brand and the attribute is set to Contoso, the condition is met if the value of the product catalog's Brand attribute is equal to Contoso. 

> [!NOTE]
> For add and update, at least one product condition and value pair are required, and the index number has no relevance. For example you can specify valid values for *Product Condition 2* and *Product Value 2* and leave the remaining condition and value fields empty.

**Add:** Optional  
**Update:** Read-only. You cannot update the condition or value fields. To update the conditions you must delete the product scope and add a new one.    
**Delete:** Read-only  

For supported Product Condition (operand) and Product Value (attribute) per campaign type, see the tables below.

### <a name="productconditions-audience"></a>Product Conditions for Feed-Based Audience Campaigns
Multiple product conditions can be specified for each feed-based Audience campaign. Each condition is met if the product's attribute value equals the operand's attribute value. For example, if the operand is set to Brand and the attribute is set to Contoso, the condition is met if the value of the product catalog's Brand attribute is equal to Contoso.

|Product Condition (Operand)|Product Value (Attribute) Description|Business Rules|
|----------------|-------------------------|----------------------|
|Brand|The product's manufacturer, brand, or publisher.<br/><br/>A maximum of 1,000 characters.|The *Brand* operand may only be specified once per campaign product scope filter.|
|Condition|The condition of the product.<br/><br/>If operand is set to Condition, the supported attribute values that you can specify are *New*, *Used*, and *Refurbished*.|The *Condition* operand may only be specified once per campaign product scope filter.|
|ProductType1-5<br/><br/>Five product type operand values are available i.e. ProductType1, ProductType2, ProductType3, ProductType4, and ProductType5.|A product type or category defined by the merchant.<br/><br/>ProductType1 is the highest level product type, and ProductType5 is the lowest level or most granular product type.<br/><br/>A maximum of 100 characters.|Each of the product type operands may be used once per campaign product scope filter.<br/><br/>If you set the operand to a product type from 1 through 5, they must be specified in ascending order. For example, the operand can be set to "ProductType2" with attribute "Pet Supplies", if a higher level product partition has operand "ProductType1" with attribute "Animals & Pet Supplies".|
|CustomLabel0-4<br/><br/>Five custom label operand values are available i.e. CustomLabel0, CustomLabel1, CustomLabel2, CustomLabel3, and CustomLabel4.|A custom label defined by the merchant.<br/><br/>Custom labels e.g. CustomLabel0 and CustomLabel4 are not validated based on any hierarchy.<br/><br/>A maximum of 100 characters.|Each of the *CustomLabel* operands may be used once per campaign product scope filter.|

### <a name="productconditions-shopping"></a>Product Conditions for Shopping Campaigns
Multiple product conditions can be specified for each Microsoft Shopping campaign and ad group. Each condition is met if the product's attribute value equals the operand's attribute value. For example, if operand is set to Brand and attribute is set to Contoso, the condition is met if the value of the product catalog's Brand attribute is equal to Contoso.

In Shopping campaigns the product conditions can be set at campaign and ad group level. The following table describes Product Condition (operand) and Product Value (attribute) business rules for [Campaign Product Scope](campaign-product-scope.md) and [Ad Group Product Partition](ad-group-product-partition.md) records.

|Product Condition (Operand)|Product Value (Attribute) Description|Campaign Product Scope Rules|Ad Group Product Partition Rules|
|----------------|-------------------------|----------------------|--------------------------|
|All|Must be null.|Not applicable.|For an ad group's product partitions, the root node must have operand set to "All" and attribute set to null or empty.|
|Brand|The product's manufacturer, brand, or publisher.<br/><br/>A maximum of 1,000 characters.|The *Brand* operand may only be specified once per campaign product scope filter.|The *Brand* operand may be used in multiple branches, but may only be specified once per branch.|
|CategoryL1-5<br/><br/>Five category operand values are available i.e. CategoryL1, CategoryL2, CategoryL3, CategoryL4, and CategoryL5.|A product category defined by the Microsoft Merchant Center store. Please see [Bing Category Taxonomy](https://go.microsoft.com/fwlink?LinkId=507666) for valid category values and taxonomy.<br/><br/>CategoryL0 is the highest level category, and CategoryL4 is the lowest level or most granular category.<br/><br/>A maximum of 100 characters.|Each of the *CategoryL* operands may be used once per campaign product scope filter.<br/><br/>If you specify a product condition with operand set to a product category from 1 through 5,<br/>they must be specified in ascending order. For example, you can set the operand to "CategoryL2" with attribute "Pet Supplies", if a preceding product condition has the operand "CategoryL1" with attribute "Animals & Pet Supplies".|Each of the *CategoryL* operands may be used in multiple branches, but may only be specified once per branch. For example one branch may contain *CategoryL1* and *CategoryL2*, but may not contain another node with the CategoryL2 operand.<br/><br/>If you set the operand to a product category from 1 through 5, they must be specified in ascending order. For example, the operand can be set to "CategoryL2" with attribute "Pet Supplies", if a higher level product partition has operand "CategoryL1" with attribute "Animals & Pet Supplies".<br/><br/>The prior level product category operand doesn't need to be specified in the immediate parent partition. For example a CategoryL2 condition could be specified for a product partition if the parent of its parent specified a CategoryL1 condition.|
|Channel|The Local Inventory Ads (LIA) channel.<br/><br/>Possible values include "Local Stores" and "Online".<br/><br/>If the campaign has not opted into [Local Inventory Ads](campaign.md#localinventoryadsenabled), all offers are by default Online only (Channel=Online) and Single-channel (ChannelExclusivity=Single-channel). For more information, see the [Local Inventory Ads](https://help.ads.microsoft.com/#apex/3/en/56858/1-500) help page.|The *Channel* operand may only be specified once per campaign product scope filter.|The *Channel* operand may be used in multiple branches, but may only be specified once per branch.|
|ChannelExclusivity|The Local Inventory Ads (LIA) channel exclusivity.<br/><br/>Possible values include "Single-channel" and "Multi-channel".<br/><br/>If the campaign has not opted into [Local Inventory Ads](campaign.md#localinventoryadsenabled), all offers are by default Online only (Channel=Online) and Single-channel (ChannelExclusivity=Single-channel). For more information, see the [Local Inventory Ads](https://help.ads.microsoft.com/#apex/3/en/56858/1-500) help page.|The *ChannelExclusivity* operand may only be specified once per campaign product scope filter.|The *ChannelExclusivity* operand may be used in multiple branches, but may only be specified once per branch.|
|Condition|The condition of the product.<br/><br/>If operand is set to Condition, the supported attribute values that you can specify are *New*, *Used*, and *Refurbished*.|The *Condition* operand may only be specified once per campaign product scope filter.|The *Condition* operand may be used in multiple branches, but may only be specified once per branch.|
|CustomLabel0-4<br/><br/>Five custom label operand values are available i.e. CustomLabel0, CustomLabel1, CustomLabel2, CustomLabel3, and CustomLabel4.|A custom label defined by the merchant.<br/><br/>Custom labels e.g. CustomLabel0 and CustomLabel4 are not validated based on any hierarchy.<br/><br/>A maximum of 100 characters.<br/><br/>This operand is not applicable with [Sponsored Products](../guides/product-ads.md#setup-cooperative).|Each of the *CustomLabel* operands may be used once per campaign product scope filter.|Each of the *CustomLabel* operands may be used in multiple branches, but may only be specified once per branch. For example one branch may contain *CustomLabel0* and *CustomLabel1*, but may not contain another node with the *CustomLabel1* operand.|
|GTIN|The Global Trade Item Number defined by the merchant.<br/><br/>The GTIN field has a limit of 50 characters, with each GTIN value having up to 14 digits.<br/><br/>This operand is only applicable with [Sponsored Products](../guides/product-ads.md#setup-cooperative).|The *GTIN* operand may only be specified once per campaign product scope filter.|The *GTIN* operand may be used in multiple branches, but may only be specified once per branch.|
|Id|The product identifier defined by the merchant.<br/><br/>A maximum of 1,000 characters.|The *Id* operand may only be specified once per campaign product scope filter.|The *Id* operand may be used in multiple branches, but may only be specified once per branch.|
|MPN|The Global Trade Item Number defined by the merchant.<br/><br/>A maximum of 70 characters.<br/><br/>This operand is only applicable with [Sponsored Products](../guides/product-ads.md#setup-cooperative).|The *MPN* operand may only be specified once per campaign product scope filter.|The *MPN* operand may be used in multiple branches, but may only be specified once per branch.|
|ProductType1-5<br/><br/>Five product type operand values are available i.e. ProductType1, ProductType2, ProductType3, ProductType4, and ProductType5.|A product type or category defined by the merchant.<br/><br/>ProductType1 is the highest level product type, and ProductType5 is the lowest level or most granular product type.<br/><br/>A maximum of 100 characters.<br/><br/>This operand is not applicable with [Sponsored Products](../guides/product-ads.md#setup-cooperative).|Each of the product type operands may be used once per campaign product scope filter.<br/><br/>If you specify a product condition with operand set to a product type from 1 through 5,<br/>they must be specified in ascending order. For example, you can set the operand to "ProductType2" with attribute "Pet Supplies", if a preceding product condition has the operand "ProductType1" with attribute "Animals & Pet Supplies".|Each of the *ProductType* operands may be used in multiple branches, but may only be specified once per branch. For example one branch may contain *ProductType1* and *ProductType2*, but may not contain another node with the *ProductType2* operand.<br/><br/>If you set the operand to a product type from 1 through 5, they must be specified in ascending order. For example, the operand can be set to "ProductType2" with attribute "Pet Supplies", if a higher level product partition has operand "ProductType1" with attribute "Animals & Pet Supplies".<br/><br/>The prior level product type operand doesn't need to be specified in the immediate parent partition. For example a ProductType2 condition could be specified for a product partition if the parent of its parent specified a ProductType1 condition.|

## <a name="productcondition2"></a>Product Condition 2
Supports the same values and rules as [Product Condition 1](#productcondition1).

## <a name="productcondition3"></a>Product Condition 3
Supports the same values and rules as [Product Condition 1](#productcondition1).

## <a name="productcondition4"></a>Product Condition 4
Supports the same values and rules as [Product Condition 1](#productcondition1).

## <a name="productcondition5"></a>Product Condition 5
Supports the same values and rules as [Product Condition 1](#productcondition1).

## <a name="productcondition6"></a>Product Condition 6
Supports the same values and rules as [Product Condition 1](#productcondition1).

## <a name="productcondition7"></a>Product Condition 7
Supports the same values and rules as [Product Condition 1](#productcondition1).

## <a name="productvalue1"></a>Product Value 1
The condition's attribute value. An attribute's value must exactly match the value specified in the customer's Microsoft Merchant Center catalog file.

For business rules see [Product Condition 1](#productcondition1).

**Add:** Required  
**Update:** Read-only. You cannot update the condition or value fields. To update the conditions you must delete the campaign product scope and add a new one.    
**Delete:** Read-only  

## <a name="productvalue2"></a>Product Value 2
Supports the same values and rules as [Product Value 1](#productvalue1).

## <a name="productvalue3"></a>Product Value 3
Supports the same values and rules as [Product Value 1](#productvalue1).

## <a name="productvalue4"></a>Product Value 4
Supports the same values and rules as [Product Value 1](#productvalue1).

## <a name="productvalue5"></a>Product Value 5
Supports the same values and rules as [Product Value 1](#productvalue1).

## <a name="productvalue6"></a>Product Value 6
Supports the same values and rules as [Product Value 1](#productvalue1).

## <a name="productvalue7"></a>Product Value 7
Supports the same values and rules as [Product Value 1](#productvalue1).

## <a name="status"></a>Status
The status of the product scope.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The only possible status is *Active*. If you set the status to *Deleted* it will be ignored and the returned record will have status set to *Active*.  
**Update:** Optional    
**Delete:** Required. The Status must be set to *Deleted*.

