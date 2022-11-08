---
title: "Hotel Association Record - Bulk"
ms.service: bing-ads
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Hotel Association fields in a Bulk file. 
ms.subservice: bulk-api
---
# Hotel Association Record - Bulk
Defines the Hotel Association record that can be uploaded in a Bulk file.  

The following Bulk CSV example would update the Hotel Association. 

```csv
Type,Name,Id,Parent Id,Client Id,Modified Time
Format Version,6,,,,
Hotel Association,,HotelIdGoesHere,HotelGroupIdGoesHere,MyHotelGroupClientId,
```

For a *Hotel Association* record, the following attribute fields are available via [Bulk Upload](bulk-download-upload.md#bulkupload). 

- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Update:** Optional    

## <a name="id"></a>Id
A system-generated ID that uniquely identifies the hotel to be grouped or ungrouped.

**Update:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Update:** Read-only  

## <a name="parentid"></a>Parent Id
A system-generated ID that uniquely identifies the hotel group to move the hotel into. 

**Update:** Read-only and Required. If this field is left empty, the hotel will no longer be associated with any hotel group. 
