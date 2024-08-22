---
title: AdExtensionAssociation Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the relationship and editorial status of an ad extension with an account, campaign, or ad group.(test)
---
# AdExtensionAssociation Data Object Test - Campaign Management
Defines the relationship and editorial status of an ad extension with an account, campaign, or ad group.

# [XML](#tab/xml)

```xml
<xs:complexType name="AdExtensionAssociation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdExtension" nillable="true" type="tns:AdExtension" />
    <xs:element name="AssociationType" type="tns:AssociationType" />
    <xs:element minOccurs="0" name="EditorialStatus" nillable="true" type="tns:AdExtensionEditorialStatus" />
    <xs:element name="EntityId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdExtension": {
    "DevicePreference": "LongValueHere",
    "ForwardCompatibilityMap": [
      {
        "key": "ValueHere",
        "value": "ValueHere"
      }
    ],
    "Id": "LongValueHere",
    "Scheduling": {
      "DayTimeRanges": [
        {
          "Day": "ValueHere",
          "EndHour": "IntValueHere",
          "EndMinute": "ValueHere",
          "StartHour": "IntValueHere",
          "StartMinute": "ValueHere"
        }
      ],
      "EndDate": {
        "Day": "IntValueHere",
        "Month": "IntValueHere",
        "Year": "IntValueHere"
      },
      "StartDate": {
        "Day": "IntValueHere",
        "Month": "IntValueHere",
        "Year": "IntValueHere"
      },
      "UseSearcherTimeZone": "ValueHere"
    },
    "Status": "ValueHere",
    "Type": "ActionAdExtension",
    "Version": "IntValueHere",
    "ActionType": "ValueHere",
    "FinalMobileUrls": [
      "ValueHere"
    ],
    "FinalUrls": [
      "ValueHere"
    ],
    "FinalUrlSuffix": "ValueHere",
    "Language": "ValueHere",
    "TrackingUrlTemplate": "ValueHere",
    "UrlCustomParameters": {
      "Parameters": [
        {
          "Key": "ValueHere",
          "Value": "ValueHere"
        }
      ]
    }
  },
  "AssociationType": "ValueHere",
  "EditorialStatus": "ValueHere",
  "EntityId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdExtensionAssociation](adextensionassociation.md) object has the following elements: [AdExtension](#adextension), [AssociationType](#associationtype), [EditorialStatus](#editorialstatus), [EntityId](#entityid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adextension"></a>AdExtension|The ad extension associated with a supported entity.<br/><br/>**Add:** Required<br/>**Update:** Required|[AdExtension](adextension.md)|
|<a name="associationtype"></a>AssociationType|The type of entity associated with the ad extension.<br/><br/>**Add:** Required<br/>**Update:** Required|[AssociationType](associationtype.md)|
|<a name="editorialstatus"></a>EditorialStatus|The editorial status of the ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdExtensionEditorialStatus](adextensioneditorialstatus.md)|
|<a name="entityid"></a>EntityId|The identifier of an entity associated with the ad extension.<br/><br/>**Add:** Required<br/>**Update:** Required|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdExtensionAssociationCollection](adextensionassociationcollection.md)  
