---
title: "Label Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Describes the Label fields in a Bulk file.
dev_langs:
  - csharp
---
# Label Record - Bulk
Defines a label that can be uploaded and downloaded in a bulk file.

Labels let you organize campaigns, ad groups, ads, and keywords into groups based on whatever is important to you. You can then filter and run reports on your labels to get the data that is most meaningful to you.

You can download all *Label* records in the account by including the [DownloadEntity](downloadentity.md) value of *Labels* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new label. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Name,Description,Label,Color
Format Version,,,,,,,,6.0,,,
Label,,-22,,,,ClientIdGoesHere,,,Label Description,Label Name,#FFFFFF
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkLabel* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkLabel
var bulkLabel = new BulkLabel
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // Label object of the Campaign Management service.
    Label = new Label
    {
        // 'Color' column header in the Bulk file
        ColorCode = "#FFFFFF",
        // 'Description' column header in the Bulk file
        Description = "Label Description",
        // 'Id' column header in the Bulk file
        Id = labelIdKey,
        // 'Label' column header in the Bulk file
        Name = "Label Name " + DateTime.UtcNow
    },

    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkLabel);

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

For a *Label* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Color](#color)
- [Client Id](#clientid)
- [Description](#description)
- [Id](#id)
- [Label](#label)
- [Modified Time](#modifiedtime)
- [Status](#status)

## <a name="color"></a>Color
The label color as a hexadecimal code.

The hexadecimal value must have the '#' prefix. For example you can use the value of *#FFFFFF* for a white label.

The color can be viewed in the Microsoft Advertising web application. Your application can display the color or utilize the hexadecimal value to categorize a set of labels.

**Add:** Optional. If you do not specify any color, the value will be assigned at random for each label.  
**Update:** Optional. If no value is set for the update, this setting is not changed. You can update the color code but cannot remove it.   
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="description"></a>Description
The label description.

The label description can be between 1 to 200 characters in length.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the label.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the label can then be referenced in the *Parent Id* field of dependent record types such as [Campaign Label](campaign-label.md). This is recommended if you are adding new label and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="label"></a>Label
The label name.

The case-sensitive label name can be between 1 to 80 characters in length, and must be unique across all labels in the account.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the label.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

