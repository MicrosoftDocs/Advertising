---
title: AdExtensionAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a list of optional ad extension properties that you can request when calling GetAdExtensionsAssociations and GetAdExtensionsByIds.
---
# AdExtensionAdditionalField Value Set - Campaign Management
Defines a list of optional ad extension properties that you can request when calling [GetAdExtensionsAssociations](getadextensionsassociations.md) and [GetAdExtensionsByIds](getadextensionsbyids.md). The additional field values enable you to get the latest features using the current version of Campaign Management API, and in the next version the corresponding properties will be included in the ad extension by default.  

## Syntax
```xml
<xs:simpleType name="AdExtensionAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Images" />
        <xs:enumeration value="DisplayText" />
        <xs:enumeration value="Layouts" />
        <xs:enumeration value="ActionTypesPhase3" />
        <xs:enumeration value="ActionTypesPhase4" />
        <xs:enumeration value="NewFilterLinkHeaders" />
        <xs:enumeration value="SourceType" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdExtensionAdditionalField](adextensionadditionalfield.md) value set has the following values: [ActionTypesPhase3](#actiontypesphase3), [ActionTypesPhase4](#actiontypesphase4), [DisplayText](#displaytext), [Images](#images), [Layouts](#layouts), [NewFilterLinkHeaders](#newfilterlinkheaders), [SourceType](#sourcetype).

|Value|Description|
|-----------|---------------|
|<a name="actiontypesphase3"></a>ActionTypesPhase3|Request that the latest [ActionAdExtensionActionType](actionadextensionactiontype.md) values be included within each returned [ActionAdExtension](actionadextension.md#actiontype).<br/><br/>For example, if the action type that is stored in Microsoft Advertising is [RenewNow](actionadextensionactiontype.md#renewnow) the service returns [Unknown](actionadextensionactiontype.md#unknown) by default. To discover the stored action type e.g., [RenewNow](actionadextensionactiontype.md#renewnow), you must include ActionTypesPhase3 in the request.|
|<a name="actiontypesphase4"></a>ActionTypesPhase4|Request that the latest [ActionAdExtensionActionType](actionadextensionactiontype.md) values be included within each returned [ActionAdExtension](actionadextension.md#actiontype).<br/><br/>For example, if the action type that is stored in Microsoft Advertising is [BuildNow](actionadextensionactiontype.md#buildnow) the service returns [Unknown](actionadextensionactiontype.md#unknown) by default. To discover the stored action type e.g., [BuildNow](actionadextensionactiontype.md#buildnow), you must include ActionTypesPhase4 in the request.|
|<a name="displaytext"></a>DisplayText|Request that the [DisplayText](imageadextension.md#displaytext) element be included within each returned [ImageAdExtension](imageadextension.md) object.|
|<a name="images"></a>Images|Request that the [Images](imageadextension.md#images) element be included within each returned [ImageAdExtension](imageadextension.md) object.|
|<a name="layouts"></a>Layouts|Request that the [Layouts](imageadextension.md#layouts) element be included within each returned [ImageAdExtension](imageadextension.md) object.|
|<a name="newfilterlinkheaders"></a>NewFilterLinkHeaders|Request that the [AdExtensionHeaderType](filterlinkadextension.md#adextensionheadertype) element be included within each returned [FilterLinkAdExtension](filterlinkadextension.md) object.|
|<a name="sourcetype"></a>SourceType|Request that the [SourceType](imageadextension.md#sourcetype) element be included within each returned [ImageAdExtension](imageadextension.md) object|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAdExtensionsAssociations](getadextensionsassociations.md)  
[GetAdExtensionsByIds](getadextensionsbyids.md)  
