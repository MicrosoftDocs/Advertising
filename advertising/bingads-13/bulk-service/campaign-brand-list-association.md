---
title: "Campaign Brand List Association Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 10/20/2026
description: Describes how to add, deactivate, delete, and download campaign brand list associations in a Bulk file.
---
# Campaign Brand List Association Record - Bulk

Use a *Campaign Brand List Association* record to associate a brand list with a Performance Max
campaign or an AI Max Search campaign. Performance Max supports brand exclusions only; its brand
list associations are always exclusions. AI Max Search supports brand exclusions and inclusions.
For AI Max Search inclusions, Search Term Matching must be enabled. See
[Use brand exclusions and inclusions](../guides/ai-max.md#brand-lists).

The following example adds a brand exclusion association. Replace the example identifiers with the
IDs of an existing brand list and campaign. For Performance Max, the association is an exclusion
regardless of the *Is Excluded* value.

```csv
Type,Status,Id,Parent Id,Is Excluded,Client Id
Format Version,6.0,,,,
Campaign Brand List Association,Active,123456789,987654321,True,brand-exclusion-1
```

You can download campaign brand list associations by requesting the
[CampaignBrandListAssociation](downloadentity.md#campaignbrandlistassociation) value in the
[DownloadEntity](downloadentity.md) set and including the
[EntityData](datascope.md#entitydata) scope.

The following fields are available for a *Campaign Brand List Association* record in the
[Bulk File Schema](bulk-file-schema.md).

- [Client Id](#clientid)
- [Id](#id)
- [Is Excluded](#isexcluded)
- [Name](#name)
- [Parent Id](#parentid)
- [Status](#status)

## <a name="clientid"></a>Client Id

Identifies the record in the upload results. This value is copied to the result record and is not
stored.

**Add:** Optional

**Update:** Optional

**Delete:** Optional

## <a name="id"></a>Id

The identifier of the existing brand list to associate with the campaign.

**Add:** Required

**Update:** Required

**Delete:** Required

## <a name="isexcluded"></a>Is Excluded

Specifies how the brand list applies to an AI Max Search campaign. Set to *true* to exclude the
brands in the list, or *false* to include them. Performance Max associations are always exclusions;
brand inclusion is not supported for Performance Max.

You cannot associate the same brand list with the same campaign as both an inclusion and an
exclusion. To change an AI Max Search association from inclusion to exclusion, or vice versa,
delete the existing association and add it again with the new value. You can include both records
in the same upload: delete the existing association, then add it again with the new *Is Excluded*
value.

**Add:** For AI Max Search, set this value to choose inclusion or exclusion. Performance Max
associations are exclusions.

**Update:** Delete the association and add it again with the new value. Performance Max associations
remain exclusions.

**Delete:** Read-only

## <a name="name"></a>Name

The name of the brand list.

**Add:** Read-only

**Update:** Read-only

**Delete:** Read-only

## <a name="parentid"></a>Parent Id

The identifier of the campaign associated with the brand list. For an association with a campaign
created in the same upload, use the campaign record's reference key.

**Add:** Required

**Update:** Required

**Delete:** Required

## <a name="status"></a>Status

The status of the association. Supported values are *Active*, *Inactive*, and *Deleted*. If omitted,
the status is treated as *Active*. Use *Active* to add or reactivate an association, *Inactive* to
deactivate an AI Max Search association without deleting it, or *Deleted* to remove an association.
Performance Max associations do not support *Inactive* status.

**Add:** Optional. If omitted, the association is added as *Active*. *Inactive* is not supported
for Performance Max.

**Update:** Optional. If omitted, the association is treated as *Active*; this can reactivate an
inactive association. *Inactive* is not supported for Performance Max.

**Delete:** Set to *Deleted*
