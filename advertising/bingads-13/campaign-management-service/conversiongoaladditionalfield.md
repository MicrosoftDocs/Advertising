---
title: ConversionGoalAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a list of optional conversion goal properties that you can request when calling GetConversionGoalsByIds and GetConversionGoalsByTagIds.
ms.subservice: campaign-management-api
---
# ConversionGoalAdditionalField Value Set - Campaign Management
Defines a list of optional conversion goal properties that you can request when calling [GetConversionGoalsByIds](getconversiongoalsbyids.md) and [GetConversionGoalsByTagIds](getconversiongoalsbytagids.md). The additional field values enable you to get the latest features using the current version of Campaign Management API, and in the next version the corresponding properties will be included in the conversion goal by default.  

## Syntax
```xml
<xs:simpleType name="ConversionGoalAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="ViewThroughConversionWindowInMinutes" />
        <xs:enumeration value="IsExternallyAttributed" />
        <xs:enumeration value="GoalCategory" />
        <xs:enumeration value="InactiveDueToTagUnavailable" />
        <xs:enumeration value="AttributionModelType" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ConversionGoalAdditionalField](conversiongoaladditionalfield.md) value set has the following values: [AttributionModelType](#attributionmodeltype), [GoalCategory](#goalcategory), [InactiveDueToTagUnavailable](#inactiveduetotagunavailable), [IsExternallyAttributed](#isexternallyattributed), [ViewThroughConversionWindowInMinutes](#viewthroughconversionwindowinminutes).

|Value|Description|
|-----------|---------------|
|<a name="attributionmodeltype"></a>AttributionModelType|Determines which attribution model, _LastTouch_ or _LastClick_, is used with a conversion goal.|
|<a name="goalcategory"></a>GoalCategory|Request that the [GoalCategory](conversiongoal.md#goalcategory) element be included within each returned [ConversionGoal](conversiongoal.md) object.|
|<a name="inactiveduetotagunavailable"></a>InactiveDueToTagUnavailable|Request that the [InactiveDueToTagUnavailable](conversiongoaltrackingstatus.md#inactiveduetotagunavailable) value be included within each returned [ConversionGoal](conversiongoal.md) object.<br/><br/>This status is represented as [TagInactive](conversiongoaltrackingstatus.md#taginactive) by default. To discover whether the status stored in Microsoft Advertising is [InactiveDueToTagUnavailable](conversiongoaltrackingstatus.md#inactiveduetotagunavailable), you must include InactiveDueToTagUnavailable in the request.|
|<a name="isexternallyattributed"></a>IsExternallyAttributed|Request that the [IsExternallyAttributed](offlineconversiongoal.md#isexternallyattributed) element be included within each returned [OfflineConversionGoal](offlineconversiongoal.md) object.|
|<a name="viewthroughconversionwindowinminutes"></a>ViewThroughConversionWindowInMinutes|Request that the [ViewThroughConversionWindowInMinutes](conversiongoal.md#viewthroughconversionwindowinminutes) element be included within each returned [ConversionGoal](conversiongoal.md) object.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetConversionGoalsByIds](getconversiongoalsbyids.md)  
[GetConversionGoalsByTagIds](getconversiongoalsbytagids.md)  
