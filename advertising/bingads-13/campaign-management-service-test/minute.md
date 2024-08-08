---
title: Minute Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible minute values for ad extension scheduling or day and time criterion.(test)
---
# Minute Value Set Test - Campaign Management
Defines the possible minute values for ad extension scheduling or day and time criterion.

## Syntax
```xml
<xs:simpleType name="Minute" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <ActualType Name="short" Namespace="http://www.w3.org/2001/XMLSchema" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
    </xs:appinfo>
  </xs:annotation>
  <xs:restriction base="xs:string">
    <xs:enumeration value="Zero" />
    <xs:enumeration value="Fifteen" />
    <xs:enumeration value="Thirty" />
    <xs:enumeration value="FortyFive" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [Minute](minute.md) value set has the following values: [Fifteen](#fifteen), [FortyFive](#fortyfive), [Thirty](#thirty), [Zero](#zero).

|Value|Description|
|-----------|---------------|
|<a name="fifteen"></a>Fifteen|The starting or ending minute of the hour range is fifteen.|
|<a name="fortyfive"></a>FortyFive|The starting or ending minute of the hour range is forty-five.|
|<a name="thirty"></a>Thirty|The starting or ending minute of the hour range is thirty.|
|<a name="zero"></a>Zero|The starting or ending minute of the hour range is zero.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[DayTime](daytime.md)  
[DayTimeCriterion](daytimecriterion.md)  
