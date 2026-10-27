---
title: "Ad Group Url Targets - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 10/10/2026
description: Describes the Ad Group Url Target fields in a Bulk file.
dev_langs:
  - csharp
---
# Ad Group Url Targets - Bulk
Defines an AI Max URL inclusion that can be uploaded and downloaded in a bulk file.

An *Ad Group Url Target* is a biddable webpage criterion under a standard Search ad group in an
AI Max-enabled Search campaign. The account must be eligible for AI Max URL inclusions. A
mixed campaign can contain both AI Max and dynamic search ads settings. Its *SearchDynamic* ad
groups continue to use the
[Ad Group Dynamic Search Ad Target](ad-group-dynamic-search-ad-target.md) record, even in a campaign
that has AI Max enabled.

Download these records by including
[DownloadEntity.AdGroupUrlTargets](downloadentity.md#adgroupurltargets) and the
[EntityData](datascope.md#entitydata) scope. Full downloads return current targets as
*Ad Group Url Target* records. Delta downloads preserve this record type for added, updated, and
deleted URL targets.

The following example adds an AI Max URL inclusion.

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Name,Ad Group Url Target Condition 1,Ad Group Url Target Operator 1,Ad Group Url Target Value 1
Format Version,,,,,,,,6.0,,,
Ad Group Url Target,Active,,-1113,,,ClientIdGoesHere,,Contoso flowers,Url,Contains,contoso.com/flowers
```

If you use the Microsoft Advertising SDK, this record maps to
*BulkAdGroupUrlTarget*. The following fields are available.

- [Ad Group](#adgroup)
- [Ad Group Url Target Condition 1](#adgroupurltargetcondition1)
- [Ad Group Url Target Condition 2](#adgroupurltargetcondition2)
- [Ad Group Url Target Condition 3](#adgroupurltargetcondition3)
- [Ad Group Url Target Operator 1](#adgroupurltargetoperator1)
- [Ad Group Url Target Operator 2](#adgroupurltargetoperator2)
- [Ad Group Url Target Operator 3](#adgroupurltargetoperator3)
- [Ad Group Url Target Value 1](#adgroupurltargetvalue1)
- [Ad Group Url Target Value 2](#adgroupurltargetvalue2)
- [Ad Group Url Target Value 3](#adgroupurltargetvalue3)
- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Name](#name)
- [Parent Id](#parentid)
- [Status](#status)

At least one complete condition, operator, and value set is required on add. You can specify up to
three conditions. Conditions within one target are evaluated with AND logic, and multiple targets
in the same ad group are evaluated with OR logic. A URL with *Equals* must be the only condition.
AI Max URL inclusion targets must be biddable; URL exclusion targets are not supported.

|Condition|Supported operator|
|---|---|
|Url|Contains or Equals|
|Category|Equals|
|CustomLabel|Equals|
|PageTitle|Contains|
|PageContent|Contains|

A bid, tracking template, custom parameters, and final URL suffix are not supported for this record.
To change conditions, delete the target and add a new one.

## <a name="adgroup"></a>Ad Group
The name of the standard Search ad group that contains the URL target.

**Add:** Read-only and required<br/>
**Update:** Read-only and required<br/>
**Delete:** Read-only and required<br/>

For add, update, and delete, specify either [Parent Id](#parentid) or *Ad Group*.

## <a name="adgroupurltargetcondition1"></a>Ad Group Url Target Condition 1
The first webpage condition operand. See the supported combinations above.

**Add:** Required<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="adgroupurltargetcondition2"></a>Ad Group Url Target Condition 2
The second webpage condition operand.

**Add:** Optional<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="adgroupurltargetcondition3"></a>Ad Group Url Target Condition 3
The third webpage condition operand.

**Add:** Optional<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="adgroupurltargetoperator1"></a>Ad Group Url Target Operator 1
The operator for the first condition.

**Add:** Required<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="adgroupurltargetoperator2"></a>Ad Group Url Target Operator 2
The operator for the second condition.

**Add:** Required when condition 2 is set<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="adgroupurltargetoperator3"></a>Ad Group Url Target Operator 3
The operator for the third condition.

**Add:** Required when condition 3 is set<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="adgroupurltargetvalue1"></a>Ad Group Url Target Value 1
The argument for the first condition.

**Add:** Required<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="adgroupurltargetvalue2"></a>Ad Group Url Target Value 2
The argument for the second condition.

**Add:** Required when condition 2 is set<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="adgroupurltargetvalue3"></a>Ad Group Url Target Value 3
The argument for the third condition.

**Add:** Required when condition 3 is set<br/>
**Update:** Not allowed<br/>
**Delete:** Read-only<br/>

## <a name="campaign"></a>Campaign
The name of the AI Max-enabled Search campaign that contains the ad group.

**Add:** Read-only<br/>
**Update:** Read-only<br/>
**Delete:** Read-only<br/>

## <a name="clientid"></a>Client Id
Used to associate an upload record with its corresponding result record.

**Add:** Optional<br/>
**Update:** Optional<br/>
**Delete:** Read-only<br/>

## <a name="id"></a>Id
The system-generated identifier of the URL target.

**Add:** Read-only<br/>
**Update:** Read-only and required<br/>
**Delete:** Read-only and required<br/>

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated, in Coordinated Universal Time (UTC).

**Add:** Read-only<br/>
**Update:** Read-only<br/>
**Delete:** Read-only<br/>

## <a name="name"></a>Name
The name used to identify the URL target.

**Add:** Optional. If omitted, a name is generated from the conditions.<br/>
**Update:** Optional<br/>
**Delete:** Read-only<br/>

## <a name="parentid"></a>Parent Id
The system-generated identifier of the ad group that contains the URL target.

**Add:** Read-only and required<br/>
**Update:** Read-only and required<br/>
**Delete:** Read-only and required<br/>

For add, update, and delete, specify either *Parent Id* or [Ad Group](#adgroup).

## <a name="status"></a>Status
The status of the URL target. Supported values are *Active*, *Paused*, and *Deleted*.

**Add:** Optional. The default is *Active*.<br/>
**Update:** Optional<br/>
**Delete:** Read-only<br/>

## Errors

|Code|Error|Description|
|---:|---|---|
|6906|AccountNotEnabledForAIMaxUrlInclusion|The account is not eligible for AI Max URL inclusions.|
|6907|AdGroupTargetTypeNotValid|The record type does not match the target ad group.|
|6908|AIMaxUrlInclusionConditionIsNullOrEmpty|At least one condition is required.|
|6910|UrlOptionsNotSupportedForAIMaxUrlTarget|An unsupported bid or URL option was supplied.|
