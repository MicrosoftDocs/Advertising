---
title: AdExtensionAssociationCollection Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an array of objects that associate an ad extension and its editorial status to an account, campaign, or ad group.
---
# AdExtensionAssociationCollection Data Object - Campaign Management
Defines an array of objects that associate an ad extension and its editorial status to an account, campaign, or ad group.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdExtensionAssociationCollection" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdExtensionAssociations" nillable="true" type="tns:ArrayOfAdExtensionAssociation" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdExtensionAssociations": [
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
              "EndHour": IntValueHere,
              "EndMinute": "ValueHere",
              "StartHour": IntValueHere,
              "StartMinute": "ValueHere"
            }
          ],
          "EndDate": {
            "Day": IntValueHere,
            "Month": IntValueHere,
            "Year": IntValueHere
          },
          "StartDate": {
            "Day": IntValueHere,
            "Month": IntValueHere,
            "Year": IntValueHere
          },
          "UseSearcherTimeZone": "ValueHere"
        },
        "Status": "ValueHere",
        "Type": "ActionAdExtension",
        "Version": IntValueHere,
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
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AdExtensionAssociationCollection](adextensionassociationcollection.md) object has the following elements: [AdExtensionAssociations](#adextensionassociations).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adextensionassociations"></a>AdExtensionAssociations|An array of objects that associate an ad extension and its editorial status to an account, campaign, or ad group.<br/><br/>**Add:** Required<br/>**Update:** Required|[AdExtensionAssociation](adextensionassociation.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAdExtensionsAssociations](getadextensionsassociations.md)  
