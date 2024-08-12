---
title: AdExtensionAssociationCollection Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an array of objects that associate an ad extension and its editorial status to an account, campaign, or ad group.(test)
---
# AdExtensionAssociationCollection Data Object Test - Campaign Management
Defines an array of objects that associate an ad extension and its editorial status to an account, campaign, or ad group.

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
        "DevicePreference": "ValueHere",
        "ForwardCompatibilityMap": [
          {
            "key": "ValueHere",
            "value": "ValueHere"
          }
        ],
        "Id": "ValueHere",
        "Scheduling": {
          "DayTimeRanges": [
            {
              "Day": "ValueHere",
              "EndHour": "ValueHere",
              "EndMinute": "ValueHere",
              "StartHour": "ValueHere",
              "StartMinute": "ValueHere"
            }
          ],
          "EndDate": {
            "Day": "ValueHere",
            "Month": "ValueHere",
            "Year": "ValueHere"
          },
          "StartDate": {
            "Day": "ValueHere",
            "Month": "ValueHere",
            "Year": "ValueHere"
          },
          "UseSearcherTimeZone": "ValueHere"
        },
        "Status": "ValueHere",
        "Type": "ActionAdExtension",
        "Version": "ValueHere",
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
      "EntityId": "ValueHere"
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
