---
title: "Campaign Customer List Association Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Campaign Customer List Association fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign Level Conversion Goal Record - Bulk

Defines a Campaign level conversion goal that can be uploaded and downloaded in a bulk file.

Campaign level conversion goals allows you override the default goals and specify conversion goals for optimized performance.

You can download all *Campaign Conversion Goal* records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignConversionGoal* in the [CampaignConversionGoal](campaignlevelconversiongoal.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Campaign Conversion Goal if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Sub Type,Action Type,Parent Id,Goal Id
Format Version,,,,,,,,,6.0,,
Campaign Conversion Goal, Goal, Add, 10086,18893
```

For a *Campaign Level ConversionGoal* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Type](#type)
- [Sub Type](#subtype)
- [Action Type](#actiontype)
- [Parent Id](#parentid)
- [Goal Id](#clientid)



## <a name="type"></a>Type
The conversion goal type that you are targeting. For example the value is *Campaign Conversion Goal* if the record represents a goal conversion criterion.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  .  
**Update:** Read-only  
**Delete:** Read-only  


## <a name="subtype"></a>Sub Type
The conversion goal sub type that you are targeting. For example the value is *Goal* if the record represents a goal conversion criterion.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  .  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the campaign that is associated to the conversion goal.

This bulk field maps to the *Id* field of the [Campaign](#campaign) record.

**Add:** Read-only and Required    
**Update:** Read-only and Required  
**Delete:** Read-only and Required  


## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  
 


