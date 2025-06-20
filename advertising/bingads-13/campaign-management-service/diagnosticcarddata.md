---
title: DiagnosticCardData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the diagnostic card data data object.
---
# DiagnosticCardData Data Object - Campaign Management
Defines the diagnostic card data data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DiagnosticCardData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CheckpointsData" nillable="true" type="tns:ArrayOfHealthCheckData" />
    <xs:element minOccurs="0" name="Metadata" nillable="true" type="tns:HealthCheckMetadata" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CheckpointsData": [
    {
      "HealthCheckDataVersion": "ValueHere",
      "HealthCheckEntity": {
        "HealthCheckEntityId": "LongValueHere",
        "HealthCheckEntityLevel": "ValueHere"
      },
      "HealthCheckJsonData": "ValueHere",
      "HealthCheckName": "ValueHere",
      "HealthCheckSubEntityResults": {
        "SubEntityHealthIssueCount": IntValueHere,
        "SubEntityIds": [
          "LongValueHere"
        ],
        "SubEntityLevel": "ValueHere"
      }
    }
  ],
  "Metadata": {
    "HealthCheckCategory": "ValueHere",
    "HealthCheckCategoryDisplayName": "ValueHere",
    "HealthCheckColumnsMetadata": [
      {
        "HealthCheckActionLinksMetadata": [
          {
            "LinkName": "ValueHere",
            "LinkTemplate": "ValueHere",
            "LinkType": "ValueHere"
          }
        ],
        "Key": "ValueHere",
        "Title": "ValueHere",
        "Type": "ValueHere"
      }
    ],
    "HealthCheckDescription": "ValueHere",
    "HealthCheckDisplayName": "ValueHere",
    "HealthCheckName": "ValueHere",
    "HealthCheckSeverity": "ValueHere",
    "HealthCheckSubType": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [DiagnosticCardData](diagnosticcarddata.md) object has the following elements: [CheckpointsData](#checkpointsdata), [Metadata](#metadata).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="checkpointsdata"></a>CheckpointsData|Reserved.|[HealthCheckData](healthcheckdata.md) array|
|<a name="metadata"></a>Metadata|Reserved.|[HealthCheckMetadata](healthcheckmetadata.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetDiagnostics](getdiagnostics.md)  
