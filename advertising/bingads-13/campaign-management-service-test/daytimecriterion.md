---
title: DayTimeCriterion Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a criterion that can be used to show ads to users during a specific day and time range.(test)
---
# DayTimeCriterion Data Object Test - Campaign Management
Defines a criterion that can be used to show ads to users during a specific day and time range.

The *DayTimeCriterion* criterion can be included within [BiddableAdGroupCriterion](biddableadgroupcriterion.md) and[BiddableCampaignCriterion](biddablecampaigncriterion.md) objects. If ad group level day and time criterions are specified, the campaign level day and time criterions are ignored for that ad group. In other words the ad group day and time criterions override the campaign day and time criterions, and are not applied as a union.   

> [!NOTE]
> You cannot modify the [Day](#day), [FromHour](#fromhour), [FromMinute](#fromminute), [ToHour](#tohour), or [ToMinute](#tominute) values for an existing criterion. To modify the day and time ranges, you must delete the criterion and add a new criterion. 

# [XML](#tab/xml)

```xml
<xs:complexType name="DayTimeCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="Day" nillable="true" type="tns:Day" />
        <xs:element minOccurs="0" name="FromHour" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="FromMinute" nillable="true" type="tns:Minute" />
        <xs:element minOccurs="0" name="ToHour" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="ToMinute" nillable="true" type="tns:Minute" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "DayTimeCriterion",
  "Day": "ValueHere",
  "FromHour": IntValueHere,
  "FromMinute": "ValueHere",
  "ToHour": IntValueHere,
  "ToMinute": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DayTimeCriterion](daytimecriterion.md) object has the following elements: [Day](#day), [FromHour](#fromhour), [FromMinute](#fromminute), [ToHour](#tohour), [ToMinute](#tominute).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="day"></a>Day|The day of the week to target. For example, you can target the ads to run only on Friday or Saturday.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|[Day](day.md)|
|<a name="fromhour"></a>FromHour|The starting hour range to target.<br/><br/>The possible values range from 0 to 23.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|**int**|
|<a name="fromminute"></a>FromMinute|The starting minute of the hour to target.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|[Minute](minute.md)|
|<a name="tohour"></a>ToHour|The ending hour range to target.<br/><br/>Supported values range from 0 to 24. If the [ToHour](#tohour) is set to 24, the [ToMinute](#tominute) must be *Zero*.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting. |**int**|
|<a name="tominute"></a>ToMinute|The ending minute of the hour to target.<br/><br/>**Add:** Required<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|[Minute](minute.md)|

The [DayTimeCriterion](daytimecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [DayTimeCriterion](daytimecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [DayTimeCriterion](daytimecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *DayTime* when you retrieve a day and time criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

