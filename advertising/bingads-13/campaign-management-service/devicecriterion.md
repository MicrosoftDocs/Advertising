---
title: DeviceCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a criterion that can be used to show ads on specific devices.
---
# DeviceCriterion Data Object - Campaign Management
Defines a criterion that can be used to show ads on specific devices.

When you target by device, you choose to show ads to potential customers when they're using desktops and tablets or smartphones. 

Each device criterion defines a device name for the accompanying criterion bid adjustment. 

The maximum number of device criterions that you can specify per campaign or ad group is three. You must either have three separate criterions for *Computers*, *Smartphones*, and *Tablets*, otherwise no device criterions can exist for the campaign or ad group.

The *DeviceCriterion* criterion can be included within [BiddableAdGroupCriterion](biddableadgroupcriterion.md) and[BiddableCampaignCriterion](biddablecampaigncriterion.md) objects. If ad group level device criterions are specified, the campaign level device criterions are ignored for that ad group. In other words the ad group device criterions override the campaign device criterions, and are not applied as a union.   

## Syntax
```xml
<xs:complexType name="DeviceCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="DeviceName" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="OSName" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [DeviceCriterion](devicecriterion.md) object has the following elements: [DeviceName](#devicename), [OSName](#osname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicename"></a>DeviceName|The name of the device to target.<br/><br/>The following are the possible device names that you can specify.<br/>- Computers<br/>- Smartphones<br/>- Tablets<br/><br/>Three separate bids for Computers, Tablets, and Smartphones should always be specified together. If you do not add individual device criterions representing each of the three device types, the missing device criterions will be added with the default bid adjustment of zero.<br/><br/>**Add:** Required. Three separate criterions for *Computers*, *Smartphones*, and *Tablets* should be specified together in the same add criterions request. If you do not add individual device criterions representing each of the three device types, no device criterions will be added to the campaign or ad group.<br/>**Update:** Not allowed. If you specify this element it must match the existing setting.|**string**|
|<a name="osname"></a>OSName|Reserved for internal use.<br/><br/>If you specify this element the add and update operations will not fail, but the OS names will not be set. When you retrieve this object, the *OSName* element will be nil.<br/><br/>**Add:** Not allowed.<br/>**Update:** Not allowed.|**string**|

The [DeviceCriterion](devicecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [DeviceCriterion](devicecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [DeviceCriterion](devicecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Device* when you retrieve a device criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

