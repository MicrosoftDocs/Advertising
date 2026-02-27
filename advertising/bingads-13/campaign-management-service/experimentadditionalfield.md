---
title: ExperimentAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a list of optional properties that you can request when using the experiment object.
---
# ExperimentAdditionalField Value Set - Campaign Management
Defines a list of optional properties that you can request when using the experiment object.

## Syntax
```xml
<xs:simpleType name="ExperimentAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="ExperimentSubType" />
        <xs:enumeration value="ExperimentArms" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ExperimentAdditionalField](experimentadditionalfield.md) value set has the following values: [ExperimentArms](#experimentarms), [ExperimentSubType](#experimentsubtype).

|Value|Description|
|-----------|---------------|
|<a name="experimentarms"></a>ExperimentArms|Request that the experiment arms field is used when requesting an [Experiment](experiment.md) object.|
|<a name="experimentsubtype"></a>ExperimentSubType|Request that the experiment sub type field is used when requesting the [Experiment](experiment.md) object.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetExperimentsByIds](getexperimentsbyids.md)  
