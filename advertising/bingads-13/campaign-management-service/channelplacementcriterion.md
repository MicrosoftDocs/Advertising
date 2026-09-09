---
title: ChannelPlacementCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the channel placement criterion data object.
---
# ChannelPlacementCriterion Data Object - Campaign Management
Defines the channel placement criterion data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ChannelPlacementCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="ChannelId" type="xs:int">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="ChannelName" nillable="true" type="xs:string">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="ChannelPlacementId" type="xs:long">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="ChannelPlacementName" nillable="true" type="xs:string">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="SubChannelId" nillable="true" type="xs:int">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="SubChannelName" nillable="true" type="xs:string">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "ChannelPlacementCriterion",
  "ChannelId": IntValueHere,
  "ChannelName": "ValueHere",
  "ChannelPlacementId": "LongValueHere",
  "ChannelPlacementName": "ValueHere",
  "SubChannelId": IntValueHere,
  "SubChannelName": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ChannelPlacementCriterion](channelplacementcriterion.md) object has the following elements: [ChannelId](#channelid), [ChannelName](#channelname), [ChannelPlacementId](#channelplacementid), [ChannelPlacementName](#channelplacementname), [SubChannelId](#subchannelid), [SubChannelName](#subchannelname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="channelid"></a>ChannelId|The channel ID.|**int**|
|<a name="channelname"></a>ChannelName|The channel name.|**string**|
|<a name="channelplacementid"></a>ChannelPlacementId|The channel placement ID.|**long**|
|<a name="channelplacementname"></a>ChannelPlacementName|The channel placement name.|**string**|
|<a name="subchannelid"></a>SubChannelId|The sub-channel ID.|**int**|
|<a name="subchannelname"></a>SubChannelName|The sub-channel name.|**string**|

The [ChannelPlacementCriterion](channelplacementcriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [ChannelPlacementCriterion](channelplacementcriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ChannelPlacementCriterion](channelplacementcriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of criterion. This value is *ChannelPlacement* when you retrieve a channel placement criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13
